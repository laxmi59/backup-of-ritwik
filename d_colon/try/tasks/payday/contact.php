<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="sty.css" rel="stylesheet"  type="text/css"/>
<script type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
function bookmarksite(title,url)
{
	if (window.sidebar) // firefox
		window.sidebar.addPanel(title, url, "");
	else if(window.opera && window.print)
	{ // opera
		var elem = document.createElement('a');
		elem.setAttribute('href',url);
		elem.setAttribute('title',title);
		elem.setAttribute('rel','sidebar');
		elem.click();
	} 
	else if(document.all)// ie
	window.external.AddFavorite(url, title);
}
</script>
<style type="text/css">
<!--
.style1 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.style3 {	font-size: 11px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style4 {
	font-size: 14px;
	color: #669900;
}
.style5 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #669900;
	font-weight: bold;
}
.style10 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: #333333; }
.style7 {font-size: 12px}
.style8 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style9 {color: #333333}
.style12 {font-size: 12; color: #FFFFFF;}
.style14 {color: #FFFFFF}
.style15 {font-size: 12}
-->
</style>
<script type="text/javascript">
function abc()
{
	document.frm.submit();
}
</script>
<?
	extract($_POST);
	print_r($_POST);
	if($_POST['find']=='find')
	{
	$to1 = "poul@fairman-financial.couk";//"rama.3one@gmail.com";
	$subject1 = "massage from Your friend";
	$body1 ="<table width='100%' border='0' cellspacing='0' cellpadding='5'>
  <tr><td><span class='text1'>Name</span></td><td>:</td><td>$name</td></tr>
  <tr><td><span class='text1'>E-Mail Address</span></td><td>:</td><td>$mail</td></tr>
  <tr><td><span class='text1'>Reason</span></td><td>:</td><td>$reason</td></tr>
  <tr><td>msg</td><td>:</td><td>$msg</td></tr>
</table>";
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: '.paydaycashtoday. "\r\n";
	if(mail($to1, $subject1, $body1 ,$headers))
	{
		$msg="Thank You for Contact us";
	}
	else
	{
		echo "msg not sent";
	}
	}
?>
</head>

<body onload="MM_preloadImages('images/b11.jpg','images/b22.jpg','images/b33.jpg','images/b44.jpg','images/b55.jpg','images/b66.jpg','images/b77.jpg')">
<table width="955" align="center" cellpadding="0" cellspacing="0">
  <tr>
<td align="left" valign="top" colspan="3">
<img src="images/h1.jpg" width="319" height="169" /><img src="images/h2.jpg" width="319" height="169"/><img src="images/h3.jpg" width="317" height="169" /></td>
</tr> 
  <tr>
    <td colspan="3" align="left" valign="top"><table width="953" height="13" cellpadding="0" cellspacing="0">
      <tr>
        <td width="107" align="left" valign="top"><a href="index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image32','','images/b11.jpg',1)"><img src="images/b1.jpg" name="Image32" width="107" height="34" border="0" id="Image32" /></a><a href="index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image4','','images/b11.jpg',1)"></a></td>
        <td width="117" align="left" valign="top"><a href="application.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image5','','images/b22.jpg',1)"><img src="images/b2.jpg" name="Image5" width="117" height="34" border="0" id="Image5" /></a></td>
        <td width="133" align="left" valign="top"><a href="how-it-works.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','images/b33.jpg',1)"><img src="images/b3.jpg" name="Image6" width="133" height="34" border="0" id="Image6" /></a></td>
        <td width="116" align="left" valign="top"><a href="charges.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image7','','images/b44.jpg',1)"><img src="images/b4.jpg" name="Image7" width="116" height="34" border="0" id="Image7" /></a></td>
        <td width="98" align="left" valign="top"><a href="faq.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image8','','images/b55.jpg',1)"><img src="images/b5.jpg" name="Image8" width="98" height="34" border="0" id="Image8" /></a></td>
        <td width="122" align="left" valign="top"><a href="contact.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image21','','images/b66.jpg',1)"><img src="images/b66.jpg" name="Image21" width="122" height="34" border="0" id="Image21" /></a><a href="contact.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image9','','images/b66.jpg',1)"></a></td>
        <td width="110" align="left" valign="top"><a href="javascript:bookmarksite('Mike\'s Place', 'http://www.google.com')" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image10','','images/b77.jpg',1)"><img src="images/b7.jpg" name="Image10" width="113" height="34" border="0" id="Image10" /></a></td>
        <td width="150" align="left" valign="top"><img src="images/b8.jpg" width="150" height="34" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="3" align="left" valign="top"><img src="images/bg-top.jpg" width="960" height="24" /></td>
  </tr>
  
  
  

  <tr>
    <td height="480" colspan="3" align="center" valign="middle" bgcolor="#FFFFFF" class="style15"><table width="923" height="484" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left"><img src="images/but6-01.jpg" width="344" height="94" /></td>
        <td align="right">&nbsp;</td>
        <td align="right">&nbsp;</td>
      </tr>
	  <tr><td colspan="3" align="center"><h3><?=$msg?></h3></td></tr>
      <tr>
        <td height="13" align="left" valign="bottom"><font color="#000000"><img src="images/bagk_001.jpg" width="448" height="9" /></font></td>
        <td align="left" valign="bottom">&nbsp;</td>
        <td align="left" valign="bottom"><font color="#000000"><img src="images/bagk_001.jpg" width="448" height="9" /></font></td>
      </tr>
      <tr>
        <td height="360" align="center" valign="top" background="images/bagk_002.jpg">
		<table width="402" cellspacing="0" cellpadding="0">
          
          <tr>
            <td width="400" height="29"><h2><font size="2">Simply complete the form and we'll get back to you!</font></h2></td>
          </tr>
          <tr>
            <td height="27" align="left" valign="middle">Your Name </td>
          </tr>
		  <form method="post" name="frm">
		  <input type="hidden" name="find" value="find" />
          <tr>
            <td align="left" valign="middle">
              <label>
                <input type="text" name="name" />
                </label>
             </td>
          </tr>
          <tr>
            <td height="26" align="left" valign="middle">Your Email </td>
          </tr>
          <tr>
            <td height="23" align="left" valign="middle">
              <label>
                <input type="text" name="mail" />
                </label>
                        </td>
          </tr>
          <tr>
            <td height="25" align="left" valign="middle">Your Reason For Contacting Us </td>
          </tr>
          <tr>
            <td align="left" valign="middle">
              <label>
                <input type="text" name="reason" />
                </label>
                      </td>
          </tr>
          <tr>
            <td height="27" align="left" valign="middle">Your Message </td>
          </tr>
          
          <tr>
           <td align="left" valign="middle">
              <label><textarea name="msg"></textarea> </label>
                      </td>
          </tr>
          <tr>
            <td height="14" align="center">
			<img src="images/but6-02.jpg" width="130" height="26" onclick="return abc();" name="img1" style="cursor:pointer;" />
			<!--<img src="../../apache_pb2_ani.gif" onclick="return abc();" name="img1" />-->
			</td>
          </tr>
		  </form>
        </table></td>
        <td align="left">&nbsp;</td>
        <td align="center" valign="top" background="images/bagk_002.jpg"><table width="433" cellspacing="0" cellpadding="0">
          <tr>
            <td width="431" height="339" colspan="3" align="center" valign="top"><table width="414" height="322" cellpadding="0" cellspacing="0">
                
                <tr>
                  <td width="260" height="63" align="left" valign="middle">Thank you for using Payday Cash Today. Your questions and suggestions are important to us, so please feel free to contact us.</td>
                  <td width="159" rowspan="2" align="center" valign="top"><img src="images/pic7-01.jpg" width="154" height="157" /></td>
                </tr>
                <tr>
                  <td height="113" align="left" valign="middle">Payday Cash Today provides consumers with access to a select number of  top UK payday loan providers instantly! We always strive to make the  process of finding a suitable payday loan for your individual needs as  convenient and effortless as possible at all times.</td>
                  </tr>
                <tr>
                  <td height="40" colspan="2" align="left" valign="middle">Our portfolio of top UK payday loan providers include MEM  Consumer Finance Ltd., one of the UK&rsquo;s longest established payday loan  providers and a handful of other top rated UK payday loan lenders.</td>
                </tr>
                <tr>
                  <td height="52" colspan="2" align="left" valign="middle">Our customer support infrastructure is supported by MEM Consumer Finance Ltd. For fast, friendly support, please call on <strong>0871 550 0073</strong>.</td>
                  </tr>
                <tr>
                  <td height="52" colspan="2" align="left" valign="middle">For assistance with any other queries, please email our customer support at <a href="mailto:customer.support@paydaycashtoday.co.uk">customer.support@paydaycashtoday.co.uk</a> or alternatively, please use the contact form to the left.</td>
                </tr>
                
                
            </table></td>
          </tr>
          

        </table></td>
      </tr>
      <tr>
        <td width="449" height="13" align="left" valign="top"><font color="#000000"><img src="images/bagk_003.jpg" width="448" height="10" /></font></td>
        <td width="23" align="left" valign="top">&nbsp;</td>
        <td width="449" align="left" valign="top"><font color="#000000"><img src="images/bagk_003.jpg" width="448" height="10" /></font></td>
      </tr>
    </table>    </td>
  </tr>
  
  <tr>
    <td height="14" colspan="3" align="center" valign="top" bgcolor="#FFFFFF" class="style12">&nbsp;</td>
  </tr>
  
 <? include "footer.php"?>
</table>
<br />
<br />
</body>
</html>
