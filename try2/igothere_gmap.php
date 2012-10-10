<?php
ob_start();
session_start();
/*include "function.php";
include "ajaxfunctions.php";
include "search_ajax.php";
include "admin/includes/dbconfig.php";
include "popupwindows.php";*/
include "dbcon.php";

//if(!isset($_SESSION['user_id']) ){
//	header("Location:index.php");
//}
//$userid = $_SESSION['user_id'];

//////////////// user type ////////////////
/*$type_select = "select * from webcal_users where user_id = '$userid'";
$type_selectres = mysql_query($type_select);
$type_selectreslt = mysql_fetch_array($type_selectres);
$utype = $type_selectreslt['user_type'];*/
//////////////// user type end  ////////////////

//////////////// Multilanguage //////////////////
if(isset($_SESSION['lang']))
{
$szLanguage =  $_SESSION['lang'];
$pLang = new TalkPHP_MultiLingual('index', $szLanguage);
}
if(isset($_GET['lang']))
{
session_unregister('lang');
$_SESSION['lang'] =  $_GET['lang'];
$szLanguage =  $_SESSION['lang'];
$pLang = new TalkPHP_MultiLingual('index', $szLanguage);

}
else
{
//$pLang = new TalkPHP_MultiLingual('index', 'EN');
}
/////////////// End Multilanguage /////////////////


if(isset($_GET['add']) == 'comment')
{

$id=$_GET['id1'];
	$query_com   = "INSERT INTO `webcal_comments` (`user_id`,`event_id`,`user_comment`) VALUES ('$userid','$id','$addcomment1');";
	echo $query_com ;
	mysql_query($query_com);
	header("Location:welcome.php");	
} 


?>
<?
/////////////////////////// google map ///////////////////////////
require'EasyGoogleMap.class.php';
			// for localhost
			$gm = & new EasyGoogleMap("ABQIAAAAuh_J9j5CMtOIHaYAI1gg-RQ6UsSfU2wn4lla4ek4GDC_ucJ10hQVZzAP1LIPBYWHAq9JpfAt4RvXog");
			// for server
			//$gm = & new EasyGoogleMap("ABQIAAAAuh_J9j5CMtOIHaYAI1gg-RTLrDuDzKFXhYoCZ55-iHqbARlVnBRIZX6t_vxyPm3j8Q6GdES9a5FDuw");
$gm->SetMarkerIconStyle('STAR');
$gm->SetMapZoom(11);
$gm->SetMapWidth(500); # default = 300
$gm->SetMapHeight(500); # default = 300

///////////////////////////end of  google map ///////////////////////////

///////////////////////// code for map ///////////////////
$eid = $_GET['eid'];
$result = mysql_query("select * from webcal_events where event_id = '1'");
while($row = mysql_fetch_array($result))
	{
		$place= $row['event_place'] ;
		$address = $row['event_address'];
		$gm->SetAddress("$place,$address");
		$area1= "<a href=# style='vertical-align:top;'>".$row['event_name']." </a><img src='users/".$row['user_id']."/event_images/".$row['event_image']."' width='85' height='85'><p style=\"font-size:12px; font-family: Verdana\">$place</p>" ;
		$gm->SetInfoWindowText($area1);
	}
/////////////////////// end of code for map ///////////////////

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Web Calendar :: Google map</title>
<?php echo $gm->GmapsKey(); ?>
<link href="css/style.css" rel="stylesheet" type="text/css"  />
<style>
.dhtmlgoodies_question, .dhtmlgoodies_question div a{	
	color:#FFF;
	font-size:11px;
	width:216px;
	background:url(images/top_menu_bg.gif) repeat-x;
	height:20px;
	cursor:pointer;
	font-family: tahoma, Helvetica, sans-serif;
	font-weight: bold;
	line-height:18px;
}
.dhtmlgoodies_question div a{
	background:none;
	border:none;
	}
.dhtmlgoodies_answer{	
	background-color:#849ba6;
	width:216px;
	height:auto;
	color:#000000;
}
.dhtmlgoodies_answer_content{	
	padding:1px 10px 5px;
	font-size:0.9em;	
	position:relative;
	color:#FFFFFF;
}

</style>
<link href="css/cal.css" rel="stylesheet" type="text/css">

<script language="JavaScript" type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<script type="text/javascript" src="js/sliding.js">

</script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/animated1.js"></script>
<script type="text/javascript" src="js/animated.js"></script>
<script type="text/javascript">
animatedcollapse1.addDiv('viewevents', 'fade=1,height=auto')
animatedcollapse1.addDiv('viewevents_1', 'fade=1,height=auto')
animatedcollapse1.addDiv('viewevents_5', 'fade=1,height=auto')

animatedcollapse1.init()
animatedcollapse.addDiv('viewevents_2', 'fade=1,height=auto')
animatedcollapse.addDiv('viewevents_3', 'fade=1,height=auto')
animatedcollapse.addDiv('viewevents_4', 'fade=1,height=auto')
animatedcollapse.init()
</script>

<script type="text/javascript">
function del_popup(userid){
		document.location.href = 'welcome.php?actions=deletepopup&uid='+userid;
}
function changeColor(f)
{
f.style.backgroundColor='#fcbb37';
}

function changeColor1(f)
{
f.style.background='';
}
function changeColorcomm(f)
{

f.style.backgroundColor='#5DAED1';
f.style.cursor='pointer';
}

function changeColor1comm(f)
{
f.style.backgroundColor='#849ba6';
}
</script>

<link  href="includes/pagination.css"  type="text/css" rel="stylesheet" />
<script type="text/javascript" src="css/virtualpaginate.js"></script>
<script type="text/javascript" src="css/sliding.js"></script>
<link  href="css/page.css"  type="text/css" rel="stylesheet" />

</head>
<body>
<center>
<div id="main">

	
	<div id="top" align="right"><a href="welcome.php?lang=FR"><img src="images/fr.png" title="French" ></a>
					&nbsp;&nbsp;<a href="welcome.php?lang=EN"><img src="images/en.png" title="English"></a>
					&nbsp;&nbsp;<a href="welcome.php?lang=GE"><img src="images/ge.png" title="German"></a>
	</div>
	<div id="menu_bg_strip" >
<div style="float:left;"><div >
	<? //include "includes/topheader.php" ?>
	
			
<div>
<?php echo $gm->MapHolder(); ?>
<?php echo $gm->InitJs(); ?>
<?php $gm->GetSideClick(); ?>
<?php //echo $gm->GetSideClick(); ?>
<?php echo $gm->UnloadMap(); ?>
</div>
			


</div>

</div>
    <? //include "includes/rightpanel.php" ?>
  
  <div class="clear"></div>
</div>
</div>


</center>
<script type="text/javascript">

var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");

document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));

</script>

<script type="text/javascript">

var pageTracker = _gat._getTracker("UA-1453402-1");

pageTracker._trackPageview();

</script>


<!--mainlinks-end-->
</body>
</html>

