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
    function tabla_forum($mysqli)
    {
        if($stmt1 = $mysqli->prepare("SELECT * FROM `forum-post`"))
        {
            $stmt1->execute();
            $stmt1->store_result();
            $stmt1->bind_result($tabla_forum[0],$tabla_forum[1],$tabla_forum[2],$tabla_forum[3],$tabla_forum[4],$tabla_forum[5]);
            while($stmt1->fetch())
            {
                $resultados = $stmt1->num_rows;
                if ($resultados > 0)
                {
                    echo "<tr>";
                        echo "<td>";
                            echo $tabla_forum[0];
                        echo "</td>";
                        echo "<td>";
                            echo $tabla_forum[1];
                        echo "</td>";
                        echo "<td>";
                            echo $tabla_forum[2];
                        echo "</td>";
                        echo "<td>";
                            echo $tabla_forum[3];
                        echo "</td>";
                        echo "<td>";
                            echo $tabla_forum[4];
                        echo "</td>";
                        echo "<td>";
                            echo $tabla_forum[5];
                        echo "</td>";
                    echo "</tr>";
                }
            }
        }

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
                        <div class="jumbotron">
                            Foro
                        </div>
                        <div class="col-sm-4">
                            <table class="table table-hover ">
                                <thead>
                                    <tr  class="active">
                                        <th>Id</th>
                                        <th>Fecha</th>
                                        <th>Name</th>
                                        <th>Nombre</th>
                                        <th>Usuario</th>
                                        <th>Lenguaje</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        tabla_forum($mysqli);
                                    ?>
                                </tbody>
                            </table>
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
