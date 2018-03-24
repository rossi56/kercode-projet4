
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

/*-------------------Affichage Message validation de formulaire */
// var input = $('input');
// $(document).ready(function(){
//     $('.envoi').hide();
//     $('.btn-submit').click(function(){
//       if(!empty('input')){
//         $('.envoi').show();
//       }
        
//         });
        
//     })

