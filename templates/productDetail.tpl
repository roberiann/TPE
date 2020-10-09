{include file="header.tpl"}
<div>
    <img class="img-seed" src="images/semillas.jpg" alt="Semillas">
</div>
<h1>{$titulo}</h1>
<main class="container">

    <div class="card card-almacen mb-3" style="max-width: 28rem;">
        <div class="card-header bg-transparent card-almacen"><img class="img-leaf" src="images/hojita.png" alt="hojita"> {$product->nombre_producto}</div>
        <div class="card-body card-almacen">
            <h5 class="card-title"></h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><span>Categoria:</span> {$product->nombre_categoria} </li>
                <li class="list-group-item"><span>Descripción:</span> {$product->desc_producto} </li>
                <li class="list-group-item"><span>Precio: $</span> {$product->precio} </li>
                <li class="list-group-item"><span>Stock:</span> {$product->stock}Kg. </li>
            </ul>
        </div>
    </div>
</main>
{include file="footer.tpl"}