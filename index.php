<?php
include_once 'assets/includes/db_conexion.php';
include_once 'assets/includes/funciones.php';

if(isset($_GET["lang"]))
{
    if($_GET["lang"]=="en")
    {
        include "assets/lang/ivan-en.php";
    }
    else
    {
        include "assets/lang/ivan-es.php";
    }
}
else
{
    include "assets/lang/ivan-es.php";
}
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = "Ya iniciaste sesión ._.";
} else {
    $logged = $lang["nosession"];
}
?>
<!--

Copyright (c) 2015 Blink
All Rights Reserved
 
This product is protected by copyright and distributed under
licenses restricting copying, distribution, and decompilation.

Gerardo López | Iván Nolasco | Renato Andres

-->

<!DOCTYPE html>
<html lang="en">
	<head>
		<!--Core CSS-->
		<?php
            // Titulo de esta página:
            $titulodelapagina = $lang["welcomeblink"];
			include 'main_css.php';
		?>
        <!--/#Core CSS-->
        
		<!--Custom CSS-->
		<link href="assets/css/sidebar.css" rel="stylesheet">
        <style type="text/css">
            
        </style>
		<!--/#Custom CSS-->
        <script type="text/JavaScript" src="assets/js/sha512.js"></script> 
        <script type="text/JavaScript" src="assets/js/forms.js"></script>
	</head>         
