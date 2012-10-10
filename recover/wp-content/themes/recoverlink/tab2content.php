<div><h2>My MemberShip Info</h2></div>
<div>&nbsp;</div>
<table align="left" class="account-table" width="100%">
  <tbody>
	<tr>
	  <th>Card Type</th>
	  <th>Card Number</th>
	  <th>Expiration Date</th>
	  <th>Member Ship</th>
	  <th>Joining Date</th>
	</tr>
	<?php $getMembershipQry=mysql_query("SELECT * FROM `contactdetails` where contactdet_id =$_SESSION[userid]");
	//echo "SELECT * FROM `contatactdetails2labels` where contactdet_id =$_SESSION[userid]";
	while($fetMembershipQry=mysql_fetch_object($getMembershipQry)){?>
	<tr>
	  <td><?php echo $fetMembershipQry->cardtype?></td>
	  <td><?php echo $fetMembershipQry->cardnumber?></td>
	  <td><?php echo $fetMembershipQry->expmonth."-".$fetMembershipQry->expyear?></td>
	  <td><?php echo $fetMembershipQry->membershiptype?></td>
	  <td><?php echo $fetMembershipQry->date?></td>
	</tr>
	<?php }?>
  </tbody>
</table>