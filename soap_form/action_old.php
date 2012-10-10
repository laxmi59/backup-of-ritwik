<?php
extract($_POST);
$wsdl = 'http://api.stormpost.datranmedia.com/services/SoapRequestProcessor?wsdl';
$soapClient = new SoapClient($wsdl);

$login = new SOAPHeader($wsdl, 'username', 'soap@conglomeratenetwork.com');
$password = new SOAPHeader($wsdl, 'password', 'Password2');
$headers = array($login, $password);

$soapClient->__setSOAPHeaders($headers);

/*echo"<pre>";
print_r( $soapClient->__getFunctions() );
echo"</pre>";*/
// get recipient By address
/*$addr=array("Adress"=>'shekar@ritwik.com');
$info=$soapClient->__call('getRecipientByAddress',$addr);*/

if($_GET['act']=='create'){
	// Create msg
	$cstb = array("title"=>$title, "subject"=>$subject, "fromEmail"=>"rama@ritwik.com", "fromName"=>"rama", "toEmail"=>"rama.ritwik@yopmail.com", "toName"=>"laxmi", "replyToEmail"=>"rama@ritwik.com", "replyToName"=>"rama", encoding=>"quoted-printable", "Charset"=>"ISO-8859-1", "trackType"=>"ALL", "openTrackType"=>"HTML", "clickStreamType"=>"ALL", "brandID"=>"1","enabled"=>"TRUE" );
	//$textContent="it is created using soap api for testing ";
	//$htmlContent="&lt;b&gt;it is created using soap api for testing &lt;/b&gt; ";
	try{
		$cst_res = $soapClient->__call("createSendTemplate", array($cstb,$textContent,$htmlContent));
		echo $cst_res."<br>";
		$_SESSION['id']=$cst_res;
		$id=$_SESSION['id'];
		//$sen =  $soapClient->__call("sendMessageFromTemplate", array($cst_res,$mails));
		//echo $sen;
		echo "<script>window.location='index.php?id=$id'</script>";
	} catch (SoapFault $fault) {
		$error = "cstb_error";
	}
}

if($_GET['act']=='sending'){
	// Sending Message
	$addr=array("adress"=>"rama@ritwik.com");
	//$tt="rama.ritwik@yopmail.com","rama@ritwik.com";
	try{
		$smft_res =  $soapClient->__call("sendMessageFromTemplate", array($_GET['cid'],"rama.ritwik@yopmail.com"));
		//$smft_res =  $soapClient->__call("sendMessagesFromTemplate", array(29,$addr));
		echo $smft_res."<br>";
		echo "<script>window.location='index.php?id=$_GET[cid]'</script>";
	} catch (SoapFault $fault) {
		$error = "smft_error";
	}
}
if($_GET['act']=='report'){
	// Report
	$gdmr=array("mailingId"=>$_GET['cid']);
	try{
		$gdmr_res =  $soapClient->__call("getDetailedMailingReport", $gdmr);
		echo "<pre>";print_r ($gdmr_res);echo "</pre>";
	} catch (SoapFault $fault) {
		$error = "gdmr_error";
	}
}


switch($error)
{
	case "cstb_error": 
		echo $fault->faultcode."-".$fault->faultstring;
		break;
	case "smft_error": 
		echo $fault->faultcode."-".$fault->faultstring;
		break;
	case "gdmr_error": 
		echo $fault->faultcode."-".$fault->faultstring;
		break;
} 
?>