<?
$abc=$_SERVER['PHP_SELF'];
//$abc1="/rama/desieventz/";
$abc1="/projects/desieventz/";
//$abc1="/eventbuff/";
if($abc==$abc1.'index.php'){$ac1='id="active"'; }
if($abc==$abc1.'events.php'){$ac2='id="active"';}
if($abc==$abc1.'movies.php'){$ac3='id="active"';}
if($abc==$abc1.'org.php'){$ac4='id="active"';}
if($abc==$abc1.'myaccount.php'){$ac5='id="active"';}
$page=explode("/",$abc);
//echo $page[3];
?>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<table width="100%" cellpadding="0" cellspacing="0">
<tr>
    <td>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td colspan="3" class="linebreak"></td></tr>
	<tr>
        <td colspan="3" valign="top" align="right">
		<table width="100%" cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td width="55%" align="center" class="heading1">
			<? if($_SESSION['user_id']==''){ echo "Welcome Guest";}else{ echo "Welcome ".$_SESSION['username'];}?>
			</td>
			<td width="45%" align="right">
		     <? if($_SESSION['user_id']==''){?>
		  	 	<?php /*?> <a href="<?=FRONT_REG?>" class="a">Register</a>/<a href="myaccount.php?act=login" class="a">Sign in</a><?php */?>
			 	<? include "login_top.php";?>
		  	 <? }else{
		  	 	$tt=mysql_num_rows(mysql_query("select * from ".CART." where user_id='$_SESSION[user_id]'"));
		  	 ?>
		  	 	<a href="<?=FRONT_CART?>" class="a">Cart <?="(".$tt.")"?></a>/
	  		    <a href="<?=FRONT_LOGOUT?>" class="a">Logout</a>
		  		<? }?>        	</td>
			</tr>
			
		</table>
	</tr>
	
	<tr><td colspan="3" class="linebreak"></td></tr>
	</table></td>
  </tr>
  <tr>
    <td>
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="965" class="menu_back_color1">
		<div id="navcontainer">
		<ul id="navlist">
		<? if($_SESSION['user_id']==''){?>
		<li style="width:180px; padding-left:0px;" >&nbsp;</li>
		<li style="width:70px; padding-left:0px;" <?=$ac1?> >
			<a style=" padding-top:9px;text-align:center" href="<?=FRONT_HOME?>">Home</a>
		</li>
		<li style="width:70px; padding-left:0px;" <?=$ac1?> >
			<a style=" padding-top:9px;text-align:center" href="<?=FRONT_REG?>">Register</a>
		</li>
		<li style="width:70px; padding-left:0px;" <?=$ac1?> >
			<a style=" padding-top:9px;text-align:center" href="<?=FRONT_LOG?>">Login</a>
		</li>
		<li style="width:100px; padding-left:0px;" <?=$ac1?> >
			<a style=" padding-top:9px;text-align:center" href="<?=FRONT_ABOUT?>">About Us</a>
		</li>
		<li style="width:100px; padding-left:0px;" <?=$ac1?> >
			<a style=" padding-top:9px;text-align:center" href="<?=FRONT_CONTACT?>">Contact Us</a>
		</li>
		<li style="width:140px; padding-left:0px;" >&nbsp;</li>
		<? }else{?>
		<li style="width:180px; padding-left:0px;" >&nbsp;</li>
		<li style="width:70px; padding-left:0px;" <?=$ac1?> >
			<a style=" padding-top:9px;text-align:center" href="<?=FRONT_HOME?>">Home</a>
		</li>
		<li style="width:100px; padding-left:0px;" <?=$ac1?> >
			<a style=" padding-top:9px;text-align:center" href="<?=FRONT_PROFILE?>?act=show">My account</a>
		</li>
		<li style="width:100px; padding-left:0px;" <?=$ac1?> >
			<a style=" padding-top:9px;text-align:center" href="<?=FRONT_ABOUT?>">About Us</a>
		</li>
		<li style="width:100px; padding-left:0px;" <?=$ac1?> >
			<a style=" padding-top:9px;text-align:center" href="<?=FRONT_CONTACT?>">Contact Us</a>
		</li>
		<li style="width:140px; padding-left:0px;" >&nbsp;</li>
		<? }?>
		</ul>
	</div></td>
       </tr>
    </table></td>
  </tr>
  <tr><td class="linebreak"></td></tr>
</table>