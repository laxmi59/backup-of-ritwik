<script type="text/javascript" src="jquery-1.2.6.pack.js"></script>
<script type="text/javascript" src="stepcarousel.js"></script>
<link type="text/css" rel="stylesheet" href="style.css" />
<script type="text/javascript">
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
<table width="56%">
<tr>
	<td width="8%"><a href="javascript:stepcarousel.stepBy('galleryB', -2)"><img src="prev.gif" border="0" /></a> </td>
	<td width="64%"><div id="galleryB" class="stepcarousel">
      <div class="belt">
        <div class="panel" style="width: 150px; height:150px;"> 
			<a href="#" style="text-decoration:none;">
				<img src="http://i30.tinypic.com/531q3n.jpg" width="120" height="120" border="0" />
			</a>
		    <br />
            <span style="font-size:18px">kakinada</span> </div>
        <div class="panel"  style="width: 150px"> <img src="http://i29.tinypic.com/xp3hns.jpg"  width="120" height="120" border="0" /><br />
          kakinada </div>
        <div class="panel"  style="width: 130px"> <img src="http://i26.tinypic.com/11l7ls0.jpg"  width="120" height="120" border="0" /><br />
          kakinada </div>
        <div class="panel"  style="width: 180px"> <img src="http://i31.tinypic.com/119w28m.jpg"  width="120" height="120" border="0" /><br />
          kakinada </div>
        <!--<div class="panel"  style="width: 100px">
<img src="http://i27.tinypic.com/34fcrxz.jpg" /><br />kakinada
</div>-->
      </div>
    </div></td>
	<td width="28%"><a href="javascript:stepcarousel.stepBy('galleryB', 2)"><img src="next.gif" border="0" /></a></td>
</tr>
</table>
<!--<div style="margin-top: 1em; width:460px">
<div style="float: right; width: 200px; text-align:right; margin-top: -5px">
<a href="javascript:stepcarousel.stepBy('galleryB', -1)">Back</a> 
<a href="javascript:stepcarousel.stepBy('galleryB', 1)" style="margin-left: 20px">Forward</a>
</div><b>Currently showing  panels:</b> <span id="reportA"></span> to <span id="reportB"></span>

</div>-->