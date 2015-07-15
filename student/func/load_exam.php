<!--

Copyright (c) 2015 Blink
All Rights Reserved
 
This product is protected by copyright and distributed under
licenses restricting copying, distribution, and decompilation.

Gerardo López | Iván Graciano | Renato Andres

-->
<meta charset="utf-8">
<?php
    function cargar_examen($id_curso,$lang)
    {
        if($lang == "en")
        {
            $txt = "Question";
            $error = "Test not found";
        }
        elseif($lang == "es")
        {
            $txt = "Pregunta";
            $error = "Examen no encontrado";
        }
        else
        {
            $txt = "Pregunta";
            $error = "Examen no encontrado";
        }
        $file_dir = '../../courses/' . $id_curso . '/test.bl'; 
        $string = "";
        if (file_exists($file_dir)) {
            $recoveredData = file_get_contents($file_dir);
            $array = unserialize($recoveredData);
            $num_ques = count($array);
            for($i = 0; $i < $num_ques; $i++)
            {
                $string .= "<h3 class='text-center'>". $txt . " " . ($i + 1) . "</h3>";
                $string .= "<div class='form-group'>";
                  $string .= "<p>" . $array[$i][0] . "</p>";
                  $string .= "<div class='col-lg-12'>";
                    $string .= "<div class='radio'>";
                      $string .= "<label>";
                        $string .= "<input type='radio' name='" . ($i + 1) . "' value='1'>";
                        $string .= $array[$i][1];
                      $string .= "</label>";
                    $string .= "</div>";
                    $string .= "<div class='radio'>";
                      $string .= "<label>";
                        $string .= "<input type='radio' name='" . ($i + 1) . "' value='2'>";
                        $string .= $array[$i][2];
                      $string .= "</label>";
                    $string .= "</div>";
                    $string .= "<div class='radio'>";
                      $string .= "<label>";
                        $string .= "<input type='radio' name='" . ($i + 1) . "' value='3'>";
                        $string .= $array[$i][3];
                      $string .= "</label>";
                    $string .= "</div>";
                    $string .= "<div class='radio'>";
                      $string .= "<label>";
                        $string .= "<input type='radio' name='" . ($i + 1) . "' value='4'>";
                        $string .= $array[$i][4];
                      $string .= "</label>";
                    $string .= "</div>";
                  $string .= "</div>";
                $string .= "</div>";
            }
        } else {
            $string .= "<h3 class='text-center'>". $error ."</h3>";
        }
        echo $string;
    }
    cargar_examen(4,'es');
?>