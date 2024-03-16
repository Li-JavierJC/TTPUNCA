//funcion para boton flotante
document.addEventListener("DOMContentLoaded", function() {
  let btnRegresarArriba = document.getElementById("btn-regresar-arriba");

  // Mostrar el botón cuando se haya hecho scroll en la página
  window.onscroll = function() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      btnRegresarArriba.style.display = "block";
    } else {
      btnRegresarArriba.style.display = "none";
    }
  };

  // Regresar arriba cuando se haga clic en el botón
  btnRegresarArriba.addEventListener("click", function() {
    document.body.scrollTop = 0; 
    document.documentElement.scrollTop = 0; 
  });
});


//funcion para guardar patillo como favorito

$(document).ready(function(){
  $('#btnguardar').click(function(){
    console.log("Botón clickeado...");
    let datos=$('#formFavoritos').serialize();
    console.log(datos);
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