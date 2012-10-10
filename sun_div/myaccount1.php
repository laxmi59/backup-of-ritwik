<? session_start();
if($_SESSION['un']==''){	echo "<script>location.replace('index.php')</script>";}
//////////////////////////////////////////////////////////////////////
 include "class/class.php";
 include "dbcon.php";
 include "classobjects.php";
 /*$a= new real_list();
 $b= new real_req();
 $c= new real_location();
 $d= new real_reg();
 $req=new req();
 $prop=new real_property();
 $x=new valid();*/
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
<div style="width:980px; margin-left:14px">
<div><? include "header.php"?></div>
<div class="linebreak">&nbsp;</div>
<div>
<div style="width:20%; float:left"><? include "left.php"?></div>
<div style="width:65%">//middle...................................................
<? if($_GET['act']=='myreg'){
		include "myreg.php";
	   }elseif($_GET['act']=='fast1'){
	   include "fast1.php";
	   }elseif($_GET['act']=='show'){?>
	   <span class="style3"> Manage Listings</span><br />	<br />
<div style="width:90%" class="innertab">



<div align="center" class="style3"><strong>Search Property</strong> </div>

<div style="padding:5px" class="tabcolor">
<div style="float:left; width:150px" align="left">Transaction Type </div>
<div style="float:left; width:5px">:</div>
<div><select name="req_type" id="req_type" onChange="Selectlocation();" style="width:160px;">
        <option value="">select</option>
        </select>	</div>
</div>




<td align="center"><strong class="style3">Types of listings</strong></td>
		<td align="center"><strong class="style3">Active</strong></td>
		<td align="center"><strong class="style3">Expired</strong></td>
		<td align="center"><strong class="style3">Hold</strong></td>
		<td align="center"><strong class="style3">Deleted</strong></td>








</div>

</div>







</div>
</body>
</html>