$(document).ready(function() {
    "use strict";
    $('.sf-menu li').hover(
        function(){
            $(this).addClass('sfHover');
        },
        function(){
            $(this).removeClass('sfHover'); 
        }
        )
    
});
$(window).load(function(){
    sticky_relocate();
})
$(window).scroll(function(){
    sticky_relocate();
});
function sticky_relocate() {
    var window_top = $(window).scrollTop();
    var div_top = $('header').height()-33;
    if (window_top > div_top)
        $('.main>header').addClass('top-header')
    else
        $('.main>header').removeClass('top-header');
}