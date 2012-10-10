<link href="css/style.css" rel="stylesheet" type="text/css">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="90%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><img src="images/psd1_12.jpg" width="402" height="36" alt="" /></td>
      </tr>
      <tr>
        <td bgcolor="#B5D6F9"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
          <tr>
            <td>
			<div id="searchForm">
    
	<form id="hotSearch" name="hotSearch" action="<?=BASE?>show1.php?link1=http://travel.ian.com/hotel/searchresults" method="post" onSubmit="return validate(this);">
	<input type="hidden" name="cid" value="312476">
	<input type="hidden" name="pageName" value="hotSearch">
	<input type="hidden" name="validateDates" value="true">
	<input type="hidden" name="validateCity" value="true">
	<input type="hidden" name="mode" value="2">
	<input type="hidden" name="submitted" value="true">
	<input type="hidden" name="netOnly" value="false">
	<input type="hidden" name="fc" value="list">
	<input type="hidden" name="locale" value="en_US">
	
	<input type="hidden" name="currencyCode" value="USD">
	
	<input type="hidden" name="specials" value="false">
	<input type="hidden" name="city" value="">
	<input type="hidden" name="stateProvince" value="">
	<input type="hidden" name="country" value="">
	<input type="hidden" name="showPopUp" value="true">
	<input type="hidden" name="passThrough" value="true">
	<div class="outsideBorder clearFix">
		<div class="insideBorder">
			<p class="masterHEADER">1. Select a Destination</p>
			<div class="cityList clearFix">
				<ul>
					<li class="cityBold"><input onClick="javascript:setCityInformation('New York', 'NY', 'US');" type="radio" value="New York NY US" name="radcity">New York					</li>
					<li><input onClick="javascript:setCityInformation('Atlanta', 'GA', 'US');" type="radio" value="Atlanta" name="radcity">Atlanta</li>
					<li><input onClick="javascript:setCityInformation('Boston', 'MA', 'US');" type="radio" value="Boston" name="radcity">Boston</li>
					<li><input onClick="javascript:setCityInformation('Chicago', 'IL', 'US');" type="radio" value="Chicago" name="radcity">Chicago</li>
					<li><input onClick="javascript:setCityInformation('Dallas', 'TX', 'US');" type="radio" value="Dallas" name="radcity">Dallas</li>
				</ul>
				<ul>
					<li class="cityBold"><input onClick="javascript:setCityInformation('Las Vegas', 'NV', 'US');" type="radio" value="Las Vegas NV US" name="radcity">Las Vegas</li>
					<li><input onClick="javascript:setCityInformation('London', '', 'GB');" type="radio" value="London" name="radcity">London</li>
					<li><input onClick="javascript:setCityInformation('Los Angeles', 'CA', 'US');" type="radio" value="Los Angeles" name="radcity">Los Angeles</li>
					<li><input onClick="javascript:setCityInformation('Miami', 'FL', 'US');" type="radio" value="Miami" name="radcity">Miami</li>
					<li><input onClick="javascript:setCityInformation('New Orleans', 'LA', 'US');" type="radio" value="New Orleans" name="radcity">New Orleans</li>
				</ul>
				<ul>
					<li class="cityBold"><input onClick="javascript:setCityInformation('Orlando', 'FL', 'US');" type="radio" value="Orlando" name="radcity">Orlando</li>
					<li><input onClick="javascript:setCityInformation('Paris', '', 'FR');" type="radio" value="Paris" name="radcity">Paris</li>
					<li><input onClick="javascript:setCityInformation('San Diego', 'CA', 'US');" type="radio" value="San Diego" name="radcity">San Diego</li>
					<li><input onClick="javascript:setCityInformation('San Francisco', 'CA', 'US');" type="radio" value="San Francisco" name="radcity">San Francisco</li>
					<li><input onClick="javascript:setCityInformation('Washington', 'DC', 'US');" type="radio" value="Washington" name="radcity">Washington, D.C.</li>
				</ul>
			</div>
			<div>
				<input type="radio" name="radcity" id="radCityText" onClick="document.forms['hotSearch'].cityText.focus();" checked>Enter City
				<input maxlength="40" size="20" value="" onClick="document.forms['hotSearch'].cityText.focus();" onFocus="clearTextBox(document.forms['hotSearch'].cityText);document.hotSearch.radCityText.checked=true;" name="cityText">
				<a href="http://travel.ian.com/index.jsp?cid=312476&pageName=hotSearch&advanced=true&locale=en_US&currencyCode=USD">Advanced Search</a>			</div>
		<div>&nbsp;</div>
			 <p class="masterHEADER">2. Select your Dates</p>
			 <fieldset class="date">
			 	<label>
			 		Check in<br />
					
                        <select onChange="amadChange(document.hotSearch.arrivalMonth, document.hotSearch.arrivalDay, document.hotSearch.departureMonth, document.hotSearch.departureDay)" name="arrivalMonth">
                            

