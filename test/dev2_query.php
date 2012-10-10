<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$con=mysql_connect("localhost","dev2cap","Khjujov0");
mysql_select_db("dev2cap", $con);
$query1 =" SELECT DISTINCT (p.id), p.program_title, p.program_frontpagelogo, p.program_url, programlevel, homefeatured, home_rotation, pc.market, p.program_package, 
(SELECT count( * ) FROM cap_review cr WHERE p.id = cr.program_id and cr.member_id !=0  ) AS review_count,
(SELECT avg(rating) FROM cap_review crr WHERE p.id = crr.program_id and crr.member_id !=0  ) AS program_rating,
(SELECT market FROM cap_program_categories cpc1 WHERE p.id = cpc1.program_id  and category_id=1) AS market1,
	(SELECT market FROM cap_program_categories cpc2 WHERE p.id = cpc2.program_id  and category_id=2) AS market2,
	(SELECT market FROM cap_program_categories cpc3 WHERE p.id = cpc3.program_id  and category_id=3) AS market3,
	(SELECT market FROM cap_program_categories cpc4 WHERE p.id = cpc4.program_id  and category_id=4) AS market4,
	(SELECT market FROM cap_program_categories cpc5 WHERE p.id = cpc5.program_id  and category_id=5) AS market5,
	(SELECT market FROM cap_program_categories cpc6 WHERE p.id = cpc6.program_id  and category_id=9) AS market6
 FROM cap_program as p, cap_program_categories as pc where p.program_package !=1 and p.status =1
 AND p.status =1 AND p.home_rotation <>1 AND p.homefeatured <>1 AND p.id =pc.program_id group by p.id ";
 
 		$db->setQuery( $query1 );
	 	$rows = $db->loadObjectList();
 foreach($rows as $res){
     echo $res->pid."<br>";
 }

?>
