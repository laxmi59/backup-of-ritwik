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
  <style type="text/css">
 #recaptcha_widget{
   border: 2px solid #ccc;
    
    width: 200px !important;
	 border-radius: 5px 5px 5px 5px;
    padding: 5px;
 }
 #recaptcha_image{
 width:200px!important;
 }
  #recaptcha_image img{
   width:200px!important;
  }
  #innercontent{
  border-top: 1px solid #CCCCCC;
}
 </style>
<script type="text/javascript">
var RecaptchaOptions = {
    theme : 'custom',
	custom_theme_widget: 'recaptcha_widget'
};
</script>
 
<?php /*?><form method="post">
<?php
  $publickey = "6LfeEc0SAAAAAIWDJlgBpSAS7hdpb0g9-vHYoB0b"; // you got this from the signup page
  echo recaptcha_get_html($publickey);
?>
<input name="submit" type="submit" />
</form><?php */?>
<div id="recaptcha_widget" style="display:none;">
   <div id="recaptcha_image" style="width:200px"></div>
   <div class="recaptcha_only_if_incorrect_sol" style="color:red">Incorrect please try again</div>
<div id="innercontent">
<table>
<tr>
	<td>
   		<span class="recaptcha_only_if_image">Enter the words above:</span>
		<span class="recaptcha_only_if_audio">Enter the numbers you hear:</span>
		<input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />
	</td>
	<td>
	<table border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td>
   	<div><a href="javascript:Recaptcha.reload()"><img height="17" width="25" id="recaptcha_reload" src="http://www.google.com/recaptcha/api/img/red/refresh.gif" alt="Get a new challenge"></a></div></td></tr><tr><td>
   <div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')"><img height="16" width="25" alt="Get an audio challenge" id="recaptcha_switch_audio" src="http://www.google.com/recaptcha/api/img/red/audio.gif"></a></div>
   <div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')"><img height="16" width="25" alt="Get a visual challenge" id="recaptcha_switch_img" src="http://www.google.com/recaptcha/api/img/red/text.gif"></a></div></td></tr><tr><td>

   <div><a href="javascript:Recaptcha.showhelp()"><img height="16" width="25" id="recaptcha_whatsthis" src="http://www.google.com/recaptcha/api/img/red/help.gif" alt="Help"></a></div></td></tr></table>
</td></tr></table>
</div>
 </div>

 <script type="text/javascript"
    src="http://www.google.com/recaptcha/api/challenge?k=6LfeEc0SAAAAAIWDJlgBpSAS7hdpb0g9-vHYoB0b">
 </script>
 <noscript>
   <iframe src="http://www.google.com/recaptcha/api/noscript?k=6LfeEc0SAAAAAIWDJlgBpSAS7hdpb0g9-vHYoB0b"
        height="300" width="200" frameborder="0"></iframe><br>
   <textarea name="recaptcha_challenge_field" rows="3" cols="40">
   </textarea>
   <input type="hidden" name="recaptcha_response_field"
        value="manual_challenge">
 </noscript>
     