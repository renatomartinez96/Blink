<?php 
    include_once '../assets/includes/db_conexion.php';
    include_once '../assets/includes/funciones.php';
    sec_session_start();
    $user = $_SESSION['user_id'];
    $tipo = $_SESSION['tipo'];
    $i = 0;
        $stmt = $mysqli->prepare("SELECT idcurso,nombre,descripcion FROM curso WHERE idprofesor = ?");
        $stmt->bind_param('i', $user);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($idcurso,$nombre,$descripcion);
        while ($stmt->fetch()) {
            echo "<div class='col-xs-4 cursos'><div class='alert alert-dismissible alert-info'>
                    <h1>".$nombre."</h1>
                    <p>".$descripcion."</p>
                    <a id='".$idcurso."' class='btn btn-primary loadLessons'>View lessons</a>
                    <a class='btn btn-danger'><i class='fa fa-trash-o'></i></a>
                    <a class='btn btn-success'><i class='fa fa fa-pencil'></i></a>
                </div></div>";
        }
?>