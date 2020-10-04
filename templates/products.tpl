{include file="header.tpl"}
          <ul>
              {foreach from=$products item=product}
				<li><a href="{$url}{$product->id_producto}">{$product->nombre_producto}</a> {$product->desc_producto} {$product->nombre_categoria} </li>	  
              {/foreach}
          </ul>
{include file="footer.tpl"}


                  