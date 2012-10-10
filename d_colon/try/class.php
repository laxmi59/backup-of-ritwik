<?
include "dbcon.php";
if($_GET['act'])
{
	$act=$_GET['act'];
}
if($_GET['id'])
{
	$id=$_GET['id'];
}

/*class abcd
{
	function abc($t1,$t2)
	{
		if(!$t1=='')
		{
			$insert=mysql_query("insert into abc values(`id`,'$t1','$t2',now())");
			echo "inserted";
		}
	}
	function abc1()
	{
		echo "aaaaaaaaa";
		$select=mysql_query("select * from abc");
		echo "<table align='center' width='50%' border=1>";
		
		while($row=mysql_fetch_array($select))
		{
			
			echo "<tr>
			<td>".$row['name']."</td>
			<td>".$row['pw']."</td>
			<td>".$row['date']."</td>
			<td><a href='class.php?id=".$row['id']."&act=show'>edit</a><a href='class.php?id=".$row['id']."'>delete</a></td>
			</tr>";
		}
		echo "</table>";
	}
}*/
if($_POST['submit'])
{
	extract($_POST);
	//print_r($_POST);
	
	$a=new abcd1();
	$a->abc($_POST['t1'] , $_POST['t2']);
	$a->abc1();
	//$rrr=new abcd1();
	
}
if($act=='show')
{
	$rrr=new abcd1();
	$rrr->abc2($_GET['id']);
}
?>
<title>class ex</title>
<form method="post">
<table width="50%" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>name</td>
    <td>:</td>
    <td><input type="text" name="t1"></td>
  </tr>
  <tr>
    <td>password</td>
    <td>:</td>
    <td><input type="password" name="t2"></td>
  </tr>
  <tr>
    <td colspan="3"><input type="submit" name="submit" value="submit"></td>
  </tr>
</table>
</form>
