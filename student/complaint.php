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
    include "auto.php";
    include "../assets/includes/lang.php";
?>

<!DOCTYPE html>
<html lang="en">
    <?php
    if(!isset($_POST["curso"]))
    {
        ?>
    <script>

window.location.assign("index.php");

    </script>
    <?php
    }
    ?>
	<head>
		<!--Core CSS-->
		<?php
            // Titulo de esta página:
            $titulodelapagina = "Denunciar cursos";
			include 'main_css.php';
		?>
		<!--/#Core CSS-->

		<!--Custom CSS-->
		<link href="../assets/css/sidebar.css" rel="stylesheet">
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
                    <?php
                        $selectedcourse = $_POST["curso"];

                    if ($stmt10 = $mysqli->prepare("SELECT curso.idcurso AS curido, curso.idprofesor AS curtut, curso.nombre AS curtitle, usuarios_tb.idusuario AS tutid, usuarios_tb.nombres AS tutname, usuarios_tb.apellidos AS tutsurname, usuarios_tb.usuario AS tutusr FROM `curso` INNER JOIN usuarios_tb ON curso.idprofesor = usuarios_tb.idusuario WHERE curso.idcurso = ?")) 
                        {
                            $stmt10->bind_param('s', $selectedcourse);
                            $stmt10->execute(); 
                            $stmt10->store_result();
                            $stmt10->bind_result($curido, $curtut, $curtitle, $tutid, $tutname, $tutsurname, $tutusr);
                            $stmt10->fetch();
                        }   
                        
                        ?>
                        <h1 class='junction-bold text-warning text-center'><?=$langprint['dentitle']?> <?=$curtitle?>?</h1>
                        <div class="col-sm-8 col-sm-offset-2">
                        <form action="complaint-process.php" method="post">
                            <input type="hidden" value="<?=$_SESSION['user_id']?>" name="denusr">
                            <input type="hidden" value="<?=$selectedcourse?>" name="dencur">
                            <!-- Multiple Radios -->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="radios"><?=$langprint['dentype']?></label>
                              <div class="col-md-8">
                                <div class="radio">
                                    <label for="radios-0">
                                        <input name="dentype" id="radios-0" value="1" checked="checked" type="radio">
                                        <?=$langprint["denop2"]?>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="radios-1">
                                        <input name="dentype" id="radios-1" value="2" type="radio">
                                        <?=$langprint["denop1"]?>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="radios-2">
                                        <input name="dentype" id="radios-2" value="3" type="radio">
                                        <?=$langprint["denop3"]?>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="radios-3">
                                        <input name="dentype" id="radios-3" value="4" type="radio">
                                        <?=$langprint["denop4"]?>
                                    </label>
                                </div>
                              </div>
                            </div>

                            <!-- Textarea -->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="dendesc"><?=$langprint["dendesc"]?></label>
                              <div class="col-md-8">                     
                                <textarea class="form-control" id="textarea" name="dendesc" maxlength="200"></textarea>
                              </div>
                            </div>
                            <br>
                            <!-- Button -->
                            <div class="form-group">
                              <div class="col-md-4 btn-block pull-right">
                                <input type="submit" id="envden" name="envden" class="btn btn-default" value="<?=$langprint["denconfirm"]?>">
                              </div>
                            </div>
                        </form>
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
	</body>
</html>