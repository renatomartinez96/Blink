<?php
include_once '../assets/includes/db_conexion.php';
include_once '../assets/includes/funciones.php';
sec_session_start();

$lel =1;

$titleto = array();
$descto = array();
$teoto = array();

$query = "SELECT leccion.nombre, leccion.descripcion, leccion.teoria FROM leccion WHERE idcurso = $lel";

if ($resultado = $mysqli->query($query)) 
{
    $count = mysqli_num_rows($resultado);
    //$x = 0;
    while ($fila = $resultado->fetch_row()) 
    {
        array_push($titleto, $fila[0]);  
        array_push($descto, $fila[1]);
        array_push($teoto, $fila[2]);
    }
}

$x=0;
for($x; $x < $count; $x++)
{
    echo $titleto[$x]."<br>". $descto[$x] ."<br>". $teoto[$x]."<br><strong>laaaaaaaaaaaaaaaaal</strong><br>";
}
?>