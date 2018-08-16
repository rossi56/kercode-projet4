/*----------------------BURGER-------------*/



$(document).ready(function () {
  $('.mask ,.burger').click(function () {
    $('.mask').toggleClass('closed');
    $('nav').toggleClass('nav-mobil');
    $('.burger').toggleClass('active');

  });
});

/*-----------------PAUSE VIDEO------------------*/

var pause = document.getElementById('pause');
var video = document.getElementById('video');

pause.addEventListener('click', function () {
  if (video.paused) {
    video.play();
  } else {
    video.pause();
  }
});




/*------------------SCROLLTOP-------------------------- */



$(document).ready(function () {

  var scrollTop = $(".scrollTop");

  $(window).scroll(function () {
    var topPos = $(this).scrollTop();

    if (topPos > 100) {
      $(scrollTop).css("opacity", "1");

    } else {
      $(scrollTop).css("opacity", "0");
    }

  });


  $(scrollTop).click(function () {
    $('html, body').animate({
      scrollTop: 0
    }, 1000);
    return false;

  });

});

