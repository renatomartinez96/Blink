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

if(isset($_GET["days"]))
{
    $dayto = $_GET['days'];
    for($x = 0; $x <= $dayto; $x++)
    {
        $date[$x] = date('Y-m-d', strtotime("-".$x." day"));
        $c[$x] = 0;
    }
    $stmtgraph = $mysqli->query("SELECT registro FROM usuarios_tb WHERE registro > '$date[$dayto]'");
    if ($stmtgraph->num_rows > 0) 
    {
        while($rowgraph = $stmtgraph->fetch_assoc())
        {
            for($x=0; $x < $dayto; $x++)
            {
                switch($rowgraph["registro"])
                {
                    case $date[$x];
                    $c[$x]++;
                    break;
                }
            }
        }
    }
}
else
{
    for($x = 0; $x <= 6; $x++)
    {
        $date[$x] = date('Y-m-d', strtotime("-".$x." day"));
        $c[$x] = 0;
    }
    $stmtgraph = $mysqli->query("SELECT registro FROM usuarios_tb WHERE registro > '$date[5]'");
    if ($stmtgraph->num_rows > 0) 
    {
        while($rowgraph = $stmtgraph->fetch_assoc())
        {
            switch($rowgraph["registro"])
            {
                case $date[0];
                $c[0]++;
                break;
                case $date[1];
                $c[1]++;
                break;
                case $date[2];
                $c[2]++;
                break;
                case $date[3];
                $c[3]++;
                break;
                case $date[4];
                $c[4]++;
                break;
                case $date[5];
                $c[5]++;
                break;
            }
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
            $titulodelapagina = "sdfsd";
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
                        <div class="col-xs-12 col-md-8 col-sm-offset-2" >
                            <h3 class="junction-bold text-center">Cantidad de usuarios registrados</h3>
                            <canvas id="canvas" height="375" width="600"></canvas>
                        </div>
                    <!--/#Content-->
					</div>
				</div>
			</div>
			<!--/#Page Content -->
		</div>
		<!--Main js-->
		<?php
            include "main_js.php";
        ?>
        <script src="../assets/js/Chart.Core.js"></script>
        <script src="../assets/js/Chart.Line.js"></script>
	<script>
		var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
		<?php
        if(isset($_GET["days"]))
        {
        ?>
            var lineChartData = {
                labels : [<?php
                    for($x = $dayto; $x >= 0; $x--)
                    {
                        if($x == 0)
                        {
                            echo "'".$date[$x]."'";
                        }
                        else
                        {
                            echo "'".$date[$x]."',";
                        }
                    }
                    ?>],
                datasets : [
                    {
                        label: "My First dataset",
                        fillColor : "rgba(39, 174, 96, 0.2)",
                        strokeColor : "rgb(39, 174, 96)",
                        pointColor : "rgba(39, 174, 96,1)",
                        pointStrokeColor : "#fff",
                        pointHighlightFill : "#fff",
                        pointHighlightStroke : "rgba(39, 174, 96,1)",
                        data : [
                        <?php
                        for($x = $dayto; $x >= 0; $x--)
                        {
                            if($x == 0)
                            {
                                echo "'".$c[$x]."'";
                            }
                            else
                            {
                                echo "'".$c[$x]."',";
                            }
                        }
                        ?>
                        ]
                    }
                ]
            }
        <?php
        }
        else
        {
        ?>
            var lineChartData = {
                labels : ["<?=$date[5]?>", "<?=$date[4]?>", "<?=$date[3]?>", "<?=$date[2]?>", "<?=$date[1]?>", "<?=$date[0]?>"],
                datasets : [
                    {
                        label: "My First dataset",
                        fillColor : "rgba(39, 174, 96, 0.2)",
                        strokeColor : "rgb(39, 174, 96)",
                        pointColor : "rgba(39, 174, 96,1)",
                        pointStrokeColor : "#fff",
                        pointHighlightFill : "#fff",
                        pointHighlightStroke : "rgba(39, 174, 96,1)",
                        data : ["<?=$c[5]?>", "<?=$c[4]?>", "<?=$c[3]?>", "<?=$c[2]?>", "<?=$c[1]?>", "<?=$c[0]?>"]
                    }
                ]
            }
        <?php
        }
        ?>

	window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: true
		});
	}


	</script>
	</body>
</html>