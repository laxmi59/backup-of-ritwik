<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<script>
function isnotempty(name,txt)
{
	if(name.value=="")
	{
		alert(txt);
		name.focus();
		return false;
	}
	return true;
}
function f1(x,y)
{
	if(y.length==x.maxlength)
	{
		var a=x.tabIndex;
		if(a<document.getElementById("reg").length)
		{
			document.getElementById("reg").element[a].focus();
		}
	}
}
function day(reg)
{
	var date=/\d\d/;
	if(date.exec(reg.value)==null)
	{
		alert("invalid date");
		reg.value="";
		reg.focus();
		return false;
	}
	return true;
}
function mon(reg)
{
	var mon=/\d\d/;
	if(mon.exec(reg.value)==null)
	{
		alert("invalid month");
		reg.focus();
		return false;
	}
	return true;
}
function year(reg)
{
	
	var y=/\d\d\d\d/;
	if(y.exec(reg.value)==null)
	{
		alert("invalid year");
		reg.value="";
		reg.focus();
		return false;
	}
	return true;
}

function birth(day,month,year)
{

	if(year.value<1900 || year.value>2000)
	{
		alert("year must be in between 1900 and 2000");
		year.value="";
		year.focus();
		return false;
	}
	if(month.value>12 || month.value<1)
	{
		alert("month must be in between 1 and 12");
		month.value="";
		month.focus();
		return false;
	}
	if(year.value%4==0)
	{
		if(month.value==2)
		{
			if(day.value>29 || day.value<1)
			{
				alert("dates should be inbetween 01 and 29");
				date.focus();
				return false;
			}
		}
		else if(month.value==4 || month.value==6 || month.value==9 ||month.value==11)
		{
		 	if(day.value>30 || day.value<1)
			{
				alert("dates should be 01 to 30");
				day.focus();
				return false;
			}
		}
		else
		{
			if(day.value>31 || day.value<1)
			{
				alert ("dates should be 01 to 31");
				day.focus();
				return false;
			}
		}
	}
	
	else
	{
		if(month.value==2)
		{
			if(day.value>28 || day.value<1)
			{
				alert("dates should be inbetween 01 and 28");
				day.focus();
				return false;
			}
		}
		else if(month.value==4 || month.value==6 || month.value==9 ||month.value==11)
		{
		 	if(day.value>30 || day.value<1)
			{
				alert("dates should be 01 to 30");
				day.focus();
				return false;
			}
		}
		else
		{
			if(day.value>31 || day.value<1)
			{
				alert ("dates should be 01 to 31");
				day.focus();
				return false;
			}
		}
	}
	return true;
}
function validateSelectControl() {
    oSelect = document.getElementById('prefloc');

    var iNumSelected = 0;

    for (var iCount=0; oSelect.options[iCount]; iCount++) 
	{
        if (oSelect.options[iCount].selected == true) 
		{
            iNumSelected ++;
        }
    }

    if (iNumSelected < 1) 
	{
		alert('select atleat one in preferred location');
		oSelect.focus();
		return false;
	}
	return true;
}
/*function preferlocation(pref)
{
	alert("aaa");
	var pre=document.getElementById('pref')
	var items=0;
	alert("ss");
	for(var count=0; pre.options[count]; count++)
	{
	
		if(pre.options[count].selected==true)
		{
			items++;
		}
	}
	if(items.selected<1)
	{
		alert("select atleast one item");
		j.focus();
		return false;
	}
	return true;
}*/
function ischoosen(select,txt)
{
	if(select.selectedindex==0)
	{
		alert("txt");
		selct="";
		select.focus();
		return false;
	}
	return true;
}
/*function isValidCheck1(ch,txt)
{
	var c=0;
	for(i=0;i<ch.length;i++)
	{
        if (ch[i].checked)
		{
			c++;
		}
	}
	if(c>=2)
	{
		document.getElementById('f2');
		return true;
	}
	else
	{ 
		
		alert(txt);
		document.getElementById('f2');
		return false;
	}
}*/
function isValidcheck123(ch,txt)
{
	for(i=0;i<ch.length;i++)
	{
        if (ch[i].checked)
		{
		document.getElementById('f2');
        return true;
		}
	}
	alert(txt);
	document.getElementById('f2');
	return false;

}


