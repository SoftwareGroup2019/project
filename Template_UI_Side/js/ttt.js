$(document).ready(function(){
 $('.collapsible').collapsible();

    $('.modal').modal();
    $(document).ready(function(){
    $('.sidenav').sidenav();
  });
  $(document).ready(function(){
    $('.slider').slider();
  });
  });
// start new Ad
$('.live-name').keyup(function (){

  $('live-preview .caption h3').text($(this).val());
});
$('.live-desc').keyup(function (){

  $('live-preview .caption h3').text($(this).val());
});
$('.live-price').keyup(function (){
  

  $('live-preview .price-tag').text('$' + $(this).val());
});
  // our work section


  $("#btn-all").click(function() {
    $(".item .item").slideDown();
  });
  $("#btn-web").click(function() {
    $(".item .item").fadeout();
    $(".item .web").fadein();
  });

  $("#btn-mobaile").click(function() {
    $(".item .item").hide("slow");
    $(".item .mobaile").show("slow");
  });

  $("#btn-desk").click(function() {
    $(".item .item").slideUp();
    $(".item .desk").slideDown();
  });
  $(document).ready(function(){
    $('.materialboxed').materialbox();

  });
   $('.parallax').parallax();
   $('a').click(function(){
     $('html, body').animate({
       scrollTop: $( $(this).attr('herf') ).offset().top
     },800);
   });
   // Loadding Screen
   $(window).load(function(){
     $(".loadding-screen .preloader-wrapper").fadeout(2000,
     function(){
       $(this).parent().function(1500)
     });
   })
