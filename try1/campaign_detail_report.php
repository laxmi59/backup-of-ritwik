<?php 
$wsdl = 'http://api.stormpost.datranmedia.com/services/SoapRequestProcessor?wsdl';
$soapClient = new SoapClient($wsdl);
$login = new SOAPHeader($wsdl, 'username', 'soap@conglomeratenetwork.com');
$password = new SOAPHeader($wsdl, 'password', 'Password2');
$headers = array($login, $password);
$soapClient->__setSOAPHeaders($headers);
$gdmr=array("mailingId"=>$rid);
try{
	$gdmr_res =  $soapClient->__call("getDetailedMailingReport", $gdmr);
	return $gdmr_res;
	//echo $gdmr_res->mailingID;
} catch (SoapFault $fault) {
	$error = "gdmr_error";
}
?>
stdClass Object
(
    [mailingID] => 39
    [mailingTitle] => Triggered Mailing for 2010-09-22
    [customerReferenceNumber] => 
    [mailingSubject] => test23
    [campaignTitle] => test23
    [campaignReferenceNumber] => 
    [listTitle] => [None]
    [brandTitle] => Adtingo (New)
    [contents] => 
    [sendTemplateID] => 50
    [blockDomains] => 
    [additionalLists] => 
    [purgeLists] => 
    [purgeMailings] => 
    [suppressionLists] => 
    [createdDate] => 2010-09-23T09:34:57.000Z
    [sentTime] => 2010-09-23T09:34:57.000Z
    [sendStartTime] => 2010-09-23T09:34:57.000Z
    [sendFinishTime] => 2010-09-23T09:34:57.000Z
    [queueTime] => 
    [totalQueueTime] => -1
    [maxRecips] => 0
    [clickStreamType] => ALL
    [mailingStatus] => DONE
    [retriesRemaining] => 0
    [archived] => 
    [queueComment] => 
    [aggregateDeliveryCounts] => 
    [scheduledCount] => 3
    [failedCount] => 0
    [failedPercent] => 0
    [deliveredCount] => 3
    [deliveredPercent] => 100
    [unsentCount] => 0
    [unsentPercent] => 0
    [softCount] => 0
    [softPercent] => 0
    [hardCount] => 0
    [hardPercent] => 0
    [blockedCount] => 0
    [blockedPercent] => 0
    [totalBounceCount] => 0
    [totalBouncePercent] => 0
    [trackedLinkCount] => 0
    [openLinkCount] => 1
    [uniqueOpensCount] => 1
    [openRate] => 166.666666667
    [totalClicksCount] => 0
    [totalClicksPercent] => 0
    [uniqueClicksCount] => 0
    [clickRate] => 0
    [uniqueUsersCount] => 0
    [uniqueUsersPercent] => 0
    [unsubscribeResponsesCount] => 0
    [unsubscribeResponsesPercent] => 0
    [complaintResponsesCount] => 0
    [complaintResponsesPercent] => 0
    [scompResponsesCount] => 0
    [scompResponsesPercent] => 0
    [replyResponsesCount] => 0
    [replyResponsesPercent] => 0
    [totalResponsesCount] => 0
    [totalResponsesPercent] => 0
    [confirmCount] => 0
    [confirmRate] => 0
    [mailingParts] => Array
        (
            [0] => stdClass Object
                (
                    [part] => TEXT
                    [numTrackedUrls] => 0
                    [totalClicks] => 0
                    [uniqueClicks] => 0
                    [uniqueUsers] => 0
                    [totalOpens] => 0
                )

            [1] => stdClass Object
                (
                    [part] => HTML
                    [numTrackedUrls] => 0
                    [totalClicks] => 0
                    [uniqueClicks] => 0
                    [uniqueUsers] => 0
                    [totalOpens] => 5
                )

        )

    [linkReport] => Array
        (
        )

)
