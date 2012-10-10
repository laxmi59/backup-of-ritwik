<link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl ?>/templates/cap/css/home-blog.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl ?>/templates/cap/css/home-slide.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl ?>/templates/cap/css/slide.css" />
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/cap/js/curvy.corners.trunk.js"></script>
<!--tab pannal-->
<link type="text/css" href="<?php echo $this->baseurl ?>/templates/cap/css/ui-lightness/jquery-ui-1.8.7.custom.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/cap/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/cap/js/jquery-ui-1.8.7.custom.min.js"></script>
<script type="text/javascript">
<?php
$db =& JFactory::getDBO();
$query = "SELECT id,program_partnerlogo,program_title FROM #__program WHERE status=1 and partnerorder<>0 order by partnerorder ASC";
$db->setQuery($query);
$rows = $db->loadObjectlist();

$vquery = "SELECT count(*) as totalusers from user";
$db->setQuery($vquery);
$totalusers = $db->loadResult();
define('WP_USE_THEMES', false);

require('blog/wp-blog-header.php');
$dbprefix="newblog_";
?>
			$(function(){

				// Accordion
				$("#accordion").accordion({ header: "h3" });
	
				// Tabs
				$('#tabs').tabs();
				$('#tabs1').tabs();
	

				// Dialog			
				$('#dialog').dialog({
					autoOpen: false,
					width: 600,
					buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}
				});
				
				// Dialog Link
				$('#dialog_link').click(function(){
					$('#dialog').dialog('open');
					return false;
				});

				// Datepicker
				$('#datepicker').datepicker({
					inline: true
				});
				
				// Slider
				$('#slider').slider({
					range: true,
					values: [17, 67]
				});
				
				// Progressbar
				$("#progressbar").progressbar({
					value: 20 
				});
				
				//hover states on the static widgets
				$('#dialog_link, ul#icons li').hover(
					function() { $(this).addClass('ui-state-hover'); }, 
					function() { $(this).removeClass('ui-state-hover'); }
				);
				
			});
		</script>
<!--menu slide-->
<script language="javascript" type="text/javascript">
        $(document).ready(function() {
            $(".btn-slide").click(function(){
				$("#theme-panel").slideToggle("slow");
				$(this).toggleClass("active"); return false;
			});
            $("ul, li, a").pngfix();
            loadDefaultImages();
            
            // Recent client slider
            $('.infiniteCarousel').infiniteCarousel();
            
            // The above line could also be expressed like this as we are just setting one default:
		    // this initialises the demo scollpanes on the page.
	      //  $.extend($.fn.jScrollPane.defaults, {showArrows:true});
		  //  $('#scrollpanel').jScrollPane();
        });
</script>
<script src="<?php echo $this->baseurl ?>/templates/cap/js/slide/jquery_002.js" type="text/javascript" language="javascript"></script>
<script src="<?php echo $this->baseurl ?>/templates/cap/js/slide/jquery_003.js" type="text/javascript" language="javascript"></script>
<script src="<?php echo $this->baseurl ?>/templates/cap/js/slide/jquery_004.js" type="text/javascript" language="javascript"></script>
<script src="<?php echo $this->baseurl ?>/templates/cap/js/slide/jquery_005.js" type="text/javascript" language="javascript"></script>
<!--<script src='./templates/cap/jquery-1.4.4.min.js'></script>-->

<script language="javascript" type="text/javascript"> 

function getAffiliates(value){


			$.ajax({
			
					    url: '/templates/cap/fetch_affiliates.php?val='+value,
					    type: "POST",
					    dataType: "html",
					    async:false,
					    success: function(data) {
					    $('.result').html(data);
					    document.getElementById('program_list').innerHTML=data;
			   	 }
			  
			});

}

</script>


