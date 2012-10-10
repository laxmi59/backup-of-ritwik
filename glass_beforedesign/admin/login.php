<?php /*?><?
if($_POST['submit']){
	extract($_POST);
	//print_r($_POST);
	$qur=mysql_query("select * from ".ADM." where `username`='$username' and `password`='$password'");
	//echo "select * from".ADM." where `username`='$username' and `password`='$password'";
	$qnum=mysql_num_rows($qur);
	$qfet=mysql_fetch_array($qur);
	if($qnum==''){
		echo "<script>location.replace('../admin/index.php?err=Invalid Username or Password')</script>";
		echo "err";
	}else{
		$_SESSION['admin_id']=$qfet['aid'];
		$_SESSION['admin_name']=$qfet['username'];
		echo "<script>location.replace('../admin/myaccount.php')</script>";
		echo "<script>location.replace('myaccount.php')</script>";
	}
}
?><?php */?>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<table border="0" align="center" cellpadding="0" cellspacing="0" class="mainadmintab">
<tr><td></td></tr>
<tr>
	<td align="center" class="errstyle"><?=$_GET['err']?>
	<form method="post" action="../includes/admin_action.php?act=login" onsubmit="return admin_login(this)">
	<!--<form method="post">-->
	<table width="40%" border="0" align="center" cellpadding="0" cellspacing="0" class="menu_back_color1">
	<tr><td colspan="3"><div align="center" class="mainhead1">Admin Login </div></td></tr>
      <tr class="content_back_color">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr class="content_back_color">
        <td class="txtstylebig trpad">UserName</td>
        <td>:</td>
        <td><input type="text" name="username" /></td>
      </tr>
      <tr class="linebreak">
        <td colspan="3"></td>
        </tr>
      <tr class="content_back_color">
        <td class="txtstylebig trpad">Password</td>
        <td>:</td>
        <td><input type="password" name="password" /></td>
      </tr>
      <tr class="linebreak">
        <td colspan="3"></td>
        </tr>
      <tr class="content_back_color">
        <td colspan="3"><div align="center">
          <input type="submit" name="submit" value="submit" />
        </div></td>
        </tr>
      <tr class="content_back_color">
        <td colspan="3">&nbsp;</td>
      </tr>
    </table>
	</form>
	</td>
  </tr>
</table>
