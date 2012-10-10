<?php 
include_once ('C:/wamp/www/projects/recoverlink/wp-load.php'); 
//include_once ('/homepages/36/d280088828/htdocs/Private/beta/wp-load.php');
include_once (TEMPLATEPATH . '/lib/GlobalValues.php');
//To get the drop downvalues//
function getSelectList($arrList, $value) {
    $str = showValues($arrList, $value);
    return $str;
}

//the below function for displaying drop down values//
function showValues($dropdownvariable, $selectedvalue=-1) {
    $selectedvalues="";
    foreach ($dropdownvariable as $key => $value) {
        if (strtolower($selectedvalue) == strtolower($key))
            $selectedvalues .="<option value=\"$key\" selected='selected' >$value</option>";
        else
            $selectedvalues .="<option value=\"$key\" >$value</option>";
    }
    return $selectedvalues;
}
//Getting the 10 years from the current year//
function years( $selectedvalue=-1) {
   	$year=date(Y);
	$options='<option value=""> Year &nbsp;</option>';		
	for($i=0;$i<=10;$i++){ 
		if($selectedvalue==$year)
			$options.='<option value="'.$year.'" selected="selected">'.$year.'</option>';
		else
			$options.='<option value="'.$year.'">'.$year.'</option>';
	$year=$year+1;
	}	
	return $options;		
}
/*function years(){
	$year=date(Y);
	$options='<option value=""> Year &nbsp;</option>';		
	for($i=0;$i<=10;$i++)
	{ 
	$options.='<option value="'.$year.'">'.$year.'</option>';
	$year=$year+1;
	}	
	return $options;		
}*/

//Get Label details	
function getLabeldetails($label) {

    $SqlGetlabel="select labelno,label_id FROM labels where labelno='".$label."'";
	$SqlGetlabelExe=@mysql_query($SqlGetlabel);
	$getlabeldetails=@mysql_fetch_array($SqlGetlabelExe);
	return $getlabeldetails;
}

//Function to assign label to the User
function assignLabel2client($userId,$labeldetsils) {
    $insertUserInfoQuery="insert into contatactdetails2labels(contactdet_id,label_id,status) values('$userId','$labeldetsils',1)"; 
	$exeUserInfoQuery=mysql_query($insertUserInfoQuery);
	
	$id=@mysql_insert_id();
	return $id;
}
function bookTheLabel($labelno) {
    $upd="update `labels` set status=1, `activation_date`=now() where labelno= $labelno"; 
	$exeUserInfoQuery=mysql_query($upd);
	//$id=@mysql_insert_id();
	//return $id;
}

//Get the User Id of assigned Label
function assignedLabelContId($label) {
    $SqlGetlabel="select contactdet_id,label_id FROM contatactdetails2labels where label_id='".$label."'";
	$SqlGetlabelExe=@mysql_query($SqlGetlabel);
	$getcontactid=@mysql_fetch_array($SqlGetlabelExe);	
	return $getcontactid;
}

//Get Contact details of the user
function getUserContdetails($UserId) {
    $SqlGetUserdet="select * FROM contactdetails where contactdet_id='".$UserId."'";
	$SqlGetUserdetExe=@mysql_query($SqlGetUserdet);
	$getusercontdet=@mysql_fetch_array($SqlGetUserdetExe);	
	return $getusercontdet;
}

function getUnusedLabels() {
    $SqlUnusedLabels="select label_id from labels where label_id NOT IN(SELECT label_id FROM contatactdetails2labels)";	
	$SqlUnusedLabelsExe=@mysql_query($SqlUnusedLabels);
	$getUnusedLabels=@mysql_fetch_array($SqlUnusedLabelsExe);	
	return $getUnusedLabels;
}

