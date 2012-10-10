<link href="jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="jquery.min.js"></script>
<script src="jquery-ui.min.js"></script>

  <script>
  $(document).ready(function() {
    //$("#dialog").dialog();
	
	 $("#dialoganchor").click(function(){
	 	$("#dialog-overlay").show();   
	 	$("#dialog").dialog();
	 });
	 
  });
  
   
 
  </script>
<style type="text/css">
#dialog-overlay {
     /* set it to fill the whil screen */
    width:100%;
    height:100%;
     /* transparency for different browsers */
    filter:alpha(opacity=50);
    -moz-opacity:0.5;
    -khtml-opacity: 0.5;
    opacity: 0.5;
    background:#000;
    /* make sure it appear behind the dialog box but above everything else */
    position:absolute;
    top:0; left:0;
    z-index:3000;
 
    /* hide it by default */
    display:none;
}

</style>



<div id="dialog" title="Forum Rules" style="display:none">
<!--<a href="javascript:void(0)" class="ui-icon" id="closedia"> X </a>-->
<?php //include "terms.php";?>
<p>Registration to this forum is free! We do insist that you abide by the rules and policies detailed below. If you agree to the terms, please check the 'I agree' checkbox and press the 'Register' button below. If you would like to cancel the registration, click here to return to the forums index.</p>
<p>Although the administrators and moderators of Casino Affiliate Programs (CAP) Community Discussion will attempt to keep all objectionable messages off this forum, it is impossible for us to review all messages. All messages express the views of the author, and neither the owners of Casino Affiliate Programs (CAP) Community Discussion, nor Jelsoft Enterprises Ltd.<br />

Integrated by BBpixel Team2009 :: jvbPlugin R1012.367.1
(developers of vBulletin) will be held responsible for the content of any message.</p>
<p>By agreeing to these rules, you warrant that you will not post any messages that are obscene, vulgar, sexually-oriented, hateful, threatening, or otherwise violative of any laws.</p>
<p>The owners of Casino Affiliate Programs (CAP) Community Discussion reserve the right to remove, edit, move or close any thread for any reason.</p>
</div>
 <div id="dialog-overlay"></div> 
<div id="dialogcontent" title="Dialog Title"><a id="dialoganchor" href="javascript:void(0)">click here</a></div>
<div >
<p>Registration to this forum is free! We do insist that you abide by the rules and policies detailed below. If you agree to the terms, please check the 'I agree' checkbox and press the 'Register' button below. If you would like to cancel the registration, click here to return to the forums index.</p>
<p>Although the administrators and moderators of Casino Affiliate Programs (CAP) Community Discussion will attempt to keep all objectionable messages off this forum, it is impossible for us to review all messages. All messages express the views of the author, and neither the owners of Casino Affiliate Programs (CAP) Community Discussion, nor Jelsoft Enterprises Ltd.<br />

Integrated by BBpixel Team2009 :: jvbPlugin R1012.367.1
(developers of vBulletin) will be held responsible for the content of any message.</p>
<p>By agreeing to these rules, you warrant that you will not post any messages that are obscene, vulgar, sexually-oriented, hateful, threatening, or otherwise violative of any laws.</p>
<p>The owners of Casino Affiliate Programs (CAP) Community Discussion reserve the right to remove, edit, move or close any thread for any reason.</p>
</div>

