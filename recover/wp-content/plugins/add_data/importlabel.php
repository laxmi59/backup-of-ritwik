<?php
global $wpdb;

if($_POST['importsubmit']){
	extract($_POST);
	$mess="";
	//$current_date=date("Y-m-d H:i:s");
	$source=$_FILES['csvfile']['tmp_name']; 
	if( $_FILES["csvfile"]["type"]=='application/vnd.ms-excel')
	{
	$dir = WP_CONTENT_DIR . '/plugins/add_data/uploads/';
	$filename=time().$_FILES['csvfile']['name'];
	$destination=$dir.$filename; 
	$chk=move_uploaded_file($source,$destination); 
	//echo file_get_contents($destination);
	$row = 0;
	$handle = fopen($destination, "r");
		
	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		if ($row > 0) {
			$labelno = trim($data[0]);  
			if($labelno!=''){
				//check if email/username already exists
				$numrows=mysql_num_rows(mysql_query("select 1 from labels  where labelno='".$labelno."' "));//exit;
				if($numrows===0) {	
					$ins=mysql_query("insert into `labels` (labelno)values($labelno)");		
					$msg='<div class="errorown" align="center"><b>Data has been imported successfully</b></div>';
					$k=0;
				}	
				/*else {$msg='<div class="errorown" align="center"><b>Label No alredy exsits</b></div>'; }*/
				$k++;
			}
		}
		$row++;
	} 
fclose($handle);
unlink($destination);
}
else
$msg='<div class="errorown" align="center"><b>Please upload csv file only</b></div>';

}
?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/account/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/account/jquery.validate.pack.js">
</script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/account/javascript.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#importLabelForm").validate();
});
</script>
<style type="text/css">
.errorown{font-size:12px;color:red};
</style>
<div>&nbsp;</div>
<div>
  <h2>Import Label Numbers </h2>
</div>
<table width="811" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="811" align="center"><?php echo $msg?>
	<form method="post" name="importLabelForm" id="importLabelForm" enctype="multipart/form-data">
	<table width="812" border="0" cellspacing="0" cellpadding="0" align="center" >
	<!--<tr>
		<td width="30%" height="10" align="left"></td>
		<td width="70%" height="10" align="right"><a href="download.php">Download Sample file</a></td>
	</tr>-->
	<tr>
		<td width="24%" height="10" align="left"></td>
		<td width="76%" height="10" align="left"></td>
	</tr>
	<tr>
		<td height="30" align="left"><strong>Upload file (format: csv)</strong></td>
		<td align="left"><input name="csvfile" id="csvfile" type="file" class="required csv" value="" /></td>
	</tr>
	<tr>
		<td height="30" align="left">&nbsp;</td>
		<td align="left"><input name="importsubmit" type="submit" class="button" id="button3" value="Submit" /></td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	</table>
	</form>
	</td>
</tr>

<tr>
	<td><a href="../downloadcsv.php">CIick here</a> to download sample .csv file with lables	</td>
</tr>
<tr>
	<td>Note: If .csv contains duplicate labels, they would be excluded in your upload.</td>
</tr>
</table>