<div class="content-body sh-bg">
    <div class="content-left">
      <div class="daily-date"><span class="fll">The Daily Fix</span> <span class="date"><?php echo date("F j, Y")?></span></div>
      <div class="home-banner">
        <div class="infiniteCarousel">
          <div style="overflow: hidden;" class="wrapper">
            <ul>
			<? $getUnfeaturedPosts=mysql_query("SELECT * FROM `".$dbprefix."posts` WHERE `post_status` = 'publish' AND `post_type` = 'post' AND `featured` = '' order by ID desc limit 0,3");
				$count=mysql_num_rows($getUnfeaturedPosts);
				$i=0;
				while($fetUnfeaturedPosts=mysql_fetch_array($getUnfeaturedPosts)){$i++; 
				?>										   
					<li>
						<div class='img-cont'>						   
							<div class='img'>
								<? if($fetUnfeaturedPosts['post_img'] =='')
									$path='images/225X225noimg.jpg';
								   else
								   	$path="post_img/".$fetUnfeaturedPosts['post_img'];
								?>
								<a href="<?=$fetUnfeaturedPosts['guid']?>">
								<img src="http://dev2.casinoaffiliateprograms.com/blog/wp-content/themes/capblog/<?=$path?>" alt='' width='634px' height='290px' />
								</a>
							</div>
							<div class='cont'>
								<h1><a href="<?=$fetUnfeaturedPosts['guid']?>"><?=$fetUnfeaturedPosts['post_title']?></a></h1>
								<p class='small-comments'><?=date('M  j, Y',$fetUnfeaturedPosts['post_date'])?> <?=$fetUnfeaturedPosts['comment_count']?> Comments </p>
								<p><?=substr($fetUnfeaturedPosts['short_desc'],0,200)?>
								<a href="<?=$fetUnfeaturedPosts['guid']?>">Read more ></a></p>
								<div class='list-btn'><?=$i?><span>of</span> <?=$count?> </div>
							</div>
						</div>
					</li>
			<? }?>
            </ul>
          </div>
        </div>
      </div>
      <div class="featured-community">
        <div class="featured">
          <div class="head">
            <h2> Featured Articles<span class="see-all"><a href="/blog/">see all</a></span></h2>
          </div>
		  
          <?php $getfeaturedPosts=mysql_query("SELECT * FROM `".$dbprefix."posts` WHERE `post_status` = 'publish' AND `post_type` = 'post' AND `featured` = 'yes' order by ID desc limit 0,10");	
		while($fetfeaturedPosts=mysql_fetch_array($getfeaturedPosts)){?>
				  
         <div class="featured-content">
            <h3> <a href="<?=$fetfeaturedPosts['guid']?>"><?=$fetfeaturedPosts['post_title']?></a><span class="small-comments"><?=$fetfeaturedPosts['comment_count']?> Comments</span></h3>
            <p><strong><?=date('M  j, Y',$fetfeaturedPosts['post_date'])?></strong> <?=stripslashes(substr($fetfeaturedPosts['short_desc'],0,200))?> <a href="<?=$fetfeaturedPosts['guid']?>">Read more ></a></p>
          </div>
		 <? }?>
          <div class="visit-our-blog"><a href="/blog/">Visit Our Blog ></a></div>
        </div>
        <div class="community">
          <div class="head">
            <h2> Community Today </h2>
          </div>
          <ul class="rfc">
            <li>
              <div class="img"><a href="<?php echo JRoute::_( 'index.php?option=com_programreview');?>"><img src="templates/cap/images/cap_home_v2011/r.png" alt="" border="0" /></a></div>
              <div class="rfc-content">
                <h5><a href="<?php echo JRoute::_( 'index.php?option=com_programreview');?>">Ratings and Reviews</a></h5>
                <p>Independent program reviews by other affiliates</p>
              </div>
            </li>
            <li>
              <div class="img"><a href="/bb/"><img src="templates/cap/images/cap_home_v2011/f.png" alt="" border="0" /></a></div>
              <div class="rfc-content">
                <h5><a href="/bb/">Forums</a></h5>
                <p>Ask questions or resolve program issues in the forums</p>
              </div>
            </li>
            <li>
              <div class="img"><a href="<?php echo JRoute::_( 'index.php?option=com_complaints');?>"><img src="templates/cap/images/cap_home_v2011/c.png" alt="" border="0" /></a></div>
              <div class="rfc-content">
                <h5><a href="<?php echo JRoute::_( 'index.php?option=com_complaints');?>">Complaint Center</a></h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
              </div>
            </li>
          </ul>
          <h4 class="gray-round">Featured Video</h4>
          <div class="video">
		 
		 <!-- <object width="300" height="193">
		  
				<param name="movie" value="http://www.youtube.com/v/B7TICfqeck0?fs=1&amp;hl=en_US&amp;rel=0">
					</param>
				<param name="allowFullScreen" value="true">
					</param>
				<param name="allowscriptaccess" value="always">
					</param>
				<embed src="http://www.youtube.com/v/B7TICfqeck0?fs=1&amp;hl=en_US&amp;rel=0" type="application/x-shockwave-flash"                 allowscriptaccess="always" allowfullscreen="true" width="300" height="193">
					</embed>
		  
		  </object>-->
		   <?php
		     $id_1_of_video_posts=mysql_query("SELECT post_id
											   FROM  newblog_postmeta
											   WHERE meta_key = 'video_upload_text' ");
										$id_arr_1=array();	
									while($id_array_1=mysql_fetch_row($id_1_of_video_posts))
									{
									     $id_arr_1=array_merge($id_arr_1,$id_array_1); 
									
									}	
			$id_2_of_video_posts=mysql_query("SELECT post_id
											  FROM newblog_post_video");						
										
									$id_arr_2=array();
									while($id_array_2=mysql_fetch_row($id_2_of_video_posts))
									{
									     $id_arr_2=array_merge($id_arr_2,$id_array_2); 
									
									}
									
									$total_video_ids=array_merge($id_arr_1,$id_arr_2);
									$total_video_ids_imploded=implode(',',$total_video_ids);
					                $recent_video_id=mysql_query("select id,post_date from newblog_posts where id in( ".                                                                  $total_video_ids_imploded.") ORDER BY post_date DESC");
									$recent_id=mysql_fetch_row($recent_video_id);
									
									
									$check_1=mysql_query("SELECT meta_value
															FROM newblog_postmeta
															WHERE post_id =".$recent_id[0]."
															AND meta_key = 'video_upload_text'");
									$id_exists=mysql_fetch_row($check_1);
									
									if($id_exists[0]!='')
									{
									    $fetch_video=mysql_query("SELECT meta_value
																  FROM newblog_postmeta
																  WHERE post_id =".$recent_id[0]."
																  AND meta_key = 'video_upload_text'");
												$video=mysql_fetch_row(	$fetch_video);
												$display_video=$video[0];			  
									
									}
									
									if($id_exists[0]=='')
									{
									   	$fetch_video=mysql_query("SELECT video_name
																  FROM newblog_post_video
																  WHERE post_id =".$recent_id[0]
																  );
												$video=mysql_fetch_row(	$fetch_video);
												//$display_video="<embed src='/blog/wp-content/post_video/".$video[0] ."'                                                                width='300' height='193'></embed>";
												$display_video="<embed src='/blog/wp-content/post_video/".$video[0] ."'                                                                width='300' height='193'>
					                                            </embed>";

									}
										
										echo $display_video."</div>
                                                             <div class='lifestyle'><h5>The Dot Com lifestyle</h5>";						
						
						
						$video_post_data=mysql_query("SELECT a.post_title, b.meta_value, a.guid, a.comment_count, a.post_date
														FROM newblog_posts a, newblog_postmeta b
														WHERE a.id =".$recent_id[0] ."
														AND a.id = b.post_id
														AND a.post_status = 'publish'
														AND b.meta_key = 'short_description'");
														
														
					$video_data=mysql_fetch_row($video_post_data);
						
					$date_time_2=$video_data[4];
				   $date_2=explode(' ',$date_time_2);
				   $date_slices_2=explode('-',$date_2[0]);
				   switch($date_slices_2[1])
				   {
				      case 01:$month='Jan';break;
					  case 02:$month='Feb';break;
					  case 03:$month='March';break;
					  case 04:$month='April';break;
					  case 05:$month='May';break;
					  case 06:$month='June';break;
					  case 07:$month='July';break;
					  case 08:$month='August';break;
					  case 09:$month='September';break;
					  case 10:$month='October';break;
					  case 11:$month='November';break;
					  case 12:$month='December';break;
				   
				   }
						
					$video_post="<div class='date'>".$month.' '.$date_slices_2[2].','.$date_slices_2[0].'/'.$video_data[3]."                                 comments</div>" ;
				   $video_post.="<p>".
				   strip_tags(substr($video_data[1],0,200))."....<a href='".$video_data[2]."'>Read more ></a></p>
				   </div>";
				   
				   echo $video_post;
											
		  
		  ?>
           <!-- <div class="date">December 10, 2010 / 142 comments</div>
            <p>Most people think the Dot Com lifestyle is about fast cars, exotic locations, fine dining and partying all over the               world. While that is all part of it, I want to show you what Dot Com lifestyle is really about. The answer isn�t               what you might think it is. Anyone can join the Dot... <a href="">Read more ></a></p>
          </div>-->
          <div class="warning"><img src="templates/cap/images/cap_home_v2011/warning.jpg" /></div>
        </div>
      </div>
    </div>
    <div class="side-bar">
      <div class="search">
        <h2>Sign Up To Get Weekly Gambling Affiliate Insider Tips To Help You ...</h2>
        <ul class="search-content">
          <li>Drive more depositors</li>
          <li>Stay up to date on industry trends</li>
          <li>Launch new sites, quicker and easier</li>
        </ul>
        <div class="search-input">
	      <input type="text" name="email" id="email" value=""   name="" />
           <input name="" type="button" value="" onclick="aweberValue(this.value)" />

        </div>
      </div>
      <div class="blog">
        <h3>Affiliate Programs</h3>
        <span class="see-all"><a href="index.php?option=com_program&Itemid=22">see all</a></span>
        <div class="blog-content" id="blog-content">
            <div id='program_list'>
          <ul class="poker poker-home">
		  <?php
			foreach($rows as $row){
			if(!empty($row->program_partnerlogo)):
			$link = JRoute::_('index.php?option=com_program&amp;task=viewprogram&amp;id='.$row->id.'&amp;Itemid=22');
		  ?>
             <li>
			   <div class="img"><a href='<?php echo $link;?>'><img src="images/program/partnerlogo/<?php echo $row->program_partnerlogo;?>" alt="<?php echo $row->program_title;?>" title="<?php echo $row->program_title;?>" width="100" height="50" /> </a></div> <p><a href='<?php echo $link;?>'><?php echo $row->program_title;?></a></p>
			 </li>
		   <?php
			 endif;
			 }
		  ?>
          </ul>
		  </div>
          <br />
          Select your Niche: 
		  <a href="<?php echo JRoute::_( 'index.php?option=com_program&amp;task=programsearch&amp;Itemid=22');?>?catid=1">Casino</a>, 
		  <a href="<?php echo JRoute::_( 'index.php?option=com_program&amp;task=programsearch&amp;Itemid=22');?>?catid=2">Poker</a> <br />
          <a href="<?php echo JRoute::_( 'index.php?option=com_program&amp;task=programsearch&amp;Itemid=22');?>?catid=4"> Sportsbook </a>,
		  <a href="<?php echo JRoute::_( 'index.php?option=com_program&amp;task=programsearch&amp;Itemid=22');?>?catid=6">Lottery </a>,
		  <a href="<?php echo JRoute::_( 'index.php?option=com_program&amp;task=programsearch&amp;Itemid=22');?>?catid=3"> Bingo </a>,
		  <a href="<?php echo JRoute::_( 'index.php?option=com_program&amp;task=programsearch&amp;Itemid=22');?>?catid=5"> Skillgames</a>
		   
		  
		  </div>
      </div>
      <div class="blog"> <img src="templates/cap/images/cap_home_v2011/ignite-bingo.jpg"  /> </div>
      <div class="blog">
        <h3>More Programs ...</h3>
        <span class="see-all"><a href="index.php?option=com_program&Itemid=22">see all</a></span>
        <div class="blog-content links">
	<?php 
		
		$id=mysql_query("SELECT program_id from cap_program_categories");
		$id_array= array();
		
		
			while($array=mysql_fetch_row($id))
			{
			    $new_array=array($array[0]);
			    $id_array=array_merge($id_array,$new_array);
			}
				$random_number=rand(0,count($id_array)-6);
		
		       $prog_id_in_array_form=array();
			   
			   for($j=$random_number;count($prog_id_in_array_form)<=5;$j++)
			   {
			  
			         if($j==count($id_array))
					 {
					     $j=0;
					 }
					 
					if($id_array[$j]!=$id_array[$j+1])
					   array_push($prog_id_in_array_form,$id_array[$j]);
					
		       
			   }
		
			$values=implode(',',$prog_id_in_array_form);
			
                $random_programs=mysql_query("SELECT program_title, program_url
						                      FROM cap_program
						                      WHERE id
						                      IN ( ".$values." ) ORDER BY RAND()
						                      LIMIT 0 , 5 ");
						  
									$number_of_programs=mysql_num_rows($random_programs);
									$count=1;
									$links='';
												  
				while($five_programs=mysql_fetch_row($random_programs))  
				{
					  
							$links.="<a href='".$five_programs[1]."'>".$five_programs[0]."</a>"; 
							if($count!=$number_of_programs)
							 $links.="<br>";
							$count++; 
							
							
				}
		
			echo $links;		 
		
		?>
<!--		  <a href="#">Jackpot Games Affiliates</a><br />
          <a href="#">Unibet Partners</a><br />
          <a href="#">Mainstream Affiliates</a><br />
          <a href="#">Winner Affiliates</a><br />
          <a href="#">EuroAffiliates.com</a> </div>-->
		  
      </div>
	  </div>
      <div class="blog" style="min-height:270px;"> <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like-box href="http://www.facebook.com/casinoaffiliateprograms" width="260" show_faces="true" stream="false" header="false"></fb:like-box></div>
      <div class="blog">
        <h3>About Casino Affiliate Programs </h3>
        <div class="blog-content"> 
		 
		  <?php 
		  
			$equery = "SELECT `introtext`,`fulltext` from #__content where id=42 and state=1";
			$db->setQuery( $equery );
			$erows = $db->loadObjectList();
			echo $erows[0]->introtext;
			
	      ?> 
	  </div>
      </div>
    </div>
  </div>