<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="sty.css" rel="stylesheet"  type="text/css"/>
<script type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<script type="text/javascript">
function valid(){
	//alert("enter");
	frm = document.testfrm;
	if(CheckList(frm.txtLoan,"select Loan")){return false;}
	if(CheckList(frm.title,"select title")){return false;}
	if(CheckValue(frm.firstName,"Enter  Name")){return false;}
	if(CheckValue(frm.surname,"Enter surname ")){return false;}
	if(CheckValue(frm.txtEmail1,"Enter Email ")){return false;}
	if (frm.txtEmail1.value.substr(frm.txtEmail1.value.indexOf('@')).indexOf('.') < 2){
			alert("Please Enter a Valid E-Mail Address");
			frm.txtEmail1.focus();
			return false;
		}
	if(CheckValue(frm.email,"Enter email")){return false;}
	if(frm.txtEmail1.value != frm.email.value){
		alert("Your emails are not matched.");
		frm.email.focus();
		return false;
	}
	if(CheckList(frm.drpDay,"Enter Birth date")){return false;}
	if(CheckList(frm.drpMonth,"Enter Birth date")){return false;}
	if(CheckList(frm.drpYear,"Enter Birth date")){return false;}
	if(CheckValue(frm.phone1a,"Enter Phone Number")){return false;}
	if(CheckValue(frm.phone3a,"Enter Phone number")){return false;}
	if(CheckValue(frm.houseName,"Enter House Name")){return false;}
	if(CheckValue(frm.address,"Enter Address")){return false;}
	if(CheckValue(frm.city,"Enter city")){return false;}
	if(CheckValue(frm.county,"Enter County")){return false;}
	if(CheckList(frm.employmentType,"Select Employer Type")){return false;}
	if(CheckValue(frm.employerName,"Enter employer name")){return false;}
	if(CheckList(frm.timeAtEmployer,"Select time at employer")){return false;}
	if(CheckValue(frm.netMonthlyPay,"Enter next Month Pay")){return false;}
	if(CheckList(frm.payFrequency,"Select Pay Frequency")){return false;}
	if(CheckList(frm.directDeposit,"Select Direct Deposite")){return false;}
	if(CheckList(frm.drpPayDay,"SelectPay Day")){return false;}
	if(CheckList(frm.drpPayMonth,"Select Pay month")){return false;}
	if(CheckList(frm.drppayyear,"Select Pay Year")){return false;}
	if(CheckList(frm.drppayday1,"Select Pay Day one")){return false;}
	if(CheckList(frm.drppaymonth1,"Select Pay Month one")){return false;}
	if(CheckList(frm.drppayyear1,"Select Pay Day one")){return false;}
	if(CheckValue(frm.txtNIN,"Enter National Insurance Number")){return false;}
	if(CheckList(frm.cardType,"Select card type")){return false;}
	if(CheckValue(frm.txtBankAccount,"Enter Bank Account")){return false;}
	
	if(CheckValue(frm.txtSortCode,"Enter Sort code")){return false;}
	if(CheckNum(frm.txtSortCode,"Enter Valid number")){return false;}
	if(frm.check.checked == false){
			alert("Please select the checkbox to submit the request ");
			return false;
		}
		else{
			return true;
		}
	
function CheckValue(TxtBox,Msg)
{
	if(TxtBox.value=='')
	{
		alert(Msg);
		TxtBox.focus();
		return true;
	}
	return false;
}
function CheckList(Obj,Msg){

		if(Obj.selectedIndex <= 0){
			alert(Msg);
			Obj.focus();
			return true;
		}

	}
}

function CheckNum(TxtObj,Msg)
	{
		if(isNaN(TxtObj.value))
		{
			 alert(Msg);
			 TxtObj.focus();
			 return true;
		}
	}	

</script>

