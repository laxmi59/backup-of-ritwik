<?
if($_SESSION['un']==''){	echo "<script>location.replace('index.php')</script>";}
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
<div align="left" style="padding-left:10%">
<div style="width:80%" class="innertab">
 <div class="style3">User Type</div>
   
    <div style="padding-left:16px; height:40px" class="tabcolor">
	
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
	    
	      <? }?>
	   
      </div>
   
   <div class="tabcolor">
    <div style="float:left; width:40%" class="trpad style4">User Name</div>
    <div>: <?=$aa['r_un']?></div>
     <br>
	 </div>
   
   <div align="left" class="style3"><strong>&nbsp;Your Information:</strong></div>
  
     <div style="padding-top:15px"  class="tabcolor">
   <div style="float:left; width:40%; padding-left:15px" class="style4">Your Name</div>
    <div>: <input name="r_name" type="text" value="<?=$aa['r_name'] ?>"></div>
  <div class="linebreak">&nbsp;</div>
  </div>
   
  
 <div id='Content' style="display:block">
<div id='DIV1' style="display:none">
  <div class="tabcolor">
    <div style="float:left;width:40%;padding-left:15px" class="style4">Company Name</div>
    <div>: <input name="r_cname" type="text" value="<?=$aa['r_cname']?>"></div>
  <div class="linebreak">&nbsp;</div>
  </div>
    
  <div class="tabcolor">
    <div style="float:left;width:40%;padding-left:15px" class="style4" >Company Address</div>
    <div>: <input name="r_addr" type="text" value="<?=$aa['r_addr']?>"></div>
  <div class="linebreak">&nbsp;</div>
  </div>
  
  
    <div class="tabcolor">
    <div style="float:left;width:40%;padding-left:15px" class="style4" >Web Page </div>
    <div>: <input name="r_web" type="text" value="<?=$aa['r_web']?>"></div>
 <div class="linebreak">&nbsp;</div>
  </div>
  
     
   <div class="tabcolor">
  	<div style="float:left;width:41%;padding-left:15px" class="style4">Logo</div>
	<div style="float:left">:</div>
	<? 	if($aa['r_img'] == "")
		{ ?><img src="img/no_picture.gif" width="100"  border="0"/>
		<? }
		else 
		{?><img src="img/<?=$aa['r_img']?>" border="0" height="100" width="150" />
		<? }?><div align="right" style="padding-right:30px"><input type="file" name="r_img" id="r_img"></div>
		</div>
	
  </div>
  <div class="linebreak">&nbsp;</div>
  </div>
  
 
  <div class="tabcolor">
    <div style="float:left;width:40%;padding-left:15px"><span class="style4">Country</span></div>
    <div>: <SELECT  NAME="country" id="country" onChange="Selectlocation();" style="width:200px;" >
	
	<option value="">select</option>
				<? 
				$j=$c->location_country();
				while($xxx=mysql_fetch_array($j)){
				   if($aa['country']==$xxx['cid']){
				?>
				<option value="<?=$xxx['cid']?>" selected="selected"><?=$xxx['value']?></option>
				<? }
				else
				{ ?>
				<option value="<?=$xxx['cid']?>" ><?=$xxx['value']?></option>
				
				<? } }?>
	
     <!-- <Option value="<? //=$aa['country']?>"><? //=$c->location1($aa['country'])?></option>-->
    </SELECT>
	<!--<input type="text" style="border:none" value="india" readonly="">-->
	</div>
	<div class="linebreak">&nbsp;</div>
  </div>
 
 
 
 
 
  
  
  <div class="tabcolor">
      <div style="float:left;width:40%;padding-left:15px"  class="trpad"><span class="style4">City</span></div>
    <div>: 
      <select id="location"  name="location" style="width:200px;">
	  
	  <option value="">select</option>
				<? 
				$j=$c->location_city();
				while($xxx=mysql_fetch_array($j)){
				   if($aa['location']==$xxx['cid']){
				?>
				<option value="<?=$xxx['cid']?>" selected="selected"><?=$xxx['city_name']?></option>
				<? }
				else
				{ ?>
				<option value="<?=$xxx['cid']?>" ><?=$xxx['city_name']?></option>
				
				<? } }?>
				
	  
	  
	  
        <!--<option value="<? //=$aa['country']?>">
          <? // =$c->location_city($aa['city'])?>
          </option>-->
      </select>
      <br>
    <!--  <input name="location1" type="text" id="location1">--></div>
	  <div class="linebreak">&nbsp;</div>
  </div>
  
  
 <!-- <div class="tabcolor">
      <div style="float:left;width:42%;padding-left:15px"class="trpad">&nbsp;</div>
    <div>   
      <input name="location1" type="text" id="location1"></div>
	  <div class="linebreak">&nbsp;</div>
  </div>-->
     
  <div class="tabcolor">
    <div style="float:left;width:40%;padding-left:15px"  class="trpad"><span class="style4">Email</span></div>
    <div>: <input name="r_email" type="text" value="<?=$aa['r_email']?>">
	<div class="linebreak">&nbsp;</div>
	</div>
  
  
    <div class="tabcolor">
    <div style="float:left;width:40%;padding-left:15px"  class="trpad"><span class="style4">Contact Number </span></div>
    <div>: <input name="r_ph1" type="text" value="<?=$aa['r_ph1']?>"></div>
	<div class="linebreak">&nbsp;</div>
	</div>
      
  <div class="tabcolor">
      <div style="float:left;width:42%;padding-left:15px"class="trpad">&nbsp;</div>
    <div>    <input name="r_ph2" type="text" value="<?=$aa['r_ph2']?>"></div>
	  <div class="linebreak">&nbsp;</div>
  </div>
  
  
  
  <div class="linebreak"></div>
  <div class="tabcolor">
  	<div style="float:left;width:40%;padding-left:15px"  class="trpad"><span class="style4">Annual Income</span></div>
	<div>: <select name="r_income">
			<option value="<?=$aa['r_income']?>"><?=$aa['r_income']?></option>
			<option value="Less Than 2 Lac">Less Than 2 Lac</option>
			<option value="2 Lacs to 3 Lacs">2 Lacs to 3 Lacs</option>
			<option value="3 Lacs to 5 Lacs">3 Lacs to 5 Lacs</option>
			<option value="5 Lacs to 7 Lacs">5 Lacs to 7 Lacs</option>
			<option value="7 Lacs to 10 Lacs">7 Lacs to 10 Lacs</option>
			<option value="10 Lacs to 15 Lacs">10 Lacs to 15 Lacs</option>
			<option value="15 Lacs and above">15 Lacs and above</option>
		</select>
	</div>
	<div class="linebreak">&nbsp;</div>
  </div>
 
 
 
  <div class="linebreak">&nbsp;</div>
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
   <div class="tabcolor">
    <div align="center"><input type="submit" name="submit" value="submit"></div>
    
	<div class="tabcolor">
		<div><p>&nbsp;</p></div>
	</div>
</div>
</div>
 </div>
 </div>
</form>
</body>
