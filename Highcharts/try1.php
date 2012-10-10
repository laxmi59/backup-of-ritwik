<?
$con=mysql_connect("localhost","root","");
mysql_select_db("try",$con);
$xvalues ='';
$yopen ='';
$yunique ='';
$yunsub ='';
$yunread ='';

// for x axis
$Sel_art=mysql_query("select * from article");
$sz=mysql_num_rows($Sel_art);
for($i=1;$Sel_art_fet=mysql_fetch_array($Sel_art);$i++){
	if($sz==$i) $xvalues .="'".$Sel_art_fet['name']."'"; else $xvalues .="'".$Sel_art_fet['name']."', ";
	
	$Sel_art_open=mysql_query("select * from art where art_id='$Sel_art_fet[id]'");
	$yopentot=0;$yuniquetot=0; $yunreadtot=0;
	for($j=1;$Sel_art_open_fet=mysql_fetch_array($Sel_art_open);$j++){
		$yopentot = $yopentot+$Sel_art_open_fet['open'];
		$yuniquetot = $yuniquetot+$Sel_art_open_fet['unique'];
		if($Sel_art_open_fet['open']==0){
			$yunreadtot = $yunreadtot+$j;
		}
	}
	$yopenavg=$yopentot/sizeof($Sel_art_open_fet);
	$yuniqueavg=$yuniquetot/sizeof($Sel_art_open_fet);
	
	if($sz==$i) $yopen .=$yopenavg; else $yopen .=$yopenavg.", ";
	if($sz==$i) $yunique .=$yuniqueavg; else $yunique .=$yuniqueavg.", ";
	if($sz==$i) $yunread .=$yunreadtot; else $yunread .= $yunreadtot.", ";
}
?>
<? if($_GET['type']=='' ? $type='line' : $type=$_GET['type']);
if($type=='line_label') $type='line';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script src="js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/highcharts.js"></script>
<script type="text/javascript" src="js/modules/exporting.js"></script>
<script type="text/javascript">
function fun(nid){
	window.location='try1.php?type='+nid;
}
var chart;
$(document).ready(function() {
	chart = new Highcharts.Chart({
		chart: {
			renderTo: 'container',
			defaultSeriesType: '<?=$type?>',
			//inverted: true,
			//width: 500,
			marginRight: 130,
			marginBottom: 25
		},
		title: {
			text: 'Average Article Reading',
			x: -20 //center
		},
		subtitle: {
			text: 'Source: WorldClimate.com',
			x: -20
		},
		xAxis: {
			categories: [<?=$xvalues?>]
		},
		yAxis: {
			title: {
				text: 'Avarage'
			},
			plotLines: [{
				value: 0,
				width: 1,
				color: '#808080'
			}]
			
		},
		tooltip: {
			formatter: function() {
					return '<b>'+ this.series.name +'</b><br/>'+
					this.x +': '+ this.y +'%';
			}
		},
		legend: {
			layout: 'vertical',
			align: 'right',
			verticalAlign: 'top',
			x: -10,
			y: 100,
			borderWidth: 0
		},
		<? if($_GET['type']=='line_label'){?>
		plotOptions: {
			line: {
				dataLabels: {
					enabled: true
				},
				enableMouseTracking: false
			}
		},
		<? }?>
		series: [{
			name: 'Open',
			data: [<?=$yopen?>]
		}, {
			name: 'Unique',
			data: [<?=$yunique?>]
		}, {
			name: 'Unread',
			data: [<?=$yunread?>]
		}]
	});
	
	
});
</script>

</head>

<body>
<table width="90%">
<tr>
	<td width="21%">Select Graph</td>
	<td width="2%">:</td>
	<td width="77%">
	<? $arr=array("line","spline","line_label");	?>
		<select name="grp" onchange="fun(this.value)">
			<? for($i=0; $i<sizeof($arr); $i++){?>
			<option value="<?=$arr[$i]?>" <? if($_GET['type']==$arr[$i]) echo "selected=selected"?>><?=$arr[$i]?></option>
			<? }?>
		</select>	</td>
</tr>
<tr>
  <td colspan="3">&nbsp;</td>
</tr>
<tr>
	<td colspan="3"><div id="container" style="width: 100%; height: 400px"></div></td>
</tr>
</table>
</body>
</html>
