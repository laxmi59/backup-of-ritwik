<?php
  require_once('recaptchalib.php');
  if($_POST['submit']){
  $privatekey = "6LfeEc0SAAAAAG-7o3UwP7dGSQTRKktBOc-a7CCf";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
         "(reCAPTCHA said: " . $resp->error . ")");
  } else {
    echo "Your code here to handle a successful verification";
  }
  }
  ?>
<script type="text/javascript">
var RecaptchaOptions = {
    theme : 'white',
	//custom_theme_widget: 'recaptcha_widget'
};
</script>
 
<form method="post">
<?php
  $publickey = "6LfeEc0SAAAAAIWDJlgBpSAS7hdpb0g9-vHYoB0b"; // you got this from the signup page
  echo recaptcha_get_html($publickey);
?>
<input name="submit" type="submit" />
</form>
     