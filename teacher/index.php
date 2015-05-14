<!--
Copyright (c) 2015 Blink
All Rights Reserved
 
This product is protected by copyright and distributed under
licenses restricting copying, distribution, and decompilation.
Gerardo López | Iván Nolasco | Renato Andres
-->
<?php
    include_once '../assets/includes/db_conexion.php';
    include_once '../assets/includes/funciones.php';
    sec_session_start();
    $user = $_SESSION['username'];
    $userid = $_SESSION['user_id'];
    $tipo = $_SESSION['tipo'];
    $elidespecial = $_SESSION['user_id'];
    $avatar = '';
    if ($stmt = $mysqli->prepare("SELECT usuarios_tb.avatar, usuarios_tb.nombres, usuarios_tb.apellidos, usuarios_tb.nacimiento, usuarios_tb.descripcion, usuarios_tb.correo, usuarios_tb.tipo, usuarios_tb.lang, usuarios_tb.idusuario, user_config.banner, user_config.iduser FROM usuarios_tb INNER JOIN user_config ON usuarios_tb.idusuario = user_config.iduser WHERE usuarios_tb.idusuario = ?")) 
    {
        $stmt->bind_param('s', $elidespecial);
        $stmt->execute(); 
        $stmt->store_result();
        $stmt->bind_result($avatar,$nombres,$apellidos,$nacimiento,$descripcion,$correo,$tiipo,$lang,$idusuario,$bannero,$iduserconf);
        $stmt->fetch();
        
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!--Core CSS-->
		<?php 
            $titulodelapagina = "¡Bienvenido $user!";
			include 'main_css.php';
            include 'main_js.php';
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
            
                
			     <div class="col-xs-12 results">
            
                </div>
                <div class="col-xs-6 col-xs-offset-3 loading">
                        <i class="fa fa-cog fa-spin fa-5x"></i>
                    </div>
                <div class="modal fade" id="modalDesc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Agregar curso</h4>
                      </div>
                      <div class="modal-body">
                          <h4>Nombre:</h4>
                         <input class="form-control nameCur" type="text" placeholder="Name">
                          <h4>Descripción:</h4>
                          <textarea class="form-control descripCur" placeholder="Description"></textarea>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary createCou">Crear curso</button>
                      </div>
                    </div>
                  </div>
            </div>
           
			<!--/#Page Content -->
		</div>
		<!--Main js-->
		<?php 
			include 'main_js.php';
        
		?>
	<script>
            
        <?php     
            include 'script.php';
		?>
         loadCursos();
});

        </script>	
	</body>
</html>