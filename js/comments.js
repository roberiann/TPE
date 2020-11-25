"use strict"

const app = new Vue({
    el: "#app",
    data: {
        comments: [],
    },
});

document.addEventListener('DOMContentLoaded', e => {
    getTasks();

    document.querySelector('#comment-form').addEventListener('submit', e => {
        e.preventDefault();
        addComment();
    });

});

async function getTasks() {
    try {
        const response = await fetch('api/tareas');
        const tasks = await response.json();

        // imprimo las tareas
        app.tareas = tasks;

    } catch (e) {
        console.log(e);
    }
}


async function addComment() {

    const comment = {
        idUsuario: document.querySelector('input[name=titulo]').value,
        comentario: document.querySelector('textarea[name=comentario]').value,
        calificacion: document.querySelector('select[name=calificacion]').value
    }

    try {
        const response = await fetch('api/comments', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(task)
        });

        const t = await response.json();
        app.tareas.push(t);

    } catch (e) {
        console.log(e);
    }


}