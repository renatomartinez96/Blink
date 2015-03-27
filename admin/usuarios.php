<?php
include_once '../assets/includes/db_conexion.php';
include_once '../assets/includes/funciones.php';
 
sec_session_start();
?>
<?php
//$stmt = $mysqli->prepare("SELECT idusuario, nombres, apellidos, nacimiento, genero, usuario, estado, correo, tipo, lang FROM usuarios_tb");
//$stmt->execute();  
//$stmt->store_result();
//$stmt->bind_result($id, $nombre, $apellido, $nac, $gen, $user, $est, $correo, $tipo, $lang);
//$stmt->fetch();
//$row_cnt = $stmt->num_rows;
/*if($row_cnt > 0)
{
    while($results->fetch_assoc())
    {
        echo $results["idusuario"]."<br>";
        
    }
}*/
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
                        <h2 class="junction-regular text-center">List of users</h2>
                        <table class="table table-hover table-responsive">
                        <thead>
                            <tr><th>ID</th>
                                <th>Username</th>
                                <th>Names</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                <th>Birthday</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
$query = "SELECT idusuario, nombres, apellidos, nacimiento, usuario, estado, correo, tipo FROM usuarios_tb";

if ($result = mysqli_query($mysqli, $query)) 
{
    while ($row = mysqli_fetch_assoc($result)) 
    {
        $text1 = "";
        switch($row["tipo"])
        {
            case 1;
            $text1 = "Administrator";
            break;
            case 2;
            $text1 = "Teacher";
            break;
            case 3;
            $text1 = "Student";
            break;
        }
        $text2 = "";
        $tbclass = "";
        $text3 = "";
        switch($row["estado"])
        {
            case 0;
            $text2 = "<i class='fa fa-check'></i> Active";
            $tbclass = "";
            $text3 = "<a href='usuario_editar.php?id=".$row["idusuario"]."' class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> Edit</a><a href='usuario_estado.php?id=".$row["idusuario"]."' class='btn btn-danger btn-xs'><i class='fa fa-user-times'></i> Deactivate</a>";
            break;
            case 1;
            $text2 = "<i class='fa fa-user-times'></i> Inactive";
            $tbclass = "class='text-danger'";
            $text3 = "<a href='usuario_editar.php?id=".$row["idusuario"]."' class='btn btn-info btn-xs' disabled='isabled'><i class='fa fa-pencil'></i> Edit</a><a href='usuario_estado.php?id=".$row["idusuario"]."' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Activate</a>";
            break;
        }
        echo "<tr ".$tbclass."><td>".$row["idusuario"]."</td>";
        echo "<td>".$row["usuario"]."</td>";
        echo "<td>".$row["nombres"]."</td>";
        echo "<td>".$row["apellidos"]."</td>";
        echo "<td>".$row["correo"]."</td>";
        echo "<td>".$row["nacimiento"]."</td>";
        echo "<td>".$text1."</td>";
        echo "<td>".$text2."</td>";
        echo "<td>".$text3."</td>";
    }
    mysqli_free_result($result);
}
?>
                        </tbody>
                        </table>
            </div>
            </div>
        </div>
        </div>
        <!--Main js-->
		
		<!--/#Main js-->
	</body>
</html>