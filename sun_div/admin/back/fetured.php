<? session_start();
include "../dbcon.php";
include "../class/class.php";
include "classobjects.php";
/*$list=new real_list();
$post=new real_req();
$loc=new real_location();
$reg=new real_reg();
$prop=new real_property();
$build=new real_featured_build();
$proj=new real_featured_proj();*/
/// For pagination
require_once("pagination.php");
$q_limit = 10;
$errMsg = 0;
if( isset($_GET['start']) )
{
	$start = $_GET['start'];
}
else
{
	$start = 0;
}
$filePath = "fetured.php?act=build&";
$filePath1 = "fetured.php?act=proj&";

////Pagination End
if($_POST['builders'])
{
	extract($_POST);
	//print_r($_POST);
	$img = $_FILES['build_img']['name'];
	$size = $_FILES['build_img']['size'];
	//echo $img,$size;
	$uploaddir = 'img/';
	$uploadfile = $uploaddir . $img;
	if (move_uploaded_file($_FILES['build_img']['tmp_name'], $uploadfile)) {	/*echo $size;	*/	}
	else{
		//echo "error in uploading file";
	}
	if($_GET['id']==''){
		$insert=mysql_query("insert into `real_builders` values(`build_id`,'$build_name','".$_FILES['build_img']['name']."',now())");
		echo "<script>location.replace('fetured.php?act=build')</script>";
	}else{
		if($_FILES['build_img']['name']){	$file1 = $_FILES['build_img']['name'];}else {$file1 = $_POST['build_img1'];}
		$update=mysql_query("update `real_builders` set `build_city`='$build_name', `build_img`='$file1' where `build_id`='".$_GET['id']."'");
		echo "<script>location.replace('fetured.php?act=build')</script>";
	}
	
}
if($_POST['projects'])
{
	extract($_POST);
	//print_r($_POST);
	$img = $_FILES['proj_img']['name'];
	$size = $_FILES['proj_img']['size'];
	//echo $img,$size;
	$uploaddir = 'img/';
	$uploadfile = $uploaddir . $img;
	if (move_uploaded_file($_FILES['proj_img']['tmp_name'], $uploadfile)) {	/*echo $size;	*/	}
	else{
		//echo "error in uploading file";
	}
	if($_GET['id']==''){
		$insert=mysql_query("insert into `real_projects` values(`proj_id`,'$proj_name','".$_FILES['proj_img']['name']."',now())");
		echo "<script>location.replace('fetured.php?act=proj')</script>";
	}else{
		if($_FILES['proj_img']['name']){	$file1 = $_FILES['proj_img']['name'];}else {$file1 = $_POST['proj_img1'];}
		$update=mysql_query("update `real_projects` set `proj_city`='$proj_name', `proj_img`='$file1' where `proj_id`='".$_GET['id']."'");
		echo "<script>location.replace('fetured.php?act=proj')</script>";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script type="text/javascript">
function del(nid)
{
	if(confirm("Are you sure want to delete this from administrator?"))
	{
		document.location.href = 'fetured.php?act=DLT&id='+nid;
	}
}
function del1(nid)
{
	if(confirm("Are you sure want to delete this from administrator?"))
	{
		document.location.href = 'fetured.php?act=DLT1&id='+nid;
	}
}
</script>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<table width="100%" align="center" class="tabcolor" >
<tr>
	<td colspan="3"><? include "header.php"?></td>
</tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr>
	<td width="25%" align="center" valign="top"><? include "left.php";?></td>
	<td width="3%">&nbsp;</td>
	<td width="72%" align="center" valign="top">
	<? if($_GET['act']=='build'){?>
	<table width="80%">
	<tr><td align="center"><a href="fetured.php?act=buildadd" class="b">Add new Featured Builder</a></td>
	</tr>
	<tr>
		<td>
		
			<table align="center" width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<th> slno</th>
				<th> Name</th>
				<th> Image</th>
				<th> Action</th>
			</tr>
			<?  
			$build1=$build->tot_rec();
			$cccno=mysql_num_rows($build1);
			//echo $cccno;
			$cc=mysql_query("select * from `real_builders` LIMIT $start, $q_limit");
			
			//echo $ccno;
			while($cc1=mysql_fetch_array($cc)){?>
			<tr>
				<td align="center" class="style4"><?=$cc1['build_id']?></td>
				<td align="center" class="style4"><?=$cc1['build_city']?></td>
				<td align="center"><img src="img/<?=$cc1['build_img']?>" width="160" height="60" /></td>
				<td align="center">
					<a href="fetured.php?act=buildadd&id=<?=$cc1['build_id']?>" class="b">Edit</a>&nbsp;&nbsp;
					<a href="javascript:del(<?=$cc1['cid']?>)" class="b">Delete</a>				</td>
			</tr>
			<? }?>
			<tr>
				<td colspan="4" align="center" class="style8"><? paginate($start,$q_limit,$cccno,$filePath,"");?></td>
			</tr>
			</table>
		</td>
	</tr>
	</table>
	<? }?>
	<? if($_GET['act']=='buildadd'){
	$build->setfield("build_id");
	$build_fetch=$build->single_rec($_GET['id']);
	?>
	<form name="frm" method="post" enctype="multipart/form-data">
	<table>
		<tr><td colspan="3">&nbsp;</td></tr>
		<? if($_GET['id']<>''){?>
		<tr class="style4">
		  <td colspan="3" align="center">Edit Record</td></tr>
		<? }else{?>
		<tr class="style4">
		  <td colspan="3" align="center">Add new Record</td></tr>
		<? }?>
		<tr><td colspan="3">&nbsp;</td></tr>
		<tr>
			<td class="style4">City</td>
			<td>:</td>
			<td><input type="text" name="build_name" value="<?=$build_fetch['build_city']?>" /></td>
		</tr>
		<? if($_GET['id']<>''){?>
		<tr>
			<td colspan="2">&nbsp;</td>
			<td><img src="img/<?=$build_fetch['build_img']?>" width="160" height="60" /></td>
		</tr>
		<? }?>
		<tr><input type="hidden" name="build_img1" value="<?=$build_fetch['build_img']?>">
			<td class="style4">Image</td>
			<td>:</td>
			<td><input type="file" name="build_img" /></td>
		</tr>
		<tr>
			<td colspan="3" align="center">
				<input type="submit" name="builders" value="submit" />&nbsp;&nbsp;
				<input type="button" name="cancel" value="cancel" onclick="javascript:window.location='fetured.php?act=build'" />
			</td>
		</tr>
	</table>
	</form>
	<? }?>
	<? if($_GET['act']=='proj'){?>
	<table width="80%">
	<tr>
	  <td align="center"><a href="fetured.php?act=projadd" class="b">Add new Featured Projects </a></td>
	</tr>
	<tr>
		<td>
		
			<table align="center" width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<th> slno</th>
				<th> Name</th>
				<th> Image</th>
				<th> Action</th>
			</tr>
			<?  
			$proj1=$proj->tot_rec();
			$cccno=mysql_num_rows($proj1);
			//echo $cccno;
			$cc=mysql_query("select * from `real_projects` LIMIT $start, $q_limit");
			
			//echo $ccno;
			while($cc1=mysql_fetch_array($cc)){?>
			<tr>
				<td align="center" class="style4"><?=$cc1['proj_id']?></td>
				<td align="center" class="style4"><?=$cc1['proj_city']?></td>
				<td align="center"><img src="img/<?=$cc1['proj_img']?>" width="160" height="60" /></td>
				<td align="center">
					<a href="fetured.php?act=projadd&id=<?=$cc1['proj_id']?>" class="b">Edit</a>&nbsp;&nbsp;
					<a href="javascript:del(<?=$cc1['cid']?>)" class="b">Delete</a>				</td>
			</tr>
			<? }?>
			<tr>
				<td colspan="4" align="center" class="style8"><? paginate($start,$q_limit,$cccno,$filePath,"");?></td>
			</tr>
			</table>
		</td>
	</tr>
	</table>
	<? }?>
	<? if($_GET['act']=='projadd'){
	$proj->setfield("proj_id");
	$proj_fetch=$proj->single_rec($_GET['id']);
	?>
	<form name="frm1" method="post" enctype="multipart/form-data">
	<table>
		<tr><td colspan="3">&nbsp;</td></tr>
		<? if($_GET['id']<>''){?>
		<tr class="style4">
		  <td colspan="3" align="center">Edit Record</td></tr>
		<? }else{?>
		<tr class="style4">
		  <td colspan="3" align="center">Add new Record</td></tr>
		<? }?>
		<tr><td colspan="3">&nbsp;</td></tr>
		<tr>
			<td class="style4">City</td>
			<td>:</td>
			<td><input type="text" name="proj_name" value="<?=$proj_fetch['proj_name']?>" /></td>
		</tr>
		<? if($_GET['id']<>''){?>
		<tr>
			<td colspan="2">&nbsp;</td>
			<td><img src="img/<?=$proj_fetch['proj_img']?>" width="160" height="60" /></td>
		</tr>
		<? }?>
		<tr><input type="hidden" name="proj_img1" value="<?=$proj_fetch['proj_img']?>">
			<td class="style4">Image</td>
			<td>:</td>
			<td><input type="file" name="proj_img" /></td>
		</tr>
		<tr>
			<td colspan="3" align="center">
				<input type="submit" name="projects" value="submit" />&nbsp;&nbsp;
				<input type="button" name="cancel" value="cancel" onclick="javascript:window.location='fetured.php?act=proj'" />
			</td>
		</tr>
	</table>
	</form>
	<? }?>
	</td>
</tr>
</table>

</body>
</html>
