<?php
/*
 * Function for xml SOAP resquest/response format
 *
 * Copyright (c) 2005-2006 Rack-Soft, LLC. All rights reserved.
 *
 * $Header: //itsd/devel/nix/voipnowsoap-php/interface/misc.php#2 $
 *
 * Modified: $DateTime: 2006/09/05 01:30:22 $ by $Author: bogdanc $ with $Change: 14952 $
 */

 /*!\fn format_xml(xml) {{{
 * \brief function that formats am xml string into an array of tags
 *
 * returns an array of tags
 *
 * \param $xml string with xml SOAP request/response
 *
 * \return format_xml array with tags
 */
function format_xml($xml) {
	$format_xml = array();
	for ($i = 0; $i < strlen($xml); $i++) {
		$start_pos = stripos($xml, '<');
		$stop_pos = stripos($xml, '>');
		$tag = substr($xml, $start_pos+1, $stop_pos-$start_pos-1);
		$xml = substr($xml, $stop_pos+1);

		/* search for ending tag in $xml remained */
		$end_tag = strstr($xml, '/' . $tag);
		if (strlen($end_tag) > 0) {
			$end_tag_pos = strlen($xml) - strlen($end_tag);
			if ((stripos($xml, '<')+1) == $end_tag_pos) {
				$value = substr($xml, 0, $end_tag_pos);
				$tag_name = $tag;
				$tag = $tag_name . '>' .$value. '/' .$tag_name;
				$xml = substr($end_tag, strlen($tag_name)+2);
			}
		}
		$format_xml[] = $tag;
	}
	$tags_no = count($format_xml);
	if ($tags_no > 0) {
		$format_xml[0] = '<'.$format_xml[0];
		$format_xml[$tags_no-1] = $format_xml[$tags_no-1].'>';
	}
	if (!empty($format_xml[1])) {
		$envelope = explode(' ', $format_xml[1]);
			for ($i = 1; $i < count($envelope)-1; $i++) {
				$envelope[$i] = $envelope[$i]."\n";
			}
		$format_xml[1] = implode(' ', $envelope);
		return $format_xml;
	} else {
		return FALSE;
	}
}/* }}} format_xml */

/*!\fn format_languages(languages) {{{
 * \brief function that formats a hash of languages in format 'code' => 'name'
 *
 * returns an array of languages
 *
 * \param $languages object with languages information
 *
 * \return format_lang array of languages
 */
function format_languages($languages) {
	$format_lang = array();
	if (is_array($languages) && !empty($languages)) {
		foreach ($languages as $key => $val) {
			$lang = get_object_vars($val);
			$format_lang[$lang['code']] = $lang['name'];
		}
	}
	return $format_lang;
}/* }}} format_languages */

/*!\fn split_faultstring(xml_string) {{{
 * \brief function that splits a faultstring to fit to a fix area
 *
 * returns a faultstring on more than 1 line
 *
 * \param $xml_string array with xml tags
 * \param $width fix area size
 *
 * \return xml_array formated array with xml tags
 */
function split_faultstring($xml_array, $width = '') {
	$search = 'faultstring>';
	if (!empty($xml_array)) {
		foreach ($xml_array as $key => $val) {
			if (is_numeric(strpos($val, $search))) {
				$length = 20;
				if (!empty($width)) {
					$length = $width/7;
				}
				$val = wordwrap($val, $length, "\n");
				$xml_array[$key] = $val;
			}
		}
		return $xml_array;
	} else {
		return FALSE;
	}
}/* }}} split_faultstring */
?>
