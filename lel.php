<?php
require 'assets/includes/phpmailer/class.phpmailer.php';
require 'assets/includes/phpmailer/class.smtp.php';
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug  = 2;                    
$mail->SMTPAuth   = true;               
$mail->Host       = "a2plcpnl0093.prod.iad2.secureserver.net";
$mail->Port       = 465;              
$mail->Username   = "no-reply@the-box.link"; 
$mail->Password   = "5Zer%~2+Ew??";  
$mail->SetFrom('no-reply@the-box.link', 'Box Link(Do not reply)');
$mail->AddReplyTo('staff@the-box.link', 'Box Link Staff');
$mail->AddAddress("gerardo.antonio97@gmail.com", "gerardo");
$mail->Subject = 'PHPMailer Test Subject via mail(), advanced';
$mail->msgHTML("
<h1>ENHORABUENA!</h1>
<h3>Te has registrado exitosamente en nuestra plataforma. Para empezar a recibir todos los beneficios que Blink ofrece, es necesario que actives tu cuenta.</h3>
<p>Inicia sesion e introduce el siguiente codigo</p>
<p>$token</p>
"); 
$mail->send();
