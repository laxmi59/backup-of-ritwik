<?php
session_start();
if (!empty($_REQUEST['captcha'])) {
    if (empty($_SESSION['captcha']) || trim(strtolower($_REQUEST['captcha'])) != $_SESSION['captcha']){
        $note= 'Please enter valid text';
    }else{
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $name=htmlentities($_POST['name']); 
            $message=htmlentities($_POST['message']);
            // Insert SQL Statement 
            $note= 'Values Inserted';
        }
    }
    unset($_SESSION['captcha']);
}
?>

<div style="margin:50px ">
<div style="width:300px;background:#ff99ff; margin-bottom:20px"><?php echo $note; ?></div>
<form method="post" >
<b>Name</b><br/>
<input type="text" name="name" /><br/>
<b>Message</b><br/>
<textarea name="message"></textarea><br/>
<img src="captcha.php" id="captcha" /><br/>
<a href="#" onclick="
    document.getElementById('captcha').src='captcha.php?'+Math.random();
    document.getElementById('captcha-form').focus();"
    id="change-image">Not readable? Change text.</a><br/><br/>
	<b>Human Test</b><br/>
	<input type="text" name="captcha" id="captcha-form" /><br/>
	
<input type="submit" />
</form>
</div>

