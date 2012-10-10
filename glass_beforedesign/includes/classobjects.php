<?
////////////////////		For config file		/////////////////////////////
$config = new configure;
$config->configure();
////////////////////		For file names		/////////////////////////////
$application= new filenames;
$application->tables();
$application->pages();
////////////////////		For functions		/////////////////////////////
$con= new common_functions();
$con->connect_to_database();
///////////////////			validations			////////////////////////////
include "valid.php";
$valid = new valid();
?>
