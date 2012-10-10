<?php

/*

Copyright 2007 Jonathan Street jonathan@torrentialwebdev.com
http://torrentialwebdev.com/

This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

require('compete.class.php');

$compete = new compete_wrapper;
if($compete->query_compete('gmail.com'))
{
	//If there is no error then query_compete returns TRUE
	//Upon an error it returns FALSE

	//Get processed data
	/*$res=$compete->get_trust();
	echo $res[val];*/
	
	echo "<pre>";
	print_r($compete->get_trust());
	print_r($compete->get_traffic());
	print_r($compete->get_deals());
	
	//Get raw data
	
	print_r($compete->results);
	echo $compete->results->dmn;
	echo "</pre>";
	

}

?>