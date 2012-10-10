<?
$un=$_SESSION['un'];
$uid=$_SESSION['uid'];
include "dbcon.php";
?>
<title><?=$title?></title>
<link type="text/css" href="css/style.css" rel="stylesheet" />
<body>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}

-->
</style>
<table width="100%" cellpadding="0" cellspacing="0">
<tr><td>&nbsp;</td></tr>
<tr>
	<td><a href="index.php"><img src="img/3one1.JPG" border="0"/></a></td>
</tr>
<tr><td align="center">&nbsp;<b><?=$un?></b></td></tr>

<tr><td>
	<table width="100%" height="31" cellpadding="0" cellspacing="0" style="background:url(img/career_05.jpg) repeat-x;">
	<tr>
	<? if($uid==''){?>
	<td width="10%" align="center"><a href="index.php" class="big"><strong>Home </strong></a></td>
  	<td width="10%" align="center"><a href="reg.php" class="big"><strong>Register</strong></a></td>
  	<td width="10%"  align="center"><a href="login.php" class="big"><strong>LogIn</strong></a></td>
	<? }else{?>
	<td width="10%"  align="center"><a href="myaccount.php?act=show" class="big"><strong>My Account</strong></a></td>
  	<td width="10%"  align="center"><a href="logout.php" class="big"><strong>Logout</strong></a></td>
  	<? }?>
	<td width="10%"  align="center"><a href="search1.php?act=normal" class="big"><strong>Search Property </strong></a></td>
   	<? if($uid==''){?>
    <td width="10%"  align="center"><a href="login.php" class="big"><strong>Post Requirement</strong></a></td>
	<td width="10%"  align="center"><a href="login.php" class="big"><strong>List Property </strong></a></td>
  	<? }else{?>
	<td width="10%" align="center"><a href="post.php" class="big"><strong>Post Requirement</strong></a></td>
	<td width="10%"  align="center"><a href="fast.php" class="big"><strong>List Property </strong></a></td>
	<? }?>
	</tr></table></td>
</tr></table>
<marquee onmouseover="this.scrollAmount=0" onmouseout="this.scrollAmount=3" scrollamount="3">
<table cellpadding="0" cellspacing="0">
<tr>
	<?
		$Sel=mysql_query("SELECT * FROM `real-city`");
		while($Row=mysql_fetch_array($Sel)){
	?>
	<td><a href="result_all.php?cid=<?=$Row['city_name'];?>" class="big"><?=$Row['city_name'];?></a></td>
	<td width="10">&nbsp;</td><td>|</td><td width="10">&nbsp;</td>
	<? }?>
</tr>
</table>
</marquee>
<hr>
</body>
</html>