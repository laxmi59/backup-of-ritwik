<? session_start();
if($_SESSION['aun']==''){	echo "<script>location.replace('index.php')</script>";}
include "../dbcon.php";
include "../class/class.php";
include "classobjects.php";
/*$list=new real_list();
$post=new real_req();
$loc=new real_location();
$reg=new real_reg();
$prop=new real_property();
$app=new real_approval();
$proj=new real_featured_proj();
$build=new real_featured_build();
*/
$aid=$_SESSION['aid'];
$select=mysql_fetch_array(mysql_query("select * from `real-list` where list_id='".$_GET['id']."'"));
if($_POST['submit'])
{
	extract($_POST);
	//print_r($_POST);
	//echo $_POST['abc'];
	echo $_GET['id'];
	//$abc="LS".$_POST['abc'];
	//echo $abc;
	if($_POST['list_features']<>''){
	if (!is_array($_POST['list_features']) || sizeof($_POST['list_features']) < 1) {
    	}
       foreach ($_POST['list_features'] as $list_features) {
	   	$arr[] = $list_features;
	   }
		$flr  =  implode("," ,$arr);
		}
		else{$flr  =  '';}
	$update=mysql_query("update `real-list` set `list_type`='$list_type', `list_property`='$list_property', `list_project`='$list_project', `list_city`='$cid', `list_location`='$aid', `list_area`='$list_area', `list_price`='$list_price', `list_pricing`='$list_pricing', `list_bedroom`='$list_bedroom', `list_floor_no`='$list_floor_no', `list_floors`='$list_floors', `list_age`='$list_age', `list_items`='$list_items', `list_face`='$list_face', `list_own`='$list_own', `list_features`='$flr', `list_desc`='$list_desc' where list_id=".$_GET['id']."");
	//echo "update `real-list` set `list_type`='$list_type', `list_property`='$list_property', `list_project`='$list_project', `list_city`='$cid', `list_location`='$aid', `list_area`='$list_area', `list_price`='$list_price', `list_pricing`='$list_pricing', `list_bedroom`='$list_bedroom', `list_floor_no`='$list_floor_no', `list_floors`='$list_floors', `list_age`='$list_age', `list_items`='$list_items', `list_face`='$list_face', `list_own`='$list_own', `list_features`='$flr', `list_desc`='$list_desc' where list_id=".$_GET['id']."";
	echo "<script>location.replace('confirm.php')</script>";
}
?>
<script type="text/javascript" src="js/ruppees1.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<form method="post" name="pgenerate">
<table width="95%" align="center" cellpadding="0" cellspacing="0" class="tabcolor">
<tr><td colspan="3"><? include "header.php"?></td></tr>
<tr><td colspan="3"><p>&nbsp;</p></td></tr>
<tr>
	<td width="25%" valign="top"><? include "left.php"?></td>
	<td width="3%">&nbsp;</td>
	<td valign="top">
	<table width="80%" align="center" cellpadding="0" cellspacing="0" class="innertab">
	<tr><td colspan="3" class="style3">Edit your Real ID:<?=$select['list_gid']?> </td></tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="style4 trpad">Transaction Type</td>
		<td>:</td>
		<td>
		<select name="list_type" style="width:150px">
		<option value="<?=$select['list_type']?>"><?=$req->req1($select['list_type'])?></option>
		<option value="1">Rent</option>
		<option value="3">Sell</option>
		</select>	
		</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="style4 trpad">Property Type </td>
		<td>:</td>
		<td>
		<select name="list_property" id="req_property" onChange="abc();" style="width:150px;" >
		<option value="<?=$select['list_property']?>"><?=$prop->property2($select['list_property'])?></option>
		<?
		//$i=1;
		for($i=1;$i<3;$i++){
		$xx=$prop->property($i);?>
		<optgroup label="<?=$xx['pname']?>" style="background:#EBEBEB"></optgroup>
		<? 
		$j=$prop->property1($i);
		while($xxx=mysql_fetch_array($j)){?>
		<option value="<?=$xxx['pid']?>" id="<?=$xxx['ptype']?>"><?=$xxx['pname']?></option>
		<? }}?>
		</select>	
		</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="style4 trpad">Project/Society Name </td>
		<td>:</td>
		<td><input name="list_project" type="text" value="<?=$select['list_project']?>"></td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<!--<tr class="tabcolor">
		<td class="style4 trpad">Property Address </td>
		<td>:</td>
		<td><input name="list_addr" type="text" value="<?=$select['list_addr']?>"></td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>-->
	<tr class="tabcolor">
		<td class="style4 trpad">City</td>
		<td>:</td>
		<td>
		<select name="cid" style="width:150px">
		<option value="kakinada">kakinada</option>
		</select>	
		</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="style4 trpad">Locality</td>
		<td>:</td>
		<td>
		<select name="aid"  style="width:150px">
		<!--<option value="<?=$select['list_aid']?>"><?=$loc->location2($select['list_location'])?></option>-->
		<option value="<?=$select['list_location']?>"><?=$select['list_location']?></option>
		<?
		$select1=mysql_query("select * from `real-area` where cid=1");
		while($row=mysql_fetch_array($select1)){?>
		<option value="<?=$row['name']?>"><?=$row['name']?></option>
		<? }?>
		</select>	
		</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="style4 trpad">Area(As in Property Document) </td>
		<td>:</td>
		<td><input name="list_area" type="text" value="<?=$select['list_area']?>"></td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="style4 trpad">Total Price (Aproximatly) </td>
		<td>:</td>
		<td><input name="list_price" type="text" value="<?=$select['list_price']?>"></td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="style4 trpad">Is the price negotiable ?</td>
		<td>:</td>
		<td><? if($select['list_pricing']=='yes'){?>
		<input type="radio" name="list_pricing" id="radio" value="yes" checked="checked">Yes
		<input type="radio" name="list_pricing" id="radio" value="No">No
		<? }else{?>
		<input type="radio" name="list_pricing" id="radio" value="yes">Yes
		<input type="radio" name="list_pricing" id="radio" value="No" checked="checked">No
		<? }?>	
		</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="style4 trpad">Bedrooms</td>
		<td>:</td>
		<td><select name="list_bedroom" id="req_bedroom" style="width:150px">
		<option value="<?=$select['list_bedroom']?>"><?=$select['list_bedroom']?></option>
		<? for($i=1;$i<10;$i++){?>
		<option value="<?=$i?>"><?=$i?></option>
		<? }?>
		</select>
		</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="style4 trpad">Floor Number<span id="floor_star"> </span></td>
		<td>:</td>
		<td><select name="list_floor_no" style="width:150">
		
		<option value="<?=$select['list_floor_no']?>"><?=$req->flor($select['list_floor_no'])?></option>
		<option value="11">Under Construction</option>
		<option value="12">Basement</option>
		<option value="13">Ground Floor</option>
		<option value="14">Mezzanine Floor</option>
		<? for($i=1;$i<10;$i++){?>
		<option value="<?=$i?>">
		<?=$i?>
		</option>
		<? }?>
		</select>
		</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="style4 trpad">Total Floors in Building </td>
		<td>:</td>
		<td><select name="list_floors" style="width:150">
		<option value="<?=$select['list_floors']?>"><?=$select['list_floors']?></option>
		<? for($i=1;$i<10;$i++){?>
		<option value="<?=$i?>">
		<?=$i?>
		</option>
		<? }?>
		</select>
		</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="style4 trpad">Age of Contruction </td>
		<td>:</td>
		<td>
		<select name="list_age" style="width:150">
		<option value="<?=$select['list_age']?>"><?=$select['list_age']?></option>
		<option value="1">under contruction</option>
		<option value="2">0-2 years old</option>
		<option value="5">2-5years old</option>
		<option value="10">5-10years old</option>
		</select>	
		</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="style4 trpad">Furnished</td>
		<td>:</td>
		<td>
		<select name="list_items" style="width:150">
		<option value="<?=$select['list_items']?>"><?=$select['list_items']?></option>
		<option value="furnished">Furnished</option>
		<option value="semi">Semi-Furnished</option>
		<option value="not">Un-furnished</option>
		</select>	
		</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="style4 trpad">Facing</td>
		<td>:</td>
		<td><select name="list_face" style="width:150"> 
		<option value="<?=$select['list_face']?>"><?=$select['list_face']?></option>
		<option value="East">East</option>
		<option value="North East">North East</option>
		<option value="North">North</option>
		<option value="North West">North West</option>
		<option value="West">West</option>
		<option value="South West">South West</option>
		<option value="South">South</option>
		<option value="South East">South East</option>
		</select>	
		</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="style4 trpad">Ownership Type</td>
		<td>:</td>
		<td>
		<select name="list_own" style="width:150">
		<option value="<?=$select['list_own']?>"><?=$select['list_own']?></option>
		<option value="1">Freehold</option>
		<option value="2">Leasehold</option>
		<option value="3">Power of Attorney</option>
		<option value="4">Co-Operative Society</option>
		</select>	
		</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr>
		<td colspan="3" class="style1">Additional Features:</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td colspan="3">
		<? $sel=$select['list_features'];?>
		<? 
		if(!$sel=='')
		{  
		$tt3 = explode("," ,$sel);
		}
		//echo $tt3[0];
		$fet=mysql_query("select * from `real-features`");
		$j=1; $i=0;?>
		<table width="100%">
		<tr>
			<td width="20%">
			<? while($fet1=mysql_fetch_array($fet)){?>
			
			<? if($j==4){ echo "<br>";  $j=1;}?>
			
			<? if($tt3[$i]==$fet1['fid']){?>
			<input class="style4" type="checkbox" name="list_features[]" value="<?=$fet1[fid]?>" checked="checked" />
			<input class="style4"type="text" value="<?=$fet1['name']?>" style="width:120px; border:none;" />
			
			<? $i++;}else{?>
			<input class="style4"type="checkbox" name="list_features[]" value="<?=$fet1[fid]?>" />
			<input class="style4"type="text" value="<?=$fet1['name']?>" style="width:120px; border:none;"  />
			
			<? }?> 
			
			<? $j++; }?>
			</td>
		</tr>
		</table></td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td colspan="3" class="style4 trpad">Property Description&nbsp;(Max 200 Characters)<strong><br>(&nbsp;Most property buyers like to have a detail description of the property before contacting.&nbsp;)</strong></td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td colspan="3"><textarea name="list_desc" cols="50" rows="4"><?=$select['list_desc']?></textarea></td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td colspan="3" align="center">
		<input type="submit" name="submit" value="Save"/>
		<input type="button" name="btn" value="Cancel" onclick="javascript:window.location='myaccount.php'"/>
		</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	</table>
	
	</td>
</tr>

</table>
</form>