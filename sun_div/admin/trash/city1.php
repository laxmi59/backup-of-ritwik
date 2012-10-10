<?
include "../db/dbcon.php";
/// For pagination
require_once("pagination.php");
$q_limit = 15;
$errMsg = 0;
if( isset($_GET['start']) )
{
	$start = $_GET['start'];
}
else
{
	$start = 0;
}
$filePath = "city.php?act=city&";
$filePath1 = "city.php?act=area&";

////Pagination End
if($_POST['city'])
{
	extract($_POST);
	print_r($_POST);
	if($_GET['id']=='')
	{
		$insert=mysql_query("insert into `real-city` values(`cid`,'$name')");
		echo "<script>location.replace('city.php?act=city')</script>";
	}else{
		$update=mysql_query("update `real-city` set `city_name`='$name' where cid=".$_GET['id']."");
		//echo "update `real-city set `city_name`='$name' where cid=".$_GET['id']."";
		echo "<script>location.replace('city.php?act=city')</script>";
	}
}
if($_POST['area'])
{
	extract($_POST);
	print_r($_POST);
	if($_GET['id']=='')
	{
		$insert=mysql_query("insert into `real-area` values(`aid`,'$area1','$name')");
		echo "<script>location.replace('city.php?act=area')</script>";
	}else{
		$update=mysql_query("update `real-area` set  cid='$area1' and `name`='$name' where aid=".$_GET['id']."");
		//echo "update countries set `value`='$country' where cid=".$_GET['id']."";
		echo "<script>location.replace('city.php?act=area')</script>";
	}
}
?>
<script type="text/javascript">
function del(nid)
{
	if(confirm("Are you sure want to delete this from administrator?"))
	{
		document.location.href = 'city.php?act=DLT&id='+nid;
	}
}
function del(nid)
{
	if(confirm("Are you sure want to delete this from administrator?"))
	{
		document.location.href = 'city.php?act=DLT1&id='+nid;
	}
}
</script>
<form name="form" method="post">
<table width="80%" align="center" style="border:1px solid;"  >
<tr>
	<td colspan="3"><? include "header.php"?></td>
</tr>
<tr>
	<td colspan="3">
	<table width="60%" align="center"><tr>
	<td align="center"><h3><a href="city.php?act=city">Cities</a></h3></td>
	<td align="center"><h3><a href="city.php?act=area">Areas</a></h3></td>
	</tr></table>
