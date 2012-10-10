<?
session_start();
$uid=$_SESSION['uid'];
include "dbcon.php";
$a=$d->reg($uid);
$aa=mysql_fetch_array($a);

if($_POST['submit'])
{
	extract($_POST);
	$r_un=$_POST['r_un'];	
	$r_name=$_POST['r_name'];
	$r_cname=$_POST['r_cname'];
	$r_caddr=$_POST['r_caddr'];
	$country=$_POST['country'];
	$location=$_POST['location'];
	$location1=$_POST['location1'];
	$r_email=$_POST['r_email'];
	$r_web=$_POST['r_web'];
	$r_ph1=$_POST['r_ph1'];
	$r_ph2=$_POST['r_ph2'];
	$r_sent1=$_POST['r_sent1'];
	$r_sent2=$_POST['r_sent2'];
	$r_un=$_POST['r_un'];
	
	//print_r($_POST);
	if($_POST['location']==''){	
		$loc=$_POST['location1'];
	}else{
		$loc=$_POST['location'];
	}
	//print_r($_POST);
	$img = $_FILES['r_img']['name'];
	$size = $_FILES['r_img']['size'];
	//echo $img,$size;
	$uploaddir = 'img/';
	$uploadfile = $uploaddir . $img;
	if (move_uploaded_file($_FILES['r_img']['tmp_name'], $uploadfile)) {	echo $size;		}
	else{echo "There was an error uploading the file";}
	if($_FILES['r_img']['name']){	$file1 = $_FILES['r_img']['name'];}else {$file1 = $_POST['r_img1'];}
	
	//echo $abc;
	$update=mysql_query("update `real-reg` set `r_name` ='$r_name', `r_cname`='$r_cname', `r_addr`='$r_addr', `r_web`='$r_web', `country`='$country', `location`='$loc', `r_email`='$r_email', `r_ph1`='$r_ph1', `r_ph2`='$r_ph2', `r_type`='$r_type', `r_income`='$r_income',`r_img`='".$file1."' where r_id='".$uid."'");
	echo "<script>location.replace('myaccount.php?act=show')</script>";
	
}
?>
<script type="text/javascript" src="list1.js"></script>
<script type="text/javascript" src="wysiwyg.js"></script>
<script type="text/javascript">
var allPageTags = new Array();
function doSomethingWithClasses(theClass) {
//Populate the array with all the page tags
    var allPageTags=document.getElementsByTagName("*");
//Cycle through the tags using a for loop
    for (var i=0; i<allPageTags.length; i++) {
//Pick out the tags with our class name
      if (allPageTags[i].className==theClass) {
//Manipulate this in whatever way you want
        allPageTags[i].style.display='none';
      }
    }
  }

