
    $(document).ready(function() {
            <?php
                include "app/variables.php";
                include "app/funciones.php";
            ?>  
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
                              data: {action:2,hora:currentDate.date},
                              dataType: 'json',
                              beforeSend: function() {
                                $(".loading").css('display','block');
                              },
                              success: function(data) {
                                $(".loading").css('display','none'); 
                                console.log(data.salio);
                                  
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
                              data: { momento:momentoTo,leccion:lessonG,bloques:blockes,resultado:resul,ultimoId:ultimoId,estado:estadoLec},
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
                    drop: function( event, ui ) {
                        
                        identifie();
                        getParameter();
                        getParameterDos();
                        getParameterTres();
                        inputText();
                        IdObjetoCreadoUnico--;
                        momentoTo++;
                        sincro();
                }
    });  
            
});

