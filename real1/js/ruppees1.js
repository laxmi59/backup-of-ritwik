function fillCategory()
{ 
//alert('aa');
	addOption(document.drop_list.req_type, "1","rent", "");
	addOption(document.drop_list.req_type, "3","buy", "");
}

function Selectlocation()
{
	//alert('aa');
	// ON selection of category this function will work
	removeAllOptions(document.drop_list.req_budject1);
	addOption(document.drop_list.req_budject1, "", "select", "");
	
	if(document.drop_list.req_type.value == '1')
	{
		addOption(document.drop_list.req_budject1,"4900","<5000","");
		for(i=5000;i<=100000;i=i+10000)
		{
			addOption(document.drop_list.req_budject1, i, i, "");
		}
		addOption(document.drop_list.req_budject1,"4900",">1lac","");
	}
	else if(document.drop_list.req_type.value == '3')
	{
		addOption(document.drop_list.req_budject1,"9",">9lacs","");
		for(i=10;i<=90;i=i+10)
		{
			addOption(document.drop_list.req_budject1, i, i, "");
		}
		addOption(document.drop_list.req_budject1,"9",">1 crore","");
	}
}

function Selectlocation1()
{
	if(document.drop_list.req_type.value == '1')
	{
		if(document.getElementById('req_budject1').value=='4900')
		{
			document.getElementById('req_budject2').disabled=true;
		}
		else
		{
			document.getElementById('req_budject2').disabled=false;
		}
		removeAllOptions(document.drop_list.req_budject2);
		addOption(document.drop_list.req_budject2, "", "select", "");
		
		if(document.drop_list.req_budject1.value == '5000')
		{
			for(j=15000;j<=100000;j=j+10000)
			{
				addOption(document.drop_list.req_budject2,j, j,"");
			}
		}
		if(document.drop_list.req_budject1.value == '15000')
		{
			for(j=25000;j<=100000;j=j+10000)
			{
				addOption(document.drop_list.req_budject2,j, j,"");
			}
		}
		if(document.drop_list.req_budject1.value == '25000')
		{
			for(j=35000;j<=100000;j=j+10000)
			{
				addOption(document.drop_list.req_budject2,j, j,"");
			}
		}
		if(document.drop_list.req_budject1.value == '35000')
		{
			for(j=45000;j<=100000;j=j+10000)
			{
				addOption(document.drop_list.req_budject2,j, j,"");
			}
		}
		if(document.drop_list.req_budject1.value == '45000')
		{
			for(j=55000;j<=100000;j=j+10000)
			{
				addOption(document.drop_list.req_budject2,j, j,"");
			}
		}if(document.drop_list.req_budject1.value == '550000')
		{
			for(j=55000;j<=100000;j=j+10000)
			{
				addOption(document.drop_list.req_budject2,j, j,"");
			}
		}if(document.drop_list.req_budject1.value == '65000')
		{
			for(j=65000;j<=100000;j=j+10000)
			{
				addOption(document.drop_list.req_budject2,j, j,"");
			}
		}if(document.drop_list.req_budject1.value == '75000')
		{
			for(j=85000;j<=100000;j=j+10000)
			{
				addOption(document.drop_list.req_budject2,j, j,"");
			}
		}if(document.drop_list.req_budject1.value == '95000')
		{
			addOption(document.drop_list.req_budject2,"1 lac", "1 lac" ,"");
		
		}
	}
	else
	{
		if(document.getElementById('req_budject1').value=='9')
		{
			document.getElementById('req_budject2').disabled=true;
		}
		else
		{
			document.getElementById('req_budject2').disabled=false;
		}
		removeAllOptions(document.drop_list.req_budject2);
		addOption(document.drop_list.req_budject2, "", "select", "");
		if(document.drop_list.req_budject1.value == '10')
		{
			for(j=20;j<=100;j=j+10)
			{
				addOption(document.drop_list.req_budject2,j, j,"");
			}
		}
		if(document.drop_list.req_budject1.value == '20')
		{
			for(j=30;j<=100;j=j+10)
			{
				addOption(document.drop_list.req_budject2,j, j,"");
			}
		}
		if(document.drop_list.req_budject1.value == '30')
		{
			for(j=40;j<=100;j=j+10)
			{
				addOption(document.drop_list.req_budject2,j, j,"");
			}
		}
		if(document.drop_list.req_budject1.value == '40')
		{
			for(j=50;j<=100;j=j+10)
			{
				addOption(document.drop_list.req_budject2,j, j,"");
			}
		}
		if(document.drop_list.req_budject1.value == '50')
		{
			for(j=60;j<=100;j=j+10)
			{
				addOption(document.drop_list.req_budject2,j, j,"");
			}
		}
		if(document.drop_list.req_budject1.value == '60')
		{
			for(j=70;j<=100;j=j+10)
			{
				addOption(document.drop_list.req_budject2,j, j,"");
			}
		}
		if(document.drop_list.req_budject1.value == '70')
		{
			for(j=80;j<=100;j=j+10)
			{
				addOption(document.drop_list.req_budject2,j, j,"");
			}
		}
		if(document.drop_list.req_budject1.value == '80')
		{
			for(j=90;j<=100;j=j+10)
			{
				addOption(document.drop_list.req_budject2,j, j,"");
			}
		}
		if(document.drop_list.req_budject1.value == '90')
		{
			addOption(document.drop_list.req_budject2,"1 crore", "1 crore","");
			
		}
	}
}

function removeAllOptions(selectbox)
{
	var i;
	for(i=selectbox.options.length-1;i>=0;i--)
	{
		//selectbox.options.remove(i);
		selectbox.remove(i);
	}
}


function addOption(selectbox, value, text )
{
	var optn = document.createElement("OPTION");
	optn.text = text;
	optn.value = value;

	selectbox.options.add(optn);
}
function abc()
{
	//var a=document.drop_list.req_property.value;
	var a=document.getElementById('req_property').value ;
	if(a >= 9)
	{
		document.getElementById('req_bedroom').disabled=true;
	}
	else
	{
		document.getElementById('req_bedroom').disabled=false;
	}
}

function amounts()
{
	var a=document.frm.r1.value;
	alert(a);
	// ON selection of category this function will work
	removeAllOptions(document.drop_list.req_budject1);
	addOption(document.drop_list.req_budject1, "", "select", "");
	
	if(document.drop_list.r1.value == '1')
	{
		addOption(document.drop_list.req_budject1,"4900","<5000","");
		for(i=5000;i<=100000;i=i+10000)
		{
			addOption(document.drop_list.req_budject1, i, i, "");
		}
		addOption(document.drop_list.req_budject1,"4900",">1lac","");
	}
	else if(document.drop_list.r1.value == '3')
	{
		addOption(document.drop_list.req_budject1,"9",">9lacs","");
		for(i=10;i<=90;i=i+10)
		{
			addOption(document.drop_list.req_budject1, i, i, "");
		}
		addOption(document.drop_list.req_budject1,"9",">1 crore","");
	}
}