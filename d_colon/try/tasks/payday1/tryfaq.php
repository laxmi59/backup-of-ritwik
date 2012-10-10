<style type="text/css">
.menutitle{
cursor:pointer;
color:#000000;
font-weight:bold;
}

.submenu{
margin-bottom: 0.5em;
margin-top:0.5em;
padding-left:10px;
}
</style>
<script type="text/javascript">
var persistmenu="yes" //"yes" or "no". Make sure each SPAN content contains an incrementing ID starting at 1 (id="sub1", id="sub2", etc)
var persisttype="sitewide" //enter "sitewide" for menu to persist across site, "local" for this page only

if (document.getElementById){ //DynamicDrive.com change
document.write('<style type="text/css">\n')
document.write('.submenu{display: none;}\n')
document.write('</style>\n')
}

function SwitchMenu(obj){
	if(document.getElementById){
	var el = document.getElementById(obj);
	var ar = document.getElementById("masterdiv").getElementsByTagName("span"); //DynamicDrive.com change
		if(el.style.display != "block"){ //DynamicDrive.com change
			for (var i=0; i<ar.length; i++){
				if (ar[i].className=="submenu") //DynamicDrive.com change
				ar[i].style.display = "none";
			}
			el.style.display = "block";
		}else{
			el.style.display = "none";
		}
	}
}

function get_cookie(Name) { 
var search = Name + "="
var returnvalue = "";
if (document.cookie.length > 0) {
offset = document.cookie.indexOf(search)
if (offset != -1) { 
offset += search.length
end = document.cookie.indexOf(";", offset);
if (end == -1) end = document.cookie.length;
returnvalue=unescape(document.cookie.substring(offset, end))
}
}
return returnvalue;
}

function onloadfunction(){
if (persistmenu=="yes"){
var cookiename=(persisttype=="sitewide")? "switchmenu" : window.location.pathname
var cookievalue=get_cookie(cookiename)
if (cookievalue!="")
document.getElementById(cookievalue).style.display="block"
}
}

function savemenustate(){
var inc=1, blockid=""
while (document.getElementById("sub"+inc)){
if (document.getElementById("sub"+inc).style.display=="block"){
blockid="sub"+inc
break
}
inc++
}
var cookiename=(persisttype=="sitewide")? "switchmenu" : window.location.pathname
var cookievalue=(persisttype=="sitewide")? blockid+";path=/" : blockid
document.cookie=cookiename+"="+cookievalue
}

if (window.addEventListener)
window.addEventListener("load", onloadfunction, false)
else if (window.attachEvent)
window.attachEvent("onload", onloadfunction)
else if (document.getElementById)
window.onload=onloadfunction

if (persistmenu=="yes" && document.getElementById)
window.onunload=savemenustate

SDMenu.prototype.expandAll = function() {
	var oldOneSmOnly = this.oneSmOnly;
	this.oneSmOnly = false;
	for (var i = 0; i < this.submenus.length; i++)
		if (this.submenus[i].className == "collapsed")
			this.expandMenu(this.submenus[i]);
	this.oneSmOnly = oldOneSmOnly;
};
SDMenu.prototype.collapseAll = function() {
	for (var i = 0; i < this.submenu.length; i++)
		if (this.submenus[i].className != "collapsed")
			this.collapseMenu(this.submenu[i]);
};
expandAll = function() {
	var oldOneSmOnly = this.oneSmOnly;
	this.oneSmOnly = false;
	for (var i = 0; i < this.submenu.length; i++)
		if (this.submenu[i].className == "collapsed")
			this.expandMenu(this.submenu[i]);
	this.oneSmOnly = oldOneSmOnly;
};
collapseAll = function() {
	for (var i = 0; i < this.submenu.length; i++)
		if (this.submenu[i].className != "collapsed")
			this.collapseMenu(this.submenu[i]);
};

