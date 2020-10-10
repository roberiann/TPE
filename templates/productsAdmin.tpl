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
                    <td><button class="btn-mod"><a href="deleteprod/{$product->id_producto}">X</a></button></td>
                    {* <td><button class="btn-mod" id="btn-edit">Edit</button></td> *}
                </tr>
            {/foreach}
        <tbody>
        </tbody>
        <tfoot>
            <tr>
                <form action="insertprod" method="post">
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

    <form action="updateprod" method="post">
        <input  id="producto" name="input_producto" type="text" placeholder="NombreNuevo">
        <input  id="precio" name="input_precio" type="text" placeholder="PrecioNuevo">
        <input  id="stock" name="input_stock" type="text" placeholder="StockNuevo">
        <input  id="descripcion" name="input_description" type="text" placeholder="DescrNueva"><br />
        <input  id="producto" name="input_viejo" type="text" placeholder="NombreViejo">

        <button type="submit" class="btn btn-table" id="btn-editar">editar</button>
    </form>

</main>
{include file="footer.tpl"}