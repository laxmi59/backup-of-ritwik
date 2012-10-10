<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="This script loads and displays a larger image inline on the page when a thumbnail is clicked on. Great for letting visitors preview from many images then select the image of his choice to view on the same page." />
<meta name="keywords" content="thumbnail viewer" />
<title>Dynamic Drive DHTML Scripts- Step Carousel Viewer</title>

<script type="text/javascript" src="../jquery/jquery-1.2.6.pack.js"></script>

<script type="text/javascript" src="stepcarousel.js">

/***********************************************
* Step Carousel Viewer script- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* Visit http://www.dynamicDrive.com for hundreds of DHTML scripts
* This notice must stay intact for legal use
***********************************************/

</script>

<style type="text/css">

.stepcarousel{
position: relative; /*leave this value alone*/
border: 20px solid orange;
overflow: scroll; /*leave this value alone*/
width: 270px;
height: 200px; /*Height should enough to fit largest content's height*/
}

.stepcarousel .belt{
position: absolute; /*leave this value alone*/
left: 0;
top: 0;
}

.stepcarousel .panel{
float: left; /*leave this value alone*/
overflow: hidden; /*clip content that go outside dimensions of holding panel DIV*/
margin: 10px; /*margin around each panel*/
width: 250px; /*Width of each panel holding each content. If removed, widths should be individually defined on each content DIV then. */
}

#galleryB{
width: 450px;
height: 170px;
border: 10px solid darkred;
}

#galleryB .panel{
height: 150px;
font: bold 28px Arial;
text-align: center;
background-color: green;
color: white;
}

p.samplebuttons{
width: 300px;
text-align: center;
}

p.samplebuttons a{
color: #2e6ab1;
padding: 1px 2px;
margin-right: 3px;
text-decoration: none;
}

</style>


<link rel="stylesheet" type="text/css" href="../ddincludes/mainstyle.css" />

</head>

<body>

<div id="toprightdiv">


<center><script type="text/javascript" src="http://www.dynamicdrive.com/ddincludes/adbanner.js"></script></center>



<table id="maintable" border="0" width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td id="leftbar" valign="top">
			



<div style="text-align:center">

<script type="text/javascript">
Vertical1437 = false;
ShowAdHereBanner1437 = false;
RepeatAll1437 = false;
NoFollowAll1437 = false;
BannerStyles1437 = new Array(
	"a{display:block;font-size:11px;color:#888;font-family:verdana,sans-serif;margin:0 4px 10px 0;text-align:center;text-decoration:none;overflow:hidden;}",
	"img{border:0;clear:right;}",
	"a.adhere{color:#666;font-weight:bold;font-size:12px;border:1px solid #ccc;background:#e7e7e7;text-align:center;}",
	"a.adhere:hover{border:1px solid #999;background:#ddd;color:#333;}"
);

document.write(unescape("%3Cscript src='"+document.location.protocol+"//s3.buysellads.com/1437/1437.js?v="+Date.parse(new Date())+"' type='text/javascript'%3E%3C/script%3E"));
</script>

</div>
	
		
    




<p align="center">
<!-- AddThis Button BEGIN -->
<script type="text/javascript">addthis_pub  = 'georgeuser';</script>

</script>
<!-- AddThis Button END -->
</p>



    </td>
    <td id="spacertd">
<img src="../spacer.gif" id="spacergif">
    </td>
    <td valign="top" id="contentarea">
    

<script type="text/javascript">
if (showincontentheader)
document.write('<div id="topbanner" align="left">'+revised_ranban[ran_num]+'</div>')
</script>
     
<p align="left"><!--webbot bot="HTMLMarkup" startspan --><script type="text/javascript">

stepcarousel.setup({
	galleryid: 'mygallerylong', //id of carousel DIV
	beltclass: 'belt', //class of inner "belt" DIV containing all the panel DIVs
	panelclass: 'panel', //class of panel DIVs each holding content
	autostep: {enable:true, moveby:1, pause:3000},
	panelbehavior: {speed:300, wraparound:false, persist:true},
	defaultbuttons: {enable: true, moveby: 1, leftnav: ['arrowl.gif', -10, 100], rightnav: ['arrowr.gif', -10, 100]},
	statusvars: ['statusAlong', 'statusBlong', 'statusClong'], //register 3 variables that contain current panel (start), current panel (last), and total panels
	contenttype: ['inline'] //content setting ['inline'] or ['external', 'path_to_external_file']
})


</script>

<div id="mygallerylong" class="stepcarousel" style="width: 540px">
<div class="belt">

