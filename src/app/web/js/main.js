// Obtener el botón desplegable
var dropdownBtn = document.querySelector(".dropdown-btn");

// Obtener el contenido del menú desplegable
var dropdownContent = document.querySelector(".dropdown-content");

// Agregar un evento click al botón desplegable
dropdownBtn.addEventListener("click", function() {
  // Alternar la visibilidad del contenido del menú desplegable
  dropdownContent.classList.toggle("show");
});

// Agregar un evento resize para ocultar el menú desplegable en pantallas grandes
window.addEventListener("resize", function() {
  if (window.innerWidth > 768) {
    dropdownContent.classList.remove("show");
  }
});
