{literal}
<section id="app">
    <ul class="list-group mt-5">
        <li v-for="comment in comments"> 
            {{ comment.desc_comentario }} - {{ comment.calificacion }} 
        </li>
    </ul>
</section>
{/literal}