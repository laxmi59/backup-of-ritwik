<? session_start();
////////////////   		includes			/////////////////////////////////////////
include "config.php";
include "filenames.php";
include "functions.php";
include "classobjects.php";
////////////////		End of Includes		/////////////////////////////////////////
?>
<? if($_GET['act']=='down1'){
	$file1=$_GET['name'];
	$desc=mysql_fetch_array(mysql_query("select * from cal_services where id='".mysql_real_escape_string($_GET['id'])."'"));
	$show= "../admin/uploads/".$desc[$file1];

	header('Content-type: application/pdf');
	header('Content-Disposition: attachment; filename='.$show);
	readfile($show);
}?>
<? if($_GET['act']=='book_print'){
	$file="print.doc";
	$book_fet=mysql_fetch_array(mysql_query("select * from cal_booking where bid='".mysql_real_escape_string($_GET[bid])."'"));
	$servicefinal=mysql_fetch_array(mysql_query("select * from cal_services where id='$book_fet[ser_id]'"));
	$slot=mysql_fetch_array(mysql_query("select * from cal_slots where id='$book_fet[slot_id]'"));
	$cust_fet=mysql_fetch_array(mysql_query("select * from cal_users where user_id='$book_fet[user_id]'"));
	$dt=date('d/m/y',strtotime($slot['date']));
	$body .= "<table width='60%' align='center' border='0' cellpadding='0' celspacing='0'>
	
	<tr><td colspan='3'><b>Your Booking Info</b></td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>Service</td><td>:</td><td>$servicefinal[name]</td></tr>
	<tr><td>Venue</td><td>:</td><td>$slot[place]</td></tr>
	<tr><td>Date</td><td>:</td><td>$dt</td></tr>
	<tr><td>Time</td><td>:</td><td>$slot[start_time] &nbsp; $slot[merid]</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>First Name</td><td>:</td><td>$cust_fet[user_fname]</td></tr>
	<tr><td>Last Name</td><td>:</td><td>$cust_fet[user_lname]</td></tr>
	<tr><td>Email</td><td>:</td><td>$cust_fet[user_mail]</td></tr>
	<tr><td>Phone</td><td>:</td><td>$cust_fet[user_phone]</td></tr>
	<tr><td>Mobile</td><td>:</td><td>$cust_fet[user_mobile]</td></tr>";
	if($cust_fet[bsb]<>'')
		$body .="<tr><td>BSB/CC</td><td>:</td><td>$cust_fet[bsb]</td></tr>";
	if($cust_fet[business_unit]<>'')
		$body .="<tr><td>Business Unit</td><td>:</td><td>$cust_fet[business_unit]</td></tr>";
	if($cust_fet[emp_id]<>'')
		$body .="<tr><td>Employee ID</td><td>:</td><td>$cust_fet[emp_id]</td></tr>";
	if($cust_fet[division]<>'')
		$body .="<tr><td>Division</td><td>:</td><td>$cust_fet[division]</td></tr>";
	$body .="</table>";
	//echo $body;
	$show= $body;
	$f = fopen ($file,'w');
	fputs($f, $show);
	fclose($f);
	
	header('Content-type: application/doc');
	header('Content-Disposition: attachment; filename='.$file);
	readfile($file);
}?>
<? if($_GET['act']=='print_slots'){
	$file="appointments.doc";
	
	$query="select * from cal_slots";
	if($_GET['cid']) $query .=" where company='".mysql_real_escape_string($_GET['cid'])."' ";
	if($_GET['siteid']) $query .=" and site='".mysql_real_escape_string($_GET['siteid'])."' ";
	if($_GET['sid']) $query .=" and service='".mysql_real_escape_string($_GET['sid'])."' ";
	if($_GET['dt']) $query .=" and date='".mysql_real_escape_string($_GET['dt'])."' ";
	//echo $query;
	$query .=" order by sloot_time asc ";
	//echo $query;
	$ss=mysql_num_rows(mysql_query($query));
	$ss_limit=mysql_query($query);
	$body .= '<table width="90%" align="center" border="0" cellpadding="0" celspacing="0">
	<tr>
			<td width="5%" class="txtstyle"><b>Sno</b></td>
			<td width="16%" class="txtstyle"><b>Company</b></td>
			<td width="11%" class="txtstyle"><b>Site</b></td>
			<td width="12%" class="txtstyle"><b>Address</b></td>
			<td width="10%" class="txtstyle"><b>Service </b></td>
			<td width="11%" class="txtstyle"><b>Available</b></td>
			<td width="13%" class="txtstyle"><b>Trading hours</b> </td>
			<td width="7%" class="txtstyle"><b>Start time</b></td>
			<td width="11%" class="txtstyle"><b>Date</b></td>
			<td width="11%" class="txtstyle"><b>Session Held </b></td>
			
		</tr>';
	if($ss==''){
		$body .="<tr><td colspan='2' align='enter' class='errstyle'>No Appointments Found</td></tr>";
	}else{
		for($i=1;$sss=mysql_fetch_array($ss_limit);$i++){
		$com=mysql_fetch_array(mysql_query("select * from cal_company where id=$sss[company]"));
		$sit=mysql_fetch_array(mysql_query("select * from cal_site where id=$sss[site]"));
		$ser=mysql_fetch_array(mysql_query("select * from cal_services where id=$sss[service]"));
		$dt=date('d/m/y',strtotime($sss['date']));
		$tt=date('h:i',strtotime($sss['start_time']))." ".$sss['merid'];
		$body .="<tr>
			<td class='txtstyle1'>$i</td>
			<td class='txtstyle1'>$com[companyname]</td>
			<td class='txtstyle1'>$sit[name]</td>
			<td class='txtstyle1'>$sss[address]</td>
			<td class='txtstyle1'>$ser[name]</td>
			<td class='txtstyle1'>$sss[available]</td>
			<td class='txtstyle1'>$sss[trading]</td>
			<td class='txtstyle1'>$tt</td>
			<td class='txtstyle1'>$dt</td>
			<td class='txtstyle1'>$sss[place]</td>
			
		</tr>";
		}
	}
	$body .="</table>";
	//echo $body;
	$show= $body;
	$f = fopen ($file,'w');
	fputs($f, $show);
	fclose($f);
	
	header('Content-type: application/doc');
	header('Content-Disposition: attachment; filename='.$file);
	readfile($file);
}?>
<? if($_GET['act']=='print_slots_booking'){
	$file="appointments.doc";
	
	$query="select * from cal_slots";
	if($_GET['cid']) $query .=" where company='".mysql_real_escape_string($_GET['cid'])."' ";
	if($_GET['siteid']) $query .=" and site='".mysql_real_escape_string($_GET['siteid'])."' ";
	if($_GET['sid']) $query .=" and service='".mysql_real_escape_string($_GET['sid'])."' ";
	if($_GET['dt']) $query .=" and date='".mysql_real_escape_string($_GET['dt'])."' ";
	//echo $query;
	$query .=" order by sloot_time asc ";
	//echo $query;
	$ss=mysql_num_rows(mysql_query($query));
	$ss_limit=mysql_query($query);
	$body .= '<table width="90%" align="center" border="0" cellpadding="0" celspacing="0">
		<tr>
			<td>Service</td>
			<td>Company name</td>
			<td>Venue</td>
			<td>date</td>
			<td>Session Time</td>
			<td>First Name</td>
			<td>Last Name</td>
			<td>Email</td>
			<td>Phone</td>
			<td>Mobile</td>
			<td>BSB/CC</td>
			<td>Business Unit</td>
			<td>Employee ID</td>
			<td>Division</td>
		</tr>';
	if($ss==''){
		$body .="<tr><td colspan='2' align='enter' class='errstyle'>No Appointments Found</td></tr>";
	}else{
		for($i=1;$sss=mysql_fetch_array($ss_limit);$i++){
		$book=mysql_fetch_array(mysql_query("select * from `cal_booking` where slot_id= $sss[id]"));
			if($book){
				$com=mysql_fetch_array(mysql_query("select * from cal_company where id=$sss[company]"));
				$sit=mysql_fetch_array(mysql_query("select * from cal_site where id=$sss[site]"));
				$ser=mysql_fetch_array(mysql_query("select * from cal_services where id=$sss[service]"));
				$dt=date('d/m/y',strtotime($sss['date']));
				$tt=date('h:i',strtotime($sss['start_time']))." ".$sss['merid'];
				$sst2=mysql_fetch_array(mysql_query("select * from cal_users where user_id='$book[user_id]'"));
				$body .="<tr>
				<td>$ser[name]</td>
				<td>$com[companyname]</td>
				<td>$sss[place]</td>
				<td>$dt</td>
				<td>$tt</td>
				<td>$sst2[user_fname]</td>
				<td>$sst2[user_lname]</td>
				<td>$sst2[user_mail]</td>
				<td>$sst2[user_phone]</td>
				<td>$sst2[user_mobile]</td>
				<td>$sst2[bsb]</td>
				<td>$sst2[business_unit]</td>
				<td>$sst2[emp_id]</td>
				<td>$sst2[division]</td>
				</tr>";
			}
		}
	}
	$body .="</table>";
	//echo $body;
	$show= $body;
	$f = fopen ($file,'w');
	fputs($f, $show);
	fclose($f);
	
	header('Content-type: application/doc');
	header('Content-Disposition: attachment; filename='.$file);
	readfile($file);
}?>
<? if($_GET['act']=='company_print'){
	$file="all_bookings.doc";
	$body ="<table width='90%'>
	<tr>
		<td>Service</td>
		<td>date</td>
		<td>Time</td>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Email</td>
		<td>Phone</td>
		<td>Mobile</td>
		<td>BSB/CC</td>
		<td>Business Unit</td>
		<td>Employee ID</td>
		<td>Division</td>
	</tr>";
	 	$slt=mysql_query("select * from cal_booking where user_id='".mysql_real_escape_string($_GET[id])."' ORDER BY `sloot_time` ASC");
		$sltno=mysql_num_rows($slt);
		if($sltno==''){
	
	$body .="<tr><td colspan='4' align='center'>No Booking Found</td></tr>";
	}else{
		while($sltt=mysql_fetch_array($slt)){
		$sst=mysql_fetch_array(mysql_query("select * from cal_slots where id='$sltt[slot_id]'"));
		$sst1=mysql_fetch_array(mysql_query("select * from cal_services where id='$sltt[ser_id]'"));
		$sst2=mysql_fetch_array(mysql_query("select * from cal_users where user_id='$sltt[user_id]'"));
		$dt=date('d/m/y',strtotime($sst['date']));
	$body .="<tr>
		<td>$sst1[name]</td>
		<td>$dt</td>
		<td>$sst[start_time].$sst[merid]</td>
		<td>$sst2[user_fname]</td>
		<td>$sst2[user_lname]</td>
		<td>$sst2[user_mail]</td>
		<td>$sst2[user_phone]</td>
		<td>$sst2[user_mobile]</td>
		<td>$sst2[bsb]</td>
		<td>$sst2[business_unit]</td>
		<td>$sst2[emp_id]</td>
		<td>$sst2[division]</td>
		</tr>";
	 } }
	$body .="</table>";
	$show= $body;
	$f = fopen ($file,'w');
	fputs($f, $show);
	fclose($f);
	
	header('Content-type: application/doc');
	header('Content-Disposition: attachment; filename='.$file);
	readfile($file);
}?>
<? if($_GET['act']=='company_print_admin'){
	$com_name=mysql_fetch_array(mysql_query("select * from cal_company where id='".mysql_real_escape_string($_GET[id])."'"));
	$body ="<table width='90%' cellpadding='5' cellspacing='5'>
	<tr>
		<td width='100'>Service</td>
        <td width='100'>Company name</td>
		<td width='100'>Venue</td>
		<td width='100'>date</td>
		<td width='100'>Session Time</td>
		<td width='100'>First Name</td>
		<td width='100'>Last Name</td>
		<td width='100'>Email</td>
		<td width='100'>Phone</td>
		<td width='100'>Mobile</td>
		<td width='100'>BSB/CC</td>
		<td width='100'>Business Unit</td>
		<td width='100'>Employee ID</td>
		<td width='100'>Division</td>
	</tr>";
	 	$slt=mysql_query("select * from cal_booking ORDER BY `sloot_time` ASC");
		$sltno=mysql_num_rows($slt);
		if($sltno==''){
	
	$body .="<tr><td colspan='4' align='center'>No Booking Found</td></tr>";
	}else{
		while($sltt=mysql_fetch_array($slt)){
		
		$sst=mysql_query("select * from cal_slots where id=$sltt[slot_id] and company='".mysql_real_escape_string($_GET[id])."'");
		while($sst_fet=mysql_fetch_array($sst)){
			$ccom=mysql_fetch_array(mysql_query("select * from cal_company where id='$sst_fet[company]'"));
			$sst1=mysql_fetch_array(mysql_query("select * from cal_services where id='$sltt[ser_id]'"));
			$sst2=mysql_fetch_array(mysql_query("select * from cal_users where user_id='$sltt[user_id]'"));
			
			$dt=date('d/m/y',strtotime($sst_fet['date']));
			$body .="<tr>
				<td>$sst1[name]</td>
				<td>$ccom[companyname]</td>
				<td>$sst_fet[place]</td>
				<td>$dt</td>
				<td>$sst_fet[start_time].$sst[merid]</td>
				<td>$sst2[user_fname]</td>
				<td>$sst2[user_lname]</td>
				<td>$sst2[user_mail]</td>
				<td>$sst2[user_phone]</td>
				<td>$sst2[user_mobile]</td>
				<td>$sst2[bsb]</td>
				<td>$sst2[business_unit]</td>
				<td>$sst2[emp_id]</td>
				<td>$sst2[division]</td>
			</tr>";
		}
	 } }
	$body .="</table>";
	$filename=str_replace(" ","_",$com_name['companyname']);
	$file="bookings_of_".$filename.".doc";
	$show= $body;
	$f = fopen ($file,'w');
	fputs($f, $show);
	fclose($f);
	
	header('Content-type: application/doc');
	header('Content-Disposition: attachment; filename='.$file);
	readfile($file);
}?>
<? if($_GET['act']=='site_print_admin'){
	$com_name=mysql_fetch_array(mysql_query("select * from cal_site where id='".mysql_real_escape_string($_GET[id])."'"));
	$filename=str_replace(" ","_",$com_name['name']);
	$file="bookings_of_".$filename.".doc";
	$body ="<table width='90%'>
	<tr>
		<td>Service</td>
		<td>date</td>
		<td>Time</td>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Email</td>
		<td>Phone</td>
		<td>Mobile</td>
		<td>BSB/CC</td>
		<td>Business Unit</td>
		<td>Employee ID</td>
		<td>Division</td>
	</tr>";
	 	$slt=mysql_query("select * from cal_booking ORDER BY `sloot_time` ASC");
		$sltno=mysql_num_rows($slt);
		if($sltno==''){
	
	$body .="<tr><td colspan='4' align='center'>No Booking Found</td></tr>";
	}else{
		while($sltt=mysql_fetch_array($slt)){
		
		$sst=mysql_query("select * from cal_slots where id=$sltt[slot_id] and site='".mysql_real_escape_string($_GET[id])."'");
		while($sst_fet=mysql_fetch_array($sst)){
			$sst1=mysql_fetch_array(mysql_query("select * from cal_services where id='$sltt[ser_id]'"));
			$sst2=mysql_fetch_array(mysql_query("select * from cal_users where user_id='$sltt[user_id]'"));
			
			$dt=date('d/m/y',strtotime($sst_fet['date']));
			$body .="<tr>
				<td>$sst1[name]</td>
				<td>$dt</td>
				<td>$sst_fet[start_time].$sst[merid]</td>
				<td>$sst2[user_fname]</td>
				<td>$sst2[user_lname]</td>
				<td>$sst2[user_mail]</td>
				<td>$sst2[user_phone]</td>
				<td>$sst2[user_mobile]</td>
				<td>$sst2[bsb]</td>
				<td>$sst2[business_unit]</td>
				<td>$sst2[emp_id]</td>
				<td>$sst2[division]</td>
			</tr>";
		}
	 } }
	$body .="</table>";
	
	$show= $body;
	$f = fopen ($file,'w');
	fputs($f, $show);
	fclose($f);
	
	header('Content-type: application/doc');
	header('Content-Disposition: attachment; filename='.$file);
	readfile($file);
}?>
<? if($_GET['act']=='service_print_admin'){
	$com_name=mysql_fetch_array(mysql_query("select * from cal_services where id='".mysql_real_escape_string($_GET[id])."'"));
	$filename=str_replace(" ","_",$com_name['name']);
	$file="bookings_of_".$filename.".doc";
	$body ="<table width='90%'>
	<tr>
		<td>Service</td>
		<td>date</td>
		<td>Time</td>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Email</td>
		<td>Phone</td>
		<td>Mobile</td>
		<td>BSB/CC</td>
		<td>Business Unit</td>
		<td>Employee ID</td>
		<td>Division</td>
	</tr>";
	 	$slt=mysql_query("select * from cal_booking ORDER BY `sloot_time` ASC");
		$sltno=mysql_num_rows($slt);
		if($sltno==''){
	
	$body .="<tr><td colspan='4' align='center'>No Booking Found</td></tr>";
	}else{
		while($sltt=mysql_fetch_array($slt)){
		
		$sst1=mysql_query("select * from cal_slots where id=$sltt[slot_id] and service='".mysql_real_escape_string($_GET[id])."'");
		while($sst_fet=mysql_fetch_array($sst1)){
			//$sst1=mysql_fetch_array(mysql_query("select * from cal_services where id='$sltt[ser_id]'"));
			$sst2=mysql_fetch_array(mysql_query("select * from cal_users where user_id='$sltt[user_id]'"));
			
			$dt=date('d/m/y',strtotime($sst_fet['date']));
			$body .="<tr>
				<td>$com_name[name]</td>
				<td>$dt</td>
				<td>$sst_fet[start_time].$sst[merid]</td>
				<td>$sst2[user_fname]</td>
				<td>$sst2[user_lname]</td>
				<td>$sst2[user_mail]</td>
				<td>$sst2[user_phone]</td>
				<td>$sst2[user_mobile]</td>
				<td>$sst2[bsb]</td>
				<td>$sst2[business_unit]</td>
				<td>$sst2[emp_id]</td>
				<td>$sst2[division]</td>
			</tr>";
		}
	 } }
	$body .="</table>";
	
	$show= $body;
	$f = fopen ($file,'w');
	fputs($f, $show);
	fclose($f);
	
	header('Content-type: application/doc');
	header('Content-Disposition: attachment; filename='.$file);
	readfile($file);
}?>

