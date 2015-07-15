<?php
include_once '../assets/includes/db_conexion.php';
include_once '../assets/includes/funciones.php';
$stmt = $mysqli->query("SELECT genero FROM usuarios_tb WHERE estado = 1");
if($stmt->num_rows > 0)
{
    $m = 0;
    $f = 0;
    while($row = $stmt->fetch_assoc())
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
<!DOCTYPE html>
<html lang="en">
	<head>
        <title>lel</title>
        <style>
        #canvas-holder {
            width: 100%;
            margin-top: 50px;
            text-align: center;
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
        #chartjs-tooltip.below {
            -webkit-transform: translate(-50%, 0);
            transform: translate(-50%, 0);
        }
        #chartjs-tooltip.below:before {
            border: solid;
            border-color: #111 transparent;
            border-color: rgba(0, 0, 0, .8) transparent;
            border-width: 0 8px 8px 8px;
            bottom: 1em;
            content: "";
            display: block;
            left: 50%;
            position: absolute;
            z-index: 99;
            -webkit-transform: translate(-50%, -100%);
            transform: translate(-50%, -100%);
        }
        #chartjs-tooltip.above {
            -webkit-transform: translate(-50%, -100%);
            transform: translate(-50%, -100%);
        }
        #chartjs-tooltip.above:before {
            border: solid;
            border-color: #111 transparent;
            border-color: rgba(0, 0, 0, .8) transparent;
            border-width: 8px 8px 0 8px;
            bottom: 1em;
            content: "";
            display: block;
            left: 50%;
            top: 100%;
            position: absolute;
            z-index: 99;
            -webkit-transform: translate(-50%, 0);
            transform: translate(-50%, 0);
        }
        </style>
	</head>
    <body>
        
        <div id="canvas-holder">
        <canvas id="chart-area2" width="300" height="300" />
    </div>

    <div id="chartjs-tooltip"></div>
    
    <script src="../assets/js/Chart.Core.js"></script>
    <script src="../assets/js/Chart.Doughnut.js"></script>
    <script src="../assets/js/Chart.PolarArea.js"></script>
    <script src="../assets/js/Chart.Radar.js"></script>
    <script src="../assets/js/jquery.js"></script>
    <script>
    Chart.defaults.global.customTooltips = function(tooltip) {
    	// Tooltip Element
        var tooltipEl = $('#chartjs-tooltip');
        // Hide if no tooltip
        if (!tooltip) {
            tooltipEl.css({
                opacity: 0
            });
            return;
        }
        // Set caret Position
        tooltipEl.removeClass('above below');
        tooltipEl.addClass(tooltip.yAlign);
        // Set Text
        tooltipEl.html(tooltip.text);
        // Find Y Location on page
        var top;
        if (tooltip.yAlign == 'above') {
            top = tooltip.y - tooltip.caretHeight - tooltip.caretPadding;
        } else {
            top = tooltip.y + tooltip.caretHeight + tooltip.caretPadding;
        }
        // Display, position, and set styles for font
        tooltipEl.css({
            opacity: 1,
            left: tooltip.chart.canvas.offsetLeft + tooltip.x + 'px',
            top: tooltip.chart.canvas.offsetTop + top + 'px',
            fontFamily: tooltip.fontFamily,
            fontSize: tooltip.fontSize,
            fontStyle: tooltip.fontStyle,
        });
    };
    var pieData = [{
        value: <?=$m?>,
        color: "#5d5dbe",
        highlight: "#4d4db2",
        label: "Male"
    }, {
        value: <?=$f?>,
        color: "#cc8fb2",
        highlight: "#cc70a5",
        label: "Female"
    }];
    window.onload = function() {
        var ctx2 = document.getElementById("chart-area2").getContext("2d");
        window.myPie = new Chart(ctx2).Pie(pieData);
    };
    </script>
    </body>
</html>