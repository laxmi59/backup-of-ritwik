function isNotEmpty(fname,txt)
{
	//fname.value=(fname.value).replace(/^\s*|\s*$/g,'');
		if(fname.value=="")
		{
		alert(txt);
		fname.focus();
		return true;
		}
		return false;
}
function spaces(reg,txt)
{
	var user=reg.value;
	if(user.match(" "))
	{
		alert(txt);
		reg.value="";
		reg.focus();
		return true;
	}
	else
	{
	 	return false;
	}
}
function spaces1(reg,reg1,txt)
{
	var user=reg.value;
	if(user.match(" "))
	{
		alert(txt);
		reg.value="";
		reg1.value="";
		reg.focus();
		return true;
	}
	else
	{
	 	return false;
	}
}
function isChosen(select,txt) 
{
    if (select.selectedIndex == 0||select.selectedIndex == '') 
	{
        alert(txt);
		select.focus();
        return true;
    } 
        return false;
}
function pass(reg)
{
 var pass1=reg.value;
 if(pass1.length >= 6 && pass1.length <= 20)
 {
 	return false;
 }
 else
 {
    alert("pass word should be minimum six and maximum 20 letters");
	reg.value="";
	reg.focus();
	return true;
 }
 }
function samepass(reg,reg1,txt)
 {
 	//var pass=reg.value;
	//var repass=reg1.value;
	if(reg.value==reg1.value)
	{
		return false;
	}
	else
	{
		//alert("aa");
		alert(txt);
		reg1.value="";
		reg1.focus();
		return true;
	}
 }


function userminmax(reg,txt)
{
	var user=reg.value;
	if(reg.value >0 && reg.value <32)
	{
		return false;
	}
	else
	{
		alert(txt);
		reg.value="";
		reg.focus();
		return true;
	}
}
function userminmaxph(reg,txt)
{
	var user=reg.value;
	if(reg.value==10)
	{
		return false;
	}
	else
	{
		alert(txt);
		reg.value="";
		reg.focus();
		return true;
	}
}
function isnumaric(reg,txt)
{
	var reg1=/^[0-9]+$/;
	if(reg.value.match(reg1))
	{
		return false;
	}
	else
	{
		alert(txt);
		reg.value="";
		reg.focus();
		return true;
	}
}


function ischar(reg,txt)
{
	var reg1=/^[a-zA-Z]+$/;
	if(reg.value.match(reg1))
	{
		return false;
	}
	else
	{
		alert(txt);
		reg.value="";
		reg.focus();
		return true;
	}
}
function email(reg)
{
	var e=reg.value;
	var e1=/^(?:\w+\.?)*\w+@(?:\w+\.)+\w+$/;
	if(e.match(e1))
	{
		return false;
	}
	else
	{
		alert("Enter valid Email");
		reg.value="";
		reg.focus();
		return true;
	}
}
function check(reg,txt)
{
	//alert ("cc");
	if(reg.value !=''){
		var reg1=/^[0-9]+$/;
		if(reg.value.match(reg1)){
			return false;
		}else{
			alert(txt);
			reg.value="";
			reg.focus();
			return true;
		}
	}
		
}
function checkresume(reg,reg1,txt)
{
	//alert("aa");
	if(reg.value=='' && reg1.value=='')
	{
		alert(txt);
		reg.focus();
		return true;
	}
	return false;
}
function isValidGender(radio,txt)
{

		for(i=0;i<radio.length;i++)
		{
			if (radio[i].checked)
            	return false;
		}
		alert(txt);
		radio[0].focus();
		return true;

}

function web(reg,txt)
{
	var e=reg.value;
	var e1=/^(http|https|www.):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(([0-9]{1,5})?\/.*)?$/
	var e2=/^(http:\/\/www.|https:\/\/www.|ftp:\/\/www.|www.|http:\/\/){1}[0-9A-Za-z\.\-]*\.[0-9A-Za-z\.\-]*$/
	if(e.match(e1)||e.match(e2))
	{
		return false;
	}
	else
	{
		alert(txt);
		reg.value="";
		reg.focus();
		return true;
	}
}
function validatecheck(chk,txt){
  if (chk.checked == 1)
   return false;
  else
    alert(txt)
    chk.focus();
	return true;
}
//////////////////////////////				Slot Booking		//////////////////////////////////////////
function user_booking(reg)
{
	if(isNotEmpty(reg.user_fname,"First Name should not be Empty")){return false}
	
	if(isNotEmpty(reg.user_lname,"Last Name should not be Empty")){return false}
	
	if(isNotEmpty(reg.user_mail,"Email Id should not be Empty")){return false}
	
	if(email(reg.user_mail)){return false}
		
	if(isNotEmpty(reg.user_phone,"Phone Number should not be Empty")){return false}
	
	if(check(reg.user_phone,"Enter only numbers in Phone Number")){return false}
	
	if(isNotEmpty(reg.user_mobile,"Mobile Number should not be Empty")){return false}
	
	if(check(reg.user_mobile,"Enter only numbers in Mobile Number")){return false}
}
///////////////////////////////					Admin Login			//////////////////////////////////////
function admin_login(reg)
{
	if(isNotEmpty(reg.username,"Username should not be Empty")){return false}
	
	if(isNotEmpty(reg.password,"Password should not be Empty")){return false}
}
///////////////////////////////			Creation of new Company/User By Admin	/////////////////////////
function create_user(reg)
{
	if(isNotEmpty(reg.username,"Username should not be Empty")){return false}
	
	if(isNotEmpty(reg.password,"Password should not be Empty")){return false}
	
	if(isChosen(reg.state,"Select State. It should not be empty")){return false}
	
	if(isChosen(reg.site,"Select Site. It should not be empty")){return false}
}
//////////////////////////////			Creation of New Services	/////////////////////////////
function create_service(reg)
{
	if(isNotEmpty(reg.service,"Service Name should not be Empty")){return false}
	
	if(isNotEmpty(reg.vaccination,"Vaccination should not be Empty")){return false}
	
	if(isNotEmpty(reg.consent,"Consent should not be Empty")){return false}
	
	if(isNotEmpty(reg.faq,"Faq Name should not be Empty")){return false}
}
//////////////////////////////			Creation of New State	/////////////////////////////
function create_state(reg)
{
	if(isNotEmpty(reg.state,"State Name should not be Empty")){return false}
}
//////////////////////////////			Creation of New Site	/////////////////////////////
function create_site(reg)
{
	if(isChosen(reg.state,"Select State. It should not be Empty")){return false}
	
	if(isNotEmpty(reg.site,"Site Name should not be Empty")){return false}
}
function admin_slot(reg)
{
	if(isChosen(reg.service,"Select Services. It should not be empty")){return false}
	
	if(isNotEmpty(reg.title,"Title should not be Empty")){return false}
	
	if(isNotEmpty(reg.date1,"Date should not be Empty")){return false}
	
	if(isChosen(reg.sh,"Select Hours in Start Time. It should not be empty")){return false}
	
	if(isChosen(reg.sm,"Select Minutes in Start Time. It should not be empty")){return false}
	
	if(isChosen(reg.slot_meridium,"Select Meridium. It should not be empty")){return false}
}

