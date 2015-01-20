$(document).ready(function() {
    "use strict";
    /********************Settingspanel**********************/
    $('.colors-list li').each(function(){
        var color = $(this).attr('data-color');
        $(this).find('a').css({
            'background':color
        });
        if(color=='#'+$.cookie('color')){
            $('.colors-list li').removeClass('active');
            $(this).addClass('active');
        }
        if ($(this).hasClass('active')){
            $('#settings-form #color').val(color.replace('#',''));
        }
    });
                
    if ($.cookie('theme')){
        $("link#theme").attr("href",$.cookie('theme'));
    }
    if($.cookie('background')){
        if($.cookie('background').indexOf('city-bg.jpg')!=-1){
            $('#big_image').attr('checked','checked');
        } else {
            $('#big_image').removeAttr('checked');
        }
        $('.backgrounds-list li').each(function(){
            if($.cookie('background').indexOf($(this).attr('data-background'))!=-1){
                $(this).addClass('active');
            }
        });
    }
                
    if($.cookie('background')){
        if($.cookie('background').indexOf('city-bg.jpg')==-1){
            $('.bg').css({
                'background-image':'url('+ $.cookie('background')+')',
                'background-repeat': 'repeat'
            });
        } else {
            $('.bg').css({
                'background-image':'url('+ $.cookie('background')+')',
                'background-position':'center top',
                'background-repeat': 'no-repeat'
            });
        }
        
    } else {
        var link = getPart();
        link += 'images/city-bg.jpg';
        $('.bg').css({
            'background-image':'url('+link+')',
            'background-position':'center top',
            'background-repeat': 'no-repeat'
        });
    }
                
    $('.colors-list li').click(function(e){
        e.preventDefault();
        var color = $(this).attr('data-color');
        $('#settings-form #color').val(color.replace('#',''));
                    
        var link = getPart();
        link += '/css/color_themes/'+color.replace('#','')+'.css';
        $("link#theme").attr("href",link.replace('#',''));
        $.cookie('theme', link.replace('#',''));
        $.cookie('color', color.replace('#',''));
                    
        $('.colors-list li').removeClass('active');
        $(this).addClass('active');
                    
        return false;
    });
                
                
    $('.backgrounds-list li').click(function(e){
        e.preventDefault();
        var background = $(this).attr('data-background');
                   
        var link = getPart();
        $('.backgrounds-list li').removeClass('active');
        $(this).addClass('active');           
        if($('#big_image').attr('checked')!='checked'){
            link += 'images/backgrounds/'+background;
            $('.bg').css({
                'background-image':'url('+link+')',
                'background-repeat': 'repeat'
            });
            
            $.cookie('background', link);
        } else {
            link += 'images/city-bg.jpg';
            $('.bg').css({
                'background-image':'url('+link+')',
                'background-position':'center top',
                'background-repeat': 'no-repeat'
            });
            $.cookie('background', link); 
        }
    });
    $('#big_image').click(function(e){
        var link = getPart();
        if($(this).attr('checked')=='checked'){
            link += 'images/city-bg.jpg';
            $('.bg').css({
                'background-image':'url('+link+')',
                'background-position':'center top',
                'background-repeat': 'no-repeat'
            });
        } else {
            var background = $('.backgrounds-list li.active').attr('data-background');
            link += 'images/backgrounds/'+background;
            $('.bg').css({
                'background-image':'url('+link+')',
                'background-repeat': 'repeat'
            });
        }
        $.cookie('background', link);
    })
    $('.reset').click(function(e){
        e.preventDefault();
        var link = getPart();
        var link1=link+'css/color_themes/f04f00.css';
        $("link#theme").attr("href",link1.replace('#',''));
        $.cookie('theme', link1.replace('#',''));
        $.cookie('color','f04f00');
        var link2=link+'images/city-bg.jpg';
        console.log(link2);
        $('.bg').css({
            'background-image':'url('+link2+')',
            'background-repeat': 'repeat'
        });
        $('#big_image').attr({
            'checked':'checked'
        });
        $.cookie('background', link2);
    })
    function getPart(){
        var arr = new Array();
        arr = window.location.href.split('/');
        var link="";
        var i;
        for (i=0;i<arr.length-1;i++){
            link+=arr[i]+'/';
        }
        return link;
    }
                
    $('.settings-panel-top').click(function(){
        var settings_panel = $(this).parent();
        if(settings_panel.hasClass('active')){
            settings_panel.stop().animate({
                'left':'-258px'
            });
            settings_panel.removeClass('active');
        } else {
            settings_panel.stop().animate({
                'left':'0px'
            });
            settings_panel.addClass('active'); 
        }
    })
/****************************************************/
});