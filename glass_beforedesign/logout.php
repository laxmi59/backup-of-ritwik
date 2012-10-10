<? session_start();
////////////////   		includes			/////////////////////////////////////////
include "includes/config.php";
include "includes/filenames.php";
include "includes/functions.php";
include "includes/classobjects.php";
////////////////		End of Includes		/////////////////////////////////////////
//echo $un=$_SESSION['un'];
$tr=mysql_query("delete from ".CART." where user_id='$_SESSION[user_id]'");
$user_id=session_unset();
$username=session_unset();
echo "<script>location.replace('".FRONT_HOME."')</script>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>LogoutPage</title>
</head>

<body>
</body>
</html>
