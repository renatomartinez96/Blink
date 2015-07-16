
    $(document).ready(function() {
            console.log("a");
            <?php
                include "app/variables.php";
                include "app/funciones.php";
            ?>
            console.log("e");
                var currentDate = "";
                function startTime() {

                    $.ajax({
                              method: "POST",
                              url: "ajax/registerTime.php",
                              data: {action:1},
                              dataType: 'json',
                              beforeSend: function() {
                                $(".loading").css('display','block');
                              },
                              success: function(data) {
                                $(".loading").css('display','none');
                                currentDate = data.horaServ;

                              }
                          });
                }
                function finishTime() {
                    $.ajax({
                              method: "POST",
                              url: "ajax/registerTime.php",
                              data: {action:2,hora:currentDate.date,leccion:lessonG,usuario:idUserPHP},
                              dataType: 'json',
                              beforeSend: function() {
                                $(".loading").css('display','block');
                              },
                              success: function(data) {
                                $(".loading").css('display','none');
                                //$(".msgCl ").html(data);
                                  $('#myModal2').on('show.bs.modal', function (e) {
                                        $('.winner').addClass("fadeInDownDos");
                                    });
                                  if (data.response == 0) {
                                    $(".centertest").append("<h1 class='muybien2'>"+data.tiempo+"</h1><h1 class='muybien3'>"+<?= $langprint['F-4']?>+"</h1>");
                                  }else if (data.response == 1) {
                                     $(".contentWin").html(data.string);
                                  }
                                     $('#myModal2').modal('show');
                              }
                          });
                }
                function sincro() {
                var blockes = $(".playground").html();
                var resul = $(".yourSite").html();
//                var addedclass = $(resul).find("*").empty();
                var ultimoId = JSON.stringify(historial);
                $.ajax({
                              method: "POST",
                              url: "ajax/syncroUsu.php",
                              data: { momento:momentoTo,leccion:lessonG,bloques:blockes,resultado:resul,ultimoId:ultimoId,estado:estadoLec,filename:idUserPHP},
                              dataType: 'json',
                              beforeSend: function() {
                                $(".loading").css('display','block');
                              },
                              success: function(data) {
                                $(".loading").css('display','none');

                                $(".msgCl ").html(data.stringhome);
                                switch (data.correcto) {
                                    case 1:
                                        momentoTo--;
                                        break;
                                    case 2:
                                        finishTime();
                                        break;
                                }

                              }
                          });
            }
            startTime();
            sincro();
              $( ".playground" ).droppable({
                accept: ".htmlMain",
                    drop: function( event, ui ) {

                        identifie();
                        IdObjetoCreadoUnico--;
                        momentoTo++;

                        sincro();
                }
    });
    $( ".recordingCam" ).draggable({revert: false,cursor: "move", cursorAt: { top: -5, left: -5 }, containment: ".playground ", scroll: false,drag: function() {
  }, });

});
