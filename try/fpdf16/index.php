<?php
if($_POST['submit']){

	require_once('fpdf.php');
	require_once('fpdi.php');
	
	// initiate FPDI
	$pdf =& new FPDI();
	
	$pagecount = $pdf->setSourceFile('1ShoppingCartCheckOut.pdf');
	//echo $pagecount;exit;
	// import page 1
	for ($i = 1; $i <= $pagecount; $i++) {
		$pdf->AddPage();
		$tplIdx = $pdf->importPage($i);
		$pdf->useTemplate($tplIdx, 0, 0, 0);
		$userName="John Doe";
		$emailId="john.doe@gmail.com";
		$title ="Licensed to ".$userName." of 92 Some Street, San Jose, CA-95130, U.S.A, The \n email address that was used to purchase \n this eBook is ".$emailId;
		$pdf->SetXY(60,-40);
		$pdf->SetFont('Arial','I',8);
		$pdf->MultiCell(100,5,$title,1,'C');  
	}
	$pdf->Output('newpdf.pdf', 'D');
}
?>
<form method="post">
<input type="submit" name="submit" value="Click" style="background:none; border:none; cursor:pointer;" /> here to download pdf
</form>
