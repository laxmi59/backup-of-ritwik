<?
if($_POST['submit']||$_POST['submit1'])
{
	extract($_POST);
	//print_r($_POST);
	if($_POST['submit']){
		$rt=$_POST['tran_type'];
		$rp=$_POST['req_property'];
		$ra=$_POST['city'];
		$rb1=$_POST['price_min'];
		$rb2=$_POST['price_max'];
		$rr=$_POST['req_bedroom'];
	}else{
		$rt=$_POST['tran_type1'];
		$rp=$_POST['req_property1'];
		$ra=$_POST['city1'];
		$rb1=$_POST['price_min1'];
		$rb2=$_POST['price_max2'];
		
	}
	if($rt<>'' && $rp<>'')
	{
		//if($ra<>'' || $rb1<>'' || $rb2<>'' || $rr<>'')
		//{
			echo "<script>location.replace('result_detail.php?a1=$rt&a2=$rp&a3=$ra&a4=$rb1&a5=$rb2&a6=$rr')</script>";
		//}
	}
	else
	{
		echo "You must select transaction type and Requirement Property";
		/*echo "<script>location.replace('result.php?abc1='".$abc1."'&abc2='".$abc2."'&abc3='".$abc3."')</script>";*/
	}
}
?>
<link rel="stylesheet" type="text/css" href="tab.css" />

<script type="text/javascript" src="tab.js"></script>

<script type="text/javascript" src="js/srch.js"></script>
<link type="text/css" href="css/style.css" rel="stylesheet">
<body>


<form name="frm" method="post">
<ul id="countrytabs" class="shadetabs" style="padding:0; margin:0">
	<li>&nbsp;</li><li>&nbsp;</li><li>&nbsp;</li><li>&nbsp;</li><li>&nbsp;</li><li>&nbsp;</li>
	<li><a href="#" rel="country1" class="selected"><img src="images/index_08.jpg" border="0" align="bottom"></a></li>
	<li><a href="#" rel="country2"><img src="images/index_10.jpg" border="0" align="bottom"></a></li>
</ul>
<div style="width:500px; background:url(images/abc.gif); padding-top:0">
	<div id="country1" class="tabcontent">
		<table width="67%" cellpadding="0" cellspacing="0" >
		<tr>
			<td><img src="images/sunpropertys_psd1_12.jpg"></td>
			<td width="63%">
			<table width="174" >
			<tr>
				<td>
					<select name="tran_type" id="tran_type" onChange="Selectprice_res();" style="width:160px;">
        				<option value="">Transaction type</option>
       				</select>
					<!--<input type="radio" name="r1" value="aaa" id="r1" onclick="amounts()">Rent
					<input type="radio" name="r1" value="bbb" id="r1" onclick="amounts()">Buy-->
				</td>
			</tr>
			<tr><td class="trcol"></td></tr>
			<tr>
				<td>
					<select name="req_property" id="req_property"  style="width:160px;">
        				<option value="">Residential Property</option>
        				<?
						$j=$x->property1(1);
						while($xxx=mysql_fetch_array($j)){?>
							<option value="<?=$xxx['pid']?>" id="<?=$xxx['ptype']?>"><?=$xxx['pname']?></option>
					 	<? }?>
        			</select>
				</td>
			</tr>
			<tr><td class="trcol"></td></tr>
			<tr>
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
			<tr><td class="trcol"></td></tr>
			<tr>
				<td>
					<SELECT  name="price_min" id="price_min" onChange="Selectprice_res1();"  style="width:70px;" >
            			<Option value="">select</option>
			        </SELECT>&nbsp;to
				  	<SELECT id="price_max"  NAME="price_max"  style="width:70px;">
				        <option value="">select</option>
			        </SELECT>	
				</td>
			</tr>
			<tr><td class="trcol"></td></tr>
			<tr>
				<td>
					<select name="req_bedroom" id="req_bedroom"  style="width:160px;">
						<option value="">select</option>
						<option value="1">Min 1 Bedroom</option>
						<option value="2">Min 2 Bedrooms</option>
						<option value="3">Min 3 Bedrooms</option>
						<option value="4">Min 4 Bedrooms</option>
						<option value="5">Min 5 Bedrooms</option>
					</select>
				</td>
			</tr>
			<tr><td><input type="submit" name="submit" value="Go"></td></tr>
			</table>
		  </td>
		</tr>
  </table>
	</div>
	<div id="country2" class="tabcontent">
		
		<table width="60%" cellpadding="0" cellspacing="0" style="background:url(images/sunpropertys_psd1_08.jpg)">
		<tr>
			<td><img src="images/sunpropertys_psd1_12.jpg" /></td>
			<td width="63%">
			<table width="215">
			<tr>
				<td>
					<select name="tran_type1" id="tran_type1" onChange="Selectprice_com();" style="width:160px;">
        				<option value="">Transaction type</option>
       				</select>
				</td>
			</tr>	
			<tr><td class="trcol"></td></tr>
			<tr>
				<td>
					<select name="req_property1" id="req_property1"  style="width:160px;">
        				<option value="">Comercial</option>
        				<?
						$j=$x->property1(2);
						while($xxx=mysql_fetch_array($j)){?>
							<option value="<?=$xxx['pid']?>" id="<?=$xxx['ptype']?>"><?=$xxx['pname']?></option>
					 	<? }?>
        			</select>
				</td>
			</tr>
			<tr><td class="trcol"></td></tr>
			<tr>
				<td>
					<select name="city1" style="width:160px">
						<option>Select City</option>
						<? $loc1=$loc->location122();
						while($loc2=mysql_fetch_array($loc1)){?>
						<option value="<?=$loc2['city_name']?>"><?=$loc2['city_name']?></option>
						<? }?>
					</select>
				</td>
			</tr>
			<tr><td class="trcol"></td></tr>
			<tr>
				<td>
					<SELECT  name="price_min1" id="price_min1" onChange="Selectprice_com1();"  style="width:70px;" >
            			<Option value="">select</option>
			        </SELECT>&nbsp;to
				  	<SELECT id="price_max1"  NAME="price_max1"  style="width:70px;">
				        <option value="">select</option>
			        </SELECT>	
				</td>
			</tr>
			<tr><td><input type="submit" name="submit1" value="Go"></td></tr>
			</table>
			</td>
		</tr>
		</table>
	</div>
</div>
</form>
<script type="text/javascript">

var countries=new ddtabcontent("countrytabs")
countries.setpersist(true)
countries.setselectedClassTarget("link") //"link" or "linkparent"
countries.init()

</script>
</body>