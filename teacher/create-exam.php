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
    include_once 'func/print_form_question.php';
    sec_session_start();
    include "auto.php";
    $user = $_SESSION['username'];
    $userid = $_SESSION['user_id'];
    $tipo = $_SESSION['tipo'];
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
    if(!isset($_GET['id']))
    {
        
    }
    include "../assets/includes/lang.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!--Core CSS-->
		<?php 
            $titulodelapagina = "¡Bienvenido $user!";
			include 'main_css.php';
            include 'main_js.php';
        ?>
        
		<!--/#Core CSS-->

		<!--Custom CSS-->
		<link href="../assets/css/sidebar.css" rel="stylesheet">
		<!--/#Custom CSS-->

	</head>
	<body>
        <style>
            
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
            <div id="page-content-wrapper" style="padding-top:15px;">
                <form action="func/procesar.php" method="post">
                    <?php
                        
                    ?>
                    <div class="col-sm-3">
                        <div class="well">
                            <h3>Examenes</h3>
                            <p>En esta seccion podras crear un examen teorico para tu curso. Para comenzar, primero ingresa el numero de preguntas que deseas ingresar.</p>
                        </div>
                        <div class="well">
                            <h3>Configuraciones</h3>
                            <p>Nombre del examen</p>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre del examen" style="margin-bottom:10px;" required>
                            <hr>
                            <input type="hidden" name="curso" value="<?=$_GET['id']?>">
                            <input type="submit" value="Enviar" class="btn btn-success form-control">
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="well" id="preguntas">
                            <?php 
                                print_preguntas(10);
                            ?>
                        </div>
                    </div>
                </form>
			<!--/#Page Content -->
            </div>
		</div>
		<!--Main js-->
		<?php 
			include 'main_js.php';
		?>
        <script src="../assets/js/bootbox.min.js"></script>
	</body>
</html>