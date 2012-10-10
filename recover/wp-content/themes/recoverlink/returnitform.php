<?php
/*
Template Name: recoverlinkform
*/
get_header();
if($_POST['submit']){
extract($_POST);
	$ins=mysql_query("insert into `items_found` (`firstname`, `lastname`, `emailid`, `ph_home`, `ph_work`, `ph_cell`, `itemname`, `itemlabel`, `best_contact`, `cdate`, `status`) values ('$firstname', '$lastname', '$emailid', '$ph_home', '$ph_work', '$ph_cell', '$itemname', '$itemlabel', '$best_contact', now(), 'N')");
	if($ins){
		$getMailId=mysql_fetch_object(mysql_query("SELECT cd.email FROM `labels` l, contatactdetails2labels cdl, contactdetails cd WHERE l.`labelno` =1004 AND l.`label_id` = cdl.`label_id` AND cdl.contactdet_id = cd.contactdet_id"));
		$body= "<p>your item founded by ".$firstname." you may collect your item from this person or contact recoverlink for shipping your item. login to your account for further details<br><br>Thanking you<br>RecoverLink";
		//$stat=sendEmail($getMailId->email,"Email From RecoverLink",$body);
		$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: '.RecoverLink. "\r\n";
	$body="your password: ".$chkEmailValid->password;
	mail($getMailId->email,"Email From RecoverLink",$body,$headers);
	//mail($getMailId->email,"Email From RecoverLink",$body,$headers);
		$msg="Thank you for returning the item. Your information success fully saved";
	}
}
?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/account/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/account/jquery.validate.pack.js">
</script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/account/javascript.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#contactform").validate();
});
</script>

<div class="container orange">
   <div class="validation-advice" style="font-size:14px" align="center"><b><?=$msg?></b></div><br><br>
  <h2 >RecoverLink</h2>
  <p>I found something and want to RecoverLink.</p>
  
 
  <form  id="contactform" method="post" class="contactform" style="padding:0px !important">
   <h3>CONTACT INFO</h3>
    <table border="0" cellpadding="0" cellspacing="0" width="450">
      <tbody>
        <tr>
          <td width="253"  > First Name</td>
          <td width="193"><input name="firstname" id="firstname" size="32" type="text" class="required">
          </td>
          <td width="4" ></td>
        </tr>
        <tr>
          <td >Last Name</td>
          <td ><input  name="lastname" id="lastname" size="32" type="text" class="required">
          </td>
          <td ></td>
        </tr>
        <tr>
          <td >Email Address</td>
          <td ><input  name="emailid" id="emailid" size="32" type="text" class="required email">
          </td>
          <td ></td>
        </tr>
        <tr>
          <td >Phone (Home)</td>
          <td ><input  name="ph_home" id="ph_home" size="32" type="text" class="required" onkeydown="javascript:backspacerDOWN(this,event);" onkeyup="javascript:backspacerUP(this,event);">
          </td>
          <td class="form dsR98" rowspan="3"><p></p></td>
        </tr>
        <tr>
          <td >Phone (Work)</td>
          <td ><input  name="ph_work" id="ph_work" size="32" type="text" class="required" onkeydown="javascript:backspacerDOWN(this,event);" onkeyup="javascript:backspacerUP(this,event);"></td>
        </tr>
        <tr>
          <td >Phone (Cell)</td>
          <td ><input  name="ph_cell" id="ph_cell" size="32" type="text" class="required"></td>
        </tr>
        <tr>
          <td >Best way to contact you</td>
          <td ><select name="best_contact" id="best_contact" size="1" class="required">
              <option value="0">--Select--</option>
              <option value="home">Home Phone</option>
              <option value="work">Work Phone</option>
              <option value="cell">Cell Phone</option>
              <option value="email">Email</option>
            </select>
          </td>
          <td ></td>
    </tr></tbody></table>
        <h3>ITEM INFO</h3>
        <table  border="0" cellpadding="0" cellspacing="0" width="450">
      <tbody>
         
        <tr>
          <td width="252">What is the item found</td>
          <td width="192" ><input name="itemname" id="itemname" size="32" type="text" class="required"></td>
          <td width="6" ></td>
        </tr>
        <tr>
          <td >ID Number<br>
            <span class="small-test">Located on RecoverLink label</span></td>
          <td ><input  name="itemlabel" id="itemlabel" size="32" type="text" class="required">
          </td>
          <td ></td>
    </tr></tbody></table>
         
        <table   border="0" cellpadding="0" cellspacing="0" width="500">
        <tr>
          <td  width="200"  >&nbsp; </td>
          <td  > <input name="submit" value="Submit"  type="submit" class="green-bt fl mar-right10"><input  class="orange-bt fl" value="Clear Fields" type="reset"></td>
        </tr>
      </tbody>
    </table>
  </form>
</div>
<script type="text/javascript">
	function formCallback(result, form) {
		window.status = "valiation callback for form '" + form.id + "': result = " + result;
	}						
	var valid = new Validation('contactform', {immediate : true, onFormValidate : formCallback});		
</script>
<?php get_footer(); ?>
