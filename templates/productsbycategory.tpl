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
    <ul class="list-group list-group-flush">
        {foreach from=$products item=product}
            <li class="list-group-item"><img class="img-leaf" src="images/hojita.png" alt="hojita">
                {if isset($smarty.session)}
                    <a href="productLogged/{$product->id_producto}"> {$product->nombre_producto} </a> </li>
                {else}
                    <a href="product/{$product->id_producto}"> {$product->nombre_producto} </a> </li>
                {/if}        {/foreach}
    </ul>
</main>
{include file="footer.tpl"}



