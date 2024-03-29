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
$date0 = date('Y-m-d', strtotime('-1 day'));
$date1 = date('Y-m-d', strtotime('-2 day'));
$date2 = date('Y-m-d', strtotime('-3 day'));
$date3 = date('Y-m-d', strtotime('-4 day'));
$date4 = date('Y-m-d', strtotime('-5 day'));
$date5 = date('Y-m-d', strtotime('-6 day'));

$c0 = 0;
$c1= 0;
$c2= 0;
$c3= 0;
$c4= 0;
$c5= 0;

$stmt2 = $mysqli->query("SELECT fecha_den FROM curden WHERE fecha_den > '$date5'");
if ($stmt2->num_rows > 0) 
{   
    while($row = $stmt2->fetch_assoc())
    {
        switch($row["fecha_den"])
        {
            case $date0;
            $c0++;
            break;
            case $date1;
            $c1++;
            break;
            case $date2;
            $c2++;
            break;
            case $date3;
            $c3++;
            break;
            case $date4;
            $c4++;
            break;
            case $date5;
            $c5++;
            break;
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
            $titulodelapagina = "Gráfico de denuncias";
			include 'main_css.php';
		?>
        <style>
        #canvas-holder1 {
            width: 300px;
            margin: 20px auto;
        }
        #canvas-holder2 {
            width: 50%;
            margin: 20px 25%;
        }
        #chartjs-tooltip {
            opacity: 1;
            position: absolute;
            background: rgba(0, 0, 0, .7);
            color: white;
            padding: 3px;
            border-radius: 3px;
            -webkit-transition: all .1s ease;
            transition: all .1s ease;
            pointer-events: none;
            -webkit-transform: translate(-50%, 0);
            transform: translate(-50%, 0);
        }
        .chartjs-tooltip-key{
            display:inline-block;
            width:10px;
            height:10px;
        }
        </style>
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
                    <div class="col-xs-12">
                    <h1 class="text-center junction-bold text-warning">Denuncias recibidas los últimos cinco días</h1>
                        <div class="col-xs-8 col-sm-offset-2">
                            <canvas id="canvas" height="150" width="300"></canvas>
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
        
    <script src="../assets/js/Chart.Core.js"></script>
    <script src="../assets/js/Chart.Line.js"></script>
    <script>
        var lineChartData = {
			labels : ["<?=$date5?>", "<?=$date4?>", "<?=$date3?>", "<?=$date2?>", "<?=$date1?>", "<?=$date0?>"],
			datasets : [
				{
					label: "My First dataset",
					fillColor : "rgba(232, 69, 69,0.2)",
					strokeColor : "rgb(232, 69, 69)",
					pointColor : "rgba(232, 69, 69,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(232, 69, 69,1)",
					data : [<?=$c5?>, <?=$c4?>, <?=$c3?>, <?=$c2?>, <?=$c1?>, <?=$c0?>]
				}
			]

		}

        
        window.onload = function(){
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myLine = new Chart(ctx).Line(lineChartData, {
                bezierCurve : false,
                responsive: true
            });
        }
    </script>
	</body>
</html>