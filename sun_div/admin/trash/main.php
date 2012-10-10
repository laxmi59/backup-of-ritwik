<?
 session_start();
?>
<style type="text/css">

</style>
<body>
	<?
		if(!$_GET['lk'])
		{
			$ch='index';
		}
		else
		{
			$ch=$_GET['lk'];
		}
		//echo $ch;
		switch($ch)
		{
			case 'home'				:	include_once('home.php');	break;
			case 'cat'				:	include_once('cat.php');	break;
			case 'list'				:	include_once('list.php');	break;
			case 'post'				:	include_once('post.php');	break;
			case 'role'				:	include_once('role.php');	break;
			case 'user'				:	include_once('user-list.php');	break;
			case 'com'				:	include_once('com-list.php');	break;
			case 'change-password'	: 	include_once('change-password.php'); break;
			case 'location'			:	include_once('city.php');	break;
			case 'myaccount'		:	include_once('myaccount.php'); 	break;
			case 'myaccedit'		:	include_once('myaccedit.php');	break;
			case 'logout'			:	include_once('logout.php');	break;
			
		}
		?>
</body>