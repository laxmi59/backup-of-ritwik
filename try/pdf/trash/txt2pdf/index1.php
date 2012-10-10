<?
require("fpdf.php"); 
$htmlFile = "http://www.ritwik.com/"; 
$buffer = file_get_contents($htmlFile); 
$buffer=strip_tags($buffer);
$pdf=new FPDF();
$pdf->AddPage(); 
$pdf->SetFont('Arial','',14);
$pdf->Write(5,$buffer);
    //Line break
$pdf->Ln(20);
$pdf->Output('test1.pdf', 'F'); 
?>