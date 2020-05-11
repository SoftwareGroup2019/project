$(document).ready(function(){
    $('.modal').modal();

   $('.dropdown-trigger').dropdown();

$('.sidenav').sidenav();

 $('.tooltipped').tooltip();

  $('select').formSelect();


  //   xatw hawar lera kodakant bnwsa






  /////////////////

  });






  $('.conf').click(function()
  {
    //lo awaya ka pet ble taakidi rash dakaya.
     return confirm("Datawe Delete Bkay?");
  });

  $("#ghost").ghosttyper({
         messages: ['به‌خێربێن','کلیک بکە', 'کلیک بکە','کلیک بکە','کلیک بکە'],

         // animation speed for typing effect
         timeWrite: 80,

         // animation speed for deleting effect
         timeDelete: 50,

         // animation delay
         timePause: 1000});
