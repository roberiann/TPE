document.addEventListener("DOMContentLoaded", function() {
    "use strict";
    const cantCol = 4;

    document.querySelector("#btn-edit").addEventListener("click", editRow);

    function editRow(e) {
        if (e.currentTarget.innerHTML == "Enviar") {
            endEdit(e.currentTarget);
            e.currentTarget.innerHTML = "Edit";
            return;
        }

        let tr = e.currentTarget.parentNode.parentNode;
        let tds = tr.querySelectorAll('td');
        e.currentTarget.innerHTML = "Enviar";

        for (let i = 0; i <= cantCol; i++) {
            let input = document.createElement("input");
            input.value = tds[i].innerHTML.trim();
            input.classList.add("input-table");
            tds[i].innerHTML = "";
            tds[i].insertBefore(input, tds[i].firstChild);
        }
    }

    function endEdit(button) {
        let tr = button.parentNode.parentNode;
        let tds = tr.querySelectorAll('td');
        for (let i = 0; i <= cantCol; i++) {
            let input = tds[i].firstChild;
            tds[i].removeChild(tds[i].firstChild);
            tds[i].innerHTML = input.value;
        }
        refreshServer(button);
    }


    function refreshServer(button) {
        let tr = button.parentNode.parentNode;
        let tds = tr.querySelectorAll('td');

        let form = document.createElement("form"); // crear un form

        form.setAttribute("name", "productForm"); //nombre del form
        form.setAttribute("action", "editProd"); // action por defecto
        form.setAttribute("method", "post"); // method POST 


        let input = document.createElement("input"); // Crea un elemento input

        input.setAttribute("name", "input_producto"); //nombre del input
        input.setAttribute("type", "hidden"); // tipo hidden
        input.setAttribute("value", tds[0].innerHTML); // valor por defecto


        form.appendChild(input); // añade el input al formulario
        //document.getElementsByTagName("body")[0].appendChild(form); // añade el formulario al documento

        form.submit();
    }

});