$(document).ready(function(){
    $('.modal').modal();

   $('.dropdown-trigger').dropdown();

$('.sidenav').sidenav();

 $('.tooltipped').tooltip();

  $('select').formSelect();


  //   xatw hawar lera kodakant bnwsa
  </form>
  <form class="signup">
  <input
   class="form-control"
   type="text"
  name="username"
  autocmplete="off"
  placeeholder="Type your user name"
  required="required"
  />
  <input
   class="form-control"
   type="password"
    name="password"
     autocmplete="new-password"
     placeeholder="Type Complex password" />
     <input
      class="form-control"
      type="password"
       name="password2"
        autocmplete="new-password"
        placeeholder="Type a password again" />
     <input
      class="form-control"
      type="emali"
       name="emali"
        placeeholder="Type a valid email" />
  <input
  class="btn btn-success btn-block"
  type="submit"
  value="signup" />
  </form>
  </div>

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
         timePause: 1000

       });