<option value=0>January</option>
<option value=1>February</option>
<option value=2>March</option>
<option value=3>April</option>
<option value=4>May</option>
<option value=5>June</option>
<option value=6>July</option>
<option value=7>August</option>
<option value=8>September</option>
<option value=9>October</option>
<option value=10>November</option>
<option value=11>December</option>
                        </select>
                    
					<select onChange="amadChange(document.hotSearch.arrivalMonth, document.hotSearch.arrivalDay, document.hotSearch.departureMonth, document.hotSearch.departureDay)" name="arrivalDay">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
					</select>
					
					<a href="javascript:openCalendar('hotSearch', 'arrival');"><img src="http://travel.ian.com/BU40/_media/icons/calendar.gif" align="top"></a>			 	</label>
			 </fieldset>
			 <fieldset class="date">
			 	<label>
			 		Check out<br />
			 		
			        <select onChange="dmddChange(document.hotSearch.departureMonth,document.hotSearch.departureDay)" name="departureMonth">
	                    

<option value=0>January</option>
<option value=1>February</option>
<option value=2>March</option>
<option value=3>April</option>
<option value=4>May</option>
<option value=5>June</option>
<option value=6>July</option>
<option value=7>August</option>
<option value=8>September</option>
<option value=9>October</option>
<option value=10>November</option>
<option value=11>December</option>
                    </select>
                    
					<select onChange="dmddChange(document.hotSearch.departureMonth,document.hotSearch.departureDay)" name="departureDay">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
					</select>
					
                    </select>
					<a href="javascript:openCalendar('hotSearch', 'departure');"><img src="http://travel.ian.com/BU40/_media/icons/calendar.gif" align="top"></a>			 	</label>
			 </fieldset>
			<div class="insideContainer clearFix">
			<table>
				<tr>
					<td><div id="hot-search-params"></div></td>
                    </tr>
                    <tr>
					<td valign="bottom"><input type="submit" value="Search" class="button"></td>
				</tr>
			</table>
			</div>
		</div><!-- end insideBorder -->
	</div><!-- end outsideBorder -->
	</form>
