<?php

class Push_Highrise{

	var $highrise_url = 'https://affiliatemedia.highrisehq.com'; // your highrise url, e.g. http://yourcompany.highrisehq.com
	var $api_token = '6ea2e9b89358faa37d7d036c3ea7a0ae'; // your highrise api token; can be found under My Info
	var $task_assignee_user_id = '535354'; // user id of the highrise user who gets the task assigned 
	var $category = ''; // the category where deals will be assigned to
	
	var $errorMsg = "";
	
		
	function pushContact($request){
		//Check that person doesn't already exist
		
		$id = $this->_person_in_highrise($request);
		if($id < 0){				
			$curl = curl_init($this->highrise_url.'/people.xml');
			curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
			curl_setopt($curl,CURLOPT_USERPWD,$this->api_token.':x'); 
			
			curl_setopt($curl,CURLOPT_HTTPHEADER,Array("Content-Type: application/xml"));
			curl_setopt($curl,CURLOPT_POST,true);
			curl_setopt($curl,CURLOPT_POSTFIELDS,'<person>
				<first-name>'.htmlspecialchars($request['sFirstName']).'</first-name>
				<last-name>'.htmlspecialchars($request['sLastName']).'</last-name>
				<background>'.htmlspecialchars($request['staff_comment']).'</background>
				<company-name>'.htmlspecialchars($request['sCompany']).'</company-name>
				<contact-data>
					<email-addresses>
						<email-address>
							<address>'.htmlspecialchars($request['sEmail']).'</address>
							<location>Work</location>
						</email-address>
					</email-addresses>	
				</contact-data>
			</person>');
	
			curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
			curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
	
			$xml = curl_exec($curl);
			curl_close($curl);		
			$res = simplexml_load_string($xml);
			echo "<pre>";
			print_r($res);
		}else{
			echo "Person already in Highrise";
		}
		return '';
	}
	
	//Search for a person in Highrise 
	function _person_in_highrise($person){
	
	$curl = curl_init($this->highrise_url.'/people/search.xml?term='.$person['sEmail']);
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($curl,CURLOPT_USERPWD,$this->api_token.':x'); //Username (api token, fake password as per Highrise api)

		curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
		curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);

		$xml = curl_exec($curl);
		curl_close($curl);	
		
		//Parse XML
		$people = simplexml_load_string($xml);
		echo($people);
		$id = '-1';
		foreach ($people->person as $person ) {
			if($person != null) {
				$id = $person->id;
			}	
		}
		return $id;
		
		/*$curl = curl_init();
		echo $highRise_url = $this->highrise_url.'/people/search.xml?term='.urlencode($person['sFirstName'].' '.$person['sLastName']);
	//set the url, number of POST vars, POST data
		curl_setopt($curl, CURLOPT_URL, $highRise_url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_USERPWD,$this->api_token.':x');		
		//curl_setopt($curl,CURLOPT_HTTPHEADER,Array("Content-Type: application/xml"));
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/xml', 'Content-Type: application/xml'));
		curl_setopt($curl,CURLOPT_POST,true);
		
		//curl_setopt($curl, CURLOPT_POSTFIELDS, $newsletter_data_post);
		
		curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
		curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);

		$xml = curl_exec($curl);
			$err2		= curl_errno($curl); 
			$errmsg2	= curl_error($curl);
			$header2	= curl_getinfo($curl);
			
			echo "<pre>";
			print_r($xml);
			print_r($err2);
			print_r($errmsg2);
			print_r($header2);
			curl_close($curl);	
		
		//Parse XML
		$people = simplexml_load_string($xml);
		//print_r($people);exit;
		$id = '-1';
		foreach ($people->person as $person ) {
			if($person != null) {
				$id = $person->id;
			}	
		}
		return $id;*/
		
	}	
	
}

?>