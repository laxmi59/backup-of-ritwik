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
	//print_r($_POST);
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
<div class="innertab">
<div align="center" class="style3"><strong>Search With Refrance Id</strong> </div>
<div style="padding:5px" class="tabcolor">
<div>&nbsp;</div>
<div style="float:left; width:150px" align="left"><span class="style4">Type Property Id</span> </div>
<div style="float:left; width:5px">:</div>
<div align="left"><input type="text" name="ser">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="submit" name="sub" value="Go">	</div>
</div>
</div>
<div style="height:290px">&nbsp;</div>
</form>
<? }?>

<? if($_GET['act']=='location'){?>
<form method="post">

<div class="innertab">
<div align="center" class="style3"><strong>Search With City Name</strong> </div>
<div style="padding:5px" class="tabcolor">
<div>&nbsp;</div>
<div style="float:left; width:150px" align="left"><span class="style4">Select City</span> </div>
<div style="float:left; width:5px">:</div>
<div align="left"><select name="city">
			<option value="">Select City</option>
			<? $c=$y->location122();
			while($cc=mysql_fetch_array($c)){?>
			<option value="<?=$cc['city_name']?>"><?=$cc['city_name']?></option>
			<? }?>
		</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="submit" name="location" value="submit">	</div>
</div>
</div>
<div style="height:290px">&nbsp;</div>
</form>
<? }?>

<? if($_GET['act']=='normal'){ include "srch.php";}?>
<? if($_GET['act']=='area'){?>
<form method="post" name="srcharea">




<div class="innertab">
<div align="center" class="style3"><strong>Search With Location and Area</strong> </div>
<div style="padding:5px" class="tabcolor">
<div>&nbsp;</div>
<div style="float:left; width:150px" align="left"><span class="style4">Select City</span> </div>
<div style="float:left; width:5px">:</div>
<div align="left"><select name="city1" onChange="location1()">
			<option value="">Select City</option>
			<? $c=$y->location122();
			while($cc=mysql_fetch_array($c)){
				if($_GET['id']==$cc['cid']){?>
				<option value="<?=$cc['cid']?>" selected="selected"><?=$cc['city_name']?></option>
				<? }else{?>
				<option value="<?=$cc['cid']?>"><?=$cc['city_name']?></option>
				<? }?>
			<? }?>
		</select></div>
</div>

<div style="padding:5px" class="tabcolor">
<div style="float:left; width:150px" align="left"><span class="style4">Select Area</span> </div>
<div style="float:left; width:5px">:</div>
<div align="left"><?
		$loc->setfield('cid');
		$area=$loc->areas($_GET['id']);
		?>
		<select name="area">
			<option value="">Select Area</option>
			<? 
			while($cc=mysql_fetch_array($area)){?>
			<option value="<?=$cc['name']?>"><?=$cc['name']?></option>
			<? }?>
		</select></div>


</div>
<div class="tabcolor" align="center"><input type="submit" name="loc_area" value="submit"></div>
</div>
<div style="height:235px">&nbsp;</div>

</form>
<? }?>
</body>