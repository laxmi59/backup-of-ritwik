<?
session_start();
$uid=$_SESSION['uid'];
	include "db/dbcon.php";
	if($_POST['submit'])
	{
		extract($_POST);
		print_r($_POST);
		$insert=mysql_query("insert into `real-requirement` values(`req_id`, '".$uid."', '$req_type', '$req_property', '$cid', '$aid', '$req_bedroom', '$req_budject1', '$req_budject2', '$req_place', '$req_time', '$req_loan', '$req_loan_amt', '$req_job', '$req_income', '$req_name', '$req_ph1', '$req_ph2', '$req_email', '$req_floder', now(),'r')" );
		echo "<script>location.replace('myaccount.php')</script>";
	}
?>
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

function abc()
{
	//alert(document.getElementById('req_budject1').value);
	if(document.getElementById('req_budject1').value=='5000')
	{
		document.getElementById('req_budject2').disabled=true;
	}
}
</script>

<script type="text/javascript" src="js/ruppees.js"></script>
<body onLoad="fillCategory()">
<table width="80%" align="center" style="border:1px solid;">

<tr>
	<td><? include "header.php"?></td>
</tr>
<tr>
	<td>
<form name="drop_list" method="post">
<table width="70%" align="center" style="border:1px solid;">
  <tr>
    <td colspan="3" bgcolor="#EBEBEB">Step 1: Post your Requirement</td>
  </tr>
   <tr>
    <td>Transaction Type</td>
    <td>:</td>
    <td>
		<input type="radio" onClick="return buy();" name="req_type" value="Buy" />
		Buy
		<input type="radio" onClick="return rent();" name="req_type" value="Rent" />
		Rent/Lease
	</td>
  </tr>
  <tr>
    <td>Property Type </td>
    <td>:</td>
    <td><select name="req_property">
	<optgroup label="Residential Property" style="background:#EBEBEB"></optgroup>
	<option value="Apartment">Apartment</option>
	<option value="Plot/Land">Plot/Land</option>
	<option value="Builder Floor">Builder Floor</option>
	<option value="Bungalow/Villa">Bungalow/Villa</option>
	<option value="Farm House">Farm House</option>
	<option value="Service/Studio Apartment">Service/Studio Apartment</option>
	<option value="Other Residential">Other Residential</option>
	<optgroup label="Commercial Property" style="background:#EBEBEB"></optgroup>
	<option value="Land">Land</option>
	<option value="Office">Office</option>
	<option value="Business Centre">Business Centre</option>
	<option value="Warehouse/Godown">Warehouse/Godown</option>
	<option value="Industrial setup">Industrial setup</option>
	<option value="Shop">Shop</option>
	<option value="Other Commercial">Other Commercial</option>
					
    </select>
