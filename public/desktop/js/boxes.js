$(document).ready(function() {
    "use strict";
    $(".boxes .close-bt").click(function(e){
        e.preventDefault();
        $(this).parent().fadeOut();
    }); 
});