<?php
    include_once '../assets/includes/db_conexion.php';
    include_once '../assets/includes/funciones.php';
    sec_session_start();
    $user = $_SESSION['username'];
    $idsea = $_SESSION['user_id'];
    if ($stmt = $mysqli->prepare("SELECT idpersonalizacion, usercod, theme_editor, portada FROM personalizacion WHERE usercod = ?")) 
    {
        $stmt->bind_param('s', $idsea);
        $stmt->execute(); 
        $stmt->store_result();
        $stmt->bind_result($idpersonalizacion, $usercod, $theme, $portada);
        $stmt->fetch();
        
    }
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
            $titulodelapagina = "Editar mis datos";
			include 'main_css.php';
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
			<div id="page-content-wrapper">
				<div class="container-fluid">
					<div class="row">
					<!--Content-->
                        <h1 class="junction-bold text-center">Editar mi perfil</h1>
                        <form action="usuario_editar.php" method="post" name="form" id="form">
                            <div class="col-md-6">
                            <label>Tema de editor de codigo <?=$idsea?></label><select id="a" name="tema" class="form-control" onchange="showImage()">
                                <option value="1" >LEL</option>
                                <option value="2" >dfgsdfgs</option>
                                <option value="3" >fuck the system</option>
                                </select>
                            </div>
                            <div class="col-md-6" id="reni">
                                <?="aceeditor"?>
                            </div>
                        </form>
					<!--/#Content-->
					</div>
				</div>
			</div>
			<!--/#Page Content -->
		</div>
		<!--Main js-->
        <script>
        function showImage() {
        var val = document.getElementById('a').value;
        document.getElementById('reni').style.background = "url(../assets/img/avatares/"+val+".png)";
        document.getElementById('reni').style.height = "200px";
//        document.getElementById("reni").innerHTML=val;
        }
        </script>
		<?php 
			include 'main_js.php';
		?>
		<!--/#Main js-->
	</body>
</html>
