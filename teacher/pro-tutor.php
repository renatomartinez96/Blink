<?php

// Se seleccionan los cursos del tutor
$stmt2 = $mysqli->query(" SELECT * FROM `curso` WHERE `idprofesor` = '".$idusuario10."' ");
if ($stmt2->num_rows > 0)
{
    while($row = $stmt2->fetch_assoc()){
        $col8 .= "
            <div class='col-md-6 col-xs-12 full'>
                <div class='panel panel-default'>
                    <div class='panel-body'>
                        <div class='row'>
                        <div class='col-xs-4'>
                            <img class='img-responsive' src='../assets/img/pro/".$row['imagen'].".png' alt=''>
                        </div>
                        <div class='col-xs-8'>
                            <h3 class='junction-regular'>".$row['nombre']." <small>".$buscar."</small></h3>
                            <p class='text-justify'>".$row['descripcion']."</p>
                        </div>
                    </div>
                    </div>
                    <div class='panel-footer'>
                        <a href='#'><button class='btn btn-success btn-block' onclick=\"return bootbox.confirm('".$langprint["sus-sure"]."', function(result) {if(result==true){suscribecurso(".$row['idcurso'].",".$idusuario.")}})\">".$langprint['btn-suscribir']." <span class='glyphicon glyphicon-chevron-right'></span></button></a>
                    </div>
                </div>
            </div>
        ";
    }
}
else
{
    $col8 .= "<div class='alert alert-warning'>
        <p><strong>".$usuario1."</strong> ".$langprint['tutor-no-course']."</p>
        </div>";
}
?>