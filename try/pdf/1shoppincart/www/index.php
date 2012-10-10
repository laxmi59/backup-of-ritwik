<?php
require_once("../dompdf_config.inc.php");
$file='1ShoppingCartCheckOut-TestimonialTemplate.pdf';
$type='mem';
$strContent =file_get_contents($file);
  
  $footer="test footer";
 if ( get_magic_quotes_gpc() )
    $strContent = stripslashes($strContent);
	
	$strContent = str_replace('#FOOTER#',$footer,$strContent);
  
  $old_limit = ini_set("memory_limit", "16M");
  
  $dompdf = new DOMPDF();
  $dompdf->load_html($strContent);
  $dompdf->set_paper('p5', 'portrait');
  $dompdf->render();
  $dompdf->stream($type.".pdf"); // download file

$pdf = $dompdf->output();file_put_contents("pdf/".$type.".pdf", $pdf);  // save file
//$dompdf->stream("my_pdf.pdf", array("Attachment" => 0)); //open in same window


?>
