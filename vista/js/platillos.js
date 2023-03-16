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

  /* Busqueda de platillos */
  $(document).ready(function(){
    $("#busquedaPlatillo").keyup(function(){
      var consulta = $(this).val();
      if (consulta != "") {
        $.ajax({
          url:"controlador/buscar-platillos.php",
          method:"POST",
          data:{consulta:consulta},
          success:function(data){
            $("#navegacion").hide();
            $("#resultadoBusquedaPlatillo").html(data);
            $("#resultadoBusquedaPlatillo").css("display","block");
            $("#pills-tabContent").hide();
          }
        });
      }else{
        $("#resultadoBusquedaPlatillo").css("display","none");
        $("#navegacion").show();
        $("#pills-tabContent").show();
      }

    });
  });

  /*Funcionar para mostras los datos de un platillo selecciobado*/
  function mostrarPlatillos(id) {
    document.forms['mostrarPlatillo'].elements['idPlatilloMostrar'].value = id;
    document.forms['mostrarPlatillo'].submit();
  }