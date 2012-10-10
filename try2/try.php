<?php /*?><?php
   if($random == 1)
   //test with white border (no border)
   {
?>
   <script type="text/javascript"><!--
   google_ad_client = "pub-2911253224693209";
   google_ad_width = 336;
   google_ad_height = 280;
   google_ad_format = "250x200_as";
   google_ad_type = "text";
   google_ad_channel ="2621593367";
   google_color_border = "FFFFFF";
   google_color_bg = "FFFFFF";
   google_color_link = "0000CC";
   google_color_url = "FFCC00";
   google_color_text = "000000";
   //--></script>
   <script type="text/javascript"
    src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
   </script>
<?php
   }
   else
   //test blue border around ads
   {
?>
   <script type="text/javascript"><!--
   google_ad_client = "pub-2911253224693209";
   google_ad_width = 336;
   google_ad_height = 280;
   google_ad_format = "336x280_as";
   google_ad_type = "text";
   google_ad_channel ="5760339755";
   google_color_border = "336699";
   google_color_bg = "FFFFFF";
   google_color_link = "0000CC";
   google_color_url = "FFCC00";
   google_color_text = "000000";
   //--></script>
   <script type="text/javascript"
    src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
   </script>
<?php
   }
?><?php */?>
<?php
   srand(time());   //first generate the random number
   $random = (rand()%2);

   if($random == 1)  //use Format 2-A
   {
?>
   <!-- start Google ad -->
   <script type="text/javascript"><!--
   google_ad_client = "pub-2911253224693209";
   google_ad_slot = "7837762649";
   google_ad_width = 336;
   google_ad_height = 280;
   //-->
   </script>
   <script type="text/javascript"
   src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
   </script>
   <!-- end Google ad -->

<?php
   }
   else     //use Format 2-B
?>
   <table border="0" cellspacing="5" cellpadding="2" align="left"><tr><td>
   <!-- start Google ad -->
   <script type="text/javascript"><!--
   google_ad_client = "pub-2911253224693209";
   google_ad_slot = "0483297374";
   google_ad_width = 300;
   google_ad_height = 250;
   //-->
   </script>
   <script type="text/javascript"
   src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
   </script>
   <!-- end Google ad -->
   </td></tr></table>

<?php
   }
?>