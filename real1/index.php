<? session_start();
include "class/class.php";
include "dbcon.php";
$x=new real_property();
$y=new real_location();
$list=new real_list();
$loc=new real_location();
$build=new real_featured_build();
$proj=new real_featured_proj();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$title?></title>

</head>
<link type="text/css" href="css/style.css" rel="stylesheet">
<link type="text/css" href="css/image-slideshow.css" rel="stylesheet">
<script type="text/javascript" src="js/image-slideshow.js"></script>
<body onload="initSlideShow();fill()">
<table align="center" class="tabcolor" width="980" cellpadding="0" cellspacing="0">
<tr>
	<td colspan="3"><? include "header.php"?></td>
</tr>
<tr><td colspan="3" class="trcol1"></td></tr>
<tr>
	<td width="5%">&nbsp;</td>
	<td width="90%">
	<table width="100%" cellpadding="0" cellspacing="0">
		<tr>
			<td>
			<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td width="50%"><? include "srchmain.php";?></td>
				<td align="center" width="50%">
				<table width="90%">
				<tr><td align="center">Post Your Propety Listing today</td></tr>
				<tr><td align="center"><h3><a href="reg.php">Register </a></h3></td></tr>
				</table>
				</td>
			</tr>
			</table>
			</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td><img src="images/index_21.jpg" /><br />
			<table class="style2" width="100%" cellpadding="0" cellspacing="0">
			<tr><td>&nbsp;</td></tr>
			<tr class="trcol">
				<?
					$build1=$build->tot_rec();
					while($build2=mysql_fetch_array($build1)){
				?>
				<td align="center"><img src="admin/img/<?=$build2['build_img']?>" width="170" height="60" /><br /><?=$build2['build_city']?></td>
				<? }?>
			</tr>
			</table>
			<img src="images/index_26.jpg" />
			</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td align="center"><img src="images/index_21.jpg" width="900" /><br />
			<table width="98%" class="style2" cellpadding="0" cellspacing="0">
			<tr><td colspan="3">&nbsp;</td></tr>
			<tr>
			<td width="10%">&nbsp;</td>
			<td width="80%">
			<div id="dhtmlgoodies_slideshow" align="center">
				<div id="galleryContainer">
					<div id="arrow_left"><img src="img/arrow_left.gif" width="38" height="88"></div>
					<div id="arrow_right"><img src="img/arrow_right.gif"  width="38" height="110"></div>
					<div id="theImages">
					
					<?
					$proj1=$proj->tot_rec();
					while($proj2=mysql_fetch_array($proj1)){
					$i=1;
					?>
					<a href="#" onclick="showPreview('admin/img/<?=$proj2['proj_img']?>','<?=$i?>');return false">
						<img src="admin/img/<?=$proj2['proj_img']?>" width="150" height="100"></a>	
					<? $i++; }?>	
					<div id="slideEnd"></div>
					</div>
  				</div>
			</div>
			</td>
			<td width="10%">&nbsp;</td>
			</tr>
			<tr><td colspan="3">&nbsp;</td></tr>
			</table>
			<img src="images/index_26.jpg" width="900" />
			</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td colspan="2"><? //include "recent-post.php";?></td></tr>
	</table>
	</td>
	<td width="5%">&nbsp;</td>
</tr>
<tr><td colspan="3" class="style3"><? include "footer.php"?></td></tr>
</table>
</body>
</html>