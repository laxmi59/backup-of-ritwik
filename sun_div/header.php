<?
$un=$_SESSION['un'];
$uid=$_SESSION['uid'];
include "dbcon.php";
?>
<link type="text/css" rel="stylesheet" href="css/style.css" />
<div style="980px; background-color:#FFFFFF">

<div style="width:339px; float:left; height:137px;"><a href="index.php"><img src="images/index_01.jpg" border="0" /></a></div>

<div style="width:310px; background-color:#FFFFFF; float:left; height:137px">
 <div style="height:30px">&nbsp;</div>
 <div align="center"><p class="headings"> Beta</p></div>
<div align="center">  <p>		  <b>Welcome 
	    <? if($un==''){echo "Guest";}else{ echo $un;}?>
  </b>      </p></div>
	  
</div>	  
	  
<div style=" height:137px; background-color:#FFFFFF" >
<div align="right"> <a href="index.php" class="b">Home</a> | <a href="about.php" class="b">About Us</a> 
				 | <a href="faq.php" class="b">FAQ's</a> |  <a href="contact.php" class="b">Contact Us</a> 
<span style="width:20px">&nbsp;</span>
</div>
</div>

<div>
<? if($uid==''){?>
	<div style="float:left; width:163px; background:url(img/menu.JPG) repeat-x; padding-top:10px; padding-bottom:10px; " align="center"><a href="index.php" class="a"><strong>Home </strong></a></div>
  	<div style="float:left; width:163px; background:url(img/menu.JPG) repeat-x; padding-top:10px; padding-bottom:10px;" align="center"><a href="reg.php" class="a"><strong>Register</strong></a></div>
  	<div style="float:left; width:163px; background:url(img/menu.JPG) repeat-x; padding-top:10px; padding-bottom:10px;"  align="center"><a href="login.php" class="a"><strong>LogIn</strong></a></div>
<? }else{?>	
<div style="float:left; width:196px; background:url(img/menu.JPG) repeat-x; padding-top:10px; padding-bottom:10px;"  align="center"><a href="myaccount.php?act=show" class="a"><strong>My Account</strong></a></div>
  	<div style="float:left; width:196px; background:url(img/menu.JPG) repeat-x; padding-top:10px; padding-bottom:10px;" align="center"><a href="logout.php" class="a"><strong>Logout</strong></a></div>
<? }?>  
	<div style="float:left; width:163px; background:url(img/menu.JPG) repeat-x; padding-top:10px; padding-bottom:10px;" align="center"><a href="search1.php?act=normal" class="a"><strong>Search Property </strong></a></div>
<? if($uid==''){?>
    <div style="float:left; width:165px; background:url(img/menu.JPG) repeat-x; padding-top:10px; padding-bottom:10px;" align="center"><a href="login.php" class="a"><strong>Post Requirement</strong></a></div>
	<div style="float:left; width:163px; background:url(img/menu.JPG) repeat-x; padding-top:10px; padding-bottom:10px;" align="center"><a href="login.php" class="a"><strong>List Property </strong></a></div>
<? }else{?>
	<div style="float:left; width:210px; background:url(img/menu.JPG) repeat-x; padding-top:10px; padding-bottom:10px;" align="center"><a href="post.php" class="a"><strong>Post Requirement</strong></a></div>
	
	<div style="float:left; background:url(img/menu.JPG) repeat-x; width:215px; padding-top:10px; padding-bottom:10px;" align="center"><a href="fast.php" class="a"><strong>List Property </strong></a></div>
<? }?>
</div>







</div>