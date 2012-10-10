<?php 
setcookie("popup_cookie", ''); 
print_r($_COOKIE);
?>
<!-- Page styles -->
<link type='text/css' href='css/demo.css' rel='stylesheet' media='screen' />
<!-- Contact Form CSS files -->
<link type='text/css' href='css/basic.css' rel='stylesheet' media='screen' />
<!-- IE6 "fix" for the close png image -->
<!--[if lt IE 7]>
<link type='text/css' href='css/basic_ie.css' rel='stylesheet' media='screen' />
<![endif]-->
<!-- JS files are loaded at the bottom of the page -->
<!-- Load jQuery, SimpleModal and Basic JS files -->
<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type="text/javascript">
jQuery(function ($) {
<? if($_COOKIE['popup_cookie']==''){?>
	$('#basic-modal-content').modal();
<? }?>	
});
function winclose(id){
	document.cookie = 'popup_cookie='+id;
	if(id==1){
		document.frm.submit();
	}else{
		window.location='index.php';
	}
	return false;
}
function valid(){
	var email=document.getElementById('email').value;
	var id=1;
	if(email != ''){
		winclose(1);
	}else{
		alert("email should not be empty");
		document.getElementById('email').focus();
		return false;
	}
}
</script>

<div id='container'>
	<div id='content'>
	<? if($_COOKIE[popup_cookie] == 2 || $_COOKIE[popup_cookie] == ''){?>
<table width="95%" border="0" align="center" cellpadding="5" cellspacing="3" style="border:1px solid">
  <tr>
    <td><p>Claim your FREE copy of SEO Press Release How to Create a Google</p>
    </td>
  </tr>
  <tr>
    <td><table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><input name="textfield" type="text" size="40"></td>
        <td><input type="submit" name="Submit2" value="Submit"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>We hate spam as much as you do. You have our promise not to sell or share your</td>
  </tr>
</table>
<? }?>

		<div id='basic-modal'>
			<h3>Basic Modal Dialog</h3>
			<p>A basic modal dialog with minimal styling and no additional options. There are a few CSS properties set internally by SimpleModal, however, SimpleModal relies mostly on style options and/or external CSS for the look and feel.</p>
		</div>
		<div id='basic-modal'>
			<h3>Basic Modal Dialog</h3>
			<p>A basic modal dialog with minimal styling and no additional options. There are a few CSS properties set internally by SimpleModal, however, SimpleModal relies mostly on style options and/or external CSS for the look and feel.</p>
		</div>
		<div id='basic-modal'>
			<h3>Basic Modal Dialog</h3>
			<p>A basic modal dialog with minimal styling and no additional options. There are a few CSS properties set internally by SimpleModal, however, SimpleModal relies mostly on style options and/or external CSS for the look and feel.</p>
		</div>
		<div id='basic-modal'>
			<h3>Basic Modal Dialog</h3>
			<p>A basic modal dialog with minimal styling and no additional options. There are a few CSS properties set internally by SimpleModal, however, SimpleModal relies mostly on style options and/or external CSS for the look and feel.</p>
		</div>
		<div id='basic-modal'>
			<h3>Basic Modal Dialog</h3>
			<p>A basic modal dialog with minimal styling and no additional options. There are a few CSS properties set internally by SimpleModal, however, SimpleModal relies mostly on style options and/or external CSS for the look and feel.</p>
		</div><div id='basic-modal'>
			<h3>Basic Modal Dialog</h3>
			<p>A basic modal dialog with minimal styling and no additional options. There are a few CSS properties set internally by SimpleModal, however, SimpleModal relies mostly on style options and/or external CSS for the look and feel.</p>
		</div><div id='basic-modal'>
			<h3>Basic Modal Dialog</h3>
			<p>A basic modal dialog with minimal styling and no additional options. There are a few CSS properties set internally by SimpleModal, however, SimpleModal relies mostly on style options and/or external CSS for the look and feel.</p>
		</div>
		
		<!-- modal content -->
		<div id="basic-modal-content">
			<div style="float:right"><a href="javascript:void(0)" class="modalCloseImg simplemodal-close" title="Close" onclick="return winclose(2)">X</a></div>
 			<div>STOP! Grab Your FREE Whitepaper</div>
  			<div>"Secrets To Becoming A Money-Making Affiliate"</div>
			<div>Produced and authored by the super affiliate who owns this site. These are the basics any succesful affiliate marketer needs to know, and for the first time ever, you don't have to pay for it. Just tell us where to send it below.</div>
 			<form method="post" name="frm" onSubmit="return valid()">
     			<div>
					Email:<br>
            		<input type="text" name="email" id="email" size="40">
				</div>
		        <div align="right">
		            <input type="submit" name="Submit" value="Submit">
        		</div>
		   </form>
		</div>
	</div>
</div>