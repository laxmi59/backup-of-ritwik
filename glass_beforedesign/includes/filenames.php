<?
class filenames {
function tables()
{
	define('ADM','glass_admin');
	define('PRODUCT','glass_products');
	define('USERS','glass_users');
	define('CART','glass_cart');
}// end fun
function pages()
{
	///////////////////////////				admin pages			////////////////////////////////////////////////
	define('ADM_MAIN','index.php');
	define('ADM_HOME','myaccount.php');
	define('ADM_PRODUCTS','products.php');
	define('ADM_SELLERS','seller.php');
	define('ADM_USERS','users.php');
	define('ADM_LOGOUT','logout.php');
	define('ADM_HEADER', 'header.php');
	define('ADM_FOOTER', 'footer.php');
	///////////////////////////				admin pages			////////////////////////////////////////////////
	define('FRONT_HOME','index.php');
	define('FRONT_HEADER','header.php');
	define('FRONT_FOOTER','footer.php');
	define('FRONT_REG','reg.php');
	define('FRONT_LOG','login.php');
	define('FRONT_LOGOUT','logout.php');
	define('FRONT_THANKU','thanku.php');
	define('FRONT_ABOUT','about.php');
	define('FRONT_CONTACT','contact.php');
	define('FRONT_TERMS','terms.php');
	define('FRONT_PROFILE','myaccount.php');
	define('FRONT_LEFT','left.php');
	define('FRONT_RIGHT','right.php');
	define('FRONT_INFO','product_info.php');
	define('FRONT_CART','cart.php');
	define('FRONT_CONFIRM','confirm.php');
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