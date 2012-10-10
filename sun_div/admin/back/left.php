<link href="../css/style.css" type="text/css" rel="stylesheet" />
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="innertab">
   <tr>
     <td style="padding-left:5px"><strong class="style3">Mange Account </strong></td>
   </tr>
   <tr class="linebreak"><td></td></tr>
   <tr class="tabcolor">
    <td style="padding-left:10px;"><a href="main.php?lk=home&act=profile" class="b">Modify Profile</a> </td>
  </tr>
  <tr class="tabcolor">
    <td style="padding-left:10px;"><a href="main.php?lk=home&act=pass" class="b">Change Password</a> </td>
  </tr>
 
  <tr class="linebreak"><td></td></tr>
   <tr>
    <td style="padding-left:5px"><span class="style3">My Listings </span></td>
  </tr>
  <tr class="linebreak"><td></td></tr>
  <tr class="tabcolor">
    <td class="style4" style="padding-left:25px;"><img src="../img/dimond.jpg">
		<a href="main.php?lk=home&act=adminlist" class="b">Active</a>
		<? $pid="a"; print "(".$list->adminlist1('admin').")";?>	</td>
  </tr>
  <tr class="tabcolor">
    <td class="style4" style="padding-left:25px;"><img src="../img/dimond.jpg">
		<a href="main.php?lk=home&act=adminblock" class="b">Block</a><? $pid="a"; print "(".$list->adminblock1('admin').")";?>	</td>
  </tr>
   <tr>
    <td style="padding-left:5px"><span class="style3">Manage Listings </span></td>
  </tr>
  <tr class="linebreak"><td></td></tr>
  <tr class="tabcolor">
    <td  class="style4" style="padding-left:25px;"><img src="../img/dimond.jpg">
		<a href="main.php?lk=home&act=listactive" class="b">Active</a><? $pid="a"; print "(".$list->listactive1($pid).")";?>	</td>
  </tr>
  <tr class="tabcolor">
    <td  class="style4" style="padding-left:25px;"><img src="../img/dimond.jpg">
		<a href="main.php?lk=home&act=listnew" class="b">New</a><? $pid="n"; print "(".$list->listactive1($pid).")";?>	</td>
  </tr>
  <tr class="tabcolor">
    <td  class="style4" style="padding-left:25px;"><img src="../img/dimond.jpg">
		<a href="main.php?lk=home&act=listblock" class="b">Block</a><? $pid="d"; print "(".$list->listactive1($pid).")";?>	</td>
  </tr>
  <!--<tr class="tabcolor">
    <td style="padding-left:10px;">Post properties </td>
  </tr>
  <tr class="tabcolor">
    <td style="padding-left:25px;"><img src="../img/dimond.jpg">
		<a href="main.php?lk=home&act=postactive">Active</a><? //$pid="a"; print "(".$post->postactive1($pid).")";?>
	</td>
  </tr>
  <tr class="tabcolor">
    <td style="padding-left:25px;"><img src="../img/dimond.jpg">
		<a href="main.php?lk=home&act=postnew" class="b">New</a><? //$pid="n"; print "(".$post->postactive1($pid).")";?>	</td>
  </tr>
  <tr class="tabcolor">
    <td style="padding-left:25px;"><img src="../img/dimond.jpg">
		<a href="main.php?lk=home&act=postblock" class="b">Block</a><? //$pid="d"; print "(".$post->postactive1($pid).")";?>	</td>
  </tr>-->
  <!--<tr class="tabcolor">
    <td style="padding-left:25px;">
		<img src="../img/dimond.jpg">
		<a href="main.php?lk=home&act=list">Property for sale/rent</a><? //print "(".$list->list1().")";?>	</td>
  </tr>
  <tr class="tabcolor">
    <td style="padding-left:25px;">
		<img src="../img/dimond.jpg">
		<a href="main.php?lk=home&act=post" class="b"> Property for rent/purchase</a><? //print "(".$list->list1().")";?>	</td>
  </tr>-->
 <tr class="linebreak"><td></td></tr>
  <tr>
    <td><span class="style3">Manage Locations </span></td>
  </tr>
 <tr class="linebreak"><td></td></tr>
  <tr class="tabcolor">
    <td class="style4"  style="padding-left:25px;">
		<img src="../img/dimond.jpg">
		<a href="city.php?act=city" class="b">Cities</a><? print "(".$loc->location11().")"?>	</td>
  </tr>
  <tr class="tabcolor">
    <td class="style4"  style="padding-left:25px;">
		<img src="../img/dimond.jpg">
		<a href="city.php?act=area" class="b">Areas</a><? print "(".$loc->location21().")"?>	</td>
  </tr>
 <tr class="linebreak"><td></td></tr>
   <tr>
    <td><span class="style3">Manage Users </span></td>
  </tr>
  <tr class="linebreak"><td></td></tr>
  <tr class="tabcolor">
    <td class="style4"  style="padding-left:25px;">
		<img src="../img/dimond.jpg">
		<a href="main.php?lk=home&act=active" class="b">Active Users</a><? print "(".$reg->regactive().")"?>	</td>
  </tr>
  <tr class="tabcolor1"><td></td></tr>
    <tr class="tabcolor">
    <td  class="style4" style="padding-left:25px;">
		<img src="../img/dimond.jpg">
		<a href="main.php?lk=home&act=new" class="b">New Users</a><? print "(".$reg->regnew().")"?>	</td>
  </tr>
  <tr class="tabcolor1"><td></td></tr>
   <tr class="tabcolor">
    <td  class="style4" style="padding-left:25px;">
		<img src="../img/dimond.jpg">
		<a href="main.php?lk=home&act=block" class="b">Blocked Users</a><? print "(".$reg->regblock().")"?>	</td>
  </tr>
  <tr class="linebreak"><td></td></tr>
  <tr>
    <td><span class="style3">Manage Featured Builders</span></td>
  </tr>
  <tr class="linebreak"><td></td></tr>
  <tr  class="tabcolor">
  <td class="style4" style="padding-left:10px;">
  <a href="fetured.php?act=build" class="b">Featured Builders</a>
  <?
  	$build1=$build->tot_rec();
	$bno=mysql_num_rows($build1);
	echo "(".$bno.")";
  ?>
  </td>
  </tr>
  <tr class="linebreak"><td></td></tr>
   <tr>
    <td><span class="style3">Manage Featured Projects</span></td>
  </tr>
  <tr class="linebreak"><td></td></tr>
   <tr class="tabcolor">
  	<td class="style4"  style="padding-left:10px;">
	<a href="fetured.php?act=proj" class="b">Featured Projects</a>
	<?
  	$proj1=$proj->tot_rec();
	$pno=mysql_num_rows($build1);
	echo "(".$pno.")";
  ?>
	</td>
  </tr>
  <tr class="linebreak"><td></td></tr>
</table>
