<?php
include_once '../assets/includes/db_conexion.php';
include_once '../assets/includes/funciones.php';
 
sec_session_start();
include 'auto.php';
$user = $_SESSION['username'];
?>
<!--

Copyright (c) 2015 Blink
All Rights Reserved
 
This product is protected by copyright and distributed under
licenses restricting copying, distribution, and decompilation.

Gerardo López | Iván Nolasco | Renato Andres

-->

<!DOCTYPE html>
<html lang="en">
	<head>
		<!--Core CSS-->
		<?php
            // Titulo de esta página:
            $titulodelapagina = "Administración de Blink";
			include 'main_css.php';
		?>
        <!--Custom css-->
        <link href="../assets/css/sidebar.css" rel="stylesheet">
        <link href="../assets/css/perfil.css" rel="stylesheet">
        <!--/#Custom css-->
		<!--/#Core CSS-->
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
            <div id="page-content-wrapper">
				<div class="container-fluid">
					<div class="row">
                        <h2 class="junction-regular text-center">Welcome administrator <?=$user?>!</h2>
                        <div class="col-md-4 text-center">
                            <div class="alert alert-info">
                                <h2 class="panel-title"><i class="fa fa-users"></i> Users
                                  <?php
                                $stmt = $mysqli->prepare("SELECT log FROM usuarios_tb WHERE log < 1");
                                $stmt->execute();  
                                $stmt->store_result();
                                $stmt->bind_result($log);
                                $stmt->fetch();
                                $row_cnt = $stmt->num_rows;
                                if($row_cnt > 0)
                                {
                                    //while($stmt->fetch($log)){}
                                        echo "<span class='label label-success'>There are ".$row_cnt." new users!</span>";
                                }
                                else
                                {
                                    echo "<span class='label label-default'>There are not new users</span>";
                                }
                                ?>
                                </h2><br>
                                  <a href="usuarios.php" class="btn btn-success"><i class="fa fa-list-ul"></i> Ver listado de usuarios</a><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Main js-->
		
		<!--/#Main js-->
	</body>
</html>