<!--

Copyright (c) 2015 Blink
All Rights Reserved
 
This product is protected by copyright and distributed under
licenses restricting copying, distribution, and decompilation.

Gerardo López | Iván Graciano | Renato Andres

-->

<!DOCTYPE html>
<html lang="en">
	<head>
		<!--Core CSS-->
		<?php 
            $titulodelapagina = "Editor";
			include 'main_css.php';
		?>
		<!--/#Core CSS-->

		<!--Custom CSS-->
		<link href="assets/css/editor.css" rel="stylesheet">
		<!--/#Custom CSS-->
	</head>
	<body>
		<!--Topbar -->
		<?php 
			include 'nav/topbar.php';
		?>
		<!--/#Topbar -->
		<div id="wrapper" class="toggled">
			<!--Sidebar -->
			<?php 
				include 'nav/sidebar.php';
			?>
			<!--/#Sidebar -->
			<!--Page Content -->
			<div id="page-content-wrapper">
				<div class="container-fluid">
					<div class="row">
					<!--Content-->
				    <div class="col-sm-7 full">
                        <div class="panel panel-success full">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong class="junction-light">HTML</strong>(HyperText Markup Language)</h3>
                            </div>
                            <div class="panel-body full">
                                <pre id="editor"><?php echo htmlentities(file_get_contents("users/Gerardo97/index.html")); ?></pre>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-sm-5 full">
                        <div class="panel panel-success full">
                            <div class="panel-heading ">
                                <h3 class="panel-title"><strong class="junction-light">CSS</strong>(Cascading Style Sheets)</h3>
                            </div>
                            <div class="panel-body full">
                                <pre id="editor2"><?php echo htmlentities(file_get_contents("users/Gerardo97/css/index.css")); ?></pre>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-sm-12 full">
                        <div class="panel panel-success full">
                            <div class="panel-heading ">
                                <h3 class="panel-title"><strong class="junction-light">Result</strong></h3>
                            </div>
                            <div class="panel-body full">
                                <iframe src="users/Gerardo97/index.html" class="full col-sm-12 resultc"></iframe>
                            </div>
                        </div>
                        
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
		<!--/#Main js-->
		<!--Editor js-->
		<?php 
			include 'editor_js.php';
		?>
		<!--/#Editor js-->
  		
	
	</body>
</html>
