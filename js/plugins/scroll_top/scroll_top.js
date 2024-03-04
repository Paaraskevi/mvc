/******************************
 BOTTOM SCROLL TOP BUTTON
 ******************************/
// declare variable
var scrollTop = $(".scrollTop");

$(window).scroll(function() {
    // declare variable
    var topPos = $(this).scrollTop();
    // if user scrolls down - show scroll to top button
    if (topPos >window.innerHeight) {
        $(".scrollTop").css("opacity", "0.6");
    } else {
        $(".scrollTop").css("opacity", "0");
    }
}); // scroll END

//Click event to scroll to top
$(scrollTop).click(function() {
    $('html, body').animate({
        scrollTop: 0
    }, 800);
    return false;
}); // click() scroll top EMD
