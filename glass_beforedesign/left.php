<?
if($_POST['srch1'])
{
	extract($_POST);
	echo "<script>location.replace('".FRONT_INFO."?act=srch&kw=$srch')</script>";
}
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td colspan="2" class="heading1 trpad">Search</td></tr>
<tr><td colspan="2" class="linebreak"></td></tr>
<tr class="content_back_color">
	<td colspan="2" class="trpad">
	<form method="post" action="<?=FRONT_INFO?>?act=srch">
		<input type="text" name="srch" style="width:110px;" />
		<input type="submit" name="srch1" value="GO" />
	</form>
	</td>
</tr>
<tr class="content_back_color"><td colspan="2" class="trpad">&nbsp;</td></tr>
<tr><td colspan="2" class="trpad heading1">Products</td></tr>
<tr class="content_back_color"><td colspan="2">&nbsp;</td></tr>
<?
$pr=mysql_query("select * from ".PRODUCT); 
while($pr1=mysql_fetch_array($pr)){
?>
<tr class="content_back_color">
	<td width="19%">&nbsp;</td>
	<td width="81%"><a href="<?=FRONT_INFO?>?act=single&pid=<?=$pr1['pid']?>"><?=$pr1['prod_name']?></a></td>
</tr>
<tr><td colspan="2" class="linebreak"></td></tr>
<? }?>
</table>
