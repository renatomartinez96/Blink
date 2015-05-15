<?php
include_once 'db_conexion.php';
include_once 'psl-config.php';
 
$error_msg = "";
 
if (isset($_POST['username'], $_POST['email'], $_POST['p'], $_POST['name'], $_POST['last'], $_POST['datenac'], $_POST['confirmpwd'], $_POST['password'])) {
    // Sanitize and validate the data passed in
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $last = filter_input(INPUT_POST, 'last', FILTER_SANITIZE_STRING);
    $date = filter_input(INPUT_POST, 'datenac', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if ($_POST['confirmpwd'] == $_POST['password']) {
        $password = $_POST['password'];
    }
    $tipo = '3';
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
        if ($insert_stmt = $mysqli->prepare("INSERT INTO usuarios_tb (nombres, apellidos, nacimiento, usuario, correo, contra, estado, token, tipo, salt, log) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) {
            $token = md5(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 15).$username);
            $insert_stmt->bind_param('sssssssssss',$name, $last, $date, $username, $email, $password, $estado, $token, $tipo, $random_salt, $log);
            
            /**
             * This example shows settings to use when sending via Google's Gmail servers.
             */

            //SMTP needs accurate times, and the PHP time zone MUST be set
            //This should be done in your php.ini, but this is how to do it if you don't have access to that
            date_default_timezone_set('Etc/UTC');

            require 'phpmailer/PHPMailerAutoload.php';

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
            $mail->Host = 'smtp.gmail.com';

            //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
            $mail->Port = 587;

            //Set the encryption system to use - ssl (deprecated) or tls
            $mail->SMTPSecure = 'tls';

            //Whether to use SMTP authentication
            $mail->SMTPAuth = true;

            //Username to use for SMTP authentication - use full email address for gmail
            $mail->Username = "blink.project2015@gmail.com";

            //Password to use for SMTP authentication
            $mail->Password = "blink2015";

            //Set who the message is to be sent from
            $mail->setFrom('blink.project2015@gmail.com', 'Blink Project');

            //Set an alternative reply-to address
            $mail->addReplyTo('blink.project2015@gmail.com', 'Blink Project');

            //Set who the message is to be sent to
            $mail->addAddress($email, $name.' '.$last);

            //Set the subject line
            $mail->Subject = 'Activacion de cuenta';

            //Read an HTML message body from an external file, convert referenced images to embedded,
            //convert HTML into a basic plain-text alternative body
            $mail->msgHTML("
                <h1>ENHORABUENA!</h1>
                <h3>Te has registrado exitosamente en nuestra plataforma. Para empezar a recibir todos los beneficios que Blink ofrece, es necesario que actives tu cuenta.</h3>
                <p>Inicia sesion e introduce el siguiente codigo</p>
                <p>$token</p>
            ");
            $mail->send();
            // Execute the prepared query.
            if (!$insert_stmt->execute()) {
                header('Location: ../error.php?err=Registration failure: INSERT');
            }
                
                

        }
        echo "<script>alert('Registration successful!')</script>";
        header('Location: ./index.php');
        
    }
}
?>