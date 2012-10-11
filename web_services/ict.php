<?php
error_reporting(0);
$email = "test17sep2012@yopmail.com";
$fname = "test";
$lname = "123";
$program_name = "cap123";
$skype="test";


//$isSpam=spamControl();
//$icontact = saveInIcontact($email);
//$highrise=saveInHighrise($fname,$lname,$email,$skype,$program_name);
$webiner=saveInWebiner($email,$fname,$lname)


	
// ******************************************** Start of Spamer API ************************************************************
/*function spamControl(){
	$chspam = curl_init();
	$chspam_url="http://www.stopforumspam.com/api?ip=".$_SERVER['REMOTE_ADDR']."&api_key=nrsyph73wabq0z&f=json";
	//spammer ip
	//$chspam_url="http://www.stopforumspam.com/api?ip=91.232.96.12&api_key=nrsyph73wabq0z&f=json";
		
	curl_setopt($chspam, CURLOPT_URL, $chspam_url);
	curl_setopt($chspam, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($chspam, CURLOPT_HEADER, false);
	curl_setopt($chspam, CURLOPT_FOLLOWLOCATION, false);
	curl_setopt($chspam, CURLOPT_POST, 14);
		
	//execute post
	$chspam_res	= curl_exec($chspam);	
	$test=json_decode($chspam_res);
	//close connection
	curl_close($chspam);
	
	if($test->ip->frequency == 0){
		return "valid";
	}else{
		return "Your IP address matches a reported spam address.";
	}
}*/
// ******************************************** end of Spamer API ************************************************************


// ******************************************** Start of Icontact API ************************************************************
/*function saveInIcontact($email){
	$ch2 = curl_init();
	$icontact_url="http://app.icontact.com/icp/signup.php";
	if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){
		echo "Please enter valid email";
		exit;
	}else{
		$newsletter_data_post="fields_email=".$email."&listid=33877&specialid:33877=XCSX&clientid=144974&formid=2661&reallistid=1&doubleopt=0";
		//set the url, number of POST vars, POST data
		curl_setopt($ch2, CURLOPT_URL, $icontact_url);
		curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch2, CURLOPT_HEADER, true);
		curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, false);
		curl_setopt($ch2, CURLOPT_POST, 14);
		curl_setopt($ch2, CURLOPT_POSTFIELDS, $newsletter_data_post);			
		//execute post
		$result2	= curl_exec($ch2);		
		//close connection
		curl_close($ch2);		
	}
}*/
// ******************************************** end of Icontact API ************************************************************


// ******************************************** Start of Highrise API ************************************************************
function saveInHighrise($fname,$lname,$email,$skype,$program_name){
	include ('newAPI.php'); 
	$hr = new HighriseAPI();
	$hr->debug = false;
	$hr->setAccount("affiliatemedia");
	$hr->setToken("6ea2e9b89358faa37d7d036c3ea7a0ae");
	extract($_POST);
	// check the give email exists or not	
	$people = $hr->findPeopleByEmail($email);
	$person = $people[0];
	$id=$people[0]->id;		
	$tag='CAP DIrectory Funnel';
	echo "<pre>";print_r($people);
	//foreach($people as $p) $p->delete();
	// if given mail id not exist than insert the record	
	if($id == ''){
		$people = new HighrisePerson($hr);		
		$people->setFirstName($fname);
		$people->setLastName($lname);
		$people->addEmailAddress($email);	
		$people->addInstantMessenger("Skype",$skype);
		// post custom data to custom field.
		$people->addSubjectData($program_name,"647195","CAP Program(s) Interested In");
		$people->addTag($tag);
		$people->save();	
		
		$people = $hr->findPeopleByEmail($joinnow_email);
		$person = $people[0];
		
		$str = "CAP 'Join Now' enquiry for ".$program_name."\n
		First Name: ".$fname."\n
		Last Name: ".$lname."\n
		Email: ".$email ."\n
		Skype/MSN id: ".$skype."\n";
		
		// create new note with required values
		$new_note = new HighriseNote($hr);
		$new_note->setSubjectType("Party");
		$new_note->setSubjectId($person->getId());
		$new_note->setBody($str);
		
		$new_note->save();								
	
	}else{	// if given mail id exist than update the record		
	
		$id=$person->id;	
		if($person->first_name=='') $fname=$fname; else $fname=$person->first_name;
		if($person->last_name=='') $lname=$lname; else $lname=$person->last_name;
		if($person->instant_messengers[0]->address == '') $instmess=$skype; else $instmess="";	
		if($person->subject_datas[0]->value==''){
			$subdt=$program_name; 
			$subid="";
		}else {
			$subdt=$person->subject_datas[0]->value.", ".$program_name;
			$subid=$person->subject_datas[0]->id;
		}
		
		$people = new HighrisePerson($hr);
		$people->setId($id);	// it is important while updating record. other wise it will insert new record.	
		$people->setFirstName($fname);		
		$people->setLastName($lname);		
		$people->addInstantMessenger("Skype",$instmess);	
		$people->addSubjectData($subdt,"647195","CAP Program(s) Interested In");
		$people->addTag($tag);
		$people->save();	
		
		$people = $hr->findPeopleByEmail($joinnow_email);
		$person = $people[0];
		
		$notes = $person->getNotes();
		foreach($notes as $note){$idd= $note->id;}
			
		$str = "CAP 'Join Now' enquiry for ".$program_name."\n
		First Name: ".$fname."\n
		Last Name: ".$lname."\n
		Email: ".$joinnow_email ."\n
		Skype/MSN id: ".$instmess."\n";
		

		$new_note = new HighriseNote($hr);
		$new_note->setSubjectType("Party");
		$new_note->setSubjectId($person->getId());
		$new_note->setBody($str);
		$new_note->save();
	}
}
// ******************************************** End of Highrise API ************************************************************

