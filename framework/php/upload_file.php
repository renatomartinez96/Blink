<?php 
    include_once '../../assets/includes/db_conexion.php';
    include_once '../../assets/includes/funciones.php';
    sec_session_start();
    $user = $_SESSION['username'];
    $new_image_name = substr(md5(date("Y-m-d H:i:s").$user), 0, 6);
    $data = array();
    $uploaddir = '../temp/';
     $renameThis = $new_image_name.".tblk";
    $openThis = "";
if(isset($_GET['files']))
{	
	$error = false;
    $datoss = "";
	$files = array();
	foreach($_FILES as $file)
	{
        
        $imageFileType = pathinfo(basename($file['name']),PATHINFO_EXTENSION);
        if($imageFileType = "tblk")
        {
           
            if(move_uploaded_file($file['tmp_name'], $uploaddir .basename($file['name'])))
		{
			$files[] = $uploaddir.$file['name'];
            $archivo =  $uploaddir.$file['name'];
            $file_type = substr($file['name'],-4);
            rename($archivo,$uploaddir.$renameThis);
             $name = $uploaddir.$renameThis;
            $fp = fopen($name, 'r');
            $datoss = fread($fp,filesize($name));
            fclose($fp);
            chmod($name, 0777);
            $explode = explode("S%R#n&SE!r?", $datoss);
            foreach ($explode as $key => $value) {
                if($key == 0) {
                    $bloquess = $value;
                }elseif($key == 1) {
                    $resultado = $value;
                }
            }
                
            $data = array('bloques' => $bloquess,'resultado' =>$resultado);
            unlink($name);
		}
		else
		{
		    $error = true;
		}
        }else {
             $error = true;
        }
		
	}
	
}
else
{
   
    
}

echo json_encode($data);

?>