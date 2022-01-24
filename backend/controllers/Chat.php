<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 02/07/2019
 * Time: 16:56
 */

class ChatClass
{
    var $error = 0;
    var $error_stmt = "";
    var $data = array();
    var $datetime;

    const chat_folder = "chats/";
    const chat_assets = "chats/assets";
    const ERR =  2;


    public function __construct()
    {
        if (substr_count($_SERVER[‘HTTP_ACCEPT_ENCODING’], ‘gzip’)) ob_start(“ob_gzhandler”); else ob_start();
        clearstatcache();
        date_default_timezone_set('Africa/Lagos'); //UTC
        // date_default_timezone_set('UTC');
        $this->datetime = date("Y-m-d H:i:s");
    }

    function initiate($data){
        $sender = $data['sender'];
        $receiver = $data['receiver'];
        $chat_folder = $this::chat_folder;
        $chat_assets = $this::chat_assets;
        if (!file_exists($chat_folder)) {
            mkdir($chat_folder, 0777, true);
        }
        if (!file_exists($chat_assets)) {
            mkdir($chat_assets, 0777, true);
        }

        if($sender != 0){
            if($sender==$receiver){
                return false;
            }
        }

        $chat_name = $chat_folder . "-" . $sender . "-" . $receiver . '.json';
        //if(!file_exists($group_name)){
        $empty = new stdClass;
        $data = array("messages"=>array(),"last_seen"=>$empty);
        $fdata = json_encode($data);
        $handle = fopen($chat_name, "w+");
        if($handle!=='false'){

            if(fwrite($handle,$fdata)!==false){
                return $chat_name;
            }else{
                return false;
            }
        }else{

            return false;
        }
    }

    function checkChatExists($data){
        $chat_folder = $this::chat_folder;
        $sender = $data['sender'];
        $receiver = $data['receiver'];
        $file1 = $chat_folder . "-" . $sender . "-" . $receiver . ".json";
        $file2 = $chat_folder . "-" . $receiver . "-" . $sender . ".json";
        $chat_file = "";
        if(file_exists($file1)){
            $chat_file = $file1;
        }elseif (file_exists($file2)){
            $chat_file = $file2;
        }else{
            $chat_file = $this->initiate($data);
        }

        return $chat_file;
    }

    function getChats($data){
        $sender = $data['sender'];
        $member = $data['member'];
        $receiver = $data['receiver'];

        $chat_file = $this->checkChatExists($data);

        if($chat_file==false){

            return false;
        }

        $d = file_get_contents($chat_file);

        $arr = json_decode($d,"true");
        $messages = $arr['messages'];
        $count = count($messages);

        $messages = array_slice($messages,-20,20); // fetch only the last 20 messages

        $dj = json_decode($d);

        if($sender == 0){
            $sender = $member;
        }

        $dj->last_seen->$sender = $count; //update the last seen message id of this user;

        $arr['last_seen'] = $dj->last_seen;

        $contn = json_encode($arr);

        $put = file_put_contents($chat_file,$contn);

        //echo json_encode($dj->messages);
        //echo json_encode($messages);
        $rez['messages'] = $messages;
        $rez['last_seen'] = $count;
        return $rez;

    }

    function sendMessage($data){

        $sender = $data['sender'];
        $receiver = $data['receiver'];
        $message = $data['message'];
        $name = $data['name'];
        $format = $data['format'];

        $chat_file = $this->checkChatExists($data);

        if($chat_file==false){
            return false;
        }

        $d = file_get_contents($chat_file);

        //is chat empty? It means it's been tampered with. Cos it should have default values.
        if(empty($d)){
            return false;
        }else{
            $arr = json_decode($d,"true");
        }
        $messages = $arr['messages'];
        //$last_seen = $arr['last_seen'];
        $m_cnt = count($messages); //get number of messages in d group
        $curr_msg_id = $m_cnt + 1; //the id of this current message

        $ls = json_decode($d);
        $ls->last_seen->$sender = $curr_msg_id; //update the last seen id of this user;

        $msg = new stdClass;
        $msg->user_id = $sender;
        $msg->id = $curr_msg_id;
        $msg->name = $name;
        $msg->message = $message;
        $msg->timed = $this->datetime;
        $msg->format = $format;
        $msg->deleted = 0;
        array_push($messages,$msg);

        $arr['messages'] = $messages;
        $arr['last_seen'] = $ls->last_seen;

        $contn = json_encode($arr);
        //echo $contn;
        //die();
        $put = file_put_contents($chat_file,$contn);
        if(!$put){
            //echo '0';
            return false;
        }else{
            return $curr_msg_id;
            //echo $curr_msg_id;
        }
    }

    function checkNewMessages($data){
        $sender = $data['sender'];
        $receiver = $data['receiver'];
        $last_seen_id = $data['last_seen'];

        $chat_file = $this->checkChatExists($data);

        if($chat_file==false){
            //echo "thing is false o"; die();
            return false;
        }

        $d = file_get_contents($chat_file);
        if(empty($d)){
            echo '0';
            die();
        }else{
            $arr = json_decode($d,"true");
        }
        $messages = $arr['messages'];
        //$last_seen = $arr['last_seen'];
        $last_msg_id = count($messages); //get last message id in the group

        $ls = json_decode($d);
        //$last_seen_id = $ls->last_seen->$user_id; //get last message id seen by the user;

        $latest = array_slice($messages,intval($last_seen_id)); //get only the messages not seen by the user from the messages array


        $ls->last_seen->$sender = $last_msg_id; //update the last seen message id of this user;

        $arr['last_seen'] = $ls->last_seen;

        $contn = json_encode($arr);

        $put = file_put_contents($chat_file,$contn);

        $rez['messages'] = $latest;
        $rez['last_seen'] = $last_msg_id;
        return $rez;
        /*echo json_encode($latest);
        die();*/
    }

