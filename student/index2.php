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
        $files = 0;
        while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
        {

            if (!is_dir($archivo))
            {
                switch(substr($archivo,-4))
                {
                    case ".jpg":
                    case ".png":
                    case ".gif":
                    case ".JPG":
                    case "JPEG":
                    case "jpeg":
                    $files++;
                    echo "<div class='col-md-4 full '>";
                        echo "<div class='thumbnail transparent'>";
                            echo "<div class='imagenes view'>";
                                echo "<img  class='imgs' style='display:block;max-width:100%;' src='". $dir . $archivo . "'>";
                                echo "<div class='mask'>";
                                    echo $archivo;
                                        echo "<div class='col-xs-12 full'>";
                                            echo "  <a target='_blank' href='". $dir . $archivo ."'><button class='btn btn-sm btn-info'><i class='fa fa-eye'></i></button></a>
                                                <a href='func/delete_file.php?f=". $archivo . "&v'><button class='btn btn-sm btn-danger'><i class='fa fa-trash-o'></i></button></a>
                                                <a target='_blank' href='func/download.php?f=". $archivo . "&v'><button class='btn btn-sm btn-success'><i class='fa fa-arrow-down'></i></button></a>";
                                        echo "</div>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                    break;
                }
            }
        }
        if($files == 0)
        {
            echo "No se han encontrado archivos";
        }
    }
    function printvid($dir){
        $directorio = opendir($dir); //ruta actual
        $files = 0;
        while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
        {
            if (!is_dir($archivo))
            {
                switch(substr($archivo,-4))
                {
                    case ".mp4":
                    case "webm":
                    case ".ogg":
                    $files++;
                        echo "<div class='col-md-4 full '>";
                            echo "<div class='thumbnail transparent'>";
                                echo "<div class='imagenes view'>";
                                    echo "<img  class='imgs' style='display:block;max-width:100%;' src='". $dir . "/thumbs/" . substr($archivo,0,6) . ".gif'>";
                                    echo "<div class='mask'>";
                                        echo $archivo;
                                            echo "<div class='col-xs-12 full'>";
                                                echo "  <a target='_blank' href='". $dir . $archivo ."'><button class='btn btn-sm btn-info'><i class='fa fa-play'></i></button></a>
                                                    <a href='func/delete_file.php?f=". $archivo . "&v'><button class='btn btn-sm btn-danger'><i class='fa fa-trash-o'></i></button></a>
                                                    <a target='_blank' href='func/download.php?f=". $archivo . "&v'><button class='btn btn-sm btn-success'><i class='fa fa-arrow-down'></i></button></a>";
                                            echo "</div>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    break;
                }
            }
        }
        if($files == 0)
        {
            echo "No se han encontrado archivos";
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
                .imagenes{
                    padding:0;
                    margin:0;
                    background-color:#fff;
                    -moz-box-sizing:border-box;
                    box-sizing:border-box;
                    overflow:hidden;
                    height:150px;
                    text-align: -webkit-center;
                    position:relative;
                }
                .imagenes > img{
                    position:absolute;
                    top:0;
                    bottom:0;
                    left:0;
                    right:0;
                    margin:auto;
                    display:block;
                    max-width:100%;
                    max-height:100%;
                }
                .mask{
                    padding-top:45px;
                    width:100%;
                    height:100%;
                    position:absolute;
                    text-align:center;
                    opacity:0;
                    -webkit-transition: all 0.3s ease-out;
                    -moz-transition: all 0.3s ease-out;
                    -o-transition: all 0.3s ease-out;
                    transition: all 0.3s ease-out;
                }
                .mask:hover{
                    opacity:1;
                    -webkit-transition: all 0.3s ease-out;
                    -moz-transition: all 0.3s ease-out;
                    -o-transition: all 0.3s ease-out;
                    transition: all 0.3s ease-out;
                    background:rgba(43, 62, 80, 0.6);
                }
                .thumbnail{
                    margin-bottom:0px !important;
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
                            <form action="func/upload_file.php?files" style="display: -webkit-box;"  enctype="multipart/form-data" method="post">
                                <span class="btn btn-info btn-file">
                                    Seleccionar archivo <input type="file" name="file" accept='image/*|video/*' required multiple>
                                </span>
                                <input type="submit" value="subir" class="btn btn-success">
                            </form>
                        </div>
                        <div class="col-sm-6 ">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-camera"></i> Fotos</h3>
                                </div>
                                <div class="panel-body">
                                    <?php
                                        printimg($dir);
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="panel panel-primary" >
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-video-camera"></i> Videos</h3>
                                </div>
                                <div class="panel-body">
                                    <?php
                                        printvid($dir1);
                                    ?>
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
