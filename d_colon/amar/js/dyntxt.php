<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<script type="text/javascript">
/*function addRow1()
{//user name
	var x=document.getElementById('mytab1').insertRow(0);
	var y=x.insertCell(0);
	var z=x.insertCell(1);
	y.innerHTML= "<td><input type='text' name='t1' /></td>";
}*/
function addRow1()
{//user name
	var x=document.getElementById('mytab1').insertRow(0);
	var y=x.insertCell(0);
	var z=x.insertCell(1);
	y.innerHTML= "<td><input type='text' name='t1' /></td><td><input type='text' name='t1' /></td>";
}
/*function addRow11()
{
	var i=document.getElementById('mytab1');
	i.style.visibility="hidden"
	var x=document.getElementById('mytab1').deleteRow(0);
	var y=x.deleteCell(0);
	var z=x.deleteCell(1);
}*/
function addRow2()
{//password
	var x=document.getElementById('mytab2').insertRow(0);
	var y=x.insertCell(0);
	var z=x.insertCell(1);
	y.innerHTML= "<td><input type='password' name='t1' /></td>";
}
function addRow3()
{//gender
	var x=document.getElementById('mytab3').insertRow(0);
	var y=x.insertCell(0);
	var z=x.insertCell(1);
	y.innerHTML= "<td><div ><input type='radio' name='r1' value='male' /><input type='radio' name='r1' value='Female'></div></td>";
}
function addRow4()
{//address
	var x=document.getElementById('mytab4').insertRow(0);
	var y=x.insertCell(0);
	var z=x.insertCell(1);
	y.innerHTML= "<td><textarea rows='5'></textarea></td>";
}
function addRow5()
{//qualification
	var x=document.getElementById('mytab5').insertRow(0);
	var y=x.insertCell(0);
	var z=x.insertCell(1);
	y.innerHTML= "<td><div><input type='checkbox' value='MCA' /><input type='checkbox' value='MBA'></div></td>";
}
function addRow6()
{
	var x=document.getElementById('mytab6').insertRow(0);
	var y=x.insertCell(0);
	var z=x.insertCell(1);
	y.innerHTML= "<td><input type='submit' name='t1' /></td>";
}
function addRow7()
{
	var x=document.getElementById('mytab7').insertRow(0);
	var y=x.insertCell(0);
	var z=x.insertCell(1);
	y.innerHTML= "<td><input type='reset' name='t1' /></td>";
}
</script>
<body>


User Name:<input type="button" value="click" onclick="addRow1();this.disabled='true';" ><table id="mytab1" border="1"></table>

<!--User Name:<input type="button" value="click" onclick="addRow1()" ><table id="mytab1" border="1"></table>
<input type="button" value="click" onclick="addRow11()" >-->
Password:<input type="button" value="click"  id="pass"onclick="addRow2();this.disabled='true';" ><table id="mytab2" border="1"></table>

gender: <input type="button" value="click" onclick="addRow3();this.disabled='true';" ><table id="mytab3" border="1"></table>

Adress:<input type="button" value="Address" onClick="addRow4();this.disabled='true';"><table id="mytab4" border="1"></table>

Qualification:<input type="button" value="Click" onClick="addRow5();this.disabled='true';"><table id="mytab5" border="1"></table>

submit:<input type="submit" value="click" onclick="addRow6();this.disabled='true';" ><table id="mytab6" border="1"></table>

reset:<input type="button" value="reset Click" onClick="addRow7();this.disabled='true';"><table id="mytab7" border="1"></table>

</body>
</html>
