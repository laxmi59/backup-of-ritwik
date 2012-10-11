<?php 
//$qry="SELECT a.id, a.name, (select b.image from records b where a.id=b.listid ) as imgs FROM `records` a";
//$qry="SELECT a.id, a.banner_name, (select image from `wp_custom_banner_images` where rid=a.id) as imgs, (select imgid from `wp_custom_banner_images` where rid=a.id) as iid  FROM  `wp_custom_banners` a order by a.id desc ";
$qry="SELECT * from `wp_custom_banners` order by positionid asc ";
$sel=  mysql_query($qry);
$namearray=array(); $imagearray=array(); $idarray=array();
while($row=mysql_fetch_object($sel)){
    $namearray[]=$row->banner_name;
    $imagearray[]=$row->image;
    $idarray[]=$row->id;
    $positionidarray[]=$row->positionid;
}
?>

<style type="text/css">
#affiliateBannerContainer{
	width:800px;
	margin-top:50px;
	left:180px;
	border:1px solid #ccc;
	position:absolute;
}

#affiliateBannerContainer .buttonlinks {
	height:50px;
}
#affiliateBannerContainer .buttonlinks a{
	font-size:15px;
	border:1px solid #ccc;
	background:#ccc;
	padding:5px;
	text-decoration:none;
	font-weight:bold;
	color:#000;
}
#affiliateBannerContainer .buttonlinks a:hover{
	font-size:15px;
	border:1px solid #ccc;
	background:#ccc;
	padding:5px;
	text-decoration:none;
	font-weight:bold;
	color:#000;	
}

.slidingDiv {
    height:80px;
    padding:20px;
    margin-top:10px;
    border-bottom:5px solid #CCC;
}
 ul {
	margin: 0;
}

#contentWrap {
	width: 700px;
	margin: 0 auto;
	height: auto;
	overflow: hidden;
}

#contentTop {
	width: 600px;
	padding: 10px;
	margin-left: 30px;
}

#contentLeft {
	float: left;
	width: 150px;
}

#contentLeft li {
	list-style: none;
	color:#000;
}

.namestyle{
    padding: 15px;
}
	

#contentRight {
	float: right;
	width: 260px;
	padding:10px;
	background-color:#336600;
	color:#FFFFFF;
}

</style>

<script src="<?php echo get_bloginfo('wpurl')."/wp-content/plugins/affiliate_product_banners/js/jquery.js"?>" type="text/javascript"></script>
<script src="<?php echo get_bloginfo('wpurl')."/wp-content/plugins/affiliate_product_banners/js/jquery.min.js"?>" type="text/javascript"></script>
<script src="<?php echo get_bloginfo('wpurl')."/wp-content/plugins/affiliate_product_banners/js/jquery-ui.min.js"?>" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
	// add drop down
	jQuery(".addSlidingDiv").hide();
    jQuery(".add_show_hide").show();
 
    jQuery('.add_show_hide').click(function(){
    	jQuery(".addSlidingDiv").slideToggle();
    });
	// Updation of records while drag and drop
	jQuery("#contentLeft ul").sortable({ opacity: 0.6, cursor: 'move', update: function() {
		var order = $(this).sortable("serialize") + '&action=updateRecordsListings'; 
		jQuery.post("<?php echo get_bloginfo('wpurl')."/wp-content/plugins/affiliate_product_banners/savedate.php"?>", order, function(theResponse){
			jQuery("#contentRight").html(theResponse);
		}); 															 
	}	 
	});
	// view drop down
	jQuery(".viewSlidingDiv").hide();
    jQuery(".view_show_hide").show();
	
	jQuery('.view_show_hide_hide').click(function(){
		jQuery(".viewSlidingDiv").slideUp();
	});

    jQuery('.view_show_hide').click(function(){
		//alert($(this).attr('name'));
		var dt=$(this).attr('name');
		//alert(dt);
		jQuery(".viewSlidingDiv").slideUp();
		jQuery.ajax({type: "POST",url: "<?php echo get_bloginfo('wpurl')."/wp-content/plugins/affiliate_product_banners/savedate.php"?>",data: 'action1=getViewRecord&id='+ dt,
			success: function(res1){
			//alert(res1);
			var res = eval('(' + res1 + ')');
				if(res != ''){
				var banimg="<img src='<?php echo get_bloginfo('wpurl')?>/wp-content/plugins/affiliate_product_banners/banner_img/"+res.bannerImage+"' />";
				//alert(banimg);
				jQuery(".viewSlidingDiv").html("");
				jQuery(".viewSlidingDiv").append("<table width='100%'><tr><td>"+res.bannerName+"</td><td>"+banimg+"</td><td>"+res.bannerUrl+"</td><td>"+res.bannerText+"</td><td><input type='button' name='addsubmit' value='Edit' />&nbsp;<input type='button' name='Delete' value='Cancel' /></td></tr></table><hr />");
					jQuery(".viewSlidingDiv").slideDown();
				}
			}
		});
    	
    });
	
	// edit drop down
	/*jQuery(".editSlidingDiv").hide();
    jQuery(".edit_show_hide").show();
	
	jQuery('.edit_show_hide_hide').click(function(){
		jQuery(".editSlidingDiv").slideUp();
	});

    jQuery('.edit_show_hide').click(function(){
		//alert($(this).attr('name'));
		var dt=$(this).attr('name');
		//alert(dt);
		jQuery(".editSlidingDiv").slideUp();
		jQuery.ajax({type: "POST",url: "<?php echo get_bloginfo('wpurl')."/wp-content/plugins/affiliate_product_banners/savedate.php"?>",data: 'action1=getViewRecord&id='+ dt,
			success: function(res1){
			//alert(res1);
			var res = eval('(' + res1 + ')');
				if(res != ''){
				jQuery(".editSlidingDiv").html("");
				jQuery(".editSlidingDiv").append('<form method="post" action="<?php echo get_bloginfo('wpurl')."/wp-admin/admin.php?page=updatebannerdata"?>" enctype="multipart/form-data">
	<table><tr>
			<td valign="top">Name:<br /> <input id="edit_banner_name" type="text" name="banner_name" value="'+res.bannerName+'" /></td>
			<td valign="top">Banner Image<br /> <input type="file" name="banner_img" /><br /><span id="edit_banner_image"> '+res.bannerImage+' </span></td>
			<td valign="top">Url:<br /> <input id="edit_banner_url"  type="text" name="banner_url" value="'+res.bannerUrl+'"  /></td>
			<td valign="top">Text:<br /> <input id="edit_banner_text"  type="text" name="banner_text" value="'+res.bannerText+'"  /></td>
			<td valign="top"><br /> <input type="submit" name="addsubmit" value="Save" />&nbsp;<input type="button" name="cancel" value="Cancel"  class="edit_show_hide_hide" /></td>
	</tr></table>
	</form>');
					jQuery(".editSlidingDiv").slideDown();
				}
			}
		});
    	
    });*/
 
});
 
