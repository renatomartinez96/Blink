<!--

Copyright (c) 2015 Blink
All Rights Reserved
 
This product is protected by copyright and distributed under
licenses restricting copying, distribution, and decompilation.

Gerardo López | Iván Graciano | Renato Andres

-->
<?php
    include_once '../../assets/includes/db_conexion.php';
    include_once '../../assets/includes/funciones.php';
    sec_session_start();
    include "../auto.php"; // AUTORIZACIÓN DE PROFESORES!!!!
    $user = $_SESSION['username'];
    $userid = $_SESSION['user_id'];
    $tipo = $_SESSION['tipo'];
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
    if(isset($_POST['nombre'],$_POST['curso']))
    {
        $num_preguntas = 10;
        $name_test = $_POST['nombre'];
        $id_curso = $_POST['curso'];
        if ($stmt = $mysqli->prepare("INSERT INTO `test-cursos`(`name`, `curso`, `preguntas`) VALUES (?,?,?)")) 
        {
            $stmt->bind_param('sii', $name_test , $id_curso , $num_preguntas);
            if($stmt->execute())
            {
                if(
                    isset(
                        $_POST['p1'],
                        $_POST['1A'],
                        $_POST['1B'],
                        $_POST['1C'],
                        $_POST['1D'],
                        $_POST['r1'],
                        
                        $_POST['p2'],
                        $_POST['2A'],
                        $_POST['2B'],
                        $_POST['2C'],
                        $_POST['2D'],
                        $_POST['r2'],
                        
                        $_POST['p3'],
                        $_POST['3A'],
                        $_POST['3B'],
                        $_POST['3C'],
                        $_POST['3D'],
                        $_POST['r3'],
                        
                        $_POST['p4'],
                        $_POST['4A'],
                        $_POST['4B'],
                        $_POST['4C'],
                        $_POST['4D'],
                        $_POST['r4'],
                        
                        $_POST['p5'],
                        $_POST['5A'],
                        $_POST['5B'],
                        $_POST['5C'],
                        $_POST['5D'],
                        $_POST['r5'],
                        
                        $_POST['p6'],
                        $_POST['6A'],
                        $_POST['6B'],
                        $_POST['6C'],
                        $_POST['6D'],
                        $_POST['r6'],
                        
                        $_POST['p7'],
                        $_POST['7A'],
                        $_POST['7B'],
                        $_POST['7C'],
                        $_POST['7D'],
                        $_POST['r7'],
                        
                        $_POST['p8'],
                        $_POST['8A'],
                        $_POST['8B'],
                        $_POST['8C'],
                        $_POST['8D'],
                        $_POST['r8'],
                        
                        $_POST['p9'],
                        $_POST['9A'],
                        $_POST['9B'],
                        $_POST['9C'],
                        $_POST['9D'],
                        $_POST['r9'],
                        
                        $_POST['p10'],
                        $_POST['10A'],
                        $_POST['10B'],
                        $_POST['10C'],
                        $_POST['10D'],
                        $_POST['r10']
                    )
                )
                {
                    $p = array(array());
                    $p[0][0] = $_POST['p1'];
                    $p[0][1] = $_POST['1A'];
                    $p[0][2] = $_POST['1B'];
                    $p[0][3] = $_POST['1C'];
                    $p[0][4] = $_POST['1D'];
                    $p[0][5] = $_POST['r1'];

                    $p[1][0] = $_POST['p2'];
                    $p[1][1] = $_POST['2A'];
                    $p[1][2] = $_POST['2B'];
                    $p[1][3] = $_POST['2C'];
                    $p[1][4] = $_POST['2D'];
                    $p[1][5] = $_POST['r2'];

                    $p[2][0] = $_POST['p3'];
                    $p[2][1] = $_POST['3A'];
                    $p[2][2] = $_POST['3B'];
                    $p[2][3] = $_POST['3C'];
                    $p[2][4] = $_POST['3D'];
                    $p[2][5] = $_POST['r3'];

                    $p[3][0] = $_POST['p4'];
                    $p[3][1] = $_POST['4A'];
                    $p[3][2] = $_POST['4B'];
                    $p[3][3] = $_POST['4C'];
                    $p[3][4] = $_POST['4D'];
                    $p[3][5] = $_POST['r4'];

                    $p[4][0] = $_POST['p5'];
                    $p[4][1] = $_POST['5A'];
                    $p[4][2] = $_POST['5B'];
                    $p[4][3] = $_POST['5C'];
                    $p[4][4] = $_POST['5D'];
                    $p[4][5] = $_POST['r5'];

                    $p[5][0] = $_POST['p6'];
                    $p[5][1] = $_POST['6A'];
                    $p[5][2] = $_POST['6B'];
                    $p[5][3] = $_POST['6C'];
                    $p[5][4] = $_POST['6D'];
                    $p[5][5] = $_POST['r6'];

                    $p[6][0] = $_POST['p7'];
                    $p[6][1] = $_POST['7A'];
                    $p[6][2] = $_POST['7B'];
                    $p[6][3] = $_POST['7C'];
                    $p[6][4] = $_POST['7D'];
                    $p[6][5] = $_POST['r7'];

                    $p[7][0] = $_POST['p8'];
                    $p[7][1] = $_POST['8A'];
                    $p[7][2] = $_POST['8B'];
                    $p[7][3] = $_POST['8C'];
                    $p[7][4] = $_POST['8D'];
                    $p[7][5] = $_POST['r8'];

                    $p[8][0] = $_POST['p9'];
                    $p[8][1] = $_POST['9A'];
                    $p[8][2] = $_POST['9B'];
                    $p[8][3] = $_POST['9C'];
                    $p[8][4] = $_POST['9D'];
                    $p[8][5] = $_POST['r9'];

                    $p[9][0] = $_POST['p10'];
                    $p[9][1] = $_POST['10A'];
                    $p[9][2] = $_POST['10B'];
                    $p[9][3] = $_POST['10C'];
                    $p[9][4] = $_POST['10D'];
                    $p[9][5] = $_POST['r10'];
                    $serializedData = serialize($p);
                    $file_loc = '../../courses/' . $id_curso . '/test.bl';
                    file_put_contents($file_loc, $serializedData);
                    header('location:../');
                }
            }
        }
    }
?>