<style type="text/css">
<!--
.style12 {font-size: 12; color: #FFFFFF;}
.style14 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
<? if($_POST['btnNext']){
	extract($_POST);
		print_r($_POST);
		$message  = "<table width='100%'border='0' cellspacing='0' cellpadding='5'>
  <tr>
    <td>Loan</td>
    <td>:</td>
    <td>$txtLoan</td>
  </tr>
  <tr>
    <td>Title</td>
    <td>:</td>
    <td>$title</td>
  </tr>
  <tr>
    <td>First Name</td>
    <td>:</td>
    <td>$firstName</td>
  </tr>
  <tr>
    <td>Surname</td>
    <td>:</td>
    <td>$surname</td>
  </tr>
  <tr>
    <td>Email</td>
    <td>:</td>
    <td>$txtEmail1</td>
  </tr>
  <tr>
    <td>Date Of Birth </td>
    <td>:</td>
    <td>$drpDay"."-$drpMonth"."-$drpYear</td>
  </tr>
  <tr>
    <td>Home Phone </td>
    <td>:</td>
    <td>$phone1a</td>
  </tr>
  <tr>
    <td>Mobile</td>
    <td>:</td>
    <td>$phone3a</td>
  </tr>
  <tr>
    <td>HouseName/Number</td>
    <td>:</td>
    <td>$houseName</td>
  </tr>
  <tr>
    <td>Street Name </td>
    <td>:</td>
    <td>$address</td>
  </tr>
  <tr>
    <td>City</td>
    <td>:</td>
    <td>$city</td>
  </tr>
  <tr>
    <td>County</td>
    <td>:</td>
    <td>$county</td>
  </tr>
  <tr>
    <td>Employment Type</td>
    <td>:</td>
    <td>$employmentType</td>
  </tr>
  <tr>
    <td>Employer Name</td>
    <td>:</td>
    <td>$employerName</td>
  </tr>
  <tr>
    <td>Time At Employer</td>
    <td>:</td>
    <td>$timeAtEmployer</td>
  </tr>
  <tr>
    <td>Eet Monthly Pay</td>
    <td>:</td>
    <td>$netMonthlyPay</td>
  </tr>
  <tr>
    <td>Pay Frequency</td>
    <td>:</td>
    <td>$payFrequency</td>
  </tr>
  <tr>
    <td>Direct Deposit</td>
    <td>:</td>
    <td>$directDeposit</td>
  </tr>
  <tr>
    <td>Next Pay Date </td>
    <td>:</td>
    <td>$drpPayDay"."-$drpPayMonth"."-$drppayyear</td>
  </tr>
  <tr>
    <td>Following Pay Date </td>
    <td>:</td>
    <td>$drppayday1"."-$drppaymonth1"."-$drppayyear1</td>
  </tr>
  <tr>
    <td>National Insurance Number </td>
    <td>:</td>
    <td>$txtNIN</td>
  </tr>
  <tr>
    <td>Card Type </td>
    <td>:</td>
    <td>$cardType</td>
  </tr>
  <tr>
    <td>Bank Account </td>
    <td>:</td>
    <td>$txtBankAccount</td>
  </tr>
  <tr>
    <td>Sort Code </td>
    <td>:</td>
    <td>$txtSortCode</td>
  </tr>
  <tr>
    <td width='32%'>&nbsp;</td>
    <td width='2%'>&nbsp;</td>
    <td width='66%'>&nbsp;</td>
  </tr>
  </table>";
		
		$to = "poul@fairman-financial.couk";//"rama.3one@gmail.com";"poul@fairman-financial.couk";
		$subject = "mail from Pay day loans";
		$body = "<html><head></head><body>The Pay Day Loans Team.<br><br>".$message."</body></html>";
		echo $body;
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: PaydayLoans.'. "\r\n";
		if (@mail($to, $subject, $body ,$headers)) {
		$mailsent =  "<p>Message successfully sent! </p>";
		 } else {
		  $mailsent ="<p>Message delivery failed...</p>";
 		}
		//mail($to1, $subject, $body ,$headers);
		//$msg = "Message Successfully Sent!";
    echo $mailsent;
	//exit;
	
}

?>
<style type="text/css">
div#tipDiv {
    padding:4px;
    color:#000; 
	font-size:13px; 
	line-height:1.2; 
	
    width:250px; 
}
</style>
<script src="dw_event.js" type="text/javascript"></script>
<script src="dw_viewport.js" type="text/javascript"></script>
<script src="dw_tooltip.js" type="text/javascript"></script>
<script src="dw_tooltip_aux.js" type="text/javascript"></script>
<script type="text/javascript">

dw_Tooltip.defaultProps = {    hoverable: true}
dw_Tooltip.content_vars = {    
	L1: '<img src="arrowup.gif" style="width:20px;" /><table bgcolor="#57C4C1" style="border:1px solid;" cellpadding="0" cellspacing="0"><tr><td style="padding-left:5px;color:#4C1F0C;font-size: 15px">Get a Payday Loan fast - Immediate Online Decision</td></tr><tr  bgcolor="#FFFFFF"><td style="padding-left:5px"><a href="index.php"><p>With our State of the Art finance technology, we are capable of offering you a fast, efficient <strong>paperless</strong> process, whereby your application will be <strong>instantly processed and approved</strong>, based on the information provided by you.</p><p>Once approved, you will also have the option to sign for your Payday loan in just minutes conveniently online!</p></td></tr></table>',
   L2: '<img src="arrowup.gif" style="width:20px;" /><table bgcolor="#57C4C1" style="border:1px solid;" cellpadding="0" cellspacing="0"><tr><td style="padding-left:5px;color:#4C1F0C;font-size: 15px">Your Payday loan Information is 100% Secure</td></tr><tr  bgcolor="#FFFFFF"><td style="padding-left:5px"><a href="index.php"><p>For your security, all information supplied is protected by our leading edge, 128-bit <span class="caps">SSL</span> Encryption technology ensuring your Privacy is Protected every step of the way.</p></td></tr></table>',
   L3: '<img src="arrowup.gif" style="width:20px;" /><table bgcolor="#57C4C1" style="border:1px solid;" cellpadding="0" cellspacing="0"><tr><td style="padding-left:5px;color:#4C1F0C;font-size: 15px">Your Payday loan Information is 100% Secure</td></tr><tr  bgcolor="#FFFFFF"><td style="padding-left:5px"><a href="index.php"><p>For your security, all information supplied is protected by our leading edge, 128-bit <span class="caps">SSL</span> Encryption technology ensuring your Privacy is Protected every step of the way.</p></td></tr></table>',
   L4: '<img src="arrowup.gif" style="width:20px;" /><table bgcolor="#57C4C1" style="border:1px solid;" cellpadding="0" cellspacing="0"><tr><td style="padding-left:5px;color:#4C1F0C;font-size: 15px">No Credit Scoring needed for Payday Loan approval</td></tr><tr  bgcolor="#FFFFFF"><td style="padding-left:5px"><a href="index.php"><p>All Payday loan applications are approved based primarily on affordability regardless of your credit rating and therefore don&#8217;t require the need for any credit checks.</p></td></tr></table>', 
}
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
</head>

