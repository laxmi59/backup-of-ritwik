<?php /*?><?
class abc
{	var $a= "testing";
	function abc(){}
	function echoMe(){ echo 'me';}
}
?>
<?
$abc1=new abc();
//$abc1->echoMe(); 
echo $abc1->a; 
?><?php */?>
<?php
/*class myHappyBox {
    var $box_height = 100;
    var $box_width = 100;
    var $box_color = '#EC0000';
    function displayBox()
	{
        echo sprintf('<div style="height:%spx;width:%spx;background-color:%s"> </div>',$this->box_height,$this->box_width,$this->box_color);
    }
}
$box=new myHappyBox();
$box->displayBox();*/
?> 
<?php
class myHappyBox {

    var $box_height = 100;
    var $box_width = 100;
    var $box_color = '#EC0000';

    function myHappyBox(){
    }

    function setHeight($value){
        $this->box_height=$value;
    }
    function setWidth($value){
        $this->box_width=$value;
    }
    function setColor($value){
        $this->box_color=$value;
    }

    function displayBox(){
        echo sprintf('
            <div style="height:%spx;width:%spx;background-color:%s"> </div>
        ',$this->box_height,$this->box_width,$this->box_color);
    }
}
$box=new myHappyBox();
$box->setHeight(30);
$box->setWidth(300);
$box->setColor(blue);
$box->displayBox();
?> 
