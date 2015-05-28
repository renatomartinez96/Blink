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
        $logged = $langprint["nosession"];
    }
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!--Core CSS-->
		<?php
            // Titulo de esta página:
            $titulodelapagina = $langprint["welcomeblink"];
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
            #cookies{
                position:fixed;
                bottom:0 !important;
                z-index:99999 !important;
                margin-bottom:0px;
            }
        </style>    
	</head>         
    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
        <div class="container-fluid">
            <div class="row">
                <div class='alert alert-dismissible well col-xs-12' id="cookies" style="">
                    <button type='button' class='close' data-dismiss='alert'>x</button>
                    <h5 class="junction-bold">Cookie use</h5>
                    <h6 class="">Box Link uses cookies. By continuing to use this website you are giving consent to cookies being used. For information on cookies visit our <a href=""> Privacy and Cookie Policy</a>.</h6>
                </div>
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
                                            <input type="text" name="email" id="email" placeholder="<?=$langprint['emailexample']?>" class="form-control inputnav" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" placeholder="<?=$langprint['contra']?>" id="password" class="form-control inputnav" autocomplete="off" required>
                                        </div>
                                        <input type="button" value="Log in" class="btn btn-success  btnnav" onclick="formhash(this.form, this.form.password);" />
                                        <a id="token" data-toggle="modal" data-target="#myModal" class='btn btn-primary btnnav' title="Olvide mi contraseña"><i class="fa fa-key"></i><i class="fa fa-exclamation"></i></a>
                                        <a href='registrarse.php' class='btn btn-info  btnnav'>Sign up</a>
                        
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
                            <h2 class="junction-bold aboutitle">Acerca de</h2>
                            <hr class="linea"> 
                            <h4 class="junction-light aboutbody">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut erat malesuada, porta neque vel, pellentesque enim. Pellentesque erat erat, fringilla non odio eget, ornare elementum nulla. Cras fringilla risus id pretium cursus. Aenean risus velit, mattis ut pellentesque non, venenatis id turpis. Aliquam id libero vitae nunc congue interdum quis quis tortor. Fusce dictum interdum tempor. Nulla scelerisque nulla in nisi commodo, non accumsan mauris finibus. Sed eu nisi ac massa mattis mattis quis in tortor. Maecenas vel nunc mi.</h4>
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
                                            <h2 class="text-center junction-regular">Everything you will ever need to start in web design.</h2>
                                            <h5 class="text-center junction-regular">We specialize in building tools for the teaching of the diferents web design languajes like HTML & CSS</h5>
                                            <input type="button" class="btn btn-primary btn-lg" value="About">
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="jumbotron" id="quote">
                                        <div class="container text-center">
                                            <h2 class="text-center junction-regular">Everything you will ever need to start in web design.</h2>
                                            <h5 class="text-center junction-regular">We specialize in building tools for the teaching of the diferents web design languajes like HTML & CSS</h5>
                                            <input type="button" class="btn btn-primary btn-lg" value="About">
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="jumbotron" id="quote">
                                        <div class="container text-center">
                                            <h2 class="text-center junction-regular">Everything you will ever need to start in web design.</h2>
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
                            <h2 class="junction-bold aboutitle">Desarrolladores</h2>
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
                                    <p>To reset the password is required to enter your email registered on the platform, we will send you an email with the necessary information for the transaction.</p>
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
                                <h6 class="junction-light"><strong>Box Link 2015</strong> All rights reserved.</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
        <span id="siteseal" class="pull-left" style="z-index:999;bottom:0;_position:absolute;left:0;"><script type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=SUBhPmpnzbDkT8URqL3IsxeaGrk67FvuYO6ZhYsMbTiW9pNqIevjjxJ77e7C"></script></span>
        <div id="sitelock_shield_logo" class="fixed_btm pull-right" style="z-index:999;bottom:0;_position:absolute;right:0;"><a href="https://www.sitelock.com/verify.php?site=the-box.link" onclick="window.open('https://www.sitelock.com/verify.php?site=the-box.link','SiteLock','width=600,height=600,left=160,top=170');return false;" ><img alt="PCI Compliance and Malware Removal" title="SiteLock" src="//shield.sitelock.com/shield/the-box.link"></a></div>
        </footer>
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
                    	    window.location.href = 'ChgPass.php?t=".$tokn.md5($usr)."';
                    	</script>
                    	";
                    }else{
                    	echo "
                    	<script>
                    	    window.location.href = './';
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
                            message: "<center><h5 class='junction-light'>You must type an email address</h5></center>",
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
                                message: "<center><h5 class='junction-light'>You must type an valid email address</h5></center>",
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
