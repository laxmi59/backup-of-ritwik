<?
include "dbcon.php";
include "class/class.php";
$x=new real_property();
$y=new real_location();
$real_reg=new real_reg();
if($_POST['submit'])
{
	extract($_POST);
	print_r($_POST);
	//echo $_POST['abc'];
	$abc="LS".$_POST['abc'];
	//echo $abc;
	if (!is_array($_POST['list_features']) || sizeof($_POST['list_features']) < 1) {
    	}
       foreach ($_POST['list_features'] as $list_features) {
	   	$arr[] = $list_features;
	   }
		$flr  =  implode("," ,$arr);
	//$insert=mysql_query("insert into `real-list` values(`list_id`, '$r_id', '".$abc."', '$list_type', '$list_property', '$list_project', '$list_country', '$list_city', '$list_loc', '$main1', '$main2', '$list_area', '$list_price', '$list_pricing', '$list_bedroom', '$list_floor_no', '$list_floors', '$list_age', '$list_items', '$list_face', '$list_own', '$flr', '$list_desc', now(),'n')");
	//echo "insert into `real-list` values(`list_id`, '$r_id', '".$abc."', '$list_type', '$list_property', '$list_project', '$list_country', '$list_city', '$list_loc', '$main1', '$main2', '$list_area', '$list_price', '$list_pricing', '$list_bedroom', '$list_floor_no', '$list_floors', '$list_age', '$list_items', '$list_face', '$list_own', '$flr', '$list_desc', now(),'n'";
	echo "<script>location.replace('confirm.php')</script>";
}
?>