<script type="text/javascript">
var RecaptchaOptions = {
    theme : 'white'
};
</script>
<form method="post" action="verify.php">
<?php
  require_once('recaptchalib.php');
  $publickey = "6LfeEc0SAAAAAIWDJlgBpSAS7hdpb0g9-vHYoB0b"; // you got this from the signup page
  echo recaptcha_get_html($publickey);
?>
<input type="submit" />
</form>
     