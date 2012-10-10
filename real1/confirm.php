<? session_start();
include "dbcon.php";
include "class/class.php";
$uid=$_SESSION['uid'];
$list=new real_list();
?>
<link type="text/css" href="css/style.css" rel="stylesheet" />
<table width="980" cellpadding="0" cellspacing="0" class="tabcolor" align="center" >
<tr>
	<td colspan="3"><? include "header.php"?></td>
</tr>
<tr>
	<td colspan="3">
	<table width="80%" height="233" align="center" >
  <tr>
    <td class="style4">Your Property have been successfully submitted to real.com. Refer  your clients, colleagues or partners directly to your real.com  property listing. Also, you can use the direct links of your property  listing on buisness cards and emails.</td>
  </tr>
  <tr><? $list1=$list->recent1();?>
    <td><span class="style3"><strong>Your Real ID is</strong></span><strong>  : <?=$list1['list_gid']?></strong></td>
  </tr>
   <tr>
    <td class="style4">Your posting will go live on site within 48 hours. A confirmatory email  will be sent to you when posting will go live on real.com</td>
  </tr>
  <tr>
    <td><table width="90%" align="center" cellpadding="0" cellspacing="0" class="innertab">
      <tr>
        <th class="style3" scope="col">Location</th>
        <th class="style3" scope="col">Specification</th>
        <th class="style3" scope="col">Price</th>
        <th class="style3" scope="col">Contact</th>
      </tr>
	  <tr class="linebreak"><td colspan="4"></td></tr>
	  <tr class="tabcolor">
	  	<? $aa=mysql_fetch_array(mysql_query("select * from `real-city` where cid='".$list1['list_city']."'"));?>
		<? $aaa=mysql_fetch_array(mysql_query("select * from `real-area` where aid='".$list1['list_location']."'"));?>
		<td align="center"><?=$list1['list_project']?><br>
			<?=$list1['list_addr']?><br>
			<?=$aa['city_name']?><br>
			<?=$aaa['name']?>
		</td>
        <td align="center" valign="top">area<?=$list1['list_area']?>sq ft<br>
			<?=$list1['list_bedroom']?>Bedrooms</td>
        <td align="center" valign="top"><?=$list1['list_price']?><br>
			<? if($list1['list_pricing']=='yes'){ echo "Negotiable";}else{ echo "not";}?></td>
        <td align="center" valign="top">Id:<?=$list1['list_gid']?><br>
			Posted on:<?=$list1['list_date']?></td>
      </tr>
	
    </table></td>
  </tr>
</table>

	</td>
	</tr>
<tr><td colspan="3"><p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p></td></tr>
<tr><td colspan="3"><? include "footer.php"?></td></tr>
</table>