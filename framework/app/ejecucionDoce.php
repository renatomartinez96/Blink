    $(document).ready(function() {
            <?php
                include "app/variables.php";
                include "app/funciones.php";
            ?>

                //exclusivo docente
                var seempezoagrabar = false;
                $(".divide").append("<button type='button' style='float:right;margin-right:1%;' class='btn btn-primary stopVideo'>Siguiente</button>");
                $(".createLes").fadeOut();
                $(".bugname").fadeOut();
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

              $(".verify").on("input",function() {
                var name = $(this).val();

                  $.ajax({
                    method: "POST",
                    //data:"json",
                    url: "ajax/verify.php",
                    data: { n:name,u:idUserPHP},
                    beforeSend: function() {

                    },
                    success: function(data) {
                        if (data > 0) {
                            $(".verify").addClass("regada");
                            $(".createLes").fadeOut();
                            $(".bugname").fadeIn();
                        }else {
                            $(".verify").removeClass("regada");
                            $(".createLes").fadeIn();
                            $(".bugname").fadeOut();
                        }
                    }
                });
              });
              $( ".playground" ).droppable({
                    accept: ".htmlMain",
                    drop: function( event, ui ) {
                      startRecording();
                        identifie();
                        addDescr();
                        momentoTo++;
                        IdObjetoCreadoUnico--;

                }

    });
    $("#webcam").scriptcam({
      fileReady:fileReady,
      cornerColor:'e3e5e2',
      onError:onError,
      promptWillShow:promptWillShow,
      showMicrophoneErrors:false,
      onWebcamReady:onWebcamReady,
      timeLeft:timeLeft,
      showDebug: false,
      fileName:'demofilename',
      connected:showRecord
    });
    function showRecord() {
      $( "#recordStartButton" ).attr( "disabled", false );
    }
    function startRecording() {

      if (seempezoagrabar == false) {
        console.log("start");
        seempezoagrabar = true;
        $( "#recordStartButton" ).attr( "disabled", true );
        $( "#recordStopButton" ).attr( "disabled", false );
        $( "#recordPauseResumeButton" ).attr( "disabled", false );
        $.scriptcam.startRecording();
      }

    }
    function closeCamera() {
      console.log("finish");

      $("#slider").slider( "option", "disabled", true );
      $("#recordPauseResumeButton" ).attr( "disabled", true );
      $("#recordStopButton" ).attr( "disabled", true );
      $.scriptcam.closeCamera();
      $('#message').html('Please wait for the file conversion to finish...');

    }
    function pauseResumeCamera() {
      console.log($( "#recordPauseResumeButton" ).html());
      if ($( "#recordPauseResumeButton" ).html() == '<i class="fa fa-pause"></i>') {
        $( "#recordPauseResumeButton" ).html( '<i class="fa fa-play"></i>' );
        $.scriptcam.pauseRecording();
      }
      else {
        $( "#recordPauseResumeButton" ).html( '<i class="fa fa-pause"></i>' );
        $.scriptcam.resumeRecording();
      }
    }
    function fileReady(fileName) {
      $('#recorder').hide();
      var fileNameNoExtension=fileName.replace(".mp4", "");
      $.ajax({
          url: 'php/upload_cam.php',
          method: 'POST',
          data: {files:fileName,leccion:cursososo},
          success: function(data)
          {
              $("#myModalActi").modal("show");
              console.log("Se COPIRO");
              $(".recordingCam").remove();
          }
      });
    }
    function onError(errorId,errorMsg) {
      alert(errorMsg);
    }
    function onWebcamReady(cameraNames,camera,microphoneNames,microphone,volume) {
      $( "#slider" ).slider( "option", "disabled", false );
      $( "#slider" ).slider( "option", "value", volume );
      $.each(cameraNames, function(index, text) {
        $('#cameraNames').append( $('<option></option>').val(index).html(text) )
      });
      $('#cameraNames').val(camera);
      $.each(microphoneNames, function(index, text) {
        $('#microphoneNames').append( $('<option></option>').val(index).html(text) )
      });
      $('#microphoneNames').val(microphone);
    }
    function promptWillShow() {
      alert('A security dialog will be shown. Please click on ALLOW.');
    }

    function timeLeft(value) {
      $('#timeLeft').html(value);
    }

    $("#recordPauseResumeButton").on("click",function(){
          pauseResumeCamera();
    });
    $(".stopVideo").on("click",function(){
          $(".fullpg").fadeIn();
          closeCamera();
    });
    $( ".recordingCam" ).draggable({revert: false,cursor: "move", cursorAt: { top: -5, left: -5 }, containment: ".playground ", scroll: false,drag: function() {
  }, });
});
