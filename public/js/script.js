
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




/*------------------SCROLLTOP-------------------------- */
       
$(function() { $(".btn-submit").on('click', function() { $("HTML, BODY").animate({ scrollTop: 0 }, 1000); }); }); 


    



