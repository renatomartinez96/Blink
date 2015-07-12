<!DOCTYPE html>
<html lang="en">

    <body>
        <h4>Name of the lesson:<?php echo $nombree ?></h4>
        <?php
            include "app/graphic.php";
        ?>
        <div class="recordingCam">
          <div id="webcam"></div>
          <input type="text" id="timeLeft" style="width:50px;font-size:10px;">&nbsp;
          <button id="recordStartButton" class="btn btn-small" disabled>Start Recording</button>
          <button id="recordPauseResumeButton" class="btn btn-small" onclick="pauseResumeCamera()" disabled>Pause Recording</button>
    			<button id="recordStopButton" class="btn btn-small" onclick="closeCamera()" disabled>Stop Recording</button>
        </div>
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
