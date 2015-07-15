<?php

// Se seleccionan los cursos del tutor
$stmt2 = $mysqli->query("SELECT curso.idcurso, curso.idprofesor, curso.nombre, curso.descripcion, curso.imagen, curso.curEstado FROM `curso` WHERE curso.`idprofesor` = '".$idusuario10."' AND curso.curEstado = '1'");
if($stmt2->num_rows > 0)
{
    while($row = $stmt2->fetch_assoc())
    {
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
                    <div class='panel-footer'>";
                if($buscar == $user)
                {
                    $col8 .= "<p class='junction-regular text-warning text-center'>".$langprint['sus-not']."</p>";
                }
                else
                {
                    if($tipo == 1 or $tipo == 2)
                    {
                        $col8 .= "<p class='junction-regular text-warning text-center'>".$langprint['sus-not']."</p>";
                    }
                    else
                    {
                        $stmt3 = $mysqli->query("SELECT cursoestudiante.idcurso, cursoestudiante.idestudiante FROM cursoestudiante WHERE cursoestudiante.idcurso = '".$row['idcurso']."' AND cursoestudiante.idestudiante = '".$idusuario."'");
                        if($stmt3->num_rows > 0)
                        {
                            $col8 .= "<button class='btn btn-danger btn-block' onclick=\"return bootbox.confirm('".$langprint["sus-des-sure"]."', function(result) {if(result==true){unsuscribecurso(".$row['idcurso'].",".$idusuario.")}})\">".$langprint['sus-done']." <fa class='fa fa-times'></fa></button>";
                        }
                        else
                        {
                            $col8 .= "<button class='btn btn-success btn-block' onclick=\"return bootbox.confirm('".$langprint["sus-sure"]."', function(result) {if(result==true){suscribecurso(".$row['idcurso'].",".$idusuario.")}})\">".$langprint['btn-suscribir']." <span class='glyphicon glyphicon-chevron-right'></span></button>";
                        }
                    }
                }
        $col8 .= "  </div>
                </div>
            </div>";
    }
}
else
{
    $col8 .= "<div class='alert alert-warning'>
        <p><strong>".$buscar."</strong> ".$langprint['tutor-no-course']."</p>
        </div>";
}
?>