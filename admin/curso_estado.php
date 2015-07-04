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
<?php
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
            $titulodelapagina = "Cambiar el estado a un curso";
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
if(isset($_GET["id"]))
{
    $c=$_GET["id"];
    $query = "SELECT idcurso, curEstado, nombre FROM curso WHERE idcurso = $c";
    if ($query = mysqli_query($mysqli, $query)) 
    {
        $num = mysqli_num_rows($query);
        if($num == 1)
        {
            $row = mysqli_fetch_assoc($query);
            $id = $row["idcurso"];
            $est = $row["curEstado"];
            $nombre = $row["nombre"];
            if($est == 0)
            {
                $query2 = "UPDATE curso SET curEstado = 1 WHERE idcurso='$id'";
                if ($query2 = mysqli_query($mysqli, $query2)) 
                {
                    die("<div class='alert alert-success'><strong><i class='fa fa-check'></i> ¡Perfecto!</strong> El estado del curso: &quot;".$nombre."&quot; se cambio a:  <strong>Activo</strong>. <br><a href='cursos.php' class='alert-link'>Regresar a la lista de cursos</a>.</div>");
                }
                else
                {
                    die("<div class='alert alert-danger'><strong><i class='fa fa-times'></i> ERROR:</strong> Ha ocurrido un error desconocido, por favor intente de nuevo. <br><a href='cursos.php' class='alert-link'>Regresar a la lista de cursos</a>.</div>");
                }
            }
            elseif($est == 1)
            {
                $query3 = "UPDATE curso SET curEstado = 0 WHERE idcurso='$id'";
                if ($query3 = mysqli_query($mysqli, $query3)) 
                {
                    die ("<div class='alert alert-warning'><strong><i class='fa fa-check'></i> ¡OK!</strong> El estado del curso: &quot;".$nombre."&quot; se cambio a:  <strong>Inactive</strong>. <br><a href='cursos.php' class='alert-link'>Regresar a la lista de cursos</a>.</div>");
                }
                else
                {
                    die("<div class='alert alert-danger'><strong><i class='fa fa-times'></i> ERROR:</strong> Ha ocurrido un error desconocido, por favor intente de nuevo. <br><a href='cursos.php' class='alert-link'>Regresar a la lista de cursos</a>.</div>");
                }
            }
        }
        else
        {
            echo "<div class='alert alert-danger'><strong><i class='fa fa-times'></i> ERROR:</strong> Ha ocurrido un error desconocido, por favor intente de nuevo. <br><a href='cursos.php' class='alert-link'>Regresar a la lista de cursos</a>.</div>";
        }
    }
    else
    {
        echo "<div class='alert alert-danger'><strong><i class='fa fa-times'></i> ERROR:</strong> The received data do not match with any registered course ID. <br><a href='cursos.php' class='alert-link'>Regresar a la lista de cursos</a>.</div>";
    }
}
else
{
    echo "<div class='alert alert-danger'><strong><i class='fa fa-times'></i> ERROR:</strong> No se han recibido datos para trabajar. <br><a href='cursos.php' class='alert-link'>Regresar a la lista de cursos</a>.</div>";
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