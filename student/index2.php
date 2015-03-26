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
    if ($stmt = $mysqli->prepare("SELECT avatar, nombres, apellidos, nacimiento, descripcion, correo, tipo, lang  FROM usuarios_tb WHERE usuario = ?")) 
    {
        $stmt->bind_param('s', $user);
        $stmt->execute(); 
        $stmt->store_result();
        $stmt->bind_result($avatar,$nombres,$apellidos,$nacimiento,$descripcion,$correo,$tipo,$lang);
        $stmt->fetch();
        
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!--Core CSS-->
		<?php 
            $titulodelapagina = "¡Bienvenido $user!";
			include 'main_css.php';
		?>
		<!--/#Core CSS-->

		<!--Custom CSS-->
		<link href="../assets/css/sidebar.css" rel="stylesheet">
        <link href="../assets/css/perfil.css" rel="stylesheet">
        <link href="../assets/css/editor.css" rel="stylesheet">
        <style>
                .video_container {
                    position: absolute;
                }
                .video_container {
                    top:0%;
                    left:0%;
                    height:100%;
                    width:100%;
                    overflow: hidden;
                }
                video {
                    position:absolute;
                    z-index:0;
                }
                video.fillWidth {
                    width: 100%;
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
                        <div class="jumbotron col-xs-12" style="margin-bottom:0px !important; padding: 48px 0px 0px 30px;">
                            <div class="video_container">
                                <video  autoplay loop muted class="full fillWidth">
                                    <source src="../assets/video/profile.mp4" type="video/mp4">
                                </video>
                            </div>
                            <div class="col-md-9">
                                <h1><?=$nombres." ".$apellidos?></h1>
                                <h3><?=$_SESSION['username']?></h3>
                                  <p><?=$descripcion?></p>
                                  <p><a class="btn btn-primary btn-lg">Personal page</a></p>
                            </div>
                            <div class="col-md-3" >
                                <img class="col-xs-12 full" src="../assets/img/avatares/<?=$avatar?>.png">
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