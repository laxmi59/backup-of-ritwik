// JavaScript Document
function isNotEmpty(fname,txt)
{
		if(fname.value=="" || fname.value==null)
		{
		alert(txt);
		fname.focus();
		return false;
		}
		return true;
}

function isValidGender(radio)
{

		for(i=0;i<radio.length;i++)
		{
			if (radio[i].checked)
            	return true;
		}
		alert("choose one of the choice in Gender Information");
		return false;

}

function isChosen(select) {
    if (select.selectedIndex == 0) {
        alert("Please make a choice from the list.");
        return false;
    } 
        return true;
}
function pincode(reg)
{
 var reg1=/(\d\d\d\d\d\d)/;
 if(reg1.exec(reg.value) == null)
 {
  alert("not a valid pin number");
  reg.value="";
  reg.focus();
  return false;
 }
 else
 return true;
}
function pass(reg)
{
 var pass1=reg.value;
 if(pass1.length >= 6 && pass1.length <= 20)
 {
 	return true;
 }
 else
 {
    alert("pass word should be minimum six and maximum 20 letters");
	reg.value="";
	reg.focus();
	return false;
 }
 }
function samepass(reg,reg1)
 {
 	//var pass=reg.value;
	//var repass=reg1.value;
	if(reg.value==reg1.value)
	{
		return true;
	}
	else
	{
		alert("passwords are not same enter same passwords in both fields");
		reg1.value="";
		reg1.focus();
		return false;
	}
 }
function userminmax(reg)
{
	var user=reg.value;
	if(user.length >=3 && user.length <=20)
	{
		return true;
	}
	else
	{
		alert(" name should be minimum of 3 leters and maximum of 20 leters");
		reg.value="";
		reg.focus();
		return false;
	}
}
function spaces(reg)
{
	var user=reg.value;
	if(user.match(" "))
	{
		alert("should not use spaces in user name");
		reg.value="";
		reg.focus();
		return false;
	}
	else
	{
	 	return true;
	}
}
function email(reg)
{
	var e=reg.value;
	var e1=/^(?:\w+\.?)*\w+@(?:\w+\.)+\w+$/;
	if(e.match(e1))
	{
		return true;
	}
	else
	{
		alert("enter email id in correct way");
		reg.value="";
		reg.focus();
		return false;
	}
}

function validateForm(reg) 
{
	
  if (isNotEmpty(reg.fname,"First Name should not be Empty"))
  {
  if(userminmax(reg.fname))
  {
  if(spaces(reg.fname))
  {
   if (isNotEmpty(reg.lname,"Last Name Sholud not be Empty"))
	{
	if(userminmax(reg.lname))
	{
	if(spaces(reg.lname))
	{
	if (isValidGender(reg.r1)) 
	 {
	  if(isChosen(reg.month))
	  {
	   if (isNotEmpty(reg.day,"please Enter day field ,it should not be Empty")) 
	   {
	 	if(isChosen(reg.month))
		{
	 	 if(isChosen(reg.day))
		 {
		  if(isChosen(reg.year))
		  {
		   if(isChosen(reg.live))
		   {
			if(isNotEmpty(reg.pc,"Postal Code should not be Empty"))
			{
			 if(pincode(reg.pc))
			 {
			  if(isNotEmpty(reg.mail,"Email Id should not be Empty")) 
			  {
			  if(email(reg.mail))
			  {
			   if (isNotEmpty(reg.pass,"password field should not be Empty")) 
			   {
			   if(pass(reg.pass))
			   {
				if (isNotEmpty(reg.repass,"password field should not be Empty")) 
				{
				if (samepass(reg.pass,reg.repass))
				{
				 if(isNotEmpty(reg.altemail,"Email Id should not be Empty"))
				 {	
				  if(email(reg.altemail))
			  	  {
				  if(isChosen(reg.question))
				  {
				   if (isNotEmpty(reg.ans,"Answer Field should not be Empty"))
				   {
                    	return true;
				   }
				  }
				}
				}
				}}
				}
			   }
			  }
			 }}
			}
		   }
		  }
		 }
		}
	   }
	}  }
	}}
	} }
	}
  }
    return false;
}

