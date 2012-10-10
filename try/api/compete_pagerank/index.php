<title>Compete Page Ranking</title>
<?php
	$url="www.casinos-poker.cn";
	$api='4da6pa597e5jrc63gg3mq9vv';
	$query = 'http://api.compete.com/fast-cgi/MI?d='.$url.'&ver=3&apikey='.$api.'&size=large';
	$data = simplexml_load_file($query); 
	echo "<pre>";
	//print_r($data);
	echo "</pre>";
	echo trim((string)$data->dmn->metrics->val->uv->ranking);
?>