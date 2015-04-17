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
            date_default_timezone_set('Etc/UTC');
            include_once 'assets/includes/phpmailer/PHPMailerAutoload.php';
            $mail = new PHPMailer(true);
            $mail->IsSMTP();
            try {
              $mail->Host       = "a2plcpnl0093.prod.iad2.secureserver.net"; 
              $mail->SMTPDebug  = 2;                    
              $mail->SMTPAuth   = true;               
              $mail->Host       = "a2plcpnl0093.prod.iad2.secureserver.net";
              $mail->Port       = 465;              
              $mail->Username   = "no-reply@the-box.link"; 
              $mail->Password   = "5Zer%~2+Ew??";  
              $mail->SetFrom('no-reply@the-box.link', 'Box Link(Do not reply)');
              $mail->AddReplyTo('staff@the-box.link', 'Box Link Staff');
              $mail->AddAddress($_POST['email'], $usuario);
              $mail->Subject = 'PHPMailer Test Subject via mail(), advanced';
              $mail->msgHTML("
                <h1>ENHORABUENA!</h1>
                <h3>Te has registrado exitosamente en nuestra plataforma. Para empezar a recibir todos los beneficios que Blink ofrece, es necesario que actives tu cuenta.</h3>
                <p>Inicia sesion e introduce el siguiente codigo</p>
                <p>$token</p>
              "); 
              if($mail->send())
              {
                echo "Box Link have sent you an email. Please verifay your inbox at <strong>".$mail."</strong>.";
              }
              else
              {
                echo "no se pudo enviar el correo";
              }
            } catch (phpmailerException $e) {
              echo $e->errorMessage(); 
            } catch (Exception $e) {
              echo $e->getMessage(); 
            }
            
        }
    }else{
        echo "Email not found. Please try again or register at Box Link";
    }
}
?>