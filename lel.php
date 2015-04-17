<?php
require_once('assets/includes/phpmailer/PHPMailerAutoload.php');
require_once('assets/includes/phpmailer/class.phpmailer.php');
require_once("assets/includes/phpmailer/class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "mail.the-box.link"; // SMTP server
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "mail.the-box.link"; // sets the SMTP server
$mail->Port       = 25;                    // set the SMTP port for the GMAIL server
$mail->Username   = "no-reply@the-box.link"; // SMTP account username
$mail->Password   = "5Zer%~2+Ew??";        // SMTP account password
$mail->AddReplyTo('staff@the-box.link', 'Box Link Staff');
$mail->AddAddress("gerardo.antonio97@gmail.com", "gerardo");
$mail->SetFrom('no-reply@the-box.link', 'Box Link(Do not reply)');
$mail->Subject = 'Box Link - Restablecer contraseña';
$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
$foto= "http://the-box.link/assets/img/restablecer.png";
$mensaje='<a href="http://the-box.link"><img src="'. $foto .'">';
$mail->Body = $mensaje;
$mail -> charSet = "UTF-8";
if($mail->Send())
{
  echo "Message Sent OK<p></p>\n";  
}
else
{
  echo "Message NOT Sent<p></p>\n";
}



    
?>
