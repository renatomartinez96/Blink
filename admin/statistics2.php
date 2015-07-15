<?php
include_once '../assets/includes/db_conexion.php';
include_once '../assets/includes/funciones.php';
$stmt = $mysqli->query("SELECT fecha_den FROM curden WHERE idCur = 1 AND fecha_den > '2015-07-10 00:00:00'");

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
        
    <div id="canvas-holder2">
        <canvas id="chart1" width="450" height="600" />
    </div>

    <div id="chartjs-tooltip"></div>
    
    <script src="../assets/js/Chart.Core.js"></script>
    <script src="../assets/js/Chart.Doughnut.js"></script>
    <script src="../assets/js/Chart.PolarArea.js"></script>
    <script src="../assets/js/Chart.Radar.js"></script>
    <script src="../assets/js/Chart.Line.js"></script>
    <script src="../assets/js/jquery.js"></script>
    <script>
    Chart.defaults.global.pointHitDetectionRadius = 1;
    Chart.defaults.global.customTooltips = function(tooltip) {
        var tooltipEl = $('#chartjs-tooltip');
        if (!tooltip) {
            tooltipEl.css({
                opacity: 0
            });
            return;
        }
        tooltipEl.removeClass('above below');
        tooltipEl.addClass(tooltip.yAlign);
        var innerHtml = '';
        for (var i = tooltip.labels.length - 1; i >= 0; i--) {
        	innerHtml += [
        		'<div class="chartjs-tooltip-section">',
        		'	<span class="chartjs-tooltip-key" style="background-color:' + tooltip.legendColors[i].fill + '"></span>',
        		'	<span class="chartjs-tooltip-value">' + tooltip.labels[i] + '</span>',
        		'</div>'
        	].join('');
        }
        tooltipEl.html(innerHtml);
        tooltipEl.css({
            opacity: 1,
            left: tooltip.chart.canvas.offsetLeft + tooltip.x + 'px',
            top: tooltip.chart.canvas.offsetTop + tooltip.y + 'px',
            fontFamily: tooltip.fontFamily,
            fontSize: tooltip.fontSize,
            fontStyle: tooltip.fontStyle,
        });
    };
    var randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };
    var lineChartData = {
        labels: ["lel", "lel", "lel", "lel", "lel"],
        datasets: [{
            label: "My First dataset",
            fillColor: "rgba(222, 75, 75,0.2)",
            strokeColor: "rgb(222, 75, 75)",
            pointColor: "rgba(222, 75, 75,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(222, 75, 75,1)",
            data: [5, 10, 77, 43, 59]
        }]
    };
    window.onload = function() {
        var ctx1 = document.getElementById("chart1").getContext("2d");
        window.myLine = new Chart(ctx1).Line(lineChartData, {
        	showScale: false,
        	pointDot : true,
            responsive: true
        });
    };
    </script>
    </body>
</html>