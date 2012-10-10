<div><h2>My Labels</h2></div>
<div>&nbsp;</div> <table align="left" class="account-table" width="100%">
  <tbody>
	<tr>
	  <th>Label ID</th>
	  <th>Bought From</th>
	  <th>Date Activated</th>
	  <th>Active</th>
	</tr>
	<?php $getLabelListQry=mysql_query("SELECT * FROM `contatactdetails2labels` a, labels b WHERE a.contactdet_id =$_SESSION[userid] AND a.`label_id` = b.`label_id`");
	if(mysql_num_rows($getLabelListQry)<>''){
	while($fetLabelListQry=mysql_fetch_object($getLabelListQry)){?>
	<tr>
	  <td><?php echo $fetLabelListQry->labelno?></td>
	  <td>Recovery link</td>
	  <td><?php echo $fetLabelListQry->activation_date?></td>
	  <td><?php if($fetLabelListQry->status == 1) echo "Yes"; else echo "No";?></td>
	</tr>
	<?php }//while
	}else{?>
	<tr>
	  <td colspan="4" align="center"><div class="validation-advice" style="font-size:14px" align="center"><b>No Lables Found</b></div></td>
	</tr>
	<?php }?>
  </tbody>
</table>