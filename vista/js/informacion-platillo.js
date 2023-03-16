  $(document).ready(function(){

    $('.ir-arriba').click(function(){
      $('body, html').animate({
        scrollTop: '0px'
      }, 300);
    });

    $(window).scroll(function(){
      if( $(this).scrollTop() > 0 ){
        $('.ir-arriba').slideDown(300);
      } else {
        $('.ir-arriba').slideUp(300);
      }
    });

});

//funcion para guardar patillo como favorito

$(document).ready(function(){
  $('#btnguardar').click(function(){
    var datos=$('#formFavoritos').serialize();
    jQuery.ajax({
      url: "ajax/favoritos.php",
      data:datos,
      type:"POST",
      success:function(){
        $("#btnguardar").css('background-color', '#18D935');
        $("#btnguardar").html('<i class="bi bi-bookmark-fill">&nbsp;Añadido a tus Favoritos</i>');
        Swal.fire({
          icon: 'success',
          title: 'Añadido a Favoritos Correctamente',
          showConfirmButton: false,
          timer: 2000
        })
      },
      error: function() {
        alert('Error occurrido');
      }
    });
    return false;
  });
});