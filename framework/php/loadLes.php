<?php
if(isset($_GET['loadLessons']))
{
  $idCurso = $_GET['loadLessons'];
  $curName = $_GET['curname'];
  $stmt = $mysqli->prepare("SELECT idleccion,nombre,descripcion,teoria, lecEstado FROM leccion WHERE idcurso = ?");
  $stmt->bind_param('i', $idCurso);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($idleccion,$nombre,$descripcion,$teoria, $lecEstado);
  $result = $stmt->num_rows;
  $string = "<div class='tituloxxx'><h1 class='junction-bold '>".$langprint['F-35']." &ldquo;".$curName."&rdquo;</h1></div>";
  $string .= "<div class='col-xs-10'>
                <ul class='breadcrumb'>
                <li class='backhome'><a href='../teacher/'>".$user."</a></li>
                <li class='active'>".$langprint['F-37']."</li>
                </ul>
                </div>
              <div class='col-xs-2'><a id='".$idCurso."' class='btn btn-success botoncrearLe'>".$langprint['F-36']."</a></div></div>";
  if ($result > 0)
  {
    $classtype = "";
    $string .= "<div class='col-xs-12 cursos'><div id='signal'></div>";
    while ($stmt->fetch())
    {
        $stmt2 = $mysqli->prepare("SELECT resultado FROM leccusua WHERE idLeccion = ?");
        $stmt2->bind_param('i', $idleccion);
        $stmt2->execute();
        $stmt2->store_result();
        $stmt2->bind_result($grade);
        $result2 = $stmt2->num_rows;
        $ap = 0;
        $re = 0;

        while ($stmt2->fetch())
        {
            if($grade >= 8)
            {
                $ap = $ap+1;
            }
            elseif($grade < 8)
            {
                $re = $re+1;
            }
        }
          if($lecEstado == 0)
          {
            $classtype = "panel-danger";
          }
          elseif ($lecEstado == 1) {
            $classtype = "panel-info";
          }
          $string .=  "
                        <div class='col-lg-4 col-md-6 full panel ".$classtype."'>
                          <div class='panel-heading'>
                            <h3 class='junction-regular panel-title '>".$nombre."  <span class='label label-success pull-right'>".$ap."</span> <span class='label label-danger pull-right'>".$re."</span></h3>
                          </div>
                          <div class='panel-body'>
                            <p><strong>".$langprint['F-29']." </strong>".$descripcion."</p>
                          </div>
                          <div class='panel-footer text-center'>
                            <a id='".$idleccion."' class='btn btn-primary btn-sm moreabout' actual-id='".$idleccion."' actual-name='".$nombre."' actual-desc='".$descripcion."' actual-teo='".$teoria."'>".$langprint['F-38']."</a>
                            <a class='btn btn-danger btn-sm dropless' actual-id='".$idleccion."' actual-name='".$nombre."' actual-status='".$lecEstado."'><i class='fa fa-times'></i></a>
                            <a class='btn btn-success btn-sm editless' actual-id='".$idleccion."' actual-name='".$nombre."' actual-desc='".$descripcion."' actual-teo='".$teoria."'><i class='fa fa fa-pencil'></i></a>
                             <a href='loadstat.php?l=".$idleccion."' class='btn btn-warning btn-sm' actual-id='".$idleccion."' actual-name='".$nombre."' actual-desc='".$descripcion."' actual-teo='".$teoria."'><i class='fa fa-bar-chart'></i></a>
                          </div>
                        </div>";

    }
    $string .= "</div>";
  }
  else
  {
    // $string .= "<div class='col-xs-12 cursos'>
    //                 <div id='signal'></div>
    //               <div class='alert alert-warning'>
    //                 <p>Este curso no tiene lecciones activas, crea una nueva lección.</p>
    //               </div>
    //             </div>";
  }

  echo $string;
  echo "<div class='modal fade' id='modalLes' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
          <div class='modal-dialog'>
          <div class='modal-content'>
          <div class='modal-header'>
          <h4 class='modal-title' id='myModalLabel'>".$langprint['F-39']."</h4>
          </div>
          <div class='modal-body'>
          <form action='../framework/lesson.php' method='get'>
          <h4".$langprint['F-28']."</h4>
          <input class='form-control nameCur5 verify' name='nombre'  type='text' placeholder='".$langprint['F-28']."'>
          <label class='bugname' style='color:#DA6262;'>You already created a lesson with that name</label>
          <h4>".$langprint['F-29']."</h4>
          <textarea class='form-control descripCur5' name='descrip' placeholder='".$langprint['F-29']."'></textarea>
          <h4>".$langprint['F-22']."</h4>
          <textarea class='form-control TeoCur' name='teoria' placeholder='".$langprint['F-22']."'></textarea>
          </div>
          <div class='modal-footer'>
          <button type='button' class='btn btn-default' data-dismiss='modal'>".$langprint['btn-cancel']."</button>
          <button type='submit' name='createLes' value='".$idCurso."' class='btn btn-primary createLes'>".$langprint['F-36']."</button>
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
else
{
  // echo "<div class='alert alert-warning'>
  //         <p>Este curso no tiene lecciones activas, crea una nueva lección.</p>
  //       </div>";
}
?>
