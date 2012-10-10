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
		if(document.getElementById('olduser').checked==true) {
			alert("please enter Your Previous Label Id.");
			document.getElementById("exsistcode").focus();
			return false;
			}
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
function getformdata()
{

	var xmlhttp;
	var exsistlabel=document.getElementById('exsistcode').value;
	
		xmlHttp=createrequest();
	if (xmlHttp==null)
    	{
		alert ("Your browser does not support AJAX!");
		return;
    	} 
	var params="exsistlabel="+exsistlabel;
	//alert(params);
	
	var siteurl="<?php echo get_option('siteurl'); ?>";
	var ajaxurl=siteurl+"/wp-content/themes/recoverlink/ajaxResponse.php";
	xmlHttp.open("POST",ajaxurl, true);
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", params.length);
	xmlHttp.setRequestHeader("Connection", "close");
	xmlHttp.send(params);


	xmlHttp.onreadystatechange = function() 
	{
			//alert(xmlHttp.status );
			
		if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
		{ 
			
			var res=xmlHttp.responseText;
			document.getElementById('formdiv').innerHTML=res;			
			document.getElementById('hidexsistcode').value=exsistlabel;
			document.getElementById('exsistcodediv').style.display='none';
			
		}
	}
// 	xmlHttp.open("POST","include/"+pagename+","true");
// 	xmlHttp.send(null);

}
function createrequest()
{
	var http=null;
	try
	{
	// Firefox, Opera 8.0+, Safari
		http=new XMLHttpRequest();
	}
	catch (e)
	{
	// Internet Explorer
		try
		{
			http=new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch (e)
		{
			http=new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return http;
}
function displaycode(exlabel)
{
	if(exlabel=="newuser")
	document.getElementById('exsistcodediv').style.display='none';
	else
	document.getElementById('exsistcodediv').style.display='block';
}


			</script>

<div class="container">
  <h1>Registration Details</h1>
 <br/><br/>
   <form method="post" action="<?php echo get_option('siteurl'); ?>/creditcard" id="myForm" onsubmit="return CheckForm()" class="contactform" style="padding:0px">
    <input name="mode" value="register" type="hidden">
	<input type="hidden" name="label" value="<?php echo $label; ?>" id="label"/>
	<input type="hidden" name="hidexsistcode" value="" id="hidexsistcode"/>
	<?php if($_REQUEST['customer']!="" && isset($_REQUEST['customer'])) { ?>
		 <div id="pas">
        New User <input type="radio" name="user" id="newuser" value="newuser" onclick="displaycode(this.value);" checked="checked"/><br/>Exsisting user <input type="radio" name="user" id="olduser" value="olduser" onclick="displaycode(this.value);"/>            
    </div>
	
	
	<div id="exsistcodediv">
	 <div id="pas">
         <div class="pas1">
        <div class="fonter">Already Exsisting Label:</div>
        <div class="field-widget">
          <input name="exsistcode" size="40" id="exsistcode" title="Exsisting Code" value="" type="text" style="white-space:nowrap;">	

        </div>
      </div>
      <div class="spacer"></div>
	 
            
    </div>&nbsp; <input type="button" style="width:70px;" value="submit" onclick="getformdata()"  /> </div>
	<?php } ?>
	<div id="formdiv">
  <?php echo registrationtable();?>
  </div>
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
 <script>  displaycode("newuser");  </script>

</div>
<?php get_footer(); ?>