<div class="panel">
<img src="fruits.jpg" /><br />
</div>

<div class="panel">
<img src="cave.jpg" />
</div>

<div class="panel">
<img src="pool.jpg" />
</div>

<div class="panel">
<img src="autumn.jpg" />
</div>

<div class="panel">
<img src="dog.jpg" />
</div>

</div>
</div>

<p>
<b>Showing panels <span id="statusAlong" style="color:red"></span> to <span id="statusBlong" style="color:red"></span></b>
</p><!--webbot bot="HTMLMarkup" endspan i-checksum="62562" --></p>

<p align="left"><strong>Demo #2: Wrap around disabled, left/right nav buttons 
enabled.</strong></p>
    <table border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="400"><!--webbot bot="HTMLMarkup" startspan --><script type="text/javascript">

stepcarousel.setup({
	galleryid: 'mygallery', //id of carousel DIV
	beltclass: 'belt', //class of inner "belt" DIV containing all the panel DIVs
	panelclass: 'panel', //class of panel DIVs each holding content
	panelbehavior: {speed:500, wraparound:false, persist:false},
	defaultbuttons: {enable: true, moveby: 1, leftnav: ['leftnav.gif', -5, 80], rightnav: ['rightnav.gif', -18, 80]},
	statusvars: ['statusA', 'statusB', 'statusC'], //register 3 variables that contain current panel (start), current panel (last), and total panels
	contenttype: ['inline'] //content setting ['inline'] or ['external', 'path_to_external_file']
})

</script>


<div id="mygallery" class="stepcarousel" style="border-width: 10px; border-color:black">
<div class="belt">

<div class="panel">
<img src="fruits.jpg" /><br />
</div>

<div class="panel">
<img src="cave.jpg" />
</div>

<div class="panel">
<img src="pool.jpg" />
</div>

<div class="panel">
<img src="autumn.jpg" />
</div>

<div class="panel">
<img src="dog.jpg" />
</div>

</div>
</div>

<p class="samplebuttons">

<b>Current Panel:</b> <span id="statusA"></span> <b style="margin-left: 30px">Total Panels:</b> <span id="statusC"></span>

</p><!--webbot bot="HTMLMarkup" endspan i-checksum="60175" --></td>
			<td><!--webbot bot="HTMLMarkup" startspan --><p class="samplebuttons">

<a href="javascript:stepcarousel.stepBy('mygallery', -1)">Back 1 Panel</a> <a href="javascript:stepcarousel.stepBy('mygallery', 1)" style="margin-left: 80px">Forward 1 Panel</a> <br />

<a href="javascript:stepcarousel.stepTo('mygallery', 1)">To 1st Panel</a> <a href="javascript:stepcarousel.stepBy('mygallery', 2)" style="margin-left: 80px">Forward 2 Panels</a>

</p><!--webbot bot="HTMLMarkup" endspan i-checksum="8150" --></td>
		</tr>
</table>
<p align="left"><strong>Demo #3: Variable content widths, left/right nav buttons 
disabled, moves 2 panels at a time.</strong></p>
<p align="left"><!--webbot bot="HTMLMarkup" startspan --><script type="text/javascript">

stepcarousel.setup({
	galleryid: 'galleryB', //id of carousel DIV
	beltclass: 'belt', //class of inner "belt" DIV containing all the panel DIVs
	panelclass: 'panel', //class of panel DIVs each holding content
	panelbehavior: {speed:500, wraparound:true, persist:false},
	defaultbuttons: {enable: false, moveby: 1, leftnav: ['arrowl.gif', -10, 100], rightnav: ['arrowr.gif', -10, 100]},
	statusvars: ['reportA', 'reportB', 'reportC'],
	contenttype: ['inline'] //content setting ['inline'] or ['external', 'path_to_external_file']
})

</script>

<div id="galleryB" class="stepcarousel">
<div class="belt">

<div class="panel" style="width: 100px">
1
</div>

<div class="panel"  style="width: 150px">
2
</div>

<div class="panel"  style="width: 130px">
3
</div>

<div class="panel"  style="width: 180px">
4
</div>

<div class="panel"  style="width: 100px">
5
</div>

<div class="panel"  style="width: 120px">
6
</div>

<div class="panel"  style="width: 180px">
7
</div>

</div>
</div>

<div style="margin-top: 1em; width:460px">
<div style="float: right; width: 200px; text-align:right; margin-top: -5px"><a href="javascript:stepcarousel.stepBy('galleryB', -2)">Back</a> <a href="javascript:stepcarousel.stepBy('galleryB', 2)" style="margin-left: 20px">Forward</a></div><b>Currently showing  panels:</b> <span id="reportA"></span> to <span id="reportB"></span>

