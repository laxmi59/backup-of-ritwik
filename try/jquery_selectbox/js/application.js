var $state, $bar, $win, $userbar, $default_width, $slide;
$state = 'closed';
$bar = false;
$win = $(this);
$default_width = $($('div.container').get(0)).width();
$userbar = $('div.user-details');
$slide = $('<div id="slideout" class="docked" style="display: none;"><a href="#" class="trigger">&lt;</a></div>').appendTo($('body'));

$(window).resize(function() {
    if(navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPhone/i)) { //sussing out the iPad + iPhone
      $('head').append('<link href="/css/ipad.css" rel="stylesheet" type="text/css">');
      return false;
    }
      
    $bar = ($win.width() < $default_width);
    
    if($bar && $state === 'closed') {
        $state = 'open';
        $userbar.hide()
        $slide.append($userbar);
        $slide.fadeIn();
    } else if(!$bar && $state === 'open') {
        $state = 'closed';
        $slide.fadeOut();
        $('#header .container').append($userbar);
        $userbar.fadeIn();
        $slide.css('width', '27px');
    }
});

$('.trigger').click(function() {
    if($slide.width() === 27) {
        $(this).text('>');
        $(this).parent().removeClass('docked');
        $(this).parent().addClass('shown');
        $slide.animate({
                width: '300px'
            }, 300, function() {
                $userbar.fadeIn();
            });
    } else {
        $(this).text('<');
        $(this).parent().removeClass('shown');
        $(this).parent().addClass('docked');
        $slide.animate({
            width: '27px'
        }, 300, function() {
            $userbar.fadeOut();
        });
    }
        
    return false;
});

$(window).trigger('resize');

$(document).ready(function() {
    $("#search-form #query").focus(function() { creatticaSearch.takeFocus(this); });
    $("#search-form #query").blur(function() { creatticaSearch.loseFocus(this); });

    $('div.slider').each( function () {
      var elem_id = $(this).children().attr('id');
      $('#' + elem_id).easySlider({
        nextId: elem_id + "-next",
        prevId: elem_id + "-previous",
        continuous: false,
        indicators: true,
        prevText: "Prev"
      });
    });

    $('#fancy-login').attr('href', '/ajax_login').fancybox({
      'showCloseButton' : false,
      'autoDimensions' : false,
      'scrolling': 'no',
      'width': 380,
      'height': 430,
      'overlayColor': "#000000",
      'overlayOpacity': 0.9
    });

    $('#cancel-login').live('click', function() {
      $.fancybox.close();
      return false;
    });

    $('form.sortby [type=submit]').remove();
    $('form.sortby').jqTransform();

    $("form.sortby select").change(function () {
      //$(this).parents("form").submit();
	  //$("#maindivforchangeevent").css('background-position', 'bottom center');
	   $("#maindivforchangeevent").removeClass("jqTransformSelectWrapper round open");
	   $("#maindivforchangeevent").addClass("jqTransformSelectWrapper round");
    });


    // labelling logic for images and videos

    if ($("select#design_category_id option:selected").attr('is_video') == 1) {
      show_main_image();
    } else {
      show_video_ref();
    }

    $('select#design_category_id').change(function() {
      if ($("select#design_category_id option:selected").attr('is_video') == 1) {
        show_main_image();
      } else {
        show_video_ref();
      }
    });

    function show_video_ref() {
      $('label[for=design_video_ref]').parent().fadeOut(function() {
        $(this).children("input").val("");
        $('label[for=design_main_image]').parent().fadeIn();
      });
    }

    function show_main_image() {
      $('label[for=design_main_image]').parent().fadeOut(function() {
        $(this).children("input").val("");
        $('label[for=design_video_ref]').parent().fadeIn();
      });
    }

    $("a.hide").click(function() {
      $(this).parent().slideUp('slow'); 
      return false;
    });

    //animating background of small-containers
    $(".container-small img, .container-medium-img:not(.slider) img").bind('mouseover', function() {
        $(this).parent().parent().stop().animate({ 
            backgroundColor: "#ffffff"
        }, 300);
    }).bind('mouseout', function() {
        $(this).parent().parent().animate({ 
            backgroundColor: "#eaeaea"
        }, 300);
    });



    if (logged_in == true) {
      $("ul.category-rows").sortable({
        revert: true,
        handle: 'h2 span',
        container: 'parent',
        start: function(ev) {
          $(ev.originalTarget).parent().addClass('round').animate({
            backgroundColor: '#f0f0f0'
          }, 400);
        },
        stop: function(ev) {
          $(ev.originalTarget).parent().addClass('round').animate({
            backgroundColor: '#e3e3e3'
          }, 400);

          var sorting_order_array = [];

          var i = 0;
          $("ul.category-rows > li").each(function() {
            sorting_order_array[i] = $(this).attr("rel");
            i++;
          });

          $.post("/homepage/update_sorting_order", {
            sorting_order: sorting_order_array
          });
        }
      });
    } else {
      $("ul.category-rows > li > h2 > span.round").hide();
    }

    // unfollow

    var unfollow_targets = $("a.follow.activated");
    var label_text = $("span span", unfollow_targets).first().text();

    unfollow_targets.mouseover(function() {
      $("span span", this).text("Unfollow?");
    }).mouseout(function() {
      $("span span", this).text(label_text);
    });
    
    // upload design
    $("form#new_design").submit(function() {
      $("#upload").attr("disabled", "disabled");
      $("#upload span em").text("Please Wait");
    });

    // winner draw
    
    $("a#start_winner_draw").click(function() {
        $(this).fadeOut(function() {
            $("span#winning_draw_count_down").countdown({
                seconds: 10,
                callback: "announce_the_winner()"
            });
        });
        $("#winner_draw").fadeIn().jCarouselLite({
            auto: 1,
            speed: 1,
            vertical: true,
            circular: true,
            visible: 1,
            scroll: 1
        });
    });
});

function announce_the_winner() {
    $("span#winning_draw_count_down").fadeOut(function() {
        $(this).fadeIn().text("We have our winner! Congratualations!").fadeOut(function(){
            $(this).fadeIn(function(){
                $(this).fadeOut(function(){
                    $(this).fadeIn();
                });
            });
        });
    });
    $("#winner_draw ul").stop();
}

