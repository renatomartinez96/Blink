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
                .inline{
                    display: inline;
                }
                #cronometro{
                    position:fixed;
                    bottom: 0;
                    right: 0;
                    padding:10px;
                }
            </style>
        <!--/#Custom css-->
    </head>
    <body>
        
        <div class='container-fluid'>
            <div class='row'>
            <div class='bg-success text-center' id="cronometro" style="display: none;">
                <h4>Cronometro</h4>
                <div id="timer" class="text-center junction-bold">
                    <h3>
                        <div id="minute" class="inline">00</div>
                        <div id="divider" class="inline">:</div>
                        <div id="second" class="inline">00</div>
                    </h3>
                </div>
            </div>
            <?php
            if (isset($_GET['u'], $_GET['t'])) 
            {
                $user = $_GET['u'];
            ?>
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
                    
                    <div class='well text-center' id="">
                        <input type="button" class="btn btn-success btn-lg" value="Iniciar Examen" id="start">
                        <?php
//                            $questions = loadPreguntas();
//                            imprimirPreguntas($questions);
                        ?>
<!--                        <input type="submit" value="Terminar" class="btn btn-success">-->
                        <form id="examen">
                            <input type="hidden" name="segs" id="segs">
                            <input type="hidden" name="minu" id="minu">
                        </form>
                    </div>
                </div>
            <?php
            }
            else
            {
//                echo "<img class='img-responsive' src=''>";
            }
            ?>
            </div>    
        </div>
        <!--Main js-->
        <?php 
            include 'main_js.php';
        ?>
        <!--/#Main js-->
        <script>
            $( document ).ready(function() {
                var tiempo = {
                    hora: 0,
                    minuto: 0,
                    segundo: 0
                };
                var tiempo_corriendo = null;
                var showexam = $("#examen").html();
                $( "#start" ).click(function() {
                    $( "#cronometro" ).show();
                    $( "#start" ).hide();
                    $.ajax({
                        type: "POST",
                        url: "./assets/includes/loadQuestion.php",
                        data: {"opcion" : 'cargarPreguntas'},
                        success: function(response) {
                            $( "#examen" ).append(response);
                        }
                    });
                    setInterval(function(){
        //                  segundos
                    tiempo.segundo++;
                    if(tiempo.segundo >= 60)
                    {
                        tiempo.segundo = 0;
                        tiempo.minuto++;
                    }
                    if(tiempo.minuto >= 30)

                    {

                    }
                    $( "#minute" ).text(tiempo.minuto < 10 ? '0' + tiempo.minuto : tiempo.minuto);
                    $( "#second" ).text(tiempo.segundo < 10 ? '0' + tiempo.segundo : tiempo.segundo);
                    $( "#minu" ).text(tiempo.minuto < 10 ? '0' + tiempo.minuto : tiempo.minuto);
                    $( "#segs" ).text(tiempo.segundo < 10 ? '0' + tiempo.segundo : tiempo.segundo);
                    }, 1000);
                });
            });
        </script>
    </body>
</html>

