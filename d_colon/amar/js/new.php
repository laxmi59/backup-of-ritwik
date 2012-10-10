<?
if(isset($_GET['act']))
{
	$act = $_GET['act'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>

<!-- retrive all records from database -->

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
		<td><a href="new.php?id=<?=$row['id']?>&act=view"> view &nbsp; </a>|
		    <a href="new.php?id=<?=$row['id']?>&act=edit"> edit &nbsp; </a>|
		    <a href="new.php?id=<?=$row['id']?>&act=delete">&nbsp;delete  </a>
		</td>
	</tr>
<?php }} ?>	
</table>

<!-- retrive selected record from databse -->

<?php
if($act == 'view')
{
	$view=mysql_query("select * from reg1 where id='".$_GET['id']."'");
	$row=mysql_fetch_array($view);
?>
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
</tr>
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
</tr>
<?php } ?>	
</table>

<!-- edit and update the selected record in database -->


<?php
if($act == 'edit')
{
include "dbcon.php";
//extract ($_POST);
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$r1=$_POST['r1'];
$month=$_POST['mon'];
$day=$_POST['dd'];
$year=$_POST['year'];
$country=$_POST['country'];
$pc=$_POST['pc'];
$altemail=$_POST['altemail'];
	$select=mysql_query("select * from reg1 where id= '".$_GET['id']."'");
	$row=mysql_fetch_array($select);
	if($_POST['b1']=='save')
	{	
		$sql = mysql_query ("update reg1 set fname='$fname', lname='$lname', r1='$r1', day='$day', month='$mon', year='$year',
		 country='$country', pc='$pc', altemail='$altemail' where id= '".$_GET['id']."' ");
		echo "<script>";
		echo "location.replace('new.php')";
		echo "</script>";
	}
?>
<table border="1">
<form name="reg" method="post" >
<tr>
	<th>id</th>
	<th>First Name</th>
	<th>Last Name</th>
	<th>gender</th>
	<th>dd</th>
	<th>mon</th>
	<th>year</th>
	<th>country</th>
	<th>postelcode</th>
	<th>altemail</th>
</tr>
<tr>
	<td><input type="text" size="4" value="<? echo $row['id'];?>" /></td>
	<td><input type="text" name="fname" id="fname" value="<? echo $row['fname'];?>" /></td>
	<td><input type="text" name="lname" id="lname" value="<? echo $row['lname'];?>" /></td>
	<?php /*?><td><input type="text" size="6" name="r1" id="r1" value="<? echo $row['r1'];?>" /></td><?php */?>
	<td><select name="r1">
	  <option value="<? echo $row['r1'];?>"><? echo $row['r1'];?></option>
	  <option value="female">female</option>
	  <option value="male">male</option>
	</select></td>
	<?php /*<td><input type="text" size="2" name="dd" id="dd" value="<? echo $row['day'];?>" /></td>*/ ?>
	<td><select name="dd">
	  	<option value="<? echo $row['day'];?>"><? echo $row['day'];?></option>	  	<option value="01">01</option>
		<option value="02">02</option>	  	<option value="03">03</option>	  	<option value="04">04</option>
		<option value="05">05</option>	  	<option value="06">06</option>	  	<option value="07">07</option>
		<option value="08">08</option>	  	<option value="09">09</option>	  	<option value="10">10</option>
		<option value="11">11</option>	  	<option value="12">12</option>	  	<option value="13">13</option>
		<option value="14">14</option>	  	<option value="15">15</option>	  	<option value="16">16</option>
		<option value="17">17</option>	  	<option value="18">18</option>	  	<option value="19">19</option>
		<option value="20">20</option>	  	<option value="21">21</option>	  	<option value="22">22</option>
		<option value="23">23</option>	  	<option value="24">24</option>	  	<option value="25">25</option>
		<option value="26">26</option>		<option value="27">27</option>	  	<option value="28">28</option>
		<option value="29">29</option>	  	<option value="30">30</option>	  	<option value="31">31</option>    </select></td>
	<?php /*<td><input type="text" size="3" name="mon" id="mon" value="<? echo $row['month'];?>" /></td>*/?>
	<td><select name="mon" style="max-width:50px">
	  	<option value="<? echo $row['month'];?>"><? echo $row['month'];?></option>	  		<option value="jan">jan</option>	  	<option value="feb">feb</option>
	  	<option value="mar">mar</option>	  	<option value="apr">apr</option>	  	<option value="may">may</option>
	  	<option value="jun">jun</option>	  	<option value="jul">jul</option>	  	<option value="aug">aug</option>
	  	<option value="sep">sep</option>	  	<option value="oct">oct</option>	  	<option value="nov">nov</option>
	  	<option value="dec">dec</option>    </select></td>
	<?php /*<td><input type="text" size="4" name="year" id="year" value="<? echo $row['year'];?>" /></td>*/?>
	<td><select name="year" style="max-width:60px">
	  	<option value="<? echo $row['year'];?>"><? echo $row['year'];?></option>	  	<option value="1980">1980</option>	  	<option value="1981">1981</option>
	  	<option value="1982">1982</option>	  	<option value="1983">1983</option>	  	<option value="1984">1984</option>
	  	<option value="1985">1985</option>	  	<option value="1986">1986</option>	  	<option value="1987">1987</option>
		<option value="1988">1988</option>	  	<option value="1989">1989</option>	 	<option value="1990">1990</option>
	  	<option value="1991">1991</option>	  	<option value="1992">1992</option>	  	<option value="1993">1993</option>
	  	<option value="1994">1994</option>	  	<option value="1995">1995</option>	  	<option value="1996">1996</option>
	  	<option value="1997">1997</option>	  	<option value="1998">1998</option>	  	<option value="1999">1999</option>
	  	<option value="2000">2000</option>	  	<option value="2001">2001</option>	  	<option value="2002">2002</option>
	  	<option value="2003">2003</option>	  	<option value="2004">2004</option>	  	<option value="2005">2005</option>
	  	<option value="2006">2006</option>	  	<option value="2007">2007</option>	  	<option value="2008">2008</option>
		</select></td>
	<?php /*<td><input type="text" name="country" id="country" value="<? echo $row['country'];?>" /></td>*/?>
	<td><select name="country" style="max-width:70px">
	  <option value="<? echo $row['country'];?>"><? echo $row['country'];?></option>	  <option value="India">India</option>	
	  <option value="pakistan">pakistan</option>	  <option value="Bangladesh">Bangladesh</option>
	  <option value="Sri Lanka">sri lanka</option>	  </select></td>
	<td><input type="text" size="6" name="pc" id="pc" value="<? echo $row['pc'];?>" /></td>
	<td><input type="text" name="altemail" id="altemail" value="<? echo $row['altemail'];?>" /></td>
</tr>
<tr><td><input type="submit" name="b1" id="b1" value="save" /></td></tr>
<?php } ?>
</form>	
</table>

<!-- Delete selected record from database -->

<?php 
include "dbcon.php";
if($act == 'delete')
{
	$delete=mysql_query("delete from reg1 where id='".$_GET['id']."'");
	echo "<script>";
	echo "location.replace('new.php')";
	echo "</script>";
}
?>


</body>
</html>
