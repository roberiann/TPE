function initTable(onOff) {
    "use strict";

    let rows; //Array sincronizado con el server y el DOM.
    let filterActive = false;
    let editOn = false;
    let url = "https://web-unicen.herokuapp.com/api/groups/050iannuzzitemudio/productos";
    const cantCol = 4;
    getProducts();

    //Opcional 2: Auto actualización- No refresca la tabla si está en modo edición.
    let tiempo;

    if (!onOff) {
        listenbuttonTable();
        tiempo = setInterval(refreshTable, 10000);
    }

    function refreshTable() {
        if (!editOn) {
            getProducts();
        }
    }
    //*******************************/

    function filtrar() {
        let filter = document.querySelector("#filtro").value.toLowerCase();
        if (filter != "") {
            function addClass(elem, i) {
                let tbody = document.querySelector("#tBody");
                let trs = tbody.getElementsByTagName("tr");
                if (elem.thing.Producto.toLowerCase() != filter) {
                    trs[i].classList.add('hide-tr');
                };
            };
            rows.forEach(addClass);
            filterActive = true;
        }
    };

    return tiempo;

    //Hace un GET y envía a dibujar la tabla, luego vuelve a filtrar si está en modo filtro 
    async function getProducts() {
        let tbody = document.querySelector("#tBody");
        try {
            let response = await fetch(url);
            if (response.ok) {
                let json_productos = await response.json();
                rows = json_productos.productos;
                if (tbody !== null) {
                    tbody.innerHTML = "";
                    loadTable(rows);
                }
                if (filterActive) {
                    filtrar();
                }
            } else {
                console.log(response);
            }
        } catch (e) {
            console.log(e);
        }
    }

    //Dibuja la tabla. Recibe un array sincronizado con los datos del server o bien con 1 elemento si se agrega un nuevo valor a la tabla y server
    function loadTable(array) {
        try {
            for (let i = 0; i < array.length; i++) {
                let tr = document.createElement('tr');
                let json = array[i].thing;
                for (let clave in json) {
                    let td = document.createElement('td');
                    td.innerHTML = json[clave];
                    tr.appendChild(td);
                }

                let td = document.createElement('td');
                let deleteButton = document.createElement('button');
                deleteButton.id = array[i]._id;
                deleteButton.classList.add('btn-mod');
                deleteButton.innerHTML = "X";
                deleteButton.addEventListener("click", deleteRow);
                td.appendChild(deleteButton);
                tr.appendChild(td);

                let td1 = document.createElement('td');
                let editButton = document.createElement('button');
                editButton.classList.add('btn-mod');
                editButton.id = array[i]._id;
                editButton.innerHTML = "Edit";
                editButton.addEventListener("click", editRow);
                td1.appendChild(editButton);
                tr.appendChild(td1);

                if (document.querySelector("#tBody") !== null) {
                    document.querySelector("#tBody").appendChild(tr);
                }
            }
        } catch (e) {
            console.log(e);
        }
    }

    //Edita una fila de la tabla. Mantiene sincronizado el array rows y el registro editado en el server
    function editRow(e) {
        editOn = true;
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

    async function refreshServer(button) {
        let tr = button.parentNode.parentNode;
        let tds = tr.querySelectorAll('td');
        let product = {
            "thing": {
                "Producto": tds[0].innerHTML,
                "Carbohidratos": tds[1].innerHTML,
                "Grasas": tds[2].innerHTML,
                "Proteinas": tds[3].innerHTML,
                "Agua": tds[4].innerHTML
            }
        };

        try {
            let response = await fetch(url + "/" + button.id, {
                "method": "PUT",
                "headers": { "Content-Type": "application/json" },
                "body": JSON.stringify(product)
            });
            if (response.ok) {

                //Sincronizo array 
                const id = (elem) => elem._id == button.id;
                let index = rows.findIndex(id);
                rows[index].thing = product.thing;

            } else {
                console.log(response);
            }
        } catch (e) {
            console.log(e);
        }
        editOn = false;
    }

    //Boton borrar fila de la tabla y server, mantiene sincronizado el array borrando en esa posición. 
    async function deleteRow(event) {
        try {
            let response = await fetch(url + "/" + event.target.id, {
                "method": "DELETE"
            });
            if (response.ok) {
                console.log("Borrado con éxito");
                //let json = await response.json();
                const id = (elem) => elem._id == event.target.id;
                let index = rows.findIndex(id);
                rows.splice(index, 1);

                let tr = this.parentNode.parentNode;
                tr.remove();
            } else
                console.log(response);
        } catch (e) {
            console.log(e);
        }
    }

    //Encapsula los eventos para agregarlos a la botonera de la tabla una vez.
    function listenbuttonTable() {
        async function addRow(row) {
            let prod = {
                "thing": row
            };
            try {
                console.log("Guardando...");
                let response = await fetch(url, {
                    "method": "POST",
                    "headers": { "Content-Type": "application/json" },
                    "body": JSON.stringify(prod)
                });
                if (response.ok) {
                    console.log("Guardo con exito");
                    let json = await response.json();
                    let newRow = [json.information];
                    loadTable(newRow);
                    rows.push(newRow[0]);
                } else
                    console.log(response);
            } catch (e) {
                console.log(e);
            }
        }

        //Botón agregar
        document.querySelector("#btn-agregar").addEventListener("click", function() {
            let prodInput = document.querySelector("#producto").value;
            if (prodInput != "") {
                let row = {
                    "Producto": prodInput,
                    "Carbohidratos": document.querySelector("#carbo").value,
                    "Grasas": document.querySelector("#grasas").value,
                    "Proteinas": document.querySelector("#proteinas").value,
                    "Agua": document.querySelector("#agua").value
                }
                addRow(row);
                document.querySelector('tfoot').querySelectorAll('input').forEach(x => x.value = "");
            }
        });

        //Botón agregar3
        document.querySelector("#btn-agregar3").addEventListener("click", function() {
            let rows3 = [{
                    "Producto": "Girasol",
                    "Carbohidratos": "24.07 g",
                    "Grasas": "49.80 g",
                    "Proteinas": "19.33 g",
                    "Agua": "1.20 g"
                },
                {
                    "Producto": "Lino",
                    "Carbohidratos": "28.9 g",
                    "Grasas": "42.16 g",
                    "Proteinas": "18.29 g",
                    "Agua": "6.96 g"
                },
                {
                    "Producto": "Calabaza",
                    "Carbohidratos": "53.8 g",
                    "Grasas": "4.50 g",
                    "Proteinas": "18.55 g",
                    "Agua": "1.20 g"
                },
            ];
            rows3.forEach(item => addRow(item));
        });

        //Botón filtrar: filtro sobre la columna producto de la tabla
        document.querySelector("#btn-filtrar").addEventListener("click", function() {
            filtrar();
        });

        //Botón Quitar filtro: remueve el filtro quitando la clase de las filas y limpia el input
        document.querySelector("#removeFilter").addEventListener("click", function() {
            document.querySelectorAll('tr').forEach(tr => tr.classList.remove('hide-tr'));
            document.querySelector("#filtro").value = "";
            filterActive = false;
        });

    }
};