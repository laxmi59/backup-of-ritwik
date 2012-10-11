<?php
/*
Template Name: News letter
*/
//print_r($_POST);

if($_REQUEST['email']<>""){
	$email=$_REQUEST['email'];
}elseif($_REQUEST['emailsingle']<>""){
    $email=$_REQUEST['emailsingle'];
}elseif($_REQUEST['directory_sidebar_email']<>""){
    $email=$_REQUEST['directory_sidebar_email'];
}elseif($_REQUEST['sidebaremail']<> ""){
    $email=$_REQUEST['sidebaremail'];
	$name =$_REQUEST['sidebarfname'];
}else{
	$email='';
}
if(!empty($email)){
	$ch2 = curl_init();
	$icontact_url="http://app.icontact.com/icp/signup.php";
	if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$",$email)){
		echo "Please enter valid email";
		exit;
	}else{
		$newsletter_data_post="fields_email=".$email."&listid=4941&specialid:4941=IPRP&clientid=144974&formid=2664&reallistid=1&doubleopt=0";
	//set the url, number of POST vars, POST data
		curl_setopt($ch2, CURLOPT_URL, $icontact_url);
		curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch2, CURLOPT_HEADER, true);
		curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, false);
		curl_setopt($ch2, CURLOPT_POST, 14);
		curl_setopt($ch2, CURLOPT_POSTFIELDS, $newsletter_data_post);
		//execute post
		$result2	= curl_exec($ch2);
		$err2		= curl_errno($ch2); 
		$errmsg2	= curl_error($ch2);
		$header2	= curl_getinfo($ch2);
		//close connection
		curl_close($ch2);
if($_REQUEST['subtype']=='normal') {$source='Entry B';}
if($_REQUEST['subtype']=='popup') {$source='Entry A';}
if($_REQUEST['subtype']=='single') {$source='Entry D';}

/*require_once('../nusoap/nusoap.php');

                        $accountID = '67n862o+b+k=';
                        $password = 'gXfjG8FH';
                        $listID = 1;
                        $userID = 6576;
$data = <<<DATA
Email\tSource
$email\t$source
DATA;
                        $client = new nusoap_client('http://api7.publicaster.com/Pub7APIV2/MailingList.svc?wsdl', true);
                        $client->soap_defencoding = 'utf-8';
$xml = <<<XML
<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
<s:Body>
<ImportNonDataSet xmlns="http://BlueSkyFactory.Publicaster7.Public.API">
<EncryptedAccountID>$accountID</EncryptedAccountID>
<APIPassword>$password</APIPassword>
<ListID>$listID</ListID>
<UserID>$userID</UserID>
<Action>AppendAndUpdate</Action>
<PrimaryKey>Email</PrimaryKey>
<Data>$data</Data>
</ImportNonDataSet>
</s:Body>
</s:Envelope>
XML;
                        $result = $client->send($xml, 'http://BlueSkyFactory.Publicaster7.Public.API/IMailingList/ImportNonDataSet');*/
		/*if($_REQUEST['subtype']=='normal' || $_REQUEST['directory_sidebar_email']){
			echo "<script>window.location='/thank-you2.php'</script>";
		}elseif($_REQUEST['subtype']=='single'){
			echo "<script>window.location='/thank-you3.php'</script>";
		}else{
			echo "<script>window.location='/thank-you.php'</script>";
		}*/
		//exit;
/*if($_REQUEST['directory_sidebar_email']<> ""){
    echo "<script>window.location='/directory/'</script>";
}else{*/
	echo "<script>window.location='/thank-you.php'</script>";
//}
	}
}
if($_REQUEST['email1']<>""){
	if($_REQUEST['email1'])
		$email=$_REQUEST['email1'];
	if($_REQUEST['emailpopindex'])
		$email=$_REQUEST['emailpopindex'];
	$ch2 = curl_init();
	$icontact_url="http://app.icontact.com/icp/signup.php";
	if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$",$email)){
		echo "Please enter valid email";
		exit;
	}else{
		$newsletter_data_post="fields_email=".$email."&listid=336803&specialid:336803=1Y4D&clientid=144974&formid=302805&reallistid=1&doubleopt=0";
	//set the url, number of POST vars, POST data
		curl_setopt($ch2, CURLOPT_URL, $icontact_url);
		curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch2, CURLOPT_HEADER, true);
		curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, false);
		curl_setopt($ch2, CURLOPT_POST, 14);
		curl_setopt($ch2, CURLOPT_POSTFIELDS, $newsletter_data_post);
		//execute post
		$result2	= curl_exec($ch2);
		$err2		= curl_errno($ch2); 
		$errmsg2	= curl_error($ch2);
		$header2	= curl_getinfo($ch2);
		//close connection
		curl_close($ch2);
		if($_REQUEST['subtype']=='normal') {$source='Entry B';}
		if($_REQUEST['subtype']=='popup') {$source='Entry A';}
		if($_REQUEST['subtype']=='single') {$source='Entry D';}

