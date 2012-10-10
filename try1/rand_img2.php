<style type="text/css">
.gallerycontroller{
width: 250px; display:none;
}
</style>

<script type="text/javascript">

/***********************************************
* Advanced Gallery script- � Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice must stay intact for legal use
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

var tickspeed=3000 //ticker speed in miliseconds (2000=2 seconds)
var displaymode="auto" //displaymode ("auto" or "manual"). No need to modify as form at the bottom will control it, unless you wish to remove form.

if (document.getElementById){
document.write('<style type="text/css">\n')
document.write('.gallerycontent{display:none;}\n')
document.write('</style>\n')
}

var selectedDiv=0
var totalDivs=0

function getElementbyClass(classname){
partscollect=new Array()
var inc=0
var alltags=document.all? document.all.tags("DIV") : document.getElementsByTagName("*")
for (i=0; i<alltags.length; i++){
if (alltags[i].className==classname)
partscollect[inc++]=alltags[i]
}
}

function contractall(){
var inc=0
while (partscollect[inc]){
partscollect[inc].style.display="none"
inc++
}
}

function expandone(){
var selectedDivObj=partscollect[selectedDiv]
contractall()
selectedDivObj.style.display="block"
if (document.gallerycontrol)
temp.options[selectedDiv].selected=true
selectedDiv=(selectedDiv<totalDivs-1)? selectedDiv+1 : 0
if (displaymode=="auto")
autocontrolvar=setTimeout("expandone()",tickspeed)
}

function populatemenu(){
temp=document.gallerycontrol.menu
for (m=temp.options.length-1;m>0;m--)
temp.options[m]=null
for (i=0;i<totalDivs;i++){
var thesubject=partscollect[i].getAttribute("subject")
thesubject=(thesubject=="" || thesubject==null)? "HTML Content "+(i+1) : thesubject
temp.options[i]=new Option(thesubject,"")
}
temp.options[0].selected=true
}

function manualcontrol(menuobj){
if (displaymode=="manual"){
selectedDiv=menuobj
expandone()
}
}

function preparemode(themode){
displaymode=themode
if (typeof autocontrolvar!="undefined")
clearTimeout(autocontrolvar)
if (themode=="auto"){
document.gallerycontrol.menu.disabled=true
autocontrolvar=setTimeout("expandone()",tickspeed)
}
else
document.gallerycontrol.menu.disabled=false
}


function startgallery(){
if (document.getElementById("controldiv")) //if it exists
document.getElementById("controldiv").style.display="block"
getElementbyClass("gallerycontent")
totalDivs=partscollect.length
if (document.gallerycontrol){
populatemenu()
if (document.gallerycontrol.mode){
for (i=0; i<document.gallerycontrol.mode.length; i++){
if (document.gallerycontrol.mode[i].checked)
displaymode=document.gallerycontrol.mode[i].value
}
}
}
if (displaymode=="auto" && document.gallerycontrol)
document.gallerycontrol.menu.disabled=true
expandone()
}

if (window.addEventListener)
window.addEventListener("load", startgallery, false)
else if (window.attachEvent)
window.attachEvent("onload", startgallery)
else if (document.getElementById)
window.onload=startgallery

</script>
<div class="gallerycontent" subject="What is JavaScript?">
JavaScript is a scripting language originally developed by Netscape to add interactivity and power to web documents. It is purely client side, and runs completely on the client's browser and computer.
</div>

<div class="gallerycontent" subject="Java & JavaScript Differences">
Java is completely different from JavaScript- it's more powerful, more complex, and unfortunately, a lot harder to master. It belongs in the same league as C, C++, and other more complex languages.
</div>

<div class="gallerycontent" subject="What is DHTML?">
DHTML is the embodiment of a combination of technologies- JavaScript, CSS, and HTML. Through them a new level of interactivity is possible for the end user experience.
</div>
<div class="gallerycontent" subject="What is JavaScript?">
JavaScript is a scripting language originally developed by Netscape to add interactivity and power to web documents. It is purely client side, and runs completely on the client's browser and computer.1
</div>

<div class="gallerycontent" subject="Java & JavaScript Differences">
Java is completely different from JavaScript- it's more powerful, more complex, and unfortunately, a lot harder to master. It belongs in the same league as C, C++, and other more complex languages.1
</div>

<div class="gallerycontent" subject="What is DHTML?">
DHTML is the embodiment of a combination of technologies- JavaScript, CSS, and HTML. Through them a new level of interactivity is possible for the end user experience.1
</div>

<!--HTML for gallery control options below. Remove checkboxes or entire outer DIV if desired -->

<div id="controldiv" style="display:none" class="gallerycontroller">
<form name="gallerycontrol">
<select class="gallerycontroller" size="3" name="menu" onChange="manualcontrol(this.options.selectedIndex)">
<option>Blank form</option>
</select><br>
</form>
</div>