/*
*Funcion para ontener el total de platillos publicados
*/
window.addEventListener('DOMContentLoaded', function() {
  let elementoContador = document.querySelector('#contador-platillos');
  // Realizar una petición AJAX a un archivo PHP
  let xhr = new XMLHttpRequest();
  xhr.open('GET', 'ajax/totalPlatillo.php', true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      respuesta = xhr.responseText;
      // Utilizar la respuesta del archivo PHP
      let valorTotal =respuesta; // Valor real de visitantes

      let valorInicial = 100;
      let duracion = 2000; // Duración de la animación en milisegundos
      let duracionFotograma = 1000 / 60; // Duración de un fotograma en milisegundos
      let recuentoFotogramas = Math.ceil(duracion / duracionFotograma);
      var incremento = (valorTotal - valorInicial) / recuentoFotogramas;

      let cuadroActual = 0;
      let intervaloId = setInterval(contadorActualizaciones, duracionFotograma);

      function contadorActualizaciones() {
        cuadroActual++;
        let valor = Math.round(valorInicial + incremento * cuadroActual);
        elementoContador.textContent = valor;

        if (cuadroActual === recuentoFotogramas) {
          clearInterval(intervaloId);
          elementoContador.textContent = valorTotal;
        }
      }
    }
  };
  xhr.send();
});

/*
*Funcion para ontener el total de vsitantes
*/
window.addEventListener('DOMContentLoaded', function() {
  let elementoContador = document.querySelector('#contador-visitante');
  // Realizar una petición AJAX a un archivo PHP
  let xhr = new XMLHttpRequest();
  xhr.open('GET', 'ajax/totalVisitante.php', true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      respuesta = xhr.responseText;
      // Utilizar la respuesta del archivo PHP
      let valorTotal =respuesta; // Valor real de visitantes

      let valorInicial = 0;
      let duracion = 2000; // Duración de la animación en milisegundos
      let duracionFotograma = 1000 / 60; // Duración de un fotograma en milisegundos
      let recuentoFotogramas = Math.ceil(duracion / duracionFotograma);
      var incremento = (valorTotal - valorInicial) / recuentoFotogramas;

      let cuadroActual = 0;
      let intervaloId = setInterval(contadorActualizaciones, duracionFotograma);

      function contadorActualizaciones() {
        cuadroActual++;
        let valor = Math.round(valorInicial + incremento * cuadroActual);
        elementoContador.textContent = valor;

        if (cuadroActual === recuentoFotogramas) {
          clearInterval(intervaloId);
          elementoContador.textContent = valorTotal;
        }
      }
    }
  };
  xhr.send();
});

/*
*Funcion para ontener el total de vsitas
*/
window.addEventListener('DOMContentLoaded', function() {
  let elementoContador = document.querySelector('#contador-visitas');
  // Realizar una petición AJAX a un archivo PHP
  let xhr = new XMLHttpRequest();
  xhr.open('GET', 'ajax/totalVisita.php', true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      respuesta = xhr.responseText;
      // Utilizar la respuesta del archivo PHP
      let valorTotal =respuesta; // Valor real de visitantes

      let valorInicial = 0;
      let duracion = 2000; // Duración de la animación en milisegundos
      let duracionFotograma = 1000 / 60; // Duración de un fotograma en milisegundos
      let recuentoFotogramas = Math.ceil(duracion / duracionFotograma);
      var incremento = (valorTotal - valorInicial) / recuentoFotogramas;

      let cuadroActual = 0;
      let intervaloId = setInterval(contadorActualizaciones, duracionFotograma);

      function contadorActualizaciones() {
        cuadroActual++;
        let valor = Math.round(valorInicial + incremento * cuadroActual);
        elementoContador.textContent = valor;

        if (cuadroActual === recuentoFotogramas) {
          clearInterval(intervaloId);
          elementoContador.textContent = valorTotal;
        }
      }
    }
  };
  xhr.send();
});

/*
*Funcion para ontener el total de comentarios
*/
window.addEventListener('DOMContentLoaded', function() {
  let elementoContador = document.querySelector('#contador-comentarios');
  // Realizar una petición AJAX a un archivo PHP
  let xhr = new XMLHttpRequest();
  xhr.open('GET', 'ajax/totalComentario.php', true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      respuesta = xhr.responseText;
      // Utilizar la respuesta del archivo PHP
      let valorTotal =respuesta; // Valor real de visitantes

      let valorInicial = 0;
      let duracion = 2000; // Duración de la animación en milisegundos
      let duracionFotograma = 1000 / 60; // Duración de un fotograma en milisegundos
      let recuentoFotogramas = Math.ceil(duracion / duracionFotograma);
      var incremento = (valorTotal - valorInicial) / recuentoFotogramas;

      let cuadroActual = 0;
      let intervaloId = setInterval(contadorActualizaciones, duracionFotograma);

      function contadorActualizaciones() {
        cuadroActual++;
        let valor = Math.round(valorInicial + incremento * cuadroActual);
        elementoContador.textContent = valor;

        if (cuadroActual === recuentoFotogramas) {
          clearInterval(intervaloId);
          elementoContador.textContent = valorTotal;
        }
      }
    }
  };
  xhr.send();
});