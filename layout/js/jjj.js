$(document).ready(function(){



  //   xatw hawar lera kodakant bnwsa

//switch Between Login & sigmup
  $('.Login-page h1 span').click(function(){

    $(this).addClass('selected').siblings().removeClass('selected');
    $('.Login-page form').hide();
    $('.' + $(this).data('class')).fadeIn(100);

  });

  });


  var close = document.getElementsByClassName("closebtn");
  var i;

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function(){
      var div = this.parentElement;
      div.style.opacity = "0";
      setTimeout(function(){ div.style.display = "none"; }, 600);
    }
  }
