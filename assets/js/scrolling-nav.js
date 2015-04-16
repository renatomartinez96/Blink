//jQuery to collapse the navbar on scroll
$(window).scroll(function() {
    if ($(".navbar").offset().top > $("#about").offset().top ) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
        $(".navbar").removeClass("transparent");
        $(".inputnav").addClass("input-sm");
        $(".btnnav").addClass("btn-sm");
        $(".navbarbtns").removeClass("hidden");
        $("#logonav").attr("src","assets/img/brand1.png");
        $("#logonav").attr("width","100");
        
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
        $(".navbar").addClass("transparent");
        $(".inputnav").removeClass("input-sm");
        $(".btnnav").removeClass("btn-sm");
        $(".navbarbtns").addClass("hidden");
        $("#logonav").attr("src","assets/img/brand2.png");
        $("#logonav").attr("width","150");
    }
});

//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});
