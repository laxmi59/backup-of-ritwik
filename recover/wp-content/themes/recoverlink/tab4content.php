<div><h2>Transaction History</h2></div>
<div>&nbsp;</div>
 <table class="account-table" width="100%">
  <tbody>
	<tr>
	  <th >Date</th>
	 <!-- <th >Transaction Number</th>-->
	  <th >Card Description</th>
	  <!--<th >Items</th>-->
	  <th >Description</th>
	</tr>
	<?php $getTansctionsQry=mysql_query("SELECT * FROM `contatactdetails2labels` a, labels b, contactdetails c
WHERE a.contactdet_id =$_SESSION[userid] AND a.`label_id` = b.`label_id` AND a.`contactdet_id` = c.`contactdet_id`");
	$lablecount=mysql_num_rows(mysql_query("SELECT * FROM `contatactdetails2labels` a, labels b WHERE a.contactdet_id =$_SESSION[userid] AND a.`label_id` = b.`label_id`"));
	if($lablecount <> 0){
	while($fetTansctionsQry=mysql_fetch_object($getTansctionsQry)){?>
	<tr>
	  <td><?php echo $fetTansctionsQry->activation_date?> </td>
	 <!-- <td>1297166527210 </td>-->
	  <td><?php echo $fetTansctionsQry->cardtype." - ".$fetTansctionsQry->cardnumber?> </td>
	  <?php /*?><td><?php echo "1"?></td><?php */?>
	  <td>Activation of labelset with label ID <?php echo $fetTansctionsQry->labelno?></td>
	</tr>
	<?php }//while
	}else{?>
	<tr>
	  <td colspan="5" align="center"><div class="validation-advice" style="font-size:14px" align="center"><b>No Transaction History</b></div></td>
	</tr>
	<?php }?>
  </tbody>
</table>