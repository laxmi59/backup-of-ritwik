<?php
$feedSelectQry=mysql_query("SELECT * FROM wp_directors where did=$did  ");
$res=mysql_fetch_array($feedSelectQry) ;
if($_REQUEST['Submit'])
{
	$empDesc=implode("&&&",$_POST['description']);
	if (in_array("other",$_POST['description']))
	{
		 $empDesc.="::".$_POST['otherDesc'];
	}
	$memReq=implode("&&&",$_POST['membership']);
	$committeInt=implode("&&&",$_POST['association']);
	$inserQry="  UPDATE  wp_directors SET  firsrName='".addslashes(trim($_POST['fName']))."',  middileIntial='".addslashes(trim($_POST['mIntial']))."', lastName ='".addslashes(trim($_POST['lName']))."' , nickName= '".addslashes(trim($_POST['nName']))."' , firmName='".addslashes(trim($_POST['firmName']))."' , attorneys='".addslashes(trim($_POST['Attorneys']))."' , positionTitle= '".addslashes(trim($_POST['positionTitle']))."', yerasInCurrentPosition='".addslashes(trim($_POST['yearsInPos']))."' ,  managingPartner='".addslashes(trim($_POST['mPartner']))."' ,  listingOrder = '".addslashes(trim($_POST['lOrder']))."' , address1='".addslashes(trim($_POST['address1']))."' ,  address2='".addslashes(trim($_POST['address2']))."' ,  city='".addslashes(trim($_POST['City']))."' ,  state='".addslashes(trim($_POST['State']))."' , zip='".addslashes(trim($_POST['Zip']))."' ,  email1='".addslashes(trim($_POST['email1']))."' ,   email2='".addslashes(trim($_POST['email2']))."' ,   clm='".addslashes(trim($_POST['clm']))."' ,  certifications='".addslashes(trim($_POST['certifications']))."' ,  education='".addslashes(trim($_POST['education']))."' ,  workPhone='".addslashes(trim($_POST['wPhone']))."' ,  workPhoneExt='".addslashes(trim($_POST['wPhoneExt']))."' ,  directDialNum='".addslashes(trim($_POST['dDialNum']))."' ,  altTelNum='".addslashes(trim($_POST['altPhone']))."'  ,   alaMemberNum='".addslashes(trim($_POST['aMemberNum']))."' ,  firstYearAla='".addslashes(trim($_POST['yearFirst']))."'  ,firstYearAlaSuncoast ='".addslashes(trim($_POST['firstYearAlaSuncoast']))."'    ,  currentExpiration='".addslashes(trim($_POST['currentExpiration']))."'     ,  currentBoardMember='".addslashes(trim($_POST['currentBoardMember']))."'   ,   previousBoardMember='".addslashes(trim($_POST['previousBoardMember']))."'   , boardPositionsHeld= '".addslashes(trim($_POST['boardPositionsHeld']))."'   , descOfEmployer='".$empDesc."'  ,  typeOfMembership= '".$memReq."' ,  committeIntrested='".$committeInt."'      ";
	if($_REQUEST['replace'])
	{
		$originalpath="../wp-content/uploads/";
		$PhotoTitle=$_FILES['mPhoto']['name'];
		$time=time();
		$PhotoTitle=$time.$PhotoTitle;
		$storePhotoIn=$originalpath.$PhotoTitle;
		move_uploaded_file($_FILES['mPhoto']["tmp_name"],$storePhotoIn);
		$inserQry.="  , photograph = '".$PhotoTitle."'  ";
	}
	$inserQry.= "  WHERE did=$did ";
	 mysql_query($inserQry);
	 wp_redirect(get_option('siteurl') . '/wp-admin/admin.php?page=Manage-directors&pageNo='.$rePage.'&msg=updated');
}
?>
<style type="text/css">
body, p, ul, li, h1, h2, h3, h4, dl, dt, dd, span {	margin:0;	padding:0;}
fieldset {margin:0;	padding:5px 10px;	border:1px solid #DDDDDD;	color:#666666;	width:535px;}
legend {font-weight:bold;	margin:0 5px;	font-size:14px;	color:#000000;}
.clear {clear:both;}
.f-left {float:left !important;}
.f-right {float:right !important;}
.wrapper-frm {width:620px;	margin:0 auto;}
dl.fym-form {float:left;	line-height:21px;}
dl.fym-form dt {float:left;	padding-right:5px;	width:208px;	line-height:18px;}
dl.fym-form dd {float:left;	margin-bottom:8px;	width:300px;}
dl.fym-form dd input[type="text"], dl.fym-form dd textarea {	width:303px;}
dl.fym-form dd input[type="radio"]{ margin-right:3px;}
.m-rt0 {margin-right:0 !important;}
.m-tp50 {margin-top:50px;}
.m-btm0 {margin-bottom:0px !important;}
.m-tp25 {margin-top:25px;}
.hi-36 {height:36px !important;}
.wtn {width:213px !important;}
.wtn-ext {width:50px !important;}
.terms {font-weight:bold; margin:25px 0;}
ul.chk-list {list-style-type:none;	float:left;	line-height:22px;}
ul.chk-list li {float:left;	margin-right:15px;}
ul.chk-list li input["checkbox"] {margin-right:5px;}
ul.chk-list2 {list-style-type:none;	float:left;	line-height:22px;}
ul.chk-list2 li {overflow:hidden;	margin-right:20px;	float:left;}
ul.chk-list2 li input["checkbox"] {margin-right:5px;}
ul.sign-form {list-style-type:none;	line-height:22px;}
ul.sign-form li {margin-right:50px;	float:left;}
ul.sign-form li input {border:none;	width:70px;}
ul.sign-form li label {display:block;	font-weight:bold;}
.style1 {margin-top: 25px;	font-style: italic;}
.style2 {margin-top: 50px;	font-style: italic;}
.input-brdr {border:0;}
.frm-submit {color:#FFFFFF !important;	background:#5C0025 !important;	border:0px !important;	padding:2px 5px !important;	font-weight:bold !important;	cursor:pointer;}
.wrapper-frm p {margin-bottom:0 !important;}
.othr {width:70px !important;}
</style>
<script type="text/javascript">
function ltrim(s)
{
   return s.replace(/^\s*/,"");
}
function rtrim(s)
{
 return s.replace(/\s*$/,""); 
}
function trim(s)
{
  return rtrim(ltrim(s)); 
}
function checkImage(imgFile)
{
	var b=imgFile.lastIndexOf('.',imgFile.length);
	var c=imgFile.substr(b+1,imgFile.length);
	if(!((c=='jpg')||(c=='JPG')||(c=='png')||(c=='PNG')||(c=='jpeg')||(c=='JPEG')||(c=='gif')||(c=='GIF')||(c=='bmp')||(c=='BMP')))
	{
		return false;
	}
	return true;
}
function replaceImage()
{
	if(document.memberReg.replace.checked)
	{
	document.memberReg.mPhoto.disabled=false;
	
	}
	else
	{
	document.memberReg.mPhoto.disabled=true;
	
	}
}
function validateregfrm()
{
	var sErrStr = ""; 
   	var sFieldName = "";
	var emailexp=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;	
	var formName=document.memberReg;
	if(trim(formName.fName.value)=='')
	{
		sErrStr +=" First Name \n";
		if(sFieldName == "")
		sFieldName="fName";
	}
/*	if(trim(formName.mIntial.value)=='')
	{
		sErrStr +=" Middle Intial \n";
		if(sFieldName == "")
		sFieldName="mIntial";
	}*/
	if(trim(formName.lName.value)=='')
	{
		sErrStr +=" Last Name \n";
		if(sFieldName == "")
		sFieldName="lName";
	}
	if(trim(formName.firmName.value)=='')
	{
		sErrStr +=" Firm Name \n";
		if(sFieldName == "")
		sFieldName="firmName";
	}
	if(trim(formName.Attorneys.value)=='')
	{
		sErrStr +=" # of attorneys \n";
		if(sFieldName == "")
		sFieldName="Attorneys";
	}
	if(trim(formName.positionTitle.value)=='')
	{
		sErrStr +=" PositionTitle \n";
		if(sFieldName == "")
		sFieldName="positionTitle";
	}
	if(trim(formName.yearsInPos.value)=='')
	{
		sErrStr +=" Years in current position \n";
		if(sFieldName == "")
		sFieldName="yearsInPos";
	}
	/*if(trim(formName.mPartner.value)=='')
	{
		sErrStr +=" Managing Partner  \n";
		if(sFieldName == "")
		sFieldName="mPartner";
	}*/
	if(trim(formName.lOrder.value)=='')
	{
		sErrStr +=" Listing Order \n";
		if(sFieldName == "")
		sFieldName="lOrder";
	}
	if(trim(formName.address1.value)=='')
	{
		sErrStr +=" Address1 \n";
		if(sFieldName == "")
		sFieldName="address1";
	}
	/*if(trim(formName.address2.value)=='')
	{
		sErrStr +=" Address2 \n";
		if(sFieldName == "")
		sFieldName="address2";
	}*/
	if(trim(formName.City.value)=='')
	{
		sErrStr +=" City \n";
		if(sFieldName == "")
		sFieldName="City";
	}
	if(trim(formName.State.value)=='')
	{
		sErrStr +=" State \n";
		if(sFieldName == "")
		sFieldName="State";
	}
	if(trim(formName.Zip.value)=='')
	{
		sErrStr +=" Zip \n";
		if(sFieldName == "")
		sFieldName="Zip";
	}
	if(trim(formName.email1.value)=='')
	{
		sErrStr +=" Director Email address \n";
		if(sFieldName == "")
		sFieldName="email1";
	}
	if(trim(formName.email1.value)!='')
	{
		if(emailexp.test(formName.email1.value)==0)
		{
			sErrStr +=" Invalid Director Email address \n";
			if(sFieldName == "")
			sFieldName="email1";
		}
	}
	/*if(trim(formName.email2.value)=='')
	{
		sErrStr +=" Alternate Email address \n";
		if(sFieldName == "")
		sFieldName="email2";
	}
	if(trim(formName.email2.value)!='')
	{
		if(emailexp.test(formName.email2.value)==0)
		{
			sErrStr +=" Invalid Alternate Email address \n";
			if(sFieldName == "")
			sFieldName="email2";
		}
	}*/
	if( formName.replace.checked &&  trim(formName.mPhoto.value)=='')
	{
		sErrStr +=" Director Photograph \n";
		if(sFieldName == "")
		sFieldName="mPhoto";
	}
	if(trim(formName.mPhoto.value)!='')
	{
		if(!checkImage(formName.mPhoto.value))
		{
			sErrStr+=" Valid Director Photograph \n";
			if(sFieldName=="")
			sFieldName="mPhoto";
		}
	}
	if(    formName.clm[0].checked==false  &&   formName.clm[1].checked==false )
	{
		sErrStr +=" CLM \n";
		if(sFieldName == "")
		sFieldName="clm";
	}
	/*if(trim(formName.clm.value)=='')
	{
		sErrStr +=" CLM \n";
		if(sFieldName == "")
		sFieldName="clm";
	}*/
	/*if(trim(formName.certifications.value)=='')
	{
		sErrStr +=" Other Certifications (CPA,CHRS, etc.) \n";
		if(sFieldName == "")
		sFieldName="certifications";
	}*/
	if(trim(formName.education.value)=='')
	{
		sErrStr +=" Highest Level of Education Completed \n";
		if(sFieldName == "")
		sFieldName="education";
	}
	if(trim(formName.wPhone.value)=='')
	{
		sErrStr +=" Work Telephone Number \n";
		if(sFieldName == "")
		sFieldName="wPhone";
	}
	/*if(trim(formName.wPhoneExt.value)=='')
	{
		sErrStr +=" Work Telephone Number Ext \n";
		if(sFieldName == "")
		sFieldName="wPhoneExt";
	}*/
	/*if(trim(formName.dDialNum.value)=='')
	{
		sErrStr +=" Direct Dial Number \n";
		if(sFieldName == "")
		sFieldName="dDialNum";
	}
	if(trim(formName.dDialNum.value)=='')
	{
		sErrStr +=" Direct Dial Number \n";
		if(sFieldName == "")
		sFieldName="dDialNum";
	}*/
	/*if(trim(formName.altPhone.value)=='')
	{
		sErrStr +=" Alternate Telephone Number \n";
		if(sFieldName == "")
		sFieldName="altPhone";
	}*/
	if(trim(formName.aMemberNum.value)=='')
	{
		sErrStr +=" ALA Member Number \n";
		if(sFieldName == "")
		sFieldName="aMemberNum";
	}
	if(trim(formName.yearFirst.value)=='')
	{
		sErrStr +=" Year first joined the ALA \n";
		if(sFieldName == "")
		sFieldName="yearFirst";
	}
/*	if(trim(formName.uIdentification.value)=='')
	{
		sErrStr +=" User Identification \n";
		if(sFieldName == "")
		sFieldName="uIdentification";
	}
	if(formName.uPwd.value=='')
	{
		sErrStr +=" User Password \n";
		if(sFieldName == "")
		sFieldName="uPwd";
	}*/
/*	var descChecked="";
	var descArray=new Array();
	descArray=document.memberReg["description[]"];
	for(var i = 0; i < descArray.length; i++)
	{
		if(descArray[i].checked)
		descChecked+=descArray[i].value;
	}
	if(descChecked=='')
	{
		sErrStr +=" Description of employer \n";
		if(sFieldName == "")
		sFieldName="uPwd";
	}
	if(    descArray[(descArray.length-1)].checked    )
	{
		if(trim(formName.otherDesc.value)=='')
		{
			sErrStr +=" Other description \n";
			if(sFieldName == "")
			sFieldName="otherDesc";
		}
	}
	var mamTypeChecked="";
	var mamTypeArray=new Array();
	mamTypeArray=document.memberReg["membership[]"];
	for(var i = 0; i < mamTypeArray.length; i++)
	{
		if(mamTypeArray[i].checked)
		mamTypeChecked+=mamTypeArray[i].value;
	}
	if(mamTypeChecked=='')
	{
		sErrStr +=" Membership requested \n";
		if(sFieldName == "")
		sFieldName="uPwd";
	}
	var committeChecked="";
	var committeArray=new Array();
	committeArray=document.memberReg["association[]"];
	for(var i = 0; i < committeArray.length; i++)
	{
		if(committeArray[i].checked)
		committeChecked+=committeArray[i].value;
	}
	if(committeChecked=='')
	{
		sErrStr +=" Committee you are interested in joining \n";
		if(sFieldName == "")
		sFieldName="uPwd";
	}*/
	/*if(document.memberReg.accept.checked==false)
	{
		sErrStr +=" Accept the terms \n";
		if(sFieldName == "")
		sFieldName="accept";
	}*/
	if (sErrStr != "")
	{
		alert("Please enter following fields \n\n"+sErrStr);
		//formName.sFieldName.focus();
		return false;
	}
}
</script>
<div class="wrapper-frm">
  <form name="memberReg" action="<?php the_permalink(); ?>" method="post" onsubmit="javascript: return validateregfrm();" enctype="multipart/form-data">
    <fieldset>
    <legend>DIRECTOR REGISTRATION</legend>
    <dl class="fym-form">
	<p><span style="color:#FF0000">*</span>-required fields</p>
      <dt><span style="color:#FF0000">*</span>First Name:</dt><dd><input name="fName" id="fName" type="text" value="<?php  echo $res['firsrName']; ?>" /></dd>
      <dt>Middle Initial:</dt><dd><input name="mIntial" id="mIntial" type="text"  value="<?php  echo $res['middileIntial']; ?>" /></dd>
      <dt><span style="color:#FF0000">*</span>Last Name:</dt><dd><input name="lName" id="lName" type="text"   value="<?php  echo $res['lastName']; ?>"/></dd>
      <dt>Nickname:</dt><dd><input name="nName" id="nName" type="text"  value="<?php  echo $res['nickName']; ?>"/></dd>
      <dt><span style="color:#FF0000">*</span>Firm Name:</dt><dd><input name="firmName" id="firmName" type="text"  value="<?php  echo $res['firmName']; ?>" /></dd>
      <dt><span style="color:#FF0000">*</span># of attorneys:</dt><dd><input name="Attorneys" id="Attorneys" type="text"  value="<?php  echo $res['attorneys']; ?>"/></dd>
      <dt><span style="color:#FF0000">*</span>Position Title:</dt><dd><input name="positionTitle" id="positionTitle" type="text"  value="<?php  echo $res['positionTitle']; ?>"/></dd>
	  <dt><span style="color:#FF0000">*</span>Years in current position:</dt><dd><input name="yearsInPos" id="yearsInPos" type="text"  value="<?php  echo $res['yerasInCurrentPosition']; ?>"/></dd>
      <dt>Managing Partner:</dt><dd><input name="mPartner" id="mPartner" type="text"  value="<?php  echo $res['managingPartner']; ?>"/></dd>
	    <dt><span style="color:#FF0000">*</span>Listing Order:</dt><dd><input name="lOrder" id="lOrder" type="text"  value="<?php  echo $res['listingOrder']; ?>"/></dd>
      <dt><strong>Director Mailing Address:</strong></dt>
      <dd>&nbsp;</dd>
      <dt><span style="color:#FF0000">*</span>Address 1:</dt><dd><input name="address1" id="address1" type="text"  value="<?php  echo $res['address1']; ?>"/></dd>
      <dt>Address 2:</dt><dd><input name="address2" id="address2" type="text"  value="<?php  echo $res['address2']; ?>"/></dd>
      <dt><span style="color:#FF0000">*</span>City:</dt><dd><input name="City" id="City" type="text"  value="<?php  echo $res['city']; ?>"/></dd>
      <dt><span style="color:#FF0000">*</span>State:</dt><dd><input name="State" id="State" type="text"  value="<?php  echo $res['state']; ?>"/></dd>
      <dt><span style="color:#FF0000">*</span>Zip:</dt><dd><input name="Zip" id="Zip" type="text"  value="<?php  echo $res['zip']; ?>"/></dd>
      <dt><span style="color:#FF0000">*</span>Director Email address:</dt>
      <dd><input name="email1" id="email1" type="text"  value="<?php  echo $res['email1']; ?>"/></dd>
      <dt>Alternate Email address:</dt><dd><input name="email2" id="email2" type="text"  value="<?php  echo $res['email2']; ?>"/></dd>
	    <dt><input name="replace" id="replace" type="checkbox" onClick="javascript:return replaceImage();"/>Replace current image</dt><dd>&nbsp;</dd>
		<div><img src="<?php echo "../wp-content/uploads/".$res['photograph'].""; ?>"  height="100" width="80" /></div>
      <dt>Director Photograph:</dt>
      <dd><input type="file" name="mPhoto" id="mPhoto"  disabled="disabled" /></dd>
      <dt><span style="color:#FF0000">*</span>CLM:</dt><dd><input class="" type="radio" name="clm" value="Yes" <?php if($res['clm']=="Yes") echo "checked"; ?> />Yes &nbsp; <input type="radio" class="" name="clm" value="No" <?php if($res['clm']=="No") echo "checked"; ?> />No</dd>
      <dt>Other Certifications (CPA,CHRS, etc.):</dt><dd class="hi-36"><input name="certifications" id="certifications" type="text"  value="<?php  echo $res['certifications']; ?>"/></dd>
      <dt><span style="color:#FF0000">*</span>Highest Level of Education Completed:</dt><dd class="hi-36"><input name="education" id="education" type="text"  value="<?php  echo $res['education']; ?>"/></dd>
      <dt><span style="color:#FF0000">*</span>Work Telephone Number:</dt><dd><span class="f-left"><input class="wtn" name="wPhone" id="wPhone" type="text"  value="<?php  echo $res['workPhone']; ?>"/>&nbsp;Ext:</span><span class="f-right"><input class="wtn-ext" name="wPhoneExt" id="wPhoneExt" type="text"  value="<?php  echo $res['workPhoneExt']; ?>"/></span></dd>
      <dt>Direct Dial Number:</dt><dd><input name="dDialNum" id="dDialNum" type="text"  value="<?php  echo $res['directDialNum']; ?>"/></dd>
      <dt>Alternate Telephone Number:</dt><dd><input name="altPhone" id="altPhone" type="text"  value="<?php  echo $res['altTelNum']; ?>"/></dd>
      <dt><span style="color:#FF0000">*</span>ALA Member Number:</dt><dd><input name="aMemberNum" id="aMemberNum" type="text"  value="<?php  echo $res['alaMemberNum']; ?>"/></dd>
	   <dt><span style="color:#FF0000">*</span>Year first joined the ALA:</dt><dd ><input name="yearFirst" id="yearFirst" type="text"  value="<?php  echo $res['firstYearAla']; ?>"/></dd>
      <dt>Year first joined Suncoast ALA:</dt><dd class="hi-36"><input name="firstYearAlaSuncoast" id="firstYearAlaSuncoast" type="text" value="<?php  echo $res['firstYearAlaSuncoast']; ?>"/></dd>
      <dt>Current Membership Expiration:</dt><dd><input name="currentExpiration" id="currentExpiration" type="text" value="<?php  echo $res['currentExpiration']; ?>"/></dd>
      <dt>Current Board Member:</dt><dd><input name="currentBoardMember" id="currentBoardMember" type="text" value="<?php  echo $res['currentBoardMember']; ?>"/></dd>
      <dt>Previous Board Member:</dt><dd><input name="previousBoardMember" id="previousBoardMember" type="text" value="<?php  echo $res['previousBoardMember']; ?>"/></dd>
      <dt>Board Positions Held:</dt><dd><input name="boardPositionsHeld" id="boardPositionsHeld" type="text" value="<?php  echo $res['boardPositionsHeld']; ?>"/></dd>
    </dl>
    </fieldset>
    <div class="clear"></div>
    <p class="style2">Please check the most appropriate description of employer:</p>
	<?php
	$empDescArr=explode ("&&&", $res['descOfEmployer']);
	?>
    <ul class="chk-list">
      <li>
        <input name="description[]" id="description[]" type="checkbox" value="Private Law Office"  <?php if (in_array("Private Law Office",  $empDescArr  )) echo "checked='checked'"; ?>/>
        Private Law Office</li>
      <li>
        <input name="description[]" id="description[]" type="checkbox" value="Government Legal Dept/Judicial Agency/Court" <?php if (in_array("Government Legal Dept/Judicial Agency/Court",  $empDescArr  )) echo "checked='checked'"; ?> />
        Government Legal Dept/Judicial Agency/Court</li>
      <li>
        <input name="description[]" id="description[]" type="checkbox" value="Corporate Legal Dept" <?php if (in_array("Corporate Legal Dept",  $empDescArr  )) echo "checked='checked'"; ?> />
        Corporate Legal Dept</li>
      <br />
      <li>
        <input name="description[]" id="description[]" type="checkbox" value="College/University" <?php if (in_array("College/University",  $empDescArr  )) echo "checked='checked'"; ?> />
        College/University</li>
      <li>
        <input name="description[]" id="description[]" type="checkbox" value="Bar Association"  <?php if (in_array("Bar Association",  $empDescArr  )) echo "checked='checked'"; ?>/>
        Bar Association</li>
      <li>
        <input name="description[]" id="description[]" type="checkbox" value="Student" <?php if (in_array("Student",  $empDescArr  )) echo "checked='checked'"; ?>/>
        Student</li>
      <li>
	  <?php
	  $lastInEmpDesc=$empDescArr[count($empDescArr)-1];
	  if( substr_count($lastInEmpDesc, 'other') >  0 )
	  {
	  	$otherDescArr=explode("::",$lastInEmpDesc);
		$otherDesc=$otherDescArr[1];
	  }
	  ?>
        <input name="description[]" id="description[]" type="checkbox" value="other"  <?php  if( substr_count($lastInEmpDesc, 'other') >  0 ) echo "checked='checked'"; ?>/>
        Other:</li>
       <li> <input class="othr" name="otherDesc" id="otherDesc" type="text" value="<?php  echo $otherDesc; ?>"/></li>
      
    </ul>
    <div class="clear"></div>
    <p class="style1">Please check type of membership requested:</p>
	<?php
	$memTypeArr=explode ("&&&", $res['typeOfMembership']);
	?>
    <ul class="chk-list">
      <li>
        <input name="membership[]" id="membership[]" type="checkbox" value="Regular membership"  <?php if (in_array("Regular membership",  $memTypeArr  )) echo "checked='checked'"; ?>/>
        <strong>Regular membership</strong></li>
      <li>
        <input name="membership[]" id="membership[]" type="checkbox" value="Associate membership"  <?php if (in_array("Associate membership",  $memTypeArr  )) echo "checked='checked'"; ?>/>
        <strong>Associate membership</strong></li>
    </ul>
    <div class="clear"></div>
    <p>Membership in the Chapter is open to any individual, who is a member in good standing in the national association, and who meets the criteria for regular or associate membership.</p>
    <p class="style1">Please indicate below which committee you are interested in joining:</p>
	<?php
	$comIntArr=explode ("&&&", $res['committeIntrested']);
	?>
    <ul class="chk-list2">
      <li>
        <input name="association[]" id="association[]" type="checkbox" value="Educational Programs" <?php if (in_array("Educational Programs",  $comIntArr  )) echo "checked='checked'"; ?>/>
        Educational Programs</li>
      <li>
        <input name="association[]" id="association[]" type="checkbox" value="Membership" <?php if (in_array("Membership",  $comIntArr  )) echo "checked='checked'"; ?>/>
        Membership</li>
      <li>
        <input name="association[]" id="association[]" type="checkbox" value="Vendor Relations / Newsletter Ads" <?php if (in_array("Vendor Relations / Newsletter Ads",  $comIntArr  )) echo "checked='checked'"; ?>/>
        Vendor Relations / Newsletter Ads</li>
      <li>
        <input name="association[]" id="association[]" type="checkbox" value="Newsletter" <?php if (in_array("Newsletter",  $comIntArr  )) echo "checked='checked'"; ?>/>
        Newsletter</li>
      <li>
        <input name="association[]" id="association[]" type="checkbox" value="Marketing" <?php if (in_array("Marketing",  $comIntArr  )) echo "checked='checked'"; ?>/>
        Marketing</li>
      <li>
        <input name="association[]" id="association[]" type="checkbox" value="Technology" <?php if (in_array("Technology",  $comIntArr  )) echo "checked='checked'"; ?>/>
        Technology</li>
      <li>
        <input name="association[]" id="association[]" type="checkbox" value="Community Challenge" <?php if (in_array("Community Challenge",  $comIntArr  )) echo "checked='checked'"; ?>/>
        Community Challenge</li>
    </ul>
    <div class="clear"></div><br>
<br>

    <input  name="Submit" type="submit" value="Submit"  />
  </form>
</div>