function Show(ids) {
  doSomethingWithClasses('RBtnTab');
  var obj = document.getElementById(ids);
  if (obj.style.display != 'block') { obj.style.display = 'block'; }
                               else { obj.style.display = 'block'; }
}
function Show1(ids) {
 doSomethingWithClasses('RBtnTab');
  var obj = document.getElementById(ids);
  if (obj.style.display != 'block') { obj.style.display = 'none'; }
                               else { obj.style.display = 'none'; }
}
</script>
<link href="css/style.css" type="text/css" rel="stylesheet" />
<body onLoad="fillCategory()">
<form name="drop_list" method="post" enctype="multipart/form-data" >
<table width="80%" align="center" cellpadding="0" cellspacing="0" class="innertab">
 <tr>
    <td colspan="3" class="style3" ><strong>&nbsp;&nbsp;User Type </strong></td>
  </tr>
  <tr class="linebreak"><td colspan="3"></td></tr>
  <tr class="tabcolor">
    <td colspan="3" class="trpad">
	<? if($aa['r_type']==1){?>
		<label for="lDIV1"><input id="lDIV1" type="radio" name='r_type' checked="checked" value='1' onClick="Show1('DIV1')"> 
		<span class="style4">Individual</span></label>
		<label for="lDIV2"><input id="lDIV1" type="radio" name='r_type' value='2' onClick="Show('DIV1')">
		<span class="style4">Agent/Broker</span></label>
		<label for="lDIV3"><input id="lDIV1" type="radio" name='r_type' value='3' onClick="Show('DIV1')"> 
		<span class="style4">Builder</span></label>
		<label for="lDIV4"><input id="lDIV1" type="radio" name='r_type' value='4' onClick="Show('DIV1')"> 
		<span class="style4">Corporate</span></label>
	<? }else if($aa['r_type']==2){?>
		<label for="lDIV1"><input id="lDIV1" type="radio" name='r_type'  value='1' onClick="Show1('DIV1')"> 
		<span class="style4">Individual</span></label>
		<span class="style4">
		<label for="lDIV2"></label>
		</span>
		<label for="lDIV2"><input id="lDIV1" type="radio" checked="checked" name='r_type' value='2' onMouseOver="Show('DIV1')">
		<span class="style4">Agent/Broker</span></label>
		<label for="lDIV3"><input id="lDIV1" type="radio" name='r_type' value='3' onClick="Show('DIV1')"> 
		<span class="style4">Builder</span></label>
		<label for="lDIV4"><input id="lDIV1" type="radio" name='r_type' value='4' onClick="Show('DIV1')"> 
		<span class="style4">Corporate</span></label>
	<? }else if($aa['r_type']==3){?>
		<label for="lDIV1"><input id="lDIV1" type="radio" name='r_type'  value='1' onClick="Show1('DIV1')"> 
		<span class="style4">Individual</span></label>
		<label for="lDIV2"><input id="lDIV1" type="radio"  name='r_type' value='2' onClick="Show('DIV1')">
		<span class="style4">Agent/Broker</span></label>
		<label for="lDIV3"><input id="lDIV1" type="radio" checked="checked" name='r_type' value='3' onMouseOver="Show('DIV1')"> 
		<span class="style4">Builder</span></label>
		<span class="style4">
		<label for="lDIV4"></label>
		</span>
		<label for="lDIV4"><input id="lDIV1" type="radio" name='r_type' value='4' onClick="Show('DIV1')"> 
		<span class="style4">Corporate</span></label>
	<? }else if($aa['r_type']==4){?>
	<label for="lDIV1"><input id="lDIV1" type="radio" name='r_type'  value='1' onClick="Show1('DIV1')"> 
	<span class="style4">Individual</span></label>
		<span class="style4">
		<label for="lDIV2"></label>
		</span>
		<label for="lDIV2"><input id="lDIV1" type="radio"  name='r_type' value='2' onClick="Show('DIV1')">
		<span class="style4">Agent/Broker</span></label>
		<label for="lDIV3"><input id="lDIV1" type="radio" name='r_type' value='3' onClick="Show('DIV1')"> 
		<span class="style4">Builder</span></label>
		<label for="lDIV4"><input id="lDIV1" type="radio" checked="checked" name='r_type' value='4' onMouseOver="Show('DIV1')"> 
		<span class="style4">Corporate</span></label>
	<? }?>	</td>
  </tr>
  <tr class="linebreak"><td colspan="3"></td></tr>
   <tr class="tabcolor">
    <td class="trpad"><span class="style4"> User Name </span></td>
    <td>:</td>
    <td><?=$aa['r_un']?></td>
  </tr>
  <tr class="linebreak"><td colspan="3"></td></tr>
  <tr>
    <td colspan="3" class="style3"><strong>&nbsp;Your Information:</strong></td>
  </tr>
  <tr class="linebreak"><td colspan="3"></td></tr>
  <tr class="tabcolor">
    <td class="trpad"><span class="style4">Your Name</span></td>
    <td>:</td>
    <td><input name="r_name" type="text" value="<?=$aa['r_name']?>"></td>
  </tr>
  <tr class="linebreak"><td colspan="3"></td></tr>
  <tr><td colspan="3">
  
