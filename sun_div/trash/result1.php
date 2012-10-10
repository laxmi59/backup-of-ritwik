<? session_start();
include "class/class.php";
include "dbcon.php";
$list= new real_list();
$b= new real_req();
$c= new real_location();
$reg= new real_reg();
$req=new req();
$prop=new real_property();
 
 
?>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style>
a:hover{text-decoration:underline;}
</style>
<script type="text/javascript">
var allPageTags = new Array();
function doSomethingWithClasses(theClass) {
//Populate the array with all the page tags
    var allPageTags=document.getElementsByTagName("*");
//Cycle through the tags using a for loop
    for (var i=0; i<allPageTags.length; i++) {
//Pick out the tags with our class name
      if (allPageTags[i].className==theClass) {
//Manipulate this in whatever way you want
        allPageTags[i].style.display='none';
      }
    }
  }

function Show(ids) {
  doSomethingWithClasses('RBtnTab');
  var obj = document.getElementById(ids);
  if (obj.style.display != 'block') { obj.style.display = 'block'; }
                               else { obj.style.display = 'block'; }
}
function Show1(ids) {
 doSomethingWithClasses('RBtnTab');
  var obj = document.getElementById(ids);
  if (obj.style.display != 'block') { obj.style.display = 'none'; }
                               else { obj.style.display = 'none'; }
}
</script>
<table width="90%" align="center" style="border:1px solid;">
<tr>
	<td colspan="3"><? include "header.php"?></td>
</tr>
<tr>
	<td valign="top"><? include "leftlocation.php"?></td>
	<td colspan="2">
	<table width="90%" align="center">
	<tr>
		<td>Location</td>
		<td>Specification</td>
		<td>Price</td>
		<td>Contact</td>
	</tr>
	<? if($_GET['id']){
			$xx1=$list->refid($_GET['id']);
	   }else if($_GET['aid']){
	   		$xx1=$list->areaid($_GET['aid']);
	   }
	 while($xx=mysql_fetch_array($xx1)){?>
	<tr>
		<td valign="top">
		<? print $prop->property2($xx['list_property'])." for ".$req->req1($xx['list_type'])."<br>".$xx['list_project']."<br>".$xx['list_addr'].","?>
		<? print $c->location2($xx['list_location']).",".$c->location1($xx['list_city'])?>
		</td>
		<td valign="top">Area <?=$xx['list_area']?>Sq.Ft<br /><?=$xx['list_bedroom']?>Bedrooms</td>
		<td valign="top">Rs.<?=$xx['list_price']?><br><? if($xx['list_pricing']=='yes'){ echo "Negotiable";}else{ echo "Not Negotiable";}?></td>
		<td valign="top">
			Real Id:<?=$xx['list_gid']."<br> Posted on".$xx['list_date']?>
			<br /><br />
			<? $reg1=$reg->reg11($xx['r_id']);
				echo $reg1['r_name']."<br>". $reg1['r_cname']."<br>".$reg1['r_ph1'];
			?>
		</td>
	</tr>
	
	<tr>
		<td colspan="3"></td>
		<td><input type="button" id="lDIV1" onclick="Show('DIV1')" value="Send Email" /></td>
	</tr>
	
	<tr>
		<td colspan="4">
		<div id='Content' style="display:block">
		<div id='DIV1' style="display:none">
		<table>
 		<tr>
			<td>Name : <input type="text" name="name" /></td>
			<td>Email : <input type="text" name="email" /></td>
			<td>Phone : <input type="text" name="phone" /></td>
			<td><input type="button" id="lDIV1" onclick="Show1('DIV1')" value="close" /></td>
		</tr>
		<tr>
			<td colspan="3">
				<textarea name="desc" readonly="readonly" rows="2" cols="40">I am interested in your property, Please contact me on the above mentioned contact details.</textarea>
			</td>
			<td><input type="submit" name="submit" value="send" /></td>
		</tr>
  		</table>
  		</div>
 		</div>
		</td>
	</tr>
<? }?>
</table>
</td>
</tr>
</table>
	