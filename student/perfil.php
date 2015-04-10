<!--

Copyright (c) 2015 Blink
All Rights Reserved
 
This product is protected by copyright and distributed under
licenses restricting copying, distribution, and decompilation.

Gerardo López | Iván Nolasco | Renato Andres

-->
<?php

    include_once '../assets/includes/db_conexion.php';
    include_once '../assets/includes/funciones.php';
    sec_session_start();
    $user = $_SESSION['username'];
    $avatar = '';
    if ($stmt = $mysqli->prepare("SELECT avatar, nombres, apellidos, nacimiento, descripcion, correo, tipo, lang  FROM usuarios_tb WHERE usuario = ?")) 
    {
        $stmt->bind_param('s', $user);
        $stmt->execute(); 
        $stmt->store_result();
        $stmt->bind_result($avatar,$nombres,$apellidos,$nacimiento,$descripcion,$correo,$tipo,$lang);
        $stmt->fetch();
        
    }
?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <!--Core CSS-->
    <?php 
        $titulodelapagina = "¡Bienvenido $user!";
        require 'main_css.php';
    ?>
    <!--/#Core CSS-->

    <!--Custom CSS-->
    <link href="../assets/css/sidebar.css" rel="stylesheet">
    <link href="../assets/css/perfil.css" rel="stylesheet">
    <link href="../assets/css/editor.css" rel="stylesheet">
    <style>
        #usrpanel{
            background: #191837 url(../assets/img/profile1.jpg) fixed;
            color:#fff;
            background-position: bottom left;
            background-size:100%;
        }
        .usrnav{
            background-color: transparent  !important;
            border-color: transparent  !important;
            margin-bottom:0px;

        }
        .portfolio-item {
            margin-bottom: 25px;
            margin-top:15px;
        }
    </style>
    <!--/#Custom CSS-->

</head>
<body style="background:#D8D8D8  !important;">
    <!--Topbar -->
    <?php 
        include '../nav/topbar.php';
    ?>
    <!--/#Topbar -->
    <div id="wrapper" class="toggled">
        <!--Sidebar -->
        <?php 
            include '../nav/sidebar.php';
        ?>
        <!--/#Sidebar -->

        <!--Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                <!--Content-->                   
