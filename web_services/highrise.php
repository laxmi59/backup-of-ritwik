<?php
error_reporting(0);
$email = "test17sep2012@yopmail.com";
$fname = "test";
$lname = "123";
$program_name = "cap123";
$skype="test";

$highrise=saveInHighrise($fname,$lname,$email,$skype,$program_name);
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
?>