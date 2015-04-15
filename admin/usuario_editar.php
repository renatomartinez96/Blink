<?php
include_once '../assets/includes/db_conexion.php';
include_once '../assets/includes/funciones.php';
 
sec_session_start();
include 'auto.php';
$user = $_SESSION['username'];
?>
<!--

Copyright (c) 2015 Box Link
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
            $titulodelapagina = "Editing user data";
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
if(isset($_POST["nombre"]))
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
    <?php
    }
    else
    {
        ?>
        <div class="alert alert-danger">
        <strong>ERROR!</strong> ERROR ERROR ERROR ERROR :v <a href="usuarios.php" class="alert-link">Back to the list of users</a>.
        </div>
    <?php
    }
}
else
{
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
        <form action="usuario_editar.php" method="post" name="form" id="form">
        <div class="col-md-6">
            <label>ID</label><input type="text" name = "id" id = "id" class="form-control" value="<?=$row['idusuario']?>" readonly>
            <label>Name</label><input type="text" name = "nombre" id = "nombre" class="form-control" value="<?=$row['nombres']?>" >
            <label>Lastname</label><input type="text" name = "apellido" id = "apellido" class="form-control" value="<?=$row['apellidos']?>"  >
            <label>Birthday (YYYY-MM-DD)</label><input type="fecha" name = "nacimiento" id = "nacimiento" class="form-control" onkeypress="txtnumeros()" placeholder="Birth day(yyyy-mm-dd)" onkeyup="mascara(this,'-',patron,true)" value="<?=$row['nacimiento']?>"  >
        </div>
        <div class="col-md-6">
            <label>Username</label><input type="text" name = "usuario" id = "usuario" class="form-control" value="<?=$row['usuario']?>"  >
            <label>Email</label><input type="text" name = "correo" id = "correo" class="form-control" value="<?=$row['correo']?>"  >
            <?php
            $tipos = array(
                1 => "Administrator",
                2 => "Teacher",
                3 => "Student",
            );
            ?>
            <label>Type of user</label>
            <select name="tipo" id = "tipo" class="form-control" >
                <?php
                foreach ($tipos as $valor=>$toprint) 
                {
                    if($valor == $row["tipo"])
                    {
                        echo "<option value='".$valor."' selected=selected>".$toprint."</option>";
                    }
                    else
                    {
                        echo "<option value='".$valor."'>".$toprint."</option>";
                    }
                }
                ?>
            </select>
            <label>Estatus</label><br><a href="usuario_estado.php?id=<?=$row["idusuario"]?>" target="_blank" class="btn btn-block btn-default"><i class="fa fa-external-link-square"></i> Change status</a>
            </div>
            <div class="col-md-12">
            <br>
            <input type="button" name="enviar" value="Save changes" class="btn btn-success btn-block" id="enviar" onclick="return validacion(
this.form, 
this.form.id, 
this.form.nombre, 
this.form.apellido, 
this.form.nacimiento, 
this.form.usuario, 
this.form.correo, 
this.form.tipo);" />
            </div>
        </form>
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
    <?php
        echo "<p class='text-danger'>ERROR: Does not exist an user that match with the ID received ".$id.".</p>";
    }
}
else
{
    ?>
        <div class="alert alert-danger">
        <strong>ERROR:</strong> There is not data to work. <a href="usuarios.php" class="alert-link">Back to the list of users</a>.
        </div>
    <?php
}

}
?>
            </div>
            </div>
        </div>
        </div>
        <!--Main js-->
        <script>
        function validacion(form, id, nombre, apellido, nacimiento, usuario, correo, tipo)
        {
            if(nombre.value == '' || apellido.value == '' || nacimiento.value == '' || usuario.value == '' || correo.value == '' || tipo.value == '')
            {
            bootbox.alert({
            title: "<h2 class='junction-bold text-center'>Box Link</h2>",
            message: "<h5 class='junction-regular text-center'>ERROR: Please fill all the fielsets!</h5>",
        });
            return false;
            }
            form.submit();
            return true;
        }
        </script>
        <?php 
            require 'main_js.php';
        ?>
		<!--/#Main js-->
	</body>
</html>