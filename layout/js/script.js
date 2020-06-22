$(document).ready(function(){



  //   xatw hawar lera kodakant bnwsa

//switch Between Login & sigmup
  $('.Login-page h1 span').click(function(){

    $(this).addClass('selected').siblings().removeClass('selected');
    $('.Login-page form').hide();
    $('.' + $(this).data('class')).fadeIn(100);

  });

  });

  // start new Ad
  $('.live-name').keyup(function (){

    $('.live-preview .caption h5').text($(this).val());
  });
  $('.live-price').keyup(function (){

    $('.live-preview .caption h4').text('$'+$(this).val());
  });

  $('.live-desc').keyup(function (){

    $('.live-preview .caption h6').text($(this).val());
  });

  // $('.live-price').keyup(function (){
  //
  //
  //   $('live-preview .price-tag').text('$' + $(this).val());
  // });
    // our work section

  var close = document.getElementsByClassName("closebtn");
  var i;

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function(){
      var div = this.parentElement;
      div.style.opacity = "0";
      setTimeout(function(){ div.style.display = "none"; }, 600);
    }
  }



  // image preview
$(".image").change(function () {

    if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.image-preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);
    }

});
