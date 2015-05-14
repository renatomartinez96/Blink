<?php
include_once '../../assets/includes/db_conexion.php';
if(isset($_POST['action']) && $_POST['action'] == 1) {
    $date = new DateTime();
    echo json_encode(array("horaServ"=>$date));
}
if(isset($_POST['action'],$_POST['hora']) && $_POST['action'] == 2) {
    $dateFinish = new DateTime();
    $fechaInicio = new DateTime($_POST['hora']);
    $resta = $fechaInicio->diff($dateFinish)->format("%h horas, %i minutos y %s segundos");
     $stmt = $mysqli->prepare("SELECT leccion-usuario.codigo FROM leccion-usuario INNER JOIN leccion ON leccion-usuario.idLecc=leccion.idleccion INNER JOIN curso ON leccion.idcurso=curso.idcurso INNER JOIN usuarios_tb ON curso.idprofesor=usuarios_tb.idusuario");
            $stmt->bind_param('i', $idCurso);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result();
            
            while ($stmt->fetch()) {
               
            }
    echo json_encode(array("salio"=>$resta));
    
}
?>