{include file="header.tpl"}
<div>
    <img class="img-seed" src="images/semillas.jpg" alt="Semillas">
</div>
<h1>{$titulo}</h1>
<main class="container">

    <form action="edit" method="post">
        <input type="hidden" id="id_producto" name="input_id-producto" value="{$product->id_producto}">
        <div class="form-group">
            <label for="title">Producto</label>
            <input class="form-control" id="producto" name="input_producto" value="{$product->nombre_producto}" type="text">
        </div>
        <div class="form-group">
            <label for="description">Descripcion</label>
            <input class="form-control" id="description" name="input_description" value="{$product->desc_producto}" type="text">
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input class="form-control" id="precio" name="input_precio" value="{$product->precio}" type="number">
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input class="form-control" id="stock" name="input_stock" value="{$product->stock}" type="number">
        </div>
        <div class="form-group">
            <label for="category">Categoria</label>
            <select name="input_categoria" class="form-control" value="{$product->id_categoria}">
                {foreach from=$categories item=category}
                    {if $category->id eq $product->id_categoria}
                        <option selected value="{$category->id}">{$category->nombre}</option>
                    {else}      
                        <option value="{$category->id}">{$category->nombre}</option>
                    {/if}                        
                {/foreach}
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

</main>
{include file="footer.tpl"}