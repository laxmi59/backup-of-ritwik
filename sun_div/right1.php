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
<div style="width:100%; border:1px solid">
<div>
<? if($_GET['act']=='rent') {?>	<b>To Rent</b>
		<? }elseif($_GET['act']=='buy'){?><b>To Buy</b>
		<? }elseif($_GET['act']=='active'){?><b>Active</b>
		<? }elseif($_GET['act']=='expired'){?><b>Expired</b>
		<? }elseif($_GET['act']=='hold'){?><b>Hold</b>
		<? }elseif($_GET['act']=='del'){?><b>Deleted</b><? }?>
</div>
<? if($_GET['act']=='rent'){?>
<div style=" margin-left:50px; margin-right:75px; border:1px solid">
<div style="background:#800000;">
<div style="float:left; width:75px" align="center"><input type="checkbox" id="cb" name="cb" onclick="checkUncheckAll(this);"/></div>
	<div align="center" class="style1" style="float:left; width:200px">Post Date</div>
		<div align="center" class="style1" style="float:left; width:350px">Requirement Details</div>
		<div align="center" class="style1">Action</div>
</div>
<? $i=$b->rent($uid);
	   $x=$b->rent1($uid);
	   if($i==0){?>
<div align="center">No requirements found</div>
<? }else{
	   while($xx=mysql_fetch_array($x)){?>
	   <div style="background:#A8FFFF;;">
<div style="float:left; width:75px" align="center"><input type="checkbox" name="myCheckbox" ></div>
	<div align="left" style="float:left; width:200px"><?=$xx['req_date']?></div>
		<div align="left" style="float:left; width:350px"><? echo "To ".$xx['req_type']." An ".$xx['req_property']." In ";?><? print $c->location1($xx['req_city']);?></div>
		<div align="left"><a href="?act=view&id=<?=$xx['req_id']?>">View</a>
			<a href="?act=del&id=<?=$xx['req_id']?>">Delete</a></div>
</div>	  
 
<? }}?>
</div>
<? }?>
<? if($_GET['act']=='buy'){?>
<div style=" margin-left:50px; margin-right:75px; border:1px solid">
<div style="background:#800000;">
<div style="float:left; width:75px" align="center"><input type="checkbox" id="cb" name="cb" onclick="checkUncheckAll(this);"/></div>
	<div align="center" class="style1" style="float:left; width:200px">Post Date</div>
		<div align="center" class="style1" style="float:left; width:350px">Requirement Details</div>
		<div align="center" class="style1">Action</div>
</div>
<? $i=$b->buy($uid);
	   $x=$b->buy1($uid);
	   if($i==0){?>
<div align="center">No requirements found</div>
<? }else{
	   while($xx=mysql_fetch_array($x)){?>
	   <div style="background:#A8FFFF;;">
<div style="float:left; width:75px" align="center"><input type="checkbox" name="myCheckbox" ></div>
	<div align="left" style="float:left; width:200px"><?=$xx['req_date']?></div>
		<div align="left" style="float:left; width:350px"><? echo "To ".$xx['req_type']." An ".$xx['req_property']." In ";?><? print $c->location1($xx['req_city']);?></div>
		<div align="left"><a href="?act=view&id=<?=$xx['req_id']?>">View</a>
			<a href="?act=del&id=<?=$xx['req_id']?>">Delete</a></div>
</div>	  
 
<? }}?>
</div>
<? }?>
<? if($_GET['act']=='active'){?>
<div style=" margin-left:50px; margin-right:75px; border:1px solid">
<div style="background:#800000;">
<div style="float:left; width:75px" align="center"><input type="checkbox" id="cb" name="cb" onclick="checkUncheckAll(this);"/></div>
	<div align="center" class="style1" style="float:left; width:200px">Expiry Date</div>
		<div align="center" class="style1" style="float:left; width:300px">Property Details</div>
		<div align="center" class="style1" style="float:left; width:100px">Status</div>
		<div align="center" class="style1">Action</div>
</div>
<? $i=$a->active($uid);
	   $x=$a->active1($uid);
	   if($i==0){?>
<div align="center">No requirements found</div>
<? }else{
	   while($xx=mysql_fetch_array($x)){?>
	   <div style="background:#A8FFFF;;">
<div style="float:left; width:75px" align="center"><input type="checkbox" name="myCheckbox" ></div>
	<div align="left" style="float:left; width:200px"><?=$xx['list_date']?></div>
		<div align="left" style="float:left; width:300px"><?=$xx['list_propery']."for".$xx['list_type']."<br>".$xx['list_project']."<br>".$xx['list_addr'].","?><? print $c->location2($xx['list_location']).",".$c->location1($xx['list_city'])?></div>
<div align="left" style="float:left; width:100px"><?=$xx['list_status']?></div>		
		<div align="left"><a href="?act=edit&id=<?=$xx['list_id']?>">Edit</a>
			<a href="?act=delete&id=<?=$xx['list_id']?>">Delete</a></div>
</div>	  
 
<? }}?>
</div>
<? }?>
<? if($_GET['act']=='expired'){?>
<div style=" margin-left:50px; margin-right:75px; border:1px solid">
<div style="background:#800000;">
<div style="float:left; width:75px" align="center"><input type="checkbox" id="cb" name="cb" onclick="checkUncheckAll(this);"/></div>
	<div align="center" class="style1" style="float:left; width:200px">Expiry Date</div>
		<div align="center" class="style1" style="float:left; width:300px">Property Details</div>
		<div align="center" class="style1" style="float:left; width:100px">Status</div>
		<div align="center" class="style1">Action</div>
</div>
<? $i=$a->expired($uid);
	   $x=$a->expired1($uid);
	   if($i==0){?>
<div align="center">No requirements found</div>
<? }else{
	   while($xx=mysql_fetch_array($x)){?>
	   <div style="background:#A8FFFF;;">
<div style="float:left; width:75px" align="center"><input type="checkbox" name="myCheckbox" ></div>
	<div align="left" style="float:left; width:200px"><?=$xx['list_date']?></div>
		<div align="left" style="float:left; width:300px"><?=$xx['list_propery']."for".$xx['list_type']."<br>".$xx['list_project']."<br>".$xx['list_addr'].","?><? print $c->location2($xx['list_location']).",".$c->location1($xx['list_city'])?></div>
<div align="left" style="float:left; width:100px"><?=$xx['list_status']?></div>		
		<div align="left"><a href="?act=edit&id=<?=$xx['list_id']?>">Edit</a>
			<a href="?act=delete&id=<?=$xx['list_id']?>">Delete</a></div>
</div>	  
 
<? }}?>
</div>
<? }?>
<? if($_GET['act']=='hold'){?>
<div style=" margin-left:50px; margin-right:75px; border:1px solid">
<div style="background:#800000;">
<div style="float:left; width:75px" align="center"><input type="checkbox" id="cb" name="cb" onclick="checkUncheckAll(this);"/></div>
	<div align="center" class="style1" style="float:left; width:200px">Expiry Date</div>
		<div align="center" class="style1" style="float:left; width:300px">Property Details</div>
		<div align="center" class="style1" style="float:left; width:100px">Status</div>
		<div align="center" class="style1">Action</div>
</div>
<? $i=$a->hold($uid);
	   $x=$a->hold1($uid);
	   if($i==0){?>
<div align="center">No requirements found</div>
<? }else{
	   while($xx=mysql_fetch_array($x)){?>
	   <div style="background:#A8FFFF;;">
<div style="float:left; width:75px" align="center"><input type="checkbox" name="myCheckbox" ></div>
	<div align="left" style="float:left; width:200px"><? print $a->exp1($xx['list_date'])?></div>
		<div align="left" style="float:left; width:300px"><?=$xx['list_property']." for ".$xx['list_type']."<br>".$xx['list_project']."<br>".$xx['list_addr'].","?><? print $c->location2($xx['list_location']).",".$c->location1($xx['list_city'])?></div>
<div align="left" style="float:left; width:100px"><?=$xx['list_status']?></div>		
		<div align="left"><a href="?act=edit&id=<?=$xx['list_id']?>">Edit</a>
			<a href="?act=del&id=<?=$xx['list_id']?>">Delete</a></div>
</div>	  
 
<? }}?>
</div>
<? }?>
<? if($_GET['act']=='del'){?>
<div style=" margin-left:50px; margin-right:75px; border:1px solid">
<div style="background:#800000;">
<div style="float:left; width:75px" align="center"><input type="checkbox" id="cb" name="cb" onclick="checkUncheckAll(this);"/></div>
	<div align="center" class="style1" style="float:left; width:200px">Expiry Date</div>
		<div align="center" class="style1" style="float:left; width:300px">Property Details</div>
		<div align="center" class="style1" style="float:left; width:100px">Status</div>
		<div align="center" class="style1">Action</div>
</div>
<? $i=$a->del($uid);
	   $x=$a->del1($uid);
	   if($i==0){?>
<div align="center">No requirements found</div>
<? }else{
	   while($xx=mysql_fetch_array($x)){?>
	   <div style="background:#A8FFFF;;">
<div style="float:left; width:75px" align="center"><input type="checkbox" name="myCheckbox" ></div>
	<div align="left" style="float:left; width:200px"><?=$xx['list_date']?></div>
		<div align="left" style="float:left; width:300px"><?=$xx['list_propery']."for".$xx['list_type']."<br>".$xx['list_project']."<br>".$xx['list_addr'].","?><? print $c->location2($xx['list_location']).",".$c->location1($xx['list_city'])?></div>
<div align="left" style="float:left; width:100px"><?=$xx['list_status']?></div>		
		<div align="left"><a href="?act=edit&id=<?=$xx['list_id']?>">Edit</a>
			<a href="?act=del&id=<?=$xx['list_id']?>">Delete</a></div>
</div>	  
 
<? }}?>
</div>
<? }?>
</div>
</form>
