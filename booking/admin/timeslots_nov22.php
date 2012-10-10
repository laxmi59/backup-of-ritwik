<? session_start();

////////////////   		includes			/////////////////////////////////////////
include "../includes/config.php";
include "../includes/filenames.php";
include "../includes/functions.php";
include "../includes/classobjects.php";
////////////////		End of Includes		/////////////////////////////////////////
if($_SESSION['admin_id']==''){ echo "<script>location.replace('".ADM_HOME."')</script>";}
require_once("../includes/pagination.php");
$q_limit = 10;
$errMsg = 0;
if( isset($_GET['start']) )
{
	$start = $_GET['start'];
}
else
{
	$start = 0;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=WEBSITE_NAME?></title>
<link href="../style.css" rel="stylesheet" type="text/css" />
<table class="ds_box" cellpadding="0" cellspacing="0" id="ds_conclass" style="display: none;">
<tr><td id="ds_calclass"></td></tr></table>
<script type="text/javascript" src="../js/cal.js"></script>
<link href="../css/cal.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
var xmlHttp
function GetSiteFromCompany(str){ 
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null) {
		alert ("Browser does not support HTTP Request")
 		return
 	}
	document.getElementById('checked').innerHTML = "Checking...";
	var field="get_site";
	var url="ajax_site.php"
	url=url+"?q="+str
	url=url+"&act="+field
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=stateChanged 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}
function stateChanged() { 
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete") { 
 		document.getElementById("checked").innerHTML=xmlHttp.responseText; 
	} 
}
function getDates(str){ 
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null) {
		alert ("Browser does not support HTTP Request")
 		return
 	}
	document.getElementById('getDates').innerHTML = "Checking...";
	var field="get_Date";
	var url="ajax_site.php"
	url=url+"?q="+str
	url=url+"&act="+field
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=stateChangedDate
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}
function stateChangedDate() { 
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete") { 
 		document.getElementById("getDates").innerHTML=xmlHttp.responseText; 
	} 
}




//main code starts//
function GetXmlHttpObject(){
	var xmlHttp=null;
	try {
		// Firefox, Opera 8.0+, Safari
 		xmlHttp=new XMLHttpRequest();
 	}catch (e) {
 		//Internet Explorer
 		try{
  			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  		} catch (e)  {
  			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  		}
 	}
	return xmlHttp;
}
</script>
<script type="text/javascript" src="../js/reg.js"></script>
<script type="text/javascript">

function ByCompany(gid){
	window.location='timeslots.php?act=show&cid='+gid;
}
function BySite(gid){
	window.location='timeslots.php?act=show&siteid='+gid;
}
function ByService(sid){
//alert(sid);
	window.location='timeslots.php?act=show&sid='+sid;
}
function ByService1(dt,sid){
//alert(sid);
	window.location='timeslots.php?act=show&sid='+sid+'&dt='+dt;
}
</script>
</head>