</script>
<div id="masterdiv">
	 <p>Simply click on any item to see its explanation.</p>
     <p>
	 <input type="button" value="Expand all" style="background:none; text-decoration:underline; border:none;" onclick="expandAll()" />
        <input type="button" value="Collapse all" style="background:none; text-decoration:underline; border:none;" onclick="collapseAll()" />
	 </p>
	<div class="menutitle" onclick="SwitchMenu('sub1')"><a href="#"  style="color:#003366;"  >What exactly are Payday Loans?</a>
	</div>
	<span class="submenu" id="sub1">
    	Payday loans, also referred to as Payday advances, are short term cash loans given against your next paycheque. Payday loans can be for amounts of up to &pound;750 at a time which will be due for repayment on your next payday &#8211; repayment of payday loans can be for periods of up to 30 days at a time &#8211; sometimes longer should you decide to extend your repayment loan term.
    </span>
	
	<div class="menutitle" onclick="SwitchMenu('sub2')"><a href="#" style="color:#003366">What can Payday Loans be used for?</a>
	</div>
	<span class="submenu" id="sub2">
	The cash from a payday loan can be used for just about anything you need it for &#8211; example: to settle a few outstanding bills, car repair, a plumbing emergency or just to enjoy a fantastic weekend away, it&#8217;s really up to you!
	</span>
	
	<div class="menutitle" onclick="SwitchMenu('sub3')"><a href="#" style="color:#003366">How would one Qualify for Payday Loans?</a></div>
	<span class="submenu" id="sub3">
	<ul>
	  <li>You must have a regular form of income of at least &pound;750 per month, which gets paid into an active bank account with a debit card,</li>
	  <li>Be over the age of 18,</li>
  </ul>
	<ul>
      <li>Reside in England, Scotland or Wales and be entitled to work in the UK.</li>
  </ul>
  </span>
  
	<div class="menutitle" onclick="SwitchMenu('sub4')">
	      <a href="#" style="color:#003366">How much can I borrow when applying for a Payday Loan?</a>
     </div>
   <span class="submenu" id="sub4">
	You can borrow any amount from &pound;80 to &pound;750 at one time. The cash amount for which you will qualify (your credit limit) will be based on your net monthly pay.
	</span>
	
	<div class="menutitle" onclick="SwitchMenu('sub5')"><a href="#" style="color:#003366">How much do Payday Loans cost?</a></div>
	<span class="submenu" id="sub5">
	You will repay &pound;100 for every &pound;80 you borrow. There are absolutely no administration fees. Typical Example: Loan &#8211; &pound;80; Interest &#8211; &pound;20; Total Repayable &#8211; &pound;100; Term: 30 days; Typical <span class="caps">APR</span> &#8211; 1355%.
	</span>
	
	<div class="menutitle" onclick="SwitchMenu('sub6')"><a href="#"  style="color:#003366" >Do you Credit Score my Payday Loan Application?</a></div>
	<span class="submenu" id="sub6">
	No! We don&#8217;t currently credit score your application when you apply for a payday loan. It means that you&#8217;ll get your loan decision and cash that much Faster!
	</span>
	<div class="menutitle" onclick="SwitchMenu('sub7')"><a href="#" style="color:#003366" >How long will it take to get the cash?</a>	</div>
	<span class="submenu" id="sub7">
	We offer a prompt same-day cash transfer service. Simply apply for your payday loan online by clicking here now</a>. Within a minute we will tell you if you have been approved. Once you are approved, sign your short payday loan agreement online and your payday loan will be completed with your money on its way. The whole payday loan process can take under 6 minutes to complete from start to finish.
	</span>
	
	<div class="menutitle" onclick="SwitchMenu('sub8')"><a href="#" style="color:#003366" >How do I get my money?</a></div>
	<span class="submenu" id="sub8">
	We will transfer your money directly to your designated bank account via same day Priority cash Payment (<span class="caps">CHAPS</span>).
	</span>
	
	<div class="menutitle" onclick="SwitchMenu('sub9')"><a href="#" style="color:#003366" >Do you require additional documents for Payday loan approval?</a></div>
	<span class="submenu" id="sub9">
	No! You don&#8217;t need to fax any documents or cheques to us. We will give you an immediate online decision and the ability to sign for your payday loan conveniently online. The whole payday loan process can take under 6 minutes to complete, allowing us to get some much needed cash to you as soon as possible! 
      </span>
    
	<div class="menutitle" onclick="SwitchMenu('sub10')"><a href="#" style="color:#003366" >I have a poor credit history - will this stop me from getting a loan?</a>	</div>
	<span class="submenu" id="sub10">
	No. However, we&#8217;ll need to be happy that all our customers will have sufficient funds available on payday to cover their payday loan repayment. We will consider each payday loan application based on your recent circumstances.
	</span>
	
	<div class="menutitle" onclick="SwitchMenu('sub11')"><a href="#" style="color:#003366">I'm a tenant - is this a problem?</a></div>
	<span class="submenu" id="sub11">
	No problem at all &#8211; It really makes no difference to us whether you are a tenant or a homeowner. You don&#8217;t require any surety or collateral to get a payday loan.
	</span>
	
	<div class="menutitle" onclick="SwitchMenu('sub12')"><a href="#" style="color:#003366">Will you contact my present or former employers?</a></div>
	<span class="submenu" id="sub12">
	No, we always operate a strict confidentiality policy and truly value your privacy. None of your personal details will be handed over to any third party without your approval or unless necessitated by law.
	</span>
	
<div class="menutitle" onclick="SwitchMenu('sub13')"><a href="#" style="color:#003366">How do I repay my Payday Loan?</a></div>
	<span class="submenu" id="sub13">
	It&#8217;s really easy &#8211; We&#8217;ll debit the agreed repayment amount from your debit card on your next payday. No need to set up costly transfers or visiting the bank.
	</span>
<div class="menutitle" onclick="SwitchMenu('sub14')"><a href="#" style="color:#003366">Can I get an extension on my payday loan?</a> </div>
	<span class="submenu" id="sub14">
	    Yes, you can extend part, or all, of your cash loan easily until the following payday by simply paying the interest-only on the original cash loan amount. This is also known as deferring your loan repayment.
      </span>
    
	<div class="menutitle" onclick="SwitchMenu('sub15')"><a href="#" style="color:#003366" >Can I have two or more Payday Loans at the same time?</a></div>
	
	  <span class="submenu" id="sub15">
	   No. All prior payday advances have to be repaid before another can be offered. We believe in responsible lending and want to ensure you can easily repay what you borrow. 
      </span>
   
	</div>
        