</div><!--webbot bot="HTMLMarkup" endspan i-checksum="51347" --></p>
    <hr style="clear:both" size="1">
    <p align="left"><strong>Directions </strong>
    <a target="win2" href="stepcarousel_dev.htm"><img src="../dview.gif" width="115" height="19"
    alt="Developer's View" border="0"></a></p>
    <p align="left"><strong>Step 1: </strong>Add the following 
    script to
    the &lt;head&gt; section of your page:</p>
    <form><p>

<a class="selectall" href="javascript:highlight(1)">Select All</a><br>
      <textarea class="codecontainer" rows="8" name="S2" cols="45" wrap="virtual"><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<script type="text/javascript" src="jquery-1.2.6.pack.js"></script>

<script type="text/javascript" src="stepcarousel.js">

/***********************************************
* Step Carousel Viewer script- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* Visit http://www.dynamicDrive.com for hundreds of DHTML scripts
* This notice must stay intact for legal use
***********************************************/

</script>

<style type="text/css">

.stepcarousel{
position: relative; /*leave this value alone*/
border: 10px solid black;
overflow: scroll; /*leave this value alone*/
width: 270px; /*Width of Carousel Viewer itself*/
height: 200px; /*Height should enough to fit largest content's height*/
}

.stepcarousel .belt{
position: absolute; /*leave this value alone*/
left: 0;
top: 0;
}

.stepcarousel .panel{
float: left; /*leave this value alone*/
overflow: hidden; /*clip content that go outside dimensions of holding panel DIV*/
margin: 10px; /*margin around each panel*/
width: 250px; /*Width of each panel holding each content. If removed, widths should be individually defined on each content DIV then. */
}

</style></textarea></p>
    </form>
      <p align="left">The code above references two external .js files, which 
		you need to download below (right click/ select &quot;Save As&quot;):</p>
<ol>
  <li><a href="stepcarousel.js">stepcarousel.js</a> (2 variables near the top 
	you can customize)</li>

	<li><a href="../jquery/jquery-1.2.6.pack.js">jquery-1.2.6.pack.js</a></li>
</ol>
    <p align="left"><strong>Step 2: </strong>Add the following HTML to the 
	&lt;BODY&gt; of your page, which corresponds to the HTML for the first demo you 
	see above:</p>
    <form>
      <p><a class="selectall" href="javascript:highlight(2)">Select All</a><br>
      <textarea class="codecontainer" rows="8" name="S1" cols="45" wrap="virtual"><script type="text/javascript">

stepcarousel.setup({
	galleryid: 'mygallery', //id of carousel DIV
	beltclass: 'belt', //class of inner "belt" DIV containing all the panel DIVs
	panelclass: 'panel', //class of panel DIVs each holding content
	autostep: {enable:true, moveby:1, pause:3000},
	panelbehavior: {speed:500, wraparound:false, persist:true},
	defaultbuttons: {enable: true, moveby: 1, leftnav: ['http://i34.tinypic.com/317e0s5.gif', -5, 80], rightnav: ['http://i38.tinypic.com/33o7di8.gif', -20, 80]},
	statusvars: ['statusA', 'statusB', 'statusC'], //register 3 variables that contain current panel (start), current panel (last), and total panels
	contenttype: ['inline'] //content setting ['inline'] or ['external', 'path_to_external_file']
})

</script>

<div id="mygallery" class="stepcarousel">
<div class="belt">

<div class="panel">
<img src="http://i30.tinypic.com/531q3n.jpg" />
</div>

<div class="panel">
<img src="http://i29.tinypic.com/xp3hns.jpg" />
</div>

<div class="panel">
<img src="http://i26.tinypic.com/11l7ls0.jpg" />
</div>

<div class="panel">
<img src="http://i31.tinypic.com/119w28m.jpg" />
</div>

<div class="panel">
<img src="http://i27.tinypic.com/34fcrxz.jpg" />
</div>

</div>
</div>

<p>
<b>Current Panel:</b> <span id="statusA"></span> <b style="margin-left: 30px">Total Panels:</b> <span id="statusC"></span><br />

<a href="javascript:stepcarousel.stepBy('mygallery', -1)">Back 1 Panel</a> <a href="javascript:stepcarousel.stepBy('mygallery', 1)" style="margin-left: 80px">Forward 1 Panel</a> <br />

