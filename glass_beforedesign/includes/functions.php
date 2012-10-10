<?php session_start();

class common_functions{
	function connect_to_database()
	{
		if ((@mysql_connect(DB_HOST,DB_USER,DB_PWD)) && (@mysql_select_db(DB_NAME)))
			return true;
			else
			return false;
	}
}
?>