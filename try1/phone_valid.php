<?
if($_POST[submit]){
	$ph1="^[0-9]{3}-[0-9]{3}-[0-9]{4}$";
	$ph2="^[0-9]{10}$";
	if(ereg($ph2, $_POST["phone"]) || ereg($ph1, $_POST["phone"]) )
		echo "valid";
	else
		echo "invalid";
}
?>

<form method="post">
<input type="text" name="phone" />
<input type="submit" name="submit" value="submit" />
</form>