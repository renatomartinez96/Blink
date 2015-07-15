<?php
    include_once '../assets/includes/db_conexion.php';
    include_once '../assets/includes/funciones.php';
    sec_session_start();
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
    include "auto.php";
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
            $titulodelapagina = $langprint["aden-title"];
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
                        <h1 class="junction-bold text-center text-warning"><?=$langprint["aden-title"]?></h1>
                        
                        <div class="col-xs-12">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <div class="row">
                                        <br>
                                <?php 
                                $date = date('Y-m-d', strtotime('-5 day'));
                                $date .= " 00:00:00";
                                $stmt3 = $mysqli->query("SELECT curden.id AS denid, curden.idCur As dencur, curden.denuncia AS dendesc, curden.tipo AS dentip, curden.fecha_den AS denfec, usuarios_tb.usuario AS autusu, curso.idprofesor, curso.nombre  FROM `curden` INNER JOIN curso ON curden.idCur = curso.idcurso INNER JOIN usuarios_tb ON curso.idprofesor = usuarios_tb.idusuario WHERE curden.fecha_den > '$date'");
                                if($stmt3->num_rows > 0)
                                {
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
                                        echo "<div class='col-md-4 col-xs-12'>
                                                <div class='panel panel-default'>
                                                    <div class='panel-heading'>Curso denunciado: <strong>".$row['nombre']." (<a href='profile.php?user=".$row['autusu']."'>".$row['autusu']."</a>)</strong></div>
                                                    <div class='panel-body'>
                                                        <p><strong>Type: </strong>".$text."</p>
                                                        <p><strong>Descripción: </strong>".$row['dendesc']."</p>
                                                        <p><small>".$row['denfec']."</small></p>
                                                    </div>
                                                    <div class='panel-footer'>
                                                        <div class='btn-group'>
                                                            <a href='#' class='btn btn-default'>1</a>
                                                            <a href='#' class='btn btn-warning'>2</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>";   
                                    }
                                }
                                else
                                {
                                    echo "<br><div class='alert alert-danger col-xs-10 col-sm-offset-1'>
                                            <strong>Error: </strong> ".$langprint["err-no-dens"]."
                                        </div>";
                                }
                                ?>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="profile">
                                
                                </div>
                            </div>
                        </div>
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