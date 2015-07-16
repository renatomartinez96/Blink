<?php
    include '../assets/includes/db_conexion.php';
    include '../assets/includes/funciones.php';

    sec_session_start();
    $user = $_SESSION['username'];
    $userid = $_SESSION['user_id'];
    $tipo = $_SESSION['tipo'];
    include "php/loadOptions.php";
    if(isset($_GET['l'])){
     $avatar = '';
    if ($stmt = $mysqli->prepare("SELECT avatar FROM usuarios_tb WHERE usuario = ?")) {
        $stmt->bind_param('s', $user);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($avatar);
        $stmt->fetch();
    }
    if ($stmt = $mysqli->prepare("SELECT usuarios_tb.avatar, usuarios_tb.nombres, usuarios_tb.apellidos, usuarios_tb.nacimiento, usuarios_tb.descripcion, usuarios_tb.correo, usuarios_tb.tipo, usuarios_tb.lang, usuarios_tb.idusuario, user_config.banner, user_config.iduser FROM usuarios_tb INNER JOIN user_config ON usuarios_tb.idusuario = user_config.iduser WHERE usuarios_tb.idusuario = ?"))
    {
        $stmt->bind_param('s', $elidespecial);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($avatar,$nombres,$apellidos,$nacimiento,$descripcion,$correo,$tipo,$lang,$idusuario,$bannero,$iduserconf);
        $stmt->fetch();

    }
    include_once '../assets/includes/lang.php';
    $stmt = $mysqli->prepare("SELECT teoria,nombre FROM leccion WHERE idleccion = ?");
    $stmt->bind_param('s', $_GET['l']);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($teoria,$nombre);
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
        <script src="js/jquery.js" type="text/javascript"></script>
		<link href="../assets/css/sidebar.css" rel="stylesheet">
        <script async src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
          <script scr="js/stats.js" type="text/javascript"></script>

        <?php include "app/headcss.php"?>
  <style media="screen">
    .well {
      margin:2.5%;
      background-color:#1D9DDE;
    }
    // .panel-primary>.panel-heading {
    //   background-color:#1D9DDE;
    // }
  </style>
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
          <div class="panel panel-default">
            <div class="panel-heading"><h1>Lessons statistics: <?php echo $nombre; ?></h1></div>
              <div class="panel-body">
                    <div class="panel panel-primary col-xs-6">
                      <div class="panel-heading col-xs-12">
                        <div class="col-xs-7">
                          <h2 class="panel-title" style="margin-top:3%;">Unfinished</h2>
                        </div>
                        <div class="form-group col-xs-5" style="margin:0;">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="panel-body RE">
                        Panel content
                      </div>
                    </div>
                    <div class="panel panel-primary col-xs-6">
                      <div class="panel-heading col-xs-12">
                        <div class="col-xs-7">
                          <h2 class="panel-title" style="margin-top:3%;">Completed lessons</h2>
                        </div>
                        <div class="form-group col-xs-5" style="margin:0;">
                          <div class="input-group">
                            <span class="input-group-addon "><i class="fa fa-search"></i></span>
                            <input type="text" class="form-control CA">
                          </div>
                        </div>
                      </div>
                      <div class="panel-body CO">
                        Panel content
                      </div>
                    </div>
              </div>
          </div>
        </div>

		</div>
	<script>
            $("#menu-toggle").click(function(g){g.preventDefault(),$("#wrapper").toggleClass("toggled"),$("#avatar").toggleClass("toggled"),$(".sidebar-nav").toggleClass("toggled"),$(".textos").toggleClass("toggled")});
            var lessonG = "<?php echo $_GET['l'] ?>";
            var idUserPHP = "<?php echo $userid ?>";
        </script>
  <script type="text/javascript">
  $(document).ready(function(){
    $.ajax({
              method: "POST",
              url: "ajax/statsAll.php",
              data: {le:lessonG},
              // dataType: 'json',
              beforeSend: function() {

              },
              success: function(data) {
                  $(".CO").html(data);
              }
          });
    $.ajax({
              method: "POST",
              url: "ajax/statsNo.php",
              data: {le:lessonG},
              // dataType: 'json',
              beforeSend: function() {

              },
              success: function(data) {
                  $(".RE").html(data);
              }
          });
          $(".CA").on("input",function(){
            var value = $(this).val();
            function search(valor) {
                var count=0,notfound=0;

                 $(".CO div").each(function(){
                     count++;
                    if ($(this).text().search(new RegExp(valor, "i")) < 0) {
                        $(this).fadeOut();
                         notfound++;
                } else {
                        $(this).show();

                }

                });
             if(count == notfound){
                   $(".noexiste").delay( 800 ).show();
                }else {
                    $(".noexiste").fadeOut(10);
                }
                console.log(count);
            }
            search(value);
          });
  });

  </script>
    <?php
    }else {
        echo "The lesson doesn't exist";
    }
    }?>
	</body>

</html>
