function validarPlatillo() {
    let form = document.getElementById('formValidarDatosU');
    let formData = new FormData(form);

    console.log(formData);

    $.ajax({
        url: "ajax/validar-datosSeccionesU.php", // Ruta al script PHP que procesa y guarda los datos
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            // Se guardo correctamente los datos en la base de datos
            console.log("Esto salió con éxito");
            Swal.fire({
              icon: 'success',
              title: 'Estados de validación',
              text: '¡Guardado correctamente!',
              confirmButtonText: 'Aceptar',
              timer: 4000, // 3 segundos en milisegundos
              timerProgressBar: true, // Muestra una barra de progreso
            });
        },
        error: function(xhr, status, error) {
            // Lógica de manejo de errores al guardar los datos
            console.log(xhr.responseText);
            alert("Error al guardar los datos");
        }
    });
}
