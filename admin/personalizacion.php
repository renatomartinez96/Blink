<?php
include_once '../assets/includes/db_conexion.php';
include_once '../assets/includes/funciones.php';
 
sec_session_start();
include 'auto.php';
if(isset($_POST["banselect"]) && isset($_POST["banselect"]))
{
    $banner = $_POST["banselect"];
    $userid = $_POST["userid"];

    $query = "INSERT INTO user_config VALUES ('', '$userid', '', '$banner') ";
    if ($query = mysqli_query($mysqli, $query)) 
    {
        echo "lel";
    }
    else
    {
        echo "lelakfsdfbsdfb";
    }
}
else
{

}
?>