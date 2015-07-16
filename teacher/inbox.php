<?php
    include_once '../assets/includes/db_conexion.php';
    include_once '../assets/includes/funciones.php';
    sec_session_start();
    include "auto.php"; // AUTORIZACIÓN DE PROFESORES!!!!
    $user = $_SESSION['username'];
    $userid = $_SESSION['user_id'];
    $tipo = $_SESSION['tipo'];
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
            $titulodelapagina = $langprint["inbox"];
			include 'main_css.php';
		?>
		<!--/#Core CSS-->

		<!--Custom CSS-->
		<link href="../assets/css/sidebar.css" rel="stylesheet">
		<!--/#Custom CSS-->

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
					<!--Content-->
                        <h1 class="text-center junction-bold"><?=$langprint["inbox"]?></h1>
                        <p class="text-center junction-regular">Aquí recibiras los mensajes de la administración, en caso de alguna promoción o advertencia</p>
                        <?php
                        $stmt3 = $mysqli->query("SELECT curden.id AS denid, curden.idCur As dencur, curden.denuncia AS dendesc, curden.tipo AS dentip, curden.fecha_den AS denfec, curden.admDesc AS msg, curden.visto, usuarios_tb.usuario AS autusu, curso.idprofesor, curso.nombre  FROM `curden` INNER JOIN curso ON curden.idCur = curso.idcurso INNER JOIN usuarios_tb ON curso.idprofesor = usuarios_tb.idusuario WHERE curden.destId = '$elidespecial' ORDER BY curden.fecha_den DESC");
                                if($stmt3->num_rows > 0)
                                {
                                    echo "<table class='table table-hover'>
                                                <thead>
                                                    <tr class='text-center junction-bold'>
                                                        <td>#</td>
                                                        <td>".$langprint["aden-msg-issue"]."</td>
                                                        <td>".$langprint["aden-msg-curname"]."</td>
                                                        <td>".$langprint["aden-msg-date"]."</td>
                                                        <td>".$langprint['opcions']."</td>
                                                    </tr>
                                                </thead>
                                                <tbody>";
                                    $numc = 1;
                                    while($row = $stmt3->fetch_assoc())
                                    {
                                        $text = "";
                                        switch($row['dentip'])
                                        {
                                            case 1;
                                            $text = $langprint["denop1"];
                                            break;
                                            case 2;
                                            $text = $langprint["denop2"];
                                            break;
                                            case 3;
                                            $text = $langprint["denop3"];
                                            break;
                                            case 4;
                                            $text = $langprint["denop4"];
                                            break;
                                        }
                                        $text2 = "";
                                        switch($row['visto'])
                                        {
                                            case 0;
                                            $text2 = "<i class='fa fa-eye-slash'></i>";
                                            break;
                                            case 1;
                                            $text2 = "<i class='fa fa-eye'></i>";
                                            break;
                                        }
                                        echo "<tr class='text-center junction-regular'>
                                                <td>".$numc."</td>
                                                <td><a href='read.php?tool=".$row["denid"]."&row=".md5($row["denid"].$row["idprofesor"])."'>".$text."</a></td>
                                                <td>".$row['nombre']."</td>
                                                <td>".$row['denfec']."</td>
                                                <td><a href='read.php?tool=".$row["denid"]."&row=".md5($row["denid"].$row["idprofesor"])."' class='btn btn-xs btn-success '>Read <i class='fa fa-arrow-right'></i></a><a den='".$row['denid']."' class='btn btn-xs btn-info eyes'>".$text2."</a></td>
                                            </tr>";
                                        $numc++;

                                    }
                                    echo "</tbody></table>";
                                }
else
{
    echo "<div class='col-xs-8 col-sm-offset-2 well text-center'>
            <i class='fa fa-times fa-lg text-danger'></i> No tienes mensajes
        </div>";
}
                        ?>
					<!--/#Content-->
					</div>
				</div>
			</div>
			<!--/#Page Content -->
		</div>
		<!--Main js-->
		<?php 
			include 'main_js.php';
		?>
		<!--/#Main js-->
	</body>
</html>