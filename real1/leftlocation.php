<?
$loc=new real_location();
?>
<link href="css/style.css" type="text/css" rel="stylesheet" />
<table width="95%" cellpadding="0" cellspacing="0" class="innertab">
<tr>
	<td class="style3">Searching Options</td>
</tr>
<tr class="linebreak"><td></td></tr>
<tr class="tabcolor">
	<td class="trpad style4">
	<img src="img/dimond.jpg" /><a class="b" href="search1.php?act=refid"> Search By Sun Properties Id</a><br />
	<img src="img/dimond.jpg" /><a class="b" href="search1.php?act=location"> Search By City Name </a><br />
	<img src="img/dimond.jpg" /><a class="b" href="search1.php?act=area"> Search By City and Location </a><br />
	<img src="img/dimond.jpg" /><a class="b" href="search1.php?act=normal"> Search</a>
	</td>
</tr>
<tr class="trcol1"><td></td></tr>
<?php /*?><? if($_GET['aid']){?>
<tr>
	<td class="style1">Location wise search</td>
</tr>
<tr class="trcol1"><td></td></tr>
<? 
$num=mysql_num_rows($xx1);
while($loc=mysql_fetch_array($loc1)){
	//if($loc['cid']==11){?>
	<!--<tr class="trcol">
		<td align="right"><a href="#">View All Cities</a></td>
	</tr>-->
<?	//break;
	//}
?>

<tr class="trcol">
	<td  class="trpad style8"><img src="img/dimond.jpg" />
		<a class="trpad" href="result.php?cid=<?=$loc['city_name']?>">
		<?=$loc['city_name']?><?="(".$num.")"?>
		</a>
	</td>
</tr>
<? }}?><?php */?>
<tr class="linebreak"><td></td></tr>
</table>