<?php
    if (isset($_GET['u'])) 
    {
        $u = $_GET['u'];
        $stmt1 = $mysqli->prepare("SELECT avatar, nombres, apellidos, nacimiento, descripcion, correo, usuario, tipo  FROM usuarios_tb WHERE usuario = ?");
        $stmt1->bind_param('s', $u);
        $stmt1->execute(); 
        $stmt1->store_result();
        $stmt1->bind_result($avatar1,$nombres1,$apellidos1,$nacimiento1,$descripcion1,$correo1,$usuario1,$tipo1);
        $stmt1->fetch();
        if($stmt1->num_rows == 1)
        {
            if ($tipo1 == '3') 
            {
?>
                        <div class="panel col-xs-12 full">
                            <div class="panel-heading full" style="border-bottom: 0px;">
                                <div class="jumbotron text-center" id="usrpanel" style="margin-bottom: 0px;">
                                        <div class="container-fluid full">
                                                <ul class="nav navbar-nav">
                                                    <li> <a class="btn btn-success" target="_blank" href="../users/<?=$usuario1?>/index.html"><Strong><?=$usuario1?></Strong>'s page</a></li>
                                                    <li><a class="btn btn-face" target="_blank">Facebook</a></li>
                                                    <li><a class="btn btn-twit" target="_blank">Twitter</a></li>
                                                </ul>
                                                <ul class="nav navbar-nav navbar-right">
                                                    <form class="navbar-form navbar-left" role="search" id="search">
                                                        <div class="form-group full">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-user fa-2x"></i></span>
                                                                <input type="text" class="form-control input-lg" placeholder="Search" autocomplete="off" id="SearchString"> 
                                                            </div>
                                                        </div>
                                                        <div class="list-group" style="position:absolute;" id="SearchResult"></div>
                                                    </form>
                                                </ul>
                                        </div>
                                    <img src="../assets/img/avatares/<?=$avatar1?>.png" style="border-radius:50%;width:15%;background: rgba(255, 255, 255, 0.4);">
                                    <h2 class="junction-bold"><?=$nombres1?></h2>
                                    <h3 class="junction-bold"><?=$usuario1?></h3>
                                    <h4 class="junction-light container"><?=$descripcion1?></h4>
                                </div>
                            </div>
                        </div> 
                         <div class="col-xs-12 full">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                        <h3 class="panel-title">Courses</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 full">
                             <div class="container" style="margin-bottom:15px;">
                                 <div class="col-xs-12 well full">
                                    <div class="col-md-5 full"> 
                                         <a href="#"> 
                                            <img class="img-responsive bg-primary" src="../assets/img/trofeos/1.jpg" alt=""> 
                                         </a> 
                                     </div> 
                                     <div class="col-md-7"> 
                                         <h3>Project One</h3> 
                                         <h4>Subheading</h4> 
                                         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p> 
                                         <a class="btn btn-info" href="#">View Project <span class="glyphicon glyphicon-chevron-right"></span></a> 
                                     </div>
                                </div>
                             </div>
                            <div class="container" style="margin-bottom:15px;">
                                 <div class="col-xs-12 well full">
                                    <div class="col-md-5 full"> 
                                         <a href="#"> 
                                            <img class="img-responsive bg-primary" src="../assets/img/trofeos/1.jpg" alt=""> 
                                         </a> 
                                     </div> 
                                     <div class="col-md-7"> 
                                         <h3>Project One</h3> 
                                         <h4>Subheading</h4> 
                                         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p> 
                                         <a class="btn btn-info" href="#">View Project <span class="glyphicon glyphicon-chevron-right"></span></a> 
                                     </div>
                                </div>
                             </div> 
                        </div>
                            
<?php       
                }
                else
                {
                    Header('Location: ./');
                }
        }
        else
        {
        ?>
                        <div class="col-xs-12" style="margin-top:50px;">
                            <div class="container">
                                <div class="jumbotron text-center">
                                    <img src="../assets/img/404.png" style="width:45%;"><br>
                                    <div class="form-group full text-center">
                                            <input type="text" class="form-control input-lg" placeholder="Search" autocomplete="off" id="SearchString"> 
                                    </div>
                                    <div class="list-group" id="SearchResult"></div>
                                </div>
                            </div>
                        </div>
        <?php
        }
    }
    elseif(isset($_GET['t']))
    {
        $t = $_GET['t'];
        $stmt1 = $mysqli->prepare("SELECT idusuario, avatar, nombres, apellidos, nacimiento, descripcion, correo, usuario, tipo  FROM usuarios_tb WHERE usuario = ?");
        $stmt1->bind_param('s', $t);
        $stmt1->execute(); 
        $stmt1->store_result();
        $stmt1->bind_result($id1,$avatar1,$nombres1,$apellidos1,$nacimiento1,$descripcion1,$correo1,$usuario1,$tipo1);
        $stmt1->fetch();
        if($stmt1->num_rows == 1)
        {
            if ($tipo1 == '2') 
            {
?>
                        <div class="panel col-xs-12 full">
                            <div class="panel-heading full" style="border-bottom: 0px;">
                                <div class="jumbotron text-center" id="usrpanel" style="margin-bottom: 0px;">
                                    <img src="../assets/img/avatares/<?=$avatar1?>.png" style="border-radius:50%;width:15%;background: rgba(255, 255, 255, 0.4);">
                                    <h2 class="junction-bold"><?=$nombres1?></h2>
                                    <h3 class="junction-bold"><?=$usuario1?></h3>
                                    <h4 class="junction-light container"><?=$descripcion1?></h4>
                                    <a class="btn btn-success input-lg" target="_blank" href="../users/<?=$usuario1?>/index.html"><Strong><?=$usuario1?></Strong>'s page</a>
                                </div>
                            </div>
                        </div> 
                         <div class="col-xs-12 full">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                        <h3 class="panel-title">Courses</h3>
                                </div>
                            </div>
                        </div>
                        <?php
                            $stmt2 = $mysqli->query(" SELECT * FROM `curso` WHERE `idprofesor` = '".$id1."' ");
                            if ($stmt2->num_rows > 0) 
                            {
                                while($row = $stmt2->fetch_assoc()){
                                    echo "
                                        <div class='col-xs-12 full'>
                                            <div class='container' style='margin-bottom:15px;'>
                                                <div class='col-xs-12 well full'>
                                                    <div class='col-md-5 full'> 
                                                         <a href='#'> 
                                                            <img class='img-responsive bg-primary' src='../assets/img/trofeos/1.jpg' alt=''> 
                                                         </a> 
                                                     </div> 
                                                     <div class='col-md-7'> 
                                                         <h3>".$row['nombre']."</h3> 
                                                         <h4>".$nombres1."</h4> 
                                                         <p>".$row['descripcion']."</p> 
                                                         <a class='btn btn-info' href='#'>View Lessons <span class='glyphicon glyphicon-chevron-right'></span></a> 
                                                     </div>
                                                </div>
                                             </div>
                                        </div>
                                    ";
                                }
                            }
                            else
                            {
                                echo "This teacher dont have any courses";
                            }
                        ?>
                        
                            
<?php       
                }
                else
                {
                    Header('Location: ./');
                }
        }
        else
        {
        ?>
                        <div class="col-xs-12" style="margin-top:50px;">
                            <div class="container">
                                <div class="jumbotron text-center">
                                    <img src="../assets/img/404.png" style="width:45%;"><br>
                                    <div class="form-group full text-center">
                                            <input type="text" class="form-control input-lg" placeholder="Search" autocomplete="off" id="SearchString"> 
                                    </div>
                                    <div class="list-group" id="SearchResult"></div>
                                </div>
                            </div>
                        </div>
        <?php
        }
    }
    else
    {
        Header('Location: ./');
    }
?>
                        <!--/#Content-->
                    </div>
                </div>
            </div>
            <!--/#Page Content -->
        </div>
        <!--Main js-->
        <?php 
            include 'main_js.php';
        ?>
        <!--/#Main js-->
        <script>

        </script>
    </body>
</html>