function chklogindetails() {
    $SqlUnusedLabels="select label_id from labels where label_id NOT IN(SELECT label_id FROM contatactdetails2labels)";	
	$SqlUnusedLabelsExe=@mysql_query($SqlUnusedLabels);
	$getUnusedLabels=@mysql_fetch_array($SqlUnusedLabelsExe);	
	return $getUnusedLabels;
	
}


function registrationtable($exsistlabel)
{
global $arrCountry;
global $arrStates;
$getlabdet=getLabeldetails($exsistlabel);//To get Label Id
$contIdDet=assignedLabelContId($getlabdet['label_id']); //To get User contactdetails Id
if($exsistlabel <> 0 && $getlabdet['label_id']!=''){
	$getusercontdet=getUserContdetails($contIdDet['contactdet_id']); //Array of User Contact Details
	$country=$getusercontdet['billing_country'];
	$stateSelect=$getusercontdet['billing_state'];
	$countrySelect2=$getusercontdet['shipping_country'];
	$stateSelect2=$getusercontdet['shipping_state'];
	//2011-03-02
	$expd=strtotime($getusercontdet['expyear'].'-'.$getusercontdet['expmonth'].'-00');
	$pred=strtotime("now");
	if($pred > $expd){
		$msg='<div class="validation-advice" style="font-size:14px" align="center"><b>Your Account is deactivated. please <a href="'.get_option('siteurl').'/get-started?status=update_account">Login</a> and update your details </b></div>';
	}else{
		$msg="";
	}
}elseif($getlabdet['label_id']==''){
$msg='<div class="validation-advice" style="font-size:14px" align="center"><b>Invalid Label</b></div>';
}else{
$msg='';
}

//Registration Form//
if($getusercontdet['billing_country']<>""){
		$bcountry=$getusercontdet['billing_country'];
	}else{
		$bcountry="United States";
	}
	$string='
	<h3>'.$msg.'</h3>	
	<h3> Log-in Information </h3>
    <div id="pas">
      <div class="pas1">
        <div class="fonter">Email:</div>
        <div class="field-widget">
          <input name="field5" size="40" id="field5" class="required validate-email" title="Enter your email address" value="'.$getusercontdet['email'].'" type="text">
        </div>
      </div>
      <div class="spacer"></div>
      <div class="pas1">
        <div class="fonter">Confirm Email:</div>
        <div class="field-widget">
          <input name="field6" size="40" id="field6" class="required validate-email-confirm" type="text" value="'.$getusercontdet['email'].'">
        </div>
      </div>
      <div class="pas2"> This email address will be used to correspond with you. 
        
        We will not sell or rent your email address to third parties. </div>
    </div>
    <div id="pass">
      <div class="pas1">
        <div class="fonter">Password:</div>
        <div class="field-widget">
          <input name="field3" size="40" id="field3" class="validate-password" title="Enter a password greater than 3 characters" type="password" value="'.base64_decode($getusercontdet['password']).'">
        </div>
      </div>
      <div class="spacer"></div>
      <div class="pas1">
        <div class="fonter">Confirm Password:</div>
        <div class="field-widget">
          <input name="field4" size="40" id="field4" class="required validate-password-confirm" title="Enter the same password for confirmation" type="password" value="'.base64_decode($getusercontdet['password']).'">
        </div>
      </div>
      <div class="pas2"> Your password will allow you to access your account page to update your information. </div>
    </div>
    <h3> Personal Information </h3>
    <div id="pas">
      <div class="pas1">
        <div class="fonter">First Name:</div>
        <div class="field-widget">
          <input name="field1" size="40" id="field1" class="required" title="Enter first name" value="'.$getusercontdet['firstname'].'" type="text" >
        </div>
      </div>
    </div>
    <div id="pass">
      <div class="pas1">
        <div style="margin-bottom: 5px; float: left;" class="fonter">Last Name:</div>
        <div class="field-widget">
          <input name="field2" size="40" id="field2" class="required" title="Enter last name"  type="text" value="'.$getusercontdet['lastname'].'">
        </div>
      </div>
    </div>
    <h3>Contact Preferences </h3>
    <div id="pas">
      <div class="pas1">
        <div class="fonter">Phone:(Home)</div>
        <div class="field-widget">
          <input name="field7" size="40" id="field7" class="inputf" onkeydown="javascript:backspacerDOWN(this,event);" onkeyup="javascript:backspacerUP(this,event);" title="Please enter phone number" value="'.$getusercontdet['phone_home'].'" type="text">
        </div>
      </div>
      <div class="spacer"></div>
      <div class="pas1">
        <div class="fonter">Phone:(Work)</div>
        <div class="field-widget">
          <input name="pwork" class="inputf" id="pwork" onkeydown="javascript:backspacerDOWN(this,event);" onkeyup="javascript:backspacerUP(this,event);" size="40" value="'.$getusercontdet['phone_work'].'" type="text">
        </div>
      </div>
      <div class="spacer"></div>
      <div class="pas1">
        <div class="fonter">Phone:(Cell)</div>
        <div class="field-widget">
          <input name="pcell" id="pcell" class="inputf validate-number" c="" size="40" value="'.$getusercontdet['phone_cell'].'" type="text">
        </div>
      </div>
      <div class="spacer"></div>
      <div class="pas1">
        <div class="fonter">Fax:</div>
        <div class="field-widget">
          <input name="fax" size="40" class="inputf" onkeydown="javascript:backspacerDOWN(this,event);" onkeyup="javascript:backspacerUP(this,event);" value="'.$getusercontdet['fax'].'" type="text">
        </div>
      </div>
      <div class="pas2"> At least one of the fields above is required.<br>
        This will be used to contact you to return your lost property. </div>
    </div>
    <div id="pass">
      <div class="pas1">
        <div class="fonter">Billing Address :</div>
        <div class="field-widget">
          <input name="field8" size="40" id="field8" class="required inputf" title="Please enter address" value="'.$getusercontdet['billing_address'].'" type="text">
        </div>
      </div>
      <div class="spacer"></div>
      <div class="spacer"></div>
      <div class="pas1">
        <div class="fonter">City:</div>
        <div class="field-widget">
          <input name="field9" id="field9" class="required inputf" size="40" title="Please enter city" value="'.$getusercontdet['billing_city'].'" type="text">
        </div>
      </div>
      <div class="spacer"></div>
      <div class="pas1">
        <div class="fonter">Country:</div>
        <div class="field-widget">
          <select id="countrySelect" name="country" class="required inputf" onchange="populateState(this)">'.getSelectList($arrCountry,$bcountry).'           
          </select>
        </div>
      </div>
      <div class="spacer"></div>
	  <div class="pas1">
        <div class="fonter">State/Province:</div>';
	  if($getusercontdet['billing_country']=='United States'){
      $string.='<div class="field-widget" id="billstatesdiv">
          <select id="stateSelect" name="stateSelect" class="required inputf">
            '.getSelectList($arrStates,$getusercontdet['billing_state']).'
          </select>
        </div>
		 <div class="field-widget" style="display:none" id="billstatestextdiv">
          <input type="text" name="stateSelect1" id="stateSelect1" value="'.$getusercontdet['billing_state'].'"/>
        </div>
		';
		 }else{
		 $string.='
		 <div class="field-widget" id="billstatesdiv">
          <select id="stateSelect" style="display:none" name="stateSelect" class="required inputf">
            '.getSelectList($arrStates,$getusercontdet['billing_state']).'
          </select>
        </div>
        <div class="field-widget"  id="billstatestextdiv">
          <input type="text" name="stateSelect1" id="stateSelect1" value="'.$getusercontdet['billing_state'].'"/>
        </div>';
	}
	if($getusercontdet['shipping_country']<>""){
		$scountry=$getusercontdet['shipping_country'];
	}else{
		$scountry="United States";
	}
      $string.=' </div>
      <div class="spacer"></div>
      <div class="pas1">
        <div style="float: left;" class="fonter">Zip/Postal Code: </div>
        <div class="field-widget">
          <input name="field12" size="40" id="field12" class="required validate-number" maxlength="5" title="Please enter zip/postal code" value="'.$getusercontdet['billing_zipcode'].'" type="text">
        </div>
      </div>
      <div class="pas1" style="margin-top: 10px;"> <span style="font-size: 10px; color: rgb(0, 103, 183);"> Are your billing address <br>
        and shipping address
        the same? </span> <span style="margin-left: 85px; margin-top: -10px;">
        <input class="radio-bt" id="areu[]" name="areu[]" onclick="yess()" checked="checked" value="1" type="radio">
        Yes 
        <input class="radio-bt" id="areu[]" onclick="NOTS()" name="areu[]" value="0" type="radio">
        No </span>
        <div class="clear"></div>
        <div id="nots" style="margin-top: 5px; display: none;">
          <div class="pas1" style="margin-top: 10px;">
            <div class="fonter">Shipping Address:</div>
            <div class="field-widget">
              <input name="shippingaddress" size="40" id="shippingaddress" class="required" title="Please enter address" value="'.$getusercontdet['shipping_address'].'" type="text">
            </div>
          </div>
          <div class="spacer"></div>
          <div class="pas1">
            <div class="fonter">City:</div>
            <div class="field-widget">
              <input name="city2" id="city2" class="required" size="40" title="Please enter city" value="'.$getusercontdet['shipping_city'].'" type="text">
            </div>
          </div>
          <div class="spacer"></div>
          <div class="pas1">
            <div class="fonter">Country:</div>
            <div class="field-widget">
              <select id="countrySelect2" class="inputf" name="countrySelect2" onchange="checkState2(this)">
               '.getSelectList($arrCountry,$scountry).'
              </select>
            </div>
          </div>
          <div class="spacer"></div>
          <div class="pas1">
            <div class="fonter">State/Province:</div>';
			
			 if($getusercontdet['shipping_country']=='United States'){
      $string.=' <div class="field-widget" id="stateSelect22">
              <select id="stateSelect2" class="inputf" name="stateSelect2">
               '.getSelectList($arrStates,$getusercontdet['shipping_state']).'
              </select>
             
            </div>
            <div class="field-widget" style="display:none" id="stateSelect22text">
              <input type="text" name="stateSelect21"  value="'.$getusercontdet['shipping_state'].'" id="stateSelect22text"/>
            </div>
		';
		 }else{
		 $string.='
		 <div class="field-widget" id="stateSelect22">
              <select id="stateSelect2" style="display:none" class="inputf" name="stateSelect2">
               '.getSelectList($arrStates,$getusercontdet['shipping_state']).'
              </select>
             
            </div>
            <div class="field-widget" id="stateSelect22text">
              <input type="text" name="stateSelect21"  value="'.$getusercontdet['shipping_state'].'" id="stateSelect22text"/>
            </div>';
	}
      $string.=' </div>
          <div class="spacer"></div>
          <div class="pas1">
            <div style="float: left;" class="fonter">Zip/Postal Code: </div>
            <div class="field-widget">
              <input name="zip2" size="40" id="zip2" class="required validate-number" title="Please enter zip/postal code" value="'.$getusercontdet['shipping_zipcode'].'" type="text">
            </div>
          </div>
        </div>
        <div class="clear"></div>
      </div>
    </div>';
	if($msg == ''){
    $string.='<div style="display:block; clear:both;width:100%" >
      <input  name="submit" value="Continue Registration" type="submit" class="submit">
    </div>';
	}
   $string.=' <div class="clear"></div>';
	return $string;
}

function sendEmail($to,$subject,$body){
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: '.RecoverLink. "\r\n";
	$body="your password: ".$chkEmailValid->password;
	mail($to,$subject,$body,$headers);
}

?>