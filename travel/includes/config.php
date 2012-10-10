<?php
class configure{

function configure()
{
	define('DB_HOST','localhost');
	/*define('DB_USER','one3in_travels');
	define('DB_PWD','travels');
	define('DB_NAME','one3in_travels');
	
	define('BASE',"http://3one.in/projects/travels/");
	define('ADMIN',"http://3one.in/projects/travels/admin/");*/
	
	define('DB_USER','root');
	define('DB_PWD','');
	define('DB_NAME','hotels');
	
	define('BASE',"http://localhost/rama/travel/");
	define('ADMIN',"http://localhost/rama/travel/admin/");
	
	define('WEBSITE_NAME',"Vegas Travel Point");
	define('ADMIN_EMAIL','rama.3one@gmail.com');
	define('CONTACTUS','000-000-000');
	
	define('RECORDS_PER_PAGE',15);
	
	define('PAYPAL_ADDRESS','https://www.paypal.com/cgi-bin/webscr');
	define("PAYPAL_POSTBACK_ADDRESS",'www.paypal.com');
	define('PAYMENT_PAYPAL_BUSINESS_ID','skyhighmoviesinc@gmail.com');//prakashvenkata@yahoo.com//nagaappireddy@yahoo.co.in
	define('CURRENCY_CODE','USD');
	
	define('CONSTRUCTION','Page Under Construction');
	
}//end fun

}//end class
?>
