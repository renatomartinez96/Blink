<!--

Copyright (c) 2015 Blink
All Rights Reserved
 
This product is protected by copyright and distributed under
licenses restricting copying, distribution, and decompilation.

Gerardo López | Iván Graciano | Renato Andres

-->
<?php
    include_once '../../assets/includes/db_conexion.php';
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    $string = "";
    if (isset($_POST['search']))
    {
        if (!empty($_POST['search']))
        {
            $SearchString = $_POST['search'];
            if($lang == "en")
            {
                $query = "SELECT `id`, `date`, `name`, `nombre`, `user`, `lang` FROM `forum-post` where `name` LIKE '%".$SearchString."%' LIMIT 4";
            } 
            elseif($lang == "es")
            {
                $query = "SELECT `id`, `date`, `name`, `nombre`, `user`, `lang` FROM `forum-post` where `nombre` LIKE '%".$SearchString."%' LIMIT 4";
            }
            else
            {
                $query = "SELECT `id`, `date`, `name`, `nombre`, `user`, `lang` FROM `forum-post` where `nombre` LIKE '%".$SearchString."%' LIMIT 4";
            }
            if($stmt1 = $mysqli->prepare($query))
            {
                $stmt1->execute();
                $stmt1->store_result();
                $stmt1->bind_result($tabla_forum[0],$tabla_forum[1],$tabla_forum[2],$tabla_forum[3],$tabla_forum[4],$tabla_forum[5]);
                if ($stmt1->num_rows > 0)
                {   
                    while($stmt1->fetch())
                    {
                        if($lang == "en")
                        {
                            $string .= "<a href='./?s=". $tabla_forum[0] ."' class='list-group-item'>";
                            $string .= "<h5 class='list-group-item-heading'>" . $tabla_forum[2] . "</h5>";
                            $string .= "<h6 class='list-group-item-text'>" . $tabla_forum[1] . "</h6></a>";
                        } 
                        elseif($lang == "es")
                        {
                            $string .= "<a href='./?s=". $tabla_forum[0] ."' class='list-group-item'>";
                            $string .= "<h5 class='list-group-item-heading'>" . $tabla_forum[3] . "</h5>";
                            $string .= "<h6 class='list-group-item-text'>" . $tabla_forum[1] . "</h6></a>";
                        }
                        else
                        {
                            $string .= "<a href='./?s=". $tabla_forum[0] ."' class='list-group-item'>";
                            $string .= "<h5 class='list-group-item-heading'>" . $tabla_forum[3] . "</h5>";
                            $string .= "<h6 class='list-group-item-text'>" . $tabla_forum[1] . "</h6></a>";

                        }
                    }
                }
                else
                {
                    if($lang == "en")
                    {
                        $string .= "
                            <a href='#' class='list-group-item'>
                            <h5 class='list-group-item-heading'>Error</h5>
                            <h6 class='list-group-item-text'>No results to show</h6></a>";
                    } 
                    elseif($lang == "es")
                    {
                        $string .= "
                            <a href='#' class='list-group-item'>
                                <h5 class='list-group-item-heading'>
                                    Error
                                </h5>
                                <h6 class='list-group-item-text'>
                                    No hay resultados para mostrar
                                </h6>
                            </a>";
                    }
                    else
                    {
                        $string .= "
                            <a href='#' class='list-group-item'>
                                <h5 class='list-group-item-heading'>
                                    Error
                                </h5>
                                <h6 class='list-group-item-text'>
                                    No hay resultados para mostrar
                                </h6>
                            </a>";
                    }
                }
            }
        }
        else
        {
            $string = "";
        }
    }
    else
    {
        $string = "";
    }
    echo $string;
?>