<?php
global $wpdb;

if($_REQUEST['id']){
	$upd=mysql_query("update items_found set status='A' where id=$_REQUEST[id]");
	echo "<script>window.location='".get_option('siteurl')."/wp-admin/admin.php?page=".$_GET[page]."&msg=1'</script>";
}
?>
<div>&nbsp;</div>
<div><h2>Lost Item Information</h2></div>
<?php
if($_REQUEST['msg']){
echo '<div class="validation-advice" style="font-size:14px" align="center"><b>your request sent successfully. your request appoved shortly</b> </div><div>&nbsp;</div> ';
}
?>
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
	<?php 
	$getLabelListQry=mysql_query("SELECT * FROM items_found");
	if(mysql_num_rows($getLabelListQry)<>''){
	for($i=1;$fetLabelListQry=mysql_fetch_object($getLabelListQry);$i++){?>
	<tr>
	  <td><?php echo $fetLabelListQry->itemlabel?></td>
	 <td><?php echo $fetLabelListQry->firstname?></td>
	  <td><?php echo $fetLabelListQry->ph_home?></td>
	  <td><?php echo $fetLabelListQry->ph_work?></td>
	  <td><?php echo $fetLabelListQry->ph_cell?></td>
	  <td><?php echo $fetLabelListQry->best_contact?></td>
	  <td>
	  <?php
	  if($fetLabelListQry->status =='P'){?>
	  <a href="<?php echo get_option('siteurl');?>/wp-admin/admin.php?page=<?=$_GET[page]?>&id=<?php echo $fetLabelListQry->id?>" id="updateStatus" title="ship item directly to your home">Approve</a>
	  <?php }elseif($fetLabelListQry->status =='N'){ 
	  		echo "New item";
			}elseif($fetLabelListQry->status =='D'){ 
			echo "Delivered";
			}elseif($fetLabelListQry->status =='A'){ 
			echo "Approved";
		}?>
	  </td>
	  </tr>
	<?php }//while
	}else{?>
	<tr>
	  <td colspan="8" align="center"><div class="validation-advice" style="font-size:14px" align="center"><b>No Items Found</b></div></td>
	</tr>
	<?php }?>
  </tbody>
</table>