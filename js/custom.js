// sticky header JS
jQuery(window).on("load scroll", function () {
  var height = jQuery(window).scrollTop();
  if (height >= 60) {
    jQuery('.aquaprox-menu').addClass('sticky-header');
  } else {
    jQuery('.aquaprox-menu').removeClass('sticky-header');
  }
});


// Expertise-slider js Start
jQuery('.innovation-post-slider').slick({
  slidesToShow: 3,
  centerMode:true,
  slidesToScroll: 1,
  variableWidth: true,
  variableHeight: true,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 3,
        variableWidth: true,
        variableHeight: true,
        centerMode:true
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 3,
        variableWidth: true,
        variableHeight: true,
        centerMode:true
      }
    }
  ]
});

// custom arrows
jQuery('.prev-arrow.innovation').click(function (e) {
  jQuery('.innovation-post-slider').slick('slickPrev');
});
jQuery('.next-arrow.innovation').click(function (e) {
  jQuery('.innovation-post-slider').slick('slickNext');
});
// innovation-post-slider js End







// notre-adn-industriel page slider js start
// production-post-slider js Start
jQuery(document).ready(function ($) {
  jQuery('.notre-adn-slider .production-post-slider').slick({
    slidesToScroll: 1,
    slidesToShow: 1.5,
    centerMode: false,
    centerPadding: '0',
    dots: false,
    speed: 800,
    infinite:false,
    asNavFor: '.slider-nav-thumbnails .elementor-icon-list-items',
    responsive: [
      
      {
        breakpoint: 1025,
        settings: {
          slidesToShow: 1.25,
          speed: 800,
        }
      },
      // {
      //   breakpoint: 768,
      //   settings: {
      //     slidesToShow: 1.24,
      //     autoplay: true,
      //     autoplaySpeed: 200,
      //     dots: false,
          
      //   }
      // },
    ]
  });
}),

jQuery('.notre-adn-slider .slider-nav-thumbnails .elementor-icon-list-items').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.production-post-slider',
  arrows: false,
  dots: false,
  focusOnSelect: true,
  accessibility: false,
  draggable: false,
  infinite:false,
  variableWidth: true,
swipeToSlide: false,
touchMove: false,
});

// Remove active class from all thumbnail slides
jQuery('.notre-adn-slider .slider-nav-thumbnails .elementor-icon-list-items .slick-slide').removeClass('slick-active');

// Set active class to first thumbnail slides
jQuery('.notre-adn-slider .slider-nav-thumbnails .elementor-icon-list-items .slick-slide').eq(0).addClass('slick-active');

// On before slide change match active thumbnail to current slide
jQuery('.notre-adn-slider .production-post-slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
  var mySlideNumber = nextSlide;
  jQuery('.slider-nav-thumbnails .elementor-icon-list-items .slick-slide').removeClass('slick-active');
  jQuery('.slider-nav-thumbnails .elementor-icon-list-items .slick-slide').eq(mySlideNumber).addClass('slick-active');
});
// custom arrows
jQuery('.prev-arrow.production').click(function (e) {
  jQuery('.production-post-slider').slick('slickPrev');
});
jQuery(' .next-arrow.production').click(function (e) {
  jQuery('.production-post-slider').slick('slickNext');
});
// production-post-slider js End
jQuery('.notre-adn-slider .production-post-slider').on('setPosition', function(event, slick, currentSlide){

  if(jQuery('.production-post-slider .slick-prev').attr('aria-disabled')=="true") {
         jQuery('.prev-arrow.production').addClass('disabled');
     }
   else {
         jQuery('.prev-arrow.production').removeClass('disabled');
   }
   
   if(jQuery('.production-post-slider .slick-next').attr('aria-disabled')=="true") {
         jQuery('.next-arrow.production').addClass('disabled');
     }
   else {
         jQuery('.next-arrow.production').removeClass('disabled');
   }
});
// notre-adn-industriel page slider js END


// performance-industrielle page slider js start
jQuery(document).ready(function ($) {
  jQuery('.perf-slider .production-post-slider').slick({
    slidesToScroll: 1,
    slidesToShow: 1.5,
    centerMode: false,
    centerPadding: '0',
    dots: false,
    speed: 800,
    infinite:false,
    asNavFor: '.slider-nav-thumbnails .elementor-icon-list-items',
    responsive: [
      
      {
        breakpoint: 1025,
        settings: {
          slidesToShow: 1.25,
          speed: 800,
        }
      },
      // {
      //   breakpoint: 768,
      //   settings: {
      //     slidesToShow: 1.24,
      //     autoplay: true,
      //     autoplaySpeed: 200,
      //     dots: false,
          
      //   }
      // },
    ]
  });
}),