</tr>
<? if($_GET['act']=='city'){?>
<tr>
	<td colspan="3" align="center">
		<? if($_GET['id']==''){?>
		<a href="city.php?act=city&act1=city1">Add new City</a>
		<? }else{ 
			echo "Edit City";
		}?>
	</td>
</tr>
<? if($_GET['act1']=='city1'){?>
<tr>
	<?
		if(!$_GET['id']==''){
		$abc=mysql_fetch_array(mysql_query("select * from `real-city` where cid='".$_GET['id']."'"));
		}
	?>
	<td colspan="3" align="center">
	<table>
		<tr><td>City Name</td>
		<td>:</td>
		<td><input type="text" name="name" value="<?=$abc['city_name']?>" /></td>
		</tr></table></td>
</tr>
<tr>
	<td colspan="3" align="center">
		<input type="submit" name="city" value="Add" />
		<input type="button" name="btn" value="Cancel" onclick="javascript:window.location='city.php?act=city'" />
	</td>
</tr>
<? }?>
<tr>
	<td colspan="3">
	<table align="center" width="50%">
	<tr>
		<th> slno</th>
		<th> Name</th>
		<th> Action</th>
	</tr>
<?  
$ccc=mysql_query("select * from `real-city`");
$cccno=mysql_num_rows($ccc);
$cc=mysql_query("select * from `real-city` LIMIT $start, $q_limit");
while($cc1=mysql_fetch_array($cc)){?>
	<tr>
		<td align="center"><?=$cc1['cid']?></td>
		<td align="center"><?=$cc1['city_name']?></td>
		<td align="center">
			<a href="city.php?act=city&act1=city1&id=<?=$cc1['cid']?>">Edit</a>&nbsp;&nbsp;
			<a href="javascript:del(<?=$cc1['cid']?>)">Delete</a>
		</td>
	</tr>
<? }?>
</table>
</td>
</tr>
<tr>
	<td colspan="3"><h5 align="center"><? paginate($start,$q_limit,$cccno,$filePath,"");?></h5></td>
</tr>
<? }?>
<? ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////?>
<? if($_GET['act']=='area'){?>
<tr>
	<td colspan="3" align="center">
		<? if($_GET['id']==''){?>
		<a href="city.php?act=area&act1=area1">Add new Area</a>
		<? }else{ 
			echo "Edit Area";
		}?>
	</td>
</tr>
<? if($_GET['act1']=='area1'){?>
<tr>
	<td colspan="3" align="center">
	<table>
	<tr>
		<td>City Name </td>
		<td>:</td>
		<td>
		<select name="area1">
		<? //$xyz=mysql_fetch_array(mysql_query("select * from `real-area` where aid=".$_GET['id'].""));
		$xyz1=mysql_fetch_array(mysql_query("select * from `real-city` "));
		if($_GET['id']==''){?>
			<option>select</option>
		<? }else{?>
			<option value="<?=$xyz1['cid']?>"><?=$xyz1['city_name']?></option>
		<? }?>
		<? $select=mysql_query("select * from `real-city`");
		while($row=mysql_fetch_array($select)){?>
			<option value="<?=$row['cid']?>"><?=$row['city_name']?></option>
		<? }?>
		</select>
		</td>
	</tr>
	<tr>
	<?	if(!$_GET['id']==''){
		$abc=mysql_fetch_array(mysql_query("select * from `real-area` where aid='".$_GET['id']."'"));
		}
	?>
		<td>Area Name</td><td>:</td>
		<td><input type="text" name="name" value="<?=$abc['name']?>" /></td>
	</tr>
	<tr>
		<td colspan="3" align="center">
			<input type="submit" name="area" value="Add" />
			<input type="button" name="btn" value="Cancel" onclick="javascript:window.location='city.php?act=city'" />
		</td>
	</tr>
	</table>
</td>
</tr>
<? }?>
<tr>
	<td colspan="3">
	<table align="center" width="50%">
	<tr>
		<th> slno</th>
		<th> Name</th>
		<th> Action</th>
	</tr>
<?  
$ccc=mysql_query("select * from `real-area`");
$cccno=mysql_num_rows($ccc);
$cc=mysql_query("select * from `real-area` LIMIT $start, $q_limit");
while($cc1=mysql_fetch_array($cc)){?>
	<tr>
		<td align="center"><?=$cc1['aid']?></td>
		<td align="center"><?=$cc1['name']?></td>
		<td align="center">
			<a href="city.php?act=area&act1=area1&id=<?=$cc1['aid']?>">Edit</a>&nbsp;&nbsp;
			<a href="javascript:del(<?=$cc1['aid']?>)">Delete</a>
		</td>
	</tr>
<? }?>
</table>
</td>
</tr>
<tr>
	<td colspan="3"><h5 align="center"><? paginate($start,$q_limit,$cccno,$filePath1,"");?></h5></td>
</tr>
<? }?>
</table>
</form>
<?
if($_GET['act'] == 'DLT')
{
	$del = mysql_query("DELETE FROM `real-city` WHERE `cid` = ".$_GET['id']."");
	//echo "delete from job-post where job_id = ".$_GET['id']."";
	echo '<script language="javascript">';
	echo 'window.location = "city.php?act=city"';	
	echo '</script>';
}
if($_GET['act'] == 'DLT1')
{
	$del = mysql_query("DELETE FROM `real-area` WHERE `aid` = ".$_GET['id']."");
	//echo "delete from job-post where job_id = ".$_GET['id']."";
	echo '<script language="javascript">';
	echo 'window.location = "city.php?act=area"';	
	echo '</script>';
}?>