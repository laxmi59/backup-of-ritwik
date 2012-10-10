<?php
require('lib/html2fpdf.php');

class PDF extends FPDF
{
//Page header
function Header()
{
//Logo
$this->Image('images/header-logo.jpg',10,8,33);
//Arial bold 15
$this->SetFont('Arial','B',15);
//Move to the right
$this->Cell(80);
//Title
$this->Cell(30,10,'Title',1,0,'C');
//Line break
$this->Ln(20);
}

//Page footer
function Footer()
{
//Position at 1.5 cm from bottom
$this->SetY(-15);
//Arial italic 8
$this->SetFont('Arial','I',8);
//Page number
//$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
$this->Cell(0,10, 'Licensed to John Doe of 92 Some Street, San Jose, CA-95130, U.S.A, The',0,0,1);
$this->Cell(0,20, 'email address that was used to purchase',0,0,1);
$this->Cell(0,30, 'this eBook is john.doe@gmail.com',0,0,1);
}
}

//Instanciation of inherited class
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
for($i=1;$i<=70;$i++)
$pdf->Cell(0,10,'Printing line number '.$i,0,1);
$pdf->Output("test.pdf","F");
?> 