<? include "../db/dbcon.php";
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

$filePath = "main.php?lk=user&";

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
	<td style="padding-left:10px;"><strong>Loan</strong></td>
    <td style="padding-left:10px;"><strong>Accept/Reject</strong></td>
 </tr>
  <? $select = mysql_query("select * from `real-requirement`");
  	$num=mysql_num_rows($select);
	$sh =mysql_query(" SELECT * FROM `real-requirement` LIMIT $start, $q_limit");
	if($start==0){	$i=1;}else{ $i=$start+1; }
    while($row=mysql_fetch_array($select)){
    //include "class.php";
	//$a=new location();
	//$a->location1($row['list_city']);
	//$b->location2($row['list_location']);
   ?>
   	<? $aa=mysql_fetch_array(mysql_query("select * from `real-city` where cid='".$row['req_city']."'"));?>
	<? $aaa=mysql_fetch_array(mysql_query("select * from `real-area` where aid='".$row['req_area']."'"));?>
  <tr>
    <td align="center"><?=$i?></td>
   <td style="padding-left:10px;" valign="top">
		Id:<?=$row['r_id']?><br>
		Posted on: <?=$row['req_date']?>
	</td>
    <td style="padding-left:10px;">
		<?=$row['req_type']?><br />
		<?=$row['req_property']?><br />
	</td>
	<td style="padding-left:10px;">
		<?=$aa['city_name']?><br />
		<?=$aaa['name']?>
	</td>
    <td style="padding-left:10px;" valign="top">
		area<?=$row['req_place']?>sq ft<br>
		<?=$row['req_bedroom']?>Bedrooms
	</td>
	<td style="padding-left:10px;" valign="top"><?=$row['req_budject1']?>to<?=$row['req_budject2']?></td>
	<td style="padding-left:10px;"><? if($row['req_loan']=='yes'){?>
		<?=$row['req_loan_amt']?><br />
		<?=$row['req_job']?><br />
		<?=$row['req_income']?>
		<? }else{?>
		<? echo "no"; }?>
	</td>
    <td align="center">
		<? if($row['req_status']=='r'){?>
		<a href="post.php?act=accept&id=<?=$row['req_id']?>">Accept</a>
		<? }else{?>
		<a href="post.php?act=reject&id=<?=$row['req_id']?>">Reject</a>
		<? }?>
    </td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	<? $i++;}?>
   <tr>
		<td colspan="10"><h5 align="center"><? paginate($start,$q_limit,$num,$filePath,"");?></h5></td>
	</tr>
  
</table>
<?
if($act=='accept')
{
	$update=mysql_query("update `real-requirement` set req_status='a' where req_id='".$_GET['id']."'");
	echo "<script>location.replace('post.php')</script>";
}
if($act=='reject')
{
	$update=mysql_query("update `real-requirement`  set req_status='r' where req_id='".$_GET['id']."'");
	//echo "update `real-requirement` set req_status='a' where req_id='".$_GET['id']."'";
	echo "<script>location.replace('post.php')</script>";
}

?>

	</td>
</tr>
</table>