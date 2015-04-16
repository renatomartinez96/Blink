<?php
     if(isset($_POST['loadLessons'])){
        $idCurso = $_POST['loadLessons'];
            $stmt = $mysqli->prepare("SELECT idleccion,nombre,descripcion,teoria FROM leccion WHERE idcurso = ?");
            $stmt->bind_param('i', $idCurso);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($idleccion,$nombre,$descripcion,$teoria);
            
         $string = "<div class='tituloxxx'><h1 class='junction-bold '>LECCIONES CREADAS</h1></div>";
            $string .= "<div class='col-xs-11'>
                    <ul class='breadcrumb'>
                      <li class='backhome'><a href='../teacher/'>".$user."</a></li>
                      <li class='active'>lección</li>
                    </ul>
                </div>
                <div class='col-xs-1'><a id='".$idCurso."' class='btn btn-success botoncrearLe'>Nueva lección</a></div>";
            
            while ($stmt->fetch()) {
                $string .=  "<div class='col-xs-12 cursos'><div class='alert alert-dismissible alert-info'>
                        <h1>".$nombre."</h1>
                        <p>".$descripcion."</p>
                        
                        <a id='".$idleccion."' class='btn btn-primary'>Mas info</a>
                        <a class='btn btn-danger'><i class='fa fa-trash-o'></i></a>
                        <a class='btn btn-success'><i class='fa fa fa-pencil'></i></a>
                    </div></div>";
            }
         echo $string;
         echo "<div class='modal fade' id='modalLes' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                  <div class='modal-dialog'>
                    <div class='modal-content'>
                      <div class='modal-header'>
                        <h4 class='modal-title' id='myModalLabel'>Agregar lección</h4>
                      </div>
                      <div class='modal-body'>
                          <form action='../framework/lesson.php' method='post'>
                          <h4>Name:</h4>
                         <input class='form-control nameCur5' name='nombre'  type='text' placeholder='Nombre'>
                          <h4>Description:</h4>
                          <textarea class='form-control descripCur5' name='descrip' placeholder='Descripción'></textarea>
                          <h4>Theoretical introduction:</h4>
                          <textarea class='form-control TeoCur' name='teoria' placeholder='Introducción Teórica'></textarea>
                      </div>
                      <div class='modal-footer'>
                        <button type='submit' name='createLes' value='".$idCurso."' class='btn btn-primary createLes'>Crear lección</button>
                      </div>
                        </form>
                    </div>
                  </div>
            </div>";
         echo "<script>$('.botoncrearLe').click(function() {
            $('#modalLes').modal('toggle');
         });
        </script>";
     }
?>