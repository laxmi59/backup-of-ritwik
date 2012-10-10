<? session_start();
session_unset();
////////////////   		includes			/////////////////////////////////////////
include "includes/config.php";
include "includes/filenames.php";
include "includes/functions.php";
include "includes/classobjects.php";
////////////////		End of Includes		/////////////////////////////////////////
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=WEBSITE_NAME?></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/reg.js"></script>
</head>

<body>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="sitewidth">
<tr><td valign="top"><? include FRONT_HEADER?></td></tr>
<tr>
	<td align="center" class="page txtstyle"><span class="errstyle"><?=$_GET['err']?></span>
	<form method="post" action="<?=USER_DATA?>?act=login&pid=<?=$_GET['pid']?>" onsubmit="return admin_login(this)">
	<!--<form method="post" onsubmit="return admin_login(this)">-->
	<table width="40%" border="0" align="center" cellpadding="0" cellspacing="0" class="menu_back_color1">
	<tr><td colspan="3"><div align="center" class="mainhead1">User Login </div></td></tr>
      <tr class="content_back_color">
        <td width="34%">&nbsp;</td>
        <td width="5%">&nbsp;</td>
        <td width="61%">&nbsp;</td>
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
	   <tr><td colspan="3" class="content_back_color" align="center">
	   <span class="txtstyle1">Forget Password </span>
	   <a class="a" href="pass1.php">Click here</a></td>
	   </tr>
	   <tr><td colspan="3" class="content_back_color" align="center">
	   <span class="txtstyle1">Don't u have Login ID </span>
	   <a class="a" href="reg.php?pid=<?=$_GET['pid']?>">Register here</a></td>
	   </tr>
    </table>
	</form>
	</td>
  </tr>
<tr><td valign="top"><? include FRONT_FOOTER?></td></tr>
<tr><td></td></tr>
</table>
</body>
</html>
