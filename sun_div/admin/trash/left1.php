<link href="../css/style.css" type="text/css" rel="stylesheet" />
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="style2">
   <tr>
     <td bgcolor="#800000" style="color:#FFFFFF; padding-left:5px"><strong>Mange Account </strong></td>
   </tr>
   <tr class="trcol">
    <td style="padding-left:10px;"><a href="home.php?act=profile">Modify Profile</a> </td>
  </tr>
  <tr class="trcol">
    <td style="padding-left:10px;"><a href="home.php?act=pass">Change Password</a> </td>
  </tr>
  <tr class="trcol">
    <td style="padding-left:10px;"><a href="home.php">My Account</a> </td>
  </tr>
  <tr class="trcol">
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#800000" style="padding-left:5px"><span class="style1">Manage Properties </span></td>
  </tr>
  <tr class="trcol">
    <td style="padding-left:10px;">&nbsp;</td>
  </tr>
  <tr class="trcol">
    <td style="padding-left:25px;">
		<img src="../img/dimond.jpg">
		<a href="home.php?act=list">Property for sale/rent</a><? print "(".$list->list1().")";?>
	</td>
  </tr>
  <tr class="trcol">
    <td style="padding-left:25px;">
		<img src="../img/dimond.jpg">
		<a href="home.php?act=post"> Property for rent/purchase</a><? print "(".$list->list1().")";?>
	</td>
  </tr>
  <tr class="trcol">
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#800000"><span class="style1">Manage Locations </span></td>
  </tr>
  <tr class="trcol">
    <td style="padding-left:10px;">&nbsp;</td>
  </tr>
  <tr class="trcol">
    <td style="padding-left:25px;">
		<img src="../img/dimond.jpg">
		<a href="city.php?act=city">Cities</a><? print "(".$loc->location11().")"?>
	</td>
  </tr>
  <tr class="trcol">
    <td style="padding-left:25px;">
		<img src="../img/dimond.jpg">
		<a href="city.php?act=area">Areas</a><? print "(".$loc->location21().")"?>
	</td>
  </tr>
  <tr class="trcol">
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td bgcolor="#800000"><span class="style1">Manage Users </span></td>
  </tr>
   <tr class="trcol"><td style="padding-left:10px;">&nbsp;</td></tr>
  <tr class="trcol">
    <td style="padding-left:25px;">
		<img src="../img/dimond.jpg">
		<a href="home.php?act=active">Active Users</a><? print "(".$reg->regactive().")"?>
	</td>
  </tr>
  <tr class="trcol1"><td></td></tr>
    <tr class="trcol">
    <td style="padding-left:25px;">
		<img src="../img/dimond.jpg">
		<a href="home.php?act=new">New Users</a><? print "(".$reg->regnew().")"?>
	</td>
  </tr>
  <tr class="trcol1"><td></td></tr>
   <tr class="trcol">
    <td style="padding-left:25px;">
		<img src="../img/dimond.jpg">
		<a href="home.php?act=block">Blocked Users</a><? print "(".$reg->regblock().")"?>
	</td>
  </tr>
  <tr class="trcol1"><td></td></tr>
 
</table>
