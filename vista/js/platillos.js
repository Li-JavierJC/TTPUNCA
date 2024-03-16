  /* Funcion para el boton de ir hacia arriba en la seccion de platillos*/
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

  /*Funcionar para mostras los datos de un platillo selecciobado*/
  function mostrarPlatillos(id) {
    document.forms['mostrarPlatillo'].elements['idPlatilloMostrar'].value = id;
    document.forms['mostrarPlatillo'].submit();
  }

