function buy()
{
	document.getElementById('req_budject1').style.visibility="hidden";
	document.getElementById('req_budject2').style.visibility="hidden";
	document.getElementById('th').style.visibility="hidden";
	document.getElementById('req_budject3').style.visibility="visible";
	document.getElementById('req_budject4').style.visibility="visible";
	document.getElementById('lc').style.visibility="visible";
}
function rent()
{
	document.getElementById('req_budject3').style.visibility="hidden";
	document.getElementById('req_budject4').style.visibility="hidden";
	document.getElementById('lc').style.visibility="hidden";
	document.getElementById('req_budject1').style.visibility="visible";
	document.getElementById('req_budject2').style.visibility="visible";
	document.getElementById('th').style.visibility="visible";
}
function fillCategory()
{ 
	
	for(i=5000;i<=10000;i=i+1000)
	{
		addOption(document.drop_list.req_budject1, i, i, "");
	}
	for(i=10;i<=100;i=i+5)
	{
		addOption(document.drop_list.req_budject3, i, i, "");
	}
}

function Selectlocation()
{
	if(document.getElementById('req_budject1').value=='4900')
	{
		document.getElementById('req_budject2').disabled=true;
	}
	else
	{
		document.getElementById('req_budject2').disabled=false;
	}
	if(document.getElementById('req_budject3').value=='9')
	{
		document.getElementById('req_budject4').disabled=true;
	}
	else
	{
		document.getElementById('req_budject4').disabled=false;
	}
	// ON selection of category this function will work
	removeAllOptions(document.drop_list.req_budject2);
	addOption(document.drop_list.req_budject2, "", "select", "");

	if(document.drop_list.req_budject1.value == '5000')
	{
		for(j=6000;j<=10000;j=j+1000)
		{
			addOption(document.drop_list.req_budject2,j, j,"");
		}
	}
	if(document.drop_list.req_budject1.value == '6000')
	{
		for(j=7000;j<=10000;j=j+1000)
		{
			addOption(document.drop_list.req_budject2,j, j,"");
		}
	}
	if(document.drop_list.req_budject1.value == '7000')
	{
		for(j=8000;j<=10000;j=j+1000)
		{
			addOption(document.drop_list.req_budject2,j, j,"");
		}
	}
	
	
	removeAllOptions(document.drop_list.req_budject4);
	addOption(document.drop_list.req_budject4, "", "select", "");

	if(document.drop_list.req_budject3.value == '10')
	{
		for(j=20;j<=100;j=j+5)
		{
			addOption(document.drop_list.req_budject4,j, j,"");
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
	 var a=document.getElementById('abc1');
	 alert(a);
}