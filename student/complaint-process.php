<?php
if(isset($_POST["dentype"]) & isset($_POST["dendesc"]) & isset($_POST["dencur"]) & isset($_POST["denusr"]))
{
    $dentype = $_POST["dentype"];
    $dendesc = $_POST["dendesc"];
    $dencur = $_POST["dencur"];
    $denusr = $_POST["denusr"];
    
    include_once '../assets/includes/db_conexion.php';
    include_once '../assets/includes/funciones.php';
    
    $stmt = $mysqli->prepare("INSERT INTO curden (idCur, idUsrDen, denuncia, tipo) VALUES(?, ?, ?, ?)");
    $stmt->bind_param('ssss', $dentype,$dendesc,$dencur, $denusr);
    $stmt->execute();
    
}
?>