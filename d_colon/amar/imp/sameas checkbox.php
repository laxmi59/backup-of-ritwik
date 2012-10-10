<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<script type="text/javascript">
function copyBillToInfo()
{
 if(document.form1.bcheck.checked) 
 {
 
  document.form1.b_fname.value = document.form1.fname.value;
  document.form1.b_lname.value = document.form1.lname.value;
  document.form1.b_phone.value = document.form1.phone.value;
  document.form1.ShipAddress.value = document.form1.BillingAddress.value;
  document.form1.ShipCity.value = document.form1.BillingCity.value;
  document.form1.ShipStateOrProvince.value = document.form1.BillingStateOrProvince.value;;
  document.form1.ShipPostalCode.value = document.form1.BillingPostalCode.value;;
  document.form1.ShipCountry.value = document.form1.BillingCountry.value;;
  document.form1.ShipPhoneNumber.value = document.form1.BillingPhoneNumber.value;;
  }
}
</script>
<body>
<input type="checkbox" name="bcheck" id="bcheck" onclick="return copyBillToInfo()"/>

</body>
</html>
