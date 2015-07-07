<?php
if(isset($_POST["revid"]) && isset($_POST["revname"]) && isset($_POST["revdesc"]) && isset($_POST["revteo"]))
{
    $revid = $_POST["revid"];
    $revname = $_POST["revname"];
    $revdesc = $_POST["revdesc"];
    $revteo = $_POST["revteo"];
    
    include_once '../assets/includes/db_conexion.php';
    include_once '../assets/includes/funciones.php';
    sec_session_start();


    $stmt = $mysqli->prepare("UPDATE leccion SET `nombre`= ? , `descripcion` = ? , `teoria` = ? WHERE idleccion = ?");
    $stmt->bind_param("ssss", $revname, $revdesc, $revteo, $revid);

    $stmt->execute();

    $stmt->close();
    $mysqli->close();
    echo "<div class='alert alert-dismissible alert-success'>
            <button type='button' class='close' data-dismiss='alert'>×</button>
            <strong>¡Perfecto! </strong> <p>La lección &quot;".$revname."&quot; fue <strong>editada</strong> con exito.</p>
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