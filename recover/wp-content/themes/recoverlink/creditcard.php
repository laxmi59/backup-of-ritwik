<?php
/*
Template Name: CreditInfo-Form
*/
include_once (TEMPLATEPATH . '/lib/Functions.php');
include_once (TEMPLATEPATH . '/lib/GlobalValues.php');

//Getting the contact details to the session variables//
session_start();
extract($_POST);
$email=$_SESSION['currentuser']['email']=$_REQUEST['field5'];
$password=$_SESSION['currentuser']['password']=$_REQUEST['field3'];
$firstname=$_SESSION['currentuser']['firstname']=$_REQUEST['field1'];
$lastname=$_SESSION['currentuser']['lastname']=$_REQUEST['field2'];
$phone_home=$_SESSION['currentuser']['phone_home']=$_REQUEST['field7'];
$phone_work=$_SESSION['currentuser']['phone_work']=$_REQUEST['pwork'];
$phone_cell=$_SESSION['currentuser']['phone_cell']=$_REQUEST['pcell'];
$fax=$_SESSION['currentuser']['fax']=$_REQUEST['fax'];

$billing_address=$_SESSION['currentuser']['billing_address']=$_REQUEST['field8'];
$billing_city=$_SESSION['currentuser']['billing_city']=$_REQUEST['field9'];
$billing_country=$_SESSION['currentuser']['billing_country']=$_REQUEST['country'];
if($_REQUEST['stateSelect']<>''){
	$billing_state=$_SESSION['currentuser']['billing_state']=$_REQUEST['stateSelect'];
}else{
	$billing_state=$_SESSION['currentuser']['billing_state']=$_REQUEST['stateSelect1'];
}
$billing_zipcode=$_SESSION['currentuser']['billing_zipcode']=$_REQUEST['field12'];

if($areu[0]==0){
	$shipping_address=$_SESSION['currentuser']['shipping_address']=$_REQUEST['shippingaddress'];
	$shipping_city=$_SESSION['currentuser']['shipping_city']=$_REQUEST['city2'];
	$shipping_country=$_SESSION['currentuser']['shipping_country']=$_REQUEST['countrySelect2'];
	if($_REQUEST['stateSelect2']<>''){
		$shipping_state=$_SESSION['currentuser']['shipping_state']=$_REQUEST['stateSelect2'];
	}else{
		$shipping_state=$_SESSION['currentuser']['shipping_state']=$_REQUEST['stateSelect21'];
	}
	$shipping_zipcode=$_SESSION['currentuser']['shipping_zipcode']=$_REQUEST['zip2'];
}elseif($areu[0]==1){
	$shipping_address=$_SESSION['currentuser']['shipping_address']=$_REQUEST['field8'];
	$shipping_city=$_SESSION['currentuser']['shipping_city']=$_REQUEST['field9'];
	$shipping_country=$_SESSION['currentuser']['shipping_country']=$_REQUEST['country'];
	if($_REQUEST['stateSelect']<>''){
		$shipping_state=$_SESSION['currentuser']['shipping_state']=$_REQUEST['stateSelect'];
	}else{
		$shipping_state=$_SESSION['currentuser']['shipping_state']=$_REQUEST['stateSelect1'];
	}
	$shipping_zipcode=$_SESSION['currentuser']['shipping_zipcode']=$_REQUEST['field12'];
}

$label=$_SESSION['currentuser']['labelno']=$_REQUEST['label'];
$hidexsistcode=$_SESSION['currentuser']['hidexsistcode']=$_REQUEST['hidexsistcode'];
//Getting the contact details to the session variables eof//