/*require_once('../nusoap/nusoap.php');
                        $accountID = '67n862o+b+k=';
                        $password = 'gXfjG8FH';
                        $listID = 1;
                        $userID = 6576;
$data = <<<DATA
Email\tSource
$email\t$source
DATA;
                        $client = new nusoap_client('http://api7.publicaster.com/Pub7APIV2/MailingList.svc?wsdl', true);
                        $client->soap_defencoding = 'utf-8';
$xml = <<<XML
<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
<s:Body>
<ImportNonDataSet xmlns="http://BlueSkyFactory.Publicaster7.Public.API">
<EncryptedAccountID>$accountID</EncryptedAccountID>
<APIPassword>$password</APIPassword>
<ListID>$listID</ListID>
<UserID>$userID</UserID>
<Action>AppendAndUpdate</Action>
<PrimaryKey>Email</PrimaryKey>
<Data>$data</Data>
</ImportNonDataSet>
</s:Body>
</s:Envelope>
XML;
                        $result = $client->send($xml, 'http://BlueSkyFactory.Publicaster7.Public.API/IMailingList/ImportNonDataSet');*/
/*if($_REQUEST['directory_sidebar_email']<> ""){
    echo "<script>window.location='/directory/'</script>";
}else{*/
echo "<script>window.location='/thank-you.php'</script>";
//}
	
	}
}
if($_REQUEST['emailpopindex']<>""){
/*eBook: Guide To Making Your First $500
Lists: eBook: How To Run Your Business on Autopilot & Profit*/
	if($_REQUEST['emailpopindex'])
		$email=$_REQUEST['emailpopindex'];
	$ch2 = curl_init();
	$icontact_url="http://app.icontact.com/icp/signup.php";
	if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$",$email)){
		echo "Please enter valid email";
		exit;
	}else{
		$newsletter_data_post="fields_email=".$email."&listid=337188&specialid:337188=HAOF&clientid=144974&formid=302820&reallistid=1&doubleopt=0";
	//set the url, number of POST vars, POST data
		curl_setopt($ch2, CURLOPT_URL, $icontact_url);
		curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch2, CURLOPT_HEADER, true);
		curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, false);
		curl_setopt($ch2, CURLOPT_POST, 14);
		curl_setopt($ch2, CURLOPT_POSTFIELDS, $newsletter_data_post);
		//execute post
		$result2	= curl_exec($ch2);
		$err2		= curl_errno($ch2); 
		$errmsg2	= curl_error($ch2);
		$header2	= curl_getinfo($ch2);
		//close connection
		curl_close($ch2);
		echo "<script>window.location='/thank-you.php'</script>";	
	}
}
if($_REQUEST['ebook_email']<>""){
/*eBook: Guide To Making Your First $500
Lists: eBook: How To Run Your Business on Autopilot & Profit*/
	if($_POST['ebook_first_name']){
		extract($_POST);
		$query="insert into `wp_ebookpage` (`ebook_first_name`, `ebook_last_name`, `ebook_email`, `ebook_phone`, `ebook_website`, `ebook_traffic`, `ebook_info`, `ebook_challenge`, `ebook_created`) values ('".$ebook_first_name."', '".$ebook_last_name."', '".$ebook_email."', '".$ebook_phone."', '".$ebook_website."',  '".$ebook_traffic."', '".$ebook_info."', '".$ebook_challenge."', now())";
		$wpdb->query($query);
	
	}
	extract($_POST);
	if($_REQUEST['ebook_email'])
		$email=$_REQUEST['ebook_email'];
		
		
	$ch2 = curl_init();
	$icontact_url="http://app.icontact.com/icp/signup.php";
	if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$",$email)){
		echo "Please enter valid email";
		exit;
	}else{
		$newsletter_data_post="fields_email=".$email."&fields_fname=".$ebook_first_name."&fields_lname=".$ebook_last_name."&listid=337188&specialid:337188=HAOF&clientid=144974&formid=302820&reallistid=1&doubleopt=0";
	//set the url, number of POST vars, POST data
		curl_setopt($ch2, CURLOPT_URL, $icontact_url);
		curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch2, CURLOPT_HEADER, true);
		curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, false);
		curl_setopt($ch2, CURLOPT_POST, 14);
		curl_setopt($ch2, CURLOPT_POSTFIELDS, $newsletter_data_post);
		//execute post
		$result2	= curl_exec($ch2);
		$err2		= curl_errno($ch2); 
		$errmsg2	= curl_error($ch2);
		$header2	= curl_getinfo($ch2);
		
	echo "<script>window.location='/blog/ebook-thank-you-page/'</script>";

	
	}
}
	
	?>