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
        <meta name="theme-color" content="#E06B26">
        <!--/#Custom CSS-->
        <script type="text/JavaScript" src="assets/js/sha512.js"></script>
        <script type="text/JavaScript" src="assets/js/forms.js"></script>
        <style type="text/css">
            html, body{
                background:#E06B26 !important;
                overflow-x:hidden;
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
                background: #E06B26 url('assets/img/banner1.png');
                height:100vh;
                width:100vw;
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
            #cookies{
                position:fixed;
                bottom:0 !important;
                z-index:99999 !important;
                margin-bottom:0px;
            }
            #navbar-box-link{
                background-color:rgba(0, 0, 0, 0.63);
                height:0%;
                -webkit-transition: all 0.3s ease-out;
                -moz-transition: all 0.3s ease-out;
                -o-transition: all 0.3s ease-out;
                transition: all 0.3s ease-out;
                position: fixed;

/*                background:#2b3e50 url('assets/img/banner.png') 300%;S*/
            }
            #navbar-box-link.toggled{
                height:100%;
                -webkit-transition: all 0.3s ease-out;
                -moz-transition: all 0.3s ease-out;
                -o-transition: all 0.3s ease-out;
                transition: all 0.3s ease-out;
                position: fixed;
                z-index: 10;
            }
            #login_form{
                -webkit-transition: all 0.4s ease-out;
                -moz-transition: all 0.4s ease-out;
                -o-transition: all 0.4s ease-out;
                transition: all 0.4 ease-out;
                position: fixed;
            }
            #login_form.hidden{
                -webkit-transition: all 0.2s ease-out;
                -moz-transition: all 0.2s ease-out;
                -o-transition: all 0.2s ease-out;
                transition: all 0.2 ease-out;
                position: fixed;
            }
            .bottom{
                bottom:0px !important;
            }
            .body_no_scroll{
                overflow-x:hidden;
            }
            .inputnav{
                border:0px;
            }
            .typed{
                display: initial;
            }
            .typed-cursor{
                opacity: 1;
                -webkit-animation: blink 0.7s infinite;
                -moz-animation: blink 0.7s infinite;
                animation: blink 0.7s infinite;
            }
            @keyframes blink{
                0% { opacity:1; }
                50% { opacity:0; }
                100% { opacity:1; }
            }
            @-webkit-keyframes blink{
                0% { opacity:1; }
                50% { opacity:0; }
                100% { opacity:1; }
            }
            @-moz-keyframes blink{
                0% { opacity:1; }
                50% { opacity:0; }
                100% { opacity:1; }
            }
            @media screen and (min-width: 1024px) {
                #typedtext{
                    margin-top:30%;
                }
            }@media screen and (min-width: 1280px) {
                #typedtext{
                    margin-top:25%;
                }
            }
            @media screen and (min-width: 1440px) {
                #typedtext{
                    margin-top:30%;
                }
            }
            @media screen and (min-width: 1920px) {
                #typedtext{
                    margin-top:40%;
                }
            }
            #typedtext{
                color:#fff;
                 -moz-transition: all 0.3s ease-in-out;
              -o-transition: all 0.3s ease-in-out;
              -webkit-transition: all 0.3s ease-in-out;
              transition: all 0.3s ease-in-out;
            }
            #typedtext:hover{
                color:#E06B26;
                 -moz-transition: all 0.3s ease-in-out;
              -o-transition: all 0.3s ease-in-out;
              -webkit-transition: all 0.3s ease-in-out;
              transition: all 0.3s ease-in-out;
            }
            #viewmoreabout{
                color:#fff;
                 -moz-transition: all 0.3s ease-in-out;
              -o-transition: all 0.3s ease-in-out;
              -webkit-transition: all 0.3s ease-in-out;
              transition: all 0.3s ease-in-out;
            }
            #viewmoreabout:hover{
                color:#E06B26;
                 -moz-transition: all 0.3s ease-in-out;
              -o-transition: all 0.3s ease-in-out;
              -webkit-transition: all 0.3s ease-in-out;
              transition: all 0.3s ease-in-out;
            }
            .controls-slide {
              -moz-transform: translate(0, -50%);
              -ms-transform: translate(0, -50%);
              -webkit-transform: translate(0, -50%);
              transform: translate(0, -50%);
              position: absolute;
              z-index: 9;
              top: 50%;
              text-align: right;
              right: 40px;
              font-size: 2.3rem;

            }
            .controls-slide li {
              opacity: 0.8;
              cursor: pointer;
              display: block;
            }
            .controls-slide li strong {
              -moz-transition: all 0.3s ease-in-out;
              -o-transition: all 0.3s ease-in-out;
              -webkit-transition: all 0.3s ease-in-out;
              transition: all 0.3s ease-in-out;
                color:#fff !important;
            }
            .controls-slide li span {
              -moz-transition: opacity 0.3s ease-in-out, color 0.3s ease-in-out;
              -o-transition: opacity 0.3s ease-in-out, color 0.3s ease-in-out;
              -webkit-transition: opacity 0.3s ease-in-out, color 0.3s ease-in-out;
              transition: opacity 0.3s ease-in-out, color 0.3s ease-in-out;
                color:#fff !important;
            }
            .controls-slide li strong {
              position: absolute;
              right: -5px !important;
              opacity: 0;
            }
            .controls-slide li.active {
              opacity: 1;
            }
            .controls-slide li.active span {
              opacity: 0;
              right: -5px;
            }
            .controls-slide li.active strong {
              opacity: 1;
              display: inline;
              right: 0;
              font-weight: 500;
            }
            @media only screen and (min-width: 48em) {
              html:not(.hastouch) .controls-slide li:hover {
                opacity: 1;
              }
              html:not(.hastouch) .controls-slide li:hover span {
                opacity: 0;
                right: -5px;
              }
              html:not(.hastouch) .controls-slide li:hover strong {
                opacity: 1;
                display: inline;
                right: 0;
                font-weight: 500;
              }
            }
            @media only screen and (max-width: 48em) {
              .controls-slide {
                right: 15px;
              }
              .controls-slide span, .controls-slide strong {
                -moz-transition: none;
                -o-transition: none;
                -webkit-transition: none;
                transition: none;
              }
              .controls-slide strong {
                display: none !important;
              }
              .controls-slide span {
                opacity: 0.6;
                text-indent: 100%;
                font-size: 0;
                white-space: nowrap;
                position: relative;
                display: inline-block;
                height: 6px;
                width: 6px;
              }
              .controls-slide span:after {
                content: "\2022";
                display: inline-block;
                color: inherit;
                position: absolute;
                top: 0;
                left: 0;
                width: 6px;
                height: 6px;
                margin-top: -13px;
                margin-left: -7px;
                font-size: 24px;
              }
              .controls-slide .active span {
                opacity: 1 !important;
                right: 0px !important;
              }
            }
            #devs{
                padding-top:15% !important;
                background: url('assets/img/devs1.png') fixed top;
                background-size:100%;
                height:100vh;
                width:100vw;
            }
            #contact{
                height:100vh;
                width:100vw;
            }
            #googlemaps {
              height: 100%;
              width: 100%;
              position:absolute;
              top: 0;
              left: 0;
              z-index: 0; /* Set z-index to 0 as it will be on a layer below the contact form */
            }

            #contactform {
              position: relative;
              z-index: 1; /* The z-index should be higher than Google Maps */
              width: 100%;
              height: 100% !important;
              padding: 10px;
              background: rgba(0,0,0,0.50);
              height: auto;
              color: white;
            }
            #contactfrm{
                padding-top:11%;
            }
        </style>
	</head>
    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
        <ul class="controls-slide" style="color: rgb(255, 255, 255);">
            <li id="nav1" class="active">
                <a href="#homevideo"><strong>Inicio</strong><span><i class="fa fa-circle-o" style="font-size:15px;"></i></span></a>
                <a></a>
            </li>
            <li id="nav2">
                <a href="#about"><strong>¿BoxLink?</strong><span><i class="fa fa-circle-o" style="font-size:15px;"></i></span></a>
                <a></a>
            </li>
            <li id="nav3">
                <a href="#devs"><strong>Desarrolladores</strong><span><i class="fa fa-circle-o" style="font-size:15px;"></i></span></a>
                <a></a>
            </li>
            <li id="nav4">
                <a href="#contact"><strong>Contáctenos</strong><span><i class="fa fa-circle-o" style="font-size:15px;"></i></span></a>
                <a></a>
            </li>
        </ul>
        <div class="col-xs-12" id="navbar-box-link">
            <div class="jumbotron transparent text-center">
                <br>
                <br>
                <form id="login_form" action="assets/includes/login_proceso.php" class="hidden col-xs-12" method="post" name="login_form" >
                    <div class="col-xs-12">
                        <h1 class="junction-bold">Inicio de sesión</h1>
                        <h3 class="junction-regular">Usuario o correo electrónico</h3>
                            <input type="text" name="email" id="email" placeholder="<?=$langprint['emailexample']?>" class=" input-lg inputnav" autocomplete="off" required>
                        <h3 class="junction-regular">Contraseña</h3>
                            <input type="password" name="password" placeholder="<?=$langprint['contra']?>" id="password" class="input-lg inputnav" autocomplete="off" required>
                    </div>
                    <div class="col-xs-12">
                        <br>
                        <input type="button" value="Log in" class="row btn btn-success btn-lg" onclick="formhash(this.form, this.form.password);" />
                    </div>
                    <div class="col-xs-12">
                        <br>
                        <a id="token" data-toggle="modal" data-target="#myModal" class='btn btn-default btnnav' title="Olvide mi contraseña">Olvide mi contraseña</a>
                        <a href='registrarse.php' class='btn btn-default  btnnav'>Registro</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
