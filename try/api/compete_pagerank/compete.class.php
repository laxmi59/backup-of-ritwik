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

class compete_wrapper 
{
	
	var $api_key = 'pmqwzgmgy5dvanqmnsm8subx';
	var $query_base = 'http://api.compete.com/fast-cgi/MI?';
	var $version = 3;
	var $size = 'large';
	
	var $results;
	
	function query_compete ($url)
	{
		$data = simplexml_load_file($this->construct_query($url));
		
		if($data == FALSE)
		{
			return FALSE;
		}
		else {
			$this->results = $data;
			return TRUE;
		}
	}
	
	function construct_query ($url)
	{
		$query = $this->query_base;
		$query .= 'd=' . $url;
		$query .= '&ver=' . $this->version;
		$query .= '&apikey=' . $this->api_key;
		if ($this->size != NULL)
		{
			$query .= '&size=' . $this->size;
		}
		return $query;
	}
	
	function get_trust ()
	{
		$results['val'] = trim((string)$this->results->dmn->trust->val);	
		$results['link'] = trim((string)$this->results->dmn->trust->link);
		$results['icon'] = trim((string)$this->results->dmn->trust->icon);
		return($results);
	}
	
	function get_traffic ()
	{
		$results['year'] = trim((string)$this->results->dmn->metrics->val->yr);
		$results['month'] = trim((string)$this->results->dmn->metrics->val->mth);
		$results['ranking'] = trim((string)$this->results->dmn->metrics->val->uv->ranking);
		
		$results['count'] = trim((string)$this->results->dmn->metrics->val->uv->count);
		$results['count_int'] = (int)implode('', explode(',', $results['count']));
		
		$results['link'] = trim((string)$this->results->dmn->metrics->link);
		$results['icon'] = trim((string)$this->results->dmn->metrics->icon);
		return($results);
	}
	
	function get_deals ()
	{
		$results['val'] = (int)$this->results->dmn->deals->val;
		$results['link'] = trim((string)$this->results->dmn->deals->link);
		$results['icon'] = trim((string)$this->results->dmn->deals->icon);
		return $results;
	}
}


?>