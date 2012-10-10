<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script type="text/javascript">
    var _csv = {};
    _csv['action_target'] = 'listing_profile';
    _csv['listing_id'] = '10100230';
    _csv['publisher'] = '0905768917';
    _csv['reference_id'] = '10100230';
    _csv['placement'] = 'posting';
   
</script>
<script type="text/javascript" src="http://images.citysearch.net/assets/pfp/scripts/tracker.js"></script>
<noscript>
    <img src='http://api.citysearch.com/tracker/imp?action_target=listing_profile&listing_id=10100230&publisher=0905768917&reference_id=10100230&
    placement=posting' width='1' height='1' alt='' />
</noscript>

</head>

<body><? $js="<script type='text/javascript'>
    var _csv = {};
    _csv['action_target'] = 'listing_profile';
    _csv['listing_id'] = '$listingid';
    _csv['publisher'] = '$publisher';
    _csv['reference_id'] = '$reference_id';
    _csv['placement'] = '$placement';
</script>
<script type='text/javascript' src='http://images.citysearch.net/assets/pfp/scripts/tracker.js'></script><noscript>
    <img src='http://api.citysearch.com/tracker/imp?action_target=listing_profile&listing_id=#LISTINGID#&publisher=#PUBLISHER#&reference_id=#REFERENCEID#&
    placement=#PLACEMENT#' width='1' height='1' alt='' />
</noscript>";
echo $js;
?>
<!--<form method="post" action="http://api2.citysearch.com/profile/" >
-->
<form method="post" action="apicall.php?act=test" >
<input type="text" name="listing_id" id="listing_id" value="10100230" />
<input type="hidden" name="client_ip" id="client_ip" value="121.121.0.1" />
<input type="hidden" name="reference_id" id="reference_id" value="" />
<input type="hidden" name="publisher" id="publisher" value="0905768917" />
<input type="hidden" name="placement" id="placement" value="" />
<input type="hidden" name="api_key" id="api_key" value="gkpyqcng3yj9w4zn9ns2rcr3" />
<input type="hidden" name="format" id="format" value="xml" />
<input type="button" name="get_Value" value="get_Value" onclick="GetResult()" />
<input type="submit" name="submit1" value="submit1" />
<div id="checked">test</div>
</form>
</body>
</html>
