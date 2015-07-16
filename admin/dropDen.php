<?php
if(isset($_POST["dencur"]))
{
    require_once '../assets/includes/db_conexion.php';
    include_once '../assets/includes/funciones.php';
    sec_session_start();
    require_once "../assets/includes/lang.php";
    $idto = $_POST['dencur'];
    $stmt = $mysqli->query("DELETE FROM curden WHERE id = $idto");
    
    echo $langprint["aden-drop-true"];
}
else
{
    echo $langprint["aden-drop-false"];
}
?>