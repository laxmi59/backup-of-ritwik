<style type="text/css">
.tdh1{background:#A4D1FF; height:8px;}
.tdh2{background:#FFFFFF; height:8px;}
</style>
<?php
include "dbcon.php";
extract($_POST);
/*laxmi.kotni@gmail.com,rama.ritwik@yopmail.com,rama@ritwik.com*/
$wsdl = 'http://api.stormpost.datranmedia.com/services/SoapRequestProcessor?wsdl';
$soapClient = new SoapClient($wsdl);
$login = new SOAPHeader($wsdl, 'username', 'soap@conglomeratenetwork.com');
$password = new SOAPHeader($wsdl, 'password', 'Password2');
$headers = array($login, $password);
$soapClient->__setSOAPHeaders($headers);
echo "<a href='index.php' class='style1'>Home</a><br>";

$gdmr=array("mailingId"=>1085);
try{
	$getreport =  $soapClient->__call("getDetailedMailingReport", $gdmr);
	//echo "<pre>";print_r ($gdmr_res);echo "</pre>";
	//echo $gdmr_res->mailingID;
	
	//echo sizeof($getreport->linkReport);
	?><table><?
	for($i=0;$i<sizeof($getreport->linkReport);$i++){
		if($getreport->linkReport[$i]->uniqueClicks ==0){continue;}
		//$ttt[]=$getreport->linkReport[$i]->url;
		$tt[] = $getreport->linkReport[$i]->url."@@@".$getreport->linkReport[$i]->uniqueClicks."###".$getreport->linkReport[$i]->totalClicks;	
	}
	arsort($tt);
	foreach ($tt as $key => $val) {
		//echo "$key = $val<br>";
		$link_val = explode("@@@",$val);
		$click_val =explode("###",$link_val[1]);
		//echo $link_val[0]."<br>unique".$click_val[0]."----total".$click_val[1]."<br>";
		$bar_color=$click_val[1]*100/$getreport->mailingParts[0]->totalClicks;
		//$bar_color=$click_val[0]*100/$click_val[1];
		
		?><tr>
			<td><?php echo $link_val[0]?><br />
				<table width="450" cellpadding="0"  cellspacing="0" style="-moz-border-radius:3px 3px 3px 3px; border:1px solid #ccc; ">
			<tr><?php if($bar_color==100){?>
			<td colspan="2" class="tdh1" ></td>
			<?php }elseif($bar_color<>0){?>
			<td class="tdh1" width="<?php echo $bar_color?>%" ></td>
			<td class="tdh2" width="<?php echo 100-$bar_color?>"></td>
			<?php }else{?>
			<td colspan="2" class="tdh2"></td>
			<?php }?>
		</tr>
		</table>	
					</td>		
					<td><?php echo $click_val[0]?></td>
					<td><?php echo $click_val[1]?></td>
				</tr>
				
	<? $bar_color='';$link_val='';$click_val='';}?>
	</table><?
	
	/*for($i=0; $i<sizeof($getreport->linkReport);$i++){
		$bar_color[$i]=$getreport->linkReport[$i]->uniqueClicks*$getreport->linkReport[$i]->totalClicks/100;
				?>
				<tr>
					<td>
					<?php echo $getreport->linkReport[$i]->url?><br />
					
					<table width="450" cellpadding="0"  cellspacing="0" style="-moz-border-radius:3px 3px 3px 3px; border:1px solid #ccc; ">
		<tr><?php if($bar_color[$i]==100){?>
			<td colspan="2" class="tdh1" ></td>
			<?php }elseif($bar_color[$i]<>0){?>
			<td class="tdh1" width="<?php echo $bar_color[$i]?>%" ></td>
			<td class="tdh2" width="<?php echo 100-$bar_color[$i]?>"></td>
			<?php }else{?>
			<td colspan="2" class="tdh2"></td>
			<?php }?>
		</tr>
		</table>	
					</td>		
					<td><?php echo $getreport->linkReport[$i]->uniqueClicks?></td>
					<td><?php echo $getreport->linkReport[$i]->totalClicks?></td>
				</tr>
				<?php }*/
	
	
	
} catch (SoapFault $fault) {
	$error = "gdmr_error";
}
/*//$input = array("red", "green", "blue", "yellow");
$test=array_splice($input, 2);
print_r($test);*/
?>