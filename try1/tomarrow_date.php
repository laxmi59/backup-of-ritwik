<?php /*?><?php
$tomorrow = mktime(date("h"),0,0,date("m"),date("d")+1,date("Y"));
echo "Tomorrow is ".date("Y-m-d h", $tomorrow);
echo "<br>Today is ".date("Y/m/d h");
?> <?php */?>
<?php
	$today=date('Y-m-d h');
	$yestcal=date("Y-m-d h",mktime(date("h"),0,0,date("m"),date("d")-1,date("Y")));
	$yest=date('Y-m-d h',strtotime('2010-11-03 06:31:48'));
	echo $today."--".$yestcal."--".$yest;
?>