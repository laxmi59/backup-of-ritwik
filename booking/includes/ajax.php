<? session_start();

////////////////   		includes			/////////////////////////////////////////
include "config.php";
include "filenames.php";
include "functions.php";
include "classobjects.php";
////////////////		End of Includes		/////////////////////////////////////////
?>
<?
//if($_GET['act']=='get_site'){
	if($_POST['id']){

		$id=$_POST['id'];
		$get_com=mysql_query("select * from cal_company where business_type='$id'");;
		//echo '<select name="site" class="slot_site">'
		while($get_com_fet=mysql_fetch_array($get_com)){
			$sql=mysql_query("select * from cal_site where company='$get_com_fet[id]'");
			while($row=mysql_fetch_array($sql)){
				$id=$row['id'];
				$data=$row['companyname'];
				echo '<option value="'.$id.'">'.$data.'</option>';
			}
		}
		//echo '</select>';
	}
//}
?>