<?php
include_once 'assets/includes/db_conexion.php';
include_once 'assets/includes/funciones.php';
 
sec_session_start();
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
            $titulodelapagina = "¡Bienvenido a BLink!";
			include 'main_css.php';
		?>
		<!--/#Core CSS-->
	</head>
	<body>
		<?php 
            if (login_check($mysqli) == true) { 
                $user = $_SESSION['username']; 
                $stmt = $mysqli->prepare("SELECT log, correo, token, estado FROM usuarios_tb WHERE usuario = ?");
                $stmt->bind_param('s', $user);
                $stmt->execute();  
                $stmt->store_result();
                $stmt->bind_result($log,$correo,$token,$estado);
                $stmt->fetch();
                if ($log == 0) 
                {
                    if ($estado == 0) 
                    {
                        if (isset($_POST['token'])) 
                        {
                            if ($_POST['token'] == $token) 
                            {
                                $stmt = $mysqli->prepare("UPDATE usuarios_tb SET estado = ?, token = ? WHERE usuario = ?");
                                $estad = 1;
                                $tkn = '';
                                $stmt->bind_param('sss', $estad, $tkn, $_SESSION['username']);
                                $stmt->execute();
                                header('Location: home.php');
                            }
                            else
                            {
                                echo "
                                    <div class='container text-center' id='formtoken'>
                                        <form class='text-center' action='home.php' method='post'>
                                            <h1 class='junction-bold'>Blink</h1>
                                            <ul class='pagination'>
                                                <li class='active'><a>Activacion de cuenta</a></li>
                                                <li><a>Avatar</a></li>
                                                <li><a>Listo!</a></li>
                                            </ul>
                                            <h4 class='junction'>Bienvenid@ a Blink, para continuar con el proceso de registro, es necesario la activacion de tu cuenta. Hemos enviado un codigo de activacion a la siguiente direccion de correo electronico <strong>$correo</strong>! Por favor verifica tu correo.</h4>
                                            <center>
                                                <fieldset style='width:50%;'>
                                                    <legend>Codigo de activacion</legend>
                                                    <div class='form-group'>
                                                        <label class='col-lg-3 control-label' for='token'>Codigo de activacion</label>
                                                        <div class='col-lg-9'>
                                                            <input type='text' name='token' maxlength='32' id='token' placeholder='Codigo de activacion' class='form-control input-sm'/>            
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <input type='submit' id='submtoken' class='btn btn-success form-control' value='Enviar' onclick='return tokenverify(this.form,this.form.token);'>
                                                    <br>
                                                    <br>
                                                    <div class='alert alert-dismissible alert-danger'>
                                                    
                                                          <button type='button' class='close' data-dismiss='alert'>×</button>
                                                          <strong>El codigo de activacion es invalido</strong>
                                                    </div>
                                                </fieldset>
                                            </center>
                                        </form>
                                        <br>
                                        <a href='cerrar_sesion.php'><input type='button' class='btn btn-danger' value='Salir'></a>
                                    </div>
                                ";
                            }
                        }
                        else
                        {
                            echo "
                                <div class='container text-center' id='formtoken'>
                                    <form class='text-center' action='home.php' method='post'>
                                        <h1 class='junction-bold'>Blink</h1>
                                        <ul class='pagination'>
                                            <li class='active'><a>Activacion de cuenta</a></li>
                                            <li><a>Avatar</a></li>
                                            <li><a>Listo!</a></li>
                                        </ul>
                                        <h4 class='junction'>Bienvenid@ a Blink, para continuar con el proceso de registro, es necesario la activacion de tu cuenta. Hemos enviado un codigo de activacion a la siguiente direccion de correo electronico <strong>$correo</strong>! Por favor verifica tu correo.</h4>
                                        <center>
                                            <fieldset style='width:50%;'>
                                                <legend>Codigo de activacion</legend>
                                                <div class='form-group'>
                                                    <label class='col-lg-3 control-label' for='token'>Codigo de activacion</label>
                                                    <div class='col-lg-9'>
                                                        <input type='text' name='token' maxlength='32' id='token' placeholder='Codigo de activacion' class='form-control input-sm'/>            
                                                    </div>
                                                </div>
                                                <br>
                                                <input type='submit' id='submtoken' class='btn btn-success form-control' value='Enviar' onclick='return tokenverify(this.form,this.form.token);'>
                                            </fieldset>
                                        </center>
                                    </form>
                                    <br>
                                    <a href='cerrar_sesion.php'><input type='button' class='btn btn-danger' value='Salir'></a>
                                </div>
                            ";
                        }
                    }
                    else
                    {
                        echo "<center>
                                <h1 class='junction-bold'>Blink</h1>
                                <ul class='pagination'>
                                    <li><a>Activacion de cuenta</a></li>
                                    <li class='active'><a>Avatar</a></li>
                                    <li><a>Listo!</a></li>
                                </ul>
                                <h3 class='junction-light'>Elige un avatar</h3>
                                <h4 class='junction'>Bienvenid@ a Blink, para continuar con el proceso de registro, es neceario la eleccion de un avatar el cual se utilizara como imagen de perfil de tu cuenta.</h4>
                                <br><br>
                            </center>";
                        for($i = 1; $i <= 21; $i++){
                            echo "<div class='col-xs-1 col-md-1'>
                                    <a onclick=\"return bootbox.confirm('Are you sure?', function(result) {if(result==true){window.location.href='?avatar=".$i."'}})\" class='thumbnail' style='padding:0px;'>
                                        <img  src='assets/img/avatares/".$i.".png'>
                                    </a>
                                </div>";
                            $e = $i + 21;
                            echo "<div class='col-xs-1 col-md-1'>
                                    <a onclick=\"return bootbox.confirm('Are you sure?', function(result) {if(result==true){window.location.href='?avatar=".$e."'}})\" class='thumbnail' style='padding:0px;'>
                                        <img  src='assets/img/avatares/".$e.".png'>
                                    </a>
                            </div>";
                        }
                        if (isset($_GET['avatar'])) {
                            $avatar =  $_GET['avatar'];
                            $stmt = $mysqli->prepare("UPDATE usuarios_tb SET avatar = ?, log = ? WHERE usuario = ?");
                            $log = '1';
                            $stmt->bind_param('sss', $avatar, $log, $_SESSION['username']);
                            $stmt->execute();  
                            echo "<script>window.location.href='student/index.php'</script>";
                            $nombre = "users/".$_SESSION['username'];
                            if(!mkdir($nombre, 0777, true)) {
                                die('Fallo al crear las carpetas...');
                            }else{
                                mkdir($nombre."/css", 0777, true);
                                mkdir($nombre."/img", 0777, true);
                                fopen($nombre."/css/index.css", "a+");
                                fopen($nombre."/index.html", "a+");
                            }
                        }
                    }
                }
                else
                {
                    switch($_SESSION['tipo'])
                    {
                        case 1:
                            header("location:admin/index.php");
                        break;
                        case 2:
                            header("location:teacher/index.php");   
                        break;
                        case 3:
                            header("location:student/index.php");
                        break;
                    }
                    
                }
            }
            ?>
    
    <script src="assets/js/jquery.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/bootbox.min.js" type="text/javascript"></script>
	</body>
</html>
