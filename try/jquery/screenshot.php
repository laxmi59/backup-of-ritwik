<? function getImage($url) {
$url = rawurlencode(trim($url));

$p = 'http://open.thumbshots.org/image.pxf?url='.$url.'&key=spakey&src='.$url.
'&cp=&sb=1&v=2.23.0.3&size=small&lang=zh-cn&search_type=snap&origin=shots_bubble&act=only_link&po=0&rp=null&has_img'.
'=0&ol=0&ex=0&ad=&ip=219.82.123.216&ua=Mozilla%2F4.0+%28compatible%3B+MSIE+7.0%3B+Windows+NT+5.1%3B+.NET+CLR+1.'.
'1.4322%3B+.NET+CLR+2.0.50727%29&vid=e48d98469826e2393c986';
$content = file_get_contents($p);
$num = rand(100000, 999999);
$num = "$num" . "$id";
$filename = 'images/badges';
if (!is_dir($filename)) {
	mkdir($filename);
}
$filename .= '/'.$num . '.gif';
if (file_put_contents($filename, $content)) {
	$ffname = $num.'.gif';
	return $ffname;
} else {
	unlink($filename);
	return '';
}
}?>