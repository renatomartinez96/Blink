<?php
    $nombre = "../users/".$_POST['usuario']."/index.html";
    if (isset($_POST['codigo'])) 
    {
        echo $_POST['codigo'];
        $data = $_POST['codigo'];
        $fp = fopen($nombre, 'w');
        fwrite($fp, utf8_decode($data));
        fclose($fp);
        chmod($nombre, 0777);
    }
    else 
    {
        echo "<script>alert('no se logro guardar el documento')</script>";
    }
?>