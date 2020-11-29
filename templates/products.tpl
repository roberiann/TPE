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
                <th>Producto</th>
                <th>Descripción</th>
                <th>Categoria</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$products item=product}
                <tr>
                {if isset($smarty.session)}
                    <td><a href="productLogged/{$product->id_producto}"><strong>{$product->nombre_producto}</strong></a></td>
                {else}
                    <td><a href="product/{$product->id_producto}"><strong>{$product->nombre_producto}</strong></a></td>
                {/if}
                    <td>{$product->desc_producto}</td>
                    <td>{$product->nombre_categoria}</td>
                </tr>
            {/foreach}
        <tbody>
        </tbody>
    </table>
</main>
{include file="footer.tpl"}



