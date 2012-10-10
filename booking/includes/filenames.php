<?php
class filenames{
function tables()
{
	define('ADM','cal_admin');
	define('CATS','cal_categories');
	define('USERS','cal_users');
	define('SLOTS','cal_timeslots');
	define('BOOK','cal_booking');
	define('BOOK_LIST','cal_booklist');
}// end fun
function pages()
{
	///////////////////////////				admin pages			////////////////////////////////////////////////
	define('ADM_HOME','myaccount.php');
	define('ADM_LOGOUT','logout.php');
	define('ADM_HEADER', 'header.php');
	define('ADM_FOOTER', 'footer.php');
	define('ADM_SERVICE','service.php');
	define('ADM_STATE','state.php');
	define('ADM_SITE','sites.php');
	define('ADM_COMPANY','company.php');
	define('ADM_SLOT','appointment.php');
	///////////////////////////				admin pages			////////////////////////////////////////////////
	define('FRONT_HOME','index.php');
	define('FRONT_HEADER','header.php');
	define('FRONT_FOOTER','footer.php');
	define('FRONT_LOG','login.php');
	define('FRONT_REG','reg.php');
	define('FRONT_THANKU','thanku.php');
	
	/////////////////////////////////		includes			///////////////////////////////////////////////////
	define('ADMIN_DATA','includes/admin_action.php');
	define('USER_DATA','includes/user_action.php');
	define('CSV_DOWN','includes/csv.php');
}
}
?>