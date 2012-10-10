 
 

<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
<!--
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
-->
    <title>
      Converting Addresses to/from Latitude/Longitude in One Step (Geocoding)
    </title>
    <script src=../email.js></script>
  </head>
  <body>

    <center>
      <font size="5">
        Converting Addresses to/from Latitude/Longitude in One Step
      </font>
      <br>
      <font size="4">
        <script>emailhref()</script>Stephen P. Morse</a>, San Francisco
      </font>
      <br>

      <br>
    </center>

    <form name="buttons">
      <center>
        <input type="button" value="Batch Mode" onClick="window.location='latlonbatch.html';">
        <input type="button" value="Deg/Min/Sec to Decimal" onClick="window.location='dms.html';">
        <input type="button" value="Frequently Asked Questions" onClick="window.location='faqc.htm';">
        <input type="button" value="My Other Webpages" onClick="window.location='../index.html'">

        <br><br>
      </center>
    </form>

    <center>

      <table border="1">
        <tr>
          <td>
            <form method='GET' action='/jcal/latlon.php' name='mainform'>

<input type='hidden' name='cookie' value=''>
<input type='hidden' name='hidden' value=''>
<input type='hidden' name='doextra' value=>
              <input type='hidden' name='time'>
              <input type='hidden' name='addr2latlon' value='0'>
              <table>
                <tr>
                  <td>
                    address
                  </td>
                  <td>

                    <input name='address' value=''>
                  </td>
                </tr>
                <tr>
                  <td>
                    city
                  </td>
                  <td>
                    <input name='city' value=''>

                  </td>
                </tr>
                <tr>
                  <td>
                    state
                  </td>
                  <td>
                    <input name='state' value=''>
                  </td>

                </tr>
                <tr>
                  <td>
                    zip
                  </td>
                  <td>
                    <input name='zip' value=''>
                  </td>
                </tr>

                <tr>
                  <td>
                    country
                  </td>
                  <td>
                    <select name="country">
                  <option value='AF'>Afghanistan</option>
<option value='AL'>Albania</option>
<option value='DZ'>Algeria</option>

<option value='AD'>Andorra</option>
<option value='AO'>Angola</option>
<option value='AG'>Antigua &amp; Barbuda</option>
<option value='AR'>Argentina</option>
<option value='AM'>Armenia</option>
<option value='AU'>Australia</option>
<option value='AT'>Austria</option>
<option value='AJ'>Azerbaydzhan</option>

<option value='BS'>Bahamas</option>
<option value='BH'>Bahrain</option>
<option value='BD'>Bangladesh</option>
<option value='BB'>Barbados</option>
<option value='BY'>Belarus</option>
<option value='BE'>Belgium</option>
<option value='BZ'>Belize</option>
<option value='BJ'>Benin</option>
<option value='BT'>Bhutan</option>

<option value='BO'>Bolivia</option>
<option value='BA'>Bosnia &amp; Hercegovina</option>
<option value='BW'>Botswana</option>
<option value='BR'>Brazil</option>
<option value='BN'>Brunei</option>
<option value='BG'>Bulgaria</option>
<option value='BF'>Burkina Faso</option>
<option value='BI'>Burundi</option>

<option value='KH'>Cambodia</option>
<option value='CM'>Cameroon</option>
<option value='CA'>Canada</option>
<option value='CV'>Cape Verde</option>
<option value='CF'>Central African Rep.</option>
<option value='TD'>Chad</option>
<option value='IC'>Channel Islands</option>
<option value='CL'>Chile</option>
<option value='CN'>China</option>

<option value='CO'>Colombia</option>
<option value='KM'>Comores</option>
<option value='CG'>Congo</option>
<option value='ZR'>Congo (Dem. Rep.)</option>
<option value='CR'>Costa Rica</option>
<option value='HR'>Croatia</option>
<option value='CU'>Cuba</option>
<option value='CY'>Cyprus</option>
<option value='CZ'>Czech Republic</option>

<option value='DK'>Denmark</option>
<option value='DJ'>Djibouti</option>
<option value='DM'>Dominica</option>
<option value='DO'>Dominican Republic</option>
<option value='EC'>Ecuador</option>
<option value='EG'>Egypt</option>
<option value='SV'>El Salvador</option>
<option value='GQ'>Equatorial Guinea</option>
<option value='ER'>Eritrea</option>

<option value='EE'>Estonia</option>
<option value='ET'>Ethiopia</option>
<option value='FO'>Faeroe Islands</option>
<option value='FK'>Falklands</option>
<option value='FI'>Finland</option>
<option value='FR'>France</option>
<option value='GF'>French Guiana</option>
<option value='GA'>Gabon</option>
<option value='GM'>Gambia</option>

<option value='GE'>Georgia</option>
<option value='DE'>Germany</option>
<option value='GH'>Ghana</option>
<option value='GI'>Gibraltar</option>
<option value='GR'>Greece</option>
<option value='GD'>Grenada</option>
<option value='GP'>Guadeloupe</option>
<option value='GT'>Guatemala</option>
<option value='GN'>Guinea</option>

