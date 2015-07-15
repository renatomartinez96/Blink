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
    $user = $_SESSION['username'];
    $elidespecial = $_SESSION['user_id'];
    $avatar = '';
    if ($stmt = $mysqli->prepare("SELECT usuarios_tb.avatar, usuarios_tb.nombres, usuarios_tb.apellidos, usuarios_tb.nacimiento, usuarios_tb.descripcion, usuarios_tb.correo, usuarios_tb.tipo, usuarios_tb.lang, usuarios_tb.idusuario, user_config.banner, user_config.iduser FROM usuarios_tb INNER JOIN user_config ON usuarios_tb.idusuario = user_config.iduser WHERE usuarios_tb.idusuario = ?")) 
    {
        $stmt->bind_param('s', $elidespecial);
        $stmt->execute(); 
        $stmt->store_result();
        $stmt->bind_result($avatar,$nombres,$apellidos,$nacimiento,$descripcion,$correo,$tipo,$lang,$idusuario,$bannero,$iduserconf);
        $stmt->fetch();
    }
    if(isset($_POST['name'],$_POST['nombre'],$_POST['editor1'],$_POST['editor2']))
    {
        $name_post = $_POST['name'];
        $nombre_post = $_POST['nombre'];
        $post_es = $_POST['editor1'];
        $post_en = $_POST['editor2'];
        if ($stmt = $mysqli->prepare("SELECT COUNT(`id`) FROM `forum-post`"))
        {
            $stmt->execute(); 
            $stmt->store_result();
            $stmt->bind_result($forums);
            $stmt->fetch();
            $new_foro = $forums + 1;
            if ($stmt = $mysqli->prepare("INSERT INTO `forum-post`(`id`, `name`, `nombre`, `user`) VALUES (?,?,?,?)"))
            {
                $stmt->bind_param('issi', $new_foro,$name_post,$nombre_post,$user);
                if ($stmt->execute()) {
                    $file1 = 0;
                    $file2 = 0;
                    if($file_es = fopen($nombre."../../forum/files/es/" . $new_foro . ".txt" , "w"))
                    {
                        fwrite($file_es,$post_es);
                        $file1 = 1;
                    }
                    if($file_en = fopen($nombre."../../forum/files/en/" . $new_foro . ".txt" , "w"))
                    {
                        fwrite($file_en,$post_en);
                        $file2 = 1;
                    }
                    if($file1 == 1 and $file2 == 1)
                    {
//                      todo correcto
                        echo "<script>window.location.href = '../forum.php';</script>";
                    }
                    
                }

            }
        }
    }
?>