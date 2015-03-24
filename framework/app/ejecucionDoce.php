
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
                        $(".valueDescription").val("");
                        $('#modalDesc').modal('hide');
                    });
                }
                
              $( ".playground" ).droppable({
                    drop: function( event, ui ) {
                        
                        identifie();
                        getParameter();
                        getParameterDos();
                        getParameterTres();
                        inputText();
                        addDescr();
                        IdObjetoCreadoUnico--;
                        
                }
    });  
            
});

