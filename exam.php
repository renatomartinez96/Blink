<!--

Copyright (c) 2015 Blink
All Rights Reserved
 
This product is protected by copyright and distributed under
licenses restricting copying, distribution, and decompilation.

Gerardo López | Iván Nolasco | Renato Andres

-->
<?php
include_once 'assets/includes/db_conexion.php';
include 'assets/includes/loadQuestion.php';
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
            <?php
            if (isset($_GET['u'], $_GET['t'])) 
            {
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
                    <div class='well text-center'>
                        <?=time('HH:MM:SS')?>
                    </div>
                    <div class='well text-center'>
                        <?php
                            loadPreguntas();
                        ?>
                        <input type="submit" value="Terminar" class="btn btn-success">
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
    </body>
</html>

