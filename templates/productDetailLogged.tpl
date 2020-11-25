{include file="headerLogged.tpl"}
<div>
    <img class="img-seed" src="images/semillas.jpg" alt="Semillas">
</div>
<h1>{$titulo}</h1>
<main class="container">

    <div class="card card-almacen mb-3" style="max-width: 28rem;">
        <div class="card-header bg-transparent card-almacen">
            <h2> {$product->nombre_producto} </h2>
        </div>
        <div class="card-body card-almacen">           
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><span class="badge badge-info">Categoria:</span> {$product->nombre_categoria} </li>
                <li class="list-group-item"><span class="badge badge-info">Descripción:</span> {$product->desc_producto} </li>
                <li class="list-group-item"><span class="badge badge-info">Precio: $</span> {$product->precio} </li>
                <li class="list-group-item"><span class="badge badge-info">Stock:</span> {$product->stock}Kg. </li>
            </ul>
        </div>
    </div>
    
    

</main>
{include file="footer.tpl"}