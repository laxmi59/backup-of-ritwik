<?php
/*
Template Name: Payment Form
*/

$customHttpPath= "http://www.affiliateprograms.com";

$GLOBALS['nosidebar']=1; get_header();  //echo $post->ID?>
<!-- TWO STEPS TO INSTALL CREDIT CARD VALIDATION:

  1.  Copy the coding into the HEAD of your HTML document
  2.  Add the last code into the BODY of your HTML document  -->

<!-- STEP ONE: Paste this code into the HEAD of your HTML document  --><HEAD>

<SCRIPT LANGUAGE="JavaScript">
<!-- Original:  Simon Tneoh (tneohcb@pc.jaring.my) -->

<!-- This script and many more are available free online at -->
<!-- The JavaScript Source!! http://www.javascriptsource.com -->

<!-- Begin
var Cards = new makeArray(8);
Cards[0] = new CardType("MasterCard", "51,52,53,54,55", "16");
var MasterCard = Cards[0];
Cards[1] = new CardType("VisaCard", "4", "13,16");
var VisaCard = Cards[1];
Cards[2] = new CardType("AmExCard", "34,37", "15");
var AmExCard = Cards[2];
Cards[3] = new CardType("DinersClubCard", "30,36,38", "14");
var DinersClubCard = Cards[3];
Cards[4] = new CardType("DiscoverCard", "6011", "16");
var DiscoverCard = Cards[4];
Cards[5] = new CardType("enRouteCard", "2014,2149", "15");
var enRouteCard = Cards[5];
Cards[6] = new CardType("JCBCard", "3088,3096,3112,3158,3337,3528", "16");
var JCBCard = Cards[6];
var LuhnCheckSum = Cards[7] = new CardType();

