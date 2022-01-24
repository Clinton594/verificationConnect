<?php
require_once "PHPMailer.php";
require_once __DIR__ . '../../vendor/autoload.php';

use Twilio\Rest\Client;

class Messenger
{
  public $email;
  public $name;
  static $generic;
  public function __construct($generic)
  {
    self::$generic = $generic;
  }

  public function sendMail($post)
  {
    if (gettype($post) !== 'object') {
      $post = (object) $post;
    }

    if (isset($post->process_url)) { //Send online
      $response = curl_post($post);
    } else {
      $response = new stdClass;
      $Mail = new PHPMailer();
      $response->status = 1;

      $params = ['subject', 'body', 'from', 'to', 'from_name', 'to_name'];
      foreach ($params as $field) {
        if (!isset($post->{$field})) {
          return ("$field field is not defined for sending email parameters");
        }
      }
      $company = $this::$generic->company();
      $uridata = $this::$generic->getUriData();

      $company->site = $uridata->backend;
      $post    = object(array_merge((array)$company, (array)$post));
      unset($post->branches);
      // Required fields for various templates
      if (empty($post->template)) $post->template = "default";
      if ($post->template == "link" && empty($post->link)) return "Template requires a `link` field";
      if ($post->template == "token" && empty($post->token)) return "Template requires a `token` field";

      // Map templates to their files
      $maps = ["default" => "basic-content", "basic" => "basic-content", "token" => "kyc-tokens", "link" => "click-link", "success" => "kyc-approved", "notify" => "kyc-notification", "info" => "kyc-notification", "warning" => "kyc-pending", "letter" => "letter-format", "registeration" => "welcome"];
      if (!in_array($post->template, array_keys($maps))) return "Invalid template, use any of these template; (" . implode(", ", array_keys($maps)) . ")";

      $body = curl_post("{$uridata->backend}includes/email-template/{$maps[$post->template]}.php", $post);

      if (!in_array(self::$generic->getServer(), self::$generic->getLocalServers())) {
        $subject = ucwords($post->subject);
        if (empty($post->replyTo)) $post->replyTo = $post->from;
        $Mail->AddReplyTo($post->replyTo, "RE: $subject");
        $Mail->From     = $post->from;
        $Mail->FromName = $post->from_name;
        $Mail->Body = $body;
        $Mail->AltBody = $post->body;
        $Mail->Subject = $subject;
        $Mail->AddAddress($post->to);
        $Mail->WordWrap = 50;
        $Mail->IsHTML(true);
        if (!empty($post->copy_to)) {
          foreach ($post->copy_to as $key => $value) {
            $Mail->AddCC = $value;
          }
        }
        if (!$Mail->send()) {
          $response->status = 0;
          $response->message = 'Error Sending email to ' . $post->to;
        } else $response->message = 'Mail Sent';
      } else $response->message = 'Mail Sent';
      return ($response);
    }
  }







  public function sendSMS($post = [])
  {
    $params = ['message', 'phone'];
    if (gettype($post) !== 'object') {
      $post = (object) $post;
    }
    foreach ($params as $field) {
      if (!isset($post->{$field})) {
        return ("$field field is not defined for sending email parameters");
      }
    }

    // Your Account SID and Auth Token from twilio.com/console
    $twilio         = json_decode(json_encode($this::$generic::$twilio));
    $account_sid    = $twilio->ACCOUNT_SID;
    $auth_token     = $twilio->AUTH_TOKEN;
    if (empty($twilio->SMS_DEFAULT)) $twilio->SMS_DEFAULT = "PHONE";
    $twilio_phone   = $twilio->{$twilio->SMS_DEFAULT};
    // In production, these should be environment variables. E.g.:
    // $auth_token = $_ENV["TWILIO_ACCOUNT_SID"]

    // A Twilio number you own with SMS capabilities
    $client = new Client($account_sid, $auth_token);
    $response = new stdClass;
    try {
      $msg = $client->messages->create(
        $post->phone,
        array(
          'from' => $twilio_phone,
          'body' => $post->message,
          "statusCallback" => "http://postb.in/1234abcd"
        )
      );
      $response->status = 1;
      $response->message = "Message sent to {$post->phone}";
    } catch (\Exception $e) {
      $response->status = 0;
      $response->message = "An Error Occured";
      $response->data = $e->xdebug_message;
    }
    return $response;
  }

  public function verifyPhone($phone_number)
  {
    $response = new stdClass;
    $twilio = json_decode(json_encode($this::$generic::$twilio));
    $account_sid = $twilio->ACCOUNT_SID;
    $auth_token = $twilio->AUTH_TOKEN;
    $Twilion = new Client($account_sid, $auth_token);
    try {
      $response = $Twilion->verify->v2->services(
        $twilio->services->verify->SID
      )->verifications->create($phone_number, "sms");
      $response->message = $response->status;
      $response->status = 1;
    } catch (\Exception $e) {
      $response->status = 0;
      $response->message = "An Error Occured";
      $response->error = $e;
    }
    return ($response);
  }

  public function confirmToken($token, $phone_number)
  {
    $response = new stdClass;
    $twilio = json_decode(json_encode($this::$generic::$twilio));
    $account_sid = $twilio->ACCOUNT_SID;
    $auth_token = $twilio->AUTH_TOKEN;
    $Twilion = new Client($account_sid, $auth_token);
    try {
      $response = $Twilion->verify->v2->services(
        $twilio->services->verify->SID
      )->verificationChecks->create($token, ["to" => $phone_number]);
      $response->message = $response->status;
      $response->status = 1;
    } catch (\Exception $e) {
      $response->status = 0;
      $response->message = "An Error Occured";
      $response->error = $e;
    }
    return ($response);
  }





  // This function is used to send mail using curl
  public function sendGridMail($to, $username, $subject, $body)
  {
    global $company_main_email, $company_name, $mailKey;
    $ch = curl_init();
    $headers = array(
      'authorization: Bearer ' . $mailKey,
      'content-type: application/json'
    );
    $data = array(
      "personalizations" => array(array(
        "to" => array(
          array(
            "email" => $to,
            "name" => $username
          )
        ),
        "subject" => $subject
      )),
      "content" => array(array(
        "type" => "text/html",
        "value" => $body
      )),
      "from" => array(
        "email" => $company_main_email,
        "name" => $company_name
      ),
      "reply_to" => array(
        "email" => "no-reply@$company_name.com",
        "name" => $company_name
      )

    );

    curl_setopt($ch, CURLOPT_URL, "https://api.sendgrid.com/v3/mail/send");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $responce = curl_exec($ch);
    curl_close($ch);

    return $responce;
  }
}
