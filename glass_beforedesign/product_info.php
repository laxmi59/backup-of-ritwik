<? session_start();
////////////////   		includes			/////////////////////////////////////////
include "includes/config.php";
include "includes/filenames.php";
include "includes/functions.php";
include "includes/classobjects.php";
////////////////		End of Includes		/////////////////////////////////////////
if($_SESSION['user_id']<>''){
	$reg1=mysql_fetch_array(mysql_query("select * from ".USERS." where user_id='$_SESSION[user_id]'"));
}
require_once("includes/pagination.php");
$q_limit = 3;
$errMsg = 0;
if( isset($_GET['start']) )
{
	$start = $_GET['start'];
}
else
{
	$start = 0;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=WEBSITE_NAME?></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="sitewidth">
<tr><td valign="top"><? include FRONT_HEADER?></td></tr>
<tr>
	<td class="page txtstyle" align="center" valign="top">
	<table width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td class="leftbar" valign="top"><? include FRONT_LEFT?></td>
		<td class="rightbar" valign="top">
		<? if($_GET['act']=='single'){?>
		<table width="95%" align="center" cellspacing="0" cellpadding="0" style="border:1px solid" class="menu_back_color1">
		<?	$prod2=mysql_fetch_array(mysql_query("select * from ".PRODUCT." where pid='$_GET[pid]'"));
			if($prod2['prod_img']==''){	$pic="images/no_picture.gif";	}else{	$pic="product/thumb/".$prod2['prod_img'];}
		?>
		<tr class="trheight"><td colspan="2" class="heading1"><?=$prod2['prod_name']?></td></tr>
		<tr><td colspan="2" class="content_back_color">&nbsp;</td></tr>
		<tr class="content_back_color">
			<td width="23%" class="trpad" ><img border="0" src="<?=$pic?>" /></td>
			<td width="77%" class="txtstyle1">
			<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" class="txtstyle1">
			<tr><td><?=$prod2['prod_name']?></td></tr>
			<tr class="linebreak"><td></td></tr>
			<tr><td>
			<? if($reg1['user_type']=='seller'){					
				$res= $application->discount($prod2['prod_price'],$reg1['user_discount']);
				echo "<span class='errstyle'>Real price </span>£".$prod2['prod_price']."<br>";
				echo "<span class='errstyle'>After Discount </span>£".$res;
			}else{
				echo "<span class='errstyle'>price </span>£".$prod2['prod_price'];
			}?>
			
			</td></tr>
			<tr class="linebreak"><td></td></tr>
			<tr>
			<td>
			<?	if($_SESSION['user_id']==''){?>
			<input type="button" name="btn" value="Add to Cart" onclick="javascript:window.location='<?=FRONT_LOG?>?pid=<?=$_GET['pid']?>'" />
			<? }else {	?>
			<input type="button" name="btn" value="Add to Cart" onclick="javascript:window.location='<?=USER_DATA?>?act=add_cart&pid=<?=$_GET['pid']?>'" />
			<? }?>		
			</td>
		</tr>
			</table>		
			</td>
		</tr>
		
		<tr class="content_back_color"><td colspan="2" class="txtstyle1">&nbsp;</td> </tr>
		<tr class="content_back_color"><td colspan="2" class="txtstyle1"><div align="justify">
		<div class="heading1 trpad">About <?=$prod2['prod_name']?></div>
		<div class="linebreak"></div>
		<div class="trpad"><?=$prod2['prod_desc']?></div>
		  </div></td></tr>
		<tr class="content_back_color"><td colspan="2"><p>&nbsp;</p></td></tr>
	</table>
	<? }?>
	<? if($_GET['act']=='srch'){
		extract($_POST); 
		//print_r($_POST);
		$srch=$_GET['kw'];
		$sr= "%".$srch."%";
	?>
		<table width="95%" align="center" cellspacing="0" cellpadding="0" style="border:1px solid" class="menu_back_color1">
		<?	$prod2_num=mysql_num_rows(mysql_query("select * from ".PRODUCT." where prod_name like '$sr'"));
			if($prod2_num==''){
		?>
		<tr><td colspan="2" class="errstyle content_back_color" align="center"> No products found with given keyword </td></tr>
		<?   }else{
		$prod1=mysql_query("select * from ".PRODUCT." where prod_name like '$sr' limit $start,$q_limit");
		while($prod2=mysql_fetch_array($prod1)){
			if($prod2['prod_img']==''){	$pic="images/no_picture.gif";	}else{	$pic="product/thumb/".$prod2['prod_img'];}
		?>
		<tr><td colspan="2" class="heading1 trheight"><?=$prod2['prod_name']?></td></tr>
		<tr class="content_back_color"><td colspan="2">&nbsp;</td></tr>
		<tr class="content_back_color">
			<td width="23%" class="trpad" ><img border="0" src="<?=$pic?>" /></td>
			<td width="77%" class="txtstyle1">
			<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" class="txtstyle1">
			<tr><td><?=$prod2['prod_name']?></td></tr>
			<tr class="linebreak"><td></td></tr>
			<tr><td>
			<? if($reg1['user_type']=='seller'){					
				$res= $application->discount($prod2['prod_price'],$reg1['user_discount']);
				echo "<span class='errstyle'>Real price </span>£".$prod2['prod_price']."<br>";
				echo "<span class='errstyle'>After Discount </span>£".$res;
			}else{
				echo "<span class='errstyle'>price </span>£".$prod2['prod_price'];
			}?>
			
			</td></tr>
			<tr class="linebreak"><td></td></tr>
			<tr>
			<td>
			<?	if($_SESSION['user_id']==''){?>
			<input type="button" name="btn" value="Add to Cart" onclick="javascript:window.location='<?=FRONT_LOG?>?pid=<?=$_GET['pid']?>'" />
			<? }else {	?>
			<input type="button" name="btn" value="Add to Cart" onclick="javascript:window.location='<?=USER_DATA?>?act=add_cart&pid=<?=$_GET['pid']?>'" />
			<? }?>		
			</td>
		</tr>
			</table>		
			</td>
		</tr>
		<tr class="content_back_color"><td colspan="2"><p>&nbsp;</p></td></tr>
	<? }?>
		<tr class="content_back_color"><td colspan="2" class="txtstyle1" align="center"><? paginate($start,$q_limit,$prod2_num,FRONT_INFO."?act=srch&kw=$_GET[kw]&","");?></td></tr>
	<? }?>
	</table>
	
	
	<? }?>
		</td>
	</tr>
	</table>
	</td>
</tr>
<tr><td valign="top"><? include FRONT_FOOTER?></td></tr>
<tr><td></td></tr>
</table>
</body>
</html>
