<? session_start();

////////////////   		includes			/////////////////////////////////////////
include "includes/config.php";
include "includes/filenames.php";
include "includes/functions.php";
include "includes/classobjects.php";
////////////////		End of Includes		/////////////////////////////////////////
if($_SESSION['user_id']==''){echo "<script>location.replace('".FRONT_HOME."')</script>";}
if($_SESSION['user_id']<>''){
	$reg1=mysql_fetch_array(mysql_query("select * from ".USERS." where user_id='$_SESSION[user_id]'"));
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
		<td class="rightbar">
		<table width="70%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="7" align="center" class="heading2">Your Shopping Cart</td>
		</tr>
		<tr>
		  <td colspan="7" class="heading2">&nbsp;</td>
		  </tr>
		<tr>
			<td class="heading2">slno</td>
			<td class="heading2">product name</td>
			<td class="heading2">Quantity</td>
			<? if($reg1['user_type']=='seller'){?>
			<td class="heading2">Discount</td>
			<td class="heading2">Real Price</td>
			<? }?>
			<td class="heading2" align="right">Price</td>
			<td class="heading2" align="right">Delete</td>
		</tr>
		<?
			$cart1=mysql_query("select * from ".CART." where user_id='$_SESSION[user_id]'");
			$num=mysql_num_rows($cart1);
			if($num==''){
		?>	
		<tr>
		  <td colspan="7" class="txtstyle">&nbsp;</td>
		  </tr>
		<tr><td colspan="7" class="txtstyle"> <div align="center">Your Cart is empty </div></td>
		</tr>
		<? }else{
			$i=1;
			$total=0;
			$j=1;
			while($cart2=mysql_fetch_array($cart1)){
				$prod1=mysql_fetch_array(mysql_query("select * from ".PRODUCT."	where pid='$cart2[prod_id]'"));
		?>
		<tr>
		  <td colspan="7" class="txtstyle1">&nbsp;</td>
		  </tr>
		<form method="post" action="<?=USER_DATA?>?act=update_cart">
		<tr>
			<td class="txtstyle1"><?=$i?></td>
			<td class="txtstyle1"><?=$prod1['prod_name']?></td>
			<td class="txtstyle1">
			<?
			if($reg1['user_type']=='seller'){					
				$res= $application->discount($prod1['prod_price'],$reg1['user_discount']);
				$price= $res;
			}else{
				$price= $sel['prod_price'];
			}?>
				<input type="hidden" name="cart_id<?=$j?>" value="<?=$cart2['cart_id']?>" />
				<input type="hidden" name="price<?=$j?>" value="<?=$price?>" />
				<input name="items<?=$j?>" type="text" value="<?=$cart2['quantity']?>" size="2"  />		</td>
			
			 <? if($reg1['user_type']=='seller'){?>
			 <td class="txtstyle1" align="center"><?=$reg1['user_discount']?>%</td>
			 <td class="txtstyle1" align="center">&pound;<?=$prod1['prod_price']?></td>  
			  <? }?>
			  <td class="txtstyle1"><div align="right">
			  &pound; <?=$cart2['price']?></div></td>
			<td align="right"><a href="<?=USER_DATA?>?act=cart_del&cart_id=<?=$cart2['cart_id']?>" class="a">Delete</a></td>
		</tr>
		<? 
		$total=$total+$cart2['price'];
		$i++;
		$j++;
		}?>
		<tr>
		  <td colspan="7" class="txtstyle1">&nbsp;</td>
		</tr>
		<tr><td colspan="7" style="border-bottom:1px solid black">&nbsp;</td></tr>
		<tr>
			<td colspan="5" class="heading2">Total</td>
			<td class="txtstyle1" ><div align="right">
			  &pound;
			  <?=$total?>
			  </div></td>
		</tr>
		<? }?>
		<tr><td colspan="7">&nbsp;</td></tr>
		<tr>
			<td colspan="7">
				<input type="button" name="shop" onclick="javascript:window.location='<?=FRONT_HOME?>'" value="Continue shopping" />
				<input type="button" name="checkout" value="Checkout" onclick="javascript:window.location='<?=FRONT_CONFIRM?>'" />		
				<input type="submit" name="sub" value="update" />	
			</td>
		</tr>
		</form>
		</table>
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
