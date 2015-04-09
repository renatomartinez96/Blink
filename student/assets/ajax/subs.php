<?php
    require_once '../../../assets/includes/db_conexion.php';
    if (isset($_POST['accion'], $_POST['docente'], $_POST['usuario'])) 
    {
        $accion = $_POST['accion'];
        $docente = $_POST['docente'];
        $estudiante = $_POST['usuario'];
        $stmt = $mysqli->query("SELECT * FROM `docente-estudiante` WHERE idEstudiante = '".$estudiante."' AND idDocente = '".$docente."'");
        if ($accion == "sus")
        {
            if ($stmt->num_rows > 0) 
            {
                echo "error al tratar de suscribirse a ".$docente;
            }
            else
            {
                $stmt1 = $mysqli->prepare("INSERT INTO `docente-estudiante` VALUES(?,?,?)");
                $id = '';
                $stmt1->bind_param('sss',$id, $docente, $estudiante);
                if ($stmt1->execute())
                {
                    echo "subscrito correctamente";
                }
                else
                {
                    echo "error al suscribirse";
                }
            }
        }
        else
        {
            if ($accion == "des")
            {
                if ($stmt->num_rows > 0) 
                {
                    $stmt2 = $mysqli->query("DELETE FROM `docente-estudiante` WHERE idEstudiante = '".$estudiante."' AND idDocente = '".$docente."'");
                    echo "desubscrito correctamente";
                }
                else
                {
                    echo "error al desinscribirse";
                }
            }
            else
            {
                echo "Error";
            }

        }
    }
    else
    {
        
    }
?>