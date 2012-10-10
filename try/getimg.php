<?php
$arr=array();
if ($handle = opendir('ScreenShot')) {
    for ($i=0;false !== ($file = readdir($handle));$i++) {
        if ($file != "." && $file != "..") {
          $arr[$i]=$file;  
        }
    }
    closedir($handle);
}
print_r($arr);
if(in_array('ScreenShot.php',$arr)){
	echo "exists";
}else{
	echo "notexists";
}
echo "<br>";
$file='ScreenShot/thumb.jpg';
if(file_exists($file)){
	echo "exists";
}else{
	echo "notexists";
}
?>
