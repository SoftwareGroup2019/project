$(document).ready(function(){


 $('.sidenav').sidenav();

     $('.slider').slider();

     $('.parallax').parallax();

     $('.collapsible').collapsible();

      $('.scrollspy').scrollSpy();

  });

  //smooth scroll
   $('a').click(function () {
       $('html , body').animate({
           scrollTop: $( $(this).attr('href') ).offset().top
       },1400);
   });


   // Loading screen
       $('#preloader').delay(1600).fadeOut();
       // Uncomment the above line to hide the loader on page load.




  $("#btn-all").click(function() {
    $(".item .item").slideDown();
  });
  $("#btn-web").click(function() {
    $(".item .item").hide("slow");
    $(".item .hawar").show("slow");
  });

  $("#btn-ShipShop").click(function() {
    $(".item .item").hide("slow");
    $(".item .anas").show("slow");
  });

  $("#btn-desk").click(function() {
    $(".item .item").slideUp();
    $(".item .ayman").slideDown();
  });
  $(document).ready(function(){
    $('.materialboxed').materialbox();

  });

   // // Loadding Screen
   // $(window).load(function(){
   //   $(".loadding-screen .preloader-wrapper").fadeout(2000,
   //   function(){
   //     $(this).parent().function(1500)
   //   });
   // })
