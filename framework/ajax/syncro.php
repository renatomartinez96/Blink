<?php
    
    if(isset($_POST['description'],$_POST['leccion'],$_POST['resultado'],$_POST['bloques'],$_POST['curso'],$_POST['momento'])) {
            $nombre = "../../courses/".$_POST['leccion'].".txt";
            $dom = new DOMDocument();
            $dom->loadHTML($_POST['bloques']);
            $dom->removeChild($dom->doctype);
                $dom->replaceChild($dom->firstChild->firstChild->firstChild, $dom->firstChild);
            foreach ($dom->getElementsByTagName('div') as $item) {
                //substr($dom->saveXML($dom->getElementsByTagName('div')->item(0)), 5, -6)
                $item->setAttribute('id', 'TTT');
                
                $convertedHTML = $dom->saveHTML();
            }
            $data = $_POST['momento']."^^^".$_POST['description']."^^^".$convertedHTML."^^^".$_POST['resultado']."$$$";
            file_put_contents($nombre, $data, FILE_APPEND | LOCK_EX);
    }
?>