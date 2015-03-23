
<!--

Copyright (c) 2015 Blink
All Rights Reserved
 
This product is protected by copyright and distributed under
licenses restricting copying, distribution, and decompilation.

Gerardo López | Iván Graciano | Renato Andres

-->

<?php
require 'assets/includes/register.inc.php';
require 'assets/includes/funciones.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!--Core CSS-->
		<?php 
            $titulodelapagina = "¡Registrate en BLink!";
			include 'main_css.php';
		?>
		<!--/#Core CSS-->

		<!--Custom CSS-->
		<link href="assets/css/sidebar.css" rel="stylesheet">
        <style>
            body{
                background: #2B3E50;
            }
            label > h3{
                margin-top:5px;
                margin-bottom:5px;
            }
        </style>
		<!--/#Custom CSS-->

	</head>
	<body>
        <center style="color:#fff;">
            <h1 class="junction-bold">Blink</h1>
            <h3 class="junction-regular">Registro de usuarios - User registration</h3>
        </center>
        <div class="jumbotron">
            <div class="container">
                <center>
                    <h3 class="junction-regular">A tomar en cuenta</h3>
                </center>
                <div class="col-sm-6">
                    <ul>
                        <li>Los nombres de usuario pueden contener sólo dígitos , las letras mayúsculas y minúsculas y guiones bajos</li>
                        <li>Los correos electrónicos deben tener un formato de correo electrónico válida ya que mediante su correo electrónico se hara la activación de su cuenta</li>
                        <li>Las contraseñas deben tener al menos 6 caracteres</li>
                        <li>Las contraseñas deben contener
                            <ul>
                                <li>Al menos una letra mayúscula (A..Z)</li>
                                <li>Al menos una letra minúscula (a..z)</li>
                                <li>Al menos un número (0..9)</li>
                            </ul>
                        </li>
                        <li>Su contraseña y la confirmación deben coincidir exactamente</li>
                        <li>Una vez registrado, no podra cambiar su nombre de usuario solo su información adicional</li>
                    </ul>
                </div>
                <div class="col-sm-6"></div>
                     <ul>
                        <li>Usernames may contain only digits, upper and lower case letters and underscores</li>
                        <li>Emails must have a valid email format</li>
                        <li>Passwords must be at least 6 characters long</li>
                        <li>Passwords must contain
                            <ul>
                                <li>At least one uppercase letter (A..Z)</li>
                                <li>At least one lower case letter (a..z)</li>
                                <li>At least one number (0..9)</li>
                            </ul>
                        </li>
                        <li>Your password and confirmation must match exactly</li>
                    </ul>
                <div class="col-sm-12">
                    <center>
                        <p><h5><a href="index.php">inicio de sesión - Login</a></h5></p
                    </center>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
            <!--Content-->
                <div id="registration">
                    <center>
                        <div class="col-sm-10 col-sm-offset-1"> 
                            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="registration_form">
                                <div class="col-sm-6">
                                    <label><h4>Nombres - Name</h4></label><input type='text' name='name' id='name' placeholder='Nombres' class='form-control'/><br>
                                    <label><h4>Apellidos - Lastname</h4></label><input type='text' name='last' id='last' placeholder='Apellidos' class='form-control'/><br>
                                    <label><h4>Usuario - User</h4></label><input type='text' name='username' id='username' placeholder='Usuario' class='form-control'/><br>
                                    <label><h4>Correo electrónico - Email</h4></label><input type="text" name="email" id="email" placeholder='Correo electrónico' class='form-control'/><br>
                                </div>
                                <div class="col-sm-6">
                                    <label><h4>Contraseña - Password</h4></label><input type="password" name="password" id="password" placeholder='Contraseña' class='form-control'/><br>
                                    <label><h4>Contraseña de confirmación - Confirmation password</h4></label><input type="password" name="confirmpwd" id="confirmpwd" placeholder='Contraseña de confirmación' class='form-control'/><br>
                                    <label><h4>Fecha de nacimiento(aaaa-mm-dd) - Birth day(yyyy-mm-dd) </h4></label><input type='text' name='datenac' id='datenac' onkeypress="txtnumeros()" placeholder="Fecha de nacimiento" onkeyup="mascara(this,'-',patron,true)" class='form-control'/><br>
                                    <?php
                                        if (!empty($error_msg)) {
                                            echo $error_msg;
                                        }
                                    ?>
                                </div>
                                <div class="col-sm-12 " id="subm">
                                    <input type="button"  value="Registrar - Sign up" class="btn btn-success" onclick="return regformhash(this.form,this.form.name,this.form.last,this.form.username,this.form.email,this.form.password,this.form.confirmpwd,this.form.datenac);" /> 
                                </div>
                            </form>
                        </div>
                    </center>
                </div>
            <!--/#Content-->
            </div>
        </div>
        <!--/#Page Content -->
		<!--Main js-->
		<?php 
			include 'main_js.php';
		?>
		<!--/#Main js-->
        <!-- Registration js -->
            <script type="text/JavaScript" src="assets/js/sha512.js"></script> 
            <script type="text/JavaScript" src="assets/js/forms.js"></script>
        <!-- /#Registration js -->
	</body>
</html>