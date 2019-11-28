$(document).ready(function(){
    $('.modal').modal();

   $('.dropdown-trigger').dropdown();

$('.sidenav').sidenav();

$('input').each(function(){
  if ($(this).attr('required') === 'required'){
    $(this).after('<span class="asterisk">*</span>');
  }

}

  });
