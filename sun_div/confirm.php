<? session_start();
include "dbcon.php";
include "class/class.php";
$uid=$_SESSION['uid'];
$list=new real_list();
?>
<link type="text/css" href="css/style.css" rel="stylesheet" />
<div align="center">
<div style="width:980px" class="tabcolor"  >

	<div><? include "header.php"?></div>


	
	<div style="width:80%; height:233" align="center" >
 
    <div class="style4">
      <p align="left">Your Property have been successfully submitted to sunproperties.co.in. Refer  your clients, colleagues or partners directly to your real.com  property listing. Also, you can use the direct links of your property  listing on buisness cards and emails.</p>
    </div>
 
  <div align="left"><? $list1=$list->recent1();?>
    <span class="style3"><strong>Your Real ID is</strong></span><strong>  : <?=$list1['list_gid']?></strong>
  </div>
   <div>
    <p  align="left" class="style4">Your posting will go live on site within 48 hours. A confirmatory email  will be sent to you when posting will go live on real.com</p>
  </div>
  <div style="width:90%; border:1px solid #9CBEEE; height:100px">
  <div class="innertab" >
  <div class="style3" style="display:inline; float:left; padding-left:4%">Location</div>
  <div class="style3" style="display:inline;float:left; padding-left:10%">Specification</div>
  <div class="style3" style="display:inline;float:left; padding-left:13%">Price</div>
  <div class="style3" style="display:inline">Contact</div>  
   </div>
  <div class="linebreak">
  <div class="tabcolor" style="padding-top:2%">
  <? $aa=mysql_fetch_array(mysql_query("select * from `real-city` where cid='".$list1['list_city']."'"));?>
		<? $aaa=mysql_fetch_array(mysql_query("select * from `real-area` where aid='".$list1['list_location']."'"));?>
  <div style="float:left; padding-left:4%"><?=$list1['list_project']?><br>
			<?=$list1['list_addr']?><br>
			<?=$list1['list_city']?><br>
			<?=$aaa['name']?>
		</div>
		<div style="float:left; padding-left:10%" >area<?=$list1['list_area']?>sq ft<br>
			<?=$list1['list_bedroom']?>Bedrooms</div>
        <div style="float:left; padding-left:11%" ><?=$list1['list_price']?><br>
			<? if($list1['list_pricing']=='yes'){ echo "Negotiable";}else{ echo "not";}?></div>
        <div style="padding-left:10%" >Id:<?=$list1['list_gid']?><br>
			Posted on:<?=$list1['list_date']?></div>
			</div></div>
    
      
	
  </div></div>

	  
   
<div><p>&nbsp;</p>
    <br />
    <br />
    <p>&nbsp;</p></div>
<div><? include "footer.php"?></div>
</div></div>