<div id='Content' style="display:block">
<div id='DIV1' style="display:none">
<table width="100%" cellpadding="0" cellspacing="0">
  <tr class="tabcolor">
    <td style="padding-right:25px;">Company Name&nbsp;</td>
    <td style="padding-right:5px;">:</td>
    <td ><input name="r_cname" type="text" value="<?=$aa['r_cname']?>"></td>
  </tr>
  <tr class="linebreak"><td colspan="3"></td></tr>
  <tr class="tabcolor">
    <td>Company Address</td>
    <td>:</td>
    <td ><input name="r_addr" type="text" value="<?=$aa['r_addr']?>"></td>
  </tr>
  <tr class="linebreak"><td colspan="3"></td></tr>
   <tr class="tabcolor">
    <td>Web Page </td>
    <td>:</td>
    <td ><input name="r_web" type="text" value="<?=$aa['r_web']?>"></td>
  </tr>
  <tr class="linebreak"><td colspan="3"></td></tr>
  <tr class="tabcolor">
  	<td>Logo</td>
	<td>:</td>
	<td>
	<? 	if($aa['r_img'] == "")
		{ ?><img src="img/no_picture.gif" width="100"  border="0"/>
		<? }
		else 
		{?><img src="img/<?=$aa['r_img']?>" border="0" height="100" width="150" />
		<? }?><br><input type="file" name="r_img" id="r_img">
	</td>
  </tr>
  </table>
  </div>
 </div>
 </td></tr>
 
  <tr class="tabcolor">
    <td class="trpad"><span class="style4">Country</span></td>
    <td>:</td>
    <td><SELECT  NAME="country" id="country" onChange="Selectlocation();" style="width:200px;" >
	
      <Option value="<?=$aa['country']?>"><?=$c->location1($aa['country'])?></option>
    </SELECT></td>
  </tr>
  <tr class="linebreak"><td colspan="3"></td></tr>
  <tr class="tabcolor">
    <td class="trpad"><span class="style4">City</span></td>
    <td>:</td>
    <td><SELECT id="location"  NAME="location" style="width:200px;">
      <Option value="<?=$aa['location']?>"><?=$c->location($aa['location'])?></option>
    </SELECT>
      <br><input name="location1" type="text" id="location1"></td>
  </tr>
  <tr class="linebreak"><td colspan="3"></td></tr>
  <tr class="tabcolor">
    <td class="trpad"><span class="style4">Email</span></td>
    <td>:</td>
    <td><input name="r_email" type="text" value="<?=$aa['r_email']?>"></td>
  </tr>
  <tr class="linebreak"><td colspan="3"></td></tr>
   <tr class="tabcolor">
    <td class="trpad"><span class="style4">Contact Number </span></td>
    <td>:</td>
    <td><input name="r_ph1" type="text" value="<?=$aa['r_ph1']?>"></td>
  </tr>
  <tr class="linebreak"><td colspan="3"></td></tr>
  <tr class="tabcolor">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input name="r_ph2" type="text" value="<?=$aa['r_ph2']?>"></td>
  </tr>
  <tr class="linebreak"><td colspan="3"></td></tr>
  <tr class="tabcolor">
  	<td class="trpad">Annual Income</td>
	<td>:</td>
	<td><select name="r_income">
			<option value="<?=$aa['r_income']?>"><?=$aa['r_income']?></option>
			<option value="Less Than 2 Lac">Less Than 2 Lac</option>
			<option value="2 Lacs to 3 Lacs">2 Lacs to 3 Lacs</option>
			<option value="3 Lacs to 5 Lacs">3 Lacs to 5 Lacs</option>
			<option value="5 Lacs to 7 Lacs">5 Lacs to 7 Lacs</option>
			<option value="7 Lacs to 10 Lacs">7 Lacs to 10 Lacs</option>
			<option value="10 Lacs to 15 Lacs">10 Lacs to 15 Lacs</option>
			<option value="15 Lacs and above">15 Lacs and above</option>
		</select>
	</td>
  </tr>
  <tr class="linebreak"><td colspan="3"></td></tr>
   <!--<tr>
    <td colspan="3" bgcolor="#EBEBEB"><strong>&nbsp;Verification Information</strong>:</td>
  </tr>
   <tr>
    <td>&nbsp;security code</td>
    <td>:</td>
    <td><img src="captcha/CaptchaSecurityImages.php?width=100&height=40&characters=5" /></td>
  </tr>
  <tr>
    <td>&nbsp; Type security code here</td>
    <td>:</td>
    <td><input id="security_code" name="security_code" type="text" /></td>
  </tr>-->
   <tr class="tabcolor">
    <td colspan="3" align="center"><input type="submit" name="submit" value="submit"></td>
    </tr>
	<tr class="tabcolor">
		<td colspan="3"><p>&nbsp;</p></td>
	</tr>
</table>

</form>
</body>