<a href="javascript:stepcarousel.stepTo('mygallery', 1)">To 1st Panel</a> <a href="javascript:stepcarousel.stepBy('mygallery', 2)" style="margin-left: 80px">Forward 2 Panels</a>

</p></textarea></p>

    </form>
      <p align="left">That's it for installation, but this script is only as 
		good as your understanding of it, so time for some documentation.</p>
<h3 align="left"><u>Basic Set Up Information</u></h3>
<p align="left">The HTML for a Step Carousel viewer follows a set 
structure consisting of 3 levels of nested DIVs- the main &quot;<b>carousel</b>&quot; DIV, 
an inner &quot;<b>belt</b>&quot; DIV, finally followed by &quot;<b>panel</b>&quot; DIVs that each hold 
some actual content:</p>

<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <tr>
    <td valign="top" width="50%"><b>Sample Step Carousel HTML:</b><p class="codehighlight">
	&lt;div id=&quot;<font color="#FF0000">mygallery</font>&quot; class=&quot;<font color="#FF0000">stepcarousel</font>&quot;&gt;<br>
	&lt;div class=&quot;<font color="#FF0000">belt</font>&quot;&gt;<br>

	<br>
	&lt;div class=&quot;<font color="#FF0000">panel</font>&quot;&gt;<br>
	Panel 1 content here...<br>
	&lt;/div&gt;<br>
	<br>
	&lt;div class=&quot;<font color="#FF0000">panel</font>&quot;&gt;<br>

	Panel 2 content here...<br>
	&lt;/div&gt;<br>
	<br>
	&lt;div class=&quot;<font color="#FF0000">panel</font>&quot;&gt;<br>
	Panel 3 content here...<br>
	&lt;/div&gt;<br>

	<br>
	&lt;/div&gt;<br>
	&lt;/div&gt;</td>
    <td valign="top" width="2%">&nbsp;</td>
    <td valign="top" width="48%">
    <b>Visual interpretation:</b>
    
    </p><div style="border: 1px solid black; padding: 10px; background: rgb(212, 201, 255); width: 300px;">

<p><b>Carousel DIV</b></p>
<div style="border: 1px solid black; padding: 5px; background: rgb(255, 214, 112); height: 100%;">
<p><b>Belt DIV </b></p>
<div style="border: 1px solid black; padding: 5px; background: yellow; margin-bottom: 8px">
	Panel DIV 1</div>
<div style="border: 1px solid black; padding: 5px; background: yellow; margin-bottom: 8px">
	Panel DIV 2</div>
<div style="border: 1px solid black; padding: 5px; background: yellow; margin-bottom: 8px">
	Panel DIV 3</div>

<div style="border: 1px solid black; padding: 5px; background: yellow; margin-bottom: 8px">
	Panel DIV 4 etc...</div>
</div>
</div>
	</td>
  </tr>
  </table>
    <p align="left">All the IDs and class names (in red above) can be arbitrary 
	in their values, but must be defined for the script to know what's what. 
	Each piece of content you wish to show would then be wrapped around its own &quot;<b>panel</b>&quot; 
	DIV (in yellow), whether it's just an image, or rich HTML etc.</p>

<p align="left">Moving on, we come to the sample HTML for the buttons/ links 
used to navigate a Step Carousel Viewer.</p>
<p align="left"><b>Sample HTML for Carousel Viewer navigation:</b></p>
<p class="codehighlight" align="left">&lt;p class=&quot;samplebuttons&quot;&gt;<br>
&lt;a href=&quot;javascript:<font color="#FF0000">stepcarousel.stepBy('mygallery', -1)</font>&quot;&gt;Back 
1 Panel&lt;/a&gt; &lt;a href=&quot;javascript:<font color="#FF0000">stepcarousel.stepBy('mygallery', 
1)</font>&quot; style=&quot;margin-left: 80px&quot;&gt;Forward 1 Panel&lt;/a&gt; &lt;br /&gt;<br>

<br>
&lt;a href=&quot;javascript:<font color="#FF0000">stepcarousel.stepTo('mygallery', 1)</font>&quot;&gt;To 
1st Panel&lt;/a&gt; &lt;a href=&quot;javascript:<font color="#FF0000">stepcarousel.stepBy('mygallery', 
2)</font>&quot; style=&quot;margin-left: 80px&quot;&gt;Forward 2 Panels&lt;/a&gt;<br>
&lt;/p&gt;</p>

