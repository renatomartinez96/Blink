<!--
Copyright (c) 2015 Blink
All Rights Reserved
 
This product is protected by copyright and distributed under
licenses restricting copying, distribution, and decompilation.
Gerardo López | Iván Nolasco | Renato Andres
-->
<?php
if(isset($_POST["editid"]) && isset($_POST["editnombre"]) && isset($_POST["editdesc"]))
{
    include_once '../assets/includes/db_conexion.php';
    include_once '../assets/includes/funciones.php';
    sec_session_start();
    
    $cursoid = $_POST["editid"];
    $cursonombre = $_POST["editnombre"];
    $cursodesc = $_POST["editdesc"];
    
    $stmt = $mysqli->prepare("UPDATE curso SET `nombre` = ?, `descripcion` = ? WHERE idcurso = ?");
    $stmt->bind_param("sss", $cursonombre, $cursodesc, $cursoid);

    $stmt->execute();
    
    $stmt->close();
    $mysqli->close();
    
    echo "<div class='alert alert-dismissible alert-success'>
            <button type='button' class='close' data-dismiss='alert'>×</button>
            <strong>OK: </strong> <p>El curso &quot;".$cursonombre."&quot; fue <strong>editado</strong> exitosamente.</p>
        </div>";
}
else
{
    echo "<div class='alert alert-dismissible alert-danger'>
            <button type='button' class='close' data-dismiss='alert'>×</button>
            <strong>ERROR: </strong> <p>No se recibió ningún dato.</p>
        </div>";
}
?>