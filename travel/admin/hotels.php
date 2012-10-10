<? session_start();
////////////////   		includes			/////////////////////////////////////////
include "../includes/config.php";
include "../includes/filenames.php";
include "../includes/functions.php";
include "../includes/classobjects.php";
////////////////		End of Includes		/////////////////////////////////////////
if($_SESSION['admin_id']==''){ echo "<script>location.replace('".ADM_MAIN."')</script>";}
$prod1=mysql_fetch_array(mysql_query("select * from ".ADM." where aid='$_SESSION[admin_id]'"));

require_once("../includes/pagination.php");
$q_limit = 10;
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
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/reg.js"></script>
</head>
<body>
<table border="0" width="90%" align="center" cellpadding="0" cellspacing="0" class="mainadmintab" >
<tr>
	<td valign="top">
	<table width="100%" cellpadding="0" cellspacing="0">
	<tr><td valign="top"><? include 'header.php'?></td></tr>
	<tr>
		<td valign="top" class="errstyle" align="center"><p>&nbsp;<?=$_GET['msg']?></p>
		<? if($_GET['act']=='show_cat_prod'){?>
		<table width="80%" align="center" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td align="center"><a href="hotels.php?act=new_prod" class="a">Add New Hotel</a></td>
		</tr>
		<tr><td colspan="3">&nbsp;</td></tr>
	    </table>	
		<table align="center" width="70%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td width="11%" class="txtstyle">Hotel_Id</td>
			<td width="18%" class="txtstyle">Picture</td>
			<td width="10%" class="txtstyle">Name</td>
			<td width="24%" class="txtstyle">Short Description</td>
			<!--<td width="19%" class="txtstyle">Website</td>-->
			<td width="18%" class="txtstyle" align="center">Action</td>
		</tr>
		<tr><td colspan="7">&nbsp;</td></tr>
		<?
			$prod=mysql_query("select * from ".HOTELS." order by hid desc limit $start,$q_limit" );
			$prod1=mysql_query("select * from ".HOTELS." order by hid desc");
			//echo "select * from ".PRODUCT;
			$prodnum=mysql_num_rows($prod1);
			if($prodnum==''){
		?>
		<tr><td colspan="7"><div align="center" class="txtstyle">No Products found</div></td></tr>
		<tr> <td colspan="7">&nbsp;</td>	  </tr>
		<? }else{
			$filePath= "hotels.php?act=show_cat_prod&";
			while($prod_result=mysql_fetch_array($prod)){
		?>
		<tr>
		<? 
		if($prod_result['hot_img']==''){
			$pic="../images/no-pic.gif";
		}else{
			$pic="../hotels/thumb/".$prod_result['hot_img'];
		}
		?>
			<td class="txtstyle1"><?=$prod_result['hot_ref']?></td>
			<td><img src="<?=$pic?>"  /></td>
			<td class="txtstyle1"><?=$prod_result['hot_name']?></td>
			<td class="txtstyle1"><?=$prod_result['hot_sdesc']?></td>
			<!--<td class="txtstyle1"><?=$prod_result['hot_url']?></td>-->
			<td>
				<div align="center"><a href="hotels.php?act=new_prod&hot_id=<?=$prod_result['hid']?>" class="a"> Edit </a> | 
			    <a href="../includes/admin_action.php?act=del&hid=<?=$prod_result['hid']?>" class="a"> Delete </a></div></td>
		</tr>
		<tr><td colspan="7">&nbsp;</td></tr>
		<? }?>
		<tr>
			<td colspan="7" align="center" class="txtstyle"><? paginate($start,$q_limit,$prodnum,$filePath,"");?></td>
		</tr>
		<tr>
		  <td colspan="7" align="center" class="txtstyle">&nbsp;</td>
		  </tr>
		<tr>
		  <td colspan="7" align="center" class="txtstyle">&nbsp;</td>
		  </tr>
		<? }?>
	  	</table>
	<? }?>
	<!--------------------Add new Products in Categories--------------------------------------------------------------------->
	<? if($_GET['act']=='new_prod'){
		$name="New Hotel";
		if($_GET['hot_id']<>''){
			$name="Edit Hotel";
			$prod1=mysql_fetch_array(mysql_query("select * from ".HOTELS." where hid='$_GET[hot_id]'"));
		}
	?>
	<form method="post" name="frm" action="../includes/admin_action.php?act=new_prod&id=<?=$prod1['hid']?>" enctype="multipart/form-data" onsubmit="return product_insert(this)">
	<!--<form method="post" name="frm" enctype="multipart/form-data" onsubmit="return product_insert(this)">-->
	<? if($_GET['hot_id']==''){ $rand = mt_rand(1,99999); ?>
		<input type="hidden"  name="hot_ref" value="<?=$rand?>">
	<? }?>
		
		<table align="center" width="60%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td align="center" colspan="3" class="mainhead1"><?=$name?></td>
		</tr>
		<tr><td colspan="3">&nbsp;</td></tr>
		<tr>
			<td class="txtstyle">Hotel Name</td>
			<td>:</td>
			<td><input type="text" name="hot_name" value="<?=$prod1['hot_name']?>" /></td>
		</tr>
		<tr><td colspan="3">&nbsp;</td></tr>
		<tr>
			<td class="txtstyle">WebSite</td>
			<td>:</td>
			<td><input type="text" name="hot_url" value="<?=$prod1['hot_url']?>"  /></td>
		</tr>
		<tr><td colspan="3">&nbsp;</td></tr>
		<input type="hidden" name="hot_img" value="<?=$prod1['hot_img']?>" />
		<? $pic1="Upload";
		if($_GET['hot_id']<>''){
			if($prod1['hot_img']==''){
				$pic="../images/no-pic.gif";
				$pic1= "Change";
			}else{
				$pic="../hotels/thumb/".$prod1['hot_img'];
			}
		?>
		<tr>
			<td class="txtstyle">Product Picture</td>
			<td>:</td>
			<td><img src="<?=$pic?>" /></td>
		</tr>
		<tr><td colspan="3">&nbsp;</td></tr>
		<? }?>
		<tr>
			<td class="txtstyle"><?=$pic1?> Picture</td>
			<td>:</td>
			<td>
				<input type="file" name="hot_img" />
				<input type="hidden" name="hot_img1" value="<?=$pic?>" />
			</td>
		</tr>
		<tr><td colspan="3">&nbsp;</td></tr>
		<tr>
			<td class="txtstyle">Short Description</td>
			<td>:</td>
			<td><input type="text" name="hot_sdesc" value="<?=$prod1['hot_sdesc']?>"  /></td>
		</tr>
		<tr><td colspan="3">&nbsp;</td></tr>
		<tr>
			<td class="txtstyle">Product Description</td>
			<td>:</td>
			<td><textarea cols="30" rows="5" name="hot_desc"><?=$prod1['hot_desc']?></textarea></td>
		</tr>
		<tr><td colspan="3">&nbsp;</td></tr>
		<tr>
			<td colspan="3" align="center">
				<input type="submit" name="cat_submit" value="Add" />
				<input type="button" name="btn" onclick="javascript:window.location='hotels.php?act=show_cat_prod'" value="Cancel" />
			</td>
		</tr>
		</table>
		</form>
		
	<? }?>
	
	</td></tr></table>
	</td>
</tr>
</table>
</body></html>