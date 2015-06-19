<?php
    include_once '../assets/includes/db_conexion.php';
    include_once '../assets/includes/funciones.php';
    sec_session_start();
    $user = $_SESSION['username'];
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
    <script src="js/upload.js"></script>
</head>
    <body>
        <div class="container-fluid">
            <div class='col-sm-2 full bg-warning'>
                <div class='col-xs-12 full text-center'><h4>File</h4></div>
                <div class='col-xs-12 full'>
                    <form action='#' enctype='multipart/form-data' method='post'>
                        <input type='file' class='form-control btn btn-warning' name='file' accept='image/*|video/*' multiple>
                        <input class='btn btn-warning form-control' type='submit' name='submit' value='Subir archivo'>
                    </form>
                </div>
                <div class='col-xs-12 full' style='padding-top:5px;padding-bottom:5px;'>
                    <div class='col-xs-4 text-center'>
                        <a href='#' class='btn btn-warning' data-toggle='popover' tabindex='0' data-trigger='focus' title='giveitaway giveitaway' data-content='lel Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum dictum mi et auctor ultrices.' data-placement='right'><i class='fa fa-info'></i></a>
                    </div>
                </div>
            </div>
        </div>
        
	</body>
</html>