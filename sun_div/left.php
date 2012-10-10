<? if($_SESSION['un']==''){	echo "<script>location.replace('index.php')</script>";}?>
<link href="css/style.css" type="text/css" rel="stylesheet" />
<div align="left">

<div style="width:100%" class="innertab" >
					<div style="padding-left:5px"><strong class="style3">Mange Account </strong></div>
				   <!-- <div class="linebreak">&nbsp;</div>
					<div class="linebreak">&nbsp;</div>-->
	<div class="tabcolor">&nbsp;</div>
	<div style="height:20px"  class="trpad tabcolor"><strong class="menutitle">Account Details</strong></div>
	
	
   	<div  class="tabcolor trpad style4" style="height:25px">
			<img class="trpad" src="img/dimond.jpg">
			<a href="myaccount.php?act=myreg" class="b">Modify Profile</a></div>
	<!--<div  class="linebreak"></div>
	<div style="height:10px"> &nbsp;</div>-->
	<div  class="tabcolor trpad style4" style="height:25px"><img class="trpad" src="img/dimond.jpg"><a href="myaccount.php?act=pass" class="b"> Change Password</a></div>
	<!--<div class="linebreak"></div>
	<div class="linebreak"></div>-->
	<div  class="tabcolor trpad style4" style="height:25px"><img class="trpad" src="img/dimond.jpg"><a href="myaccount.php?act=show" class="b"> My Account</a> </div>
	
  	<div class="tabcolor">&nbsp;</div>
  	<div style="padding-left:5px"><span class="style3">Manage Searchs </span></div>
   	<div class="tabcolor linebrake">&nbsp;</div>
  	<div style="padding-left:15px; height:25px" class="tabcolor" ><strong class="menutitle">My Requirements</strong>
	</div>
	<!--<div class="linebreak"></div>
	<div class="linebreak"></div>-->
  	<div class="tabcolor trpad style4" style="height:25px"><img class="trpad" src="img/dimond.jpg"><a href="myaccount.php?act=buy" class="b"> To Buy </a><? print "(".$b->buy($uid).")"; ?> </div>
	<!--<div class="linebreak"></div>
	<div class="linebreak"></div>-->
  	<div class="tabcolor trpad style4" style="height:25px"><img  class="trpad" src="img/dimond.jpg"><a href="myaccount.php?act=rent" class="b"> To Rent </a><? print "(".$b->rent($uid).")"; ?> </div>
  	<div class="tabcolor">&nbsp;</div>
  	<div class="trpad" style="height:25px"><span class="style3">Manage Listings </span></div>
   	<div class="tabcolor">&nbsp;</div>
  	<div class="tabcolor trpad" style="height:25px"><strong class="menutitle">My Listings</strong></div>
  	
	<!--<div class="linebreak"></div>
	<div class="linebreak"></div>-->
    <div class="tabcolor trpad style4" style="height:25px"><img class="trpad" src="img/dimond.jpg"><a href="myaccount.php?act=active" class="b"> Active</a> <? print "(".$a->active($uid).")"; ?> </div>
	<!--<div class="linebreak"></div>
	<div class="linebreak"></div>-->
  	<div class="tabcolor trpad style4" style="height:25px"><img class="trpad" src="img/dimond.jpg">
	  <a href="myaccount.php?act=expired" class="b"> Expired</a>
	  <? 
	  $aa=$a->expired1($uid);
	  $aa1=mysql_num_rows($aa);
	  echo "(".$aa1.")";
	 // print "(".$a->expired($uid).")"; ?></div>
	<!--<div class="linebreak"></div>
	<div class="linebreak"></div>-->
  	<div  class="tabcolor trpad style4" style="height:25px"><img class="trpad" src="img/dimond.jpg"><a href="myaccount.php?act=hold" class="b"> On Hold</a> <? print "(".$a->hold($uid).")"; ?></div>
	<!--<div class="linebreak"></div>
	<div class="linebreak"></div>-->
  	<div class="tabcolor trpad" style="height:25px"><img class="trpad" src="img/dimond.jpg"><a href="myaccount.php?act=del" class="b"> Rejected</a> <? print "(".$a->del($uid).")"; ?></div>
   <div class="tabcolor">&nbsp;</div>
 
  
 <!-- <tr>
    <td style="padding-left:10px;"><strong><a href="#">My Responses</a> </strong></td>
  </tr>-->
 </div>
</div>
<br />
