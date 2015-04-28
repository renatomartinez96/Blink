<html lang="en">
	<head>
		<!--Core CSS-->
		<?php
            // Titulo de esta página:
            $titulodelapagina = $lang["welcomeblink"];
			include 'main_css.php';
		?>
        <!--/#Core CSS-->
        
		<!--Custom CSS-->
		<link href="assets/css/sidebar.css" rel="stylesheet">
        <link type="text/css"  rel="stylesheet" href="assets/css/scrolling-nav.css">
        <!--/#Custom CSS-->
        <script type="text/JavaScript" src="assets/js/sha512.js"></script> 
        <script type="text/JavaScript" src="assets/js/forms.js"></script>
        <style type="text/css">
            html, body{
                background:#E06B26 !important;
            }
            .navbar-inverse {
                background-color: #E06B26;
            }
            #quote{
                margin-bottom:0px !important;
                background:rgb(78, 93, 108) !important;
            }
            .hero-feature {
                margin-bottom: 30px;
            }
            .transparent{
                background:transparent !important;
            }
            #about{
                background-color: #E06B26;
                min-height:100%;
            }
            .aboutitle{
                margin-top:50px;
            }
            .aboutbody{
                margin-bottom:50px;
            }
            .linea{
                margin-top:1%;
                margin-bottom:1%;
                border-top:0.20em solid #fff !important;
                margin-left: 40%;
                margin-right: 40%;
            }
            .devs{
                background:url(assets/img/devs.png) fixed;
                background-size:100%;
                background-position:top;
            }
        </style>    
	</head>         
    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
        <div class="container-fluid">
            <div class="row">
            </div>
        </div>
        <?php 
            require "main_js.php"; 
        ?>
    </body>
</html>
