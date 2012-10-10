<?php
include_once (TEMPLATEPATH . '/lib/Functions.php');
include_once (TEMPLATEPATH . '/lib/GlobalValues.php');
extract($_REQUEST);
if($uid) {
	$feedSelectQry=mysql_query("SELECT * FROM contactdetails where contactdet_id=$uid  ");
	$res=mysql_fetch_array($feedSelectQry) ; 
}
if($_REQUEST['Submit']){
	extract($_POST);
	$email=$_REQUEST['field5'];
	$dupEmailQry="SELECT 1 FROM contactdetails  WHERE  email='".$email."' ";
	if($uid)
	$dupEmailQry.=" AND email!='".$res['email']."' ";
	$noOfDups=@mysql_num_rows(mysql_query($dupEmailQry));
	if($noOfDups > 0 ) {
		$errMsg='Email already exists';
	}
	else {
		$password=base64_encode($_REQUEST['field3']);
		$firstname=$_REQUEST['field1'];
		$lastname=$_REQUEST['field2'];
		$phone_home=$_REQUEST['field7'];
		$phone_work=$_REQUEST['pwork'];
		$phone_cell=$_REQUEST['pcell'];
		$fax=$_REQUEST['fax'];
		
		$billing_address=$_REQUEST['field8'];
		$billing_city=$_REQUEST['field9'];
		$billing_country=$_REQUEST['country'];
		if($_REQUEST['stateSelect']!=''){
			$billing_state=$_REQUEST['stateSelect'];
		}else{
			$billing_state=$_REQUEST['stateSelect1'];
		}
		$billing_zipcode=$_SESSION['currentuser']['billing_zipcode']=$_REQUEST['field12'];
		
		if($areu[0]==0){
			$shipping_address=$_REQUEST['shippingaddress'];
			$shipping_city=$_REQUEST['city2'];
			$shipping_country=$_REQUEST['countrySelect2'];
			if($_REQUEST['stateSelect2']!=''){
				$shipping_state=$_REQUEST['stateSelect2'];
			}else{
				$shipping_state=$_REQUEST['stateSelect21'];
			}
			$shipping_zipcode=$_REQUEST['zip2'];
		}elseif($areu[0]==1){
			$shipping_address=$_REQUEST['field8'];
			$shipping_city=$_REQUEST['field9'];
			$shipping_country=$_REQUEST['country'];
			if($_REQUEST['stateSelect']<>''){
				$shipping_state=$_REQUEST['stateSelect'];
			}else{
				$shipping_state=$_REQUEST['stateSelect1'];
			}
			$shipping_zipcode=$_REQUEST['field12'];
		}
		if($uid) {
		
			$updateQry="UPDATE contactdetails SET firstname='".addslashes(trim($firstname))."' ,  lastname='".addslashes(trim($lastname))."' ,email='".addslashes(trim($email))."' ,password='".$password."' ,phone_home='".addslashes(trim($phone_home))."' ,phone_work='".addslashes(trim($phone_work))."' ,phone_cell='".addslashes(trim($phone_cell))."' ,fax='".addslashes(trim($fax))."' ,billing_address='".addslashes(trim($billing_address))."' ,billing_city='".addslashes(trim($billing_city))."' ,billing_country='".addslashes(trim($billing_country))."' ,billing_state='".addslashes(trim($billing_state))."' ,billing_zipcode='".addslashes(trim($billing_zipcode))."' ,shipping_address='".addslashes(trim($shipping_address))."' ,shipping_city='".addslashes(trim($shipping_city))."' ,shipping_country='".addslashes(trim($shipping_country))."' ,shipping_state='".addslashes(trim($shipping_state))."' ,shipping_zipcode='".addslashes(trim($shipping_zipcode))."' WHERE contactdet_id='".$uid."'";
			mysql_query($updateQry);
			wp_redirect(get_option('siteurl') . '/wp-admin/admin.php?page=Manage-users&msg=updated');
		}
		else {
			$label=$_REQUEST['labelNo'];
			//$labeldetails=getLabeldetails($label);
			$hidexsistcode=$_REQUEST['hidexsistcode'];
			$insertUserInfoQuery="insert into contactdetails(firstname,lastname,email,password,phone_home,phone_work,phone_cell,fax,billing_address,billing_city,billing_country,billing_state,billing_zipcode,shipping_address,shipping_city,shipping_country,	shipping_state,shipping_zipcode,date) values('".addslashes(trim($firstname))."','".addslashes(trim($lastname))."','".addslashes(trim($email))."','".$password."','".addslashes(trim($phone_home))."','".addslashes(trim($phone_work))."','".addslashes(trim($phone_cell))."','".addslashes(trim($fax))."','".addslashes(trim($billing_address))."','".addslashes(trim($billing_city))."','".addslashes(trim($billing_country))."','".addslashes(trim($billing_state))."','".addslashes(trim($billing_zipcode))."','".addslashes(trim($shipping_address))."','".addslashes(trim($shipping_city))."','".addslashes(trim($shipping_country))."','".addslashes(trim($shipping_state))."','".addslashes(trim($shipping_zipcode))."',now())"; 
				$exeUserInfoQuery=mysql_query($insertUserInfoQuery);
				//Inserting the User Contact info to the Db eof//
					
				$userId=@mysql_insert_id();		
				$assignLabel=assignLabel2client($userId,$label);
				$labelDetailsQry=mysql_query("SELECT * FROM labels WHERE label_id=$label");
				$labelDetailsQry=mysql_fetch_array($labelDetailsQry);
				$replyto = get_bloginfo("admin_email");
				$headers = "MIME-Version: 1.0\r\n" .
				"From: ".$replyto."<".$replyto.">\n" . 	
				"Content-Type: text/HTML; charset=\"" . get_settings('blog_charset') . "\"\r\n";  
				$body="your LabelNO: ".$labelDetailsQry['labelno'];
				mail($email,"Regarding RecoverLink Label",$body,$headers);
				 wp_redirect(get_option('siteurl') . '/wp-admin/admin.php?page=Manage-users&msg=inserted');
		}
	}
}
?>

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
function IsNumeric(sText)

