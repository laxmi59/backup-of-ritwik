<? session_start();?>
<link href="../css/style1.css" type="text/css" rel="stylesheet" />
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"  >
<tr><td><h1 align="center"> Welcome &nbsp;<?=$_SESSION['admin_name']?></h1></td></tr>
<tr><td>
	<table width="100%" align="center" cellpadding="0" cellspacing="0">
	<tr bgcolor="#000000" height="20" >
		<td width="65">&nbsp;</td>
		<td width="109" align="center"><a href="<?=ADM_HOME?>" class="whitelink"><strong>Home</strong></a></td>
		<td width="109" align="center"><a href="<?=ADM_HOTELS."?act=show_cat_prod"?>" class="whitelink"><strong>Hotels</strong></a></td>
		<td width="190" align="center"><a href="<?=ADM_HOME."?act=pass"?>" class="whitelink"><strong>Change Password</strong></a></td>
   		<td width="115" ><a href="<?=ADM_LOGOUT?>" class="whitelink"><strong>Logout</strong></a></td>
		<td width="122">&nbsp;</td>
	</tr>
	</table>
</td></tr>
</table>


                 