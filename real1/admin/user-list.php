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
    <th scope="col">sl.no</th>
    <th scope="col">Id</th>
    <th scope="col">Name</th>
	<th scope="col">Email</th>
	<th scope="col">company</th>
	<th scope="col">website</th>
    <th scope="col">Country</th>
	<th scope="col">Location</th>
    <th scope="col">Phones</th>
   	<th scope="col">user type</th>
	<!--<th scope="col">Accept</th>
	<th scope="col">Reject</th>-->
 </tr>
  <? $select = mysql_query("select * from `real-reg` where r_type!='a'");
  	$num=mysql_num_rows($select);
	$sh =mysql_query(" SELECT * FROM `real-reg` where r_type!='a' LIMIT $start, $q_limit");
	if($start==0){	$i=1;}else{ $i=$start+1; }
  while($row=mysql_fetch_array($select)){
  ?>
  <tr>
    <td align="center"><?=$i?></td>
    <td align="center"><a href="mailto:<?=$row['r_un']?>"><?=$row['r_un']?></a></td>
    <td align="center"><?=$row['r_name']?></td>
    <td align="center"><?=$row['r_email']?></td>
	<td align="center"><? if($row['r_company']==''){ echo "none";}else{ echo $row['r_company'];}?></td>
    <td align="center"><? if($row['r_web']==''){ echo "none";}else{ echo $row['r_web'];}?></td>
    <td align="center"><?=$row['country']?></td>
    <td align="center"><?=$row['location']?></td>
    <td align="center"><?=$row['r_ph1']?><br><?=$row['r_ph2']?></td>
	<td align="center">
		<? if($row['r_type']==1){echo "Individual";}
		elseif($row['r_type']==2){echo "Agen/Broker";}
		elseif($row['r_type']==3){echo "Builder";}
		elseif($row['r_type']==4){echo "Corporate";}?>
	</td>
   
	
  <? $i++;}?>
   <tr>
		<td colspan="10"><h5 align="center"><? paginate($start,$q_limit,$num,$filePath,"");?></h5></td>
	</tr>
  
</table>
<?
/*if($act=='accept')
{
	$update=mysql_query("update `user-reg` set user_status='a' where user_id='".$_GET['id']."'");
	echo "<script>location.replace('main.php?lk=user')</script>";
}
if($act=='reject')
{
	$update=mysql_query("update `user-reg` set user_status='r' where user_id='".$_GET['id']."'");
	echo "<script>location.replace('main.php?lk=user')</script>";
}*/

?>

	</td>
</tr>
</table>