{
   var ValidChars = "0123456789";
   var IsNumber=true;
   var Char;

 
   for (i = 0; i < sText.length && IsNumber == true; i++) 
      { 
      Char = sText.charAt(i); 
      if (ValidChars.indexOf(Char) == -1) 
         {
         IsNumber = false;
         }
      }
   return IsNumber;
   
   }

function validateregfrm()
{
	var sErrStr = ""; 
   	var sFieldName = "";
	var emailexp=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;	
	var formName=document.memberReg;
	if(trim(formName.userId.value)=='')
	{
		sErrStr +=" User ID \n";
		if(sFieldName == "")
		sFieldName="userId";
	}
	if(trim(formName.userId.value)!='')
	{
		if( ! (   IsNumeric ( trim(formName.userId.value) )   )  )
		{
			sErrStr +=" Valid User ID \n";
			if(sFieldName == "")
			sFieldName="userId";
		}
	}
	if(trim(formName.fName.value)=='')
	{
		sErrStr +=" First Name \n";
		if(sFieldName == "")
		sFieldName="fName";
	}
	/*if(trim(formName.mIntial.value)=='')
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
	/*if(trim(formName.mPhoto.value)=='')
	{
		sErrStr +=" Member Photograph \n";
		if(sFieldName == "")
		sFieldName="mPhoto";
	}*/
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
	}
	if(trim(formName.altPhone.value)=='')
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
	if(trim(formName.uIdentification.value)=='')
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
	}
	/*var descChecked="";
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

<?php echo "<b><font color='red'>".$errMsg."</font></b>"; ?>
 
 

 
 <style type="text/css">
 body{  margin:0px auto; font-size:14px;  font-family:Arial, Helvetica, sans-serif; }
h3 {clear: both;}
/*=============contact=========*/
.contactform{padding-top:20px; display:block;}
textarea ,input  , select{ -moz-border-radius:5px; -webkit-border-radius:5px;  border-radius: 5px;}
.contactform input {height:20px !important; margin-bottom:5px !important; width:200px; }
.contactform select{margin-bottom:5px !important; width:205px;}
.contactform textarea {  width:200px; overflow:auto;}
.contactform h3{padding:10px 0 !important; display:block; font-weight:bold; color:#000;}
.contactform .submit{background:url(../images/input-submit-bg.gif) repeat-x left bottom;   border:solid 0px #0e57a5 !important; color:#fff !important; font-weight:bold; height:30px !important;     display:block; margin:5px 0 0 0; padding:0px 8px 3px 8px; width:auto !important;  #padding:3px;}
.submit{background:url(../images/input-submit-bg.gif) repeat-x left bottom;   border:solid 0px #0e57a5 !important; color:#fff !important; font-weight:bold; height:30px !important;     display:block; margin:5px 0 0 0; padding:0px 8px 3px 8px; width:auto !important;}
.contactform .orange-bt , .orange-bt{background:url(../images/orange.gif) repeat-x left bottom;   border:solid 0px #0e57a5 !important; color:#fff !important; font-weight:bold; height:30px !important;     display:block; margin:5px 0 0 0; padding:0px 8px 3px 8px; width:auto !important;}
.contactform .green-bt, .green-bt , .login .right-category .green-bt{background:url(../images/green.gif) repeat-x left bottom;   border:solid 0px #0e57a5 !important; color:#fff !important; font-weight:bold; height:30px !important;     display:block; margin:5px 0 0 0; padding:0px 8px 3px 8px; width:auto !important;}
 /*=====register=============*/
.container{width:1001px; margin:0px auto; overflow:hidden;  padding:23px;  width:951px; background:url(../images/our-philosphy-bg.png) no-repeat left top; min-height:350px; height:auto !important; position:relative;  color:#666 !important; }

.validation-advice{font-size:11px; color:red !important;}
.border-bottom{border-bottom: dotted 1px #333 !important; clear:both; overflow:hidden; padding-top:10px !important;}
 
#pas { float: left;width: 405px;}
.pas1 {clear: both;float: left;width: 405px;  clear:both; }
.fonter {color: #505050;float: left;font-size: 14px;width: 105px; white-space:nowrap;}
.field-widget {float: right;width: 267px;}
.pas1 .radio-bt{width:20px !important;  margin-top: 5px;    vertical-align: middle;    }
.radio-bt{width:20px !important;  margin-top: 5px;    vertical-align: middle;    }
.field-widget input{width:260px !important;}
.field-widget select{margin-bottom:5px !important; width:265px;}

#pass {float: right;width: 455px;}
#passs {float: left;margin-top: 20px;width: 405px;}

.pas2 {color: #666666; font-size: 10px;width: 267px; padding-left:140px;}
.pas3 {clear: both;float: left;width: 100%}

 input[type="text"],input[type="password"],
textarea, select {	background: #f9f9f9;	border: 1px solid #ccc;	box-shadow: inset 1px 1px 1px rgba(0,0,0,0.1);	-moz-box-shadow: inset 1px 1px 1px rgba(0,0,0,0.1);
	-webkit-box-shadow: inset 1px 1px 1px rgba(0,0,0,0.1);	padding: 2px;
}
 
 </style>
 
 
 <script src="<?php bloginfo('template_directory'); ?>/js/registration/prototype.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/registration/validation.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/registration/javascript.js"></script>


<script type="text/javascript">
function NOTS(){
	document.getElementById('nots').style.display = 'block';
}
function yess(){
	document.getElementById('nots').style.display = 'none';
}
function populateState(country){
	var country1= country.options[country.selectedIndex].value;
	if(country1=="United States"){
		document.getElementById('billstatesdiv').style.display = 'block'; 
		document.getElementById('billstatestextdiv').style.display = 'none'; 
	}else{
		document.getElementById('billstatestextdiv').style.display = 'block'; 
		document.getElementById('billstatesdiv').style.display = 'none';
	}
}
function checkState2(c){
	var country= c.options[c.selectedIndex].value;					 
	if(country=="United States"){					
		document.getElementById('stateSelect22').style.display = 'block'; 
		document.getElementById('stateSelect22text').style.display = 'none'; 
	}else{
		document.getElementById('stateSelect22text').style.display = 'block'; 
		document.getElementById('stateSelect22').style.display = 'none';
	}
}

</script>
<div class="container">
  <div class="contactform">
    <div id="formdiv">
	<form action="" name="myForm" id="myForm" method="post" >
      <div class="pas1">
          <div class="fonter">Label<?php if($uid) echo '(s)';?>:</div>
          <div class="field-widget">
		  <?php
		  if($uid) {
		  $labelsNoQry=mysql_query("SELECT GROUP_CONCAT( DISTINCT labelno SEPARATOR ',' ) AS labelnumbers FROM contatactdetails2labels cl, labels l WHERE cl.label_id=l.label_id AND contactdet_id =".$uid);
		$labelsNumbers=mysql_fetch_array($labelsNoQry);
		echo $labelsNumbers['labelnumbers']; 	
		  ?>
		  <?php
		  }
		  else if($label_id){
		  $getLabelsQry=mysql_query("SELECT * FROM labels WHERE label_id =$label_id ");
		   $getLabels=mysql_fetch_array($getLabelsQry);
		   echo $getLabels['labelno'];
		  ?>
		  <input type="hidden" value="<?php echo $label_id;  ?>" name="labelNo" />
		  <?php
		  }	   else {    
		  ?>
           <select name="labelNo"  class="required"   >
		   <option value="">Select Label</option>
		   <?php
		   $getLabelsQry=mysql_query("SELECT * FROM labels WHERE label_id NOT IN ( SELECT l.label_id  FROM labels l  , contatactdetails2labels cl  WHERE  cl.label_id=l.label_id )  ORDER BY label_id desc");
		   while($getLabels=mysql_fetch_array($getLabelsQry)) {
		   		echo "<option value='".$getLabels['label_id']."'>".$getLabels['labelno']."</option>";
		   }
		   ?>
		   </select>
		   <?php
		   }
		   ?>
          </div>
        </div>
		<h3> Sign-In Information </h3>
	  
      <div id="pas">
	    
        <div class="spacer"></div>
        <div class="pas1">
          <div class="fonter">Email:</div>
          <div class="field-widget">
            <input name="field5" size="40" id="field5" class="required validate-email validation-failed" title="Enter your email address" type="text" value="<?php echo ($uid)?$res['email']:$field5; ?>">
          </div>
        </div>
        <div class="spacer"></div>
        <div class="pas1">
          <div class="fonter">Confirm Email:</div>
          <div class="field-widget">
            <input name="field6" size="40" id="field6" class="required validate-email-confirm" type="text" value="<?php echo ($uid)?$res['email']:$field5; ?>">
          </div>
        </div>
        <div class="pas2"> This email address will be used to correspond with you. 
          
          We will not sell or rent your email address to third parties. </div>
      </div>
      <div id="pass">
        <div class="pas1">
          <div class="fonter">Password:</div>
          <div class="field-widget">
            <input name="field3" size="40" id="field3" class="validate-password" title="Enter a password greater than 6 characters" value="<?php echo base64_decode($res['password']); ?>" type="password">
          </div>
        </div>
        <div class="spacer"></div>
        <div class="pas1">
          <div class="fonter">Confirm Password:</div>
          <div class="field-widget">
            <input name="field4" size="40" id="field4" class="required validate-password-confirm" title="Enter the same password for confirmation" value="<?php echo base64_decode($res['password']); ?>" type="password">
          </div>
        </div>
        <div class="pas2"> Your password will allow you to access your account page to update your Personal Information.</div>
      </div>
      <h3> Personal Information </h3>
      <div id="pas">
        <div class="pas1">
          <div class="fonter">First Name:</div>
          <div class="field-widget">
            <input name="field1" size="40" id="field1" class="required" title="Enter first name" type="text" value="<?php echo ($uid)?$res['firstname']:$field1; ?>">
          </div>
        </div>
      </div>
      <div id="pass">
        <div class="pas1">
          <div style="margin-bottom: 5px; float: left;" class="fonter">Last Name:</div>
          <div class="field-widget">
            <input name="field2" size="40" id="field2" class="required" title="Enter last name" type="text" value="<?php echo ($uid)?$res['lastname']:$field2; ?>">
          </div>
        </div>
      </div>
      <h3>Contact Preferences </h3>
      <div id="pas">
        <div class="pas1">
          <div class="fonter">Phone:(Home)</div>
          <div class="field-widget">
            <input name="field7" size="40" id="field7" class="inputf" onkeydown="javascript:backspacerDOWN(this,event);" onkeyup="javascript:backspacerUP(this,event);" title="Please enter phone number" type="text" value="<?php echo ($uid)?$res['phone_home']:$field7; ?>">
          </div>
        </div>
        <div class="spacer"></div>
        <div class="pas1">
          <div class="fonter">Phone:(Work)</div>
          <div class="field-widget">
            <input name="pwork" class="inputf" id="pwork" onkeydown="javascript:backspacerDOWN(this,event);" onkeyup="javascript:backspacerUP(this,event);" size="40" type="text" value="<?php echo ($uid)?$res['phone_work']:$pwork; ?>">
          </div>
        </div>
        <div class="spacer"></div>
        <div class="pas1">
          <div class="fonter">Phone:(Cell)</div>
          <div class="field-widget">
            <input name="pcell" id="pcell" class="inputf validate-number" c="" size="40" type="text" value="<?php echo ($uid)?$res['phone_cell']:$pcell; ?>">
          </div>
        </div>
        <div class="spacer"></div>
        <div class="pas1">
          <div class="fonter">Fax:</div>
          <div class="field-widget">
            <input name="fax" size="40" class="inputf" onkeydown="javascript:backspacerDOWN(this,event);" onkeyup="javascript:backspacerUP(this,event);" type="text" value="<?php echo ($uid)?$res['fax']:$fax; ?>">
          </div>
        </div>
        <div class="pas2"> At least one of the fields above is required.<br>
          This will be used to contact you to return your lost property. </div>
      </div>
      <div id="pass">
        <div class="pas1">
          <div class="fonter">Billing Address :</div>
          <div class="field-widget">
            <input name="field8" size="40" id="field8" class="required inputf" title="Please enter address" type="text" value="<?php echo ($uid)?$res['billing_address']:$field8; ?>">
          </div>
        </div>
        <div class="spacer"></div>
        <div class="spacer"></div>
        <div class="pas1">
          <div class="fonter">City:</div>
          <div class="field-widget">
            <input name="field9" id="field9" class="required inputf" size="40" title="Please enter city" type="text" value="<?php echo ($uid)?$res['billing_city']:$field9; ?>">
          </div>
        </div>
        <div class="spacer"></div>
        <div class="pas1">
          <div class="fonter">Country:</div>
          <div class="field-widget">  
		  <select id="countrySelect" name="country" class="required inputf" onchange="populateState(this)">
		  <?php if($uid) echo getSelectList($arrCountry,$res['billing_country']);else  echo getSelectList($arrCountry,"United States"); ?>
		  </select>       
          </div>
        </div>
        <div class="spacer"></div>
        <div class="pas1">
          <div class="fonter">State/Province:</div>
          <div class="field-widget" id="billstatesdiv">
            <select id="stateSelect" name="stateSelect" class="required inputf" <?php if($uid && $res['billing_country']=='United States')  echo  "style='display:block;'"; else echo  "style='display:none;'"  ?>  >
            <?php if($uid) echo getSelectList($arrStates,$res['billing_state']);else echo getSelectList($arrStates,$stateSelect); ?>
            </select>
          </div>
          <div class="field-widget" <?php if($uid && $res['billing_country']!='United States')  echo  "style='display:block;'"; else echo  "style='display:none;'"  ?> id="billstatestextdiv">
            <input name="stateSelect1" id="stateSelect" type="text" value="<?php if($uid && $res['billing_country']!='United States')  echo $res['billing_state'];   ?>">
          </div>
        </div>
        <div class="spacer"></div>
        <div class="pas1">
          <div style="float: left;" class="fonter">Zip/Postal Code: </div>
          <div class="field-widget">
            <input name="field12" size="40" id="field12" class="required validate-number" maxlength="5" title="Please enter zip/postal code" type="text" value="<?php echo ($uid)?$res['billing_zipcode']:$field12; ?>">
          </div>
        </div>
        <div class="pas1" style="margin-top: 10px;"> <span style="font-size: 10px; color: rgb(0, 103, 183);"> Are your billing address <br>
          and shipping address
          the same? </span> <span style="margin-left: 85px; margin-top: -10px;">
          <input class="radio-bt validation-passed" id="areu[]" name="areu[]" onclick="yess()"   value="1" type="radio" <?php  if( ($res['billing_address']==$res['shipping_address'] )|| !$uid) echo "checked=\"checked\""; ?>   />
          Yes
          <input class="radio-bt validation-passed" id="areu[]" onclick="NOTS()" name="areu[]"  value="0" type="radio"  <?php  if($uid && ($res['billing_address']!=$res['shipping_address']) ) echo "checked=\"checked\""; ?>  />
          No </span>
          <div class="clear"></div>
          <div id="nots" style="margin-top: 5px; display: <?php   if($res['billing_address']==$res['shipping_address'])  echo 'none'; else echo 'block'; ?>">
            <div class="pas1" style="margin-top: 10px;">
              <div class="fonter">Shipping Address:</div>
              <div class="field-widget">
                <input name="shippingaddress" size="40" id="shippingaddress" class="required" title="Please enter address" type="text" value="<?php echo ($uid)?$res['shipping_address']:$shippingaddress; ?>">
              </div>
            </div>
            <div class="spacer"></div>
            <div class="pas1">
              <div class="fonter">City:</div>
              <div class="field-widget">
                <input name="city2" id="city2" class="required" size="40" title="Please enter city" type="text" value="<?php echo ($uid)?$res['shipping_city']:$city2; ?>">
              </div>
            </div>
            <div class="spacer"></div>
            <div class="pas1">
              <div class="fonter">Country:</div>
              <div class="field-widget">
                <select id="countrySelect2" class="inputf" name="countrySelect2" onchange="checkState2(this)">
				<?php if($uid) echo getSelectList($arrCountry,$res['shipping_country']);else  echo getSelectList($arrCountry,"United States"); ?>
				
                </select>
              </div>
            </div>
            <div class="spacer"></div>
            <div class="pas1">
              <div class="fonter">State/Province:</div>
              <div class="field-widget" id="stateSelect22">
                <select id="stateSelect2" class="inputf" name="stateSelect2" <?php if($uid && $res['shipping_country']=='United States')  echo  "style='display:block;'"; else echo  "style='display:none;'"  ?>>
                  <?php if($uid) echo getSelectList($arrStates,$res['shipping_state']);else echo getSelectList($arrStates,$stateSelect); ?>
				 
                </select>
              </div>
              <div class="field-widget" id="stateSelect22text" <?php if($uid && $res['shipping_country']!='United States')  echo  "style='display:block;'"; else echo  "style='display:none;'"  ?>>
                <input name="stateSelect21" id="stateSelect22text" type="text" value="<?php if($uid && $res['billing_country']!='United States')  echo $res['shipping_state'];   ?>">
              </div>
            </div>
            <div class="spacer"></div>
            <div class="pas1">
              <div style="float: left;" class="fonter">Zip/Postal Code: </div>
              <div class="field-widget">
                <input name="zip2" size="40" id="zip2" class="required validate-number" title="Please enter zip/postal code" type="text" value="<?php echo ($uid)?$res['shipping_zipcode']:$zip2; ?>">
              </div>
            </div>
          </div>
          <div class="clear"></div>
        </div>
      </div>
      <div style="display: block; clear: both; width: 100%;">
        <input name="Submit" value="Submit" class="button" type="submit" style="width:auto !important;">
      </div>
      <div class="clear"></div></form>
    </div>

  </div>
</div>
 
 <script type="text/javascript">

	function formCallback(result, form) {

		window.status = "valiation callback for form '" + form.id + "': result = " + result;

	}

	var valid = new Validation('myForm', {immediate : true, onFormValidate : formCallback});

	Validation.addAllThese([

		['validate-password', 'Your password must be 4 or more characters', {

			minLength : 4

		}],

		['validate-password-confirm', 'Your confirmation password does not match your first password, please try again.', {

			equalToField : 'field3'

		}],

		['validate-email-confirm', 'Your confirmation e-mail does not match your first e-mail, please try again.',{

			equalToField : 'field5'

		}]

	])

</script>
