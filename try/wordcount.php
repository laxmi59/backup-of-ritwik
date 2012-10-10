<?
function wordCount($string){
	$words = "";
	$string = eregi_replace(" +", " ", $string);
	$array = explode(" ", $string);
	for($i=0;$i < count($array);$i++){
		if (eregi("[0-9A-Za-zÀ-ÖØ-öø-ÿ]", $array[$i]))
			$words[$i] = $array[$i];
	}
	return $words;
}


$string=html_entity_decode(stripslashes("The Gibraltar Regulatory Authority (GRA) has confirmed that former Director of Operations for the UK Gambling Commission, Phill Brear, will assume a new role in Gibraltar as its Head of Gambling. Mr Brear will officially start with the GRA on 1st October and is reported to be making arrangements to move to Gibraltar.<br /><br /> Paul Canessa, Chief Executive of the GRA said &ldquo;We are delighted to have made this appointment. Our e-gambling industry is the hub of a global industry that aspires to the highest standards in socially responsible and transparent services. It is essential that we have the right blend of regulation, experience and innovation to work with our operators in meeting and developing those standards. Phill brings strength in depth from his role as one of the top team with the UK Gambling Commission.&rdquo; <br /><br /> Commenting on his new role, former policeman Mr. Brear said, &#39;I feel very privileged to be taking up such an important post at such a critical time. The Government has demonstrated its continuing commitment to licensing and hosting the world&#39;s strongest and most dynamic operators in remote gambling. <br /><br /> &ldquo;With that comes a responsibility for all parties to ensure we help develop and meet the highest international standards around player protection, integrity of facilities and resilience of systems. Gibraltar has a first class reputation in these areas and as the industry comes under increasing demand and international scrutiny we must ensure that reputation goes from strength to strength.&rdquo;<!--Session data-->"));
$wc = wordCount($string);
print_r($wc);
?>