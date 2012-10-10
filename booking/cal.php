<?php /*?><?
	if($abc==$abc1.'events.php'){$cat=1;}
?><?php */?>
<style>
a.tt:link{color:#FFFFFF; text-decoration:none;}
a.tt:visited{color:#FFFFFF; text-decoration:none;}
a.tt:hover{color:#FFFFFF; text-decoration:underline;}
.today{
font-weight:bold;
/*background-image:url(images/calBg2.gif);*/
background-color:#6892F2;
background-repeat:no-repeat;
background-position:center;
position:relative;
}

.event {
/*background:url(images/international2.gif) no-repeat;*/
background-color:#00CC00;
background-position:center;
border:1px solid #ffffff;
}

#table{
border:1px solid #cccccc;
padding:0;
}
#table th{
background-color:#FF0000;
text-align:center;
color:#ffffff;

}
#table td{
text-align:center;
padding:2px;
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:10px;
line-height:19px;
font-weight:bold;
margin:0;
border:1px solid #CCCCCC;
}

</style>
<script>
function goLastMonth(month, year){
// If the month is January, decrement the year
if(month == 1){
--year;
month = 13;
}
document.location.href = '<?=$_SERVER['PHP_SELF'];?>?act=all_dates&ser_id=<?=$_GET['ser_id']?>&month='+(month-1)+'&year='+year;
}
//next function
function goNextMonth(month, year){
// If the month is December, increment the year
if(month == 12){
++year;
month = 0;
}
document.location.href = '<?=$_SERVER['PHP_SELF'];?>?act=all_dates&ser_id=<?=$_GET['ser_id']?>&month='+(month+1)+'&year='+year;
}

function remChars(txtControl, txtCount, intMaxLength)
{
if(txtControl.value.length > intMaxLength)
txtControl.value = txtControl.value.substring(0, (intMaxLength-1));
else
txtCount.value = intMaxLength - txtControl.value.length;
}

function checkFilled() {
var filled = 0
var x = document.form1.calName.value;
//x = x.replace(/^\s+/,""); // strip leading spaces
if (x.length > 0) {filled ++}

var y = document.form1.calDesc.value;
//y = y.replace(/^s+/,""); // strip leading spaces
if (y.length > 0) {filled ++}

if (filled == 2) {
document.getElementById("Submit").disabled = false;
}
else {document.getElementById("Submit").disabled = true} // in case a field is filled then erased

}

</script>
</head>

<body>
<div id="legend">
<?php

$day = (isset($_GET["day"])) ? $_GET['day'] : "";
$month = (isset($_GET["month"])) ? $_GET['month'] : "";
$year = (isset($_GET["year"])) ? $_GET['year'] : "";
if(empty($day)){ $day = date("d"); }

if(empty($month)){ $month = date("m"); }

if(empty($year)){ $year = date("Y"); }
$currentTimeStamp = strtotime("$year-$month-$day");
$monthName = date("F", $currentTimeStamp);
$numDays = date("t", $currentTimeStamp);
$counter = 0;

function hiLightEvt($eMonth,$eDay,$eYear,$cat)
{
	//$tDayName = date("l");
	//echo $eDay;
	$todaysDate = date("m/d/Y");
	$dateToCompare = $eMonth . '/' . $eDay . '/' . $eYear;
	if(strlen($eDay)==1){$j='0'.$eDay;}else{ $j=$eDay;}
	if(strlen($eMonth)==1){$k='0'.$eMonth;}else{ $k=$eMonth;}
	//echo $j;
	if($_GET['month']<10)
		$sql123="SELECT * FROM ".SLOTS." where slot_persons<>0 and `slot_cid`=$_GET[ser_id] and `slot_date` = '" . $k . '/' . $j . '/' . $eYear . "'";
		//echo $sql123;
	$result=mysql_query($sql123);
	$res=mysql_num_rows($result);
	//echo $res;
	while($row= mysql_fetch_array($result)){
		if($res >=1){
			$aClass = 'class="event"/'.$row['slot_id'];
		}elseif($res == 0){
			$aClass ='class="normal"';
		}
	}
	//echo $aClass;
	return $aClass;
}
?>
<table cellpadding="0" width="97%" id="table" cellspacing="0">
<tr>
<td style="border-right:none;"><input type="button" value=" < " onClick="goLastMonth(<?php echo $month . ", " . $year; ?>);"></td>
<td style="border-right:none; border-left:none;" colspan="5">
<span class="title"><?php echo $monthName . " " . $year; ?></span><br>
</td>
<td  style="border-left:none;" align="right"><input type="button" value=" > " onClick="goNextMonth(<?php echo $month . ", " . $year; ?>);"></td>
</tr>
<tr>
<th>S</td>
<th>M</td>
<th>T</td>
<th>W</td>
<th>T</td>
<th>F</td>
<th>S</td>
</tr>
<tr>
<?php
for($i = 1; $i < $numDays+1; $i++, $counter++){
	$dateToCompare = $month . '/' . $i . '/' . $year;
	$timeStamp = strtotime("$year-$month-$i");
	//echo $dateToCompare . '<br/>';
	if($i == 1){
		// Workout when the first day of the month is
		$firstDay = date("w", $timeStamp);
		for($j = 0; $j < $firstDay; $j++, $counter++){
			echo "<td>&nbsp;</td>";
		}
	}
	if($counter % 7 == 0){?></tr><tr><?php	}	
	$ttt= hiLightEvt($month,$i,$year,$cat);
	//echo $ttt;
	$ttt1=explode("/",$ttt);
	//echo $ttt1[1];
	?>
	<!--right here-->
	<td width="20" <?=$ttt1[0];?>>
	<? if($ttt1[1]==''){ echo $i;}else{ 
		if(strlen($i)==1){$j='0'.$i;}else{ $j=$i;}?>
			<?php /*?><a href="reg.php?act=all_times&ser_id=<?=$_GET['ser_id']?>&id=<?=$month."/".$j."/".$year?>" class="tt"><?=$i;?></a><?php */?>
			<a href="reg.php?act=all_dates&ser_id=<?=$_GET['ser_id']?>&id=<?=$month."/".$j."/".$year?>" class="tt"><?=$i;?></a>
		<? }?>
	</td>
	<?php
}
?>
</table>
