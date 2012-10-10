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
		
    });
});
</script>
<div id="main">
	<div id="demos">
    <table cellspacing="20">
    <tr><td>
		<div id="nav"></div>
        <div id="slideshow">
            <div>
                <img src="http://cloud.github.com/downloads/malsup/cycle/beach1.jpg" width="200" height="200" />
                <p>St Andrews State Park - Panama City, FL</p>
                <p>This park is one of the most popular outdoor recreation spots 
                in Florida.
                </p>
            </div>
            <div>
                <img src="http://cloud.github.com/downloads/malsup/cycle/beach2.jpg" width="200" height="200" />
                <p>Located in the Florida panhandle, the 1,260 acre park is situated on a scenic peninsula 
                and is well known for its sugar white sands and brilliant blue water.
                </p>
            </div>
            <div>
                <img src="http://cloud.github.com/downloads/malsup/cycle/beach3.jpg" width="200" height="200" />
                <p>The ocean provides opportunity for endless fun.  From boogie boarding to snorkeling
                to  swimming and boating, there is always something to do.</p>
            </div>
        </div>
       

    </td></tr>        

    </table>

</div>



</div>

</div>


