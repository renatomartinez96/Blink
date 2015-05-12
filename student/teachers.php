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
    if ($stmt = $mysqli->prepare("SELECT idusuario, avatar, nombres, apellidos, nacimiento, descripcion, correo, tipo, lang  FROM usuarios_tb WHERE usuario = ?")) 
    {
        $stmt->bind_param('s', $user);
        $stmt->execute(); 
        $stmt->store_result();
        $stmt->bind_result($idusuario, $avatar,$nombres,$apellidos,$nacimiento,$descripcion,$correo,$tipo,$lang);
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
        <style>
            #usrpanel{
                background: #191837 url(../assets/img/profile1.jpg) fixed;
                color:#fff;
                background-position: bottom left;
                background-size:100%;
            }
            .usrnav{
                background-color: transparent  !important;
                border-color: transparent  !important;
                margin-bottom:0px;
                
            }

        </style>
		<!--/#Custom CSS-->

	</head>
	<body>
        <!--Topbar -->
        <div class="col-sm-12">
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="navbar-header">
                    <a href="#menu-toggle" class="btn btn-primary" id="menu-toggle" style="float:left;margin-top:2px;margin-bottom:2px; margin-right:5px;border-radius:0px;margin-left:5px;"><i class="fa fa-bars fa-2x"></i></a>
                    <a class="navbar-brand"><img src="../assets/img/brand1.png"</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-left" style="margin-top:7px;">
                        <li><a href="#subs">Mis profesores</a></li>
                        <li><a href="#teach">Profesores</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a style="margin-right: 25px; margin-top: 6px;" href="../assets/includes/logout.php" role="button">logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
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
                        <div class="panel col-xs-12 full">
                            <div class="panel-heading full" style="border-bottom: 0px;">
                                <div class="jumbotron text-center" id="usrpanel" style="margin-bottom: 0px;">
                                    <h2 class="junction-bold">Tutores</h2>
                                    <h4 class="junction-light">En esta seccion puedes buscar y suscribirte a diferentes tutores para comenzar a aprender.</h4>
                                    <center><div class="form-group full text-center" style="width:50%;">
                                        <input type="text" class="form-control" placeholder="Buscar" autocomplete="off" id="SearchStringT"> 
                                        <div class="list-group" id="SearchResult"></div>
                                    </div></center>
                                </div>
                            </div>
                        </div>
                        <!--Subscripciones-->
                        <section id="subs" name="subs">
                            <div class="col-xs-12 full">
                                <div class="panel panel-success full">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Subscripciones</h3>
                                    </div>
                                    <div class="panel-body" onload="loadteachers()" id="subsc">
                                         <?php
                                            $stmt = $mysqli->query("SELECT * FROM `docente-estudiante` WHERE idEstudiante = '".$idusuario."'");
                                            if ($stmt->num_rows > 0)
                                            {
                                                while($row = $stmt->fetch_assoc())
                                                {
                                                    if($stmt1 = $mysqli->prepare("SELECT usuario, avatar, nombres, apellidos, descripcion, correo  FROM usuarios_tb WHERE idusuario = ?")) 
                                                    {
                                                        $stmt1->bind_param('s', $row['idDocente']);
                                                        $stmt1->execute(); 
                                                        $stmt1->store_result();
                                                        $stmt1->bind_result($user1,$avatart,$nombrest,$apellidost,$descripciont,$correot);
                                                        $stmt1->fetch();
                                                        echo "
                                                            <div class='col-sm-6'> 
                                                                 <div class='col-md-5'> 
                                                                     <a href='#'> 
                                                                        <img class='img-responsive img-thumbnail' src='../assets/img/avatares/".$avatart.".png' alt=''> 
                                                                     </a> 
                                                                 </div> 
                                                                 <div class='col-md-7'> 
                                                                     <h3 class='junction-bold'>".$nombrest."</h3> 
                                                                     <h4 class='junction-bold'>".$user1."</h4> 
                                                                     <p>".$correot."</p> 
                                                                     <p class='text-justify'>".$descripciont."</p> 
                                                                     <a  href='./perfil.php?t=".$user1."'><button class='btn btn-primary'>Perfil <span class='glyphicon glyphicon-chevron-right'></span></button></a> 
                                                                     <button type='button' class='btn btn-danger' onclick=\"return bootbox.confirm('Estas seguro que deseas eliminar tu suscripcion?', function(result) {if(result==true){unsuscribe(".$row['idDocente'].",".$idusuario.")}})\">Eliminar suscripcion</button>
                                                                 </div> 
                                                             </div> 
                                                        ";
                                                    }
                                                }
                                            }
                                            else
                                            {
                                                echo "<h1>No estas subscrito a ningun profesor</h1>";
                                            }
                                        ?>
 

                                    </div>
                                </div>
                            </div>
                        </section>
                        <!--/#Subscripciones-->
                        <!--Profesores-->
                        <section id="teach" name="teach">
                             <div class="col-xs-12 full">
                                <div class="panel panel-success full">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Profesores</h3>
                                    </div>
                                    <div class="panel-body">
                                        <?php
                                            if ($stmt2 = $mysqli->query("SELECT * FROM usuarios_tb WHERE tipo = 2 "))
                                            {
                                                while($row2 = $stmt2->fetch_assoc()){
                                                    $stmt3 = $mysqli->query("SELECT * FROM `docente-estudiante` WHERE idEstudiante = '".$idusuario."' AND idDocente = '".$row2['idusuario']."'");
                                                    $num = $stmt3->num_rows;
                                                    if ($num > 0)
                                                    {
                                                        echo "
                                                            <div class='col-sm-6 col-md-4' style='background:#4e5d6c;'>
                                                                <div class='thumbnail col-xs-4' style='background:#4e5d6c;'>
                                                                    <img src='../assets/img/avatares/".$row2['avatar'].".png' class='img-thumbnail'>
                                                                    <div class='caption full'>
                                                                        <button type='button' class='btn btn-danger form-control' onclick=\"return bootbox.confirm('Estas seguro que deseas eliminar tu suscripcion?', function(result) {if(result==true){unsuscribe(".$row2['idusuario'].",".$idusuario.")}})\">Eliminar suscripcion</button>
                                                                        <a href='./perfil.php?t=".$row2['usuario']."'><button type='button' class='btn btn-info form-control'>Perfil</button></a>
                                                                    </div>
                                                                </div>
                                                                <div class='col-xs-8'>
                                                                    <h3>".$row2['nombres']."</h3>
                                                                    <h5 class='text-justify'>".$row2['descripcion']."</h5>
                                                                </div>
                                                            </div>
                                                            ";
                                                    }
                                                    else
                                                    {
                                                        echo "
                                                            <div class='col-sm-6 col-md-4' style='background:#4e5d6c;'>
                                                                <div class='thumbnail col-xs-4' style='background:#4e5d6c;'>
                                                                    <img src='../assets/img/avatares/".$row2['avatar'].".png' class='img-thumbnail'>
                                                                    <div class='caption full'>
                                                                        <button type='button' class='btn btn-success form-control' onclick=\"return bootbox.confirm('Estas seguro que deseas suscribirte?', function(result) {if(result==true){suscribe(".$row2['idusuario'].",".$idusuario.")}})\">Suscribirse</button>
                                                                        <a href='./perfil.php?t=".$row2['usuario']."'><button type='button' class='btn btn-info form-control'>Perfil</button></a>
                                                                    </div>
                                                                </div>
                                                                <div class='col-xs-8'>
                                                                    <h3>".$row2['nombres']."</h3>
                                                                    <h5 class='text-justify'>".$row2['descripcion']."</h5>
                                                                </div>
                                                            </div>
                                                            ";
                                                    }
                                                }
                                            }
                                        ?>
                                    </div>
                                 </div>
                            </div>
                        </section>
                        
                        <!--/#Profesores-->
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
        <script src="./assets/ajax/index.js"></script>
        <script src="../assets/js/bootbox.min.js"></script>
	</body>
</html>