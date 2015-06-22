<?php 
    include '../assets/includes/db_conexion.php';
    $tipo = $_POST['tipo'];
    $user = $_POST['usuario'];
    $userid = $_POST['usuarioid'];
    $i = 0;
        $stmt = $mysqli->prepare("SELECT idcurso,nombre,descripcion FROM curso WHERE idprofesor = ?");
        $stmt->bind_param('i', $userid);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($idcurso,$nombre,$descripcion);
        $string = "<div class=' tituloxxx'>
                        <h2 class='junction-bold '>Created courses</h2>
                        <p>Los cursos activos aparecen aquí, para ver los cursos que bloqueaste ve <a href='bannedCur.php'>aquí</a>.</p>
                        <div id='asdfgh'></div>
                    </div>";
        $string .= "<div class='col-xs-10'>
                        <ul class='breadcrumb'>
                          <li class='active lead'>Tutor: ".$user."</li>
                        </ul>
                    </div>
                    <div class='col-xs-2'>
                        <a class='btn btn-success pull-left botoncrear'><i class='fa fa-plus'></i> Crear curso</a>
                    </div>";
        while ($stmt->fetch()) 
        {
            $string .= "<div class='col-lg-4 col-md-6 '>
                            <div class='panel panel-info'>
                                <div class='panel-heading'>
                                        <h3 class='junction-regular text-center'>".$nombre."</h3>
                                </div>
                                <div class='panel-body full'>
                                    <p class='junction-light text-center'>".$descripcion."</p>
                                </div>
                                <div class='panel-footer text-center'>
                                    <form action='../framework/lesson.php' method='post'>
                                        <button type='submit'  name='loadLessons' value='".$idcurso."' class='btn btn-sm btn-primary loadLessons'>View Lessons</button>
                                         <a id='".$idcurso."' curnombre='".$nombre."' class='btn btn-sm btn-danger dropcur' data-toggle='tooltip' data-placement='top' title='¿Bloquear este curso?' data-original-title='Tooltip on top'><i class='fa fa-times'></i></a>
                                        <a class='btn btn-sm btn-success editcur' valid='".$idcurso."' valname='".$nombre."' valdesc='".$descripcion."'><i class='fa fa fa-pencil'></i></a>
                                    </form>
                                       
                                 
                                </div>
                            </div>
                        </div>";
        }
        echo $string;
?>