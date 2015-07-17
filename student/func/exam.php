<!--

Copyright (c) 2015 Blink
All Rights Reserved
 
This product is protected by copyright and distributed under
licenses restricting copying, distribution, and decompilation.

Gerardo López | Iván Graciano | Renato Andres

-->
<meta charset="utf-8">
<?php
    function cargar_examen($id_curso,$lang,$stat)
    {
        if($lang == "en")
        {
            $txt = "Question";
            $error = "Test not found";
            $error2 = "You have already passed this test.";
            $error3 = "This test has already been carried out in this week and did not comply with the minimum grade 7. Please return in a week.";
        }
        elseif($lang == "es")
        {
            $txt = "Pregunta";
            $error = "Examen no encontrado";
            $error2 = "Este examen ya fue completado exitosamente.";
            $error3 = "Este examen ya fue realizado en esta semana y no cumplio con la nota minima 7. Por favor vuelve en una semana.";
        }
        else
        {
            $txt = "Pregunta";
            $error = "Examen no encontrado";
            $error2 = "Este examen ya fue completado exitosamente.";
            $error3 = "Este examen ya fue realizado en esta semana y no cumplio con la nota minima 7. Por favor vuelve en una semana.";
        }
        if($stat == 1)
        {
            $file_dir = '../courses/' . $id_curso . '/test.bl'; 
            $string = "";
            if (file_exists($file_dir)) {
                $recoveredData = file_get_contents($file_dir);
                $array = unserialize($recoveredData);
                $num_ques = count($array);
                for($i = 0; $i < $num_ques; $i++)
                {
                    $string .= "<h3 class='junction-bold'>". $txt . " " . ($i + 1) . "</h3>";
                    $string .= "<div class='form-group'>";
                      $string .= "<p class='junction-regular'>" . $array[$i][0] . "</p>";
                      $string .= "<div class='col-lg-12'>";
                        $string .= "<div class='radio'>";
                          $string .= "<label>";
                            $string .= "<input type='radio' name='" . ($i + 1) . "' value='1' required>";
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
                $string .= "<p class='text-center'>Box Link</p>";
            } else {
                $string .= "<div class='jumbotron'><h2 class='text-center'>". $error ."</h2></div>";
            }
            echo $string;
        }
        elseif($stat == 2)
        {
            echo "<div class='jumbotron'><h2 class='text-center'>" . $error2 . "</h2></div>";
        }
        elseif($stat == 3)
        {
            echo "<div class='jumbotron'><h2 class='text-center'>" . $error3 . "</h2></div>";
        }
    }
    function print_footer($mysqli,$id_curso,$user)
    {
        if ($stmt = $mysqli->prepare("SELECT `id`, `name`, `curso`, `preguntas` FROM `test-cursos` WHERE `curso` = ? LIMIT 1")) 
        {
            $string = "";
            $stmt->bind_param('i', $id_curso);
            $stmt->execute(); 
            $stmt->store_result();
            $stmt->bind_result($id,$name,$curso,$preguntas);
            $stmt->fetch();
            $resultados = $stmt->num_rows;
            if ($resultados > 0)
            {
                $link = substr(md5($user),0,10);
                $string .= "<a href='exam.php?id=". $link . $id_curso ."' class='list-group-item active'>";
                $string .= "<i class='fa fa-graduation-cap'></i> Examen";
                $string .= "</a>";    
            }
            else
            {
            
            }
            echo $string;
        }
    }
?>