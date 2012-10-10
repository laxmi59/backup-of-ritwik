<?php
    //header("Content-Type: application/rss+xml; charset=ISO-8859-1");
 
    DEFINE ('DB_USER', 'root');
    DEFINE ('DB_PASSWORD', '');
    DEFINE ('DB_HOST', 'localhost');
    DEFINE ('DB_NAME', 'rama_cap');
 
    $rssfeed = '<?xml version="1.0" encoding="ISO-8859-1"?>';
    $rssfeed .= '<rss version="2.0">';
    $rssfeed .= '<channel>';
    $rssfeed .= '<title>My RSS feed</title>';
    $rssfeed .= '<link>http://www.casinoaffiliateprograms.com.com</link>';
    $rssfeed .= '<description>This is an example RSS feed</description>';
    $rssfeed .= '<language>en-us</language>';
    $rssfeed .= '<copyright>Copyright (C) 2009 casinoaffiliateprograms.com</copyright>';
 
    $connection = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)
        or die('Could not connect to database');
    mysql_select_db(DB_NAME)
        or die ('Could not select database');
 
    $query = "SELECT * FROM cap_program limit 0,10";
    $result = mysql_query($query) or die ("Could not execute query");
 
    while($row = mysql_fetch_array($result)) {
        
        $rssfeed .= '<item>';
        $rssfeed .= '<title><![CDATA[ &lt;h1&gt; ]]>' . $row['program_title'] . '<![CDATA[ &lt;/h1&gt; ]]></title>';
        $rssfeed .= '<description><![CDATA[ ' .nl2br($row['programdescription']). ' ]]> &lt;h1&gt;test&lt;/h1&gt; &lt;img src = "http://www.affiliateprograms.com/newsletter_images/master-card.jpg"&gt;</description>';
        $rssfeed .= '<link>' . $row['program_url'] . '</link>';
        $rssfeed .= '<pubDate>' . date("D, d M Y H:i:s O", strtotime($row['creation_date_time'])) . '</pubDate>';
        $rssfeed .= '</item>';
    }
 
    $rssfeed .= '</channel>';
    $rssfeed .= '</rss>';
 
    echo $rssfeed;
?>