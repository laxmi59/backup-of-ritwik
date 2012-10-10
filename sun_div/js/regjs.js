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
function samepass(reg,reg1)
 {
 	//var pass=reg.value;
	//var repass=reg1.value;
	if(reg.value==reg1.value)
	{
		return false;
	}
	else
	{
		alert("passwords are not same enter same passwords in both fields");
		reg1.value="";
		reg1.focus();
		return true;
	}
 }


function userminmax(reg)
{
	var user=reg.value;
	if(reg.value >0 && reg.value <32)
	{
		return false;
	}
	else
	{
		alert("date should be in between 1 and 31");
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
		alert("enter email id in correct way");
		reg.value="";
		reg.focus();
		return true;
	}
}
function check(reg,reg1)
{
	//alert ("cc");
	if(reg.value==''){
		//alert("aa");
		//if(isNotEmpty(reg,"Location Should not be empty")){return true}
		if(isChosen(reg,"Select your Location it should not be Empty")){return true}
		//return false;
	}else if(reg.value==999){
		alert("bb");
		if(isNotEmpty(reg1,"Location Should not be empty")){return true}
		//if(isChosen(reg,"Select your Location it should not be Empty")){return true}
		//return false;
	}
}
function checkresume(reg,reg1)
{
	if(reg.value=='' && reg1.value=='')
	{
		alert("please upload your resume or copy and paste resume");
		return true;
	}
	
}
function isValidGender(radio,txt)
{

		for(i=0;i<radio.length;i++)
		{
			if (radio[i].checked)
            	return false;
		}
		alert(txt);
		return true;

}


function mobile(name,name1)
{
	  x=name.value;
    if (x.length < 10){
                alert("enter 10 characters"); 
				name.value="";
				name.focus();
				return true;
           }
        if (x.charAt(0)!="9"){
                alert("it should start with 9 ");
				name.value="";
				name.focus();
                return true
           }
}
/*function checkCheckBoxes(reg) {
	if (document.reg_form.frd.checked == false &&
	    document.reg_form.paper.checked == false &&
	    document.reg_form.banner.checked == false)
		{
		alert ('You didn\'t choose any of the checkboxes!');
		return true;
		}
	else
		{
		return false;
		}
	}*/
function validateForm(reg)
{
	if(isNotEmpty(reg.r_un,"User Name should not be Empty")){return false}
	
	if(isNotEmpty(reg.r_pw,"password should not be Empty")){return false}
	
	if(pass(reg.r_pw)){return false}
	
	if(isNotEmpty(reg.r_rpw,"Retype Password should not be Empty")){return false}
	
	if(samepass(reg.r_pw,reg.r_rpw)){return false}
	
	if(isNotEmpty(reg.r_name,"Name should not be Empty")){return false}
	
	
	for (var i=0; i < reg.r_type.length; i++)
   {
   if (reg.r_type[i].checked)
      {
      var rad_val = reg.r_type[i].value;
      }
   }
  
if(rad_val=='2' || rad_val=='3' || rad_val=='4')
{
	
	if(isNotEmpty(reg.r_cname,"Company name should not be Empty")){return false}
		if(isNotEmpty(reg.r_caddr,"Company address should not be Empty")){return false}
	if(isNotEmpty(reg.r_web,"Company webpage should not be Empty")){return false}
	

}
		
	if(isChosen(reg.country,"Select your country it should not be empty")){return false}
	
	if(check(reg.location,reg.location1)){return false}
	
	if(isNotEmpty(reg.r_email,"Email Address should not be Empty")){return false}
		
	if(email(reg.r_email)){return false}
			
	if(isNotEmpty(reg.r_ph1,"Phone number Should not be empty")){return false}
	
	if(isnumaric(reg.r_ph1,"Enter only numbers in Phone number ")){return false}
	
	if(mobile(reg.r_ph1," ")){return false}
			
	if(isNotEmpty(reg.security_code,"Security code should not be Empty")){return false}
	
	if(isValidGender(reg.r1,"Do you want to Agree or not")){return false}
	
	
}
function validateForm1(reg)
{
	if(isChosen(reg.list_type,"Select Transaction type it should not be empty")){return false}
	
	if(isChosen(reg.list_property,"Select Property type it should not be empty")){return false}
	
	if(isNotEmpty(reg.list_city,"Select city it should not be empty")){return false}
	
	//if(isChosen(reg.cid,"Select city it should not be empty")){return false}
	
	if(isNotEmpty(reg.list_loc,"Location should not be Empty")){return false}
	
	if(isNotEmpty(reg.list_area,"Area should not be Empty")){return false}
	
	if(isNotEmpty(reg.list_price,"price should not be Empty")){return false}
	
	if(isValidGender(reg.list_pricing," select negotiable or not")){return false}
	
	if(reg.list_bedroom.disable=false){
		if(isChosen(reg.list_bedroom,"Select bedrooms it should not be empty")){return false}
	}
	if(isChosen(reg.list_floor_no,"Select floor number it should not be empty")){return false}
	
	if(isChosen(reg.list_floors,"Select Number of floors available it should not be empty")){return false}
	
	if(reg.list_age.disable=false){
		if(isChosen(reg.list_age,"Select age of construcation it should not be empty")){return false}
	}
	
	if(isChosen(reg.list_items,"Select furnished items it should not be empty")){return false}
	
	if(isChosen(reg.list_face,"Select face it should not be empty")){return false}
	
	if(isChosen(reg.list_own,"Select ownership it should not be empty")){return false}
		
	if(isNotEmpty(reg.list_desc,"description should not be Empty")){return false}
}
function validateForm2(reg)
{
	if(isChosen(reg.req_type,"Select Transaction type it should not be empty")){return false}
	
	if(isChosen(reg.req_property,"Select property type it should not be empty")){return false}
	
	if(isChosen(reg.req_cid,"Select city it should not be empty")){return false}
	
	if(isNotEmpty(reg.req_aid,"Locality it should not be empty")){return false}
	
	if(reg.req_bedroom.disable=false){
		if(isChosen(reg.req_bedroom,"Select bedrooms it should not be empty")){return false}
	}
	if(isChosen(reg.req_budject1,"Select budject it should not be empty")){return false}
	
	//if(isChosen(reg.req_budject2,"Select Transaction type it should not be empty")){return false}
	
	if(isNotEmpty(reg.req_place,"Minimum Area  should not be Empty")){return false}
	
	if(isChosen(reg.req_time,"select estimated time of purchase  it should not be empty")){return false}
	
	if(isValidGender(reg.req_loan," Are you interested to availing home loan?")){return false}

for (var i=0; i < reg.req_loan.length; i++)
   {
   if (reg.req_loan[i].checked)
      {
      var rad_val = reg.req_loan[i].value;
      }
   }
  
if(rad_val=='yes')
{
	
	if(isNotEmpty(reg.req_loan_amt,"Loan amount should not be Empty")){return false}
	if(isnumaric(reg.req_loan_amt,"Enter only numbers in Loan amount ")){return false}
	if(isChosen(reg.req_job,"select Job.  it should not be empty")){return false}
	
	if(isNotEmpty(reg.req_income,"Income should not be Empty")){return false}
	if(isnumaric(reg.req_income,"Enter only numbers in Income ")){return false}

}

	
	
	
	
	
	
}