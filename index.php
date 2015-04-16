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
                <div class="col-xs-12 full">
                    <nav class="navbar navbar-inverse navbar-fixed-top transparent">
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                                    <span class="sr-only">Box Link</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="#"><img src="assets/img/brand2.png" id="logonav" class="img-responsive" width="150"></a>
                            </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                                <ul class="nav navbar-nav navbarbtns hidden">
                                    <li class="active"><a href="#">Home</a></li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <form class="navbar-form navbar-left" action="assets/includes/login_proceso.php" method="post" name="login_form" style="padding-top: 3px;">
                                        <div class="form-group">
                                            <input type="text" name="email" id="email" placeholder="<?=$lang['emailexample']?>" class="form-control inputnav" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" placeholder="<?=$lang['contra']?>" id="password" class="form-control inputnav" autocomplete="off" required>
                                        </div>
                                        <input type="button" value="<?=$lang['entrarlog']?>" class="btn btn-success  btnnav" onclick="formhash(this.form, this.form.password);" />
                                        <a id="token" data-toggle="modal" data-target="#myModal" class='btn btn-primary btnnav' title="Olvide mi contraseña"><i class="fa fa-key"></i><i class="fa fa-exclamation"></i></a>
                                        <a href='registrarse.php' class='btn btn-info  btnnav'>No tengo cuenta</a>
                                    </form>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-xs-12 full">
                    <video autoplay loop muted class="bgvideo" id="bgvideo">
                        <source class="videocool" src="assets/video/1080.webm" type="video/webm">
                    </video>
                </div>
                <div class="col-xs-12 full" id="about">
                    <div class="container">
                        <div class="jumbotron transparent text-center">
                            <h1 class="junction-bold aboutitle">About</h1>
                            <hr class="linea"> 
                            <h3 class="junction-regular aboutbody">Box Link is a didactic learning platform in which those interested in learning design Front-end can acquire the basic skills needed to get started in web design. The method used for teaching Box Link of these terms is by using blocks, the main advantage is that we promote real learning of different languages for web design. This is due to the student does not have the ability to simply just copy the code and other platforms, but the only way to make the lesson will be putting the blocks so that it meets the requirements to pass the lesson.</h3>
                        </div>
                    </div>
                </div>
                <div class="carrousel">
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
                <div class="col-xs-12 full" id="devs">
                    <div class="container">
                        <div class="jumbotron transparent text-center">
                            <h1 class="junction-bold aboutitle">Developers</h1>
                            <hr class="linea"> 
                        </div>
                            <div class="col-lg-4 col-sm-6 text-center">
                                <center>
                                    <img class="img-circle img-responsive img-center" src="http://placehold.it/200x200" alt="">
                                    <h3>Renato Andrés
                                        <small>Reyes Martínez</small>
                                    </h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas aliquam vehicula pharetra.</p>
                                </center>
                            </div>
                            <div class="col-lg-4 col-sm-6 text-center">
                                <center>
                                    <img class="img-circle img-responsive img-center" src="http://placehold.it/200x200" alt="">
                                    <h3>Iván Graciano
                                        <small>Nolasco Hernández</small>
                                    </h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas aliquam vehicula pharetra.</p>
                                </center>
                            </div>
                            <div class="col-lg-4 col-sm-6 text-center">
                                <center>
                                    <img class="img-circle img-responsive img-center" src="http://placehold.it/200x200" alt="">
                                    <h3>Gerardo Antonio
                                        <small>López Barrientos</small>
                                    </h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas aliquam vehicula pharetra.</p>
                                </center>
                            </div>
                    </div>
                </div>
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
                                            <input type='text' name='mail' maxlength='32' id='mail' placeholder='Correo Electronico' autocomplete="off" class='form-control input-sm'/> 
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
                    	echo "
                    	<script>
                    	    window.location.href = "ChgPass.php?t=$tokn.md5($usr)";
                    	</script>
                    	";
                    }else{
                    	echo "
                    	<script>
                    	    window.location.href = "./";
                    	</script>
                    	";
                    }
                }
            ?>
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
        <?php 
            require "main_js.php"; 
        ?>
    </body>
</html>
