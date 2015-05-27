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
        <style>
            body{
                overflow:hidden;
            }
        </style>
		<!--/#Core CSS-->
	</head>
	<body>
		<?php 
            if (login_check($mysqli) == true) { 
                $user = $_SESSION['username']; 
                $stmt = $mysqli->prepare("SELECT idusuario, log, correo, token, estado, tipo FROM usuarios_tb WHERE usuario = ?");
                $stmt->bind_param('s', $user);
                $stmt->execute();  
                $stmt->store_result();
                $stmt->bind_result($id,$log,$correo,$token,$estado,$tipo);
                $stmt->fetch();
                function imprimirformulario($correo)
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
                                <h4 class='junction'>Bienvenid@ a Blink, para continuar con el proceso de registro, es necesario la activacion de tu cuenta. Hemos enviado un codigo de activacion a la siguiente direccion de correo electronico <strong>".$correo."</strong>! Por favor verifica tu correo.</h4>
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
                function imprimirformularioerror($correo)
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
                                <h4 class='junction'>Bienvenid@ a Blink, para continuar con el proceso de registro, es necesario la activacion de tu cuenta. Hemos enviado un codigo de activacion a la siguiente direccion de correo electronico <strong>".$correo."</strong>! Por favor verifica tu correo.</h4>
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
                function imprimirformulario2($correo)
                {
                    echo "
                        <div class='container text-center' id='formtoken'>
                            <form class='text-center' action='home.php' method='post'>
                                <h1 class='junction-bold'>Blink</h1>
                                <ul class='pagination'>
                                    <li><a>Examen</a></li>
                                    <li class='active'><a>Activacion de cuenta</a></li>
                                    <li><a>Avatar</a></li>
                                    <li><a>Listo!</a></li>
                                </ul>
                                <h4 class='junction'>Bienvenid@ a Blink, para continuar con el proceso de registro, es necesario la activacion de tu cuenta. Hemos enviado un codigo de activacion a la siguiente direccion de correo electronico <strong>".$correo."</strong>! Por favor verifica tu correo.</h4>
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
                function imprimirformularioerror2($correo)
                {
                    echo "
                        <div class='container text-center' id='formtoken'>
                            <form class='text-center' action='home.php' method='post'>
                                <h1 class='junction-bold'>Blink</h1>
                                <ul class='pagination'>
                                    <li><a>Examen</a></li>
                                    <li class='active'><a>Activacion de cuenta</a></li>
                                    <li><a>Avatar</a></li>
                                    <li><a>Listo!</a></li>
                                </ul>
                                <h4 class='junction'>Bienvenid@ a Blink, para continuar con el proceso de registro, es necesario la activacion de tu cuenta. Hemos enviado un codigo de activacion a la siguiente direccion de correo electronico <strong>".$correo."</strong>! Por favor verifica tu correo.</h4>
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

                if ($log == 0) 
                {
                    if ($estado == 0) 
                    {
                        if ($tipo == 3) {
                            if (isset($_POST['token'])) 
                            {
                                if ($_POST['token'] == $token) 
                                {
                                    $stmt = $mysqli->prepare("UPDATE usuarios_tb SET estado = ?, token = ? WHERE usuario = ?");
                                    $estad = 1;
                                    $tkn = null;
                                    $stmt->bind_param('sss', $estad, $tkn, $_SESSION['username']);
                                    $stmt->execute();
                                    $user_config = $mysqli->prepare("INSERT INTO user_config(iduser) VALUES (?)");
                                    $user_config->bind_param('i',$id);
                                    $user_config->execute();
                                    echo "
                                    <script>
                                        window.location.href = 'home.php';
                                    </script>
                                    ";
                                }
                                else
                                {
                                    imprimirformularioerror($correo);
                                }
                            }
                            else
                            {
                                imprimirformulario($correo);
                            }
                        }
                        elseif($tipo == 2)
                        {
                            $stmt1 = $mysqli->prepare("SELECT nota FROM examenes WHERE usuario = ? ORDER BY fecha DESC LIMIT 1");
                            $stmt1->bind_param('s', $user);
                            $stmt1->execute(); 
                            $stmt1->store_result();
                            $stmt1->bind_result($nota);
                            $stmt1->fetch();
                            if ($nota >= 8) 
                            {
                                if (isset($_POST['token'])) 
                                {
                                    if ($_POST['token'] == $token) 
                                    {
                                        $stmt2 = $mysqli->prepare("UPDATE usuarios_tb SET estado = ?, token = ? WHERE usuario = ?");
                                        $estad = 1;
                                        $tkn = null;
                                        $stmt2->bind_param('sss', $estad, $tkn, $_SESSION['username']);
                                        $stmt2->execute();
                                        $user_config = $mysqli->prepare("INSERT INTO user_config(iduser) VALUES (?)");
                                        $user_config->bind_param('i',$id);
                                        $user_config->execute();
                                        echo "
                                        <script>
                                            window.location.href = 'home.php';
                                        </script>
                                        ";
                                    }
                                    else
                                    {
                                        imprimirformularioerror2($correo);
                                    }
                                }
                                else
                                {
                                    imprimirformulario2($correo);
                                }
                            }
                            else
                            {
                                echo "
                                    <iframe src='exam.php?u=".$user."&t=".$token."' class='full' style='width:100vw; height:100vh; overflow:hidden;' frameborder='0'></iframe>
                                ";
                            }
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
                            $stmt3 = $mysqli->prepare("UPDATE usuarios_tb SET avatar = ?, log = ? WHERE usuario = ?");
                            $log = '1';
                            $stmt3->bind_param('sss', $avatar, $log, $_SESSION['username']);
                            $stmt3->execute();  
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
                            echo "
                            <script>
                                window.location.href = 'admin/index.php';
                            </script>
                            ";
                        break;
                        case 2:
                            echo "
                            <script>
                                window.location.href = 'teacher/index.php';
                            </script>
                            ";   
                        break;
                        case 3:
                            echo "
                            <script>
                                window.location.href = 'student/index.php';
                            </script>
                            ";
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
