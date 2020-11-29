{if isset($smarty.session)}
{include file="headerLogged.tpl"}
{else}
{include file="header.tpl"}
{/if}
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
                {if isset($smarty.session)}
                    <td> <strong> <a href="categoryLogged/{$category->id}">{$category->nombre}</a></strong></td>
                {else}
                    <td> <strong> <a href="category/{$category->id}">{$category->nombre}</a></strong></td>
                {/if}
                    <td> {$category->descripcion}</td>
                </tr>
            {/foreach}
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</main>
{if isset($smarty.session)}
<td> <strong> <a href="categoryLogged/{$category->id}">{$category->nombre}</a></strong></td>
{else}
<td> <strong> <a href="category/{$category->id}">{$category->nombre}</a></strong></td>
{/if}

{include file="footer.tpl"}