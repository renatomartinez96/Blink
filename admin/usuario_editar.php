<?php
include_once '../assets/includes/db_conexion.php';
include_once '../assets/includes/funciones.php';
 
sec_session_start();
?>
<?php
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
            $titulodelapagina = "Administración de Blink";
			include 'main_css.php';
		?>
        <!--Custom css-->
        <link href="../assets/css/sidebar.css" rel="stylesheet">
        <link href="../assets/css/perfil.css" rel="stylesheet">
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
			<!--Page Content -->
            <div id="page-content-wrapper">
				<div class="container-fluid">
					<div class="row">
<?php
if(isset($_POST["enviar"]))
{
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $fecha = $_POST["nacimiento"];
    $usuario = $_POST["usuario"];
    $correo = $_POST["correo"];
    $tipo = $_POST["tipo"];
    
    $query2 = "UPDATE usuarios_tb SET nombres='$nombre', apellidos='$apellido', nacimiento='$fecha', usuario='$usuario', correo='$correo', tipo='$tipo' WHERE idusuario=$id";
    if ($query2 = mysqli_query($mysqli, $query2)) 
    {
        die("<p class='text-success'>Perfect! Data saved</p>");
    }
    else
    {
        die("<p class='text-danger'>ERROR</p>");
    }
}
?>
<?php
if(isset($_GET["id"]))
{
    $c=$_GET["id"];
    $query = "SELECT * FROM usuarios_tb WHERE idusuario = $c";
    if ($query = mysqli_query($mysqli, $query)) 
    {
        $row = mysqli_fetch_assoc($query);
        ?>
        <h2 class="junction-regular text-center">Changing the data of: <?=$row["nombres"]?> <?=$row["apellidos"]?></h2>
        <form method="post">
        <div class="col-md-6">
            <label>ID</label><input type="text" name = "id" class="form-control" value="<?=$row['idusuario']?>" readonly>
            <label>Name</label><input type="text" name = "nombre" class="form-control" value="<?=$row['nombres']?>" >
            <label>Lastname</label><input type="text" name = "apellido" class="form-control" value="<?=$row['apellidos']?>" >
            <label>Birthday (YYYY-MM-DD)</label><input type="fecha" name = "nacimiento" class="form-control" value="<?=$row['nacimiento']?>" >
        </div>
        <div class="col-md-6">
            <label>Username</label><input type="text" name = "usuario" class="form-control" value="<?=$row['usuario']?>" >
            <label>Email</label><input type="text" name = "correo" class="form-control" value="<?=$row['correo']?>" >
            <?php
            $texto = "";
            switch ($row["tipo"]){
            case 1;
            $texto = "Administrator";
            break;
            case 2;
            $texto = "Teacher";
            break;
            case 3;
            $texto = "Student";
            break;
            }
            ?>
            <label>Type of user <strong>(Current: <?=$texto?>)</strong></label><select name="tipo" class="form-control"><option value="1">Administrator</option><option value="2">Teacher</option><option value="3">Student</option></select>
            <label>Estatus</label><br><a href="usuario_estado.php?id=<?=$row["idusuario"]?>" target="_blank" class="btn btn-block btn-default"><i class="fa fa-external-link-square"></i> Change status</a>
            </div>
            <div class="col-md-12">
            <br>
            <input type="submit" name="enviar" value="Save changes" class="btn btn-success btn-block">
            </div>
        </form>
        <?php
    }
    else
    {
        echo "<p class='text-danger'>ERROR: Does not exist an user that match with the ID received.</p>";
    }
}
else
{
    echo "<p class='text-danger'>ERROR: There is not data to work.</p>";
}
?>
            </div>
            </div>
        </div>
        </div>
        <!--Main js-->
		
		<!--/#Main js-->
	</body>
</html>