<body onload="MM_preloadImages('images/b11.jpg','images/b22.jpg','images/b33.jpg','images/b44.jpg','images/b55.jpg','images/b66.jpg','images/b77.jpg')">
<table width="955" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="318" align="left" valign="top"><img src="images/h1.jpg" width="318" height="169" /></td>
    <td width="317" align="left" valign="top"><img src="images/h2.jpg" width="317" height="169" /></td>
    <td width="324" colspan="2" align="left" valign="top"><img src="images/h3.jpg" width="318" height="169" /></td>
  </tr>
  <tr>
    <td colspan="4" align="left" valign="top"><table width="955" height="13" cellpadding="0" cellspacing="0">
      <tr>
        <td width="107" align="left" valign="top"><a href="index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image32','','images/b11.jpg',1)"><img src="images/b1.jpg" name="Image32" width="107" height="34" border="0" id="Image32" /></a><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image4','','images/b11.jpg',1)"></a></td>
        <td width="117" align="left" valign="top"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image5','','images/b22.jpg',1)"></a><a href="contact.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image9','','images/b66.jpg',1)"><img src="images/b6.jpg" name="Image9" width="122" height="34" border="0" id="Image9" /></a></td>
        <td width="133" align="left" valign="top"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','images/b33.jpg',1)"></a><a href="javascript:bookmarksite('Mike\'s Place', 'http://www.google.com')" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image10','','images/b77.jpg',1)"><img src="images/b7.jpg" name="Image10" width="110" height="34" border="0" id="Image10" /></a></td>
        <td width="116" align="left" valign="top"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image7','','images/b44.jpg',1)"></a></td>
        <td width="98" align="left" valign="top"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image8','','images/b55.jpg',1)"></a></td>
        <td width="122" align="left" valign="top"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image9','','images/b66.jpg',1)"></a></td>
        <td width="110" align="left" valign="top"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image10','','images/b77.jpg',1)"></a></td>
        <td width="150" align="left" valign="top"><img src="images/b8.jpg" width="150" height="34" /></td>
      </tr>
    </table>    </td>
  </tr>
  <tr>
    <td colspan="4" align="right" valign="top" background="images/bg-top.jpg">&nbsp;</td>
  </tr>
  
  <tr>
    <td align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    <td colspan="2" align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="95" colspan="4" align="center" valign="top" bgcolor="#FFFFFF"><table width="919" height="95" cellpadding="0" cellspacing="0">
      <tr>
        <td width="274" height="93" background="images/bg001.jpg"><table width="274" height="62" cellpadding="0" cellspacing="0">
          <tr>
            <td width="82" height="60">&nbsp;</td>
            <td width="180" valign="middle"><font color="#FFFFFF" size="2">Short on cash with Payday still a few days or even a few weeks away?</font></td>
            <td width="10" valign="middle">&nbsp;</td>
          </tr>
        </table></td>
        <td width="59"><img src="images/bg00_aro.jpg" width="59" height="93" /></td>
        <td width="263" background="images/bg002.jpg"><table width="263" height="62" cellpadding="0" cellspacing="0">
          <tr>
            <td width="66" height="60">&nbsp;</td>
            <td width="186" valign="middle"><font color="#FFFFFF" size="2">Want a quick and easy <strong>Payday Cash Advance</strong> in just 6 minutes right Now?</font></td>
            <td width="10" valign="middle">&nbsp;</td>
          </tr>
        </table></td>
        <td width="59"><img src="images/bg00_aro.jpg" width="59" height="93" /></td>
        <td width="262" background="images/bg003.jpg"><table width="257" height="62" cellpadding="0" cellspacing="0">
          <tr>
            <td width="63" height="60">&nbsp;</td>
            <td width="185" valign="middle"><font color="#FFFFFF" size="2">Approval in Seconds with the ability to sign for your advance instantly online!</font></td>
            <td width="15" valign="middle">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="4" align="left" valign="top" bgcolor="#FFFFFF"><table width="956" height="1022" cellpadding="0" cellspacing="0">
      <tr>
        <td width="383" align="left" valign="bottom"><img src="images/bg-side1.jpg" width="383" height="8" /></td>
        <td width="571" align="center" valign="top">&nbsp;</td>
      </tr>
      <tr align="left">
        <td height="148" valign="top" background="images/bg-side2.jpg"><table width="379" cellspacing="0" cellpadding="0">
          <tr>
            <td height="19" colspan="3" align="center"><img src="images/but001.jpg" width="328" height="95" /></td>
  </tr>
          
          <tr>
            <td width="20" height="45" align="right" valign="top"><img src="images/aro.jpg" width="12" height="11" /></td>
            <td width="4" valign="top">&nbsp;</td>
            <td width="353" valign="top"><font size="2" face="Arial, Helvetica, sans-serif">Get a <strong>Payday Cash Advance</strong> of up to &pound;750 Right Now! &ndash; No need to even get off your chair.</font></td>
          </tr>
          <tr>
            <td height="56" align="right" valign="top"><img src="images/aro.jpg" width="12" height="11" /></td>
            <td valign="top">&nbsp;</td>
            <td valign="top"><font size="2" face="Arial, Helvetica, sans-serif">All Payday Cash Advances are <strong>automatically approved and processed</strong> 24 hours a day, 365 days a year for your convenience!</font></td>
          </tr>
          <tr>
            <td height="47" align="right" valign="top"><img src="images/aro.jpg" width="12" height="11" /></td>
            <td valign="top">&nbsp;</td>
            <td valign="top">
			<span class="more">
				<font size="2" face="Arial, Helvetica, sans-serif">
					<a href="https://www.paydaycashtoday.co.uk/apply/payday-cash-advances.html#tooltip1" style="color:#003366; text-decoration:none;" class="showTip L1" rel="#tooltip1" >Immediate online approval</a>
				</font>
			</span>
			<font size="2" face="Arial, Helvetica, sans-serif"> &ndash; No faxes or Posting of docs or pay checks needed.</font>
			</td>
          </tr>
          <tr>
            <td height="61" align="right" valign="top"><img src="images/aro.jpg" width="12" height="11" /></td>
            <td valign="top">&nbsp;</td>
            <td valign="top">
			
			<font size="2" face="Arial, Helvetica, sans-serif">
				<strong>Quick, Easy</strong> and 
				<a href="https://www.paydaycashtoday.co.uk/apply/payday-cash-advances.html#tooltip2" title="Your Payday loan Information is 100% Secure" class="showTip L2" rel="#tooltip2" style="color:#003366; text-decoration:none;"><span class="more">always totally Secure</span></a>
				 &ndash; Complete the whole payday cash advance process from applying to signing for your advance online in 
				 <a href="https://www.paydaycashtoday.co.uk/apply/payday-cash-advances.html#tooltip3" title="" class="showTip L3" rel="#tooltip3" style="color:#003366; text-decoration:none;"><span class="more">under 6 minutes!</span></a>
				</font>
			
			</td>
          </tr>
          <tr>
            <td height="27" align="right" valign="top"><img src="images/aro.jpg" width="12" height="11" /></td>
            <td valign="top">&nbsp;</td>
            <td valign="top">
			<font size="2" face="Arial, Helvetica, sans-serif">
				<a href="https://www.paydaycashtoday.co.uk/apply/payday-cash-advances.html#tooltip4" title="" class="showTip L4" rel="#tooltip4" style="color:#003366; text-decoration:none;"><span class="more">No Credit Checks</span></a> &ndash; Get the cash you require fast!
			</font>
			</td>
          </tr>
          <tr>
            <td height="62" align="right" valign="top"><img src="images/aro.jpg" width="12" height="11" /></td>
            <td valign="top">&nbsp;</td>
            <td valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Same-day priority cash transfers (CHAPS)</strong>* into your account. This way the money will be ready for you to utilize immediately!</font></td>
          </tr>
          <tr>
            <td height="45" align="right" valign="top"><img src="images/aro.jpg" width="12" height="11" /></td>
            <td valign="top">&nbsp;</td>
            <td valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Easy, Flexible terms</strong>. Get a payday cash advance even if you are a tenant. No surety necessary to be approved!</font></td>
          </tr>
          <tr>
            <td height="32" align="right" valign="top"><img src="images/aro.jpg" width="12" height="11" /></td>
            <td valign="top">&nbsp;</td>
            <td valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Poor Credit Score? No Problem!</strong> We can certainly Help.</font></td>
          </tr>
          <tr>
            <td height="28" align="right" valign="top"><img src="images/aro.jpg" width="12" height="11" /></td>
            <td valign="top">&nbsp;</td>
            <td valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><strong>No expensive Administration Charges</strong>.</font></td>
          </tr>
          <tr>
            <td height="59" align="right" valign="top"><img src="images/aro.jpg" width="12" height="11" /></td>
            <td valign="top">&nbsp;</td>
            <td valign="top"><font size="2" face="Arial, Helvetica, sans-serif">You can use payday cash advances for whatever you may need. Whether  it&rsquo;s a pressing emergency or a well deserved holiday. We do not need to  know and won&rsquo;t EVER ask.</font></td>
          </tr>
          <tr>
            <td height="38" align="right" valign="top"><img src="images/aro.jpg" width="12" height="11" /></td>
            <td>&nbsp;</td>
            <td align="left" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><strong>We respect Your Privacy</strong>. <strong>Payday Cash Advances</strong> are always kept totally confidential &ndash; guaranteed.</font></td>
          </tr>
          <tr>
            <td align="left" valign="top">&nbsp;</td>
            <td>&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="top">&nbsp;</td>
            <td>&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" align="center" valign="top"><img src="images/but003.jpg" width="321" height="93" /></td>
  </tr>
          <tr>
            <td height="56" colspan="3" align="center" valign="top"><table width="330" cellpadding="0" cellspacing="0" bgcolor="#FBFFE1" style="border:#006699 1px solid";>
              <tr class="border">
                <td width="328" height="272" align="center"><div id="news">
                  <div>
                    <p><strong>Absolutely Great, Efficient Service!</strong></p>
                    <p align="justify" class="texttt"><em>&ldquo;Can  I just say how impressed I am with your absolutely great, efficient  service. My money arrived in my bank account today and it really was in  my account as quickly as you said it would be. Once again, thanks!&rdquo;</em><br />
                      Mary L.</p>
                    <p><strong>Perfect, easy solution!</strong></p>
                    <p align="justify" class="texttt"><em>&ldquo;I  couldn&rsquo;t afford to pay all my bills after an expensive holiday an cash  advance was simply perfect for a short term money solution.&rdquo;</em></p>
                    <p>James W.</p>
                  </div>
                </div></td>
              </tr>
            </table></td>
  </tr>
