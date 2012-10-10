<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#updateStatus').click(function UpdateStatus(){
		var itemno = $('#itemno1').val();
		jQuery.ajax({type: "POST",url: "tab6ajaxresponser.php",data: 'itemno='+ itemno,cache: false,
			success: function(response){
				if(response == 1){
					$('#msg').innerHTML("your request sent successfully. your request appoved shortly")
				}else if(response == 0){
					$('#msg').innerHTML("your request has some try again later")
				}
			}
		});
	});
});
</script>
<div><h2>Lost Item Information</h2></div>
<div>&nbsp;</div> 
<div class="validation-advice" style="font-size:14px" align="center"><b>If you want get the item through shipping? click on "ship item". shipping charges are $22.06.</b> </div>
<div>&nbsp;</div> 
<table align="left" class="account-table" width="100%">
  <tbody>
	<tr>
	  <th>Label No</th>
	  <th>First Name</th>
	  <th>Home Phone</th>
	  <th>Work Phone</th>
	  <th>Cell Phone</th>
	  <th>Best Contact</th>
	  <th>Action</th>
	  </tr>
	<?php $getLabelListQry=mysql_query("SELECT itf.firstname, itf.lastname, itf.ph_home, itf.ph_work, itf.ph_cell, itf.best_contact, itf.itemlabel FROM labels l, contactdetails cd, contatactdetails2labels cdl, items_found itf WHERE cd.contactdet_id =$_SESSION[userid] AND cd.contactdet_id = cdl.contactdet_id AND cdl.label_id = l.`label_id`
AND l.labelno = itf.itemlabel");

	if(mysql_num_rows($getLabelListQry)<>''){
	for($i=1;$fetLabelListQry=mysql_fetch_object($getLabelListQry);$i++){?>
	<input type="hidden" value="<?php echo $fetLabelListQry->itemlabel?>" id="itemno<?=$i?>" />
	<tr>
	  <td><?php echo $fetLabelListQry->itemlabel?></td>
	 <td><?php echo $fetLabelListQry->firstname?></td>
	  <td><?php echo $fetLabelListQry->ph_home?></td>
	  <td><?php echo $fetLabelListQry->ph_work?></td>
	  <td><?php echo $fetLabelListQry->ph_cell?></td>
	  <td><?php echo $fetLabelListQry->best_contact?></td>
	  <td><a href="javascript:void(0)" id="updateStatus" title="ship item directly to your home">Ship</a></td>
	  </tr>
	<?php }//while
	}else{?>
	<tr>
	  <td colspan="8" align="center"><div class="validation-advice" style="font-size:14px" align="center"><b>No Items Found</b></div></td>
	</tr>
	<?php }?>
  </tbody>
</table>