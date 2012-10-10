<script type="text/javascript" src="auto/jquery-1.2.6.pack.js"></script>
<script type="text/javascript" src="auto/simplegallery.js"></script>
<script type="text/javascript">
var mygallery=new simpleGallery({
	wrapperid: "simplegallery1", //ID of main gallery container,
	dimensions: [450, 180], //width/height of gallery in pixels. Should reflect dimensions of the images exactly
	imagearray: [
		["http://i26.tinypic.com/11l7ls0.jpg", "http://en.wikipedia.org/wiki/Swimming_pool", "_new", "<b>There's nothing</b> like a nice swim in the Summer."],
		["http://i29.tinypic.com/xp3hns.jpg", "http://en.wikipedia.org/wiki/Cave", "", "There's nothing like a nice swim in the Summer."],
		["http://i30.tinypic.com/531q3n.jpg", "", "", "Eat your fruits, it's good for you!"],
		["http://i31.tinypic.com/119w28m.jpg", "", "", "There's nothing like a nice swim in the Summer."]
	],
	autoplay: [true, 5000, 5], //[auto_play_boolean, delay_btw_slide_millisec, cycles_before_stopping_int]
	persist: false, //remember last viewed slide and recall within same session?
	fadeduration: 500, //transition duration (milliseconds)
	oninit:function(){ //event that fires when gallery has initialized/ ready to run
		//Keyword "this": references current gallery instance (ie: try this.navigate("play/pause"))
	},
	onslide:function(curslide, i){ //event that fires after each slide is shown
		//Keyword "this": references current gallery instance
		//curslide: returns DOM reference to current slide's DIV (ie: try alert(curslide.innerHTML)
		//i: integer reflecting current image within collection being shown (0=1st image, 1=2nd etc)
	}
})
</script>
<div id="simplegallery1">&nbsp;</div>
