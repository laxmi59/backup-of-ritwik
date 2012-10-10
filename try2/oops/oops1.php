<?php
/*$mybox = new Box("Jack");
echo $mybox-&gt;get_whats_inside();*/
/////////////////////////////////// displaying single value///////////////////////////
/*class abc
{
	function _abc1()
	{
		$x="rama";
		return $x;
	}
}
$a=new abc();
$a->_abc1();
echo $a;*/
/////////////////////////////////////// nested function calling//////////////////////////////////////////
/*class myHappyBox {

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
	function setHeight1($value1,$value2,$value3){
        $this->box_height=$value1;
		$this->box_width=$value2;
		$this->box_color=$value3;
		$this->displayBox();
	}
    function displayBox(){
        echo sprintf('
            <div style="height:%spx;width:%spx;background-color:%s"> </div>
        ',$this->box_height,$this->box_width,$this->box_color);
    }
}
$box=new myHappyBox();
$box->displayBox();
$box->setHeight1(200,200,'black');
$box->setHeight(30);
$box->setWidth(300);
$box->setColor('black');
$box->displayBox(); */

/*$con=mysql_connect("localhost","root","");
mysql_select_db("job-portal",$con);
class jobs
{
	function settablename($value){
		$this->tablename=$value;
	}
	function setfield($value){
		$this->fieldname=$value;
	}
	function display($id){
		$select=mysql_fetch_array(mysql_query("select * from `".$this->tablename."` where `".$this->fieldname."` ='".$id."'"));
		 //echo $this->tablename,$this->fieldname;
		return $select;
	}
}
$job=new jobs();
$job->settablename('reg');
$job->setfield('com_id');
$abc=$job->display(3);
echo $abc['com_mail'];*/
/////////////////////////////////////////////////////////////////////////////////////

/*
Cd-library class. Responsible for managing cds.
*/
class CdLibrary
{
// --- Variables ---
private $cds = array(); // Contains Cd objects.

// --- Constructor ---
public function __construct()
{
// Do nothing.
}

// --- Methods ---
/*
Add cd to library.
@param $myCd (Cd object).
*/
public function addCd(Cd $myCd)
{
$this->cds[] = $myCd;
$myCd->setId(sizeof($this->cds)); // Set id in cd-objekt.
}

/*
Delete cd from library.
@param $id (integer).
*/
public function deleteCd($id)
{
$this->cds[$id - 1] = '';
}

/*
Get cd-object from library.
@param $id (integer).
@return Cd object.
*/
public function getCd($id)
{
return $this->cds[$id - 1];
}

/*
Print a list of all cds in library.
*/
public function listCds()
{
foreach ($this->cds as $cd) {
if (is_object($cd)) {
$cd->printInfo();
}
}
}

// End of class.
}

/*
Cd-class. Responsible for storing info about a specific cd.
*/
class Cd
{
// --- Variables ---
private $id; // integer.
private $artist; // string.
private $album; // string.
private $songs = array(); // strings.

// --- Constructor ---
/**
Construct cd object and set artist and album title.
@param $artist (string). Name of the artist.
@param $album (string). Title of the album.
*/
public function __construct($artist, $album)
{
$this->artist = $artist;
$this->album = $album;
}

// --- Methods ---
/**
Set id for this cd.
@param $id (integer).
*/
public function setId($id)
{
$this->id = $id;
}

/**
Add song to cd.
@param $title (string). Title of song.
*/
public function addSong($title)
{
$this->songs[] = $title;
}

/**
Print Artist, album and song titles for this cd.
*/
public function printInfo()
{
echo '';
echo 'Id: '.$this->id.' Artist: '.$this->artist.' Album: '.$this->album.'';
foreach ($this->songs as $title) {
echo ''.$title;
}
echo '';

}

// End of class.
}

// Let's create a cd-library and a couple of cds.
// Create CdLibrary.
$cdLib = new CdLibrary();

// Create Cd.
$cd = new Cd('Tori Amos', 'Under The Pink');
$cd->addSong('Cornflake Girl');
$cdLib->addCd($cd); // Add cd to Lib.

// Create another Cd.
$cd = new Cd('Michael Nyman', 'Live');
$cd->addSong('In Re Don Giovanni');
$cdLib->addCd($cd); // Add cd to Lib.

// Let's invoke som methods!
// Print a list of all cds.
$cdLib->listCds();

// Delete a cd and print list.
$cdLib->deleteCd(1);
$cdLib->listCds();

// Retrieve a cd form library, add a song and print list.
$cd = $cdLib->getCd(2);
$cd->addSong('The Upside Down Violin');
$cdLib->listCds();

?> 
