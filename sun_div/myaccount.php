<? session_start();
if($_SESSION['un']==''){	echo "<script>location.replace('index.php')</script>";}
//////////////////////////////////////////////////////////////////////
 include "class/class.php";
 include "dbcon.php";
 include "classobjects.php";
 $a= new real_list();
 $b= new real_req();
 $c= new real_location();
 $d= new real_reg();
 $req=new req();
 $prop=new real_property();
 $x=new valid();
 //////////////////////////////////////////////////////////////////////
 ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$title?></title>
<link href="css/style.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div align="center">
<div style="width:980px; background-color:#ffffff" >
<div><? include "header.php"?></div>
<div class="linebreak">&nbsp;</div>
<div>
<p>&nbsp;</p>
<div align="left">
<div style="width:20%;float:left; padding-left:11px"><? include "left.php"?></div>
<div style="width:65%; height:500px; margin-left:20%" class="style3" align="center"> <? if($_GET['act']=='myreg'){
		include "myreg.php";
	   }elseif($_GET['act']=='fast1'){
	   include "fast1.php";
	   }elseif($_GET['act']=='show'){?>
	   <span class="style3"> Manage Listings</span><br />	
	   <br />
<div style="width:90%" class="innertab">
<div align="left">
<div style="display:inline; padding-left:50px" >Types of listings </div>
<div style="display:inline;padding-left:40px" >Active </div>
<div style="display:inline;padding-left:40px" >Expired </div>
<div style="display:inline;padding-left:40px" >Hold </div>
<div style="display:inline;padding-left:40px">Deleted </div>

</div>
<div style="padding:5px" class="tabcolor">
<div align="left">
<div>
  <div style="display:inline;padding-left:50px">Basic listings</div>
<div style="display:inline;padding-left:60px"><a href="myaccount.php?act=active" class="b"><? print $a->active($uid); ?></a></div>
<div style="display:inline;padding-left:80px"><a href="myaccount.php?act=expired" class="b"><? $aa=$a->expired1($uid);
	  $aa1=mysql_num_rows($aa);
	  echo $aa1; ?></a></div>
<div style="display:inline;padding-left:80px"><a href="myaccount.php?act=hold" class="b"><? print $a->hold($uid); ?></a> </div>
<div style="display:inline;padding-left:80px"><a href="myaccount.php?act=del" class="b"><? print $a->del($uid); ?></a> </div>
<div class="linebreak">&nbsp;</div>
</div>
<div class="linebreak">&nbsp;</div>
</div>
</div>


</div>
<? }else{
		include "right.php";}?>
<p>&nbsp;</p>
<div class="linebreak" style="width:90%"> &nbsp;</div>
</div>
<div><p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>


<div><? include "footer.php"?></div>



</div>
</div>
</div>
</body>
</html>