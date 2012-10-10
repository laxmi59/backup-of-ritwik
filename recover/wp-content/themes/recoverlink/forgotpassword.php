<?php
session_start();

/*
Template Name: Forgot-Password
*/
get_header();
if($_POST['passwordsubmit']){
	$chkEmailValid=mysql_fetch_object(mysql_query("select * from `contactdetails` where `email`='".$_POST['txtemail']."'"));
	if($chkEmailValid){
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: '.RecoverLink. "\r\n";
		$body="your password: ".$chkEmailValid->password;
		mail($_POST['txtemail'],"Regarding RecoverLink Password",$body,$headers);
		$msg="Your password sent to given mail id";
	}else{
		$msg="Your email id not matching with our records please check your mail id";
	}
}
?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/account/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/account/jquery.validate.pack.js">
</script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/account/javascript.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".contactform").validate();
});
</script>
<div class="container">
<h1>Forgot Password</h1>
<div class="validation-advice" style="font-size:14px" align="center"><b><?php echo $msg?></b></div>
  <form method="post" class="contactform">
    <input type="hidden" value="retrieve_password" name="mode">
    <table width="450" border="0" cellpadding="0"  cellspacing="0">
      <tbody>
        <tr>
          <td width="276" valign="top">Enter your registered Email Address: </td>
          <td width="144"><input type="text" id="txtemail" name="txtemail" class="required email" title="Enter Your Email Address"></td>
        </tr>
        <tr>
        <td>&nbsp;</td>
          <td colspan="2"><input type="submit" name="passwordsubmit" value="Request Password" class="green-bt"></td>
        </tr>
      </tbody>
    </table>
  </form>
</div>
<?php get_footer(); ?>
