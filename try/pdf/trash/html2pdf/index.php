<?
require('html2fpdf.php');
//require('fontdump.php');
$file='mem.html';
$type='mem';
/*$fp = fopen($file,"r");
$strContent = fread($fp, filesize($file));
fclose($fp);*/
$strContent =file_get_contents($file);
$pdf=new HTML2FPDF('P', 'mm', array(220,390));
$pdf->AddPage();


$pdf->WriteHTML(nl2br($strContent));
$pdf->Output("pdf/".$type.".pdf",'F');
echo $type.".pdf file is generated successfully!";
?>
