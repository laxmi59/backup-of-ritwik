// JavaScript Document
function trimfun(stringToTrim) {
	return stringToTrim.replace(/^\s+|\s+$/g,"");
}
function isNotEmpty(fname,txt){
	if(trimfun(fname.value)=="")	{
		alert(txt);
		fname.focus();
		return true;
	}else{
		return false;
	}
}
function email(reg){
	var e=reg.value;
	var e1=/^(?:\w+\.?)*\w+@(?:\w+\.)+\w+$/;
	if(e.match(e1))	{
		return false;
	}else{
		alert("Invalid Email");
		reg.focus();
		return true;
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
function ebookValidateForm3(reg){
//alert("hi");

	if(isNotEmpty(reg.ebook_first_name,"First Name should not be Empty")){return false}
	
	if(isNotEmpty(reg.ebook_last_name,"Last Name should not be Empty")){return false}
	
	if(isNotEmpty(reg.ebook_email,"Email Address should not be Empty")){return false}
	if(email(reg.ebook_email)){return false}
	
	if(isNotEmpty(reg.ebook_phone,"Phone Number should not be Empty")){return false}
	
	if(isNotEmpty(reg.ebook_website,"Website URL should not be Empty")){return false}
	
	if(isChosen(reg.ebook_traffic,"Select Offers you Promote. It should not be Empty")){return false}
	
	if(isChosen(reg.ebook_info,"Select Information Looking for. It should not be Empty")){return false}
	
	
}
