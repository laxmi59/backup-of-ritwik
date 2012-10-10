<?php
//print_r($_POST);
if($_POST['submit']){
	echo "<pre>";print_r($_POST);echo "</pre>";
	extract($_POST);
	$password=	base64_encode($password);
	$getuservalues=mysql_fetch_object(mysql_query("select * from contactdetails where contactdet_id = '$_SESSION[userid]' "));
	
		$cardtype=$card_cardType;
		$cardnumber=$card_accountNumber;
		$cardexpm=$card_expirationMonth;
		$cardexpy=$card_expirationYear;
	if($shipping_country=="United States")
		$shipping_state=$shipping_state;
	else
		$shipping_state=$shipping_states;
	if($billing_country=="United States")
		$billing_state=$billing_state;
	else
		$billing_state=$billing_stateb;
	/*if($getuservalues->password == $password){
		$password =$getuservalues->password ;
	}else{
		$password = base64_encode($_POST['password']);
	}*/
	$upd=mysql_query("update contactdetails set `firstname` = '$firstname',	`phone_home` = '$phone_home' ,`phone_cell` = '$phone_cell' ,`lastname` = '$lastname' ,`phone_work` ='$phone_work' ,`fax` = '$fax' ,`billing_address` = '$billing_address' ,`billing_country` = '$billing_country' ,`billing_state` = '$billing_state' ,`billing_city` = '$billing_city' ,`billing_zipcode` = '$billing_zipcode' ,`shipping_address` = '$shipping_address', `shipping_country` = '$shipping_country' ,`shipping_state` = '$shipping_state' ,`shipping_city` = '$shipping_city' ,`shipping_zipcode` = '$shipping_zipcode', `cardtype`='$cardtype', `cardnumber`= '$cardnumber', `expmonth`='$cardexpm',`expyear`= '$cardexpy' where contactdet_id='$_SESSION[userid]'");
	if($upd)
		echo "<script>window.location='".get_option('siteurl')."/account?res=1'</script>";
	else
		echo "<script>window.location='".get_option('siteurl')."/account?res=2'</script>";
}
?>
<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js">
</script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/account/javascript.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#myForm").validate();
});
function ValidateExpDate(){
    var ccExpYear =document.getElementById("card_expirationYear").value;
    var ccExpMonth = document.getElementById("card_expirationMonth").value;
    var expDate=new Date();
    expDate.setFullYear(ccExpYear, ccExpMonth, 1);
    var today = new Date();
    if (expDate<today) {
	    document.getElementById("required1").innerHTML="card expired";
    }else{
		document.getElementById("required1").innerHTML="";
    }
}
function populateState(country,name){
//alert("tt");
//alert(name);
	var country1= country.options[country.selectedIndex].value;
	if(country1=="United States"){
		document.getElementById(name+'div').style.display = 'block'; 
		document.getElementById(name+'textdiv').style.display = 'none'; 
	}else{
		document.getElementById(name+'div').style.display = 'block'; 
		document.getElementById(name+'div').style.display = 'none';
	}
}
</script>
<?php 
if($_REQUEST['res']==1)
	$msg="Successfully Updated";
elseif($_REQUEST['res']==2)
	$msg="Error occur while updating";
?>
<div class="validation-advice" style="font-size:14px" align="center"><b><?php echo $msg?></b></div>
<div>&nbsp;</div>
<form id="myForm" method="post" class="contactform" style="padding-top:0px;" onsubmit="return ValidateExpDate()">
<?php 
if($fet_user_info->expyear <=date('Y')){
	if($fet_user_info->expmonth < date('m')){
		echo '<div class="validation-advice" style="font-size:14px" align="center"><b>your card expired. please upgrade your card</b></div><br><br>';
	}
}?>
<h3> Card Information:</h3>

<div id="pas">
	<div class="pas1">
		<div class="fonter">&nbsp;Card Type:</div>
	  	<div class="field-widget">
			<select name="card_cardType" class="required" title="Enter your Card Type">
            <?php echo getSelectList($arrcardtypes,$fet_user_info->cardtype);?>
          </select>
	  	</div>
	</div>
	<div class="spacer"></div>
	<div class="pas1">
		<div class="fonter">&nbsp;Expiration Date:</div>
	  	<div class="field-widget">
			<select name="card_expirationMonth" id="card_expirationMonth" style="width:auto" title="Enter your card expiration Month">
            <option value="">Months</option>
            <?php echo getSelectList($arrOfMonth,$fet_user_info->expmonth);?>
          </select>
		  <select name="card_expirationYear" id="card_expirationYear" style="width:auto" title="Enter your card expiration Year">
            <?php echo years($fet_user_info->expyear); ?>
          </select><br />
		  <div class="validation-advice" id="required1">&nbsp;</div>
	  	</div>
	</div>
	<div class="spacer"></div>
