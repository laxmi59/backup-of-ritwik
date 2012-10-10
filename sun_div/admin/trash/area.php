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
$filePath = "city.php?act=country&";
////Pagination End
if($_POST['state'])
{
	extract($_POST);
	print_r($_POST);
	if($_GET['id']=='')
	{
		$insert=mysql_query("insert into list values(`sid`,'$country','$country','$area')");
		echo "<script>location.replace('state.php')</script>";
	}else{
		$update=mysql_query("update list set `area`='$area' where sid=".$_GET['id']."");
		//echo "update countries set `value`='$country' where cid=".$_GET['id']."";
		echo "<script>location.replace('state.php')</script>";
	}
}
?>
<script type="text/javascript">

function del(nid)
{
	if(confirm("Are you sure want to delete this from administrator?"))
	{
		document.location.href = 'state.php?act=DLT&id='+nid;
	}
}
</script>
<table width="80%" align="center" style="border:1px solid;"  >
<tr>
	<td colspan="3"><? include "header.php"?></td>
</tr>
<tr>
	<td colspan="3">
	<table width="60%" align="center"><tr>
	<td align="center"><h3><a href="country.php?act=country">Countries</a></h3></td>
	<td align="center"><h3><a href="state.php">States</a></h3></td>
	<td align="center"><h3><a href="city.php">Cities</a></h3></td>
	</tr></table>
</tr>
<form name="form" method="post">
<tr>
	<? if($_GET['id']==''){?>
	<td colspan="3" align="center"><a href="state.php?act=state">Add new state</a></td>
	<? }else{ ?>
	<td colspan="3" align="center">Edit state</td>
	<? }?>
</tr>
<? if($_GET['act']=='state'){?>
<tr>
	<td colspan="3">
		<table align="center">
			<tr>
				<td>Country Name </td>
				<td>:</td>
				<td>
					<select name="country">
					<? $xyz=mysql_fetch_array(mysql_query("select * from list where sid=".$_GET['id'].""));
						$xyz1=mysql_fetch_array(mysql_query("select * from countries where cid=".$xyz['cid'].""));
					if($_GET['id']==''){?>
					<option>select</option>
					<? }else{?>
					<option value="<?=$xyz1['cid']?>"><?=$xyz1['value']?></option>
					<? }?>
					<? $select=mysql_query("select * from countries");
					while($row=mysql_fetch_array($select)){?>
					<option value="<?=$row['cid']?>"><?=$row['value']?></option>
					<? }?>
					</select>
				</td>
			</tr>
			<tr>
			<?
				if(!$_GET['id']==''){
				$abc=mysql_fetch_array(mysql_query("select * from list where sid='".$_GET['id']."'"));
				}
			?>
				<td>State Name</td><td>:</td>
				<td><input type="text" name="area" value="<?=$abc['area']?>" /></td>
			</tr>
			<tr>
				<td colspan="3" align="center">
				<input type="submit" name="state" value="Add" />
				<input type="button" name="btn" value="Cancel" onclick="javascript:window.location='state.php'" />
				</td>
			</tr>
		</table>
	</td>
</tr>
<? }?>
<tr>
	<td>
	<table align="center" width="50%">
	<tr>
		<th> slno</th>
		<th> Name</th>
		<th> Action</th>
	</tr>
<?  
$ccc=mysql_query("select * from list");
$cccno=mysql_num_rows($ccc);
$cc=mysql_query("select * from list order by sid desc LIMIT $start, $q_limit");
while($cc1=mysql_fetch_array($cc)){?>
	<tr>
		<td><?=$cc1['sid']?></td>
		<td><?=$cc1['area']?></td>
		<td>
			<a href="state.php?act=state&id=<?=$cc1['sid']?>">Edit</a>&nbsp;&nbsp;
			<a href="javascript:del(<?=$cc1['sid']?>)">Delete</a>
		</td>
	</tr>
<? }?>
</table>
</td>
</tr>
<tr>
	<td colspan="3"><h5 align="center"><? paginate($start,$q_limit,$cccno,$filePath1,"");?></h5></td>
</tr>
</form>
</table>
<?
if($_GET['act'] == 'DLT')
{
	$del = mysql_query("DELETE FROM `list` WHERE `sid` = ".$_GET['id']."");
	//echo "delete from job-post where job_id = ".$_GET['id']."";
	echo '<script language="javascript">';
	echo 'window.location = "state.php"';	
	echo '</script>';
}?>