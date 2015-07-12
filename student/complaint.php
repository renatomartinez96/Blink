<?php
if(isset($_POST["curso"]))
{
    echo $_POST["curso"];
}
else
{
    header("location: index.php");
}
?>