/*************************************************************************\
CheckCardNumber(form)
function called when users click the "check" button.
\*************************************************************************/
function CheckCardNumber(form) {
if (form.first_name.value.length == 0) {
alert("Please enter First Name.");
form.first_name.focus();
return;
}
if (form.last_name.value.length == 0) {
alert("Please enter Last Name.");
form.last_name.focus();
return;
}
if (form.email.value.length == 0) {
alert("Please enter Email.");
form.email.focus();
return;
}
if (form.phone.value.length == 0) {
alert("Please enter Phone.");
form.phone.focus();
return;
}
if (form.program_name.value.length == 0) {
alert("Please enter Program Name.");
form.program_name.focus();
return;
}
if (form.program_url.value.length == 0) {
alert("Please enter Program URL.");
form.program_url.focus();
return;
}
if (form.billing_first_name.value.length == 0) {
alert("Please enter First Name.");
form.billing_first_name.focus();
return;
}
if (form.billing_last_name.value.length == 0) {
alert("Please enter Last Name.");
form.billing_last_name.focus();
return;
}
if (form.billing_address1.value.length == 0) {
alert("Please enter Address1.");
form.billing_address1.focus();
return;
}

if (form.billing_city.value.length == 0) {
alert("Please enter City.");
form.billing_city.focus();
return;
}
if ((form.billing_country.value == 'US') && (form.billing_state.value.length == 0)) {
alert("Please enter State.");
form.billing_state.focus();
return;
}
if ((form.billing_country.value == 'US') && (form.billing_zip.value.length == 0)) {
alert("Please enter ZIP Code.");
form.billing_zip.focus();
return;
}
if ((form.billing_country.value != 'US') && (form.billing_zip1.value.length == 0)) {
alert("Please enter Postal Code.");
form.billing_zip1.focus();
return;
}
if (form.CardType.value.length == 0) {
alert("Please select Card Type .");
form.CardType.focus();
return;
}
var tmpyear;
if (form.CardNumber.value.length == 0) {
alert("Please enter a Card Number.");
form.CardNumber.focus();
return;
}
if (form.ExpMon.value.length == 0) {
alert("Please enter the Expiration month.");
form.ExpMon.focus();
return;
}
if (form.ExpYear.value.length < 4) {
alert("Please enter the Expiration Year as YYYY.");
form.ExpYear.focus();
return;
}
/*if (form.ExpYear.value > 1996)
tmpyear = form.ExpYear.value;
else if (form.ExpYear.value < 2021)
tmpyear = form.ExpYear.value;
else {
alert("The Expiration Year is not valid.");
return;
}*/
tmpyear = form.ExpYear.value;
tmpmonth = form.ExpMon.value;
// The following line doesn't work in IE3, you need to change it
// to something like "(new CardType())...".
// if (!CardType().isExpiryDate(tmpyear, tmpmonth)) {
if (!(new CardType()).isExpiryDate(tmpyear, tmpmonth)) {
alert("This card has already expired.");
return;
}
if (form.cvc.value.length == 0) {
alert("Please enter the CVC.");
form.cvc.focus();
return;
}
card = form.CardType.options[form.CardType.selectedIndex].value;
var retval = eval(card + ".checkCardNumber(\"" + form.CardNumber.value +
"\", " + tmpyear + ", " + tmpmonth + ");");
cardname = "";
if (retval)



// comment this out if used on an order form
//alert("This card number appears to be valid.");
document.ThisForm.submit();


else {
// The cardnumber has the valid luhn checksum, but we want to know which
// cardtype it belongs to.
for (var n = 0; n < Cards.size; n++) {
if (Cards[n].checkCardNumber(form.CardNumber.value, tmpyear, tmpmonth)) {
cardname = Cards[n].getCardType();
break;
   }
}
if (cardname.length > 0) {
alert("This looks like a " + cardname + " number, not a " + card + " number.");
}
else {
alert("This card number is not valid.");
      }
   }
}
/*************************************************************************\
Object CardType([String cardtype, String rules, String len, int year, 
                                        int month])
cardtype    : type of card, eg: MasterCard, Visa, etc.
rules       : rules of the cardnumber, eg: "4", "6011", "34,37".
len         : valid length of cardnumber, eg: "16,19", "13,16".
year        : year of expiry date.
month       : month of expiry date.
eg:
var VisaCard = new CardType("Visa", "4", "16");
var AmExCard = new CardType("AmEx", "34,37", "15");
\*************************************************************************/
function CardType() {
var n;
var argv = CardType.arguments;
var argc = CardType.arguments.length;

this.objname = "object CardType";

var tmpcardtype = (argc > 0) ? argv[0] : "CardObject";
var tmprules = (argc > 1) ? argv[1] : "0,1,2,3,4,5,6,7,8,9";
var tmplen = (argc > 2) ? argv[2] : "13,14,15,16,19";

this.setCardNumber = setCardNumber;  // set CardNumber method.
this.setCardType = setCardType;  // setCardType method.
this.setLen = setLen;  // setLen method.
this.setRules = setRules;  // setRules method.
this.setExpiryDate = setExpiryDate;  // setExpiryDate method.

this.setCardType(tmpcardtype);
this.setLen(tmplen);
this.setRules(tmprules);
if (argc > 4)
this.setExpiryDate(argv[3], argv[4]);

this.checkCardNumber = checkCardNumber;  // checkCardNumber method.
this.getExpiryDate = getExpiryDate;  // getExpiryDate method.
this.getCardType = getCardType;  // getCardType method.
this.isCardNumber = isCardNumber;  // isCardNumber method.
this.isExpiryDate = isExpiryDate;  // isExpiryDate method.
this.luhnCheck = luhnCheck;// luhnCheck method.
return this;
}

/*************************************************************************\
boolean checkCardNumber([String cardnumber, int year, int month])
return true if cardnumber pass the luhncheck and the expiry date is
valid, else return false.
\*************************************************************************/
function checkCardNumber() {
var argv = checkCardNumber.arguments;
var argc = checkCardNumber.arguments.length;
var cardnumber = (argc > 0) ? argv[0] : this.cardnumber;
var year = (argc > 1) ? argv[1] : this.year;
var month = (argc > 2) ? argv[2] : this.month;

this.setCardNumber(cardnumber);
this.setExpiryDate(year, month);

if (!this.isCardNumber())
return false;
if (!this.isExpiryDate())
return false;

return true;
}
/*************************************************************************\
String getCardType()
return the cardtype.
\*************************************************************************/
function getCardType() {
return this.cardtype;
}
/*************************************************************************\
String getExpiryDate()
return the expiry date.
\*************************************************************************/
function getExpiryDate() {
return this.month + "/" + this.year;
}
/*************************************************************************\
boolean isCardNumber([String cardnumber])
return true if cardnumber pass the luhncheck and the rules, else return
false.
\*************************************************************************/
function isCardNumber() {
var argv = isCardNumber.arguments;
var argc = isCardNumber.arguments.length;
var cardnumber = (argc > 0) ? argv[0] : this.cardnumber;
if (!this.luhnCheck())
return false;

for (var n = 0; n < this.len.size; n++)
if (cardnumber.toString().length == this.len[n]) {
for (var m = 0; m < this.rules.size; m++) {
var headdigit = cardnumber.substring(0, this.rules[m].toString().length);
if (headdigit == this.rules[m])
return true;
}
return false;
}
return false;
}

