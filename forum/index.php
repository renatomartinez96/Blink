<!--

Copyright (c) 2015 Blink
All Rights Reserved

This product is protected by copyright and distributed under
licenses restricting copying, distribution, and decompilation.

Gerardo López | Iván Graciano | Renato Andres

-->
<?php
    include_once '../assets/includes/db_conexion.php';
    include_once '../assets/includes/funciones.php';
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    if($lang == "en")
    {
        include "../assets/lang/".$lang.".php";
    }
    elseif($lang == "es")
    {
        include "../assets/lang/".$lang.".php";
    }
    else
    {
        include "../assets/lang/es.php";
    }
    function tabla_forum_html($mysqli,$lang)
    {
        if($stmt1 = $mysqli->prepare("SELECT `id`, `date`, `name`, `nombre`, `user`, `lang` FROM `forum-post` WHERE `lang`= '0'"))
        {
            $stmt1->execute();
            $stmt1->store_result();
            $stmt1->bind_result($tabla_forum[0],$tabla_forum[1],$tabla_forum[2],$tabla_forum[3],$tabla_forum[4],$tabla_forum[5]);
            while($stmt1->fetch())
            {
                $resultados = $stmt1->num_rows;
                if ($resultados > 0)
                {
                    if($lang == "en")
                    {
                        echo "<a href='./?s=". $tabla_forum[0] ."' class='list-group-item'>";
                        echo "<h4 class='list-group-item-heading'>" . $tabla_forum[2] . "</h4>";
                        echo "<p class='list-group-item-text'>" . $tabla_forum[1] . "</p></a>";
                    } 
                    elseif($lang == "es")
                    {
                        echo "<a href='./?s=". $tabla_forum[0] ."' class='list-group-item'>";
                        echo "<h4 class='list-group-item-heading'>" . $tabla_forum[3] . "</h4>";
                        echo "<p class='list-group-item-text'>" . $tabla_forum[1] . "</p></a>";
                    }
                    else
                    {
                        echo "<a href='./?s=". $tabla_forum[0] ."' class='list-group-item'>";
                        echo "<h4 class='list-group-item-heading'>" . $tabla_forum[3] . "</h4>";
                        echo "<p class='list-group-item-text'>" . $tabla_forum[1] . "</p></a>";
                    
                    }
                }
            }
        }
    }
    function tabla_forum_css($mysqli,$lang)
    {
        if($stmt1 = $mysqli->prepare("SELECT `id`, `date`, `name`, `nombre`, `user`, `lang` FROM `forum-post` WHERE `lang`= '1'"))
        {
            $stmt1->execute();
            $stmt1->store_result();
            $stmt1->bind_result($tabla_forum[0],$tabla_forum[1],$tabla_forum[2],$tabla_forum[3],$tabla_forum[4],$tabla_forum[5]);
            while($stmt1->fetch())
            {
                $resultados = $stmt1->num_rows;
                if ($resultados > 0)
                {
                    if($lang == "en")
                    {
                        echo "<a href='./?s=". $tabla_forum[0] ."' class='list-group-item'>";
                        echo "<h4 class='list-group-item-heading'>" . $tabla_forum[2] . "</h4>";
                        echo "<p class='list-group-item-text'>" . $tabla_forum[1] . "</p></a>";
                    } 
                    elseif($lang == "es")
                    {
                        echo "<a href='./?s=". $tabla_forum[0] ."' class='list-group-item'>";
                        echo "<h4 class='list-group-item-heading'>" . $tabla_forum[3] . "</h4>";
                        echo "<p class='list-group-item-text'>" . $tabla_forum[1] . "</p></a>";
                    }
                    else
                    {
                        echo "<a href='./?s=". $tabla_forum[0] ."' class='list-group-item'>";
                        echo "<h4 class='list-group-item-heading'>" . $tabla_forum[3] . "</h4>";
                        echo "<p class='list-group-item-text'>" . $tabla_forum[1] . "</p></a>";
                    
                    }
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Foro</title>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="../assets/css/main.css" rel="stylesheet">
    
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        #content {
            margin-top: 55px;
        }
        .tagline {
            text-shadow: 0 0 10px #000;
            color: #fff;
        }
        #tagline{
            top: 200px;

        }
        .navbar-brand{
            padding-top: 0px;
            padding-bottom: 0px;
        }
        .navbar-brand > img{
            height: 40px;
        }
    </style>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../"><img src="../assets/img/brand1.png" class="img-responive"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="./">Foro</a>
                    </li>
                    <li>
                        <a href="#">Preguntas frecuentes</a>
                    </li>
                    <li>
                        <a href="#">Contactenos</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container" id="content">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-9">
                <div class="well">
                    <?php
                    if(isset($_GET['s']))
                    {
                        if(file_exists('files/'. $lang . "/" . $_GET['s'] .'.txt'))
                        {
                            $myFile = 'files/'. $lang . "/" . $_GET['s'] .'.txt';
                            $fh = fopen($myFile, 'r');
                            $theData = fread($fh, filesize($myFile));
                            fclose($fh);
                            echo $theData;
                            if($lang == "es")
                            {
                                $inicio = "Inicio";
                            }
                            elseif($lang == "en")
                            {
                                $inicio = "Home";
                            }
                            else
                            {
                                $inicio = "Inicio";
                            }
                            echo "<ul class='breadcrumb'>
                                  <li><a href='./'>" . $inicio . "</a></li>
                                </ul>
                                ";
                            
                        }
                        else
                        {
                            echo "<div class='text-center'>
                                    <h1>404</h1>
                                </div>";
                        }
                    }
                    else
                    {
                    ?>
                        <h3 class="text-center">Contenido</h3>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-md-6">
                                    <h4 class="text-center">HTML</h4>
                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="text-center">CSS</h4>
                                    <hr>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="list-group">
                                    <?php
                                        tabla_forum_html($mysqli,$lang);
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="list-group">
                                    <?php
                                        tabla_forum_css($mysqli,$lang);
                                    ?>
                                </div>
                            </div>
                        </div>
                            <!-- /.col-lg-6 -->
                        <?php
                        }
                        ?>
                    <!-- /.row -->
                </div>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <!-- Blog Search Well -->
                <div class="col-xs-12">
                    <h4>Busqueda</h4>
                    <input type="text" class="form-control" placeholder="Search" autocomplete="off" id="SearchString">
                    <div class="list-group" style="position:absolute;" id="SearchResult"></div>
                    <!-- /.input-group -->
                </div>
            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/js/bootstrap.min.js"></script>
    
    <script>
        $(document).ready(function(){
            $( "#SearchString" ).on('input',function() {
                var searchString = $("#SearchString").val();
                var SearchResult = document.getElementById('SearchResult');
                var send = {"search" : searchString};
                $.ajax({
                    type: "POST",
                    url: "func/search.php",
                    data: send,
                    success: function(response) {
                        SearchResult.innerHTML = response;
                    }
                });
            });
        });
    </script>

</body>

</html>
