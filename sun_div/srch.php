<?
if($_POST['go'])
{
	extract($_POST);
	$rt=$_POST['req_type'];
	$rp=$_POST['req_property'];
	$ra=$_POST['req_area'];
	$rb1=$_POST['req_budject1'];
	$rb2=$_POST['req_budject2'];
	$rr=$_POST['req_bedroom'];
	if($rt<>'' && $rp<>'')
	{
		if($ra<>'' || $rb1<>'' || $rb2<>'' || $rr<>'')
		{
			echo "<script>location.replace('result_detail.php?a1=$rt&a2=$rp&a3=$ra&a4=$rb1&a5=$rb2&a6=$rr')</script>";
		}
	}
	else
	{
		echo "You must select Requirement type and Requirement Property";
		/*echo "<script>location.replace('result.php?abc1='".$abc1."'&abc2='".$abc2."'&abc3='".$abc3."')</script>";*/
	}
}
?>
<script type="text/javascript" src="js/ruppees1.js"></script>
<link type="text/css" href="css/style.css" rel="stylesheet">
<body  onLoad="fillCategory()">
<form method="post"  name="drop_list">
<div class="innertab ">
<div align="center" class="style3"><strong>Search Property</strong> </div>

<div style="padding:5px" class="tabcolor">
<div style="float:left; width:150px" align="left"><span class="style4">Transaction Type</span> </div>
<div style="float:left; width:5px">:</div>
<div align="left"><select name="req_type" id="req_type" onChange="Selectlocation();" style="width:160px;">
        <option value="">select</option>
        </select>	</div>
</div>

<div style="padding:5px" class="tabcolor">
<div style="float:left; width:150px" align="left"><span class="style4">Property Type</span> </div>
<div style="float:left; width:5px">:</div>
<div align="left"><select name="req_property" id="req_property" onChange="abc();" style="width:160px;">
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
        </select>		</div>
</div>

<div style="padding:5px" class="tabcolor">
<div style="float:left; width:150px" align="left"><span class="style4">Desired city</span> </div>
<div style="float:left; width:5px">:</div>
<div align="left"><select name="req_area" style="width:160px">
			<option>Select City</option>
		<? $loc1=$loc->location122();
			while($loc=mysql_fetch_array($loc1)){?>
			<option value="<?=$loc['city_name']?>"><?=$loc['city_name']?></option>
			<? }?>
		</select>	</div>
</div>


<div style="padding:5px" class="tabcolor">
<div style="float:left; width:150px" align="left"><span class="style4">Amount</span> </div>
<div style="float:left; width:5px">:</div>
<div align="left"><SELECT  name="req_budject1" id="req_budject1" onChange="Selectlocation1();"  style="width:70px;" >
            <Option value="">select</option>
        </SELECT>&nbsp;to
		  <SELECT id="req_budject2"  NAME="req_budject2"  style="width:70px;">
	        <option value="">select</option>
          </SELECT>	</div>
</div>

<div style="padding:5px" class="tabcolor">
<div style="float:left; width:150px" align="left"><span class="style4">Bedrooms </span></div>
<div style="float:left; width:5px">:</div>
<div align="left"><select name="req_bedroom" id="req_bedroom"  style="width:160px;">
        <option value="">select</option>
        <option value="1">Min 1 Bedroom</option>
        <option value="2">Min 2 Bedrooms</option>
        <option value="3">Min 3 Bedrooms</option>
        <option value="4">Min 4 Bedrooms</option>
        <option value="5">Min 5 Bedrooms</option>
        </select>	</div>
</div>

<div style="padding:5px" class="tabcolor">
<!--<div style="float:left; width:50px">&nbsp; </div>-->
<div align="center" ><input type="submit" name="go" value="Go">	</div>
</div>
</div>

<div style="height:150px"> &nbsp;</div>
</form>
</body>