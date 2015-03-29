<?php 
    include '../assets/includes/db_conexion.php';
    $tipo = $_POST['tipo'];
    $user = $_POST['usuario'];
    $userid = $_POST['usuarioid'];
    $nombre= $_POST['nombre'];
    $descrip = $_POST['descrip'];
    $teoria= $_POST['teoria'];
    $idCurso = $_POST['idcurso'];

         $stmt = $mysqli->prepare("INSERT INTO leccion (idcurso, nombre, descripcion,teoria) VALUES(?, ?, ?,?)");
        $stmt->bind_param('isss', $idCurso,$nombre,$descrip,$teoria);
        $stmt->execute();
        $stmt = $mysqli->prepare("SELECT idleccion FROM `leccion`\n"
    . "ORDER BY `leccion`.`idleccion` DESC LIMIT 1");
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($idleccion);
        while ($stmt->fetch()) {
            $nombre = "../courses/".$idCurso;
            fopen($nombre."/".$idleccion.".txt", "a+");
        }
?>