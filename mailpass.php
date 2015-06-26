<?php
include_once 'assets/includes/db_conexion.php';
require_once('assets/includes/phpmailer/PHPMailerAutoload.php');
require_once('assets/includes/phpmailer/class.phpmailer.php');
require_once("assets/includes/phpmailer/class.smtp.php");
if (isset($_POST['email']))
{
    $stmt = $mysqli->prepare("SELECT correo, usuario, nombres, apellidos FROM usuarios_tb WHERE correo = ?");
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($mail, $usuario, $name, $last);
    $stmt->fetch();
    if ($stmt->num_rows == 1){
        $token = md5(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 15).$usuario);
        $stmt1 = $mysqli->prepare("UPDATE usuarios_tb SET token = ? WHERE usuario = ?");
        $stmt1->bind_param('ss', $token, $usuario);
        if($stmt1->execute()){
            $mail = new PHPMailer(true);
            $mail -> charSet = "UTF-8";
            $mail->IsSMTP();
            $mail->SMTPAuth   = true;
            $mail->Host       = "mail.the-box.link";
            $mail->Port       = 25;
            $mail->Username   = "no-reply@the-box.link";
            $mail->Password   = "5Zer%~2+Ew??";
            $mail->AddReplyTo('staff@the-box.link', 'Box Link Staff');
            $mail->AddAddress($_POST['email'],$name);
            $mail->SetFrom('no-reply@the-box.link', 'Box Link');
            $mail->Subject = "Box Link - Restablecer contraseña";
            $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
            $foto= "http://the-box.link/assets/img/restablecer.png";
            $mensaje="<a href='http://the-box.link?t=".$token."'><img src='". $foto ."' style='width:100%;'>";
            $mail->Body = $mensaje;
            $mail->Send();
            echo "Box Link have sent you an email. Please verify your inbox at <strong>".$mail."</strong>."; 
        }
    }else{
        echo "Email not found. Please try again or register at Box Link";
    }
}
?>
