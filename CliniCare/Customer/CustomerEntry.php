<?php
session_start();
if (empty($_SESSION["csrf_token"])) {
    $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_POST["csrf_token"]) || !hash_equals($_SESSION["csrf_token"], $_POST["csrf_token"])) {
        die("Invalid CSRF token");
    }
    unset($_SESSION["csrf_token"]);
}


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load composer autoload if present
$autoload = __DIR__ . '/../../vendor/autoload.php';
if (file_exists($autoload)) {
  require_once $autoload;
}
require_once __DIR__ . '/../config/mail.php';

if (isset($_POST['signup'])) {
  signup($_POST['signup']);
} else if (isset($_POST['signin'])) {
  signin($_POST['signin']);
} else if (isset($_POST['signout'])) {
  signout($_POST['signout']);
} else if (isset($_POST['submit-reset'])) {
  $vkey = getVkey($_POST);
  mailReset($vkey);
  header("Location: ../Alerts/successFP.php");
  exit();
} else if (isset($_POST['reset-password'])) {
  resetPassword($_POST['reset-password']);
} else if (isset($_POST['update-profile'])) {
  updateProfile($_POST['update-profile']);
} else if (isset($_POST['update'])) {
  updateProfile($_POST['update-profile']);
} else if (isset($_POST['bookApp'])) {
  bookApp($_POST['bookApp']);
}

?>

<?php
function signup()
{
  include "db_conn.php";

  if (!$con) {
    echo "error";
  } else {
    //2. Construct SQL statement
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phoneNumber = $_POST['phoneNumber'];
    $icNumber = $_POST['icNumber'];
    $birthDate = $_POST['birthDate'];

    $password = password_hash($password, PASSWORD_DEFAULT);
    //Generate Vkey
    $vkey = md5(time() . $name);
    $stmt = $con->prepare("INSERT INTO customer (name, email, password, phoneNumber, icNumber, birthDate, address, image, vkey) VALUES (?, ?, ?, ?, ?, ?, '', '', ?)");
    if (!$stmt) {
      header("Location: ../Alerts/unsuccess.php");
      exit();
    }
    $stmt->bind_param('sssssss', $name, $email, $password, $phoneNumber, $icNumber, $birthDate, $vkey);
  }
  if ($stmt->execute()) {
    $mail = new PHPMailer(true);
    $subject = "Verify Your Email Address";
      $template = file_get_contents(__DIR__ . '/../../resources/views/email/verify_email.html');
      $msg = str_replace(['{{name}}', '{{vkey}}'], [$name, $vkey], $template);


    try {
      //Server settings
      $mail->SMTPDebug = false;
      $mail->isSMTP();
      $mail->Host       = $mailConfig['host'];
      $mail->SMTPAuth   = true;
      $mail->Username   = $mailConfig['user'];
      $mail->Password   = $mailConfig['pass'];
      $secure = strtolower($mailConfig['secure'] ?? 'ssl');
      $mail->SMTPSecure = ($secure === 'tls') ? PHPMailer::ENCRYPTION_STARTTLS : PHPMailer::ENCRYPTION_SMTPS;
      $mail->Port       = (int)($mailConfig['port'] ?? 465);

      //Recipients
      $from = $mailConfig['from'] ?: $mailConfig['user'];
      $fromName = $mailConfig['from_name'] ?? 'CliniCare';
      $mail->setFrom($from, $fromName);
      //$mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
      $mail->addAddress($email);               //Name is optional
      //$mail->addReplyTo('info@example.com', 'Information');
      //$mail->addCC('cc@example.com');
      //$mail->addBCC('bcc@example.com');

      //Attachments
      //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
      //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = $subject;
      $mail->Body    = $msg;
      //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $mail->send();


      $stmt2 = $con->prepare("INSERT INTO user (email, usertype) VALUES (?, 'customer')");
      $stmt2->bind_param('s', $email);
      if ($stmt2->execute()) {
        //kalau dah successful buat sign up, keluar page ni
        header("Location: ../Alerts/success.php");
      } else {
        header("Location: ../Alerts/unsuccess.php");
      }
    } catch (Exception $e) {
      echo "Message cannot be sent";
    }
  }
}


