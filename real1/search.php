<?
include "db/dbcon.php";
include "class/class.php";
$x=new real_property();
$y=new real_location();

if($_POST['go'])
{
	extract($_POST);
	print_r($_POST);
}
?>
<script type="text/javascript" src="js/ruppees1.js"></script>
<body onLoad="fillCategory()">
   <form name="drop_list" method="post">
      <table width="90%" border="0" cellspacing="0" cellpadding="0">
        
        <tr>
          <td><div align="center"><strong>Buy/Rent</strong></div></td>
          <td><div align="center"><strong>Property Type</strong> </div></td>
          <td><div align="center"><strong>Desired Area </strong></div></td>
          <td><div align="center"><strong>Amount  From </strong></div></td>
          <td><div align="center"><strong>Amount To  </strong></div></td>
          <td><div align="center"><strong>Bedrooms</strong></div></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>
            <select name="req_type" id="req_type" onChange="Selectlocation();" style="width:100px;">
              <option value="">select</option>
              <!--<option id="abc2" value="Rent" onClick="return rent();">Rent</option>
		    <option value="Buy" onClick="return buy();">Buy</option>-->
            </select>          </td>
        <td>
          <select name="req_property" id="req_property" onChange="abc();" style="width:100px;">
            <option value="">select</option>
            <?
			//$i=1;
			for($i=1;$i<3;$i++){
			$xx=$x->property($i);?>
            <optgroup label="<?=$xx['pname']?>" style="background:#EBEBEB"></optgroup>
            <? 
			$j=$x->property1($i);
			while($xxx=mysql_fetch_array($j)){?>
            <option value="<?=$xxx['pid']?>" id="<?=$xxx['ptype']?>"><?=$xxx['pname']?></option>
            <? }}?>
          </select>          </td>
        <td>
          <select name="req_area"  style="width:100px;">
            <option value="">select</option>
            <?
			$yy=$y->location21();
			while($yyy=mysql_fetch_array($yy)){?>
            <option><?=$yyy['name']?></option>
            <?	}
		?>
          </select>          </td>
        <td>
          <SELECT  name="req_budject1" id="req_budject1" onChange="Selectlocation1();"  style="width:100px;" >
            <Option value="">select</option>
          </SELECT>          </td>
	    <td>
	      <SELECT id="req_budject2"  NAME="req_budject2"  style="width:100px;">
	        <option value="">select</option>
          </SELECT>	      </td>
	    
    <td>
      <select name="req_bedroom" id="req_bedroom"  style="width:100px;">
        <option value="">select</option>
        <option value="1">Min 1 Bedroom</option>
        <option value="2">Min 2 Bedrooms</option>
        <option value="3">Min 3 Bedrooms</option>
        <option value="4">Min 4 Bedrooms</option>
        <option value="5">Min 5 Bedrooms</option>
        </select>      </td>
        <td><input type="submit" name="go" value="Go"></td>
      </tr>
      </table>
</form>
</body>
