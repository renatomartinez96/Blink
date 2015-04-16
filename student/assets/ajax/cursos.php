<?php
    require_once '../../../assets/includes/db_conexion.php';
    if (isset($_POST['accion'], $_POST['usuario'], $_POST['curso'])) 
    {
        $accion = $_POST['accion'];
        $curso = $_POST['curso'];
        $estudiante = $_POST['usuario'];
        $stmt = $mysqli->query("SELECT * FROM `cursoestudiante` WHERE idestudiante = '".$estudiante."' AND idcurso = '".$curso."'");
        if ($accion == "cursosub")
        {
            if ($stmt->num_rows > 0) 
            {
                echo "error al tratar de suscribirse a ".$docente;
            }
            else
            {
                if ($mysqli->query("INSERT INTO `cursoestudiante`(`idcurso`, `idestudiante`) VALUES('".$curso."','".$estudiante."')"))
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
            if ($accion == "cursodes")
            {
                if ($stmt->num_rows > 0) 
                {
                    $stmt2 = $mysqli->query("DELETE FROM `cursoestudiante` WHERE idestudiante = '".$estudiante."' AND idcurso = '".$curso."'");
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