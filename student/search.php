<?php
include_once '../assets/includes/db_conexion.php';
    if (isset($_POST['search'])) 
    {
        if (!empty($_POST['search'])) 
        {
            $SearchString = $_POST['search'];
            $stmt = $mysqli->query("SELECT nombres, correo, usuario FROM usuarios_tb WHERE tipo = 3 AND nombres LIKE '%".$SearchString."%' OR usuario LIKE '%".$SearchString."%' OR apellidos LIKE '%".$SearchString."%' OR correo LIKE '%".$SearchString."%' LIMIT 8");
            $string = "";
            if ($stmt->num_rows > 0)
            {
                while ($row = $stmt->fetch_array()) {
                    $string .= "
                        <a href='perfil.php?u=".$row['usuario']."' class='list-group-item'>
                            <h5 class='list-group-item-heading'>
                                ".$row['nombres']." <span class='label label-primary'>".$row['usuario']."</span>
                            </h5> 
                            <h6 class='list-group-item-text'>
                                ".$row['correo']."
                            </h6>
                        </a>";
                }
            }
            else
            {  
                $string .= "
                        <a href='#' class='list-group-item'>
                            <h5 class='list-group-item-heading'>
                                Error
                            </h5> 
                            <h6 class='list-group-item-text'>
                                no hay resultados para mostrar
                            </h6>
                        </a>";
            }
        }
        else
        {
            $string = "";
        }
        echo $string;
    }
?>