window.addEventListener('DOMContentLoaded', function() {
  let anoActual = new Date().getFullYear();
  let anoSpan = document.getElementById('ano-actual');
  anoSpan.textContent = anoActual;
});
