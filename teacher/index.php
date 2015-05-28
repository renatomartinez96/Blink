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
    $userid = $_SESSION['user_id'];
    $tipo = $_SESSION['tipo'];
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
			include 'main_css.php';
            include 'main_js.php';
        ?>
        
		<!--/#Core CSS-->

		<!--Custom CSS-->
		<link href="../assets/css/sidebar.css" rel="stylesheet">
		<!--/#Custom CSS-->

	</head>
	<body>
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
                                <h4 class="modal-title junction-bold text-center" id="myModalLabel">Change banner</h4>
                              </div>
                              <div class="modal-body">
                                                <div class="col-md-12" id="bannerchangeb" >
                                                    <img class="img-responsive" src="../assets/img/userbanner/banner_preview.png">
                                                    <p class="text-center"><strong>Preview</strong></p>
                                                </div>
                                                <div class="col-md-12 full">
                                                    <input type="hidden" value="<?=$idusuario?>" name="userid" id="userid" >
                                                    <input type="hidden" value="" name="banselect" id="banselect" >
                                                    <input type="hidden" value="teacher" name="folderloc" id="folderloc" >
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
                                  <br>
                                  <br>
                                  <p class="junction-light text-center">To edit your personal information<a href="my_data.php">Click here</a></p>
                                    
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btn-success" name="b1" id="b1" value="Guardar" disabled>
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
                                            <h1 class="panel-title junction-regular text-center">Welcome teacher <?=$user?>!</h1>
                                    </div>
                                    <div class="panel-body">
                
			     <div class="col-xs-12 results">
            
                </div>
                <div class="col-xs-6 col-xs-offset-3 loading">
                        <i class="fa fa-cog fa-spin fa-5x"></i>
                    </div>
            
                <div class="modal fade" id="modalDesc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Add course</h4>
                      </div>
                      <div class="modal-body">
                          <h4>Nombre:</h4>
                         <input class="form-control nameCur" type="text" placeholder="Name">
                          <h4>Descripción:</h4>
                          <textarea class="form-control descripCur" placeholder="Description"></textarea>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary createCou">New course</button>
                        <button type="button" class="btn btn-primary createCou">New course</button>
                      </div>
                    </div>
                  </div>
                                        </div></div></div></div></div>
           
			<!--/#Page Content -->
		</div>
		<!--Main js-->
		<?php 
			include 'main_js.php';
        
		?>
        <!--Cambiar banner-->
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
	<script>
            
        <?php     
            include 'script.php';
		?>
         loadCursos();
});

        </script>	
	</body>
</html>