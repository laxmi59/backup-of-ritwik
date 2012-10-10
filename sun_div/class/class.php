<?
//include "dbcon.php";
class real_list
{
	function setfield($value1,$value2){	$this->fieldname1=$value1;$this->fieldname2=$value2;	}
	
	function srch($id1,$id2){
		$x=mysql_query("select * from `real-list` where `".$this->fieldname1."`='".$id1."' and `".$this->fieldname2."`='".$id2."' and `list_status`='a' ");
		//echo "select * from `real-list` where `".$this->fieldname1."`='".$id1."' and `".$this->fieldname2."`='".$id2."' ";
		return $x;
	}
	
	// user active list
	function active($id){
		$x=mysql_num_rows(mysql_query("select * from `real-list` where r_id='".$id."' and list_status='a'"));return $x;	}
	//user active list
	function active1($id){
		$x=mysql_query("select * from `real-list` where r_id='".$id."' and list_status='a'");return $x;}
	// user hold list	
	function hold($id){
		$x=mysql_num_rows(mysql_query("select * from `real-list` where r_id='".$id."' and list_status='n'"));return $x;	}
	//user hold list	
	function hold1($id){
		$x=mysql_query("select * from `real-list` where r_id='".$id."' and list_status='n'");return $x;}
	// user delted list	
	function del($id){
		$x=mysql_num_rows(mysql_query("select * from `real-list` where r_id='".$id."' and list_status='d'"));return $x;	}
	// user deleted list
	function del1($id){
		$x=mysql_query("select * from `real-list` where r_id='".$id."' and list_status='d'");return $x;}
	// user expired list	
	function expired($id){
		$i=0;
		$xx=mysql_query("select * from `real-list` where r_id='".$uid."'");
		while($x=mysql_fetch_array($xx))	{
			$daystoadd=28;
			$hours=$daystoadd * 24;
			$newdate=date("Y-m-d", mktime($hours, $x['list_date']));
			return $newdate;
			if(!$newdate > date("Y-m-d")){
				//echo "aaa<br>";echo $newdate."<br>";	echo $x['list_date']."<br>";echo date("Y-m-d");echo "<br>";	$i++;
				$update=mysql_query("update `real-list` set list_status='e' where list_id='".$x['list_id']."'");
				$i++;}
		}return $i;}
	// user expired list
	function expired1($id){
		$x=mysql_query("select * from `real-list` where r_id='".$id."' and list_status='e'");return $x;}
	// expires the listing when due date over	
	function exp1($id){
		$xx=mysql_query("select * from `real-list` where r_id='".$uid."'");
		$x=mysql_fetch_array($xx);
		$daystoadd=28;
		$hours=$daystoadd * 24;
		$newdate=date("Y-m-d", mktime($hours, $x['list_date']));
		return $newdate;}
	// admin total lists
	function totlist($id){
		$x=mysql_num_rows(mysql_query("select * from `real-list` where r_id='".$id."'"));return $x;	}
	// deleted lists
	function delete($id){
		$x=mysql_query("update `real-list` set list_status='d' where list_id='".$id."' "); return $x;}
	//	new lists
	function list1(){
		$x=mysql_num_rows(mysql_query("select * from `real-list` where list_status='n'"));return $x;	}
	// new lists	
	function list2(){
		$x=mysql_query("select * from `real-list` where list_status='n'");return $x;}
	// activate lists	
	function listactive($id){
		$x=mysql_query("select * from `real-list` where list_status='".$id."' and post_by='user'");return $x;	}
	// Admin lists
	function adminlist(){
		$x=mysql_query("select * from `real-list` where post_by='admin' and list_status='a'");
		//echo "select * from `real-list` where post_by='admin' and list_status='a'";
		return $x;	}
		
	function adminlist1($id){
		$x=mysql_num_rows(mysql_query("select * from `real-list` where post_by='".$id."' and list_status='a'"));return $x;	}
		
	function adminblock(){
		$x=mysql_query("select * from `real-list` where post_by='admin' and list_status='d'");
		//echo "select * from `real-list` where post_by='".$id."'";
		return $x;	}
	function adminblock1($id){
		$x=mysql_num_rows(mysql_query("select * from `real-list` where post_by='".$id."' and list_status='d'"));return $x;	}
		
