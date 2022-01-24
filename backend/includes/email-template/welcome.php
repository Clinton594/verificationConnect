<?php
require_once __DIR__.'../../../functions/generic_functions.php';
$post = object(array_merge($_POST, $_GET));
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <title><?=$post->subject?></title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,600" rel="stylesheet" type="text/css">
    <style>
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
            font-family: 'Roboto', sans-serif !important;
            font-size: 14px;
            margin-bottom: 10px;
            line-height: 24px;
            color:#8094ae;
            font-weight: 400;
        }
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            margin: 0;
            padding: 0;
        }
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }
        table table table {
            table-layout: auto;
        }
        a {
            text-decoration: none;
        }
        img {
            -ms-interpolation-mode:bicubic;
        }
    </style>

</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f5f6fa;">
	<center style="width: 100%; background-color: #f5f6fa;">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#f5f6fa">
            <tr>
               <td style="padding: 40px 0;">
                 <?php require_once("header.php"); ?>
                  <table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;">
                    <tbody>
                      <tr>
                        <td>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                              <tr>
                                <td style="width: 100%;font-size:14px;line-height:30px;padding:20px 0;color:#666"><span class="il">Welcome</span> to <?=$post->from_name?>!<br>
                                  Dear <?=$post->to_name?>, We are more than happy to recieve you in our team. Please read the following carefully. Also make sure your email address is confirmed.
                                </td>
                              </tr>
                              <tr>
                                <td style="width: 100%;font-size:12px;line-height:25px;padding:20px 0 10px 0;color:#666;font-weight:bolder">
                                  <span style="font-size:14px;color:red">Security Tips:</span><br>
                                  * DO NOT give your password to anyone!<br>
                                  * DO NOT call any phone number for someone claiming to be <?=$post->from_name?> Support!<br>
                                  * DO NOT send any money to anyone claiming to be a member of <?=$post->from_name?>!<br>
                                  * Enable Google Two Factor Authentication!<br>
                                  * Make sure you are visiting "<a href="<?=$post->site?>" target="_blank"><?=$post->website?></a>"!<br>
                                  </td><td>
                                  </td>
                                </tr>
                              <tr>
                                <td style="width: 100%;padding:20px 0 0 0;line-height:26px;color:#666">If this activity is not your own operation, please contact our official customer representative by the following link: <a style="color:#e9b434" href="<?=$post->site?>contact" target="_blank" ><?=$post->site?>contact</td>
                              </tr>
                              <tr>
                                <td style="width: 100%;padding:30px 0 15px 0;font-size:12px;color:#999;line-height:20px"><?=$post->from_name?> Team<br>Automated message.please do not reply</td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <?php require_once("footer.php"); ?>
               </td>
            </tr>
        </table>
    </center>
</body>
</html>
