<? session_start();
include "class/class.php";
include "dbcon.php";
$list= new real_list();
$b= new real_req();
$c= new real_location();
$reg= new real_reg();
$req=new req();
$prop=new real_property();
if($_GET['id']){
	$xx1=$list->refid($_GET['id']);
	$i=1;
}else if($_GET['aid']){
	$xx1=$list->areaid($_GET['aid']);
	$i=1;
}

$xx=mysql_fetch_array($xx1);
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
<div style="width:980px; background-color:#FFFFFF" > 

<div><? include "header.php"?></div>
<div style="background-color:#FFFFFF">&nbsp;</div>
<div align="center" class="menutitle">
		<? if($xx['list_city']==''){ $known= "Un Known";}else{ $known=$xx['list_city'];}?>
		<span class="style8">Location:</span><?=$known?>
	</div>
<div align="left">
 
 
  <div style="width:25%; padding-left:15px; float:left;"><? include "leftlocation.php"?></div>
  
  
  
  
<div style="width:500px; margin-left:270px;" align="left" class="innertab" >
<div>
<div style="float:left; padding-left:15px; width:100px" class="style3">Details</div>
<div style="width:301px; padding-left:10px; margin-left:180px" class="style3">Map  </div>
</div>
<?   if($num=mysql_num_rows($xx1)==''){?>
	  <div class="tabcolor">
	  	<div  align="center">No Listings Found with given Refrence Id <?=$_GET['id']?></div>
	  </div>
	  <span class="innertab" style="width:700px; margin-left:270px;">
	  <? }else{?>
	  </span>
	  <div class="tabcolor">
	  
<!--left side code start-->
<table width="35%" align="left" cellpadding="0" cellspacing="0">
		<tr><td><strong>Location</strong></td>
		</tr>
		<tr><td class="trpad tabcolor">
		<? print $prop->property2($xx['list_property'])." for ".$req->req1($xx['list_type'])." in ".$xx['list_location']."<br>".$xx['list_city']?>
		<? //print $c->location2($xx['list_location'])."<br>".$c->location12($xx['list_city'])?>
		</td></tr>
		<tr><td><strong>Specification</strong></td>
		</tr>
		<tr><td class="trpad tabcolor" valign="top">Area <?=$xx['list_area']?>Sq.Ft<br /><?=$xx['list_bedroom']?>Bedrooms</td></tr>
		<tr><td><strong>Price</strong></td>
		</tr>
		<tr><td class="trpad tabcolor" valign="top">Rs.<?=$xx['list_price']?><br><? if($xx['list_pricing']=='yes'){ echo "Negotiable";}else{ echo "Not Negotiable";}?></td></tr>
		<tr><td><strong>Contact</strong></td>
		</tr>
		<tr><td class="trpad tabcolor" valign="top">Real Id:<?=$xx['list_gid']."<br> Posted on: ".$xx['list_date']?></td></tr>
		<tr>
		  <td class="tabcolor" align="right">
			<a href="mail.php?id=<?=$_GET['id']?>&loc=result.php" class="b" onclick="NewWindow(this.href,'name','500','300','yes');return false">Send Email</a>		</td>
		</tr>
		</table>
 
 <!--left side code end-->
 
<div style="width:301px; margin-left:195px" class="style3">
<!--map starts-->
<div id="map" style="width: 300px; height: 300px"></div>
			<script type="text/javascript">
     if (GBrowserIsCompatible()) {
       var gmarkers = [];
			      var htmls = [];
			      var to_htmls = [];
			      var from_htmls = [];
			      var i=0;
			      // A function to create the marker and set up the event window
			      function createMarker(point,name,html) {
				  var marker = new GMarker(point);
		        	// The info window version with the "to here" form open
				to_htmls[i] = html + '<br>Directions: <b>To here<\/b> - <a  href="javascript:fromhere(' + i + ')">From here<\/a>' +
           '<br>Start address:<form action="http://maps.google.com/maps" method="get" target="_blank">' +
           '<input type="text" SIZE=40 MAXLENGTH=40 name="saddr" id="saddr" value="" /><br>' +
           '<INPUT value="Get Directions" TYPE="SUBMIT">' +
           '<input type="hidden" name="daddr" value="' + point.lat() + ',' + point.lng() + 
                  // "(" + name + ")" + 
           '"/>';
        // The info window version with the "to here" form open
        from_htmls[i] = html + '<br>Directions: <a class="d" href="javascript:tohere(' + i + ')">To here<\/a> - <b>From here<\/b>' +
           '<br>End address:<form action="http://maps.google.com/maps" method="get"" target="_blank">' +
           '<input type="text" SIZE=40 MAXLENGTH=40 name="daddr" id="daddr" value="" /><br>' +
           '<INPUT value="Get Directions" TYPE="SUBMIT">' +
           '<input type="hidden" name="saddr" value="' + point.lat() + ',' + point.lng() +
                  // "(" + name + ")" + 
           '"/>';
        // The inactive version of the direction info
        html = html + '<br>Directions: <a class="b" href="javascript:tohere('+i+')">To here<\/a> - <a class="b"  href="javascript:fromhere('+i+')">From here<\/a>';

        GEvent.addListener(marker, "click", function() {
          marker.openInfoWindowHtml(html);
        });
        gmarkers[i] = marker;
        htmls[i] = html;
        i++;
        return marker;
      }

      // functions that open the directions forms
      function tohere(i) {
        gmarkers[i].openInfoWindowHtml(to_htmls[i]);
      }
      function fromhere(i) {
        gmarkers[i].openInfoWindowHtml(from_htmls[i]);
      }
      var map = new GMap2(document.getElementById("map"));
      map.addControl(new GLargeMapControl());
      map.addControl(new GMapTypeControl());
      //map.setCenter(new GLatLng(16.945181,82.238647),14);
	  
 var point = new GLatLng(<?=$xx['list_lat']?>,<?=$xx['list_lng']?>);
	  map.setCenter(point, 17);
	 var marker = createMarker(point,'','<? print $prop->property2($xx['list_property'])." for ".$req->req1($xx['list_type'])." in ".$xx['list_location'].",".$xx['list_city']."<br> Area".$xx['list_area']."Sq.Ft with".$xx['list_bedroom']."Bedrooms"."<br>Rs."?><? if($xx['list_pricing']=='yes'){ echo " Negotiable";}else{ echo " Not Negotiable";}?>')
      map.addOverlay(marker);
 }  else {
      alert("Sorry, the Google Maps API is not compatible with this browser");
    }
    </script>
	
		
<? $i++; }?>


</div>

<!--map endss-->
  </div>
</div>


</div>

<div style="width:980px; padding-top:50px; background-color:#FFFFFF" ><? include "footer.php"?></div>
</div>
</div>
</body>
</html>
