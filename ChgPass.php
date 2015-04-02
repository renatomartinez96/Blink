<!--

Copyright (c) 2015 Blink
All Rights Reserved
 
This product is protected by copyright and distributed under
licenses restricting copying, distribution, and decompilation.

Gerardo López | Iván Nolasco | Renato Andres

-->
<?php
    require "assets/includes/db_conexion.php";
    require 'assets/includes/funciones.php';
    if(isset($_GET['t'])) 
    {
        $t = $_GET['t'];
        $tkn = substr($t,0,32);
        $usr = substr($t,32);
        $stmt = $mysqli->prepare("SELECT token, usuario FROM usuarios_tb WHERE token =  ?");
        $stmt->bind_param('s', $tkn);
        $stmt->execute(); 
        $stmt->store_result();
        $stmt->bind_result($tokn, $user);
        $stmt->fetch();
        if ($stmt->num_rows == 1)
        {
            if (isset($_POST['user'],$_POST['pass'],$_POST['rpass'],$_POST['p'])) 
            {
                if (md5($_POST['user']) == $usr) 
                {
                    
                    $stmt = $mysqli->prepare("UPDATE usuarios_tb SET contra = ?, salt = ?, token = ? WHERE token = ? AND usuario = ?");
                    $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
                    $password = hash('sha512', $_POST['p'] . $random_salt);
                    $ntoken = null;
                    $stmt->bind_param('sssss',$password,$random_salt,$ntoken,$tkn,$_POST['user']);
                    $stmt->execute();
                        
                }
                else
                {
                    echo "neles pastele";
                }
            }
        }
        else
        {
            Header("Location: ./");
        }
        
    }
    else
    {
        Header("Location: ./");
    }
?>
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
        <div class='container text-center' id='formtoken'>
            <form class='text-center' action='ChgPass.php?t=<?=$t?>' method='post'>
                <h1 class='junction-bold'>Blink</h1>
                <h3 class='junction-light'>Cambio de contraseña</h3>
                <h4 class='junction'>Para poder llevar a cabo la restauracion de su contraseña es necesario que llene el siguiente formulario,</h4>
                <div class="form-group col-md-6 col-md-offset-3">
                    <label for="user" class="col-lg-2 control-label">Usuario</label>
                      <div class="col-lg-10">
                            <input type="text" class="form-control" id="user" name="user" placeholder="Usuario">
                      </div>
                </div>
                <div class="form-group col-md-6 col-md-offset-3">
                    <label for="pass" class="col-lg-2 control-label">Contraseña</label>
                      <div class="col-lg-10">
                            <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña">
                      </div>
                </div>
                <div class="form-group col-md-6 col-md-offset-3">
                    <label for="rpass" class="col-lg-2 control-label">Repetir contraseña</label>
                      <div class="col-lg-10">
                            <input type="password" class="form-control" id="rpass" name="rpass" placeholder="Repetir contraseña">
                      </div>
                </div>
                <input type="buton" class="btn btn-success col-md-6 col-md-offset-3" value="Enviar" onclick="return chgpassform(this.form,this.form.user,this.form.pass,this.form.rpass)">
            </form>
        </div>
    <!-- Registration js -->
        <script type="text/JavaScript" src="assets/js/sha512.js"></script> 
        <script type="text/JavaScript" src="assets/js/forms.js"></script>
    <!-- /#Registration js -->
    <script src="assets/js/jquery.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/bootbox.min.js" type="text/javascript"></script>
	</body>
</html>
