<?php
    include_once '../assets/includes/db_conexion.php';
    include_once '../assets/includes/funciones.php';
    sec_session_start();
    $user = $_SESSION['username'];
    $elidespecial = $_SESSION['user_id'];
    $avatar = '';
    if ($stmt = $mysqli->prepare("SELECT usuarios_tb.avatar, usuarios_tb.nombres, usuarios_tb.apellidos, usuarios_tb.nacimiento, usuarios_tb.descripcion, usuarios_tb.correo, usuarios_tb.tipo, usuarios_tb.lang, usuarios_tb.idusuario, user_config.banner, user_config.iduser FROM usuarios_tb INNER JOIN user_config ON usuarios_tb.idusuario = user_config.iduser WHERE usuarios_tb.idusuario = ?")) 
    {
        $stmt->bind_param('s', $elidespecial);
        $stmt->execute(); 
        $stmt->store_result();
        $stmt->bind_result($avatar,$nombres,$apellidos,$nacimiento,$descripcion,$correo,$tipo,$lang,$idusuario,$bannero,$iduserconf);
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
            $titulodelapagina = "Changing editor theme";
			include 'main_css.php';
		?>
		<!--/#Core CSS-->

		<!--Custom CSS-->
		<link href="../assets/css/sidebar.css" rel="stylesheet">
		<!--/#Custom CSS-->
        <!--COD THEME-->
        <link href="../assets/css/editor.css" rel="stylesheet">
        <!--/COD THEME-->
        

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
                    <!--COND THEME-->
                        <div class="col-md-12 full" id="themechange" >
                            <div class="col-sm-7 full">
                                <div class="panel panel-success full">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><strong class="junction-light">HTML</strong>(HyperText Markup Language)</h3>
                                    </div>
                                    <div class="panel-body full">
                                        <pre id="editor"><?php echo htmlentities(file_get_contents("../users/dospuntosuve/index.html")); ?></pre>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-5 full">
                                <div class="panel panel-success full">
                                    <div class="panel-heading ">
                                        <h3 class="panel-title"><strong class="junction-light">CSS</strong>(Cascading Style Sheets)</h3>
                                    </div>
                                    <div class="panel-body full">
                                        <pre id="editor2"><?php echo htmlentities(file_get_contents("../users/dospuntosuve/css/index.css")); ?></pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 full">
                            <form action="../assets/includes/change_theme.php" method="post">
                            <h1 class="juntion-bold text-center">Choose a theme</h1>
                            <input type="hidden" value="" name="themeselect" id="themeselect" >
                            <input type="hidden" value="<?=$idusuario?>" name="userid" id="userid" >
                            <input type="hidden" value="student" name="folderloc" id="folderloc" >
                            <div class="col-md-2 full" id="idtheme1">
                                <h3 class="juntion-regular text-center text-success" onclick="showTheme(1)" style="cursor: pointer;">Theme 1<br><small>Pastel on dark</small></h3></div>
                            <div class="col-md-2 full" id="idtheme2">
                                <h3 class="juntion-regular text-center text-success" onclick="showTheme(2)" style="cursor: pointer;">Theme 2<br><small>Chaos</small></h3></div>
                            <div class="col-md-2 full" id="idtheme3">
                                <h3 class="juntion-regular text-center text-success" onclick="showTheme(3)" style="cursor: pointer;">Theme 3<br><small>Solarized on dark</small></h3></div>
                            <div class="col-md-2 full" id="idtheme4">
                                <h3 class="juntion-regular text-center text-success" onclick="showTheme(4)" style="cursor: pointer;">Theme 4<br><small>Kuroir</small></h3></div>
                            <div class="col-md-2 full" id="idtheme5">
                                <h3 class="juntion-regular text-center text-success" onclick="showTheme(5)" style="cursor: pointer;">Theme 5<br><small>Textmate</small></h3></div>
                            <div class="col-md-2 full" id="idtheme6">
                                <h3 class="juntion-regular text-center text-success" onclick="showTheme(6)" style="cursor: pointer;">Theme 6<br><small>X Code</small></h3></div>
                            <br>
                            <div class="col-md-12 text-center">
                                <br>
                            <input type="submit" class="btn btn-success btn-lg" name="b1" id="b1" value="Change theme" disabled>
                            </div>
                            </form>
                        </div>
                    <!--/COND THEME-->
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
        <!--COD THEME-->
        <script>
            function showTheme(inserttheme)
        {   
            var editor1 = ace.edit("editor");
            var editor2 = ace.edit("editor2");
            switch (inserttheme)
            {
                case 1:
                    editor1.setTheme("ace/theme/pastel_on_dark");
                    editor2.setTheme("ace/theme/pastel_on_dark");
                break;
                case 2:
                    editor1.setTheme("ace/theme/chaos");
                    editor2.setTheme("ace/theme/chaos");
                break;
                case 3:
                    editor1.setTheme("ace/theme/solarized_dark");
                    editor2.setTheme("ace/theme/solarized_dark");
                break;
                case 4:
                    editor1.setTheme("ace/theme/kuroir");
                    editor2.setTheme("ace/theme/kuroir");
                break;
                case 5:
                    editor1.setTheme("ace/theme/textmate");
                    editor2.setTheme("ace/theme/textmate");
                break;
                case 6:
                    editor1.setTheme("ace/theme/xcode");
                    editor2.setTheme("ace/theme/xcode");
                break;
            }
//            editor1.setTheme("ace/theme/chaos");
            document.getElementById("themeselect").setAttribute("value", inserttheme); 
            for (i = 1; i < 7; i++) 
            {
                if(i == inserttheme)
                {
                    document.getElementById("idtheme"+inserttheme).style.border = "2px solid #ffffff";
                }
                else
                {
                    document.getElementById("idtheme"+i).removeAttribute("style");
                }
            } 
            document.getElementById("b1").removeAttribute("disabled");
        }
        </script>
        <script src="../assets/ace/ace.js" type="text/javascript" charset="utf-8"></script>
        <script>
            $(document).ready(function(){
                var user = "<?=$user?>";
                var editor = ace.edit("editor");
                editor.setTheme("ace/theme/pastel_on_dark");
                editor.getSession().setMode("ace/mode/html");    
                var editor1 = ace.edit("editor2");
                editor1.setTheme("ace/theme/pastel_on_dark");
                editor1.getSession().setMode("ace/mode/css");
            });

        </script>
        <!--/COD THEME-->
		<!--/#Main js-->
	</body>
</html>
