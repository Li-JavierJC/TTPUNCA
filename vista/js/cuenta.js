/*Funcion para cambiar los colores de la pestaña*/ 
function pestanaColor(tabId) {
  const tabButton = document.getElementById(tabId + '-tab');
  tabButton.style.backgroundColor = '#28a745'; // Cambiar el color de fondo a verde
  tabButton.style.color = '#ffffff'; // Cambiar el color del texto a blanco
}

/*Funcion para validar los formularios*/
function validarFormulario(formId, tabId) {
  const form = document.getElementById(formId);
  if (form.checkValidity()) {
    // Si el formulario es válido, cambiar el color de la pestaña
    pestanaColor(tabId); // Reemplaza 'pestanatab' con el ID de tu pestaña
    // Mostrar mensaje con SweetAlert2 y se cerrará automáticamente después de 5 segundos
    Swal.fire({
      icon: 'success',
      title: 'Datos guardados',
      text: 'Los datos se han guardado correctamente.',
      confirmButtonText: 'Aceptar',
      timer: 3000, // 3 segundos en milisegundos
      timerProgressBar: true, // Muestra una barra de progreso
    });
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



let idGenerado;//Variable global para utilizar el ID del platilllo
let formNutrienteVacio = 0;//false es cuando este lleno Declarar una variable global para indicar si formNutriente está vacío

/*Funcion para guaradar los datos del platillo*/
function enviarSeccion1() {
  // Obtener los datos del formulario de la sección 1 usando el ID del formulario
  let formData = new FormData(document.getElementById('formDatosP'));

  console.log(formData);
  // Enviar los datos mediante Ajax a un script PHP que los procese y los guarde en la base de datos
  $.ajax({
    url: "ajax/registro-datosPlatillo.php", // Ruta al script PHP que guarda los datos de la sección 1
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (response) {
      // Asignar el valor del ID generado a la variable global
      idGenerado = response.id;
      console.log("Datos de la sección 1 guardados con éxito");
      enviarSeccion2();
    },
    error: function (xhr, status, error) {
      // Lógica de manejo de errores al guardar los datos de la sección 1
      console.log(xhr.responseText);
      alert("Error al guardar los datos de la sección 1");
    }
  });
}

/*Funcion para guaradar los datos de los ingredientes del platillo*/
function enviarSeccion2() {
  // Obtener el ID del platillo generado en la sección 1
  let idPlatillo = idGenerado;

  // Obtener los datos del formulario de la sección 2 usando el ID del formulario
  let gruposDatos = [];
  $('#formIgredientes .grupo-formulario').each(function(index) {
    let grupoDatos = {
      nombreIngrediente: $(this).find('[name=nombreIngrediente]').val(),
      cantidad: $(this).find('[name=cantidad]').val(),
      unidadMedida: $(this).find('[name=unidadMedida]').val(),
      idPlatillo: idPlatillo
    };
    gruposDatos.push(grupoDatos);
  });

  // Enviar los datos mediante Ajax a un script PHP que los procese y los guarde en la base de datos
  $.ajax({
    url: "ajax/registro-datosIngrediente.php", // Ruta al script PHP que guarda los datos de la sección 2
    type: "POST",
    data: { gruposDatos: gruposDatos },
    success: function (response) {
      // Lógica de éxito después de guardar los datos de la sección 2 en la base de datos
      console.log("Datos de la sección 2 guardados con éxito");
      enviarSeccion3();
    },
    error: function (xhr, status, error) {
      // Lógica de manejo de errores al guardar los datos de la sección 2
      console.log(xhr.responseText);
      alert("Error al guardar los datos de la sección 2");
    }
  });
}

/*Funcion para guaradar los datos de los utencilios del platillo*/
function enviarSeccion3() {
  // Obtener el ID del platillo generado en la sección 1
  let idPlatillo = idGenerado;

  // Obtener los datos del formulario de la sección 3 usando el ID del formulario
  let gruposDatosU = [];
  $('#formUtencilio .formulario-utencilios').each(function(index) {
    let grupoDatosU = {
      nombreUtencilio: $(this).find('[name=nombreUtencilio]').val(),
      cantidad: $(this).find('[name=cantidad]').val(),
      idPlatillo: idPlatillo
    };
    gruposDatosU.push(grupoDatosU);
  });

  // Enviar los datos mediante Ajax a un script PHP que los procese y los guarde en la base de datos
  $.ajax({
    url: "ajax/registro-datosUtencilios.php", // Ruta al script PHP que guarda los datos de la sección 3
    type: "POST",
    data: { gruposDatosU: gruposDatosU },
    success: function(response) {
      // Lógica de éxito después de guardar los datos de la sección 3 en la base de datos
      console.log("Datos de la sección tres guardados con éxito");
      enviarSeccion4();
    },
    error: function(xhr, status, error) {
      // Lógica de manejo de errores al guardar los datos de la sección 3
      console.log(xhr.responseText);
      alert("Error al guardar los datos de la sección tres");
    }
  });
}

/*Funcion para guaradar los datos de la preparacion del platillo*/
function enviarSeccion4() {
  // Obtener el ID del platillo generado en la sección 1
  let idPlatillo = idGenerado;

  // Crear un objeto FormData para almacenar los datos
  let formData = new FormData();

  // Iterar sobre todos los grupos de datos de la sección 4
  $('#formPreparacion .formulario-preparacion').each(function(index) {
    let fotoPreparacion = $(this).find('[name=fotoPreparacion]')[0].files[0];

    // Agregar los datos al objeto FormData
    formData.append('paso[]', $(this).find('[name=paso]').val());
    formData.append('instruccion[]', $(this).find('[name=instruccion]').val());
    formData.append('fotoPreparacion[]', fotoPreparacion);
    formData.append('idPlatillo[]', idPlatillo);
  });

  // Enviar los datos mediante Ajax a un script PHP que los procese y los guarde en la base de datos
  $.ajax({
    url: "ajax/registro-datosPreparacion.php", // Ruta al script PHP que guarda los datos de la sección cuatro
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function(response) {
      // Lógica de éxito después de guardar los datos de la sección cuatro en la base de datos
      console.log("Datos de la sección cuatro guardados con éxito");
      if (formNutrienteVacio==1) {
        enviarSeccion6();
      } else {
        enviarSeccion5();
      } 
    },
    error: function(xhr, status, error) {
      // Lógica de manejo de errores al guardar los datos de la sección cuatro
      console.log(xhr.responseText);
      alert("Error al guardar los datos de la sección cuatro");
    }
  });
}

/*Funcion para guaradar los datos de nutrientes del platillo*/
function enviarSeccion5() {
  // Obtener el ID del platillo generado en la sección 1
  let idPlatillo = idGenerado;

  // Crear un arreglo para almacenar los grupos de datos de la sección 5
  let gruposDatosN = [];

  // Iterar sobre todos los grupos de datos de la sección 5
  $('#formNutriente .formulario-nutrimental').each(function(index) {
    let grupoDatosN = {
      nombreNutriente: $(this).find('[name=nombreNutriente]').val(),
      cantidadR: $(this).find('[name=cantidadR]').val(),
      cantidadP: $(this).find('[name=cantidadP]').val(),
      unidadMedida: $(this).find('[name=unidadMedida]').val(),
      idPlatillo: idPlatillo
    };
    gruposDatosN.push(grupoDatosN);
  });

  // Enviar los datos mediante Ajax a un script PHP que los procese y los guarde en la base de datos
  $.ajax({
    url: "ajax/registro-datosNutriente.php", // Ruta al script PHP que guarda los datos de la sección cinco
    type: "POST",
    data: { gruposDatosN: gruposDatosN },
    success: function(response) {
      // Lógica de éxito después de guardar los datos de la sección cinco en la base de datos
      console.log("Datos de la sección cinco guardados con éxito");
      enviarSeccion6();
    },
    error: function(xhr, status, error) {
      // Lógica de manejo de errores al guardar los datos de la sección cinco
      console.log(xhr.responseText);
      alert("Error al guardar los datos de la sección cinco");
    }
  });
}

/*Funcion para guaradar los datos de informacion Adicional*/
function enviarSeccion6() {

  // Obtener los datos del formulario de la sección seis (formComplemento)
  let formData = new FormData(document.getElementById('formComplemento'));
  let idPlatillo = idGenerado;

  // Agregar el valor de idPlatillo al objeto formData
  formData.append('idPlatillo', idPlatillo);

  // Enviar los datos mediante Ajax a un script PHP que los procese y los guarde en la base de datos
  $.ajax({
    url: "ajax/registro-datosComplemento.php", // Ruta al script PHP que guarda los datos de la sección seis
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function(response) {
      // Lógica de éxito después de guardar los datos de la sección seis en la base de datos
      console.log("Esto salió con éxito de la seccion 6");
      enviarSeccion7();
    },
    error: function(xhr, status, error) {
      // Lógica de manejo de errores al guardar los datos de la sección seis
      console.log(xhr.responseText);
      alert("Error al guardar los datos de la sección seis");
    }
  });
}

/* Funcion para mandar datos de validacion */
function enviarSeccion7() {
  let formData = new FormData();
  let idPlatillo = idGenerado;
  let seccionDatos=1;
  let seccionIngredientes=1;
  let seccionUtencilio=1;
  let seccionPreparacion=1;
  let seccionNutriente=1;
  let seccionComplemento=1;

  // Agregar los valores al objeto formData
  formData.append('idPlatillo', idPlatillo);
  formData.append('seccionDatos', seccionDatos);
  formData.append('seccionIngredientes', seccionIngredientes);
  formData.append('seccionUtencilio', seccionUtencilio);
  formData.append('seccionPreparacion', seccionPreparacion);
  formData.append('seccionNutriente', seccionNutriente);
  formData.append('seccionComplemento', seccionComplemento);

  // Enviar los datos mediante Ajax a un script PHP que los procese y los guarde en la base de datos
  $.ajax({
    url: "ajax/registro-datosValidacion.php", // Ruta al script PHP que guarda los datos de la sección seis
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function(response) {
      // Lógica de éxito después de guardar los datos de la sección seis en la base de datos
      console.log("Esto salió con éxito de la seccion 7");
      mostrarMensajeFinRegistro();
    },
    error: function(xhr, status, error) {
      // Lógica de manejo de errores al guardar los datos de la sección seis
      console.log(xhr.responseText);
      alert("Error al guardar los datos de la sección seis");
    }
  });
}

/** Funcion para mostrar de finaliza registro*/
function mostrarMensajeFinRegistro() {
  Swal.fire({
    icon: 'success',
    title: 'Registro completado',
    text: 'El registro se ha completado con éxito.',
    confirmButtonText: 'Aceptar',
    allowOutsideClick: false
  }).then((result) => {
    if (result.isConfirmed) {
      // Redireccionar a la página de perfil
      window.location.href = 'cuenta';
    }
  });
}

/** Funcion de registrar todos los formularios*/
function registrarTodo() {
  // Obtener los formularios
  let formDatosP = document.getElementById('formDatosP');
  let formIgredientes = document.getElementById('formIgredientes');
  let formUtencilio = document.getElementById('formUtencilio');
  let formPreparacion = document.getElementById('formPreparacion');
  let formNutriente = document.getElementById('formNutriente');
  let formComplemento = document.getElementById('formComplemento');

  if (!formNutriente.checkValidity()) {
    formNutrienteVacio=1;
  }

  // Verificar si algún formulario está vacío
  if (!formDatosP.checkValidity() || !formIgredientes.checkValidity() ||
      !formUtencilio.checkValidity() || !formPreparacion.checkValidity() || !formComplemento.checkValidity()) {
    // Mostrar mensaje de advertencia utilizando SweetAlert2
    Swal.fire({
      icon: 'warning',
      title: 'Debes completar todos los formularios para registrar',
      showConfirmButton: false,
      timer: 4000, // 4 segundos en milisegundos
      timerProgressBar: true, // Muestra una barra de progreso
    });
    return; // Detener la ejecución de la función si algún formulario está vacío
  }

  Swal.fire({
    title: 'Confirmación',
    text: '¿Estás seguro de registrar todo?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Sí',
    cancelButtonText: 'No'
  }).then((result) => {
    if (result.isConfirmed) {
      // Se ha confirmado, ejecutar todas las llamadas de funciones
      enviarSeccion1();
    }
  });
}

/** Cerrar session de la cuenta de alumno*/
function salir()
{
    document.forms['salirForm'].elements['salirAction'].value = 1;
    document.forms['salirForm'].submit();
}
