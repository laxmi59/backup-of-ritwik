//list of states
var state = '\
US:AK:Alaska|\
US:AL:Alabama|\
US:AR:Arkansas|\
US:AS:American Samoa|\
US:AZ:Arizona|\
US:CA:California|\
US:CO:Colorado|\
US:CT:Connecticut|\
US:DC:D.C.|\
US:DE:Delaware|\
US:FL:Florida|\
US:FM:Micronesia|\
US:GA:Georgia|\
US:GU:Guam|\
US:HI:Hawaii|\
US:IA:Iowa|\
US:ID:Idaho|\
US:IL:Illinois|\
US:IN:Indiana|\
US:KS:Kansas|\
US:KY:Kentucky|\
US:LA:Louisiana|\
US:MA:Massachusetts|\
US:MD:Maryland|\
US:ME:Maine|\
US:MH:Marshall Islands|\
US:MI:Michigan|\
US:MN:Minnesota|\
US:MO:Missouri|\
US:MP:Marianas|\
US:MS:Mississippi|\
US:MT:Montana|\
US:NC:North Carolina|\
US:ND:North Dakota|\
US:NE:Nebraska|\
US:NH:New Hampshire|\
US:NJ:New Jersey|\
US:NM:New Mexico|\
US:NV:Nevada|\
US:NY:New York|\
US:OH:Ohio|\
US:OK:Oklahoma|\
US:OR:Oregon|\
US:PA:Pennsylvania|\
US:PR:Puerto Rico|\
US:PW:Palau|\
US:RI:Rhode Island|\
US:SC:South Carolina|\
US:SD:South Dakota|\
US:TN:Tennessee|\
US:TX:Texas|\
US:UT:Utah|\
US:VA:Virginia|\
US:VI:Virgin Islands|\
US:VT:Vermont|\
US:WA:Washington|\
US:WI:Wisconsin|\
US:WV:West Virginia|\
US:WY:Wyoming|\
US:AA:Military Americas|\
US:AE:Military Europe/ME/Canada|\
US:AP:Military Pacific|\
';


function TrimString(sInString) {
  if ( sInString ) {
    sInString = sInString.replace( /^\s+/g, "" );// strip leading 
    return sInString.replace( /\s+$/g, "" );// strip trailing 
  }
}



function populateState(name, id) {
 
  var selObj = document.getElementById(id);

if ( selObj.type == 'select-one' ) {
    for (var i = 0; i < selObj.options.length; i++) {
      selObj.options[i] = null;
    }
    selObj.options.length=null;
    selObj.options[0] = new Option('Select','');
    selObj.selectedIndex = 0;
  }
  
  var stateLineArray = state.split("|");  
  var optionCntr = 1;
  for (var loop = 0; loop < (stateLineArray.length)-1; loop++) {
    lineArray = stateLineArray[loop].split(":");
    countryCode  = TrimString(lineArray[0]);
    stateCode    = TrimString(lineArray[1]);
  //  stateName    = TrimString(lineArray[2]);


      if ( selObj.type == 'text' ) {
        parentObj = document.getElementById(id).parentNode;
        parentObj.removeChild(selObj);
        var inputSel = document.createElement("SELECT");
        inputSel.setAttribute("name", name);
        inputSel.setAttribute("id", id);
        parentObj.appendChild(inputSel) ;
        selObj = document.getElementById(id);
        selObj.options[0] = new Option('Select','');
        selObj.selectedIndex = 0;
      }
      if ( stateCode != '' ) {
        selObj.options[optionCntr] = new Option(stateCode, stateCode);
      }
  
      optionCntr++
    }

}



function mask(f, separator){
	tel='';
	var val =f.value.split('');
	for(var i=0;i<val.length;i++){
	if(i==1){val[i]=val[i]+separator}
	tel=tel+val[i]
	}
	f.value=tel;
}

function maskDate(f){
	tel='';
	var val =f.value.split('');
	for(var i=0;i<val.length;i++){
	if(i==1){val[i]=val[i]+'/'}
	if(i==3){val[i]=val[i]+'/'}
	tel=tel+val[i]
	}
	f.value=tel;
}



var zChar = new Array(' ', '(', ')', '-', '.');
var maxphonelength = 13;
var phonevalue1;
var phonevalue2;
var cursorposition;

