<table width="95%" align="center" cellspacing="0" cellpadding="0" style="border:1px solid" class="menu_back_color1">
<tr><td height="32" class="heading1 trpad">Our Products</td></tr>
<tr>
	<td>
	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="content_back_color">
	<tr><td>&nbsp;</td></tr>
	<tr>
	<?	
		$pr=mysql_query("select * from ".PRODUCT); 
		$num=mysql_num_rows($pr);			
		if($num){
			$rows=1;
			while($pr1=mysql_fetch_array($pr)){?>
		<td align="center"> 
		<table cellpadding="0" cellspacing="0" >
		<tr>
			<td align="center">
			<? if($pr1['prod_img'] == ""){ ?>
				<a href="<?=FRONT_INFO."?act=single&pid=".$pr1['pid']?>"><img src="images/no_picture.gif" border="0" /></a>
			<? }else {?>
				<a href="<?=FRONT_INFO."?act=single&pid=".$pr1['pid']?>"><img src="product/thumb/<?=$pr1['prod_img']?>" border="0" /></a>
			<? }?>						
			</td>
		</tr>
		</table>				
		</td>
		<?
			$rows++;
			if($rows == 4){
				$rows=1;
		?>
		</tr><tr><td>&nbsp;</td></tr><tr>
		<? }//if
		}//while
		}else{?>
		<? }?>	
	</tr>
	<tr><td>&nbsp;</td></tr> 
    </table>			
	</td>
</tr>
</table>
