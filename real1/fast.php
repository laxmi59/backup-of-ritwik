<? session_start();
include "dbcon.php";
include "class/class.php";
$x=new real_property();
$y=new real_location();
$real_reg=new real_reg();
$loc=new real_location();
$uid=$_SESSION['uid'];
//echo $uid;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$title?></title>
</head>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAR_F-TPVKyKZtTeE2JqDOyxSkub0_1-W_YbWegRUisOQT0mZrZxRsRlb-JuOnmG4ag_lNfo2hh7x1Mg" type="text/javascript"></script>
<script type="text/javascript" src="js/regjs.js"></script>
<script type="text/javascript" src="js/ruppees1.js"></script>
<script type="text/javascript">
var keylist="123456789"
var temp=''

function generatepass(plength){
//alert("bb");
temp=''
for (i=0;i<plength;i++)
temp+=keylist.charAt(Math.floor(Math.random()*keylist.length));
return temp;
}
function populateform(enterlength){
//alert("aa");
document.pgenerate.abc.value=generatepass(enterlength)
//alert(generatepass(enterlength))
}
var map = null;
var geocoder = null;
function load() 
{
	//alert('aa');
	if (GBrowserIsCompatible()) {
	map = new GMap2(document.getElementById("map"));
	geocoder = new GClientGeocoder();
	}
	
}
function lat_lng()
{
	//alert("Aa");
	var ad1=document.pgenerate.list_loc.value;
	var ad2=document.pgenerate.list_city.value;
	var ad3=document.pgenerate.list_country.value;
	//alert(ad2);
	showAddress(ad1,ad2,ad3);
}
function showAddress(address) 
{
//alert('aa');
	if (geocoder) {
	geocoder.getLatLng(address,
		function(point) {
		/*if (!point) {
alert(address + " not found");
} else {*/
//alert('aa');
var msg = "Latitude: "+point.lat()+"<br>"+"Longitude: "+point.lng();

document.pgenerate.main1.value=point.lat();
document.pgenerate.main2.value=point.lng();

//}
}
);
}
}
function constuct()
{
	var a=document.pgenerate.list_floor_no.value;
	if(a==11){
		document.pgenerate.list_age.disabled=true;
	}else{
	document.pgenerate.list_age.disabled=false;
	}
}
function abc1()
{
	alert('a');
	//var a=document.drop_list.req_property.value;
	var a=document.pgenerate.list_property.value ;
	if(a >= 9)
	{
		document.pgenerate.list_bedroom.disabled=true;
	}
	else
	{
		document.pgenerate.list_bedroom.disabled=false;
	}
}
</script>
<!--<script type="text/javascript" src="js/add_lat.js"></script>-->
<link href="css/style.css" rel="stylesheet" type="text/css" />

