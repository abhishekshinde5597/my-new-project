jQuery(document).ready(function($) {

    $(".custom_slider_inner .custom_slide" ).each(function( index ) {
        jQuery('.custom_slider_inner .custom_slide').children('.item_dot').on('click', function() {
            jQuery('.custom_slider_inner .custom_slide').removeClass('active');
            jQuery(this).parent().addClass('active');
        });
    });

    $(".custom_slider_inner .custom_slide.active" ).prevAll().on('click', function() {
        jQuery('.custom_slider_inner').removeClass('ClickOnNext');
        jQuery('.custom_slider_inner').addClass('ClickOnPrev');
    });

    $(".custom_slider_inner .custom_slide.active" ).nextAll().on('click', function() {
        jQuery('.custom_slider_inner').removeClass('ClickOnPrev');
        jQuery('.custom_slider_inner').addClass('ClickOnNext');
    });

});