<?php 
    if(isset($_POST['description'],$_POST['leccion'],$_POST['resultado'],$_POST['bloques'],$_POST['curso'],$_POST['momento'])) {
        $nombre = "../../courses/".$_POST['curso']."/".$_POST['leccion'].".txt";
            $data = $_POST['momento']."^^^".$_POST['description']."^^^".$_POST['bloques']."^^^".$_POST['resultado']."$$$";
            file_put_contents($nombre, $data, FILE_APPEND | LOCK_EX);
//            $fp = fopen($nombre, 'w');
//            fwrite($fp, utf8_decode($data));
//            fclose($fp);
//            chmod($nombre, 0777);
    }
?>