<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
.menutitle{
cursor:pointer;
margin-bottom: 5px;
background-color:#ECECFF;
color:#000000;
width:140px;
padding:2px;
text-align:center;
font-weight:bold;
/*/*/border:1px solid #000000;/* */
}

.submenu{
margin-bottom: 0.5em;
}
</style>

<script type="text/javascript">

/***********************************************
* Switch Menu script- by Martial B of http://getElementById.com/
* Modified by Dynamic Drive for format & NS4/IE4 compatibility
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

var persistmenu="yes" //"yes" or "no". Make sure each SPAN content contains an incrementing ID starting at 1 (id="sub1", id="sub2", etc)
var persisttype="sitewide" //enter "sitewide" for menu to persist across site, "local" for this page only

if (document.getElementById){ //DynamicDrive.com change
document.write('<style type="text/css">\n')
document.write('.submenu{display: none;}\n')
document.write('</style>\n')
}

function SwitchMenu(obj){
	if(document.getElementById){
	var el = document.getElementById(obj);
	var ar = document.getElementById("masterdiv").getElementsByTagName("span"); //DynamicDrive.com change
		if(el.style.display != "block"){ //DynamicDrive.com change
			for (var i=0; i<ar.length; i++){
				if (ar[i].className=="submenu") //DynamicDrive.com change
				ar[i].style.display = "none";
			}
			el.style.display = "block";
		}else{
			el.style.display = "none";
		}
	}
}

function get_cookie(Name) { 
var search = Name + "="
var returnvalue = "";
if (document.cookie.length > 0) {
offset = document.cookie.indexOf(search)
if (offset != -1) { 
offset += search.length
end = document.cookie.indexOf(";", offset);
if (end == -1) end = document.cookie.length;
returnvalue=unescape(document.cookie.substring(offset, end))
}
}
return returnvalue;
}

function onloadfunction(){
if (persistmenu=="yes"){
var cookiename=(persisttype=="sitewide")? "switchmenu" : window.location.pathname
var cookievalue=get_cookie(cookiename)
if (cookievalue!="")
document.getElementById(cookievalue).style.display="block"
}
}

function savemenustate(){
var inc=1, blockid=""
while (document.getElementById("sub"+inc)){
if (document.getElementById("sub"+inc).style.display=="block"){
blockid="sub"+inc
break
}
inc++
}
var cookiename=(persisttype=="sitewide")? "switchmenu" : window.location.pathname
var cookievalue=(persisttype=="sitewide")? blockid+";path=/" : blockid
document.cookie=cookiename+"="+cookievalue
}

if (window.addEventListener)
window.addEventListener("load", onloadfunction, false)
else if (window.attachEvent)
window.attachEvent("onload", onloadfunction)
else if (document.getElementById)
window.onload=onloadfunction

if (persistmenu=="yes" && document.getElementById)
window.onunload=savemenustate

</script>
</head>

<body>
<!-- Keep all menus within masterdiv-->
<div id="masterdiv">

	<div class="menutitle" onclick="SwitchMenu('sub1')">Site Menu</div>
	<span class="submenu" id="sub1">
		- <a href="new.htm">What's New</a><br>
		- <a href="hot.htm">What's hot</a><br>
		- <a href="revised.htm">Revised Scripts</a><br>
		- <a href="morezone/">More Zone</a>
	</span>

	<div class="menutitle" onclick="SwitchMenu('sub2')">FAQ/Help</div>
	<span class="submenu" id="sub2">
		- <a href="notice.htm">Usage Terms</a><br>
		- <a href="faqs.htm">DHTML FAQs</a><br>
		- <a href="help.htm">Scripts FAQs</a>
	</span>

	<div class="menutitle" onclick="SwitchMenu('sub3')">Help Forum</div>
	<span class="submenu" id="sub3">
		- <a href="http://www.codingforums.com">Coding Forums</a><br>
	</span>
	
	<div class="menutitle" onclick="SwitchMenu('sub4')">Cool Links</div>
	<span class="submenu" id="sub4">
		- <a href="http://www.javascriptkit.com">JavaScript Kit</a><br>
		- <a href="http://www.freewarejava.com">Freewarejava</a><br>
		- <a href="http://www.cooltext.com">Cool Text</a><br>
		- <a href="http://www.google.com">Google.com</a>
	</span>

	<img src="about.gif" onclick="SwitchMenu('sub5')"><br>
	<span class="submenu" id="sub5">
		- <a href="http://www.dynamicdrive.com/link.htm">Link to DD</a><br>
		- <a href="http://www.dynamicdrive.com/recommendit/">Recommend Us</a><br>
		- <a href="http://www.dynamicdrive.com/contact.htm">Email Us</a><br>
	</span>

</div>
</body>
</html>