<option value='GW'>Guinea-Bissau</option>
<option value='GY'>Guyana</option>
<option value='HT'>Haiti</option>
<option value='HN'>Honduras</option>
<option value='HK'>HongKong</option>
<option value='HU'>Hungary</option>
<option value='IS'>Iceland</option>
<option value='IN' selected='1'>India</option>
<option value='ID'>Indonesia</option>

<option value='IR'>Iran</option>
<option value='IQ'>Iraq</option>
<option value='IE'>Ireland</option>
<option value='IL'>Israel</option>
<option value='IT'>Italy</option>
<option value='CI'>Ivory Coast</option>
<option value='JM'>Jamaica</option>
<option value='JP'>Japan</option>
<option value='JO'>Jordan</option>

<option value='KZ'>Kazakhstan</option>
<option value='KE'>Kenya</option>
<option value='KG'>Kirghizia</option>
<option value='KW'>Kuwait</option>
<option value='LA'>Laos</option>
<option value='LV'>Latvia</option>
<option value='LB'>Lebanon</option>
<option value='LS'>Lesotho</option>
<option value='LR'>Liberia</option>

<option value='LY'>Libya</option>
<option value='LI'>Liechtenstein</option>
<option value='LT'>Lithuania</option>
<option value='LU'>Luxembourg</option>
<option value='MO'>Macau</option>
<option value='MK'>Macedonia</option>
<option value='MG'>Madagascar</option>
<option value='MW'>Malawi</option>
<option value='MY'>Malaysia</option>

<option value='ML'>Mali</option>
<option value='MT'>Malta</option>
<option value='MI'>Man Island</option>
<option value='MQ'>Martinique</option>
<option value='MR'>Mauritania</option>
<option value='MU'>Mauritius</option>
<option value='YT'>Mayotte</option>
<option value='MX'>Mexico</option>
<option value='MD'>Moldova</option>

<option value='MC'>Monaco</option>
<option value='MN'>Mongolia</option>
<option value='MS'>Montserrat</option>
<option value='MA'>Morocco</option>
<option value='MZ'>Mozambique</option>
<option value='MM'>Myanmar</option>
<option value='NA'>Namibia</option>
<option value='NP'>Nepal</option>
<option value='NL'>Netherlands</option>

<option value='AN'>Netherlands Antilles</option>
<option value='NZ'>New Zealand</option>
<option value='NI'>Nicaragua</option>
<option value='NE'>Niger</option>
<option value='NG'>Nigeria</option>
<option value='KP'>North Korea</option>
<option value='NO'>Norway</option>
<option value='OM'>Oman</option>
<option value='PK'>Pakistan</option>

<option value='PA'>Panama</option>
<option value='PG'>Papua New Guinea</option>
<option value='PY'>Paraguay</option>
<option value='PE'>Peru</option>
<option value='PH'>Philippines</option>
<option value='PL'>Poland</option>
<option value='PT'>Portugal</option>
<option value='PR'>Puerto Rico</option>
<option value='QA'>Qatar</option>

<option value='RE'>Reunion</option>
<option value='RO'>Romania</option>
<option value='RU'>Russia</option>
<option value='RW'>Rwanda</option>
<option value='KN'>Saint Kitts &amp; Nevis</option>
<option value='LC'>Saint Lucia</option>
<option value='VC'>Saint Vincent</option>
<option value='SM'>San Marino</option>

<option value='ST'>Sao Tome &amp; Principe</option>
<option value='SA'>Saudi Arabia</option>
<option value='SN'>Senegal</option>
<option value='SL'>Sierra Leone</option>
<option value='SG'>Singapore</option>
<option value='SK'>Slovakia</option>
<option value='SI'>Slovenia</option>
<option value='SO'>Somalia</option>

<option value='ZA'>South Africa</option>
<option value='KR'>South Korea</option>
<option value='ES'>Spain</option>
<option value='LK'>Sri Lanka</option>
<option value='SD'>Sudan</option>
<option value='SR'>Suriname</option>
<option value='SZ'>Swaziland</option>
<option value='SE'>Sweden</option>
<option value='CH'>Switzerland</option>

<option value='SY'>Syria</option>
<option value='TJ'>Tadzhikistan</option>
<option value='TW'>Taiwan</option>
<option value='TZ'>Tanzania</option>
<option value='TH'>Thailand</option>
<option value='VA'>The Vatican</option>
<option value='TG'>Togo</option>
<option value='TT'>Trinidad &amp; Tobago</option>

<option value='TN'>Tunisia</option>
<option value='TR'>Turkey</option>
<option value='TM'>Turkmenistan</option>
<option value='UG'>Uganda</option>
<option value='UA'>Ukraine</option>
<option value='AE'>United Arab Emirates</option>
<option value='UK'>United Kingdom</option>
<option value='US'>United States</option>
<option value='UY'>Uruguay</option>

