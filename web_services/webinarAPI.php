<?php
//https://developer.citrixonline.com/forum/php-code-examples
// it will not work on localhost. test it on server
//error_reporting(0);
class ApiClient {
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

/* webner API Code starting*/	 
$api = new Webinar();
$webinarKey = "318831166";
$res=$api->addRegistrant($webinarKey,"test@test.com","test","test");
$resget=$api->getRegistrants($webinarKey);	
print_r($res);
print_r($resget);exit;
echo "<script>window.location='/webinars/thanks.php'</script>";
exit;
/* webner API Code ending*/
?>