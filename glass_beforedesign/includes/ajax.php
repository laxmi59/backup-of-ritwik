<? session_start();
////////////////   		includes			/////////////////////////////////////////
include "config.php";
include "filenames.php";
include "functions.php";
include "classobjects.php";

////////////////		End of Includes		/////////////////////////////////////////
?>
<? 
if($_GET['act']=='run')
{
	$u=$_GET["q"];
	//// Change these to reflect your database details too: //////////////////
	$query = "SELECT * FROM ".USERS." WHERE username = '$u'";
	$result = mysql_query($query);
	$a=strlen($u);
	if(mysql_num_rows($result)!=0)
	{
	 	echo "<br><font color='red' face='Verdana, Arial, Helvetica, sans-serif' size='-1'>That user name is already exits.</font>";
		//echo "<input type='hidden' name='user_check' value=''>";
	}else{
		//echo "<input type='hidden' name='user_check' value='aaa'>";
	}
}
if($_GET['act']=='rmail')
{
	$u=$_GET["q"];
	$query = "SELECT * FROM ".USERS." WHERE user_email = '$u'";
	$result = mysql_query($query);
	if(mysql_num_rows($result)!=0)
	{
		echo "<br><font color='red' face='Verdana, Arial, Helvetica, sans-serif' size='-1'>Email Id is already exits. Provide Another Email Id</font>";
		//echo "<input type='hidden' name='email_check' value=''>";
	}else{
		//echo "<input type='hidden' name='email_check' value='aaa'>";
	}
	
}
?>