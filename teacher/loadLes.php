<?php
     if(isset($_POST['idcurso'])){
        include_once '../assets/includes/db_conexion.php';
        include_once '../assets/includes/funciones.php';
        sec_session_start();
        $user = $_SESSION['user_id'];
        $tipo = $_SESSION['tipo'];
        $idCurso = $_POST['idcurso'];
            $stmt = $mysqli->prepare("SELECT idleccion,nombre,descripcion,teoria FROM leccion WHERE idcurso = ?");
            $stmt->bind_param('i', $idCurso);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($idleccion,$nombre,$descripcion,$teoria);
<<<<<<< HEAD
            while ($stmt->fetch()) {
                echo "<div class='col-xs-4 cursos'><div class='alert alert-dismissible alert-info'>
                        <h1>".$nombre."</h1>
                        <p>".$descripcion."</p>
                        <a id='".$idleccion."' class='btn btn-primary loadLessons'>More info</a>
=======
            $string = "<div class='tituloxxx'><h1 class='junction-bold '>CREATED LESSONS</h1></div>";
            while ($stmt->fetch()) {
                $string .=  "<div class='col-xs-4 cursos'><div class='alert alert-dismissible alert-info'>
                        <h1>".$nombre."</h1>
                        <p>".$descripcion."</p>
                        
                        <a id='".$idleccion."' class='btn btn-primary'>More info</a>
>>>>>>> origin/Tutor
                        <a class='btn btn-danger'><i class='fa fa-trash-o'></i></a>
                        <a class='btn btn-success'><i class='fa fa fa-pencil'></i></a>
                    </div></div>";
            }
<<<<<<< HEAD
=======
         echo $string;
>>>>>>> origin/Tutor
     }
?>