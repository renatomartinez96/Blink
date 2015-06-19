
    $(document).ready(function() {
            <?php
                include "app/variables.php";
                include "app/funciones.php";
            ?>
              $(".divide").append("<button type='button' class='btn btn-default saveMeF' data-toggle='tooltip' data-placement='bottom' title='Guardar'><i class='fa fa-floppy-o'></i></button>");
              $(".divide").append("<button type='button' class='btn btn-default openMeF' data-toggle='tooltip' data-placement='bottom' title='Abrir'><i class='fa fa-folder-open'></i></button>");
              $(".saveMeF").on("click",function(){
                    var blockes = $(".playground").html();
                    var resul = $(".yourSite").html();
                    $.ajax({
                              method: "POST",
                              url: "ajax/saveO.php",
                              data: {bloques:blockes,resultado:resul,action:0,id:<?php echo $userid?>},
//                              dataType: 'json',
                              beforeSend: function() {
                                
                              },
                              success: function(data) {
                                window.open('/Blink/framework/php/save.php');
                              }
                          });
                        
              });
                  
              $( ".playground" ).droppable({
                    drop: function( event, ui ) {
                        
                        identifie();
                        IdObjetoCreadoUnico--;
                        
                }
    });  
            
});

