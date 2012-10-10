<? session_start();
include "dbcon.php";

$uid=$_SESSION['uid'];
$select=mysql_fetch_array(mysql_query("select * from `real-list` where list_id='".$_GET['id']."'"));
if($_POST['submit'])
{
	extract($_POST);
	//print_r($_POST);
	//echo $_POST['abc'];
	$abc="LS".$_POST['abc'];
	echo $abc;
	if (!is_array($_POST['list_features']) || sizeof($_POST['list_features']) < 1) {
    	}
       foreach ($_POST['list_features'] as $list_features) {
	   	$arr[] = $list_features;
	   }
		$flr  =  implode("," ,$arr);
	$update=mysql_query("update `real-list` set `list_type`='$list_type', `list_property`='$list_property', `list_project`='$list_project', `list_addr`='$list_addr', `list_city`='$cid', `list_location`='$aid', `list_area`='$list_area', `list_price`='$list_price', `list_pricing`='$list_pricing', `list_bedroom`='$list_bedroom', `list_floor_no`='$list_floor_no', `list_floors`='$list_floors', `list_age`='$list_age', `list_items`='$list_items', `list_face`='$list_face', `list_own`='$list_own', `list_features`='$flr', `list_desc`='$list_desc' where list_id='".$_GET['id']."'");
	echo "<script>location.replace('confirm.php')</script>";
}
?>
<script type="text/javascript" src="js/ruppees1.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<body style="background-color:#FFFFFF">
<form method="post" name="pgenerate">
<div style="width:95%; margin-left:25px; margin-right:25px">
<div>Edit your Real ID:<?=$select['list_gid']?> </div>

<div style=" float:left; width:350px;">Transaction Type</div>
<div style=" float:left; width:5px">:</div>
<div style="height:19px"><select name="list_type" style="width:150px">
		<option value="<?=$select['list_type']?>"><?=$req->req1($select['list_type'])?></option>
		<option value="1">Rent</option>
		<option value="3">Sell</option>
		</select>	</div>

<div style=" float:left; width:350px;">Property Type</div>
<div style=" float:left; width:5px">:</div>
<div style="height:19px"><select name="list_property" id="req_property" onChange="abc();" style="width:150px;" >
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
		</select>	</div>

<div style=" float:left; width:350px;">Project/Society Name</div>
<div style=" float:left; width:5px">:</div>
<div style="height:19px"><input name="list_project" type="text" value="<?=$select['list_project']?>"></td></div>

<div style=" float:left; width:350px;">Property Address </div>
<div style=" float:left; width:5px">:</div>
<div style="height:19px"><input name="list_addr" type="text" value="<?=$select['list_addr']?>"></div>

<div style=" float:left; width:350px;">City</div>
<div style=" float:left; width:5px">:</div>
<div style="height:19px"><select name="cid" style="width:150px">
		<option value="1">kakinada</option>
		</select>	</div>

<div style=" float:left; width:350px;">Locality</div>
<div style=" float:left; width:5px">:</div>
<div style="height:19px"><select name="aid"  style="width:150px">
		<option value="<?=$select['list_aid']?>"><?=$c->location2($select['list_location'])?></option>
		<?
		$select1=mysql_query("select * from `real-area` where cid=1");
		while($row=mysql_fetch_array($select1)){?>
		<option value="<?=$row['aid']?>"><?=$row['name']?></option>
		<? }?>
		</select>	</div>

<div style=" float:left; width:350px;">Area(As in Property Document)</div>
<div style=" float:left; width:5px">:</div>
<div style="height:19px"><input name="list_area" type="text" value="<?=$select['list_area']?>"></div>

<div style=" float:left; width:350px;">Total Price (Aproximatly)</div>
<div style=" float:left; width:5px">:</div>
<div style="height:19px"><input name="list_price" type="text" value="<?=$select['list_price']?>"></div>

