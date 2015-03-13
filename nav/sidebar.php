<?php
    $avatar = '';
    if ($stmt = $mysqli->prepare("SELECT avatar FROM usuarios_tb WHERE usuario = ?")) {
        $stmt->bind_param('s', $user);
        $stmt->execute(); 
        $stmt->store_result();
        $stmt->bind_result($avatar);
        $stmt->fetch();
    }
?>
<div id="sidebar-wrapper" style="background-color:#BF5A16;">
	<ul class="sidebar-nav toggled">
    	<li class="sidebar-brand">
            <a href='#'><img class='toggled' src='../assets/img/avatares/<?=$avatar?>.png' id='avatar'></a>
        </li>
        <li>
        	<a class="iconos" href="#"><i class="fa fa-home fa-2x"></i><b class="textos toggled" href="#"> Inicio</b></a>
        </li>
        <li>
        	<a class="iconos" href="#"><i class="fa fa-users fa-2x"></i><b class="textos toggled" href="#"> Profesores</b></a>
        </li>
        <li>
        	<a class="iconos" href="#"><i class="fa fa-user fa-2x"></i><b class="textos toggled" href="#"> Perfil</b></a>
        </li>
	</ul>
</div>