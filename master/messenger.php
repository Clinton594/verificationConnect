<?php
require_once "phpMailer.php";
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
    $Mail = new PHPMailer();
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
    if (!$this::$generic->isLocalhost()) {
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
