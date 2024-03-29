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
    $elidespecial = $_SESSION['user_id'];
    $idusr  = $_SESSION['user_id'];
    $avatar = '';
    if ($stmt = $mysqli->prepare("SELECT usuarios_tb.avatar, usuarios_tb.nombres, usuarios_tb.apellidos, usuarios_tb.nacimiento, usuarios_tb.descripcion, usuarios_tb.correo, usuarios_tb.tipo, usuarios_tb.lang, usuarios_tb.idusuario, user_config.banner, user_config.iduser FROM usuarios_tb INNER JOIN user_config ON usuarios_tb.idusuario = user_config.iduser WHERE usuarios_tb.idusuario = ?"))
    {
        $stmt->bind_param('s', $elidespecial);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($avatar,$nombres,$apellidos,$nacimiento,$descripcion,$correo,$tipo,$lang,$idusuario,$bannero,$iduserconf);
        $stmt->fetch();
    }

    include "auto.php";
    include "../assets/includes/lang.php";

    // DISEÑO DEL PERFIL
    $super = "";
    $cambe = "";
if(isset($_GET["user"]))
{         
    $buscar = $_GET["user"];

    if ($stmt10 = $mysqli->prepare("SELECT usuarios_tb.avatar, usuarios_tb.nombres, usuarios_tb.apellidos, usuarios_tb.nacimiento, usuarios_tb.descripcion, usuarios_tb.correo, usuarios_tb.tipo, usuarios_tb.lang, usuarios_tb.idusuario, user_config.banner, user_config.iduser FROM usuarios_tb INNER JOIN user_config ON usuarios_tb.idusuario = user_config.iduser WHERE usuarios_tb.usuario = ?"))
    {
        $stmt10->bind_param('s', $buscar);
        $stmt10->execute();
        $stmt10->store_result();
        $stmt10->bind_result($avatar10,$nombres10,$apellidos10,$nacimiento10,$descripcion10,$correo10,$tipo10,$lang10,$idusuario10,$bannero10,$iduserconf10);
        $stmt10->fetch();
    }
    $eltipo = "";
    switch ($tipo10)
    {
        case 1;
            $eltipo = $langprint["admin"];
        break;
        case 2;
            $eltipo = $langprint["tutor"];
        break;
        case 3;
            $eltipo = $langprint["student"];
        break;
    }
    $cambe = $nombres10." ".$apellidos10;
    $super .= "<div class='jumbotron  text-center' id='usrpanel' style='margin-bottom:0px;'>
<img class='img-circle' src='../assets/img/avatares/".$avatar10.".png' style='width:10%;background: rgba(255, 255, 255, 0.4);'>
<h3 >".$nombres10." ".$apellidos10."</h3>
<h3>".$buscar."</h3>
</div>
<div class='col-sx-12 full'>
<div class='col-sm-4 full'>
    <div class='panel panel-primary'>
        <div class='panel-heading text-center junction-regular'>
            <h4>Información</h4>
        </div>
        <div class='panel-body text-center'>
            <p class='junction-regular'>Nacimiento: </p>
            <p>".$nacimiento10."</p>
            <p class='junction-regular'>Tipo de usuario: </p>
            <p>".$eltipo."</p>
            <p class='junction-regular'>Descripción:</p>
            <p class='text-justify'>".$descripcion10."</p>
        </div>
    </div>
</div>
<!-- cambiable -->
<div class='col-sm-8 full'>
";
    // contenido del col-8
    $col8 = "";
    switch ($tipo10)
    {
        case 1;
            $col8 = "<div class='panel panel-primary'>
                        <div class='panel-heading text-center junction-regular'>
                            <h4>Admin</h4>
                        </div>
                        <br>
                        <h1 class='text-center junction-regular'>This user is the best</h1>
                        <br>";
        break;
        case 2;
        $col8 = "<div class='panel panel-primary'>
                        <div class='panel-heading text-center junction-regular'>
                            <h4>Cursos creados</h4>
                        </div>";
            include "pro-tutor.php";
        break;
        case 3;
            $col8 = "<div class='panel panel-primary'>
                        <div class='panel-heading text-center junction-regular'>
                            <h4>Trofeos</h4>
                        </div>
                        <div class='panel-body text-center'>
                            <div class='col-xs-6 full'>
                                <a class='btn btn-info btn-block junction-bold' role='button' data-toggle='collapse' href='#boxlinktrophies' aria-expanded='false' aria-controls='boxlinktrophies'>Trofeos Box Link</a>
                            </div>
                            <div class='col-xs-6 full'>
                                <a class='btn btn-success btn-block junction-bold' role='button' data-toggle='collapse' href='#othertrophies' aria-expanded='false' aria-controls='othertrophies'>Trofeos con tutor</a>
                            </div>
                                <div class='collapse' id='boxlinktrophies'>
                                    <div class='well'>
                                    <br>
                                        <h1 class='text-center junction-regular'>Proximamente</h1>
                                    </div>
                                </div>
                                <div class='collapse' id='othertrophies'>
                                    <div class='well'>
                                    <br>
                                        <h1 class='text-center junction-regular'>Trofeos de tutores</h1>
                        ";
            include "pro-student.php";
            $col8 .= $infotoprint;
            $col8 .= "</div></div></div>";
        break;
    }
    // / contenido del col-8
$super .= "".$col8."</div></div><!-- / cambiable -->
</div>"; // Diseño del perfil
}
else
{
    header("Location: index.php");
}

    // / DISEÑO DEL PERFIL
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!--Core CSS-->
        <?php
            $titulodelapagina = $cambe;
            include 'main_css.php';
        ?>
        <!--/#Core CSS-->

        <!--Custom CSS-->
            <link href="../assets/css/sidebar.css" rel="stylesheet">
            <link href="../assets/css/perfil.css" rel="stylesheet">
            <style>
                ::-webkit-scrollbar {
                    width: 15px;
                }

                ::-webkit-scrollbar-track {
                    border-radius: 0px;
                    background: #000;
                }

                ::-webkit-scrollbar-thumb {
                    border-radius: 0px;
                    background: black;
                }
                /*GRAY*/
                .not-success {
                    -webkit-filter: grayscale(100%);
                    filter: grayscale(100%)
                }
                .mrwhite{
                    background: #ede5e5;
                }

                .mask{
                    cursor: pointer;
                    width:100%;
                    height:100%;
                    position:absolute;
                    text-align:center;
                    opacity:0;
                    -webkit-transition: all 0.3s ease-out;
                    -moz-transition: all 0.3s ease-out;
                    -o-transition: all 0.3s ease-out;
                    transition: all 0.3s ease-out;
                }
                .mask:hover{
                    opacity:1;
                    cursor: pointer;
                    -webkit-transition: all 0.3s ease-out;
                    -moz-transition: all 0.3s ease-out;
                    -o-transition: all 0.3s ease-out;
                    transition: all 0.3s ease-out;
                    background:rgba(43, 62, 80, 0.6);
                }
                .imagenes{
                    padding:0;
                    margin:0;
                    -moz-box-sizing:border-box;
                    box-sizing:border-box;
                    overflow:hidden;
                    height:150px;
                    text-align: -webkit-center;
                    position:relative;
                }
                .imagenes > img{
                    position:absolute;
                    top:0;
                    bottom:0;
                    left:0;
                    right:0;
                    margin:auto;
                    display:block;
                    max-width:100%;
                    max-height:100%;
                }
                #usrpanel{
                    background: #191837 url(../assets/img/userbanner/<?=$bannero10?>.png) center center !important;
                    color:#fff;
                    background-size:100%;
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
                <div class="container">
                    <div class="row">
                    <!--Content-->
                        <?=$super?>
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
        <script src="./assets/ajax/index.js"></script>
        <!--/#Main js-->
    </body>
</html>
