<!--

Copyright (c) 2015 Blink
All Rights Reserved

This product is protected by copyright and distributed under
licenses restricting copying, distribution, and decompilation.

Gerardo López | Iván Nolasco | Renato Andres

-->
<?php

    include_once '../../assets/includes/db_conexion.php';
    include_once '../../assets/includes/funciones.php';
    sec_session_start();
    if (isset($_SESSION['username']))
    {
        if(isset($_GET['f']))
        {
            $user = $_SESSION['username'];
            $dir = "../../users/" . $user . "/img/";
            $dir1 = "../../users/" . $user . "/video/";
            $file = $_GET['f'];
            if (file_exists($dir . $file))
            {
                $filepath = $dir . $file;
                if(unlink($filepath))
                {
                    header('Location: ../index2.php');
                }
            }
            elseif (file_exists($dir1 . $file))
            {
                $filepath = $dir1 . $file;
                $filepath1 = $dir1 . "/thumbs/" . substr($file,0,6) . ".gif";

                if(unlink($filepath) and unlink($filepath1))
                {
                    header('Location: ../index2.php');
                }
            }
            else
            {
                echo "archivo no existe";
            }
        }
        else
        {

        }
    }
    else
    {

    }
?>
