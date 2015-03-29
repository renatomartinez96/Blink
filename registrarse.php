
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
                background: #2B3E50 url('assets/img/registro-bg.jpg') fixed;
                background-size: 100%;
            }
            label > h3{
                margin-top:5px;
                margin-bottom:5px;
            }
        </style>
		<!--/#Custom CSS-->
        
        

	</head>
	<body>
        <div class="jumbotron">
            <center style="color:#fff;">
                <h1 class="junction-bold" style="margin-top: 0px;">Blink</h1>
                <h3 class="junction-light" style="margin-top: 0px;margin-bottom: 0px;">Teaching the web</h3>
            </center>
        </div>
        <div class="container">
            <div class="row">
            <!--Content-->
                <div id="registration" class="col-xs-12 full">
                    <div class="col-sm-5 well bs-component"> 
                        <fieldset>
                            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="registration_form" id="form" class="form-horizontal">
                                <center><legend><h3 class="junction-regular">User registration</h3></legend></center>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="name">Name</label>
                                    <div class="col-lg-10">
                                        <input type='text' name='name' id='name' placeholder='Name' class='form-control input-sm'/>                                    
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="last">Lastname</label>
                                    <div class="col-lg-10">
                                        <input type='text' name='last' id='last' placeholder='Lastname' class='form-control input-sm'/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="username">User</label>
                                    <div class="col-lg-10">
                                        <input type='text' name='username' id='username' placeholder='User' class='form-control input-sm'/>
                                        <span class="help-block">Usernames may contain only digits, upper and lower case letters and underscores</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="email">Email</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="email" id="email" placeholder='Email' class='form-control input-sm'/>                                        
                                        <span class="help-block">Emails must have a valid email format</span>
                                    </div>
                                </div>
                                <div class="form-group" id="pass">
                                    <label class="col-lg-2 control-label" for="password">Password</label>
                                    <div class="col-lg-10">
                                        <input type="password" name="password" id="password" placeholder='Password' class='form-control input-sm'/>                                       
                                        <span class="help-block">
                                            Passwords must be at least 6 characters long
                                            Passwords must contain
                                                <ul>
                                                    <li>At least one uppercase letter (A..Z)</li>
                                                    <li>At least one lower case letter (a..z)</li>
                                                    <li>At least one number (0..9)</li>
                                                </ul>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group" id="rpass">
                                    <label class="col-lg-2 control-label" for="confirmpwd">Confirmation</label>
                                    <div class="col-lg-10">
                                        <input type="password" name="confirmpwd" id="confirmpwd" placeholder='Confirmation password' class='form-control input-sm'/>                                        
                                        <span class="help-block">Your password and confirmation must match exactly</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="datenac">Birth day</label>
                                    <div class="col-lg-10">
                                        <input type='text' name='datenac' id='datenac' onkeypress="txtnumeros()" placeholder="Birth day(yyyy-mm-dd)" onkeyup="mascara(this,'-',patron,true)" class='form-control input-sm'/>
                                        <span class="help-block">Birth day must have a valid date format (yyyy-mm-dd)</span>
                                    </div>
                                </div>
                                <?php
                                    if (!empty($error_msg)) {
                                        echo $error_msg;
                                    }
                                ?>
                                <input type="button" value="Sign up" class="btn btn-success pull-left" id="subm" onclick="return regformhash(
                                                                                                                    this.form,
                                                                                                                    this.form.name,
                                                                                                                    this.form.last,
                                                                                                                    this.form.username,
                                                                                                                    this.form.email,
                                                                                                                    this.form.password,
                                                                                                                    this.form.confirmpwd,
                                                                                                                    this.form.datenac);" /> 
                                <a href="index.php" class="pull-right">Login</a>
                            </form>
                        </fieldset>
                    </div>
                    <div class="col-sm-7 full">
                       
                    </div>
                        
                </div>
            <!--/#Content-->
            </div>
        </div>
        <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Error</h4>
                    </div>
                    <div class="modal-body">
                        <label id="errorlabel" class="control-label"></label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                    </div>
                </div>
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