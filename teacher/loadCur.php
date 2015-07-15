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
        $result = $stmt->num_rows;

        $string = "<div class=' tituloxxx'>
                            <h2 class='junction-bold '>Created courses</h2>
                            <div id='signal'></div>
                        </div>";
            $string .= "<ul class='breadcrumb'>
                            <li class='active lead'>Tutor: ".$user."</li>
                            <div class='col-md-3 pull-right'>
                            <a class='btn btn-success pull-left botoncrear'><i class='fa fa-plus'></i> Crear curso</a><a href='bannedCur.php' class='btn btn-primary' data-toggle='tooltip' data-placement='top' title='Cursos bloqueados'><i class='fa fa-briefcase'></i></a>
                            </div>
                        </ul>";

        if($result > 0)
        {
            while ($stmt->fetch())
            {
                $stmt2 = $mysqli->prepare("SELECT COUNT(*) FROM cursoestudiante WHERE idcurso = ?");
                $stmt2->bind_param('i', $idcurso);
                $stmt2->execute();
                $stmt2->store_result();
                $stmt2->bind_result($totaldesus);
                $result2 = $stmt2->num_rows;

                while ($stmt2->fetch())
                {
                $string .= "<div class='col-lg-4 col-md-6 '>
                                <div class='panel panel-info'>
                                    <div class='panel-heading'>
                                        <div class='row'>
                                            <div class='col-md-2 full showhim animation'>
                                                <img src='../assets/img/pro/".$imagen.".png' class='img-responsive pull-right imgo' width='40'>
                                                <a class='btnwithout pull-right showme changetro' style='position:absolute; top:5px; right: 9px; cursor: pointer;' curimgid='".$idcurso."' currentimg='".$imagen."' curimgnombre='".$nombre."'><i class='fa fa-cog fa-2x btnover'></i></a>
                                            </div>
                                            <div class='col-md-10'>
                                                <h4 class='junction-regular text-center'>".$nombre." <span class='label label-primary'>".$totaldesus."</span></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='panel-body curdesc'>
                                    <br>
                                        <p class='text-center'><strong>Descripción: </strong>".$descripcion."</p>
                                    </div>
                                    <div class='panel-footer text-center'>
                                        <form action='../framework/lesson.php' method='get'>
                                            <input type='hidden' value='".$nombre."' name='curname'>
                                            <button type='submit'  name='loadLessons' value='".$idcurso."' class='btn btn-sm btn-primary loadLessons'>View Lessons</button>
                                             <a id='".$idcurso."' curnombre='".$nombre."' class='btn btn-sm btn-danger dropcur' data-toggle='tooltip' data-placement='top' title='¿Bloquear este curso?' data-original-title='Tooltip on top'><i class='fa fa-times'></i></a>
                                            <a class='btn btn-sm btn-success editcur' valid='".$idcurso."' valname='".$nombre."' valdesc='".$descripcion."'><i class='fa fa fa-pencil' data-toggle='tooltip' data-placement='top' title='Editar curso'></i></a>
                                            <a class='btn btn-sm btn-success' href='create-exam.php?id=".$idcurso."' valid='".$idcurso."'><i class='fa fa fa-key' data-toggle='tooltip' data-placement='top' title='Editar curso'></i></a>
                                            <a class='btn btn-sm btn-info' valid='".$idcurso."' href='create-reporte.php?id=".$idcurso."'><i class='fa fa fa-print fa-lg' data-toggle='tooltip' data-placement='top' title='Imprimir reportes'></i></a>
                                        </form>
                                    </div>
                                </div>
                            </div>";
                }
            }
        }
        else
        {
            $string .= "<div class='alert alert-warning'>
                        <p>No tienes ningún curso activo, debes crear uno para empezar</p>
                        </div>";
        }

        echo $string;
?>
