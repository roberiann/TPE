{include file="header.tpl"}
         <ul>

              {foreach from=$categories item=category}
				<li>{$category->nombre} | {$category->descripcion}</li>	  
              {/foreach}
          
          </ul>

{include file="footer.tpl"}