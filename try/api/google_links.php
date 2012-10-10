<?php
function getPageData($url) {
	if(function_exists('curl_init')) {
		$ch = curl_init($url); // initialize curl with given url
		curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // add useragent
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // write the response to a variable
		if((ini_get('open_basedir') == '') && (ini_get('safe_mode') == 'Off')) {
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // follow redirects if any
		}
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5); // max. seconds to execute
		curl_setopt($ch, CURLOPT_FAILONERROR, 1); // stop when it encounters an error
		return @curl_exec($ch);
	}
	else {
		return @file_get_contents($url);
	}
}
// google 
function getGoogleLinks($host) {
	$request = "http://www.google.com/search?q=" . urlencode("link:" . $host) . "&amp;hl=en";
	$data = getPageData($request);
	preg_match('/<div id=resultStats>(About )?([\d,]+) result/si', $data, $l);
	$value = ($l[2]) ? $l[2] : "n/a";
	$string = "<a href=\"" . $request . "\">" . $value . "</a>";
	return $value;
}

//yahoo
function getYahooLinks($host) {
	$request = "http://siteexplorer.search.yahoo.com/search?p=" . urlencode($host);
	$data = getPageData($request);
	preg_match('/Inlinks \(([\d,]+)/si', $data, $l);
	$value = ($l[1]) ? $l[1] : "n/a";
	$string.= "<a href=\"" . $request . "&amp;bwm=i\">" . $value . "</a>";
	return $value;
}
// bing links
function getBingLinks($host) {
	$request = "http://www.bing.com/search?q=" . urlencode("inbody:" . $host) . "&amp;mkt=en-US";
	$data = getPageData($request);
	preg_match('/1-([\d]+) of ([\d,]+)/si', $data, $p);
	$value = ($p[2]) ? $p[2] : "n/a";
	$string = "<a href=\"" . $request . "\">" . $value . "</a>";
	return $value;
}
//google page rank
$googlehost='toolbarqueries.google.com';
$googleua='Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.0.6) Gecko/20060728 Firefox/1.5';
//convert a string to a 32-bit integer
function StrToNum($Str, $Check, $Magic) {
    $Int32Unit = 4294967296;  // 2^32

    $length = strlen($Str);
    for ($i = 0; $i < $length; $i++) {
        $Check *= $Magic; 	
        //If the float is beyond the boundaries of integer (usually +/- 2.15e+9 = 2^31), 
        //  the result of converting to integer is undefined
        //  refer to http://www.php.net/manual/en/language.types.integer.php
        if ($Check >= $Int32Unit) {
            $Check = ($Check - $Int32Unit * (int) ($Check / $Int32Unit));
            //if the check less than -2^31
            $Check = ($Check < -2147483648) ? ($Check + $Int32Unit) : $Check;
        }
        $Check += ord($Str{$i}); 
    }
    return $Check;
}

//genearate a hash for a url
function HashURL($String) {
    $Check1 = StrToNum($String, 0x1505, 0x21);
    $Check2 = StrToNum($String, 0, 0x1003F);

    $Check1 >>= 2; 	
    $Check1 = (($Check1 >> 4) & 0x3FFFFC0 ) | ($Check1 & 0x3F);
    $Check1 = (($Check1 >> 4) & 0x3FFC00 ) | ($Check1 & 0x3FF);
    $Check1 = (($Check1 >> 4) & 0x3C000 ) | ($Check1 & 0x3FFF);	
	
    $T1 = (((($Check1 & 0x3C0) << 4) | ($Check1 & 0x3C)) <<2 ) | ($Check2 & 0xF0F );
    $T2 = (((($Check1 & 0xFFFFC000) << 4) | ($Check1 & 0x3C00)) << 0xA) | ($Check2 & 0xF0F0000 );
	
    return ($T1 | $T2);
}

//genearate a checksum for the hash string
function CheckHash($Hashnum) {
    $CheckByte = 0;
    $Flag = 0;

    $HashStr = sprintf('%u', $Hashnum) ;
    $length = strlen($HashStr);
	
    for ($i = $length - 1;  $i >= 0;  $i --) {
        $Re = $HashStr{$i};
        if (1 === ($Flag % 2)) {              
            $Re += $Re;     
            $Re = (int)($Re / 10) + ($Re % 10);
        }
        $CheckByte += $Re;
        $Flag ++;	
    }

    $CheckByte %= 10;
    if (0 !== $CheckByte) {
        $CheckByte = 10 - $CheckByte;
        if (1 === ($Flag % 2) ) {
            if (1 === ($CheckByte % 2)) {
                $CheckByte += 9;
            }
            $CheckByte >>= 1;
        }
    }

    return '7'.$CheckByte.$HashStr;
}