</div>
<div id="pass">
	<div class="pas1">
	  <div class="fonter">&nbsp;Card Number:</div>
	  <div class="field-widget">
		<input type="text" class="required" title="Enter your Card Number" name="card_accountNumber" value="<?php echo $fet_user_info->cardnumber?>">
	  </div>
	</div>
	<div class="spacer"></div>
</div>
<h3> Personal Information:</h3>
<div id="pas">
	<div class="pas1">
		<div class="fonter">&nbsp;First Name:</div>
	  	<div class="field-widget">
			<input type="text" value="<?php echo $fet_user_info->firstname?>"  class="required" id="firstname" size="40" name="firstname" title="Enter your First Name"><br />
			
	  	</div>
	</div>
	<div class="spacer"></div>
	<?php /*?><div class="pas1">
	  <div class="fonter">Password:</div>
	  <div class="field-widget">
		<input type="password" value="<?php echo base64_decode($fet_user_info->password)?>"  class="required validate-password" id="field" size="40" name="password">
	  </div>
	</div>
	<div class="spacer"></div><?php */?>
	<div class="pas1">
	  <div class="fonter">&nbsp;Email:</div>
	  <div class="field-widget">
		<input type="text" value="<?php echo $fet_user_info->email?>" title="Enter your email address" class="required" id="field5" size="40" name="email" readonly="">
		
	  </div>
	</div>
	<div class="spacer"></div>
	<div class="pas1">
	  <div class="fonter">&nbsp;Phone:(Home)</div>
	  <div class="field-widget">
		<input type="text" value="<?php echo $fet_user_info->phone_home?>" title="Enter your phone number" class="required"  id="field15" size="40" name="phone_home"onkeydown="javascript:backspacerDOWN(this,event);" onkeyup="javascript:backspacerUP(this,event);">
	  </div>
	</div>
	<div class="spacer"></div>
	<div class="pas1">
	  <div class="fonter">&nbsp;Phone:(Cell)</div>
	  <div class="field-widget">
		<input type="text" value="<?php echo $fet_user_info->phone_cell?>" size="40"  class="required" id="pcell2" name="phone_cell" title="Enter your Cell Phone Number">
	  </div>
	</div>
	<div class="spacer"></div>
</div>
<div id="pass">
	<div class="pas1">
	  <div class="fonter">&nbsp;Last Name:</div>
	  <div class="field-widget">
		<input type="text" value="<?php echo $fet_user_info->lastname?>" title="Enter your Last Name" class="required" id="field13" size="40" name="lastname">
	  </div>
	</div>
	<div class="spacer"></div>
	<?php /*?><div class="pas1">
	  <div class="fonter">Confirm Password:</div>
	  <div class="field-widget">
		<input name="field4" size="40" id="field4" class="required validate-password-confirm" title="Enter the same password for confirmation" type="password" value="<?php echo base64_decode($fet_user_info->password)?>">
	  </div>
	</div>
	<div class="spacer"></div><?php */?>
	<?php /*?><div class="pas1">
	  <div class="fonter">Confirm Email:</div>
	  <div class="field-widget">
		<input type="text" value="<?php echo $fet_user_info->email?>" readonly="" class="required email" size="40" name="cemail">
	  </div>
	</div>
	<div class="spacer"></div><?php */?>
<div class="pas1">
  <div class="fonter">&nbsp;Phone:(Work)</div>
  <div class="field-widget">
	<input type="text" value="<?php echo $fet_user_info->phone_work?>" class="required" size="40"  id="pwork2" name="phone_work"onkeydown="javascript:backspacerDOWN(this,event);" onkeyup="javascript:backspacerUP(this,event);" title="Enter your Work phone Number">
  </div>
</div>
<div class="spacer"></div>
<div class="pas1">
  <div class="fonter">&nbsp;Fax:</div>
  <div class="field-widget">
	<input type="text" value="<?php echo $fet_user_info->fax?>" class="required" size="40"  name="fax"onkeydown="javascript:backspacerDOWN(this,event);" onkeyup="javascript:backspacerUP(this,event);" title="Enter your Fax Number">
  </div>