	// activate lists	
	function listactive1($id){
		$x=mysql_num_rows(mysql_query("select * from `real-list` where list_status='".$id."' and post_by='user'"));return $x;	}
	// for recent posts	
	function recent(){
		$x=mysql_query("select * from `real-list` order by  list_id desc limit 0 , 3"); return $x;}
	// for thank u page	
	function recent1(){
		$x=mysql_fetch_array(mysql_query("select * from `real-list` order by  list_id desc limit 0 , 1")); return $x;}
	// for searching by reference id
	/*function refid($id){
		$x=mysql_fetch_array(mysql_query("select * from `real-list` where list_gid='".$id."'")); return $x;}*/
	function refid($id){
		$x=mysql_query("select * from `real-list` where list_gid='".$id."' and `list_status`='a'"); return $x;}
	// Searching by location
	function areaid($id){
		$x=mysql_query("select * from `real-list` where list_city='".$id."' and `list_status`='a'"); 
		//echo "select * from `real-list` where list_city='".$id."'";
		return $x;}
	function propid($id){
		$x=mysql_query("select * from `real-list` where list_property='".$id."' and `list_status`='a'"); 
		//echo "select * from `real-list` where list_city='".$id."'";
		return $x;}
	//area wise list	
	function areas($id){
		$x=mysql_num_rows(mysql_query("select * from `real-list` where list_location='".$id."'")); return $x;}
	function areasid($id){
		$x=mysql_query("select * from `real-list` where list_location='".$id."' and list_status='a'"); return $x;}
		
}
class real_req
{
	function setfield($value1,$value2){	$this->fieldname1=$value1; $this->fieldname2=$value2;	}
	
	function srch($id1,$id2){
		$x=mysql_query("select * from `real-requirement` where `".$this->fieldname1."`='".$id1."' and `".$this->fieldname2."`='".$id2."'"); return $x;
	}
	// users buy
	function buy($id){
		$x=mysql_num_rows(mysql_query("select * from `real-requirement` where r_id='".$id."' and req_type='3'"));return $x;}
	// user buy1
	function buy1($id){
		$x=mysql_query("select * from `real-requirement` where r_id='".$id."' and req_type='3'");return $x;}
	// users rent
	function rent($id){
		$x=mysql_num_rows(mysql_query("select * from `real-requirement` where r_id='".$id."' and req_type='1'"));return $x;}
	// user rent
	function rent1($id){
		$x=mysql_query("select * from `real-requirement` where r_id='".$id."' and req_type='1'");return $x;}	
	// users new reqs	
	function post1(){
		$x=mysql_num_rows(mysql_query("select * from `real-requirement` where req_status='n'"));return $x;}
	// new reqs				
	function post2(){
		$x=mysql_query("select * from `real-requirement` where req_status='n'");return $x;}	
	// total reqs	
	function totpost($id){
		$x=mysql_num_rows(mysql_query("select * from `real-requirement` where r_id='".$id."'"));return $x;}
	// status	
	function postactive1($id){
		$x=mysql_num_rows(mysql_query("select * from `real-requirement` where req_status='".$id."'"));return $x;}
	// status	
	function postactive($id){
		$x=mysql_query("select * from `real-requirement` where req_status='".$id."'");return $x;}
		
	
}
class real_location
{
	function setfield($value){
		$this->fieldname=$value;
	}
	function areas($id){
		$x=mysql_query("select * from `real-area` where `".$this->fieldname."`='".$id."'");return $x;
	}	
	// for myreg country
	function location($id)	{
		$aa=mysql_fetch_array(mysql_query("select * from `real-city` where cid='".$id."'"));
		$a=$aa['city_name']; return $a;}
	function location_city()	{
		$aa=mysql_query("select * from `real-city1` ");
		//$a=$aa['city_name']; 
		return $aa;}
		
		function location_country()	{
		$aa=mysql_query("select * from `real-countries`");
		 return $aa;}
		
	// for myreg country
	function location1($id)	{
		$aa=mysql_fetch_array(mysql_query("select * from `real-countries` where cid='".$id."'"));
		$a=$aa['value'];   return $a;}
	
