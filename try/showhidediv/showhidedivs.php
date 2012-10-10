<?php
if($totcount !=''){
		for($ofc=0;$ofc<=$_POST['totcount'];$ofc++){
			if($ofc==1){
				continue;
			}
			$office_state_real='';
			if($office_state[$ofc]=='')
				$office_state_real=$office_states_usa[$ofc];
			else
				$office_state_real=$office_state[$ofc];
			//echo $office_fname[$ofc].",".$office_lname[$ofc].",".$office_phone[$ofc]."<br>";
			if(trim($office_fname[$ofc]) != '' || trim($office_lname[$ofc]) != '' || trim($office_phone[$ofc]) != '' || trim($office_fax[$ofc]) != '' || trim($office_cell[$ofc]) != '' || trim($office_email[$ofc]) != '' || trim($office_email[$ofc])!= '' || trim($office_address[$ofc]) != '' || trim($office_address2[$ofc]) != '' || trim($office_country[$ofc]) != '' || trim($office_state_real) != '' || trim($office_city[$ofc]) != '' || trim($office_zip[$ofc]) != '' || trim($office_region[$ofc])!= 0 ){
				
			
			$ins=mysql_query("insert into pypro710_multi_contacts (`cid`, `contact_fname`, `contact_lname`, `contact_phone`, `contact_fax`, `contact_cell`, `contact_email`, `contact_address`, `contact_address2`, `contact_country`, `contact_state`, `contact_city`, `contact_zip`, `contact_type`, `contact_region`, `office_name`) values(".$ckey.",'".addslashes(trim($office_fname[$ofc]))."', '".addslashes(trim($office_lname[$ofc]))."', '".trim($office_phone[$ofc])."', '".trim($office_fax[$ofc])."', '".trim($office_cell[$ofc])."', '".addslashes(trim($office_email[$ofc]))."', '".addslashes(trim($office_address[$ofc]))."', '".addslashes(trim($office_address2[$ofc]))."', '".$office_country[$ofc]."', '".addslashes(trim($office_state_real))."', '".addslashes(trim($office_city[$ofc]))."', '".trim($office_zip[$ofc])."', 'office', '".trim($office_region[$ofc])."', '".trim($office_name[$ofc])."')");
			}
		}
		}
