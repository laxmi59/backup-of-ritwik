<?
session_start();
//include "dbcon.php";
//include "class/class.php";

$uid=$_SESSION['uid'];
include "dbcon.php";
include "class/class.php";
$loc=new real_location();
if($_POST['submit'])
{
	extract($_POST);
	//print_r($_POST);
	/*validations
	$req_type_valid		=$x->ischoose($_POST['req_type'],"choose one from Transcation Type! It should not be Empty");
	$req_property_valid	=$x->ischoose($_POST['req_property'],"choose one from property type! It should not be Empty");
	$req_cid_valid		=$x->ischoose($_POST['req_cid'],"choose one from city! It should not be Empty");
	$req_aid_valid		=$x->ischoose($_POST['req_aid'],"choose one freqom Location! It should not be Empty");
	$req_bedroom_valid	=$x->ischoose($_POST['req_bedroom'],"choose one freqom Location! It should not be Empty");
	$req_budject1_valid	=$x->ischoose($_POST['req_budject1'],"choose one freqom Location! It should not be Empty");
	$req_place_valid 	=$x->notempty($_POST['req_place'],"Usereq Name Should not be Empty");
	$req_time_valid		=$x->ischoose($_POST['req_time'],"choose one freqom Location! It should not be Empty");
	$req_loan_valid		=$x->validgendereq($_POST['req_loan']," do u agree or not");
	validations*/
	$insert=mysql_query("insert into `real-requirement` values(`req_id`, '".$uid."', '$req_type', '$req_property', '$cid', '$aid', '$req_bedroom', '$req_budject1', '$req_budject2', '$req_place', '$req_time', '$req_loan', '$req_loan_amt', '$req_job', '$req_income', now(),'n')" );
	echo "<script>location.replace('myaccount.php?act=show')</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$title?></title>
</head>

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
<body onLoad="fillCategory()">
<table width="980" align="center" class="tabcolor" cellpadding="0" cellspacing="0">
<tr>
	<td colspan="3"><? include "header.php"?></td>
</tr>
<?
$x=new real_property();
$y=new real_location();
?>
<tr><td colspan="3"><p>&nbsp;</p></td></tr>
<tr>
	<td width="3%">&nbsp;</td>
	<td width="57%">
	<form name="drop_list" method="post" onSubmit="return validateForm2(this)">
	<table width="73%" height="342" align="center" cellpadding="0" cellspacing="0" class="innertab">
	<tr>
		<td colspan="3" class="style3"> Post your Requirement</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="trpad style8" width="50%">Transaction Type</td>
		<td width="5%">:</td>
		<td width="45%">
		<select name="req_type" id="req_type" onChange="Selectlocation();" style="width:150px">
		<option value="">select</option>
		<!--<option id="abc2" value="Rent" onClick="return rent();">Rent</option>
		<option value="Buy" onClick="return buy();">Buy</option>-->
		</select>
		</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="trpad style8">Property Type </td>
		<td>:</td>
		<td>
		<select name="req_property" id="req_property" onChange="abc();" style="width:150px;" >
		<option value="">select</option>
		<?
		//$i=1;
		for($i=1;$i<3;$i++){
		$xx=$x->property($i);?>
		<optgroup label="<?=$xx['pname']?>" style="background:#EBEBEB"></optgroup>
		<? 
		$j=$x->property1($i);
		while($xxx=mysql_fetch_array($j)){?>
		<option value="<?=$xxx['pid']?>" id="<?=$xxx['ptype']?>"><?=$xxx['pname']?></option>
		<? }}?>
		</select>
		</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="trpad style8">City</td>
		<td>:</td>
		<td>
		<select name="city" style="width:160px">
						<option>Select City</option>
						<? $loc1=$loc->location122();
						while($loc2=mysql_fetch_array($loc1)){?>
						<option value="<?=$loc2['city_name']?>"><?=$loc2['city_name']?></option>
						<? }?>
					</select>
		</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="trpad style8">Locality</td>
		<td>:</td>
		<td>
		<!--<select name="aid"  style="width:150px">
		<option value="">select</option>
		<?
		//$select=mysql_query("select * from `real-area` where cid=1");
		//while($row=mysql_fetch_array($select)){?>
		<option value="<?=$row['aid']?>"><?=$row['name']?></option>
		<? //}?>
		</select>-->
		<input type="text" name="aid" />
		</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="trpad style8">Minimum Bed room </td>
		<td>:</td>
		<td><select name="req_bedroom" id="req_bedroom"  style="width:150px">
		<option value="">select</option>
		<option value="1">Min 1 Bedroom</option>
		<option value="2">Min 2 Bedroom</option>
		<option value="3">Min 3 Bedroom</option>
		<option value="4">Min 4 Bedroom</option>
		<option value="5">Min 5 Bedroom</option>
		</select>
		</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="trpad style8">Budject</td>
		<td>:</td>
		<td>From &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; To<br />
		<SELECT  name="req_budject1" id="req_budject1" onChange="Selectlocation1();" >
		<Option value="">select</option>
		<option value="4900">>5000</option>
		</SELECT>
		<SELECT id="req_budject2"  NAME="req_budject2" >
		<Option value="">select</option>
		</SELECT>&nbsp;
		</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="trpad style8">Minimum Area </td>
		<td>:</td>
		<td><input type="text" name="req_place" /></td>
		</tr>
		<tr class="linebreak"><td colspan="3"></td></tr>
		<tr class="tabcolor">
		<td class="trpad style8">Please select estimated time of purchase </td>
		<td>:</td>
		<td><select name="req_time"  style="width:150px">
		<option value="">select</option>
		<option value="with in 3 months">with in 3 months</option>
		<option value="3 to 6 months">3 to 6 months</option>
		<option value="6 to 9 months">6 to 9 months</option>
		<option value="More than 9 months">More than 9 months</option>
		</select></td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="trpad style8">Are you interested to availing home loan?</td>
		<td>:</td>
		<td><label for="lDIV1"><input id="lDIV1" type="radio" name='req_loan' value='yes' onClick="Show('DIV1')"> 
		yes</label>
		<label for="lDIV2"><input id="lDIV2" type="radio" name='req_loan' value='no' onClick="Show1('DIV1')">
		No</label>
		</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td colspan="3">
		<div id='Content' style="display:block">
		<div id='DIV1' style="display:none">
		<table width="100%">
		<tr class="tabcolor">
			<td width="50%" class="trpad style8" >Loan Amount(Rs)</td>
			<td width="5%" >:</td>
			<td width="45%"><input name="req_loan_amt" type="text"></td>
		</tr>
		<tr class="linebreak"><td colspan="3"></td></tr>
		<tr class="tabcolor">
			<td class="trpad style8">Loan Amount(words)</td>
			<td>:</td>
			<td><input name="req_loan_amt1" type="text"></td>
		</tr>
		<tr class="linebreak"><td colspan="3"></td></tr>
		<tr class="tabcolor">
			<td class="trpad style8">Employment</td>
			<td>:</td>
			<td>
			<select name="req_job">
			<option value="Salaried">Salaried</option>
			<option value="Self Employed">Self Employed</option>
			<option value="Retired">Retired</option>
			<option value="Housewife">Housewife</option>
			<option value="Not Employed">Not Employed</option>
			</select></td>
		</tr>
		<tr class="linebreak"><td colspan="3"></td></tr>
		<tr class="tabcolor">
			<td class="trpad style8">Monthly Income</td>
			<td>:</td>
			<td><input name="req_income" type="text"></td>
		</tr>
		</table>
		</div>
		</div>
		</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td colspan="3" align="center"><input type="submit" name="submit" value="continue" /> </td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	</table>
	</form>
	</td>
<td width="40%">&nbsp;</td>
</tr>
<tr><td colspan="3"><p>&nbsp;</p></td></tr>
<tr><td colspan="3"><? include "footer.php"?></td></tr>
</table>
</body>
</html>

