function initContactForm() {
    "use strict";

    genCaptcha();

    function genCaptcha() {
        let numImg = Math.floor((Math.random() * 6) + 1);
        let captcha;

        if (numImg === 1) {
            captcha = "22d5n";
        } else if (numImg === 2) {
            captcha = "24pew";
        } else if (numImg === 3) {
            captcha = "25w53";
        } else if (numImg === 4) {
            captcha = "245y5";
        } else if (numImg === 5) {
            captcha = "2356g";
        } else {
            captcha = "28348";
        }
        document.querySelector("#imgCaptcha").src = "images/" + captcha + ".png";
    }

    function randomCaptcha() {
        event.preventDefault();
        document.querySelector("#msjCaptcha").querySelectorAll("p").forEach(x => x.remove());
        genCaptcha();
    }

    document.querySelector("#btnReloadCaptcha").addEventListener("click", randomCaptcha);

    function validaForm(event) {
        event.preventDefault();

        document.querySelector("#msjCaptcha").querySelectorAll("p").forEach(x => x.remove());

        let imgCode = document.querySelector("#imgCaptcha").src;
        let code = imgCode.substring(imgCode.lastIndexOf("/") + 1, imgCode.indexOf("."));
        let inputCode = document.querySelector("#inputCaptcha").value;

        document.querySelector("#inputCaptcha").value = "";
        let p = document.createElement('p');
        let div = document.getElementById('msjCaptcha');
        if (inputCode !== code) {
            document.querySelector("#imgCaptcha").src = "images/error.jpg";
            p.innerHTML = "¡Captcha incorrecto!";
            p.classList.add("error-message", "message");
        } else {
            document.querySelector("#imgCaptcha").src = "images/valid.png";
            p.classList.add("ok-message", "message");
            p.innerHTML = "¡Mensaje enviado!";

            document.querySelectorAll('input').forEach(x => x.value = "");
            document.querySelector("#mensaje").value = "";
        }
        div.appendChild(p);

    }

    document.querySelector("#formulario-contacto").addEventListener("submit", validaForm);

};