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
if(isset($_GET["id"]))
{
    $c=$_GET["id"];
    $query = "SELECT idusuario, estado FROM usuarios_tb WHERE idusuario = $c";
    if ($query = mysqli_query($mysqli, $query)) 
    {
        $num = mysqli_num_rows($query);
        if($num == 1)
        {
            $row = mysqli_fetch_assoc($query);
            $id = $row["idusuario"];
            $est = $row["estado"];
            if($est == 0)
            {
                $query2 = "UPDATE usuarios_tb SET estado = 1 WHERE idusuario='$id'";
                if ($query2 = mysqli_query($mysqli, $query2)) 
                {
                    die("<p class='text-warning'>User deactivated <a href='usuarios.php'>Back to the list</a></p>");
                }
                else
                {
                    die("<p class='text-danger'>ERROR: In the data <a href='usuarios.php'>Back to the list</a></p>");
                }
            }
            elseif($est == 1)
            {
                $query3 = "UPDATE usuarios_tb SET estado = 0 WHERE idusuario='$id'";
                if ($query3 = mysqli_query($mysqli, $query3)) 
                {
                    die ("<p class='text-success'>User activated <a href='usuarios.php'>Back to the list</a></p>");
                }
                else
                {
                    die("<p class='text-danger'>ERROR: In the data <a href='usuarios.php'>Back to the list</a></p>");
                }
            }
        }
        else
        {
            echo "There is not data to work";
        }
    }
    else
    {
        echo "ERROR";
    }
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