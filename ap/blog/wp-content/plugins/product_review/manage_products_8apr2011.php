<?php
global $wpdb;
//echo "test";
if($_GET['type']=='delete'){
	$delProducts=mysql_query("delete from ".$wpdb->prefix."products where product_id=".$_GET['id']);
	echo "<script>window.location='admin.php?page=Products'</script>";
}
if($_GET['type']=='featured'){
	$unsetfeatured=mysql_query("update ".$wpdb->prefix."products set product_featured=''");
	$setfeatured=mysql_query("update ".$wpdb->prefix."products set product_featured='yes' where product_id=".$_GET['id']);
	echo "<script>window.location='admin.php?page=Products'</script>";
}
$getProducts=mysql_query("select * from ".$wpdb->prefix."products where product_featured='' order by product_id desc");?>
<script type="text/javascript">
function setAsFeatured(id){
	var r=confirm("Do You Want set this product as Featured ?");
	if (r==true){
		window.location='admin.php?page=Products&type=featured&id='+id;
	}else{
		window.location='admin.php?page=Products';
	}
}
</script>
<div>&nbsp;</div>
<h2 align="center">Product List</h2>
<div align="center">
<table width="90%" align="center" border="0" cellspacing="5" cellpadding="5">
  <tr>
    <td><strong>Title</strong></td>
    <td><strong>Image</strong></td>
   <!-- <td><strong>Short Content </strong></td>
    <td><strong>Modified date</strong> </td>-->
    <td><strong>Type</strong></td>
    <td><strong>Action</strong></td>
  </tr>
 <?php $fetFeaturedProduct=mysql_fetch_object(mysql_query("select * from ".$wpdb->prefix."products where product_featured='yes'"));?>
 <tr>
    <td><?php echo $fetFeaturedProduct->product_title;?></td>
    <td><img src="<?php echo bloginfo('url') . '/wp-content/themes/ap/product_images/thumb/'.$fetFeaturedProduct->product_image;?>" width="100" height="50" /></td>
    <td><input type="radio" name="product_featured" id="product_featured" checked="checked" /></td>
    <td>
	<a href="admin.php?page=Add_Product&id=<?php echo $fetFeaturedProduct->product_id;?>">Edit</a>
	</td>
  </tr>
<?php 
if(mysql_num_rows($getProducts)){
while($fetProducts=mysql_fetch_object($getProducts)){?>
  <tr>
    <td><?php echo $fetProducts->product_title;?></td>
    <td><img src="<?php echo bloginfo('url') . '/wp-content/themes/ap/product_images/thumb/'.$fetProducts->product_image;?>" width="100" height="50" /></td>
    <?php /*?><td><?php echo $fetProducts->product_short_desc;?></td>
    <td><?php echo $fetProducts->product_modified_time ;?></td><?php */?>
    <td><input type="radio" name="product_featured" id="product_featured" <?php if($fetProducts->product_featured =='yes') echo "checked='checked'"?> onclick="setAsFeatured(<?php echo $fetProducts->product_id;?>)" /></td>
    <td>
	<a href="admin.php?page=Add_Product&id=<?php echo $fetProducts->product_id;?>">Edit</a>|
	<a href="admin.php?page=Products&type=delete&id=<?php echo $fetProducts->product_id;?>">Delete</a>
	</td>
  </tr>
<?php }}else{?>
  <tr>
    <td colspan="6"> <div align="center"><strong>No Products Found</strong></div></td>
  </tr>
  <? }?>
</table>
</div>