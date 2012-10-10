
(function($){$.fn.agile_carousel=function(options){slide_containter_elem=$(this);var defaults={first_last_buttons:"no",hover_next_prev_buttons:"no",next_prev_buttons:"yes",pause_button:"no",slide_buttons:"no",slide_captions:"no",slide_directory:"slides",slide_doctype:"html",slide_links:"no",slide_number_display:"no",slide_timer_length:"7000",slide_timer_on:"yes",transition_duration:1000,transition_easing:"swing",transition_type:"carousel",water_mark:"no"};var opts=$.extend(defaults,options);$.ajax({type:"POST",url:"make_slides.php",cache:false,data:{first_last_buttons:defaults.first_last_buttons,hover_next_prev_buttons:defaults.hover_next_prev_buttons,next_prev_buttons:defaults.next_prev_buttons,pause_button:defaults.pause_button,slide_buttons:defaults.slide_buttons,slide_captions:defaults.slide_captions,slide_directory:defaults.slide_directory,slide_doctype:defaults.slide_doctype,slide_links:defaults.slide_links,slide_number_display:defaults.slide_number_display,water_mark:defaults.water_mark},success:function(html){slide_containter_elem.html(html);slideshow();}});function slideshow(){button_class="slide_1;";curr_slide_id="slide_1";curr_slide_id_number=1;slideshow_paused="not_paused";transition_type=defaults.transition_type;slide_finder=$("#slide_holder_inner div.slide");slide_id_array=[];slides_index_counter=0;slide_finder.each(function(){slide_id_array[slides_index_counter]=$(this).attr("id");slides_index_counter++;});slide_captions_array=defaults.slide_captions.split("|");slide_height=$('#slide_holder_inner').height();half_slide_height_raw=slide_height/2;half_slide_height=parseFloat(half_slide_height_raw);slide_holder_width=$(slide_containter_elem).width();slide_holder_height=$(slide_containter_elem).height();slide_holder_inner_width=$('#slide_holder_inner').width();slide_holder_inner_height=$('#slide_holder_inner').height();slide_holder_inner_width_px=slide_holder_inner_width+'px';slide_holder_inner_height_px=slide_holder_inner_height+'px';all_slides_width_raw=slide_holder_inner_width*slide_id_array.length;all_slides_width=all_slides_width_raw+'px';slide_finder_array_length=slide_finder.length;carousel_tranition_number_slides_visible=defaults.carousel_tranition_number_slides_visible;$('#slide_holder_inner div.slide:not(#slide_1)').hide();$('#slide_holder_inner .pause_button').show();$("#slide_buttons li").removeAttr("id");$("#slide_buttons .slide_1").attr("id","button_selected");slide_finder.each(function(){update_slide_number_display=function(){if(defaults.slide_number_display=="yes"){var id_to_split=curr_slide_id;var the_currrent_slide_number_array=id_to_split.split("_");var the_current_slide_number=the_currrent_slide_number_array.pop();$("#slide_number_display span").html(the_current_slide_number+" of"+" <span>"+slide_id_array.length+"</span>");}}
if(defaults.slide_number_display=="yes"){update_slide_number_display();}})
pause=function(){clearInterval(slideshow_timer);$("#pause_button span").html("play");slideshow_paused="paused";$("#pause_button").attr("class","paused_button");}
change_slide_caption=function(){if(defaults.slide_captions!="no"){curr_caption=slide_captions_array[curr_slide_id_number-1];if(curr_caption==null){curr_caption="";}
$("#slide_captions span").html(curr_caption);}}
change_slide_caption();if(defaults.transition_type=='fold'){options_object={'size':half_slide_height,'easing':defaults.transition_easing}}else{options_object={'easing':defaults.transition_easing};}
if((defaults.jquery_ui_effect_param!=null)&&(defaults.jquery_ui_effect_value!=null)){jquery_ui_effect_param=defaults.jquery_ui_effect_param;if((defaults.jquery_ui_effect_param=="distance")||(defaults.jquery_ui_effect_param=="number")||(defaults.jquery_ui_effect_param=="percent")||(defaults.jquery_ui_effect_param=="size")||(defaults.jquery_ui_effect_param=="times")||(defaults.jquery_ui_effect_param=="direction")){jquery_ui_effect_value=defaults.jquery_ui_effect_value;}else{jquery_ui_effect_value="'"+defaults.jquery_ui_effect_value+"'";}
options_object[jquery_ui_effect_param]=jquery_ui_effect_value;}
if(defaults.transition_type=='carousel'){for(i=0;i<slide_finder_array_length;i++){var the_slide=slide_finder[i];var x_pos=(slide_holder_inner_width)*i;$(the_slide).css('left',x_pos);}
$('#row_of_slides').css('width',all_slides_width);}
function carousel_transition(){$('.slide').show();var next_slide_index=next_slide_id_number-1;var slide_x_pos_raw=(slide_holder_inner_width*next_slide_index)*(-1);var slide_x_pos=slide_x_pos_raw+'px';$('#row_of_slides').stop().animate({"left":slide_x_pos},{"duration":defaults.transition_duration,"easing":defaults.transition_easing});}
function fade_transition(){$('#slide_holder_inner div.slide').each(function(){if($(this).attr('id')!=curr_slide_id){$(this).hide();}})
$('#slide_holder_inner div[@id$="'+curr_slide_id+'"]').css("z-index","50");$('#slide_holder_inner div[@id$="'+button_class+'"]').css("z-index","100");$('#slide_holder_inner div[@id$="'+button_class+'"]').animate({"opacity":"show"},{"duration":defaults.transition_duration,"easing":defaults.transition_easing});}
function ui_effects_transition(){next_top_show_next=function(){$('#slide_holder_inner div.slide').show().css('z-index','20');$('#slide_holder_inner div[@id$="'+next_slide_id+'"]').css('z-index','60');$('#slide_holder_inner div[@id$="'+curr_slide_id+'"]').css('z-index','50');$('#slide_holder_inner div[@id$="'+next_slide_id+'"]').stop().show(defaults.transition_type,options_object,defaults.transition_duration);}
next_bottom_hide_curr=function(){$('#slide_holder_inner div.slide').show().css('z-index','20');var the_next_div=$('#slide_holder_inner div[@id$="'+next_slide_id+'"]').css('z-index','50');$(the_next_div).css('z-index','1000');$('#slide_holder_inner div[@id$="'+curr_slide_id+'"]').css('z-index','60');$('#slide_holder_inner div[@id$="'+curr_slide_id+'"]').effect(defaults.transition_type,options_object,defaults.transition_duration);}
if(defaults.transition_type=='blind'||defaults.transition_type=='bounce'||defaults.transition_type=='clip'||defaults.transition_type=='drop'||defaults.transition_type=='fold'||defaults.transition_type=='shake'||defaults.transition_type=='slide'||defaults.transition_type=='scale'||defaults.transition_type=='pulsate'){next_top_show_next();}else if(defaults.transition_type=='explode'||defaults.transition_type=='puff'){next_bottom_hide_curr();}else{next_top_show_next();};}
function scroll_right_transition(){var slideshow_width=$('#slide_holder_inner').width();var n_slideshow_width=-1*slideshow_width+'px';$('#slide_holder_inner div[@id$="'+button_class+'"]').stop().show().css("left",n_slideshow_width);$('#slide_holder_inner div[@id$="'+button_class+'"]').stop().show().animate({"left":0},{'easing':defaults.transition_easing},defaults.transition_duration);$('#slide_holder_inner div[@id$="'+curr_slide_id+'"]').stop().animate({"left":slideshow_width},{'easing':defaults.transition_easing},defaults.transition_duration);}
function no_effect_transition(){$('#slide_holder_inner div[@id$="'+button_class+'"]').show();$('#slide_holder_inner div[@id$="'+curr_slide_id+'"]').hide();}
function rotate_slides(){function transition_slides(){if(curr_slide_id!=button_class){if(transition_type=='fade'){fade_transition();}else if(transition_type=='no_transition_effect'){no_effect_transition();}else if(transition_type=='scroll_right'){scroll_right_transition();}else if(transition_type=='carousel'){carousel_transition();}else if(transition_type=='carouselx'){carouselx_transition();}else if(transition_type=='blind'||transition_type=='clip'||transition_type=='drop'||transition_type=='explode'||transition_type=='fold'||transition_type=='puff'||transition_type=='slide'||transition_type=='scale'||transition_type=='pulsate'){ui_effects_transition();}else{no_effect_transition();}};curr_slide_id_number=next_slide_id_number;function make_curr_slide_id(){curr_slide_id=button_class;};make_curr_slide_id();}
transition_slides();function animate_slides(){}}
function change_button_class(button_class){$("#slide_buttons li").removeAttr("id");$("#slide_buttons li").each(function(){if($(this).attr("class")==button_class){$(this).attr("id","button_selected");}});}
$(".pause_button").click(function(){if(slideshow_paused=="paused"){skip('next');if(defaults.slide_timer_on="yes"){slideshow_timer=setInterval("skip('next')",defaults.slide_timer_length);}
slideshow_paused="not_paused";$("#pause_button span").html("pause");$(this).attr("class","pause_button");}else if(slideshow_paused=="not_paused"){clearInterval(slideshow_timer);slideshow_paused="paused";$(this).attr("class","paused_button");pause();}})
skip=function(direction){curr_slide_id_string=curr_slide_id.toString();split_curr_slide_id_string=curr_slide_id.split("_");curr_slide_id_string=split_curr_slide_id_string.pop();curr_slide_id_number=parseFloat(curr_slide_id_string);if(direction=='next'){next_slide_id_number=curr_slide_id_number+1;}else if(direction=='prev'){next_slide_id_number=curr_slide_id_number-1;}else if(direction=='first'){next_slide_id_number=slide_id_array.length;curr_slide_id_number=1;}else if(direction=='last'){next_slide_id_number=1;curr_slide_id_number=slide_id_array.length;};next_slide_id="slide_"+next_slide_id_number;if(next_slide_id_number>slide_id_array.length){next_slide_id="slide_1";curr_slide_id_number=slide_id_array.length;next_slide_id_number=1;}else if(next_slide_id_number<1){next_slide_id="slide_"+slide_id_array.length;next_slide_id_number=slide_id_array.length;}
button_class=next_slide_id;rotate_slides();change_button_class(button_class);if(defaults.slide_number_display=="yes"){update_slide_number_display();}
change_slide_caption();}
if(defaults.slide_timer_on="yes"){slideshow_timer=setInterval("skip('next')",defaults.slide_timer_length);}
$("#slide_buttons li").each(function(){$(this).click(function(){button_class=$(this).attr("class");change_button_class(button_class);split_button_class_string=button_class.split("_");button_class_string=split_button_class_string.pop();next_slide_id_number=parseFloat(button_class_string);rotate_slides();change_slide_caption();update_slide_number_display();pause();return(false);});});$(".next_button").click(function(){skip('next');pause();});$(".prev_button").click(function(){pause();skip('prev');});if(defaults.hover_next_prev_buttons=="yes"){$(".hover_button").fadeTo(1,0);$('#hover_prev_button').hover(function(){$("#hover_prev_button").stop().fadeTo("slow",0.95);},function(){$("#hover_prev_button").stop().fadeTo("slow",0.00);});$('#hover_next_button').hover(function(){$("#hover_next_button").stop().fadeTo("slow",0.95);},function(){$("#hover_next_button").stop().fadeTo("slow",0.00);});}
$("#first_button").click(function(){skip('last');pause();});$("#last_button").click(function(){pause();skip('first');});}}})(jQuery);