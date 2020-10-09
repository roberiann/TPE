{include file="header.tpl"}
<div> 
   <img class="img-seed" src="images/semillas.jpg" alt="Semillas">
</div> 
<h1>{$titulo}</h1>
<main class="container">
          <ul class="list-group list-group-flush">
              {foreach from=$products item=product}
                <li class="list-group-item"><img class="img-leaf" src="images/hojita.png" alt="hojita"><a href="product/:ID"> {$product->nombre_producto} </a> </li>
              {/foreach}
          </ul>
</main>          
{include file="footer.tpl"}



