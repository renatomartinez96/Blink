<?php
    include_once '../assets/includes/db_conexion.php';
    include_once '../assets/includes/funciones.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="../assets/css/main.css" rel="stylesheet">
<!--        <link href="../assets/css/sidebar.css" rel="stylesheet">-->
<!--        <link href="../teacher/style.css" rel="stylesheet">-->
<!--		<link href="../assets/css/sidebar.css" rel="stylesheet">-->
<!--        <script async src="../assets/js/bootstrap.min.js" type="text/javascript"></script>-->
<!--        <script src="js/jquery-2.1.1.js" type="text/javascript"></script>-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HTML generator</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
     <!-- Custom JS -->
    <script src="js/jquery-2.1.1.js" type="text/javascript"></script>
<!--    <script src="js/jquery-ui.min.js" type="text/javascript"></script>-->
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <!-- COLOR PICKER -->
    <link href="../assets/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<!--    <link href="../assets/css/docs-bootstrap-colorpicker.css" rel="stylesheet">-->
    <!-- / COLOR PICKER -->
</head>
    <body>
        <div class="container-fluid">
            <div class="col-sm-2 full bg-primary">
                <div class="col-xs-12 full text-center">
                    <h4>PARAGRAPH</h4>
                </div>
                <div class="col-xs-12 full">
                    <textarea class="form-control input-sm" style="resize: vertical;" rows="3"></textarea>
                </div>
                <div class="col-xs-12 full" style="padding-top:5px;padding-bottom:5px;">
                    <div class="col-xs-4 text-center">
                        <a href="#" class="btn btn-primary" data-toggle="popover" tabindex="0" data-trigger="focus" title="giveitaway giveitaway" data-content="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum dictum mi et auctor ultrices." data-placement="left">
                            <i class="fa fa-html5"></i>
                        </a>
                    </div>
                    <div class="col-xs-4 text-center">
                        <a href="#" class="btn btn-primary" data-toggle="popover" tabindex="0" data-trigger="focus" title="giveitaway
                                                                                                                        giveitaway" data-content="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum dictum mi et auctor ultrices." data-placement="bottom">
                            <i class="fa fa-info"></i>
                        </a>
                    </div>
                    <div class="col-xs-4 text-center">
                        <a href="#" class="btn btn-primary" data-toggle="popover" tabindex="0" data-trigger="focus" title="giveitaway
                                                                                                                        giveitaway" data-content="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum dictum mi et auctor ultrices." data-placement="right">
                            <i class="fa fa-css3"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 full bg-info">
                <div class="col-xs-12 full text-center">
                    <h4>BGCOLOR</h4>
                </div>
                <div class="col-xs-12 full">
<!--                    <input type="text" onkeypress="return onlynums(event)" class="form-control">-->
                    <div class="input-group demo2">
                        <input type="text" value="#ffffff" class="form-control colorpicker-element" maxlength="7" data-format="hex"/>
                        <span class="input-group-addon"><i></i></span>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 full bg-info">
                <div class="col-xs-12 full text-center">
                    <h4>MEASURES</h4>
                </div>
                <div class="col-xs-12 full form-inline">
<!--                    <input type="text" onkeypress="return onlynums(event)" class="form-control">-->
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputn1" onkeypress="return onlynums(event)" />
                        <div class="input-group-addon">
                            <div class="dropdown">
                                <a id="dLabel" data-target="#" class="btn btn-default btn-xs dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                    <li><a onclick="selectType(1)">px</a></li>
                                    <li><a onclick="selectType(2)">%</a></li>
                                    <li><a onclick="selectType(3)">vw</a></li>
                                    <li><a onclick="selectType(4)">vh</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-sm-2 full bg-success">
                <div class="col-xs-12 full text-center">
                    <h4>Width</h4>
                </div>
                <div class="col-xs-12 full">
                    <input type="text" onkeypress="return onlynums(event)" class="form-control" placeholder="Escribe aquí...">
                </div>
            </div>
<!--
            <div class="col-sm-2 full bg-success">
                <div class="col-xs-12 full text-center">
                    <h4>Width</h4>
                </div>
                <div class="col-xs-12 full">
                    <div class="input-group demo2">
                        <input type="text" value="#ffffff" class="form-control colorpicker-element" maxlength="7" data-format="hex"/>
                        <span class="input-group-addon"><i></i></span>
                    </div>
                </div>
                <div class="col-xs-12 full" style="padding-top:5px;padding-bottom:5px;">
                    <div class="col-xs-4 text-center">
                        <a href="#" class="btn btn-success" data-toggle="popover" tabindex="0" data-trigger="focus" title="giveitaway giveitaway" data-content="lel Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum dictum mi et auctor ultrices." data-placement="right">
                            <i class="fa fa-info"></i>
                        </a>
                    </div>
                </div>
            </div>
-->
            <div class="col-sm-2 full bg-warning">
                <div class="col-xs-12 full text-center">
                    <h4>File</h4>
                </div>
                <div class="col-xs-12 full">
                    <button class="btn form-control btn-warning btn-file btn-sm inputrounded" style="position: relative; overflow: hidden; border:0px;">
                        Seleccionar Archivo<input type="file" name="file" id="photo-file" accept='image/*|video/*' style="position: absolute;top: 0;right: 0;min-width: 100%;min-height: 100%;font-size: 100px;text-align: right;filter: alpha(opacity=0);opacity: 0;outline: none;background: white;cursor: inherit;display: block;
">
                    </button>
                </div>
                <div class="col-xs-12 full" style="padding-top:5px;padding-bottom:5px;">
                    <div class="col-xs-4 text-center">
                        <a href="#" class="btn btn-warning" data-toggle="popover" tabindex="0" data-trigger="focus" title="giveitaway giveitaway" data-content="lel Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum dictum mi et auctor ultrices." data-placement="right">
                            <i class="fa fa-info"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
     <script> 
$(document).ready(function(){

    $('[data-toggle="popover"]').popover();   

});
// FUNCIÓNES DE LAS MEDIDAS DE CSS
    function selectType(usrselect){
        var t1 = "px"; 
        var t2 = "%"; 
        var t3 = "vw";
        var t4 = "vh";
        var typetoprint = "";
        switch(usrselect) 
        {
            case 1:
                typetoprint = t1;
            break;
            case 2:
                typetoprint = t2;
            break;
            case 3:
                typetoprint = t3;
            break;
            case 4:
                typetoprint = t4;
            break;
            default:
                typetoprint = t1;
        }
        var inputn1 = document.getElementById("inputn1");
        inputn1.value = inputn1.value + typetoprint;
    }
    function addText(){
        var inputn1 = document.getElementById("inputn1");
        inputn1.value = inputn1.value + typetoprint;
    }
// / FUNCIÓNES DE LAS MEDIDAS DE CSS
    function onlynums(e){
        var   key=e.keyCode || e.which;
        var  teclado = String.fromCharCode(key).toLowerCase();
        var   letras ="0123456789";
        var   especiales="8-37-38-46-164";

        var  teclado_especial = false;

        for(var i in especiales){
              if(key==especiales[i]){
                    teclado_especial=true;break;
              }
        }
        if(letras.indexOf(teclado)==-1 && !teclado_especial){
              return false;
        }
    }
 </script>
        <!-- COLOR PICKER -->
        <script src="../assets/js/bootstrap-colorpicker.min.js"></script>
<!--        <script src="../assets/js/docs-bootstrap-colorpicker.js"></script>-->
        <script>
            $(function(){
                $('.demo2').colorpicker({
                format: 'hex',
                });
            });
        </script>
        <!-- / COLOR PICKER -->
	</body>
</html>