/*************************************************************************\
boolean isExpiryDate([int year, int month])
return true if the date is a valid expiry date,
else return false.
\*************************************************************************/
function isExpiryDate() {
var argv = isExpiryDate.arguments;
var argc = isExpiryDate.arguments.length;

year = argc > 0 ? argv[0] : this.year;
month = argc > 1 ? argv[1] : this.month;

if (!isNum(year+""))
return false;
if (!isNum(month+""))
return false;
today = new Date();
expiry = new Date(year, month);
if (today.getTime() > expiry.getTime())
return false;
else
return true;
}

/*************************************************************************\
boolean isNum(String argvalue)
return true if argvalue contains only numeric characters,
else return false.
\*************************************************************************/
function isNum(argvalue) {
argvalue = argvalue.toString();

if (argvalue.length == 0)
return false;

for (var n = 0; n < argvalue.length; n++)
if (argvalue.substring(n, n+1) < "0" || argvalue.substring(n, n+1) > "9")
return false;

return true;
}

/*************************************************************************\
boolean luhnCheck([String CardNumber])
return true if CardNumber pass the luhn check else return false.
Reference: http://www.ling.nwu.edu/~sburke/pub/luhn_lib.pl
\*************************************************************************/
function luhnCheck() {
var argv = luhnCheck.arguments;
var argc = luhnCheck.arguments.length;

var CardNumber = argc > 0 ? argv[0] : this.cardnumber;

if (! isNum(CardNumber)) {
return false;
  }

var no_digit = CardNumber.length;
var oddoeven = no_digit & 1;
var sum = 0;

for (var count = 0; count < no_digit; count++) {
var digit = parseInt(CardNumber.charAt(count));
if (!((count & 1) ^ oddoeven)) {
digit *= 2;
if (digit > 9)
digit -= 9;
}
sum += digit;
}
if (sum % 10 == 0)
return true;
else
return false;
}

/*************************************************************************\
ArrayObject makeArray(int size)
return the array object in the size specified.
\*************************************************************************/
function makeArray(size) {
this.size = size;
return this;
}

/*************************************************************************\
CardType setCardNumber(cardnumber)
return the CardType object.
\*************************************************************************/
function setCardNumber(cardnumber) {
this.cardnumber = cardnumber;
return this;
}

/*************************************************************************\
CardType setCardType(cardtype)
return the CardType object.
\*************************************************************************/
function setCardType(cardtype) {
this.cardtype = cardtype;
return this;
}

/*************************************************************************\
CardType setExpiryDate(year, month)
return the CardType object.
\*************************************************************************/
function setExpiryDate(year, month) {
this.year = year;
this.month = month;
return this;
}

/*************************************************************************\
CardType setLen(len)
return the CardType object.
\*************************************************************************/
function setLen(len) {
// Create the len array.
if (len.length == 0 || len == null)
len = "13,14,15,16,19";

var tmplen = len;
n = 1;
while (tmplen.indexOf(",") != -1) {
tmplen = tmplen.substring(tmplen.indexOf(",") + 1, tmplen.length);
n++;
}
this.len = new makeArray(n);
n = 0;
while (len.indexOf(",") != -1) {
var tmpstr = len.substring(0, len.indexOf(","));
this.len[n] = tmpstr;
len = len.substring(len.indexOf(",") + 1, len.length);
n++;
}
this.len[n] = len;
return this;
}

