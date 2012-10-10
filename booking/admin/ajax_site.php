<? session_start();

////////////////   		includes			/////////////////////////////////////////
include "../includes/config.php";
include "../includes/filenames.php";
include "../includes/functions.php";
include "../includes/classobjects.php";
////////////////		End of Includes		/////////////////////////////////////////
?>
<?
if($_GET['act']=='get_site'){
	$id=$_GET['q'];
	$get_com=mysql_query("select * from cal_company where id='$id'");;
	echo '<select name="site" class="slot_site" id="site" onchange=tt(this.value)><option>select</option>';
	while($get_com_fet=mysql_fetch_array($get_com)){
		$sql=mysql_query("select * from cal_site where company='$get_com_fet[id]'");
		while($row=mysql_fetch_array($sql)){
			$id=$row['id'];
			$data=$row['name'];
			echo '<option value="'.$id.'">'.$data.'</option>';
		}
	}
	echo '</select>';
}
?>
<?
if($_GET['act']=='get_site_state'){
	$id=$_GET['q'];
	echo '<select name="site" class="slot_site"><option>select</option>';
		$sql=mysql_query("select * from cal_site where state='$id'");
		while($row=mysql_fetch_array($sql)){
			$id=$row['id'];
			$data=$row['name'];
			echo '<option value="'.$id.'">'.$data.'</option>';
		}
	echo '</select>';
}
?>
<?
if($_GET['act']=='get_slots'){
	$id=$_GET['q'];
	$id1=$_GET['q1'];
	echo '<select name="appointment" class="slot_site"><option>select</option>';
		$sql=mysql_query("select * from cal_slots where site='$id1' and service='$id'");
		while($row=mysql_fetch_array($sql)){
			$id=$row['id'];
			$data=$row['date'];
			echo '<option value="'.$id.'">'.$data.'</option>';
		}
	echo '</select>';
}
?>
<?
if($_GET['act']=='get_Date'){
	$id=$_GET['q'];
	$get_com=mysql_query("select distinct date from cal_slots where service='$id'");;
	echo '<select name="dt" id="dt" onchange="ByService(this.value,$id)"><option>select</option>';
	while($get_com_fet=mysql_fetch_array($get_com)){
		//$id=$get_com_fet['id'];
		$data=$get_com_fet['date'];
		echo '<option value="'.$data.'">'.$data.'</option>';
	}
	echo '</select>';
}
?>