    // "use strict";
    // const cantCol = 5;

    // document.querySelector("#btn-edit").addEventListener("click", editRow);

    // function editRow(e) {
    //     if (e.currentTarget.innerHTML == "Enviar") {
    //         endEdit(e.currentTarget);
    //         e.currentTarget.innerHTML = "Edit";
    //         return;
    //     }

    //     let tr = e.currentTarget.parentNode.parentNode;
    //     let tds = tr.querySelectorAll('td');
    //     e.currentTarget.innerHTML = "Enviar";

    //     for (let i = 0; i <= cantCol; i++) {
    //         let input = document.createElement("input");
    //         input.value = tds[i].innerHTML.trim();
    //         input.classList.add("input-table");
    //         tds[i].innerHTML = "";
    //         tds[i].insertBefore(input, tds[i].firstChild);
    //     }
    // }

    // function endEdit(button) {
    //     let tr = button.parentNode.parentNode;
    //     let tds = tr.querySelectorAll('td');
    //     for (let i = 0; i <= cantCol; i++) {
    //         let input = tds[i].firstChild;
    //         tds[i].removeChild(tds[i].firstChild);
    //         tds[i].innerHTML = input.value;
    //     }
    // }

    // //Botón agregar
    // document.querySelector("#btn-agregar").addEventListener("click", function() {
    //     let prodInput = document.querySelector("#producto").value;
    //     if (prodInput != "") {
    //         let row = {
    //             "Producto": prodInput,
    //             "Carbohidratos": document.querySelector("#carbo").value,
    //             "Grasas": document.querySelector("#grasas").value,
    //             "Proteinas": document.querySelector("#proteinas").value,
    //             "Agua": document.querySelector("#agua").value
    //         }
    //         addRow(row);
    //         document.querySelector('tfoot').querySelectorAll('input').forEach(x => x.value = "");
    //     }
    // });