<option value='UZ'>Uzbekistan</option>
<option value='UE'>Venezuela</option>
<option value='VN'>Vietnam</option>
<option value='YE'>Yemen</option>
<option value='YU'>Yugoslavia</option>
<option value='ZM'>Zambia</option>
<option value='ZW'>Zimbabwe</option>
                    </select>
                  </td>

                </t>
                <tr>
                  <td colspan="2">
                    <input type="button" value="Determine Latitude/Longitude" onClick="GetLatlon();">
                  </td>
                </tr>
<!--
                <tr>
                  <td colspan="2" align="center">
                    <img id='codeimage' src='http://stevemorse.org/jcal/latlonraw2c.php?cookie='>
                  </td>
                <tr>
                <tr>
                  <td colspan="2">
                    <center>
                      Above code is used by travelgis.<br>
                      Enter it in the field below.
                    </center>
                  </td>
                <tr>
                  <td>
                  </td>
                  <td>
                    <input name="secretcode" type="text" id="secretcode">
                  </td>
                </tr>
-->
              </table>
            </td>

            <td>
              <input type='hidden' name='latlon2addr' val="0">
              <table>
                <tr>
                  <td>
                    latitude
                  </td>
                  <td>
                    <input name='latitude' value='16.9697142'>

                  </td>
                </tr>
                <tr>
                  <td>
                    longitude
                  </td>
                  <td>
                    <input name='longitude' value='82.23843'>
                  </td>

                </tr>
                <tr>
                  <td colspan="2" align="center">
                    <i><font size="2">
                      above values must be in decimal<br>
                      with minus signs for south and west
                    </font></i>
                  </td>
                </tr>

                <tr><td>&nbsp;</td></tr>
                <tr>
                  <td colspan="2" align="center">
                    <input type="button" value="Determine Address" onClick="GetAddress();">
                  </td>
                </tr>
<!--
                <tr>
                  <td colspan="2" align="center">
                    <font size="2">Currently for US & Canada only</font>
                  </td>
                </tr>
-->
              </table>
            </td>

          </form>
        </tr>
      </table>
      <script>
        document.cookie = "test=1;expires=0";
        if (document.cookie == "") {
          document.write("Cookies must be enabled in order to use this site");
        }
      </script>

    
    <script>

      function GetLatlon() {
        var form = document.mainform;
        if (form.city.value == "") {
          alert("City field must not be blank");
          return;
        }
        if (form.state.value == "" &&
             (form.country.value == "US" || form.country.value=="CA")) {
          alert("State field for US and Canada must not be blank");
          return;
        }

        var time = new Date().getTime(); // get current time 
        document.cookie = "time=" + time; // plant the cookie 
        form.time.value = time; // insert time in a hidden field 
        form.addr2latlon.value = "1";
        form.latlon2addr.value = "0";
        form.submit();
      }

      function GetAddress() {
        var form = document.mainform;
        if (form.latitude.value == "") {
          alert("Latitude field must not be blank");
          return;
        }
        if (form.longitude.value == "") {
          alert("Longitude field must not be blank");
          return;
        }

        var time = new Date().getTime(); // get current time 
        document.cookie = "time=" + time; // plant the cookie 
        form.time.value = time; // insert time in a hidden field 
        form.latlon2addr.value = "1";
        form.addr2latlon.value = "0";
        form.submit();
      }

    </script>

    </center>

    <br><br>
    <font size="2">
      Data presented here comes from the following websites:
      <blockquote>
        <a href="http://maps.google.com" target="_blank">google</a>. (all addresses)<br>
        <a href="http://geocoder.us" target="_blank">geocoder</a>. (US addresses only)<br>
        <a href="http://geocoder.ibegin.com" target="_blank">ibegin</a>. (US and Canadian addresses only)<br>

        <a href="http://tools.locatienet.com/location/edit/" target="_blank">locatienet</a>. (European addresses only)<br>
        <!-- discovered on 2-11-2009 that this no longer works
        <a href="http://demo.mappoint.net" target="_blank">mappoint (reverse geocoding only)<br>
-->
        <a href="http://terraserver-usa.com" target="_blank">terraserver</a>. (US addresses only)<br>
        <a href="https://webgis.usc.edu/" target="_blank">usc</a>. (US addresses only)<br>
        <a href="http://msdn.microsoft.com/en-us/virtualearth/default.aspx" target="_blank">virtual earth (reverse geocoding only)<br>

        <a href="http://yahoo.com" target="_blank">yahoo</a>. (US addresses only)<br>
                <!-- drop it since they are blocking my IP address
        <strike><a href="http://www.travelgis.com/geocode/Default.aspx" target="_blank">travelgis</a></strike>.  (travelgis is blocking requests from my server)
-->
      </blockquote>
      <br><br>
      &copy; Stephen P. Morse, 2004
    </font>
    <br><a href="http://stevemorse.org" target="_top"><img src="../favicon.jpg"></a>

  </body>
</html>
