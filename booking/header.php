<link rel="stylesheet" type="text/css" href="style.css" />
<table width="900" align="center" cellpadding="0" cellspacing="0" class="content">
<tr>
    <td>
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td width="27%"  class="topbar">&nbsp;</td>
	</tr>
    <tr>
        <td class="banner" align="center" >
		  <?php /*?><div align="right">
           <? if($_SESSION['uid']==''){?>
		  	  <a href="<?=FRONT_REG?>" class="a">Register</a>/<a href="myaccount.php?act=login" class="a">Sign in</a>
		  <? }else{?>
	  		  <a href="logout.php" class="a">Logout</a>
		  <? }?>
        </div>	<?php */?>	</td>
		</tr>
<!--	<tr><td colspan="3" class="linebreak"></td></tr>-->
	</table></td>
  </tr>
  <tr>
    <td>
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="menu_back_color1">
      <tr>
        <td width="965"  class="menu_back_color1">
		<div id="navcontainer">
		<ul id="navlist">
		<li style="width:180px; padding-left:0px;" >&nbsp;</li>
		<li style="width:50px; padding-left:0px;"  >
			<a style=" padding-top:9px;text-align:center" href="<?=FRONT_HOME?>">Home</a>		</li>
		<? if($_SESSION['company_id']==''){
		?>
		<li style="width:100px; padding-left:0px;"  >
			<a style=" padding-top:9px;text-align:center" href="<?=FRONT_LOG?>">Company Login</a>
		</li>
		<? }elseif($_SESSION['company_id']<>'' && $_SESSION['user_id']==''){?>
		
		<li style="width:100px; padding-left:0px;"  >
			<a style=" padding-top:9px;text-align:center" href="userlogin.php">User Login</a>
		</li>
		<li style="width:150px; padding-left:0px;"  >
			<a style=" padding-top:9px;text-align:center" href="userregistration.php">User Registration</a>
		</li>
		<li style="width:100px; padding-left:0px;"  >
			<a style=" padding-top:9px;text-align:center" href="logout.php">Company Logout</a>
		</li>
		<? }else{?>
		<li style="width:80px; padding-left:0px;" >
			<a style=" padding-top:9px;text-align:center" href="reg.php?act=sel">Booking</a>
		</li>
		<? }?>
		<li style="width:140px; padding-left:0px;" >&nbsp;</li>
		</ul>
	</div>
	<? if($_SESSION['company_id']<>''){
		$COMFET=mysql_fetch_array(mysql_query("select * from cal_company where id=$_SESSION[company_id]"));
	}?>
	<?php /*?><? if($_SESSION['user_id']<>''){
		$USRFET=mysql_fetch_array(mysql_query("select * from cal_users where id=$_SESSION[user_id]"));
	}?><?php */?>
	</td>
       </tr>
    </table></td>
  </tr>
</table>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="head"></td>
  </tr>
  <tr>
    <td class="head1"></td>
  </tr>
  <tr>
    <td class="head"></td>
  </tr>
</table>