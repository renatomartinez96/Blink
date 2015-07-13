<?php
if(isset($_POST['files'],$_POST['leccion']))
{
  $file = $_POST['files'];
$newfile = "../../courses/".$_POST['leccion']."/".$_POST['leccion'].".mp4";

if (!copy($file, $newfile)) {
    echo "failed to copy $file...\n";
}else {
  echo " se copio de ";
}

}



?>
