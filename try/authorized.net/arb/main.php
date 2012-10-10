<form method="post" action="index_new.php">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>firstName</td>
    <td><input type="text" name="firstName" value="jhon"></td>
  </tr>
  <tr>
    <td>lastName</td>
    <td><input type="text" name="lastName" value="dio"></td>
  </tr>
  <tr>
    <td>email</td>
    <td><input type="text" name="email" value="rama@ritwik.com"></td>
  </tr>
  <tr>
    <td>card number</td>
    <td><input type="text" name="carnum" value="4007000000027"></td>
  </tr>
  <tr>
    <td>exp date</td>
    <td><input type="text" name="expd" value="2019-01"></td>
  </tr>
  <tr>
    <td>address</td>
    <td><input type="text" name="address" value="addr"></td>
  </tr>
  <tr>
    <td>city</td>
    <td><input type="text" name="city" value="hyd"></td>
  </tr>
  <tr>
    <td>state</td>
    <td><input type="text" name="state" value="ap"></td>
  </tr>
  <tr>
    <td>zip</td>
    <td><input type="text" name="zip" value="123456"></td>
  </tr>
  <tr>
    <td>interval_length</td>
    <td><input type="text" name="interval_length" value="1"></td>
  </tr>
  <tr>
    <td>timespan</td>
    <td><input type="text" name="timespan" value="3"></td>
  </tr>
  <tr>
    <td>stdate</td>
    <td><input type="text" name="stdate" value="<?=date("Y-m-d", strtotime("+ 1 months"))?>"></td>
  </tr>
  <tr>
    <td>totocc</td>
    <td><input name="totocc" type="text" value="3"></td>
  </tr>
  <tr>
    <td>amount</td>
    <td><input name="amount" type="text" value="30.29"></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" name="submit"></td>
    
  </tr>
</table>

</form>