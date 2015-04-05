<?php
include_once '../assets/includes/db_conexion.php';
include_once '../assets/includes/funciones.php';
 
sec_session_start();
include 'auto.php';
$user = $_SESSION['username'];
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
<?php
$titulo = "";
if(isset($_GET["tipo"]))
{
    $usutipo = $_GET["tipo"];
    switch($usutipo){
    case 1;
    $query = "SELECT idusuario, nombres, apellidos, nacimiento, usuario, estado, correo, tipo FROM usuarios_tb WHERE tipo = 1";
    $titulo = "Listado de administradores de Blink";
    break;
    case 2;
    $query = "SELECT idusuario, nombres, apellidos, nacimiento, usuario, estado, correo, tipo FROM usuarios_tb WHERE tipo = 2";
    $titulo = "Listado de profesores de Blink";
    break;
    case 3;
    $query = "SELECT idusuario, nombres, apellidos, nacimiento, usuario, estado, correo, tipo FROM usuarios_tb WHERE tipo = 3";
    $titulo = "Listado de estudiantes de Blink";
    break;
    }
}
else
{
    if(isset($_GET["type"]))
    {
        $usutipo2 = $_GET["type"];
        switch($usutipo2){
        case 1;
        $query = "SELECT idusuario, nombres, apellidos, nacimiento, usuario, estado, correo, tipo FROM usuarios_tb WHERE tipo = 1";
        $titulo = "List of a";
        break;
        case 2;
        $query = "SELECT idusuario, nombres, apellidos, nacimiento, usuario, estado, correo, tipo FROM usuarios_tb WHERE tipo = 2";
        $titulo = "Lissgknfkgndkf";
        break;
        case 3;
        $query = "SELECT idusuario, nombres, apellidos, nacimiento, usuario, estado, correo, tipo FROM usuarios_tb WHERE tipo = 3";
        $titulo = "aroougnd frj worl";
        break;
        }
    }
    else
    {
        $query = "SELECT idusuario, nombres, apellidos, nacimiento, usuario, estado, correo, tipo FROM usuarios_tb";
        $titulo = "Listado de todos los usuarios de Blink";
    }
}
?>
                        <div style="float:left; font-size: 80%; position: relative; top:20px; left:15px;"><a href="javascript:history.back();" class="btn btn-info btn-sm"><i class="fa fa-arrow-left"></i> Volver</a></div>
                        <h2 class="junction-regular text-center"><?=$titulo?></h2>
                        <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                        Clasificar la lista por: 
                        <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="usuarios.php?tipo=1">Administradores</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="usuarios.php?tipo=2">Profesores</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="usuarios.php?tipo=3">Estudiantes</a></li>
                            <li role="presentation" class="divider"></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="usuarios.php">Todos los usuarios</a></li>
                        </ul>
                        </div>
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
            $text2 = "<i class='fa fa-user-times'></i> Inactive";
            $tbclass = "class='text-danger'";
            $text3 = "<a href='usuario_editar.php?id=".$row["idusuario"]."' class='btn btn-info btn-xs' disabled='disabled'><i class='fa fa-pencil'></i> Edit</a><a href='usuario_estado.php?id=".$row["idusuario"]."' class='btn btn-success btn-xs' onClick=\"alert('Are you sure to change the user status?')\"><i class='fa fa-user-times'></i> Activate</a>";
            break;
            case 1;
            $text2 = "<i class='fa fa-check'></i> Active";
            $tbclass = "";
            $text3 = "<a href='usuario_editar.php?id=".$row["idusuario"]."' class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> Edit</a><a href='usuario_estado.php?id=".$row["idusuario"]."' class='btn btn-danger btn-xs' onClick=\"alert('Are you sure to change the user status?')\"><i class='fa fa-check'></i> Deactivate</a>";
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
		<?php 
			include 'main_js.php';
		?>
		<!--/#Main js-->
	</body>
</html>