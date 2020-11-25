"use strict"

const app = new Vue({
    el: "#app",
    data: {
        comments: [],
    },
});

document.addEventListener('DOMContentLoaded', e => {
    getMsjs();

    document.querySelector('#comment-form').addEventListener('submit', e => {
        e.preventDefault();
        addComment();
    });

});




async function getMsjs() {
    let prod_id = document.querySelector('#id_producto').value;
    try {
        const response = await fetch('api/products/'+ prod_id +'/comments');
        const msjs = await response.json();
        // imprimo las tareas
        app.comments = msjs;
    } catch (e) {
        console.log(e);
    }
}


async function addComment() {

    const comment = {
        //idUsuario: document.querySelector('input[name=titulo]').value,
        comentario: document.querySelector('textarea[name=comentario]').value,
        calificacion: document.querySelector('#calificacion').value,
        id_producto : document.querySelector('#id_producto').value,
    }

    try {
        const response = await fetch('api/comments', {
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