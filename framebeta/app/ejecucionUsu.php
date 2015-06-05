
    $(document).ready(function() {
            <?php
                include "app/variables.php";
                include "app/funciones.php";
            ?>
              $( ".playground" ).droppable({
                    drop: function( event, ui ) {                       
                        identificar();
                }
    });
            
});

