<?php
    include_once '../assets/includes/db_conexion.php';
    include_once '../assets/includes/funciones.php';
    sec_session_start();
    $user = $_SESSION['username'];
    $userid = $_SESSION['user_id'];
    $tipo = $_SESSION['tipo'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="../assets/css/main.css" rel="stylesheet">
        <link href="../assets/css/sidebar.css" rel="stylesheet">
        <link href="../teacher/style.css" rel="stylesheet">
		<link href="../assets/css/sidebar.css" rel="stylesheet">
        <script async src="../assets/js/jquery.js" type="text/javascript"></script>
        <script async src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
        <?php include "app/head.php"?>
	</head>
	<body>
		<?php 
			include '../nav/topbar.php';
		?>
		<div id="wrapper" class="toggled">
        <?php 
            include '../nav/sidebar.php';
        ?>
			<!--Page Content -->
            <div class="col-xs-12 results">
            <?php 
                $seguardo = false;
				include 'php/loadLes.php';
                include 'php/crearLes.php';
                if ($seguardo) {
                include 'indexDoce.php';
                }
			?>
            </div>
             
            <!--/#Page Content -->
		</div>
	<script>
            $("#menu-toggle").click(function(g){g.preventDefault(),$("#wrapper").toggleClass("toggled"),$("#avatar").toggleClass("toggled"),$(".sidebar-nav").toggleClass("toggled"),$(".textos").toggleClass("toggled")});
        </script>	
	</body>
    
</html>