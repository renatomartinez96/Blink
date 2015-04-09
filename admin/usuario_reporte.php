<?php
//  TTTTTTTTTTTT    TTTTTTTTTTTT    TTTT    TTTT 
//  TTTTTTTTTTTT    TTTTTTTTTTTT    TTTT    TTTT    
//      TTTT            TTTT        TTTT    TTTT   
//      TTTT            TTTT        TTTT    TTTT     
//      TTTT            TTTT        TTTTTTTTTTTT   
//      TTTT            TTTT        TTTTTTTTTTTT  

require "connect_db.php";
require "../assets/fpdf/fpdf.php";
if(isset($_GET["id"])){
	$reporte = $_GET['id'];
    
    function printusuariosesp(){
        class PDF extends FPDF{}

        $pdf=new PDF('P', 'mm', 'Letter');
        $pdf->SetMargins(3, 18);
        $pdf->AliasNbPages();
        $pdf->AddPage();

        $query = mysql_query("SELECT * FROM usuarios");
        $checkdata=mysql_num_rows($query);
        if($checkdata>0){
            $pdf->Image('../img/reportes/usuariosesp.jpg',32, 5,150,50);
            $pdf->SetFont("Arial", "b", 11);
            $pdf->Cell(0, 19, utf8_decode(""), 0, 1, 'C');
            $pdf->Ln();
            $x = $pdf->GetX();
            $y = $pdf->GetY();
            $pdf->SetTextColor(255, 255, 255);
            $pdf->SetFont("Arial", "b", 10);
            $pdf->MultiCell(8, 5, utf8_decode("Id"), 0, 1,'L', 0);
            $pdf->SetXY($x + 8, $y);
            $pdf->MultiCell(40, 5, utf8_decode("Nombre"), 0, 1,'L',0);
            $pdf->SetXY($x + 48, $y);
            $pdf->MultiCell(24, 5, utf8_decode("DUI"), 0, 1,'L',0);
            $pdf->SetXY($x + 72, $y);
            $pdf->MultiCell(22, 5, utf8_decode("Telefono"), 0, 1,'L',0);
            $pdf->SetXY($x + 94, $y);
            $pdf->MultiCell(24, 5, utf8_decode("Nacimiento"), 0, 1,'L',0);
            $pdf->SetXY($x + 118, $y);
            $pdf->MultiCell(12, 5, utf8_decode("Tipo"), 0, 1,'L',0);
            $pdf->SetXY($x + 130, $y);
            $pdf->MultiCell(60, 5, utf8_decode("Correo"), 0, 1,'L',0);
            $pdf->SetXY($x + 190, $y);
            $pdf->MultiCell(20, 5, utf8_decode("Usuario"), 0, 1,'L',0);
            $pdf->SetXY($x + 210, $y);
            $pdf->Ln();

            while($row = mysql_fetch_row($query)){

                $codigo = $row['0'];
                $nombre = $row['1'];
                $apellido = $row['2'];
                $usuario = $row['3'];
                $dui = $row['5'];
                $telefono = $row['6'];
                $nacimiento = $row['7'];
                $tipo = $row['8'];
                $correo = $row['9'];
                $estado = $row['10'];


                $x = $pdf->GetX();
                $y = $pdf->GetY();
                $pdf->SetTextColor(0, 0, 0);
                $pdf->SetFillColor(255,255,255); 
                $pdf->SetFont("Arial", "", 9);
                $pdf->MultiCell(8, 5, utf8_decode($codigo), 1, 0,'L', 0);
                $pdf->SetXY($x + 8, $y);
                $pdf->MultiCell(40, 5, utf8_decode($nombre), 1, 1,'L',0);
                $pdf->SetXY($x + 48, $y);
                $pdf->MultiCell(24, 5, utf8_decode($dui), 1, 1,'L',0);
                $pdf->SetXY($x + 72, $y);
                $pdf->MultiCell(22, 5, utf8_decode($telefono), 1, 1,'L',0);
                $pdf->SetXY($x + 94, $y);
                $pdf->MultiCell(24, 5, utf8_decode($nacimiento), 1, 1,'L',0);
                $pdf->SetXY($x + 118, $y);
                $pdf->MultiCell(12, 5, utf8_decode($tipo), 1, 1,'L',0);
                $pdf->SetXY($x + 130, $y);
                $pdf->MultiCell(60, 5, utf8_decode($correo), 1, 1,'L',0);
                $pdf->SetXY($x + 190, $y);
                $pdf->MultiCell(20, 5, utf8_decode($usuario), 1, 1,'L',0);
                $pdf->SetXY($x + 210, $y);
                $pdf->Ln();
            }
            $pdf->Output();
        }else{
            header("location:javascript://history.go(-1)");
        }
    }
    ?>