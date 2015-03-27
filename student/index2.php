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
			require 'main_css.php';
		?>
		<!--/#Core CSS-->

		<!--Custom CSS-->
		<link href="../assets/css/sidebar.css" rel="stylesheet">
        <link href="../assets/css/perfil.css" rel="stylesheet">
        <link href="../assets/css/editor.css" rel="stylesheet">
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
                        <div class="jumbotron col-xs-12" style="margin-bottom:0px !important;">
                            <div class="video_container">
                                <video  autoplay loop muted="" class="full fillWidth">
                                    <source src="../assets/video/profile.mp4" type="video/mp4">
                                </video>
                            </div>
                            <div class="col-md-12">
                                <h1 class="junction-bold"><?=$nombres." ".$apellidos?></h1>
                                <h3 class="junction-regular"><?=$_SESSION['username']?></h3>
                                <p class="junction-light"><?=$descripcion?></p>
                                <p>
                                    <a class="btn btn-default btn-lg"><Strong><?=$_SESSION['username']?></Strong>'s page</a>
                                    <a class="btn btn-face btn-lg">Facebook</a>
                                    <a class="btn btn-twit btn-lg">Twitter</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-xs-12 full">
                            <div class="col-md-9 full">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Courses Feed</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-sm-6 col-md-3">
                                            <div class="thumbnail">
                                                <img src="../assets/img/trofeos/2.jpg" alt="...">
                                                <div class="caption">
                                                    <h3>Thumbnail label</h3>
                                                    <p>...</p>
                                                    <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 full">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Teachers</h3>
                                    </div>
                                    <div class="panel-body">
                                        Panel content
                                    </div>
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
	</body>
</html>