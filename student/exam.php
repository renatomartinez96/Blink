<!--

Copyright (c) 2015 Blink
All Rights Reserved
 
This product is protected by copyright and distributed under
licenses restricting copying, distribution, and decompilation.

Gerardo López | Iván Nolasco | Renato Andres

-->
<?php

    include_once '../assets/includes/db_conexion.php';
    include_once '../assets/includes/funciones.php';
    include_once 'func/exam.php';
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
    include "auto.php";
    include "../assets/includes/lang.php";
    if(isset($_GET['id']))
    {
        $md5urs = substr(md5($user),0,10);
        $id_course = str_replace($md5urs, "",$_GET['id']);
        $query = "SELECT `id_curso`, `id_user`, `grade`, `date` FROM `test-courses` WHERE `id_curso` = ? and `id_user` = ? ";
        if($stmt = $mysqli->prepare($query))
        {
            $stmt->bind_param('ii', $id_course ,$elidespecial);
            $stmt->execute(); 
            $stmt->store_result();
            $stmt->bind_result($id_curso,$id_user,$grade,$date);
            $stmt->fetch();
            $resultados = $stmt->num_rows;
            if($resultados > 0)
            {
                $fech = date('Y-m-d H:i:s', strtotime('-1 week'));
                $nfech = date('Y-m-d H:i:s', strtotime('+1 week'));
                if($grade >= 7)
                {
                    $stat = 2;
                }
                else
                {
                    if ($date < $fech) 
                    {
                        $stat = 1;
                    }
                    else
                    {
                        $stat = 3;
                    }
                }
            }
            else
            {
                $stat = 1;
            }
        }
    }
    else    
    {
        header('location:./');   
    }
    
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!--Core CSS-->
		<?php 
            $titulodelapagina = "¡Bienvenido $user!";
			require 'main_css.php';
		?>
		<!--/#Core CSS-->

		<!--Custom CSS-->
		<link href="../assets/css/sidebar.css" rel="stylesheet">
        <link href="../assets/css/perfil.css" rel="stylesheet">

	</head>
	<body>
        <!--Topbar -->
		<?php 
			include '../nav/topbar.php';
		?>
		<!--/#Topbar -->
		<div id="wrapper" class="toggled">
			<!--Sidebar -->
			<?php 
				include '../nav/sidebar.php';
			?>
			<!--/#Sidebar -->
			
			<!--Page Content -->
			<div id="page-content-wrapper">
				<div class="container-fluid">
					<!--Content-->
                        <div class="row" style="padding-top:15px;">
                            <div class="container">
                                <form action="func/send-exam.php" method="post">
                                    <div class="col-sm-3">
                                        <div class="well">
                                            <h3 class="junction-bold">Examen</h3>
                                            <input type="hidden" name="idcur" value="<?=str_replace(substr(md5($user),0,10), "",$_GET['id'])?>">
                                            <hr>
                                            <h5 class="text-justify">En esta area pondras a prueba tus conocimintos adquiridos a lo largo de tus lecciones. Debes contestar todas las preguntas y seleccionar la respuesta que a tu criterio pienses que es la correcta. Buena suerte.</h5>
                                            <hr>
                                            <input type="submit" class="btn btn-success form-control" value="Enviar">
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="well">
                                            <?php
                                                if(isset($_GET['id']))
                                                {
                                                    if(strlen($_GET['id']) < 11)
                                                    {

                                                    }
                                                    else
                                                    {
                                                        $md5urs = substr(md5($user),0,10);
                                                        $id_course = str_replace($md5urs, "",$_GET['id']);
                                                        cargar_examen($id_course,$lang,$stat);
                                                    }
                                                }
                                                else
                                                {
                                                    header('location:./');
                                                }

                                            ?>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
					<!--/#Content-->
					</div>
				</div>
			</div>
			<!--/#Page Content -->
		</div>
		<!--Main js-->
		<?php 
			include 'main_js.php';
		?>
		<!--/#Main js-->
	</body>
</html>