function ParseForNumber1(object){
	phonevalue1 = ParseChar(object.value, zChar);
}
function ParseForNumber2(object){
	phonevalue2 = ParseChar(object.value, zChar);
}

function backspacerUP(object,e) { 
	if(e){ 
		e = e 
	} else {
		e = window.event 
	} 
	if(e.which){ 
		var keycode = e.which 
	} else {
		var keycode = e.keyCode 
	}

	ParseForNumber1(object)

	if(keycode >= 48){
		ValidatePhone(object)
	}
}

function backspacerDOWN(object,e) { 
	if(e){ 
		e = e 
	} else {
		e = window.event 
	} 
	if(e.which){ 
		var keycode = e.which 
	} else {
		var keycode = e.keyCode 
	}
	ParseForNumber2(object)
} 

function GetCursorPosition(){
    
	var t1 = phonevalue1;
	var t2 = phonevalue2;
	var bool = false
    for (i=0; i<t1.length; i++)
    {
    	if (t1.substring(i,1) != t2.substring(i,1)) {
    		if(!bool) {
    			cursorposition=i
    			bool=true
    		}
    	}
    }
}

function ValidatePhone(object){
	
	var p = phonevalue1
	
	p = p.replace(/[^\d]*/gi,"")

	if (p.length < 3) {
		object.value=p
	} else if(p.length==3){
		pp=p;
		d4=p.indexOf('(')
		d5=p.indexOf(')')
		if(d4==-1){
			pp="("+pp;
		}
		if(d5==-1){
			pp=pp+")";
		}
		object.value = pp;
	} else if(p.length>3 && p.length < 7){
		p ="(" + p;	
		l30=p.length;
		p30=p.substring(0,4);
		p30=p30+")"

		p31=p.substring(4,l30);
		pp=p30+p31;

		object.value = pp;	
		
	} else if(p.length >= 7){
		p ="(" + p;	
		l30=p.length;
		p30=p.substring(0,4);
		p30=p30+")"
		
		p31=p.substring(4,l30);
		pp=p30+p31;
		
		l40 = pp.length;
		p40 = pp.substring(0,8);
		p40 = p40 + "-"
		
		p41 = pp.substring(8,l40);
		ppp = p40 + p41;
		
		object.value = ppp.substring(0, maxphonelength);
	}
	
	GetCursorPosition()
	
	if(cursorposition >= 0){
		if (cursorposition == 0) {
			cursorposition = 2
		} else if (cursorposition <= 2) {
			cursorposition = cursorposition + 1
		} else if (cursorposition <= 5) {
			cursorposition = cursorposition + 2
		} else if (cursorposition == 6) {
			cursorposition = cursorposition + 2
		} else if (cursorposition == 7) {
			cursorposition = cursorposition + 4
			e1=object.value.indexOf(')')
			e2=object.value.indexOf('-')
			if (e1>-1 && e2>-1){
				if (e2-e1 == 4) {
					cursorposition = cursorposition - 1
				}
			}
		} else if (cursorposition < 11) {
			cursorposition = cursorposition + 3
		} else if (cursorposition == 11) {
			cursorposition = cursorposition + 1
		} else if (cursorposition >= 12) {
			cursorposition = cursorposition
		}

      /*  var txtRange = object.createTextRange();
        txtRange.moveStart( "character", cursorposition);
		txtRange.moveEnd( "character", cursorposition - object.value.length);
        txtRange.select();*/
    }

}

function ParseChar(sStr, sChar)
{
    if (sChar.length == null) 
    {
        zChar = new Array(sChar);
    }
    else zChar = sChar;
    
    for (i=0; i<zChar.length; i++)
    {
        sNewStr = "";
    
        var iStart = 0;
        var iEnd = sStr.indexOf(sChar[i]);
    
        while (iEnd != -1)
        {
            sNewStr += sStr.substring(iStart, iEnd);
            iStart = iEnd + 1;
            iEnd = sStr.indexOf(sChar[i], iStart);
        }
        sNewStr += sStr.substring(sStr.lastIndexOf(sChar[i]) + 1, sStr.length);
        
        sStr = sNewStr;
    }
    
    return sNewStr;
}

