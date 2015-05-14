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
        <link href="../assets/css/editor.css" rel="stylesheet">
		<!--/#Custom CSS-->

	</head>
	<body>
        <style>
        body {
            background: #fff;
        }
        </style>
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
                        <div class="col-sm-7 full">
                            <div class="panel panel-success full">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong class="junction-light">HTML</strong>(HyperText Markup Language)</h3>
                                </div>
                                <div class="panel-body full">
                                    <pre id="editor"><?php echo htmlentities(file_get_contents("../users/".$user."/index.html")); ?></pre>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-5 full">
                            <div class="panel panel-success full">
                                <div class="panel-heading ">
                                    <h3 class="panel-title"><strong class="junction-light">CSS</strong>(Cascading Style Sheets)</h3>
                                </div>
                                <div class="panel-body full">
                                    <pre id="editor2"><?php echo htmlentities(file_get_contents("../users/".$user."/css/index.css")); ?></pre>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 full">
                            <div class="panel panel-success full">
                                <div class="panel-heading ">
                                    <h3 class="panel-title"><strong class="junction-light">Result </strong><input type="button" id="act" class="btn btn-default btn-sm" value="Update"></h3>
                                </div>
                                <div class="panel-body full" style="background:#fff">
                                    <iframe src="../users/<?=$user?>/index.html" class="full col-sm-12 resultc" id="resultc"></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-success full">
                            <div class="panel-heading ">
                                <h3 class="panel-title"><strong class="junction-light">Result </strong><input type="button" id="act" class="btn btn-default btn-sm" value="Update"></h3>
                            </div>
                            <div class="panel-body full">
                                <div id="manager"></div>
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
        <script src="../assets/ace/ace.js" type="text/javascript" charset="utf-8"></script>
		<!--/#Editor js-->
	</body>
</html>