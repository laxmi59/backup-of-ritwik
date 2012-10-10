<? session_start();
////////////////   		includes			/////////////////////////////////////////
include "includes/config.php";
include "includes/filenames.php";
include "includes/functions.php";
include "includes/classobjects.php";
////////////////		End of Includes		/////////////////////////////////////////
if($_SESSION['user_id']==''){echo "<script>location.replace('".FRONT_HOME."')</script>";}
$user1=mysql_fetch_array(mysql_query("select * from ".USERS." where `user_id`='$_SESSION[user_id]'"));
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
		<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="7" align="center" class="heading2"><div align="left">Your Shopping Cart</div></td>
		</tr>
		<tr>
		  <td colspan="7" class="heading2">&nbsp;</td>
		  </tr>
		<tr>
			<td class="txtstylebig">slno</td>
			<td class="txtstylebig">product name</td>
			<td class="txtstylebig">Quantity</td>
			<? if($user1['user_type']=='seller'){?>
			<td class="txtstylebig">Discount</td>
			<td class="txtstylebig">Real Price</td>
			<? }?>
			<td class="txtstylebig">Price</td>
			<TD>			  <div align="right">
			  <input type="submit" name="sub" value="Edit" onclick="javascript:window.location='<?=FRONT_CART?>'" />			  
			  </div></TD>
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
			while($cart2=mysql_fetch_array($cart1)){
				$prod1=mysql_fetch_array(mysql_query("select * from ".PRODUCT."	where pid='$cart2[prod_id]'"));
		?>
		<tr><td colspan="7" class="txtstyle1">&nbsp;</td></tr>
		<tr>
			<td class="txtstyle1"><?=$i?></td>
			<td class="txtstyle1"><?=$prod1['prod_name']?></td>
			<td class="txtstyle1"><?=$cart2['quantity']?></td>
			 <? if($user1['user_type']=='seller'){?>
			 <td class="txtstyle1" align="center"><?=$user1['user_discount']?>%</td> 
			 <td class="txtstyle1" align="center">&pound;<?=$prod1['prod_price']?></td>  
			 <? }?>
			<td class="txtstyle1">£<?=$cart2['price']?></td>
		</tr>
		<? 
		$total=$total+$cart2['price'];
		$i++;
		}?>
		<tr>
		  <td colspan="7" class="txtstyle1">&nbsp;</td>
		</tr>
		<tr><td colspan="7" style="border-bottom:1px solid black">&nbsp;</td></tr>
		<tr>
			<td colspan="5" class="heading2">Total</td>
			<td class="txtstyle1" > £<?=$total?></td>
		</tr>
		<? }?>
		<tr><td colspan="7">&nbsp;</td></tr>
		<!--<tr>
			<td colspan="6">
			<input type="button" name="checkout" value="Checkout" onclick="javascript:window.location='<?=FRONT_CONFIRM?>'" /></td>
		</tr>-->
		</table>
		<p>&nbsp;</p>
		<table width="90%" align="center"  cellpadding="0" cellspacing="0">
          <tr>
            <td colspan="2" class="heading2">Shipping Information</td>
			<td align="right">
              <input type="button" name="btn1" value="Edit" onclick="javascript:window.location='<?=FRONT_PROFILE?>?act=shipping'" />            </div></td>
          </tr>
          <tr class="content_back_color">
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr class="content_back_color">
            <td width="42%" class="txtstyle trpad">First Name</td>
            <td width="7%">:</td>
            <td width="51%"><?=$user1['user_fname']?></td>
          </tr>
          <tr class="content_back_color">
            <td colspan="3">&nbsp;</td>
          </tr>
		   <tr class="content_back_color">
            <td width="42%" class="txtstyle trpad">Phone</td>
            <td width="7%">:</td>
            <td width="51%"><?=$user1['user_phone']?></td>
          </tr>
          <tr class="content_back_color">
            <td colspan="3">&nbsp;</td>
          </tr>
		   <tr class="content_back_color">
            <td width="42%" class="txtstyle trpad">Country</td>
            <td width="7%">:</td>
            <td width="51%"><?=$user1['user_country']?></td>
          </tr>
          <tr class="content_back_color">
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr class="content_back_color">
            <td class="txtstyle trpad">State</td>
            <td>:</td>
            <td class="txtstyle"><?=$user1['user_state']?></td>
          </tr>
          <tr class="content_back_color">
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr class="content_back_color">
            <td class="txtstyle trpad">City</td>
            <td>:</td>
            <td class="txtstyle"><?=$user1['user_city']?></td>
          </tr>
          <tr class="content_back_color">
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr class="content_back_color">
            <td class="txtstyle trpad">Address</td>
            <td>:</td>
            <td class="txtstyle"><?=$user1['user_addr']?></td>
          </tr>
          <tr class="content_back_color">
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr class="content_back_color">
            <td colspan="3" align="center">&nbsp;</td>
          </tr>
        </table>
		<? if($user1['user_phone']=='' || $user1['user_country']=='' || $user1['user_state']=='' || $user1['user_city']=='' || $user1['user_addr']==''){
			echo "<div class='errstyle'> You Must update Your shipping details before checkout</div>";
		}else{?>
		<table width="90%" align="center"  cellpadding="0" cellspacing="0">
		<tr>
			<td>
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<!-- Identify your business so that you can collect the payments. --> 
			<input type="hidden" name="business" value="rama.3one@gmail.com"> 
			<!-- Specify a Buy Now button. --> 
			<input type="hidden" name="cmd" value="_xclick"> 
			<!-- Specify details about the item that buyers will purchase. --> 
			<input type="hidden" name="item_name" value="<?="Total"?>"> 
			<input type="hidden" name="amount" value="<?=$total?>"> 
			<input type="hidden" name="currency_code" value="GBP"> 
			<!-- pages to be called-->
			<input type="hidden" name="return" value="http://3one.in/projects/glass/thanku.php?act=pay_success" />
			<input type="hidden" name="cancel_return" value="http://3one.in/projects/glass/thanku.php?act=pay_cancel" />
			<!-- Display the payment button. -->
			<input type="image" name="submit" border="0" src="https://www.paypal.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online"> 
			<img alt="" border="0" width="1" height="1" src="https://www.paypal.com/en_US/i/scr/pixel.gif" > 
			</form> 
			</td>
		</tr>
		</table>
		<? }?>
		</td>
		<td width="23%">&nbsp;</td>
		
	</tr>
	</table>
	</td>
</tr>
<tr><td valign="top"><? include FRONT_FOOTER?></td></tr>
<tr><td></td></tr>
</table>
</body>
</html>
