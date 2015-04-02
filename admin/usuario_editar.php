<?php
include_once '../assets/includes/db_conexion.php';
include_once '../assets/includes/funciones.php';
 
sec_session_start();
include 'auto.php';
$user = $_SESSION['username'];
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
        ?>
        <div class="alert alert-success">
        <strong>Perfect!</strong> Data saved. <a href="usuarios.php" class="alert-link">Back to the list of users</a>.
        </div>
        <!--<script>
            bootbox.alert({
            title: "<center><h2 class='junction-bold text-success'>Perfect!</h2></center>",
            message: "<center><h5 class='junction-regular'>Data saved.</h5></center>",
        });
        return false;
        </script>-->
    <?php
    //die("<p class='text-success'>Perfect! Data saved</p>");
    }
    else
    {
        ?>
        <div class="alert alert-danger">
        <strong>ERROR!</strong> ERROR ERROR ERROR ERROR :v <a href="usuarios.php" class="alert-link">Back to the list of users</a>.
        </div>
        <!--<script>
            bootbox.alert({
            title: "<center><h2 class='junction-bold text-danger'>ERROR:</h2></center>",
            message: "<center><h5 class='junction-regular'>ERROR ERROR ERROR ERROR :v</h5></center>",
        });
        return false;
        </script>-->
    <?php
    //die("<p class='text-danger'>ERROR</p>");
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
        $totalderesultados = mysqli_num_rows($query);
        if($totalderesultados > 0)
        {
        $row = mysqli_fetch_assoc($query);
        ?>
        <div style="float:left; font-size: 80%; position: relative; top:20px; left:15px;"><a href="javascript:history.back();" class="btn btn-info btn-sm"><i class="fa fa-arrow-left"></i> Volver</a></div>
        <h2 class="junction-regular text-center"> Changing the data of: <?=$row["nombres"]?> <?=$row["apellidos"]?></h2>
        <form method="post" onsubmit="return validar(this)">
        <div class="col-md-6">
            <label>ID</label><input type="text" name = "id" class="form-control" value="<?=$row['idusuario']?>" readonly>
            <label>Name</label><input type="text" name = "nombre" class="form-control" value="<?=$row['nombres']?>" required>
            <label>Lastname</label><input type="text" name = "apellido" class="form-control" value="<?=$row['apellidos']?>"  required>
            <label>Birthday (YYYY-MM-DD)</label><input type="fecha" name = "nacimiento" class="form-control" value="<?=$row['nacimiento']?>"  required>
        </div>
        <div class="col-md-6">
            <label>Username</label><input type="text" name = "usuario" class="form-control" value="<?=$row['usuario']?>"  required>
            <label>Email</label><input type="text" name = "correo" class="form-control" value="<?=$row['correo']?>"  required>
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
            <label>Type of user <strong>(Current: <?=$texto?>)</strong></label><select name="tipo" class="form-control" required><option value="1">Administrator</option><option value="2">Teacher</option><option value="3">Student</option></select>
            <label>Estatus</label><br><a href="usuario_estado.php?id=<?=$row["idusuario"]?>" target="_blank" class="btn btn-block btn-default"><i class="fa fa-external-link-square"></i> Change status</a>
            </div>
            <div class="col-md-12">
            <br>
            <input type="submit" name="enviar" value="Save changes" class="btn btn-success btn-block" >
            </div>
        </form>
        <script>
        function validar(f){
        f.enviar.value="Por favor, espere";
        f.enviar.disabled=true;
        }
        return true
        </script>
        <?php
        }
        else
        {
            ?>
            <div class="alert alert-danger">
            <strong>ERROR:</strong> Does not exist an user that match with the ID received. <a href="usuarios.php" class="alert-link">Back to the list of users</a>.
            </div>
            <?php
        }
    }
    else
    {
    ?>
        <div class="alert alert-danger">
        <strong>ERROR:</strong> Does not exist an user that match with the ID received. <a href="usuarios.php" class="alert-link">Back to the list of users</a>.
        </div>
        <!--<script>
            bootbox.alert({
            title: "<center><h2 class='junction-bold text-danger'>ERROR:</h2></center>",
            message: "<center><h5 class='junction-regular'>Does not exist an user that match with the ID received.</h5></center>",
        });
        return false;
        </script>-->
    <?php
        //echo "<p class='text-danger'>ERROR: Does not exist an user that match with the ID received.</p>";
    }
}
else
{
    ?>
        <div class="alert alert-danger">
        <strong>ERROR:</strong> There is not data to work. <a href="usuarios.php" class="alert-link">Back to the list of users</a>.
        </div>
        <!--<script>
            bootbox.alert({
            title: "<center><h2 class='junction-bold text-danger'>ERROR:</h2></center>",
            message: "<center><h5 class='junction-regular'>There is not data to work.</h5></center>",
        });
        return false;
        </script>-->
    <?php
    //echo "<p class='text-danger'>ERROR: There is not data to work.</p>";
}
?>
            </div>
            </div>
        </div>
        </div>
        <!--Main js-->
        <?php 
            include 'main_js.php';
        ?>
		<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/js/bootbox.min.js" type="text/javascript"></script>
		<!--/#Main js-->
	</body>
</html>