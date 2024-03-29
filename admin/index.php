<?php
    include_once '../assets/includes/db_conexion.php';
    include_once '../assets/includes/funciones.php';
    sec_session_start();
    $user = $_SESSION['username'];
    $elidespecial = $_SESSION['user_id'];
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
?>

<!--

Copyright (c) 2015 Box Link
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
            $titulodelapagina = "Box Link Administration";
			include 'main_css.php';
		?>
        <!--Custom css-->
        <link href="../assets/css/sidebar.css" rel="stylesheet">
        <link href="../assets/css/perfil.css" rel="stylesheet">
        <!--/#Custom css-->
		<!--/#Core CSS-->
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
            <style>
            #usrpanel{
                background: #191837 url(../assets/img/userbanner/<?=$bannero?>.png) fixed;
                color:#fff;
                background-position: bottom left;
                background-size:100%;
            }
            .usrnav{
                background-color: transparent  !important;
                border-color: transparent  !important;
                margin-bottom:0px;
                
            }
            .btn-face{
                background:#133783;
                color:#fff;
            }.btn-twit{
                background:#55ACEE;
                color:#fff;
            }
            .btnwithout{
                border:none;
                background-color: Transparent;
            }
            </style>
			<!--Page Content -->
            <div id="page-content-wrapper">
				<div class="container-fluid">
					<div class="row">
                        <div class="panel col-xs-12 full">
                            <div class="panel-heading full" style="border-bottom: 0px;">
                                <button type="button" data-toggle="modal" data-target="#myModal" class="btnwithout" style="position:absolute; bottom:5px; left:5px;"><i class="fa fa-cog fa-2x" ></i></button>
                                <div class="jumbotron text-center" id="usrpanel" style="margin-bottom: 0px;">
                                        <div class="container-fluid full">
                                                <ul class="nav navbar-nav">
                                                    <li> <a class="btn btn-success" target="_blank" href="../users/<?=$user?>/index.html"><?=$langprint["user-page-link"]?><Strong> <?=$_SESSION['username']?></Strong></a></li>
                                                    <li><a class="btn btn-face" target="_blank">Facebook</a></li>
                                                    <li><a class="btn btn-twit" target="_blank">Twitter</a></li>
                                                </ul>

                                                <ul class="nav navbar-nav navbar-right">
                                                    <form class="navbar-form navbar-left" role="search" id="search">
                                                        <div class="form-group full">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-user fa-2x"></i></span>
                                                                <input type="text" class="form-control input-lg" placeholder="<?=$langprint["search-input"]?>" autocomplete="off" id="SearchString"> 
                                                            </div>
                                                        </div>
                                                        <div class="list-group" style="position:absolute;" id="SearchResult"></div>
                                                    </form>
                                                </ul>
                                        </div>
                                
                                    <img src="../assets/img/avatares/<?=$avatar?>.png" style="border-radius:50%;width:15%;background: rgba(255, 255, 255, 0.4);">
                                    <h2 class="junction-bold"><?=$nombres?> <?=$apellidos?></h2>
                                    <h3 class="junction-bold"><?=$_SESSION['username']?></h3>
                                    <h4 class="junction-light"><?=$descripcion?></h4>
                                </div>
                            </div>
                        </div>
                        <!-- Modal de personalización -->
                        <div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                              <form action="../assets/includes/personalizacion.php" method="post" name="form" id="form">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title junction-bold text-center" id="myModalLabel"><?=$langprint["modal-banner-change-title"]?></h4>
                              </div>
                              <div class="modal-body">
                                  <p class="junction-light text-center"><?=$langprint["modal-banner-change-brief"]?></p>
                                                <div class="col-md-12" id="bannerchangeb" >
                                                    <img class="img-responsive" src="../assets/img/userbanner/banner_preview.png">
                                                    <p class="text-center"><strong><?=$langprint["modal-banner-change-preview"]?></strong></p>
                                                </div>
                                                <div class="col-md-12 full">
                                                    <input type="hidden" value="<?=$idusuario?>" name="userid" id="userid" >
                                                    <input type="hidden" value="" name="banselect" id="banselect" >
                                                    <input type="hidden" value="admin" name="folderloc" id="folderloc" >
                                        <?php
                                        for($x=1; $x <= 6; $x++)
                                        {
                                            if($x == $bannero)
                                            {
                                                echo "<div class='col-md-2 full' id='idban".$x."' style='border: 2px solid #58B95B;'>
                                                <img class='img-responsive' src='../assets/img/userbanner/".$x.".png' ></div> \n";
                                            }
                                            else
                                            {
                                                echo "<div class='col-md-2 full' id='idban".$x."'>
                                                <img class='img-responsive' src='../assets/img/userbanner/".$x.".png' onclick='showPrev(".$x.")'></div> \n";
                                            }
                                        }
                                        ?>
                                                </div>
                                  <br>
                                  <p class="junction-light text-center"><?=$langprint["modal-banner-change-tip"]?></p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><?=$langprint["btn-cancel"]?></button>
                                <input type="submit" class="btn btn-success" name="b1" id="b1" value="<?=$langprint["btn-save"]?>" disabled>
                              </div>
                            </div>
                            </form>
                          </div>
                        </div>
                        <!-- /Modal de personalización -->
                        <div class="col-xs-12 full">
                                <div class="panel panel-success" style="background-color: transparent;">
                                    <div class="panel-heading">
                                            <h1 class="panel-title junction-regular text-center"><?=$langprint["admin-friendly-intro"]?> <?=$user?>!</h1>
                                    </div>
                                    <div class="panel-body">
                        <div class="col-md-4 text-center" >
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                <h2 class="panel-title junction-bold"><i class="fa fa-users"></i> <?=$langprint["admin-maintenance-users"]?>
                                  <?php
                                $lastday = date('Y-m-d', strtotime("-5 day"));
                                $stmt = $mysqli->prepare("SELECT log FROM usuarios_tb WHERE log = 0 AND registro > ?");
                                $stmt->bind_param("s", $lastday);
                                $stmt->execute();  
                                $stmt->store_result();
                                $stmt->bind_result($log);
                                $stmt->fetch();
                                $row_cnt = $stmt->num_rows;
                                if($row_cnt > 0)
                                {
                                        echo "<span class='label label-primary' data-toggle='tooltip' data-placement='top' title='". $langprint["admin-maintenance-users-new-notification"]."' data-original-title='Tooltip on top' style='cursor: help;'>+".$row_cnt. "</span>";
                                }
                                ?>
                                </h2>
                                </div>
                                <div class="panel-body">
                                <p class="junction-light"><?=$langprint["mant-usr-des"]?></p>
                                </div>
                                <div class="panel-footer">
                                    <a href="usuarios.php" class="btn btn-info"><i class="fa fa-list-ul"></i> <?=$langprint["admin-maintenance-users-go-list"]?></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center" >
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                <h2 class="panel-title junction-bold"><i class="fa fa-book fa-lg"></i>
                                <?php
                                $date = date('Y-m-d', strtotime('-6 day'));
                                $stmt3 = $mysqli->query("SELECT * FROM curden WHERE fecha_den > '$date'");
                                $lele = $stmt3->num_rows;
                                echo $langprint["admin-maintenance-courses"]." <a href='complaints.php' style='text-decoration: none;'><span class='label label-danger' data-toggle='tooltip' data-placement='top' title='".$langprint["admin-maintenance-courses-den"]."' data-original-title='Tooltip on top' style='cursor: help;'>+".$lele."</span></a>";
                                ?>
                                </h2>
                                </div>
                                <div class="panel-body">
                                <p class="junction-light"><?=$langprint["mant-cur-des"]?></p>
                                </div>
                                <div class="panel-footer">
                                    <a href="cursos.php" class="btn btn-info"><i class="fa fa-list-ul"></i> <?=$langprint["admin-maintenance-courses-go-list"]?></a>
                                </div>
                            </div>
                        </div>
