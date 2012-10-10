<?
if($_POST['Submit']){
	setcookie("popup_cookie", 1, time()+60); 
}
?>
<form method="post">
<table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>email</td>
    <td><input type="text" name="email"></td>
    <td><input type="submit" name="Submit" value="Submit"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>