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
    $elidespecial = $_SESSION['user_id'];
    $avatar = '';
    if ($stmt = $mysqli->prepare("SELECT usuarios_tb.avatar, usuarios_tb.nombres, usuarios_tb.apellidos, usuarios_tb.nacimiento, usuarios_tb.descripcion, usuarios_tb.correo, usuarios_tb.tipo, usuarios_tb.lang, usuarios_tb.idusuario, user_config.banner, user_config.iduser FROM usuarios_tb INNER JOIN user_config ON usuarios_tb.idusuario = user_config.iduser WHERE usuarios_tb.idusuario = ?")) 
    {
        $stmt->bind_param('s', $elidespecial);
        $stmt->execute(); 
        $stmt->store_result();
        $stmt->bind_result($avatar,$nombres,$apellidos,$nacimiento,$descripcion,$correo,$tipo,$lang,$idusuario,$bannero,$iduserconf);
        $stmt->fetch();
        
    }
    $dir = "../users/" . $user . "/img/";
    $dir1 = "../users/" . $user . "/video/";
    function printimg($dir){
        $directorio = opendir($dir); //ruta actual
        while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
        {
            if (!is_dir($archivo))
            {
                switch(substr($archivo,-4)) 
                {
                    case ".mp4":
                    case ".jpg":
                    case ".png":
                    case ".gif":
                    case "webm":
                    case ".ogg":
                    case ".JPG":
                    case "JPEG":
                    case "jpeg":
                    echo "<tr>";
                        echo "<td>";
                            echo "<img style='width:100px;' src='". $dir . $archivo . "'>";
                        echo "</td>";
                        echo "<td>";
                            echo $archivo;
                        echo "</td>";
                        echo "<td>";
                            echo "  <a href='". $dir . $archivo . "'><button class='btn btn-sm btn-info'><i class='fa fa-eye'></i></button></a>
                                    <a href='func/delete_file.php?f=". $archivo . "'><button class='btn btn-sm btn-danger'><i class='fa fa-trash-o'></i></button></a>
                                    <a target='_blank' href='func/download.php?f=". $archivo . "'><button class='btn btn-sm btn-success'><i class='fa fa-arrow-down'></i></button></a>";
                        echo "</td>";
                    echo "<tr>";
                    break;
                }
            }
        }
    }
    function printvideo($dir){
        $directorio = opendir($dir); //ruta actual
        while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
        {
            if (!is_dir($archivo))
            {
                switch(substr($archivo,-4)) 
                {
                    case ".mp4":
                    case ".jpg":
                    case ".png":
                    case ".gif":
                    case "webm":
                    case ".ogg":
                    case ".JPG":
                    case "JPEG":
                    case "jpeg":
                        echo "<option/>" . $archivo . "</option>";
                    break;
                }
            }
        }
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
            <style>
                .btn-file {
                    position: relative;
                    overflow: hidden;
                }
                .btn-file input[type=file] {
                    position: absolute;
                    top: 0;
                    right: 0;
                    min-width: 100%;
                    min-height: 100%;
                    font-size: 100px;
                    text-align: right;
                    filter: alpha(opacity=0);
                    opacity: 0;
                    outline: none;
                    background: white;
                    cursor: inherit;
                    display: block;
                }
                td{
                    vertical-align:middle !important;
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
                        <div class="col-xs-12 well">
                            <p>Si deseas subir imagenes y videos para utilizarlos en su propia pagina web o para completar sus lecciones lo puede hacer desde aqui</p>
                            <form action="#" style="display: -webkit-box;" enctype="multipart/form-data" method="post">
                                <span class="btn btn-success btn-file">
                                    Seleccionar archivo <input type="file">
                                </span>
                            </form>
                        </div>
                        <div class="col-sm-6 ">
                            <div class="panel panel-info transparent">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Fotos</h3>
                                </div>
                                <div class="panel-body" style="border:1px solid #5bc0de;">
                                    <table class="table table-hover">
                                        <thead>
                                            <th><h4>Imagen</h4></th>
                                            <th><h4>Nombre</h4></th>
                                            <th><h4>Acciones</h4></th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                printimg($dir);
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 ">
                            <div class="panel panel-primary transparent" >
                                <div class="panel-heading">
                                    <h3 class="panel-title">Videos</h3>
                                </div>
                                <div class="panel-body" style="border:1px solid #df691a;">
                                    Panel content
                                </div>
                            </div>
                        </div>
					<!--Content-->
                        
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