// ******************************************** Start of Webiner API ************************************************************
/*class ApiClient {
    private $oauthToken;    
	public function __construct($oauthToken) {
        $this->oauthToken = $oauthToken;
	}    
    public function post($url, $data) {
       	$data_string = json_encode($data);   
	    $ch = curl_init();
       	curl_setopt($ch, CURLOPT_URL, $url); 
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
       	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
	    curl_setopt($ch, CURLOPT_TIMEOUT, '10');
	    $headers = array(
    	    "Content-Type: application/json",
            "Accept: application/json",
            "Authorization: OAuth oauth_token={$this->oauthToken}",
            "Content-Length: " . strlen($data_string)                
        );
    	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
        $ret = curl_exec($ch);
		return json_decode($ret);
	 }
     public function get($url) {
	    $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url); 
       	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_TIMEOUT, '10');
	    $headers = array(
    	    "Content-Type: application/json",
            "Accept: application/json",
            "Authorization: OAuth oauth_token={$this->oauthToken}"
        );
    	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
	    $ret = curl_exec($ch);
	    return json_decode($ret);
    }
}
class Webinar {    
	private $developerKey;
	private $organizerKey;
    protected $client;    
	private $apps = array(
       	'your_app' => array(
        'developerKey' => 'bd49a118bd1659913c73a544e57c045f',
        'oauthToken' => '789b69f10e6fac636e408fa08b0c65ca',
        'organizerKey' => '200000000000548877')
	);
    public function __construct($app = 'your_app') {
        if(!array_key_exists($app, $this->apps)) {
       	    throw new Exception('Invalid argument: unknown developer key');
	    }
        $this->developerKey = $this->apps[$app]['developerKey'];
       	$this->organizerKey = $this->apps[$app]['organizerKey'];
	    $this->client = new ApiClient($this->apps[$app]['oauthToken']);
    }
    public function addRegistrant($webinarKey, $email, $firstname, $lastname) {
	    $url = "https://api.citrixonline.com/G2W/rest/organizers/{$this->organizerKey}/webinars/$webinarKey/registrants";
        $data = (object) array(
       	    'firstName' => $firstname,
           	'lastName' => $lastname,
	        'email' => $email
        );
	    return $this->client->post($url, $data);
    }
	public function getRegistrants($webinarKey) {
	    $url = "https://api.citrixonline.com/G2W/rest/organizers/{$this->organizerKey}/webinars/$webinarKey/registrants";
        return $this->client->get($url);
	}
}
function saveInWebiner($email,$fname,$lname){
		 
	$api = new Webinar();
	$webinarKey = "318831166";
	$res=$api->addRegistrant($webinarKey,$email,$fname,$lname);
	$resget=$api->getRegistrants($webinarKey);	
	
}*/

// ******************************************** End of Webiner API ************************************************************
?>