<div id="sidebar-wrapper" style="background-color:#BF5A16;">
	<ul class="sidebar-nav toggled">
        <li class="sidebar-brand">
            <a href='profile.php'><img class='toggled' src='../assets/img/avatares/<?=$avatar?>.png' id='avatar'></a>
        </li>
<?php
    $avatar = '';
    if ($stmt = $mysqli->prepare("SELECT tipo, avatar FROM usuarios_tb WHERE usuario = ?")) {
        $stmt->bind_param('s', $user);
        $stmt->execute(); 
        $stmt->store_result();
        $stmt->bind_result($tipo, $avatar);
        $stmt->fetch();
    }
    switch($tipo){
        case 1:
//        ADMIN
        ?>
            <li>
            </li>
            <li>
            </li>
            <li>
            </li>
        <?php
        break;
        case 2:
//        TEACHER
        ?>
            <li>
            </li>
        <?php
        break;
        case 3:
//        STUDENT
        ?>
            <li>
            </li>
            <li>
            </li>
            <li>
            </li>
        <?php
        break;
    }
?>


    	
        
	</ul>
</div>