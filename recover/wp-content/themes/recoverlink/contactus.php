<?php
/*
Template Name: contact-us
*/

get_header();
if($_REQUEST['Submit']) {
	extract($_REQUEST);
	//mail functionality
	//$replyto = get_bloginfo("admin_email");
	$replyto=$email;
	$headers = "MIME-Version: 1.0\r\n" .
	"From: ".$replyto."<".$replyto.">\n" . 	
	"Content-Type: text/HTML; charset=\"" . get_settings('blog_charset') . "\"\r\n";    
	$mailSubject="Recoverlink contact request";
	$mailbody = "Greetings,<br/> <br/>An user has sent a contact request in Recoverlink. Below are the user details  <br/><br/>";
	$mailbody .= "Name: ".$contactname."<br/>";
	$mailbody .= "Company/Organization: ".$company."<br/>";
	$mailbody .= "Address: ".$address1." ".$address2.",".$city.", ".strtoupper($states)."  ".$zip."<br/>";
	$mailbody .= "Phone: ".$phone."<br/>";
	$mailbody .= "Email: ".$email."<br/>";
	$mailbody .= "Comments: ".$comments."<br/><br/>";
	$mailbody .=  "Thank you,<br/>Recoverlink";
	//$to="aravind@ritwik.com";
	$to="info@recoverlink.com";
	//$to= get_bloginfo("admin_email");
	@mail($to, $mailSubject, $mailbody, $headers);
	//end of mail functionality
	$sucMsg = "Thank you for contacting us. We will get back to you soon";
}
?>
<script src="<?php bloginfo('template_directory'); ?>/js/registration/prototype.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/registration/validation.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/registration/javascript.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/account/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/account/jquery.validate.pack.js">
</script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/account/javascript.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#myForm").validate();
});
</script>

<div class="container"> 
  <h2>Contact Form</h2>
  <h3>Contact us toll free at <!--1- 800- 520- 4123--> (800) 650-1625 <br>
    <span style="font-size: 12px;">9am to 5pm EST, Monday - Friday</span></h3>
	<div style="color:#0067B0"><?php echo $sucMsg; ?></div>
  <form id="myForm" method="post"  action="<?php the_permalink(); ?>" name="contactform" class="contactform">
    <table border="0" cellpadding="0" cellspacing="0" >
      <tbody>
        <tr>
          
          <td width="185" height="27" valign="top" >Name</td>
          <td ><input type="text" size="36" name="contactname" id="roundme" class="required" >
          </td>
        </tr>
        <tr>
          <td height="27" valign="top" >Company/Organization</td>
          <td ><input type="text" size="36" name="company" id="company" class="required" >
          </td>
        </tr>
        <tr>
          <td height="27" valign="top" >Address</td>
          <td ><input type="text" size="36" name="address1" id="address1" class="required" >
          </td>
        </tr>
        <tr>
          <td height="27" valign="top" >Address 2</td>
          <td ><input type="text" size="36" name="address2" id="address2"  ></td>
        </tr>
        <tr>
          <td height="27" valign="top" >City</td>
          <td ><input type="text" size="36" name="city" id="city" class="required" >
          </td>
        </tr>
        <tr>
          <td height="27" valign="top" >State</td>
          <td ><select  name="states" class="required select">
              <option  value="">--Select--</option>
              <option value="fn">Outside US</option>
              <option value="al">Alabama</option>
              <option value="ak">Alaska</option>
              <option value="az">Arizona</option>
              <option value="ar">Arkansas</option>
              <option value="ca">California</option>
              <option value="co">Colorado</option>
              <option value="ct">Connecticut</option>
              <option value="de">Delaware</option>
              <option value="dc">District of Columbia</option>
              <option value="fl">Florida</option>
              <option value="ga">Georgia</option>
              <option value="hi">Hawaii</option>
              <option value="id">Idaho</option>
              <option value="il">Illinois</option>
              <option value="in">Indiana</option>
              <option value="ia">Iowa</option>
              <option value="ks">Kansas</option>
              <option value="ky">Kentucky</option>
              <option value="la">Louisiana</option>
              <option value="me">Maine</option>
              <option value="md">Maryland</option>
              <option value="ma">Massachusetts</option>
              <option value="mi">Michigan</option>
              <option value="mn">Minnesota</option>
              <option value="ms">Mississippi</option>
              <option value="mo">Missouri</option>
              <option value="mt">Montana</option>
              <option value="ne">Nebraska</option>
              <option value="nv">Nevada</option>
              <option value="nh">New Hampshire</option>
              <option value="nj">New Jersey</option>
              <option value="nm">New Mexico</option>
              <option value="ny">New York</option>
              <option value="nc">North Carolina</option>
              <option value="nd">North Dakota</option>
              <option value="oh">Ohio</option>
              <option value="ok">Oklahoma</option>
              <option value="or">Oregon</option>
              <option value="pa">Pennsylvania</option>
              <option value="ri">Rhode Island</option>
              <option value="sc">South Carolina</option>
              <option value="sd">South Dakota</option>
              <option value="tn">Tennessee</option>
              <option value="tx">Texas</option>
              <option value="ut">Utah</option>
              <option value="vt">Vermont</option>
              <option value="va">Virginia</option>
              <option value="wa">Washington</option>
              <option value="dc">Washington D.C.</option>
              <option value="wv">West Virginia</option>
              <option value="wi">Wisconsin</option>
              <option value="wy">Wyoming</option>
              <option value="" disabled="disabled">--Other US--</option>
              <option value="as">American Samoa</option>
              <option value="fm">Federated States Of Micronesia</option>
              <option value="gu">Guam</option>
              <option value="mh">Marshall Islands</option>
              <option value="mp">Northern Mariana Islands</option>
              <option value="pw">Palau</option>
              <option value="pr">Puerto Rico</option>
              <option value="vi">US Virgin Islands</option>
              <option value="" disabled="disabled" >--US Military--</option>
              <option value="ae">Armed Forces Africa</option>
              <option value="aa">Armed Forces Americas</option>
              <option value="ae">Armed Forces Canada</option>
              <option value="ae">Armed Forces Europe</option>
              <option value="ae">Armed Forces Middle East</option>
              <option value="ap">Armed Forces Pacific</option>
            </select></td>
        </tr>
        <tr>
          <td height="27" valign="top" >Zip Code</td>
          <td ><input type="text" size="36" name="zip" id="zip" class="required" >
          </td>
        </tr>
        <tr>
          <td height="27" valign="top" >Phone</td>
          <td ><input type="text" size="36" name="phone" id="phone" class="required" ></td>
        </tr>
        <tr>
          <td height="27" valign="top" >Email</td>
          <td ><input type="text" size="36" name="email" id="email" class="required email" ></td>
        </tr>
        <tr>
          <td height="60" align="left" valign="top" >Comments</td>
          <td  align="left"><textarea rows="4" cols="26" name="comments" id="comments" class="required" ></textarea></td>
        </tr>
        <tr>
          <td></td>
          <td width="160"><input type="submit" value="Send" class="submit" name="Submit"  ></td>
          <td width="28" align="right"></td>
        </tr>
      </tbody>
    </table>
  </form>
<script type="text/javascript">

                function formCallback(result, form) {

                    window.status = "valiation callback for form '" + form.id + "': result = " + result;

                }

                var valid = new Validation('myForm', {immediate : true, onFormValidate : formCallback});

            </script>
 
 
    
 
</div>
<?php get_footer(); ?>
