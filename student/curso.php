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
<body>
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
                        <div class="col-md-2 full">
                            <img src="../assets/img/trofeos/2.jpg" class="col-xs-12 full">
                        </div>
                        <div class="col-md-10">
                        
                        </div>
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
</body>
</html>