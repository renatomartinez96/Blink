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
                $stmt = $mysqli->prepare("SELECT usuario, nota, fecha FROM examenes WHERE usuario = ? ORDER BY fecha DESC LIMIT 1");
                $stmt->bind_param('s', $user);
                $stmt->execute(); 
                $stmt->store_result();
                $stmt->bind_result($usr,$nota,$fecha);
                $stmt->fetch();
                $fech = date('Y-m-d H:i:s', strtotime('-1 month'));
                $nfech = date('Y-m-d H:i:s', strtotime('+1 month'));
                if ($fecha < $fech) 
                {
            ?>
                    <div class='container'>
                        <div class='jumbotron text-center' style='margin-bottom:0px !important;'>
                            <img src='assets/img/brand3.png' style='width:50%;'>
                            <h2 class='junction-bold'>Teacher registration</h2>
                        </div>
                        <div class='well'>
                            <h3 class='text-center junction-regular'>General indications</h3>
                            <p>To continue the registration process, you need to measure your skills in HTML and CSS languages, this requires that you complete the next review.</p>
                            <ul>
                              <li>You have a monthly opportunity to develop the test.</li>
                              <li>The exam consists of 30 multiple choice questions.</li>
                              <li>The minimum grade to pass the exam is 8/10.</li>
                              <li>You have 30 minutes to develop the same.</li>
                            </ul>  
                        </div>
                        <div class='well text-center ' id="">
                            <input type="button" class="btn btn-success btn-lg" value="Iniciar Examen" id="start">
                            <form id="examen" action="assets/includes/sendexam.php" method="post">
                                <input type="hidden" name="user_nick" value="<?=$_GET['u']?>"> 
                                <ul class="pagination pagination-sm " id="quesnums" style="display: none;">
                                  <li class="active"><a href="#1" data-toggle="tab" aria-expanded="true">1</a></li>
                                  <li class=""><a href="#2" data-toggle="tab" aria-expanded="false">2</a></li>
                                  <li class=""><a href="#3" data-toggle="tab" aria-expanded="false">3</a></li>
                                  <li class=""><a href="#4" data-toggle="tab" aria-expanded="false">4</a></li>
                                  <li class=""><a href="#5" data-toggle="tab" aria-expanded="false">5</a></li>
                                  <li class=""><a href="#6" data-toggle="tab" aria-expanded="false">6</a></li>
                                  <li class=""><a href="#7" data-toggle="tab" aria-expanded="false">7</a></li>
                                  <li class=""><a href="#8" data-toggle="tab" aria-expanded="false">8</a></li>
                                  <li class=""><a href="#9" data-toggle="tab" aria-expanded="false">9</a></li>
                                  <li class=""><a href="#10" data-toggle="tab" aria-expanded="false">10</a></li>
                                  <li class=""><a href="#11" data-toggle="tab" aria-expanded="false">11</a></li>
                                  <li class=""><a href="#12" data-toggle="tab" aria-expanded="false">12</a></li>
                                  <li class=""><a href="#13" data-toggle="tab" aria-expanded="false">13</a></li>
                                  <li class=""><a href="#14" data-toggle="tab" aria-expanded="false">14</a></li>
                                  <li class=""><a href="#15" data-toggle="tab" aria-expanded="false">15</a></li>
                                  <li class=""><a href="#16" data-toggle="tab" aria-expanded="false">16</a></li>
                                  <li class=""><a href="#17" data-toggle="tab" aria-expanded="false">17</a></li>
                                  <li class=""><a href="#18" data-toggle="tab" aria-expanded="false">18</a></li>
                                  <li class=""><a href="#19" data-toggle="tab" aria-expanded="false">19</a></li>
                                  <li class=""><a href="#20" data-toggle="tab" aria-expanded="false">20</a></li>
                                  <li class=""><a href="#21" data-toggle="tab" aria-expanded="false">21</a></li>
                                  <li class=""><a href="#22" data-toggle="tab" aria-expanded="false">22</a></li>
                                  <li class=""><a href="#23" data-toggle="tab" aria-expanded="false">23</a></li>
                                  <li class=""><a href="#24" data-toggle="tab" aria-expanded="false">24</a></li>
                                  <li class=""><a href="#25" data-toggle="tab" aria-expanded="false">25</a></li>
                                  <li class=""><a href="#26" data-toggle="tab" aria-expanded="false">26</a></li>
                                  <li class=""><a href="#27" data-toggle="tab" aria-expanded="false">27</a></li>
                                  <li class=""><a href="#28" data-toggle="tab" aria-expanded="false">28</a></li>
                                  <li class=""><a href="#29" data-toggle="tab" aria-expanded="false">29</a></li>
                                  <li class=""><a href="#30" data-toggle="tab" aria-expanded="false">30</a></li>
                                </ul>
                                <div id="myTabContent" class="tab-content">

                                </div>
                                <input type="hidden" name="segs" id="segs">
                                <input type="hidden" name="minu" id="minu">
                            </form>
                        </div>
                    </div>
            <?php
                }
                else
                {
            ?>
                    <div class='container'>
                        <div class='jumbotron text-center' style='margin-bottom:0px !important;'>
                            <img src='assets/img/brand3.png' style='width:50%;'>
                            <h2 class='junction-bold'>Teachers Registration</h2>
                        </div>
                        <div class='well'>
                            <h1 class='text-center junction-regular' style="color:red;font-size:600%;"><?=$nota?></h1>
                            <p>This was your grade that you obtain on "<?=$fecha?>", we are so sorry but you did not reach the minimum score stipulated 8.0, you may repeat the test on "<?=$nfech?>"</p> 
                            <center>
                                <a href='cerrar_sesion.php'><input type='button' class='btn btn-danger' value='Sign out'></a>
                            </center>
                        </div>
                    </div>
            <?php
                }
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
                    $( "#quesnums" ).show();
                    $.ajax({
                        type: "POST",
                        url: "./assets/includes/loadQuestion.php",
                        data: {"opcion" : 'cargarPreguntas'},
                        success: function(response) {
                            $( "#myTabContent" ).append(response);
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

