<div id="sidebar-wrapper" style="background-color:#BF5A16;">
	<ul class="sidebar-nav toggled">
        
<?php
    $avatar = '';
    if ($stmt = $mysqli->prepare("SELECT tipo, avatar FROM usuarios_tb WHERE usuario = ?")) {
        $stmt->bind_param('s', $user);
        $stmt->execute(); 
        $stmt->store_result();
        $stmt->bind_result($tipo, $avatar);
        $stmt->fetch();
    }
    ?>
    <li class="sidebar-brand">
        <a href='profile.php?user=<?=$user?>'><img class='toggled' src='../assets/img/avatares/<?=$avatar?>.png' id='avatar'></a>
    </li>
    <?php
    switch($tipo){
        case 1:
//        ADMIN
        ?>
            <li>
                <a class="iconos" href="index.php"><i class="fa fa-home fa-2x"></i><b class="textos toggled" href="#"> <?=$langprint["navbar2"]?></b></a>
            </li>
            <li>
                <a class="iconos" href="index1.php"><i class="fa fa-magic fa-2x"></i><b class="textos toggled" href="#"> <?=$langprint["sidebar1"]?></b></a>
            </li>
            <li>
                <a class="iconos" href="my_data.php"><i class="fa fa-cogs fa-2x"></i><b class="textos toggled" href="#"> <?=$langprint["navconfig"]?></b></a>
            </li>
        <?php
        break;
        case 2:
//        TEACHER
        ?>
            <li>
                <a class="iconos" href="index.php"><i class="fa fa-puzzle-piece fa-2x"></i><b class="textos toggled" href="#"> <?=$langprint["navcourses"]?></b></a>
            </li>
            <li>
                <a class="iconos" href="inbox.php"><i class="fa fa-envelope fa-2x"></i><b class="textos toggled" href="#"> <?=$langprint["inbox"]?></b></a>
            </li>
        <?php
        break;
        case 3:
//        STUDENT
        ?>
            <li>
                <a class="iconos" href="index.php"><i class="fa fa-home fa-2x"></i><b class="textos toggled" href="#"> <?=$langprint["navbar2"]?></b></a>
            </li>
            <li>
                <a class="iconos" href="index1.php"><i class="fa fa-file-code-o fa-2x"></i><b class="textos toggled" href="#"> <?=$langprint["mysite"]?></b></a>
            </li>
            <li>
                <a class="iconos" href="index2.php"><i class="fa fa-folder-o fa-2x"></i><b class="textos toggled" href="#"> <?=$langprint["docs"]?></b></a>
            </li>
            <li>
                <a class="iconos" href="teachers.php"><i class="fa fa-users fa-2x"></i><b class="textos toggled" href="#"> <?=$langprint["tutors"]?></b></a>
            </li>
        <?php
        break;
    }
?>


    	
        
	</ul>
</div>