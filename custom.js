// sticky header JS
jQuery(window).on("load scroll", function () {
  var height = jQuery(window).scrollTop();
  if (height >= 60) {
    jQuery('.aquaprox-menu').addClass('sticky-header');
  } else {
    jQuery('.aquaprox-menu').removeClass('sticky-header');
  }
});


// innovation-post-slider js Start
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

// production-post-slider js Start
jQuery('.production-post-slider').slick({
  slidesToScroll: 1,
  slidesToShow: 1.5,
  centerMode: true,
  centerPadding: '0',
  dots: false,
  infinite:false,
  asNavFor: '.slider-nav-thumbnails .elementor-icon-list-items',
  responsive: [
    {
      breakpoint: 1281,
      settings: {
        slidesToShow: 1.5,
      }
    },
    
  ]
});

jQuery('.slider-nav-thumbnails .elementor-icon-list-items').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  asNavFor: '.production-post-slider',
  arrows: false,
  dots: false,
  focusOnSelect: true,
  accessibility: false,
  draggable: false,
  infinite:false,
  variableWidth: true
});

// Remove active class from all thumbnail slides
jQuery('.slider-nav-thumbnails .elementor-icon-list-items .slick-slide').removeClass('slick-active');

// Set active class to first thumbnail slides
jQuery('.slider-nav-thumbnails .elementor-icon-list-items .slick-slide').eq(0).addClass('slick-active');

// On before slide change match active thumbnail to current slide
jQuery('.production-post-slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
  var mySlideNumber = nextSlide;
  jQuery('.slider-nav-thumbnails .elementor-icon-list-items .slick-slide').removeClass('slick-active');
  jQuery('.slider-nav-thumbnails .elementor-icon-list-items .slick-slide').eq(mySlideNumber).addClass('slick-active');
});

// custom arrows
jQuery('.prev-arrow.production').click(function (e) {
  jQuery('.production-post-slider').slick('slickPrev');
});
jQuery('.next-arrow.production').click(function (e) {
  jQuery('.production-post-slider').slick('slickNext');
});
// production-post-slider js End