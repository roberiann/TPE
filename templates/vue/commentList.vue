{literal}
<section id="app">
    <ul class="list-group mt-5">
        <li v-for="comment in comments"> 
             <strong>{{ comment.nombre}}</strong>: {{ comment.descripcion }} - {{ comment.calificacion }} 
        </li>
    </ul>
</section>
{/literal}