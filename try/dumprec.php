<?php
/*$filename="news/260102887.wsop205x157.jpg";
$size = getimagesize($filename);
print_r($size);*/
$con=mysql_connect("localhost","root","");
mysql_select_db("rama_cap",$con);
include('SimpleImage.php');

$getNews=mysql_query("SELECT * FROM `cap_news` order by id asc");
while($fetNews= mysql_fetch_object($getNews)){  
	
	$summery=addslashes($fetNews->summary);
	$summery=nl2br($fetNews->summary);
	$title=addslashes($fetNews->title);
	
	$post_slug = strtolower($fetNews->post_slug);
	$post_slug = preg_replace('/\W/', ' ', $post_slug);
	$post_slug = preg_replace('/\ +/', '-', $post_slug);
	$post_slug = preg_replace('/\-$/', '', $post_slug);
	$post_slug = preg_replace('/^\-/', '', $post_slug);
	$post_slug = preg_replace('/^\./', '.', $post_slug);
	//echo $post_slug."<br>";
	$insMainPost=mysql_query("insert into newblog_posts (`post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `post_modified`, `post_modified_gmt`, `post_parent`, `post_type`, `post_mime_type`,`short_desc`, `featured`)values(1,'".$fetNews->creation_date_time."', '".$fetNews->creation_date_time."', '".$summery."', '".$title."', 'published', 'open', 'open', '', '".$post_slug."', '".$fetNews->mod_date_time."', '".$fetNews->mod_date_time."', 0, 'post', '', '".$summery."','yes' )");
	if($insMainPost){
		echo $fetNews->id." inserted<br>";
	
	$recentId=mysql_insert_id();
	//echo $recentId."  inserted<br>";
	
	$updMainPost=mysql_query("update newblog_posts set  guid = 'http://dev2.casinoaffiliateprograms.com/newblog/?p=".$recentId."' where ID=".$recentId);

	if($fetNews->newsimage !=''){
	
		$extension = getExtension($fetNews->newsimage);
		$extension = strtolower($extension);
		$basename=$recentId.'.'.$extension;
				
		$size = getimagesize($fetNews->newsimage);
		
		if($size[0] > 205 && $size[1] > 205){
		   $image = new SimpleImage();
		   $image->load("news/".$fetNews->newsimage);
	   	   $image->resize(205,205);
		   $image->save('post_img/'.$basename);
		   $bigImage=1;
		}
		if($size[0] > 150 && $size[1] > 150){
		   $image1 = new SimpleImage();
		   $image1->load("news/".$fetNews->newsimage);
		   $image1->resize(150,150);
		   $image1->save('post_img/thumb/'.$basename);
		   $smallImage=1;
		}
		if($bigImage != 1){
			$image->load("news/".$fetNews->newsimage);
	   	    $image->save('post_img/'.$basename);
		}
		if($smallImage != 1){
			$image->load("news/".$fetNews->newsimage);
	   	    $image->save('post_img/thumb/'.$basename);
		}
		$sqlQuery = mysql_query("update newblog_posts set post_img = '$basename' WHERE ID=$recentId ");		
		$basename='';		
	}
}

function getExtension($str) {
	$i = strrpos($str,".");
	if (!$i) { return ""; }
	$l = strlen($str) - $i;
	$ext1 = substr($str,$i+1,$l);
	return $ext1;
}  
