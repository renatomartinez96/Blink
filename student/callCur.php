<div style="margin-top:15px;">
<!--Cursos-->
<?php
$numlec = 0;
$sumnot = 0;
$notafinal = 0;

$stmt1 = $mysqli->query("SELECT curso.idcurso AS idcur, curso.nombre AS curnombre, curso.imagen AS curimg, curso.descripcion AS cursdesc, usuarios_tb.usuario AS aut, usuarios_tb.avatar AS autav FROM `curso` 
INNER JOIN `cursoestudiante` ON cursoestudiante.idcurso = curso.idcurso INNER JOIN usuarios_tb ON curso.idprofesor = usuarios_tb.idusuario WHERE cursoestudiante.idestudiante = '".$idusuario."'");
$infotoprint = "";

if($result = $stmt1->num_rows)
{
    if ($result > 0) 
    {
        while($row1 = $stmt1->fetch_assoc())
        {
            $infotoprint .= "<div class='col-lg-4 col-md-6'>
                                <div class='panel panel-info'>
                                    <div class='panel-heading'>
                                        <div class='row'>
                                        <div id='asdf'>
                                        </div>
                                            <div class='col-xs-2 full'>
                                                <img src='../assets/img/pro/".$row1['curimg'].".png' class='img-responsive pull-right not-success' width='40'>
                                            </div>
                                            <div class='col-xs-8'>
                                                <h4 class='junction-regular text-center'>".$row1['curnombre']."</h4>
                                            </div>
                                            <div class='col-xs-2 pull-left '>
                                                <button class='btn-data displayinfo' curid='".$row1['idcur']."' cursdesc='".$row1['cursdesc']."' cursname='".$row1['curnombre']."' aut='".$row1['aut']."' autav='".$row1['autav']."' cursimg='".$row1['curimg']."'><i class='fa fa-info-circle fa-lg'></i></button>
                                            </div>
                                        </div>
                                </div>
                                <div class='panel-body full course'>
                                    <div class='list-group lecciones'>";
            
            $stmt2 = $mysqli->query("SELECT `leccion`.idleccion AS lecid, `leccion`.nombre AS lecnombre, `leccusua`.resultado FROM `leccion` INNER JOIN `leccusua` ON `leccion`.idleccion = `leccusua`.idLeccion WHERE `leccion`.idcurso = '".$row1['idcur']."' AND `leccusua`.idUsuario = '".$idusuario."'");
            $result1 = $stmt2->num_rows;
            
            if ($result1 > 0) 
            {
                while($row2 = $stmt2->fetch_assoc())
                {
                    //$sumnot = $sumnot + $row2['resultado'];
                    //$numlec = $numlec + 1;
                    if($row2["resultado"] > 8)
                    {
                        $infotoprint .= "<a class='list-group-item' href='../framework/loadlesson.php?l=".$row2['lecid']."'><i class='fa fa-check text-success'></i> ".$row2['lecnombre']."</a>";
                    }
                    else
                    {
                        $infotoprint .= "<a class='list-group-item' href='../framework/loadlesson.php?l=".$row2['lecid']."'><i class='fa fa-exclamation-triangle text-warning'></i> ".$row2['lecnombre']."</a>";
                    }
                }
//                $notafinal = $sumnot / $numlec;
//                $laotra = $notafinal * 10;
//                if($notafinal >= 8)
//                {
//                    $infotoprint .= "<img src='../assets/img/pro/".$row1['curimg'].".png' class='img-responsive'>
//                                    <p class='text-center'>".$row1['curnombre']."<i class='fa fa-check text-success'></i>
//</p>";
//                }
//                else
//                {
//                    $infotoprint .= "<div class='col-xs-12 full imagenes'>
//                                        <img src='../assets/img/pro/".$row1['curimg'].".png' class='img-responsive not-success' style='display:block;max-width:100%;'>
//                                        <div class='mask'>
//                                            <h1 class='junction-regular'>".$laotra."%</h1>
//                                        </div>
//                                    </div>
//                                    <p class='text-center'>".$row1['curnombre']."</p>                              
//                                    <div class='progress progress progress-striped active mrwhite'>
//                                    <div class='progress-bar progress-bar-success' style='width: ".$laotra."%'></div>
//                                    </div>";
//                }
            }
            else
            {
                $stmt3 = $mysqli->query("SELECT `leccion`.idleccion AS lecid, `leccion`.nombre AS lecnombre FROM `leccion` WHERE `leccion`.idcurso = '".$row1['idcur']."'");
                $result2 = $stmt3->num_rows;
                if($result2 > 0)
                {
                    while($row3 = $stmt3->fetch_assoc())
                    {
                        $infotoprint .= "<a class='list-group-item' href='../framework/loadlesson.php?l=".$row3['lecid']."'><i class='fa fa-exclamation-triangle text-warning'></i> ".$row3['lecnombre']."</a>";
                    }
                    
                }
                else
                {
                    $infotoprint .= "<div class='alert alert-danger'>
                    <p>Este curso todavía no tiene lecciones</p>
                    </div>";                    
                }
                
            }
            $infotoprint .= "</div>
                                </div>
                            </div>
                        </div>";
        }
    }
    else
    {
        $infotoprint = "<div class='alert alert-danger'>
                            <p>¡No estas inscrito en ningún curso! <a href='teachers.php' class='alert-link'>Mira el listado de profesores y suscribete a uno ñ</p>
                        </div>";
    }
}
else
{
    $infotoprint = "<div class='alert alert-danger'>
                        <p>¡No estas inscrito en ningún curso! <a href='teachers.php' class='alert-link'>Mira el listado de profesores y suscribete a uno</a></p>
                    </div>";
}
echo $infotoprint;
?>
<!--/#Cursos-->
</div>