<? session_start();
if($_SESSION['aun']==''){	echo "<script>location.replace('index.php')</script>";}
include "../dbcon.php";
include "../class/class.php";
include "classobjects.php";
/*$list=new real_list();
$post=new real_req();
$loc=new real_location();
$reg=new real_reg();
$prop=new real_property();
$app=new real_approval();
$proj=new real_featured_proj();
$build=new real_featured_build();*/
?>
<link type="text/css" rel="stylesheet" href="../css/style.css" />
<table width="100%" class="tabcolor" align="center" style="border:1px solid;"  >
<tr>
	<td colspan="3"><? include 'header.php'?></td>
</tr>
<tr>
	<td width="25%" align="center" valign="top"><? include "left.php";?></td>
	<td width="3%">&nbsp;</td>
	<td width="72%" align="center" valign="top"><? include "right.php";?></td>
</tr>
<tr>
	<td colspan="3"><p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p></td>
</tr>
</table>