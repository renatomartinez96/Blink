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
    include "auto.php";
    include "../assets/includes/lang.php";
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
                        <div class="panel col-xs-12 full">
                            <div class="panel-heading full" style="border-bottom: 0px;">
                                <div class="jumbotron text-center" id="usrpanel" style="margin-bottom: 0px;">
                                    <h2 class="junction-bold"><?=$langprint['teachers-page-title']?></h2>
                                    <h4 class="junction-light"><?=$langprint['teachers-page-description']?></h4>
                                    <center><div class="form-group full text-center" style="width:50%;">
                                        <input type="text" class="form-control" placeholder="<?=$langprint['teachers-page-search']?>" autocomplete="off" id="SearchStringT"> 
                                        <div class="list-group" id="SearchResult"></div>
                                    </div></center>
                                </div>
                            </div>
                        </div>
                        <!--Subscripciones-->
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-md-4 col-xs-12 full">
                                    <div class="panel panel-success">
                                        <div class="panel-heading">
                                        <h3 class="panel-title"><?=$langprint['teachers-page-panel-subs']?></h3>
                                        </div>
                                        <div class="panel-body" onload="loadteachers()" id="subsc">
                                        <?php
                                            $stmt = $mysqli->query("SELECT * FROM `docente-estudiante` WHERE idEstudiante = '".$idusuario."'");
                                            if ($stmt->num_rows > 0)
                                            {
                                                while($row = $stmt->fetch_assoc())
                                                {
                                                    if($stmt1 = $mysqli->prepare("SELECT usuario, avatar, nombres, apellidos, descripcion, correo  FROM usuarios_tb WHERE idusuario = ? AND estado = 1")) 
                                                    {
                                                        $stmt1->bind_param('s', $row['idDocente']);
                                                        $stmt1->execute(); 
                                                        $stmt1->store_result();
                                                        $stmt1->bind_result($user1,$avatart,$nombrest,$apellidost,$descripciont,$correot);
                                                        $stmt1->fetch();
                                                        echo "
                                                                <div class='col-xs-12' style='margin-bottom: 10px;'>
                                                                 <div class='col-md-5'> 
                                                                     <a href='#'> 
                                                                        <img class='img-responsive img-thumbnail' src='../assets/img/avatares/".$avatart.".png' alt=''> 
                                                                     </a> 
                                                                 </div> 
                                                                 <div class='col-md-7'> 
                                                                     <p class='junction-regular'>".$nombrest." ".$apellidost."</p> 
                                                                     <p class='junction-light'>".$user1."</p> 
                                                                     <a  href='./profile.php?user=".$user1."'><button class='btn btn-primary btn-xs'>Perfil <span class='glyphicon glyphicon-chevron-right'></span></button></a> <button type='button' class='btn btn-danger btn-xs' onclick=\"return bootbox.confirm('Estas seguro que deseas eliminar tu suscripcion?', function(result) {if(result==true){unsuscribe(".$row['idDocente'].",".$idusuario.")}})\"><i class='fa fa-times'></i></button>
                                                                 </div>  
                                                                 </div>
                                                        ";
                                                    }
                                                }
                                            }
                                            else
                                            {
                                                echo "<h1>" . $langprint['teachers-page-non-subs'] . "</h1>";
                                            }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 col-xs-12 full">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                        <h3 class="panel-title"><?=$langprint['teachers-page-panel-teachs']?></h3>
                                        </div>
                                        <div class="panel-body">
                                        <?php
                                            if ($stmt2 = $mysqli->query("SELECT * FROM usuarios_tb INNER JOIN examenes ON usuarios_tb.usuario = examenes.usuario WHERE usuarios_tb.tipo = 2  AND usuarios_tb.estado = 1"))
                                            {
                                                while($row2 = $stmt2->fetch_assoc()){
                                                    if($row2['nota'] >= 8)
                                                    {
                                                    $stmt3 = $mysqli->query("SELECT * FROM `docente-estudiante` WHERE idEstudiante = '".$idusuario."' AND idDocente = '".$row2['idusuario']."'");
                                                    $num = $stmt3->num_rows;
                                                    if ($num > 0)
                                                    {
                                                        echo "
                                                            <div class='col-sm-6 col-md-4' style='background:#4e5d6c;'>
                                                                <div class='thumbnail col-xs-12' style='background:#4e5d6c;'>
                                                                    <img src='../assets/img/avatares/".$row2['avatar'].".png' class='img-thumbnail'>
                                                                    <div class='caption full'>
                                                                        <h3 class='text-center'>".$row2['nombres']."</h3>
                                                                        <p class='text-center'>".$row2['usuario']."</p>
                                                                        <p class='text-center'>Nota: <strong>".$row2['nota']."</strong></p>
                                                                        <button type='button' class='btn btn-danger form-control btn-block' onclick=\"return bootbox.confirm('Estas seguro que deseas eliminar tu suscripcion?', function(result) {if(result==true){unsuscribe(".$row2['idusuario'].",".$idusuario.")}})\"><i class='fa fa-times'></i></button>
                                                                        <a href='./profile.php?user=".$row2['usuario']."' class='btn btn-info form-control btn-block'>Perfil</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            ";
                                                    }
                                                    else
                                                    {
                                                        echo "
                                                            <div class='col-sm-6 col-md-4' style='background:#4e5d6c;'>
                                                                <div class='thumbnail col-xs-12' style='background:#4e5d6c;'>
                                                                    <img src='../assets/img/avatares/".$row2['avatar'].".png' class='img-thumbnail'>
                                                                    <div class='caption full'>
                                                                        <h3 class='text-center'>".$row2['nombres']."</h3>
                                                                        <p class='text-center'>".$row2['usuario']."</p>
                                                                        <p class='text-center'>Nota: <strong>".$row2['nota']."</strong></p>
                                                                        <button type='button' class='btn btn-success btn-block form-control' onclick=\"return bootbox.confirm('Estas seguro que deseas suscribirte?', function(result) {if(result==true){suscribe(".$row2['idusuario'].",".$idusuario.")}})\"><i class='fa fa-user-plus'></i></button>
                                                                        <a href='./profile.php?user=".$row2['usuario']."' class='btn btn-info form-control btn-block'>Perfil</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            ";
                                                    }
                                                    }
                                                }
                                            }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/#Subscripciones-->
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