</script>


<div id="affiliateBannerContainer">
<div class="buttonlinks">
	<a href="javascript:void(0)" class="add_show_hide" >Add New Banner</a>
</div>
<div class="addSlidingDiv">
	<form method="post" action="<?php echo get_bloginfo('wpurl')."/wp-admin/admin.php?page=savebannerdata"?>" enctype="multipart/form-data">
	<table><tr>
			<td>Name:<br /> <input type="text" name="banner_name" /></td>
			<td>Banner Image<br /> <input type="file" name="banner_img" /></td>
			<td>Url:<br /> <input type="text" name="banner_url" /></td>
			<td>Text:<br /> <input type="text" name="banner_text" /></td>
			<td><br /> <input type="submit" name="addsubmit" value="Save" />&nbsp;<input type="button" name="cancel" value="Cancel"  class="add_show_hide" /></td>
	</tr></table>
	</form>
	<hr />
</div>
<div id="contentWrap">
    <table>
        <tr>
            <td>
                <?php for($i=0;$i<sizeof($positionidarray);$i++){?>
                <div class="namestyle"> <?php echo "position ". $positionidarray[$i]?></div>
                <?php }?>
            </td>
            <td>
       
    <div id="contentLeft">
        <ul class="ui-sortable">
            <?php for($i=0;$i<sizeof($imagearray);$i++){?>
            <li id="recordsArray_<?php echo $positionidarray[$i]?>"><img src="<?php echo get_bloginfo('wpurl') . '/wp-content/plugins/affiliate_product_banners/banner_img/thumb/'. $imagearray[$i]?>"/></li>
            <?php }?>
        </ul>
    </div>
            </td>
            <td>
                 <?php for($i=0;$i<sizeof($idarray);$i++){ $j=$idarray[$i]?>
                   <div class="namestyle"><?php echo "<a href='javascript:void(0)' class='view_show_hide' name='$j'>view</a>"?> <?php //echo "<a href='".$idarray[$i]."'>view</a>"?></div>
                 <?php }?>
            </td>
        </tr>
    </table>
    <!--<div id="contentRight">
		  <p>Array will be displayed here.</p>
		  <p>&nbsp; </p>
		</div>-->
</div>
<div class="viewSlidingDiv"></div>
<!--<div class="editSlidingDiv">
	<form method="post" action="<?php echo get_bloginfo('wpurl')."/wp-admin/admin.php?page=savebannerdata"?>" enctype="multipart/form-data">
	<table><tr>
			<td valign="top">Name:<br /> <input id="edit_banner_name" type="text" name="banner_name" /></td>
			<td valign="top">Banner Image<br /> <input type="file" name="banner_img" /><br /><span id="edit_banner_image"></span></td>
			<td valign="top">Url:<br /> <input id="edit_banner_url"  type="text" name="banner_url" /></td>
			<td valign="top">Text:<br /> <input id="edit_banner_text"  type="text" name="banner_text" /></td>
			<td valign="top"><br /> <input type="submit" name="addsubmit" value="Save" />&nbsp;<input type="button" name="cancel" value="Cancel"  class="edit_show_hide_hide" /></td>
	</tr></table>
	</form>
	<hr />
</div>-->
</div>