function signin()
{
  include "db_conn.php";

  $email = $_POST['email'];
  $password = $_POST['password'];
  $stmt = $con->prepare("SELECT * FROM customer WHERE email = ? LIMIT 1");
  $stmt->bind_param('s', $email);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result && $result->num_rows != 0) {
    //Process login
    $row = $result->fetch_assoc();
    $storedPwd = $row['password'];

    $passwordOk = false;
    if (password_verify($password, $storedPwd)) {
      // password verified
      $passwordOk = true;
    } else if (password_verify(md5($password), $storedPwd)) {
      // migrated hash based on md5, upgrade to direct hash
      $passwordOk = true;
      $newHash = password_hash($password, PASSWORD_DEFAULT);
      $stmtUp1 = $con->prepare("UPDATE customer SET password = ? WHERE email = ?");
      $stmtUp1->bind_param('ss', $newHash, $email);
      $stmtUp1->execute();
    } else if ($storedPwd === md5($password)) {
      // legacy md5 hash, upgrade to modern hash
      $passwordOk = true;
      $newHash = password_hash($password, PASSWORD_DEFAULT);
      $stmtUp2 = $con->prepare("UPDATE customer SET password = ? WHERE email = ?");
      $stmtUp2->bind_param('ss', $newHash, $email);
      $stmtUp2->execute();
    } else {
      //Invalid login
      header("Location: ../Alerts/unsuccessWRONG.php");
      return;
    }

    if (!$passwordOk && !password_verify($password, $storedPwd)) {
      header("Location: ../Alerts/unsuccessWRONG.php");
      return;
    }

    $verified = $row['verified'];
    $email = $row['email'];
    session_regenerate_id(true);
    $_SESSION['email'] = $email;

    if ($verified == 1) {
      $stmt3 = $con->prepare("SELECT usertype FROM user WHERE email = ?");
      $stmt3->bind_param('s', $email);
      $stmt3->execute();
      $result3 = $stmt3->get_result();

      if ($result3->num_rows != 0) {

        $row3 = $result3->fetch_assoc();
        $usertype = $row3['usertype'];
        $_SESSION['usertype'] = $usertype;

        if ($usertype == "customer") {
          header("Location: ../Customer/CustomerHomePage/index.php");
          exit();
        } else {
          header("Location: ../AdminPage/dist/index.php");
          exit();
        }
      }
      //Continue

    } else {
      header("Location: ../Alerts/unsuccessNVER.php");
      exit();
    }
  } else {
    //Invalid login
    header("Location: ../Alerts/unsuccessWRONG.php");
    exit();
  }
}

function signout()
{
  session_destroy();
  header("Location: ../index.php");
}

