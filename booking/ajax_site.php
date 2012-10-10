<? session_start();
////////////////   		includes			/////////////////////////////////////////
include "includes/config.php";
include "includes/filenames.php";
include "includes/functions.php";
include "includes/classobjects.php";
//include "ajax_site.php";
////////////////		End of Includes		/////////////////////////////////////////
?>
<?
if($_GET['act']=='get_site_state'){
	$id=$_GET['q'];
	$cid=$_GET['q1'];
	echo '<select name="site" id="site" style="width:200px;"><option>select</option>';
		$sql=mysql_query("select * from cal_site where state='$id' and company='$cid'");
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
	//echo "select * from cal_slots a, cal_booking where a.site='$id1' and a.service='$id' and a.date >= now() and a.id!=b.slot_id ";
	//exit;
	echo '<select name="appointment" class="slot_site" style="width:200px;"><option>select</option>';
		$sql=mysql_query("select * from cal_slots  where site='$id1' and service='$id' and available > 0 and date >= now()");
		while($row=mysql_fetch_array($sql)){
			$tt=mysql_num_rows(mysql_query("select * from cal_booking where slot_id=$row[id]"));
			if($tt==0){
				$id=$row['id'];
				$data=date('d/m/y',strtotime($row['date'])).", ".$row['start_time'].", ".$row['available'];
				echo '<option value="'.$id.'">'.$data.'</option>';
			}else{ continue;}
		}
	echo '</select>';
}
?>