//echo "<pre>";print_r($_POST);echo "</pre>";
?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jsfunctions.js"></script>
<?php
//Header//
get_header();
//Header eof//
//print_r($_SESSION['currenturser']);
?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/account/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/account/jquery.validate.pack.js">
</script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/account/javascript.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#myForm").validate();
});
function ValidateExpDate(){
	if(document.getElementById("card_expirationYear").value !=''){
		var ccExpYear =document.getElementById("card_expirationYear").value;
		var ccExpMonth = document.getElementById("card_expirationMonth").value;
		var expDate=new Date();
		expDate.setFullYear(ccExpYear, ccExpMonth, 1);
		var today = new Date();
		if (expDate<today) {
			document.getElementById("required1").innerHTML="card expired";
			return false;
		}else{
		   // Credit is valid
			return true;
		}
	}
}
</script>
<div class="container">
  <h2>Billing Information</h2>
  <form  id="myForm" action="processreg.php" method="post" onsubmit="return ValidateExpDate()">
    <table width="386" class="contactform" >
      <tbody>
        <tr>
          <td id="formHeader" colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td width="175" class="label">First Name:</td>
          <td width="199"><input type="text" class="inputbox" value="<?php echo $firstname; ?>" readonly="" name="billTo_firstName">          </td>
        </tr>
        <tr>
          <td class="label">Last Name:</td>
          <td><input type="text" class="inputbox" value="<?php echo $lastname; ?>" readonly="" name="billTo_lastName">          </td>
        </tr>
        <tr>
          <td class="label">Email Address:</td>
          <td><input type="text" class="inputbox" value="<?php echo $email; ?>" readonly="" name="billTo_email">          </td>
        </tr>
        <tr>
          <td class="label">Billing Address</td>
          <td><input type="text" class="inputbox" value="<?php echo $billing_address; ?>" readonly="" name="billTo_street1">          </td>
        </tr>
        <tr>
          <td class="label"> City: </td>
          <td><input type="text" class="inputbox" value="<?php echo $billing_city; ?>" readonly="" name="billTo_city">          </td>
        </tr>
        <tr>
          <td class="label"> Postal Code: </td>
          <td><input type="text" name="billTo_postalCode" value="<?php echo $billing_zipcode; ?>" readonly="" class="inputbox"></td>
        </tr>
        <tr>
          <td class="label"> State: </td>
          <td><input type="text" class="inputbox" value="<?php echo $billing_state; ?>">
            <input type="hidden" class="inputbox" value="<?php echo $billing_state; ?>" name="billTo_state">          </td>
        </tr>
        <tr>
          <td class="label"> Country: </td>
          <td><input type="text" class="inputbox" value="<?php echo $billing_country; ?>">
            <input type="hidden" class="inputbox" value="<?php echo $billing_country; ?>" name="billTo_country">          </td>
        </tr>
      <input type="hidden" value="activate" name="merchantDefinedData1">
      <input type="hidden" value="sale" name="orderPage_transactionType">
      <input type="hidden" value="3.95" name="amount">
      <input type="hidden" value="usd" name="currency">
      <input type="hidden" value="1298269954573" name="orderPage_timestamp">
      <input type="hidden" value="v7241234" name="merchantID">
      <input type="hidden" value="yUpzCGintFMNL/z1Tih1kWQe7Jg=" name="orderPage_signaturePublic">
      <input type="hidden" value="4" name="orderPage_version">
      <input type="hidden" value="2569471532770176056217" name="orderPage_serialNumber">
      <tr>
        <td colspan="2"><h3>Card Information:</h3></td>
      </tr>
      <tr>
        <td></td>
        <td><img height="25" width="199" src="<?php bloginfo('template_directory'); ?>/images/card.png"></td>
      </tr>
      <tr class="label">
        <td width="175">Card Type:</td>
        <td width="199"><select style="border: 1px solid rgb(131, 168, 204); padding: 1px; font-size: 11px; color: rgb(102, 102, 102);" name="card_cardType" class="required select">
            <?php echo getSelectList($arrcardtypes,$card_cardType);?>
          </select>        </td>
      </tr>
      <tr>
        <td class="label">Card Number</td>
        <td><input type="text" class="required inputbox" name="card_accountNumber" title="Enter your Card Number"></td>
      </tr>
      <tr>
        <td class="label">Expiration Month </td>
        <td><select style="border: 1px solid rgb(131, 168, 204); padding: 1px; font-size: 11px; color: rgb(102, 102, 102);" name="card_expirationMonth" id="card_expirationMonth" class="required" title="Enter card expiration Month">
            <option value="">Months</option>
            <?php echo getSelectList($arrOfMonth,$card_expirationMonth);?>
          </select><br />
                </td>
      </tr>
	   <tr>
        <td class="label">Expiration Year </td>
        <td> <select style="border: 1px solid rgb(131, 168, 204); padding: 1px; font-size: 11px; color: rgb(102, 102, 102);" name="card_expirationYear" id="card_expirationYear" class="required" title="Enter card expiration Year">
            <?php echo years(); ?>
          </select>
		  </td>
      </tr>
	  <tr><td>&nbsp;</td><td> <div class="validation-advice" id="required1">&nbsp;</div></td></tr>
      <?php if($_REQUEST['exsistcode']=="") {	  ?>
      <tr>
        <td class="label">Member Ship</td>
        <td><select id="membership" name="membership" style="border: 1px solid rgb(131, 168, 204); padding: 1px; font-size: 11px; color: rgb(102, 102, 102);" onchange="getMemShipPrice(this.value)">
            <?php echo getSelectList($memberships,$membership);?>
          </select>        </td>
      </tr>
      <tr>
        <td class="label">Price ($)</td>
        <td><input type="text" style="width: 60px ! important;" class="inputbox" value="2.99" readonly="readonly" name="amount" id="amount">
          <input type="hidden" style="width: 60px ! important;" class="inputbox" value="1"></td>
      </tr>
      <?php } ?>
      <?php if($label=="") { ?>
      <tr>
        <td class="label">Shipping Price ($)</td>
        <td><input type="text" style="width: 60px ! important;" class="inputbox" value="0.99" readonly="readonly" name="amount" id="amount">
          <input type="hidden" style="width: 60px ! important;" class="inputbox" value="1"></td>
      </tr>
      <?php } ?>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <!--<tr>

                <td align="right"></td>

				<td></td>
		  </tr>-->
      <tr>
        <td></td>
        <td style="font-size: 10px; color: rgb(0, 103, 183); text-decoration: none;"><p>By clicking the button below, <br>
            I agree with RecoverLink User <br>
            Agreement and <a style="font-size: 10px; color: rgb(114, 167, 254); text-decoration: none;" href="privacy.php">Privacy Policy.</a> </p></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" value="Confirm and Proceed" class="submit"></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      </tbody>
    </table>
  </form>
</div>
<?php 
//Footer//
get_footer(); 
//footer eof//
?>
