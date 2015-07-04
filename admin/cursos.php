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
            $titulodelapagina = "Listado de cursos de Box Link";
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
    if(isset($_GET["p"]))
    {
        $teacher = $_GET["p"];
        $query = "SELECT idcurso, idprofesor, nombre, curso.descripcion AS 'cursotext', curso.curEstado AS 'cursostatus', nombres, apellidos, usuario, correo FROM curso INNER JOIN usuarios_tb ON curso.idprofesor = usuarios_tb.idusuario WHERE idprofesor = $teacher ORDER BY idcurso ";
        $titulo = "Lista de cursos de un profesor especifíco";        
    }
    else
    {
        $query = "SELECT idcurso, idprofesor, nombre, curso.descripcion AS 'cursotext', curso.curEstado AS 'cursostatus', nombres, apellidos, usuario, correo FROM curso INNER JOIN usuarios_tb ON curso.idprofesor = usuarios_tb.idusuario ORDER BY idcurso";
        $titulo = "Lista de cursos de Box Link";
    }
//}
?>
                        
                        <div style="float:left; font-size: 80%; position: relative; top:20px; left:15px;"><a href="javascript:history.back();" class="btn btn-info btn-sm"><i class="fa fa-arrow-left"></i> Regresar</a></div>
                        <h2 class="junction-regular text-center"><?=$titulo?></h2>
                        <br>
                        <div class="well yeahmrwhite">

                        <table class="table table-hover table-responsive">
                        <thead>
                            <tr><th>ID</th>
                                <th>Profesor</th>
                                <th>Titulo</th>
<!--                                <th>Descripcion</th>-->
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

<?php
if ($result = mysqli_query($mysqli, $query)) 
{
    while ($row = mysqli_fetch_assoc($result)) 
    {
        $text2 = "";
        $tbclass = "";
        $text3 = "";
        switch($row["cursostatus"])
        {
            case 0;
            $text2 = "<i class='fa fa-user-times'></i> Bloqueado";
            $tbclass = "class='text-danger'";
            $text3 = "<a href='curso_reporte.php?c=1&id=".$row["idcurso"]."' class='btn btn-primary btn-xs'><i class='fa fa-file-text'></i> Reports</a><a href='curso_estado.php?id=".$row["idcurso"]."' class='btn btn-success btn-xs' onClick=\"alert('Are you sure to change the user status?')\"><i class='fa fa-check'></i> Activate</a>";
            break;
            case 1;
            $text2 = "<i class='fa fa-check'></i> Active";
            $tbclass = "";
            $text3 = "<a href='curso_reporte.php?c=1&id=".$row["idcurso"]."' class='btn btn-primary btn-xs'><i class='fa fa-file-text'></i> Reports</a><a href='curso_estado.php?id=".$row["idcurso"]."' class='btn btn-danger btn-xs' onClick=\"alert('Are you sure to change the user status?')\"><i class='fa fa-times'></i> Block</a>";
            break;
        }
        echo "<tr ".$tbclass."><td><strong>".$row["idcurso"]."</strong></td>";
        echo "<td><a href = 'cursos.php?p=".$row["idprofesor"]."' title='".$row["nombres"]." ".$row["apellidos"]."'>".$row["usuario"]."</a></td>";
        echo "<td>".$row["nombre"]."</td>";
        //echo "<td>".implode(' ', array_slice(explode(' ', $row["cursotext"]), 0, 5))."...</td>";
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