var btn = $(".top-back");

$(window).scroll(function() {

  

  if ($(window).scrollTop() > 600) {

    btn.addClass('show');
    

  } else {

    btn.removeClass('show');


  }

});
