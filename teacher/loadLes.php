<?php
     if(isset($_POST['idcurso'])){
        include_once '../assets/includes/db_conexion.php';
        $tipo = $_POST['tipo'];
        $user = $_POST['usuario'];
        $userid = $_POST['usuarioid'];
        $idCurso = $_POST['idcurso'];
            $stmt = $mysqli->prepare("SELECT idleccion,nombre,descripcion,teoria FROM leccion WHERE idcurso = ?");
            $stmt->bind_param('i', $idCurso);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($idleccion,$nombre,$descripcion,$teoria);
         $string = "<div class='tituloxxx'><h1 class='junction-bold '>CREATED LESSONS</h1></div>";
            $string .= "<div class='col-xs-11'>
                    <ul class='breadcrumb'>
                      <li class='backhome'><a>".$user."</a></li>
                      <li class='active'>lessons</li>
                    </ul>
                </div>
                <div class='col-xs-1'><a class='btn btn-success botoncrear'>New lesson</a></div>";
            
            while ($stmt->fetch()) {
                $string .=  "<div class='col-xs-12 cursos'><div class='alert alert-dismissible alert-info'>
                        <h1>".$nombre."</h1>
                        <p>".$descripcion."</p>
                        
                        <a id='".$idleccion."' class='btn btn-primary'>More info</a>
                        <a class='btn btn-danger'><i class='fa fa-trash-o'></i></a>
                        <a class='btn btn-success'><i class='fa fa fa-pencil'></i></a>
                    </div></div>";
            }
         echo $string;
     }
?>