<?php
/*class Addition {
  function compute($first, $second, $third = 0) {
    return $first+$second+$third;
  }
}
class Substraction extends Addition {
  function compute($first, $second, $third = 0) {
    return $first-$second-$third;
  }
}
$add = new Addition;
$sub = new Substraction;
echo($add->compute(1,2)); //"Foo"
echo($sub->compute(1,2)); //"Bar"
*/
$html="<p><p>Mojo Affiliates is a merger between two affiliate programs -  GR88.com and Bulldog777.com. Between the two programs, a variety of casino games and poker programs are available to affiliates. The two also have different geographical areas of impact – GR88.com is primarily active in English speaking European countries, and Bulldog777.com is most active in Russia and Europe. In fact, with the exception of the US and France, you can promote the Mojo Affiliates brands anywhere in the world. <br /><br />The commission based revenue model for Mojo Affiliates is based on four tiers. First tier affiliates, who bring in up to $2,499 net revenues earn 30% commission. Second tier affiliates, earning up to $9,999 get 35%, third tier, which goes up to $19,999 in revenues, brings you 40% commission, and top tier, or fourth tier affiliates earn 45% on net revenues of $20,000 and over. <br /><br />There is no standard CPA commission structure for Mojo Affiliates, however, affiliates who are already bringing in high volumes of paying players can apply to negotiate an individual CPA deal for their sites. <br /><br />Mojo Affiliates also encourages affiliates to host private poker tournaments on their sites, and they do consider free roll events on merit. They also allow rakebacks for affiliates on request. <br /><br />The Mojo Affiliates program is free to join, and most sites can host their banners. However, they don’t approve affiliates who have websites that are targeted to minors. Payments are made on the 15th of the month, and there are a variety of payment methods.</p></p>";
$start = strpos($html, '<br />');
//$end = strpos($html, '</p>', $start);
$paragraph = substr($html, 0, $start);
echo $paragraph;
?>