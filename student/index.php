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
                                            <h3 class="panel-title">Courses Feed</h3>
                                    </div>
                                    <div class="panel-body">
                                        <!--Cursos-->
                                            <?php
                                                $stmt = $mysqli->query("SELECT * FROM `curso-estudiante` INNER JOIN `curso` ON curso-estudiante.idcurso = curso.idcurso  WHERE idestudiante = '".$idusuario."'");
                                            ?>
                                        <!--/#Cursos-->
                                        <div class='well col-sm-12'> 
                                             <div class='col-md-2 full'> 
                                                 <div class='' href='#'> 
                                                    <img class='img-responsive' src='../assets/img/avatares/15.png' alt=''> 
                                                    <div class='caption'>
                                                        <button class="btn btn-success form-control">Profile</button>
                                                    </div>
                                                 </div> 
                                             </div> 
                                             <div class='col-md-10 full'>
                                                 <div class="col-xs-6 full">
                                                    <div class="panel panel-success">  
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">Information</h3>
                                                        </div>
                                                        <div class="panel-body">
                                                            <h2 class="junction-bold full">Nombre</h2>
                                                            <h3 class="full">Usuario</h3>
                                                            <p class="text-justify">jhdgjshdgajsdgjagdjahgsdjhgjsdhgajshgdjahsgdjahgsjdhgasjdgjahsgdjahgsdjhagsjdhgajshdgajshgdjahsgdjahgsjdhgajshdgjashgdj</p>
                                                        </div>
                                                    </div>
                                                 </div>
                                                 <div class="col-xs-6 full">
                                                    <div class="panel panel-success">  
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">Lessons</h3>
                                                        </div>
                                                        <div class="panel-body full">
                                                            <div class="list-group">
                                                                <a href="#" class="list-group-item">
                                                                    Cras justo odio
                                                                </a>
                                                                <a href="#" class="list-group-item">
                                                                    Dapibus ac facilisis in
                                                                </a>
                                                                <a href="#" class="list-group-item">
                                                                    Morbi leo risus
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                 </div>
                                             </div> 
                                         </div> 
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