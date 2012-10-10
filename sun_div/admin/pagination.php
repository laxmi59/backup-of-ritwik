<? function paginate($start,$limit,$total,$filePath,$otherParams) {
global $lang;
$allPages = ceil($total/$limit);
$currentPage = floor($start/$limit) + 1;
$pagination = "";
if ($allPages>10) {
$maxPages = ($allPages>9) ? 9 : $allPages;
if ($allPages>9) {
if ($currentPage>=1&&$currentPage<=$allPages) {
		$pagination .= ($currentPage>4) ? " ... " : " ";

				$minPages = ($currentPage>4) ? $currentPage : 5;
				$maxPages = ($currentPage<$allPages-4) ? $currentPage : $allPages - 4;

				for($i=$minPages-4; $i<$maxPages+5; $i++) {
					$pagination .= ($i == $currentPage) ? "[".$i."] " : "<a class = 'one' href=\"".$filePath."start=".(($i-1)*$limit).$otherParams."\">".$i."</a> ";
				}
				$pagination .= ($currentPage<$allPages-4) ? " ... " : " ";
			} else {
				$pagination .= " ... "; 
			}
		}
	} else {
		for($i=1; $i<$allPages+1; $i++) {
			$pagination .= ($i==$currentPage) ? "[".$i."] " : "<a class = 'one' href=\"".$filePath."start=".(($i-1)*$limit).$otherParams."\">".$i."</a> ";
		}
	}
	
		if ($currentPage>1) $pagination = "[<a class='one'href=\"".$filePath."start=0".$otherParams."\">&lt;&lt;</a>] [<a  class='one'href=\"".$filePath."start=".(($currentPage-2)*$limit).$otherParams."\">&lt;</a>] ".$pagination;
	if ($currentPage<$allPages) $pagination .= " [<a class='one'href=\"".$filePath."start=".($currentPage*$limit).$otherParams."\">&gt;</a>] [<a class='one'href=\"".$filePath."start=".(($allPages-1)*$limit).$otherParams."\">&gt;&gt;</a>]";

	echo $pagination; 
}
?>