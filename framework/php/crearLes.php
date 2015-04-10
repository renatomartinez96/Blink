<?php 
    if(isset($_POST['createLes'])) {
    
    $nombre= $_POST['nombre'];
    $descrip = $_POST['descrip'];
    $teoria= $_POST['teoria'];
    $idCurso = $_POST['createLes'];
         $stmt = $mysqli->prepare("INSERT INTO leccion (idcurso, nombre, descripcion,teoria) VALUES(?, ?, ?,?)");
        $stmt->bind_param('isss', $idCurso,$nombre,$descrip,$teoria);
        $stmt->execute();
        $stmt = $mysqli->prepare("SELECT idleccion,nombre FROM `leccion`\n"
    . "ORDER BY `leccion`.`idleccion` DESC LIMIT 1");
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($idleccion,$nombree);
        while ($stmt->fetch()) {
            $nombre = "../courses";
            if(fopen($nombre."/".$idleccion.".txt", "a+")) {
                $seguardo = true;
            }
        }
    }
?>