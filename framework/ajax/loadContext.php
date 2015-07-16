<?php

    $nameadvance = "../../courses/".$_POST['le']."/users/".$_POST['usu'].".txt";
    $fp = fopen($nameadvance, 'r');
    $datoss = fread($fp,filesize($nameadvance));
    $objetos = explode("S%R#n&SE!r?",$datoss);
    $bloques = "";
    $resultados = "";
    foreach ($objetos as $key => $value) {
        if ($key == 0) {
            $bloques = $value;
        }elseif($key == 1) {
            $resultados = $value;
        }
    }
    echo json_encode(array('B' => $bloques,'R' => $resultados));




 ?>
