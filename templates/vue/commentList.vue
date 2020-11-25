{literal}
<section id="app">
    <ul class="list-group mt-5">
        <li v-for="tarea in tareas"
            v-bind:class="{'bg-success': tarea.finalizada == 1}"
            class="list-group-item d-flex justify-content-between"
            > 
            
            {{ tarea.titulo }} - {{ tarea.descripcion }} 
        </li>
    </ul>
</section>
{/literal}