/*
 * File: wr_basic.js
 *
 * Copyright (c) 2007-2009, Paulo Avila (apaulodesign.com)
 *
 * Project: General Widget Resource
 *
 * Description: Provides the necessary functions for the basic operation of
 *  most widgets.
 *
 */
 
function wr_showBack(a){if(window.widget){widget.prepareForTransition("ToBack");}document.getElementById("front").style.display="none";document.getElementById("back").style.display="block";if(window.widget){setTimeout(function(){widget.performTransition();},0);}if(a){setTimeout(a,750);}}function wr_showFront(a){if(window.widget){widget.prepareForTransition("ToFront");}document.getElementById("back").style.display="none";document.getElementById("front").style.display="block";if(window.widget){setTimeout(function(){widget.performTransition();},0);}if(a){setTimeout(a,750);}}function wr_localize(a){try{a=localizedStrings[a]||a;}catch(b){}return a;}function wr_instance(){var a=(window.widget)?widget.identifier:"!Dashboard";if(arguments.length===1){a+="-"+arguments[0];}return a;}function wr_escapeCLI(a){if(typeof(a)==="string"){a=a.replace(new RegExp("'","g"),"'\\''");}return"'"+a+"'";}function wr_eId(a){return document.getElementById(a);}function wr_openURL(){var c=0;var d="";var a="";var b="http://www.apaulodesign.com/widgets/index.php";if(arguments.length===0){d=wr_getPlistValue("CFBundleIdentifier").wr_ext();a=wr_getPlistValue("CFBundleVersion");b+="?s="+d+"&v="+a;}else{b=arguments[0];if(arguments.length>1){for(c=1;c<arguments.length;c++){b+=((c===1)?"?arg":"&arg")+c+"="+encodeURI(arguments[c]);}}}if(window.widget){widget.openURL(b);}else{window.location.href=b;}}String.prototype.wr_ext=function(){for(var a=this.length-1;a>0;a--){if(this.charAt(a-1)==="."){break;}}return this.substr(a,this.length-a);};
