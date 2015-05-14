<?php
    include_once '../assets/includes/db_conexion.php';
    include_once '../assets/includes/funciones.php';
    sec_session_start();
    $user = $_SESSION['username'];
    $avatar = '';
    if ($stmt = $mysqli->prepare("SELECT avatar, nombres, apellidos, nacimiento, descripcion, correo, tipo, lang, idusuario  FROM usuarios_tb WHERE usuario = ?")) 
    {
        $stmt->bind_param('s', $user);
        $stmt->execute(); 
        $stmt->store_result();
        $stmt->bind_result($avatar,$nombres,$apellidos,$nacimiento,$descripcion,$correo,$tipo,$lang, $idusuario);
        $stmt->fetch();
        
    }
?>
<!--

Copyright (c) 2015 Blink
All Rights Reserved
 
This product is protected by copyright and distributed under
licenses restricting copying, distribution, and decompilation.

Gerardo López | Iván Nolasco | Renato Andres

-->

<!DOCTYPE html>
<html lang="en">
	<head>
		<!--Core CSS-->
		<?php
            // Titulo de esta página:
            $titulodelapagina = "Editar mis datos personales";
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
                    <h2 class="junction-bold text-center">Editar mis datos personales</h2>
                        <p class="junction-light text-center">En este espacio puedes editar toda tu información de tu cuenta. Sí deseas cambiar el tema del editor de código, debes ir <a href="cod_theme.php">aquí</a></p>
                        <form action="mydata.php" method="post">
                        <div class="col-md-6" >
                            <h3 class="junction-regular text-center">Información pública</h3>
                            <label>Nombres</label><input type="text" name = "nombre" id = "nombre" class="form-control" value="<?=$nombres?>" required>        
                            <label>Apellido</label><input type="text" name = "apellido" id = "apellido" class="form-control" value="<?=$apellidos?>" required>
                            <label>Descripción</label><textarea name="desc" class="form-control" required><?=$descripcion?></textarea>
                            <br>
                        </div>
                        <div class="col-md-6" >
                            <h3 class="junction-regular text-center">Seguridad</h3>
                            <label>Contraseña actual *</label><input type="password" name = "apellido" id = "apellido" class="form-control"  required>
                            <label>Contraseña nueva</label><input type="password" name = "apellido" id = "apellido" class="form-control"  required>
                            <label>Repetir contraseña nueva</label><input type="password" name = "apellido" id = "apellido" class="form-control"  required>
                            <br>
                            <small>*Debes llenar el campo de contraseña para poder guardar los cambios.</small>
                        </div>
                        <div class="col-md-12" >
                            <input type="submit" class="btn btn-success btn-block" name="b1" value="Guardar">
                        </div>
                        </form>
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
