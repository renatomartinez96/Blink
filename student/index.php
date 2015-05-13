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
            .lecciones{
                min-height:175px;
                overflow:scroll;
                overflow-x:hidden;
                margin-bottom:0px;
            }
            .transparent{
                background-color:transparent !important;
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
                                <i class="fa fa-cog fa-2x" style="position:absolute; bottom:5px; left:5px;"></i>
                                <div class="jumbotron text-center" id="usrpanel" style="margin-bottom: 0px;">
                                        <div class="container-fluid full">
                                                <ul class="nav navbar-nav">
                                                    <li> <a class="btn btn-success" target="_blank" href="../users/<?=$user?>/index.html"><Strong><?=$_SESSION['username']?></Strong>'s page</a></li>
                                                    <li><a class="btn btn-face" target="_blank">Facebook</a></li>
                                                    <li><a class="btn btn-twit" target="_blank">Twitter</a></li>
                                                </ul>

                                                <ul class="nav navbar-nav navbar-right">
                                                    <form class="navbar-form navbar-left" role="search" id="search">
                                                        <div class="form-group full">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-user fa-2x"></i></span>
                                                                <input type="text" class="form-control input-lg" placeholder="Search" autocomplete="off" id="SearchString"> 
                                                            </div>
                                                        </div>
                                                        <div class="list-group" style="position:absolute;" id="SearchResult"></div>
                                                    </form>
                                                </ul>
                                        </div>
                                
                                    <img src="../assets/img/avatares/<?=$avatar?>.png" style="border-radius:50%;width:15%;background: rgba(255, 255, 255, 0.4);">
                                    <h2 class="junction-bold"><?=$nombres?></h2>
                                    <h3 class="junction-bold"><?=$_SESSION['username']?></h3>
                                    <h4 class="junction-light"><?=$descripcion?></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 full">
                            <div class="col-md-12 full">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                            <h3 class="panel-title">Cursos</h3>
                                    </div>
                                    <div style="margin-top:15px;">
                                        <!--Cursos-->
                                            <?php
                                                $stmt = $mysqli->query("SELECT curso.idcurso as id, curso.nombre as nombre, curso.descripcion as descr
                                                                        FROM `curso` 
                                                                        INNER JOIN `cursoestudiante` 
                                                                        ON cursoestudiante.idcurso = curso.idcurso  
                                                                        WHERE cursoestudiante.idestudiante = '".$idusuario."'");
                                                if($result = $stmt->num_rows)
                                                {
                                                    if ($result > 0) 
                                                    {
                                                        while($row = $stmt->fetch_assoc())
                                                        {
                                                            $stmt1 = $mysqli->query("SELECT idleccion, nombre 
                                                                                     FROM `leccion` 
                                                                                     WHERE idcurso = '".$row['id']."'");
                                                            $result1 = $stmt1->num_rows;
                                                            if ($result1 > 0) 
                                                            {
                                                                echo"
                                                                        <div class='col-lg-4 col-md-6 '>
                                                                            <div class='panel panel-info'>
                                                                                <div class='panel-heading'>
                                                                                    <div class='row'>
                                                                                        <div class='col-xs-3'>
                                                                                            <i class='fa fa-trophy fa-5x'></i>
                                                                                        </div>
                                                                                        <div class='col-xs-9 text-right'>
                                                                                            <marquee width='100%' height='100%' scrolldelay='150' class='text-left'><h2>".$row['nombre']."</h2></marquee>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class='panel-body full'>
                                                                                    <div class='list-group lecciones'>";
                                                                    while($row1 = $stmt1->fetch_assoc())
                                                                    {  
                                                                      echo "
                                                                                        <a class='list-group-item' href='../framework/loadlesson.php?l=".$row1['idleccion']."'>".$row1['nombre']."</a>
                                                                            ";
                                                                    }
                                                                  echo "
                                                                                    </div>
                                                                                </div>
                                                                                <a href='#'>
                                                                                    <div class='panel-footer'>
                                                                                        <span class='pull-left'>Ver detalles</span>
                                                                                        <span class='pull-right'><i class='fa fa-arrow-circle-right'></i></span>
                                                                                        <div class='clearfix'></div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                ";
                                                            }
                                                            else
                                                            {
                                                                echo"
                                                                        <div class='col-lg-4 col-md-6 '>
                                                                            <div class='panel panel-info'>
                                                                                <div class='panel-heading'>
                                                                                    <div class='row'>
                                                                                        <div class='col-xs-3'>
                                                                                            <i class='fa fa-trophy fa-5x'></i>
                                                                                        </div>
                                                                                        <div class='col-xs-9 text-right'>
                                                                                            <div><h2>".$row['nombre']."</h2></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class='panel-body full lecciones'>
                                                                                    <div class='alert alert-dismissible alert-danger' style='margin-bottom:0px;'>
                                                                                        <button type='button' class='close' data-dismiss='alert'>x</button>
                                                                                        <strong>no se encontraron lecciones disponibles</strong>
                                                                                    </div>
                                                                                </div>
                                                                                <a href='#'>
                                                                                    <div class='panel-footer'>
                                                                                        <span class='pull-left'>Ver detalles</span>
                                                                                        <span class='pull-right'><i class='fa fa-arrow-circle-right'></i></span>
                                                                                        <div class='clearfix'></div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    ";
                                                            }
                                                        }
                                                    }
                                                    else
                                                    {
                                                        echo "no se han encontrado resultados";
                                                    }
                                                }
                                            ?>
                                        <!--/#Cursos-->
                                        
                                    </div>
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
        <script>
            
        </script>
	</body>
</html>