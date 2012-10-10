<?php
  
  $title='testing';
  $desc='&lt;h1&gt;test&lt;/h1&gt; &lt;img src = "http://www.affiliateprograms.com/newsletter_images/master-card.jpg"&gt;';
  $link ='http://google.com';
  
    $rssfeed = '<?xml version="1.0" encoding="ISO-8859-1"?>';
    $rssfeed .= '<rss version="2.0">';
    $rssfeed .= '<channel>';
    $rssfeed .= '<title>My RSS feed</title>';
    $rssfeed .= '<link>http://www.casinoaffiliateprograms.com.com</link>';
    $rssfeed .= '<description>This is an example RSS feed</description>';
    $rssfeed .= '<language>en-us</language>';
    $rssfeed .= '<copyright>Copyright (C) 2009 casinoaffiliateprograms.com</copyright>';
 
         
        $rssfeed .= '<item>';
        $rssfeed .= '<title>'.$title.'</title>';
        $rssfeed .= '<description>'.$desc.' </description>';
        $rssfeed .= '<link>' . $link . '</link>';
        $rssfeed .= '<pubDate>' . date("D, d M Y H:i:s O") . '</pubDate>';
        $rssfeed .= '</item>';

 
    $rssfeed .= '</channel>';
    $rssfeed .= '</rss>';
 
    echo $rssfeed;
?>