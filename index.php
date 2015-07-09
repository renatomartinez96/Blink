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
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    if($lang == "es")
    {
        include "assets/lang/".$lang.".php";
    }
    elseif($lang == "en")
    {
        include "assets/lang/".$lang.".php";
    }
    else
    {
        include "assets/lang/es.php";
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
        <link href="assets/css/fullPage.css" rel="stylesheet">
        <meta name="theme-color" content="#E06B26">
        <!--/#Custom CSS-->
        <script type="text/JavaScript" src="assets/js/sha512.js"></script>
        <script type="text/JavaScript" src="assets/js/forms.js"></script>
        <style type="text/css">
            body,html{background:#E06B26!important;overflow-x:hidden}.navbar-inverse{background-color:#E06B26}.transparent{background:0 0!important}#navbar-box-link{background-color:rgba(0,0,0,.63);height:0;-webkit-transition:all .3s ease-out;-moz-transition:all .3s ease-out;-o-transition:all .3s ease-out;transition:all .3s ease-out;position:fixed}#navbar-box-link.toggled{height:100%;-webkit-transition:all .3s ease-out;-moz-transition:all .3s ease-out;-o-transition:all .3s ease-out;transition:all .3s ease-out;position:fixed;z-index:10}#login_form{-webkit-transition:all .4s ease-out;-moz-transition:all .4s ease-out;-o-transition:all .4s ease-out;transition:all .4 ease-out;position:fixed}#login_form.hidden{-webkit-transition:all .2s ease-out;-moz-transition:all .2s ease-out;-o-transition:all .2s ease-out;transition:all .2 ease-out;position:fixed}.bottom{bottom:0!important}.body_no_scroll{overflow-x:hidden}.inputnav{border:0}.navbar{z-index:15}body,div{padding:0;margin:0}.intro p{width:50%;margin:0 auto;font-size:1.5em}.myVideo{bottom:0;top:0;right:0;width:100%;height:100%;background-color:#000;background-position:center center;background-size:contain;object-fit:cover;z-index:3}.section{text-align:center;overflow:hidden}#section0{overflow:none}span{display:block;width:7px;height:7px;-ms-transform:rotate(45deg);-webkit-transform:rotate(45deg);transform:rotate(45deg);border-right:2px solid #fff;border-bottom:2px solid #fff;margin:0 0 6px 13px}.uno{margin-top:7px}.dos,.tres,.uno{margin-left:47%;-webkit-animation:mouse-scroll 1s infinite;-moz-animation:mouse-scroll 1s infinite}.uno{-webkit-animation-delay:.1s;-moz-animation-delay:.1s;-webkit-animation-direction:alternate}.dos{-webkit-animation-delay:.2s;-moz-animation-delay:.2s;-webkit-animation-direction:alternate}.tres{-webkit-animation-delay:.3s;-moz-animation-delay:.3s;-webkit-animation-direction:alternate}.mouse{margin-top:6%;margin-left:40%;height:50px;width:30px;border-radius:20px;transform:none;border:2px solid #fff;top:170px}.wheel{height:10px;width:5px;border-radius:3px;display:block;margin:5px auto;background:#fff;position:relative}.mouse-animation{width:8%}.wheel{-webkit-animation:mouse-wheel 1.2s ease infinite;-moz-animation:mouse-wheel 1.2s ease infinite}@-webkit-keyframes mouse-wheel{0%{opacity:1;-webkit-transform:translateY(0);-ms-transform:translateY(0);transform:translateY(0)}100%{opacity:0;-webkit-transform:translateY(6px);-ms-transform:translateY(6px);transform:translateY(6px)}}@-moz-keyframes mouse-wheel{0%{top:1px}50%{top:2px}100%{top:3px}}@-webkit-keyframes mouse-scroll{0%{opacity:0}50%{opacity:.5}100%{opacity:1}}@-moz-keyframes mouse-scroll{0%{opacity:0}50%{opacity:.5}100%{opacity:1}}@-o-keyframes mouse-scroll{0%{opacity:0}50%{opacity:.5}100%{opacity:1}}@keyframes mouse-scroll{0%{opacity:0}50%{opacity:.5}100%{opacity:1}}.mouse-animation{position:absolute;margin-left:46%;bottom:4%}#scene{width:100%;height:100%;background:#0aa5ff;background:-moz-linear-gradient(top,#0aa5ff 0,#49bcff 51%,#fff 100%);background:-webkit-gradient(linear,left top,left bottom,color-stop(0,#0aa5ff),color-stop(51%,#49bcff),color-stop(100%,#fff));background:-webkit-linear-gradient(top,#0aa5ff 0,#49bcff 51%,#fff 100%);background:-o-linear-gradient(top,#0aa5ff 0,#49bcff 51%,#fff 100%);background:-ms-linear-gradient(top,#0aa5ff 0,#49bcff 51%,#fff 100%);background:linear-gradient(to bottom,#0aa5ff 0,#49bcff 51%,#fff 100%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#0aa5ff', endColorstr='#ffffff', GradientType=0)}@media only screen and (min-width:1366px){#layer01,#layer02,#layer1{width:105%;margin-left:-2.5%;margin-top:200px}#layer4{width:90%;position:center;margin-left:165%;margin-top:20%}}@media only screen and (min-width:1920px){#layer01,#layer02,#layer1{width:105%;margin-left:-2.5%;position:center;margin-top:300px}#layer4{width:100%;margin-left:240%;margin-top:90%}}div#load_screen{background:#000;opacity:1;position:fixed;z-index:10;top:0;width:100%;height:1600px}div#load_screen>div#loading{color:#FFF;width:120px;height:24px;margin:300px auto}#load_screen{z-index:1031}.laptop-wrapper{width:100%}.laptop-screen-frame{padding:1.25em;margin:.625em .625em 0;border-radius:1.25em 1.25em 0 0;border-bottom:none;background:#959595}.laptop-screen-content{background:#fff;height:auto}.laptop-body{height:1.25em;background:#ebebeb}.laptop-button{height:.4em;width:15%;margin:auto auto .625em;border-radius:0 0 10em 10em;background:#b7b7b7;border-top:none}.laptop-base{height:.375em;border-radius:0 0 10em 10em;background:#b1b1b1;margin-bottom:.625em;border-top:none}@media \0screen{img{width:auto}}.laptop-screen-content>img{width:100%}.laptops{top:50%}.controlArrow.prev{left:50px}.controlArrow.next{right:50px}#slide1{background-image:url(assets/img/office.png);background-repeat:no-repeat;background-position:center;background-size:90%}#slide2{background-image:url(assets/img/freelance.png);background-repeat:no-repeat;background-position:center;background-size:90%}#section4{background-image:url(assets/img/world.png);background-repeat:no-repeat;background-position:center;background-size:90%}
        </style>
	</head>
    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
        <div class="container-fluid" id="load_screen">
            <div id="loading">
                loading document
            </div>
        </div>
        <div class="col-xs-12" id="navbar-box-link">
            <div class=" transparent text-center">
                <br>
                <br>
                <br>
                <br>
                <form id="login_form" action="assets/includes/login_proceso.php" class="hidden col-xs-12" method="post" name="login_form" >
                    <div class="col-xs-12">
                        <h1 class="junction-bold"><?=$langprint['log-message']?></h1>
                        <h3 class="junction-regular"><?=$langprint['emailnames']?></h3>
                            <input type="text" name="email" id="email" placeholder="<?=$langprint['emailexample']?>" class=" input-lg inputnav" autocomplete="off" required>
                        <h3 class="junction-regular"><?=$langprint['contra']?></h3>
                            <input type="password" name="password" placeholder="<?=$langprint['contra']?>" id="password" class="input-lg inputnav" autocomplete="off" required>
                    </div>
                    <div class="col-xs-12">
                        <br>
                        <input type="button" value="<?=$langprint['entrarlog']?>" class="row btn btn-success btn-lg" onclick="formhash(this.form, this.form.password);" />
                    </div>
                    <div class="col-xs-12">
                        <br>
                        <a id="token" data-toggle="modal" data-target="#myModal" class='btn btn-default btnnav' title="Olvide mi contraseña"><?=$langprint['olvcontra']?></a>
                        <a href='registrarse.php' class='btn btn-default  btnnav'><?=$langprint['sincuenta']?></a>
                    </div>
                </form>
            </div>
        </div>
        <nav class="navbar navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"><img src="assets/img/brand2.png" id="logonav" class="img-responsive" width="200"></a>                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <button type="button" class="nav-open" id="nav-open1" style="background:transparent;border:0px;margin-top:45%;">
                                <i class="fa fa-bars fa-3x"></i>
                            </button>
                        </li>
                        <li>
                            <button type="button" class="nav-open hidden" id="nav-open2" style="background:transparent;border:0px;margin-top:45%;">
                                <i class="fa fa-remove fa-3x"></i>
                            </button>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <div id="fullpage">
            <div class="section text-center" id="section0">
                <div class="mouse-animation">
                        <img src="assets/img/arrows.png" style="width:50%;">
                        <div class="mouse"><div class="wheel"></div></div>
                        <div><span class="uno"></span> <span class="dos"></span> <span class="tres"></span> </div>
                </div>
                <video autoplay loop muted class="myVideo" id="myVideo">
        			<source src="assets/video/1080.webm" type="video/webm"/>
        		</video>
            </div>
            <div class="section text-center" id="section1">
                <ul id="scene" class="full text-center"
                  data-friction-x="0.1"
                  data-friction-y="0.1"
                  data-invert-x="true"
                  data-invert-y="true">
                    <li class="layer" data-depth="0.04"><img id="layer01" src="assets/img/layers/layer01.png"></li>
                    <li class="layer" data-depth="0.06"><img id="layer1" src="assets/img/layers/layer02.png"></li>
                    <li class="layer" data-depth="0.08"><img id="layer1" src="assets/img/layers/layer0.png"></li>
                    <li class="layer" data-depth="0.30"><img id="layer3" src="assets/img/layers/layer2.png" style="width:80%;"></li>
                    <li class="layer" data-depth="0.10"><img id="layer2" src="assets/img/layers/layer3.png" style="width:80%;"></li>
                    <li class="layer" data-depth="0.50"><img id="layer4" src="assets/img/layers/layer1.png" style=""></li>
                </ul>
            </div>
            <div class="section text-center " id="section2">
                <video controls loop class="myVideo emebdly-embed" id="myVideo2">
        			<source src="assets/video/video.mp4" type="video/mp4"/>
        		</video>
            </div>
            <div class="section" id="section3">
                <div class="slide" id="slide1">
                    <div class="intro">
        				<h1 class="junction-bold"><?=$langprint['slider-title-1']?></h1>
        				<h3 class="junction-regular">
        					<?=$langprint['slider-subtitle-1']?>
        				</h3>
                    </div>
        		</div>
        	    <div class="slide" id="slide2">
                    <div class="intro">
        				<h1 class="junction-bold"><?=$langprint['slider-title-2']?></h1>
        				<h3 class="junction-regular">
        					<?=$langprint['slider-subtitle-2']?>
        				</h3>
                    </div>
        		</div>
            </div>
            <div class="section" id="section4">
                <div class="intro">
                    <h1 class="junction-bold"><?=$langprint['section-5-title']?></h1>
                    <h3 class="junction-regular">
                        <?=$langprint['section-5-subtitle']?>
                    </h3>
                </div>
            </div>
            <div class="section" id="section5">
                <div class="intro text-center">
                    <h1 class="junction-bold"><?=$langprint['contact-title']?></h1>
                        <br>
                        <form action="mail.php" method="post">
                            <input type="text" name="nombre" class="input-lg" id="inputName" placeholder="<?=$langprint['contact-name']?>" style="width:30%;"><br><br>
                            <input type="text" name="correo" class="input-lg" id="inputEmail" placeholder="<?=$langprint['contact-mail']?>" style="width:30%;"><br><br>
                            <input type="text" name="asunto" class="input-lg" id="asunto" placeholder="<?=$langprint['contact-issue']?>" style="width:30%;"><br><br>
                            <textarea name="mensaje" class=" input-lg"rows="3" id="inputMensaje" placeholder="<?=$langprint['contact-message']?>" style="width:30%;"></textarea><br><br>
                            <input type="submit" class="btn btn-success btn-lg" value="<?=$langprint['contact-btn']?>">
                        </form>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <center><h2 id="myModalLabel" class='modal-title junction-bold'>Box Link</h2></center>
                            </div>
                            <div class="modal-body">
                                <form class='text-center'>
                                    <p><?=$langprint['modal-1']?></p>
                                    <div class='form-group'>
                                        <label class='col-lg-3 control-label' for='mail'><?=$langprint['contact-mail']?></label>
                                        <div class='col-lg-9'>
                                            <input type='text' name='mail' maxlength='32' id='mail' placeholder='<?=$langprint['emailexample']?>' autocomplete="off" class='form-control input-sm'/>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <input type='button' id='submtoken' class='btn btn-success form-control' value='<?=$langprint['contact-btn']?>'>
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
                            message: "<center><h5 class='junction-light'><?=$langprint['modal-2']?></h5></center>",
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
                                message: "<center><h5 class='junction-light'><?=$langprint['modal-3']?>/h5></center>",
                            });
                        }
                    }
                });
            });
        </script>

        <script src="assets/js/jquery.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script>
            window.addEventListener("load", function(){
                var load_screen = document.getElementById("load_screen");
                document.body.removeChild(load_screen);
            });
        </script>
        <script src="assets/js/bootbox.min.js" type="text/javascript"></script>
        <?php
            if(isset($_SESSION['error']))
            {
                echo "
                    <script>
                        $(document).ready(function(){
                            bootbox.alert({
                                title: '<center><h2>Box link</h2></center>',
                                message: '<center><h5>".$langprint['modal-3']."</h5></center>',
                            });
                        });
                    </script>
                ";
                session_destroy();
            }
        ?>
        <script>
            $(document).ready(function(){
                $(".nav-open").click(function(e) {
        			e.preventDefault();
                    $("#navbar-box-link").toggleClass("toggled");
                    $("#login_form").toggleClass("hidden");
//                    $("body").toggleClass("body_no_scroll");
                    $("#nav-open1").toggleClass("hidden");
                    $("#nav-open2").toggleClass("hidden");
                });
            });
        </script>
        <script src="assets/js/jquery.fullPage.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>
        <script src="assets/js/jquery.easings.min.js"></script>
        <script type="text/javascript">
    		$(document).ready(function() {
    			$('#fullpage').fullpage({
    				sectionsColor: ['', '', '#5A5B61','#658485','#904F2A','#0C2C2E'],
    				anchors: ['one', 'two', 'three','four','five','six'],
                    css3: true,
                    easing: 'easeInOutCubic',

                    afterRender: function(){
    					$('#myVideo').get(0).play();

    				},
                    afterLoad: function(anchorLink, index){
                        if(index == '3'){
                            $('#myVideo2').get(0).play();
                        }
                        else{
                            $('#myVideo2').get(0).load();
                        }
                    }
    			});

            });
    	</script>
</script>
        <script src="assets/js/parallax/deploy/parallax.min.js"></script>
        <script>
            var scene = document.getElementById('scene');
            var parallax = new Parallax(scene);
        </script>
    </body>
</html>
