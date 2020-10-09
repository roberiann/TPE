{include file="header.tpl"}
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
                    {* <th scope="row">1</th> *}
                    <td><a href="product/{$product->id_producto}">{$product->nombre_producto}</a></td>
                    <td>{$product->desc_producto}</td>
                    <td>{$product->nombre_categoria}</td>
                </tr>
            {/foreach}
          <tbody>
    </tbody>
    <tfoot>
        {* <tr>
            <td><input class="input-table" id="producto" type="text" placeholder=""></td>
            <td><input class="input-table" id="carbo" type="text"></td>
            <td><input class="input-table" id="grasas" type="text"></td>
            <td><input class="input-table" id="proteinas" type="text"></td>
            <td><input class="input-table" id="agua" type="text"></td>
        </tr> *}
    </tfoot>  
    </table> 
</main>
{include file="footer.tpl"}
