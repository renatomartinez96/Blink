<?php
    include '../assets/includes/db_conexion.php';
    include '../assets/includes/funciones.php';
    sec_session_start();
    $user = $_SESSION['username'];
    $userid = $_SESSION['user_id'];
    $tipo = $_SESSION['tipo'];
    if(isset($_GET['l'])){
    $stmt = $mysqli->prepare("SELECT teoria FROM leccion WHERE idleccion = ?");
    $stmt->bind_param('s', $_GET['l']);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($teoria);
    $stmt->fetch();
    if($stmt->num_rows == 1){
    
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
            <div class="msgCl"></div>
            <?php 
                    include 'indexStud.php';
            ?>    
            </div>
             

		</div>
       <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Introducción Teórica</h4>
              </div>
              <div class="modal-body">
                <p><?=$teoria?></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
              </div>
            </div>
          </div>
        </div>
       
        <?php include "app/headjsSDos.php";?>
	<script>
            $("#menu-toggle").click(function(g){g.preventDefault(),$("#wrapper").toggleClass("toggled"),$("#avatar").toggleClass("toggled"),$(".sidebar-nav").toggleClass("toggled"),$(".textos").toggleClass("toggled")});
            var lessonG = "<?php echo $_GET['l'] ?>";
            var idUserPHP = "<?php echo $userid ?>";
            $('#myModal').modal('show');
        </script>  
        
    <?php 
    }else {
        echo "no existe";
    }
    }?>  
	</body>
    
</html>