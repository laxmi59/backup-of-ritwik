// JavaScript Document
function isNotEmpty(fname,txt)
{
	if(fname.value=="")
	{
	alert(txt);
	fname.focus();
	return true;
	}
	return false;
}
function isNotEmpty1(fname,txt,field)
{
	if(fname.value=="")
	{
	alert(txt);
	field.focus();
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
    if (select.selectedIndex == 0) 
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
 function pass1(reg,txt)
{
 var pass1=reg.value;
 if(pass1.length >= 6 && pass1.length <= 20)
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
///////////////////////////////					Registration Form			//////////////////////////////////////
function user_reg(reg)
{
	if(isNotEmpty(reg.username,"Username should not be empty")){return false}
	//
	//if(isNotEmpty1(reg.user_check,"Given Username Alredy Exists! Provide another Username",reg.username)){return false}
	
	if(pass1(reg.username,"Username mustbe 6 to 30 letters")){return false}
	
	if(isNotEmpty(reg.password,"Password should not be mpty")){return false}
	
	if(pass(reg.password)){return false}
	
	if(isNotEmpty(reg.rpassword,"Retype Password should not be Empty")){return false}
	
	if(samepass(reg.password,reg.rpassword,"Passwords are not same! Enter same passwords in both fields")){return false}
	
	if(isNotEmpty(reg.user_fname,"First name should not be empty")){return false}
	
	if(isNotEmpty(reg.user_lname,"Last name should not be empty")){return false}
	//
	if(isNotEmpty(reg.user_email,"Email Id should not be empty")){return false}
	
	if(email(reg.user_email)){return false} 
	
	//if(isNotEmpty1(reg.email_check,"Given Email Id Alredy Exists! Provide another Email Id")){return false}
	
	if(checkresume(reg.user_phone,reg.user_mobile,"Enter Phone Number or Mobile Number it should not be empty")){return false}
	
	if(check(reg.user_phone,"Enter only numbers in Phone Number")){return false}
	
	if(check(reg.user_mobile,"Enter only numbers in Mobile Number")){return false}
	
	if(isNotEmpty(reg.user_country,"Country should not be empty")){return false}
	
	if(isNotEmpty(reg.user_state,"State should not be empty")){return false}
	
	if(isNotEmpty(reg.user_city,"City should not be empty")){return false}
	
	if(isNotEmpty(reg.user_addr,"Address should not be empty")){return false}
}
///////////////////////////////					Login			//////////////////////////////////////
function admin_login(reg)
{
	if(isNotEmpty(reg.username,"Username should not be Empty")){return false}
	
	if(isNotEmpty(reg.password,"Password should not be Empty")){return false}
}
///////////////////////////////					Contact Information		///////////////////////////////
function contact_info(reg)
{
	if(isNotEmpty(reg.user_fname,"First name should not be empty")){return false}
	
	if(isNotEmpty(reg.user_lname,"Last name should not be empty")){return false}
	
	if(checkresume(reg.user_phone,reg.user_mobile,"Enter Phone Number or Mobile Number it should not be empty")){return false}
	
	if(check(reg.user_phone,"Enter only numbers in Phone Number")){return false}
	
	if(check(reg.user_mobile,"Enter only numbers in Mobile Number")){return false}
}
///////////////////////////////					Address Information		///////////////////////////////
function addr_info(reg)
{
	if(isNotEmpty(reg.user_country,"Country should not be empty")){return false}
	
	if(isNotEmpty(reg.user_state,"State should not be empty")){return false}
	
	if(isNotEmpty(reg.user_city,"City should not be empty")){return false}
	
	if(isNotEmpty(reg.user_addr,"Address should not be empty")){return false}
}
///////////////////////////////					Shipping Information		///////////////////////////////
function ship_info(reg)
{
	if(isNotEmpty(reg.user_fname,"First name should not be empty")){return false}
	
	if(isNotEmpty(reg.user_phone,"Phone number should not be empty")){return false}
	
	if(check(reg.user_phone,"Enter only numbers in Phone Number")){return false}
	
	if(isNotEmpty(reg.user_country,"Country should not be empty")){return false}
	
	if(isNotEmpty(reg.user_state,"State should not be empty")){return false}
	
	if(isNotEmpty(reg.user_city,"City should not be empty")){return false}
	
	if(isNotEmpty(reg.user_addr,"Address should not be empty")){return false}
}
function product_insert(reg)
{
	if(isNotEmpty(reg.prod_name,"Product name should not be empty")){return false}
	
	if(isNotEmpty(reg.prod_price,"Price should not be empty")){return false}
	
	if(check(reg.prod_price,"Enter only numbers in Price Number")){return false}
	
	if(isNotEmpty(reg.prod_img,"Product Image should not be empty")){return false}
	
	if(isNotEmpty(reg.prod_sdesc,"Short Description should not be empty")){return false}
	
	if(isNotEmpty(reg.prod_desc,"Description should not be empty")){return false}
}
function seller_create(reg)
{
	if(isNotEmpty(reg.user_fname,"First name should not be empty")){return false}
	
	if(isNotEmpty(reg.username,"Username should not be empty")){return false}
	
	if(pass1(reg.username,"Username mustbe 6 to 30 letters")){return false}
	//
	//if(isNotEmpty1(reg.user_check,"Given Username Alredy Exists! Provide another Username",reg.username)){return false}
	
	if(isNotEmpty(reg.password,"Password should not be mpty")){return false}
	
	if(pass(reg.password)){return false}
	
	if(isNotEmpty(reg.user_discount,"Discount should not be Empty")){return false}
	//
	if(isNotEmpty(reg.user_email,"Email Id should not be empty")){return false}
	
	if(email(reg.user_email)){return false} 
	
	//if(isNotEmpty1(reg.email_check,"Given Email Id Alredy Exists! Provide another Email Id",reg.user_email)){return false}
	
	
}
function changepass(reg)
{
	if(isNotEmpty(reg.pw1,"Old Passwordshould not be empty")){return false}
	
	if(spaces(reg.pw1,"Do not use empty spaces in Old Password")){return false}
	
	if(isNotEmpty(reg.user_pw,"New Password should not be empty")){return false}
		
	if(spaces(reg.user_pw,"Do not use empty spaces in new Password")){return false}
	
	if(userminmax(reg.user_pw,"Password must be in between 6 and 32 characters")){return false};
	
	if(isNotEmpty(reg.user_rpw,"Confirmation password should not be mpty")){return false}
	
	if(pass(reg.user_rpw)){return false}
}