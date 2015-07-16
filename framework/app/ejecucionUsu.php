
    $(document).ready(function() {
            <?php
                include "app/variables.php";
                include "app/funciones.php";
            ?>
                //OPEND FILE
$(function()
{
	var files;
	$('input[type=file]').on('change', prepareUpload);
	$("input[name = 'submit_upload_files']").on('click', uploadFiles);
	function prepareUpload(event)
	{
		files = event.target.files;
	}
	function uploadFiles(event)
	{
		event.stopPropagation();
        event.preventDefault(); 
		var data = new FormData();
		$.each(files, function(key, value)
		{
			data.append(key, value);
		});
        
        $.ajax({
            url: 'php/upload_file.php?files',
            type: 'POST',
            data: data,
            cache: false,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(data)
            {
                $("#OpenFile").modal("hide");
            	$(".playground").html(data.bloques);
                $(".yourSite").html(data.resultado);
                eventosOff();
                eventos();
                
            }
        });
    }
});
//OPEND FILE
              $(".divide").append("<button type='button' class='btn btn-default saveMeF' data-toggle='tooltip' data-placement='bottom' title='<?= $langprint['btn-save']?>'><i class='fa fa-floppy-o'></i></button>");
              $(".divide").append("<button type='button' class='btn btn-default openMeF' data-toggle='modal' data-target='#OpenFile'><i class='fa fa-folder-open'></i></button>");
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

