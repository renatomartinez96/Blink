<?php
    
    if(isset($_POST['resultado'],$_POST['id'])) {
        if($_POST['resultado'] != "") {
            $dom = new DOMDocument();
            $dom->loadHTML($_POST['resultado']);
            $convertedHTML = $dom->saveHTML();
            $file = "../temp/index-".$_POST['id'].".html";
            if(fopen($file, "a+")) {
                file_put_contents($file, $convertedHTML, FILE_APPEND | LOCK_EX);
                
            }
            
        }
    }
?>