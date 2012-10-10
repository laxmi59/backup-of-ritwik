<?
session_start();
session_unset();
include "../dbcon.php";

if($_POST['submit'])
{
	extract ($_POST);
	//print_r($_POST);
	$select=mysql_query("select * from `real-admin` where r_un='".$_POST['aun']."' and r_pw='".$_POST['pw']."' and `r_type`='a'");
	$num=mysql_num_rows($select);
	$row=mysql_fetch_array($select);
	if($num=='')
	{
		echo "invalid username";
	}
	else
	{
		$_SESSION['aid']=$row['r_id'];
		$_SESSION['aun']=$aun;
		echo $_SESSION['aun'];
		echo "<script>location.replace('main.php?lk=home')</script>";
	}
}?>
<style type="text/css">
.container{ width:50%; height:500px;}
</style>
<form method="post">
<fieldset>
<legend>Admin Login page</legend>
<table width="80%" align="center">
	<tr><td colspan="3">&nbsp;</td></tr>
  <tr>
    <td>User Name</td>
    <td>:</td>
    <td><input type="text" name="aun" /></td>
  </tr>
   <tr>
    <td>Password</td>
    <td>:</td>
    <td><input type="password" name="pw"></td>
  </tr>
  <tr>
    <td align="center" colspan="3"><input type="submit" name="submit" value="submit" /></td>
  </tr>
  <tr><td colspan="3">&nbsp;</td></tr>
</table>
</fieldset>
</form>
