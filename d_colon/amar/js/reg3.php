<? include "dbcon.php"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>

<?
if(isset($_GET['act']))
{
	$act = $_GET['act'];
}
if(isset($_GET['aid']))
{
	$act = $_GET['aid'];
}

?>
<table border="0" width="100%" cellpadding="1">
<tr><td>
	<? if( $act == 'new' || $act == 'edit' )
		{ ////main if start ?>
	<form name="reg3" method="post" action="" 
		<? if($act == 'edit'){ ''; }?> ><!-- // closing for form tag -->
	<input type="hidden" name="new_action" value="<?=$act?>">
		<? if($act == 'edit')
		{ 
			//echo  "enter Edit" ;
			$qAdmin   = "SELECT * FROM reg1 WHERE id = '".$_GET['id']."' ";
			// echo $qAdmin;
			$select  = mysql_query($qAdmin);
			$row = mysql_fetch_assoc($select);
			extract($row);
		?>
		<input type="hidden" name="edit_id" value="<?=$aid?>">
<? }?>
	<table border="0" align="center" cellpadding="1" bordercolor="#FFFFFF" bgcolor="#F2F2F2">
		<tr><td ><? if($act == 'edit') {?><br></td></tr>
		<tr>
			<td>Name </td>
		  	<td><input type="text" name="fname" value="<?=$fname?>" /></td>
		 </tr>
		 <tr>
		 	<td>last name</td>
			<td><input type="text" name="lname" value="<?=$lname?>" /></td>
		</tr>
	</table>
</form>
<? }} ?>
<table border="1">
	<tr>
		<th>id</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>gender</th>
		<th>dd-mon-yyyy</th>
		<th>country</th>
		<th>postelcode</th>
		<th>mail</th>
		<th>altemail</th>
		<th>action</th>
	</tr>
<?php
include "dbcon.php";
$select=mysql_query("select * from reg1");
$num=mysql_num_rows($select);
echo $num;
if($num)
{
	while($row=mysql_fetch_array($select))
	{
?>
	<tr>
		<td><? echo $row['id'];?></td>
		<td><? echo $row['fname'];?></td>
		<td><? echo $row['lname'];?></td>
		<td><? echo $row['r1'];?></td>
		<td><? echo $row['day']."-"; echo $row['month']."-"; echo $row['year'];?></td>
		<td><? echo $row['country'];?></td>
		<td><? echo $row['pc'];?></td>
		<td><? echo $row['mail'];?></td>
		<td><? echo $row['altemail'];?></td>
		<td><a href="?id=<?=$row['id']?>&act=view"> view &nbsp; </a>|
		    <a href="?id=<?=$row['id']?>&act=edit"> edit &nbsp; </a>|
		    <a href="?id=<?=$row['id']?>&act=delete">&nbsp;delete  </a>
		</td>
	</tr>
<?php }} ?>	
</table>