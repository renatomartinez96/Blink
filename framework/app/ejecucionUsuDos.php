
    $(document).ready(function() {
            <?php
                include "app/variables.php";
                include "app/funciones.php";
            ?>
                function sincro() {
                var blockes = $(".playground").html();
                var resul = $(".yourSite").html();
//                var addedclass = $(resul).find("*").empty();
                var ultimoId = JSON.stringify(historial);
                $.ajax({
                              method: "POST",
                              url: "ajax/syncroUsu.php",
                              data: { momento:momentoTo,leccion:lessonG,bloques:blockes,resultado:resul,ultimoId:ultimoId},
                              dataType: 'json',
                              beforeSend: function() {
                                $(".loading").css('display','block');
                              },
                              success: function(data) {
                                $(".loading").css('display','none');
                                $(".msgCl ").html(data.stringhome);
                                if(data.correcto == "false") {
                                    momentoTo--;
                                }
                                console.log(data.newresult);
                              }
                          });
            }
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

