    $(document).ready(function() {
            <?php
                include "app/variables.php";
                include "app/funciones.php";
            ?>
                //exclusivo docente
                function addDescr() {
                    $('#modalDesc').modal('toggle');
                    $( ".saveDescription" ).click(function() {
                        var value = $(".valueDescription").val();
                        var resul = $(".yourSite").html();
                        var blockes = $(".playground").html();
                            $.ajax({
                              method: "POST",
                              url: "ajax/syncro.php",
                              data: { description: value,leccion:cursososo,resultado:resul,bloques:blockes,curso:cursososo22,momento:momentoTo},
                              beforeSend: function() {
                                $(".loading").css('display','block');
                              },
                              success: function(data) {
                                $(".loading").css('display','none');
                                 $(".playground ").append(data);
                              }
                          });
                          
                        $(".valueDescription").val("");
                        $('#modalDesc').modal('hide');
                    });
                }
                
              $( ".playground" ).droppable({
                    drop: function( event, ui ) {
                        console.log(momentoTo);
                        identifie();
                        getParameter();
                        getParameterDos();
                        getParameterTres();
                        inputText();
                        addDescr();
                        momentoTo++;
                        IdObjetoCreadoUnico--;
                        
                }
    });  
            
});

