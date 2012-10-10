<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
.thtr{background:#333333; color:#FFFFFF;}
.oddtr{	background-color:#EFEFEF; color:#000000}
.eventr{background-color:#CCCCCC; color:#000000}
.trover{background-color:#C4ECFF; color:#000000;}
.trclick{background-color: #00CCCC;}
/* tables */
table.tablesorter {
	font-family:arial;
	background-color: #CDCDCD;
	margin:10px 0pt 15px;
	font-size: 8pt;
	width: 100%;
	text-align: left;
}
table.tablesorter thead tr th, table.tablesorter tfoot tr th {
	background-color: #e6EEEE;
	border: 1px solid #FFF;
	font-size: 8pt;
	padding: 4px;
}
table.tablesorter thead tr .header {
	background-image: url(bg.gif);
	background-repeat: no-repeat;
	background-position: center right;
	cursor: pointer;
}
table.tablesorter tbody tr td {
	color: #3D3D3D;
	padding: 4px;
	background-color: #FFF;
	vertical-align: top;
}
table.tablesorter tbody tr.odd td {
	background-color:#F0F0F6;
}

table.tablesorter thead tr .headerSortDown, table.tablesorter thead tr .headerSortUp {
background-color: #8dbdd8;
}

</style>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="js/sorter.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("table").tablesorter(); 
	/*$("th").addClass("thtr");
	$("tr:even").addClass("eventr");
	$("tr:odd").addClass("oddtr");
	$("tr").mouseover(function(){
		$(this).addClass("trover");
	});
	$("tr").mouseout(function(){
		$(this).removeClass("trover");
	});*/
	
});
</script>
</head>

<body>
<table id="myTable" class="tablesorter"> 
<thead> 
<tr> 
    <th>Last Name</th> 
    <th>First Name</th> 
    <th>Email</th> 
    <th>Due</th> 
    <th>Web Site</th> 
</tr> 
</thead> 
<tbody> 
<tr> 
    <td>Smith</td> 
    <td>John</td> 
    <td>jsmith@gmail.com</td> 
    <td>$50.00</td> 
    <td>http://www.jsmith.com</td> 
</tr> 
<tr> 
    <td>Bach</td> 
    <td>Frank</td> 
    <td>fbach@yahoo.com</td> 
    <td>$50.00</td> 
    <td>http://www.frank.com</td> 
</tr> 
<tr> 
    <td>Doe</td> 
    <td>Jason</td> 
    <td>jdoe@hotmail.com</td> 
    <td>$100.00</td> 
    <td>http://www.jdoe.com</td> 
</tr> 
<tr> 
    <td>Conway</td> 
    <td>Tim</td> 
    <td>tconway@earthlink.net</td> 
    <td>$50.00</td> 
    <td>http://www.timconway.com</td> 
</tr> 
</tbody> 
</table> 

</body>
</html>