/*************************************************************************\
CardType setRules()
return the CardType object.
\*************************************************************************/
function setRules(rules) {
// Create the rules array.
if (rules.length == 0 || rules == null)
rules = "0,1,2,3,4,5,6,7,8,9";
  
var tmprules = rules;
n = 1;
while (tmprules.indexOf(",") != -1) {
tmprules = tmprules.substring(tmprules.indexOf(",") + 1, tmprules.length);
n++;
}
this.rules = new makeArray(n);
n = 0;
while (rules.indexOf(",") != -1) {
var tmpstr = rules.substring(0, rules.indexOf(","));
this.rules[n] = tmpstr;
rules = rules.substring(rules.indexOf(",") + 1, rules.length);
n++;
}
this.rules[n] = rules;
return this;
}
//  End -->

function isNotEmpty(fname,txt)
{
		if(fname.value=="")
		{
		alert(txt);
		fname.focus();
		return true;
		}
		return false;
}
function email(reg)
{
	var e=reg.value;
	var e1=/^(?:\w+\.?)*\w+@(?:\w+\.)+\w+$/;
	if(e.match(e1))	{
		return false;
	}else{
		alert("Invalid Email");
		reg.value="";
		reg.focus();
		return true;
	}
}
function trimfun(stringToTrim) {
	return stringToTrim.replace(/^\s+|\s+$/g,"");
}
</script>
<style>
.showerrorimg{
   background: url("/directory/wp-content/themes/directorypress/images/alert-icon.png") no-repeat scroll 17px 11px #F0F5F8;
    border: 2px solid #FF0000;
    border-radius: 6px 6px 6px 6px;
    font-size: 12px;
    left: 0;
    padding: 5px 5px 5px 70px;
    position: relative;
    width: 470px;
}
.showerrorimg span{
 color: #FF0000;
    font-weight: bold;
    text-align: center;
}
</style>

<?php
if($_REQUEST['err']){
	$getDetatils=mysql_fetch_object(mysql_query("select * from wpdb_custom_user_data where id=".base64_decode($_REQUEST['err']).""));
	$getErrorDetatils=mysql_fetch_object(mysql_query("select * from wpdb_custom_payment_status where id=".$getDetatils->err_id.""));
	
	if($getDetatils->package ==1){
		$amount="$299";
		$pid=$getDetatils->package;
		$msg= "Annual Directory Listing - $299 per year. ";
		$msg1 = "Annual Listing - $299 one-time fee ";
	}else{
		$amount="$499";
		$pid=$getDetatils->package;
		$msg= "Lifetime Directory Listing - $499 per year.";
		$msg1 = "Lifetime Listing - $499 one-time fee ";	
	}
	$errmsg="<div class='showerrorimg'><span>Sorry, there was a problem processing your payment.<br>Please check and re-enter your payment information below.<br>For immediate assistance, please call us on (714) 596-9000</span></div>";
	
	
	$to1= "david@affiliatemedia.com";//$getDetatils->email;
	//$to1 ="rama@ritwik.com";
	$subject1="Order Failure on the AffiliatePrograms.com Directory";
	$content1="An order has failed on the AffiliatePrograms.com Directory..<br><br>
	<b>Contact Information</b><br>
	First Name : ".$getDetatils->first_name."<br>
	Last Name : ".$getDetatils->last_name."<br>
	Email Address : ".$getDetatils->email."<br>
	Company : ".$getDetatils->company."<br>
	Phone Number : ".$getDetatils->phone."<br><br>
	<b>Listing Details</b><br>
	Affiliate Program Name : ".$getDetatils->program_name."<br>
	Affiliate Program URL : ".$getDetatils->program_url."<br><br>
	<b>Order Amount :</b> ".$amount."<br><br>
	<b>Error Details</b><br>
	PayPal Error Code: ".$getErrorDetatils->err_code."<br>
	PayPal Error Short Message: ".$getErrorDetatils->err_smsg."<br>
	PayPal Error Long Message: ".$getErrorDetatils->err_lmsg."<br>
	 ";
	if($to1 <> ''){
		add_filter('wp_mail_content_type',create_function('', 'return "text/html";'));
		wp_mail( $to1, $subject1, $content1, $headers);
	}
}

