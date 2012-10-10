<?
if($_POST['submit'])
{
	extract($_POST);
	//print_r($_POST);
	$x=new valid();
	$com_un_valid 		=$x->notempty($_POST['old']," Old Password Should not be Empty");
	$com_pw_valid 		=$x->notempty($_POST['new']," New Password Should not be Empty");
	$com_pw_valid_size	=$x->pass($_POST['new'],"length in between 6 and 20");
	$com_rpw_valid		=$x->notempty($_POST['new1'],"Confirm Password Should not be Empty");
	$com_pws_valid		=$x->samepass($_POST['new'] , $_POST['new1'],"Both passwords must be same");
	
	if($com_un_valid<>'' && $com_pw_valid<>'' && $com_pw_valid_size<>'' && $com_rpw_valid<>''&& $com_pws_valid<>'')
	{
		if($_POST['pw']==$_POST['old']){  
			$update=mysql_query("update `real-reg` set `r_pw`='".$new."' where `r_id`='".$uid."'");
			echo "<script>location.replace('myaccount.php?act=show')</script>";
		}else{
			$msg ="Old password is not correct. Enter correct password";
		}
	}
}
?>
<link href="css/style.css" type="text/css" rel="stylesheet" />
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
function del(nid)
{
	if(confirm("Are you sure? Do You want to delete this Record?"))
	{
		document.location.href = '?act=DLT&id='+nid;
	}
}
function del1(nid,rid)
{
	//alert("aa");
	if(confirm("Are you sure? Do You want to delete this Record?"))
	{
		document.location.href = '?act=DLT1&id='+nid+'&rid='+rid;
	}
}
</script>
<link href="style.css" rel="stylesheet" type="text/css" />
<form method="post">
<table width="100%">
<tr>
	<td class="menutitle">
		<? if($_GET['act']=='rent') {?>	<b>To Rent</b>
		<? }elseif($_GET['act']=='buy'){?><b>To Buy</b>
		<? }elseif($_GET['act']=='active'){?><b>Active</b>
		<? }elseif($_GET['act']=='expired'){?><b>Expired</b>
		<? }elseif($_GET['act']=='hold'){?><b>Hold</b>
		<? }elseif($_GET['act']=='del'){?><b>Deleted</b><? }?>
		
	</td>
