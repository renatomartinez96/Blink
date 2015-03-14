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
    if ($stmt = $mysqli->prepare("SELECT avatar, nombres, apellidos, nacimiento, descripcion, correo, tipo  FROM usuarios_tb WHERE usuario = ?")) {
        $stmt->bind_param('s', $user);
        $stmt->execute(); 
        $stmt->store_result();
        $stmt->bind_result($avatar,$nombres,$apellidos,$nacimiento,$descripcion,$correo,$tipo);
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
                                <div class="col-xs-12 btns full">
                                    <center>
                                        <div class="panel panel-primary full">
                                            <div class="panel-heading">
                                                <h2 class="panel-title junction-bold"><?=$user?></h2>
                                            </div>
                                            <div class="panel-body full">
                                                <button class="btn form-control btn-success">Información</button>
                                                <button class="btn form-control btn-success">Cursos</button>
                                            </div>
                                        </div>
                                    </center>
                                </div>
                            </div>
                            <div class="col-sm-9 full jumbotron">
                                <div class="panel panel-primary full">
                                    <div class="panel-heading">
                                        <h2 class="junction-bold">Información</h2>
                                    </div>
                                    <div class="panel-body tablist">
                                        <label><h3>Usuario</h3></label><label><h4>Usuario</h4></label><br>
                                        <label><h3>Nombre</h3></label><br>
                                        <label><h3>Fecha de nacimiento</h3></label><br>
                                        <label><h3>Descripcion</h3></label><br>
                                        <label><h3>Correo Electronico</h3></label><br>
                                        <label><h3>Tipo de usuario</h3></label><br>
                                        
                                        
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
        <!--Editor js-->
	</body>
</html>