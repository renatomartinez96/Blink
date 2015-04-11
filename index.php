<!--

Copyright (c) 2015 Blink
All Rights Reserved
 
This product is protected by copyright and distributed under
licenses restricting copying, distribution, and decompilation.

Gerardo López | Iván Nolasco | Renato Andres

-->
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
        <style type="text/css">
            
        </style>
		<!--/#Custom CSS-->
        <script type="text/JavaScript" src="assets/js/sha512.js"></script> 
        <script type="text/JavaScript" src="assets/js/forms.js"></script>
	</head>         
<body>
    <style type="text/css">
        html, body{
            width: 100%;
            height: 100%;
            overflow-x: hidden;
            background:#192B3C @important;
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
        #logo{
            background: url(assets/img/bl.png) no-repeat fixed;
            background-size:15%;
            background-position:bottom center;
            height:100vh;
        }
        .bgvideo {
        /*    -webkit-filter: grayscale(0.5);*/
            display: block;
            max-width: 100%;
            z-index: -100;
            overflow: none;
        }

        .logotipo {
            margin-top: 0px;
            width: 100%;
            position: absolute;
        }
        #video-background {
            height: 100%;
            position: absolute;
            width: 100%;
            margin-left: -15px;
            z-index: -90;
        }
    </style>    
    <!--Nav -->
    <nav class="navbar navbar-inverse alto navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                    <span class="sr-only">Box Link</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="assets/img/brand1.png" class="img-responsive tigres" alt="Box Link :)" width="100"></a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <form class="navbar-form navbar-left" action="assets/includes/login_proceso.php" method="post" name="login_form">
                        <div class="form-group">
                            <!--<label class="control-label" for="email">Tu correo</label>-->
                            <input type="text" name="email" id="email" placeholder="<?=$lang['emailexample']?>" class="form-control input-sm" required>
                        </div>
                        <div class="form-group">
                            <!--<label class="control-label" for="password">Tu contraseña</label>-->
                            <input type="password" name="password" placeholder="<?=$lang['contra']?>" id="password" class="form-control input-sm" required>
                        </div>
                        <input type="button" value="<?=$lang['entrarlog']?>" class="btn btn-success btn-sm" onclick="formhash(this.form, this.form.password);" />
                        <a id="token" data-toggle="modal" data-target="#myModal" class='btn btn-primary btn-sm' title="Olvide mi contraseña"><i class="fa fa-key"></i><i class="fa fa-exclamation"></i></a>
                        <a href='registrarse.php' class='btn btn-info btn-sm'>No tengo cuenta</a>
                    </form>
                </ul>
            </div>
        </div>
    </nav>
    <!--/Nav -->
    <div class="container-fluid">
        <div class="row" id="banner">
            <img src="assets/img/banner/1.png" class="logotipo">
            <video autoplay loop muted class="bgvideo" id="bgvideo">
                <source class="videocool" src="assets/video/1080.webm" type="video/webm">
            </video>
        </div>
        <div class="row">
            <div class="col-xs-12 full" style="background:rgb(78, 93, 108);">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <div class="jumbotron" id="quote">
                                <div class="container text-center">
                                    <h2 class="text-center junction-regular">Everything you’ll ever need to start in web design.</h2>
                                    <h5 class="text-center junction-regular">We specialize in building tools for the teaching of the diferents web design languajes like HTML & CSS</h5>
                                    <input type="button" class="btn btn-primary btn-lg" value="About">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="jumbotron" id="quote">
                                <div class="container text-center">
                                    <h2 class="text-center junction-regular">Everything you’ll ever need to start in web design.</h2>
                                    <h5 class="text-center junction-regular">We specialize in building tools for the teaching of the diferents web design languajes like HTML & CSS</h5>
                                    <input type="button" class="btn btn-primary btn-lg" value="About">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="jumbotron" id="quote">
                                <div class="container text-center">
                                    <h2 class="text-center junction-regular">Everything you’ll ever need to start in web design.</h2>
                                    <h5 class="text-center junction-regular">We specialize in building tools for the teaching of the diferents web design languajes like HTML & CSS</h5>
                                    <input type="button" class="btn btn-primary btn-lg" value="About">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <h1>Hola</h1>
            <h1>Hola</h1>
            <h1>Hola</h1>
            <h1>Hola</h1>
            <h1>Hola</h1>
            <h1>Hola</h1>
            <h1>Hola</h1>
            <h1>Hola</h1>
            <h1>Hola</h1>
            <h1>Hola</h1>
            <h1>Hola</h1>
            <h1>Hola</h1>
            <h1>Hola</h1>
            <h1>Hola</h1>
            <h1>Hola</h1>
            <h1>Hola</h1>
            <h1>Hola</h1>
            <h1>Hola</h1>
            <h1>Hola</h1>
            <h1>Hola</h1>
            <h1>Hola</h1>
            <h1>Hola</h1>
            <h1>Hola</h1>
            <h1>Hola</h1>
            <h1>Hola</h1>
            <h1>Hola</h1>
            <h1>Hola</h1>
            <h1>Hola</h1>
            <h1>Hola</h1>
            <h1>Hola</h1>
            <h1>Hola</h1>
            <h1>Hola</h1>
            <h1>Hola</h1>
        </div>
    </div>
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
                    header("Location: ChgPass.php?t=".$tokn.md5($usr));
                }else{
                    header("Location: ./"); 
                }
            }
        ?>
    <script src="assets/js/jquery.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/bootbox.min.js" type="text/javascript"></script>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <center><h2 id="myModalLabel" class='modal-title junction-bold'>Box Link</h2></center>
                </div>
                <div class="modal-body">
                    <form class='text-center'>
                        <p>To reset your password we need your email address that you have registered with Blink . We will send you an email with the necessary information for the transsaccion</p>
                        <div class='form-group'>
                            <label class='col-lg-3 control-label' for='mail'>Email</label>
                            <div class='col-lg-9'>
                                <input type='text' name='mail' maxlength='32' id='mail' placeholder='Correo Electronico' class='form-control input-sm'/> 
                            </div>
                        </div>
                        <br>
                        <br>
                        <input type='button' id='submtoken' class='btn btn-success form-control' value='Send'>
                    </form>
                </div>
                <div class="modal-footer">
                    <h6 class="junction-light"><strong>Box Link 2015</strong> All right reserved</h6>
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
                        title: "<center><h2 class='junction-bold'>Box Link</h2></center>",
                        message: "<center><h5 class='junction-light'>You must provide your email paddress</h5></center>",
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
                                    title: "<center><h2 class='junction-bold'>Box Link</h2></center>",
                                    message: "<center><h5 class='junction-light'>"+response+"</h5></center>",
                                });
                            }
                        });
                    }else{
                        bootbox.alert({
                            title: "<center><h2 class='junction-bold'>Box Link</h2></center>",
                            message: "<center><h5 class='junction-light'>You must provide a real Email address</h5></center>",
                        });
                    }
                }
            });
        });
        
    
    </script>
    <script src="assets/js/unslider.js"></script>
    <?php include "main_js.php"; ?>
</body>
</html>