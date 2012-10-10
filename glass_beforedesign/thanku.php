<? session_start();
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
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="mainadmintab">
<tr><td valign="top"><? include FRONT_HEADER?></td></tr>
<tr>
	<td align="center" class="page txtstyle">
	<? 
	if($_GET['act']=='reg'){
		echo "Thank you for Registration. Confirmation will be sent to your email Id.";
	}
	if($_GET['act']=='pay_success'){
		echo "Your Payment Successfully Completed";
		$tr=mysql_query("delete from ".CART." where user_id='$_SESSION[user_id]'");
	}
	if($_GET['act']=='pay_cancel'){
		echo "Your Payment Canceld";
		$tr=mysql_query("delete from ".CART." where user_id='$_SESSION[user_id]'");
	}
	?>
</td>
</tr>
<tr><td valign="top"><? include FRONT_FOOTER?></td></tr>
<tr><td></td></tr>
</table>
</body>
</html>
