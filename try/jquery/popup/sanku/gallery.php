<? 
////////////////   		includes			/////////////////////////////////////////
include "includes/config.php";
include "includes/filenames.php";
include "includes/functions.php";
include "includes/classobjects.php";
////////////////		End of Includes		/////////////////////////////////////////
if(isset($_GET['page_id'])){
	$page_id=$_GET['page_id'];
}else{
	$page_id=1;
}
require_once("includes/pagination.php");
$q_limit = 15;
$errMsg = 0;
if( isset($_GET['start']) )
{
	$start = $_GET['start'];
}
else
{
	$start = 0;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=WEBSITE_NAME?></title>
<!--<link rel="stylesheet" href="css/global.css" type="text/css" media="all" />-->
<style type="text/css">
<!--
  #img_container { height:120px; }
  #img_container ul {display:block;padding:0;margin:0 auto;list-style:none;}
  #img_container ul li{float:left;width:100px;margin:10px;}
  #img_container ul li a img {
      width:90px;
      height:90px;
      border:1px solid #574331;
      padding:0px;
      background:#eee;
  }
  #img_container ul li a:hover img { border-color: darkred; }
-->
</style>

<script src="js/mootools.js" type="text/javascript"></script>
<script src="js/sexylightbox.packed.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/sexylightbox.css" type="text/css" media="all" />

<script type="text/javascript">
  window.addEvent('domready', function(){
    new SexyLightBox({find:'sexylightbox', OverlayStyles:{'background-color':'#000000'},captionColor:'#FFF'});
    new SexyLightBox({find:'LGWhite', color:'white', hexcolor:'#FFFFFF', captionColor:'#000'});
  });
</script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/reg.js"></script>
</head>

<body>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="sitewidth">
<tr><td colspan="3" valign="bottom"><? include FRONT_HEADER?></td></tr>
<tr>
	<td width="191" valign="top" class="leftbar" ><? include FRONT_LEFT?></td>
    <td width="618" valign="top" class="content" style="border-right:1px solid #66CC33; border-left:1px solid #66CC33;">
	
		<?	
		if($_GET['gid']==''){
			$selnum=mysql_num_rows(mysql_query("select * from ".GALLERY_IMGS." order by img_id desc "));
			//echo"select * from ".GALLERY_IMGS." order by img_id desc ";
			$sel_fet=mysql_query("select * from ".GALLERY_IMGS." order by img_id desc limit $start,$q_limit ");
			//$sel=mysql_query("select * from ".GALLERY_IMGS." order by img_id desc ");
			
		}else{
			$selnum=mysql_num_rows(mysql_query("select * from ".GALLERY_IMGS." where gid='$_GET[gid]' order by img_id desc "));
			$sel_fet=mysql_query("select * from ".GALLERY_IMGS." where gid='$_GET[gid]' order by img_id desc limit $start,$q_limit ");
			//$sel=mysql_query("select * from ".GALLERY_IMGS." where gid='$_GET[gid]' order by img_id desc ");
			
		}?>
		<?  $a=mysql_query("select * from ".GALLERY." where gid='$_GET[gid]'");
			$a_fet=mysql_fetch_array($a)?>
      <table width="97%" cellpadding="0" cellspacing="0">
	<tr>
	  <td class="style1">&nbsp;</td>
	  </tr>
	<tr>
		<td class="style1"><?=$a_fet['gal_name']?> &nbsp;Gallery </td>
	</tr>
<tr>
	  <td class="style1">&nbsp;</td>
	  </tr>
	<tr>
	
		<td align="center">
		<div id="img_container">
		<ul>
		<? while($row=mysql_fetch_array($sel_fet)){?>
			<li><a href="gallery/<?=$row['img_path']?>"  class="sexylightbox" rel="group1" title="<?=$row['img_title']?>"><img src="gallery/thumb/<?=$row['img_path']?>" alt="<?=$row['img_title']?>"/></a></li>
		<? }?>
		</ul>
            	
            </div>		</td>
	</tr>
	<tr><td align="center"><? paginate($start,$q_limit,$selnum,"gallery.php?gid=$_GET[gid]&","");?></td></tr>
	</table>
	</td>
	<td width="162" valign="top" class="rightbar"><? include FRONT_RIGHT?></td>
</tr>
<tr><td valign="top" colspan="3" align="center"><? include FRONT_FOOTER?></td></tr>
</table>
</body>
</html>
