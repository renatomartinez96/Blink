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
            $titulodelapagina = " ";
			include 'main_css.php';
		?>
		<!--/#Core CSS-->
        <style>
            body{
                overflow-x:hidden;
            }
            .transparent{
                background:transparent !important;
            }
            * {
              -moz-transition: opacity 0.15s ease-out;
              -o-transition: opacity 0.15s ease-out;
              -webkit-transition: opacity 0.15s ease-out;
              transition: opacity 0.15s ease-out;
            }
            .navbar-right li a {
                font-size:200%;
                padding-top:30px;
                padding-bottom:30px;
            }
            .bannerimg{
                width:80%;
            }
            .bannerimg2{
                width:50%;
            }
            #div1{
            
            background: #0aa5ff; /* Old browsers */
            background: -moz-linear-gradient(top,  rgb(10, 165, 255) 0%, #49bcff 51%, #ffffff 100%); /* FF3.6+ */
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#0aa5ff), color-stop(51%,#49bcff), color-stop(100%,#ffffff)); /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(top,  #0aa5ff 0%,#49bcff 51%,#ffffff 100%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top,  #0aa5ff 0%,#49bcff 51%,#ffffff 100%); /* Opera 11.10+ */
            background: -ms-linear-gradient(top,  #0aa5ff 0%,#49bcff 51%,#ffffff 100%); /* IE10+ */
            background: linear-gradient(to bottom,  #0aa5ff 0%,#49bcff 51%,#ffffff 100%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#0aa5ff', endColorstr='#ffffff',GradientType=0 ); /* IE6-9 */


                max-width:100vw;
                height:100vh;
            }
            #div2{
                background-color: #353b46;
                max-width:100vw;
                height:100vh;
            }
            #codetext{
                padding-top:105px;
                z-index:9;
                position:absolute;
            }
            #story{
                
/*                position: relative;*/
                display:initial;
                color:rgba(255, 255, 255, 0.58);
            }
            #title{
                display:initial;
            }
            .typed-cursor{
                font-size:26px;
                font-weight: bold;
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
            #codetextup{
                position:absolute;
                z-index:10;
                width:100%;
                height:100%;
                background:rgba(0, 0, 0, 0.37);
            }
            #textcodeup{
                margin-top:18%;
                font-size:67.5px !important;
            }
            #scene{
                width:100%;
                height:100%;
            }
            @media only screen and (min-width: 1366px) {
                #layer1{
                    width:105%;
                    margin-left:-2.5%;
                    margin-top:200px;
                }
                #layer01{
                    width:105%;
                    margin-left:-2.5%;
                    margin-top:200px;
                }
                #layer02{
                    width:105%;
                    margin-left:-2.5%;
                    margin-top:200px;
                }
                #layer4{
                    width:90%; 
                    position:center;
                    margin-left:165%;
                    margin-top:20%;
                }
            
            }
            @media only screen and (min-width: 1920px) {
                #layer1{
                    width:105%;
                    margin-left:-2.5%;
                    position:center;
                    margin-top:300px;
                }
                #layer01{
                    width:105%;
                    margin-left:-2.5%;
                    position:center;
                    margin-top:300px;
                }
                #layer02{
                    width:105%;
                    margin-left:-2.5%;
                    position:center;
                    margin-top:300px;
                }
                #layer4{
                    width:100%; 
                    margin-left:240%;
                    margin-top:90%;
                }
            }
        </style>
        <style>
            div#load_screen{
                background: #000;
                opacity: 1;
                position: fixed;
                z-index:10;
                top: 0px;
                width: 100%;
                height: 1600px;
            }
            div#load_screen > div#loading{
                color:#FFF;
                width:120px;
                height:24px;
                margin: 300px auto;
            }
            #load_screen{
                z-index:1031;
            }
        </style>
        <style>
            .laptop-wrapper {width: 100%;}
            .laptop-screen-frame {
/*                border: 1px solid #000;*/
                padding: 1.250em;
                margin: 0.625em 0.625em 0em 0.625em;
                border-radius: 1.250em 1.250em 0em 0em;
                border-bottom:none;
                background: rgb(149,149,149); 
            }
            .laptop-screen-content {
                background: #fff;
                height: auto;
            }
            .laptop-body {
                height:1.250em; 
                background: rgb(235, 235, 235);
/*                border: 1px solid #666;*/
            }
            .laptop-button {
                height:0.400em;
                width: 15%;
                margin:auto;
                border-radius: 0em 0em 10.00em 10.000em;
                background: rgb(183, 183, 183);
                margin-bottom: 0.625em;
/*                border: 1px solid #666;*/
                border-top: none;
            }
            .laptop-base {
                height:0.375em;
                border-radius: 0em 0em 10.00em 10.000em;
            background: rgb(177, 177, 177);
            margin-bottom: 0.625em;
/*            border: 1px solid #666;*/
            border-top: none;
            }
            @media \0screen {
               img { 
                width: auto;
              }
            }
            .laptop-screen-content > img{
                width:100%;
            }
        </style>
        <script>
            window.addEventListener("load", function(){
                var load_screen = document.getElementById("load_screen");
                document.body.removeChild(load_screen);
            });
        </script>
	</head>
	<body>
        <div class="container-fluid" id="load_screen">
            <div id="loading">
                loading document
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
            <!--Content-->
                <div class="col-xs-12 full">
                    <nav class="navbar navbar-inverse navbar-fixed-top transparent">
                        <div class="container">
                            <div class="navbar-header">
                                <a class="navbar-brand" href="#"><img src="../assets/img/brand1.png" id="logonav" class="img-responsive" width="200"></a>
                            </div>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#">¿Box Link?</a></li>
                                <li><a href="#">Link</a></li>
                                <li><a href="#">Link</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-xs-12 full text-center" id="div1">
                    <ul id="scene" class="full text-center" 
                      data-friction-x="0.1"
                      data-friction-y="0.1"
                      data-invert-x="true"
                      data-invert-y="true">
                      <li class="layer" data-depth="0.04"><img id="layer01" src="img/layer01.png"></li>
                      <li class="layer" data-depth="0.06"><img id="layer1" src="img/layer02.png"></li>
                      <li class="layer" data-depth="0.08"><img id="layer1" src="img/layer0.png"></li>
                      <li class="layer" data-depth="0.30"><img id="layer3" src="img/layer2.png" style="width:80%;"></li>
                      <li class="layer" data-depth="0.10"><img id="layer2" src="img/layer3.png" style="width:80%;"></li>
                      <li class="layer" data-depth="0.50"><img id="layer4" src="img/layer1.png" style=""></li>
