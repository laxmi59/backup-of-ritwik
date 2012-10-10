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
   <div>
 
          <div align="center" style="float:left; width:15%" ><strong>Buy/Rent</strong></div> 
           <div align="center" style="float:left; width:15%"><strong>Property Type</strong> </div> 
           <div align="center" style="float:left; width:15%"><strong>Desired Area </strong></div> 
           <div align="center" style="float:left; width:15%"><strong>Amount  From </strong></div> 
           <div align="center" style="float:left; width:15%"><strong>Amount To  </strong></div> 
           <div align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Bedrooms</strong></div> 
       </div>
	   <div>
          <div align="center" style="float:left; width:15%" ><select name="req_type" id="req_type" onChange="Selectlocation();" style="width:100px;">
              <option value="">select</option>
                   </select>  </div> 
           <div align="center" style="float:left; width:15%">
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
          </select>    </div> 
           <div align="center" style="float:left; width:15%"><select name="req_area"  style="width:100px;">
            <option value="">select</option>
            <?
			$yy=$y->location21();
			while($yyy=mysql_fetch_array($yy)){?>
            <option><?=$yyy['name']?></option>
            <?	}
		?>
          </select></div> 
		  
           <div align="center" style="float:left; width:15%"> <SELECT  name="req_budject1" id="req_budject1" onChange="Selectlocation1();"  style="width:100px;" >
            <Option value="">select</option>
          </SELECT>  </div> 
		  
           <div align="center" style="float:left; width:15%"><SELECT id="req_budject2"  NAME="req_budject2"  style="width:100px;">
	        <option value="">select</option>
          </SELECT>	   </div> 
		  
           <div align="center" style="float:left; width:15%"><select name="req_bedroom" id="req_bedroom"  style="width:100px;">
        <option value="">select</option>
        <option value="1">Min 1 Bedroom</option>
        <option value="2">Min 2 Bedrooms</option>
        <option value="3">Min 3 Bedrooms</option>
        <option value="4">Min 4 Bedrooms</option>
        <option value="5">Min 5 Bedrooms</option>
        </select>    </div> 
		<div><input type="submit" name="go" value="Go">
		</div>
       </div>
	   </form>
	   </body>