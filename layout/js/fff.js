$(document).ready(function(){



  //   xatw hawar lera kodakant bnwsa
  
//switch Between Login & sigmup
  $('.Login-page h1 span').click(function(){
    
    $(this).addClass('selected').siblings().removeClass('selected');
    $('.Login-page form').hide();
    $('.' + $(this).data('class')).fadeIn(100);

  });

  });
