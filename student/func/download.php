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
            $file = $dir . $_GET['f'];
            $file1 = $dir1 . $_GET['f'];
            
            if(file_exists($file)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename='.basename($file));
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file));
                readfile($file);
                exit;
            }
            elseif(file_exists($file1)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename='.basename($file1));
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file1));
                readfile($file1);
                exit;
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