<body onLoad="load()" onUnload="GUnload()" >
<form method="post" name="pgenerate" onsubmit="return validateForm1(this)" action="listsave.php">
<table width="980" align="center" cellpadding="0" cellspacing="0" class="tabcolor">
<tr><td colspan="3"><? include "header.php"?></td></tr>
<tr><td colspan="3"><p>&nbsp;</p></td></tr>
<tr>
	<td width="6%">&nbsp;</td>
	<td width="59%">
	<table width="100%" align="center" class="innertab" cellpadding="0" cellspacing="0">
	<tr><td colspan="3" class="style3"> List  Your Property</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="style4 trpad">Transaction Type</td>
		<td>:</td>
		<td>
		<select name="list_type" style="width:150px">
		<option value="">select</option>
		<option value="1">Rent</option>
		<option value="3">Sell</option>
		</select>
		<input type="hidden" name="abc" id="abc">
		<input type="hidden" name="r_id" id="r_id" value="<?=$uid?>" />		</td>
	</tr>
	
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="style4 trpad">Property Type </td>
		<td>:</td>
		<td>
		<select name="list_property" id="list_property" onChange="abc1()" style="width:150px;" >
		<option value="">select</option>
		<?
		//$i=1;
		for($i=1;$i<3;$i++){
		$xx=$x->property($i);?>
		<optgroup label="<?=$xx['pname']?>" style="background:#EBEBEB"></optgroup>
		<? 
		$j=$x->property1($i);
		while($xxx=mysql_fetch_array($j)){?>
		<option value="<?=$xxx['pid']?>" id="<?=$xxx['ptype']?>"><?=$xxx['pname']?></option>
		<? }}?>
		</select>		</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="style4 trpad">Project/Society Name </td>
		<td>:</td>
		<td><input name="list_project" type="text" /></td>
	</tr>
	<!--<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="style4 trpad">Property Address </td>
		<td>:</td>
		<td><input name="list_addr" type="text"></td>
	</tr>-->
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="style4 trpad">Country </td>
		<td>:</td>
		<td><input name="list_country" type="text"  readonly="" value="India" style="border:none"></td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="style4 trpad">City</td>
		<td>:</td>
		<td>
		<select name="city" style="width:160px">
						<option>Select City</option>
						<? $loc1=$loc->location122();
						while($loc2=mysql_fetch_array($loc1)){?>
						<option value="<?=$loc2['city_name']?>"><?=$loc2['city_name']?></option>
						<? }?>
					</select>
		</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="style4 trpad">Property Address </td>
		<td>:</td>
		<td>
		<input type="text" name="list_loc" onKeyUp="return lat_lng();" />
		<input name="main1" type="hidden"><input name="main2" type="hidden"><div id="map" style="width: 500px; height: 400px; display:none;"></div>		</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="style4 trpad">Area(As in Property Document) </td>
		<td>:</td>
		<td><input name="list_area" type="text" /> 
		  Sq.ft</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="style4 trpad">Total Price (Aproximatly) </td>
		<td>:</td>
		<td><input name="list_price" type="text"></td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="style4 trpad">Is the price negotiable ?</td>
		<td>:</td>
		<td><input type="radio" name="list_pricing" id="radio" value="yes">  Yes
		<input type="radio" name="list_pricing" id="radio" value="No">  No		</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="style4 trpad">Bedrooms</td>
		<td>:</td>
		<td>
		<select name="list_bedroom" id="list_bedroom" style="width:150px">
		<option>select</option>
		<? for($i=1;$i<10;$i++){?>
		<option value="<?=$i?>"><?=$i?></option>
		<? }?>
		</select>		</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="style4 trpad">Floor Number<span id="floor_star"> </span></td>
		<td>:</td>
		<td><select name="list_floor_no" style="width:150" onchange="constuct()">
		<option>select</option>
		<option value="11">Under Construction</option>
		<option value="12">Basement</option>
		<option value="13">Ground Floor</option>
		<option value="14">Mezzanine Floor</option>
		<? for($i=1;$i<10;$i++){?>
		<option value="<?=$i?>">
		<?=$i?>
		</option>
		<? }?>
		</select>		</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="style4 trpad">Total Floors in Building </td>
		<td>:</td>
		<td><select name="list_floors" style="width:150">
		<option>select</option>
		<? for($i=1;$i<10;$i++){?>
		<option value="<?=$i?>">
		<?=$i?>
		</option>
		<? }?>
		</select>		</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="style4 trpad">Age of Contruction </td>
		<td>:</td>
		<td>
		<select name="list_age" style="width:150">
		<option>select</option>
		<option value="1">under contruction</option>
		<option value="2">0-2 years old</option>
		<option value="5">2-5years old</option>
		<option value="10">5-10years old</option>
		</select>		</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="style4 trpad">Furnished</td>
		<td>:</td>
		<td>
		<select name="list_items" style="width:150">
		<option>select</option>
		<option value="furnished">Furnished</option>
		<option value="semi">Semi-Furnished</option>
		<option value="not">Un-furnished</option>
		</select>		</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="style4 trpad">Facing</td>
		<td>:</td>
		<td><select name="list_face" style="width:150"> 
		<option value="">Select</option>
		<option value="East">East</option>
		<option value="North East">North East</option>
		<option value="North">North</option>
		<option value="North West">North West</option>
		<option value="West">West</option>
		<option value="South West">South West</option>
		<option value="South">South</option>
		<option value="South East">South East</option>
		</select>		</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="style4 trpad">Ownership Type</td>
		<td>:</td>
		<td>
		<select name="list_own" style="width:150">
		<option>select</option>
		<option value="1">Freehold</option>
		<option value="2">Leasehold</option>
		<option value="3">Power of Attorney</option>
		<option value="4">Co-Operative Society</option>
		</select>		</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr>
		<td colspan="3" class="style3">Additional Features:</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td colspan="3" class="style4 trpad">
		<input name="list_features[]" type="checkbox" value="1">
		<input class="style4 trpad" type="text" style="border:none" value="Power Backup" size="18" readonly="">
		<input name="list_features[]" type="checkbox" value="2">
		<input class="style4 trpad" type="text" style="border:none" value="Lift" size="18" readonly="" >
		<input name="list_features[]" type="checkbox" value="3">
		<input type="text" class="style4 trpad" style="border:none" value="Rain Water Harvesting" size="20" readonly="">
		<br>
		<input name="list_features[]" type="checkbox" value="4">
		<input type="text" class="style4 trpad" style="border:none" value="Club" size="18" readonly="">
		<input name="list_features[]" type="checkbox" value="5">
		<input type="text"  class="style4 trpad"style="border:none" value="Swimming Pool" size="18" readonly="">
		<input name="list_features[]" type="checkbox" value="6">
		<input type="text" class="style4 trpad" style="border:none" value="Security" size="18" readonly="">
		<br>
		<input name="list_features[]" type="checkbox" value="7">
		<input type="text" class="style4 trpad" style="border:none" value="Reserved Parking" size="18" readonly="">
		<input name="list_features[]" type="checkbox" value="8">
		<input type="text"  class="style4 trpad"style="border:none" value="Gym" size="18" readonly="">
		<input name="list_features[]" type="checkbox" value="9">
		<input type="text" class="style4 trpad" style="border:none" value="Servant Quarters" size="18" readonly="">
		<br>
		<input name="list_features[]" type="checkbox" value="10">
		<input type="text"  class="style4 trpad"style="border:none" value="Park" size="18" readonly="">
		<input name="list_features[]" type="checkbox" value="11">
		<input type="text" class="style4 trpad" style="border:none" value="Vaastu Compliant" size="18" readonly="">		</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td colspan="3" class="style4 trpad">Property Description&nbsp;(Max 200 Characters)<strong><br>(&nbsp;Most property buyers like to have a detail description of the property before contacting.&nbsp;)</strong></td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td colspan="3"><textarea name="list_desc" cols="50" rows="4"></textarea></td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td colspan="3" align="center"><input type="submit" name="submit" value="submit" onClick="populateform(5)" /></td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	</table>
	</td>
<td width="35%">&nbsp;</td>
</tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3"><? include "footer.php"?></td></tr>
</table>
</form>
</body>
</html>