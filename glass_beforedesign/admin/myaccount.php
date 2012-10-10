<? session_start();
////////////////   		includes			/////////////////////////////////////////
include "../includes/config.php";
include "../includes/filenames.php";
include "../includes/functions.php";
include "../includes/classobjects.php";
////////////////		End of Includes		/////////////////////////////////////////
if($_SESSION['admin_id']==''){ echo "<script>location.replace('".ADM_MAIN."')</script>";}
$prod1=mysql_fetch_array(mysql_query("select * from ".ADM." where aid='$_SESSION[admin_id]'"));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=WEBSITE_NAME?></title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="mainadmintab">
<tr><td valign="top"><? include "header.php"?></td></tr>
<? if($_GET['act']==''){?>
<tr><td class="page"><h1 align="center"> Welcome &nbsp;<?=$_SESSION['admin_name']?></h1></td></tr>
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
		if($com_un_valid == '' && $com_pw_valid == '' && $com_pw_valid_size == '' && $com_rpw_valid == '' && $com_pws_valid == '')
		{
			if($_POST['pw']==$_POST['old']){  
				//echo "aaaaaaaaaa";
				$update=mysql_query("update ".ADM." set `password`='".$new."' where `aid`='".$_SESSION['admin_id']."'");
				echo "<script>location.replace('".ADM_HOME."?act=pass&msg=Password changed successfully')</script>";
			}else{
				echo "<script>location.replace('".ADM_HOME."?act=pass&msg=Old password is not correct. Enter correct password')</script>";
			}
		}
	}?>
<tr><td class="page" align="center"><span class="errstyle"><?=$_GET['msg']?></span>
<form method="post" >
	<table width="50%" align="center" cellpadding="0" cellspacing="0" class="menu_back_color1">
	<tr><td colspan="3" class="heading1 trpad trheight" >Change Password</td></tr>
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
			<input type="button" name="btn" value="Cancel" onclick="javascript:window.location='<?=ADM_HOME?>'" />
		</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
  </table>
  </form>
</td></tr>
<? }?>
</table>
</body>
</html>
