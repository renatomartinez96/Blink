<!--

Copyright (c) 2015 Blink
All Rights Reserved
 
This product is protected by copyright and distributed under
licenses restricting copying, distribution, and decompilation.

Gerardo López | Iván Graciano | Renato Andres

-->
<?php
    function print_preguntas($numpregs)
    {
        if($numpregs > 0)
        {
            echo "<h3>Por favor complete toda las preguntas y seleccione su opcion correcta</h3>";
            for($i = 1; $i <= $numpregs; $i++)
            {
                echo "<h3>Pregunta " . $i . "</h3>";
                echo "<input type='text' name='p". $i ."' required placeholder='Pregunta " . $i . "' class='form-control'>";
                echo "<div class='radio'><label><input type='radio' name='r";
                echo $i;
                echo "'  value='1' checked>";
                echo "<input type='text'class='form-control input-sm' name='". $i ."A' placeholder='Opción A' required>";
                echo "</label></div><div class='radio'><label><input type='radio' name='r";
                echo $i;
                echo "'  value='2'>";
                echo "<input type='text' class='form-control input-sm' name='". $i ."B' placeholder='Opción B' required>";
                echo "</label></div><div class='radio'><label><input type='radio' name='r";
                echo $i;
                echo "'  value='3'>";
                echo "<input type='text' class='form-control input-sm' name='". $i ."C' placeholder='Opción C' required>";
                echo "</label></div><div class='radio'><label><input type='radio' name='r";
                echo $i;
                echo "'  value='4'>";
                echo "<input type='text' class='form-control input-sm' name='". $i ."D' placeholder='Opción D' required>";
                echo "</label></div>";
            }
        }
        else
        {
        
        }
    }
?>