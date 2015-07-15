<?php
include_once '../assets/includes/db_conexion.php';
include_once '../assets/includes/funciones.php';
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

$stmt = $mysqli->query("SELECT fecha_den FROM curden WHERE idCur = 1 AND fecha_den > '$date5'");
if ($stmt->num_rows > 0) 
{   
    while($row = $stmt->fetch_assoc())
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
<!DOCTYPE html>
<html lang="en">
	<head>
        <title>lel</title>
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
	</head>
    <body>
        
    <div style="width:30%">
        <div>
            <canvas id="canvas" height="450" width="300"></canvas>
        </div>
    </div>

        
    <script src="../assets/js/Chart.Core.js"></script>
    <script src="../assets/js/Chart.Line.js"></script>
    <script src="../assets/js/jquery.js"></script>

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
                responsive: true
            });
        }
    </script>
        
    </body>
</html>