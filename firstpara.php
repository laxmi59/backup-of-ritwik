<?php /**
 * Simple function gets first paragraph of text, supports HTML or plain text.
 *
 * @author Kamran Ayub
 * @param {String} $data The string to summarize
 * @param {Boolean} $isHTML Whether or not the string contains HTML
 */
function string_summarize($data, $isHTML = true) {    
    
    $result = $data;
    
    if($isHTML) {
        
        // convert line breaks/paragraphs
        $result = str_replace("
", "", $result); // remove extra
        $result = str_replace("<br>", "
", $result);
        $result = str_replace("<br/>", "
", $result);
        $result = str_replace("<br />", "
", $result);
        $result = str_replace("</p>", "

", $result);
    
        // strip all remaining tags
        $result = strip_tags($result);
    }
    
    // try and return the first paragraph, if I can't, return all of it
    $paragraphs = explode("

", trim($result));
    
    if(count($paragraphs) > 1) {
        return nl2br(trim($paragraphs[0]));
    } else {
        return $data;
    }
}
$str="ACE World Gaming is the affiliate program for the online gaming website, Jenningsbet.com. The site itself offers casino games, poker, sports betting and games, and affiliates have the option to promote all of them.

The casino and betting site itself is one of the market leaders in Britain, and the system makes use of the well known Income Access software to manage affiliates.

Currently, revenue shares for affiliates referring real money players to the site is between 25 and 35%, on a tiered, volume based system. Earnings are calculated based on net revenues generated, and at the moment, there are no sub affiliate earning options. Earnings on your players are lifetime earnings though, and on most of the programs, there’s no negative carryover (check the sports betting program before you promote it though!)

Affiliates of the ACE World Gaming program have access to a variety of free marketing materials, as well as an online panel that provides detailed income and earnings stats. Stats are provided in real time too, so you can literally see what you are earning as you earn it.

The program pays out monthly, for any earnings during the previous month (subject to the minimum payout threshold being met) and you can choose between Neteller, Moneybookers and Bank Wire Transfer to receive your payments.";
echo string_summarize($str);
?>