<?php
if($_POST['submit']){
extract($_POST);
	if(stripos($name, "-") == false){
		echo $name;
	}else{
		echo "dont use hypen(-) in your name";
	}
}
?>
<script type="text/javascript">
function valid(){
	function trimfun(stringToTrim) {
		return stringToTrim.replace(/^\s+|\s+$/g,"");
	}
	if(trimfun(document.getElementById("name").value)=="") {
		alert("Enter Name");
		document.getElementById("name").focus();
		return false;
	}else
	if(trimfun(document.getElementById("name").value)!="") {
		str=trimfun(document.getElementById("name").value);
		if(str.indexOf("-")!=-1){
			alert("Dont use hypen(-) in your name");
			document.getElementById("name").focus();
			return false;
		}
	}	
	return true;
}
</script>
<form name="Registration_form" id="Registration_form" method="post" onSubmit="return valid();">Your name: <textarea name="name" id="name"><?=$_POST['name']?></textarea>
<input type="submit" name="submit" value="submit"  />
</form>
