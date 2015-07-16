<?php
if(isset($_POST["le"])) {
  include_once '../../assets/includes/db_conexion.php';
  $i = 0;
  $stmt = $mysqli->prepare("SELECT * FROM  `leccusua` WHERE idLeccion = ?");
  $stmt->bind_param('i',$_POST["le"]);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($c,$u,$l,$r,$i,$f,$t);
    while ($stmt->fetch()) {
      $stmt2 = $mysqli->prepare("SELECT avatar, usuario FROM  `usuarios_tb` WHERE idusuario = ?");
      $stmt2->bind_param('i',$u);
      $stmt2->execute();
      $stmt2->store_result();
      $stmt2->bind_result($avatar,$nombre);
      while ($stmt2->fetch()) {
          $a = $avatar;
          $n = $nombre;
      }
      echo "<div style='' class='well well-lg col-xs-5'>
        <div class='col-xs-12'><h4>$n</h4></div>
        <div class='col-xs-7'>
          <img style='width:100%;' src='../assets/img/avatares/$a.png'>
        </div>
        <div class='col-xs-5'>
          <h6>$t</h6>
          <h2>$r</h2>
        </div>
      </div>";
    }
}

?>