<!--                      <li class="layer" data-depth="0.20"><h3>Box Link</h3></li>-->
<!--
                      <li class="layer" data-depth="0.40"><img src="layer3.png"></li>
                      <li class="layer" data-depth="0.60"><img src="layer4.png"></li>
                      <li class="layer" data-depth="0.80"><img src="layer5.png"></li>
                      <li class="layer" data-depth="1.00"><img src="layer6.png"></li>
-->
                    </ul>
<!--                    <img src="../assets/img/box-link-about-esp.png" class="bannerimg">-->
                </div>
                <div class="col-xs-12 full text-center typed" id="div2">
                    <div class="jumbotron text-left transparent" id="codetext">
                        <h3 id="story"></h3>
                    </div>
                    <div id="codetextup">
                        <div class="container">
                            <div class="jumbotron transparent" id="textcodeup">
                                <h1 id="title" class="junction-bold"></h1>
                            </div>
                        </div>
                    </div>
                </div>
<!--
                <div class="col-xs-12 full text-center typed" id="div3">
                    <div class="jumbotron transparent">
                        <h3 class="justify">
                            <strong>Box Link</strong> es una plataforma de aprendizaje didáctico en la cual las personas interesadas en aprender diseño de Front-end pueden adquirir los conocimientos básicos necesarios para iniciarse en el diseño de páginas web. El método que <strong>Box Link</strong> implementa para la enseñanza de dichos términos es mediante el uso de bloques, la principal ventaja es que promovemos el verdadero aprendizaje de los diferentes lenguajes para diseño web(HTML5 y CSS3), esto gracias a que el estudiante no tiene la posibilidad de sencillamente solo copiar el código como en otras plataformas, sino que la única manera de poder realizar la lección es poniendo los bloques de manera que cumpla los requisitos para poder pasar la lección.
                        </h3>                    
                    </div>
                </div>
