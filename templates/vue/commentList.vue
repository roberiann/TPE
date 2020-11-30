{literal}
<section id="app">
    <ul class="list-unstyled">
        <li v-for="comment in comments" class="media">
            <div class="col-md-8" shadow p-3 mb-5 bg-white rounded>
                <div class="card-header">
                    <strong>{{ comment.nombre}}</strong>
                    <span v-if="admin == 1"> 
                       <button class="btn btn-primary" v-on:click="remove(comment.id)">Eliminar</button>
                    </span>
                </div>
                <div class="card-body shadow p-3 mb-5 bg-white rounded">
                    <p class="card-text">{{ comment.descripcion }} - {{ comment.calificacion }} ☆</p>
                    <p class="card-text"></p>
                </div>
            </div>
        </li>
    </ul>
</section>
{/literal}