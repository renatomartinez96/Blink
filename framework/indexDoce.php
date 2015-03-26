<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HTML generator</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
     <!-- Custom JS -->
    <script src="js/jquery-2.1.1.js" type="text/javascript"></script>
    <script>
        <?php 
            include "app/ejecucionDoce.php";
        ?>
    </script>
    <script src="js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    
</head>
    <body>
        <?php 
            include "app/graphic.php";
        ?>
            <div class="modal fade" id="modalDesc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Add description</h4>
                      </div>
                      <div class="modal-body">
                        <textarea class="valueDescription"></textarea>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary saveDescription">Save changes</button>
                      </div>
                    </div>
                  </div>
            </div>
    </body>
</html>
