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

function NewWindow(mypage,myname,w,h,scroll){
LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
settings =
'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
win = window.open(mypage,myname,settings)
}
</script>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=ABQIAAAAR_F-TPVKyKZtTeE2JqDOyxS3hzBAhS_pUz7NmsHRqwe4NVj14RSbpRmU2tDKJb3sLT886GQoPmiokA" type="text/javascript"></script>

  </script>
</head>
<body onload="initialize()" onunload="GUnload()">
<div align="center">
<div style="width:980px;background-color:#FFFFFF" >
<div><? include "header.php"?></div>
<div align="center"   style="background-color:#FFFFFF"  ><span class="menutitle">Location:<?=$_GET['a3']?></span></div>
<div   style="background-color:#FFFFFF" >
<div style="float:left; width:200px; padding-left:15px; height:200px"><? include "leftlocation.php"?></div>

  
  
<div style="width:700px; margin-left:270px;" align="left" class="innertab">
<div>
<div style="float:left; padding-left:15px; width:180px" class="style3">Details</div>
<div style="width:490px; padding-left:10px; margin-left:190px" class="style3">Map  </div>
</div>

<? 
	require_once("pagination.php");
$q_limit = 3;
$errMsg = 0;
if( isset($_GET['start']) )
{
	$start = $_GET['start'];
}
else
{
	$start = 0;
}
		if($_GET['a1']<>'' && $_GET['a2']<>'')
		{
			if($_GET['a3']<>'')
			{
				$xx1=mysql_query("select * from `real-list` where list_type='".$_GET['a1']."' and list_property='".$_GET['a2']."' and list_city='".$_GET['a3']."' and `list_status`='a' order by `list_id` desc");
				$x=mysql_query("select * from `real-list` where list_type='".$_GET['a1']."' and list_property='".$_GET['a2']."' and list_city='".$_GET['a3']."' and `list_status`='a' order by `list_id` desc LIMIT $start, $q_limit");
				$filePath = "result_all.php?cid=".$_GET['cid']."&";
				//echo "select * from `real-list` where list_type='".$_GET['a1']."' and list_property='".$_GET['a2']."' and list_city='".$_GET['a3']."'";
			}
			if($_GET['a6']<>'')
			{
				$xx1=mysql_query("select * from `real-list` where list_type='".$_GET['a1']."' and list_property='".$_GET['a2']."' and list_bedroom='".$_GET['a6']."' and `list_status`='a' order by `list_id` desc");
				$x=mysql_query("select * from `real-list` where list_type='".$_GET['a1']."' and list_property='".$_GET['a2']."' and list_bedroom='".$_GET['a6']."' and `list_status`='a' order by `list_id` desc LIMIT $start, $q_limit");
				$filePath = "result_all.php?cid=".$_GET['cid']."&";
			}
			
		}
		$num=mysql_num_rows($xx1);
		?>
		
	 <? if($num==''){?>
	  <div align="center"  class="tabcolor">not available</div></div>	
	  <div style="height:288px" class="tabcolor">&nbsp;</div>
    
	 <? }else{?>
	
	
<div class="tabcolor">
<div style="float:left; padding-left:5px; width:200px" class="style3">
 <div class="tabcolor" align="left">
	 			
			<? while($xx=mysql_fetch_array($x)){?>
		<div class="style4">
		<a class="b" href="result.php?id=<?=$xx['list_gid']?>"><? print $prop->property2($xx['list_property'])." for ".$req->req1($xx['list_type'])." in ".$xx['list_location']?></a><br /><?=$xx['list_city']?>
		<? //print $c->location2($xx['list_location'])."<br>".$c->location12($xx['list_city'])?>
		<b> Area</b> <?=$xx['list_area']?>Sq.Ft<br /><?=$xx['list_bedroom']?>Bedrooms<strong> Price</strong>Rs.<? if($xx['list_pricing']=='yes'){ echo "Negotiable";}else{ echo "Not Negotiable";}?>
			<b> Ref Id:</b><?=$xx['list_gid']."<br> Posted on: ".$xx['list_date']?>
		</div>
		<div class="tabcolor" align="right"  style="border-bottom:1px solid;">
			<a href="mail.php?id=<?=$xx['list_gid']?>" class="b" onclick="NewWindow(this.href,'name','500','300','yes');return false">Send Email</a>	</div>
		<? $i++; }?>
		<div align="center"><? paginate($start,$q_limit,$num,$filePath,"");?></div>
		
		  </div>
 </div>
<div style="width:490px; margin-left:205px" class="style3"><? include "map.php" ?>  </div>
<? }?>
</div>


</div>


<div style="width:980px; padding-top:50px; background-color:#FFFFFF"><? include "footer.php"?></div>

</div>
</div>
</body>
</html>
