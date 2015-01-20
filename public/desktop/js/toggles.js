$(document).ready(function() {
	"use strict";
    //When page loads...
    $(".toggle-body").hide(); //Hide all content
	
    //On Click Event
    $(".toggle-title").click(function() {
        if($(this).hasClass("active")){
            $(this).next().slideUp(); 
            $(this).removeClass("active");
        } else {
            $(this).next().slideDown();
            $(this).addClass("active");
        }
         
    });
	
});