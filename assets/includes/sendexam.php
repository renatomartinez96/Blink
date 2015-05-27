<?php 
include 'db_conexion.php';
    if (
        isset(
            $_POST['p1'],
            $_POST['p2'],
            $_POST['p3'],
            $_POST['p4'],
            $_POST['p5'],
            $_POST['p6'],
            $_POST['p7'],
            $_POST['p8'],
            $_POST['p9'],
            $_POST['p10'],
            $_POST['p11'],
            $_POST['p12'],
            $_POST['p13'],
            $_POST['p14'],
            $_POST['p15'],
            $_POST['p16'],
            $_POST['p17'],
            $_POST['p18'],
            $_POST['p19'],
            $_POST['p20'],
            $_POST['p21'],
            $_POST['p22'],
            $_POST['p23'],
            $_POST['p24'],
            $_POST['p25'],
            $_POST['p26'],
            $_POST['p27'],
            $_POST['p28'],
            $_POST['p29'],
            $_POST['p30'],
            $_POST['user_nick']
        )
    ) 
    {
        $p = array();
        $p[0] = $_POST['p1'];
        $p[1] = $_POST['p2'];
        $p[2] = $_POST['p3'];
        $p[3] = $_POST['p4'];
        $p[4] = $_POST['p5'];
        $p[5] = $_POST['p6'];
        $p[6] = $_POST['p7'];
        $p[7] = $_POST['p8'];
        $p[8] = $_POST['p9'];
        $p[9] = $_POST['p10'];
        $p[10] = $_POST['p11'];
        $p[11] = $_POST['p12'];
        $p[12] = $_POST['p13'];
        $p[13] = $_POST['p14'];
        $p[14] = $_POST['p15'];
        $p[15] = $_POST['p16'];
        $p[16] = $_POST['p17'];
        $p[17] = $_POST['p18'];
        $p[18] = $_POST['p19'];
        $p[19] = $_POST['p20'];
        $p[20] = $_POST['p21'];
        $p[21] = $_POST['p22'];
        $p[22] = $_POST['p23'];
        $p[23] = $_POST['p24'];
        $p[24] = $_POST['p25'];
        $p[25] = $_POST['p26'];
        $p[26] = $_POST['p27'];
        $p[27] = $_POST['p28'];
        $p[28] = $_POST['p29'];
        $p[29] = $_POST['p30'];
        $u = $_POST['user_nick'];
        if (
            isset(
                $_POST[$p[0]],
                $_POST[$p[1]],
                $_POST[$p[2]],
                $_POST[$p[3]],
                $_POST[$p[4]],
                $_POST[$p[5]],
                $_POST[$p[6]],
                $_POST[$p[7]],
                $_POST[$p[8]],
                $_POST[$p[9]],
                $_POST[$p[10]],
                $_POST[$p[11]],
                $_POST[$p[12]],
                $_POST[$p[13]],
                $_POST[$p[14]],
                $_POST[$p[15]],
                $_POST[$p[16]],
                $_POST[$p[17]],
                $_POST[$p[18]],
                $_POST[$p[19]],
                $_POST[$p[20]],
                $_POST[$p[21]],
                $_POST[$p[22]],
                $_POST[$p[23]],
                $_POST[$p[24]],
                $_POST[$p[25]],
                $_POST[$p[26]],
                $_POST[$p[27]],
                $_POST[$p[28]],
                $_POST[$p[29]]
            )
        )
        {
            $r = array();
            $r[0] = $_POST[$p[0]];
            $r[1] = $_POST[$p[1]];
            $r[2] = $_POST[$p[2]];
            $r[3] = $_POST[$p[3]];
            $r[4] = $_POST[$p[4]];
            $r[5] = $_POST[$p[5]];
            $r[6] = $_POST[$p[6]];
            $r[7] = $_POST[$p[7]];
            $r[8] = $_POST[$p[8]];
            $r[9] = $_POST[$p[9]];
            $r[10] = $_POST[$p[10]];
            $r[11] = $_POST[$p[11]];
            $r[12] = $_POST[$p[12]];
            $r[13] = $_POST[$p[13]];
            $r[14] = $_POST[$p[14]];
            $r[15] = $_POST[$p[15]];
            $r[16] = $_POST[$p[16]];
            $r[17] = $_POST[$p[17]];
            $r[18] = $_POST[$p[18]];
            $r[19] = $_POST[$p[19]];
            $r[20] = $_POST[$p[20]];
            $r[21] = $_POST[$p[21]];
            $r[22] = $_POST[$p[22]];
            $r[23] = $_POST[$p[23]];
            $r[24] = $_POST[$p[24]];
            $r[25] = $_POST[$p[25]];
            $r[26] = $_POST[$p[26]];
            $r[27] = $_POST[$p[27]];
            $r[28] = $_POST[$p[28]];
            $r[29] = $_POST[$p[29]];
            $data = array(array());
            $correctos = 0;
            $incorrectos = 0;
            for($i = 0; $i <= 29; $i++)
            {
                $ques = $mysqli->prepare("SELECT id, correcto FROM cuestionario WHERE id = ?");
                $ques->bind_param('i', $p[$i]);
                $ques->execute(); 
                $ques->store_result();
                $ques->bind_result($data[$i][0],$data[$i][1]);
                $ques->fetch();
                if ($r[$i] == $data[$i][1]) 
                {
                    $correctos++;
                }
                else
                {
                    $incorrectos++;
                }
            }
            $resultado = round($correctos * 0.3333333333333333);
            $fechaenvio = date("Y-m-d H:i:s"); 
            $stmt = $mysqli->prepare("INSERT INTO `examenes`(`usuario`, `nota`, `fecha`) VALUES ( ? , ? , ? )");
            $stmt->bind_param('sis', $u , $resultado , $fechaenvio );
            $stmt->execute(); 
            if (isset($_SERVER["HTTP_REFERER"])) {
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        }   
    }
    else
    {
    }

?>