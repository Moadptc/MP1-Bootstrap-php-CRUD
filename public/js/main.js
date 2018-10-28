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



$(document).ready(function (){


    // Caching the scroll top element
    var scrollButton = $('#scroll-top');

    $(window).scroll(function ()
    {

        // console.log( $(this).scrollTop() );

        if( $(this).scrollTop() >= 500 ){
            scrollButton.show();
        }else{
            scrollButton.hide();
        }

    });

    // click on button scroll to top
    scrollButton.click(function (){
        $("html,body").animate({ scrollTop : 0 }, 1000);
    });

});