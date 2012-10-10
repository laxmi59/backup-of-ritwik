<?php
/*
Template Name: Registration-Form
*/
include_once (TEMPLATEPATH . '/lib/Functions.php');
include_once (TEMPLATEPATH . '/lib/GlobalValues.php');

$label=trim($_REQUEST['label']);

if(isset($label) and $label!="") {
	$SqlGetlabel="select labelno,label_id FROM labels where labelno=".$label;
	$SqlGetlabelExe=mysql_query($SqlGetlabel);
	$getlabeldetails=mysql_fetch_array($SqlGetlabelExe);
	$getlabeldetails=getLabeldetails($label);
	$getlabelexsistance= mysql_num_rows($SqlGetlabelExe);
	   //Checking for the Valid Label Id//
	if($getlabelexsistance==0) {
		wp_redirect(get_option('siteurl') . '/get-started?message=notvalid');exit;
	}
	 //Checking for the Valid Label Id eof//
	else {
		$SqlUserlabel="select label_id FROM contatactdetails2labels where label_id=".$getlabeldetails['label_id'];
	    $SqlUserlabelExe=mysql_query($SqlUserlabel);
	    $getUserLabel= mysql_num_rows($SqlUserlabelExe);
		//Checking for the Label already Exsistance//
		if($getUserLabel>0) {
			wp_redirect(get_option('siteurl') . '/get-started?message=exsist');exit;
	    }
		//Checking for the Label already Exsistance eof//		
	}
}
  
get_header();
?>
<script src="<?php bloginfo('template_directory'); ?>/js/registration/prototype.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/registration/validation.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/registration/javascript.js"></script>

<?php if($_REQUEST['customer']!="" && isset($_REQUEST['customer'])) { ?>
<script type="text/javascript">

	function CheckForm(){
			var exsistcode = document.getElementById("exsistcode").value;
		if(exsistcode == ""){
			alert("please enter Your Previous Label Id.");
			document.getElementById("exsistcode").focus();
			return false;
		}else{
			return true;
		}
	}
</script>

<?php } ?>
<script type="text/javascript">
			 function NOTS()
			 {
			  document.getElementById('nots').style.display = 'block';
			 }
			 function yess()
			 {
			   document.getElementById('nots').style.display = 'none';
			 }
			 function populateState(country)
			 {
			   var country1= country.options[country.selectedIndex].value;
			 	if(country1=="United States")
				{
					
					document.getElementById('billstatesdiv').style.display = 'block'; 
					document.getElementById('billstatestextdiv').style.display = 'none'; 
				}
				else
				{
					document.getElementById('billstatestextdiv').style.display = 'block'; 
					document.getElementById('billstatesdiv').style.display = 'none';
				}
			 }
			 function checkState2(c)
				{
				    var country= c.options[c.selectedIndex].value;					 
					 if(country=="United States")
				     {					
					     document.getElementById('stateSelect22').style.display = 'block'; 
					     document.getElementById('stateSelect22text').style.display = 'none'; 
				     }
				    else
				    {
					    document.getElementById('stateSelect22text').style.display = 'block'; 
					    document.getElementById('stateSelect22').style.display = 'none';
				    }
					  
					/* if(state=="United States")
					 {
						populateCountry2(document.getElementById('countrySelect2').value);
						populateState2(); 
					 }
					 else
					 {

						document.getElementById('stateSelect22').innerHTML = '<input type="text" class="inputbox" name="stateSelect2">'; 
					 }*/
					 
				}
			</script>

