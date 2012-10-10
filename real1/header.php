<?
$un=$_SESSION['un'];
$uid=$_SESSION['uid'];
include "dbcon.php";
?>
<link type="text/css" rel="stylesheet" href="css/style.css" />
<table width="100%" height="31" cellpadding="0" cellspacing="0" class="tabcolor">
<tr>
	<td width="34%"><a href="index.php"><img src="images/index_01.jpg" border="0" /></a></td>
	<td width="26%" align="center">
		<p class="headings">Beta</p>
		<p>		  <b>Welcome 
	    <? if($un==''){echo "Guest";}else{ echo $un;}?>
	    </b>
            </p></td>
	<td valign="top" width="40%" align="right">
		<table>
			<tr>
				<td> <a href="index.php" class="b">Home</a> </td>
				<td class="style2" style="color:#0000FF;"> | </td>
				<td> <a href="about.php" class="b">About Us</a> </td>
				<td class="style2" style="color:#0000FF;"> | </td>
				<td> <a href="faq.php" class="b">FAQ's</a> </td>
				<td class="style2" style="color:#0000FF;"> | </td>
				<td> <a href="contact.php" class="b">Contact Us</a> </td>
			</tr>
		</table>
	</td>
	
</tr>
<tr>
	<td colspan="3" style="background:url(images/index_04.jpg)">
	<table width="100%" height="31" cellpadding="0" cellspacing="0">
	<tr>
	<? if($uid==''){?>
	<td width="10%" align="center"><a href="index.php" class="a"><strong>Home </strong></a></td>
  	<td width="10%" align="center"><a href="reg.php" class="a"><strong>Register</strong></a></td>
  	<td width="10%"  align="center"><a href="login.php" class="a"><strong>LogIn</strong></a></td>
	<? }else{?>
	<td width="10%"  align="center"><a href="myaccount.php?act=show" class="a"><strong>My Account</strong></a></td>
  	<td width="10%"  align="center"><a href="logout.php" class="a"><strong>Logout</strong></a></td>
  	<? }?>
	<td width="10%"  align="center"><a href="search1.php?act=normal" class="a"><strong>Search Property </strong></a></td>
   	<? if($uid==''){?>
    <td width="10%"  align="center"><a href="login.php" class="a"><strong>Post Requirement</strong></a></td>
	<td width="10%"  align="center"><a href="login.php" class="a"><strong>List Property </strong></a></td>
  	<? }else{?>
	<td width="10%" align="center"><a href="post.php" class="a"><strong>Post Requirement</strong></a></td>
	<td width="10%"  align="center"><a href="fast.php" class="a"><strong>List Property </strong></a></td>
	<? }?>
	</tr></table>
	</td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
</table>