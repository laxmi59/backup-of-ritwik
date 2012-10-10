<?php
function expt($aaa){
	$f = fopen ('campaigns.csv','w');
	fputs($f, $aaa);
	fclose($f);
	header('Content-type: application/csv');
	header('Content-Disposition: attachment; filename="campaigns.csv"');
	readfile('campaigns.csv');
}
$out .= "URL,Title,Type\n";
$out .="testurl,";
$out .="test,";
$out .="test1\n";
$tt=expt($out);
?>