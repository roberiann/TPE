{include file="header.tpl"}

<div>
    <img class="img-seed" src="images/semillas.jpg" alt="Semillas">
</div>

<h1>{$titulo}</h1>
<main class="category">

    {foreach from=$categories item=category}
        <div>
            <h3> {$category->nombre} </h3>
            <a href="category/{$category->id}"><img src="images/{$category->nombre}.png" alt="{$category->nombre}"></a>
        </div>    
    
    {/foreach}

</main>

{include file="footer.tpl"}