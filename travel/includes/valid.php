<?
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
?>