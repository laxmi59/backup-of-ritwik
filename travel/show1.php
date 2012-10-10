<? //session_start();
////////////////   		includes			/////////////////////////////////////////
/*include "includes/config.php";
include "includes/filenames.php";
include "includes/functions.php";
include "includes/classobjects.php";*/
////////////////		End of Includes		/////////////////////////////////////////
extract($_POST);
//print_r($_POST);
if($radcity=="New York NY US")
{
	$srch="572B0850-4E3F-469B-87B2-C17ED3EA049B";
}else
if($radcity=="Atlanta")
{
	$srch="0299B50A-4A0A-4BF9-A405-AF2077F886DD";
}else
if($radcity=="Boston")
{
	$srch="F26233EF-31CE-4292-B85B-D59136E17861";
}else
if($radcity=="Chicago")
{
	$srch="1DA91CFE-A42B-482E-BE81-6F936199644E";
}else

if($radcity=="Las Vegas NV US")
{
	$srch="7E2ED1CF-2BE5-437F-95F4-4E2E2EA606F7";
}else
if($radcity=="London")
{
	$srch="3D931ACE-E3FE-46B4-A243-61D44A22053B";
}else
if($radcity=="Los Angeles")
{
	$srch="7F81B48E-3872-405E-9CD1-C609DE0E733F";
}else
if($radcity=="New Orleans")
{
	$srch="0A998388-FE80-403C-843E-DA84B3384D36";
}else
if($radcity=="Orlando")
{
	$srch="7732A217-1867-4F13-83AC-51E94C65BB4A";
}else
if($radcity=="San Diego")
{
	$srch="152D9A9D-7729-4552-8B2A-1392B637D0DD";
}else
if($radcity=="San Francisco")
{
	$srch="5603B51F-EFAE-483E-9073-E7CECB95F048";
}else
if($radcity=="Washington")
{
	$srch="2C89971E-5B17-42A9-8AC2-7A7108ABA022";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
<link href="css/search.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/js.js"></script>
</head>
<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr>
	<td><? include "header.php"?></td>
</tr>

<tr><td>&nbsp;</td></tr>
<? if($_GET['link1']){
$tt=$_GET['link1']."?currencyCode=".$currencyCode."&cid=".$cid."&searchType=DESTINATION&searchParam=".$srch."&userCity=".$radcity."&travelDetail=[20100331-2]2&propUnavail=null";
?>
<tr>
	<td align="center"><iframe style="width:900px; height:1000px; border:none; background-color:#FFFFFF;" src="<?=$tt?>"></iframe></td>
</tr>  
<? }?>
</table>
</body>
</html>
