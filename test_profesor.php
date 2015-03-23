<?php ?>
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
            $titulodelapagina = "¡Quiero ser un profesor!";
			include 'main_css.php';
		?>
		<!--/#Core CSS-->

		<!--Custom CSS-->
		<link href="assets/css/sidebar.css" rel="stylesheet">
        <style>
            body{
                background: #364072;
            }
            label > h3{
                margin-top:5px;
                margin-bottom:5px;
            }
        </style>
		<!--/#Custom CSS-->

	</head>
	<body>
        <!--Main js-->
		<?php 
			include 'main_js.php';
		?>
		<!--/#Main js-->
        <center style="color:#fff;">
            <h1 class="junction-bold">Blink</h1>
            <h3 class="junction-regular">Hola hommie de la Web :v</h3>
            <p class="junction-regular">¿Así que quieres ser uno de nuestros profesores? Pues solo debes hacer un test, para confirmar que eres digno para prestarnos nuestros servicios ;)</p>
            <p><a href="home.php" class="btn btn-info">No gracias, necesito practicar</a>  <a href="home.php" class="btn btn-success">¡Juegue!</a></p>
        </center>
        <!---->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">LEL</button>
        
        <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">LEL</h4>
            </div>
            <div class="modal-body">
                LEL
            </div>
            <div class="modal-footer">
                <a href="galeria.php" class="btn btn-primary btn-xs">LEL<i class="fa fa-arrow-right"></i></a>
            </div>
            </div>
            </div>
            </div>
            <!-- Modal -->
        <!---->
    <!--/#Page Content -->
	</body>
</html>