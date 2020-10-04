{include file="header.tpl"}
          <ul>
              {foreach from=$products item=product}
				<li>{$product->nombre_producto} {$product->desc_producto}</li>	  
              {/foreach}
          </ul>
{include file="footer.tpl"}