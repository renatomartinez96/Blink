<?php

$stmt1 = $mysqli->query("SELECT curso.idcurso AS idcur, curso.nombre AS curnombre, curso.imagen AS curimg FROM `curso` 
INNER JOIN `cursoestudiante` ON cursoestudiante.idcurso = curso.idcurso WHERE cursoestudiante.idestudiante = '".$idusr."'");
$infotoprint = "";
$numlec = 0;
$sumnot = 0;
$notafinal = 0;
if($result = $stmt1->num_rows)
{
    if ($result > 0) 
    {
        while($row1 = $stmt1->fetch_assoc())
        {
            $stmt2 = $mysqli->query("SELECT `leccion`.idleccion AS lecid, `leccion`.nombre AS lecnombre, `leccusua`.resultado FROM `leccion` INNER JOIN `leccusua` ON `leccion`.idleccion = `leccusua`.idLeccion WHERE `leccion`.idcurso = '".$row1['idcur']."' AND `leccusua`.idUsuario = '".$idusr."'");
            $result1 = $stmt2->num_rows;
            
            if ($result1 > 0) 
            {
                $infotoprint .= "<div class='col-md-4 full'>";
                while($row2 = $stmt2->fetch_assoc())
                {
                    $sumnot = $sumnot + $row2['resultado'];
                    $numlec = $numlec + 1;
                }
                $notafinal = $sumnot / $numlec;
                $laotra = $notafinal * 10;
                if($notafinal >= 8)
                {
                    $infotoprint .= "<img src='../assets/img/pro/".$row1['curimg'].".png' class='img-responsive'>
                                    <p class='text-center'>".$row1['curnombre']."<i class='fa fa-check text-success'></i>
</p>";
                }
                else
                {
                    $infotoprint .= "<img src='../assets/img/pro/".$row1['curimg'].".png' class='img-responsive not-success'>
                                    <p class='text-center'>".$row1['curnombre']."</p>                              
                                    <div class='progress progress progress-striped active mrwhite'>
                                    <div class='progress-bar progress-bar-success' style='width: ".$laotra."%'></div>
                                    </div>";
                }
                $infotoprint .= "</div>";
            }
            else
            {
                $infotoprint = "<div class='alert alert-danger'>
                                    <p>Este usuario no ha completado ninguna lección todavía</p>
                                </div>";
            }
        }
    }
    else
    {
        $infotoprint = "<div class='alert alert-danger'>
                            <p>Este usuario todavía no se ha inscrito a ningún curso</p>
                        </div>";
    }
}
else
{
    $infotoprint = "<div class='alert alert-danger'>
                        <p>No se encontraron cursos</p>
                    </div>";
}
echo $infotoprint;
//echo "numlec ".$numlec."<br>";
//$notafinal = $sumnot / $numlec;
//$asaber = "";
//if($notafinal >= 7)
//{
//   $asaber = "aprobado";
//}
//else
//{
//    $asaber = "reprobado";
//}
//echo "nota: ". $notafinal;
?>