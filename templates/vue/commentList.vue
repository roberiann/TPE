{literal}
<section id="app">
    <ul class="list-unstyled">
        <li v-for="comment in comments" class="media" > 
<div class="col-md-8" shadow p-3 mb-5 bg-white rounded>
  <div class="card-header">
    {{ comment.nombre}}
  </div>
  <div class="card-body shadow p-3 mb-5 bg-white rounded" >
    <h5 class="card-title">{{ comment.descripcion }} - {{ comment.calificacion }} ☆</h5>
    <p class="card-text"></p>
  </div>
</div>
        </li>
    </ul>
</section>
{/literal}


