<?php
global $wpdb;

if($_POST['productsubmit']){
	extract($_POST);
	if (strpos($product_url, "http://") == false) {
		$url="http://".$product_url;
  	}
	$mess="";
	$time = new DateTime('now', new DateTimeZone('UTC'));
	$featured_date1= $time->format('Y-m-d H:i:s');
	if($pid !=''){
		$upd=mysql_query("update ".$wpdb->prefix."products set `product_title` ='$product_title',  `product_short_desc`='$product_short_desc', `product_modified_time`='$featured_date1', product_url ='$url' where product_id=$pid");
		$recentId=$pid;
	}elseif($_FILES["product_image"]["name"] != ""){
		$ins=mysql_query("insert into ".$wpdb->prefix."products (`product_title`, `product_short_desc`,  `product_added_time`, `product_modified_time`, `product_image`, `product_url`) values('$product_title', '$product_short_desc', '$featured_date1','$prd_fet_date','','$url')");
		$recentId=mysql_insert_id();
	}else{
		$msg="You must upload the image";
	}
	if($_FILES["product_image"]["name"] != ""){
		$target_path=WP_CONTENT_DIR . '/plugins/product_review/uploads/'.$_FILES["product_image"]["name"];
		move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_path );
	
		$image = new SimpleImage2();
		$image->load($target_path);
		$extension = getExtensionlearning($target_path);
		$extension = strtolower($extension);
		$basename=$recentId.'.'.$extension;
		$size = getimagesize($target_path);
				
		if($size[0] >= 254 && $size[1] >= 106){
		   $image->resize(254,106);
		   $image->save(WP_CONTENT_DIR . '/themes/ap/product_images/'.$basename);
		   $bigImage=1;
		}
		if($size[0] > 254 && $size[1] > 106){
		   $image->resize(254,106);
		   $image->save(WP_CONTENT_DIR . '/themes/ap/product_images/thumb/'.$basename);
		   $smallImage=1;
		}
		if($bigImage != 1){
			$image->save(WP_CONTENT_DIR . '/themes/ap/product_images/'.$basename);
		}
		if($smallImage != 1){
			$image->save(WP_CONTENT_DIR . '/themes/ap/product_images/thumb/'.$basename);
		}
		$sqlQuery = mysql_query("update ".$wpdb->prefix."products set product_image= '".$basename."' WHERE product_id=".$recentId);	
		unlink($target_path);
		$basename='';
		echo "<script>window.location='admin.php?page=Products&msg=1'</script>";
	}
}
function getExtensionlearning($str) {
	$i = strrpos($str,".");
	if (!$i) { return ""; }
	$l = strlen($str) - $i;
	$ext1 = substr($str,$i+1,$l);
	return $ext1;
}  
class SimpleImage2 {
   var $image;
   var $image_type;
   function load($filename) {
	  $image_info = getimagesize($filename);
	  $this->image_type = $image_info[2];
	  if( $this->image_type == IMAGETYPE_JPEG ) {
		 $this->image = imagecreatefromjpeg($filename);
	  } elseif( $this->image_type == IMAGETYPE_GIF ) {
		 $this->image = imagecreatefromgif($filename);
	  } elseif( $this->image_type == IMAGETYPE_PNG ) {
		 $this->image = imagecreatefrompng($filename);
	  }
   }
   function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {
	  if( $image_type == IMAGETYPE_JPEG ) {
		 imagejpeg($this->image,$filename,$compression);
	  } elseif( $image_type == IMAGETYPE_GIF ) {
		 imagegif($this->image,$filename);         
	  } elseif( $image_type == IMAGETYPE_PNG ) {
		 imagepng($this->image,$filename);
	  }   
	  if( $permissions != null) {
		 chmod($filename,$permissions);
	  }
   }
   function output($image_type=IMAGETYPE_JPEG) {
	  if( $image_type == IMAGETYPE_JPEG ) {
		 imagejpeg($this->image);
	  } elseif( $image_type == IMAGETYPE_GIF ) {
		 imagegif($this->image);         
	  } elseif( $image_type == IMAGETYPE_PNG ) {
		 imagepng($this->image);
	  }   
   }
   function getWidth() {
	  return imagesx($this->image);
   }
   function getHeight() {
	  return imagesy($this->image);
   }
   function resizeToHeight($height) {
	  $ratio = $height / $this->getHeight();
	  $width = $this->getWidth() * $ratio;
	  $this->resize($width,$height);
   }
   function resizeToWidth($width) {
	  $ratio = $width / $this->getWidth();
	  $height = $this->getheight() * $ratio;
	  $this->resize($width,$height);
   }
   function scale($scale) {
	  $width = $this->getWidth() * $scale/100;
	  $height = $this->getheight() * $scale/100; 
	  $this->resize($width,$height);
   }
   function resize($width,$height) {
	  $new_image = imagecreatetruecolor($width, $height);
	  imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
	  $this->image = $new_image;   
   }      
}
?>
<?php
if($_GET['id']){
	$editProduct=mysql_fetch_object(mysql_query("select * from ".$wpdb->prefix."products where product_id=".$_GET['id']));
}
?>
<style type="text/css">
.errorown{font-size:12px;color:red};
</style>
<script type="text/javascript">
// validations
function trimfun(stringToTrim) {
	return stringToTrim.replace(/^\s+|\s+$/g,"");
}
function isNotEmpty(fname,txt){
	if(trimfun(fname.value)=="")	{
		alert(txt);
		fname.focus();
		return true;
	}
	return false;
}
function webUrl(reg){
	var e=reg.value;
	var ee=	"www."+reg.value;
	var e1=/^(http:\/\/|https:\/\/|www.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(([0-9]{1,5})?\/.*)?$/;
	if(e.match(e1) || ee.match(e1))	{
		return false;
	}else{
		alert("Invalid Url");
		reg.focus();
		return true;
	}
}
function validateForm(reg){
alert("test");
	//reg=document.Registration_form;
	if(isNotEmpty(reg.product_title,"Title should not be Empty")){return false}
	
	if(isNotEmpty(reg.product_url,"Url should not be Empty")){return false}
	if(webUrl(reg.product_url)){return false}
	
	if(isNotEmpty(reg.product_image,"Image should not be Empty")){return false}
	
	if(isNotEmpty(reg.product_short_desc,"Short Description should not be Empty")){return false}
}
</script>
<div>&nbsp;</div>
<div>
  <h2><?php if($_GET['id']) echo "Edit Product"; else echo "New Product";?> </h2>
</div>
<table width="811" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="811" align="center"><?php echo $msg?>
	<form method="post" name="importLabelForm" id="importLabelForm" enctype="multipart/form-data" onsubmit="return validateForm(this)">
	<input type="hidden" name="pid" id="pid" value="<?php echo $_GET['id']?>" />
	<table width="812" border="0" cellspacing="0" cellpadding="0" align="center" >
	<tr>
		<td width="24%" height="10" align="left"></td>
		<td width="76%" height="10" align="left"></td>
	</tr>
	<tr>
	  <td height="30" align="left"><strong>Product Title </strong></td>
	  <td align="left"><input type="text" name="product_title" id="product_title" value="<?php echo $editProduct->product_title?>" /></td>
	  </tr>
	 <tr>
	  <td height="30" align="left"><strong>Product Url </strong></td>
	  <td align="left"><input type="text" name="product_url" id="product_url" value="<?php echo $editProduct->product_url?>" /></td>
	  </tr>
	   <?php if($_GET['id']){?>
	  <tr>
	  <td height="30" align="left"></td>
	  <td align="left"><img src="<?php echo bloginfo('url') . '/wp-content/themes/ap/product_images/thumb/'.$editProduct->product_image;?>" width="100" height="50" /></td>
	  </tr>
	  <?php }?>
	<tr>
		<td height="30" align="left"><strong>Upload Product Image </strong></td>
		<td align="left"><input name="product_image" id="product_image" type="file" class="required csv" value="" /></td>
	</tr>
	<tr>
	  <td height="30" align="left"><strong>Product  Description </strong></td>
	  <td align="left"><textarea name="product_short_desc" id="product_short_desc" cols="30" rows="3"><?php echo $editProduct->product_short_desc?></textarea></td>
	  </tr>
	<?php /*?><tr>
	  <td height="30" align="left"><strong>Product Description </strong></td>
	  <td align="left"><textarea cols="30" name="product_desc" id="product_desc" rows="5"><?php echo $editProduct->product_desc?></textarea></td>
	  </tr><?php */?>
	<tr>
		<td height="30" align="left">&nbsp;</td>
		<td align="left"><input name="productsubmit" type="submit" class="button" id="button3" value="Submit" onclick="return validateForm(this)" /></td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	</table>
	</form>
	</td>
</tr>
</table>