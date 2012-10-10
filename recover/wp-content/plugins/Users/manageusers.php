<?php
//for deleating
if(isset($_REQUEST['uid'])){
	$uid=$_REQUEST['uid'];
	/*if($_REQUEST['tab']=='edit')		{
		$rePage=$_REQUEST['repage'];
		include "../wp-content/plugins/Users/editUsers.php";
	}*/
	if($_REQUEST['tab']=='del')		{
		$getTermId="DELETE FROM  contactdetails where contactdet_id=$uid   ";
		$res_termsid=mysql_query($getTermId);
		$rePage=$_REQUEST['repage'];
		wp_redirect(get_option('siteurl') . '/wp-admin/admin.php?page=Manage-users&pageNo='.$rePage.'&msg=deleted');
	}
	if($_REQUEST['tab']=='view')		{
		$feedSelectQry=mysql_query("SELECT * FROM contactdetails where contactdet_id=$uid  ");
		$res=mysql_fetch_array($feedSelectQry) ; 
		$labelsNoQry=mysql_query("SELECT GROUP_CONCAT( DISTINCT labelno SEPARATOR ',' ) AS labelnumbers FROM contatactdetails2labels cl, labels l WHERE cl.label_id=l.label_id AND contactdet_id =".$res['contactdet_id']);
		$labelsNumbers=mysql_fetch_array($labelsNoQry);
		
?>

<div class="wrap">
  <h2>View  User Profile </h2>
  <table align="center" width="520" border="0" cellspacing="2" cellpadding="2" >
    <tr>
      <td colspan="2" align="left"><a href="admin.php?page=Manage-users"><strong>Users List</strong></a></td>
    </tr>
    <tr >
      <td><strong>Name:</strong></td>
      <td><?php echo $res['firstname']."  ".$res['lastname'];  ?></td>
    </tr>
      <tr>
      <td><strong>Email address:</strong></td>
      <td><?php echo $res['email'];  ?></td>
    </tr>
    <tr>
      <td><strong>Phone (Home):</strong></td>
      <td><?php echo $res['phone_home'];  ?></td>
    </tr>
    <tr>
      <td><strong>Phone (Work):</strong></td>
      <td><?php echo $res['phone_work'];  ?></td>
    </tr>
    <tr>
      <td><strong>Phone (Cell):</strong></td>
      <td><?php echo $res['phone_cell'];  ?></td>
    </tr>
    <tr>
      <td><strong>Fax:</strong></td>
      <td><?php echo $res['fax'];  ?></td>
    </tr>
    <tr>
      <td><strong>Billing Address:</strong></td>
      <td><?php echo $res['billing_address'];  ?></td>
    </tr>
    <tr>
      <td><strong>Billing City:</strong></td>
      <td><?php echo $res['billing_city'];  ?></td>
    </tr>
    <tr>
      <td><strong>Billing State:</strong></td>
      <td><?php echo $res['billing_state'];  ?></td>
    </tr>
    <tr>
      <td><strong>Billing Country:</strong></td>
      <td><?php echo $res['billing_country'];  ?></td>
    </tr>
    <tr>
      <td><strong>Billing Zip:</strong></td>
      <td><?php echo $res['billing_zipcode'];  ?></td>
    </tr>
      <tr>
      <td><strong>Shipping Address:</strong></td>
      <td><?php echo $res['shipping_address'];  ?></td>
    </tr>
    <tr>
      <td><strong>Shipping City:</strong></td>
      <td><?php echo $res['shipping_city'];  ?></td>
    </tr>
    <tr>
      <td><strong>Shipping State:</strong></td>
      <td><?php echo $res['shipping_state'];  ?></td>
    </tr>
    <tr>
      <td><strong>Shipping Country:</strong></td>
      <td><?php echo $res['shipping_country'];  ?></td>
    </tr>
    <tr>
      <td><strong>Shipping Zip:</strong></td>
      <td><?php echo $res['shipping_zipcode'];  ?></td>
    </tr>
  	 <tr>
      <td><strong>Credit Card Type:</strong></td>
      <td><?php echo $res['cardtype'];  ?></td>
    </tr>
	 <tr>
      <td><strong>Credit Card Number:</strong></td>
      <td><?php echo $res['cardnumber'];  ?></td>
    </tr>
	 <tr>
      <td><strong>Credit Card Expiration:</strong></td>
      <td><?php echo $res['expmonth']." ".$res['expyear'];  ?></td>
    </tr>
	 <tr>
      <td><strong>Subscription:</strong></td>
      <td><?php echo $res['membershiptype'];  ?></td>
    </tr>
	 <tr>
      <td><strong>Activated Date:</strong></td>
      <td><?php echo date('jS M Y',strtotime($res['date']) );  ?></td>
    </tr>
	<tr>
      <td><strong>Labels:</strong></td>
      <td><?php echo $labelsNumbers['labelnumbers'];  ?></td>
    </tr>
  </table>
</div>
<?php	
		}	
}
else{
	$feedSelectQry="SELECT * FROM contactdetails order by contactdet_id   desc ";
	$res=mysql_query($feedSelectQry) or die("Error in quer-->$feedSelectQry".mysql_error());
	$noOfUsers=@mysql_num_rows($res);
	if($noOfUsers > 0)	{
		$perPage=10;
		$pageNo=isset($_REQUEST['pageNo']) ? $_REQUEST['pageNo']:'1';
		$start=($pageNo-1)*$perPage;
		$noOfPages=ceil($noOfUsers/$perPage);
		$feedSelectQry.=" limit $start,$perPage  ";
		$res=mysql_query($feedSelectQry);
		$noOfrecInPage=@mysql_num_rows($res);
		while($row=mysql_fetch_array($res))	{	
			$labelsNo=@mysql_num_rows(mysql_query("SELECT 1 FROM contatactdetails2labels WHERE contactdet_id =".$row['contactdet_id']));
			if($pageNo!=1 && $noOfrecInPage==1)
			$delPage=$pageNo-1;
			else
			$delPage=$pageNo;
			$str.="<tr align='left'><td colspan='2'>".$row['firstname']." ".$row['lastname']."</td><td><a href='mailto:".$row['email']."'>".$row['email']."</a></td><td>".$labelsNo."</td><td><span><a href='admin.php?page=Manage-users&amp;tab=view&amp;uid=".$row['contactdet_id']."'>View</a></span>&nbsp;&nbsp;<span><a href='admin.php?page=Add-users&amp;repage=$pageNo&amp;tab=edit&amp;uid=".$row['contactdet_id']."'>Edit</a></span>&nbsp;&nbsp;<span><a href='admin.php?page=Manage-users&amp;repage=$delPage&amp;tab=del&amp;uid=".$row['contactdet_id']."'   onclick= 'javascript:return delfun();'  >Delete</a></span></td></tr>";
		}				
	}
	else	{
		$str.="<tr><td  align='center' colspan='4'><b>No Users  found</b></td></tr>";
	}	
?>
<script language="javascript">
	
	function delfun()	{
			if (confirm(" Are you sure you want to delete the user ?"))	{
				return true;
			}
			else	{
			return false;
			} 
		}
	</script>
<div class="wrap">
  <h2>Users </h2>
<?php 
//error message
if($_GET['msg']=='deleted')
	echo "<b><font color='red'>User has been deleted successfully</font></b>"; 
elseif($_GET['msg']=='inserted')
	echo "<b><font color='red'>User has been added successfully</font></b>"; 
elseif($_GET['msg']=='updated')
	echo "<b><font color='red'>User has been updated successfully</font></b>"; 
?>
  <table align="center" width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <form name="searchBy" action="" method="post" ><td><input type="text" name="searchText" value="" /></td><td><select name="searchType" ><option value="">Select</option></select></td></form>
    </tr>
  </table>
  <table  style="padding-right:10px;" align="right">
    <tr>
      <td><a href="admin.php?page=Add-users"><strong>Add New User</strong></a></td>
    </tr>
    <tr>
      <table border="1" class="widefat"  align="center" width="100%" cellspacing="0" cellpadding="0" >
        <thead>
          <tr>
            <th style="padding-left:3px;" colspan="2">Name</th>
            <th>Email</th>
            <th>No. Of Labels</th>
            <th>Options</th>
          </tr>
        </thead>
        <tbody>
          <?php echo $str;?>
        </tbody>
        <tfoot>
          <tr>
            <th style="padding-left:3px;" colspan="2">Name</th>
            <th>Email</th>
            <th>No. Of Labels</th>
            <th>Options</th>
          </tr>
        </tfoot>
      </table>
    </tr>
  </table>
  <table align="right">
    <tr>
      <td>
<?php
if($noOfUsers>$perPage)	{
	if($pageNo!='1'&& $pageNo<=$noOfPages)	{
	?>
		<a href='admin.php?page=Manage-users&pageNo=<?php echo $pageNo-1; ?>'>Prev</a>
	<?php 
	} 
	echo "Page&nbsp;";
	echo $pageNo."&nbsp; of ".$noOfPages ;
	if( $pageNo < $noOfPages )	{
	?>
		<a href='admin.php?page=Manage-users&pageNo=<?php echo $pageNo+1; ?>'>Next</a>
	<?php 
	}
}
?>
      </td>
    </tr>
  </table>
</div>
<?php
}
?>
