<?
/*function Input($nama,$asal,$memo,$link)
{
$HTML = 
"
<HTML>
	<BODY>
		<TABLE BORDER=\"1\" WIDHT=\"700\">
			<TR><TD BGCOLOR=\"#00FF00\"><B>Name</B></TD><TD WIDTH=\"240\">$nama</TD></TR>
			<TR><TD BGCOLOR=\"#FF0000\"><B>From</B></TD><TD>$asal</TD></TR>
			<TR><TD BGCOLOR=\"#123456\"><B>Web</B></TD><TD><A HREF=\"$link\"><I><U>$link</U></I></A></TD></TR>	
			<TR><TD VALIGN=\"TOP\" BGCOLOR=\"#0000FF\"><B>About</B></TD><TD>$memo</TD></TR>
			<TR><TD BGCOLOR=\"#654321\"><B>Picture</B></TD><TD><IMG SRC=\"test.jpg\"></TD></TR>
		</TABLE>
		
	</BODY>
</HTML>
";
return $HTML;
}*/

		/*$aDoc = $_REQUEST["doc"];
		$nama = $_REQUEST["nama"];
		$from = $_REQUEST["from"];
		
		$HTML = Input($nama,$from,"Web Site<BR>about<BR>PHP Programming and PHP Tips Trik For Beginner","http://www.gunungpring.com");		*/
		$file='mem.html';
$type='mem';
$HTML =file_get_contents($file);
		
		if (empty($aDoc))
		{
			$aDoc = "PDF";
		}	
		if ($aDoc=="PDF")
		{
		 	require_once("html2fpdf\html2fpdf.php");
			$myPDF = new HTML2FPDF();
		  	$myPDF->HTML2FPDF("P","mm","A4");
		 	$myPDF->AddPage();
			
			$myPDF->WriteHTML($HTML);
			$myPDF->Output();
		}
		else
		if ($aDoc=="HTML")
		{
			echo $HTML;
		}
?>