?>
<?php 
if(base64_decode($_REQUEST['pid']) == 1){
	$msg= "Annual Directory Listing - $299 per year. ";
	$msg1 = "Annual Listing - $299 one-time fee ";
	$amount = "299";
	$pid=base64_decode($_REQUEST['pid']);
}elseif(base64_decode($_REQUEST['pid']) == 2){
	$msg= "Lifetime Directory Listing - $499 per year.";
	$msg1 = "Lifetime Listing - $499 one-time fee ";
	$amount = "499";
	$pid=base64_decode($_REQUEST['pid']);
}?>
<div class="enter-info-left">
<?php echo $errmsg?>

<h1>Enter Your Information</h1>
<h3 style="margin-bottom: 0px;"><strong>You have chosen:</strong>  <?php echo $msg1;?>  <span><a href="http://www.affiliateprograms.com/directory/package-info/">change plan</a></span></h3>
<p style="margin-bottom: 20px;">Want to pay by Wire Transfer?  <a href="http://www.affiliatemedia.com/payments/wiringinstructions.pdf" target="_blank">click here</a></p>
<form name="ThisForm" id="ThisForm" action="<?php echo $customHttpPath;?>/directory/payment-process/" method="post" >
<input type="hidden" name="package" value="<?php echo $pid?>" />
<ul class="contact-list">
<li><h1 class="list-title"><span>1</span>Contact Information</h1></li>
<li><label>First Name : </label><input type="text" name="first_name" value="<?php echo $getDetatils->first_name?>" /></li>
<li><label>Last Name : </label><input type="text" name="last_name" value="<?php echo $getDetatils->last_name?>" /></li>
<li><label>Email Address : </label><input type="text" name="email" value="<?php echo $getDetatils->email?>" /></li>
<li><label>Company : </label><input type="text" name="company" value="<?php echo $getDetatils->company?>" /></li>
<li><label>Phone Number : </label><input type="text" name="phone" value="<?php echo $getDetatils->phone?>" /></li>
</ul>

<ul class="contact-list">
<li><h1 class="list-title"><span>2</span>Listing Details</h1></li>
<li><label>Affiliate Program Name : </label><input type="text" name="program_name" value="<?php echo $getDetatils->program_name?>" /></li>
<li><label>Affiliate Program URL : </label><input type="text" name="program_url" value="<?php echo $getDetatils->program_url?>" /></li>
</ul>