<body>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="mainadmintab">
<tr>
	<td colspan="3"><? include 'header.php'?></td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
	<td width="5%">&nbsp;</td>
	<td width="90%" valign="top" height="450">
	<? if($_GET['act']=='show'){?>
	<div align="center"><a href="timeslots.php?act=new" class="b">Add New Appointment </a></div>
	<div class="linebreak"></div>
	
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="txtstyle1">
          <tr>
            <td class="txtstyle1big">&nbsp;</td>
            <td>&nbsp;</td>
            <td class="txtstyle1big">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input type="button" name="print" value="Print" onclick="javascript:window.location='../includes/csv.php?act=print_slots&sid=<?php echo $_GET['sid']?>&cid=<?php echo $_GET['cid']?>&dt=<?php echo $_GET['dt']?>&siteid=<?php echo $_GET['siteid']?>'" /></td>
          </tr>
          <tr>
		   <td width="15%" class="txtstyle1big">Sort by Site:</td>
            <td width="25%"><select name="siteid" onchange="return BySite(this.value)">
                <option value="">select</option>
                <?	$sel_site=mysql_query("select * from cal_site");
			while($site_fet=mysql_fetch_array($sel_site)){?>
                <option value="<?=$site_fet['id']?>" <? if($_GET['siteid']==$site_fet['id']){?> selected="selected"<? }?>><?=$site_fet['name']?></option>
                <? }?>
              </select>            </td>
            <td width="15%" class="txtstyle1big">Sort by Company:</td>
            <td width="25%"><select name="clt" onchange="return ByCompany(this.value)">
                <option value="">select</option>
                <?	$sel_user=mysql_query("select * from cal_company");
			while($sel_fet=mysql_fetch_array($sel_user)){?>
                <option value="<?=$sel_fet['id']?>" <? if($_GET['cid']==$sel_fet['id']){?> selected="selected"<? }?>><?=$sel_fet['companyname']?></option>
                <? }?>
              </select>            </td>
            <td width="22%">Sort by Service and date:</td>
            <td width="17%"><select name="sts" onchange="return ByService(this.value)">
              <option value="">select</option>
              <?	$sel_cat=mysql_query("select * from cal_services");
			while($cat_fet=mysql_fetch_array($sel_cat)){?>
              <option value="<?=$cat_fet['id']?>" <?php if($_GET['sid']==$cat_fet['id']){?> selected="selected"<? }?>>
                <?=$cat_fet['name']?>
              </option>
              <? }?>
            </select></td>
			<td width="15%">
				
			<select name="dt" onchange="return ByService1(this.value,<?=$_GET['sid']?>)">
			<option>select</option>
			<? if($_GET['sid']<>''){
			$qur=mysql_query("select distinct date from cal_slots where service='$_GET[sid]' order by date");
			while($qur_fet=mysql_fetch_array($qur)){?>
			<option value="<? echo $qur_fet['date'];?>" <? if($qur_fet['date']==$_GET['dt']){?> selected="selected"<? }?>><? echo $qur_fet['date'];?></option>
			
			<? }}?>
			  </select>			</td>
          </tr>
          <tr>
            <td class="txtstyle1big">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
			<td>&nbsp;</td>
          </tr>
          <tr>
            <td class="txtstyle1big">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
			<td>&nbsp;</td>
          </tr>
        </table>
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
		<!--<tr><td colspan="3" align="right"><input type="button" name="export" value="Export" onclick="ff1('companies');" /></td></tr>-->
		<tr>
			<td width="5%" class="txtstyle">Sno</td>
			<td width="15%" class="txtstyle">Company </td>
			<td width="8%" class="txtstyle">Site </td>
			<td width="9%" class="txtstyle">Address</td>
			<td width="8%" class="txtstyle">Service </td>
			<td width="8%" class="txtstyle">available</td>
			<td width="12%" class="txtstyle">trading hours </td>
			<td width="8%" class="txtstyle">Start time</td>
			<td width="8%" class="txtstyle">Date</td>
			<td width="14%" class="txtstyle">Session Held </td>
			<td width="5%" class="txtstyle">Action</td>
		</tr>
		<tr><td colspan="12">&nbsp;</td></tr>
		<? 
		$query="select * from cal_slots ";
		if($_GET['cid']) $query .=" where company='$_GET[cid]' ";
		if($_GET['siteid']) $query .=" where site='$_GET[siteid]' ";
		if($_GET['sid']) $query .=" where service='$_GET[sid]' ";
		if($_GET['dt']) $query .=" and date='$_GET[dt]' ";
		$ss=mysql_num_rows(mysql_query($query));
		$query .=" order by sloot_time asc limit $start,$q_limit";
		//echo $query;
		$ss_limit=mysql_query($query);
		if($ss==''){?>
		<tr>
		  <td colspan="12" align="center" class="errstyle">No Appointments Found</td>
		</tr>
		<? }else{
		for($i=1;$sss=mysql_fetch_array($ss_limit);$i++){
		$com=mysql_fetch_array(mysql_query("select * from cal_company where id=$sss[company]"));
		$sit=mysql_fetch_array(mysql_query("select * from cal_site where id=$sss[site]"));
		$ser=mysql_fetch_array(mysql_query("select * from cal_services where id=$sss[service]"));
		?>
		<tr>
			<td class="txtstyle1"><?=$i?></td>
			<td class="txtstyle1"><?=$com['companyname']?></td>
			<td class="txtstyle1"><?=$sit['name']?></td>
			<td class="txtstyle1"><?=$sss['address']?></td>
			<td class="txtstyle1"><?=$ser['name']?></td>
			<td class="txtstyle1"><?=$sss['available']?></td>
			<td class="txtstyle1"><?=$sss['trading']?></td>
			<td class="txtstyle1"><?=date("h:i",strtotime($sss['start_time']))." ".$sss['merid']?></td>
			<td class="txtstyle1"><?=date('d/m/y',strtotime($sss['date']))?></td>
			<td class="txtstyle1"><?=$sss['place']?></td>
			<td><a href="../<?=ADMIN_DATA?>?act=slot_delete&id=<?=$sss['id']?>" class="b"><img src="../images/delete.png" border="0" title="Delete" alt="Delete" /></a></td>
		</tr>
		<tr><td class="linebreak"></td></tr>
		<? }?>
		<tr><td colspan="14" align="center" class="errstyle"><? paginate($start,$q_limit,$ss,"timeslots.php?act=show&","");?></td></tr>
		<? }?>
	  </table>
	<? }?>
	<? if($_GET['act']=='new'){?>
	<form method="post" action="../<?=ADMIN_DATA?>?act=add_new_slot&id=<?=$_GET['id']?>">
	<!--<form method="post" onsubmit="return create_state(this)">-->
	<div align="center" class="txtstylebig">Add New Appointment </div>
	<div class="linebreak">
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	</div>
	<table width="60%" align="center">
		<tr>
			<td class="txtstyle">Select Company </td>
			<td>:</td>
			<td>
			<!--<select name="company" onchange="GetSiteFromCompany(this.value)">
			<option selected="selected">Select Company</option>
			<option value="1">Normal</option>
			<option value="2">Bank</option>
			</select>-->
			<select name="company" onchange="GetSiteFromCompany(this.value)">
			<option selected="selected">Select Company</option>
			<?
				$service_query=mysql_query("select * from cal_company");
				while($service_fet=mysql_fetch_array($service_query)){
			?>
			<option value="<?=$service_fet[id]?>"><?=$service_fet[companyname]?></option>
			<? }?>
			</select>
			</td>
		</tr>
		<tr>
			<td class="txtstyle">Select Site </td>
			<td>:</td>
			<td>
			<span id="checked">
			<select name="site" >
				<option selected="selected">Select Site</option>
			</select>
			</span>
			</td>
		</tr>
		<tr>
			<td class="txtstyle">Address</td>
			<td>:</td>
			<td>
			<textarea name="address"></textarea>
			</td>
		</tr>
		<tr>
			<td class="txtstyle">Select Service </td>
			<td>:</td>
			<td>
			<select name="service">
			<option value="">Select Services</option>
			<?
				$service_query=mysql_query("select * from cal_services");
				while($service_fet=mysql_fetch_array($service_query)){
			?>
			<option value="<?=$service_fet[id]?>"><?=$service_fet[name]?></option>
			<? }?>
			</select>
			</td>
		</tr>
		<tr>
			<td class="txtstyle">available </td>
			<td>:</td>
			<td>
			<input type="text" name="available" />
			</td>
		</tr>
		<tr>
			<td class="txtstyle">trading hours</td>
			<td>:</td>
			<td>
			<input type="text" name="trading" />
			</td>
		</tr>
		 <tr>
    <td class="txtstyle">Date</td>
    <td>:</td>
    <td><input type="text" name="date1" onfocus="ds_sh(this);" readonly="readonly"  style="cursor: text; width:200px;"/></td>
  </tr>
   <tr>
    <td class="txtstyle">session will be held</td>
    <td>:</td>
    <td><input type="text" name="place"></td>
  </tr>
		<tr>

    <td class="txtstyle">Start time </td>

    <td>:</td>

    <td class="txtstyle1">

	<? $day1=explode(":",$slotedit['slot_stime']);
	$day=$day1[0];	?>
	<select name="sh" style="width:65px" >
		<option value="">HH</option>
		<?php

	   for($i=1;$i<=12;$i++)

	   {

	       $dd=date("d", mktime(0, 0, 0, 3, $i, 2009));

		   if($day == $dd) { $sel = "selected"; }

		   else { $sel=""; }

		   

		   echo '<option value='.$dd.'  '.$sel.' >'.$dd.'</option>';

	   }

	   ?>

	</select>

	<? $min1=$day1[1];

	?>

	<select name="sm" style="width:65px" >

		<option value="">MM</option>

		<?php

	   //for($i=0;$i<46;$i=$i+15)

	   for($i=0;$i<59;$i++)

	   {

	       $mina=date("i", mktime(0, $i, 0, 7, 1, 2009));

		   if($min1 == $mina) { $sel = "selected"; }

		   else { $sel=""; }

		   echo '<option value='.$mina.'  '.$sel.' >'.$mina.'</option>';

	   }

	   ?>

	</select>

	<? $mon=array("","AM","PM");?>

    <select name="merid" style="width:60px">

		 <option value="">select</option>

			<? for($i=1; $i<sizeof($mon);$i++){

			 	if($slotedit['slot_meridium']==$i){?>

			<option value="<?=$mon[$i]?>" selected="selected"><?=$mon[$i]?></option>

			<? }else{?>

	  		<option value="<?=$mon[$i]?>"><?=$mon[$i]?></option>

			<? }?>

        <? }?>

    </select>	</td>

  </tr>
		<tr><td colspan="3" align="center"><input type="submit" name="submit" value="submit" /></td></tr>
	</table>
	</form>
	<? }?>
	
	</td>
<td width="5%">&nbsp;</td>
</tr>
</table>
</body>
</html>
