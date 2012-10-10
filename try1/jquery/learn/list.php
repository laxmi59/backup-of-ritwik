<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script type="text/javascript" src="js/jquery-1.js"></script>
<script type="text/javascript" src="js/jquery-ui-personalized-1.js"></script>
<script type="text/javascript">
$(document).ready(function() { 
  $("#test-list").sortable({ 
    update : function () { 
      var order = $('#test-list').sortable('serialize'); 
      //$("#info").load("process-sortable.php?"+order); 
    } 
  }); 
}); 
</script>
</head>

<body>
<?php
$arr=array("list1","list2","list3","list4","list5");
?>
<ul id="test-list"> 
  <li id="listItem_1"> 
      <strong>Item 1 </strong>
	  <a href="#">move</a>
  </li> 
  <li id="listItem_2"> 
    <strong>Item 2</strong> 
	<a href="#">move</a>
  </li> 
  <li id="listItem_3"> 
    <strong>Item 3</strong> 
	<a href="#">move</a>
  </li> 
  <li id="listItem_4"> 
     <strong>Item 4</strong> 
	 <a href="#">move</a>
  </li> 
</ul> 
<?php /*?><?php foreach($arr as $position=>$item){
echo "<div id='list'.$position>$item
<a href='#'>Move Top</a>
</div>";
}
?><?php */?>

</body>
</html>
