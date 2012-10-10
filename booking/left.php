<link rel="stylesheet" href="style.css" type="text/css">
<? if($_SESSION['user_id']<>''){?>
<table  border="0" align="center" cellpadding="0" cellspacing="0" >
<tr>
    <td class="heading1">
	<span class="txtstylebig">You are Logged in As </span><br>
	<span class="heading1"><?=$comp['companyname']." -> ".$usr['username']?></span><br><br />
	<a href="logout.php" class="menu4">Click here to Logout and goto Homepage</a><br />
	</td>
</tr>
<tr>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>&nbsp;</td>
</tr>
<tr>
    <td><span class="heading1">Your Current Bookings
	</span>
      <table width="98%"  border="0" cellpadding="0" cellspacing="0" class="table_border">
	<tr class="menu_back_color1">
		<td height="24" class="txtstylebig">Service</td>
		<td height="24" class="txtstylebig">Date</td>
		<td height="24" class="txtstylebig">Time</td>
		<td height="24" class="txtstylebig">Action</td>
	</tr>
	<? 	$slt=mysql_query("select * from cal_booking where user_id='$_SESSION[user_id]' ORDER BY `sloot_time` ASC");
		$sltno=mysql_num_rows($slt);
		if($sltno==''){?>
	<tr>
	  <td colspan="4" align="center" class="errstyle">No Booking Found</td></tr>
	<?	}else{
		while($sltt=mysql_fetch_array($slt)){
		$sst=mysql_fetch_array(mysql_query("select * from cal_slots where id='$sltt[slot_id]'"));
		$sst1=mysql_fetch_array(mysql_query("select * from cal_services where id='$sltt[ser_id]'"));
	?>
	<tr>
		<td class="txtstyle1"><?=$sst1['name']?></td>
		<td class="txtstyle1"><?=date('d/m/y',strtotime($sst['date']))?></td>
		<td class="txtstyle1"><?=$sst['start_time']." ".$sst['merid']?></td>
		<td class="txtstyle1">
			<a href="?bid=<?=$sltt['bid']?>&act=sel">View</a>
				</td>
	</tr>
	<tr><td colspan="4"></td>
	</tr>
	<? } }?>
	</table>	</td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
	<td><span class="heading1">Medical Consent Forms</span><br /><br />
	<table width="99%"  border="0" align="left" cellpadding="0" cellspacing="0" class="table_border">
	<tr class="menu_back_color1">
		<td height="24" class="txtstylebig">Form</td>
		<!--<td height="24" class="txtstylebig">Services</td>
		<td height="24" class="txtstylebig">Description</td>-->
		<td height="24" class="txtstylebig">Link</td>
	</tr>
	<? 
	$slt=mysql_query("select distinct ser_id from cal_booking where user_id='$_SESSION[user_id]'");
	//echo "select distinct service from cal_booking where user_id='$_SESSION[user_id]'";
	$sltno=mysql_num_rows($slt);
	if($sltno<>''){
		while($getVal=mysql_fetch_array($slt)){
		$desc=mysql_fetch_array(mysql_query("select * from cal_services where id=$getVal[ser_id]"));
		
	?>
	<? if($desc['consumer_info']<>''){?>
	<tr height="30">
		<td>consumer information</td>
		<?php /*?><td><?=substr($desc['name'],0,10)?></td>
		<td><?=substr($desc['consumer_info'],0,10)?></td><?php */?>
		<td><a href="<?=CSV_DOWN?>?act=down1&name=consumer_info&id=<?=$desc['id']?>"><img src="images/download.png" border="0" height="20" width="20" /></a></td>
	</tr>
	<? }?>
	<? if($desc['facts_info']<>''){?>
	<tr height="30">
		<td>facts_information</td>
		<?php /*?><td><?=substr($desc['name'],0,10)?></td>
		<td><?=substr($desc['facts_info'],0,10)?></td><?php */?>
		<td><a href="<?=CSV_DOWN?>?act=down1&name=facts_info&id=<?=$desc['id']?>"><img src="images/download.png"  border="0" height="20" width="20"/></a></td>
	</tr>
	<? }?>
	<? if($desc['consent_info']<>''){?>
	<tr height="30">
		<td>consent_information</td>
		<?php /*?><td><?=substr($desc['name'],0,10)?></td>
		<td><?=substr($desc['consent_info'],0,10)?></td><?php */?>
		<td><a href="<?=CSV_DOWN?>?act=down1&name=consent_info&id=<?=$desc['id']?>"><img src="images/download.png"  border="0" height="20" width="20"/></a></td>
	</tr>
	<? }?>
	<? if($desc['additional_info']<>''){?>
	<tr height="30">
		<td>facts_information</td>
		<?php /*?><td><?=substr($desc['name'],0,10)?></td>
		<td><?=substr($desc['additional_info'],0,10)?></td><?php */?>
		<td><a href="<?=CSV_DOWN?>?act=down1&name=additional_info&id=<?=$desc['id']?>"><img src="images/download.png"  border="0" height="20" width="20"/></a></td>
	</tr>
	<? }?>
	<? }}else{?>
	<tr><td colspan="4" align="center" class="errstyle"> No records Found</td></tr>
	<? }?>
	</table>
	</td>
</tr>

</table>
<? }?>
