<?
// Add values to the graph
$graphValues=array(0,80,23,11,190,245,50,80,111,240,55);
// Define .PNG image
header("Content-type: image/png");
$imgWidth=250;
$imgHeight=250;
// Create image and define colors
$image=imagecreate($imgWidth, $imgHeight);
$colorWhite=imagecolorallocate($image, 255, 255, 255);
$colorGrey=imagecolorallocate($image, 192, 192, 192);
$colorBlue=imagecolorallocate($image, 0, 0, 255);
// Create border around image
imageline($image, 0, 0, 0, 250, $colorGrey);
imageline($image, 0, 0, 250, 0, $colorGrey);
imageline($image, 249, 0, 249, 249, $colorGrey);
imageline($image, 0, 249, 249, 249, $colorGrey);
// Create grid
for ($i=1; $i<11; $i++){
imageline($image, $i*25, 0, $i*25, 250, $colorGrey);
imageline($image, 0, $i*25, 250, $i*25, $colorGrey);
}
// Add in graph values
for ($i=0; $i<10; $i++){
imageline($image, $i*25, (250-$graphValues[$i]), ($i+1)*25, (250-$graphValues[$i+1]), $colorBlue);
}
// Output graph and clear image from memory
imagepng($image);
imagedestroy($image);
?>

