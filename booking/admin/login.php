<link href="../style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/reg.js"></script>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="mainadmintab">
<tr><td></td></tr>
<tr>
	<td valign="middle" align="center" class="errstyle"><?=$_GET['err']?>
	<form method="post" action="../includes/admin_action.php?act=login" onsubmit="return admin_login(this)">
	<table width="40%" border="0" align="center" cellpadding="0" cellspacing="0" class="menu_back_color1">
	<tr><td colspan="3"><div align="center" class="mainhead1">Admin Login </div></td></tr>
      <tr class="page">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr class="page">
        <td class="txtstylebig trpad">UserName</td>
        <td>:</td>
        <td><input type="text" name="username" /></td>
      </tr>
      <tr class="linebreak">
        <td colspan="3"></td>
        </tr>
      <tr class="page">
        <td class="txtstylebig trpad">Password</td>
        <td>:</td>
        <td><input type="password" name="password" /></td>
      </tr>
      <tr class="linebreak">
        <td colspan="3"></td>
        </tr>
      <tr class="page">
        <td colspan="3"><div align="center">
          <input type="submit" name="submit" value="submit" />
        </div></td>
        </tr>
      <tr class="page">
        <td colspan="3">&nbsp;</td>
      </tr>
    </table>
	</form>
	</td>
  </tr>
</table>