</div>			</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><img src="images/psd1_22.jpg" width="402" height="16" alt="" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="90%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><img src="images/psd1_24.jpg" width="402" height="35" alt="" /></td>
      </tr>
      <tr>
        <td bgcolor="#B5D6F9">
		<div class="linebreak1"></div>
		<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
		 <tr><td colspan="2" class="linebreak1"></td></tr>
            <tr>
              <td>
			  <img src="images/arrow.gif" height="9" width="9"></td>
                        <td width="92%"><a href="show.php?link1=http://dg.ian.com/index.jsp?formId=9102464" class="b">GRAND ADVENTURES</a></td>
              </tr>
			  <tr><td colspan="2" class="linebreak1"></td></tr>
                      <tr>

                        <td align="right"><img src="images/arrow.gif" height="9" width="9"></td>
                        <td><a href="show.php?link1=http://dg.ian.com/index.jsp?formId=9102465" class="b">TERRY FATOR AND HIS CAST OF THOUSANDS</a></td>
                      </tr>
					   <tr><td colspan="2" class="linebreak1"></td></tr>
                      <tr>
                        <td align="right"><img src="images/arrow.gif" height="9" width="9"></td>
                        <td><a href="show.php?link1=http://dg.ian.com/index.jspformId=9102466" class="b">LITTLE CHAPEL OF THE FLOWERS</a></td>
                      </tr>
					   <tr><td colspan="2" class="linebreak1"></td></tr>
                      <tr>

                        <td align="right"><img src="images/arrow.gif" height="9" width="9"></td>
                        <td><a href="show.php?link1=http://dg.ian.com/index.jsp?formId=9102467" class="b">HIKE THIS!</a></td>
                      </tr>
					   <tr><td colspan="2" class="linebreak1"></td></tr>
                      <tr>
                        <td align="right"><img src="images/arrow.gif" height="9" width="9"></td>
                        <td><a href="show.php?link1=http://dg.ian.com/index.jsp?formId=9102468" class="b">JERSEY BOYS</a></td>
                      </tr>
					   <tr><td colspan="2" class="linebreak1"></td></tr>
                      <tr>
                        <td align="right"><img src="images/arrow.gif" height="9" width="9"></td>
                        <td><a href="show.php?link1=http://dg.ian.com/index.jsp?formId=9102469" class="b">BELLAGIO FOUNTAINS</a></td>
                      </tr>
					   <tr><td colspan="2" class="linebreak1"></td></tr>
                      <tr>
                        <td align="right"><img src="images/arrow.gif" height="9" width="9"></td>
                        <td><a href="show.php?link1=http://dg.ian.com/index.jsp?formId=9102470" class="b">CARROT TOP</a></td>
                      </tr>
					   <tr><td colspan="2" class="linebreak1"></td></tr>
                      <tr>
                        <td align="right"><img src="images/arrow.gif" height="9" width="9"></td>
                        <td><a href="show.php?link1=http://dg.ian.com/index.jsp?formId=9102471" class="b">GRACELAND WEDDING CHAPEL</a></td>
                      </tr>
					   <tr><td colspan="2" class="linebreak1"></td></tr>
                      <tr>
                        <td align="right"><img src="images/arrow.gif" height="9" width="9"></td>
                        <td><a href="show.php?link1=http://dg.ian.com/index.jsp?formId=9102472" class="b">RED ROCK CANYON NATIONAL CONSERVATION AREA</a></td>
                      </tr>
					   <tr><td colspan="2" class="linebreak1"></td></tr>
                      <tr>
                        <td align="right"><img src="images/arrow.gif" height="9" width="9"></td>
                        <td><a href="show.php?link1=http://dg.ian.com/index.jsp?formId=9102473" class="b">LARRY G. JONES - MAN OF 1002 VOICES</a></td>
            </tr>
			 <tr><td colspan="2" class="linebreak1"></td></tr>
        </table></td>
      </tr>
      <tr>
        <td><img src="images/psd1_22.jpg" width="402" height="16" alt="" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="90%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><img src="images/psd1_39.jpg" width="402" height="36" alt=""></td>
      </tr>
      <tr>
        <td bgcolor="#B5D6F9"><div class="linebreak1"></div>
            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
              <tr>
                <td colspan="2" class="linebreak1"></td>
              </tr>
              <tr>
                      <td align="right" width="7%"><img src="images/arrow.gif" height="9" width="9"></td>
                      <td width="93%"><a href="show.php?link1=http://dg.ian.com/index.jsp?formId=9102453" class="b">OFF THE STRIP - JUST REAL FOOD</a></td>
                    </tr>
					 <tr>             <td colspan="2" class="linebreak1"></td>           </tr>
                    <tr>

                      <td align="right"><img src="images/arrow.gif" height="9" width="9"></td>
                      <td><a class="b" href="show.php?link1=http://dg.ian.com/index.jsp?formId=9102454">ROSEMARY'S RESTAURANT</a></td>
                    </tr>
					 <tr>             <td colspan="2" class="linebreak1"></td>           </tr>
                    <tr>
                      <td align="right"><img src="images/arrow.gif" height="9" width="9"></td>
                      <td><a class="b" href="show.php?link1=http://dg.ian.com/index.jsp?formId=9102455">JEAN-PHILIPPE PATISSERIE</a></td>
                    </tr>
					 <tr>             <td colspan="2" class="linebreak1"></td>           </tr>
                    <tr>

                      <td align="right"><img src="images/arrow.gif" height="9" width="9"></td>
                      <td><a class="b" href="show.php?link1=http://dg.ian.com/index.jsp?formId=9102456">DEL FRISCO'S</a></td>
                    </tr>
					 <tr>             <td colspan="2" class="linebreak1"></td>           </tr>
                    <tr>
                      <td align="right"><img src="images/arrow.gif" height="9" width="9"></td>
                      <td><a class="b" href="show.php?link1=http://dg.ian.com/index.jsp?formId=9102457">CASA DI AMORE</a></td>
                    </tr>
					 <tr>             <td colspan="2" class="linebreak1"></td>           </tr>
                    <tr>

                      <td align="right"><img src="images/arrow.gif" height="9" width="9"></td>
                      <td><a class="b" href="show.php?link1=http://dg.ian.com/index.jsp?formId=9102458">VIC &amp; ANTHONY'S STEAKHOUSE - LAS VEGAS</a></td>
                    </tr>
					 <tr>             <td colspan="2" class="linebreak1"></td>           </tr>
                    <tr>
                      <td align="right"><img src="images/arrow.gif" height="9" width="9"></td>
                      <td><a class="b" href="show.php?link1=http://dg.ian.com/index.jsp?formId=9102459">GRAND LUX CAFE</a></td>
                    </tr>
 <tr>             <td colspan="2" class="linebreak1"></td>           </tr>
                    <tr>
                      <td align="right"><img src="images/arrow.gif" height="9" width="9"></td>
                      <td><a class="b" href="show.php?link1=http://dg.ian.com/index.jsp?formId=9102460">JAMM'S RESTAURANT</a></td>
                    </tr>
					 <tr>             <td colspan="2" class="linebreak1"></td>           </tr>
					<tr>
                      <td align="right"><img src="images/arrow.gif" height="9" width="9"></td>
                      <td><a class="b" href="show.php?link1=http://dg.ian.com/index.jsp?;formId=9102461">MON AMI GABI AT PARIS LAS VEGAS</a></td>
                    </tr>
 <tr>             <td colspan="2" class="linebreak1"></td>           </tr>
                    <tr>
                      <td align="right"><img src="images/arrow.gif" height="9" width="9"></td>
                      <td><a class="b" href="show.php?link1=http://dg.ian.com/index.jsp?formId=9102462">MAGGIANO'S</a></td>
                    </tr>

              <tr>             <td colspan="2" class="linebreak1"></td>           </tr>
          </table></td>
      </tr>
      <tr>
        <td><img src="images/psd1_22.jpg" width="402" height="16" alt="" /></td>
      </tr>
    </table></td>
  </tr>
</table>