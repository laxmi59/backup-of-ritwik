<?
$con=mysql_connect("localhost","root","");
mysql_select_db("try",$con);
$xvalues ='';
$yopen ='';
$yunique ='';
$yunsub ='';
$yunread ='';
include "functions.php";
$obj= new graphs_types();
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
$arry1=array('open','unique');
$arry2=array($yopen,$yunique);

$title = "title: { text: 'test'},subtitle: {text: 'Source: WorldClimate.com'}";
?>
<? if($_GET['type']=='' ? $type=1 : $type=$_GET['type']);?>
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
	window.location='try2.php?type='+nid;
}
var chart;
$(document).ready(function() {
	chart = new Highcharts.Chart({
	
	<? 
	switch ($type) {
    	case 1:
        	$res=$obj->line_graph($xvalues,$yvalues,$title,$arry1,$arry2,'line');
	        break;
    	case 2:
        	$res=$obj->line_graph($xvalues,$yvalues,$title,$arry1,$arry2,'spline');
	        break;
		case 3:
        	$res=$obj->line_labels($xvalues,$yvalues,$title,$arry1,$arry2,'line');
	        break;
		case 4:
        	$res=$obj->line_time_series($xvalues,$yvalues,$title,$arry1,$arry2);
	        break;
		case 5:
        	$res=$obj->spline_plot_bands($xvalues,$yvalues,$title,$arry1,$arry2);
	        break;
		case 6:
        	$res=$obj->area_basic($xvalues,$yvalues,$title,$arry1,$arry2);
	        break;
		case 7:
        	$res=$obj->bar_graph($xvalues,$yvalues,$title,$arry1,$arry2,'bar');
	        break;
		case 8:
        	$res=$obj->bar_graph_stak($xvalues,$yvalues,$title,$arry1,$arry2,'bar');
	        break;
		case 9:
        	$res=$obj->bar_graph($xvalues,$yvalues,$title,$arry1,$arry2,'column');
	        break;
		case 10:
        	$res=$obj->bar_graph_stak($xvalues,$yvalues,$title,$arry1,$arry2,'column');
	        break;
		case 11:
        	$res=$obj->basic_pie($xvalues,$yvalues,$title,$arry1,$arry2);
	        break;
   	}
	echo $res;
	?>
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
	<? $arr=array("select","line","spline","line_label","line_time_series","spline_plot_bands","area_basic","bar","bar_stak","bar_graph_horizontal","bar_graph_horizontal_stack","test");	?>
		<select name="grp" onchange="fun(this.value)">
			<? for($i=0; $i<sizeof($arr); $i++){?>
			<option value="<?=$i?>" <? if($_GET['type']==$i) echo "selected=selected"?>><?=$arr[$i]?></option>
			<? }?>
		</select></td>
</tr>
<tr>
  <td colspan="3">&nbsp;</td>
</tr>
<tr>
	<td colspan="3"><div id="container" style="width: 800px; height: 400px"></div></td>
</tr>
</table>
</body>
</html>