</td>
  </tr>
  <tr>
    <td>City</td>
    <td>&nbsp;</td>
    <td><?
				
                @$cat=$_GET['cid']; // Use this line or below line if register_global is off
				if($_GET['id']==''){
					//echo "ss";
                     $quer2=mysql_query("SELECT * FROM `real-city` "); 
				}else{
					//$c=mysql_fetch_array(mysql_query("select * from `real-city` where cid=".$_GET['id'].""));
					$quer2=mysql_query("select * from `real-city` where cid=".$_GET['id']."");
					//echo "select * from countries where cid=".$c['cid']."";
				}
                if(isset($cat) and strlen($cat) > 0){
                   	$quer=mysql_query("SELECT * FROM `real-area` where cid=$cat "); 
                }else{
				 	$quer=mysql_query("SELECT * FROM `real-area` where sid=".$c['aid'].""); 
				} 
                echo "<select name='cid' onchange=\"reload(this.form)\" style='width:147px;'><option>select</option>";
				while($noticia2 = mysql_fetch_array($quer2)){ 
				if($noticia2['cid']==@$cat){
					echo "<option selected value='$noticia2[cid]'>$noticia2[city_name]</option>"."<BR>";
				}else{
					echo  "<option value='$noticia2[cid]'>$noticia2[city_name]</option>";}
                }
					echo "</select>";?>
	</td>
  </tr>
  <tr>
    <td>Locality</td>
    <td>&nbsp;</td>
    <td>
		<?
					echo "<select name='aid' style='width:147px;' ><option>select</option>";
                    while($noticia = mysql_fetch_array($quer)) { 
                        echo  "<option value='$noticia[aid]'>$noticia[name]</option>";
                    }
					echo "</select>";
					echo "</form>";?>
	</td>
  </tr>
  
  <tr>
    <td>Minimum Bed room </td>
    <td>&nbsp;</td>
    <td><select name="req_bedroom">
      <option value="1">Min 1 Bedroom</option>
      <option value="2">Min 2 Bedroom</option>
      <option value="3">Min 3 Bedroom</option>
      <option value="4">Min 4 Bedroom</option>
      <option value="5">Min 5 Bedroom</option>
    </select></td>
  </tr>
 
    <tr>
	<td>Budject</td>
    <td>&nbsp;</td>
    <td>From &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; To<br />
	<SELECT  name="req_budject1" id="req_budject1" onChange="Selectlocation();" >
      <Option value="">select</option>
	  <option value="4900">>5000</option>
    </SELECT>
	<SELECT id="req_budject2"  NAME="req_budject2" >
      <Option value="">select</option>
    </SELECT>&nbsp;
	<input name="th" type="text" id="th" value="(In thousands)" size="10" style="border:none;" readonly="" />
	<SELECT  name="req_budject3" id="req_budject3" onChange="Selectlocation();" >
      <Option value="">select</option>
	   <option value="9">>10</option>
    </SELECT>
	<SELECT id="req_budject4"  NAME="req_budject4" >
      <Option value="">select</option>
    </SELECT>&nbsp;
	<input name="lc" type="text" id="lc" value="(In lacks)" size="10" style="border:none;" readonly="" />
	
      </td>
  </tr>
  <tr>
    <td>Minimum Area </td>
    <td>&nbsp;</td>
    <td><input type="text" name="req_place" /></td>
  </tr>
  <tr>
    <td>Please select estimated time of purchase </td>
    <td>&nbsp;</td>
    <td><select name="req_time">
      <option value="with in 3 months">with in 3 months</option>
      <option value="3 to 6 months">3 to 6 months</option>
      <option value="6 to 9 months">6 to 9 months</option>
      <option value="More than 9 months">More than 9 months</option>
    </select></td>
  </tr>
  <tr>
    <td>Are you interested to availing home loan?</td>
    <td>&nbsp;</td>
    <td><label for="lDIV1"><input id="lDIV1" type="radio" name='req_loan' value='yes' onClick="Show('DIV1')"> 
    yes</label>
		<label for="lDIV2"><input id="lDIV2" type="radio" name='req_loan' value='no' onClick="Show1('DIV1')">
		No</label>
	</td>
</tr>
	<tr><td colspan="3">
  
<div id='Content' style="display:block">
<div id='DIV1' style="display:none">
<table>
  <tr>
    <td>Loan Amount(Rs)</td>
    <td>:</td>
    <td style="padding-left:7px;"><input name="req_loan_amt" type="text"></td>
  </tr>
  <tr>
    <td>Loan Amount(words)</td>
    <td>:</td>
    <td style="padding-left:7px;"><input name="req_loan_amt1" type="text"></td>
  </tr>
  <tr>
    <td>Employment</td>
    <td>:</td>
    <td style="padding-left:7px;">
	<select name="req_job">
		<option value="Salaried">Salaried</option>
		<option value="Self Employed">Self Employed</option>
		<option value="Retired">Retired</option>
		<option value="Housewife">Housewife</option>
		<option value="Not Employed">Not Employed</option>
	</select></td>
  </tr>
  <tr>
    <td>Monthly Income</td>
    <td>:</td>
    <td style="padding-left:7px;"><input name="req_income" type="text"></td>
  </tr>
  </table>
  </div>
 </div>
 </td></tr>
  <tr>
    <td colspan="3"><strong>Responses for the above Requirement should be sent to :</strong></td>
  </tr>
  <tr>
    <td>Contact Name </td>
    <td>&nbsp;</td>
    <td><input name="req_name" type="text"></td>
  </tr>
  <tr>
    <td>Mobile Numbers </td>
    <td>&nbsp;</td>
    <td><input name="req_ph1" type="text"></td>
  </tr>
  <tr>
    <td>Land line Numbers </td>
    <td>&nbsp;</td>
    <td><input name="req_ph2" type="text"></td>
  </tr>
  <tr>
    <td>Email</td>
    <td>&nbsp;</td>
    <td><input name="req_email" type="text"></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#EBEBEB">Step 2: Save responses in a folder</td>
  </tr>
  <tr>
    <td>Properties matching your above requirements will saved in a folder on makaan.com. <br>
    Please select a folder name (Max. 15 chars)   *</td>
    <td>&nbsp;</td>
    <td><input name="req_floder" type="text"></td>
  </tr>
  <tr>
  	<td colspan="3" align="center"><input type="submit" name="submit" value="continue" /> 
  </tr>
</table>
</form>
</td></tr></table>
</body>


