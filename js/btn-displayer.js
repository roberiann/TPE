document.addEventListener("DOMContentLoaded", function cargarPagina() {
    "use strict";

    document.querySelector("#btn_menu").addEventListener("click", toggleMenu);

    function toggleMenu() {
        document.querySelector(".navigation").classList.toggle("show");
    }
});