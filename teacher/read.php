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
<?php
if(!isset($_GET["tool"]) or !isset($_GET["row"]))
{
?>
<script>
window.location.href="index.php";
</script>
<?php
}
else
{
    $reading = $_GET["tool"];
    $upass = md5($reading.$elidespecial);
    if($_GET["row"] != $upass)
    {
    ?>
    <script>
    window.location.href="index.php";
    </script>
    <?php
    }
    else
    {
        if ($stmtr = $mysqli->prepare("SELECT curden.id AS denid, curden.idCur As dencur, curden.tipo AS dentip, curden.fecha_den AS denfec, curden.admDesc AS msg, curden.visto, usuarios_tb.usuario AS autusu, curso.idprofesor, curso.nombre FROM `curden` INNER JOIN curso ON curden.idCur = curso.idcurso INNER JOIN usuarios_tb ON curso.idprofesor = usuarios_tb.idusuario WHERE curden.destId = ?")) 
        {
            $stmtr->bind_param('s', $reading);
            $stmtr->execute(); 
            $stmtr->store_result();
            $stmtr->bind_result($denid, $dencur, $dentip, $denfec, $denmsg, $visto, $denadd, $denaddo, $dencurtitle);
            $stmtr->fetch();
        }
        $text = "";
        switch($dentip)
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
        switch($visto)
        {
            case 0;
            $text2 = "<i class='fa fa-eye-slash'></i>";
            break;
            case 1;
            $text2 = "<i class='fa fa-eye'></i>";
            break;
        }
    }
}
?>
		<!--Core CSS-->
		<?php
            // Titulo de esta página:
            $titulodelapagina = " ";
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
                        <div class="col-xs-10 col-sm-offset-2 well">
                    <?php
                        echo "<h2 class='junction-bold center-text text-warning'>".$text."</h2><hr><br>";
                        echo "<p class='junction-light center-text'><small><strong>Curso con problemas: </strong><a href='infoCur.php?id=".$dencur."'>".$dencurtitle."</a> - ".$denfec."  ".$text2."</small></p>";
                        echo "<p class='junction-regular center-justify'>".$denmsg."</p>";
                        echo "lel";
                    ?>
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
