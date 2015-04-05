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
        #container {
            position: relative !important;
            overflow: hidden !important;
        }

        #container .content {
            position: absolute !important;
            top: 10% !important;
            left: 30% !important;
            width: 550px !important;
            height: 440px !important;
        }
        video#bgvid 
        {
            z-index: -1 !important;
            filter: grayscale(50%) blur(10px) !important;
        }
    </style>
    <div id="container">
    <video  loop="loop" id="bgvid">
	   <source  src="assets/video/1080.webm" type="video/webm">
        <source  src="assets/video/1080.mp4" type="video/mp4">
    </video>
    
    <!--<div class="well centeringthis">-->
    <div class="well content">
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
        <p class="text-center"><a id="token" class='btn btn-primary' data-toggle="modal" data-target="#myModal">Olvide mi contraseña</a></p>
        <?php
            if (isset($_GET['t'])) 
            {
                $tkn = $_GET['t'];
                $stmt = $mysqli->prepare("SELECT token, usuario FROM usuarios_tb WHERE token =  ?");
                $stmt->bind_param('s', $tkn);
                $stmt->execute(); 
                $stmt->store_result();
                $stmt->bind_result($tokn, $usr);
                $stmt->fetch();
                if ($stmt->num_rows == 1){
                    Header("Location: ChgPass.php?t=".$tokn.md5($usr));
                }else{
                    Header("Location: ./"); 
                }
            }
        ?>
    </div>
    </div>
    
    <div class="col-md-12 jumbotron">
        <h2 class="junction-bold text-center text-primary">What is Blink?</h2>
        <div class="col-md-2" style="position: relative; left: 0; top: 0;">
            <img src="http://vignette1.wikia.nocookie.net/eswikia/images/f/f0/HTML5-logo.png/revision/latest?cb=20120709105013" class="img-responsive wow bounceInDown" style="position: relative; top: 0; left: 0;" width="200">
        </div>
        <div class="col-md-8">
            <p class="junction-light text-justify">Blink is a project designed for every person who wants learn Web design! We are a great community of students and teachers, that work together to share our knowledge of HTML5 and CSS3. This platform have a special method to teach you Front-End, we use block in the start of the courses, and you need to overcome your levels of learning, its like a game! What are you waiting for? Create your account now :). <a href="#" class="btn btn-primary">Other formal stuff</a><a></a></p>
        </div >
        <div class="col-md-2" style="position: relative; left: 0; top: 0;"><img src="http://www.endertechnology.com/wp-content/uploads/2014/11/logo-css31.png" class="img-responsive wow bounceInDown" style="position: absolute; top: 0px; left: 0px;" width="250"></div>
    </div>
    <div class="col-md-12 jumbotron">
        <div class="col-md-12">
            <h2 class="junction-bold text-center text-success">How Blink works?</h2>
            <p class="junction-light">Then enrolling in your first course of a <strong>teacher</strong>, you start learning with block, and you build a Web site with these blocks (yes, like the Legos!), but when you upgrade your level you will are ready to work the code...</p>
            <br>
            <p class="junction-light text-center"><strong>La animación palams here :v</strong></p>
        </div>
        <!--
        <div class="col-md-12" style="position: relative; left: 30px; top: 0; ">
            <img src="http://3.bp.blogspot.com/-f0NsmUHz2kM/T8GUGoydNpI/AAAAAAAAAfg/KnEkgnFPzpc/s1600/smiley.png" class="img-responsive wow slideInLeft" width="500" style="position: absolute; top: 0px; left: 0px;" data-wow-delay="1s">
            <img src="http://vignette1.wikia.nocookie.net/lego/images/1/13/Icono_Expandir.png/revision/latest?cb=20110317142517&path-prefix=es" class="img-responsive wow bounceInDown" width="500" style="position: absolute; top: 0px; left: 500px;" data-wow-delay="2s">
        </div>
        -->
    </div>
    <div class="col-md-12 jumbotron" >
        <div class="col-md-5" style="position: relative; left: 70px; top: 0;">
            <img src="assets/img/avatares/2.png" class="img-responsive wow fadeInUp" width="150" style="position: absolute; top: 0px; left: 0px;" data-wow-delay="1s">
            <img src="assets/img/avatares/10.png" class="img-responsive wow fadeInUp" width="150" style="position: absolute; top: 0px; left: 80px;" data-wow-delay="1s">
            <img src="assets/img/avatares/40.png" class="img-responsive wow fadeInUp" width="150" style="position: absolute; top: 0px; left: 160px;" data-wow-delay="1s">
            <img src="assets/img/avatares/14.png" class="img-responsive wow fadeInUp" width="150" style="position: absolute; top: 0px; left: 245px;" data-wow-delay="1s">
            <img src="assets/img/avatares/33.png" class="img-responsive wow fadeInUp" width="150" style="position: absolute; top: 0px; left: 322px;" data-wow-delay="1s">
            <img src="assets/img/avatares/12.png" class="img-responsive wow fadeInUp" width="150" style="position: absolute; top: 0px; left: 410px;" data-wow-delay="1s">
        </div>
        <div class="col-md-7" style="position: relative; left: 30px; top: 0;">
            <h2 class="junction-regular text-center text-info">Our teachers team comes form everywhere!</h2>
            <p class="junction-light text-center">And you can apply, and by a teacher too ;) <a href="#" class="btn btn-info">Learn more</a></p>
        </div>
    </div>
        
    <script src="assets/js/jquery.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/bootbox.min.js" type="text/javascript"></script>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <center><h2 id="myModalLabel" class='modal-title junction-bold'>Blink</h2></center>
                </div>
                <div class="modal-body">
                    <form class='text-center'>
                        <p>Para poder reestablecer tu contraseña necesitamos que nos brindes tu direccion de correo electronico que tienes registrado con Blink. Te haremos llegar un correo con la informacion necesaria para la transsaccion</p>
                        <div class='form-group'>
                            <label class='col-lg-3 control-label' for='mail'>Correo Electronico</label>
                            <div class='col-lg-9'>
                                <input type='text' name='mail' maxlength='32' id='mail' placeholder='Correo Electronico' class='form-control input-sm'/> 
                            </div>
                        </div>
                        <br>
                        <br>
                        <input type='button' id='submtoken' class='btn btn-success form-control' value='Enviar'>
                    </form>
                </div>
                <div class="modal-footer">
                    <h6 class="junction-light"><strong>Blink 2015</strong> todos los derechos reservados</h6>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            function validateEmail($email) {
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                return emailReg.test( $email );
            }
            $("#submtoken").click(function(){
                if($("#mail").val() == ''){
                    bootbox.alert({
                        title: "<center><h2 class='junction-bold'>Blink</h2></center>",
                        message: "<center><h5 class='junction-light'>Para poder continuar debe ingresar su correo electronico</h5></center>",
                    });
                }else{
                    if(validateEmail($("#mail").val())) { 
                        var send = {"email" : $("#mail").val()};
                        $.ajax({
                            type: "POST",
                            url: "mailpass.php",
                            data: send,
                            success: function(response) {
                                bootbox.alert({
                                    title: "<center><h2 class='junction-bold'>Blink</h2></center>",
                                    message: "<center><h5 class='junction-light'>"+response+"</h5></center>",
                                });
                            }
                        });
                    }else{
                        bootbox.alert({
                            title: "<center><h2 class='junction-bold'>Blink</h2></center>",
                            message: "<center><h5 class='junction-light'>Para poder continuar debe ingresar una direccion de correo electronico valida</h5></center>",
                        });
                    }
                }
            });
        });
        
    
    </script>
    <?php include "main_js.php"; ?>
</body>
</html>