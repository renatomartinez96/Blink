<?php
session_Start();
include_once 'db_conexion.php';
include_once 'funciones.php';

sec_session_start(); // inicio de sesion personalizado

if (isset($_POST['email'], $_POST['p'])) {
    $email = $_POST['email'];
    $password = $_POST['p']; // contraseña encriptada

    if (login($email, $password, $mysqli) == true) {
        // todos valores son correctos
        header('Location: ../../home.php');
    } else {
        // fallo el inicio de sesion
        $_SESSION['error'] = 1;
        header('Location: ../../index.php');
    }
} else {
    //Las varianles por metodo Post no son recibidas
    echo 'Invalid Request';
}
?>
