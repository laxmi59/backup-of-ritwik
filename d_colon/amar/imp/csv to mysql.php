<?php
/* Import CSV file into MySQL
*
* DISCLAIMER
* This is *sample* code.
* Input data is not sanitized.
* Code may not necessarily be optimized for maximum performance.
* Do not use this code in production!
*/
 
// ------------------------
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'try';
 
$table = 'test';
// ------------------------

if ( ! $db = mysql_connect($db_host, $db_user, $db_pass)) die('Could not connect to database: '.mysql_error());
if ( ! mysql_select_db($db_name, $db)) die('Could not select database: '.mysql_error());
 
// get the table's columns
if ( ! $desc = mysql_query('DESCRIBE '.$table)) die ('Could not get columns from table: '.mysql_error());
 
$fields = array();
while($col = mysql_fetch_array($desc))
$fields[] = $col['Field'];
 
$fields_string = implode(', ', $fields);
$fields_count = count($fields);
 
// read and parse lines from CSV file
if ( ! $file = file('test.csv', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)) die ('Could not open input file');

foreach($file as $line)
{
   $line_values = explode(',', $line);
 
   // build SQL statement
   $sql = 'INSERT INTO '.$table.' ('.$fields_string.') VALUES (';
 
   $values = '';
   for ($i = 0; $i < $fields_count; $i++)
  {
      if (is_numeric($line_values[$i]))
         $values .= (($values == '') ? $line_values[$i] : ', '.$line_values[$i]);
   else
         $values .= (($values == '') ? "'".$line_values[$i]."'" : ", '".$line_values[$i]."'");
   }
 
   $sql .= $values;
   $sql .= ')';
 
   // do the insert
   mysql_query($sql) or die(mysql_error());
   echo $sql."\n";
}
 
mysql_close($db);