<? session_start();
////////////////   		includes			/////////////////////////////////////////
include "config.php";
include "filenames.php";
include "functions.php";
include "classobjects.php";
////////////////		End of Includes		/////////////////////////////////////////
?>
<?
////////////////////////				Login ////////////////////////////////////////////
if($_GET['act']=='login'){
	extract($_POST);
	//print_r($_POST);
	$qur=mysql_query("select * from ".ADM." where `username`='$username' and `password`='$password'");
	//echo "select * from".ADM." where `username`='$username' and `password`='$password'";
	$qnum=mysql_num_rows($qur);
	$qfet=mysql_fetch_array($qur);
	if($qnum==''){
		echo "<script>location.replace('../admin/index.php?err=Invalid Username or Password')</script>";
	}else{
		$_SESSION['admin_id']=$qfet['aid'];
		$_SESSION['admin_name']=$qfet['username'];
		echo "<script>location.replace('../admin/myaccount.php')</script>";
	}
}
?>
<?

/////////////////////////			products			//////////////////////////////////
if($_GET['act']=='new_prod'){
	extract($_POST);
	//print_r($_POST);
	if($_GET['id']==''){
		$ins=mysql_query("INSERT INTO ".HOTELS." (`hot_name` ,`hot_sdesc` ,`hot_desc` ,`hot_url` ,`hot_ref` ,`hot_date`)VALUES ('$hot_name', '$hot_sdesc', '$hot_desc', '$hot_url', '$hot_ref', now())");
		$iid=mysql_insert_id();
	}else{
		$up=mysql_query("update ".HOTELS." set hot_name='$hot_name', hot_url ='$hot_url', hot_sdesc='$hot_sdesc', hot_desc='$hot_desc' where hid='$_GET[id]'");
		$iid=$_GET['id'];
	}
	define ("MAX_SIZE",1000000);
	define ("WIDTH","90"); //set here the width you want your thumbnail to be
	define ("HEIGHT","90"); //set here the height you want your thumbnail to be.
	define ("WIDTH2","600"); //set here the width you want your thumbnail to be
	define ("HEIGHT2","600"); //set here the height you want your thumbnail to be.
	function make_thumb($img_name,$filename,$new_w,$new_h){
			//echo $img_name."<br>".$filename."<br>";
		$ext=getExtension($img_name);
		//creates the new image using the appropriate function from gd library
		if(!strcmp("jpg",$ext) || !strcmp("jpeg",$ext))
			$src_img=imagecreatefromjpeg($img_name);
			//echo $src_img;
		if(!strcmp("png",$ext))
			$src_img=imagecreatefrompng($img_name);
		if(!strcmp("gif",$ext))
			$src_img=imagecreatefromgif($img_name);
		//gets the dimmensions of the image
		$old_x=imagesx($src_img);
		$old_y=imagesy($src_img);
		
		$ratio1=$old_x/$new_w;
		$ratio2=$old_y/$new_h;
		if($ratio1>$ratio2) {
			$thumb_w=$new_w;
			$thumb_h=$old_y/$ratio1;
		}else{
			$thumb_h=$new_h;
			$thumb_w=$old_x/$ratio2;
		}
		// we create a new image with the new dimmensions
		$dst_img=ImageCreateTrueColor($thumb_w,$thumb_h);
		// resize the big image to the new created one
		imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y);
		// output the created image to the file. Now we will have the thumbnail into the file named by $filename
		if(!strcmp("png",$ext))
			imagepng($dst_img,$filename);
		else
			imagejpeg($dst_img,$filename);
		if (!strcmp("gif",$ext))
			imagegif($dst_img,$filename);
		//destroys source and destination images.
		imagedestroy($dst_img);
		imagedestroy($src_img);
	}// end function
	function getExtension($str) {
		$i = strrpos($str,".");
		if (!$i) { return ""; }
		$l = strlen($str) - $i;
		$ext = substr($str,$i+1,$l);
		return $ext;
	}
	if($_FILES['hot_img']['name']<>''){
	$image=$_FILES['hot_img']['name'];
	
	set_time_limit(0);
	$filename = stripslashes($_FILES['hot_img']['name']);
	$extension = getExtension($filename);
	$extension = strtolower($extension);
	if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) {
		echo"<script>location.replace('hotels.php?id=$iid&msg=Unknown extension! Please use .gif, .jpg or .png files only.')</script>";
		//echo 'Unknown extension! Please use .gif, .jpg or .png files only.';
		//$errors=1;
	}else{
		if ($sizekb > MAX_SIZE*1024){
			echo"<script>location.replace('hotels.php?id=$iid&msg=You have exceeded the 1MB size limit!')</script>";
			//echo 'You have exceeded the 1MB size limit!';
			//$errors=1;
		}
		$iid1=$iid.".".$extension;
		$upd=mysql_query("update ".HOTELS." set `hot_img`='$iid1' where hid='$iid'");
		
		//we will give an unique name, for example a random number
		$image_name=$iid1;
		//the new name will be containing the full path where will be stored (images folder)
		$consname="../hotels/".$image_name; //change the image/ section to where you would like the original image to be stored
		$consname2="../hotels/thumb/".$image_name;
		//change the image/thumb to where you would like to store the new created thumb nail of the image
		$copied = copy($_FILES['hot_img']['tmp_name'], $consname);
		$copied = copy($_FILES['hot_img']['tmp_name'], $consname2);
		if (!$copied) {
			echo 'Copy unsuccessfull!';
			$errors=1;
		}else{
			// the new thumbnail image will be placed in images/thumbs/ folder
			$thumb_name=$consname2 ;
			$thumb=make_thumb($consname,$thumb_name,WIDTH,HEIGHT);
			$thumb=make_thumb($consname,$consname,WIDTH2,HEIGHT2);
			echo"<script>location.replace('../admin/hotels.php?act=show_cat_prod')</script>";
		}//else
	}//else
	}else{
		echo"<script>location.replace('../admin/hotels.php?act=show_cat_prod')</script>";
	}
}
if($_GET['act']=='del'){
	$del=mysql_query("delete from ".HOTELS." where hid='$_GET[hid]'");
	echo "<script>location.replace('../admin/hotels.php?act=show_cat_prod')</script>";
}
?>