//return the pagerank checksum hash
function getch($url) { return CheckHash(HashURL($url)); }

//return the pagerank figure
function getpr($url) {
	global $googlehost,$googleua;
	$ch = getch($url);
	$fp = fsockopen($googlehost, 80, $errno, $errstr, 30);
	if ($fp) {
	   $out = "GET /search?client=navclient-auto&ch=$ch&features=Rank&q=info:$url HTTP/1.1\r\n";
	   //echo "<pre>$out</pre>\n"; //debug only
	   $out .= "User-Agent: $googleua\r\n";
	   $out .= "Host: $googlehost\r\n";
	   $out .= "Connection: Close\r\n\r\n";
	
	   fwrite($fp, $out);
	   
	   $pagerank = substr(fgets($fp, 128), 4); //debug only
	   //echo $pagerank; //debug only
	   while (!feof($fp)) {
			$data = fgets($fp, 128);
			//echo $data;
			$pos = strpos($data, "Rank_");
			if($pos === false){} else{
				$pr=substr($data, $pos + 9);
				$pr=trim($pr);
				$pr=str_replace("\n",'',$pr);
				return $pr;
			}
	   }
	   //else { echo "$errstr ($errno)<br />\n"; } //debug only
	   fclose($fp);
	}
}

//generate the graphical pagerank
function pagerank($url,$width=40,$method='style') {
	if (!preg_match('/^(http:\/\/)?([^\/]+)/i', $url)) { $url='http://'.$url; }
	$pr=getpr($url);
	return $pr;
}
//alexa pagerank
function alexaRank($domain){
    $remote_url = 'http://data.alexa.com/data?cli=10&dat=snbamz&url='.trim($domain);
    $search_for = '<POPULARITY URL';
    if ($handle = @fopen($remote_url, "r")) {
        while (!feof($handle)) {
            $part .= fread($handle, 100);
            $pos = strpos($part, $search_for);
            if ($pos === false)
            continue;
            else
            break;
        }
        $part .= fread($handle, 100);
        fclose($handle);
    }
    $str = explode($search_for, $part);
    $str = array_shift(explode('"/>', $str[1]));
    $str = explode('TEXT="', $str);
 
    return $str[1];
}
//compete pagerank
function competerank($url){
	//$api='91ec91e70c4ffe23a9962fd3a608408a';
	$query = 'http://api.compete.com/fast-cgi/MI?d='.$url.'&ver=3&apikey=3faa3d73c89b9ad9995774e1457749f8&size=large';
	$data = simplexml_load_file($query); 
	//echo "<pre>";
	//print_r($data);
	//echo "</pre>";
	return trim((string)$data->dmn->metrics->val->uv->ranking);
}
//iamge
function saveimage($url) {
       $image_path=AppSTW::getScaledThumbnail($url,178,137,'','');
		$image_name=explode('/',$image_path);
		return $image_name[2];
		//echo $image_name[2]."<br>". $id;exit;
		//$this->modle->save(array('snap_short'=>$image_name[2]), $id);
		// echo "snap update success!\n<br>";
		//return true;
 }
$mainUrl ="https://www.compete.com/";
$googleLink=getGoogleLinks($mainUrl);
echo "google_links : ".$googleLink."<br>";
$yahooLink=getYahooLinks($mainUrl);
echo "yahoo_links : ".$yahooLink."<br>";
$bingLink = getBingLinks($mainUrl);
echo "bing_links : ".$bingLink."<br>";
$pr1 = pagerank($mainUrl);
echo 'google_page_rank '.$pr1."<br>";
$pr2 = alexaRank($mainUrl);
echo 'alexa PR '.$pr2."<br>";
$pr3 = competerank($mainUrl);
echo 'competerank '.$pr3."<br>";
/*$pr4 = saveimage($mainUrl);
echo 'saveimage '.$pr4."<br>";
*/
/*$filename=explode("/",$_SERVER["PHP_SELF"]);
echo $filename[3];*/