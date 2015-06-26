<?php

    include_once '../assets/includes/db_conexion.php';
    include_once '../assets/includes/funciones.php';
    $user = 18;

$stmt1 = $mysqli->query("SELECT curso.idcurso AS idcur, curso.nombre AS curnombre, curso.imagen AS curimg FROM `curso` 
INNER JOIN `cursoestudiante` ON cursoestudiante.idcurso = curso.idcurso WHERE cursoestudiante.idestudiante = '".$user."'");
$infotoprint = "";
$numlec = 0;
$sumnot = 0;
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
                $infotoprint .= "curid: ".$row1['idcur']." - curnom: ".$row1['curnombre']." - curimg: ".$row1['curimg']." <br>";
                
                while($row2 = $stmt2->fetch_assoc())
                {
                    //$infotoprint .= "nn ".$row2['idleccion']." - lecname: ".$row2['lecnombre']."<br>"; //solo lecciones
                    
                    $stmt3 = $mysqli->query("SELECT resultado FROM `leccusua` WHERE idLeccion = '".$row2['idleccion']."' AND idUsuario = '".$user."'");
                    $result2 = $stmt3->num_rows;
                    if ($result2 > 0) 
                    {
                        while($row3  = $stmt3->fetch_assoc())
                        {
                            $infotoprint .= "---> ".$row2['idleccion']." - lecname: ".$row2['lecnombre'].".... nota: ".$row3['resultado']."<br>";
                            $sumnot = $sumnot + $row3['resultado'];
                        }
                    }
                    $numlec = $numlec + 1;
                }
            }
            else
            {
                $infotoprint = "no lec in cur";
            }
        }
    }
    else
    {
        $infotoprint = "no cur";
    }
}
else
{
    $infotoprint = "asdas";
}
echo $user."<br>";
echo $infotoprint;
echo "numlec ".$numlec."<br>";
$notafinal = $sumnot / $numlec;
$asaber = "";
if($notafinal >= 7)
{
   $asaber = "aprobado";
}
else
{
    $asaber = "reprobado";
}
echo "nota: ". $notafinal." - ".$asaber;
?>