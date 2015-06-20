<?php 
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
        
        $imageFileType = pathinfo(basename($file['name']),PATHINFO_EXTENSION);
        switch($imageFileType)
        {
            case "png":
            case "jpg":
            case "gif":
            case "jpeg":
                $uploaddir = '../../users/'.$user.'/img/';
            break;
            case "mp4":
            case "webm":
            case "ogg":
                $uploaddir = '../../users/'.$user.'/video/';
            break;
            default:
                $uploaddir = '../../users/'.$user.'/non_supported/';
            break;
        }
		if(move_uploaded_file($file['tmp_name'], $uploaddir .basename($file['name'])))
		{
			$files[] = $uploaddir.$file['name'];
            $archivo =  $uploaddir.$file['name'];
            $file_type = substr($file['name'],-4);
            rename($archivo,$uploaddir.$new_image_name.$file_type);
		}
		else
		{
		    $error = true;
		}
	}
	$data = ($error) ? array('error' => 'There was an error uploading your files') : array('files' => $files);
}
else
{
	$data = array('success' => 'Form was submitted', 'formData' => $_POST);
}

echo json_encode($data);

?>