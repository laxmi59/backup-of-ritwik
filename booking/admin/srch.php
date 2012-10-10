<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="txtstyle1">
  <tr>
    <td width="12%" class="txtstyle1big">&nbsp;</td>
    <td width="12%">&nbsp;</td>
    <td width="12%" class="txtstyle1big">&nbsp;</td>
    <td width="12%">&nbsp;</td>
    <td width="12%">&nbsp;</td>
    <td width="12%">&nbsp;</td>
    <td width="12%">&nbsp;</td>
    <td width="12%"><input type="button" name="print" value="Print" onclick="javascript:window.location='../includes/csv.php?act=print_slots_booking&sid=<?php echo $_GET['sid']?>&cid=<?php echo $_GET['companyid']?>&dt=<?php echo $_GET['dt']?>&siteid=<?php echo $_GET['siteid']?>'" /></td>
  </tr>
  <tr>
    <td class="txtstyle1big">Sort by Company </td>
    <td><select name="siteid" onchange="return ByCompany(this.value)">
      <option value="">select</option>
      <?	$sel_company=mysql_query("select * from cal_company");
			while($company_fet=mysql_fetch_array($sel_company)){?>
      <option value="<?=$company_fet['id']?>" <? if($_GET['companyid']==$company_fet['id']){?> selected="selected"<? }?>>
        <?=$company_fet['companyname']?>
        </option>
      <? }?>
    </select>    </td>
    <td class="txtstyle1big">Sort by Site </td>
    <td><select name="clt" onchange="return BySite(<?=$_GET['companyid']?>,this.value)">
      <option value="">select</option>
      <?	$sel_site=mysql_query("select * from cal_site where company=$_GET[companyid]");
			while($site_fet=mysql_fetch_array($sel_site)){?>
      <option value="<?=$site_fet['id']?>" <? if($_GET['siteid']==$site_fet['id']){?> selected="selected"<? }?>>
        <?=$site_fet['name']?>
        </option>
      <? }?>
    </select>    </td>
    <td>Sort by Service</td>
    <td><select name="sts" onchange="return ByService(<?=$_GET['companyid']?>,<?=$_GET['siteid']?>,this.value)">
      <option value="">select</option>
      <?	$sel_slots=mysql_query("select distinct service from cal_slots where company=$_GET[companyid] and site=$_GET[siteid]");
	  while($slot_fet=mysql_fetch_array($sel_slots)){
	  $sel_cat=mysql_query("select * from cal_services where id=$slot_fet[service] ");
			while($cat_fet=mysql_fetch_array($sel_cat)){?>
      <option value="<?=$cat_fet['id']?>" <?php if($_GET['sid']==$cat_fet['id']){?> selected="selected"<? }?>>
        <?=$cat_fet['name']?>
        </option>
      <? }}?>
    </select></td>
    <td>Sort by Date </td>
    <td><select name="dt" onchange="return ByDate(<?=$_GET['companyid']?>,<?=$_GET['siteid']?>,<?=$_GET['sid']?>,this.value)">
      <option>select</option>
      <? if($_GET['sid']<>''){
			$qur=mysql_query("select distinct date from cal_slots where service='$_GET[sid]' and company=$_GET[companyid] and site=$_GET[siteid] order by date");
			while($qur_fet=mysql_fetch_array($qur)){?>
      <option value="<? echo $qur_fet['date'];?>" <? if($qur_fet['date']==$_GET['dt']){?> selected="selected"<? }?>><? echo $qur_fet['date'];?></option>
      <? }}?>
    </select>    </td>
	<td width="2%">&nbsp;</td>
  </tr>
  <tr>
    <td class="txtstyle1big">&nbsp;</td>
    <td>&nbsp;</td>
    <td class="txtstyle1big">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
</table>
