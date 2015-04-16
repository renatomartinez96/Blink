
    $(document).ready(function() {
            <?php
                include "app/variables.php";
                include "app/funciones.php";
            ?>
                function sincro() {
                var blockes = $(".playground").html();
                var resul = $(".yourSite").html();
                var addedclass = $(resul).find("*").empty();
                 
                $.ajax({
                              method: "POST",
                              url: "ajax/syncroUsu.php",
                              data: { momento:momentoTo,leccion:lessonG,bloques:blockes,resultado:resul},
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

