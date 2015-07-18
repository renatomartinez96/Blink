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
            $titulodelapagina = "Administración de Box Link";
			include 'main_css.php';
		?>
        <!--Custom css-->
        <link href="../assets/css/sidebar.css" rel="stylesheet">
        <link href="../assets/css/perfil.css" rel="stylesheet">
        <!--/#Custom css-->
		<!--/#Core CSS-->
	</head>
	<body>
        <style>
            .yeahmrwhite
            {
                background-color: #0f1017; !important
            }
        </style>
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
    if(isset($_GET["t"]))
    {
        $usutipo2 = $_GET["t"];
        switch($usutipo2){
        case 1;
        $query = "SELECT idusuario, nombres, apellidos, nacimiento, usuario, estado, correo, tipo FROM usuarios_tb WHERE tipo = 1";
        $titulo = "List of Administradores of Box Link";
        break;
        case 2;
        $query = "SELECT idusuario, nombres, apellidos, nacimiento, usuario, estado, correo, tipo FROM usuarios_tb WHERE tipo = 2";
        $titulo = "List of Tutores of Box Link";
        break;
        case 3;
        $query = "SELECT idusuario, nombres, apellidos, nacimiento, usuario, estado, correo, tipo FROM usuarios_tb WHERE tipo = 3";
        $titulo = "List of Estudiantes of Box Link";
        break;
        }
    }
    else
    {
        $query = "SELECT idusuario, nombres, apellidos, nacimiento, usuario, estado, correo, tipo FROM usuarios_tb";
        $titulo = "Listado de todos los usuarios de Box Link";
    }
//}
?>
                        <div style="float:left; font-size: 80%; position: relative; top:20px; left:15px;"><a href="javascript:history.back();" class="btn btn-info btn-sm"><i class="fa fa-arrow-left"></i> Regresar</a></div>
                        <h2 class="junction-regular text-center"><?=$titulo?></h2>
                        <div class="btn-group" role="group" aria-label="...">
                        <div class="btn-group" role="group">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">Ordenar por... <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="usuarios.php?t=1">Administradores</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="usuarios.php?t=2">Tutores</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="usuarios.php?t=3">Estudiantes</a></li>
                            <li role="presentation" class="divider"></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="usuarios.php">Todos los usuarios</a></li>
                        </ul>
                        </div>
                        <div class="btn-group" role="group">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-expanded="true">Gráficos: <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu3">
                            <li role="presentation" class="dropdown-header">Per type</li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="statistics.php">Genero</a></li>
                        </ul>
                        </div>
                        <div class="btn-group" role="group">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">Print reports: <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation" class="dropdown-header">Per type</li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="usuario_reporte.php?c=2&t=1">Administrators</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="usuario_reporte.php?c=2&t=2">Tutors</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="usuario_reporte.php?c=2&t=3">Students</a></li>
                            <li role="presentation" class="divider"></li>
                            <li role="presentation" class="dropdown-header">Per status</li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="usuario_reporte.php?c=3&s=1">Active</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="usuario_reporte.php?c=3&s=0">Inactive</a></li>
                            <li role="presentation" class="divider"></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="usuario_reporte.php?c=4">Todos los usuarios</a></li>
                        </ul>
                        </div>
                        </div>
                        <br>
                        <div class="well yeahmrwhite">
                        <table class="table table-hover table-responsive">
                        <thead>
                            <tr><th>ID</th>
                                <th><?=$langprint["username"]?></th>
                                <th><?=$langprint["name-field"]?></th>
                                <th><?=$langprint["lastname-field"]?></th>
                                <th><?=$langprint["emailname"]?></th>
                                <th>Birth date</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Options</th>
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
            $text1 = "Tutor";
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
            $text3 = "<a href='usuario_reporte.php?c=1&id=".$row["idusuario"]."' class='btn btn-primary btn-xs'><i class='fa fa-file-text'></i> Reports</a><a href='usuario_editar.php?id=".$row["idusuario"]."' class='btn btn-info btn-xs' disabled='disabled'><i class='fa fa-pencil'></i> Edit</a><a href='usuario_estado.php?id=".$row["idusuario"]."' class='btn btn-success btn-xs' onClick=\"alert('Are you sure to change the user status?')\"><i class='fa fa-check'></i> Activate</a>";
            break;
            case 1;
            $text2 = "<i class='fa fa-check'></i> Active";
            $tbclass = "";
            $text3 = "<a href='usuario_reporte.php?c=1&id=".$row["idusuario"]."' class='btn btn-primary btn-xs'><i class='fa fa-file-text'></i> Reports</a><a href='usuario_editar.php?id=".$row["idusuario"]."' class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> Edit</a><a href='usuario_estado.php?id=".$row["idusuario"]."' class='btn btn-danger btn-xs' onClick=\"alert('Are you sure to change the user status?')\"><i class='fa fa-user-times'></i> Deactivate</a>";
            break;
        }
        echo "<tr ".$tbclass."><td><strong>".$row["idusuario"]."</strong></td>";
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
        </div>
        <!--Main js-->
		<?php 
			include 'main_js.php';
		?>
		<!--/#Main js-->
	</body>
</html>