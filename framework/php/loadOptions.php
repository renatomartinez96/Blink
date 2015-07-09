<?php
$dir = "../users/" . $user . "/img/";
    $dirD = "../users/" . $user . "/video/";
    $NoRealtivoDos = "http://localhost/blink/users/" . $user . "/img/";
    $NoRealtivo = "http://localhost/blink/users/" . $user . "/video/";
    function opendire($dir,$NoRealtivoDos){
        $directorio = opendir($dir); //ruta actual
        while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
        {
            if (!is_dir($archivo))
            {
                switch(substr($archivo,-4))
                {
                    case ".mp4":
                    case ".jpg":
                    case ".png":
                    case ".gif":
                    case "webm":
                    case ".ogg":
                    case ".JPG":
                    case "JPEG":
                    case "jpeg":
                        echo "<option value='".$NoRealtivoDos.$archivo."' data-imagesrc='".$dir.$archivo."' data-description='$archivo'></option>";
                    break;
                }
            }
        }
    }
    function opendireD($dir,$NoRealtivo){
        $directorio = opendir($dir); //ruta actual
        while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
        {
            if (!is_dir($archivo))
            {
                $thumname = substr($archivo,0,6).".gif";
                switch(substr($archivo,-4))
                {
                    case ".mp4":
                    case ".jpg":
                    case ".png":
                    case ".gif":
                    case "webm":
                    case ".ogg":
                    case ".JPG":
                    case "JPEG":
                    case "jpeg":
                        echo "<option value='".$NoRealtivo.$archivo."' data-imagesrc='".$dir."/thumbs/".$thumname."' data-description='$archivo'></option>";
                    break;
                }
            }
        }
    }
?>
