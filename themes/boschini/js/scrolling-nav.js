$(function() {
    $(document).on('click', 'a.page-scroll', function(event) {
        var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top-0
            }, 1000, 'easeInOutExpo');
        event.preventDefault();
    });
});

$(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
        $(".menu-scroll-yes").addClass("active");
        $(".menu-scroll-yes").addClass("menu-scroll fadeIn animated");
    } else {
        $(".menu-scroll-yes").removeClass("active");
        $(".menu-scroll-yes").removeClass("menu-scroll fadeIn animated");
        $(".border-menu ").addClass("fadeInLeft animated");
    }
});

// $(document).ready(function(){
//     if ($(".navbar").offset().top > 50) {
//         $(".navbar-fixed-top").addClass("active");
//         $(".navbar-fixed-top").addClass("menu-scroll");
//     } else {
//         $(".navbar-fixed-top").removeClass("active");
//         $(".navbar-fixed-top").removeClass("menu-scroll");
//     }
// });




