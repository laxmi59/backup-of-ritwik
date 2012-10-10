<link rel="stylesheet" type="text/css" media="screen" href="css/jq.css" />
<link rel="stylesheet" type="text/css" media="screen" href="css/cycle.css" />
<style type="text/css">
#slideshow { left: 20px }
#nav { width: 300px; margin: 15px }
#nav li { width: 50px; float: left; margin: 8px; list-style: none }
#nav a { width: 50px; padding: 3px; display: block; border: 1px solid #ccc; }
#nav li.activeSlide a { background: #88f }
#nav a:focus { outline: none; }
#nav img { border: none; display: block }
</style>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/chili-1.7.pack.js"></script>
<script type="text/javascript" src="js/jquery.cycle.all.latest.js"></script>
<script type="text/javascript" src="http://malsup.github.com/jquery.easing.1.3.js"></script>

<script type="text/javascript">
$(function() {
$('#slideshow').before('<ul id="nav">').cycle({ 
	//before:  onBefore, 
    after:   onAfter,
	speed:       200,
	timeout:     3000,
	pagerEvent: 'mouseover',
	pauseOnPagerHover: true,
    
    speed:  'fast', 
    pager:  '#nav', 
    // callback fn that creates a thumbnail to use as pager anchor 
    pagerAnchorBuilder: function(idx, slide) { 
        return '<li><a href="#"><img src="' + slide.src + '" width="50" height="50" /></a></li>'; 
    } 
});
});
/*function onBefore() { 
    $('#output').html("Scrolling image:<br>" + this.title +" "+ this.src); 
} */
function onAfter() { 
    $('#output').html("<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>Scroll complete for:<br>" + this.title +" "+ this.src) 
        .append('<h3>' + this.alt + '</h3>'); 
}
</script>
<div id="main">
	<div id="demos">
    <table width="500" >
    <tr><td>
		<div id="slideshow" class="pics">
                <img src="images/beach1.jpg" title="test1" height="200" width="200">
                <img src="images/beach2.jpg" title="test2" height="200" width="200">
   		        <img src="images/beach3.jpg" title="test3" height="200" width="200">
        </div>
    </td>
	<td valign="middle"><div id="output">Status area</div></td>
	</tr>        
    </table>
</div>
</div>
