
<?php
/*
Copyright (c) 2015 Box Link
All Rights Reserved
 
This product is protected by copyright and distributed under
licenses restricting copying, distribution, and decompilation.

Gerardo López | Iván Nolasco | Renato Andres
*/
include "../assets/fpdf/fpdf.php";
// Inicio de reporte de usuario único
if(isset($_GET["c"]))
{
    $clase = $_GET["c"];
    if(isset($_GET["id"]))
    {
    function printusuarioinfoeng()
    {
        include "../assets/includes/db_conexion.php";
        include '../assets/includes/funciones.php';

        class PDF extends FPDF{}

        $pdf=new PDF('P', 'mm', 'Letter');
        $pdf->SetMargins(5, 45);
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $reporte = $_GET['id'];
        $query = "SELECT idusuario, usuario, nombres, apellidos, correo, nacimiento, tipo, estado, avatar  FROM usuarios_tb WHERE idusuario = $reporte";
        if ($result = mysqli_query($mysqli, $query)) 
        {
        $checkdata = mysqli_num_rows($result);
        if($checkdata > 0)
        {
            $pdf->Image('../assets/img/reportes/reporte-usuario-eng.png',0, 0,225,80);
            $pdf->SetFont("Arial", "b", 11);
            $pdf->Cell(0, 19, utf8_decode(""), 0, 1, 'C');
            $pdf->Ln();
            $x = $pdf->GetX();
            $y = $pdf->GetY();
            $pdf->SetTextColor(255, 255, 255);
            $pdf->SetFont("Arial", "b", 10);
            $pdf->MultiCell(6, 5, utf8_decode("ID"), 0, 1,'L', 0);
            $pdf->SetXY($x + 6, $y);
            $pdf->MultiCell(30, 5, utf8_decode("Usuario"), 0, 1,'L',0);
            $pdf->SetXY($x + 36, $y);
            $pdf->MultiCell(30, 5, utf8_decode("Nombre"), 0, 1,'L',0);
            $pdf->SetXY($x + 66, $y);
            $pdf->MultiCell(30, 5, utf8_decode("Apellido"), 0, 1,'L',0);
            $pdf->SetXY($x + 96, $y);
            $pdf->MultiCell(35, 5, utf8_decode("Correo electrónico"), 0, 1,'L',0);
            $pdf->SetXY($x + 131, $y);
            $pdf->MultiCell(30, 5, utf8_decode("Nacimiento"), 0, 1,'L',0);
            $pdf->SetXY($x + 161, $y);
            $pdf->MultiCell(25, 5, utf8_decode("Tipo"), 0, 1,'L',0);
            $pdf->SetXY($x + 186, $y);
            $pdf->MultiCell(20, 5, utf8_decode("Estado"), 0, 1,'L',0);
            $pdf->SetXY($x + 211, $y);
            $pdf->Ln();

            while($row = mysqli_fetch_row($result)){

                $codigo = $row['0'];
                $usuario = $row['1'];
                $nombre = $row['2'];
                $apellido = $row['3'];
                $correo = $row['4'];
                $fechanac = $row['5'];
                $tipo = $row['6'];
                $avatar = $row['8'];
                $texto1 = "";
                switch ($tipo)
                {
                    case 1;
                    $texto1 = "Administrator";
                    break;
                    case 2;
                    $texto1 = "Teacher";
                    break;
                    case 3;
                    $texto1 = "Student";
                    break;
                }
                $estado = $row['7'];
                $texto2 = "";
                switch ($estado)
                {
                    case 0;
                    $texto2 = "Inactive";
                    break;
                    case 1;
                    $texto2 = "Active";
                    break;
                }


                $x = $pdf->GetX();
                $y = $pdf->GetY();
                $pdf->SetTextColor(0, 0, 0);
                $pdf->SetFillColor(255,255,255); 
                $pdf->SetFont("Arial", "", 9);
                $pdf->MultiCell(6, 5, utf8_decode($codigo), 1, 0,'L', 0);
                $pdf->SetXY($x + 6, $y);
                $pdf->MultiCell(30, 5, utf8_decode($usuario), 1, 1,'L',0);
                $pdf->SetXY($x + 36, $y);
                $pdf->MultiCell(30, 5, utf8_decode($nombre), 1, 1,'L',0);
                $pdf->SetXY($x + 66, $y);
                $pdf->MultiCell(30, 5, utf8_decode($apellido), 1, 1,'L',0);
                $pdf->SetXY($x + 96, $y);
                $pdf->MultiCell(35, 5, utf8_decode($correo), 1, 1,'L',0);
                $pdf->SetXY($x + 131, $y);
                $pdf->MultiCell(30, 5, utf8_decode($fechanac), 1, 1,'L',0);
                $pdf->SetXY($x + 161, $y);
                $pdf->MultiCell(25, 5, utf8_decode($texto1), 1, 1,'L',0);
                $pdf->SetXY($x + 186, $y);
                $pdf->MultiCell(20, 5, utf8_decode($texto2), 1, 1,'L',0);
                $pdf->SetXY($x + 211, $y);
                $pdf->Ln();
                
                $pdf->Image("../assets/img/avatares/".$avatar.".png", 10, 100,50,50);
                $pdf->Ln();
            }
            $pdf->Output();
        }
        else
        {
            header("location:javascript://history.go(-1)");
        }
            
        }
    }

}
// Fin del reporte de usuario único
// Inicio del reporte por tipo de usuarios
if(isset($_GET["t"]))
{
    function printtiposeng()
    {
        include "../assets/includes/db_conexion.php";
        include '../assets/includes/funciones.php';

        class PDF extends FPDF{}
        $tipoo = $_GET["t"];
        $pdf=new PDF('P', 'mm', 'Letter');
        $pdf->SetMargins(5, 45);
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $query = "SELECT idusuario, usuario, nombres, apellidos, correo, nacimiento, tipo, estado  FROM usuarios_tb WHERE tipo = $tipoo";
        if ($result = mysqli_query($mysqli, $query)) 
        {
        $checkdata = mysqli_num_rows($result);
        if($checkdata > 0)
        {
            $pdf->Image('../assets/img/reportes/reporte-usuario-eng.png',0, 0,200,80);
            $pdf->SetFont("Arial", "b", 11);
            $pdf->Cell(0, 19, utf8_decode(""), 0, 1, 'C');
            $pdf->Ln();
            $x = $pdf->GetX();
            $y = $pdf->GetY();
            $pdf->SetTextColor(255, 255, 255);
            $pdf->SetFont("Arial", "b", 10);
            $pdf->MultiCell(6, 5, utf8_decode("ID"), 0, 1,'L', 0);
            $pdf->SetXY($x + 6, $y);
            $pdf->MultiCell(20, 5, utf8_decode("Usuario"), 0, 1,'L',0);
            $pdf->SetXY($x + 26, $y);
            $pdf->MultiCell(30, 5, utf8_decode("Nombre"), 0, 1,'L',0);
            $pdf->SetXY($x + 56, $y);
            $pdf->MultiCell(30, 5, utf8_decode("Apellido"), 0, 1,'L',0);
            $pdf->SetXY($x + 86, $y);
            $pdf->MultiCell(50, 5, utf8_decode("Correo Electrónico"), 0, 1,'L',0);
            $pdf->SetXY($x + 136, $y);
            $pdf->MultiCell(25, 5, utf8_decode("Nacimiento"), 0, 1,'L',0);
            $pdf->SetXY($x + 161, $y);
            $pdf->MultiCell(20, 5, utf8_decode("Tipo"), 0, 1,'L',0);
            $pdf->SetXY($x + 181, $y);
            $pdf->MultiCell(20, 5, utf8_decode("Estado"), 0, 1,'L',0);
            $pdf->SetXY($x + 201, $y); // HEEEEEEEEEEEEEEEEEREEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
            $pdf->Ln();

            while($row = mysqli_fetch_row($result)){

                $codigo = $row['0'];
                $usuario = $row['1'];
                $nombre = $row['2'];
                $apellido = $row['3'];
                $correo = $row['4'];
                $fechanac = $row['5'];
                $tipo = $row['6'];
                $texto1 = "";
                switch ($tipo)
                {
                    case 1;
                    $texto1 = "Administrador";
                    break;
                    case 2;
                    $texto1 = "Tutor";
                    break;
                    case 3;
                    $texto1 = "Estudiante";
                    break;
                }
                $estado = $row['7'];
                $texto2 = "";
                switch ($estado)
                {
                    case 0;
                    $texto2 = "Inactivo";
                    break;
                    case 1;
                    $texto2 = "Activo";
                    break;
                }


                $x = $pdf->GetX();
                $y = $pdf->GetY();
                $pdf->SetTextColor(0, 0, 0);
                $pdf->SetFillColor(255,255,255); 
                $pdf->SetFont("Arial", "", 9);
                $pdf->MultiCell(6, 5, utf8_decode($codigo), 1, 0,'L', 0);
                $pdf->SetXY($x + 6, $y);
                $pdf->MultiCell(20, 5, utf8_decode($usuario), 1, 1,'L',0);
                $pdf->SetXY($x + 26, $y);
                $pdf->MultiCell(30, 5, utf8_decode($nombre), 1, 1,'L',0);
                $pdf->SetXY($x + 56, $y);
                $pdf->MultiCell(30, 5, utf8_decode($apellido), 1, 1,'L',0);
                $pdf->SetXY($x + 86, $y);
                $pdf->MultiCell(50, 5, utf8_decode($correo), 1, 1,'L',0);
                $pdf->SetXY($x + 136, $y);
                $pdf->MultiCell(25, 5, utf8_decode($fechanac), 1, 1,'L',0);
                $pdf->SetXY($x + 161, $y);
                $pdf->MultiCell(20, 5, utf8_decode($texto1), 1, 1,'L',0);
                $pdf->SetXY($x + 181, $y);
                $pdf->MultiCell(20, 5, utf8_decode($texto2), 1, 1,'L',0);
                $pdf->SetXY($x + 201, $y);
                $pdf->Ln();
            }
            $pdf->Output();
        }
        else
        {
            header("location:javascript://history.go(-1)");
        }
            
        }
    }
}
// Fin de los reportes por tipo
// Inicio de los reportes por estado
if(isset($_GET["s"]))
{
    function printestadoeng()
    {
        include "../assets/includes/db_conexion.php";
        include '../assets/includes/funciones.php';

        class PDF extends FPDF{}
        $statussocioecomico = $_GET["s"];
        $pdf=new PDF('P', 'mm', 'Letter');
        $pdf->SetMargins(5, 45);
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $query = "SELECT idusuario, usuario, nombres, apellidos, correo, nacimiento, tipo, estado  FROM usuarios_tb WHERE estado = $statussocioecomico";
        if ($result = mysqli_query($mysqli, $query)) 
        {
        $checkdata = mysqli_num_rows($result);
        if($checkdata > 0)
        {
            $pdf->Image('../assets/img/reportes/reporte-usuario-eng.png',0, 0,225,80);
            $pdf->SetFont("Arial", "b", 11);
            $pdf->Cell(0, 19, utf8_decode(""), 0, 1, 'C');
            $pdf->Ln();
            $x = $pdf->GetX();
            $y = $pdf->GetY();
            $pdf->SetTextColor(255, 255, 255);
            $pdf->SetFont("Arial", "b", 10);
            $pdf->MultiCell(6, 5, utf8_decode("ID"), 0, 1,'L', 0);
            $pdf->SetXY($x + 6, $y);
            $pdf->MultiCell(30, 5, utf8_decode("Usuario"), 0, 1,'L',0);
            $pdf->SetXY($x + 36, $y);
            $pdf->MultiCell(30, 5, utf8_decode("Nombre"), 0, 1,'L',0);
            $pdf->SetXY($x + 66, $y);
            $pdf->MultiCell(30, 5, utf8_decode("Apellido"), 0, 1,'L',0);
            $pdf->SetXY($x + 96, $y);
            $pdf->MultiCell(35, 5, utf8_decode("Correo electrónico"), 0, 1,'L',0);
            $pdf->SetXY($x + 131, $y);
            $pdf->MultiCell(30, 5, utf8_decode("Nacimiento"), 0, 1,'L',0);
            $pdf->SetXY($x + 161, $y);
            $pdf->MultiCell(25, 5, utf8_decode("Tipo"), 0, 1,'L',0);
            $pdf->SetXY($x + 186, $y);
            $pdf->MultiCell(20, 5, utf8_decode("Estado"), 0, 1,'L',0);
            $pdf->SetXY($x + 211, $y);
            $pdf->Ln();

            while($row = mysqli_fetch_row($result)){

                $codigo = $row['0'];
                $usuario = $row['1'];
                $nombre = $row['2'];
                $apellido = $row['3'];
                $correo = $row['4'];
                $fechanac = $row['5'];
                $tipo = $row['6'];
                $texto1 = "";
                switch ($tipo)
                {
                    case 1;
                    $texto1 = "Administrator";
                    break;
                    case 2;
                    $texto1 = "Teacher";
                    break;
                    case 3;
                    $texto1 = "Student";
                    break;
                }
                $estado = $row['7'];
                $texto2 = "";
                switch ($estado)
                {
                    case 0;
                    $texto2 = "Inactive";
                    break;
                    case 1;
                    $texto2 = "Active";
                    break;
                }


                $x = $pdf->GetX();
                $y = $pdf->GetY();
                $pdf->SetTextColor(0, 0, 0);
                $pdf->SetFillColor(255,255,255); 
                $pdf->SetFont("Arial", "", 9);
                $pdf->MultiCell(6, 5, utf8_decode($codigo), 1, 0,'L', 0);
                $pdf->SetXY($x + 6, $y);
                $pdf->MultiCell(30, 5, utf8_decode($usuario), 1, 1,'L',0);
                $pdf->SetXY($x + 36, $y);
                $pdf->MultiCell(30, 5, utf8_decode($nombre), 1, 1,'L',0);
                $pdf->SetXY($x + 66, $y);
                $pdf->MultiCell(30, 5, utf8_decode($apellido), 1, 1,'L',0);
                $pdf->SetXY($x + 96, $y);
                $pdf->MultiCell(35, 5, utf8_decode($correo), 1, 1,'L',0);
                $pdf->SetXY($x + 131, $y);
                $pdf->MultiCell(30, 5, utf8_decode($fechanac), 1, 1,'L',0);
                $pdf->SetXY($x + 161, $y);
                $pdf->MultiCell(25, 5, utf8_decode($texto1), 1, 1,'L',0);
                $pdf->SetXY($x + 186, $y);
                $pdf->MultiCell(20, 5, utf8_decode($texto2), 1, 1,'L',0);
                $pdf->SetXY($x + 211, $y);
                $pdf->Ln();
            }
            $pdf->Output();
        }
        else
        {
            header("location:javascript://history.go(-1)");
        }
            
        }
    }
}
// Fin de los reportes por estado
// Inicio de los reportes de todos los usuarios
if($_GET["c"]==4)
{
    function printtodoseng()
    {
        include "../assets/includes/db_conexion.php";
        include '../assets/includes/funciones.php';

        class PDF extends FPDF{}
        $pdf=new PDF('P', 'mm', 'Letter');
        $pdf->SetMargins(5, 45);
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $query = "SELECT idusuario, usuario, nombres, apellidos, correo, nacimiento, tipo, estado  FROM usuarios_tb";
        if ($result = mysqli_query($mysqli, $query)) 
        {
        $checkdata = mysqli_num_rows($result);
        if($checkdata > 0)
        {
            $pdf->Image('../assets/img/reportes/reporte-usuario-eng.png',0, 0,225,80);
            $pdf->SetFont("Arial", "b", 11);
            $pdf->Cell(0, 19, utf8_decode(""), 0, 1, 'C');
            $pdf->Ln();
            $x = $pdf->GetX();
            $y = $pdf->GetY();
            $pdf->SetTextColor(255, 255, 255);
            $pdf->SetFont("Arial", "b", 10);
            $pdf->MultiCell(6, 5, utf8_decode("ID"), 0, 1,'L', 0);
            $pdf->SetXY($x + 6, $y);
            $pdf->MultiCell(30, 5, utf8_decode("Usuario"), 0, 1,'L',0);
            $pdf->SetXY($x + 36, $y);
            $pdf->MultiCell(30, 5, utf8_decode("Nombre"), 0, 1,'L',0);
            $pdf->SetXY($x + 66, $y);
            $pdf->MultiCell(30, 5, utf8_decode("Apellido"), 0, 1,'L',0);
            $pdf->SetXY($x + 96, $y);
            $pdf->MultiCell(35, 5, utf8_decode("Correo electrónico"), 0, 1,'L',0);
            $pdf->SetXY($x + 131, $y);
            $pdf->MultiCell(30, 5, utf8_decode("Nacimiento"), 0, 1,'L',0);
            $pdf->SetXY($x + 161, $y);
            $pdf->MultiCell(25, 5, utf8_decode("Tipo"), 0, 1,'L',0);
            $pdf->SetXY($x + 186, $y);
            $pdf->MultiCell(20, 5, utf8_decode("Estado"), 0, 1,'L',0);
            $pdf->SetXY($x + 211, $y);
            $pdf->Ln();

            while($row = mysqli_fetch_row($result)){

                $codigo = $row['0'];
                $usuario = $row['1'];
                $nombre = $row['2'];
                $apellido = $row['3'];
                $correo = $row['4'];
                $fechanac = $row['5'];
                $tipo = $row['6'];
                $texto1 = "";
                switch ($tipo)
                {
                    case 1;
                    $texto1 = "Administrator";
                    break;
                    case 2;
                    $texto1 = "Teacher";
                    break;
                    case 3;
                    $texto1 = "Student";
                    break;
                }
                $estado = $row['7'];
                $texto2 = "";
                switch ($estado)
                {
                    case 0;
                    $texto2 = "Inactive";
                    break;
                    case 1;
                    $texto2 = "Active";
                    break;
                }


                $x = $pdf->GetX();
                $y = $pdf->GetY();
                $pdf->SetTextColor(0, 0, 0);
                $pdf->SetFillColor(255,255,255); 
                $pdf->SetFont("Arial", "", 9);
                $pdf->MultiCell(6, 5, utf8_decode($codigo), 1, 0,'L', 0);
                $pdf->SetXY($x + 6, $y);
                $pdf->MultiCell(30, 5, utf8_decode($usuario), 1, 1,'L',0);
                $pdf->SetXY($x + 36, $y);
                $pdf->MultiCell(30, 5, utf8_decode($nombre), 1, 1,'L',0);
                $pdf->SetXY($x + 66, $y);
                $pdf->MultiCell(30, 5, utf8_decode($apellido), 1, 1,'L',0);
                $pdf->SetXY($x + 96, $y);
                $pdf->MultiCell(35, 5, utf8_decode($correo), 1, 1,'L',0);
                $pdf->SetXY($x + 131, $y);
                $pdf->MultiCell(30, 5, utf8_decode($fechanac), 1, 1,'L',0);
                $pdf->SetXY($x + 161, $y);
                $pdf->MultiCell(25, 5, utf8_decode($texto1), 1, 1,'L',0);
                $pdf->SetXY($x + 186, $y);
                $pdf->MultiCell(20, 5, utf8_decode($texto2), 1, 1,'L',0);
                $pdf->SetXY($x + 211, $y);
                $pdf->Ln();
            }
            $pdf->Output();
        }
        else
        {
            header("location:javascript://history.go(-1)");
        }
            
        }
    }
}
// Fin de los reportes de todos los usuarios
    switch ($clase)
    {
        case 1;
        printusuarioinfoeng();
        break;
        case 2;
        printtiposeng();
        break;
        case 3;
        printestadoeng();
        break;
        case 4;
        printtodoseng();
        break;
        
    }
}
else
{
    header("location:javascript://history.go(-1)");
}
?>