<p>Simply call the two methods <code><a href="#navchart">stepBy()</a></code> or
<code><a href="#navchart">stepTo()</a></code> using the ID of your Carousel 
Viewer plus how much to move by anywhere on your page.</p>
<p align="left">Last but certainly not least, the initialization script and CSS in the HEAD of your 
page is what will transform the HTML into a Step Carousel Viewer:</p>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <tr>
    <td valign="top" width="50%"><b>Sample Step Carousel invocation code</b><p class="codehighlight">
	&lt;script type=&quot;text/javascript&quot;&gt;<br>

	<br>
	stepcarousel.setup({<br>
	galleryid: '<font color="#FF0000">mygallery</font>', //id of carousel DIV<br>
	beltclass: '<font color="#FF0000">belt</font>', //class of inner &quot;belt&quot; DIV 
	containing all the panel DIVs<br>

	panelclass: '<font color="#FF0000">panel</font>', //class of panel DIVs each 
	holding content<br>
	panelbehavior: {speed:300, wraparound:false, persist:true},<br>
	defaultbuttons: {enable: true, moveby: 1, leftnav: ['arrowl.gif', -10, 100], 
	rightnav: ['arrowr.gif', -10, 100]},<br>
	statusvars: ['statusA', 'statusB', 'statusC'], // Register 3 &quot;status&quot; 
	variables<br>

	contenttype: ['inline'] // content type <b>&lt;--No comma following the very 
	last parameter, always!</b><br>
	})<br>
	<br>
	&lt;/script&gt;</td>
    <td valign="top" width="2%">&nbsp;</td>
    <td valign="top" width="48%">
    <b>Sample Step Carousel CSS:</b><p class="codehighlight">&lt;style 
	type=&quot;text/css&quot;&gt;<br>

	<br>
	.stepcarousel{<br>
	position: relative; /*leave this value alone*/<br>
	border: 20px solid navy;<br>
	overflow: scroll; /*leave this value alone*/<br>
	width: 280px;<br>

	height: 200px; /*Height should enough to fit largest content's height*/<br>
	}<br>
	<br>
	.stepcarousel .belt{<br>
	position: absolute; /*leave this value alone*/<br>
	left: 0;<br>

	top: 0;<br>
	}<br>
	<br>
	.stepcarousel .panel{<br>
	float: left; /*leave this value alone*/<br>
	overflow: hidden; /*clip content that go outside dimensions of holding panel 
	DIV*/<br>

	margin: 15px; /*margin around each panel*/<br>
	<font color="#FF0000">width: 250px;</font> /*Width of each panel holding each content. If removed, widths 
	should be individually defined on each content DIV then. */<br>
	}<br>
	<br>
	&lt;/style&gt;</td>
  </tr>

  </table>
    <p align="left">For the invocation code on your left, notice the first 3 
	parameters and their values in red, which should match up with the CSS class 
	names you assigned to the DIVs in the HTML. The code supports other 
	parameters, which we'll cover in detail later. On to the CSS code on your 
	right, the 3 levels of DIVs- &quot;<b>carousel</b>&quot;, 
	&quot;<b>belt</b>&quot;, and &quot;<b>panel</b>&quot; DIVs can be styled however you 
	wish, but take note of the sideline comments on which ones should be 
	left alone or treated with care. In particular, the &quot;<code>width</code>&quot; 
	property in red deserves special attention:</p>
<p class="codehighlight" align="left"><font color="#FF0000">width: 250px;</font> /*Width of each panel holding each content. If removed, widths 
	should be individually defined on each content DIV then. */<br>

	}</p>
<p align="left">This property sets the width of each &quot;<b>panel</b>&quot; DIV (the 
ones in yellow visually above), and is required in the sense that the script 
needs to know in advanced the width of each panel. In the simplistic scenerio 
where all your panels can be the same width, you'd simply set the above 
property to the desired value and that's that. However, in the more common 
scenerio where your panels should be of differing widths, there's another way 
to set their widths that's flexible. See &quot;<b><a href="stepcarousel_suppliment.htm">Two ways to set panel 
widths</a></b>&quot; for more information.</p>
<h4 align="left">Available <code>stepcarousel.setup()</code> parameters</h4>
<p align="left">The initialization code supports several parameters, although only 
the first three are required. Here they are in full force:</p>

