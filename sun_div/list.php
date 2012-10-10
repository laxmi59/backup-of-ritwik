<? session_start();
$uid=$_SESSION['uid'];
if($_POST['btn']);
{
	if($uid=='')
	{
		echo "<script>location.replace('login.php')</script>";
	}
	else
	{
		echo "<script>location.replace('fast.php')</script>";
	}
}
?>
<style>
a:hover{text-decoration:underline;}
</style>
<body style="background-color:#FFFFFF; margin-top:18px; margin-left:110px">
<div style="width:791px; height:210px; border:1px solid #808080">
<div style="height:7%; margin:3px"><? include "header.php"?></div>
<div style="height:86%; margin:3px">
<div style="width:620px; height:210px; margin-left:80px;">
<div style="float:left; width:350px; height:200px">
<div style="margin:3px; padding:3px">Fast Response Listing.</div>
<div style="margin:3px; padding:3px">Prominently displays your property listing on search result page.</div>
<div style="margin:3px; padding:3px">Upload your property image and logo.</div>
<div style="margin:3px; padding:3px">Fast Response listings can potentially get more and faster responses.</div>
<div style="margin:3px; padding:3px">Displays property on site for mimimum 60 days.</div>
<div style="margin:3px; padding:3px" align="center"><input type="submit" name="btn" value="continue" /></div>
</div>
<div style="float:left; margin-left:25px; width:244px; height:200px; clear:right">
<div style="margin:3px; padding:3px">Basic Listing.</div>
<div style="margin:3px; padding:3px">Displays your property on search result page.</div>
<div style="margin:3px; padding:3px">Gives the description of your property.</div>
<div style="margin:3px; padding:3px">Displays your property for minimum 30 days.</div>
<div style="margin:3px; padding:3px" align="center"><input type="button" name="btn" value="continue" onclick="javascript:window.location=''" /></div>
</div>
</div>
</div>
<div style="height:7%; margin:3px">&nbsp;</div>
</div>
</body>
