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
    sec_session_start();
    $user = $_SESSION['username'];
    $avatar = '';
    $stmt = $mysqli->prepare("SELECT idusuario, nombres, apellidos, nacimiento, descripcion, avatar, tipo, lang  FROM usuarios_tb WHERE usuario = ?");
        $stmt->bind_param('s', $user);
        $stmt->execute(); 
        $stmt->store_result();
        $stmt->bind_result($idusr, $nombres, $apellidos, $nacim, $usrdesc, $avatar, $tipo, $lang);
        $stmt->fetch();
        $stmt->close();

        include "../assets/includes/lang.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!--Core CSS-->
		<?php 
            $titulodelapagina = "". $nombres. " ".$apellidos."";
			include 'main_css.php';
		?>
		<!--/#Core CSS-->

		<!--Custom CSS-->
            <link href="../assets/css/sidebar.css" rel="stylesheet">
            <link href="../assets/css/perfil.css" rel="stylesheet">
            <style>
                ::-webkit-scrollbar {
                    width: 15px;
                }

                ::-webkit-scrollbar-track {
                    border-radius: 0px;
                    background: #000;
                }

                ::-webkit-scrollbar-thumb {
                    border-radius: 0px;
                    background: black;
                }
                /*GRAY*/
            .not-success {
                -webkit-filter: grayscale(100%); 
                filter: grayscale(100%)
            }
            .mrwhite{
                background: #ede5e5;
            }
            </style>
		<!--/#Custom CSS-->

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
					<div class="row">
					<!--Content-->
                        <div class="col-sm-10 col-sm-offset-1" id="perfil">
                            <div class="col-sm-3 full">
                                <div class="col-xs-12 full">
                                    <img class="col-xs-12 full" src="../assets/img/avatares/<?=$avatar?>.png">
                                </div>
                                <div class="col-xs-12 full">
                                    <a class="btn btn-info btn-block junction-bold">Acerca de mi</a>
                                    <a class="btn btn-primary btn-block junction-bold" role="button" data-toggle="collapse" href="#boxlinktrophies" aria-expanded="false" aria-controls="boxlinktrophies">Trofeos Box Link</a>
                                    <a class="btn btn-success btn-block junction-bold" role="button" data-toggle="collapse" href="#othertrophies" aria-expanded="false" aria-controls="othertrophies">Trofeos con tutor</a>
                                </div>
                            </div>
                            <div class="col-sm-9 full jumbotron">
                                <div class="panel panel-primary full">
                                    <div class="panel-heading">
                                        <h3 class="junction-bold"><?php echo $nombres." ".$apellidos." - user: ".$user."";?></h3>
                                    </div>
                                    <!--Informacion del usuario-->
                                    <div class="panel-body tablist">
                                            <div class="well">
                                                <div class="col-md-3">
                                                    <p class="junction-regular">Nacimiento:</p>
                                                    <p class="junction-regular">Nivel:</p>
                                                    <p class="junction-regular">Estado:</p>
                                                </div>
                                                <div class="col-md-9">
                                                    <p class="junction-light"><?=$nacim?></p>
                                                    <p class="junction-light"><?=$tipo?></p>
                                                    <p class="junction-light text-center"><small><?=$usrdesc?></small></p>
                                                </div>
                                            </div>
                                        <div class="collapse" id="boxlinktrophies">
                                            <div class="well">
<!--
                                                <hr>
                                                <h4 class="junction-light text-center">Trofeos oficiales</h4>
                                                <p class="junction-light">Estos los ganas al completar los cursos de Box Link (que se actualizan seguido)</p>
-->
                                            </div>
                                        </div>
                                        <div class="collapse" id="othertrophies">
                                            <div class="well">
                                                <p class="text-center">Trofeos de tutores</p>
                                                <?php
                                                    include "student_com_data.php";
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/#Informacion del usuario-->
                                </div>
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
        <!--Editor js-->
	</body>
</html>