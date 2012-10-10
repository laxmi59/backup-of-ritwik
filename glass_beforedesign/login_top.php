<script type="text/javascript">
function FillUserName() {
	if (document.getElementById('username').value == '') {
           document.getElementById('username').value = 'Username';
    }
}
function FillPassword() {
	if (document.getElementById('password').value == '') {
		document.getElementById('password').value = 'Password';
		var inputPass = document.getElementById('pwd');
		inputPass.type = 'password';
	}
}
function ClearUserName(id) {
	if (document.getElementById(id).value == 'Username') {
		document.getElementById(id).value = '';
	}
}
function ClearPassword(id) {
	if (document.getElementById(id).value == 'Password') {
		document.getElementById(id).value = '';
		var inputPass = document.getElementById('Password');
		inputPass.type = 'password';
	   // inputPass.focus();
	}
}
</script>
<form method="post" action="<?=USER_DATA?>?act=login&pid=<?=$_GET['pid']?>&page=<?=$page[3]?>" onsubmit="return admin_login(this)">
<div class="errstyle" align="center"><?=$_GET['err1']?></div>
<div class="linebreak"></div>
<table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
<tr class="content_back_color">
	<td class="txtstyle">UserName</td>
    <td><input type="text" name="username" id="username" size="10" value="Username" onblur="javascript:FillUserName();" onclick="javascript:ClearUserName(this.id);" /></td>
    <td class="txtstyle">Password</td>
    <td><input type="password" name="password" id="password" size="10" value="Password" onfocus="javascript:ClearPassword(this.id);" onblur="javascript:FillPassword();"/></td>
    <td><input type="submit" name="submit" value="GO" /></td>
</tr>
</table>
</form>