<div class="container">
  <h1>Registration Details</h1>
 <br/><br/>

   <form method="post" action="<?php echo get_option('siteurl'); ?>/creditcard" id="myForm" onsubmit="return CheckForm()" class="contactform" style="padding:0px">
    <input name="mode" value="register" type="hidden">
	<input type="hidden" name="label" value="<?php echo $label; ?>" id="label"/>
	<?php if($_REQUEST['customer']!="" && isset($_REQUEST['customer'])) { ?>
	 <div id="pas">
         <div class="pas1">
        <div class="fonter">Already Exsisting Code:</div>
        <div class="field-widget">
          <input name="exsistcode" size="40" id="exsistcode" title="Exsisting Code" value="" type="text">
        </div>
      </div>
      <div class="spacer"></div>
            
    </div>
	<?php } ?>
	
    <h3> Log-in Information </h3>
    <div id="pas">
      <div class="pas1">
        <div class="fonter">Email:</div>
        <div class="field-widget">
          <input name="field5" size="40" id="field5" class="required validate-email" title="Enter your email address" value="" type="text">
        </div>
      </div>
      <div class="spacer"></div>
      <div class="pas1">
        <div class="fonter">Confirm Email:</div>
        <div class="field-widget">
          <input name="field6" size="40" id="field6" class="required validate-email-confirm" type="text">
        </div>
      </div>
      <div class="pas2"> This email address will be used to correspond with you. 
        
        We will not sell or rent your email address to third parties. </div>
    </div>
    <div id="pass">
      <div class="pas1">
        <div class="fonter">Password:</div>
        <div class="field-widget">
          <input name="field3" size="40" id="field3" class="validate-password" title="Enter a password greater than 6 characters" type="password">
        </div>
      </div>
      <div class="spacer"></div>
      <div class="pas1">
        <div class="fonter">Confirm Password:</div>
        <div class="field-widget">
          <input name="field4" size="40" id="field4" class="required validate-password-confirm" title="Enter the same password for confirmation" type="password">
        </div>
      </div>
      <div class="pas2"> Your password will allow you to access your account page to update your information. </div>
    </div>
    <h3> Personal Information </h3>
    <div id="pas">
      <div class="pas1">
        <div class="fonter">First Name:</div>
        <div class="field-widget">
          <input name="field1" size="40" id="field1" class="required" title="Enter first name" value="" type="text">
        </div>
      </div>
    </div>
    <div id="pass">
      <div class="pas1">
        <div style="margin-bottom: 5px; float: left;" class="fonter">Last Name:</div>
        <div class="field-widget">
          <input name="field2" size="40" id="field2" class="required" title="Enter last name" value="" type="text">
        </div>
      </div>
    </div>
    <h3>Contact Preferences </h3>
    <div id="pas">
      <div class="pas1">
        <div class="fonter">Phone:(Home)</div>
        <div class="field-widget">
          <input name="field7" size="40" id="field7" class="inputf" onkeydown="javascript:backspacerDOWN(this,event);" onkeyup="javascript:backspacerUP(this,event);" title="Please enter phone number" value="" type="text">
        </div>
      </div>
      <div class="spacer"></div>
      <div class="pas1">
        <div class="fonter">Phone:(Work)</div>
        <div class="field-widget">
          <input name="pwork" class="inputf" id="pwork" onkeydown="javascript:backspacerDOWN(this,event);" onkeyup="javascript:backspacerUP(this,event);" size="40" value="" type="text">
        </div>
      </div>
      <div class="spacer"></div>
      <div class="pas1">
        <div class="fonter">Phone:(Cell)</div>
        <div class="field-widget">
          <input name="pcell" id="pcell" class="inputf validate-number" c="" size="40" value="" type="text">
        </div>
      </div>
      <div class="spacer"></div>
      <div class="pas1">
        <div class="fonter">Fax:</div>
        <div class="field-widget">
          <input name="fax" size="40" class="inputf" onkeydown="javascript:backspacerDOWN(this,event);" onkeyup="javascript:backspacerUP(this,event);" value="" type="text">
        </div>
      </div>
      <div class="pas2"> At least one of the fields above is required.<br>
        This will be used to contact you to return your lost property. </div>
    </div>
    <div id="pass">
      <div class="pas1">
        <div class="fonter">Billing Address :</div>
        <div class="field-widget">
          <input name="field8" size="40" id="field8" class="required inputf" title="Please enter address" value="" type="text">
        </div>
      </div>
      <div class="spacer"></div>
      <div class="spacer"></div>
      <div class="pas1">
        <div class="fonter">City:</div>
        <div class="field-widget">
          <input name="field9" id="field9" class="required inputf" size="40" title="Please enter city" value="" type="text">
        </div>
      </div>
      <div class="spacer"></div>
      <div class="pas1">
        <div class="fonter">Country:</div>
        <div class="field-widget">
          <select id="countrySelect" name="country" class="required inputf" onchange="populateState(this)">
            <?php echo getSelectList($arrCountry,$country);?>
          </select>
        </div>
      </div>
      <div class="spacer"></div>
      <div class="pas1">
        <div class="fonter">State/Province:</div>
        <div class="field-widget" id="billstatesdiv">
          <select id="stateSelect" name="stateSelect" class="required inputf">
            <?php echo getSelectList($arrStates,$stateSelect);?>
          </select>
          <!--          <script type="text/javascript">initCountry('US'); </script>
-->
        </div>
        <div class="field-widget" style="display:none" id="billstatestextdiv">
          <input type="text" name="stateSelect" id="stateSelect" value=""/>
        </div>
      </div>
      <div class="spacer"></div>
      <div class="pas1">
        <div style="float: left;" class="fonter">Zip/Postal Code: </div>
        <div class="field-widget">
          <input name="field12" size="40" id="field12" class="required validate-number" maxlength="5" title="Please enter zip/postal code" value="" type="text">
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
              <input name="billingaddress" size="40" id="shippingaddress" class="required" title="Please enter address" value="" type="text">
            </div>
          </div>
          <div class="spacer"></div>
          <div class="pas1">
            <div class="fonter">City:</div>
            <div class="field-widget">
              <input name="city2" id="city2" class="required" size="40" title="Please enter city" value="" type="text">
            </div>
          </div>
          <div class="spacer"></div>
          <div class="pas1">
            <div class="fonter">Country:</div>
            <div class="field-widget">
              <select id="countrySelect2" class="inputf" name="countrySelect2" onchange="checkState2(this)">
                <?php echo getSelectList($arrCountry,$countrySelect2);?>
              </select>
            </div>
          </div>
          <div class="spacer"></div>
          <div class="pas1">
            <div class="fonter">State/Province:</div>
            <div class="field-widget" id="stateSelect22">
              <select id="stateSelect2" class="inputf" name="stateSelect2">
                <?php echo getSelectList($arrStates,$stateSelect2);?>
              </select>
              <!--              <script type="text/javascript">initCountry2('US'); </script>
-->
            </div>
            <div class="field-widget" id="stateSelect22text">
              <input type="text" name="stateSelect2"  value="" id="stateSelect22text"/>
              <!--              <script type="text/javascript">initCountry2('US'); </script>
-->
            </div>
          </div>
          <div class="spacer"></div>
          <div class="pas1">
            <div style="float: left;" class="fonter">Zip/Postal Code: </div>
            <div class="field-widget">
              <input name="zip2" size="40" id="zip2" class="required validate-number" title="Please enter zip/postal code" value="" type="text">
            </div>
          </div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <div style="display:block; clear:both;width:100%" >
      <input  name="submit" value="Continue Registration" type="submit" class="submit">
    </div>
    <div class="clear"></div>
  </form>
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
</div>
<?php get_footer(); ?>
