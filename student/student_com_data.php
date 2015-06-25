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
            $stmt2 = $mysqli->query("SELECT idleccion, nombre AS lecnombre FROM `leccion` WHERE idcurso = '".$row1['idcur']."'");
            $result1 = $stmt2->num_rows;
            
            if ($result1 > 0) 
            {
                //$infotoprint .= "curid: ".$row1['idcur']." - curnom: ".$row1['curnombre']." - curimg: ".$row1['curimg']." <br>";
                $infotoprint .= "<div class='col-md-4 full'>";
                while($row2 = $stmt2->fetch_assoc())
                {                    
                    $stmt3 = $mysqli->query("SELECT resultado FROM `leccusua` WHERE idLeccion = '".$row2['idleccion']."' AND idUsuario = '".$user."'");
                    $result2 = $stmt3->num_rows;
                    if ($result2 > 0) 
                    {
                        while($row3  = $stmt3->fetch_assoc())
                        {
                            //$infotoprint .= "---> ".$row2['idleccion']." - lecname: ".$row2['lecnombre'].".... nota: ".$row3['resultado']."<br>";
                            $infotoprint .= "";
                            $sumnot = $sumnot + $row3['resultado'];
                        }
                    }
                    $numlec = $numlec + 1;
                }
                
                $notafinal = $sumnot / $numlec;
                if($notafinal >= 7)
                {
                    $infotoprint .= "<img src='../assets/img/pro/".$row1['curimg'].".png' class='img-responsive'>
                                    <p>".$row1['curnombre']."<i class='fa fa-check text-success'></i>
</p>";
                }
                else
                {
                    $infotoprint .= "<img src='../assets/img/pro/".$row1['curimg'].".png' class='img-responsive not-success'>
                                    <p>".$row1['curnombre']."</p>                              
                                    <div class='progress progress progress-striped'>
                                    <div class='progress-bar progress-bar-success' style='width: 40%'></div>
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