$(window).scroll(function(){

    if($(document).scrollTop() > 300){

        $('nav').addClass('shrink');

    }else{

        $('nav').removeClass('shrink');

    }


});

