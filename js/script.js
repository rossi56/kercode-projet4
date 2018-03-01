


/*----------------------POP-UP-CONTACT -------------*/
// $(document).ready(function(){
//     $('.contact').on('click', function(){
//         $('.pop-contact').removeClass('close');
//         $('.pop-contact').addClass('open');
//         $('.contact').hide();
//         $('.titre-contact').hide();
//     });
// });

// $(document).ready(function(){
//     $('.cross').on('click', function(){
//         $('.pop-contact').removeClass('open');
//         $('.pop-contact').addClass('close');
//         $('.contact').show();
//         $('.titre-contact').show();
//     });
// });

// $(document).ready(function(){
//     $('.btn-submit').on('click', function(){
//         $('.pop-contact').addClass('close');
//         setTimeout(  $('#envoi').css('display','block'),3000);
//     });
// });
/*----------------------POP-UP-INSCRIPTION-------------*/
// $(document).ready(function(){
//     $('#inscription').on('click', function(){
//         $('.pop-inscription').removeClass('close');
//         $('.pop-inscription').toggleClass('open');
//     });
// });

// $(document).ready(function(){
//     $('.cross').on('click', function(){
//         $('.pop-inscription').removeClass('open');
//         $('.pop-inscription').addClass('close');
//     });
// });


/*----------------------POP-UP-CONNEXION-------------*/
// $(document).ready(function(){
//     $('#connect').on('click', function(){
//         $('.pop-connect').removeClass('close');
//         $('.pop-connect').addClass('open');
//     });
// });

// $(document).ready(function(){
//     $('.cross').on('click', function(){
//         $('.pop-connect').removeClass('open');
//         $('.pop-connect').addClass('close');
//     });
// });
/*----------------------BURGER-------------*/



$(document).ready(function(){
    $('.mask ,.burger').click(function(){
        $('.mask').toggleClass('closed');
        $('nav').toggleClass('nav-mobil');
        $('.burger').toggleClass('active');

    });
});

/*-----------------PAUSE VIDEO------------------*/

var pause = document.getElementById('pause');
var video = document.getElementById('video');

pause.addEventListener('click', function(){
    if(video.paused){
        video.play();
    } else{
        video.pause();
    }
});
