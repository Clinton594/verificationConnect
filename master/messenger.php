<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
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


    $response = new stdClass;
    $Mail = new PHPMailer(true);
    $response->status = 1;

    $params = ['subject', 'body', 'from', 'to', 'from_name', 'to_name'];
    foreach ($params as $field) {
      if (!isset($post->{$field})) {
        return ("$field field is not defined for sending email parameters");
      }
    }
    $uridata = $this::$generic->getUriData();
    $body = '<center style="width: 100%; background-color: #f5f6fa;">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#f5f6fa">
          <tr>
            <td style="padding: 40px 0;">
              <table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;">
                <tbody>
                  <tr>
                    <td style="text-align:center;padding: 50px 30px;">
                      <h2 style="font-size: 18px; color: #1ee0ac; font-weight: 400; margin-bottom: 8px;">' . $post->subject . '</h2>
                      <p>' . $post->body . '</p>
                    </td>
                  </tr>
                </tbody>
              </table>
              <table style="width:100%;max-width:620px;margin:0 auto;">
                <tbody>
                  <tr>
                    <td style="text-align: center; padding:25px 20px 0;">
                      <p style="font-size: 13px;">Copyright © ' . date("Y") . ' ' . $this::$generic->name . '. All rights reserved.</p>
                      <p style="padding-top: 15px; font-size: 12px;">This email was sent to you, ' . $post->to_name . ' by ' . $post->from_name . '</p>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </table>
      </center>';
    if ($this::$generic->isLocalhost()) {
      $subject = ucwords($post->subject);
      if (empty($post->replyTo)) $post->replyTo = $post->from;

      //Server settings
      $Mail->SMTPDebug = 2;                      //Enable verbose debug output
      $Mail->isSMTP();                                            //Send using SMTP
      $Mail->Host       = 'mail.smartdapps.site';                     //Set the SMTP server to send through
      $Mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $Mail->Username   = 'notification@smartdapps.site';                     //SMTP username
      $Mail->Password   = 'Smartdapps@2022?';                               //SMTP password
      $Mail->SMTPSecure = "mail";            //Enable implicit TLS encryption
      $Mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $Mail->setFrom($post->from, $post->from_name);
      $Mail->addAddress($post->to, $post->to_name);     //Add a recipient
      $Mail->addReplyTo($post->replyTo, "RE: $subject");
      // $Mail->addCC('cc@example.com');
      // $Mail->addBCC('bcc@example.com');

      //Attachments
      // $Mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
      // $Mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

      //Content
      $Mail->isHTML(true);                                  //Set email format to HTML
      $Mail->Subject = $subject;
      $Mail->Body    = $body;
      $Mail->AltBody = $post->body;

      if (!empty($post->copy_to)) {
        foreach ($post->copy_to as $value) {
          $Mail->addAddress($value);
        }
      }
      try {
        $Mail->send();
        $response->message = 'Mail Sent';
      } catch (Error $error) {
        $response->status = 0;
        $response->message = 'Error Sending email to ' . $post->to;
        $response->error = $error;
      }
    } else $response->message = 'Mail Sent';
    return ($response);
  }
}