<body>
    <style type="text/css">
        html, body{
            width: 100%;
            height: 100%;
            -webkit-font-smoothing: antialiased;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        .alto{
            height: 50px;
            padding-top: 5px;
            bottom: 0px; 
            position: relative; !important
        }
        .bajo{
            height: 50px;
            padding-top: 5px;
        }
        .tigres{
            margin-left: 15px; !important
            margin-right: 5px; !important
        }
        .nomargenplz{
            margin: 0; !important
            padding: 0; !important
        }
        .textoslide{
            padding-top: 80px; !important
            text-shadow: 0px 0px 6px rgba(255,255,255,0.7);
        }
        .banner { 
            margin-left: 0px;
            position: relative; 
            overflow: auto;
            width: 100%; !important
        }
        .banner li { 
            padding: 0px;
            list-style: none;
        }
        .banner ul{
            width: 400%; !important
        }
        .banner ul li { 
            float: left;
            padding: 4.5%;
        }
    </style>    
    <!--Nav -->
    <nav class="navbar navbar-inverse alto navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
            <span class="sr-only">Box Link</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="assets/img/brand1.png" class="img-responsive tigres" alt="Box Link :)" width="100"></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Inicio <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Info</a></li>
            <li><a href="#">How works?</a></li>
            <li><a href="#">Social :v</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <form class="navbar-form navbar-left" action="assets/includes/login_proceso.php" method="post" name="login_form">
            <div class="form-group">
                <!--<label class="control-label" for="email">Tu correo</label>-->
              <input type="text" name="email" id="email" placeholder="<?=$lang['emailexample']?>" class="form-control input-sm" required>
            </div>
            <div class="form-group">
                <!--<label class="control-label" for="password">Tu contraseña</label>-->
              <input type="password" name="password" placeholder="<?=$lang['contra']?>" id="password" class="form-control input-sm" required>
            </div>
            <input type="button" value="<?=$lang['entrarlog']?>" class="btn btn-success btn-sm" onclick="formhash(this.form, this.form.password);" />
            <a id="token" data-toggle="modal" data-target="#myModal" class='btn btn-primary btn-sm' title="Olvide mi contraseña"><i class="fa fa-key"></i><i class="fa fa-exclamation"></i></a>
            <a href='registrarse.php' class='btn btn-info btn-sm'>No tengo cuenta</a>
            </form>
          </ul>
        </div>
      </div>
    </nav>
    <!--/Nav -->
        <?//=$lang["yonoespik"]?>
        <?php
        if (isset($_GET['error'])) 
        {
            echo "<p class='text-danger text-center'>¡Ups! Ocurrió un error al iniciar sesión, <a href='index.php'>intentalo de nuevo</a>.</p>";
        }
        if (login_check($mysqli) == true) 
        {
            header('location:student/profile.php');
        } 
        else 
        {
            //echo "<h4 class='junction text-center'> " . $logged . "</h4>";
        }
        ?>
        <?php
            if (isset($_GET['t'])) 
            {
                $tkn = $_GET['t'];
                $stmt = $mysqli->prepare("SELECT token, usuario FROM usuarios_tb WHERE token =  ?");
                $stmt->bind_param('s', $tkn);
                $stmt->execute(); 
                $stmt->store_result();
                $stmt->bind_result($tokn, $usr);
                $stmt->fetch();
                if ($stmt->num_rows == 1){
                    header("Location: ChgPass.php?t=".$tokn.md5($usr));
                }else{
                    header("Location: ./"); 
                }
            }
        ?>
    
    <div class="nomargenplz container-fluid">
        <div class=" row">
            <div class="banner">
                <ul>
                    <li style="background-image: url('https://download.unsplash.com/reserve/3wBPUcDrR9KaduD3PvkY_DSC_0915.JPG');">
                        <h1 class="junction-bold textoslide" >Bienvenido a Box Link</h1>
                        <p class="junction-regular">Donde aprender diseño Web es una experiencia divertida y dinamica</p>
                    </li>
                    
                    <li style="background-image: url('http://static.pexels.com/wp-content/uploads/2014/06/camera-desk-earphone-915.jpg');">
                        <h1 class="junction-bold textoslide">HTML5 y CSS3</h1>
                        <p class="junction-regular">Enseñandote lo último en front-end, lo más fresco a ofrecer ;)</p>
                    </li>
                    
                    <li style="background-image: url('https://download.unsplash.com/reserve/wi9yf7kTQxCNeY72cCY6_Images%20of%20Jenny%20Lace%20Plasticity%20Publish%20(4%20of%2025).jpg');">
                        <h1 class="junction-bold textoslide">¡Tan fácil para todos!</h1>
                        <p class="junction-regular">Te invitamos a leer nuestra <a href="#" class="btn btn-info btn-xs">sección de información</a> y así conoscas el método de enseñanza más revolucionario del mundo</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="row"> 
            <h1 class="junction-bold text-center">How Box Link works?</h1>
            
        </div>
    </div>
    <script src="assets/js/jquery.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/bootbox.min.js" type="text/javascript"></script>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <center><h2 id="myModalLabel" class='modal-title junction-bold'>Blink</h2></center>
                </div>
                <div class="modal-body">
                    <form class='text-center'>
                        <p>Para poder reestablecer tu contraseña necesitamos que nos brindes tu direccion de correo electronico que tienes registrado con Blink. Te haremos llegar un correo con la informacion necesaria para la transsaccion</p>
                        <div class='form-group'>
                            <label class='col-lg-3 control-label' for='mail'>Correo Electronico</label>
                            <div class='col-lg-9'>
                                <input type='text' name='mail' maxlength='32' id='mail' placeholder='Correo Electronico' class='form-control input-sm'/> 
                            </div>
                        </div>
                        <br>
                        <br>
                        <input type='button' id='submtoken' class='btn btn-success form-control' value='Enviar'>
                    </form>
                </div>
                <div class="modal-footer">
                    <h6 class="junction-light"><strong>Blink 2015</strong> todos los derechos reservados</h6>
                </div>
            </div>
        </div>
    </div>
    <!-- Slide -->
    <script>
        $(function() {
            $('.banner').unslider();
        });
    </script>
    <script>
        $(document).ready(function(){
            function validateEmail($email) {
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                return emailReg.test( $email );
            }
            $("#submtoken").click(function(){
                if($("#mail").val() == ''){
                    bootbox.alert({
                        title: "<center><h2 class='junction-bold'>Blink</h2></center>",
                        message: "<center><h5 class='junction-light'>Para poder continuar debe ingresar su correo electronico</h5></center>",
                    });
                }else{
                    if(validateEmail($("#mail").val())) { 
                        var send = {"email" : $("#mail").val()};
                        $.ajax({
                            type: "POST",
                            url: "mailpass.php",
                            data: send,
                            success: function(response) {
                                bootbox.alert({
                                    title: "<center><h2 class='junction-bold'>Blink</h2></center>",
                                    message: "<center><h5 class='junction-light'>"+response+"</h5></center>",
                                });
                            }
                        });
                    }else{
                        bootbox.alert({
                            title: "<center><h2 class='junction-bold'>Blink</h2></center>",
                            message: "<center><h5 class='junction-light'>Para poder continuar debe ingresar una direccion de correo electronico valida</h5></center>",
                        });
                    }
                }
            });
        });
        
    
    </script>
    <script src="assets/js/unslider.js"></script>
    <?php include "main_js.php"; ?>
</body>
</html>