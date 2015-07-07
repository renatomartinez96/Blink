<?php
if(isset($_POST["revid"]) && isset($_POST["revname"]) && isset($_POST["revstatus"]))
{
    $revid = $_POST["revid"];
    $revname = $_POST["revname"];
    $revstatus = $_POST["revstatus"];
    
    include_once '../assets/includes/db_conexion.php';
    include_once '../assets/includes/funciones.php';
    sec_session_start();

    if($revstatus == 1)
    {
        $stmt = $mysqli->prepare("UPDATE leccion SET `lecEstado`= 0 WHERE idleccion = ?");
        $stmt->bind_param("s", $revid);

        $stmt->execute();

        $stmt->close();
        $mysqli->close();
        echo "<div class='alert alert-dismissible alert-success'>
                    <button type='button' class='close' data-dismiss='alert'>×</button>
                    <strong>OK: </strong> <p>La lección &quot;".$revname."&quot; fue <strong>bloqueada</strong>.</p>
            </div>";
    }
    elseif($revstatus == 0)
    {
        $stmt = $mysqli->prepare("UPDATE leccion SET `lecEstado`= 1 WHERE idleccion = ?");
        $stmt->bind_param("s", $revid);

        $stmt->execute();

        $stmt->close();
        $mysqli->close();
        echo "<div class='alert alert-dismissible alert-success'>
                    <button type='button' class='close' data-dismiss='alert'>×</button>
                    <strong>OK: </strong> <p>La lección &quot;".$revname."&quot; fue <strong>reactivada</strong>.</p>
            </div>";
    }
}
else
{
    echo "<div class='alert alert-dismissible alert-danger'>
        <button type='button' class='close' data-dismiss='alert'>×</button>
        <strong>ERROR: </strong> <p>No se recibió ningún dato.</p>
    </div>";
}
?>