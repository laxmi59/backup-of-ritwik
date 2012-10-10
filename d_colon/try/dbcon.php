<?
$con=mysql_connect("localhost","root","");
mysql_select_db("try",$con);


class abcd1
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

	function abc2($b)
	{
	//echo $b;
		$select1=mysql_query("select * from abc where id='".$b."'");
		
		$row1=mysql_fetch_array($select1);
		echo "<table align='center' width='50%' border=1>
			<tr>
			<td>".$row1['name']."</td>
			<td>".$row1['pw']."</td>
			<td>".$row1['date']."</td>
			
			</tr>
		</table>";
	}
}

?>