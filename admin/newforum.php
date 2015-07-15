<!--

Copyright (c) 2015 Box Link
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
    include "auto.php";
    include "../assets/includes/lang.php";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!--Core CSS-->
		<?php
            // Titulo de esta página:
            $titulodelapagina = "Box Link Administration";
			include 'main_css.php';
		?>
        <!--Custom css-->
        <link href="../assets/css/sidebar.css" rel="stylesheet">
        <link href="../assets/css/perfil.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/includes/ckeditor/samples/css/samples.css">
	    <link rel="stylesheet" href="../assets/includes/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
        
        <!--/#Custom css-->
		<!--/#Core CSS-->
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
            <style>
            body{
                color:#fff;    
            }
            </style>
			<!--Page Content -->
            <div id="page-content-wrapper">
				<div class="container-fluid">
					<div class="row">
                        <form action="func/save-forum.php" method="post">
                            <div class="jumbotron text-center">
                                <h3 style="color:#fff;" class="junction-regular">Creacion de nuevo foro</h3>
                            </div>
                        
                            <div class="col-sm-6 col-sm-offset-3" style="margin-bottom:20px;">
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="name">Name</label>
                                    <div class="col-lg-10">
                                        <input type='text' name='name' id='name' placeholder='Name' class='form-control' required/>
                                    </div>
                                </div><br>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="nombre">Nombre</label>
                                    <div class="col-lg-10">
                                        <input type='text' name='nombre' id='nombre' placeholder='Nombre' class='form-control' required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="nombre">Lenguaje</label>
                                    <div class="col-lg-10">
                                        <select name="lang">
                                            <option value="0">HTML</option>
                                            <option value="1">CSS</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-sm-12" style="margin-bottom:20px;">
                                <div class="col-sm-6">
                                    <div class="well text-center" style="margin-bottom:0px;">
                                        <h3 class="junction-light">Español</h3>
                                    </div>
                                    <textarea name="editor1" required></textarea>
                                </div>
                                <div class="col-sm-6">
                                    <div class="well text-center" style="margin-bottom:0px;">
                                        <h3 class="junction-light">Inglés</h3>
                                    </div>
                                    <textarea name="editor2" required></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 text-center">
                                <input type="submit" value="Enviar" class="btn btn-success">
                            </div>
                        </form>
                    </div><!--row-->
                </div>
            </div>
        </div>
        <!--Main js-->
		<?php
            include 'main_js.php';
        ?>
		<!--/#Main js-->
        <!--Custom js-->
            <script src="//cdn.ckeditor.com/4.5.1/full/ckeditor.js"></script>
            <script>
                /**
                 * Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
                 * For licensing, see LICENSE.md or http://ckeditor.com/license
                 */
                CKEDITOR.replace( 'editor1');
                CKEDITOR.replace('editor2');
            </script>
        <!--/#Custom js-->
	</body>
</html>