</div>
</div>
          
<h3> Billing &nbsp;Address:</h3>
<div id="pas">
<div class="pas1">
  <div class="fonter">&nbsp;Address:</div>
  <div class="field-widget">
	<input type="text" value="<?php echo $fet_user_info->billing_address?>" title="Enter your billing address" class="required" id="field7" size="40" name="billing_address">
  </div>
</div>
<div class="spacer"></div>
<div class="pas1">
  <div class="fonter">&nbsp;Country:</div>
  <div class="field-widget">
   <select id="countrySelect" name="billing_country" class="required" onchange="populateState(this,'billstates')" title="Select your Country"><?php echo getSelectList($arrCountry, $fet_user_info->billing_country)?>
</select>
  </div>
</div>
<div class="spacer"></div>
<div class="pas1">
  <div class="fonter">&nbsp;State/Province</div>
  <div class="field-widget" id="billstatesdiv" style="display:none">
  <select id="stateSelect" name="billing_state" class="required" title="Select Your State">
	<?php echo getSelectList($arrStates,$fet_user_info->billing_state)?>
	</select>
  </div>
   <div class="field-widget" id="billstatestextdiv">
<input type="text" name="billing_stateb" title="Enter your billing State" class="required" id="stateSelect" value="<?php echo $fet_user_info->billing_state?>"/>
</div>

</div>
</div>
<div id="pass">
<div class="pas1">
  <div class="fonter">&nbsp;City:</div>
  <div class="field-widget">
	<input type="text" value="<?php echo $fet_user_info->billing_city?>" title="Enter your city" size="40" class="required" id="field11" name="billing_city">
  </div>
</div>
<div class="spacer"></div>
<div class="pas1">
  <div class="fonter">&nbsp;Zip/Postal Code:</div>
  <div class="field-widget">
	<input type="text" value="<?php echo $fet_user_info->billing_zipcode?>" title="Please enter zip/postal code" maxlength="5" class="required" id="field3" size="40" name="billing_zipcode">
  </div>
</div>
<div class="spacer"></div>
</div>
          
<h3> Shipping Address:</h3>
<div id="pas">
<div class="pas1">
  <div class="fonter">&nbsp;Address:</div>
  <div class="field-widget">
	<input type="text" value="<?php echo $fet_user_info->shipping_address?>" size="40"  class="required" name="shipping_address" title="Enter your shipping Address">
  </div>
</div>
<div class="spacer"></div>
<div class="pas1">
  <div class="fonter">&nbsp;Country:</div>
  <div class="field-widget">
  
  <select id="countrySelect" name="shipping_country" class="required" onchange="populateState(this,'shippstates')" title="Select Your Country"><?php echo getSelectList($arrCountry,$fet_user_info->shipping_country)?>
  </select>
   
  </div>
  
</div>
<div class="spacer"></div>
<div class="pas1">
  <div class="fonter">&nbsp;State/Province</div>
  <div class="field-widget" id="shippstatesdiv" style="display:none">
  <select id="stateSelect" name="shipping_state" class="required" title="Select your state">
<?php echo getSelectList($arrStates,$fet_user_info->shipping_state)?>
  </select>
   
  </div>
   <div class="field-widget" id="shippstatestextdiv">
<input type="text" name="shipping_states" id="stateSelect" title="Enter your shipping state" class="required" value="<?php echo $fet_user_info->shipping_state?>"/>
</div>
</div>
<div class="spacer"></div>
</div>
<div id="pass">
<div class="pas1">
  <div class="fonter">&nbsp;City:</div>
  <div class="field-widget">
	<input type="text" value="<?php echo $fet_user_info->shipping_city?>" title="Please enter city" size="40" class="required" id="field6" name="shipping_city">
  </div>
</div>
<div class="spacer"></div>
<div class="pas1">
  <div class="fonter">&nbsp;Zip/Postal Code:</div>
  <div class="field-widget">
	<input type="text" value="<?php echo $fet_user_info->shipping_zipcode?>" title="Please enter zip/postal code" maxlength="5" class="required" id="field8" size="40" name="shipping_zipcode">
  </div>
</div>
<div class="spacer"></div>
</div>
<div class="account-submit">
<input id="submitbuttion"  name="submit" value="Update and Save" type="submit" class="submit">
</div>
</form>
