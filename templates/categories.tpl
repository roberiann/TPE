{include file="header.tpl"}

<div>
    <img class="img-seed" src="images/semillas.jpg" alt="Semillas">
</div>

<h1>{$titulo}</h1>

<main class="container">
    <table class="table-almacen">
        <thead>
            <tr>
                <th>Categoria</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$categories item=category}
                <tr>
                    <td> <strong> <a href="category/{$category->id}">{$category->nombre}</a></strong></td>
                    <td> {$category->descripcion}</td>
                </tr>
            {/foreach}
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</main>


{include file="footer.tpl"}