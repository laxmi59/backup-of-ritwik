
<link href="css/style.css" type="text/css" rel="stylesheet" />
<table width="95%" class="innertab" cellpadding="0" cellspacing="0">
	<tr>
		<td style="padding-left:5px"><strong>Mange Account </strong></td>
	</tr>
    <tr class="linebreak"><td>&nbsp;</td></tr>
	
	<tr class="tabcolor">
		<td class="trpad"><strong class="menutitle">Account Details</strong></td>
	</tr>
   	<tr class="tabcolor">
		<td height="16" class="trpad">
			<img class="trpad" src="img/dimond.jpg">
			<a href="myaccount.php?act=myreg" class="b">Modify Profile</a>		</td>
   	</tr>
	<tr class="linebreak"><td></td></tr>
	<tr class="tabcolor">
	  <td class="trpad"><img class="trpad" src="img/dimond.jpg"><a href="myaccount.php?act=pass" class="b"> Change Password</a> </td>
	</tr>
	<tr class="linebreak"><td></td></tr>
	<tr class="tabcolor">
	  <td class="trpad"><img class="trpad" src="img/dimond.jpg"><a href="myaccount.php?act=show" class="b"> My Account</a> </td>
	</tr>
  	<tr class="tabcolor"><td>&nbsp;</td></tr>
  	<tr><td style="padding-left:5px"><span class="style3">Manage Searchs </span></td></tr>
   	<tr class="tabcolor"><td>&nbsp;</td></tr>
  	<tr class="tabcolor"><td style="padding-left:10px;"><strong class="menutitle">My Requirements</strong></td>
  	</tr>
	<tr class="linebreak"><td></td></tr>
  	<tr class="tabcolor">
  	  <td class="trpad"><img class="trpad" src="img/dimond.jpg"><a href="myaccount.php?act=buy" class="b"> To Buy</a><? print "(".$b->buy($uid).")"; ?> </td>
  	</tr>
	<tr class="linebreak"><td></td></tr>
  	<tr class="tabcolor">
  	  <td class="trpad"><img  class="trpad" src="img/dimond.jpg"><a href="myaccount.php?act=rent" class="b"> To Rent</a><? print "(".$b->rent($uid).")"; ?> </td>
  	</tr>
  	<tr class="tabcolor"><td>&nbsp;</td></tr>
  	<tr><td  class="trpad"><span class="style3">Manage Listings </span></td></tr>
   	<tr class="tabcolor"><td>&nbsp;</td></tr>
  	<tr class="tabcolor"><td class="trpad"><strong class="menutitle">My Listings</strong></td>
  	</tr>
	<tr class="linebreak"><td></td></tr>
    <tr class="tabcolor">
      <td class="trpad"><img class="trpad" src="img/dimond.jpg"><a href="myaccount.php?act=active" class="b"> Active</a><? print "(".$a->active($uid).")"; ?></td>
    </tr>
	<tr class="linebreak"><td></td></tr>
  	<tr class="tabcolor">
  	  <td class="trpad"><img class="trpad" src="img/dimond.jpg"><a href="myaccount.php?act=expired" class="b"> Expired</a><? print "(".$a->expired($uid).")"; ?></td>
  	</tr>
	<tr class="linebreak"><td></td></tr>
  	<tr class="tabcolor">
  	  <td class="trpad"><img class="trpad" src="img/dimond.jpg"><a href="myaccount.php?act=hold" class="b"> On Hold</a><? print "(".$a->hold($uid).")"; ?></td>
  	</tr>
	<tr class="linebreak"><td></td></tr>
  	<tr class="tabcolor">
  	  <td class="trpad"><img class="trpad" src="img/dimond.jpg"><a href="myaccount.php?act=del" class="b"> Rejected</a><? print "(".$a->del($uid).")"; ?></td>
  	</tr>
   <tr class="tabcolor"><td>&nbsp;</td></tr>
 <!-- <tr>
    <td style="padding-left:10px;"><strong><a href="#">My Responses</a> </strong></td>
  </tr>-->
 
</table>
