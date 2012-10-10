<?
class valid
{
	function notempty($a){
		if($a=='')
		{
			$x="not empty";
		}
		else
		{
			$x="correct";
		}
		return $x;
	}
}
?>
<?
    $message    = "";
    $emailclass = "basictext";
    $username   = "";

    if ($_POST['process'] == 1) {

        $pattern = '/.*@.*\..*/';
        $email   = $_POST['email'];
        $urlname = urlencode($$_POST['username']);

        if (preg_match($pattern, $_POST['email']) > 0) {
            // Here's where you would store 
            // the data in a database...
            header(
              "location: thankyou.php?&username=$urlname");
        }
        $message    = "Please enter a valid email address.";
        $username   = $_POST['name'];
        $emailclass = "errortext";
    }
?>