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

/*----------------------------------AJAX------------------------------*/
// $(document).ready(function () {
//   $(".btn-submit").click(function () {
//     $('.form').submit(function (e) {
//       e.preventDefault();
//       var formulaire = $(this);
//       var post_url = formulaire.attr('contact');
//       var post_data = formulaire.serialize();
//       // On peut ajouter une image de chargement pour faire patienter l'internaute
//       $('#loader3', formulaire).html('<img src=../../images/ajax-loader.gif />Please wait...');
//       //Appel AJAX
//       $.ajax({
//         type: 'POST',
//         url: post_url,
//         data: post_data,
        
//       });
//     });
//   });
// });