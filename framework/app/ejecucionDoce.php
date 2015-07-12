    $(document).ready(function() {
            <?php
                include "app/variables.php";
                include "app/funciones.php";
            ?>

                //exclusivo docente
                $(".divide").append("<button type='button' style='float:right;margin-right:1%;' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>Siguiente</button>");
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
                    drop: function( event, ui ) {
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
      $( "#recordStartButton" ).attr( "disabled", true );
      $( "#recordStopButton" ).attr( "disabled", false );
      $( "#recordPauseResumeButton" ).attr( "disabled", false );
      $.scriptcam.startRecording();
    }
    function closeCamera() {
      $("#slider").slider( "option", "disabled", true );
      $("#recordPauseResumeButton" ).attr( "disabled", true );
      $("#recordStopButton" ).attr( "disabled", true );
      $.scriptcam.closeCamera();
      $('#message').html('Please wait for the file conversion to finish...');
    }
    function pauseResumeCamera() {
      if ($( "#recordPauseResumeButton" ).html() == 'Pause Recording') {
        $( "#recordPauseResumeButton" ).html( "Resume Recording" );
        $.scriptcam.pauseRecording();
      }
      else {
        $( "#recordPauseResumeButton" ).html( "Pause Recording" );
        $.scriptcam.resumeRecording();
      }
    }
    function fileReady(fileName) {
      console.log(fileName);
      $('#recorder').hide();
      $('#message').html('This file is now dowloadable for five minutes over <a href='+fileName+'">here</a>.');
      var fileNameNoExtension=fileName.replace(".mp4", "");
      $.ajax({
          url: 'php/upload_cam.php',
          type: 'POST',
          data: {files:fileName},
          cache: false,
          processData: false,
          contentType: false,
          success: function(data)
          {
              console.log(data);
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
      $('#timeLeft').val(value);
    }


    $("#recordStartButton").on("click",function(){
          startRecording();
    });
    $("#recordPauseResumeButton").on("click",function(){
          pauseResumeCamera();
    });
    $("#recordStopButton").on("click",function(){
          closeCamera();
    });
});
