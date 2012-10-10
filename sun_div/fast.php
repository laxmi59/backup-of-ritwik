<? session_start();
if($_SESSION['un']==''){	echo "<script>location.replace('index.php')</script>";}
include "dbcon.php";
include "class/class.php";
$x=new real_property();
$y=new real_location();
$real_reg=new real_reg();
$loc=new real_location();
$uid=$_SESSION['uid'];
//echo $uid;
$z=new valid();
if($_POST['submit'])
{
//print_r($_POST);
	extract($_POST);
	//validations
	/*$list_type_valid		=$z->ischoose($_POST['list_type'],"choose one from Transcation Type! It should not be Empty");
    $list_property_valid	    =$z->ischoose($_POST['list_property'],"choose one from property type! It should not be Empty");
     $list_project_valid 	=$z->notempty($_POST['list_project'],"Project/Society name Should not be Empty");
$list_city_valid		=$z->ischoose($_POST['list_city'],"choose one from City! It should not be Empty");
$list_loc_valid		=$z->ischoose($_POST['list_loc'],"choose one from Property Address! It should not be Empty");

 $list_area_valid 	=$z->notempty($_POST['list_area'],"Area Should not be Empty");
 $list_area_valid1	=$z->isnumaric($_POST['list_area'],"Enter only numbers in Area");	
  $list_price_valid 	=$z->notempty($_POST['list_price'],"Price Should not be Empty");
$list_price_valid1	=$z->isnumaric($_POST['list_price'],"Enter only numbers in Price");	

$list_pricing_valid		=$z->validgender($_POST['list_pricing']," Is the price negotiable ?");
$list_bedroom_valid		=$z->ischoose($_POST['list_bedroom'],"choose one from Bedroom! It should not be Empty");
$list_floor_no_valid		=$z->ischoose($_POST['list_floor_no'],"choose one from Floor number! It should not be Empty");
$list_floors_valid		=$z->ischoose($_POST['list_floors'],"choose one from Total Floors! It should not be Empty");
$list_age_valid		=$z->ischoose($_POST['list_age'],"choose one from Age of construction! It should not be Empty");
$list_items_valid		=$z->ischoose($_POST['list_items'],"choose one from Furnished! It should not be Empty");
$list_face_valid		=$z->ischoose($_POST['list_face'],"choose one from Facing! It should not be Empty");
$list_own_valid		=$z->ischoose($_POST['list_own'],"choose one from Ownership type! It should not be Empty");
*/

if($list_type_valid == '' && $list_property_valid == '' && $list_project_valid == '' && $list_city_valid == '' && $list_loc_valid == '' && $list_area_valid	== '' && $list_area_valid1 == '' && $list_price_valid == '' && $list_price_valid1 == '' && $list_pricing_valid =='' && $list_bedroom_valid == '' && $list_floor_no_valid == '' && $list_floors_valid == '' && $list_age_valid == '' && $list_items_valid == '' && $list_face_valid == ''&& $list_own_valid == '')
{



//start
$abc="LS".$_POST['abc'];
	//echo $abc;
	if($_POST['list_features'] <>''){
	if (!is_array($_POST['list_features']) || sizeof($_POST['list_features']) < 1) {
    	}
       foreach ($_POST['list_features'] as $list_features) {
	   	$arr[] = $list_features;
	   }
		$flr  =  implode("," ,$arr);
		}else{ $flr='';}
	if($_POST['main1']==0||$_POST['main2']==0){
		$lat=16.9695443;
		$long=82.2369371;
	}else{
		$lat=$main1;
		$long=$main2;
	}
	

	if (($_FILES["list_photo"]["type"] == "image/gif")
|| ($_FILES["list_photo"]["type"] == "image/jpeg")
|| ($_FILES["list_photo"]["type"] == "image/pjpeg"))
{
 if (file_exists("admin/uploaded_images/" . $_FILES["list_photo"]["name"]))
      {
      echo $_FILES["list_photo"]["name"] . "Photo name already exists. please change it. ";
      }
    else
      {
	  
      move_uploaded_file($_FILES["list_photo"]["tmp_name"],"admin/uploaded_images/" . $_FILES["list_photo"]["name"]);
      $photo=$_FILES["list_photo"]["name"]; 
}

}		
		$insert=mysql_query("insert into `real-list` values(`list_id`, '$r_id','user', '".$abc."', '$list_type', '$list_property', '$list_project', '$list_country', '$list_city', '$list_loc', '$lat', '$long', '$list_area', '$list_price', '$list_pricing', '$list_bedroom', '$list_floor_no', '$list_floors', '$list_age', '$list_items', '$list_face', '$list_own', '$flr', '$list_desc', now(),'n','$photo')");
	//echo "insert into `real-list` values(`list_id`, '$r_id', '".$abc."', '$list_type', '$list_property', '$list_project', '$list_country', '$list_city', '$list_loc', '$main1', '$main2', '$list_area', '$list_price', '$list_pricing', '$list_bedroom', '$list_floor_no', '$list_floors', '$list_age', '$list_items', '$list_face', '$list_own', '$flr', '$list_desc', now(),'n'";
	echo "<script>location.replace('confirm.php')</script>";
	
	//end






}


}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$title?></title>
<style type="text/css">
<!--
span.style11{
color: red;
font-size: 11px;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-weight: normal;
}

