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
    
</head>
    <body>
        <div class="container-fluid">
            <div class="col-sm-2 full bg-info">
                <div class="col-xs-12 full text-center">
                    <h4>Parrafo</h4>
                </div>
                <div class="col-xs-12 full">
                    <textarea class="form-control input-sm" style="resize: vertical;" rows="3" placeholder="Texto..."></textarea>
                </div>
                <div class="col-xs-12 full" style="padding-top:5px;padding-bottom:5px;">
                    <div class="col-xs-4 text-center">
                        <a href="#" class="btn btn-info" data-toggle="popover" tabindex="0" data-trigger="focus" title="giveitaway
                                                                                                                        giveitaway" data-content="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum dictum mi et auctor ultrices." data-placement="right">
                            <i class="fa fa-info"></i>
                        </a>
                    </div>
                    <div class="col-xs-4 text-center">
                        <a href="#" class="btn btn-info" data-toggle="popover" tabindex="0" data-trigger="focus" title="giveitaway
                                                                                                                        giveitaway" data-content="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum dictum mi et auctor ultrices." data-placement="right">
                            <i class="fa fa-html5"></i>
                        </a>
                    </div>
                    <div class="col-xs-4 text-center">
                        <a href="#" class="btn btn-info" data-toggle="popover" tabindex="0" data-trigger="focus" title="giveitaway
                                                                                                                        giveitaway" data-content="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum dictum mi et auctor ultrices." data-placement="right">
                            <i class="fa fa-css3"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
     <script> 
$(document).ready(function(){

    $('[data-toggle="popover"]').popover();   

});
 </script>
	</body>
</html>
