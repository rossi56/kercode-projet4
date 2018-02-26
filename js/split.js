

$(document).ready(function(){
    $('.about').on('click',function(){
        $('#bloc').toggleClass('show');
        $('.blog').removeClass('splitOn');
        $('.blog').toggleClass('hide');
        $('.about').toggleClass('splitOn');
    });
});

$(document).ready(function(){
    $('.blog').on('click',function(){
        $('.about').toggleClass('hide');
        $('.about').removeClass('splitOn');
        $('.blog').toggleClass('splitOn');
    });
});

