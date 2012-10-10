<?php
session_start();
/*
Template Name: Lost item
*/
include_once (TEMPLATEPATH . '/lib/Functions.php');
include_once (TEMPLATEPATH . '/lib/GlobalValues.php');

//echo TEMPLATEPATH . '/lib/Functions.php';
get_header();
if($_SESSION['userid']<>''){
	$qry="select * from `contactdetails` where contactdet_id=".$_SESSION['userid'];
	$fet_user_info=mysql_fetch_object(mysql_query($qry));
}else{
	wp_redirect(get_option('siteurl') . '/get-started');exit;
}


if($_REQUEST['id']){
	$upd=mysql_query("update items_found set status='P' where id=$_REQUEST[id]");
	echo "<script>window.location='".get_option('siteurl')."/lost_item?&msg=1'</script>";
}
?>

<div class="container"> 
<div><h2>Lost Item Information</h2></div>
<div>&nbsp;</div> 
<?php
if($_REQUEST['msg']){
echo '<div class="validation-advice" style="font-size:14px" align="center"><b>your request sent successfully. your request appoved shortly</b> </div><div>&nbsp;</div> ';
}
?>
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
	<?php $getLabelListQry=mysql_query("SELECT itf.id,itf.firstname, itf.lastname, itf.ph_home, itf.ph_work, itf.ph_cell, itf.best_contact, itf.itemlabel, itf.status FROM labels l, contactdetails cd, contatactdetails2labels cdl, items_found itf WHERE cd.contactdet_id =$_SESSION[userid] AND cd.contactdet_id = cdl.contactdet_id AND cdl.label_id = l.`label_id`
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
	  <td>
	  <?php
	  if($fetLabelListQry->status =='N'){?>
	  <a href="<?php echo get_option('siteurl');?>/lost_item?id=<?php echo $fetLabelListQry->id?>" id="updateStatus" title="ship item directly to your home">Ship Item</a>
	  <?php }elseif($fetLabelListQry->status =='P'){ 
	  	echo "Pending";
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
    </div>