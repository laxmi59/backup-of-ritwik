function fill()
{ 
	//alert('aa');
	addOption(document.frm.tran_type, "1","rent", "");
	addOption(document.frm.tran_type, "3","buy", "");
	addOption(document.frm.tran_type1, "1","rent", "");
	addOption(document.frm.tran_type1, "3","buy", "");
}

function Selectprice_res()
{
	// ON selection of category this function will work
	removeAllOptions(document.frm.price_min);
	addOption(document.frm.price_min, "", "select", "");
	
	if(document.frm.tran_type.value == '1')
	{
		addOption(document.frm.price_min,"4900","<5000","");
		for(i=5000;i<=100000;i=i+10000)
		{
			addOption(document.frm.price_min, i, i, "");
		}
		addOption(document.frm.price_min,"4900",">1lac","");
	}
	else if(document.frm.tran_type.value == '3')
	{
		addOption(document.frm.price_min,"9",">9lacs","");
		for(i=10;i<=90;i=i+10)
		{
			addOption(document.frm.price_min, i, i, "");
		}
		addOption(document.frm.price_min,"9",">1 crore","");
	}
}

function Selectprice_res1(){
	if(document.frm.tran_type.value == '1')	{
		if(document.getElementById('price_min').value=='4900'){
			document.getElementById('price_max').disabled=true;	
		}else{
			document.getElementById('price_max').disabled=false;}
		removeAllOptions(document.frm.price_max);
		addOption(document.frm.price_max, "", "select", "");
		
		if(document.frm.price_min.value == '5000'){
			for(j=15000;j<=100000;j=j+10000){
				addOption(document.frm.price_max,j, j,"");}
		}
		if(document.frm.price_min.value == '15000')
		{
			for(j=25000;j<=100000;j=j+10000)
			{
				addOption(document.frm.price_max,j, j,"");
			}
		}
		if(document.frm.price_min.value == '25000')
		{
			for(j=35000;j<=100000;j=j+10000)
			{
				addOption(document.frm.price_max,j, j,"");
			}
		}
		if(document.frm.price_min.value == '35000')
		{
			for(j=45000;j<=100000;j=j+10000)
			{
				addOption(document.frm.price_max,j, j,"");
			}
		}
		if(document.frm.price_min.value == '45000')
		{
			for(j=55000;j<=100000;j=j+10000)
			{
				addOption(document.frm.price_max,j, j,"");
			}
		}if(document.frm.price_min.value == '550000')
		{
			for(j=55000;j<=100000;j=j+10000)
			{
				addOption(document.frm.price_max,j, j,"");
			}
		}if(document.frm.price_min.value == '65000')
		{
			for(j=65000;j<=100000;j=j+10000)
			{
				addOption(document.frm.price_max,j, j,"");
			}
		}if(document.frm.price_min.value == '75000')
		{
			for(j=85000;j<=100000;j=j+10000)
			{
				addOption(document.frm.price_max,j, j,"");
			}
		}if(document.frm.price_min.value == '95000')
		{
			addOption(document.frm.price_max,"1 lac", "1 lac" ,"");
		
		}
	}
	else
	{
		if(document.getElementById('price_min').value=='9')
		{
			document.getElementById('price_max').disabled=true;
		}
		else
		{
			document.getElementById('price_max').disabled=false;
		}
		removeAllOptions(document.frm.price_max);
		addOption(document.frm.price_max, "", "select", "");
		if(document.frm.price_min.value == '10')
		{
			for(j=20;j<=100;j=j+10)
			{
				addOption(document.frm.price_max,j, j,"");
			}
		}
		if(document.frm.price_min.value == '20')
		{
			for(j=30;j<=100;j=j+10)
			{
				addOption(document.frm.price_max,j, j,"");
			}
		}
		if(document.frm.price_min.value == '30')
		{
			for(j=40;j<=100;j=j+10)
			{
				addOption(document.frm.price_max,j, j,"");
			}
		}
		if(document.frm.price_min.value == '40')
		{
			for(j=50;j<=100;j=j+10)
			{
				addOption(document.frm.price_max,j, j,"");
			}
		}
		if(document.frm.price_min.value == '50')
		{
			for(j=60;j<=100;j=j+10)
			{
				addOption(document.frm.price_max,j, j,"");
			}
		}
		if(document.frm.price_min.value == '60')
		{
			for(j=70;j<=100;j=j+10)
			{
				addOption(document.frm.price_max,j, j,"");
			}
		}
		if(document.frm.price_min.value == '70')
		{
			for(j=80;j<=100;j=j+10)
			{
				addOption(document.frm.price_max,j, j,"");
			}
		}
		if(document.frm.price_min.value == '80')
		{
			for(j=90;j<=100;j=j+10)
			{
				addOption(document.frm.price_max,j, j,"");
			}
		}
		if(document.frm.price_min.value == '90')
		{
			addOption(document.frm.price_max,"1 crore", "1 crore","");
			
		}
	}
}
function Selectprice_com()
{
	// ON selection of category this function will work
	removeAllOptions(document.frm.price_min1);
	addOption(document.frm.price_min1, "", "select", "");
	
	if(document.frm.tran_type1.value == '1')
	{
		addOption(document.frm.price_min1,"4900","<5000","");
		for(i=5000;i<=100000;i=i+10000)
		{
			addOption(document.frm.price_min1, i, i, "");
		}
		addOption(document.frm.price_min1,"4900",">1lac","");
	}
	else if(document.frm.tran_type1.value == '3')
	{
		addOption(document.frm.price_min1,"9",">9lacs","");
		for(i=10;i<=90;i=i+10)
		{
			addOption(document.frm.price_min1, i, i, "");
		}
		addOption(document.frm.price_min1,"9",">1 crore","");
	}
}

