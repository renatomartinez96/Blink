<!--

Copyright (c) 2015 Blink
All Rights Reserved
 
This product is protected by copyright and distributed under
licenses restricting copying, distribution, and decompilation.

Gerardo López | Iván Graciano | Renato Andres

--> 
<?php
function loadPreguntas(){
    $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
    $num = Array();
    reset($num);
    for($i=1;$i<=10;$i++) 
        {
        $num[$i]=rand(1,18);
        if($i>1) 
        {
           for($x=1; $x<$i; $x++)
           {
             if($num[$i]==$num[$x]) 
             { 
               $i--; 
               break; 
             }
          }
        }
    }
    $p = 1;
    foreach($num as $valor) 
    {
        $ques = $mysqli->prepare("SELECT id, pregunta, opcion1, opcion2, opcion3, opcion4 FROM cuestionario WHERE id = ?");
        $ques->bind_param('s', $valor);
        $ques->execute(); 
        $ques->store_result();
        $ques->bind_result($id,$pregunta,$op1,$op2,$op3,$op4);
        while($ques->fetch())
        {
            echo "<h3 class='text-center'>Pregunta";
            echo $p;
            echo "/30.</h3>";
            echo "<div class='form-group'>";
            echo "<p>";
            echo $pregunta;
            echo "</p>";
            echo "<div class='col-lg-12'><div class='radio'><label><input type='radio' name='";
            echo $id;
            echo "' id='a' value='1'>";
            echo $op1;
            echo "</label></div><div class='radio'><label><input type='radio' name='";
            echo $id;
            echo "' id='b' value='2'>";
            echo $op2;
            echo "</label></div><div class='radio'><label><input type='radio' name='";
            echo $id;
            echo "' id='c' value='3'>";
            echo $op3;
            echo "</label></div><div class='radio'><label><input type='radio' name='";
            echo $id;
            echo "' id='d' value='4'>";
            echo $op4;
            echo "</label></div></div></div>";                              
            $p++;
        }
    }
}
?> 