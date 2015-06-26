<?php
    include_once '../assets/includes/db_conexion.php';
    include_once '../assets/includes/funciones.php';
    sec_session_start();
    $user = $_SESSION['username'];
    $userid = $_SESSION['user_id'];
    $tipo = $_SESSION['tipo'];
      include "php/loadOptions.php";
    if ($stmt = $mysqli->prepare("SELECT usuarios_tb.avatar, usuarios_tb.nombres, usuarios_tb.apellidos, usuarios_tb.nacimiento, usuarios_tb.descripcion, usuarios_tb.correo, usuarios_tb.tipo, usuarios_tb.lang, usuarios_tb.idusuario, user_config.banner, user_config.iduser FROM usuarios_tb INNER JOIN user_config ON usuarios_tb.idusuario = user_config.iduser WHERE usuarios_tb.idusuario = ?"))
    {
        $stmt->bind_param('s', $elidespecial);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($avatar,$nombres,$apellidos,$nacimiento,$descripcion,$correo,$tipo,$lang,$idusuario,$bannero,$iduserconf);
        $stmt->fetch();
    }
 include_once '../assets/includes/lang.php';
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
        <link href="../assets/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <script src="../assets/js/bootstrap-colorpicker.min.js"></script>
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
        Por favor completa la lección para activarla.
      </div>
      <div class="modal-footer">
        <a href="loadlesson.php?l=<?php echo $idleccion ?>"><button type="button" class="btn btn-primary">Continue</button></a>
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
