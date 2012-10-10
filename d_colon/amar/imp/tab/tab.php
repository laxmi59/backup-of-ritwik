<link rel="stylesheet" type="text/css" href="tab.css" />

<script type="text/javascript" src="tab.js"></script>

<ul id="countrytabs" class="shadetabs">
<li><a href="#" rel="country1" class="selected">Tab 1</a></li>
<li><a href="#" rel="country2">Tab 2</a></li>
<li><a href="#" rel="country3">Tab 3</a></li>
<li><a href="#" rel="country4">Tab 4</a></li>
<li><a href="http://www.dynamicdrive.com">Dynamic Drive</a></li>
</ul>

<div style="border:1px solid gray; width:450px; margin-bottom: 1em; padding: 10px">

<div id="country1" class="tabcontent">
Tab content 1 here<br />Tab content 1 here<br />
</div>

<div id="country2" class="tabcontent">
Tab content 2 here<br />Tab content 2 here<br />
</div>

<div id="country3" class="tabcontent">
Tab content 3 here<br />Tab content 3 here<br />
</div>

<div id="country4" class="tabcontent">
Tab content 4 here<br />Tab content 4 here<br />
</div>

</div>

<script type="text/javascript">

var countries=new ddtabcontent("countrytabs")
countries.setpersist(true)
countries.setselectedClassTarget("link") //"link" or "linkparent"
countries.init()

</script>

<p><a href="javascript:countries.cycleit('prev')" style="margin-right: 25px; text-decoration:none">Back</a> <a href="javascript: countries.expandit(3)">Click here to select last tab</a> <a href="javascript:countries.cycleit('next')" style="margin-left: 25px; text-decoration:none">Forward</a></p>

<hr />













<!--<h3>Demo #2- Different Tab Style, expanding of arbitrary DIVs on the page enabled</h3>

<div id="flowernote" style="display:none; position:absolute; right: 30px; width:150px; height:150px; background-color:red; color:white">
Arbitrary DIV 1
</div>

<div id="flowernote2" style="display:none; position:absolute; right: 200px; width:80px; height:80px; background-color:black; color:white">
Arbitrary DIV 2
</div>

<div id="flowernote3" style="display:none; position:absolute; right: 30px; width:140px; height:140px; background-color:navy; color:white">
Arbitrary DIV 3
</div>-->


<!--<div style="border:1px solid gray; width:350px; height: 250px; background-color: #EAEAEA; padding: 5px">

<div id="tcontent1" class="tabcontent">
Tab content 1 here<br />Tab content 1 here<br />
</div>

<div id="tcontent2" class="tabcontent">
Tab content 2 here<br />Tab content 2 here<br />
</div>

<div id="tcontent3" class="tabcontent">
Tab content 3 here<br />Tab content 3 here<br />
</div>

<div id="tcontent4" class="tabcontent">
Tab content 4 here<br />Tab content 4 here<br />
</div>

</div>-->

<!--<div id="flowertabs" class="modernbricksmenu2">
<ul>
<li><a href="#" rel="tcontent1" class="selected">Tab 1</a></li>
<li><a href="#" rel="tcontent2" rev="flowernote,flowernote2">Tab 2</a></li>
<li><a href="#" rel="tcontent3">Tab 3</a></li>
<li><a href="#" rel="tcontent4" rev="flowernote3">Tab 4</a></li>
<li><a href="http://www.dynamicdrive.com/dynamicindex17/tabcontent.htm">Tab Content</a></li>
</ul>
</div>-->
<br style="clear: left" />

<script type="text/javascript">

var myflowers=new ddtabcontent("flowertabs")
myflowers.setpersist(true)
myflowers.setselectedClassTarget("link") //"link" or "linkparent"
myflowers.init()

</script>

<!--<p><b><a href="javascript: myflowers.expandit(2)">Click here to select 3rd tab</a></b></p>
<p><b><a href="current.htm?flowertabs=1">Reload page and select 2nd tab using URL parameter</a></b></p>

<hr />-->















<!--<h3>Demo #3- Different Tab Style, "slideshow mode" enabled</h3>

<div id="pettabs" class="indentmenu">
<ul>
<li><a href="#" rel="dog1" class="selected">Tab 1</a></li>
<li><a href="#" rel="dog2">Tab 2</a></li>
<li><a href="#" rel="dog3">Tab 3</a></li>
<li><a href="#" rel="dog4" id="myfavorite">Tab 4</a></li>
<li><a href="http://www.google.com">Google</a></li>
</ul>
<br style="clear: left" />
</div>-->

<!--<div style="border:1px solid gray; width:550px; height: 150px; padding: 5px; margin-bottom:1em">

<div id="dog1" class="tabcontent">
Tab content 1 here<br />Tab content 1 here<br />
<p><b><a href="javascript: mypets.expandit('myfavorite')">Click here to select tab with id="myfavorite"</a></b></p>
</div>

<div id="dog2" class="tabcontent">
Tab content 2 here<br />Tab content 2 here<br />
</div>

<div id="dog3" class="tabcontent">
Tab content 3 here<br />Tab content 3 here<br />
</div>

<div id="dog4" class="tabcontent">
Tab content 4 here<br />Tab content 4 here<br />
</div>

</div>-->


<script type="text/javascript">

var mypets=new ddtabcontent("pettabs")
mypets.setpersist(true)
mypets.setselectedClassTarget("link")
mypets.init(2000)

</script>