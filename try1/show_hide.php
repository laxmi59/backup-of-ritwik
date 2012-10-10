<script type="text/javascript">
function Show(ids) {
  doSomethingWithClasses('RBtnTab');
  var obj = document.getElementById(ids);
  if (obj.style.display != 'block') { obj.style.display = 'block'; }
                               else { obj.style.display = 'block'; }
}
function Show1(ids) {
 doSomethingWithClasses('RBtnTab');
  var obj = document.getElementById(ids);
  if (obj.style.display != 'block') { obj.style.display = 'none'; }
                               else { obj.style.display = 'none'; }
}
</script>
<input id="lDIV1" type="radio" name='r_type'  value='1' onClick="Show1('DIV1')"> 
Individual
<input id="lDIV1" type="radio" checked="checked" name='r_type' value='2' onMouseOver="Show('DIV1')">
Agent/Broker
<input id="lDIV1" type="radio" name='r_type' value='3' onClick="Show('DIV1')"> 
Builder
<input id="lDIV1" type="radio" name='r_type' value='4' onClick="Show('DIV1')"> 
Corporate

<div id='Content' style="display:block">
<div id='DIV1' style="display:none">yrdy
</div>
</div>