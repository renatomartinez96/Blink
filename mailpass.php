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
            echo "Hemos enviado un correo a <strong>".$mail."</strong>. Por favor verificarlo lo mas pronto posible para reestablecer tu contraseña";
        }
    }else{
        echo "Correo no encontrado, por favor verifica la direccion ingresada o registrate en Blink";
    }
}
?>