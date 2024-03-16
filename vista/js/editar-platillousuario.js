  /*Funcion para cambiar los colores de la pestaña*/
  function pestanaColor(tabId) {
    const tabButton = document.getElementById(tabId + '-tab');
    tabButton.style.backgroundColor = '#29A4FF'; // Cambiar el color de fondo a verde
    tabButton.style.color = '#ffffff'; // Cambiar el color del texto a blanco
  }

  /*Funcion para validar los formularios*/
  function validarFormulario(formId, tabId) {
    const form = document.getElementById(formId);
    if (form.checkValidity()) {
      switch (formId) {
        case "formDatosP":
          // Si el formulario es válido, cambiar el color de la pestaña
          pestanaColor(tabId); // Reemplaza 'pestanatab' con el ID de tu pestaña
          // Llamar a la función para actualizar los datos
          actualizarDatosPlatillo(); // Agrega esta línea para llamar a la función de actualización
          break;
        case "formIngredientes":
          // Si el formulario es válido, cambiar el color de la pestaña
          pestanaColor(tabId); // Reemplaza 'pestanatab' con el ID de tu pestaña
          // Llamar a la función para actualizar los datos
          actualizarIngredientes(); // Agrega esta línea para llamar a la función de actualización
          break;
        case "formUtencilio":
          // Si el formulario es válido, cambiar el color de la pestaña
          pestanaColor(tabId); // Reemplaza 'pestanatab' con el ID de tu pestaña
          // Llamar a la función para actualizar los datos
          actualizarUtencilio(); // Agrega esta línea para llamar a la función de actualización
          break;
        case "formPreparacion":
          // Si el formulario es válido, cambiar el color de la pestaña
          pestanaColor(tabId); // Reemplaza 'pestanatab' con el ID de tu pestaña
          // Llamar a la función para actualizar los datos
          actualizarPreparacion(); // Agrega esta línea para llamar a la función de actualización
          break;
        case "formComplemento":
          // Si el formulario es válido, cambiar el color de la pestaña
          pestanaColor(tabId); // Reemplaza 'pestanatab' con el ID de tu pestaña
          // Llamar a la función para actualizar los datos
          actualizarDatosComplemento(); // Agrega esta línea para llamar a la función de actualización
          break;
        default:
          console.log("No se econtro el formulario");
      }
    } 
    else 
    {
      // Si el formulario no es válido, mostrar mensaje de error
      Swal.fire({
        icon: 'error',
        title: 'Error de validación',
        text: 'Por favor, completa todos los campos requeridos correctamente.',
        confirmButtonText: 'Aceptar'
      });
    }
  }


  // Función para actualizar los datos mediante AJAX
  function actualizarDatosPlatillo() {
    let formData = new FormData(document.getElementById('formDatosP'));

    console.log(formData);
    // Enviar los datos mediante AJAX a un script PHP que los procese y actualice la base de datos
    $.ajax({
      url: "ajax/actualizar-datosPlatillo.php", // Ruta al script PHP que actualiza los datos
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        console.log("Datos actualizados con éxito");
        // Aquí puedes manejar la respuesta si es necesario
        // Por ejemplo, mostrar un mensaje de éxito o actualizar la página
        Swal.fire({
          icon: 'success',
          title: 'Datos actualizados',
          text: 'Los datos se han actualizado correctamente.',
          confirmButtonText: 'Aceptar',
          timer: 3000,
          timerProgressBar: true,
        });
      },
      error: function (xhr, status, error) {
        // Lógica de manejo de errores al actualizar los datos
        console.log(xhr.responseText);
        Swal.fire({
          icon: 'error',
          title: 'Error al actualizar los datos',
          text: 'Hubo un problema al actualizar los datos. Inténtalo de nuevo más tarde.',
          confirmButtonText: 'Aceptar',
        });
      }
    });

    // Devolver 'false' para evitar que el formulario se envíe de forma tradicional
    return false;
  }

  // Función para actualizar los datos de ingredientes mediante AJAX
  function actualizarIngredientes() {
    let formData = new FormData(document.getElementById('formIngredientes'));

    // Obtener el valor de idPlatillo del formulario usando formData.get()
    let idPlatillo = formData.get('idPlatillo');

    // Obtener los datos del formulario de la sección 2 usando el ID del formulario
    let gruposDatos = [];
    $('#formIngredientes .grupo-formulario').each(function(index) {
      let idIngrediente = $(this).find('[name=idIngrediente]').val() ?? -1; // Convertir a -1 si es undefined
      let grupoDatos = {
        idIngrediente: idIngrediente,
        nombreIngrediente: $(this).find('[name=nombreIngrediente]').val(),
        cantidad: $(this).find('[name=cantidad]').val(),
        unidadMedida: $(this).find('[name=unidadMedida]').val(),
        idPlatillo:idPlatillo,
        
      };
      gruposDatos.push(grupoDatos);
    });

    console.log(gruposDatos);
    // Enviar los datos mediante AJAX a un script PHP que los procese y actualice la base de datos
     $.ajax({
      url: "ajax/actualizar-datosIngredientes.php", // Ruta al script PHP que actualiza los datos
      type: "POST",
      data: { gruposDatos: gruposDatos },
      success: function (response) {
        console.log("Datos actualizados con éxito");
        // Aquí puedes manejar la respuesta si es necesario
        // Por ejemplo, mostrar un mensaje de éxito o actualizar la página
        Swal.fire({
          icon: 'success',
          title: 'Datos actualizados',
          text: 'Los datos se han actualizado correctamente.',
          confirmButtonText: 'Aceptar',
          timer: 3000,
          timerProgressBar: true,
        });
      },
      error: function (xhr, status, error) {
        // Lógica de manejo de errores al actualizar los datos
        console.log(xhr.responseText);
        Swal.fire({
          icon: 'error',
          title: 'Error al actualizar los datos',
          text: 'Hubo un problema al actualizar los datos. Inténtalo de nuevo más tarde.',
          confirmButtonText: 'Aceptar',
        });
      }
    });

    // Devolver 'false' para evitar que el formulario se envíe de forma tradicional
    return false;
  }

  // Función para actualizar los datos de utencilios mediante AJAX
  function actualizarUtencilio() {
    let formData = new FormData(document.getElementById('formUtencilio'));

    // Obtener el valor de idPlatillo del formulario usando formData.get()
    let idPlatillo = formData.get('idPlatillo');

    // Obtener los datos del formulario de la sección 2 usando el ID del formulario
    let gruposDatos = [];
    $('#formUtencilio .formulario-utencilios').each(function(index) {
      let idUtencilio = $(this).find('[name=idUtencilio]').val() ?? -1; // Convertir a -1 si es undefined
      let grupoDatos = {
        idUtencilio: idUtencilio,
        nombreUtencilio: $(this).find('[name=nombreUtencilio]').val(),
        cantidad: $(this).find('[name=cantidad]').val(),
        idPlatillo:idPlatillo,
        
      };
      gruposDatos.push(grupoDatos);
    });

    console.log(gruposDatos);
    // Enviar los datos mediante AJAX a un script PHP que los procese y actualice la base de datos
     $.ajax({
      url: "ajax/actualizar-datosUtencilio.php", // Ruta al script PHP que actualiza los datos
      type: "POST",
      data: { gruposDatos: gruposDatos },
      success: function (response) {
        console.log("Datos actualizados con éxito");
        Swal.fire({
          icon: 'success',
          title: 'Datos actualizados',
          text: 'Los datos se han actualizado correctamente.',
          confirmButtonText: 'Aceptar',
          timer: 3000,
          timerProgressBar: true,
        });
      },
      error: function (xhr, status, error) {
        // Lógica de manejo de errores al actualizar los datos
        console.log(xhr.responseText);
        Swal.fire({
          icon: 'error',
          title: 'Error al actualizar los datos',
          text: 'Hubo un problema al actualizar los datos. Inténtalo de nuevo más tarde.',
          confirmButtonText: 'Aceptar',
        });
      }
    });

    // Devolver 'false' para evitar que el formulario se envíe de forma tradicional
    return false;
  }

  // Función para actualizar los datos de Preparacion mediante AJAX
  function actualizarPreparacion() {
    let formData = new FormData(document.getElementById('formPreparacion'));

    // Obtener el valor de idPlatillo del formulario usando formData.get()
    let idPlatillo = formData.get('idPlatillo');

    // Crear un objeto FormDatos para almacenar los datos
    let formDatos = new FormData();

    // Constantes para valores predeterminados
    const DEFAULT_ID_PREPARACION = -1;
    const DEFAULT_FOTO_PREPARACION = -1;

    $('#formPreparacion .formulario-preparacion').each(function(index) {
      // Extraer los elementos necesarios del formulario
      const $formularioPreparacion = $(this);
      const idPreparacion = $formularioPreparacion.find('[name=idPreparacion]').val() || DEFAULT_ID_PREPARACION;

      const fotoPreparacionInput = $formularioPreparacion.find('[name=fotoPreparacion]')[0];
      const fotoPreparacion = fotoPreparacionInput && fotoPreparacionInput.files.length > 0 ? fotoPreparacionInput.files[0] : DEFAULT_FOTO_PREPARACION;

      // Agregar los datos al objeto FormData
      formDatos.append('idPreparacion[]', idPreparacion);
      formDatos.append('paso[]', $formularioPreparacion.find('[name=paso]').val());
      formDatos.append('instruccion[]', $formularioPreparacion.find('[name=instruccion]').val());
      formDatos.append('fotoPreparacion[]', fotoPreparacion);
      formDatos.append('idPlatillo[]', idPlatillo);
    });


    console.log(formDatos);
    // Enviar los datos mediante AJAX a un script PHP que los procese y actualice la base de datos
     $.ajax({
      url: "ajax/actualizar-datosPreparacion.php", // Ruta al script PHP que guarda los datos de Preparacion
      type: "POST",
      data: formDatos,
      contentType: false,
      processData: false,
      success: function (response) {
        console.log("Datos actualizados con éxito");
        Swal.fire({
          icon: 'success',
          title: 'Datos actualizados',
          text: 'Los datos se han actualizado correctamente.',
          confirmButtonText: 'Aceptar',
          timer: 3000,
          timerProgressBar: true,
        });
      },
      error: function (xhr, status, error) {
        // Lógica de manejo de errores al actualizar los datos
        console.log(xhr.responseText);
        Swal.fire({
          icon: 'error',
          title: 'Error al actualizar los datos',
          text: 'Hubo un problema al actualizar los datos. Inténtalo de nuevo más tarde.',
          confirmButtonText: 'Aceptar',
        });
      }
    });

    // Devolver 'false' para evitar que el formulario se envíe de forma tradicional
    return false;
  }

  // Función para actualizar los datos de ingredientes mediante AJAX
  function actualizarNutrientes() {
    let formData = new FormData(document.getElementById('formNutriente'));

    // Obtener el valor de idPlatillo del formulario usando formData.get()
    let idPlatillo = formData.get('idPlatillo');

    // Obtener los datos del formulario de la sección 2 usando el ID del formulario
    let gruposDatos = [];
    $('#formNutriente .formulario-nutrimental').each(function(index) {
      let idNutriente = $(this).find('[name=idNutriente]').val() ?? -1; // Convertir a -1 si es undefined
      let grupoDatos = {
        idNutriente: idNutriente,
        nombreNutriente: $(this).find('[name=nombreNutriente]').val(),
        cantidadR: $(this).find('[name=cantidadR]').val(),
        cantidadP: $(this).find('[name=cantidadP]').val(),
        unidadMedida: $(this).find('[name=unidadMedida]').val(),
        idPlatillo: idPlatillo
        
      };
      gruposDatos.push(grupoDatos);
    });

    console.log(gruposDatos);
    // Enviar los datos mediante AJAX a un script PHP que los procese y actualice la base de datos
     $.ajax({
      url: "ajax/actualizar-datosNutriente.php", // Ruta al script PHP que actualiza los datos
      type: "POST",
      data: { gruposDatos: gruposDatos },
      success: function (response) {
        console.log("Datos actualizados con éxito");
        // Aquí puedes manejar la respuesta si es necesario
        // Por ejemplo, mostrar un mensaje de éxito o actualizar la página
        Swal.fire({
          icon: 'success',
          title: 'Datos actualizados',
          text: 'Los datos se han actualizado correctamente.',
          confirmButtonText: 'Aceptar',
          timer: 3000,
          timerProgressBar: true,
        });
      },
      error: function (xhr, status, error) {
        // Lógica de manejo de errores al actualizar los datos
        console.log(xhr.responseText);
        Swal.fire({
          icon: 'error',
          title: 'Error al actualizar los datos',
          text: 'Hubo un problema al actualizar los datos. Inténtalo de nuevo más tarde.',
          confirmButtonText: 'Aceptar',
        });
      }
    });

    // Devolver 'false' para evitar que el formulario se envíe de forma tradicional
    return false;
  }

  // Función para actualizar los datos mediante AJAX
  function actualizarDatosComplemento() {
    let formData = new FormData(document.getElementById('formComplemento'));

    console.log(formData);
    // Enviar los datos mediante AJAX a un script PHP que los procese y actualice la base de datos
    $.ajax({
      url: "ajax/actualizar-datosComplemento.php", // Ruta al script PHP que actualiza los datos
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        console.log("Datos actualizados con éxito");
        // Aquí puedes manejar la respuesta si es necesario
        // Por ejemplo, mostrar un mensaje de éxito o actualizar la página
        Swal.fire({
          icon: 'success',
          title: 'Datos actualizados',
          text: 'Los datos se han actualizado correctamente.',
          confirmButtonText: 'Aceptar',
          timer: 3000,
          timerProgressBar: true,
        });
      },
      error: function (xhr, status, error) {
        // Lógica de manejo de errores al actualizar los datos
        console.log(xhr.responseText);
        Swal.fire({
          icon: 'error',
          title: 'Error al actualizar los datos',
          text: 'Hubo un problema al actualizar los datos. Inténtalo de nuevo más tarde.',
          confirmButtonText: 'Aceptar',
        });
      }
    });

    // Devolver 'false' para evitar que el formulario se envíe de forma tradicional
    return false;
  }