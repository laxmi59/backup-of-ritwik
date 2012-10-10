<link rel="stylesheet" type="text/css" media="screen" href="css/jq.css" />
<link rel="stylesheet" type="text/css" media="screen" href="css/cycle.css" />
<style type="text/css">
#nav { margin: 5px; }
#nav a { margin: 5px; padding: 3px 5px; border: 1px solid #ccc; background: #fc0; text-decoration: none }
#nav a.activeSlide { background: #ea0 }
#nav a:focus { outline: none; }
</style>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/chili-1.7.pack.js"></script>
<script type="text/javascript" src="js/jquery.cycle.all.latest.js"></script>

<script type="text/javascript">
$(function() {
    $('#slideshow').cycle({
        speed:       200,
        timeout:     3000,
        pager:      '#nav',
        pagerEvent: 'mouseover',
		pauseOnPagerHover: true,
		before:  onBefore, 
    after:   onAfter ,
    });
});
</script>

<table cellspacing="20"><tbody><tr>
    <td>
		<div id="nav">
		<!--<a class="" href="#"><img src="images/beach1.jpg" height="50" width="50"></a>
			<a class="" href="#"><img src="images/beach2.jpg" height="50" width="50"></a>
			<a class="" href="#"><img src="images/beach3.jpg" height="50" width="50"></a>
			<a class="" href="#"><img src="images/beach4.jpg" height="50" width="50"></a>
			<a class="" href="#"><img src="images/beach5.jpg" height="50" width="50"></a>
			<a class="" href="#"><img src="images/beach6.jpg" height="50" width="50"></a>
			<a class="" href="#"><img src="images/beach7.jpg" height="50" width="50"></a>-->
		</div>
        <div style="position: relative;" id="slideshow" class="pics">
            <img src="images/beach1.jpg" height="200" width="200">
            <img src="images/beach2.jpg" height="200" width="200">
            <img src="images/beach3.jpg" height="200" width="200">
            <img src="images/beach4.jpg" height="200" width="200">
            <img src="images/beach5.jpg" height="200" width="200">
            <img src="images/beach6.jpg" height="200" width="200">
            <img src="images/beach7.jpg" height="200" width="200">
        </div>
    </td></tr>
</tbody></table>
