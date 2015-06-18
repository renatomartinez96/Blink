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
        $string = "<div class=' tituloxxx'><h2 class='junction-bold '>Created courses</h2></div>";
        $string .= "<div class='col-xs-10'>
                        <ul class='breadcrumb'>
                          <li class='active'>Tutor: ".$user."</li>
                        </ul>
                    </div>
                    <div class='col-xs-2'><a class='btn btn-success botoncrear pull-left'><i class='fa fa-plus'></i> New Course</a></div>";
        while ($stmt->fetch()) {
             $string .= "<div class='col-xs-4 cursos'><div class='alert alert-dismissible alert-info'>
                            <h1>".$nombre."</h1>
                            <p>".$descripcion."</p>
                            <form action='../framework/lesson.php' method='post'>
                            <button type='submit'  name='loadLessons' value='".$idcurso."' class='btn btn-primary loadLessons'>View Lessons</button>

                            <a class='btn btn-danger'><i class='fa fa-trash-o'></i></a>
                            <a class='btn btn-success'><i class='fa fa fa-pencil'></i></a>
                            </form>
                        </div>
                    </div>";
        }
        echo $string;
?>