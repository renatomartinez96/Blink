
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
            @-webkit-keyframes MOVE-BG {
                 from {
                    background-position: 0% 0%
                }
                to {
                    background-position: 200% 0%
                }
            }
            @keyframes MOVE-BG {
                 from {
                    background-position: 0% 0%
                }
                to {
                    background-position: 200% 0%
                }
            }
            body{
                position:relative;
                overflow:visible;
            }
            body{

            }
            label > h3{
                margin-top:5px;
                margin-bottom:5px;
            }
            #cont{
                margin-top: 20px;
            }
        </style>
		<!--/#Custom CSS-->



	</head>
	<body>
        <div class="container-fluid">
            <div class="row" id="cont">
            <!--Content-->
                <div class="container">
                    <div id="registration" class="col-xs-12 full">
                        <div class="col-sm-12 text-center well bs-component">
                            <fieldset>
                                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="registration_form" id="form" class="form-horizontal">
                                    <img class="" src="assets/img/brand3.png" style="width:30%;">
                                    <center><legend><h3 class="junction-regular">Registro de usuarios</h3></legend></center>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="name">Nombre</label>
                                            <div class="col-lg-10">
                                                <input type='text' name='name' id='name' placeholder='Name' onkeypress="txtletras()" class='form-control input-sm'/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="last">Apellido</label>
                                            <div class="col-lg-10">
                                                <input type='text' name='last' id='last' placeholder='Lastname' onkeypress="txtletras()" class='form-control input-sm'/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="username">Usuario</label>
                                            <div class="col-lg-10">
                                                <input type='text' name='username' id='username' placeholder='User' class='form-control input-sm'/>
                                                <span class="help-block">Los usuarios solo pueden tener numeros, letras mayusculas y letras minusculas</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="email">Correo</label>
                                            <div class="col-lg-10">
                                                <input type="text" name="email" id="email" placeholder='Email' class='form-control input-sm'/>
                                                <span class="help-block">Ingresar una direccion de correo valida</span>
                                            </div>
                                        </div>
                                        <div class="form-group" id="pass">
                                            <label class="col-lg-2 control-label" for="password">Contraseña</label>
                                            <div class="col-lg-10">
                                                <input type="password" name="password" id="password" placeholder='Password' class='form-control input-sm'/>
                                                <span class="help-block">
                                                    Por lo menos 6 caracteres de longitud
                                                    Las contraseñas deben contenes
                                                        <ul>
                                                            <li>Al menos un caracter en mayusculas (A..Z)</li>
                                                            <li>Al menos un caracter en minusculas (a..z)</li>
                                                            <li>Al menos un caracter numerico (0..9)</li>
                                                        </ul>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group" id="rpass">
                                            <label class="col-lg-2 control-label" for="confirmpwd">Repetir contraseña</label>
                                            <div class="col-lg-10">
                                                <input type="password" name="confirmpwd" id="confirmpwd" placeholder='Confirmation password' class='form-control input-sm'/>
                                                <span class="help-block">Tu contraseña y la de confirmacion deben de coincidir perfectamente</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="datenac">Nacimiento</label>
                                            <div class="col-lg-10">
                                                <input type='text' name='datenac' id='datenac' onkeypress="txtnumeros()" placeholder="Birth day(yyyy-mm-dd)" onkeyup="mascara(this,'-',patron,true)" class='form-control input-sm'/>
                                                <span class="help-block">La fecha de nacimiento debe de tener un formato valido (aaaa-mm-dd)</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="datenac">Idioma</label>
                                            <div class="col-lg-10">
                                                <select class="form-control input-sm" name="lang">
                                                    <option value="en">English</option>
                                                    <option value="es">Español</option>
                                                </select>
    <!--                                            <span class="help-block">La fecha de nacimiento debe de tener un formato valido (aaaa-mm-dd)</span>-->
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="datenac">Tipo de usuario</label>
                                            <div class="col-lg-10">
                                                <select name="tipo" class="form-control input-sm">
                                                    <option value="1">Estudiante</option>
                                                    <option value="2">Profesor</option>
                                                </select>
                                                <span class="help-block">El profesor tendra que hacer una evaluación de conocimientos <ins>básicos</ins> de HTML y CSS para actuvar su cuenta.</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="gender">Genero</label>
                                            <div class="col-lg-10">
                                                <select name="gender" class="form-control input-sm">
                                                    <option value="3">Femenino</option>
                                                    <option value="2">Masculino</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="button" value="Enviar" class="btn btn-success pull-center" id="subm" onclick="return regformhash(
                                                                                                                            this.form,
                                                                                                                            this.form.name,
                                                                                                                            this.form.last,
                                                                                                                            this.form.username,
                                                                                                                            this.form.email,
                                                                                                                            this.form.password,
                                                                                                                            this.form.confirmpwd,
                                                                                                                            this.form.datenac,
                                                                                                                            this.form.lang, this.form.tipo, this.form.gender);" />
                                        <p><a href="index.php" class="">Inicio de sesion</a></p>
                                    </div>
                                </form>
                            </fieldset>
                        </div>
                        <div class="col-sm-6 text-center">

                            <h2></h2>
                        </div>
                    </div>
                </div>
            <!--/#Content-->
            </div>
        </div>
        <!--/#Page Content -->
		<!--Main js-->
		<?php
			require 'main_js.php';
		?>
		<!--/#Main js-->
        <!-- Registration js -->
            <script type="text/JavaScript" src="assets/js/sha512.js"></script>
            <script type="text/JavaScript" src="assets/js/forms.js"></script>
        <!-- /#Registration js -->
        <script src="assets/js/jquery.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/js/bootbox.min.js" type="text/javascript"></script>
	</body>
</html>