<!--
                <div class='alert alert-dismissible well col-xs-12' id="cookies" style="z-index:5 !important;">
                    <button type='button' class='close' data-dismiss='alert'>x</button>
                    <h5 class="junction-bold">Cookie use</h5>
                    <h6 class="">Box Link uses cookies. By continuing to use this website you are giving consent to cookies being used. For information on cookies visit our <a href=""> Privacy and Cookie Policy</a>.</h6>
                </div>
-->
                <div class="col-xs-12 full">
                    <nav class="navbar navbar-inverse navbar-fixed-top transparent">
                        <div class="container">
                            <div class="navbar-header">
                                <a class="navbar-brand" href="#"><img src="assets/img/brand2.png" id="logonav" class="img-responsive" width="200"></a>
                            </div>
                                <ul class="nav navbar-nav navbarbtns hidden">
                                    <li class="active"><a href="#">Home</a></li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <button type="button" class="nav-open" id="nav-open1" style="background:transparent;border:0px;margin-top:45%;">
                                        <i class="fa fa-bars fa-3x"></i>
                                    </button>
                                    <button type="button" class="nav-open hidden" id="nav-open2" style="background:transparent;border:0px;margin-top:45%;">
                                        <i class="fa fa-remove fa-3x"></i>
                                    </button>
                                </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-xs-12 full" id="homevideo">
                    <!-- <video autoplay loop muted class="bgvideo" id="bgvideo">
                        <source class="videocool" src="assets/video/1080.webm" type="video/webm">
                    </video> -->
                </div>
                <div class="col-xs-12 full" id="about">
                    <div class="container">
                        <div class="jumbotron transparent text-center">
                            <h1 class="junction-bold" id="typedtext">
                                <div class="typed"></div>
                            </h1>
                            <a href="info/about.php"><h3 id="viewmoreabout">Leer +</h3></a>
