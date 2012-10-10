<?php
session_start();
if($_SESSION['userid']!=''){
	wp_redirect(get_option('siteurl') . '/account');exit;
}

/*
Template Name: get-started
*/
include_once (TEMPLATEPATH . '/lib/Functions.php');
include_once (TEMPLATEPATH . '/lib/GlobalValues.php');

if(isset($_REQUEST['submit'])) {
     $SqlGetUselogin="select * FROM contactdetails where email='".$_REQUEST['email']."' and password='".base64_encode($_REQUEST['password'])."'";
	$SqlGetUseloginExe=mysql_query($SqlGetUselogin);
	$getlogindet=mysql_num_rows($SqlGetUseloginExe);
	$getloginfet=mysql_fetch_object($SqlGetUseloginExe);
	// $getlogindet; 
	if($getlogindet > 0) {
	   	$_SESSION['userid']=$getloginfet->contactdet_id;
		if($_REQUEST['login_type'] <> ''){
			wp_redirect(get_option('siteurl') . '/account?status=update_account');exit;
		}else{
			wp_redirect(get_option('siteurl') . '/account');exit;
		}
	}  
	else {
		//wp_redirect(get_option('siteurl') . '/get-started');exit;
		$msg="invalid EmailAddress or Password";
	}
	
}

get_header();
?>
<?php /*?><script type="text/javascript" language="JavaScript" src="<?php bloginfo('template_directory'); ?>/js/script/jquery.validate.min.js" ></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/script/jquery.min.js"></script>
<script type="text/javascript">
  $.noConflict();
jQuery(document).ready(function($) {
	$("#myFormlogin").validate({
			rules: {
			password: "required",			
			email: {
				required: true,
				email: true
			}			
		},
		messages: {
			email:{			
			email: "Please enter a valid Email ",			
			}			
		}
	});	
});
  </script><?php */?>
  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/account/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/account/jquery.validate.pack.js">
</script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/account/javascript.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	//$("#myform").validate();
	$("#myFormlogin").validate();
});
function valid(){
	if(document.getElementById("label_id").value==''){
		document.getElementById("errorforlabel").innerHTML="Label Required";
		document.getElementById("label_id").focus();
		return false;
	}else{
		document.getElementById("errorforlabel").innerHTML="";
		return true;
	}
	
}
</script>
 
<style type="text/css">
label.error {
	width: 250px;
	display: block;
	float: left;
	color:#811E14;
	padding-left: 10px;
}
</style>
<div class="container">
<?php if($_REQUEST['msg']=='succ'){?>
		<div class="validation-advice" style="font-size:14px" align="center"><b><?php echo "Success fully registered"?></b></div>
	<?php }?>
  <div class="login orange">  	
    <div  class="left-category">
      <h1>New Customers</h1>
      <p>Do you already have your RecoverLink labels? </p>
      <h3> NO. </h3>
      <p>You have not received your RecoverLink labels yet. Your labels will be sent via mail. <a href="<?php echo get_option('siteurl');?>/registerform?customer=nolabel">Click here to register</a></p>
      <h3>YES. </h3>
      <p> You have already received your labels from a RecoverLink partner. <br />
        Enter the ID# from your RecoverLink labels in the labels below and then click register.</p>
		<div  style="color:red; padding:0px 30px 0px; " id="errormessage">
		<?php 
		if($_REQUEST['message']=="notvalid")
		echo "Your Label Id is not a valid id please input a valid id.";
		if($_REQUEST['message']=="exsist")
		echo "Label Id already exist please input a valid id.";		
		if($_REQUEST['message']=="empty")
		echo "Label Id should not be empty.";		
		?>
		<div id="errorforlabel"></div>
		</div>
      <form method="post" name="myform" id="myform" onsubmit="return valid();" action="<?php echo get_option('siteurl');?>/registerform"   >
        <div class="reword" >
          <input name="label" type="text" class="required" maxlength="10"  onKeyPress="return isNumberKey(event)"    />
        </div>
		
        <input type="submit" value="Register" class="green-bt fl" />
      </form>
    </div>
    <!--right-->
    <div class="right-category">
	<div class="validation-advice"><?php echo $msg?></div>
      <h1>Existing Customers </h1>
      <div class="spacer">&nbsp;</div>
      <form action="<?php echo get_option('siteurl');?>/get-started" name="myFormlogin" id="myFormlogin" method="post"   >
	  <table border="0" cellpadding="0" cellspacing="0">
	  <tr><td><label class="lable"> Sign-In Email </label>
        <input  type="text" name="email"  class="required email"  />
	  </td></tr>
	  <tr><td><label class="lable"> Password </label>
        <input   type="password" name="password" class="required"/>
		<?php if($_REQUEST['status']<>''){?>
		<input type="hidden" name="login_type" value="<?php echo $_REQUEST['status']?>" />
		<?php }?>
	</td></tr>
	<tr><td><input class="green-bt" type="submit" name="submit" value="Sign-In" /></td></tr>
	<tr><td><a href="<?php echo get_option('siteurl');?>/forgotpassword" >Forgot your password?</a></td></tr>
	</table>
      </form>
    </div>
    <!---->
  </div>
</div>
<?php get_footer(); ?>
