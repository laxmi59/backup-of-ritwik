<? session_start();
include "class/class.php";
include "dbcon.php";
$list= new real_list();
$b= new real_req();
$c= new real_location();
$reg= new real_reg();
$req=new req();
$prop=new real_property();
if($_POST['submit'])
{
	extract($_POST);
	//print_r($_POST);
	$reg1=$reg->reg11($_POST['un']);
	//echo $reg1['r_email'];
	$name=$_POST['name']; $email=$_POST['email']; $phone=$_POST['phone']; $desc=$_POST['desc'];
	$to = $reg1['r_email'];
	$subject = $desc;
	$body = "<table>
<tr><td>name</td><td>:</td><td>$name</td></tr>
<tr><td>email</td><td>:</td><td>$email</td></tr>
<tr><td>phone</td><td>:</td><td>$phone</td></tr>
<tr><td>desc</td><td>:</td><td>$desc</td></tr>
</table>";
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: '.sunproperties. "\r\n";
	if(mail($to,$subject,$body,$headers))
	{
		$msg="this review sennt to your mail id";
	}
	else
	{
		$msg= "msg not sent";
	} 
}
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$title?></title>
</head>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.menutitle{
cursor:pointer;
margin-bottom: 5px;
/*background-color:#ECECFF;*/
color:#0000FF;
/*width:140px;*/
padding:2px;
text-align:center;
font-weight:bold;
/*border:1px solid #000000; */
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
<div><? include "header.php"?></div>
<div>&nbsp;'</div>
<div align="center" class="menutitle"><span class="style8">Location:</span><?=$c->location2($_GET['aid'])?></div>
<div style="width:20%; float:left; height:200px "><? include "leftlocation.php"?>
  
</div>
<div id="masterdiv" style="width:600px; margin-left:210px">&nbsp;
<div>
  <div class="style1" style="float:left; width:100px" >Location</div>
	<div class="style1" style="float:left; width:100px">Specification</div>
	<div class="style1" style="float:left; width:100px">Price</div>
		<div class="style1" style="float:left; width:200px">Contact</div>
		<div class="style1" style="float:left; width:100px">Show Map</div>
 </div> 
 <? 
		if($_GET['a1']<>'' && $_GET['a2']<>'')
		{
			if($_GET['a3']<>'')
			{
				$xx1=mysql_query("select * from `real-list` where list_type='".$_GET['a1']."' and list_property='".$_GET['a2']."' and list_location='".$_GET['a3']."'");
			}
			if($_GET['a6']<>'')
			{
				$xx1=mysql_query("select * from `real-list` where list_type='".$_GET['a1']."' and list_property='".$_GET['a2']."' and list_bedroom='".$_GET['a6']."'");
			}
			
		}
		if($_GET['id']){
			$xx1=$list->refid($_GET['id']);
			$i=1;
	   }else if($_GET['aid']){
	   		$xx1=$list->areaid($_GET['aid']);
			$i=1;
	   }
	  if($num=mysql_num_rows($xx1)==''){?>
	  <div>not available</div> 
	   <? }else{
	 while($xx=mysql_fetch_array($xx1)){?>
	 
<div>
<div style="vertical-align:top; float:left; width:100px;">
		<a href="map.php"><? print $prop->property2($xx['list_property'])." for ".$req->req1($xx['list_type'])."<br>".$xx['list_project']."<br>".$xx['list_addr'].","?></a>
		<? print $c->location2($xx['list_location']).",<br>".$c->location12($xx['list_city'])?>
	</div>
		<div style="vertical-align:top; float:left; width:100px">Area <?=$xx['list_area']?>Sq.Ft<br /><?=$xx['list_bedroom']?>Bedrooms</div>
		<div style="vertical-align:top; float:left; width:100px">Rs.<?=$xx['list_price']?><br><? if($xx['list_pricing']=='yes'){ echo "Negotiable";}else{ echo "Not Negotiable";}?></div>
			<div style="vertical-align:top; width:200px; float: left">
		Real Id:<?=$xx['list_gid']."<br> Posted on".$xx['list_date']?>
			<br /><br />
			<? $reg1=$reg->reg11($xx['r_id']);
				echo $reg1['r_name']."<br>". $reg1['r_cname']."<br>".$reg1['r_ph1'];
			?>
		</div>
		<div style="height:40px">&nbsp;</div>
</div> 
  <div class="menutitle" onClick="SwitchMenu('sub<?=$i?>')">
		  <div align="right">Send Email</div>
  </div>
	 
<div style="width:400px; margin-left:50px">
	<span class="submenu" id="sub<?=$i?>">
		<form method="post">
		<input type="hidden" name="un" value="<?=$xx['r_id']?>" />
		
		<div style="float:left; width:100px">Name : <input name="name" type="text" style="width:100px"/></div>
			<div style="float:left; width:100px"">Email : <input name="email" type="text" style="width:100px" /></div>
			<div style="float:left; width:100px"">Phone : <input name="phone" type="text" style="width:100px" /></div>
		<div class="menutitle" onClick="SwitchMenu('sub<?=$i?>')" style="width:50px; margin-left:300px;">close
		
</div>
		
		<div style="width:300px; float:left">
		<textarea name="desc" readonly="readonly" rows="2" cols="40">I am interested in your property, Please contact me on the above mentioned contact details.</textarea>
		</div><div><input type="submit" name="submit" value="send" /></div>
		</form>
  </span>
</div>

<? $i++; }}?>
</div>
<div style="height:165px">&nbsp;</div>

</body>
</html>