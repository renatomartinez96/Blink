<?php
include_once '../../assets/includes/db_conexion.php';
if(isset($_POST['action']) && $_POST['action'] == 1) {
    $date = new DateTime();
    echo json_encode(array("horaServ"=>$date));
}
if(isset($_POST['action'],$_POST['hora'],$_POST['leccion'],$_POST['usuario']) && $_POST['action'] == 2) {
    $i = 0;
    $ii = 0;
    $iii = 0;
    $nota = 10;
    $dateFinish = new DateTime();
    $dateFinishString = $dateFinish->format("Y-m-d H:i:s");
    $fechaInicio = new DateTime($_POST['hora']);
    $resta = $fechaInicio->diff($dateFinish)->format("%h:%i:%s");
    $stmt = $mysqli->prepare("SELECT codigo FROM `leccusua` WHERE idLeccion = ?");
    $stmt->bind_param('i',$_POST['leccion']);
        $stmt->execute();
        $stmt->store_result();
         $stmt->bind_result($codigo);
        while ($stmt->fetch()) {
                $i++;
            }
        if($i > 0) {
            $stmt = $mysqli->prepare("SELECT codigo FROM `leccusua` WHERE idleccion = ? && idUsuario = ?");
                $stmt->bind_param('ii',$_POST['leccion'],$_POST['usuario']);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($codigo);
                    while ($stmt->fetch()) {
                        $iii++;
                    }
                if($iii > 0) {
                    $stmt = $mysqli->prepare("UPDATE `blink_db`.`leccusua` SET `resultado` = ?, `inicio` = ?, `fin` = ?, `tiempo` = ? WHERE idleccion = ? && idUsuario = ?");
                    $stmt->bind_param('dsssii',$nota,$_POST['hora'],$dateFinishString,$resta,$_POST['leccion'],$_POST['usuario']);
                    $stmt->execute();
                }else {
                    $stmt = $mysqli->prepare("INSERT INTO `blink_db`.`leccusua` ( `idUsuario`, `idLeccion`, `resultado`, `inicio`, `fin`, `tiempo`) VALUES (?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param('iidsss',$_POST['usuario'],$_POST['leccion'],$nota,$_POST['hora'],$dateFinishString,$resta);
                    $stmt->execute();
                }
                echo $fechaInicio->diff($dateFinish)->format("%i:%s");;
                
        }else {
                $stmt = $mysqli->prepare("SELECT idleccion FROM `leccion` WHERE idleccion = ? && idUsuario = ?");
                $stmt->bind_param('ii',$_POST['leccion'],$_POST['usuario']);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($idleccion);
            while ($stmt->fetch()) {
                    $ii++;
                }
                if($ii > 0) {
                    $stmt = $mysqli->prepare("INSERT INTO `blink_db`.`leccusua` ( `idUsuario`, `idLeccion`, `resultado`, `inicio`, `fin`, `tiempo`) VALUES (?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param('iidsss',$_POST['usuario'],$_POST['leccion'],$nota,$_POST['hora'],$dateFinishString,$resta);
                    $stmt->execute();
                }else {
                    echo "la leccion no ha sido activada";
                }
        }
}
?>