<!--

Copyright (c) 2015 Blink
All Rights Reserved
 
This product is protected by copyright and distributed under
licenses restricting copying, distribution, and decompilation.

Gerardo López | Iván Nolasco | Renato Andres

-->
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
                $stmt = $mysqli->prepare("SELECT log FROM usuarios_tb WHERE usuario = ?");
                $stmt->bind_param('s', $user);
                $stmt->execute();  
                $stmt->store_result();
                $stmt->bind_result($log);
                $stmt->fetch();
                if ($log == 0) 
                {
                    echo "<center>
                            <h1 class='junction-bold'>Blink</h1>
                            <h3 class='junction-light'>Elige un avatar</h3>
                            <h4 class='junction'>Bienvenid@ a Blink, para continuar con el proceso de registro, es neceario la eleccion de un avatar el cual se utilizara como imagen de perfil de tu cuenta.</h4>
                            <br><br>
                        </center>";
                    for($i = 1; $i <= 21; $i++){
                        echo "<div class='col-xs-1 col-md-1'>
                                <a href='?avatar=".$i."' onclick=\"return confirm('¿Esta seguro que desea seleccionar este avatar?')\" class='thumbnail' style='padding:0px;'>
                                    <img  src='assets/img/avatares/".$i.".png'>
                                </a>
                            </div>";
                        $e = $i + 21;
                        echo "<div class='col-xs-1 col-md-1'>
                                <a href='?avatar=".$e."' onclick=\"return confirm('¿Esta seguro que desea seleccionar este avatar?')\" class='thumbnail' style='padding:0px;'>
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
                else
                {
                    header("location:student/index.php");
                }
            }
            ?>
	</body>
</html>
