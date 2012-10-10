<link rel="stylesheet" type="text/css" href="anylinkmenu.css" />
<script type="text/javascript">
var anylinkmenu3={divclass:'anylinkmenucols', inlinestyle:'', linktarget:'secwin'} //Third menu variable. Same precaution.
anylinkmenu3.cols={divclass:'column', inlinestyle:''} //menu.cols if defined creates columns of menu links segmented by keyword "efc"
anylinkmenu3.items=[
	["Dynamic Drive", "http://www.dynamicdrive.com/"],
	["CSS Drive", "http://www.cssdrive.com/"],
	["JavaScript Kit", "http://www.javascriptkit.com/"],
	["Coding Forums", "http://www.codingforums.com/"],
	["JavaScript Reference", "http://www.javascriptkit.com/jsref/", "efc"],
	["CNN", "http://www.cnn.com/"],
	["MSNBC", "http://www.msnbc.com/"],
	["Google", "http://www.google.com/"],
	["BBC News", "http://news.bbc.co.uk", "efc"],
	["News.com", "http://www.news.com/"],
	["SlashDot", "http://www.slashdot.com/"],
	["Digg", "http://www.digg.com/"],
	["Tech Crunch", "http://techcrunch.com"] //no comma following last entry!
]

</script>
<script type="text/javascript" src="anylinkmenu.js"></script>
<p style="text-align:center"><a href="http://www.dynamicdrive.com" class="menuanchorclass myownclass" rel="anylinkmenu3[click]">Menu with multiple columns</a></p>
<script type="text/javascript">
//anylinkmenu.init("menu_anchors_class") //call this function at the very *end* of the document!
anylinkmenu.init("menuanchorclass")
</script>