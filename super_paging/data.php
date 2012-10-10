<?php
include("dbcon.php");
	
$per_page = 1;
$sqlc = "show columns from records";
$rsdc = mysql_query($sqlc);
$cols = mysql_num_rows($rsdc);
$page = $_REQUEST['page'];

$start = ($page-1)*1;
$sql = "select * from records order by id limit $start,1";
$rsd = mysql_query($sql);
?>

<?php
while ($rows = mysql_fetch_assoc($rsd))
{?>
	<div class="shopp">
		
		<img src="<?php echo $rows['image']?>" width="80" style="float:left" />
		<div class="label"><?php echo substr($rows['message'],0,150);?></div>
	
	</div>
<?php
}?>

<script type="text/javascript">
$(document).ready(function(){
	
	var Timer  = '';
	var selecter = 0;
	var Main =0;
	
	bring(selecter);
	
});

function bring ( selecter )
{	
	$('div.shopp:eq(' + selecter + ')').stop().animate({
		opacity  : '1.0',
		height: '60px'
		
	},300,function(){
		
		if(selecter < 6)
		{
			clearTimeout(Timer); 
		}
	});
	
	selecter++;
	var Func = function(){ bring(selecter); };
	Timer = setTimeout(Func, 20);
}

</script>