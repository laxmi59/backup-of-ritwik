<?
session_start();
$uid=$_SESSION['uid'];
include "dbcon.php";
include "class/class.php";
$loc=new real_location();
$x=new valid();
if($_POST['submit'])
{
	extract($_POST);
	
	// validations	
	/*$r_un_valid 		=$x->notempty($_POST['r_un'],"User Name Should not be Empty");
	$r_pw_valid 		=$x->notempty($_POST['r_pw'],"Password Should not be Empty");
	$r_pw_valid_size	=$x->pass($_POST['r_pw'],"length in between 6 and 20");
	$r_rpw_valid		=$x->notempty($_POST['r_rpw'],"Confirm Password Should not be Empty");
	$r_pws_valid		=$x->samepass($_POST['r_pw'] , $_POST['user_rpw'],"Both passwords must be same");
	$r_name_valid		=$x->notempty($_POST['r_name'],"Name Should not be Empty");
	$r_cname_valid		=$x->notempty($_POST['r_cname'],"Company Name Should not be Empty");
	$r_caddr_valid		=$x->notempty($_POST['r_caddr'],"Company Address Should not be Empty");
	$r_country_valid	=$x->ischoose($_POST['country'],"choose one from Country! It should not be Empty");
	$r_location_valid	=$x->ischoose($_POST['location'],"choose one from Location! It should not be Empty");
	$r_email_valid		=$x->notempty($_POST['r_email'],"Email Id Should not be Empty");
	$r_email_valid1		=$x->isvalidemail($_POST['r_email'],"Enter email Id in correct formate");
	$r_web_valid		=$x->notempty($_POST['r_web'],"Company Address Should not be Empty");
	$r_ph1_valid		=$x->notempty($_POST['r_ph1'],"Phone number Should not be Empty");
	$r_ph1_valid1		=$x->isphno($_POST['r_ph1'],"Enter only numbers in phone number");
	$r_ph2_valid1		=$x->isnumaric($_POST['r_ph2'],"Enter only numbers in phone numbers");	
	$r1_valid			=$x->validgender($_POST['r1']," do u agree or not");
	$security_code_valid=$x->notempty($_POST['security_code'],"Security code Should not be Empty");*/
	
	// validations end		

	// form values	
	$r_un=$_POST['r_un'];			$r_name=$_POST['r_name'];		$r_cname=$_POST['r_cname'];	
	$r_caddr=$_POST['r_caddr'];		$country=$_POST['country'];		$location=$_POST['location'];
	$location1=$_POST['location1'];	$r_email=$_POST['r_email'];		$r_web=$_POST['r_web'];
	$r_ph1=$_POST['r_ph1'];			$r_ph2=$_POST['r_ph2'];			$r_sent1=$_POST['r_sent1'];
	$r_sent2=$_POST['r_sent2'];		$r_un=$_POST['r_un'];			$r_year=$_POST['r_year'];
	$r_month=$_POST['r_month'];		$r_day=$_POST['r_day'];			$r_gender=$_POST['r_gender'];
	// form values	
	//print_r($_POST);
	if($_POST['location']==''){	
		$loc=$_POST['location1'];
	}else{
		$loc=$_POST['location'];
	}
	
	$num = mysql_num_rows(mysql_query("select * from `real-reg` where `r_un` = '$r_un' and `r_email`='$r_email' "));
	if($r_un_valid == '' && $r_pw_valid == '' && $r_pw_valid_size == '' && $r_rpw_valid == '' && $r_pws_valid == '' && 	$r_name_valid	== '' && $r_email_valid == '' && $r_email_valid1 == '' && $r_country_valid == '' && $r_location_valid =='' && $r_ph1_valid == '' && $r_ph1_valid1 == '' && $r_ph1_valid2 == '' && $r_ph2_valid1 == '' )
	{
		//echo "aa";
		if($num == 0)
		{
			//print_r($_POST);
			if($_SESSION['security_code'] == $_POST['security_code']) 
   			{
				unset($_SESSION['security_code']);
				//print_r($_POST);
				//$abc=$_POST['r_year']."-".$_POST['r_month']."-".$_POST['r_day'];
				//echo $abc;
				
				$insert=mysql_query("insert into `real-reg` values (`r_id`, '$r_un', '$r_pw', '$r_name', '$r_cname', '$r_caddr', '$r_web','$country', '$loc', '$r_email','$r_ph1', '$r_ph2','$r_type','$sent1','$sent2',now(),`r_income`,`r_img`,'n')");
			
				$to1 = $r_email;
				$subject1 = "Thank you for registering with us";
				$body1 = "Congratulations, Your new account has been successfully created, we will send an activation mail..";
				$to="info@sunproperties.co.in";
				$subject="new user registration";
				$body="<table>
  <tr><td>user type</td><td>:</td><td>$r_type</td></tr>
  <tr><td>User Name </td><td>:</td><td>$r_un</td></tr>
  <tr><td>Your Name</td><td>:</td><td>$r_name</td></tr>
  <tr><td>Company Name</td><td>:</td><td>$r_cname</td></tr>
  <tr><td>Company Address</td><td>:</td><td >$r_caddr</td></tr>
  <tr><td>Web Page </td><td>:</td><td>$r_web</td></tr>
  <tr><td>Country</td><td>:</td><td>$country</td></tr>
  <tr><td>City</td><td>:</td><td>$location</td></tr>
  <tr><td>Email</td><td>:</td><td>$r_email</td></tr>
  <tr><td>Contact Number</td><td>:</td><td>$r_ph1,$r_ph2</td></tr>
</table>";
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= 'From: '.sunproperties. "\r\n";
				if(mail($to1,$subject1,$body1,$headers) && mail($to,$subject,$body,$headers))
				{
					$msg="this review sennt to your mail id";
				}
				else
				{
					$msg= "msg not sent";
				}
				echo "<script>location.replace('thanku.php')</script>";
			}
			else
			{
				$err = 'Sorry, you have provided an invalid security code';
			}
		}
		else
		{
			//print_r($_POST);
			$fet=mysql_fetch_array(mysql_query("select * from `real-reg` where `r_un` = '$r_un' and `r_email`='$r_email' "));
			if($fet['r_un']=='$r_un'){
				$msg1="user name u have provided is aleredy exists plz provide another user name";
			}else if($fet['r_email']=='$r_email'){
				$msg1="Email id u have provided is aleredy exists plz provide another Email Id";
			}else{
				$msg1="Email id and User Name u provided is aleredy exists plz provide another Email Id and User Name";
			}
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$title?></title>
<style type="text/css">
<!--
span.style11{
color: red;
font-size: 11px;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	/*line-height:25px;*/
	font-weight: normal;
}

-->
</style>
</head>

<link href="css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/list1.js"></script>
<script type="text/javascript" src="js/wysiwyg.js"></script>
<script type="text/javascript" src="js/regjs.js"></script>
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
<body onLoad="fillCategory()">
<form name="drop_list" method="post" onSubmit="return validateForm(this);" >
<div align="left">
<div style="width:980px; margin-left:1.5%"  class="tabcolor" align="left" >
<div><? include "header.php"?></div>
<div>
	<div style="width:2%">&nbsp;</div>
	<div style="width:63%" align="center"><?=$err?><?=$msg1?><br>
	 <strong>Registration Form</strong><br /><br />
      <div style="width:100%; margin-left:50px"  class="innertab"  align="left"  >
       <div><span class="trpad style3">User Type</span></div>
        <div class="linebreak"></div>
        <div class="tabcolor style8 trpad"><label for="lDIV1">
            <input id="lDIV1" type="radio" name='r_type' value='1' onclick="Show1('DIV1')" checked="checked" />
            <span class="style4">Individual</span></label>
              <label for="lDIV2">
                <input id="lDIV1" type="radio" name='r_type' value='2' onclick="Show('DIV1')" />
              <span class="style4">Agent/Broker</span></label>
              <label for="lDIV3">
                <input id="lDIV1" type="radio" name='r_type' value='3' onclick="Show('DIV1')" />
              <span class="style4"> Builder</span></label>
              <label for="lDIV4">
                <input id="lDIV1" type="radio" name='r_type' value='4' onclick="Show('DIV1')" />
              <span class="style4">Corporate</span></label>          </div>
        <div class="linebreak"></div>
        <div class="trpad"><span class="style3">Login Information</span></div>
        
		<div class="linebreak">&nbsp;</div>
       
	    <div class="tabcolor" style="padding-bottom:10px">
		<div style="float:left;width:30%"  class="trpad style4">Create User Name </div>
		<div style="height:25px">: <input name="r_un" type="text" value="<?=$r_un?>" /> <span class="style11">
               <?=$r_un_valid?>
             </span></div>
             
        </div>
			  
        
      <!--   /* <div class="linebreak"></div>*/-->
       
        <div  class="tabcolor" style="padding-bottom:10px">
          <div style="float:left; width:30%" class="trpad style4">Password</div>
          <div style="height:25px">: <input name="r_pw" type="password" value="<?=$r_pw?>" /><span class="style11">
                <?=$r_pw_valid?>
                <?=$r_pw_valid_size?>
               <?=$r_pws_valid?>
              </span></div>
		 
              
			  </div>
        
       
        
        <div  class="tabcolor" style="height:30px">
          <div style="float:left; width:30%;padding-bottom:10px"   class="trpad style4">Confirm Password </div>
          <div >:  <input name="r_rpw" type="password" value="<?=$r_rpw?>" /> <span class="style11">
                <?=$r_rpw_valid?>
              </span></div>
             </div>
			
			
			
        <div class="trpad"><span class="style3">Your Information:</span></div>
        
		<div class="linebreak">&nbsp;</div>
        <div class="tabcolor">
          <div style="float:left;width:30%;" class="trpad style4">Your Name</div>
          <div style="height:25px" >: <input name="r_name" type="text" value="<?=$r_name?>" /><span class="style11">
                <?=$r_name_valid?>
              </span>
              </div>
       
        <div class="linebreak">&nbsp;</div>
        
        <div class="tabcolor">
          <div><div id='Content' style="display:block">
              <div id='DIV1' style="display:none">
                <div  style="width:100%"  >
                  <div class="trcol">
                    <div style="float:left; width:30%" class="style4 trpad">Company Name</div>
                    <div >: <input name="r_cname" type="text" value="<?=$r_cname?>" /> <span class="style11">
                        <? if($_POST['r_type']<>1){	echo $r_cname_valid;}?>
                        </span></div>
                        </div>
                  </div>
                 
				 
				  <div class="linebreak">&nbsp;</div>
                  <div class="trcol">
                    <div style="float:left;width:30%" class="style4 trpad">Company Address</div>
                    <div>: <input name="r_caddr" type="text" value="<?=$r_caddr?>" /><span class="style11">
                        <? if($_POST['r_type']<>1){	echo $r_caddr_valid;}?>
                        </span></div>
                        </div>
                  
                  
				  
				  <div class="linebreak">&nbsp;</div>
                  
                  <div class="trcol">
                    <div style="float:left;width:30%" class="style4 trpad">Web Page </div>
                    <div >: <input name="r_web" type="text" value="<?=$r_web?>" /> <span class="style11">
                        <? if($_POST['r_type']<>1){	echo $r_web_valid;}?>
                        </span></div>
                       </div>
                  
				  <div class="linebreak">&nbsp;</div>
                  
                </div>
              </div>
          </div></div>
        </div>
        
		
		
		
		
		<!--<div class="linebreak">&nbsp;</div>-->
        
        <div  class="tabcolor">
          <div style="float:left;width:30%" class="trpad style4">Country</div>
          <div style="height:25px" >:  <select  name="country" id="country" onchange="Selectlocation();" style="width:200px;" >
              <option value="">select</option>
              <noscript>
              <?
	$y=new location();
    $loc1=$y->loc1();
    while($loc=mysql_fetch_array($loc1)){
		if($loc['cid']==101){?>
              <option value="<?=$loc['cid']?>" selected="selected">
                <?=$loc['value']?>
                </option>
              <? }else{?>
              <option value="<?=$loc['cid']?>">
                <?=$loc['value']?>
                </option>
              <? }?>
              <? }?>
              </noscript>
            </select> <span class="style11">
                <?=$r_country_valid?>
              </span></div>
             </div>
    <div class="linebreak">&nbsp;</div>
		
		   <div class="tabcolor">
		   <div style="float:left; width:30%" class="trpad style4">City</div>
          <div style="height:25px;" >:  <select id="location"  name="location" style="width:200px;">
              <option value="">select</option>
              <noscript>
              <?
	$y=new location();
    $loc1=$y->loc();
    while($loc=mysql_fetch_array($loc1)){?>
              <option value="<?=$loc['name']?>">
                <?=$loc['name']?>
                </option>
              <? }?>
              <option value="999">other</option>
              </noscript>
            </select><span class="style11">
                <?=$r_location_valid?>
              </span> </div>
                  
			
			<div style="padding-bottom:5px">
		<div style="float:left;height:30px; width:33.5%;">&nbsp; </div>
		<div class="style4" id="error">Please Type Your City Name in the Text Box.
         <div><input name="location1" type="text" id="location1" /></div>
		</div>
        </div>
						  
			  </div>
        
		
		
				       
        <div  class="tabcolor">
          <div style="float:left;width:30%" class="trpad style4">Email</div>
          <div style="height:25px">:  <input name="r_email" type="text" value="<?=$r_email?>" /> <span class="style11">
                <?=$r_email_valid?>
              </span></div>
             </div>
        
	<div class="tabcolor">
          <div style="width:80%; color:red" class="trpad style4">Please enter correct valid mobile number. </div>
                     </div>	
		
				       
        <div class="tabcolor">
          <div style="float:left;width:30%" class="trpad style4">Mobile Number </div>
          <div style="height:35px">:  <input name="r_ph1" type="text" value="<?=$r_ph1?>" maxlength="10"/><span class="style11">
                <?=$r_ph1_valid?>
                <?=$r_ph1_valid1?>
				<?=$r_ph1_valid2?>
              </span></div>
              </div>
       
	   
	  <!--  <div class="linebreak">&nbsp;</div>-->
        
        <div class="tabcolor">
         
          <div style="float:left;width:30%;" class="trpad style4">Contact Nmuber</div>
          <div style="height:35px" >:  <input name="r_ph2" type="text" value="<?=$r_ph2?>" /><span class="style11">
                <?=$r_ph2_valid1?>
              </span></div>
              </div>
       
	   
	   
	    <div class="linebreak">&nbsp;</div>
        <div  class="trpad"><span class="style3">Verification Information</span></div>
        
		<div class="linebreak">&nbsp;</div>
        <div class="tabcolor">
          <div style="float:left; width:30%"  class="trpad style4">security code</div>
          <div>:<img src="captcha/CaptchaSecurityImages.php?width=100&height=40&characters=5" /></div>
        
		
		<div class="linebreak">&nbsp;</div>
        <div class="tabcolor">
          <div style="float:left; width:30%" class="trpad style4"> Type security code here</div>
          <div>:  <input id="security_code" name="security_code" type="text" /><span class="style11">
                <?= $security_code_valid?>
              </span></div>
		  </div>
        
		
		
		<div class="linebreak">&nbsp;</div>
        <div class="tabcolor">
          <div class="style8 trpad"><input type="checkbox" name="sent1" /><span class="style4">Get periodic updates on Sun Properties and Properties by e-mail</span></div>
		  
       
	    
		
		<div class="tabcolor">
          <div class="style8 trpad"><input type="checkbox" name="sent2" /><span class="style4">Receive special offers from our partners.</span></div>
		  </div>
        
		
		<div class="tabcolor">
          <div class="style8 trpad"><input type="radio" name="r1" /><span class="style4">I Aggree</span>
            <input type="radio" name="r1" />
            <span class="style4">I dis aggree</span> <span class="style11">
              <?=$r1_valid?>
            </span></div>
        
		
		<div class="tabcolor">
          <div align="center"><input name="submit" type="submit" class="btn" value="submit" /></div>
		  </div>
       
	    <div class="linebreak" align="center">&nbsp;</div>
       
      </div>
	  </div>
	<div style=" width:35%">&nbsp;</div>
</div></div>
<div><p>&nbsp;</p></div>

<div style="width:980px"><? include "footer.php"?></div>
</div>
</form>
</body>
</html>