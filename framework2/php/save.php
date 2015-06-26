<?php

    include '../../assets/includes/db_conexion.php';
    include '../../assets/includes/funciones.php';
    sec_session_start();
    $user = $_SESSION['username'];
    $userid = $_SESSION['user_id'];
    $tipo = $_SESSION['tipo'];
    $file = "../temp/index-".$userid.".tblk";
    if (file_exists($file)) {
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename="'.basename($file).'"' );
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($file));
                    readfile($file);
                    unlink($file);
                    exit;
            
            

//            echo "<script>
//                    window.close();
//                </script>";
        }
    
    
?>
