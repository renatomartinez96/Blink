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

    if (login_check($mysqli) == true) 
    {
        $logged = "Ya iniciaste sesión ._.";
    } 
    else 
    {
        $logged = $lang["nosession"];
    }

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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <script type="text/JavaScript" src="assets/js/sha512.js"></script> 
    <script type="text/JavaScript" src="assets/js/forms.js"></script>
</head>         
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Start Bootstrap</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Services</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Section -->
    <section id="intro" class="intro-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Scrolling Nav</h1>
                    <p><strong>Usage Instructions:</strong> Make sure to include the <code>scrolling-nav.js</code>, <code>jquery.easing.min.js</code>, and <code>scrolling-nav.css</code> files. To make a link smooth scroll to another section on the page, give the link the <code>.page-scroll</code> class and set the link target to a corresponding ID on the page.</p>
                    <a class="btn btn-default page-scroll" href="#about">Click Me to Scroll Down!</a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>About Section</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Services Section</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Contact Section</h1>
                </div>
            </div>
        </div>
    </section>
    
    <script async src="assets/js/jquery.js" type="text/javascript"></script>
    <script async src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script async src="assets/js/bootbox.min.js" type="text/javascript"></script>
    <script async src="assets/js/jquery.easing.min.js"></script>
    <script>
    $(window).scroll(function() {
        alert('hola');
        if ($(".navbar").offset().top > 50) {
            $(".navbar-fixed-top").addClass("top-nav-collapse");
        } else {
            $(".navbar-fixed-top").removeClass("top-nav-collapse");
        }
    });
    $(function() {
        $('a.page-scroll').bind('click', function(event) {
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top
            }, 1500, 'easeInOutExpo');
            event.preventDefault();
        });
    });
    </script>
</body>
</html>