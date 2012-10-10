<? session_start();
////////////////   		includes			/////////////////////////////////////////
include "includes/config.php";
include "includes/filenames.php";
include "includes/functions.php";
include "includes/classobjects.php";
////////////////		End of Includes		/////////////////////////////////////////
if($_SESSION['user_id']==''){echo "<script>location.replace('".FRONT_HOME."')</script>";}
$prod1=mysql_fetch_array(mysql_query("select * from ".USERS." where `user_id`='$_SESSION[user_id]'"));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=WEBSITE_NAME?></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/reg.js"></script>
</head>

<body>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="sitewidth">
<tr><td valign="top"><? include FRONT_HEADER?></td></tr>
<tr>
	<td align="center" valign="top" class="page txtstyle">
	<br /><br /><span class="errstyle"><?=$_GET['msg']?></span><br /><br />
	<? if($_GET['act']=='show'){?>
	<table width="40%" align="center" cellpadding="0" cellspacing="0" class="menu_back_color1">
	<tr><td colspan="2" class="heading1 trpad">My Account</td>
	</tr>
	<tr class="content_back_color">
	  <td colspan="2">&nbsp;</td></tr>
	<tr class="content_back_color">
	  <td class="trpad">Contact Information</td><td><a href="<?=FRONT_PROFILE?>?act=contact_show">View</a></td>
	<tr class="content_back_color">
	  <td colspan="2">&nbsp;</td></tr>
	<tr class="content_back_color">
	  <td class="trpad">Address Information</td><td><a href="<?=FRONT_PROFILE?>?act=addr_show">View</a></td>
	<tr class="content_back_color">
	  <td colspan="2">&nbsp;</td></tr>
	<tr class="content_back_color">
	  <td class="trpad">Change Password</td><td><a href="<?=FRONT_PROFILE?>?act=pass">Edit</a></td>
	<tr class="content_back_color">
	  <td colspan="2">&nbsp;</td></tr>
	</table>
	<? }?>
	<? if($_GET['act']=='contact_show'){?>
	<table width="40%" align="center" cellpadding="0" cellspacing="0" class="menu_back_color1">
	<tr><td colspan="3" class="heading1 trpad">Contact Information</td></tr>
	<tr class="content_back_color">
	  <td colspan="3">&nbsp;</td></tr>
	<tr class="content_back_color">
		<td width="39%" class="txtstyle trpad">First Name</td>
		<td width="5%">:</td>
		<td width="56%"><?=$prod1['user_fname']?></td>
	</tr>
	<tr class="content_back_color">
	  <td colspan="3">&nbsp;</td></tr>
	<tr class="content_back_color">
		<td class="txtstyle trpad">Last Name</td>
		<td>:</td>
		<td class="txtstyle"><?=$prod1['user_lname']?></td>
	</tr>
	<tr class="content_back_color">
	  <td colspan="3">&nbsp;</td></tr>
	<tr class="content_back_color">
		<td class="txtstyle trpad">Email</td>
		<td>:</td>
		<td class="txtstyle"><?=$prod1['user_email']?></td>
	</tr>
	<tr class="content_back_color">
	  <td colspan="3">&nbsp;</td></tr>
	<tr class="content_back_color">
		<td class="txtstyle trpad">Phone</td>
		<td>:</td>
		<td class="txtstyle"><?=$prod1['user_phone']?></td>
	</tr>
	<tr class="content_back_color">
	  <td colspan="3">&nbsp;</td></tr>
	<tr class="content_back_color">
		<td class="txtstyle trpad">Mobile</td>
		<td>:</td>
		<td class="txtstyle"><?=$prod1['user_mobile']?></td>
	</tr>
	<tr class="content_back_color">
	  <td colspan="3">&nbsp;</td></tr>
	 <tr class="content_back_color">
	 	<td colspan="3" align="center">
			<input type="button" name="btn1" value="Edit" onclick="javascript:window.location='<?=FRONT_PROFILE?>?act=contact'" />
			<input type="button" name="btn2" value="Cancel" onclick="javascript:window.location='<?=FRONT_PROFILE?>?act=show'" />	 	</td>
	</tr>
	 <tr class="content_back_color">
	   <td colspan="3" align="center">&nbsp;</td>
	   </tr>
	</table>
	<? }?>
	<? if($_GET['act']=='contact'){?>
	<form method="post" action="<?=USER_DATA?>?act=edit_contact">
	<!--<form method="post" onsubmit="return contact_info(this)">-->
	<table width="40%" align="center" cellpadding="0" cellspacing="0" class="menu_back_color1">
	<tr><td colspan="3" class="heading1 trpad">Contact Information</td></tr>
	<tr class="content_back_color">
	  <td colspan="3">&nbsp;</td></tr>
	<tr class="content_back_color">
		<td width="39%" class="txtstyle trpad">First Name</td>
		<td width="5%">:</td>
		<td width="56%"><input type="text" name="user_fname" value="<?=$prod1['user_fname']?>" /></td>
	</tr>
	<tr class="content_back_color"><td colspan="3">&nbsp;</td></tr>
	<tr class="content_back_color">
		<td class="txtstyle trpad">Last Name</td>
		<td>:</td>
		<td class="txtstyle"><input type="text" name="user_lname" value="<?=$prod1['user_lname']?>"  /></td>
	</tr>
	<tr class="content_back_color">
	  <td colspan="3">&nbsp;</td></tr>
	<?php /*?><tr class="content_back_color">
		<td class="txtstyle trpad">Email</td>
		<td>:</td>
		<td class="txtstyle"><input type="hidden" name="user_email" value="<?=$prod1['user_email']?>"  /></td>
	</tr>
	<tr class="content_back_color">
	  <td colspan="3">&nbsp;</td></tr><?php */?>
	<tr class="content_back_color">
		<td class="txtstyle trpad">Phone</td>
		<td>:</td>
		<td class="txtstyle"><input type="text" name="user_phone" value="<?=$prod1['user_phone']?>"  /></td>
	</tr>
	<tr class="content_back_color">
	  <td colspan="3">&nbsp;</td></tr>
	<tr class="content_back_color">
		<td class="txtstyle trpad">Mobile</td>
		<td>:</td>
		<td class="txtstyle"><input type="text" name="user_mobile" value="<?=$prod1['user_mobile']?>"  /></td>
	</tr>
	<tr class="content_back_color">
	  <td colspan="3">&nbsp;</td></tr>
	 <tr class="content_back_color">
	 	<td colspan="3" align="center">
			<input type="submit" name="contact" value="Submit" />&nbsp;
			<input type="button" name="contact1" value="Cancel" onclick="javascript:window.location='<?=FRONT_PROFILE?>?act=contact_show'"  />	 	</td>
	</tr>
	 <tr class="content_back_color">
	   <td colspan="3" align="center">&nbsp;</td>
	   </tr>
	</table>
	</form>
	<? }?>
	<? if($_GET['act']=='addr_show'){?>
	<table width="40%" align="center" cellpadding="0" cellspacing="0" class="menu_back_color1">
	<tr><td colspan="3" class="heading1 trpad">Address Information</td></tr>
	<tr class="content_back_color">
	  <td colspan="3">&nbsp;</td></tr>
	<tr class="content_back_color">
		<td width="39%" class="txtstyle trpad">Country</td>
		<td width="5%">:</td>
		<td width="56%"><?=$prod1['user_country']?></td>
	</tr>
	<tr class="content_back_color">
	  <td colspan="3">&nbsp;</td></tr>
	<tr class="content_back_color">
		<td class="txtstyle trpad">State</td>
		<td>:</td>
		<td class="txtstyle"><?=$prod1['user_state']?></td>
	</tr>
	<tr class="content_back_color">
	  <td colspan="3">&nbsp;</td></tr>
	<tr class="content_back_color">
		<td class="txtstyle trpad">City</td>
		<td>:</td>
		<td class="txtstyle"><?=$prod1['user_city']?></td>
	</tr>
	<tr class="content_back_color">
	  <td colspan="3">&nbsp;</td></tr>
	<tr class="content_back_color">
		<td class="txtstyle trpad">Address</td>
		<td>:</td>
		<td class="txtstyle"><?=$prod1['user_addr']?></td>
	</tr>
	<tr class="content_back_color">
	  <td colspan="3">&nbsp;</td></tr>
	<tr class="content_back_color">
		<td colspan="3" align="center">
			<input type="button" name="btn1" value="Edit" onclick="javascript:window.location='<?=FRONT_PROFILE?>?act=addr'" />
			<input type="button" name="btn2" value="Cancel" onclick="javascript:window.location='<?=FRONT_PROFILE?>?act=show'" />		</td>
	</tr>
	<tr class="content_back_color">
	  <td colspan="3" align="center">&nbsp;</td>
	  </tr>
	</table>
	<? }?>
	<? if($_GET['act']=='addr'){?>
	<form method="post" action="<?=USER_DATA?>?act=edit_addr" onsubmit="return addr_info(this)">
	<!--<form method="post" name="addr" onsubmit="return addr_info(this)">-->
	<table width="40%" align="center" cellpadding="0" cellspacing="0" class="menu_back_color1">
	<tr><td colspan="3" class="heading1 trpad">Address Information</td></tr>
	<tr class="content_back_color">
	  <td colspan="3">&nbsp;</td></tr>
	<tr class="content_back_color">
		<td width="39%" class="txtstyle trpad">Country</td>
		<td width="5%">:</td>
		<td width="56%"><input type="text" name="user_country" value="<?=$prod1['user_country']?>" /></td>
	</tr>
	<tr class="content_back_color">
	  <td colspan="3">&nbsp;</td></tr>
	<tr class="content_back_color">
		<td class="txtstyle trpad">State</td>
		<td>:</td>
		<td class="txtstyle"><input type="text" name="user_state" value="<?=$prod1['user_state']?>"  /></td>
	</tr>
	<tr class="content_back_color">
	  <td colspan="3">&nbsp;</td></tr>
	<tr class="content_back_color">
		<td class="txtstyle trpad">City</td>
		<td>:</td>
		<td class="txtstyle"><input type="text" name="user_city" value="<?=$prod1['user_city']?>"  /></td>
	</tr>
	<tr class="content_back_color">
	  <td colspan="3">&nbsp;</td></tr>
	<tr class="content_back_color">
		<td class="txtstyle trpad">Address</td>
		<td>:</td>
		<td class="txtstyle"><input type="text" name="user_addr" value="<?=$prod1['user_addr']?>"  /></td>
	</tr>
	<tr class="content_back_color">
	  <td colspan="3">&nbsp;</td></tr>
	 <tr class="content_back_color">
	 	<td colspan="3" align="center">
			<input type="submit" name="addr" value="Submit" />&nbsp;
			<input type="button" name="addr1" value="Cancel" onclick="javascript:window.location='<?=FRONT_PROFILE?>?act=addr_show'"  />	 	</td>
	</tr>
	 <tr class="content_back_color">
	   <td colspan="3" align="center">&nbsp;</td>
	   </tr>
	</table>
	</form>
	<? }?>
	<? if($_GET['act']=='pass'){
	if($_POST['submit']){
		extract($_POST);
		//print_r($_POST);
		$com_un_valid 		=$valid->notempty($_POST['old']," Old Password Should not be Empty");
		$com_pw_valid 		=$valid->notempty($_POST['new']," New Password Should not be Empty");
		$com_pw_valid_size	=$valid->pass($_POST['new'],"length in between 6 and 20");
		$com_rpw_valid		=$valid->notempty($_POST['new1'],"Confirm Password Should not be Empty");
		$com_pws_valid		=$valid->samepass($_POST['new'] , $_POST['new1'],"Both passwords must be same");
		
		if($com_un_valid == '' && $com_pw_valid == '' && $com_pw_valid_size == '' && $com_rpw_valid == '' && $com_pws_valid == '')	{
			if($_POST['pw']==$_POST['old']){  
				//echo "aaaaaaaaaa";
				$update=mysql_query("update ".USERS." set `password`='".$new."' where `user_id`='".$_SESSION['user_id']."'");
				echo "<script>location.replace('".FRONT_PROFILE."?act=show&msg=Password changed successfully')</script>";
			}else{
				echo "<script>location.replace('".FRONT_PROFILE."?act=pass&msg=Old password is not correct. Enter correct password')</script>";
			}
		}
	}
	?>
	
	<form method="post" >
	<table width="50%" align="center" cellpadding="0" cellspacing="0" class="menu_back_color1">
	<tr><td colspan="3" class="heading1 trpad" >Change Password</td></tr>
	<tr class="linebreak"><td colspan="3"><input type="hidden" name="pw" value="<?=$prod1['password'];?>"></td></tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="content_back_color">
		<td width="37%" class="txtstyle trpad">Old password</td>
		<td width="4%">:</td>
		<td width="59%"><input type="password" name="old" /><span class="star"><?=$com_un_valid?></span></td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="content_back_color">
		<td height="24" class="txtstyle trpad">New password</td>
		<td>:</td>
		<td><input type="password" name="new"  /><span class="star"><?=$com_pw_valid?><?=$com_pw_valid_size?><?=$com_pws_valid?></span></td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="content_back_color">
		<td class="txtstyle trpad">Confim password</td>
		<td>:</td>
		<td><input type="password" name="new1"  /><span class="star"><?=$com_rpw_valid?></span></td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="content_back_color">
	  <td colspan="3" align="center">
			<input type="submit" name="submit" value="change" />&nbsp;&nbsp;&nbsp;
			<input type="button" name="btn" value="Cancel" onclick="javascript:window.location='<?=FRONT_PROFILE?>?act=show'" />
		</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
  </table>
  </form>
	<? }?>
	<? if($_GET['act']=='shipping'){?>
	<form method="post" action="<?=USER_DATA?>?act=shipping" onsubmit="return ship_info(this)">
	<!--<form method="post" onsubmit="return ship_info(this)">-->
      <table width="40%" align="center" cellpadding="0" cellspacing="0" class="menu_back_color1">
        <tr>
          <td colspan="3" class="heading1 trpad">Shipping Information</td>
        </tr>
        <tr class="content_back_color">
          <td colspan="3">&nbsp;</td>
        </tr>
		<tr class="content_back_color">
		<td width="39%" class="txtstyle trpad">First Name</td>
		<td width="5%">:</td>
		<td width="56%"><input type="text" name="user_fname" value="<?=$prod1['user_fname']?>" /></td>
		</tr>
		<tr class="content_back_color"><td colspan="3">&nbsp;</td></tr>
		<tr class="content_back_color">
		<td class="txtstyle trpad">Phone</td>
		<td>:</td>
		<td class="txtstyle"><input type="text" name="user_phone" value="<?=$prod1['user_phone']?>"  /></td>
	</tr>
	<tr class="content_back_color">
	  <td colspan="3">&nbsp;</td></tr>
        <tr class="content_back_color">
          <td width="39%" class="txtstyle trpad">Country</td>
          <td width="5%">:</td>
          <td width="56%"><input type="text" name="user_country" value="<?=$prod1['user_country']?>" /></td>
        </tr>
        <tr class="content_back_color">
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr class="content_back_color">
          <td class="txtstyle trpad">State</td>
          <td>:</td>
          <td class="txtstyle"><input type="text" name="user_state" value="<?=$prod1['user_state']?>"></td>
        </tr>
        <tr class="content_back_color">
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr class="content_back_color">
          <td class="txtstyle trpad">City</td>
          <td>:</td>
          <td class="txtstyle"><input type="text" name="user_city" value="<?=$prod1['user_city']?>"></td>
        </tr>
        <tr class="content_back_color">
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr class="content_back_color">
          <td class="txtstyle trpad">Address</td>
          <td>:</td>
          <td class="txtstyle"><input type="text" name="user_addr" value="<?=$prod1['user_addr']?>"></td>
        </tr>
        <tr class="content_back_color">
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr class="content_back_color">
          <td colspan="3" align="center"><input type="submit" name="addr" value="Submit" />
            &nbsp;
            <input type="button" name="addr12" value="Cancel" onclick="javascript:window.location='<?=FRONT_CONFIRM?>'">          </td>
        </tr>
        <tr class="content_back_color">
          <td colspan="3" align="center">&nbsp;</td>
        </tr>
      </table>
    </form>
	<? }?>
	</td>
</tr>
<tr><td valign="top"><? include FRONT_FOOTER?></td></tr>
<tr><td></td></tr>
</table>
</body>
</html>
