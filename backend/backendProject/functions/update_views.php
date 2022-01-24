<?php
    function increaseViews($file, $id = 20){
        //$file should be one of the sub folder name inside the views 
        $m_file = "cache/views/".$file."/".$id.".json";
        if(file_exists($m_file)){
            $json = json_decode(_readFile($m_file), true);
            if(isset($json)){
                $json = $json + 1;
            }else{
                $json = 1;
            }
        }else{
            $json = 1;
        }
        _writeFile($m_file, $json);
    }


    switch ($type) {
        case 1000: //auto views update

        $dir = '../cache/views/viewed_jobs/';//die('halt');
        $a = scandir($dir);

        foreach($a as $b){
            if($b == '.' || $b == '..') continue;
            $f = explode('.',$b);
            $json[$f[0]] = _readFile($dir.$b);
        }

        foreach($json as $key => $value):
            $query = $db->query("UPDATE sub_jobs SET no_of_views = $value WHERE id = $key ");
            if(!$query) die('sorry');
            echo ("Database Update made");
        endforeach;
        // print_r($row);
        break;
    }
?>