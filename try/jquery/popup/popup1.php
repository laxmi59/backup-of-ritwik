<?php 
setcookie("popup_cookie", ''); 
print_r($_COOKIE);
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	<? if($_COOKIE['popup_cookie']==''){?>
	$('#popup_name').fadeIn().css({ 'width': Number( 570 ) }).prepend('<a style="float:right;" href="javascript:void(0)" onclick="return winclose(2)" class="close">No Thanks! [X]</a>');
	
	var popMargTop = ($('#popup_name').height() + 80) / 2;
	var popMargLeft = ($('#popup_name').width() + 80) / 2;
	
	$('#popup_name').css({
		'margin-top' : -popMargTop,
		'margin-left' : -popMargLeft
	});
	
	$('body').append('<div id="fade"></div>'); //Add the fade layer to bottom of the body tag.
	$('#fade').css({'filter' : 'alpha(opacity=80)'}).fadeIn(); //Fade in the fade layer - .css({'filter' : 'alpha(opacity=80)'}) is used to fix the IE Bug on fading transparencies 
	
	<? }?>	

});
function winclose(id){
	document.cookie = 'popup_cookie='+id;
	$('#fade , .popup_block').fadeOut(function() {
		$('#fade, a.close').remove();  //fade them both out
	});
	if(id==1){
		document.form.submit();
	}else{
		window.location='popup1.php';
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
<style type="text/css">
#fade { /*--Transparent background layer--*/
	display: none; /*--hidden by default--*/
	background: #ADADAD;
	position: fixed; left: 0; top: 0;
	width: 100%; height: 100%;
	opacity: .80;
	z-index: 9999;
}
.popup_block{
	display: none; /*--hidden by default--*/
	background: #fff;
	/*padding: 20px;*/
	border: 8px solid #000;
	float: left;
	font-size: 1.2em;
	position:absolute;
	/*top: 50%; left: 35%;*/
	z-index: 99999;
}

</style>
<div id="popup_name" class="popup_block" >
<table width="500" border="0" align="center" cellpadding="5" cellspacing="3">
  <tr>
    <td>STOP! Grab Your FREE Whitepaper</td>
  </tr>
  <tr>
    <td>"Secrets To Becoming A Money-Making Affiliate"</td>
  </tr>
  <tr>
    <td>Produced and authored by the super affiliate who owns this site. These are the basics any succesful affiliate marketer needs to know, and for the first time ever, you don't have to pay for it. Just tell us where to send it below. </td>
  </tr>
  <tr>
    <td><form method="post" name="frm" onSubmit="return valid()">
      <table width="50%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Email:<br>
            <input type="text" name="email" id="email" size="40"></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><div align="right">
            <input type="submit" name="Submit" value="Submit">
          </div></td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

</div>
<? if($_COOKIE[popup_cookie] == 2){?>
<table width="570" border="0" align="center" cellpadding="5" cellspacing="3" style="border:1px solid">
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
<table width="570" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><DIV>I wanted to send across a project for you. &nbsp;It is essentially based on the   homepage/blog project that we previously had completed. &nbsp;Since we completed   that, we hired an editor who had some feedback, and also we had some additional   feedback that we would like to have incorporated into the design before we end   up launching the homepage. &nbsp;We are on a bit of a tight deadline, so I was hoping   we could have this wrapped up by Wednesday if possible.</DIV>
      <DIV>I wanted to send across a project for you. &nbsp;It is essentially based on the   homepage/blog project that we previously had completed. &nbsp;Since we completed   that, we hired an editor who had some feedback, and also we had some additional   feedback that we would like to have incorporated into the design before we end   up launching the homepage. &nbsp;We are on a bit of a tight deadline, so I was hoping   we could have this wrapped up by Wednesday if possible.</DIV>
      <DIV>I wanted to send across a project for you. &nbsp;It is essentially based on the   homepage/blog project that we previously had completed. &nbsp;Since we completed   that, we hired an editor who had some feedback, and also we had some additional   feedback that we would like to have incorporated into the design before we end   up launching the homepage. &nbsp;We are on a bit of a tight deadline, so I was hoping   we could have this wrapped up by Wednesday if possible.</DIV>
      <DIV>I wanted to send across a project for you. &nbsp;It is essentially based on the   homepage/blog project that we previously had completed. &nbsp;Since we completed   that, we hired an editor who had some feedback, and also we had some additional   feedback that we would like to have incorporated into the design before we end   up launching the homepage. &nbsp;We are on a bit of a tight deadline, so I was hoping   we could have this wrapped up by Wednesday if possible.</DIV>
      <DIV>I wanted to send across a project for you. &nbsp;It is essentially based on the   homepage/blog project that we previously had completed. &nbsp;Since we completed   that, we hired an editor who had some feedback, and also we had some additional   feedback that we would like to have incorporated into the design before we end   up launching the homepage. &nbsp;We are on a bit of a tight deadline, so I was hoping   we could have this wrapped up by Wednesday if possible.</DIV>
      <DIV>I wanted to send across a project for you. &nbsp;It is essentially based on the   homepage/blog project that we previously had completed. &nbsp;Since we completed   that, we hired an editor who had some feedback, and also we had some additional   feedback that we would like to have incorporated into the design before we end   up launching the homepage. &nbsp;We are on a bit of a tight deadline, so I was hoping   we could have this wrapped up by Wednesday if possible.</DIV>
      <DIV>I wanted to send across a project for you. &nbsp;It is essentially based on the   homepage/blog project that we previously had completed. &nbsp;Since we completed   that, we hired an editor who had some feedback, and also we had some additional   feedback that we would like to have incorporated into the design before we end   up launching the homepage. &nbsp;We are on a bit of a tight deadline, so I was hoping   we could have this wrapped up by Wednesday if possible.</DIV>
      <DIV>I wanted to send across a project for you. &nbsp;It is essentially based on the   homepage/blog project that we previously had completed. &nbsp;Since we completed   that, we hired an editor who had some feedback, and also we had some additional   feedback that we would like to have incorporated into the design before we end   up launching the homepage. &nbsp;We are on a bit of a tight deadline, so I was hoping   we could have this wrapped up by Wednesday if possible.</DIV>
      <DIV>I wanted to send across a project for you. &nbsp;It is essentially based on the   homepage/blog project that we previously had completed. &nbsp;Since we completed   that, we hired an editor who had some feedback, and also we had some additional   feedback that we would like to have incorporated into the design before we end   up launching the homepage. &nbsp;We are on a bit of a tight deadline, so I was hoping   we could have this wrapped up by Wednesday if possible.</DIV>
      <DIV>I wanted to send across a project for you. &nbsp;It is essentially based on the   homepage/blog project that we previously had completed. &nbsp;Since we completed   that, we hired an editor who had some feedback, and also we had some additional   feedback that we would like to have incorporated into the design before we end   up launching the homepage. &nbsp;We are on a bit of a tight deadline, so I was hoping   we could have this wrapped up by Wednesday if possible.</DIV>
      <DIV>I wanted to send across a project for you. &nbsp;It is essentially based on the   homepage/blog project that we previously had completed. &nbsp;Since we completed   that, we hired an editor who had some feedback, and also we had some additional   feedback that we would like to have incorporated into the design before we end   up launching the homepage. &nbsp;We are on a bit of a tight deadline, so I was hoping   we could have this wrapped up by Wednesday if possible.</DIV>
      <DIV>I wanted to send across a project for you. &nbsp;It is essentially based on the   homepage/blog project that we previously had completed. &nbsp;Since we completed   that, we hired an editor who had some feedback, and also we had some additional   feedback that we would like to have incorporated into the design before we end   up launching the homepage. &nbsp;We are on a bit of a tight deadline, so I was hoping   we could have this wrapped up by Wednesday if possible.</DIV>
      <DIV>I wanted to send across a project for you. &nbsp;It is essentially based on the   homepage/blog project that we previously had completed. &nbsp;Since we completed   that, we hired an editor who had some feedback, and also we had some additional   feedback that we would like to have incorporated into the design before we end   up launching the homepage. &nbsp;We are on a bit of a tight deadline, so I was hoping   we could have this wrapped up by Wednesday if possible.</DIV>
      <DIV>I wanted to send across a project for you. &nbsp;It is essentially based on the   homepage/blog project that we previously had completed. &nbsp;Since we completed   that, we hired an editor who had some feedback, and also we had some additional   feedback that we would like to have incorporated into the design before we end   up launching the homepage. &nbsp;We are on a bit of a tight deadline, so I was hoping   we could have this wrapped up by Wednesday if possible.</DIV>
      <DIV>I wanted to send across a project for you. &nbsp;It is essentially based on the   homepage/blog project that we previously had completed. &nbsp;Since we completed   that, we hired an editor who had some feedback, and also we had some additional   feedback that we would like to have incorporated into the design before we end   up launching the homepage. &nbsp;We are on a bit of a tight deadline, so I was hoping   we could have this wrapped up by Wednesday if possible.</DIV>
      <DIV>I wanted to send across a project for you. &nbsp;It is essentially based on the   homepage/blog project that we previously had completed. &nbsp;Since we completed   that, we hired an editor who had some feedback, and also we had some additional   feedback that we would like to have incorporated into the design before we end   up launching the homepage. &nbsp;We are on a bit of a tight deadline, so I was hoping   we could have this wrapped up by Wednesday if possible.</DIV>
      <DIV>I wanted to send across a project for you. &nbsp;It is essentially based on the   homepage/blog project that we previously had completed. &nbsp;Since we completed   that, we hired an editor who had some feedback, and also we had some additional   feedback that we would like to have incorporated into the design before we end   up launching the homepage. &nbsp;We are on a bit of a tight deadline, so I was hoping   we could have this wrapped up by Wednesday if possible.</DIV>
      <DIV>I wanted to send across a project for you. &nbsp;It is essentially based on the   homepage/blog project that we previously had completed. &nbsp;Since we completed   that, we hired an editor who had some feedback, and also we had some additional   feedback that we would like to have incorporated into the design before we end   up launching the homepage. &nbsp;We are on a bit of a tight deadline, so I was hoping   we could have this wrapped up by Wednesday if possible.</DIV>
    
    <p>&nbsp;</p></td>
  </tr>
</table>
<script type="text/javascript">
//Page Scroller (aka custom scrollbar)- By Dynamic Drive
//For full source code and more DHTML scripts, visit http://www.dynamicdrive.com
//This credit MUST stay intact for use

var Hoffset=670 //Enter buttons' offset from right edge of window (adjust depending on images width)
var Voffset=130 //Enter buttons' offset from bottom edge of window (adjust depending on images height)
var thespeed=3 //Enter scroll speed in integer (Advised: 1-3)

var ieNOTopera=document.all&&navigator.userAgent.indexOf("Opera")==-1
var myspeed=0

var ieHoffset_extra=document.all? 15 : 0
var cross_obj=document.all? document.all.popup_name : document.getElementById? document.getElementById("popup_name") : document.popup_name

function iecompattest(){
return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}

function positionit(){
var dsocleft=document.all? iecompattest().scrollLeft : pageXOffset
var dsoctop=document.all? iecompattest().scrollTop : pageYOffset
var window_width=ieNOTopera? iecompattest().clientWidth+ieHoffset_extra : window.innerWidth+ieHoffset_extra
var window_height=ieNOTopera? iecompattest().clientHeight : window.innerHeight

if (document.all||document.getElementById){
cross_obj.style.left=parseInt(dsocleft)+parseInt(window_width)-Hoffset+"px"
cross_obj.style.top=dsoctop+parseInt(window_height)-Voffset+"px"
}
else if (document.layers){
cross_obj.left=dsocleft+window_width-Hoffset
cross_obj.top=dsoctop+window_height-Voffset
}
}

function scrollwindow(){
window.scrollBy(0,myspeed)
}

function initializeIT(){
positionit()
if (myspeed!=0){
scrollwindow()
}
}

if (document.all||document.getElementById||document.layers)
setInterval("initializeIT()",20)

</script>