</table></td>
        <td width="571" align="center" valign="top"><form name="testfrm" method="post" onSubmit="return valid()"><table width="562" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="3"><img src="images/but002.jpg" width="547" height="88" /></td>
          </tr>
          <tr>
            <td colspan="3" align="left">&nbsp;&nbsp;&nbsp;<strong>Complete the Quick and Simple application form for an Instant decision!</strong></td>
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td height="23" colspan="3" valign="middle"><table width="556" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="21"><img src="images/lock.jpg" width="21" height="23" /> </td>
                  <td width="357">Your information is secure</td>
                  <td width="176" align="right"><img src="images/step.jpg" width="139" height="35" /></td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td colspan="3">Loan Details 
			
			   <select name="txtLoan" id="txtLoan">
	<option value="">select</option>
	<option value="100">100</option>
	<option value="150">150</option>
	<option value="200">200</option>
	<option value="250">250</option>

	<option value="300">300</option>
	<option value="350">350</option>
	<option value="400">400</option>
	<option value="450">450</option>
	<option value="500">500</option>
	<option value="550">550</option>

	<option value="600">600</option>
	<option value="650">650</option>
	<option value="700">700</option>
	<option value="750">750</option>
</select>			</td>
          </tr>
          <tr>
            <td height="28" colspan="3" bgcolor="#c75530" class="textheading style14" style="border:#006699 1px solid";>Your Contact details</td>
          </tr>
          <tr>
            <td colspan="3">
			
			<table>
 
 <tbody><tr>
 <td><p>
     <b>Title:</b></p> </td>

 <td><p>
     <b>Firstname:</b></p> </td>
 <td><p><b>Surname:</b></p></td>
 </tr>
 
 <tr>
 
  
    <td><select name="title" id="title">
	<option value=""></option>

	<option value="Mr">Mr</option>
	<option value="Mrs">Mrs</option>
	<option value="Miss">Miss</option>

