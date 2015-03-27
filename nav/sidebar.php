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
            <a href='profile.php'><img class='toggled' src='../assets/img/avatares/<?=$avatar?>.png' id='avatar'></a>
        </li>
        <li>
        	<a class="iconos" href="index.php"><i class="fa fa-home fa-2x"></i><b class="textos toggled" href="#"> Home</b></a>
        </li>
        <li>
        	<a class="iconos" href="index1.php"><i class="fa fa-file-code-o fa-2x"></i><b class="textos toggled" href="#"> Page</b></a>
        </li>
	</ul>
</div>