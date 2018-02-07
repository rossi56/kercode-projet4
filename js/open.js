/*-----Toggling According -----*/
$('#bloc').hide();
$('nav').hide();
$(document).ready(function () {
    $("#split .about h2").click(function () {
        $('nav').show();
        $('#bloc').hide();
        $('nav').show();
        $('.about h2').addClass('checked');
        $('.blog h2').addClass('small');

        $("#split .blog").animate({
            width: "9.5%"
        }, 500);
        $("#split .about").animate({
            width: "64.55%"
        }, 500);
        $("#split .about > div").show(500);
        $(".text").hide(500);
        $('.blog h2').removeClass('checked');
        $('.about h2').removeClass('small');
    });
    $("#split .blog h2").click(function () {
        $('#bloc').show();
        $('nav').hide();
        $('.blog h2').addClass('checked');
        $('.about h2').addClass('small');

        $("#split .about").animate({
            width: "9.5%"
        }, 500);
        $("#split .blog").animate({
            width: "64.55%"
        }, 500);
        $(".text").show(500);
        $("#split > .about > div").hide(500);
        $('.about h2').removeClass('checked');
        $('.blog h2').removeClass('small');
    });
    $("p").click(function () {
        $('nav').hide();
        $("#split .about").animate({
            width: "45%"
        }, 500);
        $("#split .blog").animate({
            width: "45%"
        }, 500);
        $(".text").hide(500);
        $("#split .about > div").hide(500);
        $('.about h2').removeClass('checked');
        $('.blog h2').removeClass('checked');
       
    });
});