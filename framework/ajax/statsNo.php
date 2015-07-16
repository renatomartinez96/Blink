<?php
if(isset($_POST["le"])) {
  include_once '../../assets/includes/db_conexion.php';
  $nameadvance = "../../courses/".$_POST['le']."/users/";
  $files1 = scandir($nameadvance);
  foreach ($files1 as $key => $value) {
    if ($key != 0 && $key != 1) {
    $user = substr($value,0,-4);
    $stmt2 = $mysqli->prepare("SELECT avatar, usuario FROM  `usuarios_tb` WHERE idusuario = ?");
    $stmt2->bind_param('i',$user);
    $stmt2->execute();
    $stmt2->store_result();
    $stmt2->bind_result($avatar,$nombre);
    while ($stmt2->fetch()) {
        $a = $avatar;
        $n = $nombre;
    }
    echo "<div style='' class='well well-lg col-xs-5'>
      <div class='col-xs-12'><h4>$n</h4></div>
      <div class='col-xs-12'>
        <img style='width:100%;' src='../assets/img/avatares/$a.png'>
      </div>
    </div>";
    }
  }
}

?>
