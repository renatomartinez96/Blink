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
            $titulodelapagina = " ";
			include 'main_css.php';
		?>
		<!--/#Core CSS-->

		<!--Custom CSS-->
		<link href="assets/css/sidebar.css" rel="stylesheet">
        <link href="assets/css/bootstrap-colorpicker.min.css" rel="stylesheet">
		<!--/#Custom CSS-->

	</head>
	<body>
		<!--Topbar -->
		<!--/#Topbar -->
		<div id="wrapper" class="toggled">
			<!--Sidebar -->
			<!--/#Sidebar -->
			
			<!--Page Content -->
			<div id="page-content-wrapper">
				<div class="container-fluid">
					<div class="row">
					<!--Content-->
                    <div class="input-group demo2">
                        <input type="text" value="#ffffff" class="form-control colorpicker-element" maxlength="7" data-format="hex"/>
                        <span class="input-group-addon"><i></i></span>
                    </div>
					<!--/#Content-->
					</div>
				</div>
			</div>
			<!--/#Page Content -->
		</div>
		<!--Main js-->
		<?php 
			include 'main_js.php';
		?>
        <script src="assets/js/bootstrap-colorpicker.min.js"></script>
        <script>
            $(function(){
                $('.demo2').colorpicker({
                format: 'hex',
                });
            });
        </script>
		<!--/#Main js-->
	</body>
</html>
