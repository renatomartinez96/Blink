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
            success: function(data, textStatus, jqXHR)
            {
            	if(typeof data.error === 'undefined')
            	{
            		submitForm(event, data);
            	}
            }
        });
    }

    function submitForm(event, data)
	{
		$form = $(event.target);
		var formData = $form.serialize();
		$.each(data.files, function(key, value)
		{
			formData = formData + '&filenames[]=' + value;
		});

		$.ajax({
			url: 'php/upload_file.php',
            type: 'POST',
            data: formData,
            cache: false,
            dataType: 'json',
            success: function(data, textStatus, jqXHR)
            {
            	if(typeof data.error === 'undefined')
            	{
            		alert("archivo subido exisosamente");
            	}
            	else
            	{
            		alert("error al subir el archivo");
            	}
            },
		});
	}
});