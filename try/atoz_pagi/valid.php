<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("dev2cap", $con);

$pname = $_POST['pname'];
if($pname<>''){
$sort=$pname."%";
$qry="select * from cap_program where program_title like '".$sort."' order by program_title asc";
$result=mysql_query($qry);
while($row=mysql_fetch_array($result)){
	$res.= $row['program_title']."<br>";
}
echo $res;
}
?>