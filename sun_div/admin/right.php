<?
require_once("pagination.php");
$q_limit = 15;
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
<link href="../css/style.css" type="text/css" rel="stylesheet" />
<table width="100%">
<!--<tr>
	<td>&nbsp;</td>
</tr>-->
<tr>
	<td>
		<? if($_GET['act']=='profile'){
		$reg1=$reg->reg11($_SESSION['aid']);
		//echo $reg1['r_name'];
		//echo $_SESSION['aid'];
		?>
		<table align="center" width="70%" class="innertab" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="3" class="style3">Profile</td>
		</tr>
		<tr class="linebreak"><td colspan="3">&nbsp;</td></tr>
		<tr class="tabcolor">
			<td width="49%" class="style4 trpad">Name</td>
			<td width="7%"> : </td>
			<td width="44%" ><?=$reg1['r_name']?></td>
		</tr>
		<tr class="linebreak"><td colspan="3">&nbsp;</td></tr>
		<tr class="tabcolor">
			<td class="trpad style4">User name</td>
			<td>:</td><td><?=$reg1['r_un']?></td>
		</tr>
		<tr class="linebreak"><td colspan="3">&nbsp;</td></tr>
		<tr class="tabcolor">
			<td class="trpad style4">Email</td>
			<td>:</td><td><?=$reg1['r_email']?></td>
		</tr>
		<tr class="linebreak"><td colspan="3">&nbsp;</td></tr>
		<tr class="tabcolor">
			<td class="trpad style4">Created</td>
			<td>:</td>
			<td> <?=$reg1['r_date']?></td>
		</tr>
		<tr class="linebreak"><td colspan="3">&nbsp;</td></tr>
		<tr class="tabcolor">
			<td colspan="3" align="center">
				<input type="button" name="btn" value="Edit" onclick="javascript:location='home.php?act=profile1'"  class="btn" />
			</td>
		</tr>
		<tr class="linebreak"><td colspan="3">&nbsp;</td></tr>
		</table>
		<? }?>
		<? if($_GET['act']=='profile1'){
		$reg1=$reg->reg11($_SESSION['aid']);
		?>
		<form method="post">
		<table align="center" width="70%" class="innertab" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="3" class="style3">Edit Profile</td>
		</tr>
		<tr class="linebreak"><td colspan="3">&nbsp;</td></tr>
		<tr class="tabcolor">
			<td width="49%" class="style4 trpad">Name</td>
			<td width="7%"> : </td>
			<td width="44%" ><input type="text" name="r_name" value="<?=$reg1['r_name']?>" /></td>
		</tr>
		<tr class="linebreak"><td colspan="3">&nbsp;</td></tr>
		<tr class="tabcolor">
			<td class="trpad style4">User name</td>
			<td>:</td><td><input type="text" name="r_un" value="<?=$reg1['r_un']?>"></td>
		</tr>
		<tr class="linebreak"><td colspan="3">&nbsp;</td></tr>
		<tr class="tabcolor">
			<td class="trpad style4">Email</td>
			<td>:</td><td><input type="text" name="r_email" value="<?=$reg1['r_email']?>" /></td>
		</tr>
		<tr class="linebreak"><td colspan="3">&nbsp;</td></tr>
		<tr class="tabcolor">
			<td class="trpad style4">Created</td>
			<td>:</td>
			<td><input type="text" name="r_date" value="<?=$reg1['r_date']?>" readonly="" /></td>
		</tr>
		<tr class="linebreak"><td colspan="3">&nbsp;</td></tr>
		<tr class="tabcolor">
			<td colspan="3" align="center">
				<input type="submit" name="btn" value="Save" class="btn" />
			</td>
		</tr>
		<tr class="linebreak"><td colspan="3">&nbsp;</td></tr>
		</table>
		</form>
		<?
		if($_POST['btn']){
			extract($_POST);
			print_r($_POST);
			$update= mysql_query("update `real-reg` set `r_name`='$r_name', `r_un`='$r_un',`r_email`='$r_email' where r_id=1");
			
			echo "<script>location.replace('home.php?act=profile')</script>";
			}
		?>
	<? }?>
	<? //////////////////////////////////////////////////////////////////////////////////////////////////////////?>
	<? if($_GET['act']=='pass'){
	$reg1=$reg->reg1($_SESSION['aid']);
		if($_POST['submit1'])
		{
			//echo "aa";
			extract($_POST);
			$y=new valid();
			$user_pw1_valid 	=$y->notempty($_POST['pw1']," Old Password Should not be Empty");
			$user_pw_valid 		=$y->notempty($_POST['user_pw']," New Password Should not be Empty");
			$user_pw_valid_size	=$y->pass($_POST['user_pw'],"length in between 6 and 20");
			$user_rpw_valid		=$y->notempty($_POST['user_rpw'],"Confirm Password Should not be Empty");
			$user_pws_valid		=$y->samepass($_POST['user_pw'] , $_POST['user_rpw'],"Both passwords must be same");
			//echo $user_pw1_valid."<br>".$user_pw_valid."<br>".$user_pw_valid_size."<br>".$user_rpw_valid."<br>".$user_pws_valid;
	if($user_pw1_valid == '' && $user_pw_valid =='' && $user_pw_valid_size == '' && $user_rpw_valid == '' && $user_pws_valid == '')
			{
				//echo "bb";
				if($_POST['pw']==$_POST['pw1'])
				{
	            	$update=mysql_query("update `real-reg` set r_pw='".$_POST['user_pw']."' where r_id='".$_SESSION['aid']."'");
					//echo "update `user-reg` set user_pw='".$_POST['user_pw']."' where user_id='".$_SESSION['uid']."'";
					$msg= "password successfully changed ";
					
				}else{
				//echo "bb";
					$msg ="Old password is not correct. Enter correct password";
				}
			}
		}	?>
	<span style="padding-left:150px;" class="style30"><?=$msg?></span><br><br>
	<form method="post" ><!--onSubmit="return validateForm(this);"-->
	<input type="hidden" name="pw" value="<?=$reg1['r_pw']?>">
	<table width="80%" align="center" class="innertab" cellpadding="0" cellspacing="0">
		<tr>
		  <td colspan="3" align="center" class="style3"><strong>Change Password</strong></td>
		</tr>
		<tr class="linebreak"><td colspan="3" align="center" class="style31">&nbsp;</td>
		
		<tr class="tabcolor">
			<td width="39%" class="style4 trpad">Enter old password</td>
			<td width="5%">:</td>
		 	<td width="56%" class="style31">
				<input name="pw1" type="password" value="<?=$_POST['pw1']?>"/><span class="style31"><?=$user_pw1_valid?></span>
			</td>
		</tr>
		<tr class="linebreak"><td colspan="3" align="center" class="style31"></td>
		
		<tr class="tabcolor">
			<td class="style4 trpad" >Enter new password</td>
			<td>:</td>
			<td>
				<input name="user_pw" type="password" value="<?=$_POST['user_pw']?>"/>
				<span class="style31"><?=$user_pw_valid?><br><?=$user_pws_valid?><br><?=$user_pw_valid_size?></span>
			</td>
		</tr>
		
		<tr class="tabcolor">
			<td class="style4 trpad" >Confirm password</td>
			<td>:</td>
			<td>
				<input name="user_rpw" type="password" value="<?=$_POST['user_rpw']?>" />
				<span class="style31"><?=$user_rpw_valid?></span>
			</td>
		</tr>
		<tr class="linebreak"><td colspan="3"></td></tr>
		<tr class="tabcolor">
			<td align="center" colspan="3">
			<input name="submit1" type="submit" class="btn" value="add" />
			&nbsp;&nbsp;
			<!--<input name="btn" type="button" class="btn" onClick="javascript:window.location='myaccount1.php'" value="Cancel">-->
			</td>
		</tr>
		<tr class="linebreak"><td colspan="3"></td></tr>
	</table>
	</form>
	
	<? }?>
	<? if($_GET['act']=='listactive' || $_GET['act']=='listnew' || $_GET['act']=='listblock' || $_GET['act']=='adminlist'|| $_GET['act']=='adminblock'){?>
	<table border="0"  width="90%" align="center" cellpadding="0" cellspacing="0" class="innertab">
	<tr>
		<!--<td height="21" align="center"><input type="checkbox" id="cb" name="cb" onclick="checkUncheckAll(this);"/></td>-->
		<td align="center"><span class="style3">Expiry Date</span></td>
		<td align="center"><span class="style3">Property Details</span></td>
		<!--<td align="center"><span class="style3">status</span>-->
		<td align="center"><span class="style3">User name</span></td>
		<td align="center"><span class="style3">Action</span></td>
	</tr>
	<? 	//$a=new list2();
		if($_GET['act']=='listactive'){
			$pid= "a";
			$num1=$list->listactive($pid);
			$i=mysql_query("select * from `real-list` where list_status='a' and post_by='user' LIMIT $start, $q_limit");
			$filePath="home.php?act=listactive&";
			
		}elseif($_GET['act']=='listnew'){
			$pid= "n";
			$num1=$list->listactive($pid);
			$i=mysql_query("select * from `real-list` where list_status='n' and post_by='user' LIMIT $start, $q_limit");
			$filePath="home.php?act=listnew&";
		}elseif($_GET['act']=='listblock'){
			$pid= "d";
			$num1=$list->listactive($pid);
			$i=mysql_query("select * from `real-list` where list_status='d' and post_by='user' LIMIT $start, $q_limit");
			$filePath="home.php?act=listblock&";
		}elseif($_GET['act']=='adminlist'){
			$pid= "a";
			$num1=$list->adminlist($pid);
			$i=mysql_query("select * from `real-list` where `post_by`='admin' and list_status='a' LIMIT $start, $q_limit");
			//echo "select * from `real-list` where `post_by`='admin' LIMIT $start, $q_limit";
			$filePath="home.php?act=adminlist&";
		}elseif($_GET['act']=='adminblock'){
			$pid= "d";
			$num1=$list->adminblock($pid);
			$i=mysql_query("select * from `real-list` where `post_by`='admin' and list_status='d' LIMIT $start, $q_limit");
			//echo "select * from `real-list` where `post_by`='admin' LIMIT $start, $q_limit";
			$filePath="home.php?act=adminblock&";
		}
		$num=mysql_num_rows($num1);
		
		if($num==0){?>
	<tr class="tabcolor">
		<td colspan="5" align="center">No require ments found</td>
	</tr>
	<? }else{
	   while($xx=mysql_fetch_array($i)){?>
	<tr class="tabcolor">
		<!--<td align="center"><input type="checkbox" name="myCheckbox" ></td>-->
		<td class="style4" style="padding-left:10px;"><div align="center"><? print $list->exp1($xx['list_date']);?></div></td>
		<?
			if($xx['list_type']=='1')
		    { $b= "Rent";}
		   	else if($xx['list_type']=='3')
		  	{$b= "Sale";}
		?>
		<td class="style4" style="padding-left:10px;">
		<?=$prop->property2($xx['list_property'])." for ".$b."<br>".$xx['list_project'].", "?>
		<?=$xx['list_location'].",".$xx['list_city']?></td>
		<? //$abc=$reg->reg1($xx['r_id']);
			//echo $abc;
		//echo $a['r_id']?>
		<td class="style4">
		  <div align="center">
		    <? if($xx['r_id']==0) echo "admin";?>
	      <? print $reg->reg1($xx['r_id']);?>		</div></td>
		<td class="style4" style="padding-left:10px;">
			<div align="center">
			  <? if($_GET['act']=='listactive'){?>
			  <a href="home.php?act=block&id=<?=$xx['list_id']?>&name=<?="listactive"?>" class="b">Block</a>
		      <? }else if($_GET['act']=='listnew'){?>
			  <a href="home.php?act=accept&id=<?=$xx['list_id']?>&name=<?="listnew1"?>" class="b">Active</a>
			  <a href="home.php?act=block&id=<?=$xx['list_id']?>&name=<?="listnew2"?>" class="b">Block</a>
		      <? }else if($_GET['act']=='listblock'){?>
			  <a href="home.php?act=accept&id=<?=$xx['list_id']?>&name=<?="listblock"?>" class="b">Active</a>
		      <? }else if($_GET['act']=='adminlist'){?>
			  <a href="home.php?act=block&id=<?=$xx['list_id']?>&name=<?="adminblock"?>" class="b">Block</a>
			  <a href="fast1.php?id=<?=$xx['list_id']?>" class="b">Edit</a>
		      <? }else if($_GET['act']=='adminblock'){?>
			  <a href="home.php?act=accept&id=<?=$xx['list_id']?>&name=<?="adminactive"?>" class="b">Active</a>
		      <? }?>		
		    </div></td>
	</tr>
	<tr class="tabcolor"><td colspan="4" class="style4"><hr /></td></tr>
	<? }}?>
	<tr class="tabcolor">
		<td colspan="5" align="center" class="style4"><? paginate($start,$q_limit,$num,$filePath,"");?></td>
	</tr>
	</table>
	<? }?>
	<? if($_GET['act']=='postactive' || $_GET['act']=='postnew' || $_GET['act']=='postblock'){?>
		<table border="0"  width="90%" align="center" cellpadding="0" cellspacing="0" class="innertab">
		<tr class="innertab">
		<!--<td align="center"><input type="checkbox" id="cb" name="cb" onclick="checkUncheckAll(this);"/></td>-->
		<td align="center"><span class="style3">Post Date</span></td>
		<td align="center"><span class="style3">Requirement Details</span></td>
		<td align="center"><span class="style3">User Name</span></td>
		<td align="center"><span class="style3">Action</span></td>
	</tr>
	<? 	//$i=$post->post2();
		if($_GET['act']=='postactive'){
			$pid="a";
			$num1=$post->postactive($pid);
			$i=mysql_query("select * from `real-requirement` where req_status='a' LIMIT $start, $q_limit");
			$filePath="home.php?act=postactive&";
		}elseif($_GET['act']=='postnew'){
			$pid="n";
			$num1=$post->postactive($pid);
			$i=mysql_query("select * from `real-requirement` where req_status='n' LIMIT $start, $q_limit");
			$filePath="home.php?act=postnew&";
		}elseif($_GET['act']=='postblock'){
			$pid="d";
			$num1=$post->postactive($pid);
			$i=mysql_query("select * from `real-requirement` where req_status='d' LIMIT $start, $q_limit");
			$filePath="home.php?act=postblock&";
		}
		$num=mysql_num_rows($num1);
		
	    if($num==0){?>
	   <tr class="tabcolor">
	   		<td colspan="5" align="center">No requirements found</td>
		</tr>
		<? }else{
	   while($xx=mysql_fetch_array($i)){?>
	<tr class="tabcolor">
		<!--<td align="center"><input type="checkbox" name="myCheckbox" ></td>-->
		<td class="style4" style="padding-left:10px;"><div align="center">
		  <?=$xx['req_date']?>
		  </div></td>
		<td class="style4" style="padding-left:10px;">
		<? echo "To ".$xx['req_type']." An ".$xx['req_property']." In ";?>
		<? print $loc->location1($xx['req_city']);?></td>
		<td class="style4"><div align="center"><? print $reg->reg1($xx['r_id']);?></div></td>
		<td class="style4" style="padding-left:10px;">
			<div align="center">
			  <? if($_GET['act']=='postactive'){?>
			  <a href="home.php?act=block&id=<?=$xx['req_id']?>&name=<?="postactive"?>" class="b">Block</a>
		      <? }else if($_GET['act']=='postnew'){?>
			  <a href="home.php?act=accept&id=<?=$xx['req_id']?>&name=<?="postnew1"?>" class="b">Active</a>
			  <a href="home.php?act=block&id=<?=$xx['req_id']?>&name=<?="postnew2"?>" class="b">Block</a>
		      <? }else if($_GET['act']=='postblock'){?>
			  <a href="home.php?act=accept&id=<?=$xx['req_id']?>&name=<?="postblock"?>" class="b">Active</a>
		      <? }?>		
		    </div></td>
	</tr>
	<? }}?>
	<tr class="tabcolor">
		<td colspan="5" align="center" class="style4"><? paginate($start,$q_limit,$num,$filePath,"");?></td>
	</tr>
	</table>
	<? }?>
	<? if($_GET['act']=='active' || $_GET['act']=='new' || $_GET['act']=='block'){
	?>
	<table border="0"  width="90%" align="center" cellpadding="0" cellspacing="0" class="innertab">
		<tr>
			<!--<td align="center"><input type="checkbox" id="cb" name="cb" onclick="checkUncheckAll(this);"/></td>-->
			<td class="style3"><div align="center">User Name</div></td>
			<td class="style3"><div align="center">Country</div></td>
			<td class="style3"><div align="center">City</div></td>
			<td class="style3"><div align="center">Requirements</div></td>
			<td class="style3"><div align="center">listings</div></td>
			<td class="style3"><div align="center">Action</div></td>
		</tr>
		<tr class="tabcolor"><td colspan="7">&nbsp;</td></tr>
		<?
		if($_GET['act']=='active'){
			$active1=$reg->regactive1();
			$active2=mysql_query(" SELECT * FROM `real-reg` where r_status='a' LIMIT $start, $q_limit");
			$filePath="home.php?act=active&";
		}else if($_GET['act']=='new'){
			$active1=$reg->regnew1();
			$active2=mysql_query(" SELECT * FROM `real-reg` where r_status='n' LIMIT $start, $q_limit");
			$filePath="home.php?act=new&";
		}else if($_GET['act']=='block'){
			$active1=$reg->regblock1();
			$active2=mysql_query(" SELECT * FROM `real-reg` where r_status='d' LIMIT $start, $q_limit");
			$filePath="home.php?act=block&";
		}
		$num=mysql_num_rows($active1);
		if($num==0){?>
		<tr class="tabcolor">
			<td colspan="7"align="center">No require ments found</td>
		</tr>
		<? }
		while($active=mysql_fetch_array($active2)){
		?>
		<tr class="tabcolor">
			<!--<td align="center"><input type="checkbox" name="myCheckbox" ></td>-->
			<td class="style4">
			  <div align="center">
			    <?=$active['r_un']?>
	          </div></td>
			<td class="style4"><div align="center"><? print $loc->country($active['country'])?></div></td>
			<td class="style4"><div align="center"><? print $loc->city1($active['location'])?></div></td>
			<td class="style4"><div align="center"><? print $post->totpost($active['r_id'])?></div></td>
			<td class="style4"><div align="center"><? print $list->totlist($active['r_id'])?></div></td>
			<td class="style4">
			  
		      <div align="center">
		        <? if($_GET['act']=='active'){?>
		        <a href="home.php?act=block&id=<?=$active['r_id']?>&name=<?="regactive"?>" class="b">Block</a>
		        <? }else if($_GET['act']=='new'){?>
		        <a href="home.php?act=accept&id=<?=$active['r_id']?>&name=<?="regnew1"?>" class="b">Active</a>
		        <a href="home.php?act=block&id=<?=$active['r_id']?>&name=<?="regnew2"?>" class="b">Block</a>
		        <? }else if($_GET['act']=='block'){?>
		        <a href="home.php?act=accept&id=<?=$active['r_id']?>&name=<?="regblock"?>" class="b">Active</a>
		        <? }?>			
                </div></td>
		</tr>
		<tr class="tabcolor"><td colspan="7">&nbsp;</td></tr>
		<? }?>
		<tr class="tabcolor">
			<td colspan="7" align="center" class="style4"><? paginate($start,$q_limit,$num,$filePath,"");?></td>
		</tr>
	</table>
	<? }?>
	<? if($_GET['act']=='accept'){
		
		//echo $_GET['name']."<br>".$_GET['id'];
		//break;
		
		////////////////// for post requirements//////////////////////////////////////
		if($_GET['name']=='postnew1' || $_GET['name']=='postblock'){
			$update=mysql_query("update `real-requirement` set `req_status`='a' where `req_id`=".$_GET['id']."");
			//echo "update `".$tab."`set req_status='a' where req_id=".$id."";
			if($_GET['name']=='postnew1'){
				echo "<script>location.replace('home.php?act=postnew')</script>";
			}elseif($_GET['name']=='postblock'){
				echo "<script>location.replace('home.php?act=postblock')</script>";
			}
		}
		////////////////////////// for list properties///////////////////////////////
		if($_GET['name']=='listnew1' || $_GET['name']=='listblock'){
			$update=mysql_query("update `real-list` set `list_status`='a' where `list_id`=".$_GET['id']."");
			//echo "update `".$tab."`set req_status='a' where req_id=".$id."";
			if($_GET['name']=='listnew1'){
				echo "<script>location.replace('home.php?act=listnew')</script>";
			}elseif($_GET['name']=='listblock'){
				echo "<script>location.replace('home.php?act=listblock')</script>";
			}
		}
		
		////////////////////////// for users///////////////////////////////
		if($_GET['name']=='regnew1' || $_GET['name']=='regblock'){
		 //echo "aaa";
		 //break;
			//$update=mysql_query("update `real-reg` set `r_status`='a' where `r_id`=".$_GET['id']."");
			$update=mysql_query("update `real-reg` set `r_status`='a' where `r_id`=".$_GET['id']."");
			//echo "update `".$tab."`set req_status='a' where req_id=".$id."";
			echo "aaa";
			if($_GET['name']=='regnew1'){
				echo "<script>location.replace('home.php?act=new')</script>";
			}elseif($_GET['name']=='regblock'){
				echo "<script>location.replace('home.php?act=block')</script>";
			}
		}
		if($_GET['name']=='adminactive'){
			$update=mysql_query("update `real-list` set `list_status`='a' where `list_id`=".$_GET['id']."");
			echo "<script>location.replace('home.php?act=adminblock')</script>";
		}
	}?>
	<? if($_GET['act']=='block'){
		////////////////// for post requirements//////////////////////////////////////
		if($_GET['name']=='postnew2' || $_GET['name']=='postactive'){
			$update=mysql_query("update `real-requirement` set `req_status`='d' where `req_id`=".$_GET['id']."");
			//echo "update `".$tab."`set req_status='a' where req_id=".$id."";
			if($_GET['name']=='postnew2'){
				echo "<script>location.replace('home.php?act=postnew')</script>";
			}elseif($_GET['name']=='postactive'){
				echo "<script>location.replace('home.php?act=postactive')</script>";
			}
		}
		////////////////////////// for list properties///////////////////////////////
		if($_GET['name']=='listnew2' || $_GET['name']=='listactive'){
			$update=mysql_query("update `real-list` set `list_status`='d' where `list_id`=".$_GET['id']."");
			//echo "update `".$tab."`set req_status='a' where req_id=".$id."";
			if($_GET['name']=='listnew2'){
				echo "<script>location.replace('home.php?act=listnew')</script>";
			}elseif($_GET['name']=='listactive'){
				echo "<script>location.replace('home.php?act=listactive')</script>";
			}
		}
		
		////////////////////////// for users///////////////////////////////
		if($_GET['name']=='regnew2' || $_GET['name']=='regactive'){
			$update=mysql_query("update `real-reg` set `r_status`='d' where `r_id`=".$_GET['id']."");
			//echo "update `".$tab."`set req_status='a' where req_id=".$id."";
			if($_GET['name']=='regnew2'){
				echo "<script>location.replace('home.php?act=new')</script>";
			}elseif($_GET['name']=='active'){
				echo "<script>location.replace('home.php?act=active')</script>";
			}
		}
		if($_GET['name']=='adminblock'){
			$update=mysql_query("update `real-list` set `list_status`='d' where `list_id`=".$_GET['id']."");
			echo "<script>location.replace('home.php?act=adminlist')</script>";
		}
	}?>
	</td>
	</tr>
</table>