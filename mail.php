<?php 
    $nombre = $_POST['nombre'];
    $email = $_POST['correo'];
    $titulo = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];
    $para = "staff@the-box.link";
    $header = 'From: ' . $email;
    $msjCorreo = "Nombre: $nombre\n E-Mail: $email\n Mensaje:\n $mensaje";

        if (mail($para, $titulo, $msjCorreo, $header)) {
            echo "<script language='javascript'>
            alert('Mensaje enviado, muchas gracias.');
            window.history.go(-1);
            </script>";
        } else {
            echo 'Falló el envio';
        }
    
?>