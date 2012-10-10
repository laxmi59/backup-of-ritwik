<?php
$file = "$download_path$downFile";
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename=Labels.csv');
$destination="wp-content/plugins/add_data/uploads/"."Labels.csv"; 
$handle = fopen($destination, "r");
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		echo $data[0]."\n";
	} 
fclose($handle);
?>