<?php
if(isset($_POST["msgaddid"]) and isset($_POST["msgcontent"]) and isset($_POST["denid"]))
{
    require_once '../assets/includes/db_conexion.php';
    include_once '../assets/includes/funciones.php';
    sec_session_start();
    require_once "../assets/includes/lang.php";
    $msg = $_POST["msgcontent"];
    $msgadd = $_POST["msgaddid"];
    $denid = $_POST["denid"];
    $stmt = $mysqli->query("UPDATE curden SET admDesc = '$msg', destId = '$msgadd' WHERE id = '$denid'");
    
    echo $langprint["aden-msg-true"];
}
else
{
    echo $langprint["aden-msg-false"];
}
?>