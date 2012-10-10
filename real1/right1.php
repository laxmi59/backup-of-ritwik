<style type="text/css">
.style1 {color: #FFFFFF;font-weight: bold;}
</style>
<script type="text/javascript">
function checkUncheckAll(theElement) 
	{
	//alert("aa");
     var theForm = theElement.form, z = 0;
	 for(z=0; z<theForm.length;z++)
	 {
      if(theForm[z].type == 'checkbox' && theForm[z].name != 'checkall')
	  {
	  theForm[z].checked = theElement.checked;
	  }
     }
    }
	function NewWindow(mypage,myname,w,h,scroll){
LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
settings =
'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
win = window.open(mypage,myname,settings)
}
</script>
<form method="post">
<table width="100%" style="border:1px solid;">
<tr>
	<td>
		<? if($_GET['act']=='rent') {?>	<b>To Rent</b>
		<? }elseif($_GET['act']=='buy'){?><b>To Buy</b>
		<? }elseif($_GET['act']=='active'){?><b>Active</b>
		<? }elseif($_GET['act']=='expired'){?><b>Expired</b>
		<? }elseif($_GET['act']=='hold'){?><b>Hold</b>
		<? }elseif($_GET['act']=='del'){?><b>Deleted</b><? }?>
		
	</td>
</tr>
<? ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////?>
<? if($_GET['act']=='rent'){?>
<tr>
	<td valign="top">
	<table border="0"  width="90%" align="center" style="border:1px solid;">
	<tr style="background:#800000;">
		<td align="center"><input type="checkbox" id="cb" name="cb" onclick="checkUncheckAll(this);"/></td>
		<td align="center"><span class="style1">Post Date</span></td>
		<td align="center"><span class="style1">Requirement Details</span></td>
		<td align="center"><span class="style1">Action</span></td>
	</tr>
	<? $i=$b->rent($uid);
	   $x=$b->rent1($uid);
	   if($i==0){?>
	   <tr>
	   		<td colspan="4" align="center">No require ments found</td>
		</tr>
		<? }else{
	   while($xx=mysql_fetch_array($x)){?>
	<tr style="background-color:#A8FFFF;">
		<td align="center"><input type="checkbox" name="myCheckbox" ></td>
		<td style="padding-left:10px;"><?=$xx['req_date']?></td>
		<td style="padding-left:10px;"><? echo "To ".$xx['req_type']." An ".$xx['req_property']." In ";?><? print $c->location1($xx['req_city']);?></td>
		<td style="padding-left:10px;">
			<a href="?act=view&id=<?=$xx['req_id']?>">View</a>
			<a href="?act=del&id=<?=$xx['req_id']?>">Delete</a>
		</td>
	</tr>
	<? }}?>
	</table>
	</td>
</tr>
<? }?>
<? ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////?>
<? if($_GET['act']=='buy'){?>
<tr>
	<td valign="top">
	<table border="0"  width="90%" align="center" style="border:1px solid;">
	<tr style="background:#800000;">
		<td align="center"><input type="checkbox" id="cb" name="cb" onclick="checkUncheckAll(this);"/></td>
		<td align="center"><span class="style1">Post Date</span></td>
		<td align="center"><span class="style1">Requirement Details</span></td>
		<td align="center"><span class="style1">Action</span></td>
	</tr>
	<? $i=$b->buy($uid);
	   $x=$b->buy1($uid);
	   if($i==0){?>
	   <tr>
	   		<td colspan="4" align="center">No require ments found</td>
		</tr>
		<? }else{
	   while($xx=mysql_fetch_array($x)){?>
	<tr style="background-color:#A8FFFF;">
		<td align="center"><input type="checkbox" name="myCheckbox" ></td>
		<td style="padding-left:10px;"><?=$xx['req_date']?></td>
		<td style="padding-left:10px;"><? echo "To ".$xx['req_type']." An ".$xx['req_property']." In ";?><? print $c->location1($xx['req_city']);?></td>
		<td style="padding-left:10px;">
			<a href="?act=view&id=<?=$xx['req_id']?>">View</a>
			<a href="?act=del&id=<?=$xx['req_id']?>">Delete</a>
		</td>
	</tr>
	<? }}?>
	</table>
	</td>
</tr>
<? }?>
<? ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////?>
<? if($_GET['act']=='active'){?>
<tr>
	<td valign="top">
	<table border="0"  width="90%" align="center" style="border:1px solid;">
	<tr style="background:#800000;">
		<td align="center"><input type="checkbox" id="cb" name="cb" onclick="checkUncheckAll(this);"/></td>
		<td align="center"><span class="style1">Expiry Date</span></td>
		<td align="center"><span class="style1">Property Details</span>
		<td align="center"><span class="style1">status</span>
		<td align="center"><span class="style1">Action</span></td>
	</tr>
	<? $i=$a->active($uid);
	   $x=$a->active1($uid);
	   if($i==0){?>
	   <tr>
	   		<td colspan="5" align="center">No require ments found</td>
		</tr>
		<? }else{
	   while($xx=mysql_fetch_array($x)){?>
	<tr style="background-color:#A8FFFF;">
		<td align="center"><input type="checkbox" name="myCheckbox" ></td>
		<td style="padding-left:10px;"><?=$xx['list_date']?></td>
		<td style="padding-left:10px;"><?=$xx['list_propery']."for".$xx['list_type']."<br>".$xx['list_project']."<br>".$xx['list_addr'].","?><? print $c->location2($xx['list_location']).",".$c->location1($xx['list_city'])?></td>
		<td style="padding-left:10px;"><?=$xx['list_status']?></td>
		<td style="padding-left:10px;">
			<a href="?act=edit&id=<?=$xx['list_id']?>">Edit</a>
			<a href="?act=delete&id=<?=$xx['list_id']?>">Delete</a>
		</td>
	</tr>
	<? }}?>
	</table>
	</td>
</tr>
<? }?>
<? ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////?>
<? if($_GET['act']=='expired'){?>
<tr>
	<td valign="top">
	<table border="0"  width="90%" align="center" style="border:1px solid;">
	<tr style="background:#800000;">
		<td align="center"><input type="checkbox" id="cb" name="cb" onclick="checkUncheckAll(this);"/></td>
		<td align="center"><span class="style1">Expiry Date</span></td>
		<td align="center"><span class="style1">Property Details</span>
		<td align="center"><span class="style1">status</span>
		<td align="center"><span class="style1">Action</span></td>
	</tr>
	<? $i=$a->expired($uid);
	   $x=$a->expired1($uid);
	   if($i==0){?>
	   <tr>
	   		<td colspan="4" align="center">No require ments found</td>
		</tr>
		<? }else{
	   while($xx=mysql_fetch_array($x)){?>
	<tr style="background-color:#A8FFFF;">
		<td align="center"><input type="checkbox" name="myCheckbox" ></td>
		<td style="padding-left:10px;"><?=$xx['list_date']?></td>
		<td style="padding-left:10px;"><?=$xx['list_propery']."for".$xx['list_type']."<br>".$xx['list_project']."<br>".$xx['list_addr'].","?><? print $c->location2($xx['list_location']).",".$c->location1($xx['list_city'])?></td>
		<td style="padding-left:10px;"><?=$xx['list_status']?></td>
		<td style="padding-left:10px;">
			<a href="?act=edit&id=<?=$xx['list_id']?>">Edit</a>
			<a href="?act=del&id=<?=$xx['list_id']?>">Delete</a>
		</td>
	</tr>
	<? }}?>
	</table>
	</td>
</tr>
<? }?>
<? ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////?>
<? if($_GET['act']=='hold'){?>
<tr>
	<td valign="top">
	<table border="0"  width="90%" align="center" style="border:1px solid;">
	<tr style="background:#800000;">
		<td align="center"><input type="checkbox" id="cb" name="cb" onclick="checkUncheckAll(this);"/></td>
		<td align="center"><span class="style1">Expiry Date</span></td>
		<td align="center"><span class="style1">Property Details</span>
		<td align="center"><span class="style1">status</span>
		<td align="center"><span class="style1">Action</span></td>
	</tr>
	<? $i=$a->hold($uid);
	   $x=$a->hold1($uid);
	   if($i==0){?>
	   <tr>
	   		<td colspan="4" align="center">No require ments found</td>
		</tr>
		<? }else{
	   while($xx=mysql_fetch_array($x)){?>
	<tr style="background-color:#A8FFFF;">
		<td align="center"><input type="checkbox" name="myCheckbox" ></td>
		<td style="padding-left:10px;"><? print $a->exp1($xx['list_date'])?></td>
		<td style="padding-left:10px;"><?=$xx['list_property']." for ".$xx['list_type']."<br>".$xx['list_project']."<br>".$xx['list_addr'].","?><? print $c->location2($xx['list_location']).",".$c->location1($xx['list_city'])?></td>
		<td style="padding-left:10px;"><?=$xx['list_status']?></td>
		<td style="padding-left:10px;">
			<a href="?act=edit&id=<?=$xx['list_id']?>">Edit</a>
			<a href="?act=del&id=<?=$xx['list_id']?>">Delete</a>
		</td>
	</tr>
	<? }}?>
	</table>
	</td>
</tr>
<? }?>
<? ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////?>
<? if($_GET['act']=='del'){?>
<tr>
	<td valign="top">
	<table border="0"  width="90%" align="center" style="border:1px solid;">
	<tr style="background:#800000;">
		<td align="center"><input type="checkbox" id="cb" name="cb" onclick="checkUncheckAll(this);"/></td>
		<td align="center"><span class="style1">Expiry Date</span></td>
		<td align="center"><span class="style1">Property Details</span>
		<td align="center"><span class="style1">status</span>
		<td align="center"><span class="style1">Action</span></td>
	</tr>
	<? $i=$a->del($uid);
	   $x=$a->del1($uid);
	   if($i==0){?>
	   <tr>
	   		<td colspan="4" align="center">No require ments found</td>
		</tr>
		<? }else{
	   while($xx=mysql_fetch_array($x)){?>
	<tr style="background-color:#A8FFFF;">
		<td align="center"><input type="checkbox" name="myCheckbox" ></td>
		<td style="padding-left:10px;"><?=$xx['list_date']?></td>
		<td style="padding-left:10px;"><?=$xx['list_propery']."for".$xx['list_type']."<br>".$xx['list_project']."<br>".$xx['list_addr'].","?><? print $c->location2($xx['list_location']).",".$c->location1($xx['list_city'])?></td>
		<td style="padding-left:10px;"><?=$xx['list_status']?></td>
		<td style="padding-left:10px;">
			<a href="?act=edit&id=<?=$xx['list_id']?>">Edit</a>
			<a href="?act=del&id=<?=$xx['list_id']?>">Delete</a>
		</td>
	</tr>
	<? }}?>
	</table>
	</td>
</tr>
<? }?>
</table>
</form>