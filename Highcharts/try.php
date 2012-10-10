<?
//extract($_POST);
//print_r($_POST);
$con=mysql_connect("localhost","root","");
mysql_select_db("try",$con);
// for x axis
$Sel_art=mysql_query("select * from article");
$xvalues ='';
for($i=0;$Sel_art_fet=mysql_fetch_array($Sel_art);$i++){
	$sz=sizeof($Sel_art_fet);
	if($sz==$i) $xvalues .="'".$Sel_art_fet['name']."'"; else $xvalues .="'".$Sel_art_fet['name']."', ";
}
//print_r($xvalues);
//$xstr=$xvalues;
//echo "<br>".$xstr."<br>";
// for y axis
$Sel_art_open=mysql_query("select * from art");
$yvalues ='';
$sz1=mysql_num_rows($Sel_art_open);
for($j=1;$Sel_art_open_fet=mysql_fetch_array($Sel_art_open);$j++){
	//$sz1=sizeof($Sel_art_open_fet);
	if($sz1==$j) $yopen .=$Sel_art_open_fet['open']; else $yopen .=$Sel_art_open_fet['open'].",";
	if($sz1==$j) $yunique .=$Sel_art_open_fet['unique']; else $yunique .=$Sel_art_open_fet['unique'].",";
	if($sz1==$j) $yunsub .=$Sel_art_open_fet['unsub']; else $yunsub .=$Sel_art_open_fet['unsub'].",";
}
//echo $sz1."<br>";
//print_r($yvalues);
//$ystr=$yvalues;
//echo "<br>".$ystr."<br>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/highcharts.js"></script>
<script type="text/javascript">
/*var chart1; // globally available
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'chart-container-1',
            defaultSeriesType: 'bar'
         },
         title: {
            text: 'Fruit Consumption'
         },
         xAxis: {
            categories: ['Apples', 'Bananas', 'Oranges', 'Apples', 'Bananas', 'Oranges']
         },
         yAxis: {
            title: {
               text: 'Fruit eaten'
            }
         },
         series: [{
            name: 'Jane',
            data: [1, 0, 4, 3, 2, 1]
         }, {
            name: 'John',
            data: [5, 7, 3, 1, 0, 4]
         }]
      });
   });*/
   var chart;
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container',
						defaultSeriesType: 'line',
						marginRight: 130,
						marginBottom: 25
					},
					title: {
						text: 'Monthly Average Temperature',
						x: -20 //center
					},
					subtitle: {
						text: 'Source: WorldClimate.com',
						x: -20
					},
					xAxis: {
						//categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec','test']
						//categories: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10','1', '2', '3', '4', '5', '6', '7', '8', '9', '10' ]
						categories: [<?=$xvalues?>]
					},
					yAxis: {
						title: {
							text: 'Temperature (°C)'
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
								this.x +': '+ this.y +'°C';
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
					series: [{
						name: 'Open',
						//data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6, 9.5]
						//data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3,7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3 ]
						data: [<?=$yopen?>]
					}, {
						name: 'Unique',
						data: [<?=$yunique?>]
					}, {
						name: 'Unsub',
						data: [<?=$yunsub?>]
					}/*, {
						name: 'London',
						data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
					}*/]
				});
				
				
			});
</script>

</head>

<body>
<div id="container" style="width: 100%; height: 400px"></div>
</body>
</html>
