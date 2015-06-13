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
                background:#E06B26;
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
        </style>
	</head>
	<body>
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
                    <img src="../assets/img/box-link-about-esp.png" class="bannerimg">
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
                <div class="col-xs-12 full text-center typed" id="div3">
                    <div class="jumbotron transparent">
                        <h3>Box Link es una plataforma en la cual cualquier persona intereada en el dise</h3>                    
                    </div>
                </div>
            <!--/#Content-->
            </div>
        </div>
		<!--Main js-->
		<?php 
			include 'main_js.php';
		?>
		<!--/#Main js-->
        <script src="../assets/js/typed.min.js"></script>
        <script>
        $(function(){
            $('#story').typed({
                strings: ["&lt;html&gt; ^750\n<br> --&lt;head&gt; ^750\n<br> ----&lt;title&gt;Lorem ipsum&lt;/title&gt; ^750\n<br> ----&lt;link href='css/main.css' rel='stylesheet'&gt; ^750\n<br> --&lt;/head&gt; ^750\n<br> --&lt;body&gt; ^750\n<br> ----&lt;div&gt; ^750\n<br> ------&lt;img src='img/brand.png'&gt; ^750\n<br> ------&lt;h1&gt;Lorem ipsum dolor sit amet&lt;/h1&gt; ^750\n<br> ------&lt;h3&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam mattis efficitur.&lt;/h3&gt; ^750\n<br> ------&lt;ul&gt; ^750\n<br> --------&lt;li&gt;Lorem&lt;/li&gt; ^750\n<br> --------&lt;li&gt;Ipsum&lt;/li&gt; ^750\n<br> ------&lt;/ul&gt; ^750\n<br> ----&lt;/div&gt; ^750\n<br> --&lt;/body&gt; ^750\n<br> &lt;/html&gt;"],
                typeSpeed: 20,
                backDelay: 500,
                loop: false,
                loopCount: false,
            });
        });
         $(function(){
            $('#title').typed({
                strings: ["^2000 ¿Se te hace dificil comprender el codigo de HTML5 y CSS3?"],
                typeSpeed: 60,
                backDelay: 500,
                loop: false,
                loopCount: false,
            });
        });
        </script>
	</body>
</html>
