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
                <th>Precio</th>
                <th>Stock</th>
                <th>Descripción</th>
                <th>Categoria</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$products item=product}
                <tr>
                    <td> {$product->nombre_producto}</td>
                    <td> {$product->precio}</td>
                    <td> {$product->stock}</td>
                    <td> {$product->desc_producto}</td>
                    <td> {$product->nombre_categoria}</td>
                    <td><button class="btn-mod"><a href="delete/{$product->id_producto}">X</a></button></td>
                    {* <td><button class="btn-mod" id="btn-edit">Edit</button></td> *}
                </tr>
            {/foreach}
        <tbody>
        </tbody>
        <tfoot>
            <tr>
                <form action="insert" method="post">
                    <td><input class="input-table" id="producto" name="input_producto" type="text" placeholder=""></td>
                    <td><input class="input-table" id="precio" name="input_precio" type="text"></td>
                    <td><input class="input-table" id="stock" name="input_stock" type="text"></td>
                    <td><input class="input-table" id="descripcion" name="input_description" type="text"></td>
                    <td><input class="input-table" id="categoria" name="input_categoria" type="text"></td>
                    <td><button type="submit" class="btn btn-table" id="btn-agregar">Agregar</button></td>
                </form>
            </tr>
        </tfoot>
    </table>
</main>
{include file="footer.tpl"}