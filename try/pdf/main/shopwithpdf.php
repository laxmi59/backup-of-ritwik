<?php
require('lib/html2fpdf.php');
class PDF extends FPDF
{
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
		$userName="rama";
		$title ="Licensed to ".$userName." of 92 Some Street, San Jose, CA-95130, U.S.A, The \n email address that was used to purchase \n this eBook is ".$userName."@gmail.com";
		//Position at 1.5 cm from bottom
		$this->SetXY(60,-25);
		
		//Arial italic 8
		$this->SetFont('Arial','I',8);
		//Page number
		//$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		
		/*$this->Cell(0,10,$title1,0,0,'C');
		$this->Ln(3);
		$this->Cell(0,10, $title2,0,0,'C');
		$this->Ln(3);
		$this->Cell(0,10, $title3,0,0,'C');*/
		$this->MultiCell(100,5,$title,1,'C');  
	}
}

//Instanciation of inherited class

$pdf=new PDF();
//$pdf->AliasNbPages();
//$pdf->AddPage();
$pdf->Open('test.pdf');
$pdf->SetFont('Times','',12);
for($i=1;$i<=70;$i++)
$pdf->Cell(0,10,'Printing line number '.$i,0,1);
$pdf->Output("test.pdf","D");
?>