"use strict"

const app = new Vue({
    el: "#app",
    data: {
        comments: [],
    },

    methods: {
        greet: function(key) {
            deleteMsj(key);
        }
    }
});

document.addEventListener('DOMContentLoaded', e => {
    getMsjs();

    document.querySelector('#comment-form').addEventListener('submit', e => {
        e.preventDefault();
        addComment();
    });
});

async function deleteMsj(key) {
    try {
        let url = 'api/comment/' + key;
        const response = await fetch(url, {
            method: 'DELETE',
        });

        if (response.ok) {
            console.log("Borrado con éxito");

            const id = (elem) => elem.id == key;
            let index = app.comments.findIndex(id);
            app.comments.splice(index, 1);


        } else
            console.log(response);
    } catch (e) {
        console.log(e);
    }
}

async function getMsjs() {
    let prod_id = document.querySelector('#id_producto').value;
    try {
        const response = await fetch('api/product/' + prod_id + '/comment');
        const msjs = await response.json();

        // imprimo las tareas
        if (msjs.length > 0) {
            app.comments = msjs;
        } else {
            console.log(e);;
        }
    } catch (e) {
        console.log(e);
    }
}

/*         */

async function addComment() {

    const comment = {
        descripcion: document.querySelector('textarea[name=comentario]').value,
        calificacion: document.querySelector('select[name=calificacion]').value,
        id_producto: document.querySelector('#id_producto').value,
        id_usuario: document.querySelector('#id_usuario').value,
    }
    let url = "api/product/" + comment.id_producto + "/comment";
    try {
        const response = await fetch(url, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(comment)
        });

        const t = await response.json();
        app.comments.push(t);

    } catch (e) {
        console.log(e);
    }

}