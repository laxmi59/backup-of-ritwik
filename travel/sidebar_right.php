<link href="css/style.css" rel="stylesheet" type="text/css">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
	
	<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0" class="content_back_color">
      <tr>
        <td><img src="images/psd1_14.jpg" width="561" height="36" alt=""><div class="linebreak1"></div></td>
      </tr>
	   <tr>
        <td class="content_back_color"><? $sel_right=mysql_query("select * from ".HOTELS." limit 0,5");
	while($row_right=mysql_fetch_array($sel_right)){?>
	<table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr><td><img src="images/psd1_26.jpg" /></td></tr>
	</table>
	<table width="531" border="0" style="margin-left:13px;" cellpadding="3" cellspacing="3" bgcolor="#FFFFFF">
	 <tr>
        <td width="5%" rowspan="2" valign="middle"><a href="<?=BASE?>show.php?link=<?=$row_right['hot_url']?>"><img border="0" src="hotels/thumb/<?=$row_right['hot_img']?>" /></a></td>
        <td width="74%" class="style2"><b><a class="b" href="<?=BASE?>show.php?link=<?=$row_right['hot_url']?>"><?=$row_right['hot_name']?></a></b></td>
        <td width="21%" class="txtstyle1"><b><?=$row_right['hot_sdesc']?></b></td>
      </tr>
      <tr>
        <td class="txtstyle1">
          <?=$row_right['hot_desc']?>        </td>
        <td align="center"><label>
		<input name="Submit" type="button" id="butt" onclick="javascript:window.location='<?=BASE?>show.php?link=<?=$row_right['hot_url']?>'" />
		</label></td>
      </tr>
	 </table>
	<table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr><td colspan="3"><img src="images/psd1_26-31.jpg" /></td></tr>
	</table>
	<div class="linebreak1"></div>
          <? }?></td>
      </tr>
      <tr>
        <td><img src="images/psd1_33.jpg" width="562" height="14" /></td>
      </tr>
    </table>	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="images/psd1_36.jpg" width="563" height="35" alt="" /></td>
      </tr>
      <tr>
        <td><a href="map.php"><img src="images/psd1_38.jpg" alt="" width="563" height="229" border="0" usemap="#Map" /></a></td>
      </tr>
      <tr>
        <td><img src="images/psd1_41.jpg" width="562" height="15" alt="" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

<map name="Map" id="Map"><area shape="rect" coords="22,13,535,218" href="#" /></map>