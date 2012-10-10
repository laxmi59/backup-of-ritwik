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
<style type="text/css">
a.image:link
{ text-shadow:none ;
text-decoration:none;
border:none;}

a.image:visited
{
text-shadow:none ;
text-decoration:none;
}
a.image:hover
{
	text-shadow:none ;
	text-decoration:none;
	}

</style>
</head>
<link type="text/css" href="style.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
<script type="text/javascript" src="js/stepcarousel.js"></script>
<link type="text/css" href="css/image-slideshow.css" rel="stylesheet">
<!--<script type="text/javascript" src="js/image-slideshow.js"></script>-->
<script type="text/javascript">
stepcarousel.setup({
	galleryid: 'galleryB', //id of carousel DIV
	beltclass: 'belt', //class of inner "belt" DIV containing all the panel DIVs
	panelclass: 'panel', //class of panel DIVs each holding content
	panelbehavior: {speed:500, wraparound:true, persist:false},
	defaultbuttons: {enable: false, moveby: 1, leftnav: ['arrowl.gif', -10, 100], rightnav: ['arrowr.gif', -10, 100]},
	statusvars: ['reportA', 'reportB', 'reportC'],
	contenttype: ['inline'] //content setting ['inline'] or ['external', 'path_to_external_file']
})

</script>

<body onload="fill()" style="margin:0px">
<div align="center">
<div style="width:980px">
<div style="width:980px"><? include "header.php"?></div>

<div style="width:980px;">
<div style="background-color:#FFFFFF">&nbsp;</div>
<div style="background-color:#FFFFFF">

<div style="float:left;"><? include "srchmain.php";?></div>
<div style="margin-left:600px"><? include "recent-post.php";?></div>
</div>
<div style="background-color:#FFFFFF">&nbsp;</div>

<div style="background-color:#FFFFFF; padding-left:18px">

<div style="background-color:#FFFFFF" align="left"><img src="images/index_21.jpg" width="941" /></div>

<div style="height:102px" class="style3">
<div style="float:left;background:url(images/bar.jpg) repeat-y; height:105px;background-color:#FFFFFF; width:50px">&nbsp;</div>
<div style="width:850px; float:left; background-color:#FFFFFF;">
   <?
   
					$build1=$build->tot_rec();
					while($build2=mysql_fetch_array($build1)){
				?>
 <div style="float:left; background-color:#FFFFFF; padding-top:15px; padding-bottom:5px" ><a href="fbuilder.php" class="image"><img src="admin/img/<?=$build2['build_img']?>" width="165" height="60" border="0" /></a>
					<br />
					<?=$build2['build_city']?>
</div>
<? }?>
</div>
<div style="background:url(images/bar.jpg) repeat-y; width=6px; height:107px; margin-left:934px; background-color:#FFFFFF ">&nbsp;</div>
</div>
<div style="background-color:#FFFFFF" align="left"><img src="images/index_26.jpg" width="941" /></div>
</div>
<div style="background-color:#FFFFFF" >&nbsp;</div>
<div style="background-color:#FFFFFF">
<div class="style4" style="width:897px; height:211px; background-color:#FFFFFF">
<div><img src="images/index_21.jpg" width="899" /></div>
<div style="background:url(images/bar.jpg) repeat-y; float:left; width:6px; height:174px; background-color:#FFFFFF">&nbsp;</div>
<div style="float:left; height:150px; width:33px; background-color:#FFFFFF" align="left">
<br />
<br />
<a href="javascript:stepcarousel.stepBy('galleryB', -2)"><img src="images/prev.gif" border="0" /></a> </div>
<div style="float:left; height:150px; width:830px">
<div id="galleryB" class="stepcarousel" style="background-color:#FFFFFF">
			<div class="belt">
					<?
					$proj1=$proj->tot_rec();
					while($proj2=mysql_fetch_array($proj1)){
					$i=1;
					?>
					<div class="panel" style="width: 150px; height:150px;"> 
					<a href="fbuilder.php" class"image"><img src="admin/img/<?=$proj2['proj_img']?>" width="150" height="100" border="0"></a>
						<br />
						<span class="style3"><?=$proj2['proj_city']?></span> 
					</div>
					<? $i++;?><?  }?>
				</div>
	  </div>
</div>
<div style=" float:left; height:150px; background-color:#FFFFFF"><br />
<br /><a href="javascript:stepcarousel.stepBy('galleryB', 2)"><img src="images/next.gif" border="0" /></a></div>
<div style="background:url(images/bar.jpg) repeat-y; float:right; width:4px; height:174px; background-color:#FFFFFF">&nbsp;</div>

<div style="background-color:#FFFFFF"><img src="images/index_26.jpg" width="899px" /></div></div>
</div>
</div>
<div style="height:10px; background-color:#FFFFFF">&nbsp;</div>
<div style="width:980px; background-color:#FFFFFF" ><? include "footer.php"?></div>
</div>
</div>
</body>
</html>
