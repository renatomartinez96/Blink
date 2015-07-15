<?php
include_once 'db_conexion.php';
include_once 'psl-config.php';

$error_msg = "";

if (isset($_POST['username'], $_POST['email'], $_POST['p'], $_POST['name'], $_POST['last'], $_POST['datenac'], $_POST['confirmpwd'], $_POST['password'], $_POST['lang'], $_POST['tipo'], $_POST['gender'])) {
    // Sanitize and validate the data passed in
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $last = filter_input(INPUT_POST, 'last', FILTER_SANITIZE_STRING);
    $date = filter_input(INPUT_POST, 'datenac', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $gender = "";
    if($_POST["gender"] == 3)
    {
        $gender =  "f";
    }
    elseif($_POST["gender"] == 2)
    {
        $gender =  "m";
    }
    else
    {
        $gender =  "m";
    }
    
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if ($_POST['confirmpwd'] == $_POST['password']) {
        $password = $_POST['password'];
    }
    if($_POST['tipo'] == 1)
    {
        $tipo = 3;
    }
    elseif($_POST['tipo'] == 2)
    {
        $tipo = 2;
    }
    else
    {
        $tipo = 3;
    }
    $idioma =  $_POST['lang'];
    $estado = '0';
    $log = '0';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Not a valid email
        $error_msg .= '<p class="error">The email address you entered is not valid</p>';
    }

    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    if (strlen($password) != 128) {
        // The hashed pwd should be 128 characters long.
        // If it's not, something really odd has happened
        $error_msg .= '<p class="error">Invalid password configuration.</p>';
    }

    // Username validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //

    $prep_stmt = "SELECT idusuario FROM usuarios_tb WHERE correo = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);

   // check existing email
    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            // A user with this email address already exists
            $error_msg .= '<p class="error">A user with this email address already exists.</p>';
            $stmt->close();
        }
    } else {
        $error_msg .= '<p class="error">Database error Line 39</p>';
                $stmt->close();
    }

    // check existing username
    $prep_stmt = "SELECT idusuario FROM usuarios_tb WHERE usuario = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);

    if ($stmt) {
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();

                if ($stmt->num_rows == 1) {
                        // A user with this username already exists
                        $error_msg .= '<p class="error">A user with this username already exists</p>';
                        $stmt->close();
                }
                $stmt->close();
        } else {
                $error_msg .= '<p class="error">Database error line 55</p>';
                $stmt->close();
        }

    // TODO:
    // We'll also have to account for the situation where the user doesn't have
    // rights to do registration, by checking what type of user is attempting to
    // perform the operation.

    if (empty($error_msg)) {
        // Create a random salt
        //$random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE)); // Did not work
        $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));

        // Create salted password
        $password = hash('sha512', $password . $random_salt);

        // Insert the new user into the database
        if ($insert_stmt = $mysqli->prepare("INSERT INTO usuarios_tb (nombres, apellidos, nacimiento, usuario, correo, contra, estado, token, tipo, salt, log, lang, genero) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) {
            $token = md5(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 15).$username);
            $insert_stmt->bind_param('sssssssssssss',$name, $last, $date, $username, $email, $password, $estado, $token, $tipo, $random_salt, $log, $idioma, $gender);

            require_once('phpmailer/PHPMailerAutoload.php');
            require_once('phpmailer/class.phpmailer.php');
            require_once("phpmailer/class.smtp.php");
            $mail = new PHPMailer(true);
            $mail -> charSet = "UTF-8";
            $mail->IsSMTP();
            $mail->SMTPAuth   = true;
            $mail->Host       = "mail.the-box.link";
            $mail->Port       = 25;
            $mail->Username   = "no-reply@the-box.link";
            $mail->Password   = "5Zer%~2+Ew??";
            $mail->AddReplyTo('staff@the-box.link', 'Box Link Staff');
            $mail->AddAddress($email,$name);
            $mail->SetFrom('no-reply@the-box.link', 'Box Link');
            $mail->Subject = "Box Link - Activación de cuenta";
            $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
            $mensaje="Para activar tu cuenta necesitas copiar el siguiente codigo" . $token . " e iniciar sesión";
            $mail->Body = $mensaje;
            $mail->Send();
            // Execute the prepared query.
            if (!$insert_stmt->execute()) {
                header('Location: ../error.php?err=Registration failure: INSERT');
            }



        }
        echo "<script></script>";
        header('Location: ./index.php');

    }
}
?>