-->
</style>
</head>
 <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=ABQIAAAAAQGCqv0G3MkywFdNLX401BS3hzBAhS_pUz7NmsHRqwe4NVj14RRehSxM2ZkbrGUrFuhg65K12AL-ag" type="text/javascript"></script>
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
	//alert(document.pgenerate.list_loc.value);
	//document.pgenerate.list_loc1.value=document.pgenerate.list_loc.value;
	var ad1=document.pgenerate.list_loc.value;
	var ad2=document.pgenerate.list_city.value;
	var ad3=document.pgenerate.list_country.value;
	//alert(ad2);
	var addr=ad1+","+ad2+","+ad3;
	showAddress(addr);
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
	//alert('a');
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
<form method="post" name="pgenerate"  action="listsave.php" enctype="multipart/form-data" onsubmit="return validateForm1(this)">

<div align="center">
	<div style="width:980px" class="tabcolor">
					<div><? include "header.php"?></div>
					<div><p>&nbsp;</p></div>
					
		<div align="left">
			<div style="width:60%; padding-left:60px">
				<div>
					<div  class="innertab">
							<div class="style3"> List  Your Property</div>
							<div class="linebreak">&nbsp;</div>
						<div class="tabcolor">
							<div  style="float:left; width:35%" class="style4 trpad">Transaction Type</div>
							<div>: <select name="list_type" style="width:150px">
							
							<? if($_POST['list_type']==''){?>
				            <option value="">select</option>
				            <option value="1">Rent</option>
							<option value="3">Sell</option>
				<? }else{
				        if($_POST['list_type']=='1')
						{?>
						<option value="<?=$_POST['list_type']?>" selected="selected">Rent</option>
						<option value="3">Sell</option>
						<? }
					    else { ?>
						<option value="1">Rent</option>
				<option value="<?=$_POST['list_type']?>" selected="selected">Sell</option>
				
				<?         } }?>
							
							
							</select>
							<input type="hidden" name="abc" id="abc">
							<input type="hidden" name="r_id" id="r_id" value="<?=$uid?>" />		
							<span class="style11">
			    <?=$list_type_valid?>
		      </span></div>
							<div class="linebreak">&nbsp;</div>
						</div>
	
							
						<div class="tabcolor">
							<div style="float:left;width:35%" class="style4 trpad">Property Type </div>
							<div>: <select name="list_property" id="list_property" onChange="abc1()" style="width:150px;" >
						 	<option value="">select</option>
							 <?
							 //$i=1;
							 for($i=1;$i<3;$i++){
							 $xx=$x->property($i);?>
							 <optgroup label="<?=$xx['pname']?>" style="background:#EBEBEB"></optgroup>
							 <? 
							 $j=$x->property1($i);
							 while($xxx=mysql_fetch_array($j)){
							  if($_POST['list_property']==$xxx['pid']){
				?>
				<option value="<?=$xxx['pid']?>" id="<?=$xxx['ptype']?>" selected="selected"><?=$xxx['pname']?></option>
				<? }
				else
				{ ?>
				<option value="<?=$xxx['pid']?>" id="<?=$xxx['ptype']?>"><?=$xxx['pname']?></option>
				
				<? } }}?>
				</select>
			
								<span class="style11">
			    <?=$list_property_valid?>
		      </span>	
							</div>
							<div class="linebreak">&nbsp;</div>
						</div>
							
						<div class="tabcolor">
							<div style="float:left;width:35%" class="style4 trpad">Project/Society Name </div>
							<div>: <input name="list_project" type="text" value="<?= $_POST['list_project'] ?>" /><span class="style11">
			    <?=$list_project_valid?>
		      </span>	
							</div>
							<div class="linebreak">&nbsp;</div>
						</div>
														
						<div class="tabcolor">
							<div style="float:left;width:35%" class="style4 trpad">Country </div>
							<div>: <input name="list_country" type="text"  readonly="" value="India" style="border:none">
							</div>
							<div class="linebreak">&nbsp;</div>
						</div>
	
							
						<div class="tabcolor">
							<div style="float:left;width:35%" class="style4 trpad">City</div>
							<div>: <select name="list_city" style="width:160px">
							<option value="">Select City</option>
							<? $loc1=$loc->location122();
							while($loc2=mysql_fetch_array($loc1)){
							 if($_POST['list_city']==$loc2['city_name']){
				?>
				<option value="<?=$loc2['city_name']?>" selected="selected"><?=$loc2['city_name']?></option>
				<? }
				else
				{ ?>
				<option value="<?=$loc2['city_name']?>" ><?=$loc2['city_name']?></option>
				
				<? } }?>
				</select><span class="style11"><?= $list_city_valid ?></span>	
						</div>
							<div class="linebreak">&nbsp;</div>
						</div>
		
	
							
						<div class="tabcolor">
							<div style="float:left;width:35%" class="style4 trpad">Property Address </div>
							<div>: <?
							$loc->setfield('cid');
							$area=$loc->areas(1);
							?>
							<select name="list_loc" onchange="lat_lng();">
							<option value="">Select Area</option>
							<? 
							while($cc=mysql_fetch_array($area)){
							
							 if($_POST['list_loc']==$cc['name']){
				?>
				<option value="<?=$cc['name']?>" selected="selected"><?=$cc['name']?></option>
				<? }
				else
				{ ?>
				<option value="<?=$cc['name']?>" ><?=$cc['name']?></option>
				
				<? } }?></select>	<span class="style11"><?= $list_loc_valid ?></span>
							<!--<input type="text" name="list_loc" onKeyUp="return lat_lng();" />-->
							<!--<input type="hidden" name="list_loc1" />-->
							<input name="main1" type="hidden"><input name="main2" type="hidden"><div id="map" style="width: 500px; height: 400px; display:none;">			</div>	<div class="linebreak">&nbsp;</div>
						</div>	
	
							
						<div class="tabcolor">
							<div style="float:left;width:35%" class="style4 trpad">Area(As in Property Document) </div>
							<div>: <input name="list_area" type="text" value="<?=$_POST['list_area']?>" /> 	Sq.ft
							<span class="style11"><?=$list_area_valid?><?=$list_area_valid1?></span></div>
					<div class="linebreak">&nbsp;</div>	</div>
							
						<div class="tabcolor">
							<div style="float:left;width:35%" class="style4 trpad">Total Price (Aproximatly) </div>
							<div>: <input name="list_price" type="text" value="<?=$_POST['list_price']?>">
						<span class="style11"><?=$list_price_valid?><?=$list_price_valid1?></span>	</div>
					<div class="linebreak">&nbsp;</div>	</div>
							
						<div class="tabcolor">
							<div style="float:left;width:35%" class="style4 trpad">Is the price negotiable ?</div>
							<div>:
							
						<?	//echo $list_pricing;
						if($_POST['list_pricing']=="yes"){
							?>
							<input type="radio" name="list_pricing" id="list_pricing" checked="checked" value="yes">  Yes
							<input type="radio" name="list_pricing" id="list_pricing" value="No">  No		
							<? } else if($_POST['list_pricing']=="No") { ?>
							<input type="radio" name="list_pricing" id="list_pricing" value="yes">  Yes
							<input type="radio" name="list_pricing" id="list_pricing" checked="checked" value="No">  No		
							<? } else { ?>
							<input type="radio" name="list_pricing" id="list_pricing" value="yes">  Yes
							<input type="radio" name="list_pricing" id="list_pricing" value="No">  No	
							<? } ?>
							
						<span class="style11"><?=$list_pricing_valid?></span>	
							
							</div><div class="linebreak">&nbsp;</div>
						</div>
							</div>
						<div class="tabcolor">
							<div style="float:left;width:35%" class="style4 trpad">Bedrooms</div>
							<div>: <select name="list_bedroom" id="list_bedroom" style="width:150px">
					<?
					if($_POST['list_bedroom']!='')
					{ ?>
					<option value="<?=$_POST['list_bedroom']?>" selected="selected"><?=$_POST['list_bedroom']?></option>
					<?
					}					 
					?>
					
					
							<option value="">select</option>
							<? for($i=1;$i<10;$i++){?>
								<option value="<?=$i?>"><?=$i?></option>
							<? }?>
							</select>	<span class="style11"><?=$list_bedroom_valid?></span>	
							</div><div class="linebreak">&nbsp;</div>
						</div>		
	
							
						<div class="tabcolor">
							<div style="float:left;width:35%" class="style4 trpad">Floor Number<span id="floor_star"></span></div>
							<div>: <select name="list_floor_no" style="width:150" onchange="constuct()">
							
							<?php
								switch ($_POST['list_floor_no'])
										{
									case 11: 
									?><option value="11" selected="selected">Under Construction</option><?	
									      break;
									case 12:?>
 									     <option value="12" selected="selected">Basement</option>
 									<?
										  break;
									case 13:
									    ?>
 									    <option value="13" selected="selected">Ground Floor</option>
 									<?
										  break;
									case 14:
									     ?>
 									    <option value="14" selected="selected">Mezzanine Floor</option>
 									<?
										  break;
									default:
									         if($_POST['list_floor_no']!=''){
									 ?>
 									     <option value="<?= $_POST['list_floor_no']?>"><?=$_POST['list_floor_no']?></option>
 									<? }else{ ?>
									
									<option value="">select</option>
									
							<?		}
								}
						?>						
							<option value="11">Under Construction</option>
							<option value="12">Basement</option>
							<option value="13">Ground Floor</option>
							<option value="14">Mezzanine Floor</option>
							<? for($i=1;$i<10;$i++){?>
							<option value="<?=$i?>">
							<?=$i?>
							</option>
							<? }?>
							</select>	<span class="style11"><?=$list_floor_no_valid?></span>
							</div><div class="linebreak">&nbsp;</div>
						</div>	
	
							
						<div class="tabcolor">
							<div style="float:left;width:35%" class="style4 trpad">Total Floors in Building </div>
							<div>: <select name="list_floors" style="width:150">
							
						<?	 if($_POST['list_floors']!=''){
									 ?>
 									     <option value="<?= $_POST['list_floors']?>"><?=$_POST['list_floors']?></option>
 									<? }else{ ?>
									
									<option value="">select</option>
									
							<?		} ?>
											
							<? for($i=1;$i<10;$i++){?>
							<option value="<?=$i?>">
							<?=$i?>
							</option>
							<? }?>
							</select>		<span class="style11"><?=$list_floors_valid?></span>
							</div><div class="linebreak">&nbsp;</div>
						</div>
							
						<div class="tabcolor">
							<div style="float:left;width:35%" class="style4 trpad">Age of Contruction </div>
							<div>: <select name="list_age" style="width:150">
							<option value="">select</option>
							<?
						$value=array("1","2","5","10");
						$text=array("under contruction","0-2 years old","2-5years old","5-10years old");
							for($i=0;$i<sizeof($value);$i++)
								{
							       if($_POST['list_age']==$value[$i])
								   { ?>
								   <option value="<?=$value[$i]?>" selected="selected"><?=$text[$i]?></option>
								   <? } else { ?>
								     <option value="<?=$value[$i]?>"><?=$text[$i]?></option>
								   
								   <? }
							}
							?>
					
							</select><span class="style11"><?=$list_age_valid?></span>
							</div><div class="linebreak">&nbsp;</div>
						</div>		
	
							
						<div class="tabcolor">
							<div style="float:left;width:35%" class="style4 trpad">Furnished</div>
							<div>: <select name="list_items" style="width:150">
							<option value="">select</option>
							<?
						$value=array("furnished","semi","not");
						$text=array("Furnished","Semi-Furnished","Un-furnished");
							for($i=0;$i<sizeof($value);$i++)
								{
							       if($_POST['list_items']==$value[$i])
								   { ?>
								   <option value="<?=$value[$i]?>" selected="selected"><?=$text[$i]?></option>
								   <? } else { ?>
								     <option value="<?=$value[$i]?>"><?=$text[$i]?></option>
								   
								   <? }
							}
							?>
							<!--<option value="furnished">Furnished</option>
							<option value="semi">Semi-Furnished</option>
							<option value="not">Un-furnished</option>-->
							</select> <span class="style11"><?=$list_items_valid?></span>
							</div><div class="linebreak">&nbsp;</div>
						</div>		
							
						<div class="tabcolor">
							<div style="float:left;width:35%" class="style4 trpad">Facing</div>
							<div>: <select name="list_face" style="width:150"> 
							<option value="">Select</option>
							<?
						$text=array("East","North East","North","North West","West","South West","South","South East");
							for($i=0;$i<sizeof($text);$i++)
								{
							       if($_POST['list_face']==$text[$i])
								   { ?>
								   <option value="<?=$text[$i]?>" selected="selected"><?=$text[$i]?></option>
								   <? } else { ?>
								     <option value="<?=$text[$i]?>"><?=$text[$i]?></option>
								   
								   <? }
							}
							?>
							
							</select><span class="style11"><?=$list_face_valid?></span>		
							</div><div class="linebreak">&nbsp;</div>
						</div>
							
						<div class="tabcolor">
							<div style="float:left;width:35%" class="style4 trpad">Ownership Type</div>
							<div>: <select name="list_own" style="width:150">
							<option value="">select</option>
					<?
						$value=array("1","2","3","4");
						$text=array("Freehold","Leasehold","Power of Attorney","Co-Operative Society");
							for($i=0;$i<sizeof($value);$i++)
								{
							       if($_POST['list_own']==$value[$i])
								   { ?>
								   <option value="<?=$value[$i]?>" selected="selected"><?=$text[$i]?></option>
								   <? } else { ?>
								     <option value="<?=$value[$i]?>"><?=$text[$i]?></option>
								   
								   <? }
							}
							?>		
							
							
							<!--<option value="1">Freehold</option>
							<option value="2">Leasehold</option>
							<option value="3">Power of Attorney</option>
							<option value="4">Co-Operative Society</option>-->
							</select>	<span class="style11"><?=$list_own_valid?></span>		
							</div>
							<div class="linebreak">&nbsp;</div>
						</div>
						<div class="tabcolor">
							<div style="float:left;width:35%" class="style4 trpad">Photo</div>
							<div>: <input type="file" name="list_photo" id="list_photo" />
							</div><div class="linebreak">&nbsp;</div>
						</div>
							
							<div class="innertab">
							<div class="style3">Additional Features:</div></div>
							<div class="linebreak">&nbsp;</div>
						<div class="tabcolor">
							<div class="style4 trpad">
							<input name="list_features[]" type="checkbox" value="1">
							<input name="text" type="text" class="trpad" style="border:none" value="Power Backup" size="18" readonly="" />
							<input name="list_features[]" type="checkbox" value="2">
							<input class="trpad" type="text" style="border:none" value="Lift" size="18" readonly="" >
							<input name="list_features[]" type="checkbox" value="3">
							<input type="text" class="trpad" style="border:none" value="Rain Water Harvesting" size="20" readonly="">
							<br>
							<input name="list_features[]" type="checkbox" value="4">
							<input type="text" class="trpad" style="border:none" value="Club" size="18" readonly="">
							<input name="list_features[]" type="checkbox" value="5">
							<input type="text"  class="trpad"style="border:none" value="Swimming Pool" size="18" readonly="">
							<input name="list_features[]" type="checkbox" value="6">
							<input type="text" class="trpad" style="border:none" value="Security" size="18" readonly="">
							<br>
							<input name="list_features[]" type="checkbox" value="7">
							<input type="text" class="trpad" style="border:none" value="Reserved Parking" size="18" readonly="">
							<input name="list_features[]" type="checkbox" value="8">
							<input type="text"  class="trpad"style="border:none" value="Gym" size="18" readonly="">
							<input name="list_features[]" type="checkbox" value="9">
							<input type="text" class="trpad" style="border:none" value="Servant Quarters" size="18" readonly="">
							<br>
							<input name="list_features[]" type="checkbox" value="10">
							<input type="text"  class="trpad"style="border:none" value="Park" size="18" readonly="">
							<input name="list_features[]" type="checkbox" value="11">
							<input type="text" class="trpad" style="border:none" value="Vaastu Compliant" size="18" readonly="">		
							<div class="linebreak">&nbsp;</div>
						</div>
						
						<div class="tabcolor">
							<div class="style4 trpad">Property Description&nbsp;(Max 200 Characters)<strong><br>(&nbsp;Most property buyers like to have a detail description of the property before contacting.&nbsp;)</strong></div>
							<div class="linebreak">&nbsp;</div>
						<div class="tabcolor">
							<div style="margin-left:25px"><textarea name="list_desc" cols="50" rows="4"></textarea></div>
							<div class="linebreak">&nbsp;</div>
						</div>
						<div class="tabcolor">
							<div align="center"><input type="submit" name="submit" value="submit" onClick="populateform(5)" /></div>
							<div class="linebreak">&nbsp;</div>
						</div>
					</div>
				</div>
				
		</div>
</div>
	
		</div>
		</div>


<div>&nbsp;</div>
<div><? include "footer.php"?></div>
</div></div>
</form>

</body>
</html>