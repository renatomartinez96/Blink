<!--

Copyright (c) 2015 Blink
All Rights Reserved
 
This product is protected by copyright and distributed under
licenses restricting copying, distribution, and decompilation.

Gerardo López | Iván Nolasco | Renato Andres

-->
<?php
include_once 'assets/includes/db_conexion.php';
?>
<!DOCTYPE html>
<html lang='en'>
	<head>
		<!--Core CSS-->
		<?php
            // Titulo de esta página:
            $titulodelapagina = ' ';
			include 'main_css.php';
		?>
		<!--/#Core CSS-->
        <!--Custom css-->
            <style>
                .jumbotron{
                    background: #fff url('assets/img/banner.png') fixed no-repeat;
                    background-position: center top;
                }
            </style>
        <!--/#Custom css-->
	</head>
	<body>
		<div class='container-fluid'>
            <div class='row'>
                <div class='container'>
                    <div class='jumbotron text-center' style='margin-bottom:0px !important;'>
                        <img src='assets/img/brand3.png' style='width:50%;'>
                        <h2 class='junction-bold'>Registro de docentes</h2>
                    </div>
                    <div class='well'>
                        <h3 class='text-center junction-regular'>Indicaciones Generales</h3>
                        <p>Para continuar con el proceso de registro, es necesario medir tus capacidades en los lenguajes HTML y CSS, para eso es necesario que completes el siguiente examen. </p>
                        <ul>
                          <li>Tienes una oportunidad mensual para desarrollar el examen.</li>
                          <li>El examen consta de 30 preguntas de seleccion multiple.</li>
                          <li>La nota minima para pasar el examen es de 8.5/10.</li>
                          <li>Tienes 30 minutos para desarrollar el mismo.</li>
                          <li>Cuando des clic en el boton 'Siguiente pregunta', no podras regresar a la anterior.</li>
                        </ul>  
                    </div>
                    <div class='well text-center'>
                        <?=time('HH:MM:SS')?>
                    </div>
                    <div class='well text-center'>
                        <?php
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
                        ?>
                        <input type="submit" value="Terminar" class="btn btn-success">
                    </div>
                </div>
            </div>    
        </div>
		<!--Main js-->
		<?php 
			include 'main_js.php';
		?>
		<!--/#Main js-->
	</body>
</html>