<!--
                        <div class="col-md-4 text-center" >
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h2 class="panel-title junction-bold"><i class="fa fa-camera-retro fa-lg"></i>   Imagenes</h2>
                                </div>
                                <div class="panel-body">
                                <p class="junction-light">Manejo de imagenes del sitio como avatares, banners, trofeos y medallas</p>
                                </div>
                                <div class="panel-footer">
                                    <a href="upload.php" class="btn btn-success"><i class="fa fa-upload"></i>
 Subir imagen</a><a href="#" class="btn btn-info"><i class="fa fa-file-image-o"></i>
 Imagenes subidas</a>
                                </div>
                            </div>
                        </div>
-->
                                    </div>
                                </div>
                        </div>
                    </div><!---->
                </div>
            </div>
        </div>
        <!--Main js-->
        <script>
        function showPrev(insertimg)
        {   
            document.getElementById("bannerchangeb").style.background = "url(../assets/img/userbanner/"+insertimg+".png)";
            document.getElementById("bannerchangeb").style.backgroundSize = "100% 150%";
            document.getElementById("bannerchangeb").style.height = "601x";
            document.getElementById("banselect").setAttribute("value", insertimg); 
            for (i = 1; i < 7; i++) 
            {
                if(i == insertimg)
                {
                    document.getElementById("idban"+insertimg).style.border = "2px solid #ffffff";
                }
                else
                {
                    if(i != <?= $bannero?>)
                    {
                        document.getElementById("idban"+i).removeAttribute("style");  
                    }
                }
            }
            document.getElementById("b1").removeAttribute("disabled");
        }

        </script>
		<?php
            include 'main_js.php';
        ?>
		<!--/#Main js-->
	</body>
</html>