<div style=" float:left; width:350px;">Is the price negotiable ?</div>
<div style=" float:left; width:5px">:</div>
<div style="height:19px"><? if($select['list_pricing']=='yes'){?>
		<input type="radio" name="list_pricing" id="radio" value="yes" checked="checked">Yes
		<input type="radio" name="list_pricing" id="radio" value="No">No
		<? }else{?>
		<input type="radio" name="list_pricing" id="radio" value="yes">Yes
		<input type="radio" name="list_pricing" id="radio" value="No" checked="checked">No
		<? }?>	</div>

<div style=" float:left; width:350px;">Bedrooms</div>
<div style=" float:left; width:5px">:</div>
<div style="height:19px"><select name="list_bedroom" id="req_bedroom" style="width:150px">
		<option value="<?=$select['list_bedroom']?>"><?=$select['list_bedroom']?></option>
		<? for($i=1;$i<10;$i++){?>
		<option value="<?=$i?>"><?=$i?></option>
		<? }?>
		</select></div>

<div style=" float:left; width:350px;">Floor Number</div>
<div style=" float:left; width:5px">:</div>
<div style="height:19px"><select name="list_floor_no" style="width:150">
		
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
		</select></div>

<div style=" float:left; width:350px;">Total Floors in Building</div>
<div style=" float:left; width:5px">:</div>
<div style="height:19px"><select name="list_floors" style="width:150">
		<option value="<?=$select['list_floors']?>"><?=$select['list_floors']?></option>
		<? for($i=1;$i<10;$i++){?>
		<option value="<?=$i?>">
		<?=$i?>
		</option>
		<? }?>
		</select></div>

<div style=" float:left; width:350px;">Age of Contruction</div>
<div style=" float:left; width:5px">:</div>
<div style="height:19px"><select name="list_age" style="width:150">
		<option value="<?=$select['list_age']?>"><?=$select['list_age']?></option>
		<option value="1">under contruction</option>
		<option value="2">0-2 years old</option>
		<option value="5">2-5years old</option>
		<option value="10">5-10years old</option>
		</select>	</div>


<div style=" float:left; width:350px;">Furnished</div>
<div style=" float:left; width:5px">:</div>
<div style="height:19px"><select name="list_items" style="width:150">
		<option value="<?=$select['list_items']?>"><?=$select['list_items']?></option>
		<option value="furnished">Furnished</option>
		<option value="semi">Semi-Furnished</option>
		<option value="not">Un-furnished</option>
		</select>	</div>

<div style=" float:left; width:350px;">Facing</div>
<div style=" float:left; width:5px">:</div>
<div style="height:19px"><select name="list_face" style="width:150"> 
		<option value="<?=$select['list_face']?>"><?=$select['list_face']?></option>
		<option value="East">East</option>
		<option value="North East">North East</option>
		<option value="North">North</option>
		<option value="North West">North West</option>
		<option value="West">West</option>
		<option value="South West">South West</option>
		<option value="South">South</option>
		<option value="South East">South East</option>
		</select>	</div>

<div style=" float:left; width:350px;">Ownership Type</div>
<div style=" float:left; width:5px">:</div>
<div style="height:19px"><select name="list_own" style="width:150">
		<option value="<?=$select['list_own']?>"><?=$select['list_own']?></option>
		<option value="1">Freehold</option>
		<option value="2">Leasehold</option>
		<option value="3">Power of Attorney</option>
		<option value="4">Co-Operative Society</option>
		</select>	</div>

<div>Additional Features:</div>
<div><? $sel=$select['list_features'];?>
		<? 
		if(!$sel=='')
		{  
		$tt3 = explode("," ,$sel);
		}
		//echo $tt3[0];
		$fet=mysql_query("select * from `real-features`");
		$j=1; $i=0;?>
		<div>
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
	  </div>
</div>
<div>Property Description&nbsp;(Max 200 Characters)<strong><br>(&nbsp;Most property buyers like to have a detail description of the property before contacting.&nbsp;)</strong></div>	
<div><textarea name="list_desc" cols="50" rows="4"><?=$select['list_desc']?></textarea></div>
<div align="center">&nbsp;<input type="submit" name="submit" value="Save"/>
		<input type="button" name="btn" value="Cancel" onclick="javascript:window.location='myaccount.php'"/></div>		
</div>
</form>
</body>