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
                                <h2 class="junction-bold"><?=$nombres." ".$apellidos?></h1>
                                <h3 class="junction-regular"><?=$_SESSION['username']?></h3>
                                <h4 class="junction-light"><?=$descripcion?></h4>
                                <p>
                                    <a class="btn btn-default btn-lg" href="../users/<?=$user?>/index.html"><Strong><?=$_SESSION['username']?></Strong>'s page</a>
                                    <a class="btn btn-face btn-lg">Facebook</a>
                                    <a class="btn btn-twit btn-lg">Twitter</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-xs-12 full">
                            <br>
                            <div class="col-md-10 ">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Courses Feed</h3>
                                    </div>
                                    <div class="panel-body">
                                        <!--Cursos-->
                                        <div class="col-sm-6 col-md-3">
                                            <div class="thumbnail">
                                                <img src="../assets/img/trofeos/2.jpg" style="border-radius:50%;width:80%;">
                                                <div class="caption">
                                                    <h3>Basic html tags</h3>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent quis dui sit amet nulla porttitor porta pharetra ac urna. Vestibulum a mollis nibh, vel luctus sem. Integer sagittis viverra maximus. Quisque a felis molestie lectus dictum cursus. Proin fringilla nibh odio, a consequat mi lobortis nec. Maecenas iaculis eros in sagittis vehicula. Donec eu nunc ipsum. 
                                                        <a href="#" class="btn btn-success form-control" role="button">Start</a> 
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3">
                                            <div class="thumbnail">
                                                <img src="../assets/img/trofeos/3.jpg" style="border-radius:50%;width:80%;">
                                                <div class="caption">
                                                    <h3>Basic html tags</h3>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent quis dui sit amet nulla porttitor porta pharetra ac urna. Vestibulum a mollis nibh, vel luctus sem. Integer sagittis viverra maximus. Quisque a felis molestie lectus dictum cursus. Proin fringilla nibh odio, a consequat mi lobortis nec. Maecenas iaculis eros in sagittis vehicula. Donec eu nunc ipsum. </p>
                                                    <p>
                                                        <a href="#" class="btn btn-success form-control" role="button">Start</a> 
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3">
                                            <div class="thumbnail">
                                                <img src="../assets/img/trofeos/4.jpg" style="border-radius:50%;width:80%;">
                                                <div class="caption">
                                                    <h3>Basic html tags</h3>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent quis dui sit amet nulla porttitor porta pharetra ac urna. Vestibulum a mollis nibh, vel luctus sem. Integer sagittis viverra maximus. Quisque a felis molestie lectus dictum cursus. Proin fringilla nibh odio, a consequat mi lobortis nec. Maecenas iaculis eros in sagittis vehicula. Donec eu nunc ipsum. </p>
                                                    <p>
                                                        <a href="#" class="btn btn-success form-control" role="button">Start</a> 
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3">
                                            <div class="thumbnail">
                                                <img src="../assets/img/trofeos/1.jpg" style="border-radius:50%;width:80%;">
                                                <div class="caption">
                                                    <h3>Basic html tags</h3>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent quis dui sit amet nulla porttitor porta pharetra ac urna. Vestibulum a mollis nibh, vel luctus sem. Integer sagittis viverra maximus. Quisque a felis molestie lectus dictum cursus. Proin fringilla nibh odio, a consequat mi lobortis nec. Maecenas iaculis eros in sagittis vehicula. Donec eu nunc ipsum. </p>
                                                    <p>
                                                        <a href="#" class="btn btn-success form-control" role="button">Start</a> 
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/#Cursos-->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Teachers</h3>
                                    </div>
                                    <div class="panel-body">
                                        <!--Teachers-->
                                        <div class="row">
                                              <div class="col-xs-12">
                                                    <div class="thumbnail">
                                                        <img src="../assets/img/avatares/8.png" class="col-xs-12">
                                                        <div class="caption">
                                                            <center>
                                                                <h3>Teacher</h3>
                                                                <p>
                                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent quis dui sit amet nulla porttitor porta pharetra ac urna. Vestibulum a mollis nibh, vel luctus sem. Integer sagittis viverra maximus.
                                                                </p>
                                                                <h4>Html</h4>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-info" style="width: 20%"></div>
                                                                </div>
                                                                <h4>Css</h4>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-success" style="width: 40%"></div>
                                                                </div>
                                                                <p>
                                                                    <a href="#" class="btn btn-primary" role="button">Suscribe</a> 
                                                                    <a href="#" class="btn btn-default" role="button">View</a>
                                                                </p>
                                                            </center>
                                                        </div>
                                                    </div>
                                              </div>
                                        </div>
                                        <div class="row">
                                              <div class="col-xs-12">
                                                    <div class="thumbnail">
                                                        <img src="../assets/img/avatares/35.png" class="col-xs-12">
                                                        <div class="caption">
                                                            <center>
                                                                <h3>Teacher 2</h3>
                                                                <p>
                                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent quis dui sit amet nulla porttitor porta pharetra ac urna. Vestibulum a mollis nibh, vel luctus sem. Integer sagittis viverra maximus.
                                                                </p>
                                                                <h4>Html</h4>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-info" style="width: 70%"></div>
                                                                </div>
                                                                <h4>Css</h4>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-success" style="width: 80%"></div>
                                                                </div>
                                                                <p>
                                                                    <a href="#" class="btn btn-primary" role="button">Suscribe</a> 
                                                                    <a href="#" class="btn btn-default" role="button">View</a>
                                                                </p>
                                                            </center>
                                                        </div>
                                                    </div>
                                              </div>
                                        </div>
                                        <!--/#Teachers-->
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