<ul class="contact-list">
<li><h1 class="list-title"><span>3</span>Payment Details</h1></li>
<li><label>First Name : </label><input type="text" name="billing_first_name" value="<?php echo $getDetatils->billing_first_name?>" /></li>
<li><label>Last Name : </label><input type="text" name="billing_last_name" value="<?php echo $getDetatils->billing_last_name?>" /></li>
<li><label>Address Line 1 : </label><input type="text" name="billing_address1" value="<?php echo $getDetatils->billing_address1?>" /></li>
<li><label>Address Line 2 : </label><input type="text" name="billing_address2" value="<?php echo $getDetatils->billing_address2?>" /></li>
<script type="text/javascript">
function showAndHideStateDD(country){
	//alert(country.value);
	if(country.value != 'US'){
		document.getElementById("postelselect").style.display = 'block';
		document.getElementById("stateselect").style.display = 'none';
	}else{
		document.getElementById("postelselect").style.display = 'none';
		document.getElementById("stateselect").style.display = 'block';
	}
}
</script>
<li><label>Country : </label>
<?php $countryarr=array("AX" => "ALAND ISLANDS", "AL" => "ALBANIA", "AS" => "AMERICAN SAMOA", "AD" => "ANDORRA", "AI" => "ANGUILLA", "AG" => "ANTIGUA AND BARBUDA", "AR" => "ARGENTINA", "AM" => "ARMENIA", "AW" => "ARUBA", "AU" => "AUSTRALIA", "AT" => "AUSTRIA", "AZ" => "AZERBAIJAN", "BS" => "BAHAMAS", "BH" => "BAHRAIN", "BD" => "BANGLADESH", "BB" => "BARBADOS", "BE" => "BELGIUM", "BZ" => "BELIZE", "BJ" => "BENIN", "BM" => "BERMUDA", "BT" => "BHUTAN", "BA" => "BOSNIA-HERZEGOVINA", "BW" => "BOTSWANA", "BR" => "BRAZIL", "BN" => "BRUNEI DARUSSALAM", "BG" => "BULGARIA", "BF" => "BURKINA FASO", "CA" => "CANADA", "CV" => "CAPE VERDE", "KY" => "CAYMAN ISLANDS", "CL" => "CHILE", "CN" => "CHINA", "CC" => "COCOS (KEELING) ISLANDS", "CO" => "COLOMBIA", "CK" => "COOK ISLANDS", "CR" => "COSTA RICA", "CY" => "CYPRUS", "CZ" => "CZECH REPUBLIC", "DK" => "DENMARK", "DJ" => "DJIBOUTI", "DM" => "DOMINICA", "DO" => "DOMINICAN REPUBLIC", "EC" => "ECUADOR", "EG" => "EGYPT", "SV" => "EL SALVADOR", "EE" => "ESTONIA", "FK" => "FALKLAND ISLANDS (MALVINAS)", "FO" => "FAROE ISLANDS", "FJ" => "FIJI", "FI" => "FINLAND", "FR" => "FRANCE", "GF" => "FRENCH GUIANA", "PF" => "FRENCH POLYNESIA", "TF" => "FRENCH SOUTHERN TERRITORIES", "GA" => "GABON", "GM" => "GAMBIA", "GE" => "GEORGIA", "DE" => "GERMANY", "GH" => "GHANA", "GI" => "GIBRALTAR", "GR" => "GREECE", "GL" => "GREENLAND", "GD" => "GRENADA", "GP" => "GUADELOUPE", "GU" => "GUAM", "GG" => "GUERNSEY", "GY" => "GUYANA", "VA" => "HOLY SEE (VATICAN CITY STATE)", "HN" => "HONDURAS", "HK" => "HONG KONG", "HU" => "HUNGARY", "IS" => "ICELAND", "IN" => "INDIA", "ID" => "INDONESIA", "IE" => "IRELAND", "IM" => "ISLE OF MAN", "IL" => "ISRAEL", "IT" => "ITALY", "JM" => "JAMAICA", "JP" => "JAPAN", "JE" => "JERSEY", "JO" => "JORDAN", "KZ" => "KAZAKHSTAN", "KI" => "KIRIBATI", "KR" => "KOREA,  REPUBLIC OF", "KW" => "KUWAIT", "KG" => "KYRGYZSTAN", "LV" => "LATVIA", "LS" => "LESOTHO", "LI" => "LIECHTENSTEIN", "LT" => "LITHUANIA", "LU" => "LUXEMBOURG", "MO" => "MACAO", "MK" => "MACEDONIA", "MG" => "MADAGASCAR", "MW" => "MALAWI", "MY" => "MALAYSIA", "MT" => "MALTA", "MH" => "MARSHALL ISLANDS", "MQ" => "MARTINIQUE", "MR" => "MAURITANIA", "MU" => "MAURITIUS", "YT" => "MAYOTTE", "MX" => "MEXICO", "FM" => "MICRONESIA, FEDERATED STATES OF", "MD" => "MOLDOVA,  REPUBLIC OF", "MC" => "MONACO", "MN" => "MONGOLIA", "ME" => "MONTENEGRO", "MS" => "MONTSERRAT", "MA" => "MOROCCO", "MZ" => "MOZAMBIQUE", "NA" => "NAMIBIA", "NR" => "NAURU", "NL" => "NETHERLANDS", "AN" => "NETHERLANDS ANTILLES", "NC" => "NEW CALEDONIA", "NZ" => "NEW ZEALAND", "NI" => "NICARAGUA", "NE" => "NIGER", "NU" => "NIUE", "NF" => "NORFOLK ISLAND", "MP" => "NORTHERN MARIANA ISLANDS", "NO" => "NORWAY", "OM" => "OMAN", "PW" => "PALAU", "PS" => "PALESTINE", "PA" => "PANAMA", "PY" => "PARAGUAY", "PE" => "PERU", "PH" => "PHILIPPINES", "PN" => "PITCAIRN", "PL" => "POLAND", "PT" => "PORTUGAL", "PR" => "PUERTO RICO", "QA" => "QATAR", "RE" => "REUNION", "RO" => "ROMANIA", "RU" => "RUSSIAN FEDERATION", "RW" => "RWANDA", "SH" => "SAINT HELENA", "KN" => "SAINT KITTS AND NEVIS", "LC" => "SAINT LUCIA", "PM" => "SAINT PIERRE AND MIQUELON", "VC" => "SAINT VINCENT AND THE GRENADINES", "WS" => "SAMOA", "SM" => "SAN MARINO", "SA" => "SAUDI ARABIA", "SN" => "SENEGAL", "RS" => "SERBIA", "SC" => "SEYCHELLES", "SG" => "SINGAPORE", "SK" => "SLOVAKIA", "SI" => "SLOVENIA", "SB" => "SOLOMON ISLANDS", "ZA" => "SOUTH AFRICA", "GS" => "SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS", "ES" => "SPAIN", "SR" => "SURINAME", "SJ" => "SVALBARD AND JAN MAYEN", "SZ" => "SWAZILAND", "SE" => "SWEDEN", "CH" => "SWITZERLAND", "TW" => "TAIWAN,  PROVINCE OF CHINA", "TZ" => "TANZANIA, UNITED REPUBLIC OF", "TH" => "THAILAND", "TL" => "TIMOR-LESTE", "TG" => "TOGO", "TK" => "TOKELAU", "TO" => "TONGA", "TT" => "TRINIDAD AND TOBAGO", "TN" => "TUNISIA", "TR" => "TURKEY", "TM" => "TURKMENISTAN", "TC" => "TURKS AND CAICOS ISLANDS", "TV" => "TUVALU", "UG" => "UGANDA", "UA" => "UKRAINE", "AE" => "UNITED ARAB EMIRATES", "GB" => "UNITED KINGDOM", "US" => "UNITED STATES", "UM" => "UNITED STATES MINOR OUTLYING ISLANDS", "UY" => "URUGUAY", "UZ" => "UZBEKISTAN", "VU" => "VANUATU", "VE" => "VENEZUELA", "VN" => "VIETNAM", "VG" => "VIRGIN ISLANDS,  BRITISH", "VI" => "VIRGIN ISLANDS,  U.S.", "WF" => "WALLIS AND FUTUNA", "EH" => "WESTERN SAHARA", "ZM" => "ZAMBIA");?>
<select id="billing_country" name="billing_country" onchange="showAndHideStateDD(this)">
<option value="">Select</option>
<?php foreach($countryarr as $key => $value){?>
<option value="<?php echo $key?>" <?php if($key == $getDetatils->billing_country) echo "selected"?>><?php echo $value?></option>
<?php }?>
</select>
</li>
<li><label>City : </label><input type="text" name="billing_city" value="<?php echo $getDetatils->billing_city?>"/></li>
<li id="stateselect" <?php if($getDetatils->billing_country == "US") echo 'style="display:block"'; else echo 'style="display:none"';?>><label>State : </label>
<?php $statearr=array("AL" => "Alabama", "AK" => "Alaska", "AZ" => "Arizona", "AR" => "Arkansas", "CA" => "California", "CO" => "Colorado", "CT" => "Connecticut", "DE" => "Delaware", "DC" => "District of Columbia", "FL" => "Florida", "GA" => "Georgia", "HI" => "Hawaii", "ID" => "Idaho", "IL" => "Illinois", "IN" => "Indiana", "IA" => "Iowa", "KS" => "Kansas", "KY" => "Kentucky", "LA" => "Louisiana", "ME" => "Maine", "MD" => "Maryland", "MA" => "Massachusetts", "MI" => "Michigan", "MN" => "Minnesota", "MS" => "Mississippi", "MO" => "Missouri", "MT" => "Montana", "NE" => "Nebraska", "NV" => "Nevada", "NH" => "New Hampshire", "NJ" => "New Jersey", "NM" => "New Mexico", "NY" => "New York", "NC" => "North Carolina", "ND" => "North Dakota", "OH" => "Ohio", "OK" => "Oklahoma", "OR" => "Oregon", "PA" => "Pennsylvania", "RI" => "Rhode Island", "SC" => "South Carolina", "SD" => "South Dakota", "TN" => "Tennessee", "TX" => "Texas", "UT" => "Utah", "VT" => "Vermont", "VA" => "Virginia", "WA" => "Washington", "WV" => "West Virginia", "WI" => "Wisconsin", "WY" => "Wyoming");?>
<select id="billing_state" name="billing_state">
<option value="">Select</option>
<?php foreach($statearr as $key => $value){?>
<option value="<?php echo $key?>" <?php if($key == $getDetatils->billing_state) echo "selected"?>><?php echo $value?></option>
<?php }?>
</select>
<div class="zip-sec">Zip code: </div><div class="zip-sec-input"><input type="text" name="billing_zip" class="w-80" value="<?php echo $getDetatils->billing_zip?>"></div>
</li>
<li id="postelselect" <?php if($getDetatils->billing_country != 'US' && $getDetatils->billing_country !='') echo 'style="display:block"'; else echo 'style="display:none"';?>><label>Postal Code : </label><input type="text" name="billing_zip1" class="w-80" value="<?php echo $getDetatils->billing_postal?>" ></li>
<li><label>&nbsp;</label><img src="/directory/wp-content/themes/directorypress/images/card-icon.jpg"/></li>
<li><label>Card Type : </label>
<?php $cardarr=array("MasterCard" => "MasterCard", "VisaCard" => "Visa", "AmExCard" => "American Express", "DiscoverCard" => "Discover", "JCBCard" => "JCB");
//$cardarr=array("MasterCard" => "MasterCard", "VisaCard" => "Visa", "DiscoverCard" => "Discover", "JCBCard" => "JCB");
?>
<select name="CardType">
<option value="">Select</option>
<?php foreach($cardarr as $key => $value){?>
<option value="<?php echo $key?>" <?php if($key == $getDetatils->CardType) echo "selected"?>><?php echo $value?></option>
<?php }?>
</select>
</li>
<li><label>Card Number : </label> <input name="CardNumber" size="16" maxlength="19"></li>
<li><label>Expiration Date : </label>
<input name="ExpMon" size="2" maxlength="2" placeholder="MM" class="w-35 text-al-c" >
<span class="divider">/</span>
<input name="ExpYear" size="4" maxlength="4" placeholder="YYYY" class="w-47 text-al-c" >
<div class="zip-sec">CVC : </div>
<div class="zip-sec-input"><input name="cvc" size="4" maxlength="4" type="password" class="w-80"></div>
</li>
<li><label>&nbsp;</label><div class="annual-sec"><?php echo $msg;?></div></li>
<li><label>&nbsp;</label><input type="button" value="" style="background:url(/directory/wp-content/themes/directorypress/images/purchase-now-but.png) no-repeat; border:none; height:41px; outline:none" OnClick="CheckCardNumber(this.form)"></li>
</ul>
<input type="hidden" name="amount" value="<?php echo $amount?>" />
</form>
</div>
<div class="enter-info-right">
<h1>Testimonials</h1>
<h3><span class="open"></span>The quality of the AffiliatePrograms.com site and product has meant that it has become our top recruiting resource for productive and responsive affiliates. We have had great success with both the directories and forum. They have provided us with exemplary service - they listen to our needs and then work in every way they can to help us reach our objectives. This has quickly become one of our best affiliate marketing resources! We look forward to a long and prosperous relationship between ShareResults.com and Affiliateprograms.com. </h3>
<p>Nicky Senyard, <strong>CEO, ShareResults.com</strong></p>