<table cellSpacing="0" cellpadding="3" border="1" width="98%">
	<tr vAlign="top">
		<th width="35%" bgcolor="#D8EA99">Parameter</th>
		<th width="65%" bgcolor="#D8EA99">Description</th>
	</tr>
	<tr vAlign="top">
		<td width="35%"><code>galleryid: &quot;galleryid&quot;</code><p><b><i>Required</i></b></td>

		<td width="65%">Set this parameter to the ID attribute value of the 
		outermost Carousel DIV.</td>
	</tr>
	<tr vAlign="top">
		<td width="35%"><code>beltclass: &quot;belt_div_class&quot;</code><p><b><i>Required</i></b></td>
		<td width="65%">Set this parameter to the CSS class of the main inner 
		DIV that contains all the &quot;panel&quot; DIVs.</td>

	</tr>
	<tr vAlign="top">
		<td width="35%"><code>panelclass: &quot;panel_divs_class&quot;</code><p><b><i>Required</i></b></td>
		<td width="65%">Set this parameter to the shared CSS class of each 
		&quot;panel&quot; DIV within the Carousel, which contains the actual contents.<p>
		Each panel DIV must have a width defined, either via global CSS or 
		inline CSS, in order for the script to work properly! See &quot;<b><a href="stepcarousel_suppliment.htm">Two ways to set panel 
