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
<?php
$stmt2 = $mysqli->query("SELECT genero FROM usuarios_tb WHERE estado = 1");
if($stmt2->num_rows > 0)
{
    $m = 0;
    $f = 0;
    while($row = $stmt2->fetch_assoc())
    {
        if($row["genero"] == "m")
        {
            $m++;
        }
        elseif($row["genero"] == "f")
        {
            $f++;
        }
    }
}
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
                        <h1 class="text-center junction-bold text-warning">Distribución de genero en los usuarios</h1>
                        <br>
                        <div class="col-xs-8 col-sm-offset-4">
                            <div id="canvas-holder">
                                <canvas id="chart-area" width="400" height="400"/>
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
        <script src="../assets/js/Chart.Core.js"></script>
        <script src="../assets/js/Chart.Doughnut.js"></script>
        <script src="../assets/js/Chart.PolarArea.js"></script>
        <script src="../assets/js/Chart.Radar.js"></script>
        <script>
        var pieData = [
            {
                value: <?=$f?>,
                color:"#bf4687",
                highlight: "#dd82b3",
                label: "Femenino"
            },
            {
                value: <?=$m?>,
                color: "#3192c6",
                highlight: "#61b0db",
                label: "Masculino"
            }
        ];

        window.onload = function(){
        var ctx = document.getElementById("chart-area").getContext("2d");
        window.myPie = new Chart(ctx).Pie(pieData);
        };
        </script>
		<!--/#Main js-->
	</body>
</html>