jQuery('.perf-slider .slider-nav-thumbnails .elementor-icon-list-items').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.production-post-slider',
  arrows: false,
  dots: false,
  focusOnSelect: true,
  accessibility: false,
  draggable: false,
  infinite:false,
  variableWidth: true,
swipeToSlide: false,
touchMove: false,
});

// Remove active class from all thumbnail slides
jQuery('.perf-slider .slider-nav-thumbnails .elementor-icon-list-items .slick-slide').removeClass('slick-active');

// Set active class to first thumbnail slides
jQuery('.perf-slider .slider-nav-thumbnails .elementor-icon-list-items .slick-slide').eq(0).addClass('slick-active');

// On before slide change match active thumbnail to current slide
jQuery('.perf-slider .production-post-slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
  var mySlideNumber = nextSlide;
  jQuery('.perf-slider .slider-nav-thumbnails .elementor-icon-list-items .slick-slide').removeClass('slick-active');
  jQuery('.perf-slider .slider-nav-thumbnails .elementor-icon-list-items .slick-slide').eq(mySlideNumber).addClass('slick-active');
});
// custom arrows
jQuery('.prev-arrow.production').click(function (e) {
  jQuery('.production-post-slider').slick('slickPrev');
});
jQuery('.next-arrow.production').click(function (e) {
  jQuery('.production-post-slider').slick('slickNext');
});
// production-post-slider js End
jQuery('.perf-slider .production-post-slider').on('setPosition', function(event, slick, currentSlide){

  if(jQuery('.production-post-slider .slick-prev').attr('aria-disabled')=="true") {
         jQuery('.prev-arrow.production').addClass('disabled');
     }
   else {
         jQuery('.prev-arrow.production').removeClass('disabled');
   }
   
   if(jQuery('.production-post-slider .slick-next').attr('aria-disabled')=="true") {
         jQuery('.next-arrow.production').addClass('disabled');
     }
   else {
         jQuery('.next-arrow.production').removeClass('disabled');
   }
});
// performance-industrielle page slider js start


// Expertise page -slider js Start
jQuery('.expertise-slider .production-post-slider').slick({
  slidesToScroll: 1,
  slidesToShow: 1.25,
  centerMode: true,
  centerPadding: '0',
  dots: false,
  speed: 800,
  infinite:false,
  asNavFor: '.expertise-slider .slider-nav-thumbnails .elementor-icon-list-items',
  responsive: [
    
    {
      breakpoint: 1025,
      settings: {
        slidesToShow: 1.25,
        speed: 800,
      }
    },
    // {
    //   breakpoint: 768,
    //   settings: {
    //     slidesToShow: 1.24,
    //     autoplay: true,
    //     autoplaySpeed: 200,
    //     dots: false,
        
    //   }
    // },
  ]
});

jQuery('.expertise-slider .slider-nav-thumbnails .elementor-icon-list-items').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.expertise-slider .production-post-slider',
  arrows: false,
  dots: false,
  focusOnSelect: true,
  accessibility: false,
  draggable: false,
  infinite:false,
  variableWidth: true,
  swipeToSlide: false,
touchMove: false,
  
});
// Remove active class from all thumbnail slides
jQuery('.expertise-slider .slider-nav-thumbnails .elementor-icon-list-items .slick-slide').removeClass('slick-active');

// Set active class to first thumbnail slides
jQuery('.expertise-slider .slider-nav-thumbnails .elementor-icon-list-items .slick-slide').eq(0).addClass('slick-active');

// On before slide change match active thumbnail to current slide
jQuery('.expertise-slider .production-post-slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
  var mySlideNumber = nextSlide;
  jQuery('.expertise-slider .slider-nav-thumbnails .elementor-icon-list-items .slick-slide').removeClass('slick-active');
  jQuery('.expertise-slider .slider-nav-thumbnails .elementor-icon-list-items .slick-slide').eq(mySlideNumber).addClass('slick-active');
});

// custom arrows
jQuery('.prev-arrow.production').click(function (e) {
  jQuery('.expertise-slider .production-post-slider').slick('slickPrev');
});
jQuery('.next-arrow.production').click(function (e) {
  jQuery('.expertise-slider .production-post-slider').slick('slickNext');
});
// production-post-slider js End
jQuery('.expertise-slider .production-post-slider').on('setPosition', function(event, slick, currentSlide){

  if(jQuery('.expertise-slider .production-post-slider .slick-prev').attr('aria-disabled')=="true") {
         jQuery('.prev-arrow.production').addClass('disabled');
     }
   else {
         jQuery('.prev-arrow.production').removeClass('disabled');
   }
   
   if(jQuery('.expertise-slider .production-post-slider .slick-next').attr('aria-disabled')=="true") {
         jQuery('.next-arrow.production').addClass('disabled');
     }
   else {
         jQuery('.next-arrow.production').removeClass('disabled');
   }
});

