<?php
//session_start();
include "dbcon.php";

//extract ($_POST);
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$r1=$_POST['r1'];
$month=$_POST['month'];
$day=$_POST['day'];
$year=$_POST['year'];
$country=$_POST['live'];
$pc=$_POST['pc'];
$mail=$_POST['mail'];
$pw=$_POST['pass'];
$repw=$_POST['repass'];
$altemail=$_POST['altemail'];
$secqus=$_POST['question'];
$secans=$_POST['ans'];
//echo $fname,$lname,$r1, $day,$month,$year,$city,$poscode,$mail,$pw,$repw,$altemail,$secqus,$secans;
if($_POST['b1']=='Create my account')
{
	
	$select=mysql_query("select * from reg1 where mail= '".$mail."'");
	$row=mysql_fetch_array($select);
	if($row)
	{
		echo "mail id already exists";
	}
	else
	{
		$sql = mysql_query ("INSERT INTO reg1 values (`id`, '$fname', '$lname', '$r1', '$month', '$day', '$year', '$country', '$pc', '$mail', '$pw', 
	'$repw', '$altemail', '$secqus', '$secans')");
	//$_SESSION['abc']=$row['id'];
	echo "<script>";
	echo "location.replace('new.php')";
	//echo "location.replace('reg3.php')";
	echo "</script>";
	
	}
	
}

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="../html/sty.css" rel="stylesheet" type="text/css" /> 
</head>
<script type="text/javascript" src="reg_js.js"></script>
<link href="reg1css.css" rel="stylesheet" type="text/css" />
<body bgcolor="#e9eacf">
<h1 align="center"><label class="himag">REGISTRATION FORM</label></h1>
<table align="center" width="700" border="1px solid gray"  >
<tr> 
<td>   
 	<form name="reg" onsubmit="return validateForm(this);" method="post" >
	<h3 ><label class="color1"> 1.Tell us ur self</label></h3>
	<table cellspacing="10">
	<?php /* $select=mysql_query("select * from reg1");
$row=mysql_fetch_array($select);*/ ?>
	<tr> 
		<td></td><td></td>
		<td align="right"><label class="color"> First Name:</label></td>
		<td m> <input type="text" name="fname" id="fname"  /></td>
	</tr>
	<tr>
		<td></td> <td></td>
		<td align="right"><label class="color">Last Name:</td>
		<td> <input name="lname" type="text" id="lname"  /></td>
	</tr>
	<tr>
		<td></td><td></td>
		<td align="right"><label class="color">Gender:</label></td>
		<td > <input type="radio" name="r1" id="r1" value="male" /><label class="colors">Male</label></td>
		<td> <input type="radio" name="r1" id="r1" value="female" /><label class="colors">Female</label></td>
	</tr> 
	<tr>
		<td></td><td></td>
		<td align="right"><label class="color">Birthday</label></td>
		<td><select class="colors" name="month">
		<option value="0">-month-</option>
		<option value="Jan">jan</option>
		<option value="Feb">feb</option>
		<option value="Mar">mar</option>
		<option value="Apr">apr</option>
		<option value="May">may</option>
		<option value="Jun">jun</option>
		<option value="Jul">jul</option>
		<option value="Aug">aug</option>
		<option value="Sep">sep</option>
		<option value="Oct">oct</option>
		<option value="Nov">nov</option>
		<option value="Dec">dec</option>
		</select></td>
		<td> <select class="colors" name="day" >
		<option value="0">-select date</option>
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
		</select></td> 
		<td> <select class="colors" name="year">
		  <option value="0">-select year</option>
		  <option value="1980">1980</option>
		  <option value="1981">1981</option>
		  <option value="1982">1982</option>
		  <option value="1983">1983</option>
		  <option value="1984">1984</option>
		  <option value="1985">1985</option>
		  <option value="1986">1986</option>
		  <option value="1987">1987</option>
		  <option value="1988">1988</option>
		  <option value="1989">1989</option>
		  <option value="1990">1990</option>
		  <option value="1991">1991</option>
		  <option value="1992">1992</option>
		  <option value="1993">1993</option>
		  <option value="1994">1994</option>
		  <option value="1995">1995</option>
		  <option value="1996">1996</option>
		  <option value="1997">1997</option>
		</select>
		</td>
	</tr> 
	<tr> 
		<td></td><td></td>
		<td align="right"><label class="color">I live in</label></td>
		<td> <select class="colors" name="live" >
		<option value="">-select country-</option>
		<option value="india">India</option>
		<option value="usa">USA</option>
		<option value="uk">UK</option>
		</select> </td> 
	</tr> 
	<tr>
		<td></td><td></td>
		<td align="right"><label class="color">Postel Code</td>
		<td><input name="pc" type="text" id="pc" maxlength="6" /></td>
	</tr>
	</table><hr />

	<h3><label class="color1"> 2.Select an id password</label></h3>
	<table cellspacing="10">
	<tr>
		<td></td><td></td>
		<td align="right"><label class="color">Id and mail</label></td>
		<td><input name="mail" type="text" id="mail" /></td>
		
	</tr>
	<tr>
		<td></td><td></td>
		<td align="right"><label class="color">Password</label></td>
		<td> <input type="password" name="pass" id="pass" /></td>
	</tr>
	<tr>
	 	<td></td><td></td>	
		<td align="right"><label class="color">Re type password</label></td>
		<td> <input type="password" name="repass" id="repass"/></td>
	</tr>
	</table><hr />

	<h3><label class="color1"> 3.incase u forgot ur mail id or password</label></h3>
	<table cellspacing="10">
	<tr>
		<td></td><td></td>
		<td width="100" align="right"><label class="color">alternate mail</label></td>
		<td width="480"><input type="text" name="altemail" id="altemail" /></td>
	</tr>
	<tr>
		<td></td><td></td>
		<td align="right"><label class="color">security question</label></td>
		<td><select class="colors" name="question">
		<option value="select one">-choose one-</option>
		<option value="where did u meet ur spouce">where did u meet ur spouce</option>
		<option value="chn">who is ur childhood hero</option>
		</select>
		</td>
	</tr>
	<tr>
		<td></td><td></td>
		<td align="right"><label class="color">Your answer</label></td>
		<td><input name="ans" type="text" id="ans" maxlength="15" /></td>
	</tr>
	</table><hr />
	<h4><label class="color1"> Just a couple more details</label></h4><hr />
	
	<input class="bimag" type="submit" value="Create my account" id="b1" name="b1" />	<input class="bimag" type="button" value="Cancel" />
	
</form>
	
</td>
</tr> 
</table>

</body>
</html>
