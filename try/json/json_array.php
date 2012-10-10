<?php 
$con=mysql_connect("localhost","root","");
mysql_select_db("lml",$con);

$select=mysql_query("SELECT * FROM `jos_article_comments` jac, `jos_content` jc where jac.art_id=jc.id");
?>
<html>
<head>
<title>Array JSON-JavaScript Example</title>
<script language="javascript" >
var Articles = { "Comments" : [     
<?php while($row=mysql_fetch_object($select)){?>
	{
	"Article" : <?php echo '"'.$row->title.'"'?>, 
	"To" : <?php echo '"'.$row->to_mail.'"'?>, 
	"From" : <?php echo '"'.$row->from_mail.'"'?>,
	"Comment" :<?php echo '"'.$row->comment.'"'?>,
	"Date" :<?php echo '"'.$row->date.'"'?> 
	},
<?php }?>
	]
} 

// Printing all array values 
var i=0
document.writeln("<table border='0' cellpadding='0' cellspacing='0' width='500px' align='center'>");
for(i=0;i<Articles.Comments.length;i++)
{  
  document.writeln("<tr><td><B>Article</B></td><td>"
  +Articles.Comments[i].Article+"</td></tr>");
  document.writeln("<tr><td><B>To</B></td><td>"
  +Articles.Comments[i].To +"</td></tr>");
  document.writeln("<tr><td><B>From</B></td><td>"
  +Articles.Comments[i].From +"</td></tr>");
  document.writeln("<tr><td><B>Comment</B></td><td>"
  +Articles.Comments[i].Comment +"</td></tr>");
  document.writeln("<tr><td><B>Date</B></td><td>"
  +Articles.Comments[i].Date +"</td></tr>");
  document.writeln("<tr><td><hr></td><td><hr></td></tr>");
}
document.writeln("</table>");
</script>
<?php

?>