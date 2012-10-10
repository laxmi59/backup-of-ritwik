<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>toggling</title>
	<script type='text/javascript'>
	<!--
	var test1= "<?=$_GET['act']?>";
	var test2= "test4";
	var togglers = {
		init : function() {
			addEvent($('controller'),'click',this.run);
		},
		run : function() {
			toggle(test1,test2);
		}
	}
	function addEvent( obj, type, fn ) {
		if (obj.addEventListener) {
			obj.addEventListener( type, fn, false );
			EventCache.add(obj, type, fn);
		}
		else if (obj.attachEvent) {
			obj["e"+type+fn] = fn;
			obj[type+fn] = function() { obj["e"+type+fn]( window.event ); }
			obj.attachEvent( "on"+type, obj[type+fn] );
			EventCache.add(obj, type, fn);
		}
		else {
			obj["on"+type] = obj["e"+type+fn];
		}
	}
		
	var EventCache = function(){
		var listEvents = [];
		return {
			listEvents : listEvents,
			add : function(node, sEventName, fHandler){
				listEvents.push(arguments);
			},
			flush : function(){
				var i, item;
				for(i = listEvents.length - 1; i >= 0; i = i - 1){
					item = listEvents[i];
					if(item[0].removeEventListener){
						item[0].removeEventListener(item[1], item[2], item[3]);
					};
					if(item[1].substring(0, 2) != "on"){
						item[1] = "on" + item[1];
					};
					if(item[0].detachEvent){
						item[0].detachEvent(item[1], item[2]);
					};
					item[0][item[1]] = null;
				};
			}
		};
	}();
	
	function $() {
		var elements = new Array();
		for (var i = 0; i < arguments.length; i++) {
			var element = arguments[i];
			if (typeof element == 'string')
				element = document.getElementById(element);
			if (arguments.length == 1)
				return element;
			elements.push(element);
		}
		return elements;
	}
	
	function toggle() {
		for ( var i=0; i < arguments.length; i++ ) {
			$(arguments[i]).style.display = ($(arguments[i]).style.display != 'none' ? 'none' : '' );
		}
	}
	
	
	
	function pageLoaders() {
		togglers.init();
	}
	
	addEvent(window,'unload',EventCache.flush);
	addEvent(window,'load',pageLoaders);
	//
	</script>
	<style type='text/css'>
	<!--
	body {
		font-size:120%;
		font-family:'trebuchet ms',helvetica,sans-serif;
		color:#fff;
		background:#444;
	}
	h1 {
		font-family:georgia,times,serif;
		font-weight:normal;
	}
	a {
		color:#50ff4c;
	}
		#controlGroup p {
			float:left;
			width:40%;
			padding:1em;
			border:1px solid #fff;
			margin:1em;
		}
		#controlGroup p span {
			font-size:300%;
		}
	
	</style>
	<script src="/mint/?js" type="text/javascript"></script>
</head>
<body>
	<h1>The Multiple Toggler in Action</h1>
	<p><a href='#' id="controller">Toggle paragraphs two and four</a></p>
	<div id='controlGroup'>
		<p id='test1'><span>1</span> Paragraph one test</p>
		<p id='test2'><span>2</span> Paragraph two test</p>
		<p id='test3'><span>3</span> Paragraph three test</p>
		<p id='test4'><span>4</span> Paragraph four test</p>
	</div>
</body>
</html>-->
