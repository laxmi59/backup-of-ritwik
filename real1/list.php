<? session_start();
$uid=$_SESSION['uid'];
if($_POST['btn']);
{
	if($uid=='')
	{
		echo "<script>location.replace('login.php')</script>";
	}
	else
	{
		echo "<script>location.replace('fast.php')</script>";
	}
}
?>
<style>
a:hover{text-decoration:underline;}
</style>
<table width="80%" align="center" style="border:1px solid;">
<tr>
	<td colspan="3"><? include "header.php"?></td>
</tr>
<tr>
	<td colspan="3">
	<table width="80%" align="center" style="border:1px solid;">
	<tr>
		<td width="60%" valign="top">
		<table width="95%">
		<tr>
			<td colspan="3">Fast Response Listing</td>
		</tr>
		<tr>
			<td width="13">&nbsp;</td>
			<td width="342" colspan="2"> Prominently displays your property listing on search result page.</td>
		  </tr>
		<tr>
		<td>&nbsp;</td>
		  <td colspan="2">Upload your property image and logo.</td>
		  </tr>
		<tr>
		 <td>&nbsp;</td>
		  <td colspan="2"> Fast Response listings can potentially get more and faster responses.</td>
		  </tr>
		<tr>
		 <td>&nbsp;</td>
		  <td colspan="2"> Displays property on site for mimimum 60 days.</td>
		  </tr>
		  <tr>
		  	<td colspan="3" align="center">
				<input type="submit" name="btn" value="continue" />
			</td>
		 </tr>
		</table>
	</td>
	<td width="39%" valign="top">
	  <table width="99%" height="187">
          <tr>
            <td colspan="3">&nbsp;Basic Listing</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="2"> Displays your property  on search result page</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="2"> Gives the description of your property.</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="2"> Displays your property for minimum 30 days.</td>
          </tr>
          <tr>
            <td colspan="3" align="center"><input type="button" name="btn" value="continue" onclick="javascript:window.location=''" /></td>
            </tr>
        </table></td>
</tr></table></td></tr>
<tr><td>&nbsp;</td></tr>
</table>