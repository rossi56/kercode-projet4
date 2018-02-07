var Split = {
    bloc: $('#bloc'),
    citation:$('.citation'),
    who:$('.who'),
    nav: $('nav'),
    text: $(".text"),
    blog: $('.about h2'),
    bio: $('.blog h2'),
    splitB: $('#split .blog'),
    splitA: $("#split .about"),
    splitAdiv: $("#split .about > div"),
    splitBlog: $("#split .about h2"),
    splitBio: $("#split .blog h2"),
    close: $('p'),
    hide: function () {
        Split.nav.hide();
        Split.bloc.hide();
   
    },
    show: function(){
        Split.citation.show();
    },
    
    init: function () {
        Split.splitBlog.on('click', function () {
            Split.nav.show();
            Split.who.hide();
            Split.bloc.hide();
            Split.blog.addClass('checked');
            Split.bio.addClass('small');
            Split.splitB.animate({
                width: "9.5%"
            }, 500);
            Split.splitA.animate({
                width: "64.55%"
            }, 500);
            Split.splitAdiv.show(500);
            Split.text.hide(500);
            Split.bio.removeClass('checked');
            Split.blog.removeClass('small');
        });
        Split.splitBio.on('click', function () {
            Split.bloc.show();
            Split.nav.hide();
            Split.bio.addClass('checked');
            Split.blog.addClass('small');

            Split.splitA.animate({
                width: "9.5%"
            }, 500);
            Split.splitB.animate({
                width: "64.55%"
            }, 500);
            Split.text.show(500);
            Split.splitAdiv.hide(500);
            Split.blog.removeClass('checked');
            Split.bio.removeClass('small');
        });
        Split.close.on('click', function () {
            Split.nav.hide();
            Split.bloc.hide();
            Split.splitA.animate({
                width: "45%"
            }, 500);
            Split.splitB.animate({
                width: "45%"
            }, 500);
            Split.text.hide(500);
            Split.splitAdiv.hide(500);
            Split.blog.removeClass('checked');
            Split.bio.removeClass('checked');

        });

    }
}
$(function(){
    Split.hide();
    Split.show();
})
$(function () {
    Split.init();
 
})
