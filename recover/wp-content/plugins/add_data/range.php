<?php
global $wpdb;

if($_POST['rangesubmit']){
extract($_POST);
	for($i=$labelnofrom;$i<=$labelnoto;$i++){
		$num=mysql_num_rows(mysql_query("select * from labels where labelno=$i"));
		if($num){
			continue;
		}else{
			$ins=mysql_query("insert into `labels` (labelno)values($i)");
		}
	}
echo "<script>window.location='".get_option('siteurl')."/wp-admin/admin.php?page=".$_GET[page]."&msg=2'</script>";
}
?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/account/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/account/jquery.validate.pack.js">
</script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/account/javascript.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#singleLabelForm").validate();
});
</script>
<style type="text/css">
.errorown{font-size:12px;color:red};
</style>
<div>&nbsp;</div>
<div><h2>Add Single Label</h2></div>
<table width="700" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><?php if($_REQUEST['msg']==1){
	echo '<div class="errorown" align="center"><b>Label No Already Exists</b> </div><div>&nbsp;</div> ';
}elseif($_REQUEST['msg']==2){
	echo '<div class="errorown" align="center"><b>Label No Added Successfully</b> </div><div>&nbsp;</div> ';
}
?>
<form method="post" name="singleLabelForm" id="singleLabelForm">
<table width="400" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="205">Enter Label No(from ex: 100)</td>
    <td width="51">:</td>
    <td width="144"><input type="text" name="labelnofrom" id="labelnofrom" class="required" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="205">Enter Label No(to ex: 150)</td>
    <td width="51">:</td>
    <td width="144"><input type="text" name="labelnoto" id="labelnoto" class="required" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><input type="submit"class="button" name="rangesubmit" value="Submit" /></td>
  </tr>
</table>
</form></td></tr></table>