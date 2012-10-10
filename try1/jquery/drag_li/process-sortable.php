<?php 
/* This is where you would inject your sql into the database 
but we're just going to format it and send it back 
*/ 
$con=mysql_connect("localhost","root","");
mysql_select_db("try_jquery",$con)

foreach ($_GET['listItem'] as $position => $item) : 
  $sql[] = "UPDATE `test` SET `position` = $position WHERE `id` = $item"; 
endforeach; 
print_r ($sql); 
?>