<!--
                            <h2 class="junction-bold aboutitle">Box Link</h2>
                            <hr class="linea">
                            <br>
                            <h4 class="junction-light aboutbody" style="text-align:justify;">
                                Box Link es una plataforma de aprendizaje didáctico en la cual las personas interesadas en aprender diseño de Front-end podrán adquirir los conocimientos básicos necesarios para iniciarse en el diseño de páginas web.<br>El método que Box Link implementa para la enseñanza de dichos términos es mediante el uso de bloques, la principal ventaja es que promovemos el verdadero aprendizaje de los diferentes lenguajes para diseño web, esto gracias a que el estudiante no tiene la posibilidad de sencillamente solo copiar el código como en otras plataformas, sino que la única manera de poder realizar la lección es poniendo los bloques de manera que cumpla los requisitos para poder pasar la lección.
                            </h4>
-->
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 full" id="devs">
                    <div class="container jumbotron transparent">
                        <div class="full transparent text-center">
                            <h2 class="junction-bold aboutitle">Desarrolladores</h2>
                            <hr class="linea">
                        </div>
                        <div class="col-lg-4 col-sm-6 text-center">
                            <center>
<!--                                <img class="img-circle img-responsive img-center" src="http://placehold.it/200x200" alt="">-->
                                <h3>Renato Andrés
                                    <small>Reyes Martínez</small>
                                </h3>
                                <p class="justify"><small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas aliquam vehicula pharetra.</small></p>
                            </center>
                        </div>

                        <div class="col-lg-4 col-sm-6 text-center">
                            <center>
<!--                                <img class="img-circle img-responsive img-center" src="http://placehold.it/200x200" alt="">-->
                                <h3>Gerardo Antonio
                                    <small>López Barrientos</small>
                                </h3>
                                <p class="justify"><small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas aliquam vehicula pharetra.</small></p>
                            </center>
                        </div>

                        <div class="col-lg-4 col-sm-6 text-center">
                            <center>
