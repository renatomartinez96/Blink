<?php
function verify($test,$usuario)
{
  include_once '../../assets/includes/db_conexion.php';
  $i = 0;
  $stmt = $mysqli->prepare("SELECT idleccion FROM leccion WHERE nombre = ? AND idUsuario = ?");
  $stmt->bind_param('si',$test,$usuario);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($codigo);
      while ($stmt->fetch()) {
          $i++;
      }
  return $i;
}
if (isset($_POST["n"])) {
  echo verify($_POST["n"],$_POST["u"]);
}

?>
