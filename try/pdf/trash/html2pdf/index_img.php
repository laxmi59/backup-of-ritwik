<?
require('html2fpdf.php');
class PDF extends FPDF
{
var $B;
var $I;
var $U;
var $HREF;

function PDF($orientation='P',$unit='mm',$format='A4')
{
    //Call parent constructor
    $this->FPDF($orientation,$unit,$format);
    //Initialization
    $this->B=0;
    $this->I=0;
    $this->U=0;
    $this->HREF='';
}

function WriteHTML($html)
{
    //HTML parser
    $html=str_replace("\n",' ',$html);
    $a=preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
    foreach($a as $i=>$e)
    {
        if($i%2==0)
        {
            //Text
            if($this->HREF)
                $this->PutLink($this->HREF,$e);
            else
                $this->Write(5,$e);
        }
        else
        {
            //Tag
            if($e{0}=='/')
                $this->CloseTag(strtoupper(substr($e,1)));
            else
            {
                //Extract attributes
                $a2=explode(' ',$e);
                $tag=strtoupper(array_shift($a2));
                $attr=array();
                foreach($a2 as $v)
                    if(ereg('^([^=]*)=["\']?([^"\']*)["\']?$',$v,$a3))
                        $attr[strtoupper($a3[1])]=$a3[2];
                $this->OpenTag($tag,$attr);
            }
        }
    }
}

function OpenTag($tag,$attr)
{
    //Opening tag
    if($tag=='B' or $tag=='I' or $tag=='U')
        $this->SetStyle($tag,true);
    if($tag=='A')
        $this->HREF=$attr['HREF'];
    if($tag=='BR')
        $this->Ln(5);
}

function CloseTag($tag)
{
    //Closing tag
    if($tag=='B' or $tag=='I' or $tag=='U')
        $this->SetStyle($tag,false);
    if($tag=='A')
        $this->HREF='';
}

function SetStyle($tag,$enable)
{
    //Modify style and select corresponding font
    $this->$tag+=($enable ? 1 : -1);
    $style='';
    foreach(array('B','I','U') as $s)
        if($this->$s>0)
            $style.=$s;
    $this->SetFont('',$style);
}

function PutLink($URL,$txt)
{
    //Put a hyperlink
    $this->SetTextColor(0,0,255);
    $this->SetStyle('U',true);
    $this->Write(5,$txt,$URL);
    $this->SetStyle('U',false);
    $this->SetTextColor(0);
}
}

$html='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body style="padding:0; margin:0">
<table width="900" border="0" align="left" cellpadding="0" cellspacing="0" style="background-color:#F3F3F3;">
<tr>
	<td>
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="620">
    <tr>
        <td colspan="4" bgcolor="#f3f3f3"><img src="images/header-logo.jpg" width="190" height="120" border="0" /><img src="images/header-lifestylela1.jpg" width="430" height="120" /></td>
    </tr>
    <tr bgcolor="#87BFD8">
      <td width="93">Date</td>
      <td width="338">&nbsp;</td>
      <td width="87"><a href="http://www.google.co.in/"><img src="images/bar-buttonfacebooklikeus.jpg" width="70" height="20" border="0" /></a></td>
      <td width="102"><a href="http://www.google.co.in/"><img src="images/bar-buttontwitterfollowus.jpg" width="85" height="20" border="0" /></a></td>
    </tr>
   
    <tr>
      <td colspan="4" bgcolor="#f3f3f3"><p style="color:#666666;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:1.5em;margin-bottom:10px;margin-top:5px;">        Hey EMAIL,
      </p>
        <h3 style="color:#666666;font-family:Arial,Helvetica,sans-serif;font-size:18px;margin-bottom:15px;margin-top:5px;">Congratulations and welcome to the Adtingo.com mailing list!</h3>
        <ul>
          <li>text</li>
          <li>text123 </li>
        </ul>
        <p style="color:#666666;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:1.5em;margin-bottom:10px;margin-top:5px;">Make sure you add members@adtingomail.com to your safe 
          sender list or address book. If you don\'t, our content may get sent to 
          your junk folder and you could miss out on everything exciting from us.
        </p>
        <p style="color:#666666;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:1.5em;margin-bottom:10px;margin-top:5px;">From now on you\'ll get one daily email for each list that 
          you subscribed to delivered right to your inbox with the latest 
          headlines, awesome editorials and special offers from businesses in your
          neighborhood.
        </p>
        <p style="color:#666666;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:1.5em;margin-bottom:10px;margin-top:5px;">Log in to Adtingo.com, enter your email address and 
          password, to change your password, change your settings or add/subtract 
          editions:
          
  <b>Email: EMAIL</b>
  <b>Password: PASSWORD</b>
        </p>
        <p style="color:#666666;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:1.5em;margin-bottom:10px;margin-top:5px;">Remember, all the information you share with us stays 
          private &mdash; we will never share or sell our email list. For more 
          information on our privacy policy, click here:
          <br />
          http://www.adtingo.com/privacy.html</p>
        <p style="color:#666666;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:1.5em;margin-bottom:10px;margin-top:5px;">Thanks and welcome!
        </p>
        <p style="color:#666666;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:1.5em;margin-bottom:10px;margin-top:5px;">AdTingo Support
        </p>
        <p style="color:#666666;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:1.5em;margin-bottom:10px;margin-top:5px;">PS &mdash; Sharing is caring, tell all your friends about us.
        </p></td>
      </tr>
    <tr>
      <td height="5" colspan="4" bgcolor="#80BFE0"></td>
      </tr>
    <tr>
      <td colspan="2" ><a href="http://www.google.co.in/">Food&amp;Dinning</a> | <a href="http://www.google.co.in/">Style</a> | <a href="http://www.google.co.in/">Entertainment</a> | <a href="http://www.google.co.in/">Travel</a> | <a href="http://www.google.co.in/">Nightlife</a> | <a href="http://www.google.co.in/">Home &amp; Garden</a> | <a href="http://www.google.co.in/">Electronics &amp; Gadgets</a> | <a href="http://www.google.co.in/">Dating </a>| <a href="http://www.google.co.in/">Sports &amp; Fitness</a> | <a href="http://www.google.co.in/">Career &amp; Money</a> | <a href="http://www.google.co.in/">Cars</a> | <a href="http://www.google.co.in/">Health &amp; Beauty</a></td>
      <td colspan="2" bgcolor="#f3f3f3"><a href="http://www.google.co.in/"><img src="images/footer-logo.jpg" width="150" height="84" border="0" /></a></td>
    </tr>
    <tr>
      <td colspan="2" >&nbsp;</td>
      <td colspan="2" bgcolor="#f3f3f3">&nbsp;</td>
    </tr>
	</table>
	</td>
</tr>
</table>

</body>
</html>
';

$pdf=new PDF();
//First page
$pdf->AddPage();
$pdf->SetFont('Arial','',20);
$pdf->Write(5,'To find out what\'s new in this tutorial, click ');
$pdf->SetFont('','U');
$link=$pdf->AddLink();
$pdf->Write(5,'here',$link);
$pdf->SetFont('');
//Second page
$pdf->AddPage();
$pdf->SetLink($link);
$pdf->Image('logo.png',10,10,30,0,'','http://www.fpdf.org');
$pdf->SetLeftMargin(45);
$pdf->SetFontSize(14);
$pdf->WriteHTML($html);
$pdf->Output("tt.pdf",'F');
?> 