</select>
        <span id="RequiredFieldValidator1" style="color: Red; visibility: hidden;">*</span>    </td>
        
    <td>

       <input name="firstName" id="firstName" class="text" type="text">
<span id="RequiredFieldValidator2" style="color: Red; visibility: hidden;">*</span></td>
    
     <td><input name="surname" id="surname" class="text" type="text">
    <span id="RequiredFieldValidator3" style="color: Red; visibility: hidden;">*</span></td>
 </tr>

  
    <tr>
 
    <td><p><b>Email:</b></p></td>

    <td><p><b>Email Confirm:</b></p></td>
    <td><p><b>Date of Birth:</b></p></td>
    </tr>
    
    <tr>

    <td><input name="txtEmail1" id="txtEmail1" class="text" type="text">
<span id="RequiredFieldValidator10" style="color: Red; visibility: hidden;">*</span></td>
 

    <td><input name="email" id="email" class="text" type="text">

    <span id="RequiredFieldValidator11" style="color: Red; visibility: hidden;">*</span></td>
  
      <td style="height: 26px;">
        <select name="drpDay" id="drpDay" style="width: 40px;">
	<option value=""></option>
	<option value="01">01</option>
	<option value="02">02</option>
	<option value="03">03</option>

	<option value="04">04</option>
	<option value="05">05</option>
	<option value="06">06</option>
	<option value="07">07</option>
	<option value="08">08</option>
	<option value="09">09</option>

	<option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>
	<option value="13">13</option>
	<option value="14">14</option>
	<option value="15">15</option>

	<option value="16">16</option>
	<option value="17">17</option>
	<option value="18">18</option>
	<option value="19">19</option>
	<option value="20">20</option>
	<option value="21">21</option>

	<option value="22">22</option>
	<option value="23">23</option>
	<option value="24">24</option>
	<option value="25">25</option>
	<option value="26">26</option>
	<option value="27">27</option>

	<option value="28">28</option>
	<option value="29">29</option>
	<option value="30">30</option>
	<option value="31">31</option>
</select>&nbsp;
          <span id="RequiredFieldValidator23" style="color: Red; visibility: hidden;">*</span>

        
        <select name="drpMonth" id="drpMonth" style="width: 40px;">
	<option value=""></option>
	<option value="01">01</option>
	<option value="02">02</option>
	<option value="03">03</option>
	<option value="04">04</option>
	<option value="05">05</option>

	<option value="06">06</option>
	<option value="07">07</option>
	<option value="08">08</option>
	<option value="09">09</option>
	<option value="10">10</option>
	<option value="11">11</option>

	<option value="12">12</option>
</select>
          <span id="RequiredFieldValidator22" style="color: Red; visibility: hidden;">*</span>
       <select name="drpYear" id="drpYear" class="combo" style="width: 55px;">
	<option value="">select</option>
	<option value="1950">1950</option>
	<option value="1951">1951</option>

	<option value="1952">1952</option>
	<option value="1953">1953</option>
	<option value="1954">1954</option>
	<option value="1955">1955</option>
	<option value="1956">1956</option>
	<option value="1957">1957</option>

	<option value="1958">1958</option>
	<option value="1959">1959</option>
	<option value="1960">1960</option>
	<option value="1961">1961</option>
	<option value="1962">1962</option>
	<option value="1963">1963</option>

	<option value="1964">1964</option>
	<option value="1965">1965</option>
	<option value="1966">1966</option>
	<option value="1967">1967</option>
	<option value="1968">1968</option>
	<option value="1969">1969</option>

	<option value="1970">1970</option>
	<option value="1971">1971</option>
	<option value="1972">1972</option>
	<option value="1973">1973</option>
	<option value="1974">1974</option>
	<option value="1975">1975</option>

	<option value="1976">1976</option>
	<option value="1977">1977</option>
	<option value="1978">1978</option>
	<option value="1979">1979</option>
	<option value="1980">1980</option>
	<option value="1981">1981</option>

	<option value="1982">1982</option>
	<option value="1983">1983</option>
	<option value="1984">1984</option>
	<option value="1985">1985</option>
	<option value="1986">1986</option>
	<option value="1987">1987</option>

	<option value="1988">1988</option>
	<option value="1989">1989</option>
	<option value="1990">1990</option>
	<option value="1991">1991</option>
	<option value="1992">1992</option>
	<option value="1993">1993</option>

	<option value="1994">1994</option>
	<option value="1995">1995</option>
	<option value="1996">1996</option>
	<option value="1997">1997</option>
	<option value="1998">1998</option>
	<option value="1999">1999</option>

	<option value="2000">2000</option>
	<option value="2001">2001</option>
	<option value="2002">2002</option>
	<option value="2003">2003</option>
	<option value="2004">2004</option>
	<option value="2005">2005</option>

	<option value="2006">2006</option>
	<option value="2007">2007</option>
