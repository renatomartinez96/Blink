<?php
include_once '../assets/includes/db_conexion.php';
include_once '../assets/includes/funciones.php';
 
sec_session_start();
include 'auto.php';
$banner = $_GET["banner"];
$userid = $_GET["id"];

$query = "INSERT INTO user_config VALUES ('', '$userid', '', '$banner') ";
if ($query = mysqli_query($mysqli, $query2)) 
{
    echo "lel";
}
else
{
    echo "lelakfsdfbsdfb";
}
?>