function getVkey()
{
  include "db_conn.php";

  if (!$con) {
    echo "No connection";
  } else {
    //Construct SQL statement
    $email = $_POST['email'];
    $stmt = $con->prepare("SELECT vkey FROM customer WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $qry = $stmt->get_result();
    $count = $qry ? mysqli_num_rows($qry) : 0;
    if ($count == 1) {
      $userRecord = mysqli_fetch_assoc($qry);
      $_SESSION['resetPassword'] = $email;
      return $userRecord['vkey'];
    } else {
      header("Location: ../Alerts/unsuccessFP.php");
      exit();
    }
  }
}

function mailReset()
{
  include "db_conn.php";


  $email = $_SESSION['resetPassword'];
  $stmt = $con->prepare("SELECT * FROM customer WHERE email = ?");
  $stmt->bind_param('s', $email);
  $stmt->execute();
  $query = $stmt->get_result();
  $row = mysqli_fetch_array($query);

  $vkey = getVkey($_POST);
  $mail = new PHPMailer(true);
  $subject = "Reset Your Password";

  $msg = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
        <head>
        <!--[if gte mso 9]>
        <xml>
          <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
          </o:OfficeDocumentSettings>
        </xml>
        <![endif]-->
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta name="x-apple-disable-message-reformatting">
          <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge"><!--<![endif]-->
          <title></title>
          
            <style type="text/css">
              table, td { color: #000000; } a { color: #0000ee; text-decoration: underline; }
        @media only screen and (min-width: 620px) {
          .u-row {
            width: 600px !important;
          }
          .u-row .u-col {
            vertical-align: top;
          }
        
          .u-row .u-col-100 {
            width: 600px !important;
          }
        
        }
        @media (max-width: 620px) {
          .u-row-container {
            max-width: 100% !important;
            padding-left: 0px !important;
            padding-right: 0px !important;
          }
          .u-row .u-col {
            min-width: 320px !important;
            max-width: 100% !important;
            display: block !important;
          }
          .u-row {
            width: calc(100% - 40px) !important;
          }
          .u-col {
            width: 100% !important;
          }
          .u-col > div {
            margin: 0 auto;
          }
        }
        body {
          margin: 0;
          padding: 0;
        }
        
        table,
        tr,
        td {
          vertical-align: top;
          border-collapse: collapse;
        }
        
        p {
          margin: 0;
        }
        
        .ie-container table,
        .mso-container table {
          table-layout: fixed;
        }
        
        * {
          line-height: inherit;
        }
        
        a[x-apple-data-detectors=true] {
          color: inherit !important;
          text-decoration: none !important;
        }
        
        </style>

        <!--[if !mso]><!--><link href="https://fonts.googleapis.com/css?family=Cabin:400,700&display=swap" rel="stylesheet" type="text/css"><!--<![endif]-->
        
        </head>
        
        <body class="clean-body u_body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #f9f9f9;color: #000000">
          <!--[if IE]><div class="ie-container"><![endif]-->
          <!--[if mso]><div class="mso-container"><![endif]-->
          <table style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #f9f9f9;width:100%" cellpadding="0" cellspacing="0">
          <tbody>
          <tr style="vertical-align: top">
            <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #f9f9f9;"><![endif]-->
            
        <div class="u-row-container" style="padding: 0px;background-color: transparent">
          <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
              <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: transparent;"><![endif]-->
              
        <!--[if (mso)|(IE)]><td align="center" width="600" style="width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
        <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
          <div style="width: 100% !important;">
          <!--[if (!mso)&(!IE)]><!--><div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->
          
          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
          </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
              <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
            </div>
          </div>
        </div>

        <div class="u-row-container" style="padding: 0px;background-color: transparent">
          <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #;">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
              <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #1977cc;"><![endif]-->
              
        <!--[if (mso)|(IE)]><td align="center" width="600" style="width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
        <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
          <div style="width: 100% !important;">
          <!--[if (!mso)&(!IE)]><!--><div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->
          
          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
          </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
              <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
            </div>
          </div>
        </div>
 
        <div class="u-row-container" style="padding: 0px;background-color: transparent">
          <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
              <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #ffffff;"><![endif]-->
              
        <!--[if (mso)|(IE)]><td align="center" width="600" style="width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
        <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
          <div style="width: 100% !important;">
          <!--[if (!mso)&(!IE)]><!--><div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->
          
        <table style="font-family:Cabin,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td style="overflow-wrap:break-word;word-break:break-word;padding:20px;font-family:Cabin,sans-serif;" align="left">
                
        <table width="100%" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <td style="padding-right: 0px;padding-left: 0px;" align="center">
              
              <img align="center" border="0" src="https://i.imgur.com/KGGAQuG.png" alt="Image" title="Image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 32%;max-width: 179.2px;" width="179.2"/>
              
            </td>
          </tr>
        </table>
        
              </td>
            </tr>
          </tbody>
        </table>
        
          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
          </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
              <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
            </div>
          </div>
        </div>

        <div class="u-row-container" style="padding: 0px;background-color: transparent">
          <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
              <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #ffffff;"><![endif]-->
              
        <!--[if (mso)|(IE)]><td align="center" width="600" style="width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
        <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
          <div style="width: 100% !important;">
          <!--[if (!mso)&(!IE)]><!--><div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->
          
        <table style="font-family:Cabin,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td style="overflow-wrap:break-word;word-break:break-word;padding:33px 55px;font-family:Cabin,sans-serif;" align="left">
                
          <div style="line-height: 160%; text-align: center; word-wrap: break-word;">
            <p style="font-size: 14px; line-height: 160%;"><span style="font-size: 22px; line-height: 35.2px;">Hi, ' . $row['name'] . ' </span></p>
        <p style="font-size: 14px; line-height: 160%;">We have received your request to reset your password. Please click on the button below to set up a new password.</span></p>
          </div>
        
              </td>
            </tr>
          </tbody>
        </table>
        
        <table style="font-family:Cabin,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:Cabin,sans-serif;" align="left">
                
        <div align="center">
          <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;font-family:Cabin,sans-serif;"><tr><td style="font-family:Cabin,sans-serif;" align="center"><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="" style="height:46px; v-text-anchor:middle; width:234px;" arcsize="8.5%" stroke="f" fillcolor="#1977cc"><w:anchorlock/><center style="color:#FFFFFF;font-family:Cabin,sans-serif;"><![endif]-->
            <a href="https://clinicaremy.com/Customer/Sign In Page/Sign In/resetPassword.php?vkey=' . $vkey . '" style="box-sizing: border-box;display: inline-block;font-family:Cabin,sans-serif;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #FFFFFF; background-color: #1977cc; border-radius: 4px;-webkit-border-radius: 4px; -moz-border-radius: 4px; width:auto; max-width:100%; overflow-wrap: break-word; word-break: break-word; word-wrap:break-word; mso-border-alt: none;">
              <span style="display:block;padding:14px 44px 13px;line-height:120%;"><span style="font-size: 16px; line-height: 19.2px;"><strong><span style="line-height: 19.2px; font-size: 16px;">RESET YOUR PASSWORD</span></strong></span></span>
            </a>
          <!--[if mso]></center></v:roundrect></td></tr></table><![endif]-->
        </div>
        
              </td>
            </tr>
          </tbody>
        </table>
        
          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
          </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
              <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
            </div>
          </div>
        </div>

        <div class="u-row-container" style="padding: 0px;background-color: transparent">
          <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
              <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #1977cc;"><![endif]-->
              
        <!--[if (mso)|(IE)]><td align="center" width="600" style="width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
        <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
          <div style="width: 100% !important;">
          <!--[if (!mso)&(!IE)]><!--><div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->
          
        <table style="font-family:Cabin,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:Cabin,sans-serif;" align="left">
                
              </td>
            </tr>
          </tbody>
        </table>
        
          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
          </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
              <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
            </div>
          </div>
        </div>
        
            <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
            </td>
          </tr>
          </tbody>
          </table>
          <!--[if mso]></div><![endif]-->
          <!--[if IE]></div><![endif]-->
        </body>
        
        </html>';

  try {
    //Server settings and recipients configured below

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
  $mail->isSMTP();
  $mail->Host       = $mailConfig['host'];
  $mail->SMTPAuth   = true;
  $mail->Username   = $mailConfig['user'];
  $mail->Password   = $mailConfig['pass'];
  $secure = strtolower($mailConfig['secure'] ?? 'ssl');
  $mail->SMTPSecure = ($secure === 'tls') ? PHPMailer::ENCRYPTION_STARTTLS : PHPMailer::ENCRYPTION_SMTPS;
  $mail->Port       = (int)($mailConfig['port'] ?? 465);
  $from = $mailConfig['from'] ?: $mailConfig['user'];
  $fromName = $mailConfig['from_name'] ?? 'CliniCare';
  $mail->setFrom($from, $fromName);
  $mail->addAddress($email);
  $mail->isHTML(true);
  $mail->Subject = $subject;
  $mail->Body    = $msg;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}

function resetPassword()
{
  $vkey = $_SESSION['resetVkey'];

  $pwd = $_POST['pwd'];
  $pwdR = $_POST['pwd-repeat'];

  if (strlen($pwd) < 2 || strlen($pwdR) < 2) {
    header("Location: ../index.php");
    exit();
  } else if ($pwd == $pwdR) {

    $pwd = password_hash($pwd, PASSWORD_DEFAULT);
    include "db_conn.php";

    if (!$con) {
      echo "error";
    } else {
      //update customer set password = '$pwd' where vkey = '$vkey'
      $sql = "update customer set password = '$pwd' where vkey = '$vkey'";

      if ($con->query($sql) == TRUE) {
        unset($_SESSION['resetVkey']);
        unset($_SESSION['resetPassword']);
        header("Location: ../Alerts/successRS.php");
        exit();
      } else {
        //echo mysqli_error($con);
        echo "error";
        exit();
      }
    }
  } else {
    header("Location: ../Alerts/unsuccessRS.php");
    exit();
  }
}

function updateProfile()
{
  include "db_conn.php";

  if (!$con) {
    echo "Error";
  } else {

    $email = $_SESSION['email'];

    $name = $_POST['name'];
    $phoneNumber = $_POST['phoneNumber'];
    $icNumber = $_POST['icNumber'];
    $birthDate = $_POST['birthDate'];
    $address = $_POST['address'];

    $sql = "UPDATE customer SET name = '$name', address = '$address', phoneNumber = '$phoneNumber',
             icNumber = '$icNumber', birthDate = '$birthDate' WHERE email = '$email'";

    if ($con->query($sql) === TRUE) {
      header("Location: ../Customer/Index Pages/Profile/myProfile.php");
    } else {
      echo "error";
    }
  }
}

function bookApp()
{
  include "db_conn.php";

  if (!$con) {
    echo "Error";
  } else {
    $email = $_SESSION['email'];

    $name = $_POST['name'];
    $phoneNumber = $_POST['phoneNumber'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $dateToday = date("Y-m-d");

    //check if date is past today
    if ($date < $dateToday) {
      // show script popup message for date is past today and redirect to AppointmentSlot.php
      echo "<script>alert('Date is past today');
      window.location.href='../Customer/Index Pages/Appointment/AppointmentSlot.php';</script>";

      //update table appointmentslot set status = 1
      $stmt = $con->prepare("UPDATE appointmentslot SET status = 1 WHERE date = ?");
      $stmt->bind_param('s', $date);
      $stmt->execute();
      exit();
    } else {
      $stmtIns = $con->prepare("INSERT INTO appointment (email, name, phoneNumber, date, time) VALUES (?, ?, ?, ?, ?)");
      $stmtIns->bind_param('sssss', $email, $name, $phoneNumber, $date, $time);

      if ($stmtIns->execute()) {
        //update table appointmentslot set status minus 1
        $stmt2 = $con->prepare("UPDATE appointmentslot SET count = count - 1 WHERE date = ? AND time = ?");
        $stmt2->bind_param('ss', $date, $time);
        $stmt2->execute();
        header("Location: ../Customer/Index Pages/History/myHistory.php");
      } else {
        echo "error";
      }
    }
  }
}

?>

