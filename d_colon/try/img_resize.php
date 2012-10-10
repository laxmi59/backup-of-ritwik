<?
/*class abc
{
function sizeme($img){
//echo "aa";
	$maxx=60;
	$maxy=50;
	$list1=getimagesize($img);
	//echo $list1[0]."<br>".$list1[1];
	$width=$list1[0];
	$height=$list1[1];
	if($width>$maxx){  
    	$newwidth = $maxx;
		$newheight = round($newwidth/$width*$height);   
		echo $newheight."<br>";
	} else {        
		$newwidth=$width;        
		$newheight=$height;    
		//echo $newwidth."<br>";
	}	
	if($newheight>$maxy){
    	$newheight1=$maxy;		
		$newwidth1=round($newheight1/$newheight*$newwidth);	
		echo $newwidth1."<br>";
	} else {		
		$newheight1=$newheight;		
		$newwidth1=$newwidth;	
		//echo $newwidth1."<br>";
	}	
	$out=array('width'=>$newwidth1,"height"=>$newheight);	
	return $out;
}
}
$img= new abc();
$img1=$img->sizeme('venezuela/033_angel_falls.jpg');
print_r($img1);*/
class abc
{
	function imageResize($image, $width, $height, $target) { 

//takes the larger size of the width and height and applies the  
//formula accordingly...this is so this script will work  
//dynamically with any size image 

	if ($width > $height) { 
	$percentage = ($target / $width); 
	} else { 
	$percentage = ($target / $height); 
	} 

	//gets the new value and applies the percentage, then rounds the value 
	$width = round($width * $percentage); 
	$height = round($height * $percentage); 

	//returns the new sizes in html image tag format...this is so you 
	//can plug this function inside an image tag and just get the 

	//return "width=\"$width\" height=\"$height\""; 
	//return $width."<br>".$height;
	return "<img src=\"$image\" width=\"$width\" height=\"$height\">"; 

	} 
}
//get the image size of the picture and load it into an array 
$mysock = getimagesize("venezuela/033_angel_falls.jpg"); 
//$image="venezuela/033_angel_falls.jpg";
$img= new abc();
$img1=$img->imageResize('venezuela/033_angel_falls.jpg', $mysock[0], $mysock[1], 600);
print $img1;

?> 


