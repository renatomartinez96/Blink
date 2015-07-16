<?php

    if(isset($_POST['resultado'],$_POST['bloques'],$_POST['id']) && $_POST['action'] == 0) {
        if($_POST['resultado'] != "") {
            $data = $_POST['bloques']."S%R#n&SE!r?".$_POST['resultado'];
            $file = "../temp/index-".$_POST['id'].".tblk";
            if(fopen($file, "a+")) {
                file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

            }

        }
    }
?>