<h3><span class="open"></span>When I look for a place that has the total package in affiliate marketing information it has to be AffiliatePrograms.com. You have put together a positive thriving forum, interactive newsletters, and an unmatched suite of affiliate directories. I am proud to say that I turn to AffiliatePrograms.com weekly to ensure I stay on top of industry trends. </h3>
<p>Jeremy Parmer, <strong>CEO & Super Affiliate, QuitYourDayJob.com</strong></p>

<h3><span class="open"></span>Since becoming a certified member of Affiliate Programs, they have been a significant recruiting tool for NeverblueAds. We continually find new partners through their forum and directory. Affiliate Programs has proven itself to be a valuable affiliate marketing resource for our company. </h3>
<p>Jordan Visco, <strong>VP Affiliate Marketing, NeverblueAds.com</strong></p>

<h3><span class="open"></span>We have built a strong partnership with AffiliatePrograms.com that has resulted in remarkable service and increased exposure to our web hosting plans. Their forums and listings have allowed for affiliates to be educated and introduced to a variety of hosting plans. They are constantly looking for innovative ways to make sure we succeed in every single area of affiliate marketing. </h3>
<p>Chris Euland, <strong>Chief Operating Officer, Globat.com</strong></p>
</div>
 
<?php get_footer(); ?> 
