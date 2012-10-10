<? session_start();
if($_SESSION['aun']==''){	echo "<script>location.replace('index.php')</script>";}
include "../dbcon.php";
include "../class/class.php";
include "classobjects.php";
/*$list=new real_list();
$post=new real_req();
$loc=new real_location();
$reg=new real_reg();
$prop=new real_property();*/
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
	//print_r($_POST);
	if($_GET['id']=='')
	{
		$insert=mysql_query("insert into `real-city` values(`cid`,0,'$name')");
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
	//print_r($_POST);
	if($_GET['id']=='')
	{
		$insert=mysql_query("insert into `real-area` values(`aid`,'$area1','$name')");
		/*echo "<script>location.replace('city.php?act=area')</script>";*/
	}else{
		$update=mysql_query("update `real-area` set  cid='$area1', `name`='$name' where aid=".$_GET['id']."");
	//	echo "update `real-area` set  cid='$area1',`name`='$name' where aid=".$_GET['id']."";
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
function del1(nid)
{
	if(confirm("Are you sure want to delete this from administrator?"))
	{
		document.location.href = 'city.php?act=DLT1&id='+nid;
	}
}
</script>
<link href="../css/style.css" type="text/css" rel="stylesheet" />
<form name="form" method="post">
<table width="100%" class="tabcolor" align="center"   >
<tr>
	<td colspan="3"><? include "header.php"?></td>
</tr>
<tr>
	<td width="25%" align="center" valign="top"><? include "left.php";?></td>
	<td width="3%">&nbsp;</td>
	<td width="72%" align="center" valign="top">
	<? if($_GET['act']=='city'){?>
	<table width="80%">
	<tr>
		<td valign="top" align="center">
		<? if($_GET['id']==''){?>
		<a href="city.php?act=city&act1=city1" class="b">Add new City</a>
		<? }else{ 
			echo "Edit City";
		}?>		</td>
	</tr>
	<tr><td>&nbsp;</td>	</tr>
	<? if($_GET['act1']=='city1'){
		if(!$_GET['id']==''){
		$abc=mysql_fetch_array(mysql_query("select * from `real-city` where cid='".$_GET['id']."'"));
		}
	?>
	<tr>
		<td align="center" valign="top">
			<table width="80%">
			<tr>
				<td width="43%" class="style4"><div align="center">City Name</div></td>
				<td width="4%">:</td>
				<td width="53%"><input type="text" name="name" value="<?=$abc['city_name']?>" /></td>
			</tr>
			<tr>
				<td colspan="3" align="center">
					<input type="submit" name="city" value="Add" />
					<input type="button" name="btn" value="Cancel" onclick="javascript:window.location='city.php?act=city'" />
				</td>
			</tr>
			</table>
		</td>
	</tr>
	<? }?>
	<tr><td>&nbsp;</td>	</tr>
	<tr>
		<td valign="top">
			<table align="center" width="80%">
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
				<td align="center" class="style4"><?=$cc1['cid']?></td>
				<td align="center" class="style4"><?=$cc1['city_name']?></td>
				<td align="center">
					<a href="city.php?act=city&act1=city1&id=<?=$cc1['cid']?>" class="b">Edit</a>&nbsp;&nbsp;
					<a href="javascript:del(<?=$cc1['cid']?>)" class="b">Delete</a>				</td>
			</tr>
			<? }?>
			<tr>
				<td colspan="3" align="center" class="style8"><? paginate($start,$q_limit,$cccno,$filePath,"");?></td>
			</tr>
			</table>
		</td>
	</tr>
	</table>
	<? }?>
	<? if($_GET['act']=='area'){?>
	<table width="80%">
	<tr>
		<Td valign="top" align="center">
			<? if($_GET['id']==''){?>
			<a href="city.php?act=area&act1=area1" class="b">Add new Area</a>
			<? }else{ 
				echo "Edit Area";
			}?>		</Td>
	</tr>
	<tr><td>&nbsp;</td>	</tr>
	<? if($_GET['act1']=='area1'){?>
	<tr>
		<td valign="top">
			<table width="80%" align="center">
			<tr>
				<td width="44%" class="style4"><div align="center">City Name </div></td>
				<td width="4%">:</td>
				<td width="52%">
					<select name="area1">
					<? //$xyz=mysql_fetch_array(mysql_query("select * from `real-area` where aid=".$_GET['id'].""));
					$xyz1=mysql_fetch_array(mysql_query("select * from `real-city` "));
					if($_GET['id']==''){?>
					<option value="">select</option>
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
			}?>
				<td class="style4"><div align="center">Area Name</div></td><td>:</td>
				<td><input type="text" name="name" value="<?=$abc['name']?>" /></td>
			</tr>
			<tr>
				<td colspan="3" align="center">
					<input type="submit" name="area" value="Add" />
					<input type="button" name="btn" value="Cancel" onclick="javascript:window.location='city.php?act=area'" />
				</td>
			</tr>
			</table>
		</td>
	</tr>
	<tr><td>&nbsp;</td>	</tr>
	<? }?>
	<tr>
		<td valign="top">
			<table align="center" width="80%">
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
				<td align="center" class="style4"><?=$cc1['aid']?></td>
				<td align="center" class="style4"><?=$cc1['name']?></td>
				<td align="center">
					<a href="city.php?act=area&act1=area1&id=<?=$cc1['aid']?>" class="b">Edit</a>&nbsp;&nbsp;
					<a href="javascript:del1(<?=$cc1['aid']?>)" class="b">Delete</a>				</td>
			</tr>
			<? }?>
			<tr>
				<td colspan="3" align="center" class="style8"><? paginate($start,$q_limit,$cccno,$filePath1,"");?></td>
			</tr>
			</table>
		</td>
	</tr>
	
	</table>
	<? }?>
	</td>
</tr>
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