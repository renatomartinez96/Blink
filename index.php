<?php
include_once 'assets/includes/db_conexion.php';
include_once 'assets/includes/funciones.php';

if(isset($_GET["lang"]))
{
    if($_GET["lang"]=="en")
    {
        include "assets/lang/ivan-en.php";
    }
    else
    {
        include "assets/lang/ivan-es.php";
    }
}
else
{
    include "assets/lang/ivan-es.php";
}
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = "Ya iniciaste sesión ._.";
} else {
    $logged = $lang["nosession"];
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
            $titulodelapagina = $lang["welcomeblink"];
			include 'main_css.php';
		?>
        <!--/#Core CSS-->
        
		<!--Custom CSS-->
		<link href="assets/css/sidebar.css" rel="stylesheet">
		<!--/#Custom CSS-->
        <script type="text/JavaScript" src="assets/js/sha512.js"></script> 
        <script type="text/JavaScript" src="assets/js/forms.js"></script>
	</head>         
<body>
    <style type="text/css">
        video#bgvid 
        { 
            position: fixed; right: 0; bottom: 0;
            min-width: 100vw; min-height: 100vh;
            width: auto; height: auto; z-index: -100;
            background-size: cover;
            z-index: -1;
            filter: grayscale(50%) blur(10px);
        }
        @media (min-width: 768px) {
            div.centeringthis
            {
            z-index: 1;
            margin-top: 10%;
            margin-right: 30%;
            margin-left: 30%;
            } 
        }
        @media (max-width: 768px) {
            div.centeringthis
            {
            z-index: 1;
            margin-top: 15%px;
            margin-right: 5px;
            margin-left: 5px;
            }
        }
    </style>
    <video autoplay loop="loop" id="bgvid">
	   <source  src="assets/video/1080.webm" type="video/webm">
        <source  src="assets/video/1080.mp4" type="video/mp4">
    </video>
    <div class="well centeringthis">
        <h1 class="junction-bold text-center">BLink</h1>
        <?=$lang["yonoespik"]?>
        <?php
        if (isset($_GET['error'])) 
        {
            echo "<p class='text-danger text-center'>¡Ups! Ocurrió un error al iniciar sesión, <a href='index.php'>intentalo de nuevo</a>.</p>";
        }
        if (login_check($mysqli) == true) 
        {
            header('location:student/profile.php');
        } 
        else 
        {
            echo "<h4 class='junction text-center'> " . $logged . "</h4>";
        }
        ?> 
        <br>
        <form action="assets/includes/login_proceso.php" method="post" name="login_form">
            <div class="form-group">
                <p class="col-md-4" for="email"><?=$lang["emailname"]?>: </p><div class="col-md-8"><input type="text" name="email" id="email" placeholder="<?=$lang['emailexample']?>" class="form-control input-sm" required/></div> <br>
            </div>
            <div class="form-group">
                <p class="col-md-4" for="password"><?=$lang['contra']?>: </p><div class="col-md-8"><input type="password" name="password" placeholder="<?=$lang['contra']?>" id="password"  class="form-control input-sm" required/></div><br>
            </div>
            <div class="form-group">
                <div class="col-md-12"><input type="button" value="<?=$lang['entrarlog']?>" class="btn btn-success btn-block" onclick="formhash(this.form, this.form.password);" /><br> </div>
            </div>
        </form>
        
        <p class="text-center"><a href='registrarse.php' class='btn btn-info'><?=$lang['sincuenta']?></a></p>
        
    </div>
</body>
</html>