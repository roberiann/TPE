"use strict"

const app = new Vue({
    el: "#app",
    data: {
        comments: [],
        admin: '',
        id_user: '',
    },

    methods: {
        remove: function(key) {
            deleteCommnent(key);
        }
    }
});

document.addEventListener('DOMContentLoaded', e => {
    app.admin = document.querySelector('#admin').value;
    app.id_user = document.querySelector('#id_user').value;
    getComments();

    if (app.id_user != 'N') {
        document.querySelector('#comment-form').addEventListener('submit', e => {
            e.preventDefault();
            addComment();
        });
    }
});

async function deleteCommnent(key) {
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

async function getComments() {
    let prod_id = document.querySelector('#id_producto').value;
    try {
        const response = await fetch('api/product/' + prod_id + '/comment');

        if (response.ok) {
            const comment = await response.json();
            app.comments = comment;
        } else {
            console.log(response);
        }

    } catch (e) {
        console.log(e);
    }
}

async function addComment() {

    const comment = {
        descripcion: document.querySelector('textarea[name=comentario]').value,
        calificacion: document.querySelector('select[name=calificacion]').value,
        id_producto: document.querySelector('#id_producto').value,
        id_usuario: document.querySelector('#id_user').value,
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