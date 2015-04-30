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
                            <div class="col-md-6 panel">
                            <label>Tema de editor de codigo</label><select id="a" name="themeto" class="form-control" onchange="showImage()">
                                <option value="1" >Tema 1</option>
                                <option value="2" >Tema 2</option>
                                <option value="3" >Tema 3</option>
                                </select>
                                <div id="preview" width="100"></div>
                            </div>
                            <div class="col-md-6" >
                            <label>Foto de portada</label><select id="e" name="portada" class="form-control" onchange="showImage()">
                                <option value="1" >Tema 1</option>
                                <option value="2" >Tema 2</option>
                                <option value="3" >Tema 3</option>
                                </select>
                                <div id="preview2" width="100"></div>
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
        var name1 = document.getElementsByTagName("SELECT")[0].getAttribute("name");
        var type1 = "themeto";
        var type2 = "portada";
            if(name1 == type1)
            {
                document.getElementById('preview').style.background = "url(../assets/img/avatares/"+val+".png)";
                document.getElementById('preview').style.height = "200px";   
            }
            else if(name1 == type2)
            {
                document.getElementById("preview2").innerHTML="asfasfgr";
            }
//        document.getElementById("preview").innerHTML=val;
        }
        </script>
		<?php 
			include 'main_js.php';
		?>
		<!--/#Main js-->
	</body>
</html>
