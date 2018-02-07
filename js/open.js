/*-----Toggling According -----*/
$(document).ready(function() {
    $("#accordian .about h2").click(function() {
      $('.about h2').addClass('checked');
      $('.blog h2').addClass('small'); 
      $('.logo').addClass('bottom'); 
      $("#accordian .blog").animate(
        { width: "9.5%"}, 500);
      $("#accordian .about").animate(
        { width: "64.55%"}, 500);
      $("#accordian .about > div").show(500);
      $("#accordian .blog > div").hide(500);
      $('.blog h2').removeClass('checked');
      $('.about h2').removeClass('small'); 
    });
    $("#accordian .blog h2").click(function() {
      $('.blog h2').addClass('checked'); 
      $('.about h2').addClass('small');  
      $('.logo').addClass('bottom');     
      $("#accordian .about").animate(
        { width: "9.5%" }, 500);
      $("#accordian .blog").animate(
        { width: "64.55%" }, 500);
      $("#accordian > .blog > div").show(500);
      $("#accordian > .about > div").hide(500);
      $('.about h2').removeClass('checked');
      $('.blog h2').removeClass('small');     
    });
    $("p").click(function() {
      $("#accordian .about").animate(
        { width: "45%"}, 500);
      $("#accordian .blog").animate(
        {width: "45%"}, 500);
      $("#accordian .blog > div").hide(500);
      $("#accordian .about > div").hide(500);
      $('.about h2').removeClass('checked');
      $('.blog h2').removeClass('checked');
      $('.logo').removeClass('bottom'); 
    });
  });