	function location2($id){
		$aa=mysql_fetch_array(mysql_query("select * from `real-area` where aid='".$id."'"));
		$a=$aa['name']; return $a;}
		
	
	function location21(){
		$a=mysql_num_rows(mysql_query("select * from `real-area`"));return $a;}
	
	function location22(){
		$a=mysql_query("select * from `real-area`");return $a;}
		
	function location11()	{
		$a=mysql_num_rows(mysql_query("select * from `real-city`"));return $a;}
	function location12($id)	{
		$aa=mysql_fetch_array(mysql_query("select * from `real-city` where cid='".$id."'"));
		$a=$aa['city_name'];   return $a;}
		
	function location122()	{
		$aa=mysql_query("select * from `real-city`");
		 return $aa;}
		
	function country($id){
		$a=mysql_fetch_array(mysql_query("select * from `real-countries` where cid='".$id."'"));
		$aa=$a['value']; return $aa;}
	// city id	(total cities)
	function city1($id){
		$a=mysql_fetch_array(mysql_query("select * from `real-city` where cid='".$id."'"));
		$aa=$a['city_name']; return $aa;}
	
	
}
class real_reg
{
	function reg($id){
		$x=mysql_query("select * from `real-reg` where r_id='".$id."'"); return $x;}
		
	function reg1($id){
		$x=mysql_fetch_array(mysql_query("select * from `real-reg` where r_id='".$id."'")); 
		$xx=$x['r_un'];return $xx;}
	function reg11($id){
		$x=mysql_fetch_array(mysql_query("select * from `real-reg` where r_id='".$id."'")); return $x;}
		
	function regactive(){
		$x=mysql_num_rows(mysql_query("select * from `real-reg` where r_status='a'")); return $x;}
	function regactive1(){
		$x=mysql_query("select * from `real-reg` where r_status='a'"); return $x;}	
		
	function regblock(){
		$x=mysql_num_rows(mysql_query("select * from `real-reg` where r_status='d'")); return $x;}	
	function regblock1(){
		$x=mysql_query("select * from `real-reg` where r_status='d'"); return $x;}		
	
	function regnew(){
		$x=mysql_num_rows(mysql_query("select * from `real-reg` where r_status='n'")); return $x;}
		
	function regnew1(){
		$x=mysql_query("select * from `real-reg` where r_status='n'"); return $x;}	
	
}
class location
{
	
	function loc(){
		$x=mysql_query("select * from city where cid='101'"); return $x;}
		
	function loc1(){
		$x=mysql_query("select * from countries"); return $x;}
	
}
class real_property
{
	// groups
	function property($id){
		$x=mysql_fetch_array(mysql_query("select * from `real-property` where p_group='".$id."'"));return $x;}
	// group type	
	function property1($id){
		$x=mysql_query("select * from `real-property` where ptype='".$id."'");return $x;}
	// pid wise
	function property2($id){
		$x=mysql_fetch_array(mysql_query("select * from `real-property` where pid='".$id."'"));
		$xx=$x['pname'];return $xx;}
}
class real_featured_build
{
	var $tablename="real_builders";
	function setfield($value){	$this->fieldname=$value;	}
	
	function tot_rec(){
		$x=mysql_query("select * from `".$this->tablename."` "); return $x;
	}
	function tot_rec_limit($start,$q_limit){
		$x==mysql_query("select * from `".$this->tablename."` LIMIT ".$start.", ".$q_limit."");
		echo "select * from `".$this->tablename."` LIMIT ".$start.", ".$q_limit."";
		 return $x;
	}
	function single_rec($id){
		$x=mysql_fetch_array(mysql_query("select * from `".$this->tablename."` where `".$this->fieldname."`='".$id."' "));
		//echo "select * from `".$this->tablename."` where `".$this->fieldname."`='".$id."' ";
		return $x;
	}
}
class real_featured_proj
{
	var $tablename="real_projects";
	function setfield($value){	$this->fieldname=$value;	}
	
