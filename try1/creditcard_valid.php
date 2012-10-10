<script src="creditcard.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
function testCreditCard () {
  if (checkCreditCard (document.getElementById('CardNumber').value,document.getElementById('CardType').value)) {
    alert ("Credit card has a valid format")
  } 
  else {alert (ccErrors[ccErrorNo])};
}
//-->
</script>
</head>

<body>
<div id="rh-col">
<p class="pageheading">&nbsp;</p>

<table style="font-family: courier; margin-left: 20px; line-height: 0.9em;">
  <tr><td style="padding-right: 30px;">American Express</td><td>3400000000000009</td></tr>
  <tr><td>Carte Blanche</td><td>30000000000004</td></tr> 
  <tr><td>Discover</td><td>6011000000000004</td></tr> 
  <tr><td>Diners Club</td><td>38520000023237</td></tr> 
  <tr><td>enRoute</td><td>201400000000009</td></tr> 
  <tr><td>JCB</td><td>2131000000000008</td></tr> 
  <tr><td>MasterCard</td><td>55000000000000004</td></tr>

  <tr><td>Solo</td><td>6334000000000004</td></tr> 
  <tr><td>Switch</td><td>4903010000000009</td></tr> 
  <tr><td>Visa</td><td>4111111111111111</td></tr>
  <tr><td>Laser</td><td>6304100000000008</td></tr>
</table>

<form id="myform" action="">

<p style="margin-top: 10px;"><span style="color: #ff0000; margin-left: 20px;">Select credit card:</span> 
<select tabindex="11" id="CardType" style="margin-left: 10px;">
  <option value="AmEx">American Express</option>
  <option value="CarteBlanche">Carte Blanche</option>
  <option value="DinersClub">Diners Club</option>
  <option value="Discover">Discover</option>
  <option value="EnRoute">enRoute</option>

  <option value="JCB">JCB</option>
  <option value="Maestro">Maestro</option>
  <option value="MasterCard">MasterCard</option>
  <option value="Solo">Solo</option>
  <option value="Switch">Switch</option>
  <option value="Visa">Visa</option>

  <option value="VisaElectron">Visa Electron</option>
  <option value="LaserCard">Laser</option>
</select>
<span style="color: #ff0000; margin-left: 20px;">Enter number:
<input type="text" id="CardNumber" maxlength="24" size="24" style="margin-left: 10px;" />
<button id="mybutton" type="button" onClick="testCreditCard();" style="margin-left: 30px; color: #f00;">Check</button>
</span></p>
</form>

<p>&nbsp;</p>

<p class="footer" style="margin-top:10px;"><br />
</p>

</div>
</body>
</html>