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
    if ($stmt = $mysqli->prepare("SELECT avatar, nombres, apellidos, nacimiento, descripcion, correo, tipo, lang  FROM usuarios_tb WHERE usuario = ?")) {
        $stmt->bind_param('s', $user);
        $stmt->execute(); 
        $stmt->store_result();
        $stmt->bind_result($avatar,$nombres,$apellidos,$nacimiento,$descripcion,$correo,$tipo,$lang);
        $stmt->fetch();
        if ($lang == 'esp') 
        {   
            include '../assets/lang/esp.php';
            switch($tipo)
            {
                case 1:
                    $tip = 'Administrador';
                break;
                case 2:
                    $tip = 'Profesor';
                break;
                case 3:
                    $tip = 'Estudiante';
                break;
            }
        }
        elseif($lang == 'ing')
        {
            include '../assets/lang/ing.php';
            switch($tipo)
            {
                case 1:
                    $tip = 'Administrator';
                break;
                case 2:
                    $tip = 'Teacher';
                break;
                case 3:
                    $tip = 'Student';
                break;
            }
        }
        else{
            include '../assets/lang/esp.php';
            switch($tipo)
            {
                case 1:
                    $tip = 'Administrador';
                break;
                case 2:
                    $tip = 'Profesor';
                break;
                case 3:
                    $tip = 'Estudiante';
                break;
            }
        }
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
                                <div class="col-xs-12 btns full">
                                    <center>
                                        <div class="panel panel-primary full">
                                            <div class="panel-heading">
                                                <h2 class="panel-title junction-bold"><?=$user?></h2>
                                            </div>
                                            <div class="panel-body full">
                                                <button class="btn form-control btn-success">Información</button>
                                                <button class="btn form-control btn-success">Información</button>
                                                <button class="btn form-control btn-success">Información</button>
                                            </div>
                                        </div>
                                    </center>
                                </div>
                            </div>
                            <div class="col-sm-9 full jumbotron">
                                <div class="panel panel-primary full">
                                    <div class="panel-heading">
                                        <h3 class="junction-bold"><?=$lang['profile-1']?></h3>
                                    </div>
                                    <!--Informacion del usuario-->
                                    <div class="panel-body tablist">
                                        <label><h4 class="junction-regular"><?=$lang['profile-2']?></h4></label>
                                            <label class="pull-right"><h4><?=$nombres." ".$apellidos?></h4></label><br>
                                        
                                        <label><h4 class="junction-regular"><?=$lang['profile-3']?></h4></label>
                                            <label class="pull-right"><h4><?=$user?></h4></label><br>
                                        
                                        <label><h4 class="junction-regular"><?=$lang['profile-4']?></h4></label>
                                            <label class="pull-right"><h4><?=$correo?></h4></label><br>
                                        
                                        <label><h4 class="junction-regular"><?=$lang['profile-5']?></h4></label>
                                            <label class="pull-right"><h4><?=$nacimiento?></h4></label><br>
                                        
                                        <label><h4 class="junction-regular"><?=$lang['profile-6']?></h4></label><br>
                                            <label class="pull-right"><h4><?=$descripcion?></h4></label><br>
                                        
                                        <label><h4 class="junction-regular"><?=$lang['profile-7']?></h4></label>
                                            <label class="pull-right"><h4><?=$tip?></h4></label><br>
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