</tr>
<? if($_GET['act']=='rent' || $_GET['act']=='buy'){?>
<tr>
	<td valign="top">
	<table border="0"  width="100%" align="center" cellpadding="0" cellspacing="0" class="innertab">
	<tr class="style2">
		<!--<td align="center"><input type="checkbox" id="cb" name="cb" onclick="checkUncheckAll(this);"/></td>-->
		<td align="center"><span class="style3">Post Date</span></td>
		<td align="center"><span class="style3">Requirement Details</span></td>
		<td align="center"><span class="style3">Matching Properties</span></td>
		<td align="center"><span class="style3">Action</span></td>
		
	</tr>
	
	 <tr class="linebreak" style="height:8px"><td colspan="5"></td></tr>
	<? if($_GET['act']=='rent'){
		//$i=$b->rent($uid);
	   	//$x=$b->rent1($uid);
		$b->setfield('r_id','req_type');
		$x=$b->srch($uid,1);
		$i=mysql_num_rows($x);
	}else if($_GET['act']=='buy'){
		//$i=$b->buy($uid);
	   	//$x=$b->buy1($uid);
		$b->setfield('r_id','req_type');
		$x=$b->srch($uid,3);
		$i=mysql_num_rows($x);
	}
	   if($i==0){?>
	  
	   <tr class="tabcolor">
	   		<td colspan="5" align="center">No require ments found</td>
		</tr>
		<? }else{
	   while($xx=mysql_fetch_array($x)){?>
	<tr class="tabcolor">
		<!--<td align="center"><input type="checkbox" name="myCheckbox" ></td>-->
		<td class="style4 trpad"><?=$xx['req_date']?></td>
		<td class="style4 trpad">
		<? echo "To ".$req->req1($xx['req_type'])." An ".$prop->property2($xx['req_property'])." In ";?>
		<? echo $xx['req_city']." At ". $xx['req_area'];?></td>
		<td align="center">
			<?
				$a->setfield('list_property','list_location');
				$res=$a->srch($xx['req_property'],$xx['req_area']);	
				$res1=mysql_num_rows($res);
				$resfet=mysql_fetch_array($res);
			?>
			
			<a style="text-decoration:none;" href="result.php?id=<?=$resfet['list_gid']?>"><? print "(".$res1.")" ?></a>
			</td>
		<td class="style4 trpad">
			<!--<a href="=<?=$xx['req_id']?>">Edit</a>-->
			<a href="javascript:del(<?=$xx['req_id']?>)"  class="b">Delete</a>		</td>
	</tr>
	<tr class="tabcolor" style="height:8px"><td colspan="5"></td></tr>
	<? }}?>
	</table>
	</td>
</tr>
<? }?>
<? if($_GET['act']=='active' || $_GET['act']=='expired' || $_GET['act']=='hold'||$_GET['act']=='del') {?>
<tr>
	<td valign="top">
	<table border="0"  width="100%" align="center" cellpadding="0" cellspacing="0" class="innertab">
	<tr>
		<!--<td align="center"><input type="checkbox" id="cb" name="cb" onclick="checkUncheckAll(this);"/></td>-->
		<td align="center"><span class="style3">Expiry Date</span></td>
		<td align="center"><span class="style3">Property Details</span>
		<!--<td align="center"><span class="style1">status</span>-->
		<td align="center"><span class="style3">Action</span></td>
	</tr>
	<tr class="linebreak" style="height:8px"><td colspan="5"></td></tr>
	<? if($_GET['act']=='active'){
		$i=$a->active($uid);
		$x=$a->active1($uid);
		$j=1;
	  }else if($_GET['act']=='expired'){
	  	$i=$a->expired($uid);
	    $x=$a->expired1($uid);
		$j=2;
	  }else if($_GET['act']=='hold'){
	  	$i=$a->hold($uid);
	   	$x=$a->hold1($uid);
		$j=3;
	  }else if($_GET['act']=='del'){
	  	$i=$a->del($uid);
	    $x=$a->del1($uid);
		$j=4;
	  }
	   if($i==0){?>
	   <tr class="tabcolor">
	   		<td colspan="5" align="center">No require ments found</td>
		</tr>
		<? }else{
	   while($xx=mysql_fetch_array($x)){?>
	<tr class="tabcolor">
		<!--<td align="center"><input type="checkbox" name="myCheckbox" ></td>-->
		<td class="style4 trpad"><? print $a->exp1($xx['list_date']);?></td>
		<?
			/*if($xx['list_type']=='1')
		    { $b= "Rent";}
		   else if($xx['list_type']=='2')
		   {$b= "Sale";}*/
		?>
		<td class="style4 trpad">
		<? print $prop->property2($xx['list_property'])." for ".$req->req1($xx['list_type'])." in ".$xx['list_project']."<br>"?>
		<?=$xx['list_location'].",".$xx['list_city']?></td>
		<!--<td style="padding-left:10px;"><?=$xx['list_status']?></td>-->
		<td class="style4 trpad">
			<a href="myaccount.php?act=fast1&id=<?=$xx['list_id']?>" class="del">Edit</a>
			<a href="javascript:del1(<?=$xx['list_id']?>,<?=$j?>)" class="del">Delete</a>		</td>
	</tr>
	<tr class="linebreak" style="height:8px"><td colspan="5"></td></tr>
	<? }}?>
	</table>
	</td>
</tr>
<? }?>
<? if($_GET['act']=='pass'){?>
<tr>
	<td>
	<table width="95%" align="center" cellpadding="0" cellspacing="0" class="innertab">
	<tr>
		<td colspan="3" class="style3" >Change Password</td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor"><td colspan="3" class="style11"><?=$msg?></td></tr>
	<? $select=mysql_fetch_array(mysql_query("select * from `real-reg` where `r_id`='".$_SESSION['uid']."'"));?>
	<input type="hidden" name="pw" value="<?=$select['r_pw'];?>">
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="style4 trpad">Old password</td>
		<td>:</td>
		<td><input type="password" name="old" value="<?=$_POST['old']?>" /><span class="style11"><?=$com_un_valid?></span></td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="style4 trpad">New password</td>
		<td>:</td>
		<td><input type="password" name="new" value="<?=$_POST['new']?>"  /><span class="style11"><?=$com_pw_valid?><?=$com_pw_valid_size?><?=$com_pws_valid?></span></td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td class="style4 trpad">Confim password</td>
		<td>:</td>
		<td><input type="password" name="new1" value="<?=$_POST['new1']?>"  /><span class="style11"><?=$com_rpw_valid?></span></td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	<tr class="tabcolor">
		<td colspan="3" align="center"><input type="submit" name="submit" value="change" /></td>
	</tr>
	<tr class="linebreak"><td colspan="3"></td></tr>
	</table>
	</td>
</tr>
<? }?>
<? if($_GET['act']=='edit'){?>
<tr>
<td>
<? include "fast1.php";?>
</td>
</tr>
<? }?>
</table>
</form>
<?
if($_GET['act'] == 'DLT')
{
	$del = mysql_query("DELETE FROM `real-requirement` WHERE `req_id` = ".$_GET['id']."");
	//echo "delete from job-post where job_id = ".$_GET['id']."";
	echo "<script>location.replace('myaccount.php?act=rent')</script>";
}
if($_GET['act'] == 'DLT1')
{
	$del = mysql_query("DELETE FROM `real-list` WHERE `list_id` = ".$_GET['id']."");
	if($_GET['rid']==1){$j="<script>location.replace('myaccount.php?act=active')</script>";}
	elseif($_GET['rid']==2){$j="<script>location.replace('myaccount.php?act=expired')</script>";}
	elseif($_GET['rid']==3){$j="<script>location.replace('myaccount.php?act=hold')</script>";}
	elseif($_GET['rid']==4){$j="<script>location.replace('myaccount.php?act=del')</script>";}
	echo $j;
}
?>