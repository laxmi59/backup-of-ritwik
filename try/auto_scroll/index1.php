<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script>
$('#slide_holder').agile_carousel({
	alt_attributes: "Highly Customizable,JQuery UI Transition Types & Effects,Automated Setup",
	continue_timer_after_click: "no",
	custom_data: "custom_data/custom_data_agile_carousel.php",
	first_slide_is_intro: "yes",
	first_last_buttons: "yes",
	hover_next_prev_buttons: "yes",
	intro_timer_length: "5000",
	intro_transtion: "fade",
	next_prev_buttons: "yes",
	php_doc_location: "http://www.agilecarousel.com/make_slides.php",
	pause_button: "yes",
	remove_content: "no",
	slide_buttons: "yes",
	//slide_captions: "JQuery Carousel Plugin|Agile Slide Types|JQuery UI Effects Available|Agile Settings|Carousel That's Built to Order", // not used. Usind "custom_data" instead
	//slide_directory: "agile_carousel_home_slides",
	slide_doctype: "xhtml",
	//slide_links: ",,http://agilecarousel.com,http://agilecarousel.com,http://agilecarousel.com", // not used. Using "custom data" instead
	slide_number_display: "yes",
	stop_rotate_on_hover: "yes",
	target_attributes: "_self,_blank,_self",
	timer_length: "5000",
	transition_duration: 2000,
	transition_easing: "swing",
	transition_type: "fade",
	water_mark: "yes"
});

// external controls example
$('#next_o').click(function(){
$.fn.agile_carousel.next();
});
$('#prev_o').click(function(){
$.fn.agile_carousel.prev();
});
$('#first_o').click(function(){
$.fn.agile_carousel.first();
});
$('#last_o').click(function(){
$.fn.agile_carousel.last();
});
$('#pause_play').click(function(){
$.fn.agile_carousel.pause_play();
});
$('#goto_3').click(function(){
$.fn.agile_carousel.go_to(3);
});

</script>
<?php
	$custom_data_arr = array(
	'custom_slide_files'       => "http://www.agilecarousel.com/agile_carousel_slides_w_intro/00_agile_intro.swf,http://www.agilecarousel.com/agile_carousel_slides_w_intro/01_slide.jpg,http://www.agilecarousel.com/agile_carousel_slides_w_intro/02_slide.jpg,http://www.agilecarousel.com/agile_carousel_slides_w_intro/03_slide.jpg",
	'custom_slide_links'       => "NA,http://www.agile_carousel.com,http://www.agile_carousel.com,http://www.agile_carousel.com",
	'custom_target_attributes' => "NA,_self,_blank,_self",
	'custom_alt_attributes'    => "NA,Slide 1,Slide 2,Slide 3",
	'custom_slide_captions'    => "Customize with a wide assortment of settings|Use JQuery UI Effects &amp; Easing|Automated Setup"
	);
	echo "lll";
?>