function Selectprice_com1(){
	if(document.frm.tran_type1.value == '1')	{
		if(document.getElementById('price_min1').value=='4900'){
			document.getElementById('price_max1').disabled=true;	
		}else{
			document.getElementById('price_max1').disabled=false;}
		removeAllOptions(document.frm.price_max1);
		addOption(document.frm.price_max1, "", "select", "");
		
		if(document.frm.price_min1.value == '5000'){
			for(j=15000;j<=100000;j=j+10000){
				addOption(document.frm.price_max1,j, j,"");}
		}
		if(document.frm.price_min1.value == '15000')
		{
			for(j=25000;j<=100000;j=j+10000)
			{
				addOption(document.frm.price_max1,j, j,"");
			}
		}
		if(document.frm.price_min1.value == '25000')
		{
			for(j=35000;j<=100000;j=j+10000)
			{
				addOption(document.frm.price_max1,j, j,"");
			}
		}
		if(document.frm.price_min1.value == '35000')
		{
			for(j=45000;j<=100000;j=j+10000)
			{
				addOption(document.frm.price_max1,j, j,"");
			}
		}
		if(document.frm.price_min1.value == '45000')
		{
			for(j=55000;j<=100000;j=j+10000)
			{
				addOption(document.frm.price_max1,j, j,"");
			}
		}if(document.frm.price_min1.value == '550000')
		{
			for(j=55000;j<=100000;j=j+10000)
			{
				addOption(document.frm.price_max1,j, j,"");
			}
		}if(document.frm.price_min1.value == '65000')
		{
			for(j=65000;j<=100000;j=j+10000)
			{
				addOption(document.frm.price_max1,j, j,"");
			}
		}if(document.frm.price_min1.value == '75000')
		{
			for(j=85000;j<=100000;j=j+10000)
			{
				addOption(document.frm.price_max1,j, j,"");
			}
		}if(document.frm.price_min1.value == '95000')
		{
			addOption(document.frm.price_max1,"1 lac", "1 lac" ,"");
		
		}
	}
	else
	{
		if(document.getElementById('price_min1').value=='9')
		{
			document.getElementById('price_max1').disabled=true;
		}
		else
		{
			document.getElementById('price_max1').disabled=false;
		}
		removeAllOptions(document.frm.price_max1);
		addOption(document.frm.price_max1, "", "select", "");
		if(document.frm.price_min1.value == '10')
		{
			for(j=20;j<=100;j=j+10)
			{
				addOption(document.frm.price_max1,j, j,"");
			}
		}
		if(document.frm.price_min1.value == '20')
		{
			for(j=30;j<=100;j=j+10)
			{
				addOption(document.frm.price_max1,j, j,"");
			}
		}
		if(document.frm.price_min1.value == '30')
		{
			for(j=40;j<=100;j=j+10)
			{
				addOption(document.frm.price_max1,j, j,"");
			}
		}
		if(document.frm.price_min1.value == '40')
		{
			for(j=50;j<=100;j=j+10)
			{
				addOption(document.frm.price_max1,j, j,"");
			}
		}
		if(document.frm.price_min1.value == '50')
		{
			for(j=60;j<=100;j=j+10)
			{
				addOption(document.frm.price_max1,j, j,"");
			}
		}
		if(document.frm.price_min1.value == '60')
		{
			for(j=70;j<=100;j=j+10)
			{
				addOption(document.frm.price_max1,j, j,"");
			}
		}
		if(document.frm.price_min1.value == '70')
		{
			for(j=80;j<=100;j=j+10)
			{
				addOption(document.frm.price_max1,j, j,"");
			}
		}
		if(document.frm.price_min1.value == '80')
		{
			for(j=90;j<=100;j=j+10)
			{
				addOption(document.frm.price_max1,j, j,"");
			}
		}
		if(document.frm.price_min1.value == '90')
		{
			addOption(document.frm.price_max1,"1 crore", "1 crore","");
			
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
