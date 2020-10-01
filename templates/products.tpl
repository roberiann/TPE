{include file="header.tpl"}
          <ul>

              {foreach from=$products item=product}
				<li>{$product->nombre} {$product->descripcion}</li>	  
              {/foreach}
          
          </ul>
{include file="footer.tpl"}