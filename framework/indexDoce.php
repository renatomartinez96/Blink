<!DOCTYPE html>
<html lang="en">

    <body>
        <h4>Name of the lesson:<?php echo $nombree ?></h4>
        <?php 
            include "app/graphic.php";
        ?>
            <div class="modal fade" id="modalDesc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Agregar la descripción</h4>
                      </div>
                      <div class="modal-body">
                        <textarea class="valueDescription"></textarea>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary saveDescription">Guardar</button>
                      </div>
                    </div>
                  </div>
            </div>
    </body>
</html>
