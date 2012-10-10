<?php
require_once('lib/fpdf.php');
require_once('lib/fpdi.php');
//require('lib/html2fpdf.php');

// initiate FPDI
$pdf =& new FPDI();
// add a page
$pdf->AddPage();
// set the sourcefile
echo $pdf->setSourceFile('test.pdf');
// import page 1
$tplIdx = $pdf->importPage(1);
// use the imported page and place it at point 10,10 with a width of 100 mm
$pdf->useTemplate($tplIdx, 10, 10, 100);

// now write some text above the imported page
$pdf->SetFont('Arial');
$pdf->SetTextColor(255,0,0);
$pdf->SetXY(25, 25);
$pdf->Write(0, "This is just a simple text");

$pdf->Output('newpdf.pdf', 'D');
?>