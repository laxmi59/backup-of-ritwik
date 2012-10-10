<?php
$pages=array("1","2","3","4","5","6","7","8","9","10");
$page=$_GET['page'];
	if($page<>"1"){
		echo "<a href='http://192.168.1.88/rama/try/pagination.php?page='".$page-1 ."'> < </a>";
		$showcount=$page+2;
		if($showcount >= count($pages)){
			$showcount=$showcount-4;
			for($i=$showcount; $i <= count($pages);$i++){
				echo "<a href='http://192.168.1.88/rama/try/pagination.php?page='".$page[$i] ."'>".$pages[$i]."</a> ";
			}
		}else{
			for($i=$page-1; $i <= $showcount;$i++){
				echo "<a href='http://192.168.1.88/rama/try/pagination.php?page='".$page[$i] ."'>"$pages[$i]." </a>";
			}
		}
	}else{
		$showcount=$page+3;
		for($i=$page-1; $i <= $showcount;$i++){
			echo "<a href='http://192.168.1.88/rama/try/pagination.php?page='".$page[$i] ."'>".$pages[$i]."</a> ";
		}
	}
	
	if($page <>"10"){
		echo " >";
	}
?><a href="http://192.168.1.88/rama/try/pagination.php?page=".$_GET['page']-1.">






/*$pages=array("1","2","3","4","5","6","7","8","9","10");

$page=$_GET['page'];
	if($page<>"1"){
		echo "< ";
		$showcount=$page+2;
		if($showcount >= count($pages)){
			$showcount=$showcount-4;
			for($i=$showcount; $i <= count($pages);$i++){
				echo $pages[$i]." ";
			}
		}else{
			for($i=$page-1; $i <= $showcount;$i++){
				echo $pages[$i]." ";
			}
		}
	}else{
		$showcount=$page+3;
		for($i=$page-1; $i <= $showcount;$i++){
			echo $pages[$i]." ";
		}
	}
	
	if($page <>"10"){
		echo " >";
	}
*/
?>