<?php
/*
Copyright (c) 2015 Box Link
All Rights Reserved
 
This product is protected by copyright and distributed under
licenses restricting copying, distribution, and decompilation.

Gerardo López | Iván Nolasco | Renato Andres
*/

require("../assets/fpdf/fpdf.php");
include_once '../assets/includes/db_conexion.php';
include_once '../assets/includes/funciones.php';
sec_session_start();
if ($stmt = $mysqli->prepare("SELECT nombre, curso.descripcion, imagen, nombres, apellidos, usuario FROM curso INNER JOIN usuarios_tb ON curso.idprofesor = usuarios_tb.idusuario WHERE curso.idcurso = ?")) 
{
    $stmt->bind_param('s', $_GET["id"]);
    $stmt->execute(); 
    $stmt->store_result();
    $stmt->bind_result($titulo, $descripcion, $img, $autornam, $autorape, $autorusr);
    $stmt->fetch();

}

class PDF extends FPDF
{
// Columna actual
var $col = 0;
// Ordenada de comienzo de la columna
var $y0;

function Header()
{
    // Cabacera
    global $title;

    $this->SetFont('Arial','B',15);
    $w = $this->GetStringWidth($title)+40;
    $this->SetX((210-$w)/2);
    $this->SetDrawColor(177,99,49);
    $this->SetFillColor(177,99,49);
    $this->SetTextColor(255,255,255);
    $this->SetLineWidth(1);
    $this->Cell($w,9,$title,1,1,'C',true);
    $this->Ln(10);
    // Guardar ordenada
    $this->y0 = $this->GetY();
}

function Footer()
{
    // Pie de página
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->SetTextColor(128);
    $this->Cell(0,10,'Página '.$this->PageNo(),0,0,'C');
}

//function SetCol($col)
//{
//    // Establecer la posición de una columna dada
//    $this->col = $col;
//    $x = 10+$col*65;
//    $this->SetLeftMargin($x);
//    $this->SetX($x);
//}
//
//function AcceptPageBreak()
//{
//    // Método que acepta o no el salto automático de página
//    if($this->col<2)
//    {
//        // Ir a la siguiente columna
//        $this->SetCol($this->col+1);
//        // Establecer la ordenada al principio
//        $this->SetY($this->y0);
//        // Seguir en esta página
//        return false;
//    }
//    else
//    {
//        // Volver a la primera columna
//        $this->SetCol(0);
//        // Salto de página
//        return true;
//    }
//}

function ChapterTitle($num, $label, $aut)
{
    // Título
    $this->SetFont('Arial','',14);
    $this->SetFillColor(200,220,255);
    $this->Cell(0,6,"$label",0,1,'L',false);
    $this->Ln(4);
    $this->SetFont('Arial','B',12);
    $this->Cell(0,6,"$aut",0,1,'L',false);
    $this->Ln(4);
    // Guardar ordenada
    $this->y0 = $this->GetY();
}

function ChapterBody($file,$imgto)
{
    // Abrir fichero de texto
    $txt = $file;
    $imgtop = $imgto;
    // Fuente
    $this->SetFont('Arial','',11);
    $this->Image("../assets/img/pro/".$imgtop.".png",120,30,70);
    // Imprimir texto en una columna de 6 cm de ancho
    $this->MultiCell(100,5,$txt);
    $this->Ln();
    // Cita en itálica
    $this->SetFont('','I');
    $this->Cell(0,5,'');
    // Volver a la primera columna
    //$this->SetCol(0);
}

function PrintChapter($num, $title, $file, $imgto, $aut)
{
    // Añadir capítulo
    $this->AddPage();
    $this->ChapterTitle($num,$title, $aut);
    $this->ChapterBody($file, $imgto);
}
}

$pdf = new PDF();
$title = "Reporte del curso: ".$titulo."";
$pdf->SetTitle($title);
$autor = $autornam." ".$autorape." - ".$autorusr;
$pdf->SetAuthor($autor);
$pdf->PrintChapter(1,$titulo,$descripcion,$img, $autor);
//$pdf->PrintChapter(2,$titulo,$descripcion,$img);
$pdf->Output();
?>