-->
                <div class="col-xs-12 full text-center typed" id="div3">
                    <div class="container">
                        <div class="jumbotron transparent text-center">
                            <h1 class="junction-regular">¿Como funciona <strong class="junction-bold">Box Link</strong>?</h1>
                        </div>
                        <div class="col-xs-12 full">
                            <div class="col-xs-5">
                                <div class="laptop-wrapper">
                                    <div class="laptop-screen-frame">
                                        <div class="laptop-screen-content">
                                            <img src="img/screenshot2.png" />
                                        </div>
                                    </div>
                                    <div class="laptop-body">
                                        <div class="laptop-button">

                                        </div>
                                    </div>
                                    <div class="laptop-base">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-2 text-center" style="height:100%;">
                                <img src="img/arrow.png" style="width:90%;">
                            </div>
                            <div class="col-xs-5">
                                <div class="laptop-wrapper">
                                    <div class="laptop-screen-frame">
                                        <div class="laptop-screen-content">
                                            <img src="img/screenshot1.png" />
                                        </div>
                                    </div>
                                    <div class="laptop-body">
                                        <div class="laptop-button">
                                        </div>
                                    </div>
                                    <div class="laptop-base">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="jumbotron transparent text-center">
                            En <strong>Box Link</strong> hemos desarrollado una plataforma interactiva para el aprendizaje de HTML5 y CSS3
                        </div>
                    </div>
                </div>
            <!--/#Content-->
            </div>
        </div>
		<!--Main js-->
        <script src="../assets/js/jquery.js" type="text/javascript"></script>
        <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../assets/js/bootbox.min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function() {
                $( "body" ).scroll(function() {
                  $('div')[0].scrollHeight);
                    alert('hola');
                });
            }); 
        </script>

		<!--/#Main js-->
        <script src="../assets/js/typed.min.js"></script>
        <script>
        $(function(){$("#story").typed({strings:["&lt;html&gt; ^500\n<br> --&lt;head&gt; ^500\n<br> ----&lt;title&gt;Lorem ipsum&lt;/title&gt; ^500\n<br> ----&lt;link href='css/main.css' rel='stylesheet'&gt; ^500\n<br> --&lt;/head&gt; ^500\n<br> --&lt;body&gt; ^500\n<br> ----&lt;div&gt; ^500\n<br> ------&lt;img src='img/brand.png'&gt; ^500\n<br> ------&lt;h1&gt;Lorem ipsum dolor sit amet&lt;/h1&gt; ^500\n<br> ------&lt;h3&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam mattis efficitur.&lt;/h3&gt; ^500\n<br> ------&lt;ul&gt; ^500\n<br> --------&lt;li&gt;Lorem&lt;/li&gt; ^500\n<br> --------&lt;li&gt;Ipsum&lt;/li&gt; ^500\n<br> ------&lt;/ul&gt; ^500\n<br> ----&lt;/div&gt; ^500\n<br> --&lt;/body&gt; ^500\n<br> &lt;/html&gt; ^500\n"],typeSpeed:15,backDelay:500,loop:!1,loopCount:!1})});
         $(function(){$("#title").typed({strings:["^2000 ¿Se te hace dificil comprender el codigo de HTML5 y CSS3?"],typeSpeed:60,backDelay:500,loop:!1,loopCount:!1})});
        </script>
        <script src="../assets/js/parallax/deploy/parallax.min.js"></script>
        <script>
            var scene = document.getElementById('scene');
            var parallax = new Parallax(scene);
        </script>
        <script>
//           $(document).ready(function(){var e=0,o=/Firefox/i.test(navigator.userAgent)?"DOMMouseScroll":"mousewheel";$("body").bind(o,function(o){var i=window.event||o;i=i.originalEvent?i.originalEvent:i;var n=i.detail?-40*i.detail:i.wheelDelta;n>0?(e-=$(window).height(),$("body").animate({scrollTop:e})):(e+=$(window).height(),$("body").animate({scrollTop:e}))})});
        </script>
        <script>
//            $(document).ready(function() {
//                $( "body" ).scroll(function() {
//                    if ($(".navbar").offset().top >= $("#div1").offset().top &&  $(".navbar").offset().top < $("#div2").offset().top ) 
//                    {
//                        $("#logonav").attr("src","../assets/img/brand1.png");
//                    }
//                    if ($(".navbar").offset().top >= $("#div2").offset().top &&  $(".navbar").offset().top < $("#div3").offset().top ) 
//                    {
//                        $("#logonav").attr("src","../assets/img/brand2.png");
//                    }
//                });
//            });
        </script>
	</body>
</html>