    function checkNewChatsWithOthers($data){
        $sender = $data['sender'];
        //$chat_files = scandir($this::chat_folder);
        $chat_files = array_diff(scandir($this::chat_folder), array('..', '.','assets'));
        //$files2 = scandir($dir, 1);

        $unseen = 0;
        $rez = array();
        $main_return = array();
        $main_return['unseen'] = $unseen;
        $main_return['unseen_messages'] = $rez;

        if(!isset($sender)){
            return $main_return;
        }

        for($i=0;$i<count($chat_files);$i++){
            $sep = explode(".",$chat_files[$i]);
            $usersArray = explode("-",$sep[0]);

            //array_search — Searches the array for a given value and returns the first corresponding key if successful
            $key = array_search($sender, $usersArray);
            //in_array($sender,$usersArray)

            if($key !== false){
                $receiverKey = $key=1?2:1;
                $receiver = $usersArray[$receiverKey];
                //echo $usersArray[2];
                //$rez[] = $usersArray[2];
                $file_contents = file_get_contents($this::chat_folder.$chat_files[$i]);
                if(!empty($file_contents)){
                    $arr = json_decode($file_contents,"true");
                    $messages_cnt = count($arr['messages']);
                    if($messages_cnt>0){
                        $last_msg = $arr['messages'][$messages_cnt - 1];
                        //print_r($last_msg);
                        /*$chat['receiver'] = $receiver;
                        $chat['sender'] = $sender;
                        $chat['user_id'] = $last_msg['user_id'];
                        $chat['name'] = $last_msg['name'];
                        $chat['message'] = $last_msg['message'];
                        $chat['timed'] = $last_msg['timed'];*/
                        //$chat['last_msg'] = $last_msg;
                        $ls = json_decode($file_contents);
                        $ls_obj = $ls->last_seen;

                        //$ls_msg_id = $ls_obj->$sender;
                        //print_r($arr['last_seen']);

                        $last_seen_array = $arr['last_seen'];

                        //print_r($last_seen_array);

                        //echo "<br>";
                        $this_chat_unseen = 0;

                        if(array_key_exists($sender,$last_seen_array)===false){//means it's def a new message for this user. Means user hasn't opened this chat sef
                            //echo "fresh msg!".$sender;
                            $rez[] = $last_seen_array;
                            $this_chat_unseen = $messages_cnt;
                        }else{
                            //print_r($last_seen_array);
                            $user_last_seen = $last_seen_array[$sender];
                            //echo $user_last_seen."::".$messages_cnt;
                            if($messages_cnt > $user_last_seen){
                                $rez[] = $last_seen_array;
                                $this_chat_unseen = $messages_cnt - $user_last_seen;
                            }
                        }

                        $unseen = $unseen + $this_chat_unseen;

                        //echo "<br>";

                        //$rez[] = $chat;

                    }
                }
            }
        }

        $main_return['unseen'] = $unseen;
        $main_return['unseen_messages'] = $rez;
        //return $rez;
        return $main_return;
    }

    function getAllChatsWithOthers($data){
        $sender = $data['sender'];
        //$chat_files = scandir($this::chat_folder);
        $chat_files = array_diff(scandir($this::chat_folder), array('..', '.','assets'));
        //$files2 = scandir($dir, 1);

        $rez = array();
        for($i=0;$i<count($chat_files);$i++){
            $sep = explode(".",$chat_files[$i]);
            $usersArray = explode("-",$sep[0]);

            //print_r($sender); echo "<br><br>";

            $exists = false;

            //array_search — Searches the array for a given value and returns the first corresponding key if successful
            //$key = array_search($sender, $usersArray) || array_search("0", $usersArray);
            $key = array_search($sender, $usersArray);
            if($key !== false ){
                $exists = true;
            }

            //check if it's the admin chat
            if(!$exists){
                $key = array_search("0", $usersArray);
                if($key !== false){
                    $exists = true;
                }
            }


            if($exists){
                $receiverKey = $key==1?2:1;

                $receiver = $usersArray[$receiverKey];

                $file_contents = file_get_contents($this::chat_folder.$chat_files[$i]);
                if(!empty($file_contents)){
                    $arr = array();
                    $arr = json_decode($file_contents,"true");
                    $messages_cnt = count($arr['messages']);
                    //Let's get the last message id seen by the receiver...
                    $last_seen_obj = $arr['last_seen'];
                    $last_seen_msg_id_receiver = empty($last_seen_obj[$receiver])?0:$last_seen_obj[$receiver]; //if this user hasn't seen any message, return 0(instead of null)
                    $last_seen_msg_id_sender = empty($last_seen_obj[$sender])?0:$last_seen_obj[$sender]; //if this user hasn't seen any message, return 0(instead of null)

                   if($messages_cnt>0){
                       $last_msg = $arr['messages'][$messages_cnt - 1];
                       //print_r($last_msg);
                       $chat = array();

                       $chat['receiver'] = $receiver;
                       $chat['sender'] = $sender;

                       //Adjustments
                       //$chat['sender'] = $last_msg['user_id'];
                       //End

                       $chat['receiver_unseen_cnt'] = $messages_cnt - $last_seen_msg_id_receiver;
                       $chat['sender_unseen_cnt'] = $messages_cnt - $last_seen_msg_id_sender;
                       $chat['user_id'] = $last_msg['user_id'];
                       $chat['name'] = $last_msg['name'];
                       $chat['message'] = $last_msg['message'];
                       $chat['timed'] = $last_msg['timed'];
                       //$chat['last_msg'] = $last_msg;
                       $rez[] = $chat;

                   }
                }
            }
        }

        return $rez;

    }



}
