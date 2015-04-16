<?php
include_once '../assets/includes/db_conexion.php';
include_once '../assets/includes/funciones.php';
 
sec_session_start();
include 'auto.php';
$user = $_SESSION['username'];
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
            $titulodelapagina = "Changing user status";
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
    $query = "SELECT idusuario, estado, nombres, apellidos FROM usuarios_tb WHERE idusuario = $c";
    if ($query = mysqli_query($mysqli, $query)) 
    {
        $num = mysqli_num_rows($query);
        if($num == 1)
        {
            $row = mysqli_fetch_assoc($query);
            $id = $row["idusuario"];
            $est = $row["estado"];
            $nombre = $row["nombres"];
            $apellido = $row["apellidos"];
            if($est == 0)
            {
                $query2 = "UPDATE usuarios_tb SET estado = 1 WHERE idusuario='$id'";
                if ($query2 = mysqli_query($mysqli, $query2)) 
                {
                    die("<div class='alert alert-success'><strong><i class='fa fa-check'></i> Perfect!</strong> The status of the user: &quot;".$nombre." ".$apellido."&quot; has been changed to:  <strong>Active</strong>. <br><a href='usuarios.php' class='alert-link'>Back to the list of users</a>.</div>");
                }
                else
                {
                    die("<div class='alert alert-danger'><strong><i class='fa fa-times'></i> ERROR:</strong> An unknown ERROR has been occurred, please try again later. <br><a href='usuarios.php' class='alert-link'>Back to the list of users</a>.</div>");
                }
            }
            elseif($est == 1)
            {
                $query3 = "UPDATE usuarios_tb SET estado = 0 WHERE idusuario='$id'";
                if ($query3 = mysqli_query($mysqli, $query3)) 
                {
                    die ("<div class='alert alert-warning'><strong><i class='fa fa-check'></i> OK!</strong> The status of the user: &quot;".$nombre." ".$apellido."&quot; has been changed to:  <strong>Inactive</strong>. <br><a href='usuarios.php' class='alert-link'>Back to the list of users</a>.</div>");
                }
                else
                {
                    die("<div class='alert alert-danger'><strong><i class='fa fa-times'></i> ERROR:</strong> An unknown ERROR has been occurred, please try again later. <br><a href='usuarios.php' class='alert-link'>Back to the list of users</a>.</div>");
                }
            }
        }
        else
        {
            echo "<div class='alert alert-danger'><strong><i class='fa fa-times'></i> ERROR:</strong> An unknown error has been occurred, please try again later. <br><a href='usuarios.php' class='alert-link'>Back to the list of users</a>.</div>";
        }
    }
    else
    {
        echo "<div class='alert alert-danger'><strong><i class='fa fa-times'></i> ERROR:</strong> The received data do not match with any registered user ID. <br><a href='usuarios.php' class='alert-link'>Back to the list of users</a>.</div>";
    }
}
else
{
    echo "<div class='alert alert-danger'><strong><i class='fa fa-times'></i> ERROR:</strong> There is not data to work. <br><a href='usuarios.php' class='alert-link'>Back to the list of users</a>.</div>";
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