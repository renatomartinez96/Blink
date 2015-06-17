    $(document).ready(function() {
            <?php
                include "app/variables.php";
                include "app/funciones.php";
            ?>
                //exclusivo docente
                $(".divide").append("<button type='button' style='float:right;margin-right:1%;' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>Next</button>");
                function addDescr() {
                    $('#modalDesc').modal('toggle');
                    $( ".saveDescription" ).off('click');
                    $( ".saveDescription" ).on('click',function() {
                        var ultimoId = historial[historial.length-1];
                        var value = $(".valueDescription").val();
                        var resul = $(".yourSite").html();
                        var blockes = $(".playground").html();
                            $.ajax({
                              method: "POST",
                              url: "ajax/syncro.php",
                              data: { description: value,leccion:cursososo,resultado:resul,bloques:blockes,curso:cursososo22,momento:momentoTo,idFinal:ultimoId},
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
                        identifie();
                        addDescr();
                        momentoTo++;
                        IdObjetoCreadoUnico--;
                        
                }
    });  
            
});

