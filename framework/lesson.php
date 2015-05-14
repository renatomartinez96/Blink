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
        <script async src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery-2.1.1.js" type="text/javascript"></script>
        <?php include "app/headcss.php"?>
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
                
			?>
             <?php 
                if ($seguardo) {
                    include 'indexDoce.php';
                }
            ?>    
            </div>
             

		</div>
     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Ya casi!</h4>
      </div>
      <div class="modal-body">
        Para poder activar la lección tendrás que realizarla, es recomendable hacerlo en un tiempo prudencial.
      </div>
      <div class="modal-footer">
        <a href="loadlesson.php?l=<?php echo $idleccion ?>"><button type="button" class="btn btn-primary">Aceptar</button></a>
      </div>
    </div>
  </div>
</div>       
	<script>
            $("#menu-toggle").click(function(g){g.preventDefault(),$("#wrapper").toggleClass("toggled"),$("#avatar").toggleClass("toggled"),$(".sidebar-nav").toggleClass("toggled"),$(".textos").toggleClass("toggled")});
            var cursososo = "<?php echo $idleccion?>";
            var cursososo22 = "<?php echo $idCurso?>";
        </script>
           <?php include "app/headjs.php"?>  
	</body>
    
</html>