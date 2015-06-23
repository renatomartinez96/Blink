<?php
if (isset()) {
$dir = "../users/" . $user . "/img/";
    $dir1 = "../users/" . $user . "/video/";
    function opendire($dir){
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
                        echo "<option/>" . $archivo . "</option>";
                    break;
                }
            }
        }
    }
}
?>