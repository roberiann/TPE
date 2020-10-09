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
                </tr>
            {/foreach}
        <tbody>
        </tbody>
        <tfoot>
            <tr>
                <td><input class="input-table" id="producto" type="text" placeholder=""></td>
                <td><input class="input-table" id="carbo" type="text"></td>
                <td><input class="input-table" id="grasas" type="text"></td>
                <td><input class="input-table" id="proteinas" type="text"></td>
                <td><input class="input-table" id="agua" type="text"></td>
            </tr>
        </tfoot>
    </table>

    <div class="btn-table">
        <div class="btn-filter">
            <button class="btn" id="btn-agregar">Agregar</button>
        </div>
    </div>
</main>
{include file="footer.tpl"}

