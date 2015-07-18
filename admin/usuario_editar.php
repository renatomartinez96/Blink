<?php
include_once '../assets/includes/db_conexion.php';
include_once '../assets/includes/funciones.php';
 
sec_session_start();
include 'auto.php';
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
    include "../assets/includes/lang.php";
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
            $titulodelapagina = "Editar los datos de un usuario";
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
        <strong>OK!</strong> Los nuevos datos se guardaron con éxito <a href="usuarios.php" class="alert-link"><?=$langprint["back-usr-list"]?></a>.
        </div>
    <?php
    }
    else
    {
        ?>
        <div class="alert alert-danger">
        <strong>Error: </strong> Los datos no fueron guardados <a href="usuarios.php" class="alert-link"><?=$langprint["back-usr-list"]?></a>.
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
        <div style="float:left; font-size: 80%; position: relative; top:20px; left:15px;"><a href="javascript:history.back();" class="btn btn-info btn-sm"><i class="fa fa-arrow-left"></i> <?=$langprint["btn-back"]?></a></div>
        <h2 class="junction-regular text-center"> Editando los datos de: <?=$row["nombres"]?> <?=$row["apellidos"]?></h2>
        <form action="usuario_editar.php" method="post" name="form" id="form">
        <div class="col-md-6">
            <label>ID</label><input type="text" name = "id" id = "id" class="form-control" value="<?=$row['idusuario']?>" readonly>
            <label>Nombre</label><input type="text" name = "nombre" id = "nombre" class="form-control" value="<?=$row['nombres']?>" >
            <label>Apellido</label><input type="text" name = "apellido" id = "apellido" class="form-control" value="<?=$row['apellidos']?>"  >
            <label>Fecha de nacimiento (AAAA-MM-DD)</label><input type="fecha" name = "nacimiento" id = "nacimiento" class="form-control" onkeypress="txtnumeros()" placeholder="Birth day(yyyy-mm-dd)" onkeyup="mascara(this,'-',patron,true)" value="<?=$row['nacimiento']?>"  >
        </div>
        <div class="col-md-6">
            <label>Nombre de usuario</label><input type="text" name = "usuario" id = "usuario" class="form-control" value="<?=$row['usuario']?>"  >
            <label>Correo electrónico</label><input type="text" name = "correo" id = "correo" class="form-control" value="<?=$row['correo']?>"  >
            <?php
            $tipos = array(
                1 => $langprint['admin'],
                2 => $langprint['tutor'],
                3 => $langprint['student'],
            );
            ?>
            <label>Tipo de usuario</label>
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
            <label><?=$langprint["cstatus"]?></label><br><a href="usuario_estado.php?id=<?=$row["idusuario"]?>" target="_blank" class="btn btn-block btn-default"><i class="fa fa-external-link-square"></i> Cambiar estado</a>
            </div>
            <div class="col-md-12">
            <br>
            <input type="button" name="enviar" value="Guardar cambios" class="btn btn-success btn-block" id="enviar" onclick="return validacion(
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
            <strong>Error:</strong> <?=$langprint["err-no-usr"]?>. <a href="usuarios.php" class="alert-link"><?=$langprint["back-usr-list"]?></a>.
            </div>
            <?php
        }
    }
    else
    {
    ?>
        <div class="alert alert-danger">
        <strong>Error:</strong> <?=$langprint["err-no-usr"]?>. <a href="usuarios.php" class="alert-link"><?=$langprint["back-usr-list"]?></a>.
        </div>
    <?php
    }}
else
{
    ?>
        <div class="alert alert-danger">
        <strong>Error:</strong> <?=$langprint["err-no-data"]?> <a href="usuarios.php" class="alert-link"><?=$langprint["back-usr-list"]?></a>.
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
            message: "<h5 class='junction-regular text-center'>Error: <?=$langprint["form-not-null"]?></h5>",
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