</select>
     <span id="RequiredFieldValidator4" style="color: Red; visibility: hidden;">*</span></td>
    </tr>
    
       <tr>
    <td><p><b>Home Phone:</b></p></td>

    
    <td><p><b>Work Phone:</b></p></td>
    <td><p><b>Mobile:</b></p></td>   
    </tr>
 
    
    
    <tr>

    <td style="height: 26px;"><input name="phone1a" maxlength="11" id="phone1a" class="text" type="text">&nbsp;<span id="RequiredFieldValidator12" style="color: Red; visibility: hidden;">*</span>        </td>
 

    <td style="height: 26px;"><input name="phone2a" maxlength="15" id="phone2a" class="text" type="text">
        <span id="RequiredFieldValidator28" style="color: Red; visibility: hidden;">*</span>    </td>


    <td style="height: 26px;"><input name="phone3a" maxlength="11" id="phone3a" class="text" type="text">
    <span id="RequiredFieldValidator13" style="color: Red; visibility: hidden;">*</span></td>
    </tr>
    
               <tr>
    <td><p style="font-size: 9px; color: gray;">Enter with no spaces</p></td>
    <td><p style="font-size: 9px; color: gray;">Enter with no spaces</p></td>

    <td><p style="font-size: 9px; color: gray;">Mobile No. Is Used To Confirm Loan</p></td>
    </tr>
      </tbody></table>			</td>
          </tr>
		    <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
		   <tr>
            <td height="28" colspan="3" bgcolor="#c75530" class="textheading style14" style="border:#006699 1px solid";>Your Addrss Details </td>
          </tr>
		  <tr>
            <td colspan="3"><table>
    <tbody><tr>

    <td><p><b>House Name/Number:</b></p></td>
    <td><p><b>Street Name:</b></p></td>
    <td><p><b>Town/City:</b></p></td>
    </tr>
    
      <tr>
    
    
  <td><input name="houseName" id="houseName" class="text" style="background-color: LightGrey;" type="text">
    <span id="RequiredFieldValidator5" style="color: Red; visibility: hidden;">*</span></td>

    <td><input name="address" id="address" class="text" style="background-color: LightGrey;" type="text">&nbsp;<span id="RequiredFieldValidator6" style="color: Red; visibility: hidden;">*</span></td>


    <td><input name="city" id="city" class="text" style="background-color: LightGrey;" type="text">
   <span id="RequiredFieldValidator7" style="color: Red; visibility: hidden;">*</span></td>
    </tr>
    <tr>
    <td><p><b>County:</b></p></td>
    </tr>
        <tr>
    
    <td>
        <input name="county" id="county" style="background-color: LightGrey;" type="text">     
    <span id="RequiredFieldValidator8" style="color: Red; visibility: hidden;">*</span></td>
</tr>
  </tbody></table></td>
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td height="28" colspan="3" bgcolor="#c75530" class="textheading style14" style="border:#006699 1px solid";>Your Income and Payday loan details</td>
          </tr>
          <tr>
            <td colspan="3">
			<table>
 
<tbody><tr>
<td style="width: 183px;"><p><b>Primary Income:</b></p></td>
<td style="width: 183px;"><p><b>Employer Name:</b></p></td>
<td style="width: 185px;"><p><b>Time at Employer:</b></p></td>
</tr>

    <tr>

    
     <td style="width: 183px; height: 26px;"><select name="employmentType" id="employmentType" style="width: 145px;">
	<option value=""></option>
	<option value="Full-Time Employment">Full-Time Employment</option>
	<option value="Part-Time Employment">Part-Time Employment</option>
	<option value="Self-Employment">Self-Employment</option>
	<option value="Temporary-Employment">Temporary-Employment</option>
	<option value="Student">Student</option>

	<option value="Pension">Pension</option>
	<option value="Disability Benefits">Disability Benefits</option>
	<option value="Self-Employment">Self-Employment</option>
	<option value="Unemployed">Unemployed</option>

</select>
<span id="Requiredfieldvalidator16" style="color: Red; visibility: hidden;">*</span></td>
    
   

    <td style="width: 183px; height: 26px;"><input name="employerName" id="employerName" class="text" type="text">

  <span id="Requiredfieldvalidator17" style="color: Red; visibility: hidden;">*</span></td>    
   
   <td style="width: 185px; height: 26px;"><select name="timeAtEmployer" id="timeAtEmployer">
	<option value=""></option>
	<option value="&lt; 2 Years">&lt; 2 Years</option>
	<option value="2 - 4 Years">2 - 4 Years</option>
	<option value="4 - 8 Years">4 - 8 Years</option>
	<option value="Over 8 Years">Over 8 Years</option>

