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
		<!--/#Custom CSS-->
        <script type="text/JavaScript" src="assets/js/sha512.js"></script> 
        <script type="text/JavaScript" src="assets/js/forms.js"></script>
	</head>         
<body>
    <style type="text/css">
        video#bgvid 
        { 
            position: fixed; right: 0; bottom: 0;
            min-width: 100vw; min-height: 100vh;
            width: auto; height: auto; z-index: -100;
            background-size: cover;
            z-index: -1;
            filter: grayscale(50%) blur(10px);
        }
        div.estawea
            {
            background-color: #ffffff;
            } 
        @media (min-width: 768px) {
            div.centeringthis
            {
            z-index: 1;
            margin-top: 10%;
            margin-right: 30%;
            margin-left: 30%;
            } 
        }
        @media (max-width: 768px) {
            div.centeringthis
            {
            z-index: 1;
            margin-top: 15%px;
            margin-right: 5px;
            margin-left: 5px;
            }
        }
    </style>
    
    <video autoplay loop="loop" id="bgvid">
	   <source  src="assets/video/1080.webm" type="video/webm">
        <source  src="assets/video/1080.mp4" type="video/mp4">
    </video>
    
    <div class="well centeringthis">
        <h1 class="junction-bold text-center">BLink</h1>
        <?=$lang["yonoespik"]?>
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
            echo "<h4 class='junction text-center'> " . $logged . "</h4>";
        }
        ?> 
        <br>
        <form action="assets/includes/login_proceso.php" method="post" name="login_form">
            <div class="form-group">
                <p class="col-md-4" for="email"><?=$lang["emailname"]?>: </p><div class="col-md-8"><input type="text" name="email" id="email" placeholder="<?=$lang['emailexample']?>" class="form-control input-sm" required/></div> <br>
            </div>
            <div class="form-group">
                <p class="col-md-4" for="password"><?=$lang['contra']?>: </p><div class="col-md-8"><input type="password" name="password" placeholder="<?=$lang['contra']?>" id="password"  class="form-control input-sm" required/></div><br>
            </div>
            <div class="form-group">
                <div class="col-md-12"><input type="button" value="<?=$lang['entrarlog']?>" class="btn btn-success btn-block" onclick="formhash(this.form, this.form.password);" /><br> </div>
            </div>
        </form>
        <p class="text-center"><a href='registrarse.php' class='btn btn-info'><?=$lang['sincuenta']?></a></p>
        <p class="text-center"><a id="token" class='btn btn-primary' data-toggle="modal" data-target="#myModal">Olvide mi contraseña</a></p>
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
                    Header("Location: ChgPass.php?t=".$tokn.md5($usr));
                }else{
                    Header("Location: ./"); 
                }
            }
        ?>
    </div>
    
    <div class="container-fluid estawea">
        <br>
        <div class="jumbotron">
                <div class="row">
            <div class="col-md-6">
                <div class="well ">
                Look, I'm in a well!
                </div>
            </div>
            <div class="col-md-6">
                <div class="well ">
                Look, I'm in a well!
                </div>
            </div>
        </div>
        </div>
        <!--
    	-->
    </div>
    <script src="assets/js/jquery.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/bootbox.min.js" type="text/javascript"></script>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <center><h2 id="myModalLabel" class='modal-title junction-bold'>Blink</h2></center></h4>
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
</body>
</html>