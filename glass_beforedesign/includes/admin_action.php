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
		$ins=mysql_query("INSERT INTO ".PRODUCT." (`prod_name` ,`prod_sdesc` ,`prod_desc` ,`prod_price` ,`prod_ref` ,`prod_date`)VALUES ('$prod_name', '$prod_sdesc', '$prod_desc', '$prod_price', '$prod_ref', now())");
		$iid=mysql_insert_id();
	}else{
		$up=mysql_query("update ".PRODUCT." set prod_name='$prod_name', prod_price ='$prod_price', prod_sdesc='$prod_sdesc', prod_desc='$prod_desc' where pid='$_GET[id]'");
		$iid=$_GET['id'];
	}
	define ("MAX_SIZE",1000000);
	define ("WIDTH","75"); //set here the width you want your thumbnail to be
	define ("HEIGHT","75"); //set here the height you want your thumbnail to be.
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
	if($_FILES['prod_img']['name']<>''){
	$image=$_FILES['prod_img']['name'];
	
	set_time_limit(0);
	$filename = stripslashes($_FILES['prod_img']['name']);
	$extension = getExtension($filename);
	$extension = strtolower($extension);
	if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) {
		echo"<script>location.replace('../admin/".ADM_PRODUCTS."?id=$iid&msg=Unknown extension! Please use .gif, .jpg or .png files only.')</script>";
		//echo 'Unknown extension! Please use .gif, .jpg or .png files only.';
		//$errors=1;
	}else{
		if ($sizekb > MAX_SIZE*1024){
			echo"<script>location.replace('../admin/".ADM_PRODUCTS."?id=$iid&msg=You have exceeded the 1MB size limit!')</script>";
			//echo 'You have exceeded the 1MB size limit!';
			//$errors=1;
		}
		$iid1=$iid.".".$extension;
		$upd=mysql_query("update ".PRODUCT." set `prod_img`='$iid1' where pid='$iid'");
		
		//we will give an unique name, for example a random number
		$image_name=$iid1;
		//the new name will be containing the full path where will be stored (images folder)
		$consname="../product/".$image_name; //change the image/ section to where you would like the original image to be stored
		$consname2="../product/thumb/".$image_name;
		//change the image/thumb to where you would like to store the new created thumb nail of the image
		$copied = copy($_FILES['prod_img']['tmp_name'], $consname);
		$copied = copy($_FILES['prod_img']['tmp_name'], $consname2);
		if (!$copied) {
			echo 'Copy unsuccessfull!';
			$errors=1;
		}else{
			// the new thumbnail image will be placed in images/thumbs/ folder
			$thumb_name=$consname2 ;
			$thumb=make_thumb($consname,$thumb_name,WIDTH,HEIGHT);
			$thumb=make_thumb($consname,$consname,WIDTH2,HEIGHT2);
			echo"<script>location.replace('../admin/".ADM_PRODUCTS."?act=show_cat_prod')</script>";
		}//else
	}//else
	}else{
		echo"<script>location.replace('../admin/".ADM_PRODUCTS."?act=show_cat_prod')</script>";
	}
}
if($_GET['act']=='del'){
	$del=mysql_query("delete from ".PRODUCT." where pid='$_GET[pid]'");
	echo "<script>location.replace('../admin/".ADM_PRODUCTS."?act=show_cat_prod')</script>";
}

/////////////////////////////			whole sellers	/////////////////////////////////////////////////
if($_GET['act']=='new_user'){
	extract($_POST);
	if($_GET['id']==''){
		$u1=mysql_num_rows(mysql_query("select * from ".USERS." where `username`='$username'"));
		$u2=mysql_num_rows(mysql_query("select * from ".USERS." where `user_email`='$user_email'"));
		if($u1=='' && $u2==''){
			$ins=mysql_query("INSERT INTO ".USERS." (`username` ,`password` ,`user_fname` ,`user_discount` ,`user_type` ,`user_date` ,`user_email`, `user_status`)VALUES ('$username', '$password', '$user_fname', '$user_discount', 'seller', now(), '$user_email', 'a')");
			$to= $user_email;
			$subject= "Your Registrion information from ".WEBSITE_NAME;
			$body= "<table>
				<tr><td colspan='3'>You are successfully registerd in our ".WEBSITE_NAME."</td></tr>
				<tr><td colspan='3'>Your Login information is</td></tr>
				<tr><td>Username</td><td>:</td><td>$username</td></tr>
				<tr><td>Password</td><td>:</td><td>$password</td></tr>
				<tr><td colspan='2'>Thanking You</td></tr>
				</table> ";
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: '.WEBSITE_NAME. "\r\n";
			if(mail($to, $subject, $body ,$headers)){}	
		}else{
			$rt=$user_fname.",".$username.",".$user_discount.",".$user_email;
			if($u1<>'' && $u2<>''){
				echo "<script>location.replace('../admin/".ADM_SELLERS."?act=new_prod&msg1=Username aleredy exists pls provide another username&msg2=Email aleredy exists pls provide another Email Id&val=$rt')</script>"; 
			}elseif($u1<>''){ 
				echo "<script>location.replace('../admin/".ADM_SELLERS."?act=new_prod&msg1=Username aleredy exists pls provide another username&val=$rt')</script>"; 
			}elseif($u2<>''){ 
				echo "<script>location.replace('../admin/".ADM_SELLERS."?act=new_prod&msg2=Email aleredy exists pls provide another Email Id&val=$rt')</script>";
			}
		}
	}else{
		$upd=mysql_query("update ".USERS." set `username`='$username', `password`='$password', `user_fname`='$user_fname', `user_discount`='$user_discount', `user_email`='$user_email', `user_status`='$user_status' where `user_id`=$_GET[id]");
	}
	echo "<script>location.replace('../admin/".ADM_SELLERS."?act=show_sellers&status=a')</script>";
}


if($_GET['act']=='user_del'){
	$del=mysql_query("delete from ".USERS." where user_id='$_GET[pid]'");
	echo "<script>location.replace('../admin/".ADM_SELLERS."?act=show_sellers&status=a')</script>";
}

//////////////////////////////////			users ////////////////////////////////////
if($_GET['act']=='user_status'){
	//echo $_GET['status'];
	$del=mysql_query("update ".USERS." set `user_status`='$_GET[status]' where user_id='$_GET[pid]'");
	if($_GET['status']=='a'){
	$sel=mysql_fetch_array(mysql_query("select * from ".USERS." where user_id='$_GET[pid]'"));
		$to1= $sel['user_email'];
		$subject1= "Your Account verification in ".WEBSITE_NAME;
		$body1= "<table>
			<tr><td colspan='3'> Your Account Varification completed. You may access your account with your login details</td></tr>
			<tr><td colspan='3'>Your Login information is</td></tr>
			<tr><td>Username</td><td>:</td><td>$sel[username]</td></tr>
			<tr><td>Password</td><td>:</td><td>$sel[password]</td></tr>
			<tr><td colspan='2'>Thanking You</td></tr>
			</table> ";
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: '.WEBSITE_NAME. "\r\n";
		if(mail($to1, $subject1, $body1 ,$headers)){}	

	}
	echo "<script>location.replace('../admin/".ADM_USERS."?status=$_GET[status]')</script>";
}


?>