</select>
    <span id="Requiredfieldvalidator18" style="color: Red; visibility: hidden;">*</span></td>
   </tr><tr>
    <td style="width: 183px; height: 18px;"><p><b>Net Monthly Pay (£):</b></p></td>
    <td style="height: 18px; width: 183px;"><p><b>Pay Frequency:</b></p></td>
    <td style="width: 185px; height: 18px;"><p><b>Paid Into Bank Account?:</b></p></td>
    </tr>

    <tr>
    
    <td style="width: 183px; height: 26px;">£
      <input name="netMonthlyPay" id="netMonthlyPay" class="text" style="width: 62px;" type="text">
        .00<span id="Requiredfieldvalidator19" style="color: Red; visibility: hidden;">*</span></td>
  

    <td style="height: 26px; width: 183px;"><select name="payFrequency" onChange="javascript:setTimeout('__doPostBack(\'payFrequency\',\'\')', 0)" id="payFrequency" style="width: 156px;">
	<option selected="selected" value=""></option>
	<option value="Last Working Day Of Month">Last Working Day Of Month</option>

	<option value="Weekly">Weekly</option>
	<option value="Four Weekly">Four Weekly</option>
	<option value="Biweekly">Biweekly</option>
	<option value="Specific Day Of Month">Specific Day Of Month</option>
	<option value="Last Monday Of Month">Last Monday Of Month</option>
	<option value="Last Tuesday Of Month">Last Tuesday Of Month</option>

	<option value="Last Wednesday Of Month">Last Wednesday Of Month</option>
	<option value="Last Thursday Of Month">Last Thursday Of Month</option>
	<option value="Last Friday Of Month">Last Friday Of Month</option>
	<option value="Specific Date">Specific Date</option>
	<option value="Twice Monthly">Twice Monthly</option>

</select>

        
    <span id="Requiredfieldvalidator20" style="color: Red; visibility: hidden;">*</span></td>
    

<td style="width: 185px; height: 26px;">
<select name="directDeposit" id="directDeposit" style="height: 22px;">
	<option value=""></option>
	<option value="Yes, UK Account">Yes, UK Account</option>
	<option value="Yes, Other Account">Yes, Other Account</option>
	<option value="No">No</option>
</select>
   <span id="Requiredfieldvalidator21" style="color: Red; visibility: hidden;">*</span></td>
    </tr>
   
   <tr>
  
    <td><p><b>Next Pay Date:</b></p></td>
    <td><p><b>Following Pay Date:</b></p></td>
    <td><p><b>National Insurance Number:</b></p></td>
    </tr>
    
    <tr>
    
    
    <td style="height: 26px; width: 183px;">
<select name="drpPayDay" id="drpPayDay" style="width: 40px;">
	<option value=""></option>
	<option value="01">01</option>
	<option value="02">02</option>
	<option value="03">03</option>

	<option value="04">04</option>
	<option value="05">05</option>
	<option value="06">06</option>
	<option value="07">07</option>
	<option value="08">08</option>
	<option value="09">09</option>

	<option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>
	<option value="13">13</option>
	<option value="14">14</option>
	<option value="15">15</option>

	<option value="16">16</option>
	<option value="17">17</option>
	<option value="18">18</option>
	<option value="19">19</option>
	<option value="20">20</option>
	<option value="21">21</option>

	<option value="22">22</option>
	<option value="23">23</option>
	<option value="24">24</option>
	<option value="25">25</option>
	<option value="26">26</option>
	<option value="27">27</option>

	<option value="28">28</option>
	<option value="29">29</option>
	<option value="30">30</option>
	<option value="31">31</option>
</select>
    <span id="RequiredFieldValidator25" style="color: Red; visibility: hidden;">*</span>&nbsp;

             <select name="drpPayMonth" id="drpPayMonth" style="width: 40px;">
	<option value=""></option>
	<option value="01">01</option>
	<option value="02">02</option>
	<option value="03">03</option>
	<option value="04">04</option>
	<option value="05">05</option>

	<option value="06">06</option>
	<option value="07">07</option>
	<option value="08">08</option>
	<option value="09">09</option>
	<option value="10">10</option>
	<option value="11">11</option>

	<option value="12">12</option>
</select>
                  <span id="RequiredFieldValidator24" style="color: Red; visibility: hidden;">*</span>&nbsp;
    <select name="drppayyear" id="drppayyear" style="width: 55px;">
	<option value=""></option>
	<option value="2008">2008</option>
	<option value="2009">2009</option>
</select><span id="RequiredFieldValidator29" style="color: Red; visibility: hidden;">*</span></td>
   
        <td style="height: 26px; width: 183px;"><select name="drppayday1" id="drppayday1" style="width: 40px;">
	<option value=""></option>
	<option value="01">01</option>
	<option value="02">02</option>
	<option value="03">03</option>
	<option value="04">04</option>

	<option value="05">05</option>
	<option value="06">06</option>
	<option value="07">07</option>
	<option value="08">08</option>
	<option value="09">09</option>
	<option value="10">10</option>

	<option value="11">11</option>
	<option value="12">12</option>
	<option value="13">13</option>
	<option value="14">14</option>
	<option value="15">15</option>
	<option value="16">16</option>

	<option value="17">17</option>
	<option value="18">18</option>
	<option value="19">19</option>
	<option value="20">20</option>
	<option value="21">21</option>
	<option value="22">22</option>

	<option value="23">23</option>
	<option value="24">24</option>
	<option value="25">25</option>
	<option value="26">26</option>
	<option value="27">27</option>
	<option value="28">28</option>

	<option value="29">29</option>
	<option value="30">30</option>
	<option value="31">31</option>

