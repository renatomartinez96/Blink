<?php
if(isset($_POST["codigo"]) && isset($_POST["curnombre"]))
{
    include_once '../assets/includes/db_conexion.php';
    include_once '../assets/includes/funciones.php';
    sec_session_start();
    
    $cursotodrop = $_POST["codigo"];
    $cursonombre = $_POST["curnombre"];
    
    $stmt = $mysqli->prepare("UPDATE curso SET `curEstado`= 0 WHERE idcurso = ?");
    $stmt->bind_param("s", $cursotodrop);

    
    $stmt->execute();
    
    $stmt->close();
    $mysqli->close();
    
    echo "<div class='alert alert-dismissible alert-success'>
            <button type='button' class='close' data-dismiss='alert'>×</button>
            <strong>OK: </strong> <p>El curso &quot;".$cursonombre."&quot; fue <strong>bloqueado</strong>, para reactivarlo ve <a href='activeCur.php' class='alert-link'>aquí</a>.</p>
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