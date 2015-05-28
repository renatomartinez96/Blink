<?php
    include_once '../assets/includes/db_conexion.php';
    include_once '../assets/includes/funciones.php';
    sec_session_start();
    $user = $_SESSION['username'];
    $avatar = '';
$elidespecial = $_SESSION['user_id'];
    if ($stmt = $mysqli->prepare("SELECT avatar, nombres, apellidos, nacimiento, descripcion, correo, tipo, lang, idusuario  FROM usuarios_tb WHERE usuario = ?")) 
    {
        $stmt->bind_param('s', $user);
        $stmt->execute(); 
        $stmt->store_result();
        $stmt->bind_result($avatar,$nombres,$apellidos,$nacimiento,$descripcion,$correo,$tipo,$lang, $idusuario);
        $stmt->fetch();
        
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
            $titulodelapagina = "Editar mis datos personales";
			include 'main_css.php';
		?>
		<!--/#Core CSS-->

		<!--Custom CSS-->
		<link href="../assets/css/sidebar.css" rel="stylesheet">
		<!--/#Custom CSS-->

	</head>
	<body>
		<!--Topbar -->
		<?php 
			include '../nav/topbar.php';
		?>
		<!--/#Topbar -->
		<div id="wrapper" class="toggled">
			<!--Sidebar -->
			<?php 
				include '../nav/sidebar.php';
			?>
			<!--/#Sidebar -->
			
			<!--Page Content -->
			<div id="page-content-wrapper">
				<div class="container-fluid">
					<div class="row">
					<!--Content-->
                    <?php
if(isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["desc"]))
{
    $nuevonombre = $_POST["nombre"];
    $nuevoapellido = $_POST["apellido"];
    $nuevodesc = $_POST["desc"];
    
    $query2 = "UPDATE usuarios_tb SET nombres='$nuevonombre', apellidos='$nuevoapellido', descripcion='$nuevodesc' WHERE idusuario=$elidespecial";
    if ($query2 = mysqli_query($mysqli, $query2)) 
    {
        ?>
        <div class="alert alert-success">
        <strong>Muy bien: </strong>Todo se guardo correctamente, <a href="index.php" class="alert-link">inicio</a>.
        </div>
    <?php
    }
    else
    {
        ?>
        <div class="alert alert-danger">
        <strong>ERROR: </strong>En el proceso de guardado, <a href="index.php" class="alert-link">inicio</a>.
        </div>
    <?php
    }
}
if(isset($_POST["newlang"]))
{
    $newlang = $_POST["newlang"];
    
    $query2 = "UPDATE usuarios_tb SET lang='$newlang' WHERE idusuario=$elidespecial";
    if ($query2 = mysqli_query($mysqli, $query2)) 
    {
        ?>
        <div class="alert alert-success">
        <strong>OK: </strong>El idioma de Box Link se cambió <a href="index.php" class="alert-link">inicio</a>.
        <strong>OK: </strong>The language of Box Link has been changed <a href="index.php" class="alert-link">home</a>.
        </div>
    <?php
    }
    else
    {
        ?>
        <div class="alert alert-danger">
        <strong>ERROR: </strong><a href="index.php" class="alert-link">inicio</a>.
        <strong>ERROR: </strong><a href="index.php" class="alert-link">home</a>.
        </div>
    <?php
    }
}
?>
                        
    <!-- FORMULARIOS DE PERSONALIZACIÓN -->
    <div role="tabpanel">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#publicdata" aria-controls="publicdata" role="tab" data-toggle="tab">Información pública</a></li>
            <li role="presentation"><a href="#security" aria-controls="security" role="tab" data-toggle="tab">Seguridad</a></li>
            <li role="presentation"><a href="#pref" aria-controls="pref" role="tab" data-toggle="tab">Idioma / Language</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- PERSONALIZACIÓN DE DATOS PUBLICOS -->
            <div role="tabpanel" class="tab-pane active" id="publicdata">
                <form action="my_data.php" method="post">
                    <h3 class="junction-regular text-center">Información pública</h3>
                    <div class="col-md-6" >
                        <label>Nombres</label><input type="text" name = "nombre" id = "nombre" class="form-control" value="<?=$nombres?>" maxlength="50" required>        
                        <label>Apellidos</label><input type="text" name = "apellido" id = "apellido" class="form-control" value="<?=$apellidos?>" maxlength="50" required>
                        <label>Descripción</label><textarea name="desc" class="form-control" maxlength="300" required><?=$descripcion?></textarea>
                        <br>
                    </div>
                    <div class="col-md-6" >
                        <div class="well">
                            <h4>Recuerda:</h4>
                            <ul>
                                <li>Para tus nombres y apellidos solo tienes 50 caracteres disponibles.</li>
                                <li>Y para tu descripción solo tienes 300 caracteres, así que debes ser lo más consiso posible.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12" >
                        <input type="submit" class="btn btn-success btn-block" name="b1" value="Guardar mis nuevos datos">
                    </div>
                </form>
            </div>
            <!-- / PERSONALIZACIÓN DE DATOS PUBLICOS -->
            <!-- SEGURIDAD -->
            <div role="tabpanel" class="tab-pane fade" id="security">
                <form action="my_data.php" method="post">
                    <h3 class="junction-regular text-center">Seguridad de tu cuenta</h3>
                    <div class="col-md-6" >
                        <label>Contraseña actual *</label><input type="password" name = "apellido" id = "apellido" class="form-control"  required>
                        <label>Contraseña nueva</label><input type="password" name = "apellido" id = "apellido" class="form-control"  required>
                        <label>Repetir contraseña nueva</label><input type="password" name = "apellido" id = "apellido" class="form-control"  required>
                        <br>
                        <small>*Debes llenar el campo de contraseña para poder guardar los cambios.</small>
                        <br>
                    </div>
                    <div class="col-md-6" >
                        <div class="well">
                            <h4>Recuerda:</h4>
                            <p>Recuerda que tu contraseña de tu cuenta de Box Link debe ser segura, así que debe cumplir con estos requisitos:</p>
                            <ul>
                                <li>Debe de ser de por lo menos 6 caracteres</li>
                                <li>Al menos un caracter en mayusculas (A..Z)</li>
                                <li>Al menos un caracter en minusculas (a..z)</li>
                                <li>Al menos un caracter numerico (0..9)</li>
                            </ul>
                            <p>Además es necesario que escribas tu contraseña actual para realizar los cambios.</p>
                        </div>
                    </div>
                    <div class="col-md-12" >
                        <input type="submit" class="btn btn-success btn-block" name="b1" value="Guardar mi nueva contraseña">
                    </div>
                </form>
            </div>
            <!-- / SEGURIDAD -->
            <!-- PREFERENCIAS -->
            <div role="tabpanel" class="tab-pane fade" id="pref">
                <h3 class="junction-regular text-center">Preferencias de idioma</h3>
                <div class="col-md-6 well">
                <?php
                $langx = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
                $languc = "";
                if($lang=="es")
                {
                    $languc = "Español / Spanish";
                }
                elseif($lang=="en")
                {
                    $languc = "Inglés / English";
                }
                ?>
                <h4 class="junction-regular text-center">Idioma / Language</h4>
                    <br>
                <p class="junction-light text-center">Idioma actual / Current language: <ins><?=$languc?></ins></p>
                </div>
                <div class="col-md-6">
                <form action="my_data.php" method="post">
                    <input type="hidden" name="idto" value="<?=$elidespecial?>">
                    <label>Escoge otro idioma / Choose other language:</label>
                    <select class="form-control" name="newlang">
                        <option value="en">Inglés - English</option>
                        <option value="es">Español - Spanish</option>
                    </select><br>
                    <input type="submit" class="btn btn-success btn-block" name="b3" value="Guardar cambios / Save changes">
                </form>
                </div>
            </div>
            <!-- / PREFERENCIAS -->
        </div>
    </div>
    <!-- / FORMULARIOS DE PERSONALIZACIÓN -->    
					<!--/#Content-->
					</div>
				</div>
			</div>
			<!--/#Page Content -->
		</div>
		<!--Main js-->
		<?php 
			include 'main_js.php';
		?>
		<!--/#Main js-->
	</body>
</html>
