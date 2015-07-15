<?php
if(isset($_POST["dencur"]))
{
    require_once '../assets/includes/db_conexion.php';
    $idto = $_POST['dencur'];
    $stmt = $mysqli->query("DELETE FROM curden WHERE id = $idto");
    
    echo "La denuncia se elimino con exito";
}
else
{
    echo "Error";
}
?>