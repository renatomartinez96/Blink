<?php
    include_once '../assets/includes/db_conexion.php';
    include_once '../assets/includes/funciones.php';
    include_once '../assets/includes/lang.php';
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
        <script async src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery-2.1.1.js" type="text/javascript"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HTML generator</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
     <!-- Custom JS -->
    <script src="js/jquery-2.1.1.js" type="text/javascript"></script>
    <script>
        <?php 
            include "app/ejecucionUsu.php";
        ?>
    </script>
    <script src="js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <link href="../assets/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <script src="../assets/js/bootstrap-colorpicker.min.js"></script>
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
            <div class='panel-group animated fadeInDown' id='accordion' role='tablist' aria-multiselectable='true' style='margin-bottom:0px;'> 
                          <div class='panel panel-default'>
                                <div class='panel-heading' role='tab' id='headingTwo'>
                                  <h4 class='panel-title'>
                                    <div class='collapsed' data-toggle='collapse' data-parent='#accordion' href='#collapseTwo' aria-expanded='false' aria-controls='collapseTwo'>
                                      <h4 class='pista'>Free mode</h4>
                                    </div>
                                  </h4>
                              </div>
                </div>
                </div>
            <?php 
                    include 'app/graphic.php';
            ?>    
            </div>
             

		</div>
	   <script>
            $("#menu-toggle").click(function(g){g.preventDefault(),$("#wrapper").toggleClass("toggled"),$("#avatar").toggleClass("toggled"),$(".sidebar-nav").toggleClass("toggled"),$(".textos").toggleClass("toggled")});
           $('.restard').remove();
           
        </script>  
     
	</body>

</html>
