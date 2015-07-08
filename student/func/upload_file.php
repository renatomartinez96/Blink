<html>
    <head>
        <title>The Box Link</title>
        <link href="../../assets/css/main.css" rel="stylesheet">
        <style>
            html,body{
                height:100%;
                width:100%;
                color:#fff;
                overflow:hidden;
            }
            body{
                margin:0px !important;
            }
            .fullpg{
                width:100vw;
                height:100vh;
                background:#C63;
            }
            .center{
                margin-left:25%;
                top:15%;
                width:50%;
                position:absolute;
                text-align:center;
            }
            .brand{
                width:80% !important:
            }
        </style>
    </head>
    <body>
        <div class="fullpg">
            <div class="center">
                <img src="../../assets/img/loading.gif" class="brand">
                <h2 class="junction-regular">Sus archivos estan siendo procesados</h2>
            </div>
        </div>
    </body>
</html>

<script src="../../assets/js/jquery.js" type="text/javascript"></script>
<script src="../../assets/js/gifshot.min.js"></script>
<?php
    ini_set('upload_max_filesize','25M');
    ini_set('post_max_size','25M');
    ini_set('max_execution_time','1000');
    ini_set('max_input_time','1000');
    include_once '../../assets/includes/db_conexion.php';
    include_once '../../assets/includes/funciones.php';
    sec_session_start();
    $user = $_SESSION['username'];
    $new_image_name = substr(md5(date("Y-m-d H:i:s").$user), 0, 6);
    $data = array();
if(isset($_GET['files']))
{
	$error = false;
	$files = array();
	foreach($_FILES as $file)
	{
        echo $file['name'];
        if($file['size'] > 25600000)
        {
            echo "archivo demasiado grande";
        }
        else
        {
            $imageFileType = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
            switch($imageFileType)
            {
                case "png":
                case "jpg":
                case "gif":
                case "jpeg":
                    $uploaddir = '../../users/'.$user.'/img/';
                    $is_video = 0;
                break;
                case "mp4":
                case "webm":
                case "ogg":
                    $uploaddir = '../../users/'.$user.'/video/';
                    $is_video = 1;
                break;
                default:
                    $uploaddir = '../../users/'.$user.'/non_supported/';
                break;
            }
    		if(move_uploaded_file($file['tmp_name'], $uploaddir .$file['name']))
    		{
    			$files[] = $uploaddir.$file['name'];
                $archivo =  $uploaddir.$file['name'];
                rename($archivo,$uploaddir.$new_image_name.".".$imageFileType);
                $new_file_name = $uploaddir.$new_image_name.".".$imageFileType;
                if ($is_video == 1)
                {
                    echo "<script>
                        gifshot.createGIF({
                        gifWidth: 200,
                        gifHeight: 200,
                        'video': ['" . $new_file_name . "'],
                        numFrames: 50
                        },function(obj) {
                            if(!obj.error) {
                                var image = obj.image;
                                var send = {
                                        'imagen' : image,
                                        'nombre' : '" . $new_image_name . "'
                                       };
                                $.ajax({
                                    type: 'POST',
                                    url: 'create_gif.php',
                                    data: send,
                                    success: function(response) {
                                        window.location.href = '../index2.php';
                                    }
                                });
                            }
                        });

                    </script>";
                }
                elseif($is_video == 0)
                {
                    echo "<script>window.location.href = '../index2.php';</script>";
                }
    		}
    		else
    		{
    		    $error = true;
    		}
        }
	}
	$data = ($error) ? array('error' => 'There was an error uploading your files') : array('files' => $files);
}
else
{
	$data = array('success' => 'Form was submitted', 'formData' => $_POST);
}
?>
