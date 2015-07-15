<?php
if(isset($_POST["dentype"]) & isset($_POST["dendesc"]) & isset($_POST["dencur"]) & isset($_POST["denusr"]))
{
    $dentype = $_POST["dentype"];
    $dendesc = $_POST["dendesc"];
    $dencur = $_POST["dencur"];
    $denusr = $_POST["denusr"];
    $date0 = date('Y-m-d');
    
    include_once '../assets/includes/db_conexion.php';
    include_once '../assets/includes/funciones.php';
    include_once '../assets/includes/lang.php';
    
    $stmt = $mysqli->prepare("INSERT INTO curden (idCur, idUsrDen, denuncia, tipo, fecha_den) VALUES(?, ?, ?, ?, ?)");
    $stmt->bind_param('sssss', $dencur, $denusr, $dendesc, $dentype, $date0);
    $stmt->execute();
    
    echo $langprint["den-saved"];
}
else
{
    echo $langprint["den-error"];
}
?>