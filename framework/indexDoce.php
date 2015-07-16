<!DOCTYPE html>
<html lang="en">

    <body>
        <h4><?= $langprint['F-16']?>:<?php echo $nombree ?></h4>
        <?php
            include "app/graphic.php";
        ?>
        <div class="fullpg">
            <div class="center">
                <img src="../../assets/img/loading.gif" class="brand">
                <h2 class="junction-regular"><?= $langprint['F-17']?></h2>
            </div>
        </div>
        <div class="bg-primary recordingCam">

          <div id="webcam"></div><br/>
          <button id="recordPauseResumeButton" class="btn btn-primary" disabled><i class='fa fa-pause'></i></button>
          <label id="timeLeft" class="control-label"></label>
        </div>
            <div class="modal fade" id="modalDesc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><?= $langprint['F-18']?></h4>
                      </div>
                      <div class="modal-body">
                        <textarea class="valueDescription"></textarea>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary saveDescription"><?= $langprint['F-19']?></button>
                      </div>
                    </div>
                  </div>
            </div>
    </body>
</html>
