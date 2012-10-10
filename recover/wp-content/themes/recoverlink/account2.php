<?php
/*
Template Name: account
*/
  
get_header();
?>
<script src="<?php bloginfo('template_directory'); ?>/SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="<?php bloginfo('template_directory'); ?>/SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css">

<div class="container">
<div class="account-cancel">If you are not satisfied with RecoverLink , you can cancel during the trial period and owe nothing more.<br>
            If you cancel after the trial period, then no refund will be given.
            <input type="button" value="Cancel This Service" class="submit"  />
          </div>
  <div id="TabbedPanels1" class="TabbedPanels">
    <ul class="TabbedPanelsTabGroup">
      <li class="TabbedPanelsTab" tabindex="0">My Account</li>
      <li class="TabbedPanelsTab" tabindex="0">My Membership Info</li>
      <li class="TabbedPanelsTab" tabindex="0">My Label Set</li>
      <li class="TabbedPanelsTab" tabindex="0">Transaction History</li>
      <li class="TabbedPanelsTab" tabindex="0">Order More Labels</li>
    </ul>
    <div class="TabbedPanelsContentGroup"> 
      <!--tab1 content-->
      <div class="TabbedPanelsContent">
        <form onsubmit="#" id="myForm" action="#" method="post" class="contactform" style="padding-top:0px;">
          
          <div id="pas">
            <div class="pas1">
              <div class="fonter">&nbsp;First Name:</div>
              <div class="field-widget">
                <input type="text" value="amrutha" title="Enter your First Name" class="required inputbox " id="field12" size="40" name="field12">
              </div>
            </div>
            <div class="pas1">
              <div class="fonter">Password:</div>
              <div class="field-widget">
                <input type="password" value="amrutha" title="Enter a password greater than 7 characters" class="required validate-password inputbox" id="field" size="40" name="field">
              </div>
            </div>
            <div class="pas1">
              <div class="fonter">Email:</div>
              <div class="field-widget">
                <input type="text" value="amrutha.songala@gmail.com" title="Enter your email address" class="required validate-email inputbox" id="field2" size="40" name="field2">
              </div>
            </div>
            <div class="pas1">
              <div class="fonter">&nbsp;Phone:(Home)</div>
              <div class="field-widget">
                <input type="text" value="(123)454-567" title="Please enter phone number" class="inputbox validate-telephone"  id="field15" size="40" name="field15">
              </div>
            </div>
            <div class="pas1">
              <div class="fonter">&nbsp;Phone:(Cell)</div>
              <div class="field-widget">
                <input type="text" value="1234567890" size="40"  class="inputbox validate-telephone" id="pcell2" name="pcell2">
              </div>
            </div>
          </div>
          <div id="pass">
            <div class="pas1">
              <div class="fonter">&nbsp;Last Name:</div>
              <div class="field-widget">
                <input type="text" value="songala" title="Enter your Last Name" class="required inputbox" id="field13" size="40" name="field13">
              </div>
            </div>
            <div class="pas1">
              <div class="fonter">Confirm Password:</div>
              <div class="field-widget">
                <input name="field4" size="40" id="field4" class="required validate-password-confirm" title="Enter the same password for confirmation" type="password">
              </div>
            </div>
            <div class="pas1">
              <div class="fonter">Confirm Email:</div>
              <div class="field-widget">
                <input type="text" value="amrutha.songala@gmail.com" class="required validate-email-confirm inputbox" id="field14" size="40" name="field14">
              </div>
            </div>
            <div class="pas1">
              <div class="fonter">Phone:(Work)</div>
              <div class="field-widget">
                <input type="text" value="(124)356-7899" class="inputbox validate-telephone" size="40"  id="pwork2" name="pwork2">
              </div>
            </div>
            <div class="pas1">
              <div class="fonter">Fax:</div>
              <div class="field-widget">
                <input type="text" value="0" class="inputbox validate-number" size="40"  name="fax2">
              </div>
            </div>
          </div>
          <div class="border-bottom"></div>
          <h3> Billing &nbsp;Address:</h3>
          <div id="pas">
            <div class="pas1">
              <div class="fonter">Address:</div>
              <div class="field-widget">
                <input type="text" value="test" title="Please enter address" class="required inputbox" id="field7" size="40" name="field7">
              </div>
            </div>
            <div class="pas1">
              <div class="fonter">&nbsp;Country:</div>
              <div class="field-widget">
                <input type="text" value="test" title="Please enter city" size="40" class="required inputbox" id="field5" name="field5">
              </div>
            </div>
            <div class="pas1">
              <div class="fonter">&nbsp;State/Province</div>
              <div class="field-widget">
                <input type="text" id="stateSelect3" name="stateSelect3" class="required inputf inputbox" size="20" value="test">
              </div>
            </div>
          </div>
          <div id="pass">
            <div class="pas1">
              <div class="fonter">&nbsp;City:</div>
              <div class="field-widget">
                <input type="text" value="test" title="Please enter city" size="40" class="required inputbox" id="field11" name="field11">
              </div>
            </div>
            <div class="pas1">
              <div class="fonter">&nbsp;Country:</div>
              <div class="field-widget">
                <select onchange="populateState()" name="country2" class="inputbox" id="country">
                  <option value="US">United States</option>
                  <option value="AF">Afghanistan</option>
                  <option value="AL">Albania</option>
                  <option value="DZ">Algeria</option>
                  <option value="AS">American Samoa</option>
                  <option value="AD">Andorra</option>
                  <option value="AO">Angola</option>
                  <option value="AI">Anguilla</option>
                  <option value="AQ">Antarctica</option>
                  <option value="AG">Antigua and Barbuda</option>
                  <option value="AR">Argentina</option>
                  <option value="AM">Armenia</option>
                  <option value="AW">Aruba</option>
                  <option value="AU">Australia</option>
                  <option value="AT">Austria</option>
                  <option value="AZ">Azerbaijan</option>
                  <option value="AP">Azores</option>
                  <option value="BS">Bahamas</option>
                  <option value="BH">Bahrain</option>
                  <option value="BD">Bangladesh</option>
                  <option value="BB">Barbados</option>
                  <option value="BY">Belarus</option>
                  <option value="BE">Belgium</option>
                  <option value="BZ">Belize</option>
                  <option value="BJ">Benin</option>
                  <option value="BM">Bermuda</option>
                  <option value="BT">Bhutan</option>
                  <option value="BO">Bolivia</option>
                  <option value="BA">Bosnia And Herzegowina</option>
                  <option value="XB">Bosnia-Herzegovina</option>
                  <option value="BW">Botswana</option>
                  <option value="BV">Bouvet Island</option>
                  <option value="BR">Brazil</option>
                  <option value="IO">British Indian Ocean Territory</option>
                  <option value="VG">British Virgin Islands</option>
                  <option value="BN">Brunei Darussalam</option>
                  <option value="BG">Bulgaria</option>
                  <option value="BF">Burkina Faso</option>
                  <option value="BI">Burundi</option>
                  <option value="KH">Cambodia</option>
                  <option value="CM">Cameroon</option>
                  <option value="CA">Canada</option>
                  <option value="CV">Cape Verde</option>
                  <option value="KY">Cayman Islands</option>
                  <option value="CF">Central African Republic</option>
                  <option value="TD">Chad</option>
                  <option value="CL">Chile</option>
                  <option value="CN">China</option>
                  <option value="CX">Christmas Island</option>
                  <option value="CC">Cocos (Keeling) Islands</option>
                  <option value="CO">Colombia</option>
                  <option value="KM">Comoros</option>
                  <option value="CG">Congo</option>
                  <option value="CD">Congo, The Democratic Republic O</option>
                  <option value="CK">Cook Islands</option>
                  <option value="XE">Corsica</option>
                  <option value="CR">Costa Rica</option>
                  <option value="CI">Cote d` Ivoire (Ivory Coast)</option>
                  <option value="HR">Croatia</option>
                  <option value="CU">Cuba</option>
                  <option value="CY">Cyprus</option>
                  <option value="CZ">Czech Republic</option>
                  <option value="DK">Denmark</option>
                  <option value="DJ">Djibouti</option>
                  <option value="DM">Dominica</option>
                  <option value="DO">Dominican Republic</option>
                  <option value="TP">East Timor</option>
                  <option value="EC">Ecuador</option>
                  <option value="EG">Egypt</option>
                  <option value="SV">El Salvador</option>
                  <option value="GQ">Equatorial Guinea</option>
                  <option value="ER">Eritrea</option>
                  <option value="EE">Estonia</option>
                  <option value="ET">Ethiopia</option>
                  <option value="FK">Falkland Islands (Malvinas)</option>
                  <option value="FO">Faroe Islands</option>
                  <option value="FJ">Fiji</option>
                  <option value="FI">Finland</option>
                  <option value="FR">France (Includes Monaco)</option>
                  <option value="FX">France, Metropolitan</option>
                  <option value="GF">French Guiana</option>
                  <option value="PF">French Polynesia</option>
                  <option value="TA">French Polynesia (Tahiti)</option>
                  <option value="TF">French Southern Territories</option>
                  <option value="GA">Gabon</option>
                  <option value="GM">Gambia</option>
                  <option value="GE">Georgia</option>
                  <option value="DE">Germany</option>
                  <option value="GH">Ghana</option>
                  <option value="GI">Gibraltar</option>
                  <option value="GR">Greece</option>
                  <option value="GL">Greenland</option>
                  <option value="GD">Grenada</option>
                  <option value="GP">Guadeloupe</option>
                  <option value="GU">Guam</option>
                  <option value="GT">Guatemala</option>
                  <option value="GN">Guinea</option>
                  <option value="GW">Guinea-Bissau</option>
                  <option value="GY">Guyana</option>
                  <option value="HT">Haiti</option>
                  <option value="HM">Heard And Mc Donald Islands</option>
                  <option value="VA">Holy See (Vatican City State)</option>
                  <option value="HN">Honduras</option>
                  <option value="HK">Hong Kong</option>
                  <option value="HU">Hungary</option>
                  <option value="IS">Iceland</option>
                  <option value="IN">India</option>
                  <option value="ID">Indonesia</option>
                  <option value="IR">Iran</option>
                  <option value="IQ">Iraq</option>
                  <option value="IE">Ireland</option>
                  <option value="EI">Ireland (Eire)</option>
                  <option value="IL">Israel</option>
                  <option value="IT">Italy</option>
                  <option value="JM">Jamaica</option>
                  <option value="JP">Japan</option>
                  <option value="JO">Jordan</option>
                  <option value="KZ">Kazakhstan</option>
                  <option value="KE">Kenya</option>
                  <option value="KI">Kiribati</option>
                  <option value="KP">Korea, Democratic People'S Repub</option>
                  <option value="KW">Kuwait</option>
                  <option value="KG">Kyrgyzstan</option>
                  <option value="LA">Laos</option>
                  <option value="LV">Latvia</option>
                  <option value="LB">Lebanon</option>
                  <option value="LS">Lesotho</option>
                  <option value="LR">Liberia</option>
                  <option value="LY">Libya</option>
                  <option value="LI">Liechtenstein</option>
                  <option value="LT">Lithuania</option>
                  <option value="LU">Luxembourg</option>
                  <option value="MO">Macao</option>
                  <option value="MK">Macedonia</option>
                  <option value="MG">Madagascar</option>
                  <option value="ME">Madeira Islands</option>
                  <option value="MW">Malawi</option>
                  <option value="MY">Malaysia</option>
                  <option value="MV">Maldives</option>
                  <option value="ML">Mali</option>
                  <option value="MT">Malta</option>
                  <option value="MH">Marshall Islands</option>
                  <option value="MQ">Martinique</option>
                  <option value="MR">Mauritania</option>
                  <option value="MU">Mauritius</option>
                  <option value="YT">Mayotte</option>
                  <option value="MX">Mexico</option>
                  <option value="FM">Micronesia, Federated States Of</option>
                  <option value="MD">Moldova, Republic Of</option>
                  <option value="MC">Monaco</option>
                  <option value="MN">Mongolia</option>
                  <option value="MS">Montserrat</option>
                  <option value="MA">Morocco</option>
                  <option value="MZ">Mozambique</option>
                  <option value="MM">Myanmar (Burma)</option>
                  <option value="NA">Namibia</option>
                  <option value="NR">Nauru</option>
                  <option value="NP">Nepal</option>
                  <option value="NL">Netherlands</option>
                  <option value="AN">Netherlands Antilles</option>
                  <option value="NC">New Caledonia</option>
                  <option value="NZ">New Zealand</option>
                  <option value="NI">Nicaragua</option>
                  <option value="NE">Niger</option>
                  <option value="NG">Nigeria</option>
                  <option value="NU">Niue</option>
                  <option value="NF">Norfolk Island</option>
                  <option value="MP">Northern Mariana Islands</option>
                  <option value="NO">Norway</option>
                  <option value="OM">Oman</option>
                  <option value="PK">Pakistan</option>
                  <option value="PW">Palau</option>
                  <option value="PS">Palestinian Territory, Occupied</option>
                  <option value="PA">Panama</option>
                  <option value="PG">Papua New Guinea</option>
                  <option value="PY">Paraguay</option>
                  <option value="PE">Peru</option>
                  <option value="PH">Philippines</option>
                  <option value="PN">Pitcairn</option>
                  <option value="PL">Poland</option>
                  <option value="PT">Portugal</option>
                  <option value="PR">Puerto Rico</option>
                  <option value="QA">Qatar</option>
                  <option value="RE">Reunion</option>
                  <option value="RO">Romania</option>
                  <option value="RU">Russian Federation</option>
                  <option value="RW">Rwanda</option>
                  <option value="KN">Saint Kitts And Nevis</option>
                  <option value="SM">San Marino</option>
                  <option value="ST">Sao Tome and Principe</option>
                  <option value="SA">Saudi Arabia</option>
                  <option value="SN">Senegal</option>
                  <option value="XS">Serbia-Montenegro</option>
                  <option value="SC">Seychelles</option>
                  <option value="SL">Sierra Leone</option>
                  <option value="SG">Singapore</option>
                  <option value="SK">Slovak Republic</option>
                  <option value="SI">Slovenia</option>
                  <option value="SB">Solomon Islands</option>
                  <option value="SO">Somalia</option>
                  <option value="ZA">South Africa</option>
                  <option value="GS">South Georgia And The South Sand</option>
                  <option value="KR">South Korea</option>
                  <option value="ES">Spain</option>
                  <option value="LK">Sri Lanka</option>
                  <option value="NV">St. Christopher and Nevis</option>
                  <option value="SH">St. Helena</option>
                  <option value="LC">St. Lucia</option>
                  <option value="PM">St. Pierre and Miquelon</option>
                  <option value="VC">St. Vincent and the Grenadines</option>
                  <option value="SD">Sudan</option>
                  <option value="SR">Suriname</option>
                  <option value="SJ">Svalbard And Jan Mayen Islands</option>
                  <option value="SZ">Swaziland</option>
                  <option value="SE">Sweden</option>
                  <option value="CH">Switzerland</option>
                  <option value="SY">Syrian Arab Republic</option>
                  <option value="TW">Taiwan</option>
                  <option value="TJ">Tajikistan</option>
                  <option value="TZ">Tanzania</option>
                  <option value="TH">Thailand</option>
                  <option value="TG">Togo</option>
                  <option value="TK">Tokelau</option>
                  <option value="TO">Tonga</option>
                  <option value="TT">Trinidad and Tobago</option>
                  <option value="XU">Tristan da Cunha</option>
                  <option value="TN">Tunisia</option>
                  <option value="TR">Turkey</option>
                  <option value="TM">Turkmenistan</option>
                  <option value="TC">Turks and Caicos Islands</option>
                  <option value="TV">Tuvalu</option>
                  <option value="UG">Uganda</option>
                  <option value="UA">Ukraine</option>
                  <option value="AE">United Arab Emirates</option>
                  <option value="UK">United Kingdom</option>
                  <option value="GB">Great Britain</option>
                  <option value="US">United States</option>
                  <option value="UM">United States Minor Outlying Isl</option>
                  <option value="UY">Uruguay</option>
                  <option value="UZ">Uzbekistan</option>
                  <option value="VU">Vanuatu</option>
                  <option value="XV">Vatican City</option>
                  <option value="VE">Venezuela</option>
                  <option value="VN">Vietnam</option>
                  <option value="VI">Virgin Islands (U.S.)</option>
                  <option value="WF">Wallis and Furuna Islands</option>
                  <option value="EH">Western Sahara</option>
                  <option value="WS">Western Samoa</option>
                  <option value="YE">Yemen</option>
                  <option value="YU">Yugoslavia</option>
                  <option value="ZR">Zaire</option>
                  <option value="ZM">Zambia</option>
                  <option value="ZW">Zimbabwe</option>
                  <option value="undefined">undefined</option>
                </select>
              </div>
            </div>
            <div class="pas1">
              <div class="fonter">&nbsp;Zip/Postal Code:</div>
              <div class="field-widget">
                <input type="text" value="12345" title="Please enter zip/postal code" maxlength="5" class="required inputbox validate-number" id="field3" size="40" name="field3">
              </div>
            </div>
          </div>
          <div class="border-bottom"></div>
          <h3> Shipping Address:</h3>
          <div id="pas">
            <div class="pas1">
              <div class="fonter">Address:</div>
              <div class="field-widget">
                <input type="text" value="" size="40"  class="inputbox" name="ad">
              </div>
            </div>
            <div class="pas1">
              <div class="fonter">&nbsp;Country:</div>
              <div class="field-widget">
                <select onchange="populateState2()" name="countrySelect" class="inputbox" id="countrySelect">
                  <option value="">Select Country</option>
                  <option value="AF">Afghanistan</option>
                  <option value="AL">Albania</option>
                  <option value="DZ">Algeria</option>
                  <option value="AS">American Samoa</option>
                  <option value="AD">Andorra</option>
                  <option value="AO">Angola</option>
                  <option value="AI">Anguilla</option>
                  <option value="AQ">Antarctica</option>
                  <option value="AG">Antigua and Barbuda</option>
                  <option value="AR">Argentina</option>
                  <option value="AM">Armenia</option>
                  <option value="AW">Aruba</option>
                  <option value="AU">Australia</option>
                  <option value="AT">Austria</option>
                  <option value="AZ">Azerbaijan</option>
                  <option value="AP">Azores</option>
                  <option value="BS">Bahamas</option>
                  <option value="BH">Bahrain</option>
                  <option value="BD">Bangladesh</option>
                  <option value="BB">Barbados</option>
                  <option value="BY">Belarus</option>
                  <option value="BE">Belgium</option>
                  <option value="BZ">Belize</option>
                  <option value="BJ">Benin</option>
                  <option value="BM">Bermuda</option>
                  <option value="BT">Bhutan</option>
                  <option value="BO">Bolivia</option>
                  <option value="BA">Bosnia And Herzegowina</option>
                  <option value="XB">Bosnia-Herzegovina</option>
                  <option value="BW">Botswana</option>
                  <option value="BV">Bouvet Island</option>
                  <option value="BR">Brazil</option>
                  <option value="IO">British Indian Ocean Territory</option>
                  <option value="VG">British Virgin Islands</option>
                  <option value="BN">Brunei Darussalam</option>
                  <option value="BG">Bulgaria</option>
                  <option value="BF">Burkina Faso</option>
                  <option value="BI">Burundi</option>
                  <option value="KH">Cambodia</option>
                  <option value="CM">Cameroon</option>
                  <option value="CA">Canada</option>
                  <option value="CV">Cape Verde</option>
                  <option value="KY">Cayman Islands</option>
                  <option value="CF">Central African Republic</option>
                  <option value="TD">Chad</option>
                  <option value="CL">Chile</option>
                  <option value="CN">China</option>
                  <option value="CX">Christmas Island</option>
                  <option value="CC">Cocos (Keeling) Islands</option>
                  <option value="CO">Colombia</option>
                  <option value="KM">Comoros</option>
                  <option value="CG">Congo</option>
                  <option value="CD">Congo, The Democratic Republic O</option>
                  <option value="CK">Cook Islands</option>
                  <option value="XE">Corsica</option>
                  <option value="CR">Costa Rica</option>
                  <option value="CI">Cote d` Ivoire (Ivory Coast)</option>
                  <option value="HR">Croatia</option>
                  <option value="CU">Cuba</option>
                  <option value="CY">Cyprus</option>
                  <option value="CZ">Czech Republic</option>
                  <option value="DK">Denmark</option>
                  <option value="DJ">Djibouti</option>
                  <option value="DM">Dominica</option>
                  <option value="DO">Dominican Republic</option>
                  <option value="TP">East Timor</option>
                  <option value="EC">Ecuador</option>
                  <option value="EG">Egypt</option>
                  <option value="SV">El Salvador</option>
                  <option value="GQ">Equatorial Guinea</option>
                  <option value="ER">Eritrea</option>
                  <option value="EE">Estonia</option>
                  <option value="ET">Ethiopia</option>
                  <option value="FK">Falkland Islands (Malvinas)</option>
                  <option value="FO">Faroe Islands</option>
                  <option value="FJ">Fiji</option>
                  <option value="FI">Finland</option>
                  <option value="FR">France (Includes Monaco)</option>
                  <option value="FX">France, Metropolitan</option>
                  <option value="GF">French Guiana</option>
                  <option value="PF">French Polynesia</option>
                  <option value="TA">French Polynesia (Tahiti)</option>
                  <option value="TF">French Southern Territories</option>
                  <option value="GA">Gabon</option>
                  <option value="GM">Gambia</option>
                  <option value="GE">Georgia</option>
                  <option value="DE">Germany</option>
                  <option value="GH">Ghana</option>
                  <option value="GI">Gibraltar</option>
                  <option value="GR">Greece</option>
                  <option value="GL">Greenland</option>
                  <option value="GD">Grenada</option>
                  <option value="GP">Guadeloupe</option>
                  <option value="GU">Guam</option>
                  <option value="GT">Guatemala</option>
                  <option value="GN">Guinea</option>
                  <option value="GW">Guinea-Bissau</option>
                  <option value="GY">Guyana</option>
                  <option value="HT">Haiti</option>
                  <option value="HM">Heard And Mc Donald Islands</option>
                  <option value="VA">Holy See (Vatican City State)</option>
                  <option value="HN">Honduras</option>
                  <option value="HK">Hong Kong</option>
                  <option value="HU">Hungary</option>
                  <option value="IS">Iceland</option>
                  <option value="IN">India</option>
                  <option value="ID">Indonesia</option>
                  <option value="IR">Iran</option>
                  <option value="IQ">Iraq</option>
                  <option value="IE">Ireland</option>
                  <option value="EI">Ireland (Eire)</option>
                  <option value="IL">Israel</option>
                  <option value="IT">Italy</option>
                  <option value="JM">Jamaica</option>
                  <option value="JP">Japan</option>
                  <option value="JO">Jordan</option>
                  <option value="KZ">Kazakhstan</option>
                  <option value="KE">Kenya</option>
                  <option value="KI">Kiribati</option>
                  <option value="KP">Korea, Democratic People'S Repub</option>
                  <option value="KW">Kuwait</option>
                  <option value="KG">Kyrgyzstan</option>
                  <option value="LA">Laos</option>
                  <option value="LV">Latvia</option>
                  <option value="LB">Lebanon</option>
                  <option value="LS">Lesotho</option>
                  <option value="LR">Liberia</option>
                  <option value="LY">Libya</option>
                  <option value="LI">Liechtenstein</option>
                  <option value="LT">Lithuania</option>
                  <option value="LU">Luxembourg</option>
                  <option value="MO">Macao</option>
                  <option value="MK">Macedonia</option>
                  <option value="MG">Madagascar</option>
                  <option value="ME">Madeira Islands</option>
                  <option value="MW">Malawi</option>
                  <option value="MY">Malaysia</option>
                  <option value="MV">Maldives</option>
                  <option value="ML">Mali</option>
                  <option value="MT">Malta</option>
                  <option value="MH">Marshall Islands</option>
                  <option value="MQ">Martinique</option>
                  <option value="MR">Mauritania</option>
                  <option value="MU">Mauritius</option>
                  <option value="YT">Mayotte</option>
                  <option value="MX">Mexico</option>
                  <option value="FM">Micronesia, Federated States Of</option>
                  <option value="MD">Moldova, Republic Of</option>
                  <option value="MC">Monaco</option>
                  <option value="MN">Mongolia</option>
                  <option value="MS">Montserrat</option>
                  <option value="MA">Morocco</option>
                  <option value="MZ">Mozambique</option>
                  <option value="MM">Myanmar (Burma)</option>
                  <option value="NA">Namibia</option>
                  <option value="NR">Nauru</option>
                  <option value="NP">Nepal</option>
                  <option value="NL">Netherlands</option>
                  <option value="AN">Netherlands Antilles</option>
                  <option value="NC">New Caledonia</option>
                  <option value="NZ">New Zealand</option>
                  <option value="NI">Nicaragua</option>
                  <option value="NE">Niger</option>
                  <option value="NG">Nigeria</option>
                  <option value="NU">Niue</option>
                  <option value="NF">Norfolk Island</option>
                  <option value="MP">Northern Mariana Islands</option>
                  <option value="NO">Norway</option>
                  <option value="OM">Oman</option>
                  <option value="PK">Pakistan</option>
                  <option value="PW">Palau</option>
                  <option value="PS">Palestinian Territory, Occupied</option>
                  <option value="PA">Panama</option>
                  <option value="PG">Papua New Guinea</option>
                  <option value="PY">Paraguay</option>
                  <option value="PE">Peru</option>
                  <option value="PH">Philippines</option>
                  <option value="PN">Pitcairn</option>
                  <option value="PL">Poland</option>
                  <option value="PT">Portugal</option>
                  <option value="PR">Puerto Rico</option>
                  <option value="QA">Qatar</option>
                  <option value="RE">Reunion</option>
                  <option value="RO">Romania</option>
                  <option value="RU">Russian Federation</option>
                  <option value="RW">Rwanda</option>
                  <option value="KN">Saint Kitts And Nevis</option>
                  <option value="SM">San Marino</option>
                  <option value="ST">Sao Tome and Principe</option>
                  <option value="SA">Saudi Arabia</option>
                  <option value="SN">Senegal</option>
                  <option value="XS">Serbia-Montenegro</option>
                  <option value="SC">Seychelles</option>
                  <option value="SL">Sierra Leone</option>
                  <option value="SG">Singapore</option>
                  <option value="SK">Slovak Republic</option>
                  <option value="SI">Slovenia</option>
                  <option value="SB">Solomon Islands</option>
                  <option value="SO">Somalia</option>
                  <option value="ZA">South Africa</option>
                  <option value="GS">South Georgia And The South Sand</option>
                  <option value="KR">South Korea</option>
                  <option value="ES">Spain</option>
                  <option value="LK">Sri Lanka</option>
                  <option value="NV">St. Christopher and Nevis</option>
                  <option value="SH">St. Helena</option>
                  <option value="LC">St. Lucia</option>
                  <option value="PM">St. Pierre and Miquelon</option>
                  <option value="VC">St. Vincent and the Grenadines</option>
                  <option value="SD">Sudan</option>
                  <option value="SR">Suriname</option>
                  <option value="SJ">Svalbard And Jan Mayen Islands</option>
                  <option value="SZ">Swaziland</option>
                  <option value="SE">Sweden</option>
                  <option value="CH">Switzerland</option>
                  <option value="SY">Syrian Arab Republic</option>
                  <option value="TW">Taiwan</option>
                  <option value="TJ">Tajikistan</option>
                  <option value="TZ">Tanzania</option>
                  <option value="TH">Thailand</option>
                  <option value="TG">Togo</option>
                  <option value="TK">Tokelau</option>
                  <option value="TO">Tonga</option>
                  <option value="TT">Trinidad and Tobago</option>
                  <option value="XU">Tristan da Cunha</option>
                  <option value="TN">Tunisia</option>
                  <option value="TR">Turkey</option>
                  <option value="TM">Turkmenistan</option>
                  <option value="TC">Turks and Caicos Islands</option>
                  <option value="TV">Tuvalu</option>
                  <option value="UG">Uganda</option>
                  <option value="UA">Ukraine</option>
                  <option value="AE">United Arab Emirates</option>
                  <option value="UK">United Kingdom</option>
                  <option value="GB">Great Britain</option>
                  <option value="US">United States</option>
                  <option value="UM">United States Minor Outlying Isl</option>
                  <option value="UY">Uruguay</option>
                  <option value="UZ">Uzbekistan</option>
                  <option value="VU">Vanuatu</option>
                  <option value="XV">Vatican City</option>
                  <option value="VE">Venezuela</option>
                  <option value="VN">Vietnam</option>
                  <option value="VI">Virgin Islands (U.S.)</option>
                  <option value="WF">Wallis and Furuna Islands</option>
                  <option value="EH">Western Sahara</option>
                  <option value="WS">Western Samoa</option>
                  <option value="YE">Yemen</option>
                  <option value="YU">Yugoslavia</option>
                  <option value="ZR">Zaire</option>
                  <option value="ZM">Zambia</option>
                  <option value="ZW">Zimbabwe</option>
                  <option value="undefined">undefined</option>
                </select>
              </div>
            </div>
            <div class="pas1">
              <div class="fonter">&nbsp;Zip/Postal Code:</div>
              <div class="field-widget">
                <input type="text" value="34567" title="Please enter zip/postal code" maxlength="5" class="required inputbox validate-number" id="field8" size="40" name="field8">
              </div>
            </div>
          </div>
          <div id="pass">
            <div class="pas1">
              <div class="fonter">&nbsp;City:</div>
              <div class="field-widget">
                <input type="text" value="test" title="Please enter city" size="40" class="required inputbox" id="field6" name="field6">
              </div>
            </div>
            <div class="pas1">
              <div class="fonter">&nbsp;State/Province</div>
              <div class="field-widget">
                <select name="stateSelect" class="inputbox" id="stateSelect">
                  <option value="">Select State</option>
                  <option value="AK">Alaska</option>
                  <option value="AL">Alabama</option>
                  <option value="AR">Arkansas</option>
                  <option value="AS">American Samoa</option>
                  <option value="AZ">Arizona</option>
                  <option value="CA">California</option>
                  <option value="CO">Colorado</option>
                  <option value="CT">Connecticut</option>
                  <option value="DC">D.C.</option>
                  <option value="DE">Delaware</option>
                  <option value="FL">Florida</option>
                  <option value="FM">Micronesia</option>
                  <option value="GA">Georgia</option>
                  <option value="GU">Guam</option>
                  <option value="HI">Hawaii</option>
                  <option value="IA">Iowa</option>
                  <option value="ID">Idaho</option>
                  <option value="IL">Illinois</option>
                  <option value="IN">Indiana</option>
                  <option value="KS">Kansas</option>
                  <option value="KY">Kentucky</option>
                  <option value="LA">Louisiana</option>
                  <option value="MA">Massachusetts</option>
                  <option value="MD">Maryland</option>
                  <option value="ME">Maine</option>
                  <option value="MH">Marshall Islands</option>
                  <option value="MI">Michigan</option>
                  <option value="MN">Minnesota</option>
                  <option value="MO">Missouri</option>
                  <option value="MP">Marianas</option>
                  <option value="MS">Mississippi</option>
                  <option value="MT">Montana</option>
                  <option value="NC">North Carolina</option>
                  <option value="ND">North Dakota</option>
                  <option value="NE">Nebraska</option>
                  <option value="NH">New Hampshire</option>
                  <option value="NJ">New Jersey</option>
                  <option value="NM">New Mexico</option>
                  <option value="NV">Nevada</option>
                  <option value="NY">New York</option>
                  <option value="OH">Ohio</option>
                  <option value="OK">Oklahoma</option>
                  <option value="OR">Oregon</option>
                  <option value="PA">Pennsylvania</option>
                  <option value="PR">Puerto Rico</option>
                  <option value="PW">Palau</option>
                  <option value="RI">Rhode Island</option>
                  <option value="SC">South Carolina</option>
                  <option value="SD">South Dakota</option>
                  <option value="TN">Tennessee</option>
                  <option value="TX">Texas</option>
                  <option value="UT">Utah</option>
                  <option value="VA">Virginia</option>
                  <option value="VI">Virgin Islands</option>
                  <option value="VT">Vermont</option>
                  <option value="WA">Washington</option>
                  <option value="WI">Wisconsin</option>
                  <option value="WV">West Virginia</option>
                  <option value="WY">Wyoming</option>
                  <option value="AA">Military Americas</option>
                  <option value="AE">Military Europe/ME/Canada</option>
                  <option value="AP">Military Pacific</option>
                </select>
              </div>
            </div>
          </div>
          <div class="account-submit">
            <input  name="submit" value="Update and Save" type="submit" class="submit">
          </div>
        </form>
      </div>
        <!--tab2 content-->
      <div class="TabbedPanelsContent">
        fsdffsdfsfdfs
      </div>
      <!--tab3 content-->
      <div class="TabbedPanelsContent">
        <table align="left" class="account-table" width="100%">
          <tbody>
            <tr>
              <th>Label ID</th>
              <th>Bought From</th>
              <th>Date Activated</th>
              <th>Active</th>
            </tr>
            <tr>
              <td >25846</td>
              <td >RecoverLink </td>
              <td >2011-02-08</td>
              <td >Yes</td>
            </tr>
          </tbody>
        </table>
      </div>
      <!--tab4 content-->
      <div class="TabbedPanelsContent">
        <table class="account-table" width="100%">
          <tbody>
            <tr>
              <th >Date</th>
              <th >Transaction Number</th>
              <th >Card Description</th>
              <th >Items</th>
              <th >Description</th>
            </tr>
            <tr>
              <td > February 08, 2011 12:03:09 </td>
              <td >1297166527210 </td>
              <td >Visa ############1111</td>
              <td >1 Label Set</td>
              <td >Activation of labelset with label ID 25846</td>
            </tr>
            <tr>
              <td > February 08, 2011 13:23:00 </td>
              <td >1297171345288 </td>
              <td >Visa ############1111</td>
              <td >2 Label Set</td>
              <td >Ordered additional 2 labelsets</td>
            </tr>
          </tbody>
        </table>
      </div>
      <!--tab5 content-->
      <div class="TabbedPanelsContent">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="<?php bloginfo('template_directory'); ?>/images/label_group.gif"></td>
    <td><form method="post" action="#">
          <table  >
            <tbody>
              <tr>
                <td align="center" colspan="2"> A label set consists of eight labels<br/>
                  "Order now<br/>
                  - $20.00"<br/></td>
              </tr>
              <tr>
                <td align="center" colspan="2">includes shipping and handling</td>
              </tr>
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr>
                <td align="right" style="padding-right: 10px; border-right: 1pt dotted rgb(102, 102, 102);"><label>Number of Sets
                    <input type="text" size="4" value="" id="quantity" name="quantity">
                  </label></td>
                <td align="left"><input type="image" src="<?php bloginfo('template_directory'); ?>/images/order_labels.gif"></td>
              </tr>
            </tbody>
          </table>
        </form></td>
  </tr>
</table>

       
        
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script> 
