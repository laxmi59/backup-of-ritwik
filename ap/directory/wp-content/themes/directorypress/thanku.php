<?php
/*
Template Name: Thank You
*/
get_header(); 

$getDetatils=mysql_fetch_object(mysql_query("select * from wpdb_custom_user_data where id=".base64_decode($_REQUEST['succ']).""));
if($getDetatils->package ==1)
	$amount="$299";
else
	$amount="$499";


if($getDetatils){
	$to= $getDetatils->email;
	//$to ="rama@ritwik.com";
	$subject="Your AffiliatePrograms.com Directory Listing";
	$content="Hey there!<br><br>
	Thanks for submitting your affiliate program directory listing to the #1 Affiliate Resource, AffiliatePrograms.com.<br><br>
	One of our affiliate directory specialists will be contacting you within the next 48 hours to get your listing fully set-up for success. In the mean time, if you have any questions, please send across an e-mail to websitesupport@affiliateprograms.com.<br><br>
	If you're interested in additional advertising exposure, please contact sales@affiliateprograms.com.
	Cheers,<br><br>
	The Team at AffiliatePrograms.com";
	if($to <> ''){
		add_filter('wp_mail_content_type',create_function('', 'return "text/html";'));
		wp_mail( $to, $subject, $content, $headers);
	}

	$to1= "david@affiliatemedia.com,arjun@affiliatemedia.com,john@affiliatemedia.com";//$getDetatils->email;
	//$to1 ="rama@ritwik.com";
	$subject1="New Order on the AffiliatePrograms.com Directory";
	$content1="An order has be placed on the AffiliatePrograms.com Directory.<br><br>
	<b>Contact Information</b><br>
	First Name : ".$getDetatils->first_name."<br>
	Last Name : ".$getDetatils->last_name."<br>
	Email Address : ".$getDetatils->email."<br>
	Company : ".$getDetatils->company."<br>
	Phone Number : ".$getDetatils->phone."<br><br>
	<b>Listing Details</b><br>
	Affiliate Program Name : ".$getDetatils->program_name."<br>
	Affiliate Program URL : ".$getDetatils->program_url."<br><br>
	
	<b>Order Amount :</b> ".$amount."<br>";
	if($to1 <> ''){
		add_filter('wp_mail_content_type',create_function('', 'return "text/html";'));
		wp_mail( $to1, $subject1, $content1, $headers);
	}
}
?>
<style>
.sub-listing{}
.sub-listing .enter-info-left h1{margin: 0 0 20px !important;}
.sub-listing p{font-size:15px !important;}
.sub-listing itembox h2{color: #173F8C !important;
    font-size: 20px !important;
    line-height: 32px !important;
    margin: 0 0 10px !important;}
</style>
<div class="sub-listing">
<div class="enter-info-left" style="height:500px;">
<h1>Thanks for submitting your listing!</h1>
<p>One of our affiliate directory specialists will be contacting you with in the next 48 hours to get your listing fully set up.</p>
<p>Please make sure that websitesupport@affiliateprograms.com is on your white list.</p>
<p>In the mean time, feel free to contact us via the information on the right if you have any other questions.</p>
</div>
</div>
 
<?php get_footer(); ?> 
