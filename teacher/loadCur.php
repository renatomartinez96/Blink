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
        $string = "<div class=' tituloxxx'><h1 class='junction-bold '>CREATED COURSES</h1></div>";
        $string .= "<div class='col-xs-11'>
                    <ul class='breadcrumb'>
                      <li class='active'>".$user."</li>
                      
                    </ul>
                </div>
                <div class='col-xs-1'><a class='btn btn-success botoncrear'>Create course</a></div>";
        while ($stmt->fetch()) {
             $string .= "<div class='col-xs-4 cursos'><div class='panel-heading'>
                                                                                <div class='row'>
                                                                                    <div class='col-xs-3'>
                                                                                        <i class='fa fa-trophy fa-5x'></i>
                                                                                    </div>
                                                                                    <div class='col-xs-9 text-right'>
                                                                                        <div><h2>".$nombre."</h2></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class='panel-body full'>
                                                                                <ul class='nav nav-pills nav-stacked full'>
                                                                            <li>
                    <form action='../framework/lesson.php' method='post'>
                    <button type='submit'  name='loadLessons' value='".$idcurso."' class='btn btn-primary loadLessons'>View lessons</button>
                   
                    <a class='btn btn-danger'><i class='fa fa-trash-o'></i></a>
                    <a class='btn btn-success'><i class='fa fa fa-pencil'></i></a>
                     </form></li></ul></div>
                </div></div>";
        }
        echo $string;
?>