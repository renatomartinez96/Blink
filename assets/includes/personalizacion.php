<?php
include_once 'db_conexion.php';
include_once 'funciones.php';
 
sec_session_start();

if(isset($_POST["userid"]) && isset($_POST["banselect"]) && isset($_POST["folderloc"]))
{
    $banner = $_POST["banselect"];
    $userid = $_POST["userid"];
    $folderloc = $_POST["folderloc"];

    $query1 = "SELECT * FROM user_config WHERE iduser = $userid";
    if ($query1 = mysqli_query($mysqli, $query1)) 
    {
        $nums = mysqli_num_rows($query1);
        if($nums == 1)
        {
            $query2 = "UPDATE user_config SET banner='$banner' WHERE iduser = '$userid'";
            if ($query2 = mysqli_query($mysqli, $query2)) 
            {
                header("location: ../../".$folderloc."/index.php");
            }
            else
            {
                echo "error1";
            }
        }
        else
        {
            $query3 = "INSERT INTO user_config VALUES ('', '$userid', '', '$banner') ";
            if ($query3 = mysqli_query($mysqli, $query3)) 
            {
                header("location: ../../".$folderloc."/index.php");
            }
            else
            {
                echo "error2";
            }
        }
    }
    else
    {
        echo "Error: de sql";
    }
}
else
{

}
?>