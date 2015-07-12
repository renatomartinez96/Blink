<?php
if(isset($_POST['files']))
{
  $file = $_POST['files'];
$newfile = 'http://localhost/Blink/framework/temp/output.mp4';

if (!copy($file, $newfile)) {
    echo "failed to copy $file...\n";
}

}
else
{


}



?>
