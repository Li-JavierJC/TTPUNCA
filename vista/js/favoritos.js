//---  Funcion para mostrar cada platillo individual de los agregados -------- 
function mostrarPlatillos(id) {
   document.forms['mostrarPlatillo'].elements['idPlatilloMostrar'].value = id;
   document.forms['mostrarPlatillo'].submit();
}

//-------------Eliminar platillo de favoritos---------------------------------
function eliminarFavoritos(id) {
  Swal.fire({
     title: '¿Esta seguro de eliminar de Favoritos?',
     text: "¡No podrás revertir esto!",
     type: 'warning',
     showCancelButton: true,
     confirmButtonColor: '#3085d6',
     cancelButtonColor: '#d33',
     cancelButtonText:'Cancelar',
     confirmButtonText: 'Si, Eliminar!'
   }).then((result) => {
      if (result.value) {
         document.forms['eliminarFavorito'].elements['idFavoritos'].value = id;
         document.forms['eliminarFavorito'].submit();

      }
   });
}