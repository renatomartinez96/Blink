<?php 
    include '../assets/includes/db_conexion.php';
    $tipo = $_POST['tipo'];
    $user = $_POST['usuario'];
    $userid = $_POST['usuarioid'];
    $i = 0;
        $stmt = $mysqli->prepare("SELECT idcurso, nombre, descripcion, imagen FROM curso WHERE idprofesor = ? AND curEstado = '1'");
        $stmt->bind_param('i', $userid);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($idcurso,$nombre,$descripcion, $imagen);
        $string = "<div class=' tituloxxx'>
                        <h2 class='junction-bold '>Created courses</h2>
                        <div id='signal'></div>
                    </div>";
        $string .= "<div class='col-md-9'>
                        <ul class='breadcrumb'>
                          <li class='active lead'>Tutor: ".$user."</li>
                        </ul>
                    </div>
                    <div class='col-md-3'>
                        <a class='btn btn-success pull-left botoncrear'><i class='fa fa-plus'></i> Crear curso</a><a href='bannedCur.php' class='btn btn-primary' data-toggle='tooltip' data-placement='top' title='Cursos bloqueados'><i class='fa fa-briefcase'></i></a>
                    </div>";
        while ($stmt->fetch()) 
        {
            $string .= "<div class='col-lg-4 col-md-6 '>
                            <div class='panel panel-info'>
                                <div class='panel-heading'>
                                    <div class='row'>
                                        <div class='col-md-2 full'>
                                            <img src='../assets/img/pro/".$imagen.".png' class='img-responsive pull-right' width='40'>
                                        </div>
                                        <div class='col-md-10'>
                                            <h4 class='junction-regular text-center'>".$nombre."</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class='panel-body full curdesc'>
                                <br>
                                    <p class='junction-light text-center'>".$descripcion."</p>
                                </div>
                                <div class='panel-footer text-center'>
                                    <form action='../framework/lesson.php' method='post'>
                                        <button type='submit'  name='loadLessons' value='".$idcurso."' class='btn btn-sm btn-primary loadLessons'>View Lessons</button>
                                         <a id='".$idcurso."' curnombre='".$nombre."' class='btn btn-sm btn-danger dropcur' data-toggle='tooltip' data-placement='top' title='¿Bloquear este curso?' data-original-title='Tooltip on top'><i class='fa fa-times'></i></a>
                                        <a class='btn btn-sm btn-success editcur' valid='".$idcurso."' valname='".$nombre."' valdesc='".$descripcion."'><i class='fa fa fa-pencil' data-toggle='tooltip' data-placement='top' title='Editar curso'></i></a>
                                        <a class='btn btn-sm btn-info' valid='".$idcurso."' valname='".$nombre."' valdesc='".$descripcion."'><i class='fa fa fa-print fa-lg' data-toggle='tooltip' data-placement='top' title='Imprimir reportes'></i></a>
                                    </form>
                                       
                                 
                                </div>
                            </div>
                        </div>";
        }
        echo $string;
?>