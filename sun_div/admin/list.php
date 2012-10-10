<? 
include "../db/dbcon.php";
if($_GET['act'])
{
	$act=$_GET['act'];
}
require_once("pagination.php");
/// For pagination
$q_limit = 10;
$errMsg = 0;
//$a=1;
if( isset($_GET['start']) )
{
	$start = $_GET['start'];
	
}
else
{
	$start = 0;
}

$filePath = "user.php?";

?>
<table width="80%" align="center" style="border:1px solid">
<tr>
	<td><? include "header.php"?>
</tr>
<tr>
	<td>
	<br>
	<table width="90%" border="0" align="center" cellspacing="0" cellpadding="0">
  <tr>
    <td style="padding-left:10px;"><strong>sl.no</strong></td>
    <td style="padding-left:10px;"><strong>Id</strong></td>
	<td style="padding-left:10px;"><strong>Transcation type</strong></td>
    <td style="padding-left:10px;"><strong>Property details</strong></td>
	<td style="padding-left:10px;"><strong>Specification</strong></td>
	<td style="padding-left:10px;"><strong>Features</strong></td>
    <td style="padding-left:10px;"><strong>Accept/Reject</strong></td>
 </tr>
  <? $select = mysql_query("select * from `real-list`");
  	$num=mysql_num_rows($select);
	$sh =mysql_query(" SELECT * FROM `real-list` LIMIT $start, $q_limit");
	if($start==0){	$i=1;}else{ $i=$start+1; }
    while($row=mysql_fetch_array($select)){
    //include "class.php";
	//$a=new location();
	//$a->location1($row['list_city']);
	//$b->location2($row['list_location']);
   ?>
   	<? $aa=mysql_fetch_array(mysql_query("select * from `real-city` where cid='".$row['list_city']."'"));?>
	<? $aaa=mysql_fetch_array(mysql_query("select * from `real-area` where aid='".$row['list_location']."'"));?>
  <tr>
    <td style="padding-left:10px;"><?=$i?></td>
   <td style="padding-left:10px;" valign="top">
		Id:<?=$row['list_id']?><br>
		Posted on: <?=$row['list_date']?>
	</td>
    <td style="padding-left:10px;" valign="top">
		<?=$row['list_type']?><br />
		<?=$row['list_property']?><br />
	</td>
	<td style="padding-left:10px;" valign="top">
		<?=$row['list_project']?><br />
		<?=$row['list_addr']?><br />
		<?=$aa['city_name']?><br />
		<?=$aaa['name']?>
	</td>
    <td style="padding-left:10px;" valign="top">
		area<?=$row['list_area']?>sq ft<br>
		<?=$row['list_bedroom']?>Bedrooms
	</td>
	<td style="padding-left:10px;" valign="top">
		<?=$row['list_price']?><br>
		<? if($row['list_pricing']=='yes'){ echo "Negotiable";}else{ echo "not";}?>
	</td>
    <td align="center" valign="top">
		<? if($row['list_status']=='r'){?>
		<a href="list.php?act=accept&id=<?=$row['list_id']?>">Accept</a>
		<? }else{?>
		<a href="list.php?act=reject&id=<?=$row['list_id']?>">Reject</a>
		<? }?>
    </td>
	<? $i++;}?>
   <tr>
		<td colspan="10"><h5 align="center"><? paginate($start,$q_limit,$num,$filePath,"");?></h5></td>
	</tr>
  
</table>
<?
if($act=='accept')
{
	$update=mysql_query("update `real-list` set list_status='a' where list_id='".$_GET['id']."'");
	echo "<script>location.replace('list.php')</script>";
}
if($act=='reject')
{
	$update=mysql_query("update `real-list` set list_status='r' where list_id='".$_GET['id']."'");
	echo "<script>location.replace('list.php')</script>";
}

?>

	</td>
</tr>
</table>