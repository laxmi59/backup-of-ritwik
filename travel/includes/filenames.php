<?
class filenames {
function tables()
{
	define('ADM','travel_admin');
	define('HOTELS','travel_hotels');
	
}// end fun
function pages()
{
	///////////////////////////				admin pages			////////////////////////////////////////////////
	define('ADM_MAIN','index.php');
	define('ADM_HOME','myaccount.php');
	define('ADM_LOGOUT','logout.php');
	define('ADM_HEADER', 'header.php');
	define('ADM_FOOTER', 'footer.php');
	define('ADM_HOTELS','hotels.php');
	///////////////////////////				admin pages			////////////////////////////////////////////////
	define('FRONT_HOME','home.php');
	define('FRONT_HEADER','header.php');
	define('FRONT_FOOTER','footer.php');
	define('FRONT_ABOUT','about.php');
	define('FRONT_CONTACT','contact.php');
	define('FRONT_TERMS','terms.php');
	define('FRONT_LEFT','sidebar_left.php');
	define('FRONT_RIGHT','sidebar_right.php');
	define('FRONT_CONTENT','content.php');
	define('FRONT_PRIVACY','privacy.php');
	define('FRONT_SITE','sitemap.php');
	////////////////////////////			Includes		////////////////////////////////
	define('ADMIN_DATA','admin_action.php');
	define('USER_DATA','includes/user_action.php');
}
function discount($price,$dis)
{
	$res=$price;
	$res1=$res*$dis/100;
	$result= $res-$res1;
	return $result;
}
}
?>