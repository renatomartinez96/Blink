<?php
    if(isset($_GET['createLes'])) {
    $nombre= $_GET['nombre'];
    $descrip = $_GET['descrip'];
    $teoria= $_GET['teoria'];
    $idCurso = $_GET['createLes'];
    $i = 0;
    $stmt = $mysqli->prepare("SELECT idleccion FROM leccion WHERE nombre = ? AND idUsuario = ?");
    $stmt->bind_param('si',$test,$usuario);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($codigo);
        while ($stmt->fetch()) {
            $i++;
        }
        if($nombre != "" && $descrip != "" && $teoria != "" && $idCurso != "" && $i == 0){
         $stmt = $mysqli->prepare("INSERT INTO leccion (idcurso, nombre, descripcion,teoria,idUsuario) VALUES(?, ?, ?,?,?)");
        $stmt->bind_param('isssi', $idCurso,$nombre,$descrip,$teoria,$userid);
        $stmt->execute();
        $stmt = $mysqli->prepare("SELECT idleccion,nombre FROM `leccion`\n"
    . "ORDER BY `leccion`.`idleccion` DESC LIMIT 1");
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($idleccion,$nombree);
        while ($stmt->fetch()) {
            $nombre = "../courses";
            mkdir($nombre."/".$idleccion);
            if(fopen($nombre."/".$idleccion."/".$idleccion.".txt", "a+")) {
                $seguardo = true;
            }
        }
      }else {
        echo "<img src='../assets/img/404.png'></img><br/>";
        echo "<h1></h1>no se gurado";
      }
  }
?>
