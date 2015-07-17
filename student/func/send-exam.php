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
    if (
        isset(
            $_POST['1'],
            $_POST['2'],
            $_POST['3'],
            $_POST['4'],
            $_POST['5'],
            $_POST['6'],
            $_POST['7'],
            $_POST['8'],
            $_POST['9'],
            $_POST['10']
        )
    ) 
    {
        $p = array();
        $p[0] = $_POST['1'];
        $p[1] = $_POST['2'];
        $p[2] = $_POST['3'];
        $p[3] = $_POST['4'];
        $p[4] = $_POST['5'];
        $p[5] = $_POST['6'];
        $p[6] = $_POST['7'];
        $p[7] = $_POST['8'];
        $p[8] = $_POST['9'];
        $p[9] = $_POST['10'];
        $id = $_POST['idcur'];
        $file_dir = '../../courses/' . $id . '/test.bl'; 
        if (file_exists($file_dir)) {
            $recoveredData = file_get_contents($file_dir);
            $array = unserialize($recoveredData);
            $correctos = 0;
            $incorrectos = 0;
            for($i = 0; $i <= 9; $i++)
            {
                if ($p[$i] == $array[$i][5]) 
                {
                    $correctos++;
                }
                else
                {
                    $incorrectos++;
                }
            }
            if ($stmt = $mysqli->prepare("INSERT INTO `test-courses`(`id_curso`, `id_user`, `grade`) VALUES (?,?,?)")) 
            {
                $stmt->bind_param('iii',$id,$elidespecial,$correctos);
                if($stmt->execute())
                {
                    header('location:../');
                }
            }
           
        }
    }
?>