<!--                                <img class="img-circle img-responsive img-center" src="http://placehold.it/200x200" alt="">-->
                                <h3>Iván Graciano
                                    <small>Nolasco Hernández</small>
                                </h3>
                                <p class="justify"><small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas aliquam vehicula pharetra.</small></p>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 full" id="contact">
                    <div id="googlemaps"></div>
                    <div id="contactform">
                        <div class="container">
                            <div class="col-md-6 " id="contactfrm">
                                <div class="col-xs-12 full">
                                    <h1 class="junction-bold">Contáctenos</h1>
                                    <p style="padding-bottom:10px !important;" class="justify col-lg-10 full">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In cursus non turpis quis suscipit. Proin sit amet arcu sed massa volutpat gravida. Phasellus semper nisl ligula, sed condimentum ligula mollis sit amet. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                  <label for="inputName" class="col-lg-3 full control-label">Nombre</label>
                                  <div class="col-lg-10 full">
                                    <input type="text" class="form-control input-sm" id="inputName" placeholder="Nombre">
                                  </div>
                                  <label for="inputEmail" class="col-lg-3 full control-label">Correo Electrónico</label>
                                  <div class="col-lg-10 full">
                                    <input type="text" class="form-control input-sm" id="inputEmail" placeholder="Correo Electrónico">
                                  </div>
                                  <label for="inputMensaje" class="col-lg-3 full control-label">Mensaje</label>
                                  <div class="col-lg-10 full">
                                    <textarea class="form-control input-sm" rows="3" id="inputMensaje"></textarea>
                                    <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
                                  </div>
                                </div>
                                <div class="col-sx-12">
                                    <input type="submit" class="btn btn-success" value="Enviar">
                                </div>
                            </div>
                            <div class="col-md-6"></div>
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
<!--
        <footer>
        <span id="siteseal" class="pull-left" style="z-index:999;bottom:0;_position:absolute;left:0;"><script type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=SUBhPmpnzbDkT8URqL3IsxeaGrk67FvuYO6ZhYsMbTiW9pNqIevjjxJ77e7C"></script></span>
        <div id="sitelock_shield_logo" class="fixed_btm pull-right" style="z-index:999;bottom:0;_position:absolute;right:0;"><a href="https://www.sitelock.com/verify.php?site=the-box.link" onclick="window.open('https://www.sitelock.com/verify.php?site=the-box.link','SiteLock','width=600,height=600,left=160,top=170');return false;" ><img alt="PCI Compliance and Malware Removal" title="SiteLock" src="//shield.sitelock.com/shield/the-box.link"></a></div>
        </footer>
-->
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
        <script src="assets/js/typed.min.js"></script>
        <script>
          $(function(){
                  $(".typed").typed({
                    strings: ["¿Box Link?", "¿Estas interesado en el diseño web?", "¿Quieres dar a conocer al mundo tus aportes a travez de la web?"],
                    typeSpeed: 150,
                    backDelay: 1500,
                    loop:true,
                      loopCount: false,
                  });
          });
        </script>
        <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript">

            // The latitude and longitude of your business / place
            var position = [13.6789737, -89.287258];

            function showGoogleMaps() {
                var styles = [
                {
                  stylers: [
                    { hue: "#E06B26" }
                  ]
                },{
                  featureType: "road",
                  elementType: "geometry",
                  stylers: [
                    { visibility: "simplified" }
                  ]
                },{
                  featureType: "road",
                  elementType: "labels",
                  stylers: [
                    { visibility: "off" }
                  ]
                }
              ];
                var latLng = new google.maps.LatLng(position[0], position[1]);

                var mapOptions = {
                    zoom: 16, // initialize zoom level - the max value is 21
                    streetViewControl: false, // hide the yellow Street View pegman
                    scaleControl: false, // allow users to zoom the Google Map
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    center: latLng,
                    disableDefaultUI: true


                };
                var styledMap = new google.maps.StyledMapType(styles,
                {name: "Styled Map"});
                map = new google.maps.Map(document.getElementById('googlemaps'),
                    mapOptions);

                // Show the default red marker at the location
                marker = new google.maps.Marker({
                    position: latLng,
                    map: map,
                    draggable: false,
                    animation: google.maps.Animation.DROP
                });
                map.mapTypes.set('map_style', styledMap);
                map.setMapTypeId('map_style');
            }

            google.maps.event.addDomListener(window, 'load', showGoogleMaps);
        </script>

    </body>
</html>
