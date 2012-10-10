<? session_start();
if($_SESSION['company_id']=='') header('Location:login.php');
////////////////   		includes			/////////////////////////////////////////
include "includes/config.php";
include "includes/filenames.php";
include "includes/functions.php";
include "includes/classobjects.php";
////////////////		End of Includes		/////////////////////////////////////////
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=WEBSITE_NAME?></title>

<script type="text/javascript" src="js/reg.js"></script>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="page">
<tr><td valign="top"><? include FRONT_HEADER?></td></tr>
<tr><td height="500" align="center" class="txtstyle" valign="top">
<?=$_GET['msg']?>
	<form method="post" action="<?=USER_DATA?>?act=user_reg" onsubmit="return admin_login(this)">
	<table width="50%" border="0" align="center" cellpadding="5" cellspacing="5">
	<tr><td colspan="3"><div align="center" class="mainhead1">Company Login </div></td></tr>
      <tr class="page">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	  <tr class="page">
        <td class="txtstylebig trpad">First Name</td>
        <td>:</td>
        <td><input type="text" name="fname" /></td>
      </tr>
	  <tr class="page">
        <td class="txtstylebig trpad">Last Name</td>
        <td>:</td>
        <td><input type="text" name="lname" /></td>
      </tr>
	   <tr class="page">
        <td class="txtstylebig trpad">Email</td>
        <td>:</td>
        <td><input type="text" name="user_email" /></td>
      </tr>
	  <tr class="page">
        <td class="txtstylebig trpad">Phone</td>
        <td>:</td>
        <td><input type="text" name="phone" /></td>
      </tr>
	   <tr class="page">
        <td class="txtstylebig trpad">Mobile</td>
        <td>:</td>
        <td><input type="text" name="mobile" /></td>
      </tr>
      <tr class="page">
        <td class="txtstylebig trpad">UserName</td>
        <td>:</td>
        <td><input type="text" name="username" /></td>
      </tr>
      <tr class="page">
        <td class="txtstylebig trpad">Password</td>
        <td>:</td>
        <td><input type="password" name="password" /></td>
      </tr>
		 <? if($COMFET['business_type']=='2'){?>
		<tr>
		  <td class="txtstylebig">BSB/CC</td>
		  <td> : </td><td><input type="text" name="bsb" /></td></tr>
		
		<tr>
		  <td class="txtstylebig">Division</td>
		  <td>:</td>
		  <td><input type="text" name="division" /></td>
		  </tr>
		<tr><td class="txtstylebig">Business Unit</td>
		<td> : </td><td><input type="text" name="business_unit" /></td></tr>
		
		<tr><td class="txtstylebig">Employee ID</td>
		<td> : </td><td><input type="text" name="emp_id"/></td></tr>
		
		<? }?>
	  
      <tr class="page">
        <td colspan="3"><div align="center">
          <input type="submit" name="submit" value="submit" />
        </div></td>
        </tr>
      <tr class="page">
        <td colspan="3">&nbsp;</td>
      </tr>
    </table>
	</form>
	
</td></tr>
<tr><td valign="top"><? include FRONT_FOOTER?></td></tr>
<tr><td></td></tr>
</table>
</body>
</html>