</select>
        <span id="RequiredFieldValidator26" style="color: Red; visibility: hidden;">*</span>&nbsp;
        <select name="drppaymonth1" id="drppaymonth1" style="width: 40px;">
	<option value=""></option>

	<option value="01">01</option>
	<option value="02">02</option>
	<option value="03">03</option>
	<option value="04">04</option>
	<option value="05">05</option>
	<option value="06">06</option>

	<option value="07">07</option>
	<option value="08">08</option>
	<option value="09">09</option>
	<option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>
</select>
        <span id="RequiredFieldValidator30" style="color: Red; visibility: hidden;">*</span>&nbsp;
        <select name="drppayyear1" id="drppayyear1" style="width: 55px;">
	<option value=""></option>
	<option value="2008">2008</option>
	<option value="2009">2009</option>
</select><span id="RequiredFieldValidator31" style="color: Red; visibility: hidden;">*</span></td>  
    <td><input name="txtNIN" id="txtNIN" type="text">

        <span id="RequiredFieldValidator27" style="color: Red; visibility: hidden;">*</span></td>
    </tr>
</tbody></table>			</td>
          </tr>
		   <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
		   <tr>
            <td height="28" colspan="3" bgcolor="#c75530" class="textheading style14" style="border:#006699 1px solid";>Your BankDetails </td>
          </tr>
           <tr>
             <td colspan="3">
			 <table>


        <tbody><tr>
        <td><p><b>Primary Debit Card:</b></p></td>
         <td><p><b>Bank Account Number:</b></p></td>
    <td><p><b>SortCode:</b></p></td>
    </tr>
    
         <tr>
         
          <td style="height: 26px; width: 185px;">

           
        <select name="cardType" id="cardType">
	<option value=""></option>
	<option value="Solo">Solo</option>
	<option value="Switch/Maestro">Switch/Maestro</option>
	<option value="Visa Delta">Visa Delta</option>
	<option value="Visa Electron">Visa Electron</option>
	<option value="No Debit Card">No Debit Card</option>

</select>
    <span id="Requiredfieldvalidator15" style="color: Red; visibility: hidden;">*</span></td>
    

         
         
         <td><input name="txtBankAccount" id="txtBankAccount" type="text">
             <span id="Requiredfieldvalidator32" style="color: Red; visibility: hidden;">*</span></td>
    <td style="width: 183px;"><input name="txtSortCode" maxlength="6" id="txtSortCode" type="text">
        <span id="Requiredfieldvalidator33" style="color: Red; visibility: hidden;">*</span></td>
    </tr>

    <tr>
        <td>&nbsp;</td>
        <td style="width: 183px;">
            Enter 8 Digit Account Number</td>
                    <td style="width: 183px;">
            Enter without spaces</td>
    </tr>
    </tbody></table>
			 </td>
           </tr>
           <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td height="28" colspan="3" bgcolor="#c75530" class="textheading style14" style="border:#006699 1px solid";>Acceptance of terms</td>
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td width="82" height="26" align="right" valign="top">
              <label>
                <input name="check" type="checkbox" id="check" value="checkbox" />
                </label>                  </td>
            <td width="9" valign="top"><span id="agree_to_dpa_text">
            <label for="agree_to_dpa"></label>
            </span></td>
            <td width="469" align="left" valign="top"><span id="agree_to_dpa_text">
              <label for="agree_to_dpa">I have read and agree with the</label>
              <a href="data-protection-policy.php" target="_blank">Data Protection Policies</a>* </span></td>
          </tr>
          <tr>
            <td height="49" align="right" valign="top">
              <label>
                <input type="checkbox" name="checkbox2" value="checkbox" />
                </label>                      </td>
            <td valign="top">&nbsp;</td>
            <td align="left" valign="top"><span id="opt_in_text">Please untick this box should you not wish to be  notified of any other promotions or special offers as made available by  our lenders and select partners. You can choose to opt out at any time  in the future.</span></td>
          </tr>
          <tr>
            <td colspan="3" align="center"><input name="btnNext" type="submit" value="Submit" /><!--<img src="images/submit.jpg" width="212" height="29" />--></td>
          </tr>
          <tr>
            <td colspan="3" align="center">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" align="center"><table width="548" height="14" cellpadding="0" cellspacing="0">
              <tr>
                <td width="315" align="left"><img src="images/imgs.jpg" width="152" height="35" /></td>
                <td width="231" align="right"><img src="images/imgs2.jpg" width="97" height="55" /></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td colspan="3" align="center">&nbsp;</td>
          </tr>
        </table>
        </form></td>
      </tr>
      <tr align="left">
        <td height="14" valign="top"><img src="images/bg-side3.jpg" width="383" height="10" /></td>
        <td width="571" align="center" valign="top">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="13" colspan="4" align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  
  <tr>
    <td height="31" colspan="4" align="left" valign="middle" bgcolor="#707070" class="style12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="terms-of-use.php" target="_blank">Terms of Use</a> &middot; 
	<a href="privacy-polacy.php" target="_blank">Privacy Policy</a> &middot; 
	<a href="data-protection-policy.php" target="_blank">Data Protection Policy</a> &middot; 
	<a href="anti-spam-policy.php" target="_blank">Anti-Spam Policy</a> &middot; 
	<a href="teel-a-friend.php" title="Tell a Friend (opens new window)" target="_blank">Tell a Friend</a>
	</td>
  </tr>
  <tr>
    <td height="13" colspan="4" align="center" valign="middle" class="style12"><img src="images/bg-bottom00.jpg" width="955" height="12" /></td>
  </tr>
  <tr>
    <td height="22" colspan="4" align="center" valign="middle" class="style12">&copy; 2007-2008 Payday Cash Today. All Rights Reserved.</td>
  </tr>
</table>
<br />
<br />
</body>
</html>
