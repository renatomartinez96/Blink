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
$avatar = '';
    if ($stmt = $mysqli->prepare("SELECT idusuario, avatar, nombres, apellidos, nacimiento, descripcion, correo, tipo, lang  FROM usuarios_tb WHERE usuario = ?")) 
    {
        $stmt->bind_param('s', $user);
        $stmt->execute(); 
        $stmt->store_result();
        $stmt->bind_result($idusuario, $avatar,$nombres,$apellidos,$nacimiento,$descripcion,$correo,$tipo,$lang);
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
                          <h4>Name:</h4>
                         <input class="form-control nameCur" type="text" placeholder="Name">
                          <h4>Description:</h4>
                          <textarea class="form-control descripCur" placeholder="Description"></textarea>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary createCou">Create course</button>
                      </div>
                    </div>
                  </div>
            </div>
            <!-- IMPRIMIENDO CURSOS -->
            <div class="col-xs-12 full">
                            <div class="col-md-12 full">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                            <h3 class="panel-title">Courses Feed</h3>
                                    </div>
                                    <div class="panel-body transparent">
                                        <!--Cursos-->
                                            <?php
                                                $stmt = $mysqli->query("SELECT curso.idcurso as id, curso.nombre as nombre, curso.descripcion as descr
                                                                        FROM `curso` 
                                                                        WHERE curso.idprofesor = '".$idusuario."'");
                                                $result = $stmt->num_rows;
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
                                                                    <div class='col-lg-4 col-md-6 full'>
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
                                                                            <div class='panel-body full'>";
                                                                while($row1 = $stmt1->fetch_assoc())
                                                                {  
                                                                  echo "<ul class='nav nav-pills nav-stacked full'>
                                                                            <li><a href='../framework/loadlesson.php?l=".$row1['idleccion']."'>".$row1['nombre']."</a></li>
                                                                        </ul>";
                                                                }
                                                              echo "
                                                                            </div>
                                                                            <a href='#'>
                                                                                <div class='panel-footer'>
                                                                                    <span class='pull-left'>View Details</span>
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
                                                                    <div class='col-lg-4 col-md-6 full'>
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
                                                                            <div class='panel-body full'>
                                                                                <div class='alert alert-dismissible alert-danger' style='margin-bottom:0px;'>
                                                                                    <button type='button' class='close' data-dismiss='alert'>x</button>
                                                                                    <strong>no se encontraron lecciones disponibles</strong>
                                                                                </div>
                                                                            </div>
                                                                            <a href='#'>
                                                                                <div class='panel-footer'>
                                                                                    <span class='pull-left'>View Details</span>
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
                                            ?>
                                        <!--/#Cursos-->
                                        
                                    </div>
                                </div>
                            </div>
                            </div>
            <!-- /IMPRIMIENDO CURSOS -->
           
			<!--/#Page Content -->
		</div>
		<!--Main js-->
		<?php 
			include 'main_js.php';
        
		?>
	<script>
            
        <?php     
            include 'script.php';
		?>
         loadCursos();
});

        </script>	
	</body>
    
</html>