widths</a></b>&quot; for more information.</td>

	</tr>
	<tr vAlign="top">
		<td width="35%"><code>autostep: {enable:true, moveby:1, pause:3000}</code><p>
		<font color="#FF0000"><i><b>v1.6 parameter</b></i></font></td>
		<td width="65%">Set this parameter to auto rotate the panels, specifying 
		the number of panels to move each time, and pause between rotating. Note 
		that during auto rotation, moving the mouse over the Carousel or the 
		default buttons (if enabled) pauses it, while moving your mouse out 
		resumes it again. Clicking on the Carousel stops auto rotation 
		altogether. This parameter has 3 properties:<ol>
			<li><code>enable</code>: Boolean (true/ false) setting on whether to 
			enable auto rotation.</li>

			<li><code>moveby</code>: Number of panels to move by each time. 
			Negative number moves panels backwards instead.</li>
			<li><code>pause</code>: Pause between rotation in milliseconds.</li>
		</ol>
		<p>Note that if <code>autostep</code> is enabled, this automatically 
		sets &quot;<code>panelbehavior.wraparound:true</code>&quot; as well.</td>

	</tr>
	<tr vAlign="top">
		<td width="35%"><code>panelbehavior: {speed:300, wraparound:false, 
		persist:true}</code><p><b><i>Required</i></b></td>
		<td width="65%">This parameter has 3 properties:<ol>
			<li><code>speed</code>: Sets the duration of the slide animation, in 
			milliseconds. Lower=faster.</li>
			<li><code>wraparound</code>: Boolean (true/ false) setting that sets 
			whether the panels should wrap after reaching the two ends, or stop 
			at the first/last panel.</li>

			<li><code>persist</code>: Boolean (true/ false) setting on whether 
			the last panel viewed within a browser session should be remembered 
			and recalled upon the visitor's return.</li>
		</ol>
		</td>
	</tr>
	<tr vAlign="top">
		<td width="35%"><code>defaultbuttons: {enable: true, moveby: 1, leftnav: 
		['arrowl.gif', -10, 100], rightnav: ['arrowr.gif', -10, 100]}</code><p><b><i>Required</i></b></td>
		<td width="65%">This parameter lets you enable/ disable two navigational 
		images that are auto positioned to the left and right of the Carousel 
		Viewer. You can further tweak each image's offsets from its default 
		position. This parameter has 4 properties:<ol>

			<li><code>enable</code>: Boolean (true/ false) setting on whether to 
			enable the two navigational images.</li>
			<li><code>moveby</code>: Sets how many panels the Carousel should 
			move by in either directions when the navigational buttons are 
			clicked on (<b>1</b>=foward 1 panel, <b>-1</b>=back 1 panel etc).</li>
			<li><code>leftnav</code>: An array containing the path to the left 
			navigational image, plus any additional x and y offsets from its 
			default location on the page (upper left corner of Carousel Viewer). 
			For example: <code>['arrowl.gif', -10, 100]</code></li>

			<li><code>rightnav</code>: An array containing the path to the right 
			navigational image, plus any additional x and y offsets from its 
			default location on the page (upper right corner of Carousel 
			Viewer). For example: <code>['arrowr.gif', -10, 100]</code></li>
		</ol>
		</td>
	</tr>
	<tr vAlign="top">
		<td width="35%"><code>statusvars: [&quot;var1&quot;, &quot;var2&quot;, &quot;var3&quot;]</code></td>

		<td width="65%">Optional parameter that lets you define 3 arbitrary but
		<b>unique</b> variable names to be used to store the currently shown 
		panel (starting), currently shown panel (final), and finally, the total 
		number of panels in this Carousel.<p>With the 3 variable names defined, 
		you can also add 3 HTML elements on your page with the same 3 ID 
		values that the script will use to show this information to your visitors.</p>
		<p>See &quot;<b><a href="stepcarousel_suppliment2.htm">Status Variables- 
		&quot;status1&quot;, &quot;status2&quot;, and &quot;status3</a></b>&quot; for full 
		details.</td>

	</tr>
	<tr vAlign="top">
		<td width="35%"><code>contenttype: [contenttype, [filepath]]</code></td>
		<td width="65%">Optional parameter that lets you specify where your 
		&quot;panel&quot; DIVs and the actual contents are located.. Defaults to &quot;<code>inline</code>&quot; 
		which means they exist physically on the page (nested inside the main 
		&quot;Carousel&quot; and &quot;belt&quot; DIVs.<p>You can move all the panel DIVs to an 
		external file, and use <font color="#FF0000"><b>Ajax</b></font> to dynamically fetch them instead. In this 
		case, set the 1st parameter to &quot;<code>ajax</code>&quot;, and the 2nd to 
		the full path to where the external file is located:</p>

		<p class="codehighlight"><b>contenttype: [&quot;ajax&quot;, &quot;somefile.htm&quot;]</b></p>
		<p>When specifying an external content source, you can now empty all the 
		panel DIVs on your page itself, and move that to the external file:</p>
		<p class="codehighlight">&lt;div id=&quot;<font color="#FF0000">mygallery</font>&quot; class=&quot;<font color="#FF0000">stepcarousel</font>&quot;&gt;<br>

	&lt;div class=&quot;<font color="#FF0000">belt</font>&quot;&gt;<br>
		<br>
		//All panel DIVs removed!<br>
	<br>
	&lt;/div&gt;<br>
	&lt;/div&gt;</p>

		<p><b>somefile.htm</b> should now contain:</p>
		<p class="codehighlight">&lt;div class=&quot;<font color="#FF0000">panel</font>&quot;&gt;<br>
	Panel 1 content here...<br>
	&lt;/div&gt;<br>
	<br>

	&lt;div class=&quot;<font color="#FF0000">panel</font>&quot;&gt;<br>
	Panel 2 content here...<br>
	&lt;/div&gt;<br>
	<br>
	&lt;div class=&quot;<font color="#FF0000">panel</font>&quot;&gt;<br>
	Panel 3 content here...<br>

	&lt;/div&gt;</td>
	</tr>
	<tr vAlign="top">
		<td width="35%"><code>oninit:function(){<br>
&nbsp;//custom code here<br>
		}</code></td>
		<td width="65%">Optional event handler that fires <b>once</b> as soon as 
		a Carousel has finished initializing and is ready for user interaction. 
		You can use this to run tasks that depend on the Carousel having 
		finished loading:<p class="codehighlight">

		oninit:function(){<br>
&nbsp;alert(&quot;Carousel Viewer has finished loading!&quot;)<br>
&nbsp;isloaded=true<br>
		}</td>
	</tr>
	<tr vAlign="top">
		<td width="35%"><code>onslide:function(){<br>

&nbsp;//custom code here<br>
		}</code></td>
		<td width="65%">Optional event handler that fires 
		whenever the Carousel slides and completes going to a panel (such as 
		after calling <code>stepTo()</code> and <code>stepBy()</code>). It's 
		also fired 1 time when the Carousel has finished loading(similar to
		<code>oninit()</code>). Typically used in combination with the status 
		variables (assuming you've defined them) to access the index number of 
		the currently shown panels in your own scripts. For example, the below 
		example uses the <code>onslide()</code> event handler plus the status 
		variables to show in the browser's status bar which panels are currently 
		being shown:<p class="codehighlight">statusvars: [&quot;startA&quot;, &quot;startB&quot;, 
		&quot;total&quot;],<br>

		onslide:function(){<br>
&nbsp;window.status=&quot;Currently showing panels &quot;+startA+&quot; through &quot;+startB<br>
		}</td>
	</tr>
	<tr vAlign="top">

		<td width="35%"><code>onpanelclick:function(target){<br>
&nbsp;//custom code here.<br>
		}</code></td>
		<td width="65%">Optional event handler that fires whenever user clicks on one of the panels. A 
		<code>target</code> parameter that 
		contains the currently clicked on element (not necessarily the panel 
		itself!) is automatically passed to your code. Using it, for example, 
		you can easily have images within the Carousel pop up again in a new 
		window when clicked on:<p class="codehighlight">
		onpanelclick:function(target){<br>

&nbsp;if (target.tagName==&quot;IMG&quot;) //if clicked on element is an image<br>
&nbsp; window.open(target.src, &quot;&quot;, &quot;width=900px, height=800px&quot;)<br>
		}</p>
		<p>&nbsp;</p>
		<p>See &quot;<b><a href="stepcarousel_suppliment3.htm">oninit(), 
		onslide() and onpanelclick() event handlers</a></b>&quot; for full 
		details.</td>

	</tr>
	</table>

<p align="left">Remember, all but the first 3 parameters above are optional 
depending on what features you need to use.</p>
<h4 align="left"><a name="navchart"></a>Public Navigation Methods</h4>
<p align="left">We haven't talked yet about how to add links on your page to 
navigate the panels within a Carousel Viewer. This is done by calling two public 
methods of the script:</p>
<table cellSpacing="0" cellpadding="3" border="1" width="98%">
	<tr vAlign="top">
		<th width="35%" bgcolor="#D8EA99">Public Method</th>

		<th width="65%" bgcolor="#D8EA99">Description</th>
	</tr>
	<tr vAlign="top">
		<td width="35%"><code>stepcarousel.stepBy('galleryid', steps)<br>
&nbsp;</code></td>
		<td width="65%">Increments a Carousel Viewer by x number of panels when 
		invoked. The first parameter should be the ID of the Carousel Viewer 
		itself, while the second an integer (1 or greater) indicating the number 
		of panels you wish to step by. For example:<p class="codehighlight">&lt;a 
		href=&quot;javascript:stepcarousel.stepBy('mygallery', 1)&quot;&gt;Forward 1 
		panel&lt;/a&gt;<br>

		<br>
		&lt;a 
		href=&quot;javascript:stepcarousel.stepBy('mygallery', -1)&quot;&gt;Back 1 
		panel&lt;/a&gt;<br>
		<br>
		&lt;a href=&quot;javascript:stepcarousel.stepBy('mygallery', 2)&quot;&gt;Forward 2 
		panels&lt;/a&gt;</p>
		<p></td>

	</tr>
	<tr vAlign="top">
		<td width="35%"><code>stepcarousel.stepTo('galleryid', index)</code></td>
		<td width="65%">Moves to a specific panel within a Carousel Viewer (<b>count 
		starts at 1</b>). The first parameter should be the ID of the Carousel 
		Viewer itself, while the second an integer (1 or greater) specifying the 
		panel number to move to:<p class="codehighlight">&lt;a 
		href=&quot;javascript:stepcarousel.stepTo('mygallery', 1)&quot;&gt;Move to very first 
		panel&lt;/a&gt;<br>
		<br>

		&lt;a href=&quot;javascript:stepcarousel.stepTo('mygallery', 3)&quot;&gt;Move to 3rd 
		panel&lt;/a&gt;</p>
		<p></td>
	</tr>
	</table>

<h1 class="navselectheader">Table Of Contents</h1>
<p>This script consists of an index page plus 4 supplementary pages:</p>

<ul class="navselectlist">
	<li>Script Index Page</li>
	<li><a href="stepcarousel_suppliment.htm">Two ways to set panel widths</a></li>
	<li><a href="stepcarousel_suppliment2.htm">Status Variables- &quot;status1&quot;, 
	&quot;status2&quot;, and &quot;status3&quot;</a></li>
	<li><a href="stepcarousel_suppliment3.htm">oninit(), onslide() and 
	onpanelclick() event handlers</a></li>

	<li><a href="stepcarousel_suppliment4.htm">Integrating an Image Viewer such as 
Facebox with Carousel Viewer</a></li>
	</ul>
    <script type="text/javascript"><!--
google_ad_client = "pub-3356683755662088";
google_alternate_color = "FFFFCC";
google_ad_width = 468;
google_ad_height = 60;
google_ad_format = "468x60_as";
google_ad_type = "text";
google_ad_channel = "";
google_color_border = "FFFFFF";
google_color_bg = "FFFFFF";
google_color_link = "0000CC";
google_color_text = "000033";
google_color_url = "999999";
//-->
</script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></td>
  </tr>
</table>


<p id="footer">Copyright © 1998-2008 <a href="http://www.dynamicdrive.com">

Dynamic Drive.</a> Please read <a href="http://dynamicdrive.com/notice.htm">Terms Of Use here</a> before using any of the scripts.</p>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-55377-2");
pageTracker._initData();
pageTracker._trackPageview();
</script>


</body>

</html>