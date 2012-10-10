<!--<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script> 
<script type="text/javascript" src="js/jquery-ui-1.7.1.custom.min.js"></script> -->
<script type="text/javascript" src="js/jquery-1.js"></script>
<script type="text/javascript" src="js/jquery-ui-personalized-1.js"></script>
<link rel='stylesheet' href='css/styles.css' type='text/css' media='all' />
<script type="text/javascript"> 
// When the document is ready set up our sortable with it's inherant function(s) 
$(document).ready(function() { 
  $("#test-list").sortable({ 
   // handle : '.handle', 
    update : function () { 
      var order = $('#test-list').sortable('serialize'); 
     // $("#info").load("process-sortable.php?"+order); 
    } 
  }); 
}); 
</script>
<pre> 
    <div id="info">Waiting for update</div> 
</pre> 
<ul id="test-list"> 
  <li id="listItem_1"> 
    <!--<img src="arrow.png" alt="move" width="16" height="16" class="handle" /> -->
	<a href="#">test</a>
    <strong>Item 1 </strong>with a link to <a href="http://www.google.co.uk/" rel="nofollow">Google</a> 
  </li> 
  <li id="listItem_2"> 
    <img src="arrow.png" alt="move" width="16" height="16" class="handle" /> 
    <strong>Item 2</strong> 
  </li> 
  <li id="listItem_3"> 
    <img src="arrow.png" alt="move" width="16" height="16" class="handle" /> 
    <strong>Item 3</strong> 
  </li> 
  <li id="listItem_4"> 
    <img src="arrow.png" alt="move" width="16" height="16" class="handle" /> 
    <strong>Item 4</strong> 
  </li> 
</ul> 
<form action="process-sortable.php" method="post" name="sortables"> 
  <input type="hidden" name="test-log" id="test-log" /> 
</form>
