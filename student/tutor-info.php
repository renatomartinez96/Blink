<style>
    #usrpanel{
        background: #191837 url(../assets/img/userbanner/<?=$banner1?>.png) fixed;
        color:#fff;
        background-position: bottom left;
        background-size:100%;
    }
    .usrnav{
        background-color: transparent  !important;
        border-color: transparent  !important;
        margin-bottom:0px;

    }
    .portfolio-item {
        margin-bottom: 25px;
        margin-top:15px;
    }
    #usrpanel{
        background: #191837 url(../assets/img/userbanner/<?=$banner1?>.png) fixed;
        color:#fff;
        background-position: bottom left;
        background-size:100%;
    }
    .usrnav{
        background-color: transparent  !important;
        border-color: transparent  !important;
        margin-bottom:0px;

    }
    .portfolio-item {
        margin-bottom: 25px;
        margin-top:15px;
    }
</style>
<?php
// LA WEAAAA
$stmt2 = $mysqli->query(" SELECT * FROM `curso` WHERE `idprofesor` = '".$usrid1."' ");
if ($stmt2->num_rows > 0)
{
    while($row = $stmt2->fetch_assoc()){
        echo "
            <div class='col-md-6 col-xs-12 full'>
                <div class='panel panel-default'>
                    <div class='panel-body'>
                        <div class='row'>
                        <div class='col-xs-4'>
                            <img class='img-responsive' src='../assets/img/pro/".$row['imagen'].".png' alt=''>
                        </div>
                        <div class='col-xs-8'>
                            <h3 class='junction-regular'>".$row['nombre']." <small>".$nombres1."</small></h3>
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
    echo "<div class='alert alert-warning'>
        <p><strong>".$usuario1."</strong> ".$langprint['tutor-no-course']."</p>
        </div>";
}
?>