?>
<script type="text/javascript">
function addOfficeRows(isTable,mode)
{	
	index= isTable.rows.length;
	//index=++index1;
		var id_del=document.getElementById("id_delete21");	
		if(index >= 1 && mode == 'I2' )
		id_del.style.visibility='visible';
		else if(index < 3 && mode == 'D2' ) 
		id_del.style.visibility='hidden';
		if(mode == 'I2') {	
			//if(index<=15){
			
				nextRow = isTable.insertRow(index);
				isText = nextRow.insertCell(0);
				isText.innerHTML = "<b>Office"+index+"</b><br><table width='100%' cellpadding='3' cellspacing='3'><tr><td width='33%'>Office Name</td><td width='67%'><input name='office_name["+index+"]' id='office_name"+index+"' type='text' value='' size='30' maxlength='25' /></td>	</tr><tr><td width='33%'>First Name </td><td width='67%'><input name='office_fname["+index+"]' id='office_fname"+index+"' type='text' value='' size='30' maxlength='25' /></td>	</tr><tr><td>Last Name </td><td><input name='office_lname["+index+"]' id='office_lname"+index+"' type='text' value='' size='30' maxlength='25' /></td></tr><tr><td>Phone</td><td><input name='office_phone["+index+"]' id='office_phone"+index+"' type='text' value='' size='30' maxlength='25' /></td></tr><tr><td>Fax</td><td><input name='office_fax["+index+"]' id='office_fax"+index+"' type='text' value='' size='30' maxlength='25' /></td></tr><tr><td>Cell</td><td><input name='office_cell["+index+"]' id='office_cell"+index+"' type='text' value='' size='30' maxlength='25' /></td></tr><tr><td>Email</td><td><input name='office_email["+index+"]' id='office_email"+index+"' type='text' value='' size='30' maxlength='25' /></td></tr><tr><td>Address</td><td><input name='office_address["+index+"]' id='office_address"+index+"' type='text' value='' size='30' maxlength='25' /></td></tr><tr><td>Address2</td><td><input name='office_address2["+index+"]' id='office_address2"+index+"' type='text' value='' size='30' maxlength='25' /></td></tr><tr><td>City</td><td><input name='office_city["+index+"]' id='office_city"+index+"' type='text' value='' size='30' maxlength='25' /></td></tr><tr><td>Zip</td><td><input name='office_zip["+index+"]' id='office_zip"+index+"' type='text' value='' size='30' maxlength='25' /><input type='hidden' name='totcount' value='"+index+"'></td></tr></table>";
				document.getElementById('officecnt').value=index;
			//}else
				//alert("You can add only 15 Comments");
		} 
		else if(mode == 'D2')
		{
			if(isTable.rows.length > 1)
			{
				previousRow = isTable.deleteRow(index - 1);
				document.getElementById('officecnt').value=index-1;
			}
		} 	
}
</script>
<table width="100%"  cellpadding="3" cellspacing="3">
	<input type='hidden' name='totcount' value='1'>
		<tr>
		<td width="33%">Office Name </td>
		<td width="67%"><input name="office_name[0]" id="office_name0" type="text" value="" size="30" maxlength="25" /></td>
		</tr>
		<tr>
		<td width="33%">First Name </td>
		<td width="67%"><input name="office_fname[0]" id="office_fname0" type="text" value="" size="30" maxlength="25" /></td>
		</tr>
		<tr>
		  <td>Last Name </td>
		  <td><input name="office_lname[0]" id="office_lname0" type="text" value="" size="30" maxlength="25" /></td>
		  </tr>
		<tr>
		  <td>Phone</td>
		  <td><input name="office_phone[0]" id="office_phone0" type="text" value="" size="30" maxlength="25" /></td>
		  </tr>
		<tr>
		  <td>Fax</td>
		  <td><input name="office_fax[0]" id="office_fax0" type="text" value="" size="30" maxlength="25" /></td>
		  </tr>
		<tr>
		  <td>Cell</td>
		  <td><input name="office_cell[0]" id="office_cell0" type="text" value="" size="30" maxlength="25" /></td>
		  </tr>
		<tr>
		  <td>Email</td>
		  <td><input name="office_email[0]" id="office_email0" type="text" value="" size="30" maxlength="25" /></td>
		  </tr>
		<tr>
		  <td>Address</td>
		  <td><input name="office_address[0]" id="office_address0" type="text" value="" size="30" maxlength="25" /></td>
		  </tr>
		<tr>
		  <td>Address2</td>
		  <td><input name="office_address2[0]" id="office_address20" type="text" value="" size="30" maxlength="25" /></td>
		  </tr>
		
		<tr>
		  <td>City</td>
		  <td><input name="office_city[0]" id="office_city0" type="text" value="" size="30" maxlength="25" /></td>
		  </tr>
		<tr>
		  <td>Zip</td>
		  <td><input name="office_zip[0]" id="office_zip0" type="text" value="" size="30" maxlength="25" /></td>
		  </tr>
		 
		 </table>
		<table width="100%" id="ofc_tab">
	 <tr><td></td></tr> 
	 <tr><td></td></tr></table>
	 <table width="430" align="center" class='borderlr'> 
           <tr> 
              <td height="30" width="39%">&nbsp;</td>
       
			<td height="25" colspan="2" class="borderline">
			<a  style="cursor:pointer" id="id_more" onClick="addOfficeRows(document.getElementById('ofc_tab'),'I2')"><u><font color="Blue" face="Verdana, Arial, Helvetica, sans-serif" size="2">Add Another Office</font></u></a>    &nbsp; <a  style="cursor:pointer;visibility:hidden" id="id_delete21" onClick="addOfficeRows(document.getElementById('ofc_tab'),'D2')"><u><font color="Blue" face="Verdana, Arial, Helvetica, sans-serif" size="2">Cancel</font></u></a></td>
	</tr></table>