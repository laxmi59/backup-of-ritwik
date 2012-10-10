<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("rama_cap",$con);
$dbprefix="cap_";
?>
<script type="text/javascript" src="auto/jquery-1.2.6.pack.js"></script>
<script type="text/javascript" src="auto/simplegallery.js"></script>
<script type="text/javascript">
var mygallery=new simpleGallery({
	wrapperid: "simplegallery1", //ID of main gallery container,
	dimensions: [634, 290], //width/height of gallery in pixels. Should reflect dimensions of the images exactly
	imagearray: [
	<?php $getUnfeaturedPosts=mysql_query("SELECT *,date_format(post_date_gmt,'%b %d, %Y') as post_date1 FROM `".$dbprefix."posts` WHERE `post_status` = 'publish' AND `post_type` = 'post' order by post_date asc limit 0,5");
		$count=mysql_num_rows($getUnfeaturedPosts);
		//$count1=$count-2;
		$i=0;
		while($fetUnfeaturedPosts=mysql_fetch_array($getUnfeaturedPosts)){$i++; 
			$desc=str_replace('"',"",$fetUnfeaturedPosts['short_desc']);
			$desc=str_replace("<br />","",$desc);
			$desc=substr(strip_tags($desc),0,100);
			$desc=str_replace("^\n" ,"",$desc);
			$postdate = $fetUnfeaturedPosts['post_date_gmt'];
			if($fetUnfeaturedPosts['post_img'] =='')
				$path='images/225X225noimg.jpg';
			else
			   	$path="post_img/".$fetUnfeaturedPosts['post_img'];
			if($count==$i){?>  
				["<?='blog/wp-content/themes/capblog/'.$path?>", "<?=$fetUnfeaturedPosts['guid']?>", "", "<h2><a style='color:#0C3D61; text-decoration:none; font-size:26px; font-weight:bold' href='<?=$fetUnfeaturedPosts['guid']?>'><?=$fetUnfeaturedPosts['post_title']?></a></h2><p style='color: #333333; font-weight: bold; text-transform: uppercase; padding-bottom: 6px;margin-bottom:7px;border-bottom: 1px dotted;'><?php echo $fetUnfeaturedPosts['post_date1']; ?></p><span style=' color: #333333;font-family: arial; font-size: 14px;line-height: 17px;'><?=$desc." "?> </span><span class='readmore'><a href='<?=$fetUnfeaturedPosts['guid']?>'><b>Read more</b></a></span>"]
			<? }else{?>
				["<?="blog/wp-content/themes/capblog/".$path?>", "<?=$fetUnfeaturedPosts['guid']?>", "", "<h2><a style='color:#0C3D61; text-decoration:none; font-size:26px; font-weight:bold' href='<?=$fetUnfeaturedPosts['guid']?>'><?=$fetUnfeaturedPosts['post_title']?></a></h2><p style='color: #333333; font-weight: bold; text-transform: uppercase; padding-bottom: 6px;margin-bottom:7px;border-bottom: 1px dotted;'><?php echo $fetUnfeaturedPosts['post_date1']; ?></p><span style=' color: #333333;font-family: arial; font-size: 14px;line-height: 17px;'><?=$desc." "?></span><span class='readmore'><a href='<?=$fetUnfeaturedPosts['guid']?>'><b>Read more</b></a></span>"],
			<? }?>
		<? }?>
	],
	autoplay: [true, 5000, 5], //[auto_play_boolean, delay_btw_slide_millisec, cycles_before_stopping_int]
	persist: false, //remember last viewed slide and recall within same session?
	fadeduration: 500, //transition duration (milliseconds)
	oninit:function(){ //event that fires when gallery has initialized/ ready to run
		//Keyword "this": references current gallery instance (ie: try this.navigate("play/pause"))
	},
	onslide:function(curslide, i){ //event that fires after each slide is shown
		//Keyword "this": references current gallery instance
		//curslide: returns DOM reference to current slide's DIV (ie: try alert(curslide.innerHTML)
		//i: integer reflecting current image within collection being shown (0=1st image, 1=2nd etc)
	}
})
</script>
			
				<div id="simplegallery1"></div>   
