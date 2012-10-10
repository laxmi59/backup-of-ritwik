<?php
extract($_REQUEST);
//for deleating
if(isset($_REQUEST['label_id'])) {
	$bannerImages=$_REQUEST['label_id'];
	$getTermId="DELETE FROM labels where label_id='$bannerImages'";
	$res_termsid=mysql_query($getTermId);
	wp_redirect(get_option('siteurl') . '/wp-admin/admin.php?page=Manage-Labels&msg=deleted');
}
$payStatusArr=array(1=>'Active, assigned to user',2=>'In-Active, user has to make payment',3=>'User haven\'t registered yet',4=>'Active, Ready to assign');
$SelectQry="SELECT *,l.label_id as label_id,  l.status as l_status, cl.contactdet_id as contact_id, DATEDIFF(CURDATE(),activation_date) as dateDiff FROM labels l LEFT JOIN  contatactdetails2labels cl ON (cl.label_id=l.label_id) LEFT JOIN  contactdetails c ON (c.contactdet_id=cl.contactdet_id) ";
/*Search query */
if($searchText  || $searchType )
	$SelectQry.=" WHERE ";
if($searchText)
	$SelectQry.="  ( labelno like '%".$searchText."%'  OR  firstname like '%".$searchText."%'  OR lastname like '%".$searchText."%' ) ";
if($searchType) {
	if($searchText)
		$SelectQry.="  AND  ";
	if($searchType=='1')
		$SelectQry.=" ( ( cl.contactdet_id  IS NOT NULL  )  AND  ( (membershiptype='1' AND  DATEDIFF(CURDATE(),activation_date) <90 )  OR   (membershiptype='2' AND  DATEDIFF(CURDATE(),activation_date) <365 )  )  )";
	if($searchType=='2')
		$SelectQry.=" ( ( cl.contactdet_id  IS NOT NULL  )  AND ( (membershiptype='1' AND  DATEDIFF(CURDATE(),activation_date) >90 )  OR   (membershiptype='2' AND  DATEDIFF(CURDATE(),activation_date) >365 )  ) ) ";
	if($searchType=='3')
		$SelectQry.=" (  ( cl.contactdet_id  IS NOT NULL  )  AND ( activation_date='0000-00-00' )  ) ";
	if($searchType=='4')
		$SelectQry.=" ( cl.contactdet_id  IS NULL  )";
}

$SelectQry.=" ORDER BY l.label_id desc ";
$res=mysql_query($SelectQry) or die("Error in query-->$SelectQry".mysql_error());
$noOfRec=mysql_num_rows($res);
if($noOfRec >0){
	$pageno=isset($_GET['pageno'])?$_GET['pageno']:1;
	$perpage=10;
	$start=($pageno-1)*$perpage;
	$SelectQry.=" LIMIT $start, $perpage ";
	$res=mysql_query($SelectQry);
	while($row=mysql_fetch_array($res))	{	
		$payStatus="";
		$assignedName="";
		if($row['contact_id'] ) {
			$assignedName=$row['firstname']." ".$row['lastname'];
			/*if($row['payment_status']==1) {
				$payStatus="Active";
			}
			if($row['payment_status']==0) {
				$payStatus="Inactive";
			}*/
			if($row['activation_date']=='0000-00-00') {
				$payStatus=$payStatusArr[3];
			}
			if($row['activation_date']!= '0000-00-00') {
				if( ($row['membershiptype']=='1' && $row['dateDiff'] >90 )  ||  ($row['membershiptype']=='2' && $row['dateDiff'] >365 ) )
				$payStatus=$payStatusArr[2];
				if( ($row['membershiptype']=='1' && $row['dateDiff'] <90 )  ||  ($row['membershiptype']=='2' && $row['dateDiff'] <365 ) )
				$payStatus=$payStatusArr[1];
			}
		}
		else {
			$assignedName="--:--";
			$payStatus="<a href='admin.php?page=Add-users&label_id=".$row['label_id']."'>".$payStatusArr[4]."</a>";
		}
		$str.="<tr align='left'><td>".$row['labelno']."</td><td>".$assignedName."</td><td>".$payStatus."</td></tr>";
	}	
}
else{
	$str.="<tr><td  align='center' colspan='3'><b>No Labels  found</b></td></tr>";
}
?>
<script language="javascript">

function delfun()
{
	if (confirm(" Are you sure you want to delete the label ?"))	{
		return true;
	}
	else	{
		return false;
	} 
}
</script>

<div class="wrap">
  <h2>Manage Labels</h2>
  <div align="center">
    <?php 
//error message
if($_GET['msg']=='deleted')
echo "<b><font color='red'>Label has been deleted successfully</font></b>"; 
if($_GET['msg']=='inserted')
echo "<b><font color='red'>Label  has been Added successfully</font></b>"; 
if($_GET['msg']=='updated')
echo "<b><font color='red'>Label  has been Updated successfully</font></b>";
?>
  </div>
  <form name="searchBy" action="admin.php?page=Manage-Labels" method="post" >
  <table  align="left">
    <tr>
      
        <td><input type="text" name="searchText" value="<?php echo $searchText; ?>" /></td>
        <td><select name="searchType" >
            <option value="">Select Status</option>
            <?php
			for($k=1;$k<=count($payStatusArr); $k++) {
				if($k==$searchType)
				echo "<option value='".$k."'  selected='selected' >".$payStatusArr[$k]."</option>";
				else
				echo "<option value='".$k."'>".$payStatusArr[$k]."</option>";
			}
   			?>
          </select></td>
        <td><input type="submit"  name="Submit" value="Search" /></td>
    	 <td><input  type="button" name="Reset" value="Reset" onclick="window.location.href='admin.php?page=Manage-Labels';" /></td>
    </tr> 
  </table> </form>
  <table width="520" style="padding-right:10px;" align="right">
    <tr align="left">
      <th>&nbsp;</th>
      <th></th>
      <th align="right"><a href="admin.php?page=Add_Single_Label">Add New Label</a> 
    </tr>
    <tr >
      <table border="1" width="520" class="widefat"  align="center"  cellspacing="0" cellpadding="0" >
        <thead>
          <tr>
            <th style="padding-left:3px;">Label Number</th>
            <th>Assigned To</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php echo $str;?>
        </tbody>
        <tfoot>
          <tr>
            <th style="padding-left:3px;">Label Number</th>
            <th>Assigned To</th>
            <th>Status</th>
          </tr>
        </tfoot>
      </table>
    </tr>
  </table>
  <table align="right">
    <tr>
      <td><?php
if($noOfRec>$perpage){
if($searchText || $searchType)
$passVars="&searchText=$searchText&searchType=$searchType";
else
$passVars="";
if($pageno>1){
?>
        <a href='admin.php?page=Manage-Labels&pageno=<?php echo $pageno-1;echo $passVars;?>'>Prev</a>
        <?php 
}  
echo "Page $pageno of ";
echo $pages=ceil($noOfRec/$perpage);
if($pageno<$pages)	{
?>
        <a href='admin.php?page=Manage-Labels&pageno=<?php echo $pageno+1;echo $passVars;?>'>Next</a>
        <?php 
	}
}
?>
      </td>
    </tr>
  </table>
</div>
