<? session_start();
if($_SESSION['aun']==''){	echo "<script>location.replace('index.php')</script>";}
?>
<title>Sun Properties</title>
<link type="text/css" href="menucss.css" rel="stylesheet" />
<link type="text/css" href="../css/style.css" rel="stylesheet" />

<table align="center" width="100%" cellpadding="0" cellspacing="0" class="tabcolor">
<tr><td colspan="13"><h1 align="center"> Welcome &nbsp;<?=$_SESSION['aun']?></h1></td></tr>
<tr>
	<td width="80" align="center"><a href="main.php?lk=home" class="b"><strong>Home</strong></a></td>
    <td width="9" align="center"><img src="images/bar_03.jpg" width="1" height="40" /></td>
	<td width="80" align="center"><a href="fast.php" class="b"><strong>List Requirement</strong></a></td>
    <td width="9" align="center"><img src="images/bar_03.jpg" width="1" height="40" /></td>
    <!--<td width="77" align="center"><a href="main.php?lk=user"><strong>Users</strong></a></td>
	<td width="8" align="center"><img src="images/bar_03.jpg" width="1" height="40" /></td>
	<td width="77" align="center"><a href="main.php?lk=list"><strong>list properties</strong></a></td>
	<td width="8" align="center"><img src="images/bar_03.jpg" width="1" height="40" /></td>
	<td width="77" align="center"><a href="main.php?lk=post"><strong>post requirements</strong></a></td>
	<td width="8" align="center"><img src="images/bar_03.jpg" width="1" height="40" /></td>
	<td width="77" align="center"><a href="main.php?lk=location"><strong>Locations</strong></a></td>
	<td width="8" align="center"><img src="images/bar_03.jpg" width="1" height="40" /></td>-->
   <!-- <td width="111" align="center"><a href="main.php?lk=myaccount"><strong>My Account</strong></a></td>-->
	 <td width="9" align="center"><img src="images/bar_03.jpg" width="1" height="40" /></td>
	<td width="95" align="center"><a href="main.php?lk=logout" class="b"><strong>Logout</strong></a></td>
</tr>
</table>


                 