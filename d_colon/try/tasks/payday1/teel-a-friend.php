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
	$to1 = $frdmail;
	$subject1 = "massage from Your friend";
	$body1 ="<table width='100%' border='0' cellspacing='0' cellpadding='5'>
  <tr><td><span class='text1'>Name</span></td><td>:</td><td>$name</td></tr>
  <tr><td><span class='text1'>Sur Name</span></td><td>:</td><td>$surname</td></tr>
  <tr><td><span class='text1'>E-Mail Address</span></td><td>:</td><td>$mail</td></tr>
  <tr><td>msg</td><td>:</td><td>$msg</td></tr>
</table>";
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: '.paydaycashtoday. "\r\n";
	if(mail($to1, $subject1, $body1 ,$headers))
	{}
	else
	{
		echo "msg not sent";
	}}
?>
</head>

<body onload="MM_preloadImages('images/b11.jpg','images/b22.jpg','images/b33.jpg','images/b44.jpg','images/b55.jpg','images/b66.jpg','images/b77.jpg')">
<table width="955" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="318" align="left" valign="top"><img src="images/h1.jpg" width="318" height="169" /></td>
    <td width="317" align="left" valign="top"><img src="images/h2.jpg" width="317" height="169" /></td>
    <td width="320" align="left" valign="top"><img src="images/h3.jpg" width="318" height="169" /></td>
  </tr>
  <tr>
    <td colspan="3" align="left" valign="top"><table width="953" height="13" cellpadding="0" cellspacing="0">
      <tr>
        <td width="107" align="left" valign="top"><a href="index.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image32','','images/b11.jpg',1)"><img src="images/b1.jpg" name="Image32" width="107" height="34" border="0" id="Image32" /></a><a href="index.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image4','','images/b11.jpg',1)"></a></td>
        <td width="117" align="left" valign="top"><a href="application.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image5','','images/b22.jpg',1)"><img src="images/b2.jpg" name="Image5" width="117" height="34" border="0" id="Image5" /></a></td>
        <td width="133" align="left" valign="top"><a href="how-it-works.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','images/b33.jpg',1)"><img src="images/b3.jpg" name="Image6" width="133" height="34" border="0" id="Image6" /></a></td>
        <td width="116" align="left" valign="top"><a href="charges.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image20','','images/b44.jpg',1)"></a><a href="charges.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image7','','images/b44.jpg',1)"></a><a href="charges.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image7','','images/b44.jpg',1)"><img src="images/b4.jpg" name="Image7" width="116" height="34" border="0" id="Image7" /></a></td>
        <td width="98" align="left" valign="top"><a href="faq.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image8','','images/b55.jpg',1)"><img src="images/b5.jpg" name="Image8" width="98" height="34" border="0" id="Image8" /></a></td>
        <td width="122" align="left" valign="top"><a href="contact.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image9','','images/b66.jpg',1)"><img src="images/b6.jpg" name="Image9" width="122" height="34" border="0" id="Image9" /></a></td>
        <td width="110" align="left" valign="top"><a href="javascript:bookmarksite('Mike\'s Place', 'http://www.google.com')"onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image10','','images/b77.jpg',1)"><img src="images/b7.jpg" name="Image10" width="110" height="34" border="0" id="Image10" /></a></td>
        <td width="150" align="left" valign="top"><img src="images/b8.jpg" width="150" height="34" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="3" align="left" valign="top"><img src="images/bg-top.jpg" width="955" height="24" /></td>
  </tr>
  
  
  

  <tr>
    <td height="599" colspan="3" align="center" valign="top" bgcolor="#FFFFFF" class="style15"><table width="932" cellspacing="0" cellpadding="0">
      <tr>
        <td width="641" align="left" valign="top"><img src="images/but-tell.jpg" width="356" height="94" /></td>
        <td width="21" align="left" valign="top">&nbsp;</td>
        <td width="268" align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td height="14" align="left" valign="bottom"><img src="images/bg-04-1.jpg" width="641" height="12" /></td>
        <td align="left" valign="bottom">&nbsp;</td>
        <td rowspan="3" align="left" valign="top"><table width="100" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="images/pic_friend_01.jpg" width="269" height="134" /></td>
            </tr>
            <tr>
              <td><img src="images/pic_friend_02.jpg" width="269" height="122" /></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td height="475" align="center" valign="top" background="images/bg-04-2.jpg"><table width="610" cellspacing="0" cellpadding="0">
            <tr>
              <td width="608" height="473" align="center" valign="top">
			  <table width="582" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="580" height="29"><h2><font size="2">Tell a Friend about Payday Cash Today!</font></h2></td>
                </tr>
				<form method="post" name="frm">
				 <input type="hidden" name="find" value="find" />
                <tr>
                  <td height="27" align="left" valign="middle">Your Name </td>
                </tr>
                <tr>
                  <td align="left" valign="middle">
                      <label>
                      <input type="text" name="name" />
                      </label>
                  </td>
                </tr>
                <tr>
                  <td height="26" align="left" valign="middle">Your Surname </td>
                </tr>
                <tr>
                  <td height="23" align="left" valign="middle">
                      <label>
                      <input type="text" name="surname" />
                      </label>
                 </td>
                </tr>
                <tr>
                  <td height="25" align="left" valign="middle">Your Email</td>
                </tr>
                <tr>
                  <td align="left" valign="middle">
                      <label>
                      <input type="text" name="mail" />
                      </label>
                  </td>
                </tr>
                <tr>
                  <td height="27" align="left" valign="middle">Your Friend's name </td>
                </tr>
                <tr>
                  <td height="14" align="left" valign="middle">
                    <input type="text" name="frdname" />
                               </td>
                </tr>
                <tr>
                  <td height="23" align="left" valign="middle">Your Friend's Email </td>
                </tr>
                <tr>
                  <td height="27" align="left" valign="middle">
                    <label>
                      <input type="text" name="frdmail" />
                      </label>
                                 </td>
                </tr>
                <tr>
                  <td height="29" align="left" valign="middle">Your Message </td>
                </tr>
                <tr>
                  <td height="49" align="left" valign="middle">
                    <label></label>
                    <textarea name="msg"></textarea>
                                   </td>
                </tr>
				<tr>
                  <td height="14" align="left"><p> <font size="1">When you submit the form above, your friend will receive an e-mail with your name and address on it.   				Besides the optional personal message, we've also included a short description of our website. </font></p></td>
                </tr>
                <tr>
                  <td height="14" align="center">&nbsp;</td>
                </tr>
                <tr>
                  <td height="14" align="center">
				  <img src="images/but6-02.jpg" width="130" height="26" onclick="return abc();" name="img1" style="cursor:pointer;"/>
				  <!--<img src="../../apache_pb2_ani.gif" onclick="return abc();" name="img1" />--></td>
                </tr>
                </form>
                <tr>
                  <td height="14" align="center">&nbsp;</td>
                </tr>
              </table></td>
            </tr>
        </table></td>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td height="14" align="left" valign="top"><img src="images/bg-04-3.jpg" width="641" height="12" /></td>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
    </table>
      <br /></td>
  </tr>
  
  <tr>
    <td height="14" colspan="3" align="center" valign="top" bgcolor="#FFFFFF" class="style12">&nbsp;</td>
  </tr>
  
  <tr>
    <td height="51" colspan="3" align="center" valign="middle" bgcolor="#707070" class="style12"><table width="928" height="63" cellpadding="0" cellspacing="0">
      <tr>
        <td width="823" height="61"><div> 
		<a href="about.html" rel="nofollow"><font color="#FFFFFF">About Us</font></a> <font color="#CCCCCC">&middot; 
		<a href="glossary.php"><font color="#FFFFFF">Glossary</font></a> &middot; 
		<a href="sitemap.html"><font color="#FFFFFF">Sitemap</font></a> &middot; 
		<a href="terms-of-use.html" rel="nofollow"><font color="#FFFFFF">Terms of Use</font></a> &middot; 
		<a href="privacy-polacy.html" rel="nofollow"><font color="#FFFFFF">Privacy Policy</font></a> &middot; 
		<a href="data-protection-policy.html" rel="nofollow"><font color="#FFFFFF">Data Protection Policy</font> </a>&middot; 
		<a href="anti-spam-policy.html" rel="nofollow"><font color="#FFFFFF">Anti-Spam Policy</font></a> &middot; 
		<a href="#" rel="nofollow"><font color="#FFFFFF">Blog</font> </a>&middot; 
		<a href="articals.html"><font color="#FFFFFF">Articles</font></a> &middot; 
		<a href="teel-a-friend.php" rel="nofollow" title="Tell a Friend (opens new window)" target="_blank"><font color="#FFFFFF">Tell a</font><br /><br /> <font color="#FFFFFF">Friend</font></a> . 
		<a href="payday-loans.html"><font color="#FFFFFF">Payday Loans</font></a>
		</font> <font color="#CCCCCC">&middot; 
		<a href="cash-advances.html"><font color="#FFFFFF">Cash Advances</font></a> &middot; 
		<a href="pay-day-advances.html"><font color="#FFFFFF">Pay Day Advances</font></a> &middot; 
		<a href="pay-day-loans.html"><font color="#FFFFFF">Pay day Loans</font></a> &middot; 
		<a href="payday-cash-advances.html"><font color="#FFFFFF">Payday Cash Advances</font></a> &middot; 
		<a href="payday-advances.html"><font color="#FFFFFF">Payday Advances</font></a></font></font> <font color="#CCCCCC"></font></font></div></td>
        <td width="10">&nbsp;</td>
        <td width="99" align="center"><img src="images/fft.jpg" width="95" height="49" border="0" usemap="#Map" /></td>
      </tr>
    </table>
      <map name="Map" id="Map">
        <area shape="circle" coords="24,24,19" href="http://www.fsa.gov.uk/" />
        <area shape="circle" coords="71,26,19" href="http://www.ccauk.org/" />
      </map></td>
  </tr>
  <tr>
    <td height="12" colspan="3" align="center" valign="middle" class="style12"><img src="images/bg-bottom00.jpg" width="955" height="12" /></td>
  </tr>
  <tr>
    <td height="22" colspan="3" align="center" valign="middle" class="style12">&copy; 2007-2008 Payday Cash Today. All Rights Reserved.</td>
  </tr>
</table>
<br />
<br />
</body>
</html>
