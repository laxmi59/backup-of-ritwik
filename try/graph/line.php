<!-- graph code begins here-->
<script type="text/javascript" src="wz_jsgraphics.js"></script>
<script type="text/javascript" src="line.js">

<!-- Line Graph script-By Balamurugan S http://www.sbmkpm.com/ //-->
<!-- Script featured/ available at Dynamic Drive code: http://www.dynamicdrive.com //-->

</script>

<div id="lineCanvas" style="overflow: auto; position:relative;height:300px;width:400px;"></div>

<script type="text/javascript">
var g = new line_graph();
g.add('1', 145);
g.add('2', 0);
g.add('3', 175);
g.add('4', 130);
g.add('5', 150);
g.add('6', 175);
g.add('7', 205);
g.add('8', 125);
g.add('9', 125);
g.add('10', 135);
g.add('11', 125);

g.render("lineCanvas", "Line Graph");
</script>
<!-- graph code ends here-->