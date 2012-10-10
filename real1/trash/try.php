<html>
<head>
<title>RB Tabs</title>
<script type="text/javascript">
var allPageTags = new Array();
function doSomethingWithClasses(theClass) {
//Populate the array with all the page tags
    var allPageTags=document.getElementsByTagName("*");
//Cycle through the tags using a for loop
    for (var i=0; i<allPageTags.length; i++) {
//Pick out the tags with our class name
      if (allPageTags[i].className==theClass) {
//Manipulate this in whatever way you want
        allPageTags[i].style.display='none';
      }
    }
  }

function Show(ids) {
  doSomethingWithClasses('RBtnTab');
  var obj = document.getElementById(ids);
  if (obj.style.display != 'block') { obj.style.display = 'block'; }
                               else { obj.style.display = 'none'; }
}
</script>
</head>
<body>

<label for="lDIV1">
<input id="lDIV1" type="radio" name='rbtab' value='DIV1' onClick="Show('DIV1')">Event Info</label>
<table>
<tr>
<td>abcd</td>
</tr>
<tr>
<td>
<div id='Content' style="display:block">
<div id='DIV1' style="display:none"><table><tr><td>Event Information</td></tr></table></div>
</div>
</td></tr>
<tr><td>abc</td></tr>
</table>
</body>
</html>