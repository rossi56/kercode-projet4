$(document).ready(function(){
    $('.contact,.submit').on('click', function(){
        $('.nom,.mail,.prenom, .message, .submit').toggleClass('slide');
        $('.contact,.titre-contact').toggleClass('hide');
    });
    
});

/*$(document).ready(function(){
    $('.submit').on('click',function(){
        $('.nom,.mail,.prenom, .message, .submit').toggleClass('go');
        
    });
});*/

/*---------------------POP-UP-INSCRIPTION-------------------------*/
$(document).ready(function(){
    $('#inscription').on('click', function(){
        $('.pop-inscription').removeClass('close');
        $('.pop-inscription').addClass('open');
    });
});

$(document).ready(function(){
    $('.cross').on('click', function(){
        $('.pop-inscription').removeClass('open');
        $('.pop-inscription').addClass('close');
    });
});


/*----------------------POP-UP-CONNEXION-------------*/
$(document).ready(function(){
    $('#connect').on('click', function(){
        $('.pop-connect').removeClass('close');
        $('.pop-connect').addClass('open');
    });
});

$(document).ready(function(){
    $('.cross').on('click', function(){
        $('.pop-connect').removeClass('open');
        $('.pop-connect').addClass('close');
    });
});