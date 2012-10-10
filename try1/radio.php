<script type="text/javascript">
function showpriviewtemplate(val,num)
{
	for(i=1;i<num;i++){
		if(i==val)
			document.getElementById('templatedisplay'+i).style.display="block";
		else
			document.getElementById('templatedisplay'+i).style.display="none";
	}
}

</script>
<table>
<tr>
<?php 
$tt=2;
for($i=1;$i<4;$i++){
?>
<td><input <?php if($tt==$i){?> checked="checked" <? }?> type="radio" name="temp" id="temp<?php echo $i?>" value="<?php echo $i?>" onClick="return showpriviewtemplate(this.value,4)">temp<?php echo $i?></td>
<? }?>
<!--<td><input type="radio" name="temp" id="temp2" value="2" onClick="return showpriviewtemplate(this.value,3)">temp2</td>
<td><input type="radio" name="temp" id="temp3" value="3" onClick="return showpriviewtemplate(this.value,3)">temp3</td>-->
</tr>
<tr>
<?php 
$arr1=array("","images/natobombserbia.jpg","images/main_central_image.jpg","images/image_preview.png");
for($j=1;$j<sizeof($arr1);$j++){?>
<td><div style="display:<?php if($tt==$j){ echo 'block';}else{echo 'none';}?>" id="templatedisplay<?php echo $j?>"><img src="<?php echo $arr1[$j]?>" height="50" width="50"></div></td>
<? }?>
<!--<td><div style="display:none" id="templatedisplay2"><img src="images/main_central_image.jpg" height="50" width="50"></div></td>
<td><div style="display:none" id="templatedisplay3"><img src="images/image_preview.png" height="50" width="50"></div></td>-->
</tr></table>