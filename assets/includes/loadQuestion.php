
<?php
include 'psl-config.php';
function imprimirPreguntas($preguntas)
{
    $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
    for($e = 0;$e < 30;$e++)
    {
        $ques = $mysqli->prepare("SELECT id, pregunta, opcion1, opcion2, opcion3, opcion4 FROM cuestionario WHERE id = ?");
        $ques->bind_param('i', $preguntas[$e]);
        $ques->execute(); 
        $ques->store_result();
        $ques->bind_result($id,$pregunta,$op1,$op2,$op3,$op4);
        $ques->fetch();
            echo "<div class='tab-pane fade";
            if($e == 0){
                echo " active in";
            }
            echo "' id='";
            echo $e + 1;
            echo "'>";
            echo "<h3 class='text-center'>Pregunta";
            echo $e + 1;
            echo "/30.</h3>";
            echo "<input type='hidden' name='p";
            echo $e + 1;
            echo "' value='";
            echo $id;
            echo "'>";
            echo "<div class='form-group'>";
            echo "<p>";
            echo $pregunta;
            echo "</p>";
            echo "<div class='col-lg-12'><div class='radio'><label><input type='radio' name='";
            echo $id;
            echo "'  value='1' checked>";
            echo $op1;
            echo "</label></div><div class='radio'><label><input type='radio' name='";
            echo $id;
            echo "'  value='2'>";
            echo $op2;
            echo "</label></div><div class='radio'><label><input type='radio' name='";
            echo $id;
            echo "'  value='3'>";
            echo $op3;
            echo "</label></div><div class='radio'><label><input type='radio' name='";
            echo $id;
            echo "'  value='4'>";
            echo $op4;
            echo "</label></div></div></div></div>"; 
    }
    echo "<br><br><br><input type='submit' value='Terminar' class='btn btn-success'>";
    
}
function loadPreguntas(){
    $num = Array();
    reset($num);
    for($i=1;$i<=30;$i++) 
        {
        $num[$i]=rand(1,100);
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
    $questions = array();
    foreach($num as $valor) 
    {   
        $questions[count($questions)] = $valor;
    }
    imprimirPreguntas($questions);
}

if (isset($_POST['opcion']))
{
    loadPreguntas();
}

?> 