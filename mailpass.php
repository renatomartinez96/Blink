<?php
include_once 'assets/includes/db_conexion.php';
if (isset($_POST['email'])) 
{
    $stmt = $mysqli->prepare("SELECT correo, usuario FROM usuarios_tb WHERE correo = ?");
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute(); 
    $stmt->store_result();
    $stmt->bind_result($mail, $usuario);
    $stmt->fetch();
    if ($stmt->num_rows == 1){
        $token = md5(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 15).$usuario);
        $stmt1 = $mysqli->prepare("UPDATE usuarios_tb SET token = ? WHERE usuario = ?");
        $stmt1->bind_param('ss', $token, $usuario);
        if($stmt1->execute()){
            //SMTP needs accurate times, and the PHP time zone MUST be set
            //This should be done in your php.ini, but this is how to do it if you don't have access to that
            date_default_timezone_set('Etc/UTC');

            require 'assets/includes/phpmailer/PHPMailerAutoload.php';

            //Create a new PHPMailer instance
            $mail = new PHPMailer;

            //Tell PHPMailer to use SMTP
            $mail->isSMTP();

            //Enable SMTP debugging
            // 0 = off (for production use)
            // 1 = client messages
            // 2 = client and server messages
            $mail->SMTPDebug = 2;

            //Ask for HTML-friendly debug output
            $mail->Debugoutput = 'html';

            //Set the hostname of the mail server
            $mail->Host = 'a2plcpnl0093.prod.iad2.secureserver.net';

            //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
            $mail->Port = 465;

            //Set the encryption system to use - ssl (deprecated) or tls
            $mail->SMTPSecure = 'tls';

            //Whether to use SMTP authentication
            $mail->SMTPAuth = true;

            //Username to use for SMTP authentication - use full email address for gmail
            $mail->Username = "no-reply@the-box.link";

            //Password to use for SMTP authentication
            $mail->Password = "5Zer%~2+Ew??";

            //Set who the message is to be sent from
            $mail->setFrom('no-reply@the-box.link', 'Box-Link Staff');

            //Set an alternative reply-to address
            $mail->addReplyTo('staff@the-box.link', 'Box-Link Staff');

            //Set who the message is to be sent to
            $mail->addAddress($mail, $name.' '.$last);

            //Set the subject line
            $mail->Subject = 'Reestablecer contraseña';

            //Read an HTML message body from an external file, convert referenced images to embedded,
            //convert HTML into a basic plain-text alternative body
            $mail->msgHTML("
                <h1>Perfecto!</h1>
                <h3>Ya casi hemos terminado el proceso de cambio de contraseña.</h3>
                <p><a href='http://the-box.link/?t=".$token."'>Para reestablecer tu contraseña haz clic aqui</a></p>
            ");
            if($mail->send())
            {
                echo "Box Link have sent you an email. Please verifay your inbox at <strong>".$mail."</strong>.";
            }
            // Execute the prepared query.
            if (!$insert_stmt->execute()) {
                header('Location: ../error.php?err=Registration failure: INSERT');
            }
            
        }
    }else{
        echo "Email not found. Please try again or register at Box Link";
    }
}
?>