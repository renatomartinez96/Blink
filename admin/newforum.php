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
            $titulodelapagina = "Box Link Administration";
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
            <style>
            #usrpanel{
                background: #191837 url(../assets/img/userbanner/<?=$bannero?>.png) fixed;
                color:#fff;
                background-position: bottom left;
                background-size:100%;
            }
            .usrnav{
                background-color: transparent  !important;
                border-color: transparent  !important;
                margin-bottom:0px;

            }
            .btn-face{
                background:#133783;
                color:#fff;
            }.btn-twit{
                background:#55ACEE;
                color:#fff;
            }
            .btnwithout{
                border:none;
                background-color: Transparent;
            }
            /* Radio Button

             input[type=radio] { display:none; } to hide the checkbox itself
            input[type=radio] + label:before {
            font-family: 'FontAwesome';
            display: inline-block;
            }

            input[type=radio] + label:before { content: "\f096"; } unchecked icon
            input[type=radio] + label:before { letter-spacing: 10px; } space between checkbox and label

            input[type=radio]:checked + label:before { display: block; content: "\f0c8"; } checked icon
            input[type=radio]:checked + label:before { display: block; letter-spacing: 5px; } allow space for check mark
                */
            </style>
			<!--Page Content -->
            <div id="page-content-wrapper">
				<div class="container-fluid">
					<div class="row">
                        <div class="col-sm-6">
                        </div>
                        <div class="col-sm-6">
                        </div>
                    </div><!--row-->
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
