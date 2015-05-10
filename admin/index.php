<?php
    include_once '../assets/includes/db_conexion.php';
    include_once '../assets/includes/funciones.php';
    sec_session_start();
    $user = $_SESSION['username'];
    $avatar = '';
    if ($stmt = $mysqli->prepare("SELECT avatar, nombres, apellidos, nacimiento, descripcion, correo, tipo, lang, idusuario  FROM usuarios_tb WHERE usuario = ?")) 
    {
        $stmt->bind_param('s', $user);
        $stmt->execute(); 
        $stmt->store_result();
        $stmt->bind_result($avatar,$nombres,$apellidos,$nacimiento,$descripcion,$correo,$tipo,$lang, $idusuario);
        $stmt->fetch();
        
    }
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
            $titulodelapagina = "Administración de Box Link";
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
            /* Radio Button
            
             input[type=radio] { display:none; } to hide the checkbox itself
            input[type=radio] + label:before {
            font-family: 'FontAwesome';
            display: inline-block;
            }

            input[type=radio] + label:before { content: "\f096"; } unchecked icon
            input[type=radio] + label:before { letter-spacing: 10px; } space between checkbox and label

            input[type=radio]:checked + label:before { display: block; content: "\f0c8"; } checked icon
            input[type=radio]:checked + label:before { display: block; letter-spacing: 5px; } allow space for check mark
                */
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
                                    <h4 class="junction-light"><?=$descripcion." - Administrator"?></h4>
                                </div>
                            </div>
                        </div>
                        <!-- Modal de personalización -->
                        <div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                              <form action="personalizacion.php" method="post" name="form" id="form">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Personalizar</h4>
                              </div>
                              <div class="modal-body">
                                        <div class="col-md-12 well">
                                                <div class="col-md-12" id="bannerchangeb" >
                                                    <img class="img-responsive" src="../assets/img/userbanner/banner_preview.png">
                                                    <p class="text-center"><strong>Vista previa</strong></p>
                                                </div>
                                                <div class="col-md-12 full">
                                                    <input type="hidden" value="<?=$idusuario?>" name="userid" id="userid" >
                                                    <input type="hidden" value="" name="banselect" id="banselect" >
                                                    <div class="col-md-2" id="idban1">
                                                        <img class="img-responsive" src="../assets/img/userbanner/1.png" onmouseover="showPrev(1)"></div>
                                                    <div class="col-md-2" id="idban2">
                                                        <img class="img-responsive" src="../assets/img/userbanner/2.png" onmouseover="showPrev(2)"></div>
                                                    <div class="col-md-2" id="idban3">
                                                        <img class="img-responsive" src="../assets/img/userbanner/3.png" onmouseover="showPrev(3)"></div>
                                                    <div class="col-md-2" id="idban4">
                                                        <img class="img-responsive" src="../assets/img/userbanner/4.png" onmouseover="showPrev(4)"></div>
                                                    <div class="col-md-2" id="idban5">
                                                        <img class="img-responsive" src="../assets/img/userbanner/5.png" onmouseover="showPrev(5)"></div>
                                                    <div class="col-md-2" id="idban6">
                                                        <img class="img-responsive" src="../assets/img/userbanner/6.png" onmouseover="showPrev(6)"></div>
                                                    <p id="mensaje"></p>
                                                </div>
                                        </div>
                                    
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
                                            <h1 class="panel-title junction-regular text-center">Welcome administrator <?=$user?>!</h1>
                                    </div>
                                    <div class="panel-body">
                        <div class="col-md-4 text-center">
                            <div class="alert alert-info">
                                <h2 class="panel-title"><i class="fa fa-users"></i> Users
                                  <?php
                                $stmt = $mysqli->prepare("SELECT log FROM usuarios_tb WHERE log < 1");
                                $stmt->execute();  
                                $stmt->store_result();
                                $stmt->bind_result($log);
                                $stmt->fetch();
                                $row_cnt = $stmt->num_rows;
                                if($row_cnt > 0)
                                {
                                    //while($stmt->fetch($log)){}
                                        echo "<span class='label label-success'>There are ".$row_cnt." new users!</span>";
                                }
                                else
                                {
                                    echo "<span class='label label-default'>There are not new users</span>";
                                }
                                ?>
                                </h2><br>
                                  <a href="usuarios.php" class="btn btn-success"><i class="fa fa-list-ul"></i> Go to the users list</a><br>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="alert alert-info">
                                <h2 class="panel-title"><i class="fa fa-book"></i> Courses</h2><br>
                                  <a href="cursos.php" class="btn btn-success"><i class="fa fa-list-ul"></i> Go to the courses list</a><br>
                            </div>
                        </div>
                                    </div></div></div></div>
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
            for (i = 1; i < 7; i++) {
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
//        function savechanges()
//        {
//            var xmlhttp = new XMLHttpRequest();
//            xmlhttp.open("GET", "personalizacion.php?banner="+document.getElementsByTagName("RADIO")[0].getAttribute("value")+"&id="+document.getElementById("userid".value), false;
//            xmlhttp.send(null);
//            //lel
//            document.getElementsById("mensaje").innerHTML=xmlhttp.responseText;
//        }
        </script>
		<?php
            include 'main_js.php';
        ?>
		<!--/#Main js-->
	</body>
</html>