var owl = $('.owl-carousel');
owl.owlCarousel({
    items:4,
    loop:true,
    margin:250,
    autoplay:true,
    autoplayHoverPause:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2,
            nav:false
        },
        1000:{
            items:4,
            loop:true
        }
    }
});

$(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
});