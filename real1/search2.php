 <?
include "dbcon.php";
//include "class/class.php";
$x=new real_property();
$y=new real_location();
$list=new real_list();
$loc=new real_location();


if($_POST['sub'])
{
	extract($_POST);
	if($list->refid($_POST['ser'])=='')
	{
		echo "invalid";
	}
	else
	{
	  	echo "<script>location.replace('result.php?id=".$_POST['ser']."')</script>";
	}
}
if($_POST['location'])
{
	extract($_POST);
  	echo "<script>location.replace('result_all.php?cid=".$_POST['city']."')</script>";
}
if($_POST['loc_area'])
{
	extract($_POST);
	print_r($_POST);
  	echo "<script>location.replace('result_all.php?aid=".$_POST['area']."')</script>";
}
?>

<link type="text/css" href="css/style.css" rel="stylesheet">
<script type="text/javascript">
function location1()
{
	//alert('aa');
	var a=document.srcharea.city1.value;
	//alert(a);
	location.replace('search1.php?act=area&id='+a);
}
</script>
<body>
<? if($_GET['act']=='refid'){?>
<form method="post" name="srch">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="innertab">
<tr>
	<td colspan="4" class="style3"><div align="center">Search With Refrance Id</div></td>
</tr>
<tr class="linebreak"><td colspan="4">&nbsp;</td></tr>
<tr class="tabcolor">
    <td class="style4 trpad"><div align="center" class="style4">Type Property Id </div></td>
    <td>:</td>
    <td><input type="text" name="ser"></td>
	<td><input type="submit" name="sub" value="Go"></td>
</tr>
<tr class="linebreak"><td colspan="4">&nbsp;</td></tr>
</table>
</form>
<? }?>
<? if($_GET['act']=='location'){?>
<form method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="innertab">
<tr>
  <td class="style3" colspan="3"> <div align="center">Search With City Name </div></td>
</tr>
<tr class="linebreak"><td colspan="4">&nbsp;</td></tr>
<tr class="linebreak"><td colspan="4"></td></tr>
<tr class="tabcolor">
	<td width="38%" align="center" class="style4">Select City</td>
	<td width="1%">:</td>
	<td width="36%">
		<select name="city">
			<option value="">Select City</option>
			<? $c=$y->location122();
			while($cc=mysql_fetch_array($c)){?>
			<option value="<?=$cc['city_name']?>"><?=$cc['city_name']?></option>
			<? }?>
		</select>
	</td>
	<td width="25%" align="center"><input type="submit" name="location" value="submit"></td>
</tr>
<tr class="linebreak"><td colspan="4"></td></tr>
<tr class="linebreak"><td colspan="4"></td></tr>
</table>
</form>
<? }?>

<? if($_GET['act']=='normal'){ include "srch.php";}?>
<? if($_GET['act']=='area'){?>
<form method="post" name="srcharea">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="innertab">
<tr>
  <td class="style3" colspan="3"><div align="center">Search With Location and Area</div></td>
</tr>
<tr class="linebreak"><td colspan="4">&nbsp;</td></tr>
<tr class="linebreak"><td colspan="3"></td></tr>
<tr class="tabcolor">
	<td align="center" class="style4">Select City</td>
	<td>:</td>
	<td>
		<select name="city1" onChange="location1()">
			<option value="">Select City</option>
			<? $c=$y->location122();
			while($cc=mysql_fetch_array($c)){
				if($_GET['id']==$cc['cid']){?>
				<option value="<?=$cc['cid']?>" selected="selected"><?=$cc['city_name']?></option>
				<? }else{?>
				<option value="<?=$cc['cid']?>"><?=$cc['city_name']?></option>
				<? }?>
			<? }?>
		</select>
	</td>
</tr>
<tr class="tabcolor">
	<td align="center" class="style4">Select Area</td>
	<td>:</td>
	<td>
		<?
		$loc->setfield('cid');
		$area=$loc->areas($_GET['id']);
		?>
		<select name="area">
			<option value="">Select Area</option>
			<? 
			while($cc=mysql_fetch_array($area)){?>
			<option value="<?=$cc['name']?>"><?=$cc['name']?></option>
			<? }?>
		</select>
	</td>
</tr>
<tr class="linebreak"><td colspan="3"></td></tr>

<tr class="linebreak"><td colspan="3"></td></tr>
<tr class="linebreak"><td colspan="3" align="center"><input type="submit" name="loc_area" value="submit"></td></tr>
<tr class="linebreak"><td colspan="3"></td></tr>
</table>
</form>
<? }?>
</body>