	function tot_rec(){
		$x=mysql_query("select * from `".$this->tablename."` "); return $x;
	}
	function tot_rec_limit($start,$q_limit){
		$x==mysql_query("select * from `".$this->tablename."` LIMIT ".$start.", ".$q_limit."");
		echo "select * from `".$this->tablename."` LIMIT ".$start.", ".$q_limit."";
		 return $x;
	}
	function single_rec($id){
		$x=mysql_fetch_array(mysql_query("select * from `".$this->tablename."` where `".$this->fieldname."`='".$id."' "));
		//echo "select * from `".$this->tablename."` where `".$this->fieldname."`=".$id." ";
		 return $x;
	}
}
class valid
{
	function notempty($a,$b)
	{
		if($a=='')
		{
			$x= $b;
			return $x;
		}
		else
		{
			$x='';
			return $x;
		}
		
	}
	function ischoose($a,$b)
	{
		if ($a == '' || $b == '')
		{
        	$x=$b;
			return $x;
    	}	 
		else
		{
			$x='';
			return $x;
		}
    }
	function pass($a,$b)
	{
		if(!$a=='')
		{
			if(strlen($a)<6 || strlen($a)>20)
			{
    			$x=$b;
				return $x;
 			}
			else
			{
				$x='';
				return $x;
			}
		}
	}
	function samepass($a,$b,$c)
	{
		if(!$a=='' && !$b==''){
			if($a <> $b)
			{
				$x=$c;
				return $x;
			}
			else
			{
				$x='';
				return $x;
			}
		}
	}
	function isvalidemail($a,$b)
	{
		if(!$a==''){
			if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $a)) 
			{
	    		$x = $b;
				return $x;
  			}
			else
			{
				$x='';
				return $x;
			}
		}
	}
	
		function isnumaric($a,$b)
	{
		if(!$a==''){
			if(!eregi("[0-9]",$a))
			{
				$x=$b;
				return $x;
			}
			else
			{
				$x='';
				return $x;
			}
		}
	}
	
	
	function isphno($a,$b)
	{
		if(!$a==''){
			if(!eregi("[0-9]",$a))
			{
				$x=$b;
				return $x;
			}
			else
			{
			   $len=strlen($a);
			   if($len < 10)
				{
                   $x='Phone number should contain 10 digits';
			       return $x;
			    }
				else
				{
				$p=substr($a,0,1);
				          if($p!='9'){
				            $x='Mobile number sholud stsrt with 9';
				            return $x;}
						
				
				}	
				
			
				$x='';
				return $x;
			}
		}
	}
	function notempty1($a,$b,$c)
	{
		if($a=='' && $b==''){
			$x=$c;
			return $x;
		}
		else
		{
			$x='';
			return $x;
		}
		
	}
	function validgender($a,$b)
	{
		if($a=='')
		{
			$x=$b;
			return $x;
		}else{
			$x='';
			return $x;
		}
	}
	
	
	
}
class req
{
	function req1($id)
	{
		if($id=='1'){ $x= "Rent";}
		else if($id=='2'){ $x= "Buy";}
		else if($id=='3'){ $x= "Sell";}
		return $x;
	}
	function flor($id)
	{
		$xx=mysql_fetch_array(mysql_query("select * from `real-list` where list_floor_no='".$id."'"));
		//echo "select * from `real-list` where list_id='".$id."'";
		if($id=='11'){ $x="Under Construction";}
		elseif($id=='12'){$x="Basement";}
		elseif($id=='13'){$x="Ground Floor";}
		elseif($id=='14'){$x="Mezzanine Floor";}
		else{ $x = $xx['list_floor_no'];}
		//echo $xx['list_floor_no'];
		return $x;
	}
}
class real_approval
{
	function accept($id,$tab,$setcol,$col,$loc)
	{
		//echo $id."<br>".$tab;
		$update=mysql_query("update `".$tab."` set `".$setcol."`='a' where `".$col."`=".$id."");
		echo "update `".$tab."`set req_status='a' where req_id=".$id."";
		echo $loc;
	}
	function block($id)
	{
		$update=mysql_query("update `user-reg` set user_status='r' where user_id='".$id."'");
		echo "<script>location.replace('main.php?lk=home&act=block')</script>";
	}
	/*function del($id,$tab,$id1,$loc)
	{
		//$del = mysql_query("DELETE FROM '".$tab."' WHERE ".$id1." = ".$id."");
		echo "DELETE FROM '".$tab."' WHERE ".$id1." = ".$id."";
		echo "<script>location.replace('".$loc."')</script>";
	}*/
}

?>