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
    $avatar = '';
    if ($stmt = $mysqli->prepare("SELECT usuarios_tb.avatar, usuarios_tb.nombres, usuarios_tb.apellidos, usuarios_tb.nacimiento, usuarios_tb.descripcion, usuarios_tb.correo, usuarios_tb.tipo, usuarios_tb.lang, usuarios_tb.idusuario, user_config.banner, user_config.iduser FROM usuarios_tb INNER JOIN user_config ON usuarios_tb.idusuario = user_config.iduser WHERE usuarios_tb.idusuario = ?")) 
    {
        $stmt->bind_param('s', $elidespecial);
        $stmt->execute(); 
        $stmt->store_result();
        $stmt->bind_result($avatar,$nombres,$apellidos,$nacimiento,$descripcion,$correo,$tipo,$lang,$idusuario,$bannero,$iduserconf);
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
            .lecciones{
                min-height:175px;
                overflow:scroll;
                overflow-x:hidden;
                margin-bottom:0px;
            }
            .btnwithout{
                border:none;
                background-color: Transparent;
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
                        <div class="panel col-xs-12 full">
                            <div class="panel-heading full" style="border-bottom: 0px;">
                                <button type="button" data-toggle="modal" data-target="#myModal" class="btnwithout" style="position:absolute; bottom:5px; left:5px;"><i class="fa fa-cog fa-2x" ></i></button>
                                <div class="jumbotron text-center" id="usrpanel" style="margin-bottom: 0px;">
                                        <div class="container-fluid full">
                                                <ul class="nav navbar-nav">
                                                    <li> <a class="btn btn-success" target="_blank" href="../users/<?=$user?>/index.html"><Strong><?=$_SESSION['username']?></Strong>'s page</a></li>
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
                                
                                    <img src="../assets/img/avatares/<?=$avatar?>.png" style="border-radius:50%;width:15%;background: rgba(255, 255, 255, 0.4);">
                                    <h2 class="junction-bold"><?=$nombres?></h2>
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
                                <h4 class="modal-title junction-bold text-center" id="myModalLabel">Cambiar mi banner</h4>
                              </div>
                              <div class="modal-body">
                                                <div class="col-md-12" id="bannerchangeb" >
                                                    <img class="img-responsive" src="../assets/img/userbanner/banner_preview.png">
                                                    <p class="text-center"><strong>Vista previa</strong></p>
                                                </div>
                                                <div class="col-md-12 full">
                                                    <input type="hidden" value="<?=$idusuario?>" name="userid" id="userid" >
                                                    <input type="hidden" value="" name="banselect" id="banselect" >
                                                    <input type="hidden" value="student" name="folderloc" id="folderloc" >
                                                    <div class="col-md-2 full" id="idban1">
                                                        <img class="img-responsive" src="../assets/img/userbanner/1.png" onmouseover="showPrev(1)"></div>
                                                    <div class="col-md-2 full" id="idban2">
                                                        <img class="img-responsive" src="../assets/img/userbanner/2.png" onmouseover="showPrev(2)"></div>
                                                    <div class="col-md-2 full" id="idban3">
                                                        <img class="img-responsive" src="../assets/img/userbanner/3.png" onmouseover="showPrev(3)"></div>
                                                    <div class="col-md-2 full" id="idban4">
                                                        <img class="img-responsive" src="../assets/img/userbanner/4.png" onmouseover="showPrev(4)"></div>
                                                    <div class="col-md-2 full" id="idban5">
                                                        <img class="img-responsive" src="../assets/img/userbanner/5.png" onmouseover="showPrev(5)"></div>
                                                    <div class="col-md-2 full" id="idban6">
                                                        <img class="img-responsive" src="../assets/img/userbanner/6.png" onmouseover="showPrev(6)"></div>
                                                </div>
                                  <br>
                                  <br>
                                  <br>
                                  <p class="junction-light text-center">Para editar tu información personal debes ir <a href="my_data.php">aquí</a></p>
                                    
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <input type="submit" class="btn btn-success" name="b1" value="Guardar">
                              </div>
                            </div>
                            </form>
                          </div>
                        </div>
                        <!-- /Modal de personalización -->
                        <div class="col-xs-12 full">
                            <div class="col-md-12 full">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                            <h3 class="panel-title">Cursos</h3>
                                    </div>
                                    <div style="margin-top:15px;">
                                        <!--Cursos-->
                                            <?php
                                                $stmt = $mysqli->query("SELECT curso.idcurso as id, curso.nombre as nombre, curso.descripcion as descr
                                                                        FROM `curso` 
                                                                        INNER JOIN `cursoestudiante` 
                                                                        ON cursoestudiante.idcurso = curso.idcurso  
                                                                        WHERE cursoestudiante.idestudiante = '".$idusuario."'");
                                                if($result = $stmt->num_rows)
                                                {
                                                    if ($result > 0) 
                                                    {
                                                        while($row = $stmt->fetch_assoc())
                                                        {
                                                            $stmt1 = $mysqli->query("SELECT idleccion, nombre 
                                                                                     FROM `leccion` 
                                                                                     WHERE idcurso = '".$row['id']."'");
                                                            $result1 = $stmt1->num_rows;
                                                            if ($result1 > 0) 
                                                            {
                                                                echo"
                                                                        <div class='col-lg-4 col-md-6 '>
                                                                            <div class='panel panel-info'>
                                                                                <div class='panel-heading'>
                                                                                    <div class='row'>
                                                                                        <div class='col-xs-3'>
                                                                                            <i class='fa fa-trophy fa-5x'></i>
                                                                                        </div>
                                                                                        <div class='col-xs-9 text-right'>
                                                                                            <marquee width='100%' height='100%' scrolldelay='150' class='text-left'><h2>".$row['nombre']."</h2></marquee>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class='panel-body full'>
                                                                                    <div class='list-group lecciones'>";
                                                                    while($row1 = $stmt1->fetch_assoc())
                                                                    {  
                                                                      echo "
                                                                                        <a class='list-group-item' href='../framework/loadlesson.php?l=".$row1['idleccion']."'>".$row1['nombre']."</a>
                                                                            ";
                                                                    }
                                                                  echo "
                                                                                    </div>
                                                                                </div>
                                                                                <a href='#'>
                                                                                    <div class='panel-footer'>
                                                                                        <span class='pull-left'>Ver detalles</span>
                                                                                        <span class='pull-right'><i class='fa fa-arrow-circle-right'></i></span>
                                                                                        <div class='clearfix'></div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                ";
                                                            }
                                                            else
                                                            {
                                                                echo"
                                                                        <div class='col-lg-4 col-md-6 '>
                                                                            <div class='panel panel-info'>
                                                                                <div class='panel-heading'>
                                                                                    <div class='row'>
                                                                                        <div class='col-xs-3'>
                                                                                            <i class='fa fa-trophy fa-5x'></i>
                                                                                        </div>
                                                                                        <div class='col-xs-9 text-right'>
                                                                                            <div><h2>".$row['nombre']."</h2></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class='panel-body full lecciones'>
                                                                                    <div class='alert alert-dismissible alert-danger' style='margin-bottom:0px;'>
                                                                                        <button type='button' class='close' data-dismiss='alert'>x</button>
                                                                                        <strong>no se encontraron lecciones disponibles</strong>
                                                                                    </div>
                                                                                </div>
                                                                                <a href='#'>
                                                                                    <div class='panel-footer'>
                                                                                        <span class='pull-left'>Ver detalles</span>
                                                                                        <span class='pull-right'><i class='fa fa-arrow-circle-right'></i></span>
                                                                                        <div class='clearfix'></div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    ";
                                                            }
                                                        }
                                                    }
                                                    else
                                                    {
                                                        echo "no se han encontrado resultados";
                                                    }
                                                }
                                            ?>
                                        <!--/#Cursos-->
                                        
                                    </div>
                                </div>
                            </div>
                            </div>
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
                    document.getElementById("idban"+i).removeAttribute("style");
                }
            } 
        }
//            $("#act").click(function(){
//                $('#resultc')[0].contentWindow.location.reload(true);
//                var dataString = editor.getSession().getValue()
//                var send = {"codigo" : dataString,
//                            "usuario" : user};
//                $.ajax({
//                    type: "POST",
//                    url: "personalizacion.php",
//                    data: send,
//                    success: function(data) {
//                        $("#resul").append(data);
//                    }
//                });
//            });
        </script>
		<!--/#Main js-->
	</body>
</html>