function validateform(reg)
{
	/*if(isnotempty(reg.fname, "first name should not be empty"))
	{
		return true;
	}
	if(isnotempty(reg.lname, "last name should not be empty"))
	{
	 	return true;
	}*/
	if(isnotempty(reg.fname,"first name should not empty"))
	{
		if(isnotempty(reg.lname,"last name should not empty"))
		{
			if(isnotempty(reg.day,"date should not empty"))
			{
			if(day(reg.day))
			{
				if(isnotempty(reg.mon,"month should not empty"))
				{
				if(mon(reg.mon))
				{
					if(isnotempty(reg.year,"year should not be empty"))
					{
					if(year(reg.year))
					{
						if(birth(reg.day,reg.mon,reg.year))
						{
							if(isnotempty(reg.ta,"address should not be empty"))
							{
								if(isnotempty(reg.prefloc,"prefer location should not empty"))
								{
								//if(validateSelectControl()) 
								//{	
								//alert("");
									if(isValidcheck123(reg.ch1,"choose one of the choice in Skill set")) 
									{
									if(isValidCheck1(reg.ch1,"choose atleast 2 of skill set"))
									{
										return true;
									}
									}
									
								//}
								}
							}
						}
					}
					}
				}
				}
			}
			}
		}	
	}
	return false;
	
}
</script>

<body>
<h1 align="center" >Wel Come </h1> <hr />
<table border="1" align="center" width="700" bgcolor="#33FFFF">
<tr>
<td>
	<form name="reg" onsubmit="return validateform(this);">
	<h3>Some more details about u</h3><hr />
	<table height="363">
	<tr>
		<td></td>
		<td>name</td>
		<td><input type="text" name="fname" id="fname" /></td>
		<td><input type="text" name="lname" id="lname" /></td>
	</tr>
	<tr>
		<td width="185"></td>
		<td width="112"> Date of birth</td>
		<td width="128"><input type="text" maxlength="2" size="3"  name="day" tabindex="1" onkeyup="f1(this,this.value)" /><b>dd</b></td>
		<td width="92"> <input type="text" maxlength="2" size="3" name="mon" tabindex="2" onkeyup="f1(this,this.value)" /><b>mm</b></td>
		<td> <input type="text" maxlength="4" size="5" name="year" tabindex="3" onkeyup="f1(this,this.value)" /><b>yyyy</b></td>
	</tr>
	<tr>
		<td></td>
		<td>Address:</td>
		<td><textarea name="ta" cols="17" rows="5" id="ta" ></textarea></td>
	</tr>
	<tr>
		<td></td>
		<td>Prefer job location</td>
		
		<td><select name="prefloc">
		<option value="">-Select one-</option>
		<option value="1">Any where Ap</option>
		<option value="1"> Kakinada</option>
		<option value="1">Hyderabad</option>
		<option value="1">vizag</option>
    	</select></td>
	</tr>
	<tr>
		<td colspan="10"><h4>just couple more details</h4></td>
	</tr>
	<tr>
		<td> select ur skills</td>
		<td><div id="f2"> <input type="checkbox" name="ch1" id="ch1" value="php" />PHP <input type="checkbox" name="ch1" id="ch1" value=".net" />.NET<input type="checkbox" name="ch1" id="ch1" value="java" />JAVA
		<input type="checkbox" name="ch1" id="ch1" value="ror" />ROR</div></td>
	</tr>
	<tr>
		<td colspan="20"><hr /></td>
		</tr
	><tr>
		<td></td><td></td><td></td>
		<td><input type="submit" name="b1" id="b1" value="submit"  /> </td>
		<td><input type="submit" name="b2" id="b2" value="cancel"  /></td>
	</tr>
	</table>
</form>
</td>
</tr>
</table>
</body>
</html>
