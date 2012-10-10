<?php
require_once('nusoap.php');
$s = new soap_server;
$s->register('helloyou');

function helloyou($name){
// We require the name of the person we are saying hello to
// so if they do not supply it we return an fault message.
if($name == ''){
return new soap_fault('Client','','I do not know who you are!');
}
return "hello $name!";
}
$s->service($HTTP_RAW_POST_DATA);
?>