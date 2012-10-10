<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("test",$con);
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){ 
	$(function() {
		$("#contentLeft ul").sortable({ opacity: 0.6, cursor: 'move', update: function() {
			var order = $(this).sortable("serialize") + '&action=updateRecordsListings';
			$.post("updateDB.php", order, function(theResponse){
				$("#contentRight").html(theResponse);
			});
		}
		});
	});

});
</script> 
<style>
body {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	margin-top: 10px;
}

ul {
	margin: 0;
}

#contentWrap {
	width: 700px;
	margin: 0 auto;
	height: auto;
	overflow: hidden;
}

#contentTop {
	width: 600px;
	padding: 10px;
	margin-left: 30px;
}

#contentLeft {
	float: left;
	width: 400px;
}

#contentLeft li {
	list-style: none;
	margin: 0 0 4px 0;
	padding: 10px;
	background-color:#00CCCC;
	border: #CCCCCC solid 1px;
	color:#fff;
}


	

#contentRight {
	float: right;
	width: 260px;
	padding:10px;
	background-color:#336600;
	color:#FFFFFF;
}

</style>
</p>
<div id="contentLeft">
<?php $sel=mysql_query("SELECT * FROM `records1` ORDER BY `id` ASC");
$sel1=mysql_query("SELECT * FROM `records1` ORDER BY `id` ASC");
?>
<?php while($row=mysql_fetch_object($sel)){?>
	<div><?php echo $row->name?></div>
<?php }?>


<ul class="ui-sortable">
<?php while($row1=mysql_fetch_object($sel1)){?>
	<li id="recordsArray_<?php echo $row1->id?>"><?php echo $row1->banner?></li>
<?php }?>
</ul>


</div>
<p>
