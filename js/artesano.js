document.addEventListener("DOMContentLoaded", function() {
    "use strict";

    //Opcional 1: SPA / Partial Render // Llama a los js específicos para cada html 
    // Se controla de apagar el setInterval donde no se refresca la tabla (categoria-PR.html).
    loadBody("index-PR.html").then(console.log("Partial render OK"));

    let onOff = false;
    let timer = 0;

    document.querySelector(".navigation").querySelectorAll('li').forEach(li => li.addEventListener("click", loadPartialRender));

    function loadPartialRender() {
        if (onOff) {
            clearInterval(timer);
            onOff = false;
        }

        loadBody(this.id + ".html").then(console.log("Partial render OK"));
    }

    async function loadBody(url) {
        let container = document.querySelector("#body-PR");
        try {
            let response = await fetch(url);
            if (response.ok) {
                let text = await response.text();
                container.innerHTML = text;
                window.history.pushState("http://localhost/TP3/" + url, "Arte sano", url);
                if (url == "categoria-PR.html") {
                    timer = initTable(onOff);
                    onOff = true;
                } else {
                    if (url == "contacto-PR.html") {
                        initContactForm();
                    }
                }
            } else {
                container.innerHTML = "<h1>Error - Fallo en la URL!</h1>";
                console.log(response);
            }
        } catch (e) {
            container.innerHTML = "<h1>Error - En la conexión!</h1>";
            console.log(e);
        };
    }

    //******************************************* 

});