<table>
<tr>
<?php 
$limit =6;
for($no=2;$no<=20;$no++){
if($no == $limit){ echo "</tr><tr>"; $limit=$limit+4;}
?>
<td>
<table>
<?php for($i=1;$i<11;$i++){?>
<tr><td><?php echo $no."*".$i."=".$no*$i?></td></tr>
<?php }//no++;?>
</table></td>
<?php }?>
</tr>
</table>




