// Expertise-slider js End



jQuery(document).ready(function (jQuery) {
// Function to filter jobs based on input
  function filter_jobs() {
      var keyword = jQuery('#keyword').val();
      var location = jQuery('#location').val();
      var category = jQuery('#category').val();
      var subcategory = jQuery('#subcategory').val();
if(keyword || location || category || subcategory ){
      jQuery.ajax({
          url: '/wp-admin/admin-ajax.php',
          data: {
              action: 'filter_jobs',
              keyword: keyword,
              location: location,
              category: category,
              subcategory: subcategory
          },
          type: 'post',
          success: function (response) {
              jQuery('#job-listings').html(response);

          }
      });
  }
  else {
    // If all fields are empty, append a message to the '#job-listings' element
    jQuery('#job-listings').html('<p>Veuillez renseigner le champ</p>');
  }
  }
  // Initial load of all jobs
  //load_all_jobs();
  // Trigger AJAX on form submission
  jQuery('#job-filter-form').submit(function (e) {
      e.preventDefault(); // Prevent the default form submission
      filter_jobs();
  });
});

jQuery(document).ready(function (jQuery) {

//file upload
 
jQuery("#form-field-field_66be324, #form-field-field_9ab1d10").after('<div class="uplod-img"><img src="/wp-content/uploads/2023/11/Icon-5.png" alt="arrow"></div>');
jQuery("#form-field-field_66be324, #form-field-field_9ab1d10").change(function(){
  // jQuery(".elementor-field-type-upload").removeClass('test');
  jQuery(this).parent().addClass('aq-fileupload');
});

var urlParams = new URLSearchParams(window.location.search);
var jobTitleValue = urlParams.get('jobtitle');
var companyname = urlParams.get('companyname');
jQuery('#form-field-jobtitle').val(jobTitleValue);
jQuery('#form-field-companyname').val(companyname);

});

// mission page slider
jQuery('.technogies_slider').slick({
  slidesToScroll: 1,
  slidesToShow: 4,
  dots: false,
  arrows:false,
  speed: 800,
  infinite:false,
  responsive: [
    {
      breakpoint: 1025,
      settings: {
        slidesToShow: 3,
        speed: 800,
      }
    },
    {
      breakpoint: 825,
      settings: {
        slidesToShow: 2,
      }
    },
    {
      breakpoint: 425,
      settings: {
        slidesToShow: 1.11,
        speed: 800,
      }
    },
  ]
});


var btn = jQuery('#scroll-button');
var scrollThreshold = 0.8; // Set the scroll threshold to 80%

jQuery(window).on("load scroll", function () {
    
    var scrollPercentage = (jQuery(window).scrollTop() + jQuery(window).height()) / jQuery(document).height();

    if (scrollPercentage > scrollThreshold) {
      btn.addClass('show');
      } else {
        btn.removeClass('show');
      }
	});
	btn.on('click', function(e) {
		e.preventDefault();
		jQuery('html, body').animate({ scrollTop: 0 }, '600');
	});



// Homepage entity mobile slider
  jQuery(window).on('load resize orientationchange', function() {
    // $('.mySlider').each(function(){
      var $carousel = jQuery('.innovation-post-slider');
      if (jQuery(window).width() < 768) {
        if ($carousel.hasClass('slick-initialized')) {
          $carousel.slick('unslick');
        }
  
        if(!$carousel.hasClass('newparent')) {
          var totalChild = $carousel.children().length;
          var row1 = Math.ceil(totalChild/2);
          var row2 = totalChild - row1;
          var $r1Items = $carousel.children().slice(0, row1);
          var $r2Items = $carousel.children().slice(row1, totalChild);
    
          $carousel.addClass('newparent');
          $r1Items.wrapAll("<div class='mySlider1'></div>");
          $r2Items.wrapAll("<div class='mySlider1'></div>");
  
          jQuery('.mySlider1').slick({
            slidesToShow: 3, 
            centerMode:true,
            slidesToScroll: 1,
            variableWidth: true,
            variableHeight: true,
            arrows: false,
            mobileFirst: true,
          });
        }
      }
      else{
        if($carousel.hasClass('newparent')) {
          $carousel.children().slick('unslick');
          $carousel.children(':first').children().unwrap();
          $carousel.children(':last').children().unwrap();
          $carousel.removeClass('newparent');
        }
  
        if (!$carousel.hasClass('slick-initialized')) {
          $carousel.slick({
            slidesToShow:3, 
            centerMode:true,
            slidesToScroll: 1,
            variableWidth: true,
            variableHeight: true,
            mobileFirst: true,
          });
        }
      }
    // });
  });