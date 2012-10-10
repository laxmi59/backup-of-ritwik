<?
session_start();
if($_SESSION['un']==''){	echo "<script>location.replace('index.php')</script>";}
//include "dbcon.php";
//include "class/class.php";

$uid=$_SESSION['uid'];
include "dbcon.php";
include "class/class.php";
$loc=new real_location();
$x=new valid();
if($_POST['submit'])
{
	extract($_POST);
//	print_r($_POST);
	//validations
	/*$req_type_valid		=$x->ischoose($_POST['req_type'],"choose one from Transcation Type! It should not be Empty");
	$req_property_valid	=$x->ischoose($_POST['req_property'],"choose one from property type! It should not be Empty");
	$req_cid_valid		=$x->ischoose($_POST['req_cid'],"choose one from city! It should not be Empty");
	$req_aid_valid		=$x->ischoose($_POST['req_aid'],"Enter Location! It should not be Empty");
	$req_bedroom_valid	=$x->ischoose($_POST['req_bedroom'],"choose one from Minimun bedroom! It should not be Empty");
	$req_budject1_valid	=$x->ischoose($_POST['req_budject1'],"choose one from From  budject! It should not be Empty");
	$req_budject2_valid	=$x->ischoose($_POST['req_budject2'],"choose one TO budject! It should not be Empty");
	$req_place_valid 	=$x->notempty($_POST['req_place'],"Minimum area Should not be Empty");
	$req_time_valid		=$x->ischoose($_POST['req_time'],"Time estimation should not be Empty");
	$req_loan_valid		=$x->validgender($_POST['req_loan']," do u agree or not");
	if($_POST['reg_loan']=="yes")
	{
	$req_loan_amt_valid 	=$x->notempty($_POST['req_loan_amt'],"Loan amount Should not be Empty");
	$req_loan_amt_valid1	=$x->isnumaric($_POST['req_loan_amt'],"Enter only numbers in Loan amount");	
	$req_job_valid		=$x->ischoose($_POST['req_job'],"choose one from Employment Type! It should not be Empty");
	$req_income_valid 	=$x->notempty($_POST['req_income'],"Income Should not be Empty");
	$req_income_valid1		=$x->isnumaric($_POST['req_income'],"Enter only numbers in Income");	
if($req_type_valid == '' && $req_property_valid == '' && $req_cid_valid == '' && $req_aid_valid == '' && $req_bedroom_valid == '' && 	$req_budject1_valid	== '' && $req_budject2_valid == '' && $req_place_valid == '' && $req_time_valid == '' && $req_loan_valid =='' && $req_loan_amt_valid == '' && $req_loan_amt_valid1 == '' && $req_job_valid == '' && $req_income_valid == '' && $req_income_valid1 == '' )
{
$insert=mysql_query("insert into `real-requirement` values(`req_id`, '".$uid."', '$req_type', '$req_property', '$req_cid', '$req_aid', '$req_bedroom', '$req_budject1', '$req_budject2', '$req_place', '$req_time', '$req_loan', '$req_loan_amt', '$req_job', '$req_income',`req_name`,`req_ph1`,`req_ph2`,`req_email`,`req_floder`, now(),'n')" );
echo "<script>location.replace('myaccount.php?act=show')</script>";
}
}
else if($_POST['reg_loan']=="no")
{
if($req_type_valid == '' && $req_property_valid == '' && $req_cid_valid == '' && $req_aid_valid == '' && $req_bedroom_valid == '' && 	$req_budject1_valid	== '' && $req_budject2_valid == '' && $req_place_valid == '' && $req_time_valid == '' && $req_loan_valid =='')
{
$insert=mysql_query("insert into `real-requirement` values(`req_id`, '".$uid."', '$req_type', '$req_property', '$req_cid', '$req_aid', '$req_bedroom', '$req_budject1', '$req_budject2', '$req_place', '$req_time', '$req_loan', '$req_loan_amt', '$req_job', '$req_income',`req_name`,`req_ph1`,`req_ph2`,`req_email`,`req_floder`, now(),'n')" );
echo "<script>location.replace('myaccount.php?act=show')</script>";
}
}*/
$insert=mysql_query("insert into `real-requirement` values(`req_id`, '".$uid."', '$req_type', '$req_property', '$req_cid', '$req_aid', '$req_bedroom', '$req_budject1', '$req_budject2', '$req_place', '$req_time', '$req_loan', '$req_loan_amt', '$req_job', '$req_income',`req_name`,`req_ph1`,`req_ph2`,`req_email`,`req_floder`, now(),'n')" );
echo "<script>location.replace('myaccount.php?act=show')</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$title?></title>
</head>
<style type="text/css">
<!--
span.style11{
color: red;
font-size: 11px;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-weight: normal;
}

-->
</style>

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
function reload(form)
{
var val=form.cid.options[form.cid.options.selectedIndex].value;
self.location='post.php?cid=' + val ;
}

/*function abc()
{
	//alert(document.getElementById('req_budject1').value);
	if(document.getElementById('req_budject1').value=='5000')
	{
		document.getElementById('req_budject2').disabled=true;
	}
}*/
</script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/regjs.js"></script>
<script type="text/javascript" src="js/ruppees1.js"></script>



<body onLoad="fillCategory();abc();abc1();abc2();">
<div align="center">
<div style="width:980px"  align="center" class="tabcolor">
<div><? include "header.php"?></div>

<?
$x=new real_property();
$y=new real_location();
?>
<p>&nbsp;</p>
<div style="width:970px" align="center">
	<form name="drop_list" method="post" onSubmit="return validateForm2(this)" enctype="multipart/form-data">
		<div style="width:750px" class="innertab" align="left">
				<div align="left" class="style3"> Post your Requirement</div>
				<div class="linebreak">&nbsp;</div>
			<div class="tabcolor">
				<div class="trpad style8" style="width:30%; float:left">Transaction Type</div>
			  <div>: 
				<select name="req_type" id="req_type" onChange="Selectlocation();" style="width:150px">
				<? if($_POST['req_type']==''){?>
				<option value="">select</option>
				<? }else{
				        if($_POST['req_type']=='1')
						{ echo "<script language=javascript>Selectlocation();</script>";
								
						?>
						<option value="<?=$_POST['req_type']?>" selected="selected">rent</option>
						<? }
					    else { ?>
				<option value="<?=$_POST['req_type']?>" selected="selected">buy</option>
				<?
				              }
				 }?>
				
				</select>
				<span class="style11">
               <?=$req_type_valid?>
             </span></div>
			</div>
	
				<div class="linebreak">&nbsp;</div>
			<div class="tabcolor">
				<div  style="float:left;width:30%" class="trpad style8">Property Type </div>
				<div>: <select name="req_property" id="req_property" onChange="abc();" style="width:150px;" >
				
				
				<option value="">select</option>
				<?
				//$i=1;
				for($i=1;$i<3;$i++){
				$xx=$x->property($i);?>
				<optgroup label="<?=$xx['pname']?>" style="background:#EBEBEB"></optgroup>
				<? 
				$j=$x->property1($i);
				while($xxx=mysql_fetch_array($j)){
				   if($_POST['req_property']==$xxx['pid']){
				?>
				<option value="<?=$xxx['pid']?>" id="<?=$xxx['ptype']?>" selected="selected"><?=$xxx['pname']?></option>
				<? }
				else
				{ ?>
				<option value="<?=$xxx['pid']?>" id="<?=$xxx['ptype']?>"><?=$xxx['pname']?></option>
				
				<? } }}?>
				</select>
				<span class="style11">
               <?=$req_property_valid?>
             </span></div>
			</div>
	
				<div class="linebreak">&nbsp;</div>
			<div class="tabcolor">
				<div class="trpad style8" style="float:left;width:30%">City</div>
			  <div>: <select name="req_cid" style="width:160px">
         <?  if($_POST['req_cid']==''){
		 ?>
						<option value="">Select City</option>
		<? } else { ?>
		
		<option value="<?= $_POST['req_cid'] ?>" selected="selected"><?= $_POST['req_cid'] ?></option>
		
		<? } ?>	
						<? $loc1=$loc->location122();
						while($loc2=mysql_fetch_array($loc1)){
						
						
						?>
						<option value="<?=$loc2['city_name']?>"><?=$loc2['city_name']?></option>
						<? }?>
					</select>
				<span class="style11">
               <?=$req_cid_valid?>
             </span></div>
			</div>

				<div class="linebreak">&nbsp;</div>
			<div class="tabcolor">
				<div class="trpad style8" style="float:left;width:30%">Locality</div>
				<div>:<!--<select name="aid"  style="width:150px">
				<option value="">select</option>
				<?
				//$select=mysql_query("select * from `real-area` where cid=1");
				//while($row=mysql_fetch_array($select)){?>
				<option value="<?=$row['aid']?>"><?=$row['name']?></option>
				<? //}?>
				</select>-->
				<input type="text" name="req_aid" value="<?= $_POST['req_aid'] ?>" />
				<span class="style11">
               <?=$req_aid_valid?>
             </span></div>
			</div>
	
				<div class="linebreak">&nbsp;</div>
			<div class="tabcolor">
				<div style="float:left;width:30%" class="trpad style8">Minimum Bed room </div>
				<div>: <select name="req_bedroom" id="req_bedroom"  style="width:150px">
				 <?  if($_POST['req_bedroom']==''){
		 ?>
						<option value="">Select</option>
		<? } else { ?>
		
		<option value="<?= $_POST['req_bedroom'] ?>" selected="selected">Min <?= $_POST['req_bedroom'] ?> Bedroom</option>
		
		<? } ?>
				<option value="1">Min 1 Bedroom</option>
				<option value="2">Min 2 Bedroom</option>
				<option value="3">Min 3 Bedroom</option>
				<option value="4">Min 4 Bedroom</option>
				<option value="5">Min 5 Bedroom</option>
				</select>
				<span class="style11">
               <?=$req_bedroom_valid?>
			                </span></div>
			</div>
		
	
				<div class="linebreak">&nbsp;</div>
			<div class="tabcolor">
				<div style="float:left;width:30%" class="trpad style8">Budject</div>
				<div>: From &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; To<br /></div>
				<div style="padding-left:32.5%">
				
				<SELECT  name="req_budject1" id="req_budject1" onChange="Selectlocation1();" >
				<?  if($_POST['req_budject1']==''){
		 ?>
						<option value="">select</option>
		<? } else { ?>
		
		<option value="<?=$_POST['req_budject1'] ?>" selected="selected"><?=$_POST['req_budject1'] ?></option>
		
		<? /* echo "<script>Selectlocation();</script>";*/
		
		} ?>	<option value="4900"> >5000</option>
		
		
		
				</SELECT>
				
				<SELECT id="req_budject2"  name="req_budject2" >
				
				<?  if($_POST['req_budject2']==0){
		 ?>
						<option value="">select</option>
		<? } else { ?>
		
		<option value="<?= $_POST['req_budject2'] ?>" selected="selected"><?= $_POST['req_budject2'] ?></option>
		
		<? } ?>
				</SELECT>&nbsp;<span class="style11">
               <?=$req_budject1_valid?> <?=$req_budject1_valid?>
             </span></div>
			</div>
				
				<div class="linebreak">&nbsp;</div>
			<div class="tabcolor">
				<div style="float:left;width:30%" class="trpad style8">Minimum Area </div>
				<div>: <input type="text" name="req_place" value="<?= $_POST['req_place'] ?>" /><span class="style11">
               <?=$req_place_valid?>
             </span></div>
			</div>
				
				<div class="linebreak">&nbsp;</div>
			<div class="tabcolor">
				<div style="float:left;width:30%" class="trpad style8"> Please select estimated time of purchase </div>
				<div  style="height:40px;">: <select name="req_time"  style="width:150px">
				
				 <?  if($_POST['req_time']==''){
		 ?>
						<option value="">Select</option>
		<? } else { ?>
		
		<option value="<?= $_POST['req_time'] ?>" selected="selected"><?= $_POST['req_time'] ?></option>
		
		<? } ?>	<option value="with in 3 months">with in 3 months</option>
				<option value="3 to 6 months">3 to 6 months</option>
				<option value="6 to 9 months">6 to 9 months</option>
				<option value="More than 9 months">More than 9 months</option>
				</select><span class="style11">
               <?=$req_time_valid?>
             </span>
				</div>
			</div>
	
				<div class="linebreak">&nbsp;</div>
			<div class="tabcolor">
				<div style="float:left;width:30%" class="trpad style8">Are you interested to availing home loan?</div>
				<div style="height:30px; padding-top:10px">: 
				<? if($_POST['req_loan']=='yes'){?>
				<label for="lDIV1"><input id="lDIV1" type="radio" name='req_loan' value='yes' checked="checked" onClick="Show('DIV1')"> 
				yes</label>
				<label for="lDIV2"><input id="lDIV2" type="radio" name='req_loan' value='no' onClick="Show1('DIV1')">
				No</label>
				<?
				
				}else if($_POST['req_loan']=='no'){?>
				<label for="lDIV1"><input id="lDIV1" type="radio" name='req_loan' value='yes'  onClick="Show('DIV1')"> 
				yes</label>
				<label for="lDIV2"><input id="lDIV2" type="radio" name='req_loan' value='no' checked="checked" onClick="Show1('DIV1')">
				No</label>
				<? }else{?>
				<label for="lDIV1"><input id="lDIV1" type="radio" name='req_loan' value='yes'  onClick="Show('DIV1')"> 
				yes</label>
				<label for="lDIV2"><input id="lDIV2" type="radio" name='req_loan' value='no' onClick="Show1('DIV1')">
				No</label>
				<? }?>
			<span class="style11">
               <?=$req_loan_valid?>
             </span></div>


				<div class="linebreak">&nbsp;</div>
	<div class="tabcolor">
		<div id='Content' style="display:block">
			<div id='DIV1' style="display:none">
				<div width="100%">
					<div class="tabcolor">
						<div style="float:left;width:30%" class="trpad style8" >Loan Amount(Rs)</div>
						<div>: <input name="req_loan_amt" type="text" value="<?= $_POST['req_loan_amt'] ?>"><span class="style11">
               <?=$req_loan_amt_valid?>  <?=$req_loan_amt_valid1?>
             </span></div>
						
					</div>
						<!--<div class="linebreak">&nbsp;</div>
					<div class="tabcolor">
						<div style="float:left;width:50%" class="trpad style8">Loan Amount(words)</div>
						<div>: <input name="req_loan_amt1" type="text"></div>
					</div>-->
						<div class="linebreak">&nbsp;</div>
					<div class="tabcolor">
						<div style="float:left;width:30%" class="trpad style8">Employment</div>
						<div>: <select name="req_job">
						
						<?  if($_POST['req_job']==''){
		 ?>
						<option value="">Select</option>
		<? } else { ?>
		
		<option value="<?= $_POST['req_job'] ?>" selected="selected"><?= $_POST['req_job'] ?></option>
		
		<? } ?>	
						
						<option value="Salaried">Salaried</option>
						<option value="Self Employed">Self Employed</option>
						<option value="Retired">Retired</option>
						<option value="Housewife">Housewife</option>
						<option value="Not Employed">Not Employed</option>
						</select><span class="style11">
               <?=$req_job_valid?>
             </span>
						</div>
					</div>
						<div class="linebreak">&nbsp;</div>
					<div class="tabcolor">
						<div style="float:left;width:30%" class="trpad style8">Monthly Income</div>
						<div>: <input name="req_income" type="text" value="<?= $_POST['req_income'] ?>"><span class="style11">
               <?=$req_income_valid?>
			   <?=$req_income_valid1?>
             </span></div>
					</div>
				</div>
			</div>
		</div>
	</div>
						<div class="linebreak">&nbsp;</div>
					<div class="tabcolor">
						<div align="center"><input type="submit" name="submit" value="continue" /> </div>
					</div>
						<!--<div class="linebreak tabcolor"></div>-->
		</div>	</div>
	</form>
	



<div class="tabcolor"><p>&nbsp;</p></div>
</div>
<div style="width:100%" >
  <? include "footer.php"?>
</div>
</div>


</body>
</html>

