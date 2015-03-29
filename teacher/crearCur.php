<?php 
    include '../assets/includes/db_conexion.php';
    $tipo = $_POST['tipo'];
    $user = $_POST['usuario'];
    $userid = $_POST['usuarioid'];
    $nombre= $_POST['nombre'];
    $descrip = $_POST['descrip'];

        $stmt = $mysqli->prepare("INSERT INTO curso (idprofesor, nombre, descripcion) VALUES(?, ?, ?)");
        $stmt->bind_param('iss', $userid,$nombre,$descrip);
        $stmt->execute();
        $stmt = $mysqli->prepare("SELECT idcurso FROM `curso`\n"
    . "ORDER BY `curso`.`idcurso` DESC LIMIT 1");
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($idcurso);
        while ($stmt->fetch()) {
            $nombre = "../courses/".$idcurso;
            if(!mkdir($nombre, 0777, true)) {
                die('Fallo al crear las carpetas...');
            }
        }
?>